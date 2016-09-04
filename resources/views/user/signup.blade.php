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
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<form action="{!! route('sign-up') !!}" method="post">
				<div class="form-group">
					<label for="name">Ten cua ban</label>
					<input type="text" id="name" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Mat khau</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="ipassword">Nhap lai mat khau</label>
					<input type="ipassword" id="ipassword" class="form-control">
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" class="btn btn-primary" value="signup">
			</form>
		</div>
	</div>
@endsection