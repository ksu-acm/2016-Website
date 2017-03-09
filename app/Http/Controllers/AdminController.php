<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
  public function Admin()
  {
    $users = User::all();
    return view('back/admin', compact('users'));
  }
}
