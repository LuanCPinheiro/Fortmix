<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller {

    public function index() {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create() {
        return view('tags.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|unique:tags|max:255',
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag criada com sucesso!');
    }

    public function edit(Tag $tag) {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag) {
        $request->validate([
            'nome' => 'required|unique:tags,nome,' . $tag->id . '|max:255',
        ]);

        $tag->update($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag atualizada com sucesso!');
    }

    public function destroy(Tag $tag) {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag excluída com sucesso!');
    }

}
