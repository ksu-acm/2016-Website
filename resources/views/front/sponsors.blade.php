@extends('layouts.front')
@section('title', 'Sponsors')

@section('content')

<div class="container">
  <div class="section">
    <div class="row">
      <h1 class="header center grey-text text-darken-3">ACM Sponsors</h1>
    </div>

    <div class="row">

        <div class="col s12">
            <div class="center promo">

                <img src="{{ URL::asset('img/sponsors/jetbrains.png') }}" alt="">

            </div>
        </div>

    </div>
  </div>
</div>

@endsection
