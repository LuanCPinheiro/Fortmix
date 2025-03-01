<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Familia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller {

    public function index() {
        $posts = Post::with('autor')->orderBy('created_at', 'desc')->paginate(10); // Paginação
        return view('posts.index', compact('posts'));
    }

    public function create() {
        // Carrega tags e famílias para a criação
        $tags = Tag::orderBy('nome')->get();
        $familias = Familia::with('produtos')->orderBy('ordem_exibicao')->get();
        return view('posts.form', compact('tags', 'familias'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'conteudo' => 'required|string',
            'imagem_capa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload da imagem de capa, se fornecida
        if ($request->hasFile('imagem_capa')) {
            $validated['imagem_capa'] = $request->file('imagem_capa')->store('posts', 'public');
        }

        $validated['autor_id'] = auth()->id(); // Define o autor como o usuário logado

        $post = Post::create($validated);

        // Relaciona as tags e produtos, se selecionados
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        if ($request->produtos) {
            $post->produtos()->sync($request->produtos);
        }

        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }

    public function edit(Post $post) {
        $tags = Tag::orderBy('nome')->get();
        $familias = Familia::with('produtos')->orderBy('ordem_exibicao')->get();
        return view('posts.update', compact('post', 'tags', 'familias'));
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'conteudo' => 'required|string',
            'imagem_capa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Atualiza a imagem de capa, se fornecida
        if ($request->hasFile('imagem_capa')) {
            // Remove a imagem antiga, se existir
            if ($post->imagem_capa) {
                Storage::disk('public')->delete($post->imagem_capa);
            }
            $validated['imagem_capa'] = $request->file('imagem_capa')->store('posts', 'public');
        }

        $post->update($validated);

        // Atualiza as relações de tags e produtos
        $post->tags()->sync($request->tags ?? []);
        $post->produtos()->sync($request->produtos ?? []);

        return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    public function destroy(Post $post) {
        // Remove a imagem associada, se existir
        if ($post->imagem_capa) {
            Storage::disk('public')->delete($post->imagem_capa);
        }

        // Remove o post e as relações pivot
        $post->tags()->detach();
        $post->produtos()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post excluído com sucesso!');
    }

    public function updateStatus(Request $request, $slug) {
        $validated = $request->validate([
            'status' => 'required|in:rascunho,publicado,arquivado',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail(); // Busca o post pelo slug

        $post->update(['status' => $validated['status']]); // Atualiza o status

        return redirect()->route('posts.index')->with('success', 'Status do post atualizado com sucesso!');
    }

}
