<?php

namespace Database\Seeders;

use App\Models\Projectowner;
use Illuminate\Database\Seeder;

class ProjectownerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projectowner::create(['id' => 1, 'name' => 'K-Monitor', 'website' => 'http://k-monitor.hu']);
    }
}
