<?php

namespace App\Http\Controllers;

use App\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DeployPaper extends Controller
{

    public function getsemester()
    {
        $sem = DB::table('semester')->pluck("semester","id");
        $posts =  DB::table('exam')->pluck("examname","id");
        return view('teacher.deploy',compact('sem'))->with('posts', $posts);
    }

    public function getsubject($id)
    {
        $subject = DB::table("subject")->where("semester_id",$id)->pluck("subname",'code');
        return json_encode($subject);
    }

    public function postValue(Request $request){
               $exam = $request->input('exam');
               $semester = $request->input('semester');
               $subcode = $request->input('sub_code');

               $status = DB::table('question')->where('subcode','=',$subcode)->where('examid','=',$exam)->where('semid','=',$semester)->pluck('status');
               foreach ($status as $e)
               if( $e == 0){
                   DB::table('question')
                       ->where('subcode', '=',$subcode)
                       ->where('examid','=',$exam)
                       ->where('semid','=',$semester)
                       ->update(['status'=>1]);
                   echo '<script>alert("Deployed Successfully")</script>';
                   return view('teacher.index');
               }
               else{
                   echo '<script>alert("Already deployed")</script>';
                   return view('teacher.index');
               }


    }
}
