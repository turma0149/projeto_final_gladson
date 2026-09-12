<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Contagem360</title>

    <!-- Bootstrap -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS da página -->
    <link rel="stylesheet" href="assets/css/login.css">

</head>


<body>


    <!-- ==========================================
         ÁREA PRINCIPAL
    =========================================== -->

    <main class="login-page">


        <div class="container">


            <div class="row justify-content-center align-items-center min-vh-100">


                <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">


                    <!-- ==========================================
                         CARD DE LOGIN
                    =========================================== -->

                    <div class="login-card">


                        <!-- Logo -->
                        <div class="text-center mb-4">

                            <a
                                href="index.php"
                                class="logo-contagem text-decoration-none">

                                <span class="logo-contagem-text">
                                    contagem
                                </span>

                                <span class="logo-360">
                                    360
                                </span>

                            </a>


                            <div class="logo-subtitle">
                                Conectando você à cidade
                            </div>

                        </div>


                        <!-- Ícone -->
                        <div class="login-icon">

                            <i class="bi bi-person-circle"></i>

                        </div>


                        <!-- Título -->
                        <div class="text-center mb-4">

                            <h1 class="login-title">
                                Acessar sua conta
                            </h1>

                            <p class="login-description">
                                Entre para acessar os recursos do Contagem360.
                            </p>

                        </div>


                        <!-- ==========================================
                             FORMULÁRIO
                        =========================================== -->

                        <form
                            id="formLogin"                                                    
                            >


                            <!-- E-mail -->
                            <div class="mb-3">

                                <label
                                    for="email"
                                    class="form-label">

                                    E-mail

                                </label>


                                <div class="input-group">

                                    <span class="input-group-text">

                                        <i class="bi bi-envelope"></i>

                                    </span>


                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="seuemail@email.com"
                                        autocomplete="email">


                                </div>

                            </div>


                            <!-- Senha -->
                            <div class="mb-3">

                                <div class="d-flex justify-content-between align-items-center">

                                    <label
                                        for="senha"
                                        class="form-label">

                                        Senha

                                    </label>


                                    <a
                                        href="index.php?page=recuperar-senha"
                                        class="forgot-password">

                                        Esqueci minha senha

                                    </a>

                                </div>


                                <div class="input-group">

                                    <span class="input-group-text">

                                        <i class="bi bi-lock"></i>

                                    </span>


                                    <input
                                        type="password"
                                        id="senha"
                                        name="senha"
                                        class="form-control"
                                        placeholder="Digite sua senha"
                                        autocomplete="current-password">


                                    <button
                                        type="button"
                                        class="btn btn-password"
                                        id="mostrarSenha"
                                        aria-label="Mostrar senha">

                                        <i class="bi bi-eye"></i>

                                    </button>

                                </div>

                            </div>


                            <!-- Lembrar acesso -->
                            <div class="form-check mb-4">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="lembrar"
                                    name="lembrar">


                                <label
                                    class="form-check-label"
                                    for="lembrar">

                                    Lembrar meu acesso

                                </label>

                            </div>


                            <!-- Mensagem -->
                            <div
                                id="mensagem"
                                class="alert d-none"
                                role="alert">
                            </div>


                            <!-- Botão -->
                            <button
                                type="submit"
                                class="btn btn-login w-100">

                                <i class="bi bi-box-arrow-in-right me-2"></i>

                                Entrar

                            </button>


                        </form>


                        <!-- ==========================================
                             CADASTRO
                        =========================================== -->

                        <div class="register-area text-center">

                            <p class="mb-0">

                                Ainda não possui uma conta?

                                <a
                                    href="index.php?page=usuario"
                                    class="register-link">

                                    Criar conta

                                </a>

                            </p>

                        </div>


                        <!-- Divisor -->
                        <div class="login-divider">

                            <span>
                                ou
                            </span>

                        </div>


                        <!-- Voltar -->
                        <div class="text-center">

                            <a
                                href="index.php"
                                class="back-link">

                                <i class="bi bi-arrow-left me-1"></i>

                                Voltar para página inicial

                            </a>

                        </div>


                    </div>


                    <!-- ==========================================
                         RODAPÉ
                    =========================================== -->

                    <div class="text-center login-footer">

                        <div class="footer-brand">

                            <span>
                                contagem
                            </span>

                            <strong>
                                360
                            </strong>

                        </div>

                        <p>
                            Tudo o que você precisa, em um só lugar.
                        </p>

                    </div>


                </div>

            </div>

        </div>

    </main>


    <!-- ==========================================
         SCRIPTS
    =========================================== -->

    <!-- jQuery -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js">
    </script>


    <!-- jQuery Validation -->
    <script
        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js">
    </script>


    <!-- Helpers -->
    <script src="libs/js/helpers.js"></script>


    <!-- Script da página -->
    <script src="assets/js/login.js"></script>


</body>

</html>