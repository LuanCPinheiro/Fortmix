@extends('layouts.dashboardLayout')

@section('titulo')
Usuários Fortmix
@endsection

@section('active4')
active
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Usuários</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Lista de Usuários Ativos</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center">
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
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalUser">Adicionar Usuário</button>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nível de Permissão</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuariosAtivos as $user)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user->nivelpermissao}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user->email}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <button type="button" onclick="desativar({{$user->id}}, '{{$user->name}}')"
                                                    class="btn btn-danger btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Desativar Usuário" data-container="body" data-animation="true">
                                                <i class="fas fa-ban"></i>
                                            </button>
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

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Lista de Usuários Inativos</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center">
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nível de Permissão</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuariosInativos as $user)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user->nivelpermissao}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user->email}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <button type="button" onclick="ativar({{$user->id}}, '{{$user->name}}')"
                                                    class="btn btn-success btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="left" title="Ativar Usuário" data-container="body"
                                                    data-animation="true"><i class="fas fa-check"></i></button>

                                            <button type="button" onclick="deletar({{$user->id}}, '{{$user->name}}')"
                                                    class="btn btn-danger btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="left" title="Excluir Usuário" data-container="body"
                                                    data-animation="true"><i class="fas fa-trash"></i></button>
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

@include('usuarios.cadUser')

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
@endsection

@section('endfiles')
<script type="text/javascript">
    function desativar(id, nome) {
    var myModal = new bootstrap.Modal(document.getElementById('modal-desativar'), {
    keyboard: false
    });
    var link = $("#btnDesativar").attr("href");
    $("#pDesativar").html("Ao confirmar você irá desativar o usuário: " + nome + "!");
    $("#btnDesativar").attr("href", link + "/desativarUser" + id);
    myModal.show();
    }

    function ativar(id, nome) {
    var myModal = new bootstrap.Modal(document.getElementById('modal-ativar'), {
    keyboard: false
    });
    var link = $("#btnAtivar").attr("href");
    $("#pAtivar").html("Ao confirmar você irá ativar o usuário: " + nome + "!");
    $("#btnAtivar").attr("href", link + "/ativarUser" + id);
    myModal.show();
    }

    function deletar(id, nome) {
    var myModal = new bootstrap.Modal(document.getElementById('modal-deletar'), {
    keyboard: false
    });
    var link = $("#btnDeletar").attr("href");
    $("#pDeletar").html("Ao confirmar você irá deletar o usuário: " + nome + ", é uma ação permanente, tem certeza?");
    $("#btnDeletar").attr("href", link + "/deletarUser" + id);
    myModal.show();
    }
</script>