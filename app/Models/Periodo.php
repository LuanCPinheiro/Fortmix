<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model {

    use HasFactory;

    protected $fillable = [
        'nome',
        'icone',
    ];

    // Relacionamento com Produtos
    public function produtos() {
        return $this->belongsToMany(Produto::class, 'produto_periodo')
                        ->withTimestamps();
    }

}
