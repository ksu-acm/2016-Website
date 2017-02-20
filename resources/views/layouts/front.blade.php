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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ URL::asset('css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="{{ URL::asset('css/front.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
  <script src="{{ URL::asset('js/ga.js') }}"></script>
  @yield('head')
</head>

<body>
  <div class="navbar-fixed">
  <nav role="navigation">
    <div class="nav-wrapper container">
      <a href="{{ url('/') }}" class="brand-logo left"><img src="{{ URL::asset('img/acm.svg') }}" />K-State ACM</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdowno" data-beloworigin="true">Officers<i class="material-icons">arrow_drop_down</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdowne" data-beloworigin="true">Events<i class="material-icons">arrow_drop_down</i></a></li>
        <li><a href="{{ url('/sponsors') }}">Sponsors</a></li>
        <li><a href="mailto:ksuacm@ksu.edu">Contact</a></li>
        <li><a href="{{ url('/apps') }}">Apps</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  </div>
  <ul id="nav-mobile" class="side-nav">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a class="dropdown-button" href="#!" data-activates="dropdownmo" data-beloworigin="true">Officers<i class="material-icons">arrow_drop_down</i></a></li>
    <li><a class="dropdown-button" href="#!" data-activates="dropdownme" data-beloworigin="true">Events<i class="material-icons">arrow_drop_down</i></a></li>
    <li><a href="{{ url('/sponsors') }}">Sponsors</a></li>
    <li><a href="mailto:ksuacm@ksu.edu">Contact</a></li>
    <li><a href="{{ url('/apps') }}">Apps</a></li>
  </ul>
  <ul id="dropdowno" class="dropdown-content collection">
    <li><a href="{{ url('/officers') }}">Officers</a></li>
    <li><a href="{{ url('/jrofficers') }}">Junior Officers</a></li>
  </ul>
  <ul id="dropdownmo" class="dropdown-content collection">
    <li><a href="{{ url('/officers') }}">Officers</a></li>
    <li><a href="{{ url('/jrofficers') }}">Junior Officers</a></li>
  </ul>
  <ul id="dropdowne" class="dropdown-content collection">
    <li><a href="{{ url('/events') }}">Events</a></li>
    <li><a href="https://orgsync.com/86744/chapter">OrgSync</a></li>
  </ul>
  <ul id="dropdownme" class="dropdown-content collection">
    <li><a href="{{ url('/events') }}">Events</a></li>
    <li><a href="https://orgsync.com/86744/chapter">OrgSync</a></li>
  </ul>
@yield('content')
<footer class="page-footer">
  <div class="footer-copyright">
    <div class="container">
      ©2016 K-State ACM
      <div class="fsocial">
        <a href="https://www.facebook.com/kstateacm" target="_blank"><img src="{{ URL::asset('img/facebookw.svg') }}" /></a>
        <a href="https://twitter.com/ksuacm" target="_blank"><img src="{{ URL::asset('img/twitterw.svg') }}" /></a>
      </div>
    </div>
  </div>
</footer>
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/materialize.min.js') }}"></script>
<script src="{{ URL::asset('js/front.js') }}"></script>
@yield('footer')
</body>
</html>
