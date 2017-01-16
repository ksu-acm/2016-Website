@extends('layouts.back')
@section('title', 'Adminstration')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Administration</h2>
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
          <th>First Name</th>
          <th>Last Name</th>
          <th>Jr. Officer</th>
          <th>Officer</th>
          <th>Advisor</th>
        </tr>
      </thead>
      <tbody class="searchable">
        @foreach($users as $user)
        <tr>
          <td><a href="{{ url('/profile/'.$user->eid) }}">{{ $user->eid }}</a></td>
          <td>{{ $user->firstname }}</td>
          <td>{{ $user->lastname }}</td>
          <td>@if($user->jofficer == 1)True @else False @endif</td>
          <td>@if($user->officer == 1)True @else False @endif</td>
          <td>@if($user->advisor == 1)True @else False @endif</td>
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
