@extends('layouts.back')
@section('title', 'Profile')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">My Profile</h6>
      <h2 class="dashhead-title">{{ $user->firstname }} {{ $user->lastname }}</h2>
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
    @if($user->id != Auth::user()->id)
      <div class="alert alert-info" role="alert">
        Editing profile for {{ $user->firstname }} {{ $user->lastname }}.
      </div>
    @endif
    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {{ Session::get('success') }}
      </div>
    @endif
  </div>
  <hr class="m-t">
  <form method="POST" action="{{ url('/apps/profile/'.$user->eid) }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="{!! $user->firstname !!}" value="{!! $user->firstname !!}" required>
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="{!! $user->lastname !!}" value="{!! $user->lastname !!}" required>
    </div>
    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="{!! $user->email !!}" value="{!! $user->email !!}" required>
    </div>
    @if($user->officer == 1)
    <div class="form-group">
      <label for="title">Officer Title</label>
      <input type="title" class="form-control" id="title" name="title" placeholder="{!! $user->title !!}" value="{!! $user->title !!}" required>
    </div>
    @endif
    <div class="form-group">
      <label for="bio">Bio</label>
      <textarea class="form-control" id="bio" name="bio" value=""><?= $user->bio ?></textarea>
    </div>
    <div class="form-group form-half">
      <label for="picture">Profile Picture</label>
      <input type="file" name="picture" id="picture">
      <p>Max File Size: 2MB<br />
        Your image will be resized to 200 x 200 pixels.</p>
      @if($user->picture != "")
        <img src="{{ url('/storage/img/'.$user->picture) }}" />
      @endif
    </div>
    <div class="form-group form-half permissions">
      <label>Permissions</label>
      @if(Auth::user()->admin == 1)
      <ul class="no-bullets">
        <li><input type="checkbox" name="jrofficer" <?php if($user->jofficer == true){echo "checked";}?>></input></input></input>Junior Officer</li>
        <li><input type="checkbox" name="officer" <?php if($user->officer == true){echo "checked";}?>></input>Officer</li>
        <li><input type="checkbox" name="advisor" <?php if($user->advisor == true){echo "checked";}?>></input>Advisor</li>
        <li><input type="checkbox" name="admin" <?php if($user->admin == true){echo "checked";}?>></input>Administrator</li>
      </ul>
      @else
      <ul>
        @if($user->jofficer == 1)
        <li>Junior Officer</li>
        @endif
        @if($user->officer == 1)
        <li>Officer</li>
        @endif
        @if($user->advisor == 1)
        <li>Advisor</li>
        @endif
        @if($user->admin == 1)
        <li>Administrator</li>
        @endif
      </ul>
      @endif
    </div>
    <button type="submit" class="btn btn-default">Update Profile</button>
  </form>
</div>
@endsection
