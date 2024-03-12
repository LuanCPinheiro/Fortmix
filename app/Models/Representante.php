<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cidade;
use App\Models\User;

class Representante extends Model {

    use HasFactory;
    
    protected $table = 'representantes';
    protected $fillable = [
        'cidade_id',
        'nome',
        'sexo',
        'tel1',
        'tel2',
        'uf',
        'apelido',
        'cargo',
        'formacao',
        'active'
    ];

    public function cidade() {
        return $this->hasOne(Cidade::class, 'id', 'cidade_id');
    }
    
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
