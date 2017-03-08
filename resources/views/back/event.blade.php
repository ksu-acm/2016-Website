@extends('layouts.back')
@section('title', 'Event')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Event</h2>
    </div>
    @if (count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        <strong>Error!</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
          @endforeach
        </ul>
      </div>
     @endif

    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        <strong>Success!</strong>{!! Session::get('success') !!}
      </div>
     @endif
  </div>

  <hr class="m-t">
  <?php $id = Request::segment(2); if($id == null){$id = 0;} ?>
  <form method="POST" action="{!! url('/apps/event/'.$id) !!}">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="form-group">
      <label for="eventName">Event Name</label>
      <input type="text" class="form-control" id="eventName" name="eventName" placeholder="@if($event != ""){!! $event->eventName !!}@endif" value="@if($event != ""){!! $event->eventName !!}@endif" required>
    </div>
    <div class="form-group">
      <label for="eventDate">Event Date</label>
      <input type="text" class="form-control" id="eventDate" name="eventDate" placeholder="@if($event != ""){!! $event->eventDate !!}@endif" value="@if($event != ""){!! $event->eventDate !!}@endif" required>
    </div>
    <div class="form-group form-half">
      <label for="attendees">Number of Attendees</label>
      <input type="number" class="form-control" id="attendees" name="attendees" min="0" placeholder="@if($event != ""){!! $event->attendees !!}@endif" value="@if($event != ""){!! $event->attendees !!}@endif" required>
    </div>
    <div class="form-group form-half">
      <label for="cheeseOrdered">Cheese Ordered</label>
      <input type="number" class="form-control" id="cheeseOrdered" name="cheeseOrdered" min="0" placeholder="@if($event != ""){!! $event->cheeseOrdered !!}@endif" value="@if($event != ""){!! $event->cheeseOrdered !!}@endif" required>
    </div>
    <div class="form-group form-half">
      <label for="pepperoniOrdered">Pepperoni Ordred</label>
      <input type="number" class="form-control" id="pepperoniOrdered" name="pepperoniOrdered" min="0" placeholder="@if($event != ""){!! $event->pepperoniOrdered !!}@endif" value="@if($event != ""){!! $event->pepperoniOrdered !!}@endif" required>
    </div>
    <div class="form-group form-half">
      <label for="sausageOrdered">Sausage Ordered</label>
      <input type="number" class="form-control" id="sausageOrdered" name="sausageOrdered" min="0" placeholder="@if($event != ""){!! $event->sausageOrdered !!}@endif" value="@if($event != ""){!! $event->sausageOrdered !!}@endif" required>
    </div>
    <div class="form-group form-half">
      <label for="veggieOrdered">Other Pizzas Ordered</label>
      <input type="number" class="form-control" id="otherOrdered" name="otherOrdered" min="0" placeholder="@if($event != ""){!! $event->otherOrdered !!}@endif" value="@if($event != ""){!! $event->otherOrdered !!}@endif" required>
    </div>
    <div class="form-group form-half">
      <label for="leftoverSlices">Leftover Slices</label>
      <input type="number" class="form-control" id="leftoverSlices" name="leftoverSlices" min="0" placeholder="@if($event != ""){!! $event->leftoverSlices !!}@endif" value="@if($event != ""){!! $event->leftoverSlices !!}@endif" required>
    </div>
    <div class="form-group">
      <label for="notes">Event Notes</label>
      <textarea class="form-control" id="notes" name="notes" value="">@if($event != ""){!! $event->notes !!}@endif</textarea>
    </div>
    <button type="submit" class="btn btn-default">@if($event != "") Update Event @else Add Event @endif</button>
  </form>
  @if($event != "")
    <form method="POST" action="{!! url('/apps/delete/event/'.$id) !!}">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <button type="submit" class="btn btn-danger delete" onclick="return confirm('Are you sure you want to delete @if($event != ""){!! $event->eventName !!}@endif ?');">Delete Event</button>
    </form>
   @endif
@endsection

@section('footer')
<script>
  $(document).ready(function() {
    $("#eventDate").datepicker();
  });
</script>
@endsection
