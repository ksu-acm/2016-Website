<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
  public function ShowProfile()
  {
    $user = \DB::table('users')->where('id', Auth::user()->id)->first();
    return view('back/profile', compact('user'));
  }

  public function UpdateProfile(Request $request)
  {
    $this->validate($request, [
      'firstname' => 'required|string',
      'lastname' => 'required|string',
      'email' => 'required|string',
    ]);

    \DB::table('users')
    ->where('id', Auth::user()->id)
    ->update(['firstname' => $request->input('firstname'),
              'lastname' => $request->input('lastname'),
              'email' => $request->input('email'),
              'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
    ]);

    return redirect()->action('UserController@ShowProfile')->with('success', 'Your profile has been updated!');
  }
}
