@extends('layouts.layout')

@section('title')
Regiões Atendidas - Fortmix Nutrição Animal
@endsection

@section('seo')
<link rel="canonical" href="https://fortmixnutricaoanimal.com.br/regioesAtendidas"/>
<meta name="robots" content="index, follow, max-image-preview:large"/>
<meta name="description" content="Veja aqui se atendemos a sua região para que você possa conhecer nossa tradição e qualidade!">
@endsection

@section('ogcontent')
<meta property="og:url" content="https://fortmixnutricaoanimal.com.br/regioesAtendidas">
<meta property="og:title" content="Regiões Atendidas - Fortmix Nutrição Animal">
<meta property="og:description" content="Veja aqui se atendemos a sua região para que você possa conhecer nossa tradição e qualidade!">
<meta property="og:image" content="">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<meta property="og:type" content="company">
@endsection

@section('headerfiles')
@endsection

@section('atendidas')
active
@endsection

@section('endfiles')
@endsection

@section('content')
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Onde estamos?</p>
            <h1 class="display-5 mb-4">Veja as regiões atendidas e nossos representantes</h1>
        </div>
        <div class="row gy-5 gx-4 justify-content-center">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img class="img-fluid" src="{{url('/img/svg/13-mato-grosso-do-sul-square-rounded.svg')}}" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="{{url('/img/svg/13-mato-grosso-do-sul-square-rounded.svg')}}" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Mato Grosso do Sul - MS</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Veja as cidades atendidas e nossos representantes no Mato Grosso do Sul</p>
                        </div>
                    </div>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalMS">Ver Cidades</button>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img class="img-fluid" src="{{url('/img/svg/12-mato-grosso-square-rounded.svg')}}" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="{{url('/img/svg/12-mato-grosso-square-rounded.svg')}}" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Mato Grosso - MT</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Veja as cidades atendidas e nossos representantes no Mato Grosso</p>
                        </div>
                    </div>
                    <a class="btn btn-light" href="">Ver Cidades</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img class="img-fluid" src="{{url('/img/svg/10-goias-square-rounded.svg')}}" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="{{url('/img/svg/10-goias-square-rounded.svg')}}" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Goiás - GO</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Veja as cidades atendidas e nossos representantes em Goiás</p>
                        </div>
                    </div>
                    <a class="btn btn-light" href="">Ver Cidades</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img class="img-fluid" src="{{url('/img/svg/26-sao-paulo-square-rounded.svg')}}" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="{{url('/img/svg/26-sao-paulo-square-rounded.svg')}}" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">São Paulo - SP</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Veja as cidades atendidas e nossos representantes em São Paulo</p>
                        </div>
                    </div>
                    <a class="btn btn-light" href="">Ver Cidades</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img class="img-fluid" src="{{url('/img/svg/14-minas-gerais-square-rounded.svg')}}" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="{{url('/img/svg/14-minas-gerais-square-rounded.svg')}}" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Minas Gerais - MG</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Veja as cidades atendidas e nossos representantes em Minas Gerais</p>
                        </div>
                    </div>
                    <a class="btn btn-light" href="">Ver Cidades</a>
                </div>
            </div>                
        </div>
    </div>
</div>
<!-- Service End -->

<div class="modal fade" id="modalMS" tabindex="-1" aria-labelledby="modalMSLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMSLabel">Cidades e Representantes - Mato Grosso do Sul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="accordionMS">
                    @foreach($cidadesMS as $cidade)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$cidade->id}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$cidade->id}}" aria-expanded="true" aria-controls="collapse{{$cidade->id}}">
                                {{$cidade->nome}}
                            </button>
                        </h2>
                        <div id="collapse{{$cidade->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionMS">
                            <div class="accordion-body">
                                <div class="row justify-content-start">
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
                                                    <a target="_blank" class="btn btn-primary" href="https://api.whatsapp.com/send?phone=55{{$rep->tel1}}">
                                                        <i class="fas fa-brands fa-whatsapp"></i> Chamar no WhatsApp
                                                    </a>
                                                </p>
                                                @if($rep->tel2 !== null && $rep->tel2 !== "")
                                                <p class="card-text">
                                                    <a target="_blank" class="btn btn-primary" href="tel:+55{{$rep->tel2}}">
                                                        <i class="fa fa-phone-alt"></i> Ligar
                                                    </a>
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="col-auto mb-2">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">FORTMIX</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Matriz</h6>
                                                <p class="card-text">
                                                    Fale com nossa equipe:
                                                </p>
                                                <p class="card-text">
                                                    <a target="_blank" class="btn btn-primary" href="https://api.whatsapp.com/send?phone=5567981539267">
                                                        <i class="fas fa-brands fa-whatsapp"></i> Chamar no WhatsApp
                                                    </a>
                                                </p>
                                                <p class="card-text">
                                                    <a target="_blank" class="btn btn-primary" href="tel:+556730309999">
                                                        <i class="fas fa-brands fa-whatsapp"></i> Ligar
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endsection