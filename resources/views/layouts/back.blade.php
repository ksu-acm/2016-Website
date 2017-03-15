<!DOCTYPE html>
<html lang="en">
<link href="{{URL::asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">

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
  <link href="{{ URL::asset('css/daterangepicker.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('css/back.css') }}" rel="stylesheet">
  <script src="{{ URL::asset('js/ga.js') }}"></script>
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
            <!--
            <form class="sidebar-form">
            <input class="form-control" type="text" placeholder="Search...">
            <button type="submit" class="btn-link"><span class="icon icon-magnifying-glass"></span></button>
          </form>
        -->
        <ul class="nav nav-pills nav-stacked">
          <li class="nav-header">Dashboards</li>
          <li class="{{ Request::is('apps') ? 'active' : '' }}"><a href="{{ url('/apps') }}">Overview</a></li>
          @if(Auth::user()->hasAnyRole(['ACM Officer', 'ACM Advisor', 'Administrator']))
          <li class="{{ Request::is('apps/event*') ? 'active' : '' }}"><a href="{{ url('/apps/events') }}">Events</a></li>
          @endif
          <li class="{{ Request::is('apps/food') ? 'active' : '' }}"><a href="{{ url('/apps/food') }}">Food Analytics</a></li>
          @if(Auth::check())
          @if(Auth::user()->admin == 1 || Auth::user()->jofficer == 1 || Auth::user()->officer == 1 || Auth::user()->advisor == 1)
          @if(Request::is('attendanceAnalytics'))
          <li class="active"><a href="{{ url('/apps/attendance/analytics') }}">Attendance Analytics</a></li>
          @else
          <li><a href="{{ url('/apps/attendance/analytics') }}">Attendance Analytics</a></li>
          @endif
          @endif
          @endif

          @if(Auth::check())
          @if(Auth::user()->admin == 1)
          <li class="nav-header">Attendance</li>
          @if(Request::is('Attendance'))
          <li class="active"><a href="{{ url('/apps/attendance') }}">Manual Entry</a></li>
          @else
          <li><a href="{{ url('/apps/attendance') }}">Manual Entry</a></li>
          @endif
        @endif
        @endif

        <li class="nav-header">My Profile</li>
        @if(Auth::check())
        @if(Auth::user()->hasRole('Administrator'))
        <li class="{{ Request::is('apps/admin') ? 'active' : '' }}"><a href="{{ url('/apps/admin') }}">Administration</a></li>
        @endif
        @if(Auth::user()->hasRole('User'))
        <li class="{{ Request::is('apps/profile*') ? 'active' : '' }}"><a href="{{ url('/apps/profile') }}">My Profile</a></li>
        @endif
        <li><a href="{{ url('/auth/logout') }}">Log Out</a></li>
        @else
        <li><a href="{{ url('/auth/login') }}">Log In</a></li>
        @endif
      </ul>
      <hr class="visible-xs m-t">
    </div>
  </nav>
</div>
@yield('content')
</div>
</div>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('js/chart.js') }}"></script>
<script src="{{ URL::asset('js/tablesorter.min.js') }}"></script>
<script src="{{ URL::asset('js/toolkit.min.js') }}"></script>
<script src="{{ URL::asset('js/back.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-toggle.min.js') }}"></script>
@yield('footer')
</body>
</html>
