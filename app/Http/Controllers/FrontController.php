<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
  public function Index()
  {
    return view('front/index');
  }

  public function Events()
  {
    return view('front/events');
  }

  public function Officers()
  {
    $officers = \DB::table('users')->where('officer', 1)->orWhere('advisor', 1)->get();
    return view('front/officers', compact('officers'));
  }

  public function JrOfficers()
  {
    $jrofficers = \DB::table('users')->where('jofficer', 1)->get();
    return view('front/jrofficers', compact('jrofficers'));
  }

  public function Sponsors()
  {
    $sponsors = \DB::table('sponsors')->get();
    return view('front/sponsors', compact('sponsors'));
  }
}
