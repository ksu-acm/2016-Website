<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Event;

class Event extends Model
{
  protected $table = 'attendance';

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'user_id', 'event_id', 'attended', 'excused',
  ];

  public function User()
  {
    return $this->belongsTo('App\User');
  }

  public function Event()
  {
    return $this->belongsTo('App\Event');
  }
}
