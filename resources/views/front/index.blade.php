@extends('layouts.front')
@section('title', 'Home')

@section('content')
<div class="slider">
    <ul class="slides">
      <li><img src="{{ URL::asset('img/home/1.jpg') }}"></li>
      <li><img src="{{ URL::asset('img/home/2.jpg') }}"></li>
      <li><img src="{{ URL::asset('img/home/3.jpg') }}"></li>
      <li><img src="{{ URL::asset('img/home/4.jpg') }}"></li>
      <li><img src="{{ URL::asset('img/home/5.jpg') }}"></li>
      <li><img src="{{ URL::asset('img/home/6.jpg') }}"></li>
      <li><img src="{{ URL::asset('img/home/7.jpg') }}"></li>
      <li><img src="{{ URL::asset('img/home/8.jpg') }}"></li>
    </ul>
  </div>

<div class="container">
  <div class="section">
    <div class="row">
      <h1 class="header center grey-text text-darken-3">Welcome!</h1>
      <div class="social">
        <a href="https://www.facebook.com/kstateacm" target="_blank"><img src="{{ URL::asset('img/facebookc.svg') }}" /></a>
        <a href="https://twitter.com/ksuacm" target="_blank"><img src="{{ URL::asset('img/twitterc.svg') }}" /></a>
      </div>
      <p class="col s12">The ACM is a professional organization made up mostly of Computer and Information Science and Electrical and Computer Engineering majors. Our focus is giving students a chance to interact with their peers and faculty while developing professional
        skills for the future. Those with memberships to the national organization earn many benefits, including access to on-line textbooks, articles and subscriptions, digital courses, and much more. If you want to know more or join the ACM visit
        <a href="http://www.acm.org/" target="_blank">www.acm.org</a>. You don't need to join the national organization to be part of the KSU Chapter. Just come to one of our meetings, or you can email any of the officers.</p>
    </div>
  </div>
</div>

<div class="rss" data-htmlfromrss="https://orgsync.com/86744/news_posts/feed"></div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ URL::asset('js/htmlfromrss.js') }}"></script>
<script>
$(document).ready(function(){
    $(".rss").htmlfromrss(
        limit = 10
    );
});
</script>
@endsection
