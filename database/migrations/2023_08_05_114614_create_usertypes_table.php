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
        Schema::create('usertypes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('access_id');
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('userdatas')->onDelete('cascade');
            $table->foreign('access_id')->references('id')->on('accesstypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usertypes', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['userid']);
            $table->dropForeign(['access_id']);
        });

        Schema::dropIfExists('usertypes');
    }
};
