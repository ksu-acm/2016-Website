@extends('layouts.front')
@section('title', 'Officers')

@section('head')
<link href="{{ URL::asset('css/officers.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />

@endsection
@section('content')



<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="brand-hover navbar-brand page-scroll" href="{{ url('/') }}">K-State ACM</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav-hover nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#officers">Officers</a>
                </li>
                <li>
                    <a class="page-scroll" href="#jofficers">Junior Officers</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/apps') }}">Dashboard</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1 id="homeHeading">K-State ACM Officers<br> and Junior Officers</h1>
            <hr class="purple-hr">
            <p>The Association for Computing Machinery is the professional organization for computer scientists. We strive to bring the computer science
                community closer by hosting a variety of events as well as getting involved in the community.</p>
                <a href="#officers" class="btn-purple btn-hover btn btn-primary btn-xl page-scroll">Meet Us</a>
            </div>
        </div>
    </header>

    <section id="officers">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Officers</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($officers as $officer)

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="thumbnail">
                        @if($officer->picture == "")
                          <a href="#" data-toggle="modal" data-target="#modal-{{$officer->id}}"><img src="{{ URL::asset('img/default.png') }}" alt="" class="img-rounded"></a>
                        @else
                          <a href="#" data-toggle="modal" data-target="#modal-{{$officer->id}}"><img src="{{ url('/storage/img/'.$officer->picture) }}" alt="" class="img-rounded img-responsive"></a>
                        @endif
                        <div class="caption">
                            <h3>{{ $officer->firstname }} {{ $officer->lastname }}</h3>
                            <p>@if($officer->advisor == 1) Advisor @else {{ $officer->title }} @endif</p>
                        </div>
                    </div>
                </div>
                <div id="modal-{{$officer->id }}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="text-center">
                                    @if($officer->picture == "")
                                      <img src="{{ URL::asset('img/default.png') }}" alt="" class="img-rounded">
                                    @else
                                      <img src="{{ url('/storage/img/'.$officer->picture) }}" alt="" class="img-rounded img-responsive">
                                    @endif
                                    <h3 class="modal-title">{{ $officer->firstname }} {{ $officer->lastname }}</h4>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $officer->bio }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section id="jofficers">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Junior Officers</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach($officers as $officer)
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="thumbnail">
                            @if($officer->picture == "")
                              <a href="#" data-toggle="modal" data-target="#modal-{{$officer->id}}"><img src="{{ URL::asset('img/default.png') }}" alt="" class="img-rounded"></a>
                            @else
                              <a href="#" data-toggle="modal" data-target="#modal-{{$officer->id}}"><img src="{{ url('/storage/img/'.$officer->picture) }}" alt="" class="img-rounded img-responsive"></a>
                            @endif
                            <div class="caption">
                                <h3>{{ $officer->firstname }} {{ $officer->lastname }}</h3>
                                <p>@if($officer->advisor == 1) Advisor @else {{ $officer->title }} @endif</p>
                            </div>
                        </div>
                    </div>
                    <div id="modal-{{$officer->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="text-center">
                                        @if($officer->picture == "")
                                          <img src="{{ URL::asset('img/default.png') }}" alt="" class="img-rounded">
                                        @else
                                          <img src="{{ url('/storage/img/'.$officer->picture) }}" alt="" class="img-rounded img-responsive">
                                        @endif
                                        <h3 class="modal-title">{{ $officer->firstname }} {{ $officer->lastname }}</h4>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ $officer->bio }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>


        @endsection
