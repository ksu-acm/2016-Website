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

@if (Request::is('apps/profile'))
@if(Auth::user() != $user && Auth::user()->hasRole('Administrator'))
<div class="alert alert-info" role="alert">
  <p>Currently editing {{ $user->first }} {{ $user->last }}.</p>
</div>
@endif
@endif
