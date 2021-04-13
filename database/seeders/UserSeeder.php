<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['id' => 1, 'name' => 'Admin', 'email' => 'admin@teszt.hu', 'password' => bcrypt('a'), 'email_verified_at' => '2021-04-13']);
    }
}
