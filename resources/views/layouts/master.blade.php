<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Self Project</title>
	<link rel="stylesheet" href="{{ url('lib/bootstrap/css/bootstrap.min.css') }}" type="text/css">
</head>
<body>
	
	@yield('header')

	@yield('content')

	@yield('footer')
	<script src="{{ url('lib/jquery/jquery-3.1.0.min.js') }} " type="text/javascript" charset="utf-8"></script>
	<script src="{{ url('lib/bootstrap/js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8"></script>

</body>
</html>