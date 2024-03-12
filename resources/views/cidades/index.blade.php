@extends('layouts.dashboardLayout')

@section('titulo')
Regiões Atendidas Fortmix
@endsection

@section('active3')
active
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Regiões Atendidas</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Regiões Atendidas: Mato Grosso do Sul</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center">
                    <button onclick="buscarCidades('MS')" class="btn btn-success" type="button">Adicionar Cidade: MS</button>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cidade</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">UF</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cidadesMS as $cidade)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->nome}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->estado->uf}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"></h6>
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
                <h6>Regiões Atendidas: Mato Grosso</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center">
                    <button onclick="buscarCidades('MT')" class="btn btn-success" type="button">Adicionar Cidade: MT</button>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cidade</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">UF</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cidadesMT as $cidade)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->nome}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->estado->uf}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"></h6>
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
                <h6>Regiões Atendidas: Goiás</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center">
                    <button onclick="buscarCidades('GO')" class="btn btn-success" type="button">Adicionar Cidade: GO</button>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cidade</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">UF</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cidadesGO as $cidade)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->nome}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->estado->uf}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"></h6>
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
                <h6>Regiões Atendidas: São Paulo</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center">
                    <button onclick="buscarCidades('SP')" class="btn btn-success" type="button">Adicionar Cidade: SP</button>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cidade</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">UF</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cidadesSP as $cidade)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->nome}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->estado->uf}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"></h6>
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
                <h6>Regiões Atendidas: Minas Gerais</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center">
                    <button onclick="buscarCidades('MG')" class="btn btn-success" type="button">Adicionar Cidade: MG</button>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cidade</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">UF</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cidadesMG as $cidade)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->nome}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$cidade->estado->uf}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"></h6>
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

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient">Adicionar uma cidade</h3>
                    </div>
                    <div class="card-body">
                        <form name="addRegiao" id="addRegiao" action="{{route('dashboard.addRegiao')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="d-flex row justify-content-center hidden" id="loader">
                                <div class="col-12 text-center">
                                    <span>Buscando Cidades</span>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Buscando Cidades</span>
                                    </div>     
                                </div>
                            </div>
                            <div class="hidden" id="cidadeDiv">
                                <label class="form-control-label">Selecione a Cidade</label>
                                <select class="form-control" name="cidade" id="cidade">
                                </select>
                            </div>
                            <div class="text-center hidden" id="botao">
                                <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('endfiles')
<script type="text/javascript">
    function buscarCidades(uf) {
        $("#cidade").html("");

        var myModal = new bootstrap.Modal(document.getElementById('modal-form'), {
            keyboard: false
        });

        $("#loader").removeClass('hidden');
        $("#cidadeDiv").addClass('hidden');
        $("#botao").addClass('hidden');
        myModal.show();

        var append = "";

        var link = "buscarCidades" + uf;

        $.ajax({
            url: link,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    append += "<option class='form-control' value=''>Selecione...</option>";
                    for (i in data) {
                        append += "<option class='form-control' value='" + data[i].id + "'>"
                                + data[i].nome + "</option>";
                    }
                    $("#cidade").html(append);
                    $("#loader").addClass('hidden');
                    $("#cidadeDiv").removeClass('hidden');
                    $("#botao").removeClass('hidden');
                }
            }
        });
    }
</script>
@endsection