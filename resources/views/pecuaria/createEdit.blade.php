@extends('layouts.dashboardLayout')

@section('titulo')
Pecuária Fortmix
@endsection

@section('active5')
active
@endsection

@section('content')
<div class="container">
    <h1>{{ isset($pecuaria) ? 'Editar Pecuária' : 'Nova Pecuária' }}</h1>
    <form action="{{ isset($pecuaria) ? route('pecuarias.update', $pecuaria) : route('pecuarias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($pecuaria))
        @method('PUT')
        @endif
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $pecuaria->nome ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao', $pecuaria->descricao ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="icone" class="form-label">Ícone</label>
            <input type="file" class="form-control" id="icone" name="icone">
        </div>
        <div class="mb-3">
            <label for="banner" class="form-label">Banner</label>
            <input type="file" class="form-control" id="banner" name="banner">
        </div>
        <button type="submit" class="btn btn-success">{{ isset($pecuaria) ? 'Atualizar' : 'Salvar' }}</button>
    </form>
</div>
@endsection
