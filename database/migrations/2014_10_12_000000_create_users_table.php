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
      $table->string('last');
      $table->string('title')->default('');
      $table->mediumText('bio')->default('');
      $table->string('picture')->default('');
      $table->integer('updated_by')->default(0);
      $table->rememberToken();
      $table->timestamps();
    });
    File::makeDirectory(public_path().'/storage/img/', 0777, true);
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::drop('users');
  }
}
