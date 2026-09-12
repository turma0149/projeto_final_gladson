$(document).ready(function () {

    validarFormulario();

});


function validarFormulario() {


    // =========================================
    // ÁREA DE MENSAGEM
    // =========================================

    const mensagem =
        document.getElementById("mensagem");


    // =========================================
    // VALIDAÇÃO DO FORMULÁRIO
    // =========================================

    $("#formUsuario").validate({

        rules: {

            nome: {
                required: true,
                minlength: 3
            },

            email: {
                required: true,
                email: true
            },

            senha: {
                required: true,
                minlength: 6
            }

        },


        messages: {

            nome: {

                required:
                    "Digite o nome.",

                minlength:
                    "O nome deve possuir pelo menos 3 caracteres."

            },

            email: {

                required:
                    "Digite o e-mail.",

                email:
                    "Digite um e-mail válido."

            },

            senha: {

                required:
                    "Digite a senha.",

                minlength:
                    "A senha deve possuir pelo menos 6 caracteres."

            }

        },


        errorElement: "label",

        errorClass: "error",


        errorPlacement: function (
            error,
            element
        ) {

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

                error.insertAfter(element);

            }

        },


        highlight: function (element) {

            $(element)
                .removeClass("valid")
                .addClass("error");

        },


        unhighlight: function (element) {

            $(element)
                .removeClass("error")
                .addClass("valid");

        },


        // =========================================
        // ENVIO DO FORMULÁRIO
        // =========================================

        submitHandler:
            async function (
                formulario,
                event
            ) {


                // =================================
                // IMPEDE O ENVIO PADRÃO
                // =================================

                event.preventDefault();


                // =================================
                // DADOS DO FORMULÁRIO
                // =================================

                const dados =
                    new FormData(
                        formulario
                    );


                try {


                    // =================================
                    // ENVIA PARA O CONTROLLER
                    // =================================

                    const resposta =
                        await fetch(
                            "controllers/usuarioController.php",
                            {
                                method: "POST",
                                body: dados
                            }
                        );


                    // =================================
                    // RESPOSTA DO CONTROLLER
                    // =================================

                    const retorno =
                        await resposta.json();


                    console.log(
                        "Resposta:",
                        retorno
                    );


                    // =================================
                    // CADASTRO COM SUCESSO
                    // =================================

                    if (retorno.sucesso) {


                        // Remove o d-none
                        mensagem.classList.remove(
                            "d-none"
                        );


                        // Remove outras cores
                        mensagem.classList.remove(
                            "alert-danger",
                            "alert-info"
                        );


                        // Adiciona sucesso
                        mensagem.classList.add(
                            "alert-success"
                        );


                        mensagem.textContent =
                            retorno.mensagem;


                        // Limpa o formulário
                        formulario.reset();


                        // Mantém a ação cadastrar
                        $("#acao").val(
                            "cadastrar"
                        );


                        // Limpa o id
                        $("#id").val("");


                        // Remove as classes
                        // de validação dos inputs
                        $("#formUsuario")
                            .find(
                                ".valid, .error"
                            )
                            .removeClass(
                                "valid error"
                            );


                        return;

                    }


                    // =================================
                    // ERRO RETORNADO PELO CONTROLLER
                    // =================================

                    mensagem.classList.remove(
                        "d-none"
                    );


                    mensagem.classList.remove(
                        "alert-success",
                        "alert-info"
                    );


                    mensagem.classList.add(
                        "alert-danger"
                    );


                    mensagem.textContent =
                        retorno.mensagem;


                } catch (erro) {


                    console.error(
                        erro
                    );


                    mensagem.classList.remove(
                        "d-none"
                    );


                    mensagem.classList.remove(
                        "alert-success",
                        "alert-info"
                    );


                    mensagem.classList.add(
                        "alert-danger"
                    );


                    mensagem.textContent =
                        "Erro ao cadastrar usuário.";

                }


            }

    });


    // =========================================
    // BOTÃO LIMPAR
    // =========================================

    $("#formUsuario").on(
        "reset",
        function () {

            setTimeout(
                function () {


                    $("#acao").val(
                        "cadastrar"
                    );


                    $("#id").val("");


                    $("#formUsuario")
                        .find(
                            ".valid, .error"
                        )
                        .removeClass(
                            "valid error"
                        );


                },
                10
            );

        }
    );

}