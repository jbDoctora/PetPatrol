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
        Schema::create('pet_info', function (Blueprint $table) {
            $table->id('pet_id');
            $table->foreignId('owner_id')->onDelete('cascade');
            $table->string('type');
            $table->string('image')->nullable();
            $table->string('pet_name');
            $table->string('years');
            $table->string('months');
            $table->string('breed');
            $table->string('weight');
            $table->longText('info');
            $table->string('vaccine');
            $table->string('vaccine_list');
            $table->string('book_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_info');
    }
};
