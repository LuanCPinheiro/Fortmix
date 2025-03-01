@extends('layouts.dashboardLayout')

@section('titulo')
Lista de Períodos Fortmix
@endsection

@section('active7')
active
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Períodos</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Períodos</h1>
    <a href="{{ route('periodos.create') }}" class="btn btn-primary mb-3">Novo Período</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ícone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodos as $periodo)
            <tr>
                <td>{{ $periodo->nome }}</td>
                <td>
                    @if ($periodo->icone)
                    <img src="{{ asset('storage/' . $periodo->icone) }}" alt="Ícone" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('periodos.edit', $periodo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('periodos.destroy', $periodo) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                    <!-- Botão para abrir modal de produtos -->
                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#produtosModal{{ $periodo->id }}">Produtos</a>
                </td>
            </tr>

            <!-- Modal para gerenciar produtos -->
        <div class="modal fade" id="produtosModal{{ $periodo->id }}" tabindex="-1" aria-labelledby="produtosModalLabel{{ $periodo->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="produtosModalLabel{{ $periodo->id }}">Gerenciar Produtos - {{ $periodo->nome }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('periodos.attachProdutos', $periodo->id) }}" method="POST">
                            @csrf
                            <div class="accordion" id="accordionProdutos">
                                @foreach ($familias as $familia)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $familia->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $familia->id }}" aria-expanded="false" aria-controls="collapse{{ $familia->id }}">
                                            <img src="{{ asset('storage/' . $familia->icone) }}" alt="{{ $familia->nome }}" width="30" class="me-2">
                                            {{ $familia->nome }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $familia->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $familia->id }}" data-bs-parent="#accordionProdutos">
                                        <div class="accordion-body">
                                            @foreach ($familia->produtos as $produto)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="produtos[]" value="{{ $produto->id }}" 
                                                       @if ($periodo->produtos->contains($produto->id)) checked @endif>
                                                <label class="form-check-label">
                                                    <img src="{{ asset('storage/' . $produto->icone) }}" alt="{{ $produto->nome }}" width="30" class="me-2">
                                                    {{ $produto->nome }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
