cle<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('users', function($table) {
      $table->foreign('updated_by')->references('id')->on('users');
    });

    Schema::table('events', function($table) {
      $table->foreign('created_by')->references('id')->on('users');
      $table->foreign('updated_by')->references('id')->on('users');
    });

    Schema::table('sponsors', function($table) {
      $table->foreign('created_by')->references('id')->on('users');
      $table->foreign('updated_by')->references('id')->on('users');
    });

    Schema::table('attendance', function($table) {
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('event_id')->references('id')->on('events');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {

  }
}
