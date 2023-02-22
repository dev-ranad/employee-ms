<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('image')->default('image.jpg');
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('wallet')->nullable();
            $table->boolean('status')->default(0);
            $table->string('password');
            $table->boolean('kyc_info')->nullable();
            $table->boolean('kyc_reject_reason')->nullable();
            $table->boolean('kyc_status')->default(0);
            $table->boolean('email_verified')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('access_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
