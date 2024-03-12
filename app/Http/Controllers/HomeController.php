<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function gerarSenha() {
        echo Hash::make('');
    }
}
