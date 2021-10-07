<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login', 16)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->integer('level')->unsigned()->default(1);
            $table->integer('power')->unsigned()->default(5);
            $table->integer('critical')->unsigned()->default(5);
            $table->integer('evasion')->unsigned()->default(5);
            $table->integer('stamina')->unsigned()->default(5);
            $table->integer('defence')->unsigned()->default(5);
            // $table->integer('min_damage')->unsigned()->default(0);
            // $table->integer('max_damage')->unsigned()->default(0);
            $table->float('curhp', 10, 3)->default(18)->unsigned();
            $table->integer('maxhp')->unsigned()->default(18);
            $table->integer('last_restore')->default(time())->unsigned();
            $table->boolean('sex')->unsigned();
            $table->integer('clan')->unsigned()->index()->nullable();
            $table->integer('gold')->unsigned()->default(0);
            $table->integer('exp')->unsigned()->default(0);
            $table->integer('up')->unsigned()->default(3);
            // $table->integer('sword_mastery')->unsigned()->default(0);
            // $table->integer('ax_mastery')->unsigned()->default(0);
            // $table->integer('dagger_mastery')->unsigned()->default(0);
            // $table->integer('mace_mastery')->unsigned()->default(0);
            // $table->integer('free_skill')->unsigned()->default(3);
            // $table->integer('free_mastery')->unsigned()->default(1);
            $table->integer('win')->unsigned()->default(0);
            $table->integer('defeat')->unsigned()->default(0);
            $table->integer('draw')->unsigned()->default(0);
            $table->integer('rhand')->unsigned()->nullable();
            $table->integer('lhand')->unsigned()->nullable();
            $table->integer('dblhand')->unsigned()->nullable();
            $table->integer('request')->unsigned()->nullable()->index();
            $table->boolean('fight')->unsigned()->default(0)->nullable()->index();
            $table->integer('combat')->unsigned()->nullable()->index();
            $table->json('super_hits');
            $table->tinyInteger('team')->unsigned()->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('color')->nullable();
            $table->boolean('block')->unsigned()->default(0);
            $table->boolean('online')->unsigned()->default(0)->index();
            $table->integer('online_time')->unsigned()->default(0);
            $table->dateTime('last_access')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('last_ip', 15)->nullable();
            $table->string('reg_ip', 15)->nullable();
            $table->integer('access_level')->default(0)->unsigned();
            $table->integer('help')->default(0)->unsigned();
            $table->integer('loc')->default(1)->unsigned();
            $table->integer('trans_time')->default(0)->unsigned();
            $table->integer('trans_timeout')->default(0)->unsigned();
            $table->integer('herbology')->default(0)->unsigned();
            $table->integer('forest_timeout')->default(0)->unsigned();
            $table->integer('fishing')->default(0)->unsigned();
            $table->integer('fishing_timeout')->default(0)->unsigned();
            // $table->tinyInteger('bot')->default(0)->unsigned();
            $table->boolean('bot')->unsigned()->default(0)->index();
            $table->integer('dungeon')->default(0)->unsigned()->index();
            $table->dateTime('birthday')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();

            $table->rememberToken();
//            $table->timestamps();
        });

        // DB::statement('CREATE INDEX description_idx ON Customers (description(100));');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
