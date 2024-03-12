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

@endsection

@section('endfiles')
<script type="text/javascript">
    function buscarCidades() {
        $("#cidade").html("");

        var uf = $("#estado").val();

        var append = "";

        if (!$("#divCidade").hasClass('hidden')) {
            $("#divCidade").addClass('hidden');
        }

        $("#loader").removeClass('hidden');

        var link = "buscarCidadesAtivas" + uf;

        $.ajax({
            url: link,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    for (i in data) {
                        append += "<option class='form-control' value='" + data[i].id + "'>"
                                + data[i].nome + "</option>";
                    }
                    $("#cidade").html(append);
                    $("#loader").addClass('hidden');
                    $("#divCidade").removeClass('hidden');
                }
            }
        });
    }
</script>
@endsection