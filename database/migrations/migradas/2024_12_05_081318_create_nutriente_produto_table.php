<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('nutriente_produto', function (Blueprint $table) {
            $table->foreignId('produto_id')->constrained('produtos')->cascadeOnDelete();
            $table->foreignId('nutriente_id')->constrained('nutrientes')->cascadeOnDelete();
            $table->text('minimo')->nullable();
            $table->text('maximo')->nullable();
            $table->string('medidamin')->nullable();
            $table->string('medidamax')->nullable();
            $table->timestamps();

            $table->primary(['produto_id', 'nutriente_id']); // Chave primária composta
        });
    }

    public function down(): void {
        Schema::dropIfExists('nutriente_produto');
    }
};
