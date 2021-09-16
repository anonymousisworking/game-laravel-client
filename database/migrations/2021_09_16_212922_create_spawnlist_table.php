<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpawnlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spawnlist', function (Blueprint $table) {
            $table->id();
            $table->integer('npc_id')->unsigned();
            $table->integer('loc_id')->unsigned();
            $table->integer('respawn_delay')->unsigned()->default(60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spawnlist');
    }
}
