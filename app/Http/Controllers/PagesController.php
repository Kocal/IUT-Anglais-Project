<?php

namespace App\Http\Controllers;

use App\Videos;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function getIndex() {
        return view('pages.index');
    }
}
