<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "alibudi";
        $user->email = "alibudi@gmail.com";
        $user->password = bcrypt('12345'); 
        $user->save();
    }
}
