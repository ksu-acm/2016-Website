<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
  public function Events()
  {
    $events = \DB::table('events')->get();
    return view('back/attendance', compact('events'));
  }

  public function ShowEvent($EventID = null)
  {
    $event = \DB::table('events')->where('EventID', $EventID)->first();
    if ($EventID != null){
      $events = \DB::table('events')->get();
      $users = \DB::table('users')->get();
      return view('back/OfficerEvent', compact('events', 'event', 'users'));
    }
    return redirect()->action('EventController@Events')->withErrors('Event not found.');
  }

  public function EditEvent()
  {
    if(Auth::user()->admin == 1){
      $users = \DB::table('events')->get();
      return view('back/events', compact('events'));
    }
    return $this->PermError();
  }
}
