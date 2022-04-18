<head>
    <title>{{config('app.name') . ': ' .$title ?? config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/magnific-popup.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/components/bs-rating.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/components/bs-filestyle.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/custom.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/swa2.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/confirm.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/toastr.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{$title}}</title>
	<style>

		.white-section {
			background-color: #FFF;
			padding: 25px 20px;
			-webkit-box-shadow: 0px 1px 1px 0px #dfdfdf;
			box-shadow: 0px 1px 1px 0px #dfdfdf;
			border-radius: 3px;
		}
	
		.white-section label { margin-bottom: 15px; }
	
		.dark .white-section {
			background-color: #111;
			-webkit-box-shadow: 0px 1px 1px 0px #444;
			box-shadow: 0px 1px 1px 0px #444;
		}
		div.clear-rating{
			display:none;
		}
		</style>
</head>