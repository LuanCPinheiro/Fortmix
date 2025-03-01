<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Familia;

class PeriodoController extends Controller {

    public function index() {
        $periodos = Periodo::with('produtos')->get();
        $familias = Familia::with('produtos')->get();
        return view('periodos.index', compact('periodos', 'familias'));
    }

    public function create() {
        return view('periodos.createEdit');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->only('nome');

        if ($request->hasFile('icone')) {
            $data['icone'] = $request->file('icone')->store('periodos', 'public');
        }

        Periodo::create($data);

        return redirect()->route('periodos.index')->with('success', 'Período criado com sucesso!');
    }

    public function edit(Periodo $periodo) {
        return view('periodos.createEdit', compact('periodo'));
    }

    public function update(Request $request, Periodo $periodo) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->only('nome');

        if ($request->hasFile('icone')) {
            if ($periodo->icone) {
                Storage::disk('public')->delete($periodo->icone);
            }
            $data['icone'] = $request->file('icone')->store('periodos', 'public');
        }

        $periodo->update($data);

        return redirect()->route('periodos.index')->with('success', 'Período atualizado com sucesso!');
    }

    public function destroy(Periodo $periodo) {
        if ($periodo->icone) {
            Storage::disk('public')->delete($periodo->icone);
        }

        $periodo->delete();

        return redirect()->route('periodos.index')->with('success', 'Período excluído com sucesso!');
    }

    public function attachProdutos(Request $request, Periodo $periodo) {
        $periodo->produtos()->sync($request->produtos ?? []);
        return redirect()->route('periodos.index')->with('success', 'Produtos atualizados com sucesso!');
    }

}
