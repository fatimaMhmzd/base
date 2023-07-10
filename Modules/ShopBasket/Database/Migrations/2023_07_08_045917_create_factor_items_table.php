<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factor_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('factor_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id')->default(0);
            $table->unsignedBigInteger('size_id')->default(0);
            $table->integer('count')->default(0);
            $table->integer('last_price');
            $table->tinyInteger('this_poroduct_statues');
            $table->unsignedBigInteger('product_properties_id');
            $table->softDeletes();
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
        Schema::dropIfExists('factor_items');
    }
};
