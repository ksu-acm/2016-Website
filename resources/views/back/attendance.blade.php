@extends('layouts.back')
@section('title', 'Attendance')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Attendance</h6>
      <h2 class="dashhead-title">Select Event</h2>
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
    <h3 class="hr-divider-content hr-divider-heading">Events</h3>
  </div>

  <div class="flextable table-actions">
  <div class="flextable-item flextable-primary">
    <div class="btn-toolbar-item input-with-icon">
      <input type="text" class="form-control input-block" id="filter" placeholder="Search Events">
      <span class="icon icon-magnifying-glass"></span>
    </div>
  </div>
</div>
  <div class="table-full">
    <div class="table-responsive">
      <table class="table" data-sort="events">
        <thead>
          <tr>
            <th>Event Name</th>
            <th>Event Category</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Delete Event</th>
          </tr>
        </thead>
        <tbody class="searchable">
          @foreach($events as $event)
          <tr>
            <td><a href="{{ url('/attendance/'.$event->EventID) }}">{{ $event->EventName }}</a></td>
            <td>{{ $event->EventCategory }}</td>
            <td>{{ date("F j, Y", strtotime($event->StartTime))}}</td>
            <td>{{ date("g:i a", strtotime($event->StartTime)) }}</td>
            <td>{{ date("g:i a", strtotime($event->EndTime)) }}</td>
            <form method="POST" action="{{ url('delete/attendance/'.$event->EventID) }}">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td><button type="submit" class="btn btn-danger btn-sm" id="{{ $event->EventID }}" onclick="return confirm('Are you sure you want to delete @if($event != ""){!! $event->EventName !!}@endif ?');">Delete Event</button></td>
            </form>
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
