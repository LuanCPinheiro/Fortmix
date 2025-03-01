<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutriente extends Model {

    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'unidade_medida',
    ];

    // Relacionamento com Produtos
    public function produtos() {
        return $this->belongsToMany(Produto::class, 'nutriente_produto')
                        ->withPivot('minimo', 'maximo', 'medidamin', 'medidamax') // Campos adicionais na pivot
                        ->withTimestamps();
    }

}
