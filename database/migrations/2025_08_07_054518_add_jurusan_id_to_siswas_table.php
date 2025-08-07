<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('siswas', function (Blueprint $table) {
        $table->foreignId('jurusan_id')->nullable()->constrained()->onDelete('set null');
    });
}

public function down()
{
    Schema::table('siswas', function (Blueprint $table) {
        $table->dropForeign(['jurusan_id']);
        $table->dropColumn('jurusan_id');
    });
}

};

