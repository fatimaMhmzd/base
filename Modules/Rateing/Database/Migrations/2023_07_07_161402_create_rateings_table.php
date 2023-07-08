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
        Schema::create('rateings', function (Blueprint $table) {
            $table->id();
            $table->morphs('rateingable');
            $table->integer('user_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('rating')->default(0);
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
        Schema::dropIfExists('rateings');
    }
};
