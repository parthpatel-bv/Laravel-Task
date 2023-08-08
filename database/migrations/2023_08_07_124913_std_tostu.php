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
        Schema::create('stdtostu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_data_id');
            $table->unsignedBigInteger('standard_id');
            $table->timestamps();

            $table->foreign('user_data_id')->references('id')->on('user_datas')->onDelete('cascade');
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
            return re);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stdtostu');
        
    }
};
