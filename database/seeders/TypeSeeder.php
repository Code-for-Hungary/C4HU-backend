<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(["name" => "web oldal"]);
        Type::create(["name" => "mobil app"]);
        Type::create(["name" => "dokumentáció"]);
        Type::create(["name" => "egyéb"]);
    }
}
