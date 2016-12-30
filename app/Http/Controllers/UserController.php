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
      'firstname' => 'required|string|max:255',
      'lastname' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
    ]);

    $title = "";

    if(Auth::user()->officer == 1){
      $this->validate($request, [
        'title' => 'required|string|max:255',
      ]);
      $title = $request->title;
    }

    \DB::table('users')
    ->where('id', Auth::user()->id)
    ->update(['firstname' => $request->input('firstname'),
              'lastname' => $request->input('lastname'),
              'email' => $request->input('email'),
              'title' => $title,
              'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
    ]);

    return redirect()->action('UserController@ShowProfile')->with('success', 'Your profile has been updated!');
  }
}
