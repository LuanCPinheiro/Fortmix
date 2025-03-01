@extends('layouts.dashboardLayout')

@section('titulo', isset($nutriente) ? 'Editar Nutriente' : 'Novo Nutriente')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">
            {{ isset($nutriente) ? 'Editar Nutriente' : 'Novo Nutriente' }}
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>{{ isset($nutriente) ? 'Editar Nutriente' : 'Novo Nutriente' }}</h1>
    <form action="{{ isset($nutriente) ? route('nutrientes.update', $nutriente) : route('nutrientes.store') }}" method="POST">
        @csrf
        @if (isset($nutriente))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $nutriente->nome ?? old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ $nutriente->descricao ?? old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="unidade_medida" class="form-label">Unidade de Medida</label>
            <input type="text" class="form-control" id="unidade_medida" name="unidade_medida" value="{{ $nutriente->unidade_medida ?? old('unidade_medida') }}">
        </div>

        <button type="submit" class="btn btn-success">{{ isset($nutriente) ? 'Atualizar' : 'Salvar' }}</button>
    </form>
</div>
@endsection
