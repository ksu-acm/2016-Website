<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->mediumText('bio');
        $table->string('picture')->default('');
      });
    File::makeDirectory(public_path().'/storage/img/sponsors', 0777, true);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sponsors');
    }
}
