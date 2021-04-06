<?php

namespace Database\Seeders;

use App\Models\Skilllevel;
use Illuminate\Database\Seeder;

class SkilllevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skilllevel::create(["name" => "interested (teljesen kezdő, érdeklődő)", "order" => 10]);
        Skilllevel::create(["name" => "student (kezdő, tanulja)", "order" => 20]);
        Skilllevel::create(["name" => "junior (gyakorolja)", "order" => 30]);
        Skilllevel::create(["name" => "senior (tapasztalt, gyakorlott)", "order" => 40]);
        Skilllevel::create(["name" => "mentor (menorálást vállal)", "order" => 50]);
    }
}
