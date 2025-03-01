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
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalMS">Econtrar Representantes</button>
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
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalMT">Econtrar Representantes</button>
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
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalGO">Econtrar Representantes</button>
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
                    <button class="btn btn-light p-4" data-bs-toggle="modal" data-bs-target="#modalSP">Econtrar Representantes</button>
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
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalMG">Econtrar Representantes</button>
                </div>
            </div>                
        </div>
    </div>
</div>
<!-- Service End -->

@include('modalCidades', ['uf' => "MS", 'estado' => "Mato Grosso do Sul", 'cidades' => $cidadesMS])

@include('modalCidades', ['uf' => "MT", 'estado' => "Mato Grosso", 'cidades' => $cidadesMT])

@include('modalCidades', ['uf' => "GO", 'estado' => "Goiás", 'cidades' => $cidadesGO])

@include('modalCidades', ['uf' => "SP", 'estado' => "São Paulo", 'cidades' => $cidadesSP])

@include('modalCidades', ['uf' => "MG", 'estado' => "Minas Gerais", 'cidades' => $cidadesMG])

@endsection

@section('endfiles')
<script type="text/javascript" src="{{url('js/jquery.mask.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.telmask').mask("(00) 00009-0000");
});
</script>
@endsection