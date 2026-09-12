<!-- =========================================================
     CSS DA PÁGINA
========================================================= -->

<link rel="stylesheet" href="assets/css/home.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



<div class="container mt-5">

    <!-- =========================================================
     ÁREA DE ACESSO
========================================================= -->

    <div class="container mt-5">

        <!-- Título -->
        <div class="home-header text-center mb-5">

            <span class="home-badge">
                <i class="bi bi-grid"></i>
                Contagem360
            </span>

            <h1 class="home-title">
                Bem vindo ao Sistema Administrativo
                <span> <?= $_SESSION["usuario_nome"] ?></span>
            </h1>

            <p class="home-subtitle">
                Selecione uma das opções abaixo para acessar
                os recursos do Contagem360.
            </p>

        </div>


        <!-- =====================================================
     CARDS
====================================================== -->

        <div class="row g-4 justify-content-center">


            <!-- =================================================
         EVENTOS
    ================================================== -->

            <div class="col-md-6 col-lg-4">

                <div class="home-card h-100">

                    <!-- Ícone -->
                    <div class="home-card-icon">

                        <i class="bi bi-calendar-event"></i>

                    </div>


                    <!-- Conteúdo -->
                    <h5 class="home-card-title">
                        Gerenciar Eventos
                    </h5>

                    <p class="home-card-text">
                        Cadastre, organize e gerencie
                        os eventos do sistema.
                    </p>


                    <!-- Botão -->
                    <a href="index.php?page=eventos" class="home-card-button">

                        Criar Eventos

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>



            <!-- =================================================
         USUÁRIOS
    ================================================== -->

            <div class="col-md-6 col-lg-4">

                <div class="home-card h-100">

                    <!-- Ícone -->
                    <div class="home-card-icon">

                        <i class="bi bi-people"></i>

                    </div>


                    <!-- Conteúdo -->
                    <h5 class="home-card-title">
                        Gerenciar Usuários
                    </h5>

                    <p class="home-card-text">
                        Cadastre, organize e gerencie
                        os eventos do sistema.
                    </p>


                    <!-- Botão -->
                    <a href="index.php?page=usuario" class="home-card-button">

                        Criar Usuário

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>






    <!-- =========================================================
     JAVASCRIPT
========================================================= -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js">
    </script>


    <!-- jQuery Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js">
    </script>


    <!-- jQuery Validation - métodos adicionais -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js">
    </script>


    <!-- jQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js">
    </script>


    <!-- Script da página -->
    <script src="assets/js/home.js"></script>