<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->comment('جدول اطلاعات اشخاص(کاربران)');
            $table->id();
            $table->string('name')->nullable()->comment('نام');
            $table->string('family')->nullable()->comment('نام خانوادگی');
            $table->string('full_name')->nullable()->comment('نام و نام خانوادگی');
            $table->string('father')->nullable()->comment('نام پدر');
            $table->string('national_code')->unique()->nullable()->comment('کد ملی');
            $table->tinyInteger('gender')->nullable()->comment('جنسیت');
            $table->date('birthday')->nullable()->comment('تاریخ تولد');
            $table->string('username')->nullable()->comment('نام کاربری - برای لاگین');
            $table->string('password')->nullable()->comment('رمز عبور');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->unique();
            $table->string('nationalCode')->unique()->nullable();
            $table->string('code')->default(0);
            $table->string('career')->nullable();
            $table->string('degree')->nullable();
            $table->tinyInteger('status')->nullable()->comment('وضعیت کاربر');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
