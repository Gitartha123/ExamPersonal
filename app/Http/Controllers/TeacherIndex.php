<?php
namespace App\Http\Controllers;





use App\adminpanel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\question;
use App\exam;
use Illuminate\Support\Facades\Redirect;
use Session;



class TeacherIndex extends Controller
{
    public function TeacherIndex(){
        return view('teacher.index');
    }

    public function getsemester()
    {
        $semester = DB::table('semester')->pluck("semester","id");
        $posts =  DB::table('exam')->pluck("examname","id");
        return view('teacher.Addpaper',compact('semester'))->with('posts', $posts);
    }


    public function getsubject($id)
    {
        $subject = DB::table("subject")->where("semester_id",$id)->pluck("subname",'code');
        return json_encode($subject);
    }



    public function store(Request $request){
        $addquestion=new question();
        $addquestion->examid = $request->examid;
        $addquestion->semid = $request->semid;
        $addquestion->subcode =$request->subcode;
        $addquestion->qtitle = $request->question;
        $addquestion->mark = $request->mark;
        $addquestion->qno = $request->qno;
        $addquestion->save();
        return view('teacher.index');





    }

    public function postValue(Request $request) {
        $name = $request->get('exam');
        $subname=$request->input('subject');
        $semid = $request->input('semester');
        $qtype = $request->input('qtype');
        $noq = $request->input('noq');
        $qno = $request->input('qno');
        $mark = $request->input('mark');
        $total = $request->input('total');
        $totalmarks=exam::select('totalmarks')->where('id',$name)->get();
                return view('teacher.Question', [
                    'exam' => [$name], 'subject' => [$subname], 'semester' => [$semid], 'noq' => [$noq], 'qtype' => [$qtype], 'noq' => [$noq],'qno'=>[$qno],'mark'=>[$mark],'total'=>[$total]
                ])->with('totalmarks',$totalmarks);
    }

    public function viewpaper(){
        return view('teacher.viewquestion');
    }

    public function searchQuestion(Request $reaquest){
        $searchquestion = $reaquest->input('question');
        $getqno =  DB::table('question')->pluck(allOf())->where('subcode','=',$searchquestion);
        return view('teacher.viewquestion')->with('getqno',$getqno);
    }
}
