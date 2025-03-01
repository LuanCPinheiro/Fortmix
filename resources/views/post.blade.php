@extends('layouts.layout')

@section('title', $post->titulo . ' - Blog FortMix')

@section('seo')
<link rel="canonical" href="{{ url()->current() }}"/>
<meta name="robots" content="index, follow, max-image-preview:large"/>
<meta name="description" content="{{ $post->descricao }}">
@endsection

@section('ogcontent')
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $post->titulo }}">
<meta property="og:description" content="{{ $post->descricao }}">
<meta property="og:image" content="{{ asset('storage/' . $post->imagem_capa) }}">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:type" content="article">
<meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}">
<meta property="article:author" content="{{ $post->autor->name ?? 'FortMix' }}">
@if($post->tags)
@foreach($post->tags as $tag)
<meta property="article:tag" content="{{ $tag->nome }}">
@endforeach
@endif
@endsection

@section('headerfiles')
<link href="css/ajustesBlog.css?v=9.9" rel="stylesheet">
@endsection

@section('blog')
active
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1 class="fw-bold">{{ $post->titulo }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if($post->imagem_capa)
            <img src="{{ asset('storage/' . $post->imagem_capa) }}" class="img-fluid mb-4" alt="{{ $post->titulo }}">
            @endif
            <p class="lead">{{ $post->descricao }}</p>
            <div>{!! $post->conteudo !!}</div>

            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="text-center mb-3">Produtos Relacionados</h3>
                    <div id="produtosRelacionados" class="row g-4 justify-content-center">
                        @foreach ($post->produtos->sortBy('nome') as $produto)
                        <div class="col-md-4 produto-item">
                            <div class="card h-100 p-2">
                                <img src="{{ asset('storage/' . $produto->familia->sacaria) }}" alt="Sacaria {{ $produto->familia->nome }}" class="card-img-top" style="height: 100px; object-fit: contain;">
                                <img src="{{ asset('storage/' . $produto->icone) }}" alt="{{ $produto->nome }}" class="card-img-top" style="height: 150px; object-fit: contain;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $produto->nome }}</h5>
                                    <p class="card-text text-center">{{ $produto->descricao_comercial }}</p>
                                    @if($produto->periodos->count() > 0)
                                    <hr/>
                                    <p class="text-center">Períodos:</p>
                                    @endif
                                    <div class="d-flex justify-content-center mb-3 flex-wrap">
                                        @foreach ($produto->periodos as $periodo)
                                        <div class="text-center me-3">
                                            <img src="{{ asset('storage/' . $periodo->icone) }}" alt="{{ $periodo->nome }}" title="{{ $periodo->nome }}" style="width: auto; height: 60px;">
                                            <div class="mt-1" style="font-size: 12px;">{{ $periodo->nome }}</div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr/>
                                    <div class="text-center row justify-content-center mb-2">
                                        @if($produto->nutrientes->contains('id', 21))
                                        @php
                                        $proteinaBruta = $produto->nutrientes->firstWhere('id', 21)->pivot->minimo;
                                        $valorDouble = floatval(str_replace(',', '.', $proteinaBruta));
                                        $percentualProteina = number_format(($valorDouble / 1000) * 100, 0, ',', '');
                                        @endphp
                                        <div class="col-4 text-center">
                                            <img src="{{ asset('img/proteina.png') }}" alt="Proteína Bruta" title="Proteína Bruta" style="width: auto; height: 60px;">
                                            <div class="mt-1" style="font-size: 12px;">{{ $percentualProteina }}% de Proteína Bruta</div>
                                        </div>
                                        @endif
                                        @if($produto->nutrientes->contains('id', 19))
                                        <div class="col-4 text-center">
                                            <img src="{{ asset('img/ureia.png') }}" alt="Contém Ureia" title="Contém Ureia" style="width: auto; height: 60px;">
                                            <div class="mt-1" style="font-size: 12px;">Contém Ureia</div>
                                        </div>
                                        @endif
                                        @if($produto->nutrientes->contains('id', 17) || $produto->nutrientes->contains('id', 23))
                                        <div class="col-4 text-center">
                                            <img src="{{ asset('img/aditivos.png') }}" alt="Contém Aditivos Inóforos" title="Aditivos (Ionóforos)" style="width: auto; height: 60px;">
                                            <div class="mt-1" style="font-size: 12px;">Aditivos (Ionóforos)</div>
                                        </div>
                                        @endif
                                    </div>
                                    <hr/>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('produto.show', $produto->slug) }}" class="btn btn-primary">Ver detalhes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <hr/>
            <p class="text-muted">Publicado em {{ $post->created_at->format('d/m/Y') }} por {{ $post->autor->name ?? 'FortMix' }}</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 text-center">
            <a href="{{ route('blog') }}" class="btn btn-primary">Voltar ao Blog</a>
        </div>
    </div>
</div>
@endsection
