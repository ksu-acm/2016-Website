<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = "User";
        $role_user->description = "Default User";
        $role_user->save();

        $role_jo = new Role();
        $role_jo->name = "ACM Junior Officer";
        $role_jo->description = "ACM Junior Officer";
        $role_jo->save();

        $role_officer = new Role();
        $role_officer->name = "ACM Officer";
        $role_officer->description = "ACM Officer";
        $role_officer->save();

        $role_advisor = new Role();
        $role_advisor->name = "ACM Advisor";
        $role_advisor->description = "ACM Advisor";
        $role_advisor->save();

        $role_admin = new Role();
        $role_admin->name = "Administrator";
        $role_admin->description = "Administrator";
        $role_admin->save();
    }
}
