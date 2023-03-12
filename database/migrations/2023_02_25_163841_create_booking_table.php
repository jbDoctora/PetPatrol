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
        Schema::create('booking', function (Blueprint $table) {
            $table->id('book_id');
            $table->foreignId('service_id')->onDelete('cascade');
            $table->integer('pet_id');
            $table->integer('client_id');
            $table->integer('trainer_id');
            $table->string('client_name');
            $table->string('trainer_name');
            $table->string('status');
            $table->string('payment');
            $table->string('start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};
