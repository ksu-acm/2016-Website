@extends('layouts.back')
@section('title', 'Adminstration')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Administration</h2>
    </div>
    @include('subviews/message')
  </div>
  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Users</h3>
  </div>

  <div class="flextable table-actions">
  <div class="flextable-item flextable-primary">
    <div class="btn-toolbar-item input-with-icon">
      <input type="text" class="form-control input-block" id="filter" placeholder="Search users">
      <span class="icon icon-magnifying-glass"></span>
    </div>
  </div>
</div>
  <div class="table-full">
  <div class="table-responsive">
    <table class="table" data-sort="table">
      <thead>
        <tr>
          <th>eID</th>
          <th>First</th>
          <th>Last</th>
          <th>User</th>
          <th>Junior Officer</th>
          <th>Officer</th>
          <th>Advisor</th>
          <th>Administrator</th>
        </tr>
      </thead>
      <tbody class="searchable">
        @foreach($users as $user)
        <tr>
          <td><a href="{{ url('/apps/profile/'.$user->eid) }}">{{ $user->eid }}</a></td>
          <td>{{ $user->first }}</td>
          <td>{{ $user->last }}</td>
          <td><input type="checkbox" disabled {{ $user->hasRole('User') ? 'checked' : '' }}></td>
          <td><input type="checkbox" disabled {{ $user->hasRole('ACM Junior Officer') ? 'checked' : '' }}></td>
          <td><input type="checkbox" disabled {{ $user->hasRole('ACM Officer') ? 'checked' : '' }}></td>
          <td><input type="checkbox" disabled {{ $user->hasRole('ACM Advisor') ? 'checked' : '' }}></td>
          <td><input type="checkbox" disabled {{ $user->hasRole('Administrator') ? 'checked' : '' }}></td>
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
