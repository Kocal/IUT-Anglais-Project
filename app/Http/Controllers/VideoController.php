<?php

namespace App\Http\Controllers;

use App\Category;
use App\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    private function getCategories($fields) {
        return Category::all($fields);
    }

    //
    public function getAdd() {
        return view('pages.video.add', [
            'categories' => $this->getCategories('category')->pluck('category')->sort()
        ]);
    }

    public function postAdd(Request $request) {
        $data = $request->all();

        $this->validate($request, [
            'video' => 'required|mimes:webm,mp4,mp4v,mpg4',
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|in:' . $this->getCategories('id')->pluck('id')
        ]);

        $data['created_at'] = Carbon::now()->timestamp;
        $data['tag'] = str_random(16);
        $data['file'] = $data['created_at']
            . '-' . $data['tag']
            . '.' . $request->file('video')->getClientOriginalExtension();

        $request->file('video')->move(public_path('upload') . '/videos', $data['file']);

        $this->create($data);

        return redirect(route('video::watch', [
            'video_id' => $data['tag']
        ]));
    }

    private function create(array $data) {
        return Videos::create([
            'user_id' => Auth::id(),
            'category_id' => $data['category'],
            'tag' => $data['tag'],
            'file' => $data['file'],
            'title' => trim($data['title']),
            'description' => trim($data['description']),
            'created_at' => $data['created_at'],
        ]);
    }

    public function getWatch(Request $request, $tag) {
        return view('pages.video.watch', [
            'video' => Videos::where('tag', $tag)->with('user')->first()
        ]);
    }
}
