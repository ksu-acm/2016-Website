@extends('layouts.back')
@section('title', 'Event')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">{{ $event->name }} Participation</h2>
        <div class="delete">
          <a href="{{ url('/apps/event/'.$event->id) }}" class="btn btn-info participation">Event Information</a>
        </div>
    </div>
    @include('subviews/message')
  </div>

  <hr class="m-t">
  <form method="POST" action="{{ url('/apps/event/'.$event->id) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="name">Event Name*</label>
      <input type="text" class="form-control" name="name" value="{{ $event!=null ? $event->name : old('name') }}" required>
    </div>
    <div class="form-group">
      <label for="notes">Event Notes</label>
      <textarea class="form-control" id="notes" name="notes" value="">{{ $event!=null ? $event->notes : old('notes') }}</textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit Participation</button>
  </form>
@endsection
