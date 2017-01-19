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

  public function EditEvent($eid = null, Request $request)
  {
    //if($eid != null && Auth::user()->admin != 1){
    //  return $this->PermError();
    //}

    //if($eid == null){
    //  $eid = Auth::user()->eid;
    //}

    //$user = User::where('eid', $eid)->first();


    //$user->firstname = $request->input('firstname');
    //$user->lastname = $request->input('lastname');
    //$user->email = $request->input('email');

    //$user->updated_by = Auth::user()->id;
    //$user->save();

    //if($eid == Auth::user()->eid){
      return redirect()->action('EventController@ShowEvent')->with('success', 'Your attendance has been updated!');
    //}
    //return redirect()->action('EventController@ShowEvent')->with('success', "Updated ".$event->EventID."!");

  }
}
