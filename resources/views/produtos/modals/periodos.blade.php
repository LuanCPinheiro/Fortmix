{{-- Modal para Períodos --}}
<div class="modal fade" id="periodosModal{{ $produto->id }}" tabindex="-1" aria-labelledby="periodosModalLabel{{ $produto->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="periodosModalLabel{{ $produto->id }}">Gerenciar Períodos - {{ $produto->nome }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produtos.savePeriodos', $produto) }}" method="POST">
                    @csrf
                    @php
                    $pivot = $produto->periodos->pluck('id')->toArray();
                    @endphp
                    <div class="row">
                        @foreach ($periodos as $periodo)
                        <div class="col-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="periodos[]" value="{{ $periodo->id }}" id="periodo{{ $periodo->id }}" {{ in_array($periodo->id, $pivot) ? 'checked' : '' }}>
                                <label class="form-check-label" for="periodo{{ $periodo->id }}">
                                    {{ $periodo->nome }}
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
