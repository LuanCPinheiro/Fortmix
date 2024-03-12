@extends('layouts.dashboardLayout')

@section('titulo')
Dashboard Fortmix
@endsection

@section('active1')
active
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Início</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body pb-0">
                <h6>Usuário Logado: {{Auth::user()->name}}</h6>
            </div>
        </div>
    </div>
</div>
@endsection