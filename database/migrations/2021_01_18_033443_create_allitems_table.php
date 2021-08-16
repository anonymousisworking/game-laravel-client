<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allitems', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->enum('item_type', ['armor', 'weapon', 'potion', 'fish', 'herb', 'scroll'])->nullable();
            $table->enum('armor_type', ['light', 'heavy', 'robe']);
            $table->enum('body_part', ['head', 'ear', 'neck', 'chest', 'gloves', 'finger', 'legs', 'feet', 'underwear']);
            $table->unsignedInteger('weight')->deafault(0);
            $table->enum('material', ['cloth', 'leather', 'wood', 'steel'])->nullable();
            $table->unsignedInteger('need_level')->deafault(0);
            $table->unsignedInteger('need_power')->deafault(0);
            $table->unsignedInteger('need_critical')->deafault(0);
            $table->unsignedInteger('need_evasion')->deafault(0);
            $table->unsignedInteger('need_stamina')->deafault(0);
            $table->enum('weapon_type', ['sword', 'dagger', 'ax', 'mace', 'fishing rod']);
            $table->unsignedInteger('min_damage')->deafault(0);
            $table->unsignedInteger('max_damage')->deafault(0);
            $table->unsignedInteger('power')->deafault(0);
            $table->unsignedInteger('critical')->deafault(0);
            $table->unsignedInteger('evasion')->deafault(0);
            $table->unsignedInteger('stamina')->deafault(0);
            $table->unsignedInteger('hp')->deafault(0);
            $table->unsignedInteger('mf_critical')->deafault(0);
            $table->unsignedInteger('mf_anti_critical')->deafault(0);
            $table->unsignedInteger('mf_evasion')->deafault(0);
            $table->unsignedInteger('mf_anti_evasion')->deafault(0);
            $table->unsignedInteger('def_head')->deafault(0);
            $table->unsignedInteger('def_chest')->deafault(0);
            $table->unsignedInteger('def_abs')->deafault(0);
            $table->unsignedInteger('def_crotch')->deafault(0);
            $table->unsignedInteger('def_feet')->deafault(0);
            $table->unsignedInteger('sword_mastery')->deafault(0);
            $table->unsignedInteger('dagger_mastery')->deafault(0);
            $table->unsignedInteger('ax_mastery')->deafault(0);
            $table->unsignedInteger('mace_mastery')->deafault(0);
            $table->unsignedInteger('need_sword')->deafault(0);
            $table->unsignedInteger('need_dagger')->deafault(0);
            $table->unsignedInteger('need_ax')->deafault(0);
            $table->unsignedInteger('need_mace')->deafault(0);
            $table->unsignedDecimal('price', 10, 2)->deafault(0);
            $table->boolean('stackable')->deafault(0)->unsigned();
            $table->unsignedInteger('enchant_level')->deafault(0);
            $table->unsignedInteger('max_duration')->deafault(1)->nullable();
            $table->unsignedInteger('time')->nullable();
            $table->unsignedInteger('time_action')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('skill');
            $table->text('image')->nullable();
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
        Schema::dropIfExists('allitems');
    }
}
