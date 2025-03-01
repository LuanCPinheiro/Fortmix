<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Produto;
use App\Models\Tag;
use App\Models\User;

class Post extends Model {

    use HasFactory;

    protected $fillable = [
        'titulo', 'slug', 'descricao', 'conteudo', 'imagem_capa', 'autor_id', 'status', 'publicado_em',
    ];

    protected static function boot() {
        parent::boot();

        // Gera o slug automaticamente
        static::saving(function ($post) {
            $post->slug = Str::slug($post->titulo);
        });
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'post_tag')->withTimestamps();
    }

    public function produtos() {
        return $this->belongsToMany(Produto::class, 'post_produto')->withTimestamps();
    }

    public function autor() {
        return $this->belongsTo(User::class, 'autor_id'); // Substitua 'User' pela classe da sua model de autores, caso seja diferente
    }

}
