@extends('layouts.front')
@section('title', 'Sponsors')

@section('head')
<link href="{{ URL::asset('css/sponsor.css') }}" media="all" rel="stylesheet" type="text/css">

@endsection
@section('content')

<div class="container">
      <h1 class="header center grey-text text-darken-3">ACM Sponsors</h1>
    </div>

<section>
  <div class="center">
    <div class="sponsor">
      <img src="{{ URL::asset('img/sponsors/jetbrains.png') }}" alt="">
      <img src="{{ URL::asset('img/sponsors/bats.png') }}" alt="">
      <img src="{{ URL::asset('img/sponsors/tech.png') }}" alt="">
      <img src="{{ URL::asset('img/sponsors/garmin.png') }}" alt="">
  </div>
</div>
</section>

@endsection
