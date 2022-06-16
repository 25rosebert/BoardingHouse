<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{asset("frontend/assets/bootstrap/css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{asset("frontend/assets/style.css")}}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
    <script src="{{asset('UI/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset("frontend/assets/bootstrap/js/bootstrap.js")}}"></script>
    <script src="{{asset("frontend/assets/script.js")}}"></script>
    
  
  
  <!-- Owl stylesheet -->
  <link rel="stylesheet" href="{{asset("frontend/assets/owl-carousel/owl.carousel.css")}}">
  <link rel="stylesheet" href="{{asset("frontend/assets/owl-carousel/owl.theme.css")}}">
  <script src="{{asset("frontend/assets/owl-carousel/owl.carousel.js")}}"></script>
  <!-- Owl stylesheet -->
  
  
  <!-- slitslider -->
      <link rel="stylesheet" type="text/css" href="{{asset("frontend/assets/slitslider/css/style.css")}}">
      <link rel="stylesheet" type="text/css" href="{{asset("frontend/assets/slitslider/css/custom.css")}}">
      <script type="text/javascript" src="{{asset("frontend/assets/slitslider/js/modernizr.custom.79639.js")}}"></script>
      <script type="text/javascript" src="{{asset("frontend/assets/slitslider/js/jquery.ba-cond.min.js")}}"></script>
      <script type="text/javascript" src="{{asset("frontend/assets/slitslider/js/jquery.slitslider.js")}}"></script>
  <!-- slitslider -->
  
</head>
<body>
    @yield('css')
    @yield('content')

    @stack('script')
</body>
</html>
