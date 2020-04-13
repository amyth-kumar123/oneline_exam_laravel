@extends('layouts.app')

@section('content')

<!-- @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor -->

<form method="post" action="{{route('student.store')}}">
	{{ csrf_field() }}

	<div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-3">
	  <div class="form-group">
	    <label class="col-form-label" for="formGroupExampleInput">Candidate Name</label>
	    <input type="text" name="student_id" class="form-control " id="formGroupExampleInput" placeholder="Candidate Name" required>
	  </div>
	  <div class="form-group">
	    <label class="col-form-label" for="formGroupExampleInput2">Exam Code</label>
		
		<select name="exam_code" class="form-control" id="formGroupExampleInput2" required>
		
		@foreach($examValue as $code)
		
		<option value="{{ $code->uniqueid }}"> {{ $code->Course }}</option>
		@endforeach
		</select>
	    <!--<input type="text" name="exam_code" class="form-control" id="formGroupExampleInput2" placeholder="E.g. A6xgP" required>-->
	  </div>
	  <button type="Submit" class="btn btn-success btn-block">Submit</button><br><br>
	  <h4 style="color: red">**Please keep in mind that Question set (next page) would be invalid after limited exam time. Try to give Answer in time.</h4>
	</div>

</form>

    @endsection
