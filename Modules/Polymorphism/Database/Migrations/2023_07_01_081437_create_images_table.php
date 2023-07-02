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
        Schema::create('images_polymorphism', function (Blueprint $table) {
            $table->comment('جدول ذخیره عکس های پروژه');
            $table->id();
            $table->morphs('imageable');
            $table->string('title')->nullable()->comment('عنوان');
            $table->string('original_name')->nullable()->comment('نام اصلی عکس');
            $table->string('image')->nullable()->comment('نام عکس');
            $table->string('type')->nullable()->comment('نوع عکس');
            $table->string('url')->nullable()->comment('آدرس کامل عکس');
            $table->boolean('is_cover')->nullable()->comment('');
            $table->boolean('is_public')->nullable()->comment('');
            $table->boolean('is_water_mark')->nullable()->comment('');
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
        Schema::dropIfExists('images_polymorphism');
    }
};
