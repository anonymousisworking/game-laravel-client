<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npc', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level');
            $table->string('sex');
            $table->integer('curhp')->unsigned();
            $table->integer('maxhp')->unsigned();
            $table->integer('power')->unsigned();
            $table->integer('critical')->unsigned();
            $table->integer('evasion')->unsigned();
            $table->integer('stamina')->unsigned();
            $table->boolean('aggr')->default(0);
            $table->boolean('is_undead')->default(0);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('npc');
    }
}
