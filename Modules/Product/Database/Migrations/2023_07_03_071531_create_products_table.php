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
        Schema::create('products', function (Blueprint $table) {
            $table->comment('جدول اطلاعات محصولات');
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('brand');
            $table->string('full_title');
            $table->unsignedBigInteger('product_group_id');
            $table->integer('price')->default(0);
            $table->integer('off_price')->default(0);
            $table->integer('off')->default(0);
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('available')->default(0);
            $table->string('slug')->nullable();
            $table->string('link')->nullable();
            $table->text('key_word')->nullable();
            $table->text('seo_description')->nullable();
            $table->bigInteger('weight')->default(0);
            $table->bigInteger('weight_with_packaging')->default(0);
            $table->integer('unit_weight')->default(0);
            $table->tinyInteger('status');
            $table->bigInteger('barcode')->nullable();
            $table->unsignedBigInteger('creator')->nullable();
            $table->unsignedBigInteger('updater')->nullable();
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
        Schema::dropIfExists('products');
    }
};
