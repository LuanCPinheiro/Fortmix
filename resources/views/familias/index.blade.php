@extends('layouts.dashboardLayout')

@section('titulo')
Lista de Famílias Fortmix
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
    <h1>Famílias de Produtos</h1>
    <a href="{{ route('familias.create') }}" class="btn btn-primary">Nova Família</a>
    <table class="table mt-3 table-bordered" style="background-color: white;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ícone</th>
                <th>Banner</th>
                <th>Sacaria</th>
                <th>Ordem de Exibição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($familias as $familia)
            <tr>
                <td>{{ $familia->nome }}</td>
                <td>
                    @if ($familia->icone)
                    <img src="{{ asset('storage/' . $familia->icone) }}" alt="Ícone" style="width: auto; height: 5vh;">
                    @endif
                </td>
                <td>
                    @if ($familia->banner)
                    <img src="{{ asset('storage/' . $familia->banner) }}" alt="Banner" style="width: 150px; height: auto;">
                    @endif
                </td>
                <td>
                    @if ($familia->sacaria)
                    <img src="{{ asset('storage/' . $familia->sacaria) }}" alt="Sacaria" style="width: 80px;">
                    @endif
                </td>
                <td>{{ $familia->ordem_exibicao }}</td>
                <td>
                    <a href="{{ route('familias.edit', $familia) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('familias.destroy', $familia) }}" method="POST" style="display: inline;">
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