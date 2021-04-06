<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->date('startdate')->nullable();
            $table->date('deadline')->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('city', 40)->nullable();
            $table->string('address', 60)->nullable();
            $table->date('closedate')->nullable();
            $table->foreignId('projectstatus_id')->constrained();
            $table->foreignId('projectowner_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
