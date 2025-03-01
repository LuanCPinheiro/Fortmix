@extends('layouts.layout')

@section('title', 'Blog - FortMix Nutrição Animal')

@section('seo')
<link rel="canonical" href="www.fortmixnutricao.com.br/blog"/>
<meta name="robots" content="index, follow, max-image-preview:large"/>
<meta name="description" content="Acompanhe o Blog da FortMix Nutrição Animal e fique por dentro das melhores dicas e novidades sobre pecuária e nutrição animal.">
@endsection

@section('ogcontent')
<meta property="og:url" content="www.fortmixnutricao.com.br/blog">
<meta property="og:title" content="Blog - FortMix Nutrição Animal">
<meta property="og:image" content="">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:type" content="article">
@endsection

@section('blog')
active
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="mb-5">Blog FortMix</h1>
        </div>
    </div>

    <div class="row">
        @forelse($posts as $post)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm text-center">
                @if($post->imagem_capa)
                <img src="{{ asset('storage/' . $post->imagem_capa) }}" class="card-img-top" alt="{{ $post->titulo }}">
                @else
                <img src="/img/default-post.jpg" class="card-img-top" alt="{{ $post->titulo }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->titulo }}</h5>
                    <p class="card-text">{{ Str::limit($post->descricao, 100) }}</p>
                    <a href="{{ route('blog.post', $post->slug) }}" class="btn btn-primary">Ler matéria completa</a>
                </div>
                <div class="card-footer text-muted">
                    Publicado em {{ $post->created_at->format('d/m/Y') }}
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Nenhum post encontrado.</p>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
