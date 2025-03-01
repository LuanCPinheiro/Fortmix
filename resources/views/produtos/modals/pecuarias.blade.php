{{-- Modal para Pecuárias --}}
<div class="modal fade" id="pecuariasModal{{ $produto->id }}" tabindex="-1" aria-labelledby="pecuariasModalLabel{{ $produto->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pecuariasModalLabel{{ $produto->id }}">Gerenciar Pecuárias - {{ $produto->nome }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produtos.savePecuarias', $produto) }}" method="POST">
                    @csrf
                    <div class="row">
                        @php
                        $pivot = $produto->pecuarias->pluck('id')->toArray();
                        @endphp
                        @foreach ($pecuarias as $pecuaria)
                        <div class="col-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pecuarias[]" value="{{ $pecuaria->id }}" id="pecuaria{{ $pecuaria->id }}" {{ in_array($pecuaria->id, $pivot) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pecuaria{{ $pecuaria->id }}">
                                    {{ $pecuaria->nome }}
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
