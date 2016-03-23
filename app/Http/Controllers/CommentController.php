<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests;
use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{

    public function add(Request $request, $videoTag)
    {
        $data = $request->all();

        $this->validate($request, [
            'comment' => 'required|string'
        ]);

        $data['user_id'] = Auth::id();
        $data['video_id'] = Videos::where('tag', $videoTag)->first()->id;

        $this->create($data, $videoTag);
        Session::push('messages', 'success|Your comment has been successfully submitted');
        return redirect(route('video::watch', ['video_tag' => $videoTag]));
    }

    private function create(array $data)
    {
        Comments::create($data);
    }
}
