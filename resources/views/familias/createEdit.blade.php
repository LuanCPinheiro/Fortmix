@extends('layouts.dashboardLayout')

@section('titulo')
Família Fortmix
@endsection

@section('active6')
active
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Famílias</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>{{ isset($familia) ? 'Editar Família' : 'Nova Família' }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ isset($familia) ? route('familias.update', $familia) : route('familias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($familia))
        @method('PUT')
        @endif
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $familia->nome ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao', $familia->descricao ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="icone" class="form-label">Ícone</label>
            <input type="file" class="form-control" id="icone" name="icone">
        </div>
        <div class="mb-3">
            <label for="banner" class="form-label">Banner</label>
            <input type="file" class="form-control" id="banner" name="banner">
        </div>
        <div class="mb-3">
            <label for="sacaria">Sacaria</label>
            <input type="file" name="sacaria" class="form-control" accept="image/*">
            @if (isset($familia) && $familia->sacaria)
            <p>Imagem atual:</p>
            <img src="{{ asset('storage/' . $familia->sacaria) }}" alt="Sacaria" style="width: 150px;">
            @endif
        </div>
        <div class="mb-3">
            <label for="ordem_exibicao" class="form-label">Ordem de Exibição</label>
            <input type="number" class="form-control" id="ordem_exibicao" name="ordem_exibicao" value="{{ old('ordem_exibicao', $familia->ordem_exibicao ?? 0) }}">
        </div>
        <button type="submit" class="btn btn-success">{{ isset($familia) ? 'Atualizar' : 'Salvar' }}</button>
    </form>
</div>
@endsection