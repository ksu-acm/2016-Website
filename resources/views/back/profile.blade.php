@extends('layouts.back')
@section('title', 'My Profile')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">My Profile</h6>
      <h2 class="dashhead-title">My Profile</h2>
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

  <hr class="m-t">

  <form method="POST" action="{{ url('/profile') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="{!! $user->firstname !!}" value="{!! $user->firstname !!}" required>
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="{!! $user->lastname !!}" value="{!! $user->lastname !!}" required>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="{!! $user->email !!}" value="{!! $user->email !!}" required>
    </div>
    <button type="submit" class="btn btn-default">Update Profile</button>
  </form>
</div>
@endsection
