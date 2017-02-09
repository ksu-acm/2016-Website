@extends('layouts.front')
@section('title', 'Home')

@section('content')

<div class="container">
  <div class="section">
    <div class="row">
      <h1 class="header center grey-text text-darken-3">ACM Sponsors</h1>
    </div>
    <div class="row">
      <div class="col s12 m9 l10">
        @foreach($sponsors as $sponsor)
        <div class="card hoverable section scrollspy" id="sponsor{{ $sponsor->id }}">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m12 l3">
                @if($sponsor->picture == "")
                  <img src="{{ URL::asset('img/default.png') }}" alt="" class="circle responsive-img">
                @else
                  <img src="{{ url('/storage/img/'.$sponsor->picture) }}" alt="" class="circle responsive-img">
                @endif
              </div>
              <div class="col s12 m12 l9">
                <span class="card-title black-text">{{ $sponsor->name }}</span>
                <br />
                <p>{{ $sponsor->bio }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col hide-on-small-only m3 l2">
        <ul class="section table-of-contents">
          @foreach($sponsors as $sponsor)
          <li><a href="#sponsor{{ $sponsor->id }}">{{ $sponsor->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection
