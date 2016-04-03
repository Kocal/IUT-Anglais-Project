<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class VideoController extends Controller
{
    private function getCategories($fields) {
        return Category::all($fields);
    }

    public function getAdd() {
        return view('pages.video.add', [
            'categories' => $this->getCategories(['id', 'category'])->pluck('category', 'id')->sort()
        ]);
    }

    public function postAdd(Request $request) {
        $data = $request->all();
        $pathVideos = public_path('upload/videos/');

        $this->validate($request, [
            'video' => 'required|mimes:webm,mp4,mp4v,mpg4',
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|in:'. implode(',', $this->getCategories('id')->pluck('id')->toArray())
        ]);

        $data['created_at'] = Carbon::now()->timestamp;
        $data['tag'] = str_random(16);
        $data['file'] = $data['created_at']
            . '-' . $data['tag']
            . '.' . $request->file('video')->getClientOriginalExtension();
        $data['thumbnail'] = $data['file'] . '.jpg';

        $request->file('video')->move($pathVideos, $data['file']);

        $process = new Process(sprintf('ffmpeg -i %s -ss 00:00:01.000 -vframes 1 %s',
            $pathVideos . $data['file'],
            $pathVideos . $data['thumbnail']
        ));

        try {
            $process->mustRun();
            echo $process->getOutput();
        } catch (ProcessFailedException $e) {
            echo $e->getMessage();
        }

        $this->create($data);
        Session::push('messages', 'success|Your video has been added successfully');

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
            'thumbnail' => $data['thumbnail'],
            'title' => trim($data['title']),
            'description' => trim($data['description']),
            'created_at' => $data['created_at'],
        ]);
    }

    public function getWatch(Request $request, $tag) {
        $video = Videos::where('tag', $tag)->with('user', 'comments', 'comments.user', 'category')->first();

        if(!$video) {
            Session::push('messages', "danger|This video doesn't exists");
            return redirect(route('video::last'));
        }

        return view('pages.video.watch', [
            'video' => $video
        ]);
    }
    
    public function getLasts(Request $request) {
        $videosPerPage = 9;

        $videos = Videos::orderBy('created_at', 'desc')->with('user')->paginate($videosPerPage);
        
        $videos->setPath('/video/lasts');
 
        return view('pages.video.last', [
            'videos' => $videos
        ]);
    }
}
