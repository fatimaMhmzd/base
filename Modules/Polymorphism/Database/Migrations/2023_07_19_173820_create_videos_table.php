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
        Schema::create('videos_polymorphism', function (Blueprint $table) {
            $table->comment('جدول ذخیره فایل های ویدیویی');
            $table->id();
            $table->morphs('videoable');
            $table->string('title')->nullable()->comment('عنوان');
            $table->string('original_name')->nullable()->comment('نام اصلی فایل تصویری');
            $table->string('video')->comment('نام فایل تصویری');
            $table->string('type')->nullable()->comment('نوع فایل تصویری');
            $table->string('url')->nullable()->comment('آدرس کامل فایل تصویری');
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
        Schema::dropIfExists('videos_polymorphism');
    }
};
