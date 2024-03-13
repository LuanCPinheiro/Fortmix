<div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="modalUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUserLabel">Cadastrar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="addUser" id="addUser" action="{{route('dashboard.addUser')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="d-flex row justify-content-center">
                        <div class="col-7">
                            <label for="name" class="form-control-label">Nome:</label>
                            <input class="form-control" type="text" required="true" value="" name="name" id="name"/>
                        </div>
                        <div class="col-5">
                            <label for="email" class="form-control-label">Email:</label>
                            <input class="form-control" type="email" required="true" value="" name="email" id="email"/>
                        </div>
                    </div>
                    <div class="d-flex row justify-content-center">
                        <div class="col-6">
                            <label for="password" class="form-control-label">Senha:</label>
                            <input class="form-control" type="password" required="true" value="" name="password" id="password"/>
                        </div>
                        <div class="col-6">
                            <label for="nivelpermissao" class="form-control-label">Nível de Permissão:</label>
                            <select class="form-control" type="text" required="true" value="" name="nivelpermissao" id="nivelpermissao">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center" id="botao">
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