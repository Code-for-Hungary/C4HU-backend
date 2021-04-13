<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectownersUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projectowners', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projectowners', function (Blueprint $table) {
            $table->dropForeign('projectowners_user_id_foreign');
            $table->dropIndex('projectowners_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
