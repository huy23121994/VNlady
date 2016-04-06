<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!!csrf_token()!!}"/>
    @yield('meta')

    <link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	
	@yield('css')
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-75483528-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>
<body class="@yield('body-class')">
	<?php //include_once("analyticstracking.php") ?>
	
	@yield('main')

	<script type="text/javascript" src="/js/jquery-2.2.1.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	@yield('js')
</body>
</html>