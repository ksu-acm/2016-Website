@extends('layouts.back')
@section('title', 'Dashboard')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Overview</h2>
    </div>
    @if (count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        <strong>Error!</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {{ Session::get('success') }}
      </div>
    @endif
  </div>
  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Food Analytics</h3>
  </div>
  <div class="row statcards">
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-success">
        <div class="p-a">
          <span class="statcard-desc">Events</span>
          <h2 class="statcard-number">{{ $pizzaTotals->events }}</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-info">
        <div class="p-a">
          <span class="statcard-desc">Pizzas</span>
          <h2 class="statcard-number">{{ $pizzaTotals->pizzasOrdered }}</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-warning">
        <div class="p-a">
          <span class="statcard-desc">Slices per Person</span>
          <h2 class="statcard-number">{{ ceil($pizzaTotals->avgSlicesPerPerson) }}</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-danger">
        <div class="p-a">
          <span class="statcard-desc">Average Leftover</span>
          <h2 class="statcard-number">{{ ceil($pizzaTotals->avgLeftoverSlices) }}</h2>
        </div>
      </div>
    </div>
  </div>
@endsection
