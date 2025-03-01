@extends('layouts.dashboardLayout')

@section('titulo')
Lista de Representantes Fortmix
@endsection

@section('active2')
active
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Representantes</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                @if(session('msg'))
                <div class="alert alert-{{session('danger') ?? 'success'}} alert-dismissible fade show" role="alert">
                    @if(session('danger'))
                    <span class="alert-icon"><i class="ni ni-settings"></i></span>
                    @else
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    @endif
                    <span class="alert-text"><strong>{{session('msg')}}</strong></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalRep">Adicionar Representante</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('representantes.cadRep', ['estados' => $estados])

@include('representantes.table', ['uf' => "MS",
'estado' => "Mato Grosso do Sul",
'reps' => $representantes])

@include('representantes.table', ['uf' => "MT",
'estado' => "Mato Grosso",
'reps' => $representantes])

@include('representantes.table', ['uf' => "GO",
'estado' => "Goiás",
'reps' => $representantes])

@include('representantes.table', ['uf' => "SP",
'estado' => "São Paulo",
'reps' => $representantes])

@include('representantes.table', ['uf' => "MG",
'estado' => "Minas Gerais",
'reps' => $representantes])

<hr/>
<hr/>
<hr/>
<hr/>
<hr/>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Lista de Representantes Desativados</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cidade/Estado</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contato</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($desativados as $rep)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$rep->id}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$rep->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$rep->cidade->nome}} / {{$rep->uf}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$rep->tel1}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <button type="button" onclick="ativar({{$rep->id}}, '{{$rep->name}}')"
                                                    class="btn btn-success btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Ativar Representante" data-container="body"
                                                    data-animation="true"><i class="fas fa-check"></i>Ativar</button>

                                            <button type="button" onclick="deletar({{$rep->id}}, '{{$rep->name}}')"
                                                    class="btn btn-danger btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Excluir Representante" data-container="body"
                                                    data-animation="true"><i class="fas fa-trash"></i>Deletar</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-desativar" tabindex="-1" role="dialog" aria-labelledby="modal-desativarLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-desativarLabel">ATENÇÃO</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="text-gradient text-danger mt-4">Você tem certeza?!</h4>
                    <p id="pDesativar"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a type="button" href="{{url('/dashboard/')}}" id="btnDesativar" class="btn btn-danger">Tenho Certeza, desativar!</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-ativar" tabindex="-1" role="dialog" aria-labelledby="modal-ativarLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-ativarLabel">ATENÇÃO</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="text-gradient text-danger mt-4">Você tem certeza?!</h4>
                    <p id="pAtivar"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a type="button" href="{{url('/dashboard/')}}" id="btnAtivar" class="btn btn-success">Tenho Certeza, ativar!</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-deletar" tabindex="-1" role="dialog" aria-labelledby="modal-deletarLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-deletarLabel">ATENÇÃO - AÇÃO PERMANENTE</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="text-gradient text-danger mt-4">Você tem certeza?!</h4>
                    <p id="pDeletar"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a type="button" href="{{url('/dashboard/')}}" id="btnDeletar" class="btn btn-danger">Tenho Certeza, DELETAR!!!</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-regioes" tabindex="-1" aria-labelledby="modalRegioesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Regiões Atendidas por <span id="repName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Seletor de Estado -->
                <div class="mb-3">
                    <label for="estadoSelect" class="form-label">Estado</label>
                    <select id="estadoSelect" class="form-control" onchange="fetchCidades(this.value)">
                        <option value="">Selecione um Estado</option>
                        @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Seletor de Cidade -->
                <div id="cidadeSelectDiv" class="mb-3 d-none">
                    <label for="cidadeSelect" class="form-label">Cidade</label>
                    <select id="cidadeSelect" class="form-control">
                        <option value="">Selecione uma Cidade</option>
                        <!-- Cidades serão carregadas via AJAX -->
                    </select>
                    <button type="button" class="btn btn-primary mt-2" onclick="addCidade()">Cadastrar</button>
                </div>

                <!-- Tabela de Cidades Atendidas -->
                <h6>Cidades Atendidas</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="cidadesAtendidasTable">
                        <!-- Cidades atendidas serão carregadas aqui -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" onclick="saveCidadesAtendidas()">Salvar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('endfiles')
