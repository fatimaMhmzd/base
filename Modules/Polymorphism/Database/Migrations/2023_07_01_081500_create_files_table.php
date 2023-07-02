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
        Schema::create('files_polymorphism', function (Blueprint $table) {
            $table->comment('جدول ذخیره انواع فایل ها');
            $table->id();
            $table->morphs('fileable');
            $table->string('title')->nullable()->comment('عنوان');
            $table->string('original_name')->nullable()->comment('نام اصلی فایل');
            $table->string('file')->comment('نام فایل');
            $table->string('type')->nullable()->comment('نوع فایل');
            $table->string('url')->nullable()->comment('آدرس کامل فایل');
            # $table->tinyInteger('status')->nullable()->comment(''); todo it's necessary
            $table->timestamps();
            # $table->softDeletes(); todo it's necessary
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files_polymorphism');
    }
};
