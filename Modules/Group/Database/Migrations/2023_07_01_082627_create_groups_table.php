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
        Schema::create('groups_polymorphism', function (Blueprint $table) {
            $table->comment('جدول ذخیره انواع گروهبندی ها');
            $table->id();
            $table->morphs('groupable');
            $table->string('title')->nullable()->comment('عنوان');
            $table->string('sub_title')->nullable()->comment('زیر عنوان');
            $table->text('description')->nullable()->comment('توضیحات');
            $table->unsignedBigInteger('father_id')->default(0);
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
        Schema::dropIfExists('groups_polymorphism');
    }
};
