<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
  public function Index()
  {
    $pizzaTotals = \DB::table("pizzaTotals")->first();
    return view('back/index', compact('pizzaTotals'));
  }

  public function Events()
  {
    if(Auth::user()->admin == 1){
      $events = \DB::table('events')->get();
      return view('back/attendance', compact('events'));
    }
    return $this->PermError();
  }
}
