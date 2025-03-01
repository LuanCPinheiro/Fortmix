<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('representante_cidade', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->integer('cidade_id')->unsigned();

            // Define a chave primária composta
            $table->primary(['user_id', 'cidade_id']);

            // Define as chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cidade_id')->references('id')->on('cidade')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Corrige o nome da tabela para a correta
        Schema::dropIfExists('representante_cidade');
    }
};
