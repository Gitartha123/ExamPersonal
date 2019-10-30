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
            $name = $request->get('examid');
            $subname=$request->input('subcode');
            $semid = $request->input('semid');
            $qtype = $request->input('qtype');
            $noq = $request->input('noq');
            $qno = $request->input('qno');
            $mark = $request->input('mark');
            $total = $request->input('total');
            $totalmarks=exam::select('totalmarks')->where('id',$name)->get();
            $t = $request->input('totalmarks');


                    if($total < $t ){
                        $total = $total+$mark;
                        $qno = $qno + 1;
                         if($total == $t){
                             Session::flash('message', 'Paper Submitted Successfully ');
                             return Redirect::to('/teacherpanel');
                        }

                         elseif($total > $t) {
                             echo '<script>alert("Ooops!!!Total marks is out of range!!!Check now")</script>';
                             return view('welcome');
                         }
                        else{
                            return view('teacher.Question', ['exam' => [$name], 'subject' => [$subname], 'semester' => [$semid], 'noq' => [$noq], 'qtype' => [$qtype], 'qno' => [$qno], 'total' => [$total], 'mark' => [$mark], 't' => [$t]
                            ])->with('totalmarks', $totalmarks);
                        }
                    }



        $addquestion=new question();
        $addquestion->examid = $request->examid;
        $addquestion->semid = $request->semid;
        $addquestion->subcode =$request->subcode;
        $addquestion->qtype = $request->qtype;
        $addquestion->qtitle = $request->question;
        $addquestion->option1 = $request->option1;
        $addquestion->option2 = $request->option2;
        $addquestion->option3 = $request->option3;
        $addquestion->option4 = $request->option4;
        $addquestion->coption = $request->coption;
        $addquestion->mark = $request->mark;
        $addquestion->qno = $request->qno;
        $addquestion->save();


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
}
