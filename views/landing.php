<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contagem 360</title>

    <link rel="icon" href="assets/img/logo.png" type="image/png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/landing.css">

</head>

<body>

    <!-- ==========================
            NAVBAR
    =========================== -->

    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

            <div class="container">

                <!-- Logo -->

                <a class="navbar-brand fw-bold d-flex align-items-center" href="#">

                    <img src="assets/img/logo.png" alt="Logo Contagem 360" class="me-2">
                    <div>

                        <h4 class="m-0">Contagem <span id="xbox">360</span></h4>

                        <small class="text-muted">
                            Turismo • Cultura • Eventos
                        </small>

                    </div>

                </a>

                <!-- Botão Mobile -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">

                    <span class="navbar-toggler-icon"></span>

                </button>

                <!-- Menu -->

                <div class="collapse navbar-collapse" id="menu">

                    <ul class="navbar-nav mx-auto">



                    </ul>

                    <!-- Lado direito -->

                    <div class="d-flex align-items-center">

                        <button class="btn btn-link text-dark me-3">

                            <i class="bi bi-search fs-5"></i>

                        </button>



                        <a href="index.php?page=login" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-lock me-2"></i>
                            Entrar
                        </a>


                    </div>

                </div>

            </div>

        </nav>

    </header>

    <!-- ==========================
            MAIN
    =========================== -->

    <main> <!-- HERO -->

        <section class="hero py-5">

            <div class="container">

                <div class="row align-items-center gy-5">

                    <!-- Texto -->

                    <div class="col-lg-4">

                        <span class="badge bg-primary mb-3">
                            Descubra Contagem
                        </span>

                        <h1 class="display-5 fw-bold mb-4">

                            Tudo o que acontece em Contagem em um só lugar.

                        </h1>

                        <p class="lead text-muted mb-4">

                            Encontre eventos, notícias, atrações,
                            gastronomia, cultura e serviços da cidade.

                        </p>

                        <div class="d-flex gap-3">

                            <a href="index.php?page=ex-evento" class="btn btn-primary btn-lg">

                                Explorar

                            </a>

                            <a href="index.php?page=suporte" class="btn btn-outline-primary btn-lg">

                                Saiba mais

                            </a>

                        </div>

                    </div>

                    <!-- Imagem -->

                    <div class="col-lg-8 text-center">

                        <img src="assets/img/cidade.jpg" class="img-fluid hero-img" alt="Cidade">

                    </div>


                </div>

            </div>

        </section>

        <!-- BENEFÍCIOS -->

        <section class="py-5 bg-light">

            <div class="container">

                <div class="row text-center g-4">

                    <div class="col-lg-3">

                        <div class="card h-100 border-0 shadow-sm">

                            <div class="card-body">

                                <i class="bi bi-calendar-event display-5 text-primary"></i>

                                <h4 class="mt-3">

                                    Eventos

                                </h4>

                                <p>

                                    Descubra tudo o que acontece
                                    em Contagem.

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3">

                        <div class="card h-100 border-0 shadow-sm">

                            <div class="card-body">

                                <i class="bi bi-newspaper display-5 text-primary"></i>

                                <h4 class="mt-3">

                                    <a href="index.php?page=suporte" class="sem_link">História</a>

                                </h4>

                                <p>

                                    <a href="index.php?page=suporte" class="sem_link">

                                        Fique por dentro das novidades
                                        da cidade.
                                    </a>

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3">

                        <div class="card h-100 border-0 shadow-sm">

                            <div class="card-body">

                                <i class="bi bi-geo-alt display-5 text-primary"></i>

                                <h4 class="mt-3">

                                    Turismo

                                </h4>

                                <p>

                                    Conheça pontos turísticos
                                    incríveis.

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3">

                        <div class="card h-100 border-0 shadow-sm">

                            <div class="card-body">

                                <i class="bi bi-shop display-5 text-primary"></i>

                                <h4 class="mt-3">

                                    Comércio

                                </h4>

                                <p>

                                    Apoie empresas e negócios
                                    locais.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- =========================================================
     EVENTOS EM DESTAQUE
