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
        Schema::create('sizes', function (Blueprint $table) {
            $table->comment('جدول اندازه ها');
            $table->id();
            $table->unsignedBigInteger('unit_id')->default(0);
            $table->string('title')->unique()->comment('عنوان');
            $table->string('sub_title')->nullable()->comment('زیر عنوان');
            $table->text('description')->nullable()->comment('توضیحات');
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
        Schema::dropIfExists('sizes');
    }
};
