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
        User::create(['name' => 'Admin', 'email' => 'admin@teszt.hu', 'password' => bcrypt('a'), 'email_verified_at' => '2021-04-13']);
        User::create(['name' => 'Juhász Attila', 'email' => 'juhasz.attila@k-monitor.hu', 'password' => bcrypt('a'), 'email_verified_at' => '2021-04-13',
            'userable_id' => 1, 'userable_type' => 'App\Models\Projectowner']);
    }
}
