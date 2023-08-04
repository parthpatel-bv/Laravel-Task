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
        Schema::create('chapTosub', function (Blueprint $table) 
        {
        $table->id();
        $table->unsignedBigInteger('subject_id');
        $table->unsignedBigInteger('chapter_id');
        $table->timestamps();

        $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
                Schema::dropIfExists('chapTosub');

    }
};
