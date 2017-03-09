<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;
use App\Event;

class User extends Authenticatable
{
  use Notifiable;

  public function roles()
  {
    return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
  }

  public function events()
  {
    return $this->belongsToMany('App\Event');
  }

  public function hasAnyRole($roles)
  {
    if (is_array($roles)) {
      foreach ($roles as $role) {
        if ($this->hasRole($role)) {
          return true;
        }
      }
    } else {
      if ($this->hasRole($role)) {
        return true;
      }
    }
    return false;
  }

  public function hasRole($role)
  {
    if ($this->roles()->where('name', $role)->first()) {
      return true;
    }
    return false;
  }
}
