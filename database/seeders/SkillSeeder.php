<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create(["name" => "Szervezés", "order" => 10, "skillgroup_id" => 1]);
        Skill::create(["name" => "Szervezetépítés", "order" => 20, "skillgroup_id" => 1]);
        Skill::create(["name" => "Szervezeten belüli kommunikáció", "order" => 30, "skillgroup_id" => 2]);
        Skill::create(["name" => "Külső kommunikáció", "order" => 40, "skillgroup_id" => 2]);
        Skill::create(["name" => "Logisztika", "order" => 50, "skillgroup_id" => 3]);
        Skill::create(["name" => "Dizájn, tervezés, grafikus munkák", "order" => 60, "skillgroup_id" => 6]);
        Skill::create(["name" => "Szövegírás, tartalomfejlesztés", "order" => 70, "skillgroup_id" => 6]);
        Skill::create(["name" => "Piár, Közösségi média", "order" => 80, "skillgroup_id" => 4]);
        Skill::create(["name" => "Eseményszervezés", "order" => 90, "skillgroup_id" => 1]);
        Skill::create(["name" => "UI/UX Design", "order" => 100, "skillgroup_id" => 6]);
        Skill::create(["name" => "Projektmenedzsment", "order" => 110, "skillgroup_id" => 6]);
        Skill::create(["name" => "Adatelemzés, statisztika", "order" => 120, "skillgroup_id" => 6]);
        Skill::create(["name" => "Backend development (Python, Node.js, PHP, C#, Java, Ruby, Scala)", "order" => 130, "skillgroup_id" => 6]);
        Skill::create(["name" => "Database development (MySQL, PostgreSQL, NoSQL, SQL Server)", "order" => 140, "skillgroup_id" => 6]);
        Skill::create(["name" => "DevOps (Amazon Web Services, Azure, Vagrant, Docker, DNS, Digital Ocean)", "order" => 150, "skillgroup_id" => 6]);
        Skill::create(["name" => "Frontend development alapok (HTML, CSS, Javascript, Gulp)", "order" => 160, "skillgroup_id" => 6]);
        Skill::create(["name" => "Frontend development haladó (SASS / Javascript MV*, React, Angular, Vue, Ember / Webpack)", "order" => 170, "skillgroup_id" => 6]);
        Skill::create(["name" => "Mobilalkalmazás fejlesztés (Swift, C#, Ionic, React Native, Java, C, C++)", "order" => 180, "skillgroup_id" => 6]);
        Skill::create(["name" => "Content management development (Wordpress, Joomla, Drupal, Others)", "order" => 190, "skillgroup_id" => 6]);
        Skill::create(["name" => "Quality assurance (functional testing, automated testing, Selenium, BrowserStack)", "order" => 200, "skillgroup_id" => 6]);
        Skill::create(["name" => "Egyéb", "order" => 210, "skillgroup_id" => 7]);
    }
}
