<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedSmallInteger('item_id');
            $table->string('type')->index();
            $table->unsignedInteger('count')->default(1);
            $table->unsignedInteger('enchant_level')->default(0);
            $table->enum('loc', ['INVENTORY', 'WEARING', 'BANK']);
            $table->unsignedInteger('time_left')->index()->nullable();
            $table->unsignedInteger('duration')->deafault(1)->nullable();
            $table->unsignedInteger('max_duration')->deafault(1)->nullable();
            $table->unsignedInteger('using')->nullable()->index();
            $table->unsignedInteger('order')->nullable();
            $table->timestamps();
            $table->unique(['id', 'owner_id']);
            $table->unique(['owner_id', 'item_id']);
            $table->unique(['owner_id', 'using']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
