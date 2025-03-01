<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model {

    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'icone',
        'banner',
        'sacaria',
        'ordem_exibicao'
    ];

    // Relacionamento com Produtos
    public function produtos() {
        return $this->hasMany(Produto::class);
    }

}
