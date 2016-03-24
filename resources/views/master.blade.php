<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!!csrf_token()!!}"/>
    
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	
	@yield('css')
</head>
<body class="@yield('body-class')">
	
	@yield('main')

	<script type="text/javascript" src="/js/jquery-2.2.1.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	@yield('js')
</body>
</html>