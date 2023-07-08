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
        Schema::create('location_areas', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id')->default(1);
            $table->integer('province_id')->default(0);
            $table->integer('city_id')->default(0);
            $table->integer('town_id')->default(0);
            $table->string('fa_name');
            $table->string('en_name')->nullable();
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
        Schema::dropIfExists('location_areas');
    }
};
