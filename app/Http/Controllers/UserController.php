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
      'bio' => 'required|string|max:65535',
      'title' => 'string|max:255',
      'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $title = Auth::user()->title;
    if(Auth::user()->officer == 1){
      $title = $request->title;
    }

    $picture = Auth::user()->picture;
    if($request->picture != ""){
      $picture = uniqid().'.jpg';
      \Image::make($request->file('picture'))->resize(200, 200)->encode('jpg')->save(public_path().'/storage/img/'.$picture);
    }

    $user = User::where('id', Auth::user()->id)->first();
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->email = $request->input('email');
    $user->title = $title;
    $user->bio = $request->input('bio');
    $user->picture = $picture;
    $user->save();

    return redirect()->action('UserController@ShowProfile')->with('success', 'Your profile has been updated!');
  }
}
