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
    Schema::create('jurusans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('guru_id')->nullable(); // Guru pengampu
        $table->timestamps();

        $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('set null');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
