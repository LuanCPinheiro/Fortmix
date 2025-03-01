<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('descricao');
            $table->longText('conteudo');
            $table->string('imagem_capa')->nullable();
            $table->foreignId('autor_id')->constrained('users'); // Referencia a tabela usuarios
            $table->enum('status', ['rascunho', 'publicado', 'arquivado'])->default('rascunho');
            $table->timestamp('publicado_em')->nullable();
            $table->bigInteger('visualizacoes')->default(0);
            $table->boolean('destaque')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        //
    }
};
