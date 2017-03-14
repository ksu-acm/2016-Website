@extends('layouts.back')
@section('title', 'Food Analytics')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Events</h2>
    </div>
    @include('subviews/message')
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
    <div class="flextable-item">
      <div class="btn-group">
        <a href="{{ url('/apps/event') }}">
        <button type="button" class="btn btn-primary-outline">
          <span class="icon icon-add-to-list"></span>
        </button>
        </a>
      </div>
    </div>
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
          <th>Sandwiches</th>
          <th>Profit</th>
        </tr>
      </thead>
      <tbody class="searchable">
        @foreach($events as $event)
        <tr>
          <td><a href="{{ url('/apps/event/'.$event->id) }}">{{ $event->name }}</a></td>
          <td>{{ $event->event_date }}</td>
          <td>{{ $event->attendees }}</td>
          <td>{{ $event->pizza_ordered }}</td>
          <td>{{ $event->sandwiches_ordered }}</td>
          <td>${{ round($event->total_donation - $event->food_cost, 2) }}</td>
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
