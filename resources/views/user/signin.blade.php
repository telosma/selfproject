@extends('layouts.master')

@section('content')

	<div class="error">
		@if(count($errors) > 0)
			<ul>
			@foreach($errors->all() as $error)
				<li>
					{{ $error }}
				</li>
			@endforeach
			</ul>
		@endif
	</div>
	@section('header')
		@include('includes.header')
	@endsection
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
		<h3>Sign-in Page</h3>
			<form action="{!! route('sign-in') !!}" method="post">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<input type="submit" class="btn btn-primary form-control" value="Sign-in">
				<a href="{{ route('signup') }}" style="float:right; margin-top:10px;">Create new account</a>
			</form>
		</div>
	</div>
@endsection