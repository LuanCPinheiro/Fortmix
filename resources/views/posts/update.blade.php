@extends('layouts.dashboardLayout')

@section('titulo', 'Editar Post')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('posts.index') }}">Posts</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Post</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Editar Post</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Seção de informações principais -->
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $post->titulo) }}" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ old('descricao', $post->descricao) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="conteudo" class="form-label">Conteúdo</label>
                    <textarea name="conteudo" id="conteudo" class="form-control wysiwyg" rows="20" required>{{ old('conteudo', $post->conteudo) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="imagem_capa" class="form-label">Imagem de Capa</label>
                    <input type="file" name="imagem_capa" id="imagem_capa" class="form-control">
                    @if($post->imagem_capa)
                    <img src="{{ asset('storage/' . $post->imagem_capa) }}" alt="Imagem de Capa" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
            </div>
        </div>

        <!-- Seção de Tags -->
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <div class="row">
                        @foreach ($tags->chunk(ceil($tags->count() / 3)) as $chunk)
                        <div class="col-md-4">
                            @foreach ($chunk as $tag)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                       @if($post->tags->contains($tag->id)) checked @endif>
                                <label class="form-check-label">{{ $tag->nome }}</label>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Seção de Produtos -->
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Produtos</label>
                    <div class="accordion" id="produtosAccordion">
                        @foreach ($familias as $familia)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $familia->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $familia->id }}">
                                    {{ $familia->nome }}
                                </button>
                            </h2>
                            <div id="collapse{{ $familia->id }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="row">
                                        @foreach ($familia->produtos->chunk(ceil($familia->produtos->count() / 3)) as $chunk)
                                        <div class="col-md-4">
                                            @foreach ($chunk as $produto)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="produtos[]" value="{{ $produto->id }}" 
                                                       @if($post->produtos->contains($produto->id)) checked @endif>
                                                <label class="form-check-label">{{ $produto->nome }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Post</button>
    </form>
</div>
@endsection

@section('endfiles')
<script src="https://cdn.tiny.cloud/1/ja3qykj518u2oky02zfeewrg2scvz324lc990ztj5cislagg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '.wysiwyg',
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
        'searchreplace', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
        'table', 'help', 'wordcount', 'emoticons', 'codesample', 'autoresize'
    ],
    toolbar: 'undo redo | styles | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist checklist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media link anchor codesample | ltr rtl',
    toolbar_mode: 'floating',
    height: 1000,
    menubar: 'file edit view insert format tools table help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    branding: false,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: true,
    autosave_retention: '2m',
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: function (callback, value, meta) {
        if (meta.filetype === 'image') {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function () {
                const file = this.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    callback(reader.result, {alt: file.name});
                };
                reader.readAsDataURL(file);
            };

            input.click();
        }
    }
});
</script>
@endsection
