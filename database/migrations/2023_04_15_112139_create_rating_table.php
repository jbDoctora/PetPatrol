<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->integer('stars');
            $table->foreignId('service_id')->onDelete('cascade');
            $table->foreignId('client_id')->onDelete('cascade');
            $table->foreignId('trainer_id')->onDelete('cascade');
            $table->foreignId('book_id')->onDelete('cascade');
            $table->string('comment');
            $table->date('date_created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
};
