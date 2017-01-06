<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FoodController extends Controller
{
    public function ShowFood()
    {
      $totals = \DB::table('pizzaTotals')->first();
      $events = \DB::table('pizza')->get();
      return view('back/food', compact('totals', 'events'));
    }

    public function ShowEvent($id = 0)
    {
      if (Auth::user()->officer == 1 || Auth::user()->advisor == 1){
        $event = \DB::table('pizza')->where('id', $id)->first();
        return view('back/event', compact('event'));
      }
      return $this->PermError();
    }

    public function UpdateEvent(Request $request, $id = 0)
    {
      if (Auth::user()->officer == 1 || Auth::user()->advisor == 1){
        $this->validate($request, [
          'eventName' => 'required|string|max:255',
          'eventDate' => 'required',
          'attendees' => 'required',
          'cheeseOrdered' => 'required',
          'pepperoniOrdered' => 'required',
          'sausageOrdered' => 'required',
          'otherOrdered' => 'required',
          'leftoverSlices' => 'required',
          'notes' => 'string|max:65535',
        ]);

        $currentTotals = \DB::table('pizzaTotals')->where('id', 1)->first();
        $eventName = $request->input('eventName');
        $eventDate = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('eventDate'))));
        $attendees = $request->input('attendees');
        $cheeseOrdered = $request->input('cheeseOrdered');
        $pepperoniOrdered = $request->input('pepperoniOrdered');
        $sausageOrdered = $request->input('sausageOrdered');
        $otherOrdered = $request->input('otherOrdered');
        $pizzasOrdered = $cheeseOrdered + $pepperoniOrdered + $sausageOrdered + $otherOrdered;
        $leftoverSlices = $request->input('leftoverSlices');
        $avgSlicesPerPerson = ($pizzasOrdered*8)/$attendees;
        $notes = $request->input('notes');

        if ($id > 0) {
          $originalEvent = \DB::table('pizza')->where('id', $id)->first();
          \DB::table('pizza')
            ->where('id', $id)
            ->update(['eventName' => $eventName,
                      'eventDate' => $eventDate,
                      'attendees' => $attendees,
                      'pizzasOrdered' => $pizzasOrdered,
                      'cheeseOrdered' => $cheeseOrdered,
                      'pepperoniOrdered' => $pepperoniOrdered,
                      'sausageOrdered' => $sausageOrdered,
                      'otherOrdered' => $otherOrdered,
                      'leftoverSlices' => $leftoverSlices,
                      'avgSlicesPerPerson' => $avgSlicesPerPerson,
                      'notes' => $notes,
                      'updated_by' => Auth::user()->id,
                      'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
          ]);

          $updatedAttendees = ($currentTotals->attendees - $originalEvent->attendees) + $attendees;
          $avgAttendees = $updatedAttendees / $currentTotals->events;
          $updatedPizzasOrdered = ($currentTotals->pizzasOrdered - $originalEvent->pizzasOrdered) + $pizzasOrdered;
          $updatedCheeseOrdered = ($currentTotals->cheeseOrdered - $originalEvent->cheeseOrdered) + $cheeseOrdered;
          $updatedPepperoniOrdered = ($currentTotals->pepperoniOrdered - $originalEvent->pepperoniOrdered) + $pepperoniOrdered;
          $updatedSausageOrdered = ($currentTotals->sausageOrdered - $originalEvent->sausageOrdered) + $sausageOrdered;
          $updatedOtherOrdered = ($currentTotals->otherOrdered - $originalEvent->otherOrdered) + $otherOrdered;
          $updatedLeftoverSlices = ($currentTotals->leftoverSlices - $originalEvent->leftoverSlices) + $leftoverSlices;
          $updatedAvgLeftoverSlices = $updatedLeftoverSlices / $currentTotals->events;
          $updatedAvgSlicesPerPerson = ($updatedPizzasOrdered*8) / $updatedAttendees;


          \DB::table('pizzaTotals')
            ->where('id', 1)
            ->update(['attendees' => $updatedAttendees,
                      'avgAttendees' => $avgAttendees,
                      'pizzasOrdered' => $updatedPizzasOrdered,
                      'cheeseOrdered' => $updatedCheeseOrdered,
                      'pepperoniOrdered' => $updatedPepperoniOrdered,
                      'sausageOrdered' => $updatedSausageOrdered,
                      'otherOrdered' => $updatedOtherOrdered,
                      'leftoverSlices' => $updatedLeftoverSlices,
                      'avgLeftoverSlices' => $updatedAvgLeftoverSlices,
                      'avgSlicesPerPerson' => $updatedAvgSlicesPerPerson,
                      'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
          ]);
          return $this->ShowFood()->with('success', 'Updated the event!');
        }
        \DB::table('pizza')
          ->insert(['eventName' => $eventName,
                    'eventDate' => $eventDate,
                    'attendees' => $attendees,
                    'pizzasOrdered' => $pizzasOrdered,
                    'cheeseOrdered' => $cheeseOrdered,
                    'pepperoniOrdered' => $pepperoniOrdered,
                    'sausageOrdered' => $sausageOrdered,
                    'otherOrdered' => $otherOrdered,
                    'leftoverSlices' => $leftoverSlices,
                    'avgSlicesPerPerson' => $avgSlicesPerPerson,
                    'notes' => $notes,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        $updatedEvents = $currentTotals->events + 1;
        $updatedAttendees = $currentTotals->attendees + $attendees;
        $avgAttendees = $updatedAttendees / $updatedEvents;
        $updatedPizzasOrdered = $currentTotals->pizzasOrdered + $pizzasOrdered;
        $updatedCheeseOrdered = $currentTotals->cheeseOrdered + $cheeseOrdered;
        $updatedPepperoniOrdered = $currentTotals->pepperoniOrdered + $pepperoniOrdered;
        $updatedSausageOrdered = $currentTotals->sausageOrdered + $sausageOrdered;
        $updatedOtherOrdered = $currentTotals->otherOrdered + $otherOrdered;
        $updatedLeftoverSlices = $currentTotals->leftoverSlices + $leftoverSlices;
        $updatedAvgLeftoverSlices = $updatedLeftoverSlices / $updatedEvents;
        $updatedAvgSlicesPerPerson = ($updatedPizzasOrdered*8) / $updatedAttendees;

        \DB::table('pizzaTotals')
          ->where('id', 1)
          ->update(['events' => $updatedEvents,
                    'attendees' => $updatedAttendees,
                    'avgAttendees' => $avgAttendees,
                    'pizzasOrdered' => $updatedPizzasOrdered,
                    'cheeseOrdered' => $updatedCheeseOrdered,
                    'pepperoniOrdered' => $updatedPepperoniOrdered,
                    'sausageOrdered' => $updatedSausageOrdered,
                    'otherOrdered' => $updatedOtherOrdered,
                    'leftoverSlices' => $updatedLeftoverSlices,
                    'avgLeftoverSlices' => $updatedAvgLeftoverSlices,
                    'avgSlicesPerPerson' => $updatedAvgSlicesPerPerson,
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return $this->ShowFood()->with('success', 'Added an event!');
      }
      return $this->PermError();
    }

    public function ShowOrder()
    {
        return view('back/order');
    }

    public function Order(Request $request)
    {
    }
}
