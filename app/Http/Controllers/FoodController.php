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
    return view('back/food');
  }

}
