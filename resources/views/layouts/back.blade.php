<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="The official website for the K-State chapter of the Association for Computing Machinery.">
    <meta name="author" content="Alex Todd">
    <title>K-State ACM | @yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="{{ URL::asset('css/toolkit-inverse.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/back.css') }}" rel="stylesheet">
    @yield('head')
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 sidebar">
          <nav class="sidebar-nav">
            <div class="sidebar-header">
              <button class="nav-toggler nav-toggler-sm sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm"><span class="sr-only">Toggle nav</span></button>
              <a class="sidebar-brand img-responsive" href="{{ url('/') }}"><img src="{{ URL::asset('img/acm_flat.svg') }}" /></a>
            </div>
            <div class="collapse nav-toggleable-sm" id="nav-toggleable-sm">
              <form class="sidebar-form">
                <input class="form-control" type="text" placeholder="Search...">
                <button type="submit" class="btn-link"><span class="icon icon-magnifying-glass"></span></button>
              </form>
              <ul class="nav nav-pills nav-stacked">
                <li class="nav-header">Dashboards</li>
                @if (Request::is('apps'))
                  <li class="active"><a href="{{ url('/apps') }}">Overview</a></li>
                @else
                  <li><a href="{{ url('/apps') }}">Overview</a></li>
                @endif
                @if (Request::is('food'))
                  <li class="active"><a href="{{ url('/food') }}">Food Analytics</a></li>
                @else
                  <li><a href="{{ url('/food') }}">Food Analytics</a></li>
                @endif

                <li class="nav-header">My Profile</li>
                @if(Auth::check())
                  @if (Auth::user()->admin == 1)
                    @if (Request::is('admin'))
                      <li class="active"><a href="{{ url('/admin') }}">Administration</a></li>
                      @else
                      <li><a href="{{ url('/admin') }}">Administration</a></li>
                    @endif
                  @endif
                  @if (Request::is('profile'))
                    <li class="active"><a href="{{ url('/profile') }}">My Profile</a></li>
                  @else
                    <li><a href="{{ url('/profile') }}">My Profile</a></li>
                  @endif
                <li><a href="{{ url('/auth/logout') }}">Log Out</a></li>
                @else
                  <li><a href="{{ url('/auth/login') }}">Log In</a></li>
                @endif
                <!--<li><a href="#docsModal" data-toggle="modal">Example modal</a></li>-->
              </ul>
              <hr class="visible-xs m-t">
            </div>
          </nav>
        </div>
        @yield('content')
      </div>
    </div>

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/chart.js') }}"></script>
    <script src="{{ URL::asset('js/tablesorter.min.js') }}"></script>
    <script src="{{ URL::asset('js/toolkit.min.js') }}"></script>
    <script src="{{ URL::asset('js/back.js') }}"></script>
    @yield('footer')
  </body>
</html>
