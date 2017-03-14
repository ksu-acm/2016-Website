@extends('layouts.back')
@section('title', 'Event')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Event</h2>
    </div>
    @include('subviews/message')
  </div>

  <hr class="m-t">
  {{ $event!=null ? $id=$event->id : $id="" }}
  <form method="POST" action="{{ url('/apps/event/'.$id) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="name">Event Name*</label>
      <input type="text" class="form-control" name="name" value="{{ $event!=null ? '$event->name' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="start_time">Start Time*</label>
      <input type="text" class="form-control" id="start_time" name="start_time" value="{{ $event!=null ? '$event->start_time' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="end_time">End Time*</label>
      <input type="text" class="form-control" id="end_time" name="end_time" value="{{ $event!=null ? '$event->end_time' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="attendees">Attendees*</label>
      <input type="number" class="form-control" name="attendees" min="0" value="{{ $event!=null ? '$event->attendees' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="pizza_ordered">Pizza Ordered*</label>
      <input type="number" class="form-control" name="pizza_ordered" min="0" value="{{ $event!=null ? '$event->pizza_ordered' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="leftover_slices">Leftover Slices*</label>
      <input type="number" class="form-control" name="leftover_slices" min="0" value="{{ $event!=null ? '$event->leftover_slices' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="sandwiches_ordered">Sandwiches Ordered*</label>
      <input type="number" class="form-control" name="sandwiches_ordered" min="0" value="{{ $event!=null ? '$event->sandwiches_ordered' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="leftover_sandwiches">Leftover Sandwiches*</label>
      <input type="number" class="form-control" name="leftover_sandwiches" min="0" value="{{ $event!=null ? '$event->leftover_sandwiches' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="food_cost">Food Cost*</label>
      <input type="number" class="form-control" name="food_cost" min="0" step="0.01" value="{{ $event!=null ? '$event->food_cost' : '' }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="sponsors">Event Sponsors</label>
      <input type="text" class="form-control" name="sponsors" value="{{ $event!=null ? '$event->sponsors' : '' }}">
    </div>
    <div class="form-group form-half-odd">
      <label for="total_donation">Total Donations*</label>
      <input type="number" class="form-control" name="total_donation" min="0" step="0.01" value="{{ $event!=null ? '$event->total_donation' : '' }}" required>
    </div>
    <div class="form-group">
      <label for="notes">Event Notes</label>
      <textarea class="form-control" id="notes" name="notes" value="">{{ $event!=null ? '$event->notes' : '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-default">{{ $event!=null ? 'Update Event' : 'Create Event' }}</button>
  </form>
  @if($event != null)
    <form method="POST" action="{{ url('/apps/delete/event/'.$event->id) }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-danger delete" onclick="return confirm('Are you sure you want to delete {{ $event!=null ? '$event->name' : '' }} ?');">Delete Event</button>
    </form>
   @endif
@endsection

@section('footer')
@endsection
