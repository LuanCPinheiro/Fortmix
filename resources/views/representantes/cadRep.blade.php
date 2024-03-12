<div class="modal fade" id="modalRep" tabindex="-1" aria-labelledby="modalRepLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRepLabel">Cadastrar Representante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="addRep" id="addRep" action="{{route('dashboard.addRep')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="d-flex row justify-content-center">
                        <div class="col-8">
                            <label for="nome" class="form-control-label">Nome:</label>
                            <input class="form-control" type="text" required="true" value="" name="nome" id="nome"/>
                        </div>
                        <div class="col-4">
                            <label for="sexo" class="form-control-label">Sexo:</label>
                            <select class="form-control" required="true" name="sexo" id="sexo">
                                <option value="">Selecione...</option>
                                <option value="1">Masculino</option>
                                <option value="2">Feminino</option>
                                <option value="0">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex row justify-content-center mt-2">
                        <div class="col-6">
                            <label for="tel1" class="form-control-label">Contato com whatsapp:</label>
                            <input class="form-control" type="text" required="true" value="" name="tel1" id="tel1"/>
                        </div>
                        <div class="col-6">
                            <label for="tel2" class="form-control-label">Contato 2</label>
                            <input class="form-control" type="text" value="" name="tel2" id="tel2"/>
                        </div>
                    </div>
                    <div class="d-flex row justify-content-center mt-2">
                        <div class="col-4">
                            <label for="cargo" class="form-control-label">Cargo:</label>
                            <input class="form-control" type="text" required="true" value="Representante Comercial" name="cargo" id="cargo"/>
                        </div>
                        <div class="col-4">
                            <label for="formacao" class="form-control-label">Formação:</label>
                            <input class="form-control" type="text" value="" name="formacao" id="formacao"/>
                        </div>
                        <div class="col-4">
                            <label for="apelido" class="form-control-label">Apelido:</label>
                            <input class="form-control" type="text" value="" name="apelido" id="apelido"/>
                        </div>
                    </div>
                    <div class="d-flex row justify-content-start mt-2">
                        <div class="col-6">
                            <label for="estado" class="form-control-label">Estado:</label>
                            <select onchange="buscarCidades()" class="form-control" required="true" name="estado" id="estado">
                                <option value="">Selecione...</option>
                                @foreach($estados as $estado)
                                <option value="{{$estado->uf}}">{{$estado->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 hidden" id="divCidade">
                            <label for="cidade" class="form-control-label">Cidade:</label>
                            <select class="form-control" required="true" name="cidade" id="cidade">
                            </select>
                        </div>
                        <div class="col-6 d-flex row justify-content-center hidden" id="loader">
                                <label class="col-12 text-center form-control-label">
                                    Buscando Cidades:
                                </label>
                                <div class="col-12 text-center">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Buscando Cidades</span>
                                    </div>     
                                </div>
                            </div>
                    </div>
                    <div class="text-center" id="botao">
                        <button type="clear" class="btn bg-gradient-warning btn-lg mt-4 mb-0">Limpar Campos</button>
                        <button type="submit" class="btn bg-gradient-success btn-lg mt-4 mb-0">Cadastrar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>