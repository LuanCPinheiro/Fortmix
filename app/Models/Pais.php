<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;

class Pais extends Model {

    use HasFactory;

    protected $table = 'pais';
    
    protected $fillable = [
        'nome',
        'nome_pt',
        'sigla',
        'bacen'
    ];
    
    public function estado($param) {
        return $this->hasMany(Estado::class);
    }
}
