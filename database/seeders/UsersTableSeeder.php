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
        $user->email = "ali@hops.id";
        $user->password = bcrypt('Alibudi'); 
        $user->save();
    }
}