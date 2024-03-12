<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Cidade;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function regioesAtendidas() {
        $obj = new Cidade();
        $cidadesMS = $obj->where('uf', '=', 12)->where('atendida', '=', 1)->orderBy('nome')->get();
        $cidadesMT = $obj->where('uf', '=', 13)->where('atendida', '=', 1)->orderBy('nome')->get();
        $cidadesGO = $obj->where('uf', '=', 9)->where('atendida', '=', 1)->orderBy('nome')->get();
        $cidadesMG = $obj->where('uf', '=', 11)->where('atendida', '=', 1)->orderBy('nome')->get();
        $cidadesSP = $obj->where('uf', '=', 26)->where('atendida', '=', 1)->orderBy('nome')->get();

        return view('regioesAtendidas', ['cidadesMS' => $cidadesMS,
            'cidadesMT' => $cidadesMT,
            'cidadesGO' => $cidadesGO,
            'cidadesMG' => $cidadesMG,
            'cidadesSP' => $cidadesSP,]);
    }
    
    public function gerarSenha() {
        echo Hash::make('');
    }
}
