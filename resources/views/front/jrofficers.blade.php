@extends('layouts.front')
@section('title', 'Junior Officers')

@section('content')
<div class="container">
  <div class="section">
    <div class="row">
      <h1 class="header center grey-text text-darken-3">ACM Junior Officers</h1>
    </div>
    <div class="row">
      <div class="col s12 m9 l10">
      @foreach($jrofficers as $jrofficer)
        <div class="card hoverable section scrollspy" id="jrofficer{{ $jrofficer->id }}">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m12 l3">
                <img src="{{ URL::asset('img/default.png') }}" alt="" class="circle responsive-img">
              </div>
              <div class="col s12 m12 l9">
                <span class="card-title black-text">{{ $jrofficer->firstname }} {{ $jrofficer->lastname }}</span>
                <br />
                <p>{{ $jrofficer->bio }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col hide-on-small-only m3 l2">
        <ul class="section table-of-contents">
          @foreach($jrofficers as $jrofficer)
          <li><a href="#jrofficer{{ $jrofficer->id }}">{{ $jrofficer->firstname }} {{ $jrofficer->lastname }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
