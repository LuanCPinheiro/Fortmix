@extends('layouts.layout')

@section('title')
FortMix Nutrição Animal - Entregando resultado aos pecuaristas!
@endsection

@section('seo')
<link rel="canonical" href=""/>
<meta name="robots" content="index, follow, max-image-preview:large"/>
<meta name="description" content="">
@endsection

@section('ogcontent')
<meta property="og:url" content="">
<meta property="og:title" content="">
<meta property="og:image" content="">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<meta property="og:type" content="company">
@endsection

@section('headerfiles')
@endsection

@section('inicio')
active
@endsection

@section('endfiles')
@endsection

@section('content')
<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-start">
                                <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">10 anos de experiência
                                    entregando qualidade</p>
                                <h1 class="display-1 text-white mb-5 animated slideInRight">Produtos de Qualidade Comprovada!</h1>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Ver Produtos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-start">
                                <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">10 anos de experiência
                                    proporcionando resultados ao pecuarista</p>
                                <h1 class="display-1 text-white mb-5 animated slideInRight">FortMix: Tradição, Parceria e Qualidade!</h1>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Sobre Nós</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row gx-3 h-100">
                    <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/about-1.jpg">
                    </div>
                    <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/about-2.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">Sobre Nós</p>
                <h1 class="display-5 mb-4">Tradição, Parceria e Qualidade!</h1>
                <p class="mb-4">
                    Há 20 anos atuando no mercado de nutrição animal a FortMix acumulou
                    experiência e maestria para desenvolver produtos de excelência e entregar
                    resultados reais e diferenciados aos nossos clientes!
                </p>
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0 bg-primary p-4">
                        <h1 class="display-2">20</h1>
                        <h5 class="text-white">Anos de</h5>
                        <h5 class="text-white">Tradição</h5>
                    </div>
                    <div class="ms-4">
                        <p><i class="fa fa-check text-primary me-2"></i>Pecuária de Corte</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Pecuária de Leite</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Formulações Padronizadas</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Produtos Personalizados</p>
                        <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Assistência Técnica</p>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa-brands fa-whatsapp text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Nos chame no WhatsApp</p>
                                <h5 class="mb-0">(67) 98153-9267</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Ligue para nós</p>
                                <h5 class="mb-0">(67) 3030-9999</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-fluid facts my-5 p-5">
    <div class="row g-5">
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
            <div class="text-center border p-5">
                <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                <br/>
                <span class="fs-5 fw-semi-bold text-white">Temos</span>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">20</h1>
                <span class="fs-5 fw-semi-bold text-white">Anos de<br/>Experiência</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
            <div class="text-center border p-5">
                <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                <br/>
                <span class="fs-5 fw-semi-bold text-white">Somos mais de</span>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">20</h1>
                <span class="fs-5 fw-semi-bold text-white">Membros na<br/>Equipe</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
            <div class="text-center border p-5">
                <i class="fa fa-users fa-3x text-white mb-3"></i>
                <br/>
                <span class="fs-5 fw-semi-bold text-white">Total de mais de</span>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">1000</h1>
                <span class="fs-5 fw-semi-bold text-white">Clientes<br/>Satisfeitos</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
            <div class="text-center border p-5">
                <i class="fa fa-check-double fa-3x text-white mb-3"></i>
                <br/>
                <span class="fs-5 fw-semi-bold text-white">E mais de</span>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">30</h1>
                <span class="fs-5 fw-semi-bold text-white">Produtos no<br/>Catálogo</span>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative me-lg-4">
                    <img class="img-fluid w-100" src="img/feature.jpg" alt="">
<!--                            <span
                        class="position-absolute top-50 start-100 translate-middle bg-white rounded-circle d-none d-lg-block"
                        style="width: 120px; height: 120px;"></span>-->
                    <button type="button" class="btn-play">
                        <span class="fa-brands fa-whatsapp text-white"></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">Escolha a FORTMIX!</p>
                <h1 class="display-5 mb-4">3 Motivos que nossos clientes dão para usar FORTMIX!</h1>
                <p class="mb-4">
                    Perguntamos diretamente a nossos clientes alguns motivos do porquê escolher a FORTMIX e essas foram as principais respostas obtidas:
                </p>
                <div class="row gy-4">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <div class="ms-4">
                                <h4>Qualidade dos Produtos</h4>
                                <span>Os produtos são de alta qualidade, com formulações que não mudam e entregam um resultado acima da média</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <div class="ms-4">
                                <h4>Leque de Opções</h4>
                                <span>A FORTMIX possui produtos para qualquer tipo de manejo, assim podemos encontrar todas as soluções em um só lugar</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <div class="ms-4">
                                <h4>Agilidade de Entrega</h4>
                                <span>A empresa sempre se prontifica a entregar os produtos com muita agilidade, mantendo meu estoque sempre em dia</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->


<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->


