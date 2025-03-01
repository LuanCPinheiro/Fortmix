<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('produto_periodo', function (Blueprint $table) {
            $table->foreignId('produto_id')->constrained('produtos')->cascadeOnDelete();
            $table->foreignId('periodo_id')->constrained('periodos')->cascadeOnDelete();
            $table->timestamps();

            $table->primary(['produto_id', 'periodo_id']); // Chave primária composta
        });
    }

    public function down(): void {
        Schema::dropIfExists('produto_periodo');
    }
};
