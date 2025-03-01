<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliotecaTable extends Migration {

    public function up() {
        Schema::create('biblioteca', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->index(); // Nome da imagem
            $table->string('alt')->nullable(); // Texto alternativo
            $table->text('descricao')->nullable(); // Descrição da imagem
            $table->string('url'); // URL da imagem no storage
            $table->unsignedBigInteger('tamanho')->nullable(); // Tamanho do arquivo em bytes
            $table->string('tipo')->nullable(); // Tipo MIME do arquivo (ex.: image/jpeg)
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down() {
        Schema::dropIfExists('biblioteca');
    }

}
