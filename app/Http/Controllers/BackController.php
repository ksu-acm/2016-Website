<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BackController extends Controller
{
  public function Index()
  {
    return view('back/index');
  }

  public function Profile($eid = null)
  {
    $roles = Role::all();
    if($eid == null){
      $user = User::where('eid', Auth::user()->eid)->first();
      return view('back/profile', compact('user', 'roles'));
    }
    if(Auth::user()->hasRole('Administrator')){
      $user = User::where('eid', $eid)->first();
      if ($user != null){
        return view('back/profile', compact('user', 'roles'));
      }
      return redirect()->action('AdminController@Admin')->withErrors('User not found.');
    }
    return $this->Error();
  }

  public function UpdateProfile($eid, Request $request)
  {
    if($eid != Auth::user()->eid && Auth::user()->hasRole('Administrator') != 1){
      return $this->Error();
    }
    if($eid == null){
      $eid = Auth::user()->eid;
    }
    $user = User::where('eid', $eid)->first();
    $this->validate($request, [
      'first' => 'required|string|max:255',
      'last' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users,email,'.$user->id,
      'bio' => 'string|max:65535',
      'title' => 'string|max:255',
      'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $user->first = $request->input('first');
    $user->last = $request->input('last');
    $user->email = $request->input('email');
    $user->title = $request->input('title');
    $user->bio = $request->input('bio');
    if($request->picture != ""){
      $picture = uniqid().'.jpg';
      \Image::make($request->file('picture'))->resize(200, 200)->encode('jpg')->save(public_path().'/storage/img/'.$picture);
      $user->picture = $picture;
    }
    if(Auth::user()->hasRole('Administrator')){
      $roles = Role::all();
      $user->roles()->detach();
      foreach($roles as $role){
        if($request->input('role_'.$role->id) == "on"){
          $user->roles()->attach($role);
        }
      }
    }
    $user->save();
    if($eid == Auth::user()->eid){
      return redirect()->action('BackController@Profile')->with('success', 'Your profile has been updated!');
    }
    return redirect()->action('AdminController@Admin')->with('success', "Updated ".$user->first." ".$user->last."'s profile!");
  }

  public function UpdateID($eid, Request $request)
  {
    if($eid != Auth::user()->eid && Auth::user()->hasRole('Administrator') != 1){
      return $this->Error();
    }
    $user = User::where('eid', $eid)->first();
    if($user == null){
      return $this->Error();
    }
    $this->validate($request, [
      'iso' => 'required',
    ]);
    $iso = "";
    $input = $request->input('iso');
    if($input[0] == '%'){
      $iso = substr($input, 1, 16);
    } else {
      $iso = substr($input, 0, 15);
    }
    if(is_numeric($iso) && strlen($iso) == 16){
      $check = User::where('iso', $iso)->first();
      if($check == null || $check->id == $user->id){
        $user->iso = $iso;
        $user->save();
        return redirect()->action('BackController@Profile')->with('success', 'Your student ID has been updated!');
      }
    }
    return redirect()->action('BackController@Profile')->withErrors('There was an error updating your ID.');
  }
}
