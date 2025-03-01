<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('idMSPantanal')->nullable()->unique(); // ID do banco legado, único mas pode ser nulo
            $table->string('Endereco')->nullable();
            $table->string('Numero', 10)->nullable();
            $table->string('Bairro', 50)->nullable();
            $table->string('Cidade', 50)->nullable();
            $table->string('Estado', 2)->nullable();
            $table->string('Cep', 8)->nullable();
            $table->string('Telefone', 15)->nullable();
            $table->string('Celular', 15)->nullable();
            $table->string('Rg', 15)->nullable();
            $table->string('Cpf', 11)->unique();
            $table->date('Admissao')->nullable();
            $table->date('Nascimento')->nullable();
            $table->decimal('Salario', 10, 2)->nullable();
            $table->decimal('ComissaoProdutos', 10, 2)->nullable();
            $table->decimal('ComissaoServicos', 10, 2)->nullable();
        });
    }

    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['idMSPantanal']); // Remover restrição única ao reverter
            $table->dropColumn([
                'idMSPantanal', 'Endereco', 'Numero', 'Bairro', 'Cidade', 'Estado',
                'Cep', 'Telefone', 'Celular', 'Rg', 'Cpf', 'Admissao', 'Nascimento',
                'Salario', 'ComissaoProdutos', 'ComissaoServicos'
            ]);
        });
    }
};

