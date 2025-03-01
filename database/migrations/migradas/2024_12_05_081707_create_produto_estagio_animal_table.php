<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('produto_estagio_animal', function (Blueprint $table) {
            $table->foreignId('produto_id')->constrained('produtos')->cascadeOnDelete();
            $table->foreignId('estagio_animal_id')->constrained('estagios_animais')->cascadeOnDelete();
            $table->timestamps();

            $table->primary(['produto_id', 'estagio_animal_id']); // Chave primária composta
        });
    }

    public function down(): void {
        Schema::dropIfExists('produto_estagio_animal');
    }
};
