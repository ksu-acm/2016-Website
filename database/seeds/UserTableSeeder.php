<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = Role::where('name', 'User')->first();
        $admin_role = Role::where('name', 'Administrator')->first();

        $user = new User();
        $user->eid = "atodd";
        $user->email = "atodd@ksu.edu";
        $user->first = "Alex";
        $user->last = "Todd";
        $user->save();

        $user->roles()->attach($user_role);
        $user->roles()->attach($admin_role);
    }
}
