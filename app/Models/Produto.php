<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produto extends Model {

    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo_sistema',
        'descricao_tecnica',
        'descricao_comercial',
        'indicacao_uso',
        'modo_uso',
        'icone',
        'banner',
        'pronto_para_uso',
        'familia_id',
        'pecuaria_id',
        'subfamilia',
        'slug'
    ];

    // Evento de salvamento para gerar slug automaticamente
    protected static function boot() {
        parent::boot();

        static::saving(function ($produto) {
            if (empty($produto->slug)) {
                $produto->slug = Str::slug($produto->nome);
            }
        });
    }

    // Relacionamento com Família
    public function familia() {
        return $this->belongsTo(Familia::class);
    }

    // Relacionamento com Pecuária principal (única)
    public function pecuaria() {
        return $this->belongsTo(Pecuaria::class);
    }

    // Relacionamento com Nutrientes
    public function nutrientes() {
        return $this->belongsToMany(Nutriente::class, 'nutriente_produto')
                        ->withPivot('minimo', 'maximo', 'medidamin', 'medidamax') // Campos adicionais na pivot
                        ->withTimestamps();
    }

    // Relacionamento com Estágios Animais
    public function estagiosAnimais() {
        return $this->belongsToMany(EstagioAnimal::class, 'produto_estagio_animal')
                        ->withTimestamps();
    }

    // Relacionamento com Períodos
    public function periodos() {
        return $this->belongsToMany(Periodo::class, 'produto_periodo')
                        ->withTimestamps();
    }

    // Relacionamento com Pecuárias adicionais (pivot)
    public function pecuarias() {
        return $this->belongsToMany(Pecuaria::class, 'produto_pecuaria', 'produto_id', 'pecuaria_id');
    }

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_produto')
                        ->withTimestamps();
    }

}
