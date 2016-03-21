<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class VideoController extends Controller
{
    //
    public function getAdd(Request $request) {
        return view('pages.video.add');
    }

    public function postAdd() {

    }
}
