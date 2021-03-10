<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
     @yield('title')
  </title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">

  @yield('link')

  
</head>
<body>

	@include('partials.nav_bar')

  @yield('content')

  

 <script type="text/javascript" src="{{ asset('js/app.js')}}" ></script>
  </body>
</html>
