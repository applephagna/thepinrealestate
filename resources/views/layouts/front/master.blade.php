<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('pagetitle', 'Master Homepage')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Style CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/style.css')}}">
  @stack('css')  
  {{-- @include('layouts.includes.front.head') --}}
</head>
<body class="cms-index-index index-opt-1 catalog-category-view catalog-view_op1 catalog-product-view catalog-view_op1">
  <div class="wrapper">
    
    @include('layouts.includes.front.header')

  <!-- MAIN -->
  <main class="site-main">
    @yield('main-content')
  </main>
  <!-- end MAIN -->

  @include('layouts.includes.front.footer')

{{-- Js File --}}
  <!-- jQuery -->    
  <script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
  <!-- sticky -->
  <script src="{{asset('assets/front/js/jquery.sticky.js')}}"></script>
  <!-- OWL CAROUSEL Slider -->    
  <script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
  <!-- Boostrap --> 
  <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
  <!-- Countdown --> 
  <script src="{{asset('assets/front/js/jquery.countdown.min.js')}}"></script>
  <!--jquery Bxslider  -->
  <script src="{{asset('assets/front/js/jquery.bxslider.min.js')}}"></script>
  <!-- actual --> 
  <script src="{{asset('assets/front/js/jquery.actual.min.js')}}"></script>
  <!-- jQuery UI -->
  <script src="{{asset('assets/front/js/jquery-ui.min.js')}}"></script>
  <!-- Chosen jquery-->    
  <script src="{{asset('assets/front/js/chosen.jquery.min.js')}}"></script>
  <!-- parallax jquery--> 
  <script src="{{asset('assets/front/js/jquery.parallax-1.1.3.js')}}"></script>
  <!-- elevatezoom --> 
  <script src="{{asset('assets/front/js/jquery.elevateZoom.min.js')}}"></script>
  <!-- fancybox -->
  <script src="{{asset('assets/front/js/fancybox/source/jquery.fancybox.pack.js')}}"></script>
  <script src="{{asset('assets/front/js/fancybox/source/helpers/jquery.fancybox-media.js')}}"></script>
  <script src="{{asset('assets/front/js/fancybox/source/helpers/jquery.fancybox-thumbs.js')}}"></script>
  <!-- arcticmodal -->
  <script src="{{asset('assets/front/js/arcticmodal/jquery.arcticmodal.js')}}"></script>
  <!-- Main -->  
  <script src="{{asset('assets/front/js/main.js')}}"></script>
{{-- Js File --}}
@stack('js')
</body>
</html>