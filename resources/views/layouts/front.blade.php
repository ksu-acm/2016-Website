<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
  <meta name="description" content="The official website for the K-State chapter of the Association for Computing Machinery.">
  <meta name="author" content="Kyle Eisenbarger">
  <title>K-State ACM | @yield('title')</title>
  <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('favicon.ico') }}" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="{{ URL::asset('css/creative.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="{{ URL::asset('css/magnific-popup.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="{{ URL::asset('css/front.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />

  @yield('head')
</head>
<body id="page-top">



@yield('content')

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jqery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('js/scrollreveal.min.js') }}"></script>
<script src="{{ URL::asset('js/creative.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


@yield('footer')
</body>
</html>
