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
        <div class="card hoverable section scrollspy" id="officer">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m12 l3">
                <img src="{{ URL::asset('img/default.png') }}" alt="" class="circle responsive-img">
              </div>
              <div class="col s12 m12 l9">
                <span class="card-title black-text">Officer | President</span>
                <br />
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col hide-on-small-only m3 l2">
        <ul class="section table-of-contents">
          <li><a href="#officer">Officer</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
