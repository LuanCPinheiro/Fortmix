<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Familia;
use App\Models\Pecuaria;
use App\Models\Periodo;
use App\Models\EstagioAnimal;
use App\Models\Nutriente;
use Illuminate\Http\Request;

class ProdutoController extends Controller {

    // Lista de produtos, agrupados por família
    public function index() {
        $familias = Familia::with('produtos')->get();
        $nutrientes = Nutriente::all();
        $pecuarias = Pecuaria::all();
        $periodos = Periodo::all();
        $estagios = EstagioAnimal::all();

        return view('produtos.index', compact('familias', 'nutrientes', 'pecuarias', 'periodos', 'estagios'));
    }

    // Tela de criação de produto
    public function create() {
        $familias = Familia::all(); // Carrega as famílias para o select
        return view('produtos.createEdit', compact('familias'));
    }

    // Processa o cadastro do produto
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'codigo_sistema' => 'nullable|string|max:255',
            'descricao_tecnica' => 'required|string',
            'descricao_comercial' => 'required|string',
            'indicacao_uso' => 'required|string',
            'modo_uso' => 'required|string',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'pronto_para_uso' => 'nullable|boolean',
            'familia_id' => 'required|exists:familias,id',
        ]);

        $data = $request->only([
            'nome', 'codigo_sistema', 'descricao_tecnica', 'descricao_comercial',
            'indicacao_uso', 'modo_uso', 'pronto_para_uso', 'familia_id'
        ]);

        // Processar uploads
        if ($request->hasFile('icone')) {
            $data['icone'] = $request->file('icone')->store('produtos/icones', 'public');
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('produtos/banners', 'public');
        }

        Produto::create($data);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    // Tela de edição do produto
    public function edit(Produto $produto) {
        $familias = Familia::all(); // Carrega as famílias para o select
        return view('produtos.createEdit', compact('produto', 'familias'));
    }

    // Processa a atualização do produto
    public function update(Request $request, Produto $produto) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'codigo_sistema' => 'nullable|string|max:255',
            'descricao_tecnica' => 'required|string',
            'descricao_comercial' => 'required|string',
            'indicacao_uso' => 'required|string',
            'modo_uso' => 'required|string',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'pronto_para_uso' => 'nullable|boolean',
            'familia_id' => 'required|exists:familias,id',
        ]);

        $data = $request->only([
            'nome', 'codigo_sistema', 'descricao_tecnica', 'descricao_comercial',
            'indicacao_uso', 'modo_uso', 'pronto_para_uso', 'familia_id'
        ]);

        // Atualizar uploads
        if ($request->hasFile('icone')) {
            if ($produto->icone) {
                \Storage::disk('public')->delete($produto->icone);
            }
            $data['icone'] = $request->file('icone')->store('produtos/icones', 'public');
        }

        if ($request->hasFile('banner')) {
            if ($produto->banner) {
                \Storage::disk('public')->delete($produto->banner);
            }
            $data['banner'] = $request->file('banner')->store('produtos/banners', 'public');
        }

        $produto->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Exclui um produto
    public function destroy(Produto $produto) {
        if ($produto->icone) {
            \Storage::disk('public')->delete($produto->icone);
        }
        if ($produto->banner) {
            \Storage::disk('public')->delete($produto->banner);
        }
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }

    // Gerenciamento de Nutrientes
    public function nutrientes(Produto $produto) {
        $nutrientes = Nutriente::all();
        $pivot = $produto->nutrientes->keyBy('id');
        return view('produtos.nutrientes', compact('produto', 'nutrientes', 'pivot'));
    }

    public function saveNutrientes(Request $request, Produto $produto) {
        $nutrientes = $request->input('nutrientes', []);
        $syncData = [];
        foreach ($nutrientes as $nutrienteId => $data) {
            if (!empty($data['minimo']) || !empty($data['maximo'])) {
                $syncData[$nutrienteId] = [
                    'minimo' => $data['minimo'] ?? null,
                    'maximo' => $data['maximo'] ?? null,
                    'medidamin' => $data['medidamin'] ?? null,
                    'medidamax' => $data['medidamax'] ?? null,
                ];
            }
        }
        $produto->nutrientes()->sync($syncData);

        return redirect()->route('produtos.index')->with('success', 'Nutrientes atualizados com sucesso!');
    }

    // Gerenciamento de Pecuárias
    public function pecuarias(Produto $produto) {
        $pecuarias = Pecuaria::all();
        $pivot = $produto->pecuarias->pluck('id')->toArray();
        return view('produtos.pecuarias', compact('produto', 'pecuarias', 'pivot'));
    }

    public function savePecuarias(Request $request, Produto $produto) {
        $pecuarias = $request->input('pecuarias', []);
        $produto->pecuarias()->sync($pecuarias);

        return redirect()->route('produtos.index')->with('success', 'Pecuárias atualizadas com sucesso!');
    }

    // Gerenciamento de Períodos
    public function periodos(Produto $produto) {
        $periodos = Periodo::all();
        $pivot = $produto->periodos->pluck('id')->toArray();
        return view('produtos.periodos', compact('produto', 'periodos', 'pivot'));
    }

    public function savePeriodos(Request $request, Produto $produto) {
        $periodos = $request->input('periodos', []);
        $produto->periodos()->sync($periodos);

        return redirect()->route('produtos.index')->with('success', 'Períodos atualizados com sucesso!');
    }

    // Gerenciamento de Estágios Animais
    public function estagiosAnimais(Produto $produto) {
        $estagios = EstagioAnimal::all();
        $pivot = $produto->estagiosAnimais->pluck('id')->toArray();
        return view('produtos.estagios', compact('produto', 'estagios', 'pivot'));
    }

    public function saveEstagiosAnimais(Request $request, Produto $produto) {
        $estagios = $request->input('estagios', []);
        $produto->estagiosAnimais()->sync($estagios);

        return redirect()->route('produtos.index')->with('success', 'Estágios Animais atualizados com sucesso!');
    }

}
