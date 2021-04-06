<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SkillgroupSeeder::class,
            SkillSeeder::class,
            ProjectstatusSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            SkilllevelSeeder::class,
            ContractstatusSeeder::class,
            ProjectownerSeeder::class,
            ProjectSeeder::class
        ]);
    }
}
