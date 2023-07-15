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
        Schema::create('factors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->integer('total_part_price')->nullable()->comment('جمع جزء');
            $table->integer('total_amount')->nullable()->comment('مجموع');
            $table->integer('shipping_amount')->nullable()->comment('هزینه ی ارسال');
            $table->tinyInteger('send_method')->default(0)->comment('شیوه ارسال ');
            $table->tinyInteger('factor_status')->default(0)->comment('وضعیت فاکتور');
            $table->tinyInteger('status')->default(0)->comment('وضعیت مرسوله');
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
        Schema::dropIfExists('factors');
    }
};
