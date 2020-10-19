<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
	<link href="https://fonts.googleapis.com/css?family=Hanuman" rel="stylesheet">
	<title>@yield('pagetitle','The Pin Realestate Homepage')</title>
	@stack('meta')
		<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{asset('assets/js/main.js')}}"></script>
		<script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		{{-- <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script> --}}
		<link  href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
		<link  href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
		<link  href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	@stack('css')
	<style type="text/css">
		body {
			min-width: 1080px;
		}
	</style>
</head>
<body>
	@include('layouts.frontend.includes.front_header')
	@yield('content')
	<a href="#totop" id="totop"><i class="icon-up"></i></a>

	{{-- footer --}}
		{{-- @include('products.footer') --}}
	{{-- end footer --}}

    {!! Toastr::message() !!}
    <script type="text/javascript">
			@if ($errors->any())
				@foreach ($errors->all() as $error)
					toastr.error('{{ $error }}','Error',{
						closeButton:true,
						progressBar:true
					});
				@endforeach
			@endif
    </script>
	<div class="fix-feedback">
		<a href="https://www.thepinrealestate.com/feedback" class="btn btn-primary btn-sm">Feedback</a>
	</div>
	@include('sweetalert::alert')
	@stack('js')
</body>
</html>
