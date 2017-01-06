<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
  public function ShowOfficers()
  {
    $officers = \DB::table('users')->where('officer', 1)->orWhere('advisor', 1)->get();
    return view('front/officers', compact('officers'));
  }

  public function ShowJrOfficers()
  {
    $jrofficers = \DB::table('users')->where('jofficer', 1)->get();
    return view('front/jrofficers', compact('jrofficers'));
  }

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
      'bio' => 'required|string|max:65535',
    ]);

    $title = Auth::user()->title;

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
              'bio' => $request->input('bio'),
              'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
    ]);

    return redirect()->action('UserController@ShowProfile')->with('success', 'Your profile has been updated!');
  }
}
