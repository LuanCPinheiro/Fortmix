<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

    use HasApiTokens,
        HasFactory,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nivelpermissao',
        'active',
        'cidade_id',
        'sexo',
        'tel1',
        'tel2',
        'uf',
        'apelido',
        'cargo',
        'formacao',
        'repactive',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isSuper() {
        if ($this->nivelpermissao >= 5) {
            return true;
        } else {
            return false;
        }
    }

    public function onlySuper() {
        if ($this->nivelpermissao === 5) {
            return true;
        } else {
            return false;
        }
    }

    public function isRepresentante() {
        if ($this->nivelpermissao === 2) {
            return true;
        } else {
            return false;
        }
    }
    
    public function isAdmin() {
        if ($this->nivelpermissao === 6) {
            return true;
        } else {
            return false;
        }
    }

    public function cidade() {
        return $this->hasOne(Cidade::class, 'ibge', 'cidade_id');
    }

    // Define o relacionamento muitos para muitos com Cidade
    public function cidades() {
        return $this->belongsToMany(Cidade::class, 'representante_cidade', 'user_id', 'cidade_id');
    }

}
