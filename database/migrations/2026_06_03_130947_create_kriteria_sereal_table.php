<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kriteria_sereal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sereal_id')->constrained('sereal')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('kriteria_id')->constrained('kriteria')->onUpdate('cascade')->onDelete('restrict');
            $table->decimal('value', 8, 2); 
            $table->timestamps();
            $table->unique(['sereal_id', 'kriteria_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kriteria_sereal');
    }
};