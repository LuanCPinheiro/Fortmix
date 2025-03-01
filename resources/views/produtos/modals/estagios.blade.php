{{-- Modal para Estágios Animais --}}
<div class="modal fade" id="estagiosModal{{ $produto->id }}" tabindex="-1" aria-labelledby="estagiosModalLabel{{ $produto->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="estagiosModalLabel{{ $produto->id }}">Gerenciar Estágios Animais - {{ $produto->nome }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produtos.saveEstagios', $produto) }}" method="POST">
                    @csrf
                    @php
                        $pivot = $produto->estagiosAnimais->pluck('id')->toArray();
                    @endphp
                    <div class="row">
                        @foreach ($estagios as $estagio)
                        <div class="col-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="estagios[]" value="{{ $estagio->id }}" id="estagio{{ $estagio->id }}" {{ in_array($estagio->id, $pivot) ? 'checked' : '' }}>
                                <label class="form-check-label" for="estagio{{ $estagio->id }}">
                                    {{ $estagio->nome }}
                                </label>
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
