<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('produto_pecuaria', function (Blueprint $table) {
            $table->foreignId('produto_id')->constrained('produtos')->cascadeOnDelete();
            $table->foreignId('pecuaria_id')->constrained('pecuarias')->cascadeOnDelete();
            $table->timestamps();

            $table->primary(['produto_id', 'pecuaria_id']); // Chave primária composta
        });
    }

    public function down(): void {
        Schema::dropIfExists('produto_pecuaria');
    }
};
