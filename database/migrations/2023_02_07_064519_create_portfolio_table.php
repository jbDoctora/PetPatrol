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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id('portfolio_id');
            $table->foreignId('user_id')->onDelete('cascade');
            $table->longText('about_me');
            $table->string('services');
            $table->string('type');
            $table->string('certificates');
            $table->longText('experience');
            $table->string('journey_photos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio');
    }
};