<!-- Service Start -->
<!--        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <p class="fw-medium text-uppercase text-primary mb-2">Our Services</p>
                    <h1 class="display-5 mb-4">We Provide Best Industrial Services</h1>
                </div>
                <div class="row gy-5 gx-4">
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                            <div class="service-img">
                                <img class="img-fluid" src="img/service-1.jpg" alt="">
                            </div>
                            <div class="service-detail">
                                <div class="service-title">
                                    <hr class="w-25">
                                    <h3 class="mb-0">Civil & Gas Engineering</h3>
                                    <hr class="w-25">
                                </div>
                                <div class="service-text">
                                    <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                        lorem sed diam stet diam sed stet.</p>
                                </div>
                            </div>
                            <a class="btn btn-light" href="">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item">
                            <img class="img-fluid" src="img/service-2.jpg" alt="">
                            <div class="service-img">
                                <img class="img-fluid" src="img/service-2.jpg" alt="">
                            </div>
                            <div class="service-detail">
                                <div class="service-title">
                                    <hr class="w-25">
                                    <h3 class="mb-0">Power & Energy Engineering</h3>
                                    <hr class="w-25">
                                </div>
                                <div class="service-text">
                                    <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                        lorem sed diam stet diam sed stet.</p>
                                </div>
                            </div>
                            <a class="btn btn-light" href="">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                            <div class="service-img">
                                <img class="img-fluid" src="img/service-3.jpg" alt="">
                            </div>
                            <div class="service-detail">
                                <div class="service-title">
                                    <hr class="w-25">
                                    <h3 class="mb-0">Plumbing & Water Treatment</h3>
                                    <hr class="w-25">
                                </div>
                                <div class="service-text">
                                    <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                        lorem sed diam stet diam sed stet.</p>
                                </div>
                            </div>
                            <a class="btn btn-light" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
<!-- Service End -->


<!-- Project Start -->
<!--        <div class="container-fluid bg-dark pt-5 my-5 px-0">
            <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Our Projects</p>
                <h1 class="display-5 text-white mb-5">See What We Have Completed Recently</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
                <a class="project-item" href="">
                    <img class="img-fluid" src="img/project-1.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-primary mb-0">Auto Engineering</h5>
                    </div>
                </a>
                <a class="project-item" href="">
                    <img class="img-fluid" src="img/project-2.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-primary mb-0">Civil Engineering</h5>
                    </div>
                </a>
                <a class="project-item" href="">
                    <img class="img-fluid" src="img/project-3.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-primary mb-0">Gas Engineering</h5>
                    </div>
                </a>
                <a class="project-item" href="">
                    <img class="img-fluid" src="img/project-4.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-primary mb-0">Power Engineering</h5>
                    </div>
                </a>
                <a class="project-item" href="">
                    <img class="img-fluid" src="img/project-5.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-primary mb-0">Energy Engineering</h5>
                    </div>
                </a>
                <a class="project-item" href="">
                    <img class="img-fluid" src="img/project-6.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-primary mb-0">Water Engineering</h5>
                    </div>
                </a>
            </div>
        </div>-->
<!-- Project End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Nossa Equipe</p>
            <h1 class="display-5 mb-5">Um time de Sucesso!</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <img class="img-fluid" src="img/team-1.jpg" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                            <i class="fa fa-2x fa-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                             style="height: 90px;">
                            <h5>Leandro Romero</h5>
                            <span class="text-primary">Sócio-Fundador</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <img class="img-fluid" src="img/team-2.jpg" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                            <i class="fa fa-2x fa-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                             style="height: 90px;">
                            <h5>Daniela Romero</h5>
                            <span class="text-primary">Sócia-Proprietária</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item">
                    <img class="img-fluid" src="img/team-3.jpg" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                            <i class="fa fa-2x fa-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                             style="height: 90px;">
                            <h5>Maycon Oliveira</h5>
                            <span class="text-primary">Diretor</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item">
                    <img class="img-fluid" src="img/team-3.jpg" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                            <i class="fa fa-2x fa-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                             style="height: 90px;">
                            <h5>Luis Guarini</h5>
                            <span class="text-primary">Vendas</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Depoimentos</p>
            <h1 class="display-5 mb-5">Veja o que nossos clientes dizem!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/testimonial-1.jpg">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                        ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                        clita.</p>
                    <h5 class="mb-1">José Souza</h5>
                    <span class="fst-italic">Pecuarista | Engenheiro Agrônomo</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/testimonial-2.jpg">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                        ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                        clita.</p>
                    <h5 class="mb-1">José Souza</h5>
                    <span class="fst-italic">Pecuarista | Engenheiro Agrônomo</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/testimonial-3.jpg">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                        ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                        clita.</p>
                    <h5 class="mb-1">José Souza</h5>
                    <span class="fst-italic">Pecuarista | Engenheiro Agrônomo</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection