<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
  public function Index()
  {
    return view('back/index');
  }

}
