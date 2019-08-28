<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title','Kazumi')</title>
	<link rel="stylesheet" href="">
	@yield('css')
</head>
<body>
	@include('layouts.client.header')

	@yield('content')

	@include('layouts.client.footer')

	@yield('script')
</body>
</html>