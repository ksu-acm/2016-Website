<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BackController extends Controller
{
  public function Index()
  {
    return view('back/index');
  }

  public function Events()
  {
    $events = Event::all();
    return view('back/events', compact('events'));
  }

  public function Event($id = null)
  {
    if($id == null)
    {
      $event = null;
      return view('back/event', compact('event'));
    }
    $event = Event::where('id', id)->first();
    return view('back/event', compact('event'));
  }

  public function UpdateEvent($id = null)
  {
    $event = null;
    $add = true;
    if($id != null){
      $event = Event::where('id', $id)->first();
      $add = false;
    } else {
      $event = new Event();
    }

    $this->validate($request, [
      'name' => 'required|string|max:255',
      'start_time' => 'required',
      'end_time' => 'required',
      'attendees' => 'required|min:0',
      'pizza_ordered' => 'required|min:0',
      'leftover_slices' => 'required|min:0',
      'sandwiches_ordered' => 'required|min:0',
      'leftover_sandwiches' => 'required|min:0',
      'sponsors' => 'string|max:255',
      'total_donation' => 'required|min:0',
      'food_cost' => 'required|min:0',
      'notes' => 'string|max:255',
    ]);

    $event->name = $request->input('name');
    $event->start_time = $request->input('start_time');
    $event->end_time = $request->input('end_time');
    $event->attendees = $request->input('attendees');
    $event->pizza_ordered = $request->input('pizza_ordered');
    $event->leftover_slices = $request->input('leftover_slices');
    $avg_slices = 0;
    $avg_sandwiches = 0;
    if($request->input('attendees') > 0){
      $avg_slices = (($request->input('pizza_ordered') * 8) - $request->input('leftover_slices'))/$request->input('attendees');
      $avg_slices = (($request->input('sandwiches_ordered') * 8) - $request->input('leftover_sandwiches'))/$request->input('attendees');
    }
    $event->avg_slices = $avg_slices;
    $event->sandwiches_ordered = $request->input('sandwiches_ordered');
    $event->leftover_sandwiches = $request->input('leftover_sandwiches');
    $event->avg_sandwiches = $avg_sandwiches;
    $event->sponsors = $request->input('sponsors');
    $event->total_donation = $request->input('total_donation');
    $event->food_cost = $request->input('food_cost');
    $event->notes = $request->input('notes');
    $event->save();
    if(add){
      return redirect()->action('BackController@Events')->with('success', 'Event added!');
    }
    return redirect()->action('BackController@Events')->with('success', 'Event updated!');
  }

  public function Profile($eid = null)
  {
    $roles = Role::all();
    if($eid == null){
      $user = User::where('eid', Auth::user()->eid)->first();
      return view('back/profile', compact('user', 'roles'));
    }
    if(Auth::user()->hasRole('Administrator')){
      $user = User::where('eid', $eid)->first();
      if ($user != null){
        return view('back/profile', compact('user', 'roles'));
      }
      return redirect()->action('AdminController@Admin')->withErrors('User not found.');
    }
    return $this->Error();
  }

  public function UpdateProfile($eid, Request $request)
  {
    if($eid != Auth::user()->eid && Auth::user()->hasRole('Administrator') != 1){
      return $this->Error();
    }
    if($eid == null){
      $eid = Auth::user()->eid;
    }
    $user = User::where('eid', $eid)->first();
    $this->validate($request, [
      'first' => 'required|string|max:255',
      'last' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users,email,'.$user->id,
      'bio' => 'string|max:65535',
      'title' => 'string|max:255',
      'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $user->first = $request->input('first');
    $user->last = $request->input('last');
    $user->email = $request->input('email');
    $user->title = $request->input('title');
    $user->bio = $request->input('bio');
    if($request->picture != ""){
      $picture = uniqid().'.jpg';
      \Image::make($request->file('picture'))->resize(200, 200)->encode('jpg')->save(public_path().'/storage/img/'.$picture);
      $user->picture = $picture;
    }
    if(Auth::user()->hasRole('Administrator')){
      $roles = Role::all();
      $user->roles()->detach();
      foreach($roles as $role){
        if($request->input('role_'.$role->id) == "on"){
          $user->roles()->attach($role);
        }
      }
    }
    $user->save();
    if($eid == Auth::user()->eid){
      return redirect()->action('BackController@Profile')->with('success', 'Your profile has been updated!');
    }
    return redirect()->action('AdminController@Admin')->with('success', "Updated ".$user->first." ".$user->last."'s profile!");
  }
}
