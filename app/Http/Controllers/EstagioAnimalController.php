<?php

namespace App\Http\Controllers;

use App\Models\EstagioAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Familia;

class EstagioAnimalController extends Controller {

    public function index() {
        $estagios = EstagioAnimal::with('produtos')->get();
        $familias = Familia::with('produtos')->get();
        return view('estagios.index', compact('estagios', 'familias'));
    }

    public function create() {
        return view('estagios.createEdit');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->only('nome');

        if ($request->hasFile('icone')) {
            $data['icone'] = $request->file('icone')->store('estagios_animais', 'public');
        }

        EstagioAnimal::create($data);

        return redirect()->route('estagios.index')->with('success', 'Estágio Animal criado com sucesso!');
    }

    public function edit(EstagioAnimal $estagio) {
        return view('estagios.createEdit', compact('estagio'));
    }

    public function update(Request $request, EstagioAnimal $estagio) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->only('nome');

        if ($request->hasFile('icone')) {
            if ($estagio->icone) {
                Storage::disk('public')->delete($estagio->icone);
            }
            $data['icone'] = $request->file('icone')->store('estagios_animais', 'public');
        }

        $estagio->update($data);

        return redirect()->route('estagios.index')->with('success', 'Estágio Animal atualizado com sucesso!');
    }

    public function destroy(EstagioAnimal $estagio) {
        if ($estagio->icone) {
            Storage::disk('public')->delete($estagio->icone);
        }

        $estagio->delete();

        return redirect()->route('estagios.index')->with('success', 'Estágio Animal excluído com sucesso!');
    }

    public function attachProdutos(Request $request, EstagioAnimal $estagio) {
        $estagio->produtos()->sync($request->produtos ?? []);
        return redirect()->route('estagios.index')->with('success', 'Produtos atualizados com sucesso!');
    }

}
