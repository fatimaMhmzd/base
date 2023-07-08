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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->bigInteger('creator_user_id')->nullable();
            $table->bigInteger('updator_user_id')->nullable();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('link')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
