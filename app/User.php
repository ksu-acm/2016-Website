<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'eid', 'email', 'first', 'last', 'title', 'bio', 'picture', 'updated_by'
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'remember_token',
  ];

  public function updatedBy()
  {
    return $this->belongsTo('App\User', 'updated_by');
  }
}
