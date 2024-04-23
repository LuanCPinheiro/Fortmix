<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8">
        <title>
            @yield('title')
        </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        @yield('seo')

        @yield('ogcontent')

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a5cd35f078.js" crossorigin="anonymous"></script>
        @yield('headerfiles')
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner"
             class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        </div>
        <!-- Spinner End -->


        <!-- Topbar Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row g-0 d-none d-lg-flex">
                <div class="col-lg-6 ps-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center text-white">
                        <span>Redes Sociais:</span>
                        <a target="_blank" class="btn btn-link text-light"fort href="https://www.facebook.com/profile.php?id=100038898171234"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" class="btn btn-link text-light" href="https://www.instagram.com/fortmixnutricaoanimal/"><i class="fab fa-instagram"></i></a>
                        <a target="_blank" class="btn btn-link text-light" href="https://maps.app.goo.gl/zb76ky1jWGe5JX548"><i class="fab fa-google"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <a target="_blank" href="tel:+556735963498" class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                        <span class="fs-5 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>Telefone:</span>
                        <span class="fs-5 fw-bold">(67) 3596-3498</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Topbar End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
            <a href="/" class="navbar-brand ps-5 me-0">
                <img class="img-fluid logo_menu" src="img/logo_fortmix_HD.png" alt="logotipo_fortmix_logo_verde_e_vermelha_com_escrita_fortmix"/>
                <h1 class="m-0">FORTMIX</h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{url('/')}}" class="nav-item nav-link @yield('inicio')">Início</a>
                    <!--<a href="{{url('/produtos')}}" class="nav-item nav-link @yield('produtos')">Produtos</a>-->
                    <a href="{{url('/sobrenos')}}" class="nav-item nav-link @yield('sobrenos')">Sobre Nós</a>
                    <a href="{{url('/regioesAtendidas')}}" class="nav-item nav-link @yield('atendidas')">Regiões Atendidas</a>
                    <!--<a href="{{url('/ondecomprar')}}" class="nav-item nav-link @yield('ondecomprar')">Onde Comprar</a>-->
                    <!--<a href="{{url('/clientes')}}" class="nav-item nav-link @yield('clientes')">Clientes</a>-->
                    <!--                    <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                            <div class="dropdown-menu bg-light m-0">
                                                <a href="project.html" class="dropdown-item">Projects</a>
                                                <a href="feature.html" class="dropdown-item">Features</a>
                                                <a href="team.html" class="dropdown-item">Our Team</a>
                                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                                <a href="404.html" class="dropdown-item">404 Page</a>
                                            </div>
                                        </div>-->
                    <a href="{{url('/contato')}}" class="nav-item nav-link">Contato</a>
                </div>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=5567981539267&text=Ol%C3%A1,%20vim%20atrav%C3%A9s%20do%20site." class="btn btn-primary px-3 d-none d-lg-block">Chamar no WhatsApp</a>
            </div>
        </nav>
        <!-- Navbar End -->

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Matriz</h5>
                        <p class="mb-2"><a class="text-white" href="https://maps.app.goo.gl/XCUmRdKnPKZwANN96" target="_blank"><i class="fa fa-map-marker-alt me-3"></i>Avenida Adilson Romano Machado, 50 - Dist. Industrial, Cassilândia - MS, 79540-000</a></p>
                        <p class="mb-2"><a class="text-white" href="tel:+556735963498" target="_blank"><i class="fa fa-phone-alt me-3"></i>(67) 3596-3498</a></p>
                        <p class="mb-2"><a class="text-white" href="https://api.whatsapp.com/send?phone=5567981539267&text=Ol%C3%A1,%20vim%20atrav%C3%A9s%20do%20site." target="_blank"><i class="fab fa-whatsapp me-3"></i>(67) 98153-9267</a></p>
                        <p class="mb-2"><a class="text-white" href="mailto:contato@fortmixnutricao.com.br" target="_blank"><i class="fa fa-envelope me-3"></i>contato@fortmixnutricao.com</a></p>
                        <div class="d-flex pt-3">
                            <a target="_blank" class="btn btn-square btn-primary rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100038898171234">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a target="_blank" class="btn btn-square btn-primary rounded-circle me-2" href="https://www.instagram.com/fortmixnutricaoanimal/">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a target="_blank" class="btn btn-square btn-primary rounded-circle me-2" href="https://maps.app.goo.gl/zb76ky1jWGe5JX548">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Menu</h5>
                        <a class="btn btn-link" href="{{url('/')}}">Início</a>
                        <a class="btn btn-link" href="{{url('/sobrenos')}}">Sobre Nós</a>
                        <a class="btn btn-link" href="{{url('/regioesAtendidas')}}">Regiões Atendidas</a>
<!--                        <a class="btn btn-link" href="/produtos">Produtos</a>
                        <a class="btn btn-link" href="/ondecomprar">Onde Comprar</a>-->
                        <!--<a class="btn btn-link" href="/clientes">Clientes</a>-->
                        <a class="btn btn-link" href="{{url('/contato')}}">Contato</a>
                        <a class="btn btn-link" href="{{url('/dashboard')}}">Área do Colaborador</a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Expediente</h5>
                        <p class="mb-1">Segunda - Sexta</p>
                        <h6 class="text-light">08h às 18h - Horário de Brasília</h6>
                        <p class="mb-1">Sábado</p>
                        <h6 class="text-light">8h às 12h - Horário de Brasília</h6>
                        <p class="mb-1">Domingos e Feriados</p>
                        <h6 class="text-light">Fechado</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container text-center">
                <p class="mb-0">
                    Site desenvolvido por <a target="_blank" class="fw-semi-bold" href="https://wa.me/message/GO5LIMMCY326K1">Agência Pinheiro</a>.
                </p>
<!--                <p class="mb-2">
                    Copyright &copy; <a class="fw-semi-bold" href="#">Your Site Name</a>, All Right Reserved.
                </p>
                <p class="mb-0">
                    Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a> Distributed
                    By: <a href="https://themewagon.com">ThemeWagon</a>
                </p>-->
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
                class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>

        <!-- Template Javascript -->
        
        @yield('endfiles')
        
        <script src="js/main.js"></script>
    </body>

</html>