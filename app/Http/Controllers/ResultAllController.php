<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Answer;
use App\Examinfo;

class ResultAllContainer extends Controller
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
        return view('result.index')->with('examValue',$examCode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $var)
    {
        //
        $getId=$var->input('student_id');
        $getExamCode=$var->input('exam_code');
        $getCourseName=Examinfo::where('uniqueid',$getExamCode)->value('Course');
		$getQuestionLength=Examinfo::where('uniqueid',$getExamCode)->value('question_lenth');
		$examCode=Examinfo::all();
		
		
        $getScore=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('score');
        $findStudentIdForAnswerSheet=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('id');
        $answeredQuestion=Answer::where('stu_id',$findStudentIdForAnswerSheet)->get();
        return view('result.showall')->with('answeredQuestion',$answeredQuestion)->with('getScore',$getScore)->with('studentId',$getId)->with('course',$getCourseName)->with('question_lenth',$getQuestionLength);

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $var)
    {
        //
		$getId=$var->input('student_id');
		
        $getExamCode=$var->input('exam_code');
		
        $getCourseName=Examinfo::all();
		
		$getQuestionLength=Examinfo::all();
		//print_r($getCourseName);exit;
		$examCode=Examinfo::all();
		//print_r($examCode);exit;
		
        $getScore=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('score');
        $findStudentIdForAnswerSheet=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('id');
		
		$leagues = DB::table('Student')
		->select('stu_id')
		->join('countries', 'countries.country_id', '=', 'leagues.country_id')
		->where('countries.country_name', $country)
		->get();
		var_dump($leagues);
        $answeredQuestion=Student::all();
		//print_r($answeredQuestion);exit;
        return view('result_all')->with('answeredQuestion',$answeredQuestion);
		//->with('getScore',$getScore)->with('studentId',$getId)->with('course',$getCourseName)->with('question_lenth',$getQuestionLength);

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
