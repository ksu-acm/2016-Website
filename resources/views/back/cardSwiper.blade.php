@extends('layouts.back')
@section('title', 'Card Swiper')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Card Swiper</h6>
      <h2 class="dashhead-title">Swipe Your Card Please</h2>
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

    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {{ Session::get('success') }}
      </div>
    @endif
  </div>

  <form method="POST" action=" url('/apps/cardSwiper') ">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="table-full">
        <div class="table-responsive">
           <table class="table" data-sort="table">
              <thead>
                 <tr>
                    <th>Name</th>
                 </tr>
              </thead>
              <tbody class="searchable">

                 <tr>
                    <td><a href=""</a></td>
                    <td>
                       <div class="row">
                         <div class="text-center">

                       </div>
                     </div>
                    </td>
                 </tr>

              </tbody>
           </table>
        </div>
     </div>
   <button type="submit" class="btn btn-default">Update Attendance</button>
  </form>

</div>
@endsection
