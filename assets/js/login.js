// LOGIN USANDO JQUERY

$(document).ready(function () {

    // Configura a validação do formulário
    validarFormulario();

});


function validarFormulario() {

    // Seleciona a div responsável pelas mensagens
    const mensagem =
        document.getElementById("mensagem");


    // Configura o jQuery Validation
    $("#formLogin").validate({


        // =====================================
        // REGRAS DE VALIDAÇÃO
        // =====================================

        rules: {

            email: {
                required: true,
                email: true,
            },

            senha: {
                required: true,
                minlength: 6,
            },

        },


        // =====================================
        // MENSAGENS DE VALIDAÇÃO
        // =====================================

        messages: {

            email: {
                required:
                    "Informe o e-mail.",

                email:
                    "Informe um e-mail válido.",
            },

            senha: {
                required:
                    "Informe a senha.",

                minlength:
                    "A senha deve possuir no mínimo 6 caracteres.",
            },

        },


        // =====================================
        // POSICIONA A MENSAGEM DE ERRO
        // =====================================

        errorPlacement:
            function (error, element) {

                if (
                    element
                        .closest(".input-group")
                        .length
                ) {

                    error.insertAfter(
                        element.closest(
                            ".input-group"
                        )
                    );

                } else {

                    error.insertAfter(
                        element
                    );

                }

            },


        // =====================================
        // CAMPO INVÁLIDO
        // =====================================

        highlight:
            function (element) {

                $(element)
                    .removeClass("valid")
                    .addClass("error");

            },


        // =====================================
        // CAMPO VÁLIDO
        // =====================================

        unhighlight:
            function (element) {

                $(element)
                    .removeClass("error")
                    .addClass("valid");

            },


        // =====================================
        // ENVIA O FORMULÁRIO
        // =====================================

        submitHandler:
        
            async function (formulario) {

                // =================================
                // IMPEDE O ENVIO PADRÃO
                // =================================

                event.preventDefault();


                // =================================
                // CAPTURA OS DADOS
                // =================================

                const dados =
                    new FormData(
                        formulario
                    );


                // =================================
                // MENSAGEM DE CARREGAMENTO
                // =================================

                mensagem.className =
                    "alert alert-info mt-3";


                mensagem.textContent =
                    "Verificando dados...";


                try {


                    // =================================
                    // ENVIA PARA O CONTROLLER
                    // =================================

                    const resposta =
                        await fetch(

                            "controllers/LoginController.php",

                            {

                                method:
                                    "POST",

                                body:
                                    dados,

                            }

                        );


                    // =================================
                    // CONVERTE PARA JSON
                    // =================================

                    const retorno =
                        await resposta.json();


                    console.log(
                        retorno
                    );


                    // =================================
                    // LOGIN REALIZADO
                    // =================================

                    if (
                        retorno.sucesso
                    ) {


                        mensagem.className =
                            "alert alert-success mt-3";


                        mensagem.textContent =
                            retorno.mensagem;


                        // Redireciona para home
                        window.location.href =
                            "index.php?page=home";


                        return;

                    }


                    // =================================
                    // LOGIN INVÁLIDO
                    // =================================

                    mensagem.className =
                        "alert alert-danger mt-3";


                    mensagem.textContent =
                        retorno.mensagem;


                } catch (erro) {


                    // =================================
                    // ERRO NA REQUISIÇÃO
                    // =================================

                    console.error(
                        erro
                    );


                    mensagem.className =
                        "alert alert-danger mt-3";


                    mensagem.textContent =
                        "Erro ao realizar o login.";

                }


            },

    });


    // =========================================
    // MOSTRAR / OCULTAR SENHA
    // =========================================

    $("#mostrarSenha").on(
        "click",
        function () {


            const campoSenha =
                $("#senha");


            const icone =
                $(this).find("i");


            if (
                campoSenha.attr("type")
                === "password"
            ) {


                campoSenha.attr(
                    "type",
                    "text"
                );


                icone
                    .removeClass(
                        "bi-eye"
                    )
                    .addClass(
                        "bi-eye-slash"
                    );


            } else {


                campoSenha.attr(
                    "type",
                    "password"
                );


                icone
                    .removeClass(
                        "bi-eye-slash"
                    )
                    .addClass(
                        "bi-eye"
                    );

            }

        }
    );

}