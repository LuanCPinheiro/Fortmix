@extends('layouts.dashboardLayout')

@section('titulo', 'Editar Tag')

@section('active5', 'active')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('tags.index') }}">Tags</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Editar Tag</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $tag->nome }}" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection
