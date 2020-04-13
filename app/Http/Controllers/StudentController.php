<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Examinfo;
use App\Question;
use App\Answer;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$examCode=Examinfo::all();
        return view('student.create')->with('examValue',$examCode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $student= new Student;

        $sIdForValidate=$request->input('student_id');
        $examCodeForValidate=$request->input('exam_code');
        $initialScore=0;

        $checker=Student::where('student_id','=',$sIdForValidate)->where('uniqueid','=',$examCodeForValidate)->count();
		
		$total_question[] = Examinfo::select('question_lenth')->where('uniqueid', $examCodeForValidate)->get();
		$total_ques = $total_question[0][0]['question_lenth'];
		
        if ($checker>0) {
            return "YOU ALREADY DONE THIS EXAM";
        }else{
            $student = Student::create([
            'student_id' => $request->input('student_id'),
            'uniqueid' => $request->input('exam_code'),
            'score' =>$initialScore,
			'total_question' =>$total_ques
            ]);
			
			$answerId = Student::where('student_id',$sIdForValidate);
			/*$stud_Id = DB::table('Students')
			->select('id')
			->where('student_id', $sIdForValidate)
			->get();
			$stuents_id= $stud_Id[0]->id;
			$u_Id = DB::table('Answer')
			->select('id')
			->where('stu_id', $u_Id)
			//->get();
			print_r($u_Id->toSql());exit;
			$qustionCount=Answer::where('stu_id','=', $stuents_id)->get();
			print_r($qustionCount);exit;*/

            $id=$request->input('exam_code');
            $studentRealId=$request->input('student_id');
            $student_id=Student::where('student_id',$studentRealId)->value('id');
            $findcourse= Examinfo::where('uniqueid',$id)->value('id');
            $findtime= Examinfo::where('uniqueid',$id)->value('time');
            $course= Examinfo::where('uniqueid',$id)->value('Course');
            $questions=Question::where('quiz_id',$findcourse)->get();
            return view('answer.show')->with('questions', $questions)->with('student_id',$student_id)->with('course',$course)->with('time',$findtime);
        
		$id = $request->input('stu_id');

        
        $selectLenth=Examinfo::where('id','=',$id)->value('question_lenth');
        //return $selectLenth;

        if ($qustionCount < $selectLenth ) {
            $examinfo = Examinfo::find($id);
            return view('makequestion.create', ['examinfo' => $examinfo]);
        }else{
            $uniqueId=Examinfo::where('id','=',$id)->value('uniqueid');
            return view('makequestion.index',['uniqueid' =>$uniqueId]);

        }
		
		}
        

        //return $this->show($request->input('exam_code'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
