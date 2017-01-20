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
          <span class="statcard-desc">Average Officers</span>
          <h2 class="statcard-number">%</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-info">
        <div class="p-a">
          <span class="statcard-desc">First Place</span>
          <h2 class="statcard-number">0</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-warning">
        <div class="p-a">
          <span class="statcard-desc">Second Place</span>
          <h2 class="statcard-number">0</h2>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-danger">
        <div class="p-a">
          <span class="statcard-desc">Last Place</span>
          <h2 class="statcard-number">0</h2>
        </div>
      </div>
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

  <div class="table-full">
  <div class="table-responsive">
    <table class="table" data-sort="attendance">
      <thead>
        <tr>
          <th>Rank</th>
          <th>Name</th>
          <th>Percentage</th>
          <th>Total Events</th>
        </tr>
      </thead>
      <tbody class="searchable">
        @foreach($users as $user)
        <tr>
          <td>0</td>
          <td>
            <a href="{{ url('profile/'.$user->eid) }}">{{ $user->firstname}} {{$user->lastname }}</a>
          </td>
          <td>0%</td>
          <td>0</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
