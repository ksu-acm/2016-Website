<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('pizza', function (Blueprint $table) {
             $table->increments('id');
             $table->string('eventName');
             $table->date('eventDate');
             $table->unsignedInteger('attendees');
             $table->unsignedInteger('pizzasOrdered');
             $table->unsignedInteger('cheeseOrdered');
             $table->unsignedInteger('pepperoniOrdered');
             $table->unsignedInteger('sausageOrdered');
             $table->unsignedInteger('otherOrdered');
             $table->unsignedInteger('leftoverSlices');
             $table->double('avgSlicesPerPerson');
             $table->mediumText('notes');
             $table->integer('created_by')->references('id')->on('users');
             $table->integer('updated_by')->references('id')->on('users');
             $table->timestamps();
         });

         Schema::create('pizzaTotals', function (Blueprint $table) {
             $table->increments('id');
             $table->unsignedInteger('events');
             $table->unsignedInteger('attendees');
             $table->unsignedInteger('avgAttendees');
             $table->unsignedInteger('pizzasOrdered');
             $table->unsignedInteger('cheeseOrdered');
             $table->unsignedInteger('pepperoniOrdered');
             $table->unsignedInteger('sausageOrdered');
             $table->unsignedInteger('otherOrdered');
             $table->unsignedInteger('leftoverSlices');
             $table->double('avgLeftoverSlices');
             $table->double('avgSlicesPerPerson');
             $table->unsignedInteger('orders');
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
        Schema::drop('pizza');
        Schema::drop('pizzaTotals');
    }
}
