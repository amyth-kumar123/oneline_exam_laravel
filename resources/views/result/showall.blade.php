@extends('layouts.app')
@section('content')

<div>
    <div class="col-lg-offset-5">
        <h2>Candidate Name : {{$studentId}}</h2>
        <h2>Course Name : {{$course}}</h2>
		<h3 >Total Question : <b><span style="color: green">{{$question_lenth}}</span></b></h3>
        <h3 >Your Scored : <b><span style="color: green">{{$getScore}}</span></b></h3>
		
		@if($getScore >= $qualifying_marks)
			<h3><span style="color: green">Selected........</span></h3>
		@elseif($getScore < $qualifying_marks)
			<h3><span style="color: red">Sorry........</span></h3>
		@endif
    </div><hr>
            
        @foreach($answeredQuestion as $answerQ)
			
            <div class="col-md-6 col-lg-8 col-sm-6 col-lg-offset-4">
                <h3><span style="color: red">Question : </span> {{$answerQ->question}} ?</h3>
                <div class="col-lg-offset-2">  
                    <div class="form-group">
                        <p type="text" name="given_answer">Your Choice Was : {{$answerQ->given_answer}}</p>
                    </div>
					@if($answerQ->given_answer != $answerQ->true_answer)
						<div class="form-group">
                        <p type="text" name="given_answer"><span style="color: red"><b>Wrong Answer : {{$answerQ->given_answer}}</b></span></p>
                    </div>
					@endif
                     <div class="form-group">
                        <p type="text" name="true_answer"><span style="color: green">Correct Answer : {{$answerQ->true_answer}}</span></p>
                    </div>

                </div>
            </div>
         @endforeach
		 
    </div>
	</br></br>
	<a href="/"><button type="button" class="btn btn-info btn-lg btn-block"> Back To Home </button></a><br>
@endsection
