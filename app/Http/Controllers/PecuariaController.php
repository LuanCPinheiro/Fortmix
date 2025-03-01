<?php

namespace App\Http\Controllers;

use App\Models\Pecuaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Familia;

class PecuariaController extends Controller {

    public function index() {
        $pecuarias = Pecuaria::with('produtos')->get();
        $familias = Familia::with('produtos')->get();
        return view('pecuaria.list', compact('pecuarias', 'familias'));
    }

    public function create() {
        return view('pecuaria.createEdit');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'icone' => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('icone')) {
            $validated['icone'] = $request->file('icone')->store('pecuarias/icones', 'public');
        }

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('pecuarias/banners', 'public');
        }

        Pecuaria::create($validated);

        return redirect()->route('pecuarias.index')->with('success', 'Pecuária criada com sucesso!');
    }

    public function show(Pecuaria $pecuaria) {
        return view('pecuaria.show', compact('pecuaria'));
    }

    public function edit(Pecuaria $pecuaria) {
        return view('pecuaria.createEdit', compact('pecuaria'));
    }

    public function update(Request $request, Pecuaria $pecuaria) {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'icone' => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('icone')) {
            if ($pecuaria->icone) {
                Storage::disk('public')->delete($pecuaria->icone);
            }
            $validated['icone'] = $request->file('icone')->store('pecuarias/icones', 'public');
        }

        if ($request->hasFile('banner')) {
            if ($pecuaria->banner) {
                Storage::disk('public')->delete($pecuaria->banner);
            }
            $validated['banner'] = $request->file('banner')->store('pecuarias/banners', 'public');
        }

        $pecuaria->update($validated);

        return redirect()->route('pecuarias.index')->with('success', 'Pecuária atualizada com sucesso!');
    }

    public function destroy(Pecuaria $pecuaria) {
        if ($pecuaria->icone) {
            Storage::disk('public')->delete($pecuaria->icone);
        }

        if ($pecuaria->banner) {
            Storage::disk('public')->delete($pecuaria->banner);
        }

        $pecuaria->delete();

        return redirect()->route('pecuarias.index')->with('success', 'Pecuária excluída com sucesso!');
    }

    public function attachProdutos(Request $request, Pecuaria $pecuaria) {
        $pecuaria->produtos()->sync($request->produtos ?? []);
        return redirect()->route('pecuarias.index')->with('success', 'Produtos atualizados com sucesso!');
    }

}
