<head>
    <title>{{config('app.name') . ': ' .$title ?? config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/magnific-popup.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/toastr.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/custom.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>