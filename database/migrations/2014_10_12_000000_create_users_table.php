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
            $table->string('name');
            $table->string('birthday')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('id_verify')->nullable();
            $table->string('email')->unique();
            $table->integer('role');
            $table->string('gcash_qr')->nullable();
            $table->string('gcash_number')->nullable();
            $table->boolean('admin_approve')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
