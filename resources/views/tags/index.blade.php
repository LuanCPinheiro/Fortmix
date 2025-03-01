@extends('layouts.dashboardLayout')

@section('titulo', 'Lista de Tags Fortmix')

@section('active5', 'active')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tags</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Tags</h1>
    <a href="{{ route('tags.create') }}" class="btn btn-primary">Nova Tag</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Slug</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag->nome }}</td>
                <td>{{ $tag->slug }}</td>
                <td>
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
