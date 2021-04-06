<?php

namespace Database\Seeders;

use App\Models\Skillgroup;
use Illuminate\Database\Seeder;

class SkillgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skillgroup::create(["id" => 1, "name" => "Szervezés", "order" => 10]);
        Skillgroup::create(["id" => 2, "name" => "Kommunikáció", "order" => 20]);
        Skillgroup::create(["id" => 3, "name" => "Logisztika", "order" => 30]);
        Skillgroup::create(["id" => 4, "name" => "Marketing", "order" => 40]);
        Skillgroup::create(["id" => 5, "name" => "Jog", "order" => 50]);
        Skillgroup::create(["id" => 6, "name" => "Informatika", "order" => 60]);
        Skillgroup::create(["id" => 7, "name" => "Egyéb", "order" => 70]);
    }
}
