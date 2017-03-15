<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('eid')->unique();
      $table->string('email')->unique();
      $table->string('first');
      $table->string('last')->default('');
      $table->string('title')->default('');
      $table->string('bio')->default('');
      $table->string('picture')->default('');
      $table->string('year')->default('');
      $table->string('iso')->default('');
      $table->rememberToken();
      $table->timestamps();
    });
    File::makeDirectory(public_path().'/storage/img/', 0777, true, true);
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('users');
  }
}
