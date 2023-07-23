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
        Schema::create('product_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('عنوان');
            $table->string('sub_title')->nullable()->comment('زیر عنوان');
            $table->string('slug')->nullable();
            $table->text('description')->nullable()->comment('توضیحات');
            $table->integer('father_id')->default(0);
            $table->smallInteger('sort_id')->default(0);
            $table->boolean('display_on_homepage')->default(0);
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
        Schema::dropIfExists('product_groups');
    }
};
