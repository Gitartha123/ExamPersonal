<?php

namespace App\Http\Controllers;

use App\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function getsem(){
        $posts = semester::orderby('created_at', 'desc')->get();

        return view('auth.register')->with('posts', $posts);
    }
}
