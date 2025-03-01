<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('nutrientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->string('unidade_medida')->nullable(); // Ex: %, mg/kg, UI/kg
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('nutrientes');
    }
};
