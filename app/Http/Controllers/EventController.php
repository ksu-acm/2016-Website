<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

  public function EditEvent(Request $request, $EventID = null)
  {
    if(Auth::user()->admin != 1){
      return $this->PermError();
    }



    $users = \DB::table('users')->get();
    $attendance = \DB::table('attendance')->get();

    foreach($users as $user) {
      $eid = $user->eid;
      if($request->input($eid)){
        //user attended event
        if (\DB::table('attendance')->where('eid', $eid)->where('eventID', $EventID)->first()) {
           // user found, update it
           \DB::table('attendance')
            ->where('eid', $eid)
            ->where('eventID', $EventID)
            ->update(['attended' => 1]);
        } else {
          //user not found, make new row
          \DB::insert('insert into attendance (eid, eventID, attended) values (?, ?, ?)', [$eid, $EventID, '1']);
        }
      } else {
        //user did not attend event
        if (\DB::table('attendance')->where('eid', $eid)->where('eventID', $EventID)->first()) {
           // user found, update it
           \DB::table('attendance')
            ->where('eid', $eid)
            ->where('eventID', $EventID)
            ->update(['attended' => 0]);
        } else {
          //user not found, make new row

          \DB::insert('insert into attendance (eid, eventID, attended) values (?, ?, ?)', [$eid, $EventID, '0']);
        }
      }



      //$eid = $request->input($temp);



      //\DB::insert('insert into attendance (eid, eventID) values (?, ?)', [$eid, $EventID]);
    }







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
