<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // relasi dengan tabel users
            $table->foreignId('comic_id')->constrained(); // relasi dengan tabel comics
            $table->text('comment');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
