<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Event extends Model
{
  protected $table = 'events';

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'category', 'start_time', 'end_time', 'attendees', 'pizzas_ordered', 'leftover_slices', 'avg_slices', 'sandwiches_ordered', 'leftover_sandwiches', 'avg_sandwiches', 'notes', 'created_by', 'updated_by',
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
