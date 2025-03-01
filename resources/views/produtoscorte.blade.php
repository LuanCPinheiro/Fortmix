@extends('layouts.layout')

@section('title', 'Produtos - Pecuária de Corte - FortMix Nutrição Animal')

@section('seo')
<link rel="canonical" href="www.fortmixnutricao.com.br"/>
<meta name="robots" content="index, follow, max-image-preview:large"/>
<meta name="description" content="Produtos FortMix para Pecuária de Corte - Qualidade e Tradição!">
@endsection

@section('ogcontent')
<meta property="og:url" content="www.fortmixnutricao.com.br/produtoscorte">
<meta property="og:title" content="Produtos - Pecuária de Corte - FortMix Nutrição Animal">
<meta property="og:image" content="">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<meta property="og:type" content="company">
@endsection

@section('produtoscorte')
active
@endsection

@section('headerfiles')
<link href="css/ajustesProdutos.css?v=9.9" rel="stylesheet">
@endsection

@section('content')
<div class="container py-5">
    <!-- Botões para "Pronto para Uso" e "Mistura na Fazenda" -->
    <div class="d-flex justify-content-center mb-3">
        <button id="btnProntoParaUso" class="btn btn-outline-primary me-2 botoesPronto" onclick="filtrarPorPronto(true)">Pronto para Uso</button>
        <button id="btnMisturaNaFazenda" class="btn btn-outline-primary botoesPronto" onclick="filtrarPorPronto(false)">Mistura na Fazenda</button>
    </div>

    <!-- Barra de divisão -->
    <hr class="mb-4">

    <!-- Botões para estágios animais -->
    <div id="filtrosEstagioAnimal" class="d-flex justify-content-center mb-3">
        <div class="row justify-content-center">
            <div class="col-auto col-md-auto text-center mb-3">
                <button class="btn btn-outline-secondary text-center icon-btn botoesEstagio" onclick="filtrarPorEstagio('cria')">
                    <img src="{{ asset('storage/estagios_animais/cria.png') }}" alt="Cria" class="mb-2 icon-image">
                    <div>Cria</div>
                </button>
            </div>
            <div class="col-auto col-md-auto text-center mb-3">
                <button class="btn btn-outline-secondary text-center icon-btn botoesEstagio" onclick="filtrarPorEstagio('bezerros')">
                    <img src="{{ asset('storage/estagios_animais/bezerros.png') }}" alt="Bezerros" class="mb-2 icon-image">
                    <div>Bezerros</div>
                </button>
            </div>
            <div class="col-auto col-md-auto text-center mb-3">
                <button class="btn btn-outline-secondary text-center icon-btn botoesEstagio" onclick="filtrarPorEstagio('recria')">
                    <img src="{{ asset('storage/estagios_animais/recria.png') }}" alt="Recria" class="mb-2 icon-image">
                    <div>Recria</div>
                </button>
            </div>
            <div class="col-auto col-md-auto text-center mb-3">
                <button class="btn btn-outline-secondary text-center icon-btn botoesEstagio" onclick="filtrarPorEstagio('engorda')">
                    <img src="{{ asset('storage/estagios_animais/engorda.png') }}" alt="Engorda" class="mb-2 icon-image">
                    <div>Engorda</div>
                </button>
            </div>
        </div>
    </div>

    <!-- Filtros adicionais -->
    <div id="filtrosAdicionaisCria" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2 botoesFamilia" onclick="filtrarPorFamilia('pasto')">Linha Branca</button>
            <button class="btn btn-outline-primary botoesFamilia" onclick="filtrarPorFamilia('supremo')">Mineral Adensado</button>
        </div>
    </div>

    <div id="filtrosAdicionaisBezerros" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2 botoesBezerros" onclick="filtrarPorTipoBezerros('proteinados')">Proteinados</button>
            <button class="btn btn-outline-primary botoesBezerros" onclick="filtrarPorTipoBezerros('racoes')">Rações</button>
        </div>
    </div>

    <div id="filtrosAdicionaisRecria" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2 botoesRecria" onclick="filtrarPorTipoRecria('linha branca')">Linha Branca</button>
            <button class="btn btn-outline-primary me-2 botoesRecria" onclick="filtrarPorTipoRecria('minerais adensados')">Minerais Adensados</button>
            <button class="btn btn-outline-primary botoesRecria" onclick="filtrarPorTipoRecria('proteinados')">Proteinados</button>
        </div>
    </div>

    <div id="filtrosAdicionaisEngorda" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2 botoesEngorda" onclick="filtrarPorTipoEngorda('racoes')">Rações</button>
            <button class="btn btn-outline-primary me-2 botoesEngorda" onclick="filtrarPorTipoEngorda('dieta total')">Dieta Total</button>
            <button class="btn btn-outline-primary me-2 botoesEngorda" onclick="filtrarPorTipoEngorda('proteinados')">Proteinados</button>
            <button class="btn btn-outline-primary botoesEngorda" onclick="filtrarPorTipoEngorda('linha branca')">Linha Branca</button>
        </div>
    </div>

    <div id="filtrosAdicionaisMistura" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2 botoesMistura" onclick="filtrarPorTipoMistura('concentrados')">Concentrados</button>
            <button class="btn btn-outline-primary botoesMistura" onclick="filtrarPorTipoMistura('nucleos')">Núcleos</button>
        </div>
    </div>

    <hr/>

    <div id="loadingSpinner" class="d-none text-center my-5">
        <svg xmlns="http://www.w3.org/2000/svg" style="margin: auto; background: none; display: block;" width="50px" height="50px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" r="35" stroke-width="8" stroke="#007bff" stroke-dasharray="54.97787143782138 54.97787143782138" fill="none" stroke-linecap="round">
        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
        </circle>
        </svg>
        <p class="mt-2">Carregando...</p>
    </div>
    <!-- Lista de produtos -->
    <div id="listaProdutos" class="row g-4 justify-content-center">
        @foreach ($familias->sortBy('ordem_exibicao') as $familia)
        @foreach ($familia->produtos->sortBy('ordem_exibicao') as $produto)
        <div class="col-md-4 produto-item" 
             data-nome="{{ strtolower($produto->nome) }}" 
             data-pronto="{{ $produto->pronto_para_uso }}" 
             data-estagios="{{ implode(',', $produto->estagiosAnimais->pluck('nome')->toArray()) }}" 
             data-familia="{{ strtolower($familia->nome) }}">
            <div class="card h-100 p-2">
                <img src="{{ asset('storage/' . $familia->sacaria) }}" alt="Sacaria {{ $familia->nome }}" class="card-img-top" style="height: 100px; object-fit: contain;">
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
                        <a href="#" class="btn btn-primary" onclick="abrirModalProduto(event, {{ $produto->toJson() }}, '{{ $familia->sacaria }}', '{{ $percentualProteina }}')">Ver mais</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
    <hr/>
    <div class="listaOrdenadaProdutos mt-6 row g-4 justify-content-center">
        <h2>Lista Completa de Produtos  - Pecuária de Corte</h2>
        <ol>
            @foreach($familias as $familia)
            <li class="mt-2">
                <strong>Linha: {{ $familia->nome }}</strong>
                <p>{{ $familia->descricao }}</p><!-- Adiciona a descrição da linha aqui -->
                <ul>
                    @foreach($familia->produtos as $produto)
                    <li>
                        <a href="{{ route('produto.show', $produto->slug) }}">
                            {{ $produto->nome }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <hr/>
            @endforeach
        </ol>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="produtoModal" tabindex="-1" aria-labelledby="produtoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produtoModalLabel">Detalhes do Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 col-sm-12 text-center">
                        <img id="modalSacaria" src="" alt="Sacaria" class="img-fluid mb-3">
                    </div>
                    <div class="col-md-8">
                        <h5 id="modalNomeProduto" class="product-title-box"></h5>
                        <p class="mt-1 usage-text" id="modalDescricaoComercial"></p>
                        <div id="modalIndicacoesUso" class="usage-section mb-3">
                            <div class="usage-title-box">Indicações de Uso:</div>
                            <div class="usage-text"></div>
                        </div>
                        <div id="modalModoUso" class="usage-section mb-3">
                            <div class="usage-title-box">Modo de Uso:</div>
                            <div class="usage-text"></div>
                        </div>
                        <hr />
                    </div>
                </div>
                <div class="row justify-content-around">

                    <!-- Estágios -->
                    <div id="estagiosContainer" class="mt-3 d-none col-md-auto text-center">
                        <h6>Estágios:</h6>
                        <div id="modalIconesEstagios" class="d-flex justify-content-center flex-wrap text-center"></div>
                    </div>

                    <!-- Composição -->
                    <div id="composicaoContainer" class="mt-3 d-none col-md-auto text-center">
                        <h6>Composição:</h6>
                        <div class="d-flex justify-content-center flex-wrap text-center">
                            <!-- Proteína Bruta -->
                            <div id="modalProteinaBruta" class="mx-2"></div>
                            <!-- Ureia -->
                            <div id="modalUreia" class="d-none mx-2">
                                <img src="{{ asset('img/ureia.png') }}" alt="Contém Ureia" class="icon-image">
                                <div class="mt-1" style="font-size: 12px;">Contém Ureia</div>
                            </div>
                            <!-- Ureia -->
                            <div id="modalAditivos" class="d-none mx-2">
                                <img src="{{ asset('img/aditivos.png') }}" alt="Contém Aditivos Ionóforos" class="icon-image">
                                <div class="mt-1" style="font-size: 12px;">Aditivos (Ionóforos)</div>
                            </div>
                        </div>
                    </div>

                    <!-- Períodos -->
                    <div id="periodosContainer" class="mt-3 d-none col-md-auto text-center">
                        <h6>Períodos:</h6>
                        <div id="modalIconesPeriodos" class="d-flex justify-content-center flex-wrap text-center"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-0">
                <button id="whatsappButton" class="btn btn-success btn-lg w-100 rounded-0 d-flex align-items-center justify-content-center">
                    <i class="fab fa-whatsapp me-2"></i> Tenho Interesse - Pedir Cotação
                </button>                
                <!-- Botão de Voltar -->
                <button id="closeModalButton" class="btn btn-secondary btn-lg w-100 rounded-0 d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                    Voltar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('endfiles')
<script type="text/javascript" src="js/ajustesProdutos.js?v=9.4"></script>
@endsection