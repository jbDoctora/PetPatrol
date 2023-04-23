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
        Schema::create('request', function (Blueprint $table) {
            $table->id('request_id');
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('pet_id')->onDelete('cascade');
            $table->string('pet_type')->nullable();
            $table->string('pet_name')->nullable();
            $table->string('course')->nullable();
            $table->string('sessions')->nullable();
            $table->string('location')->nullable();
            $table->string('request_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
};
