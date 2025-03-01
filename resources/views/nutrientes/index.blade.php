@extends('layouts.dashboardLayout')

@section('titulo', 'Lista de Nutrientes Fortmix')

@section('active9', 'active')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Nutrientes</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Nutrientes</h1>
    <a href="{{ route('nutrientes.create') }}" class="btn btn-primary mb-3">Novo Nutriente</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Unidade de Medida</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nutrientes as $nutriente)
            <tr>
                <td>{{ $nutriente->nome }}</td>
                <td>{{ $nutriente->descricao }}</td>
                <td>{{ $nutriente->unidade_medida }}</td>
                <td>
                    <a href="{{ route('nutrientes.edit', $nutriente) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('nutrientes.destroy', $nutriente) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
