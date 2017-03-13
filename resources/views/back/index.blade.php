@extends('layouts.back')
@section('title', 'Dashboard')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Overview</h2>
    </div>
    @include('subviews/message')
  </div>
</div>
@endsection
