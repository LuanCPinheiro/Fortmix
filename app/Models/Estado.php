<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pais;
use App\Models\Cidade;

class Estado extends Model {

    use HasFactory;

    protected $table = 'estado';
    protected $fillable = [
        'nome',
        'uf',
        'ibge',
        'pais',
        'ddd'
    ];

    public function paisf() {
        return $this->hasOne(Pais::class, 'id', 'pais');
    }

    public function cidade($param) {
        return $this->hasMany(Cidade::class);
    }

}
