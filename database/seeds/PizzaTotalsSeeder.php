<?php

use Illuminate\Database\Seeder;

class PizzaTotalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzaTotals')->insert([
          'events' => '0',
          'attendees' => '0',
          'avgAttendees' => '0',
          'pizzasOrdered' => '0',
          'cheeseOrdered' => '0',
          'pepperoniOrdered' => '0',
          'sausageOrdered' => '0',
          'otherOrdered' => '0',
          'leftoverSlices' => '0',
          'avgLeftoverSlices' => '0',
          'avgSlicesPerPerson' => '0',
          'orders' => '0',
    	]);
    }
}
