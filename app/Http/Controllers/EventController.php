<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
  public function ShowEvent()
  {
    $events = \DB::table("events")->first();
    return view('back/events', compact('events'));
  }
}
