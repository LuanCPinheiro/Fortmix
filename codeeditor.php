@extends('layouts.layout')

@section('title', 'Produtos de Corte - FortMix Nutrição Animal')

@section('content')
<div class="container py-5">
    <!-- Botões para "Pronto para Uso" e "Mistura na Fazenda" -->
    <div class="d-flex justify-content-center mb-3">
        <button id="btnProntoParaUso" class="btn btn-primary me-2" onclick="filtrarPorPronto(true)">Pronto para Uso</button>
        <button id="btnMisturaNaFazenda" class="btn btn-outline-primary" onclick="filtrarPorPronto(false)">Mistura na Fazenda</button>
    </div>

    <!-- Barra de divisão -->
    <hr class="mb-4">

    <!-- Botões para estágios animais -->
    <div id="filtrosEstagioAnimal" class="mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-secondary me-2 text-center" onclick="filtrarPorEstagio('cria')">
                <img src="{{ asset('storage/estagios_animais/cria.png') }}" alt="Cria" class="mb-2" style="width: auto; height: 10vh;">
                <div>Cria</div>
            </button>
            <button class="btn btn-outline-secondary me-2 text-center" onclick="filtrarPorEstagio('bezerros')">
                <img src="{{ asset('storage/estagios_animais/bezerros.png') }}" alt="Bezerros" class="mb-2" style="width: auto; height: 10vh;">
                <div>Bezerros</div>
            </button>
            <button class="btn btn-outline-secondary me-2 text-center" onclick="filtrarPorEstagio('recria')">
                <img src="{{ asset('storage/estagios_animais/recria.png') }}" alt="Recria" class="mb-2" style="width: auto; height: 10vh;">
                <div>Recria</div>
            </button>
            <button class="btn btn-outline-secondary text-center" onclick="filtrarPorEstagio('engorda')">
                <img src="{{ asset('storage/estagios_animais/engorda.png') }}" alt="Engorda" class="mb-2" style="width: auto; height: 10vh;">
                <div>Engorda</div>
            </button>
        </div>
    </div>

    <!-- Filtros adicionais -->
    <div id="filtrosAdicionaisCria" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2" onclick="filtrarPorFamilia('pasto')">Linha Branca</button>
            <button class="btn btn-outline-primary" onclick="filtrarPorFamilia('supremo')">Mineral Adensado</button>
        </div>
    </div>

    <div id="filtrosAdicionaisBezerros" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2" onclick="filtrarPorTipoBezerros('proteinados')">Proteinados</button>
            <button class="btn btn-outline-primary" onclick="filtrarPorTipoBezerros('racoes')">Rações</button>
        </div>
    </div>

    <div id="filtrosAdicionaisRecria" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2" onclick="filtrarPorTipoRecria('linha branca')">Linha Branca</button>
            <button class="btn btn-outline-primary me-2" onclick="filtrarPorTipoRecria('minerais adensados')">Minerais Adensados</button>
            <button class="btn btn-outline-primary" onclick="filtrarPorTipoRecria('proteinados')">Proteinados</button>
        </div>
    </div>

    <div id="filtrosAdicionaisEngorda" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2" onclick="filtrarPorTipoEngorda('racoes')">Rações</button>
            <button class="btn btn-outline-primary me-2" onclick="filtrarPorTipoEngorda('dieta total')">Dieta Total</button>
            <button class="btn btn-outline-primary me-2" onclick="filtrarPorTipoEngorda('proteinados')">Proteinados</button>
            <button class="btn btn-outline-primary" onclick="filtrarPorTipoEngorda('linha branca')">Linha Branca</button>
        </div>
    </div>

    <div id="filtrosAdicionaisMistura" class="d-none mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary me-2" onclick="filtrarPorTipoMistura('concentrados')">Concentrados</button>
            <button class="btn btn-outline-primary" onclick="filtrarPorTipoMistura('nucleos')">Núcleos</button>
        </div>
    </div>

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
                    </div>
                    <hr/>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-primary" onclick="abrirModalProduto(event, {{ $produto->toJson() }}, '{{ $familia->sacaria }}')">Ver mais</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
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
                    <div class="col-md-4 text-center">
                        <img id="modalSacaria" src="" alt="Sacaria" class="img-fluid mb-3">
                    </div>
                    <div class="col-md-8">
                        <h5 class="mt-1" id="modalNomeProduto"></h5>
                        <p class="mt-1" id="modalDescricaoComercial"></p>
                        <div class="mt-1" id="modalIndicacoesUso"></div>
                        <div class="mt-1" id="modalModoUso"></div>
                        <hr />
                    </div>
                </div>
                <div class="row justify-content-around">
                    <!-- Períodos -->
                    <div id="periodosContainer" class="mt-3 d-none col-md-auto text-center">
                        <h6>Períodos:</h6>
                        <div id="modalIconesPeriodos" class="d-flex justify-content-center flex-wrap text-center"></div>
                    </div>

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
                                <img src="{{ asset('img/ureia.png') }}" alt="Contém Ureia" style="width: auto; height: 60px;">
                                <div class="mt-1" style="font-size: 12px;">Contém Ureia</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('endfiles')
