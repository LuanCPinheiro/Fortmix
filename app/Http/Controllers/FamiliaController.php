<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FamiliaController extends Controller {

    public function index() {
        $familias = Familia::orderBy('ordem_exibicao', 'asc')->get();
        return view('familias.index', compact('familias'));
    }

    public function create() {
        return view('familias.createEdit');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5 MB
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5 MB
            'sacaria' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5 MB
            'ordem_exibicao' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('icone')) {
            $data['icone'] = $request->file('icone')->store('familias/icones', 'public');
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('familias/banners', 'public');
        }

        if ($request->hasFile('sacaria')) {
            $data['sacaria'] = $request->file('sacaria')->store('familias/sacarias', 'public');
        }

        Familia::create($data);

        return redirect()->route('familias.index')->with('success', 'Família criada com sucesso!');
    }

    public function edit(Familia $familia) {
        return view('familias.createEdit', compact('familia'));
    }

    public function update(Request $request, Familia $familia) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sacaria' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ordem_exibicao' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('icone')) {
            if ($familia->icone) {
                Storage::disk('public')->delete($familia->icone);
            }
            $data['icone'] = $request->file('icone')->store('familias/icones', 'public');
        }

        if ($request->hasFile('banner')) {
            if ($familia->banner) {
                Storage::disk('public')->delete($familia->banner);
            }
            $data['banner'] = $request->file('banner')->store('familias/banners', 'public');
        }

        if ($request->hasFile('sacaria')) {
            if ($familia->sacaria) {
                Storage::disk('public')->delete($familia->sacaria);
            }
            $data['sacaria'] = $request->file('sacaria')->store('familias/sacarias', 'public');
        }

        $familia->update($data);

        return redirect()->route('familias.index')->with('success', 'Família atualizada com sucesso!');
    }

    public function destroy(Familia $familia) {
        if ($familia->icone) {
            Storage::disk('public')->delete($familia->icone);
        }

        if ($familia->banner) {
            Storage::disk('public')->delete($familia->banner);
        }

        if ($familia->sacaria) {
            Storage::disk('public')->delete($familia->sacaria);
        }

        $familia->delete();

        return redirect()->route('familias.index')->with('success', 'Família excluída com sucesso!');
    }

}
