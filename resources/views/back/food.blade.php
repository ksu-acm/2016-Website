@extends('layouts.back')
@section('title', 'Food Analytics')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Food Analytics</h2>
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

  <hr class="m-t">

  <div class="row statcards">
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-success">
        <div class="p-a">
          <span class="statcard-desc">Events</span>
          <h2 class="statcard-number">{{ $totals->events }}</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-info">
        <div class="p-a">
          <span class="statcard-desc">Pizzas</span>
          <h2 class="statcard-number">{{ $totals->pizzasOrdered }}</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-warning">
        <div class="p-a">
          <span class="statcard-desc">Slices per Person</span>
          <h2 class="statcard-number">{{ ceil($totals->avgSlicesPerPerson) }}</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-danger">
        <div class="p-a">
          <span class="statcard-desc">Average Leftover</span>
          <h2 class="statcard-number">{{ ceil($totals->avgLeftoverSlices) }}</h2>
        </div>
      </div>
    </div>
  </div>

<div class="row">
  <div class="col-sm-2 col-sm-offset-5">
    <a href="{{ url('/apps/order') }}"><button class="btn btn-lg btn-primary" type="button">Order Pizza</button></a>
  </div>
  </div>

  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Events</h3>
  </div>

  <div class="flextable table-actions">
  <div class="flextable-item flextable-primary">
    <div class="btn-toolbar-item input-with-icon">
      <input type="text" class="form-control input-block" id="filter" placeholder="Search events">
      <span class="icon icon-magnifying-glass"></span>
    </div>
  </div>
  @if(Auth::check())
    @if(Auth::user()->officer == 1 || Auth::user()->advisor == 1)
    <div class="flextable-item">
      <div class="btn-group">
        <a href="{{ url('/apps/event') }}">
        <button type="button" class="btn btn-primary-outline">
          <span class="icon icon-add-to-list"></span>
        </button>
        </a>
      </div>
    </div>
    @endif
  @endif
</div>
  <div class="table-full">
  <div class="table-responsive">
    <table class="table" data-sort="pizza">
      <thead>
        <tr>
          <th>Event</th>
          <th>Date</th>
          <th>Attenance</th>
          <th>Pizzas</th>
          <th>Slices per Person</th>
          <th>Leftover Slices</th>
        </tr>
      </thead>
      <tbody class="searchable">
        @foreach($events as $event)
        <tr>
          <td>
            @if(Auth::check())
              @if(Auth::user()->officer == 1 || Auth::user()->advisor == 1)
                <a href="{{ url('/apps/event/'.$event->id) }}">{{ $event->eventName }}</a>
              @endif
            @else
            {{ $event->eventName }}
            @endif
          </td>
          <td>{{ date('m/d/y', strtotime($event->eventDate)) }}</td>
          <td>{{ $event->attendees }}</td>
          <td>{{ $event->pizzasOrdered }}</td>
          <td>{{ ceil($event->avgSlicesPerPerson) }}</td>
          <td>{{ $event->leftoverSlices }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('footer')
<script>
$(document).ready(function () {
    (function ($) {
        $('#filter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();
        })
    }(jQuery));
});
</script>
@endsection
