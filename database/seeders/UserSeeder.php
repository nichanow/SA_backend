<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user id 1
        $user = new User();
        $user->role = "ADMIN";
        $user->name = "Admin";
        $user->username = "admin";
        $user->password = Hash::make("password");
        $user->save();

        // user id 2
        $user = new User();
        $user->role = "EMPLOYEE";
        $user->name = "Employee1";
        $user->username = "employee1";
        $user->password = Hash::make("password");
        $user->save();

        // user id 3
        $user = new User();
        $user->role = "EMPLOYEE";
        $user->name = "Employee2";
        $user->username = "employee2";
        $user->password = Hash::make("password");
        $user->save();

        // user id 2
        $user = new User();
        $user->role = "EMPLOYEE";
        $user->name = "Employee3";
        $user->username = "employee3";
        $user->password = Hash::make("password");
        $user->save();
    }
}
