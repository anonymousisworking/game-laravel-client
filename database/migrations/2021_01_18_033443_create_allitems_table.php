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
            $table->smallIncrements('item_id');
            $table->string('name');
            $table->enum('item_type', ['armor', 'weapon', 'potion', 'fish', 'plant', 'scroll', 'gift', 'trash', 'none'])->nullable();
            $table->enum('body_part', ['head', 'ear', 'neck', 'chest', 'gloves', 'finger', 'legs', 'feet', 'underwear', 'rhand', 'lhand', 'lrhand', 'none'])->nullable();
            $table->enum('armor_type', ['light', 'heavy', 'robe', 'none'])->nullable();
            $table->unsignedInteger('weight')->default(0);
            $table->enum('material', ['cloth', 'leather', 'wood', 'steel', 'none'])->nullable();
            $table->unsignedInteger('need_level')->default(0);
            $table->unsignedInteger('need_power')->default(0);
            $table->unsignedInteger('need_crit')->default(0);
            $table->unsignedInteger('need_evas')->default(0);
            $table->unsignedInteger('need_stam')->default(0);
            $table->enum('weapon_type', ['sword', 'dagger', 'ax', 'mace', 'fishing rod', 'none'])->nullable();
            $table->unsignedInteger('min_damage')->default(0);
            $table->unsignedInteger('max_damage')->default(0);
            $table->unsignedInteger('power')->default(0);
            $table->unsignedInteger('critical')->default(0);
            $table->unsignedInteger('evasion')->default(0);
            $table->unsignedInteger('stamina')->default(0);
            $table->unsignedInteger('hp')->default(0);
            $table->unsignedInteger('mf_crit')->default(0);
            $table->unsignedInteger('mf_acrit')->default(0);
            $table->unsignedInteger('mf_evas')->default(0);
            $table->unsignedInteger('mf_aevas')->default(0);
            $table->unsignedInteger('def_head')->default(0);
            $table->unsignedInteger('def_chest')->default(0);
            $table->unsignedInteger('def_abs')->default(0);
            $table->unsignedInteger('def_crotch')->default(0);
            $table->unsignedInteger('def_feet')->default(0);
            $table->unsignedInteger('sword_mastery')->default(0);
            $table->unsignedInteger('dagger_mastery')->default(0);
            $table->unsignedInteger('ax_mastery')->default(0);
            $table->unsignedInteger('mace_mastery')->default(0);
            $table->unsignedInteger('need_sword')->default(0);
            $table->unsignedInteger('need_dagger')->default(0);
            $table->unsignedInteger('need_ax')->default(0);
            $table->unsignedInteger('need_mace')->default(0);
            $table->unsignedDecimal('price', 10, 2)->default(0);
            $table->boolean('stackable')->default(0)->unsigned();
            $table->boolean('sellable')->default(1)->unsigned();
            $table->boolean('dropable')->default(1)->unsigned();
            $table->boolean('destroyable')->default(1)->unsigned();
            $table->boolean('tradeable')->default(1)->unsigned();
            $table->boolean('enchantable')->default(0)->unsigned();
            $table->unsignedInteger('enchant_level')->default(0);
            $table->integer('max_duration')->default(-1)->nullable();
            $table->integer('time')->nullable();
            $table->integer('time_action')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('skill')->nullable();
            $table->text('image')->nullable();
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
