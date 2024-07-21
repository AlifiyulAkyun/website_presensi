<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('label');
            $table->string('confident');
            $table->string('datetime');
            $table->timestamps();  // Tambahkan ini
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};