<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
  public function Events()
  {
    $events = Event::all();
    return view('back/events/events', compact('events'));
  }

  public function Event($id = null)
  {
    if($id == null)
    {
      $event = null;
      return view('back/events/event', compact('event'));
    }
    $event = Event::where('id', $id)->first();
    return view('back/events/event', compact('event'));
  }

  public function UpdateEvent(Request $request, $id = null)
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
      'event_date' => 'required|string|max:255',
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
    $event->category = "";
    $event->event_date = $request->input('event_date');
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
    if($add){
      return redirect()->action('EventController@Events')->with('success', 'Event added!');
    }
    return redirect()->action('EventController@Events')->with('success', 'Event updated!');
  }

  public function Participation($id)
  {
    $event = Event::where('id', $id)->first();
    if($event == null){
      return redirect()->action('EventController@Events')->withError('Event not found!');
    }
    return view('back/events/participation', compact('event'));
  }

  public function DeleteEvent($id)
  {
    $event = Event::where('id', $id)->first();
    if($event == null){
      return redirect()->action('EventController@Events')->withError('Event not found!');
    }
    $event->delete();
    return redirect()->action('EventController@Events')->with('success', 'Event deleted!');
  }
}
