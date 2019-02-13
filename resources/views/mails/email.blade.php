@extends('layouts.app')

@section('content')

	<br>
	<div class="col-md-10 col-md-offset-2">
		<form action="send" method="post">
			{{csrf_field()}}
			<div class="group-control">
				<label>To</label>
				<input type="email" name="to" id="to" class="field-control">
			</div>
			<div class="group-control">
				<label for="subject">Subject</label>
				<input type="text" name="subject" id="subject" class="field-control">
			</div>
			<div class="group-control">
				<label for="message">Message</label>
				<textarea name="message" id="message" class="field-control"></textarea>
			</div>
			<input type="submit" name="submit" value="Send">
		</form>
	</div>

@endsection