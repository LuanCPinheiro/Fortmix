<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model {

    use HasFactory;

    protected $fillable = ['nome', 'slug'];

    protected static function boot() {
        parent::boot();

        // Gera o slug automaticamente antes de salvar
        static::saving(function ($tag) {
            $tag->slug = Str::slug($tag->nome);
        });
    }

}
