<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Creative - Start Bootstrap Theme</title>

	<!-- Bootstrap Core CSS -->
	<link href="{{ Theme::asset('vendor/bootstrap/css/bootstrap.min.css', null, true) }}" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="{{ Theme::asset('vendor/font-awesome/css/font-awesome.min.css', null, true) }}" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Plugin CSS -->
	<link href="{{ Theme::asset('vendor/magnific-popup/magnific-popup.css', null, true) }}" rel="stylesheet">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ Theme::asset('css/creative.css', null, true) }}"/>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body id="page-top">
@include('partials.header')
@yield('content')
@include('partials.footer')

</body>
</html>
