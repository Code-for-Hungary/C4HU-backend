<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContributorSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributor_skills', function (Blueprint $table) {
            $table->foreignId('contributor_id')->constrained();
            $table->foreignId('skill_id')->constrained();
            $table->timestamps();
            $table->foreignId('skilllevel_id')->constrained();
            $table->primary(['contributor_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contributor_skills');
    }
}
