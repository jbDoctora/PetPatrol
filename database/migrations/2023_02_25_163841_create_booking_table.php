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
            $table->integer('pet_id')->nullable();
            $table->integer('client_id');
            $table->foreignId('request_id')->onDelete('cascade');
            $table->integer('trainer_id');
            $table->string('client_name');
            $table->string('trainer_name');
            $table->string('status');
            $table->string('payment')->default('unpaid')->nullable();
            $table->longText('reason_reject')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('isDone')->default(0);
            $table->string('gcash_refnum')->nullable();
            $table->boolean('isRated')->default(0);
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
