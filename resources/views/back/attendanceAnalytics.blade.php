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
    <h3 class="hr-divider-content hr-divider-heading">Attendance</h3>
  </div>

  <div class="row statcards">
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-success">
        <div class="p-a">
          <span class="statcard-desc"><?php if($users[0]->events_attended == $users[1]->events_attended){echo '1st Place (Tied)';} else { echo '1st Place';}?></span>
          <h4 class="statcard-number">{{$users[0]->firstname}} {{$users[0]->lastname}}</h4>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-info">
        <div class="p-a">
          <span class="statcard-desc"><?php if($users[1]->events_attended == $users[0]->events_attended){echo '1st Place (Tied)';} else if($users[1]->events_attended == $users[2]->events_attended) {echo '2nd Place (Tied)';} else {echo '2nd Place';}?></span>
          <h4 class="statcard-number">{{$users[1]->firstname}} {{$users[1]->lastname}}</h4>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-warning">
        <div class="p-a">
          <span class="statcard-desc"><?php if($users[2]->events_attended == $users[0]->events_attended){echo '1st Place (Tied)';} else if($users[2]->events_attended == $users[1]->events_attended){echo '2nd Place (Tied)';} else {echo '3rd Place';}?></span>
          <h4 class="statcard-number">{{$users[2]->firstname}} {{$users[2]->lastname}}</h4>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-danger">
        <div class="p-a">
          <span class="statcard-desc">Last Place</span>
          <h4 class="statcard-number">{{$users[sizeof($users)-1]->firstname}} {{$users[sizeof($users)-1]->lastname}}</h4>
        </div>
      </div>
    </div>
  </div>

  <div class="flextable table-actions">
    <div class="flextable-item flextable-primary">
      <div class="btn-toolbar-item input-with-icon">
        <input type="text" class="form-control input-block" id="filter" placeholder="Search members">
        <span class="icon icon-magnifying-glass"></span>
      </div>
    </div>
  <div class="table-full">
    <div class="table-responsive">
      <table class="table" data-sort="table">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Name</th>
            <th><div class="text-center">Percentage</div></th>
            <th><div class="text-center">Total Events</div></th>
          </tr>
        </thead>
        <tbody class="searchable">
          @foreach($users as $key => $user)
          <tr>
            <td>{{$ranks[$key]}}</td>
            <td>
                <a href="{{ url('profile/'.$user->eid) }}">{{ $user->firstname}} {{$user->lastname }}</a>
            </td>

            <td>
              <div class="text-center">
                <?php if($user->events_attended > 0 && $total_events > 0 ){ echo (round($user->events_attended / $total_events, 2) * 100);} else { echo 0;}?>%</div></td>

            <td><div class="text-center">{{$user->events_attended}}</div></td>
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
