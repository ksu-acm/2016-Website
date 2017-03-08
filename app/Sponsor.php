<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Event extends Model
{
  protected $table = 'sponsors';
  
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'website', 'picture', 'created_by', 'updated_by',
  ];

  public function createdBy()
  {
    return $this->belongsTo('App\User', 'created_by');
  }

  public function updatedBy()
  {
    return $this->belongsTo('App\User', 'updated_by');
  }
}
