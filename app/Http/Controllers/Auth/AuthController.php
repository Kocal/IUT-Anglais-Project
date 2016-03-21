<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $request;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->request = $request;
        $data = $this->request->all();

        // Trim
        $data['username'] = trim($data['username']);
        $data['email'] = trim($data['email']);
        $data['avatar'] = $data['avatar'] ?? null;

        // On valide
        $validator = $this->validator($data);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        // Gestion Avatar
        $avatar = $request->file('avatar');
        $avatar_url = 'default.jpg';

        if ($request->hasFile('avatar') && $avatar->isValid()) {
            $avatar_url = str_random(8)
                . '-'
                . str_slug($avatar->getClientOriginalName())
                . '.' . $avatar->getClientOriginalExtension();

            $avatar->move(public_path() . '/upload', $avatar_url);
        }

        $data['avatar_url'] = $avatar_url;

        Auth::guard($this->getGuard())->login($this->create($data));

        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'avatar' => 'image',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'avatar_url' => $data['avatar_url'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
