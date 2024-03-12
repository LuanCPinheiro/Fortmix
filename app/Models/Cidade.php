<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;
use App\Models\Representantes;

class Cidade extends Model {

    use HasFactory;

    protected $table = 'cidade';
    protected $fillable = [
        'nome',
        'uf',
        'ibge',
        'atendida'
    ];

    public function estado() {
        return $this->hasOne(Estado::class, 'id', 'uf');
    }
    
    public function representantes() {
        return $this->hasMany(Representantes::class, 'cidade_id', 'id');
    }

}
