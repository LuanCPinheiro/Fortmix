{{-- Modal para Nutrientes --}}
<div class="modal fade" id="nutrientesModal{{ $produto->id }}" tabindex="-1" aria-labelledby="nutrientesModalLabel{{ $produto->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl"> {{-- Classe modal-xl para largura extra --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nutrientesModalLabel{{ $produto->id }}">Gerenciar Nutrientes - {{ $produto->nome }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produtos.saveNutrientes', $produto) }}" method="POST">
                    @csrf
                    @php
                    $pivot = $produto->nutrientes->keyBy('id');
                    @endphp
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nutriente</th>
                                <th>Mínimo</th>
                                <th>Unidade (Min)</th>
                                <th>Máximo</th>
                                <th>Unidade (Max)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nutrientes as $nutriente)
                            <tr>
                                <td>
                                    {{ $nutriente->nome }} {{ $nutriente->descricao ? '- ' . $nutriente->descricao : '' }}
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="nutrientes[{{ $nutriente->id }}][minimo]" value="{{ $pivot[$nutriente->id]->pivot->minimo ?? '' }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="nutrientes[{{ $nutriente->id }}][medidamin]" value="{{ $pivot[$nutriente->id]->pivot->medidamin ?? '' }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="nutrientes[{{ $nutriente->id }}][maximo]" value="{{ $pivot[$nutriente->id]->pivot->maximo ?? '' }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="nutrientes[{{ $nutriente->id }}][medidamax]" value="{{ $pivot[$nutriente->id]->pivot->medidamax ?? '' }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success mt-3">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