<script type="text/javascript">
    function desativar(id, nome) {
    var myModal = new bootstrap.Modal(document.getElementById('modal-desativar'), {
    keyboard: false
    });
    var link = $("#btnDesativar").attr("href");
    $("#pDesativar").html("Ao confirmar você irá desativar o representante: " + nome + "!");
    $("#btnDesativar").attr("href", link + "/desativarRep" + id);
    myModal.show();
    }

    function ativar(id, nome) {
    var myModal = new bootstrap.Modal(document.getElementById('modal-ativar'), {
    keyboard: false
    });
    var link = $("#btnAtivar").attr("href");
    $("#pAtivar").html("Ao confirmar você irá ativar o representante: " + nome + "!");
    $("#btnAtivar").attr("href", link + "/ativarRep" + id);
    myModal.show();
    }

    function deletar(id, nome) {
    var myModal = new bootstrap.Modal(document.getElementById('modal-deletar'), {
    keyboard: false
    });
    var link = $("#btnDeletar").attr("href");
    $("#pDeletar").html("Ao confirmar você irá deletar o representante: " + nome + ", é uma ação permanente, tem certeza?");
    $("#btnDeletar").attr("href", link + "/deletarRep" + id);
    myModal.show();
    }

    function buscarCidades() {
    $("#cidade").empty(); // Limpa as opções do seletor de cidades

    var uf = $("#estado").val(); // Obtém o estado selecionado
    if (!uf) return; // Garante que um estado foi selecionado

    $("#divCidade").addClass('d-none'); // Oculta o seletor de cidade inicialmente
    $("#loader").removeClass('d-none'); // Exibe o loader

    var link = `buscarCidades/${uf}`;
    $.ajax({
    url: link,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
            if (data && data.length > 0) { // Verifica se há cidades retornadas
            // Adiciona cada cidade como uma nova opção
            data.forEach(cidade => {
            $("#cidade").append(`<option class='form-control' value='${cidade.id}'>${cidade.nome}</option>`);
            });
            $("#divCidade").removeClass('d-none'); // Mostra o seletor de cidade
            }
            $("#loader").addClass('d-none'); // Oculta o loader
            },
            error: function() {
            console.error("Erro ao buscar cidades.");
            $("#loader").addClass('d-none'); // Oculta o loader em caso de erro
            }
    });
    }
</script>
<script type="text/javascript" src="{{url('js/jquery.mask.js')}}"></script>
<script type="text/javascript">
    let cidadesAtendidas = [];
    let repId = null;
    function showRegioesModal(id, nome) {
    repId = id;
    document.getElementById('repName').textContent = nome;
    fetchCidadesAtendidas(id);
    new bootstrap.Modal(document.getElementById('modal-regioes')).show();
    }

    function fetchCidades(estadoId) {
    $.ajax({
    url: `buscarCidades/${estadoId}`,
            type: 'GET',
            success: function(cidades) {
            const cidadeSelect = $("#cidadeSelect");
            cidadeSelect.empty().append('<option value="">Selecione uma Cidade</option>');
            cidades.forEach(cidade => {
            cidadeSelect.append(`<option value="${cidade.id}">${cidade.nome}</option>`);
            });
            $("#cidadeSelectDiv").removeClass("d-none");
            }
    });
    }

    function addCidade() {
    const cidadeId = $("#cidadeSelect").val();
    const cidadeNome = $("#cidadeSelect option:selected").text();
    if (cidadeId) {
    cidadesAtendidas.push({ id: cidadeId, nome: cidadeNome });
    renderCidadesAtendidas();
    }
    }

    function renderCidadesAtendidas() {
    const tableBody = $("#cidadesAtendidasTable");
    tableBody.empty();
    cidadesAtendidas.forEach((cidade, index) => {
    tableBody.append(`
            <tr>
                <td>${cidade.nome}</td>
                <td><button type="button" onclick="removeCidade(${index})" class="btn btn-danger">X</button></td>
            </tr>
        `);
    });
    }

    function removeCidade(index) {
    cidadesAtendidas.splice(index, 1);
    renderCidadesAtendidas();
    }

    function fetchCidadesAtendidas(repId) {
    $.ajax({
    url: `cidadesAtendidas/${repId}`,
            type: 'GET',
            success: function(data) {
            cidadesAtendidas = data;
            renderCidadesAtendidas();
            }
    });
    }

    function saveCidadesAtendidas() {
    $.ajax({
    url: `salvarCidadesAtendidas/${repId}`,
            type: 'POST',
            data: { cidades: cidadesAtendidas, _token: '{{ csrf_token() }}' },
            success: function() {
            alert('Regiões atendidas atualizadas com sucesso!');
            $("#modal-regioes").modal('hide');
            }
    });
    }
</script>
<script type="text/javascript">
    $("#addRep").submit(function () {
    $("#tel1").unmask();
    $("#tel2").unmask();
    $("#addRep").submit();
    });
    $(document).ready(function () {
    $("#tel1").mask("(00) 00009-0000");
    $("#tel2").mask("(00) 00009-0000");
    });
</script>
@endsection