@extends('layouts.back')
@section('title', 'Order Food')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Order Food</h2>
    </div>
    @include('subviews/message')
    <hr class="m-t">
    <form method="POST" action="{{ url('/apps/order') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group form-half">
        <label for="attendees">Expected Attendance</label>
        <input type="number" class="form-control" id="attendees" name="attendees" min="0" placeholder="" value="" required>
      </div>
      <button type="submit" class="btn btn-default">Order &#127829;</button>
    </form>
  </div>
</div>
@endsection
