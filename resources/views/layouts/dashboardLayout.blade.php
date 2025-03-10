<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{url('dashboardAssets/assets/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{url('dashboardAssets/assets/img/favicon.png')}}">
        <title>
            @yield('titulo')
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{url('dashboardAssets/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
        <link href="{{url('dashboardAssets/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{url('dashboardAssets/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{url('dashboardAssets/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
        @yield('headerfiles')
    </head>

    <body class="g-sidenav-show   bg-gray-100">
        <div class="min-height-300 bg-primary position-absolute w-100"></div>
        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
                    <img src="{{url('dashboardAssets/assets/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-1 font-weight-bold">Dashboard Fortmix</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @yield('active1')" href="{{url('/dashboard')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    @if(Auth::user()->isSuper())
                    <li class="nav-item">
                        <a class="nav-link @yield('active2')" href="{{url('dashboard/representantes')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Representantes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('active3')" href="{{url('dashboard/regioesatendidas')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-box-2 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Regiões Atendidas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#postsMenu" role="button" aria-expanded="false" aria-controls="postsMenu">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Posts</span>
                        </a>
                        <div class="collapse" id="postsMenu">
                            <ul class="nav ms-4">
                                <li class="nav-item">
                                    <a class="nav-link @yield('active11')" href="{{ url('dashboard/posts') }}">
                                        <i class="ni ni-bullet-list-67 text-dark text-sm"></i>
                                        <span class="nav-link-text ms-1">Lista de Posts</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('active12')" href="{{ url('dashboard/tags') }}">
                                        <i class="ni ni-tag text-dark text-sm"></i>
                                        <span class="nav-link-text ms-1">Tags</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    @endif

                    @if(Auth::user()->onlySuper())
                    <li class="nav-item">
                        <a class="nav-link @yield('active10')" href="{{url('dashboard/produtos')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-pin-3 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Produtos</span>
                        </a>
                    </li>            
                    @endif

                    @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link @yield('active4')" href="{{url('dashboard/usuarios')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Usuários</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#produtosMenu" role="button" aria-expanded="false" aria-controls="produtosMenu">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-box-2 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Produtos</span>
                        </a>
                        <div class="collapse" id="produtosMenu">
                            <ul class="nav ms-4">
                                <!-- Link direto para Produtos -->
                                <li class="nav-item">
                                    <a class="nav-link @yield('active10')" href="{{ url('dashboard/produtos') }}">
                                        <i class="ni ni-box-2 text-dark text-sm"></i>
                                        <span class="nav-link-text ms-1">Todos os Produtos</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('active5')" href="{{ url('dashboard/pecuarias') }}">
                                        <i class="ni ni-collection text-dark text-sm"></i>
                                        <span class="nav-link-text ms-1">Pecuárias</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('active6')" href="{{ url('dashboard/familias') }}">
                                        <i class="ni ni-archive-2 text-dark text-sm"></i>
                                        <span class="nav-link-text ms-1">Famílias</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('active7')" href="{{ url('dashboard/periodos') }}">
                                        <i class="ni ni-calendar-grid-58 text-dark text-sm"></i>
                                        <span class="nav-link-text ms-1">Períodos</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('active8')" href="{{ url('dashboard/estagios') }}">
                                        <i class="ni ni-chart-bar-32 text-dark text-sm"></i>
                                        <span class="nav-link-text ms-1">Estágio Animal</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('active9')" href="{{ url('dashboard/nutrientes') }}">
                                        <i class="ni ni-atom text-dark text-sm"></i>
                                        <span class="nav-link-text ms-1">Nutrientes</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#bibliotecaModal">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-album-2 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Biblioteca</span>
                        </a>
                    </li>

                    @endif
                </ul>
            </div>
        </aside>
        <main class="main-content position-relative border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    @yield('breadcrumb')
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown pe-2 d-flex align-items-center float-end">
                                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user me-sm-1"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="{{route('profile.edit')}}">
                                            <div class="d-flex justify-content-evenly">
                                                <div class="my-auto mr-2">
                                                    <i class="fa fa-user me-sm-1"></i>
                                                </div>
                                                <div class="ml-2 d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold"> Perfil</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <form method="POST" action="{{route('logout')}}">
                                            @csrf
                                            <a class="dropdown-item border-radius-md" onclick="event.preventDefault();
    this.closest('form').submit();" type="submit">
                                                <div class="d-flex justify-content-evenly">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center pl-2">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold"> Sair</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                @yield('content')
            </div>
            <div class="modal fade" id="bibliotecaModal" tabindex="-1" aria-labelledby="bibliotecaModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bibliotecaModalLabel">Biblioteca de Imagens</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Upload -->
                            <div class="mb-3">
                                <input type="file" id="uploadFile" class="form-control">
                                <button id="uploadButton" class="btn btn-success mt-2">Fazer Upload</button>
                            </div>

                            <!-- Galeria -->
                            <div id="bibliotecaGrid" class="row g-3">
                                <!-- Os itens serão carregados aqui via AJAX -->
                            </div>

                            <!-- Botão "Carregar Mais" -->
                            <div class="text-center mt-3">
                                <button id="loadMoreButton" class="btn btn-primary">Carregar Mais</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                <i class="fa fa-cog py-2"> </i>
            </a>
            <div class="card shadow-lg">
                <div class="card-header pb-0 pt-3 ">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">Configurar Tema</h5>
                        <p>Mude a cor do tema como preferir</p>
                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0 overflow-auto">
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0">Cores do Menu</h6>
                    </div>
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <!-- Sidenav Type -->
                    <div class="mt-3">
                        <h6 class="mb-0">Fundo do Menu</h6>
                        <p class="text-sm">Escolha entre claro ou escuro</p>
                    </div>
                    <div class="d-flex">
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">Claro</button>
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Escuro</button>
                    </div>
                    <hr class="horizontal dark my-sm-4">
                    <div class="mt-2 mb-5 d-flex">
                        <h6 class="mb-0">Fundo: Claro / Escuro</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{url('dashboardAssets/assets/js/core/popper.min.js')}}"></script>
        <script src="{{url('dashboardAssets/assets/js/core/bootstrap.min.js')}}"></script>
        <script src="{{url('dashboardAssets/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
        <script src="{{url('dashboardAssets/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
        <script src="{{url('dashboardAssets/assets/js/plugins/chartjs.min.js')}}"></script>
        <script>
                                var ctx1 = document.getElementById("chart-line").getContext("2d");

                                var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

                                gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
                                gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
                                gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
                                new Chart(ctx1, {
                                    type: "line",
                                    data: {
                                        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                        datasets: [{
                                                label: "Mobile apps",
                                                tension: 0.4,
                                                borderWidth: 0,
                                                pointRadius: 0,
                                                borderColor: "#5e72e4",
                                                backgroundColor: gradientStroke1,
                                                borderWidth: 3,
                                                fill: true,
                                                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                                                maxBarThickness: 6

                                            }],
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        plugins: {
                                            legend: {
                                                display: false,
                                            }
                                        },
                                        interaction: {
                                            intersect: false,
                                            mode: 'index',
                                        },
                                        scales: {
                                            y: {
                                                grid: {
                                                    drawBorder: false,
                                                    display: true,
                                                    drawOnChartArea: true,
                                                    drawTicks: false,
                                                    borderDash: [5, 5]
                                                },
                                                ticks: {
                                                    display: true,
                                                    padding: 10,
                                                    color: '#fbfbfb',
                                                    font: {
                                                        size: 11,
                                                        family: "Open Sans",
                                                        style: 'normal',
                                                        lineHeight: 2
                                                    },
                                                }
                                            },
                                            x: {
                                                grid: {
                                                    drawBorder: false,
                                                    display: false,
                                                    drawOnChartArea: false,
                                                    drawTicks: false,
                                                    borderDash: [5, 5]
                                                },
                                                ticks: {
                                                    display: true,
                                                    color: '#ccc',
                                                    padding: 20,
                                                    font: {
                                                        size: 11,
                                                        family: "Open Sans",
                                                        style: 'normal',
                                                        lineHeight: 2
                                                    },
                                                }
                                            },
                                        },
                                    },
                                });
        </script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{url('dashboardAssets/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
        <script src="{{url('dashboardAssets/assets/js/jquery.js?v=2.0.4')}}"></script>

        @yield('endfiles')


        <script>
            function copyToClipboard(url) {
                navigator.clipboard.writeText(url)
                        .then(() => {
                            alert('URL copiada para a área de transferência!');
                        })
                        .catch(err => {
                            alert('Erro ao copiar URL: ' + err);
                        });
            }
            document.addEventListener('DOMContentLoaded', function () {
                const uploadButton = document.getElementById('uploadButton');
                const uploadFile = document.getElementById('uploadFile');
                const bibliotecaGrid = document.getElementById('bibliotecaGrid');

                // Função para obter a URL base do site
                function getBaseUrl() {
                    return `${window.location.origin}/dashboard`;
                }

                function loadBiblioteca() {
                    fetch(`${getBaseUrl()}/biblioteca`)
                            .then(response => response.json())
                            .then(data => {
                                bibliotecaGrid.innerHTML = data.map(item => `
                    <div class="col-md-3">
                        <div class="card">
                            <img src="/storage/${item.url}" class="card-img-top" alt="${item.alt}">
                            <div class="card-body">
                                <p class="card-text">${item.nome}</p>
                                <button class="btn btn-primary btn-sm" onclick="copyToClipboard('https://fortmixnutricao.com.br/storage/${item.url}')">
                                    Copiar URL
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('');
                            });
                }

                uploadButton.addEventListener('click', function () {
                    const formData = new FormData();
                    formData.append('file', uploadFile.files[0]);

                    fetch(`${getBaseUrl()}/biblioteca/upload`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                    })
                            .then(response => response.json())
                            .then(data => {
                                alert('Arquivo enviado com sucesso!');
                                loadBiblioteca();
                            })
                            .catch(error => alert('Erro ao enviar arquivo.'));
                });

                // Load initial items
                loadBiblioteca();
            });

        </script>
    </body>

</html>