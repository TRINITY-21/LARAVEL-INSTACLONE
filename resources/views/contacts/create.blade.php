@extends('layouts.app')
@section('title', 'Contact')
	
@section('content')

@if(!session('success'))
	<h1>Contact Us</h1>


	<form action=" {{ route('contact.store') }}" method="POST">
			@csrf

			<h5 style="color: red">{{ $errors->first('name')}}</h5>
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="{{old('name')}}">
			</div>

			<div class="form-group">
				<h5 style="color: red">{{ $errors->first('email')}}</h5>
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" value="{{old('email')}}">
			</div>

			<div class=" form-group">
				<h5 style="color: red">{{ $errors->first('message')}}</h5>
				<label for="message">Message</label>
				<textarea name="message" id="message" cols="30" rows="10" class="form-control" value="{{old('message')}}"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Send Message</button>
		</form>

		

@endif
@endsection