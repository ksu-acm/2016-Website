<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
  public function Events()
  {
    $events = \DB::table('events')
    ->where('startTime'  ,'<=', Carbon::now('America/Chicago')->addHour())
    ->orderBy('startTime', 'desc')->get();
    return view('back/attendance', compact('events'));
  }

  public function CardSwiper()
  {
    $users = \DB::table('users')->get();

    return view('back/cardSwiper', compact('users'));
  }

  public function Swipe()
  {

    return view('back/cardSwiper');
  }

  public function Analytics()
  {
    $users = \DB::table('users')->orderBy('events_attended', 'desc')->get();
    $total_events = \DB::table('events')->where('startTime'  ,'<=', Carbon::now('America/Chicago'))->count();

    $rank_array = array();
    foreach($users as $user) {
      array_push($rank_array, $user->events_attended);
    }
    $ranks = array(1);
      for ($i = 1; $i < count($rank_array); $i++)
      {
        if ($rank_array[$i] != $rank_array[$i-1])
          $ranks[$i] = $i + 1;
        else
          $ranks[$i] = $ranks[$i-1];
      }
    return view('back/attendanceAnalytics', compact('users', 'ranks', 'total_events'));
  }

  public function ShowEvent($EventID = null)
  {
    $event = \DB::table('events')->where('EventID', $EventID)->first();

    if ($EventID != null){
      $events = \DB::table('events')->get();
      $users = \DB::table('users')->get();

      $attendance = \DB::table('attendance')
      ->where('attended', '1')
      ->where('EventID', $EventID)
      ->get();

      //users that attended the event
      $attendedUsers = array();

      foreach($attendance as $user) {
        array_push($attendedUsers, $user->eid);
      }

      return view('back/officerEvent', compact('events', 'event', 'users', 'attendedUsers'));
    }
    return redirect()->action('EventController@Events')->withErrors('Event not found.');
  }

  public function DeleteEvent($eventID) {

    if (Auth::user()->admin == 1 || Auth::user()->advisor == 1){

      \DB::table('events')->where('eventID', $eventID)->delete();
      $users = \DB::table('attendance')->where('eventID', $eventID)->where('attended', 1)->get();

      foreach($users as $user) {
        \DB::table('users')->where('eid', $user->eid)->decrement('events_attended');
      }
      return redirect()->action('EventController@Events')->with('success', 'The event has been deleted!');
    }
    return $this->Error();
  }

  public function EditEvent(Request $request, $EventID = null)
  {
    if(Auth::user()->admin != 1){
      return $this->Error();
    }

    $users = \DB::table('users')->get();
    $attendance = \DB::table('attendance')->get();

    foreach($users as $user) {
      $eid = $user->eid;
      if($request->input($eid)){
        //user attended event
        if (\DB::table('attendance')->where('eid', $eid)->where('eventID', $EventID)->first()) {
           // user found, update it
           if(\DB::table('attendance')->where('eid', $eid)->where('eventID', $EventID)->where('attended', '==', '0')->first()) {
             \DB::table('users')
             ->where('eid', $eid)
             ->increment('events_attended', 1);
           }
           \DB::table('attendance')
            ->where('eid', $eid)
            ->where('eventID', $EventID)
            ->update(['attended' => 1]);


        } else {
          //user not found, make new row
          \DB::insert('insert into attendance (eid, eventID, attended) values (?, ?, ?)', [$eid, $EventID, '1']);

          \DB::table('users')
          ->where('eid', $eid)
          ->increment('events_attended', 1);
        }
      } else {
        //user did not attend event
        if (\DB::table('attendance')->where('eid', $eid)->where('eventID', $EventID)->first()) {

           // user found, update it
           \DB::table('attendance')
            ->where('eid', $eid)
            ->where('eventID', $EventID)
            ->update(['attended' => 0]);

              $count = \DB::table('attendance')->where('eid', $eid)->where('attended', 1)->count();
              \DB::table('users')
              ->where('eid', $eid)
              ->update(['events_attended' => $count]);

        } else {
          //user not found, make new row
          \DB::insert('insert into attendance (eid, eventID, attended) values (?, ?, ?)', [$eid, $EventID, '0']);
        }
      }
    }
    return redirect()->action('EventController@ShowEvent')->with('success', 'Your attendance has been updated!');
  }
}
