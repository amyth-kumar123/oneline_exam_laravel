@extends('layouts.app')
@section('content')

<div>
    <div class="col-lg-offset-5">
        <h2>All Candidate Result</h2>
        
    </div><hr>
            
			<table align="center" border="1">
		<th>Candidate Name</th><th>Total Questions</th><th>Marks Scored</th><th>Percentage</th><th>Eligibility</th>
        @foreach($answeredQuestion as $answerQ)
		<?php $average = ($answerQ->score / $answerQ->total_question)*100;
				$avg =	number_format($average,2);
				if($avg > 75){
					$bravo = "Selected";
				}else{
					$bravo = "Sorry";
				}?>
		<tr><td align="center">{{$answerQ->student_id}}</td><td align="center">{{$answerQ->total_question}}</td>
		<td align="center">{{$answerQ->score}}</td><td align="center">{{$avg}}</td><td align="center">{{$bravo}}</td></tr>
		
		
		
		
		
           
         @endforeach
		 </table>

    </div>
@endsection
