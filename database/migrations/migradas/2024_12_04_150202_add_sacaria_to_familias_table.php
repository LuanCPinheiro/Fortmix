<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('familias', function (Blueprint $table) {
            $table->string('sacaria')->nullable()->after('banner'); // Campo para a arte da sacaria
        });
    }

    public function down() {
        Schema::table('familias', function (Blueprint $table) {
            $table->dropColumn('sacaria');
        });
    }
};
