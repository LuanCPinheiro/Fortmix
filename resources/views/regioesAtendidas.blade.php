@extends('layouts.layout')

@section('title')
Regiões Atendidas - Fortmix Nutrição Animal
@endsection

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Onde estamos?</p>
            <h1 class="display-5 mb-4">Veja as regiões atendidas e nossos representantes</h1>
        </div>
        <div class="row gy-5 gx-4 justify-content-center">
            @foreach($cidadesPorEstado as $sigla => $cidades)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img class="img-fluid" src="{{ url('/img/svg/' . $sigla . '-square-rounded.svg') }}" alt="{{ $sigla }}">
                    <div class="service-img">
                        <img class="img-fluid" src="{{ url('/img/svg/' . $sigla . '-square-rounded.svg') }}" alt="{{ $sigla }}">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            @php
                            $estadoNome = $cidades->first()?->estado?->nome ?? "Sem Representantes";
                            @endphp
                            <hr class="w-25">
                            <h3 class="mb-0">{{ $estadoNome }} - {{ $sigla }}</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Veja as cidades atendidas e nossos representantes no {{$estadoNome}}</p>
                        </div>
                    </div>
                    <button class="btn btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$sigla}}">Encontrar Representantes</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modais para Cidades e Representantes -->
@foreach($cidadesPorEstado as $sigla => $cidades)
<div class="modal fade" id="modal{{ $sigla }}" tabindex="-1" aria-labelledby="modal{{ $sigla }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cidades e Representantes - {{ $estadoNome }} ({{ $sigla }})</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach($cidades as $cidade)
                <div class="row justify-content-start mb-4">
                    <h2 class="mb-3">{{ $cidade->nome }}</h2>
                    @foreach($cidade->representantes as $rep)
                    @if($rep->active)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $rep->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $rep->cargo }}</h6>
                                @if($rep->formacao)
                                <p class="card-text">{{ $rep->formacao }}</p>
                                @endif
                                <p class="card-text"><span class="telmask">{{ $rep->tel1 }}</span></p>
                                @if($rep->tel2)
                                <p class="card-text"><span class="telmask">{{ $rep->tel2 }}</span></p>
                                @endif
                                <p class="card-text">
                                    <a target="_blank" class="btn btn-primary me-2" href="https://api.whatsapp.com/send?phone=55{{ $rep->tel1 }}">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                    <a target="_blank" class="btn btn-primary" href="tel:+55{{ $rep->tel1 }}">
                                        <i class="fa fa-phone-alt"></i> Ligar
                                    </a>
                                </p>
                            </div>  
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endforeach
                <div class="row justify-content-start">
                    <h2 class="mb-4">Matriz</h2>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">FORTMIX</h5>
                                <p class="card-text">Fale com nossa equipe:</p>
                                <p class="card-text"><span class="telmask">67981539267</span></p>
                                <p class="card-text"><span class="telmask">6735963498</span></p>
                                <p class="card-text">
                                    <a target="_blank" class="btn btn-primary me-2" href="https://api.whatsapp.com/send?phone=5567981539267">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                    <a target="_blank" class="btn btn-primary" href="tel:+556735963498">
                                        <i class="fa fa-phone-alt"></i> Ligar
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
@endforeach
@endsection

@section('endfiles')
<script type="text/javascript" src="{{url('js/jquery.mask.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.telmask').mask("(00) 00009-0000");
});
</script>
@endsection
