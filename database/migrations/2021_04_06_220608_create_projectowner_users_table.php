<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectownerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectowner_users', function (Blueprint $table) {
            $table->foreignId('projectowner_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->primary(['projectowner_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectowner_users');
    }
}
