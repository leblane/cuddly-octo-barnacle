<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<title>{{ isset($title) ? $title : "WHY DO MY FINGERS NOT WORK TODAY I NEED MY FINGERS TO WORK ok hi yes this is a bad title" }} </title>
	<link rel="stylesheet" href="/css/iareacssfile.css">
</head>
<body>
@yield('header')
@yield('content')
@yield('footer')
</body>
</html>
