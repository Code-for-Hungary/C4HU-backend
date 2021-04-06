<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSkillgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_skillgroups', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained();
            $table->foreignId('skillgroup_id')->constrained();
            $table->timestamps();
            $table->primary(['project_id', 'skillgroup_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_skillgroups');
    }
}
