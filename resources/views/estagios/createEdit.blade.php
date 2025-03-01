@extends('layouts.dashboardLayout')

@section('titulo', isset($estagio) ? 'Editar Estágio Animal' : 'Novo Estágio Animal')

@section('active8', 'active')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">
            {{ isset($estagio) ? 'Editar Estágio' : 'Novo Estágio' }}
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>{{ isset($estagio) ? 'Editar Estágio Animal' : 'Novo Estágio Animal' }}</h1>
    <form action="{{ isset($estagio) ? route('estagios.update', $estagio) : route('estagios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($estagio))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $estagio->nome ?? old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="icone" class="form-label">Ícone</label>
            @if (isset($estagio) && $estagio->icone)
            <img src="{{ asset('storage/' . $estagio->icone) }}" alt="Ícone atual" width="50" class="d-block mb-2">
            @endif
            <input type="file" class="form-control" id="icone" name="icone">
        </div>

        <button type="submit" class="btn btn-success">{{ isset($estagio) ? 'Atualizar' : 'Salvar' }}</button>
    </form>
</div>
@endsection
