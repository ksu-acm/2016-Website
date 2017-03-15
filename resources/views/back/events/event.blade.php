@extends('layouts.back')
@section('title', 'Event')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">{{ $event!=null ? 'Update ' : 'Add ' }}Event</h2>
      @if($event != null)
        <form method="POST" action="{{ url('/apps/event/'.$event->id.'/delete') }}" class="rbutton">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <a href="{{ url('/apps/event/'.$event->id.'/participation') }}" class="btn btn-info participation">Participation</a>
          <button type="submit" class="btn btn-danger rbutton" onclick="return confirm('Are you sure you want to delete {{ $event!=null ? $event->name : '' }}?');">Delete Event</button>
        </form>
       @endif
    </div>
    @include('subviews/message')
  </div>

  <hr class="m-t">
  <?php if($event!=null){$id=$event->id;} else {$id="";}?>
  <form method="POST" action="{{ url('/apps/event/'.$id) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="name">Event Name*</label>
      <input type="text" class="form-control" name="name" value="{{ $event!=null ? $event->name : old('name') }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="event_date">Event Date*</label>
      <input type="text" class="form-control" name="event_date" value="{{ $event!=null ? $event->event_date : old('event_date') }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="attendees">Attendees*</label>
      <input type="number" class="form-control" name="attendees" min="0" value="{{ $event!=null ? $event->attendees : old('attendees') }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="pizza_ordered">Pizza Ordered*</label>
      <input type="number" class="form-control" name="pizza_ordered" min="0" value="{{ $event!=null ? $event->pizza_ordered : old('pizza_ordered') }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="leftover_slices">Leftover Slices*</label>
      <input type="number" class="form-control" name="leftover_slices" min="0" value="{{ $event!=null ? $event->leftover_slices : old('leftover_slices') }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="sandwiches_ordered">Sandwiches Ordered*</label>
      <input type="number" class="form-control" name="sandwiches_ordered" min="0" value="{{ $event!=null ? $event->sandwiches_ordered : old('sandwiches_ordered') }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="leftover_sandwiches">Leftover Sandwiches*</label>
      <input type="number" class="form-control" name="leftover_sandwiches" min="0" value="{{ $event!=null ? $event->leftover_sandwiches : old('leftover_sandwiches') }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="food_cost">Food Cost*</label>
      <input type="number" class="form-control" name="food_cost" min="0" step="0.01" value="{{ $event!=null ? $event->food_cost : old('food_cost') }}" required>
    </div>
    <div class="form-group form-half-odd">
      <label for="sponsors">Event Sponsors</label>
      <input type="text" class="form-control" name="sponsors" value="{{ $event!=null ? $event->sponsors : old('sponsors') }}">
    </div>
    <div class="form-group form-half-odd">
      <label for="total_donation">Total Donations*</label>
      <input type="number" class="form-control" name="total_donation" min="0" step="0.01" value="{{ $event!=null ? $event->total_donation : old('total_donation') }}" required>
    </div>
    <div class="form-group">
      <label for="notes">Event Notes</label>
      <textarea class="form-control" id="notes" name="notes" value="">{{ $event!=null ? $event->notes : old('notes') }}</textarea>
    </div>
    <button type="submit" class="btn btn-default">{{ $event!=null ? 'Update Event' : 'Create Event' }}</button>
  </form>
@endsection

@section('footer')
<script type="text/javascript">
$(function() {
    $('input[name="event_date"]').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });
});
</script>
@endsection