========================================================= -->

        <section class="eventos-destaque">

            <div class="container">

                <!-- CABEÇALHO -->

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <span class="evento-subtitulo">
                            Agenda da cidade
                        </span>

                        <h2 class="evento-titulo">
                            Eventos em destaque
                        </h2>

                        <p class="text-muted mb-0">
                            Confira algumas opções para aproveitar Contagem.
                        </p>

                    </div>


                 

                </div>


                <!-- =================================================
             CARDS DOS EVENTOS
        ================================================== -->

                <div class="row g-4">


                    <!-- EVENTO 1 -->

                    <div class="col-md-6 col-lg-3">

                        <div class="evento-destaque-card h-100">

                            <div class="evento-banner evento-banner-1">

                                <i class="bi bi-music-note-beamed"></i>

                                <span class="evento-categoria">
                                    Show
                                </span>

                            </div>


                            <div class="evento-conteudo">

                                <h3>
                                    Festival Contagem Musical
                                </h3>

                                <p class="evento-local">

                                    <i class="bi bi-geo-alt"></i>

                                    Praça da Glória

                                </p>


                                <p class="evento-data">

                                    <i class="bi bi-calendar3"></i>

                                    Sábado, 19 de Setembro

                                </p>


                                <p class="evento-hora">

                                    <i class="bi bi-clock"></i>

                                    19:00

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- EVENTO 2 -->

                    <div class="col-md-6 col-lg-3">

                        <div class="evento-destaque-card h-100">

                            <div class="evento-banner evento-banner-2">

                                <i class="bi bi-palette"></i>

                                <span class="evento-categoria">
                                    Cultural
                                </span>

                            </div>


                            <div class="evento-conteudo">

                                <h3>
                                    Feira de Arte e Cultura
                                </h3>

                                <p class="evento-local">

                                    <i class="bi bi-geo-alt"></i>

                                    Casa da Cultura

                                </p>


                                <p class="evento-data">

                                    <i class="bi bi-calendar3"></i>

                                    Domingo, 20 de Setembro

                                </p>


                                <p class="evento-hora">

                                    <i class="bi bi-clock"></i>

                                    10:00

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- EVENTO 3 -->

                    <div class="col-md-6 col-lg-3">

                        <div class="evento-destaque-card h-100">

                            <div class="evento-banner evento-banner-3">

                                <i class="bi bi-bicycle"></i>

                                <span class="evento-categoria">
                                    Esportivo
                                </span>

                            </div>


                            <div class="evento-conteudo">

                                <h3>
                                    Pedal Contagem 360
                                </h3>

                                <p class="evento-local">

                                    <i class="bi bi-geo-alt"></i>

                                    Parque Fernão Dias

                                </p>


                                <p class="evento-data">

                                    <i class="bi bi-calendar3"></i>

                                    Domingo, 27 de Setembro

                                </p>


                                <p class="evento-hora">

                                    <i class="bi bi-clock"></i>

                                    08:00

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- EVENTO 4 -->

                    <div class="col-md-6 col-lg-3">

                        <div class="evento-destaque-card h-100">

                            <div class="evento-banner evento-banner-4">

                                <i class="bi bi-shop"></i>

                                <span class="evento-categoria">
                                    Feira
                                </span>

                            </div>


                            <div class="evento-conteudo">

                                <h3>
                                    Feira Gastronômica de Contagem
                                </h3>

                                <p class="evento-local">

                                    <i class="bi bi-geo-alt"></i>

                                    Praça do Eldorado

                                </p>


                                <p class="evento-data">

                                    <i class="bi bi-calendar3"></i>

                                    Sábado, 03 de Outubro

                                </p>


                                <p class="evento-hora">

                                    <i class="bi bi-clock"></i>

                                    17:00

                                </p>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </section>


    </main>

    <!-- FOOTER -->
    <footer class="footer bg-dark text-light pt-5 pb-3">

        <div class="container">

            <div class="row gy-4">

                <!-- Logo -->

                <div class="col-lg-3">

                    <h3 class="fw-bold">

                        Contagem 360

                    </h3>

                    <p>

                        O portal oficial para quem deseja descobrir,
                        viver e aproveitar tudo o que Contagem tem
                        para oferecer.

                    </p>

                    <div class="d-flex gap-3 fs-4">

                        <a href="#" class="text-light">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="#" class="text-light">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="#" class="text-light">
                            <i class="bi bi-youtube"></i>
                        </a>

                    </div>

                </div>

                <!-- Links -->

                <div class="col-lg-2">

                    <h5 class="mb-3">

                        Navegação

                    </h5>

                    <ul class="list-unstyled">

                        <li><a href="index.php?page=home" class="text-light text-decoration-none">Home</a></li>

                        <li><a href="index.php?page=ex-evento" class="text-light text-decoration-none">Eventos</a></li>

                        <li><a href="index.php?page=ex-evento" class="text-light text-decoration-none">Notícias</a></li>


                    </ul>

                </div>

                <!-- Serviços -->

                <div class="col-lg-2">

                    <h5 class="mb-3">

                        Serviços

                    </h5>

                    <ul class="list-unstyled">

                        <li><a href="evento" class="text-light text-decoration-none">Comércio</a></li>

                        <li><a href="#" class="text-light text-decoration-none">Mapa</a></li>

                        <li><a href="suporte" class="text-light text-decoration-none">Contato</a></li>

                    </ul>

                </div>

                <!-- Contato -->

                <div class="col-lg-2">

                    <h5 class="mb-3">

                        Contato

                    </h5>

                    <p class="mb-1">

                        (31) 98481-3792

                    </p>

                    <p class="mb-1">

                        App@contagem360.com

                    </p>

                    <p>

                        Contagem - MG

                    </p>

                </div>

                <!-- Newsletter -->

                <div class="col-lg-3">

                    <h5 class="mb-3">

                        Newsletter

                    </h5>

                    <p>

                        Receba novidades e eventos.

                    </p>

                    <form>

                        <div class="input-group">

                            <input type="email" class="form-control" placeholder="Seu e-mail">

                            <button class="btn btn-primary" type="submit">

                                Enviar

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col text-center">

                    <small>

                        © 2026 Contagem 360.
                        Todos os direitos reservados.

                    </small>

                </div>

            </div>

        </div>

    </footer>

    <!-- Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
<script src="assets/js/landing.js"></script>

</html>