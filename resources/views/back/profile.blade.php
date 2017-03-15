@extends('layouts.back')
@section('title', 'Profile')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">My Profile</h6>
      <h2 class="dashhead-title">{{ $user->first }} {{ $user->last }}</h2>
      <div class="rbutton">
        <a href="#" class="btn btn-info" data-easein="slideUpIn" data-toggle="modal" data-target="#sync">Sync Student ID</a>
      </form>
    </div>
    @include('subviews/message')
  </div>
  <hr class="m-t">
  <form method="POST" action="{{ url('/apps/profile/'.$user->eid) }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group form-half">
      <label for="first">First Name</label>
      <input type="text" class="form-control" id="first" name="first" placeholder="{{ $user->first }}" value="{{ $user->first }}" required>
    </div>
    <div class="form-group form-half">
      <label for="last">Last Name</label>
      <input type="text" class="form-control" id="last" name="last" placeholder="{{ $user->last }}" value="{{ $user->last }}" required>
    </div>
    <div class="form-group form-half">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="{{ $user->email }}" value="{{ $user->email }}" required>
    </div>
    <div class="form-group form-half">
      <label for="title">Title</label>
      <input type="title" class="form-control" id="title" name="title" placeholder="{{ $user->title }}" value="{{ $user->title }}">
    </div>
    <div class="form-group">
      <label for="bio">Bio</label>
      <textarea class="form-control" id="bio" name="bio" value="">{{ $user->bio }}</textarea>
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
        @if(Auth::user()->hasRole('Administrator'))
        <ul class="no-bullets">
          @foreach($roles as $role)
            <li><input type="checkbox" name="role_{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}> {{ $role->name }}</li>
          @endforeach
        </ul>
        @else
        <ul class="no-bullets">
          @foreach($roles as $role)
            <li>{{ $user->hasRole($role->name) ? $role->name : '' }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <button type="submit" class="btn btn-default">Update Profile</button>
    </form>
  </div>
  <div class="modal fade" id="sync">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sync Student ID</h4>
      </div>
      <form method="POST" action="{{ url('/apps/profile/'.$user->eid.'/id') }}">
      <div class="modal-body">
        <p>Swipe your card or enter your card number.</p>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="iso">Card ISO: </label>
            <input type="text" class="form-control" id="iso" name="iso" placeholder="{{ $user->iso }}" autofocus required>
          </div>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn-link modal-action" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn-link modal-action"><strong>Continue</strong></button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection

@section('footer')
<script>
$("#reset").click(function() {
  $("#iso").value = '';
});
</script>
@endsection
