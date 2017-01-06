@extends('layouts.back')
@section('title', 'Order Food')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Order Food</h2>
    </div>
  </div>

  <hr class="m-t">

  <form method="POST" action="{{ url('/order') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="" required>
    </div>

    <button type="submit" class="btn btn-default">Order</button>
  </form>
@endsection
