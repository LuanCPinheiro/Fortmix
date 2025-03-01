@extends('layouts.dashboardLayout')

@section('titulo', 'Lista de Produtos')

@section('active10', 'active')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Produtos</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Produtos</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-4">Novo Produto</a>

    @foreach ($familias as $familia)
    <div class="mb-5">
        <h3 class="d-flex align-items-center">
            <img src="{{ asset('storage/' . $familia->icone) }}" alt="{{ $familia->nome }}" width="50" class="me-2">
            {{ $familia->nome }}
        </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ícone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($familia->produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>
                        @if ($produto->icone)
                        <img src="{{ asset('storage/' . $produto->icone) }}" alt="{{ $produto->nome }}" width="50">
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#nutrientesModal{{ $produto->id }}">Nutrientes</a>
                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#pecuariasModal{{ $produto->id }}">Pecuárias</a>
                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#periodosModal{{ $produto->id }}">Períodos</a>
                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#estagiosModal{{ $produto->id }}">Estágios</a>
                        <a href="{{ route('produtos.pdf', $produto->id) }}" class="btn btn-success btn-sm" target="_blank">Gerar PDF</a>
                        @if(Auth::user()->isAdmin())
                        <a href="{{ route('produtos.preview', $produto->id) }}" class="btn btn-primary btn-sm" target="_blank">Pré-visualizar PDF</a>
                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modais para Relacionamentos --}}
    @foreach ($familia->produtos as $produto)
    @include('produtos.modals.nutrientes', ['produto' => $produto])
    @include('produtos.modals.pecuarias', ['produto' => $produto])
    @include('produtos.modals.periodos', ['produto' => $produto])
    @include('produtos.modals.estagios', ['produto' => $produto])
    @endforeach
    @endforeach
</div>
@endsection
