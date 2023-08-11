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
        Schema::create('subTostd', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('standard_id');
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subTostd', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['subject_id']);
            $table->dropForeign(['standard_id']);
        });

        Schema::dropIfExists('subTostd');
    }
};
