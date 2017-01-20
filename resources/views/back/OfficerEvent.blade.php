@extends('layouts.back')
@section('title', 'Event Attendance')
@section('content')

<div class="col-sm-9 content">
   <div class="dashhead">
      <div class="dashhead-titles">
         <h6 class="dashhead-subtitle">Officer Attendance</h6>
         <h2 class="dashhead-title">{{$event->EventName}} on {{ date("F j, Y", strtotime($event->StartTime))}}</h2>
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
   <div class="flextable table-actions">
      <div class="flextable-item flextable-primary">
         <div class="btn-toolbar-item input-with-icon">
            <input type="text" class="form-control input-block" id="filter" placeholder="Search Officers">
            <span class="icon icon-magnifying-glass"></span>
         </div>
      </div>
   </div>
<form method="POST" action="{{ url('/attendance/'.$event->EventID) }}">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <div class="table-full">
      <div class="table-responsive">
         <table class="table" data-sort="table">
            <thead>
               <tr>
                  <th>Name</th>
                  <th class="text-center">Attended?</th>
                  <th class="text-center">Excused</th>
               </tr>
            </thead>
            <tbody class="searchable">
               @foreach($users as $user)
               <tr>
                  <td><a href="{{ url('/profile/'.$user->eid) }}">{{ $user->firstname }} {{$user->lastname}}</a></td>
                  <td>
                     <div class="row">
                       <div class="text-center">
                      <input class="test" type="checkbox" <?php if(in_array($user->eid, $attendedUsers) == true){echo "checked";}?>
                      data-toggle="toggle" data-on="Yes" data-off="No" data-size="small"
                      data-onstyle="success" data-style="slow" id ={{$user->eid}} name={{$user->eid}} />
                     </div>
                   </div>
                  </td>
                  <td>
                    <div class="text-center">
                    <label class="checkbox-inline" for="Checkboxes_Excused">
                     <input type="checkbox" name="Checkboxes" id="Checkboxes_Excused" value="Excused?">
                     </label>
                   </div>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
 <button type="submit" class="btn btn-default">Update Attendance</button>
</form>
</div>
@endsection
@section('footer')
<script>
   $(document).ready(function () {
       (function ($) {
           $('#filter').keyup(function () {
               var rex = new RegExp($(this).val(), 'i');
               $('.searchable tr').hide();
               $('.searchable tr').filter(function () {
                   return rex.test($(this).text());
               }).show();
           })
       }(jQuery));
   });

</script>
@endsection
