<div class="modal fade" id="modal{{$uf}}" tabindex="-1" aria-labelledby="modal{{$uf}}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal{{$uf}}Label">Cidades e Representantes - {{$estado}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach($cidades as $cidade)
                @if(count($cidade->representantes) > 0)
                <div class="row justify-content-start">
                    <h1>{{$cidade->nome}}</h1>
                    @foreach($cidade->representantes as $rep)
                    @if($rep->active)
                    <div class="col-auto mb-2">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$rep->nome}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$rep->cargo}}</h6>
                                @if($rep->formacao !== null && $rep->formacao !== "")
                                <p class="card-text">
                                    {{$rep->formacao}}
                                </p>
                                @endif
                                <p class="card-text">
                                    <span class="telmask">{{$rep->tel1}}</span>
                                </p>
                                @if($rep->tel2 !== null && $rep->tel2 !== "")
                                <p class="card-text">
                                    <span class="telmask">{{$rep->tel2}}</span>
                                </p>
                                @endif
                                <p class="card-text">
                                    <a target="_blank" class="btn btn-primary" href="https://api.whatsapp.com/send?phone=55{{$rep->tel1}}">
                                        <i class="fas fa-brands fa-whatsapp"></i> Chamar no WhatsApp
                                    </a>
                                </p>
                                <p class="card-text">
                                    <a target="_blank" class="btn btn-primary" href="tel:+55{{$rep->tel1}}">
                                        <i class="fa fa-phone-alt"></i> Ligar
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <hr/>
                @endif
                @endforeach
                <div class="row justify-content-start">
                    <h1>Matriz</h1>
                    <div class="col-auto mb-2">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">FORTMIX</h5>
                                <p class="card-text">
                                    Fale com nossa equipe:
                                </p>
                                <p class="card-text">
                                    <span class="telmask">67981539267</span>
                                </p>
                                <p class="card-text">
                                    <span class="telmask">6735963498</span>
                                </p>
                                <p class="card-text">
                                    <a target="_blank" class="btn btn-primary" href="https://api.whatsapp.com/send?phone=5567981539267">
                                        <i class="fas fa-brands fa-whatsapp"></i> Chamar no WhatsApp
                                    </a>
                                </p>
                                <p class="card-text">
                                    <a target="_blank" class="btn btn-primary" href="tel:+556735963498">
                                        <i class="fas fa-brands fa-whatsapp"></i> Ligar
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>