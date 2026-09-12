<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/usuario.css">

<div class="col-md-6 mx-auto mt-5" id="container-usuario">

    <h2>Cadastro de usuário</h2>

    <!-- =====================================
         MENSAGEM DE RETORNO
    ====================================== -->

    <div id="mensagem" class="alert d-none mt-3"></div>


    <!-- Formulário -->
    <form id="formUsuario">

        <!-- =====================================
             CAMPOS OCULTOS DO CRUD
        ====================================== -->

        <input type="hidden" id="id" name="id">

        <input type="hidden" id="acao" name="acao" value="cadastrar">


        <!-- =====================================
             NOME
        ====================================== -->

        <div class="mb-3">

            <label for="nome" class="form-label">
                Nome
            </label>

            <div class="input-group">

                <span class="input-group-text">
                    <i class="bi bi-person"></i>
                </span>

                <input type="text" id="nome" name="nome" class="form-control">

                <div class="invalid-feedback"></div>

                <div class="valid-feedback"></div>

            </div>

        </div>


        <!-- =====================================
             E-MAIL
        ====================================== -->

        <div class="mb-3">

            <label for="email" class="form-label">
                E-mail
            </label>

            <div class="input-group">

                <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                </span>

                <input type="email" id="email" name="email" class="form-control">

                <div class="invalid-feedback"></div>

                <div class="valid-feedback"></div>

            </div>

        </div>


        <!-- =====================================
             SENHA
        ====================================== -->

        <div class="mb-3">

            <label for="senha" class="form-label">
                Senha
            </label>

            <div class="input-group">

                <span class="input-group-text">
                    <i class="bi bi-lock"></i>
                </span>

                <input type="password" id="senha" name="senha" class="form-control">

                <div class="invalid-feedback"></div>

                <div class="valid-feedback"></div>

            </div>

        </div>


        <!-- =====================================
             BOTÃO CADASTRAR
        ====================================== -->

        <button type="submit" class="btn btn-primary w-100 mb-2">
            Cadastrar
        </button>


        <!-- =====================================
             BOTÃO LIMPAR
        ====================================== -->

        <button type="reset" class="btn btn-primary w-100">

            <i class="bi bi-arrow-counterclockwise me-2"></i>

            Limpar

        </button>

    </form>



</div>


<!-- =========================================
     JQUERY
========================================= -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<!-- =========================================
     JQUERY VALIDATION
========================================= -->

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>


<!-- =========================================
     SCRIPT DA PÁGINA
========================================= -->

<script src="assets/js/usuario.js"></script>