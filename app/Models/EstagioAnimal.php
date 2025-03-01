<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstagioAnimal extends Model {

    use HasFactory;
    
    protected $table = "estagios_animais";

    protected $fillable = [
        'nome',
        'icone',
    ];

    // Relacionamento com Produtos
    public function produtos() {
        return $this->belongsToMany(Produto::class, 'produto_estagio_animal')
                        ->withTimestamps();
    }

}
