<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;
use App\Models\User;

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
    
    // Define o relacionamento muitos para muitos com User
    public function representantes() {
        return $this->belongsToMany(User::class, 'representante_cidade', 'cidade_id', 'user_id');
    }

}
