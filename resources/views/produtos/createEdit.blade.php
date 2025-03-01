@extends('layouts.dashboardLayout')

@section('titulo', isset($produto) ? 'Editar Produto' : 'Novo Produto')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">
            {{ isset($produto) ? 'Editar Produto' : 'Novo Produto' }}
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>{{ isset($produto) ? 'Editar Produto' : 'Novo Produto' }}</h1>
    <form action="{{ isset($produto) ? route('produtos.update', $produto) : route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($produto))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome ?? old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="codigo_sistema" class="form-label">Código do Sistema</label>
            <input type="text" class="form-control" id="codigo_sistema" name="codigo_sistema" value="{{ $produto->codigo_sistema ?? old('codigo_sistema') }}">
        </div>

        <div class="mb-3">
            <label for="familia_id" class="form-label">Família</label>
            <select class="form-control" id="familia_id" name="familia_id" required>
                @foreach ($familias as $familia)
                <option value="{{ $familia->id }}" {{ (isset($produto) && $produto->familia_id == $familia->id) ? 'selected' : '' }}>
                    {{ $familia->nome }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao_tecnica" class="form-label">Descrição Técnica</label>
            <textarea class="form-control" id="descricao_tecnica" name="descricao_tecnica" required>{{ $produto->descricao_tecnica ?? old('descricao_tecnica') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="descricao_comercial" class="form-label">Descrição Comercial</label>
            <textarea class="form-control" id="descricao_comercial" name="descricao_comercial" required>{{ $produto->descricao_comercial ?? old('descricao_comercial') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="indicacao_uso" class="form-label">Indicação de Uso</label>
            <textarea class="form-control" id="indicacao_uso" name="indicacao_uso" required>{{ $produto->indicacao_uso ?? old('indicacao_uso') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="modo_uso" class="form-label">Modo de Uso</label>
            <textarea class="form-control" id="modo_uso" name="modo_uso" required>{{ $produto->modo_uso ?? old('modo_uso') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="icone" class="form-label">Ícone</label>
            <input type="file" class="form-control" id="icone" name="icone">
        </div>

        <div class="mb-3">
            <label for="banner" class="form-label">Banner</label>
            <input type="file" class="form-control" id="banner" name="banner">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="pronto_para_uso" name="pronto_para_uso" value="1" {{ isset($produto) && $produto->pronto_para_uso ? 'checked' : '' }}>
            <label class="form-check-label" for="pronto_para_uso">Pronto para uso?</label>
        </div>

        <button type="submit" class="btn btn-success mt-3">{{ isset($produto) ? 'Atualizar' : 'Salvar' }}</button>
    </form>
</div>
@endsection
