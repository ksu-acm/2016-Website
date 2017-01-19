@extends('layouts.back')
@section('title', 'Event Attendance')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Officer Attendance</h6>
      <h2 class="dashhead-title">{{$event->EventName}} on {{ date("F j, Y", strtotime($event->StartTime))}}</h2>
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
  <div class="flextable table-actions">
  <div class="flextable-item flextable-primary">
    <div class="btn-toolbar-item input-with-icon">
      <input type="text" class="form-control input-block" id="filter" placeholder="Search Officers">
      <span class="icon icon-magnifying-glass"></span>
    </div>
  </div>
</div>

  <div class="table-full">
  <div class="table-responsive">
    <table class="table" data-sort="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Attended?</th>
          <th>Excused</th>
        </tr>
      </thead>
      <tbody class="searchable">
      @foreach($users as $user)
        <tr>
          <td><a href="{{ url('/profile/'.$user->eid) }}">{{ $user->firstname }} {{$user->lastname}}</a></td>
          <td>
            <div class="row">
              <div class="col-sm-9">
                  <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default">
                          <input type="radio" id="$eid" name="quality[10]" value="Yes" /> Yes
                      </label>
                      </label>
                      <label class="btn btn-default active">
                          <input type="radio" id="$eid" name="quality[10]" checked="checked" value="No" /> No
                      </label>
                  </div>
              </div>
          </div>
        </td>
          <td><label class="checkbox-inline" for="Checkboxes_Excused">
            <input type="checkbox" name="Checkboxes" id="Checkboxes_Excused" value="Excused?">

          </label></td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
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
