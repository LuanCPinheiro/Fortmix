<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('codigo_sistema')->nullable();
            $table->text('descricao_tecnica');
            $table->text('descricao_comercial');
            $table->text('indicacao_uso');
            $table->text('modo_uso');
            $table->string('icone')->nullable();
            $table->string('banner')->nullable();
            $table->boolean('pronto_para_uso')->default(false);
            $table->foreignId('familia_id')->constrained('familias')->cascadeOnDelete();
            $table->foreignId('pecuaria_id')->nullable()->constrained('pecuarias')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('produtos');
    }
};
