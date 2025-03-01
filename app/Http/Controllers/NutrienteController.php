<?php

namespace App\Http\Controllers;

use App\Models\Nutriente;
use Illuminate\Http\Request;

class NutrienteController extends Controller {

    public function index() {
        $nutrientes = Nutriente::all();
        return view('nutrientes.index', compact('nutrientes'));
    }

    public function create() {
        return view('nutrientes.createEdit');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'unidade_medida' => 'nullable|string|max:255',
        ]);

        Nutriente::create($request->all());

        return redirect()->route('nutrientes.index')->with('success', 'Nutriente criado com sucesso!');
    }

    public function edit(Nutriente $nutriente) {
        return view('nutrientes.createEdit', compact('nutriente'));
    }

    public function update(Request $request, Nutriente $nutriente) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'unidade_medida' => 'nullable|string|max:255',
        ]);

        $nutriente->update($request->all());

        return redirect()->route('nutrientes.index')->with('success', 'Nutriente atualizado com sucesso!');
    }

    public function destroy(Nutriente $nutriente) {
        $nutriente->delete();

        return redirect()->route('nutrientes.index')->with('success', 'Nutriente excluído com sucesso!');
    }

}
