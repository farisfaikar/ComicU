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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('comic_id');
            $table->string('title');
            $table->text('content');
            $table->integer('stars');
            $table->timestamps();

            // foreign key constraint
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('comic_id')->references('id')->on('comics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
