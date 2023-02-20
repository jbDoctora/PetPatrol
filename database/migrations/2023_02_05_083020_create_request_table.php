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
            $table->string('pet_type');
            $table->string('pet');
            $table->string('vaccinated');
            $table->string('course');
            $table->string('info');
            $table->string('sessions');
            $table->string('date');
            $table->string('location');
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
