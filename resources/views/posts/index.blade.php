@extends('layouts.dashboardLayout')

@section('titulo')
Posts Fortmix
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Posts</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Lista de Posts</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-center mb-3">
                    <a href="{{ route('posts.create') }}" class="btn btn-success">Criar Novo Post</a>
                </div>
                @if(session('success'))
                <div class="d-flex justify-content-center">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>{{ session('success') }}</strong></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descrição</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Autor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Criação</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td class="text-break">
                                    <h6 class="mb-0 text-sm">{{ $post->titulo }}</h6>
                                </td>
                                <td class="text-break">
                                    <h6 class="mb-0 text-sm">{{ Str::limit($post->descricao, 50) }}</h6>
                                </td>
                                <td>
                                    <h6 class="mb-0 text-sm">{{ $post->autor->name ?? 'Desconhecido' }}</h6>
                                </td>
                                <td>
                                    @if ($post->status === 'publicado')
                                    <span class="badge bg-success">Publicado</span>
                                    @elseif ($post->status === 'rascunho')
                                    <span class="badge bg-warning">Rascunho</span>
                                    @else
                                    <span class="badge bg-secondary">Arquivado</span>
                                    @endif
                                </td>
                                <td>
                                    <h6 class="mb-0 text-sm">{{ $post->created_at->format('d/m/Y H:i') }}</h6>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('posts.updateStatus', $post->slug) }}" method="POST" class="me-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                                <option value="rascunho" {{ $post->status === 'rascunho' ? 'selected' : '' }}>Rascunho</option>
                                                <option value="publicado" {{ $post->status === 'publicado' ? 'selected' : '' }}>Publicado</option>
                                                <option value="arquivado" {{ $post->status === 'arquivado' ? 'selected' : '' }}>Arquivado</option>
                                            </select>
                                        </form>
                                        <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                        <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
