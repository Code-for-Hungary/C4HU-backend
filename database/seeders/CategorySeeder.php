<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(["name" => "Gazdaság"]);
        Category::create(["name" => "Politika"]);
        Category::create(["name" => "Jog"]);
        Category::create(["name" => "Szociális háló"]);
        Category::create(["name" => "Egészségügy"]);
        Category::create(["name" => "Informatika"]);
        Category::create(["name" => "Kultúra"]);
        Category::create(["name" => "Tudomány"]);
        Category::create(["name" => "Ökológia, Környezet védelem"]);
        Category::create(["name" => "Egyéb"]);
    }
}
