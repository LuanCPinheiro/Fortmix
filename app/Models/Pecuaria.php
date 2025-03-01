<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pecuaria extends Model {

    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'icone',
        'banner',
    ];

    // Relacionamento com Produtos principais
    public function produtos() {
        return $this->belongsToMany(Produto::class, 'produto_pecuaria', 'pecuaria_id', 'produto_id');
    }

    // Relacionamento com Produtos adicionais (pivot)
    public function produtosPivot() {
        return $this->belongsToMany(Produto::class, 'produto_pecuaria')
                        ->withTimestamps();
    }

}
