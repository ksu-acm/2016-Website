<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
  public function ShowProfile($eid = null)
  {
    if($eid == null){
      $user = \DB::table('users')->where('eid', Auth::user()->eid)->first();
      return view('back/profile', compact('user'));
    }
    if(Auth::user()->admin == 1){
      $user = \DB::table('users')->where('eid', $eid)->first();
      if ($user != null){
        return view('back/profile', compact('user'));
      }
      return redirect()->action('AdminController@Admin')->withErrors('User not found.');
    }
    return $this->PermError();
  }

  public function UpdateProfile($eid = null, Request $request)
  {
    if($eid != null && Auth::user()->admin != 1){
      return $this->PermError();
    }

    if($eid == null){
      $eid = Auth::user()->eid;
    }

    $user = User::where('eid', $eid)->first();

    $this->validate($request, [
      'firstname' => 'required|string|max:255',
      'lastname' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users,email,'.$user->id,
      'bio' => 'string|max:65535',
      'title' => 'string|max:255',
      'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->email = $request->input('email');
    if($user->officer == 1){
      $user->title = $request->input('title');
    }
    $user->bio = $request->input('bio');
    if($request->picture != ""){
      $picture = uniqid().'.jpg';
      \Image::make($request->file('picture'))->resize(200, 200)->encode('jpg')->save(public_path().'/storage/img/'.$picture);
      $user->picture = $picture;
    }
    if(Auth::user()->admin == 1){
      if($request->input('jrofficer')){
        $user->jofficer = 1;
      } else {
        $user->jofficer = 0;
      }
      if($request->input('officer')){
        $user->officer = 1;
      } else {
        $user->officer = 0;
      }
      if($request->input('advisor')){
        $user->advisor = 1;
      } else {
        $user->advisor = 0;
      }
      if($request->input('admin')){
        $user->admin = 1;
      } else {
        $user->admin = 0;
      }
    }
    $user->updated_by = Auth::user()->id;
    $user->save();

    if($eid == Auth::user()->eid){
      return redirect()->action('UserController@ShowProfile')->with('success', 'Your profile has been updated!');
    }
    return redirect()->action('AdminController@Admin')->with('success', "Updated ".$user->firstname." ".$user->lastname."'s profile!");
  }
}
