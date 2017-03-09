<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('clubs', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->integer('president');
      $table->integer('vice_president');
      $table->integer('secretary');
      $table->string('website');
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
    Schema::disableForeignKeyConstraints();
    Schema::drop('clubs');
  }
}
