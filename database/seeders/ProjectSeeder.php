<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Projectowner;
use App\Models\Projectstatus;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c4huplatform = new Project(['name' => 'C4HU platform', 'startdate' => '2021-01-01']);
        $c4huplatform->status()->associate(Projectstatus::find(1));
        $c4huplatform->owner()->associate(Projectowner::find(1));
        $c4huplatform->save();
        $c4huplatform->categories()->sync([4, 5]);
        $c4huplatform->types()->sync([1, 3]);
        $c4huplatform->skills()->sync([4, 7, 13, 16]);
        $c4huplatform->skillgroups()->sync([2, 6]);
    }
}
