@extends('layouts.front')
@section('title', 'Officers')

@section('content')
<div class="container">
  <div class="section">
    <div class="row">
      <h1 class="header center grey-text text-darken-3">ACM Officers</h1>
    </div>
    <div class="row">
      <div class="col s12 m9 l10">
        @foreach($officers as $officer)
        <div class="card hoverable section scrollspy" id="officer{{ $officer->id }}">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m12 l3">
                @if($officer->picture == "")
                  <img src="{{ URL::asset('img/default.png') }}" alt="" class="circle responsive-img">
                @else
                  <img src="{{ url('/storage/img/'.$officer->picture) }}" alt="" class="circle responsive-img">
                @endif
              </div>
              <div class="col s12 m12 l9">
                <span class="card-title black-text">{{ $officer->firstname }} {{ $officer->lastname }} | @if($officer->advisor == 1) Advisor @else {{ $officer->title }} @endif</span>
                <br />
                <p>{{ $officer->bio }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col hide-on-small-only m3 l2">
        <ul class="section table-of-contents">
          @foreach($officers as $officer)
          <li><a href="#officer{{ $officer->id }}">{{ $officer->firstname }} {{ $officer->lastname }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