<script>
    function abrirModalProduto(event, produto, familiaSacaria) {
    event.preventDefault();
            // Preencher dados no modal
            document.getElementById('modalSacaria').src = `/storage/${familiaSacaria}`;
            document.getElementById('modalNomeProduto').innerText = produto.nome;
            document.getElementById('modalDescricaoComercial').innerText = produto.descricao_comercial;
            document.getElementById('modalIndicacoesUso').innerHTML = `<strong>Indicações de Uso:</strong> ${produto.indicacao_uso || 'N/A'}`;
            document.getElementById('modalModoUso').innerHTML = `<strong>Modo de Uso:</strong> ${produto.modo_uso || 'N/A'}`;
            // Exibir Períodos
            const periodosContainer = document.getElementById('periodosContainer');
            const modalIconesPeriodos = document.getElementById('modalIconesPeriodos');
            modalIconesPeriodos.innerHTML = '';
            if (produto.periodos.length > 0) {
    periodosContainer.classList.remove('d-none');
            produto.periodos.forEach(periodo => {
            const div = document.createElement('div');
                    div.innerHTML = `
                <img src="/storage/${periodo.icone}" alt="${periodo.nome}" style="width: auto; height: 60px;">
                <div class="mt-1" style="font-size: 12px;">${periodo.nome}</div>
            `;
                    modalIconesPeriodos.appendChild(div);
            });
    } else {
    periodosContainer.classList.add('d-none');
    }

    // Exibir Estágios
    const estagiosContainer = document.getElementById('estagiosContainer');
            const modalIconesEstagios = document.getElementById('modalIconesEstagios');
            modalIconesEstagios.innerHTML = '';
            if (produto.estagios_animais.length > 0) {
    estagiosContainer.classList.remove('d-none');
            produto.estagios_animais.forEach(estagio => {
            const div = document.createElement('div');
                    div.innerHTML = `
                <img src="/storage/${estagio.icone}" alt="${estagio.nome}" style="width: auto; height: 60px;">
                <div class="mt-1" style="font-size: 12px;">${estagio.nome}</div>
            `;
                    modalIconesEstagios.appendChild(div);
            });
    } else {
    estagiosContainer.classList.add('d-none');
    }

    // Exibir Composição
    const composicaoContainer = document.getElementById('composicaoContainer');
            const modalProteinaBruta = document.getElementById('modalProteinaBruta');
            const modalUreia = document.getElementById('modalUreia');
            let temComposicao = false;
            modalProteinaBruta.innerHTML = '';
            if (produto.nutrientes.some(n => n.id === 21)) {
    const proteina = produto.nutrientes.find(n => n.id === 21);
            const porcentagemProteina = (proteina.quantidade / 1000) * 100;
            modalProteinaBruta.innerHTML = `
            <img src="{{ asset('img/proteina.png') }}" alt="Proteína Bruta" style="width: auto; height: 60px;">
            <div class="mt-1" style="font-size: 12px;">${porcentagemProteina.toFixed(1)}% de Proteína Bruta</div>
        `;
            temComposicao = true;
    }
    if (produto.nutrientes.some(n => n.id === 19)) {
    modalUreia.classList.remove('d-none');
            temComposicao = true;
    } else {
    modalUreia.classList.add('d-none');
    }

    if (temComposicao) {
    composicaoContainer.classList.remove('d-none');
    } else {
    composicaoContainer.classList.add('d-none');
    }

    // Abrir o modal
    const produtoModal = new bootstrap.Modal(document.getElementById('produtoModal'));
            produtoModal.show();
            }

    let filtroPronto = true;
            let filtroEstagio = null;
            let filtroFamilia = null;
            let filtroTipoBezerros = null;
            let filtroTipoRecria = null;
            let filtroTipoEngorda = null;
            let filtroTipoMistura = null;
            document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('btnProntoParaUso').classList.add('btn-primary');
                    document.getElementById('filtrosEstagioAnimal').classList.remove('d-none');
                    aplicarFiltros();
            });
            function filtrarPorPronto(pronto) {
            filtroPronto = pronto;
                    const filtrosEstagioAnimal = document.getElementById('filtrosEstagioAnimal');
                    if (pronto) {
            filtrosEstagioAnimal.classList.remove('d-none');
                    document.getElementById('filtrosAdicionaisMistura').classList.add('d-none');
            } else {
            filtroEstagio = null;
                    document.getElementById('filtrosAdicionaisMistura').classList.remove('d-none');
                    filtrosEstagioAnimal.classList.add('d-none');
                    filtroPronto = false;
            }

            resetarFiltrosEspeciais();
                    aplicarFiltros();
            }

    function filtrarPorEstagio(estagio) {
    filtroEstagio = filtroEstagio === estagio ? null : estagio;
            resetarFiltrosEspeciais();
            if (estagio === 'cria') {
    document.getElementById('filtrosAdicionaisCria').classList.remove('d-none');
    } else if (estagio === 'bezerros') {
    document.getElementById('filtrosAdicionaisBezerros').classList.remove('d-none');
    } else if (estagio === 'recria') {
    document.getElementById('filtrosAdicionaisRecria').classList.remove('d-none');
    } else if (estagio === 'engorda') {
    document.getElementById('filtrosAdicionaisEngorda').classList.remove('d-none');
    }
    aplicarFiltros();
    }

    function filtrarPorFamilia(familia) {
    filtroFamilia = filtroFamilia === familia ? null : familia;
            aplicarFiltros();
    }

    function filtrarPorTipoBezerros(tipo) {
    filtroTipoBezerros = filtroTipoBezerros === tipo ? null : tipo;
            aplicarFiltros();
    }

    function filtrarPorTipoRecria(tipo) {
    filtroTipoRecria = filtroTipoRecria === tipo ? null : tipo;
            aplicarFiltros();
    }

    function filtrarPorTipoEngorda(tipo) {
    filtroTipoEngorda = filtroTipoEngorda === tipo ? null : tipo;
            aplicarFiltros();
    }

    function filtrarPorTipoMistura(tipo) {
    filtroTipoMistura = filtroTipoMistura === tipo ? null : tipo;
            filtroPronto = false;
            aplicarFiltros();
    }

    function aplicarFiltros() {
    const produtos = document.querySelectorAll('.produto-item');
            const spinner = document.getElementById("loadingSpinner");
            const listaProdutos = document.getElementById("listaProdutos");
            // Mostra o spinner
            spinner.classList.remove("d-none");
            listaProdutos.style.opacity = 0;
            produtos.forEach(produto => {
            const nomeProduto = produto.getAttribute('data-nome').trim().toLowerCase();
                    const isPronto = produto.getAttribute('data-pronto') === '1';
                    const estagios = produto.getAttribute('data-estagios').toLowerCase().split(',');
                    const familia = produto.getAttribute('data-familia');
                    const passaFiltroPronto = filtroPronto === null || filtroPronto === isPronto;
                    const passaFiltroEstagio = filtroEstagio === null || estagios.includes(filtroEstagio);
                    const passaFiltroFamilia = filtroFamilia === null || familia === filtroFamilia;
                    let passaFiltroTipoBezerros = true;
                    if (filtroEstagio === 'bezerros') {
            if (filtroTipoBezerros === 'proteinados') {
            passaFiltroTipoBezerros = ['baby beef', 'acelera bezerro'].includes(nomeProduto);
            } else if (filtroTipoBezerros === 'racoes') {
            passaFiltroTipoBezerros = ['baby beef performance'].includes(nomeProduto);
            }
            }

            let passaFiltroTipoRecria = true;
                    if (filtroEstagio === 'recria') {
            if (filtroTipoRecria === 'linha branca') {
            passaFiltroTipoRecria = familia === 'pasto';
            } else if (filtroTipoRecria === 'minerais adensados') {
            passaFiltroTipoRecria = familia === 'supremo';
            } else if (filtroTipoRecria === 'proteinados') {
            passaFiltroTipoRecria = ['acelera', 'desempenho', 'força'].includes(familia);
            }
            }

            let passaFiltroTipoEngorda = true;
                    if (filtroEstagio === 'engorda') {
            if (filtroTipoEngorda === 'proteinados') {
            passaFiltroTipoEngorda = familia === 'acelera';
            } else if (filtroTipoEngorda === 'racoes') {
            passaFiltroTipoEngorda = familia === 'fortbeef' && !nomeProduto.includes('total');
            } else if (filtroTipoEngorda === 'dieta total') {
            passaFiltroTipoEngorda = familia === 'fortbeef' && nomeProduto.includes('total');
            } else if (filtroTipoEngorda === 'linha branca') {
            passaFiltroTipoEngorda = familia === 'pasto';
            }
            }

            let passaFiltroTipoMistura = true;
                    if (!filtroPronto) {
            if (filtroTipoMistura === 'nucleos') {
            passaFiltroTipoMistura = familia === 'nucleobeef';
            } else if (filtroTipoMistura === 'concentrados') {
            passaFiltroTipoMistura = ['protbeef', 'confbeef'].includes(familia);
            }
            }

            produto.style.display = passaFiltroPronto && passaFiltroEstagio && passaFiltroFamilia && passaFiltroTipoBezerros && passaFiltroTipoRecria && passaFiltroTipoEngorda && passaFiltroTipoMistura ? 'block' : 'none';
            });
            setTimeout(() => {
            spinner.classList.add("d-none");
                    listaProdutos.style.opacity = 1;
            }, 800); // Tempo de simulação de carregamento
    }

    function resetarFiltrosEspeciais() {
    filtroFamilia = null;
            filtroTipoBezerros = null;
            filtroTipoRecria = null;
            filtroTipoEngorda = null;
            document.getElementById('filtrosAdicionaisCria').classList.add('d-none');
            document.getElementById('filtrosAdicionaisBezerros').classList.add('d-none');
            document.getElementById('filtrosAdicionaisRecria').classList.add('d-none');
            document.getElementById('filtrosAdicionaisEngorda').classList.add('d-none');
    }
</script>

@endsection