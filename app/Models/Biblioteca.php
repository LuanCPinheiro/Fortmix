<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model {

    use HasFactory;

    // Tabela associada
    protected $table = 'biblioteca';
    // Campos preenchíveis
    protected $fillable = [
        'nome',
        'alt',
        'descricao',
        'url',
        'tamanho',
        'tipo',
    ];

}
