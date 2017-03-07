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

  @yield('head')
</head>
<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">K-State ACM</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">Meet Us</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">ACM SIG</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Events</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('/apps') }}">Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

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
