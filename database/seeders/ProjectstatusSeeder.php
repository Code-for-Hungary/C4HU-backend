<?php

namespace Database\Seeders;

use App\Models\Projectstatus;
use Illuminate\Database\Seeder;

class ProjectstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projectstatus::create(["name" => "feladat, terv", "order" => 10]);
        Projectstatus::create(["name" => "folyamatban", "order" => 20]);
        Projectstatus::create(["name" => "elkészült", "order" => 30]);
        Projectstatus::create(["name" => "megszakítva", "order" => 40]);
        Projectstatus::create(["name" => "várakoztatva", "order" => 50]);
    }
}
