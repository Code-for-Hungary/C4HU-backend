<?php

namespace Database\Seeders;

use App\Models\Contractstatus;
use Illuminate\Database\Seeder;

class ContractstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contractstatus::create(["name" => "applicant (jelentkező)", "order" => 10]);
        Contractstatus::create(["name" => "accepted (elfogadva)", "order" => 20]);
        Contractstatus::create(["name" => "revoked (visszavonva)", "order" => 30]);
        Contractstatus::create(["name" => "rejected (elutasítva)", "order" => 40]);
        Contractstatus::create(["name" => "closed (lezárva)", "order" => 50]);
    }
}
