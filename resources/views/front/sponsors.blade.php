@extends('layouts.front')
@section('title', 'Sponsors')

@section('content')

<div class="container">
  <div class="section">
    <div class="row">
      <h1 class="header center grey-text text-darken-3">ACM Sponsors</h1>
    </div>

    <div class="row">
    @foreach($sponsors as $sponsor)
        <div class="col s4">
          <div class="card-panel hoverable">
            <div class="center promo">
              @if($sponsor->picture == "")
                <img src="{{ URL::asset('img/default.png') }}" alt="">
              @else
                <img src="{{ url('/storage/img/sponsors'.$sponsor->picture) }}" alt="">
              @endif
              <p class="promo-caption">{{ $sponsor->name }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
