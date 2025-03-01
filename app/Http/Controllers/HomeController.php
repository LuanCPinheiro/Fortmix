<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Cidade;
use Illuminate\Http\Request;
use App\Models\Familia;
use App\Models\Produto;

class HomeController extends Controller {

    public function showProdutos($slug) {
        $produto = Produto::with([
                    'familia',
                    'pecuarias',
                    'nutrientes',
                    'periodos',
                    'estagiosAnimais'
                ])->where('slug', $slug)->firstOrFail();

        return view('showproduto', compact('produto'));
    }

    public function produtosCorte() {
        // Filtrar famílias que têm pelo menos um produto associado à pecuária "Corte"
        $familias = Familia::whereHas('produtos', function ($query) {
                    $query->whereHas('pecuarias', function ($pecuariaQuery) {
                        $pecuariaQuery->where('nome', 'Corte');
                    });
                })->with([
                    'produtos' => function ($query) {
                        $query->whereHas('pecuarias', function ($pecuariaQuery) {
                                    $pecuariaQuery->where('nome', 'Corte');
                                })->with(['periodos', 'estagiosAnimais']);
                    }
                ])->orderBy('ordem_exibicao')->get();

        return view('produtoscorte', compact('familias'));
    }

    public function produtosLeite() {
        $familias = Familia::whereHas('produtos', function ($query) {
                    $query->whereHas('pecuarias', function ($pecuariaQuery) {
                        $pecuariaQuery->where('nome', 'Leite');
                    });
                })->with([
                    'produtos' => function ($query) {
                        $query->whereHas('pecuarias', function ($pecuariaQuery) {
                                    $pecuariaQuery->where('nome', 'Leite');
                                })->with(['periodos', 'estagiosAnimais']);
                    }
                ])->orderBy('ordem_exibicao')->get();

        return view('produtosleite', compact('familias'));
    }

    public function regioesAtendidas() {
        $estados = [
            ['uf' => 12, 'sigla' => 'MS', 'nome' => 'Mato Grosso do Sul'],
            ['uf' => 13, 'sigla' => 'MT', 'nome' => 'Mato Grosso'],
            ['uf' => 9, 'sigla' => 'GO', 'nome' => 'Goiás'],
            ['uf' => 11, 'sigla' => 'MG', 'nome' => 'Minas Gerais'],
            ['uf' => 26, 'sigla' => 'SP', 'nome' => 'São Paulo']
        ];

        $cidadesPorEstado = [];

        foreach ($estados as $estado) {
            $cidades = Cidade::where('uf', $estado['uf'])
                    ->whereHas('representantes') // Verifica apenas se tem representantes
                    ->with(['estado', 'representantes' => function ($query) {
                            $query->where('repactive', '=', 1)->where('active', '=', 1); // Filtra apenas representantes ativos
                        }])
                    ->orderBy('nome')
                    ->get();
            $cidadesPorEstado[$estado['sigla']] = $cidades;
        }

        return view('regioesAtendidas', ['cidadesPorEstado' => $cidadesPorEstado]);
    }

    public function gerarSenha() {
        echo Hash::make('');
    }

    public function blog() {
        $posts = \App\Models\Post::where('status', 'publicado')->orderBy('created_at', 'desc')->paginate(6);
        return view('blog', compact('posts'));
    }

    public function showPost($slug) {
        $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
        return view('post', compact('post'));
    }

}
