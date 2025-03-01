<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;

class BibliotecaController extends Controller {

    public function index() {
        $items = Biblioteca::latest()->take(20)->get();
        return response()->json($items);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,svg,pdf,doc,docx,txt|max:2048', // Customize as needed
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/biblioteca', $filename, 'public');

        $item = Biblioteca::create([
                    'nome' => $file->getClientOriginalName(),
                    'alt' => $request->input('alt', ''),
                    'descricao' => $request->input('descricao', ''),
                    'url' => $path,
                    'tamanho' => $file->getSize(),
                    'tipo' => $file->getClientOriginalExtension(),
        ]);

        return response()->json($item, 201);
    }

}
