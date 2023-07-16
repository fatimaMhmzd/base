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
        Schema::create('sending_methods', function (Blueprint $table) {
            $table->comment('جدول شیوه ارسال');
            $table->id();
            $table->string('title')->unique()->comment('عنوان');
            $table->integer('price')->nullable()->comment('مبلغ');
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
        Schema::dropIfExists('sending_methods');
    }
};
