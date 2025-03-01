@extends('layouts.layout')

@section('title')
{{$produto->nome}} - Produto FortMix
@endsection

@section('seo')
<link rel="canonical" href="www.fortmixnutricao.com.br"/>
<meta name="robots" content="index, follow, max-image-preview:large"/>
<meta name="description" content="{{$produto->descricaocomercial}}">
@endsection

@section('ogcontent')
<meta property="og:url" content="www.fortmixnutricao.com.br/produto-{{$produto->slug}}">
<meta property="og:title" content="{{$produto->nome}} - Produto FortMix">
<meta property="og:description" content="{{$produto->descricaocomercial}}">
<meta property="og:image" content="">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<meta property="og:type" content="company">
@endsection

@section('headerfiles')
<link href="css/ajustesProduto.css?v=9.9" rel="stylesheet">
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $produto->nome }}</h1>

    <!-- Conteúdo do Produto com estrutura da modal -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Detalhes do Produto</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <img id="modalSacaria" src="{{asset('storage/' . $produto->familia->sacaria)}}" alt="Sacaria {{$produto->familia->nome}}" class="img-fluid mb-3">
                </div>
                <div class="col-md-8">
                    <img id="" src="{{asset('storage/' . $produto->icone)}}" alt="icone {{$produto->nome}}" class="img-fluid mb-3">
                    <p class="mt-1 usage-text" id="modalDescricaoComercial"></p>
                    <div id="modalIndicacoesUso" class="usage-section mb-3">
                        <div class="usage-title-box">Indicações de Uso:</div>
                        <div class="usage-text">{{$produto->indicacao_uso}}</div>
                    </div>
                    <div id="modalModoUso" class="usage-section mb-3">
                        <div class="usage-title-box">Modo de Uso:</div>
                        <div class="usage-text">{{$produto->modo_uso}}</div>
                    </div>
                    <hr />
                </div>
            </div>
            <div class="row justify-content-around">

                <!-- Estágios -->
                @if($produto->estagiosAnimais->count() > 0)
                <div id="estagiosContainer" class="mt-3 col-md-auto text-center">
                    <h6>Estágios:</h6>
                    <div id="modalIconesEstagios" class="d-flex justify-content-center flex-wrap text-center">
                        @foreach($produto->estagiosAnimais as $estagio)
                        <div class="mx-2">
                            <img src="{{ asset('storage/' . $estagio->icone) }}" alt="icone {{$estagio->nome}}" class="icon-image">
                            <div class="mt-1" style="font-size: 12px;">{{$estagio->nome}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <!-- Composição -->
                @if($produto->nutrientes->contains('id', 21) || $produto->nutrientes->contains('id', 19) || $produto->nutrientes->contains('id', 17) || $produto->nutrientes->contains('id', 23))
                <div id="composicaoContainer" class="mt-3 col-md-auto text-center">
                    <h6>Composição:</h6>
                    <div class="d-flex justify-content-center flex-wrap text-center">
                        <!-- Proteína Bruta -->
                        @if($produto->nutrientes->contains('id', 21))
                        @php
                        $proteina = $produto->nutrientes->firstWhere('id', 21);
                        // O valor original em string
                        $valorEmGramas = str_replace(',', '.', $proteina->pivot->minimo); // Substituir vírgula por ponto
                        $valorEmGramas = floatval($valorEmGramas); // Converter para número decimal

                        // Calcular porcentagem
                        $proteina = ($valorEmGramas / 1000) * 100;

                        // Arredondar para inteiro e adicionar o símbolo de porcentagem
                        $proteina = intval($proteina) . '%';
                        @endphp
                        <div id="modalProteinaBruta" class="mx-2">
                            <img src="{{ asset('img/proteina.png') }}" alt="Ícone de Proteína" class="icon-image">
                            <div class="mt-1" style="font-size: 12px;">{{ $proteina }} de Proteína Bruta</div>                            
                        </div>
                        @endif

                        <!-- Ureia -->
                        @if($produto->nutrientes->contains('id', 19))
                        <div id="modalUreia" class="mx-2">
                            <img src="{{ asset('img/ureia.png') }}" alt="Ícone de Ureia" class="icon-image">
                            <div class="mt-1" style="font-size: 12px;">Contém Ureia</div>
                        </div>
                        @endif

                        <!-- Aditivos -->                        
                        @if($produto->nutrientes->contains('id', 17) || $produto->nutrientes->contains('id', 23))
                        <div id="modalAditivos" class="mx-2">
                            <img src="{{ asset('img/aditivos.png') }}" alt="Contém Aditivos Ionóforos" class="icon-image">
                            <div class="mt-1" style="font-size: 12px;">Aditivos (Ionóforos)</div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Períodos -->
                @if($produto->periodos->count() > 0)
                <div id="periodosContainer" class="mt-3 col-md-auto text-center">
                    <h6>Períodos:</h6>
                    <div id="modalIconesPeriodos" class="d-flex justify-content-center flex-wrap text-center">
                        @foreach($produto->periodos as $periodo)
                        <div class="mx-2">
                            <img src="{{ asset('storage/' . $periodo->icone) }}" alt="icone {{$periodo->nome}}" class="icon-image">
                            <div class="mt-1" style="font-size: 12px;">{{$periodo->nome}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="card-footer text-center">
            <button class="btn btn-success btn-lg w-100">
                <i class="fab fa-whatsapp me-2"></i> Tenho Interesse - Pedir Cotação
            </button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg w-100 mt-2">
                Voltar
            </a>
        </div>
    </div>
</div>
@endsection
