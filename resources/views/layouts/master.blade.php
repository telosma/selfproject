<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Self Project</title>
	<link rel="stylesheet" href="{{ url('lib/bootstrap/css/bootstrap.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('css/main.css') }}">
	<link href="{{ url('css/clean-blog.min.css') }}" rel="stylesheet">
	<link href="{{ url('font-awesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	
	@yield('header')

	@yield('content')
	<footer>
		@yield('footer')
	</footer>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="{{ url('lib/bootstrap/js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8" async defer></script>
	<script src="{{ url('js/app.js') }}" type="text/javascript" charset="utf-8"></script>

</body>
</html>