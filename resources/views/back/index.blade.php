@extends('layouts.back')
@section('title', 'Dashboard')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Overview</h2>
    </div>

    <div class="btn-toolbar dashhead-toolbar">
      <div class="btn-toolbar-item input-with-icon">
        <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
        <span class="icon icon-calendar"></span>
      </div>
    </div>
  </div>

  <hr class="m-t">

  <div class="row text-center m-t-lg">
    <div class="col-sm-4 m-b-md">
      <div class="w-lg m-x-auto">
        <canvas class="ex-graph" width="200" height="200" data-chart="doughnut" data-value="[{ value: 5, color: '#1ca8dd', label: 'General Meetings' }, { value: 2, color: '#1bc98e', label: 'LAN Parties' }]" data-segment-stroke-color="#252830"></canvas>
      </div>
      <strong class="text-muted">Events</strong>
      <h3>General Meetings vs LAN Parties</h3>
    </div>
    <div class="col-sm-4 m-b-md">
      <div class="w-lg m-x-auto">
        <canvas class="ex-graph" width="200" height="200" data-chart="doughnut" data-value="[{ value: 900, color: '#1ca8dd', label: 'Pizza' }, { value: 100, color: '#1bc98e', label: 'Sandwiches' }, { value: 0, color: '#FF5924', label: 'Pasta' }]" data-segment-stroke-color="#252830"></canvas>
      </div>
      <strong class="text-muted">Food</strong>
      <h3>Pizza vs Sandwiches vs Pasta</h3>
    </div>
    <div class="col-sm-4 m-b-md">
      <div class="w-lg m-x-auto">
        <canvas class="ex-graph" width="200" height="200" data-chart="doughnut" data-value="[{ value: 80, color: '#1ca8dd', label: 'General Meetings' }, { value: 30, color: '#1bc98e', label: 'Tech Talks' }]" data-segment-stroke-color="#252830"></canvas>
      </div>
      <strong class="text-muted">Attendance</strong>
      <h3>General Meetings vs Tech Talks</h3>
    </div>
  </div>

  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Food Stats</h3>
  </div>

  <div class="row statcards">
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-success">
        <div class="p-a">
          <span class="statcard-desc">Pizza</span>
          <h2 class="statcard-number">900<small class="delta-indicator delta-positive">90%</small></h2>
          <hr class="statcard-hr m-b-0">
        </div>
        <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[28,68,41,43,96,45,100]}]" data-labels="['a','b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-danger">
        <div class="p-a">
          <span class="statcard-desc">Sandwiches</span>
          <h2 class="statcard-number">100<small class="delta-indicator delta-negative">10%</small></h2>
          <hr class="statcard-hr m-b-0">
        </div>
        <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[4,34,64,27,96,50,80]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-info">
        <div class="p-a">
          <span class="statcard-desc">Pasta</span>
          <h2 class="statcard-number">0<small class="delta-indicator delta-negative">0%</small></h2>
          <hr class="statcard-hr m-b-0">
        </div>
        <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0]}]" data-labels="['a']" style="width: 189px; height: 47px;"></canvas>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 m-b">
      <div class="statcard statcard-warning">
        <div class="p-a">
          <span class="statcard-desc">Salad</span>
          <h2 class="statcard-number">0<small class="delta-indicator delta-negative">0%</small></h2>
          <hr class="statcard-hr m-b-0">
        </div>
        <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0]}]" data-labels="['a']" style="width: 189px; height: 47px;"></canvas>
      </div>
    </div>
  </div>
</div>

<div id="docsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Example modal</h4>
      </div>
    <div class="modal-body">
      <p>You're looking at an example modal in the dashboard theme.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
    </div>
  </div>
</div>
@endsection
