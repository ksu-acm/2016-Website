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
             $table->string('firstname');
             $table->string('lastname');
             $table->string('title');
             $table->boolean('jofficer');
             $table->boolean('officer');
             $table->boolean('advisor');
             $table->rememberToken();
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
        Schema::drop('users');
    }
}
