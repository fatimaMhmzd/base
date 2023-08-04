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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('town_id')->default(0);
            $table->unsignedBigInteger('area_id')->default(0);
            $table->text('address');
            $table->string('post_code');
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('national_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->text('total_address');
            $table->longText('description')->nullable();
            $table->longText('en_description')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('addresses');
    }
};
