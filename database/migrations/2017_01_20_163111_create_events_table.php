<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('events', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('category');
      $table->string('event_date');
      $table->unsignedInteger('attendees');
      $table->unsignedInteger('pizza_ordered');
      $table->unsignedInteger('leftover_slices');
      $table->double('avg_slices');
      $table->unsignedInteger('sandwiches_ordered');
      $table->unsignedInteger('leftover_sandwiches');
      $table->double('avg_sandwiches');
      $table->mediumText('sponsors');
      $table->decimal('total_donation');
      $table->decimal('food_cost');
      $table->mediumText('notes');
      $table->timestamps();
    });
  }
  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('events');
  }
}
