<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getExam(Request $request){


        $semester = $request->input('semester');
        $getstatus = DB::table('question')->where('semid','=',$semester)->pluck('status');
        $getquestions = DB::table('question')->where('semid','=',$semester)->get();

        foreach ($getstatus as $g)
        if($g != 0 ){
            return view('exam')->with('getquestions',$getquestions)->with('time',$getTime);

        }
        else{
            echo '<script>alert("Exam will be started soon!!")</script>';
            return view('home');
        }

    }

}
