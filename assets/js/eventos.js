$(document).ready(function () {


    /* =====================================================
       MÁSCARA DE TELEFONE
    ====================================================== */

    $("#contato").mask(
        "(00) 00000-0000"
    );


    /* =====================================================
       DATA MÍNIMA = HOJE
    ====================================================== */

    const hoje =
        new Date();

    const ano =
        hoje.getFullYear();

    const mes =
        String(
            hoje.getMonth() + 1
        ).padStart(
            2,
            "0"
        );

    const dia =
        String(
            hoje.getDate()
        ).padStart(
            2,
            "0"
        );

    const dataAtual =
        `${ano}-${mes}-${dia}`;


    $("#dataEvento").attr(
        "min",
        dataAtual
    );


    /* =====================================================
       LISTA OS EVENTOS AO ABRIR A PÁGINA
    ====================================================== */

    listarEventos();


    /* =====================================================
       VALIDAÇÃO DO FORMULÁRIO
    ====================================================== */

    $("#formEvento").validate({


        /* =================================================
           REGRAS
        ================================================== */

        rules: {

            nomeEvento: {

                required: true,

                minlength: 3,

                maxlength: 100

            },


            categoria: {

                required: true

            },


            dataEvento: {

                required: true,

                date: true

            },


            horaEvento: {

                required: true

            },


            localEvento: {

                required: true,

                minlength: 3,

                maxlength: 150

            },


            descricaoEvento: {

                required: true,

                minlength: 10,

                maxlength: 500

            },


            organizador: {

                required: true,

                minlength: 3,

                maxlength: 100

            },


            contato: {

                required: true,

                minlength: 15

            },


            imagemEvento: {

                extension:
                    "jpg|jpeg|png|webp"

            }

        },


        /* =================================================
           MENSAGENS
        ================================================== */

        messages: {

            nomeEvento: {

                required:
                    "Informe o nome do evento.",

                minlength:
                    "Digite pelo menos 3 caracteres.",

                maxlength:
                    "O nome pode ter no máximo 100 caracteres."

            },


            categoria: {

                required:
                    "Selecione uma categoria."

            },


            dataEvento: {

                required:
                    "Informe a data do evento.",

                date:
                    "Informe uma data válida."

            },


            horaEvento: {

                required:
                    "Informe o horário do evento."

            },


            localEvento: {

                required:
                    "Informe o local do evento.",

                minlength:
                    "Informe um local válido.",

                maxlength:
                    "O local pode ter no máximo 150 caracteres."

            },


            descricaoEvento: {

                required:
                    "Informe uma descrição.",

                minlength:
                    "A descrição deve possuir pelo menos 10 caracteres.",

                maxlength:
                    "A descrição pode ter no máximo 500 caracteres."

            },


            organizador: {

                required:
                    "Informe o nome do organizador.",

                minlength:
                    "Digite pelo menos 3 caracteres.",

                maxlength:
                    "O nome pode ter no máximo 100 caracteres."

            },


            contato: {

                required:
                    "Informe o número de contato.",

                minlength:
                    "Informe um telefone válido."

            },


            imagemEvento: {

                extension:
                    "Envie uma imagem JPG, JPEG, PNG ou WEBP."

            }

        },


        /* =================================================
           CONFIGURAÇÃO DOS ERROS
        ================================================== */

        errorElement:
            "label",

        errorClass:
            "error",


        /* =================================================
           CAMPO COM ERRO
        ================================================== */

        highlight:
            function (element) {

                $(element)
                    .addClass(
                        "error"
                    )
                    .removeClass(
                        "valid"
                    );

            },


        /* =================================================
           CAMPO VÁLIDO
        ================================================== */

        unhighlight:
            function (element) {

                $(element)
                    .removeClass(
                        "error"
                    )
                    .addClass(
                        "valid"
                    );

            },


        /* =================================================
           ENVIO DO FORMULÁRIO
           CADASTRAR OU EDITAR
        ================================================== */

        submitHandler:
            async function (
                formulario,
                event
            ) {


                /* =========================================
                   IMPEDE O ENVIO PADRÃO
                ========================================== */

                event.preventDefault();


                /* =========================================
                   PEGA OS DADOS
                ========================================== */

                const dados =
                    new FormData(
                        formulario
                    );


                /* =========================================
                   MOSTRA OS DADOS NO CONSOLE
                ========================================== */

                console.table(
                    Object.fromEntries(
                        dados.entries()
                    )
                );


                /* =========================================
                   MOSTRA CARREGAMENTO
                ========================================== */

                $("#mensagem")
                    .removeClass(
                        "d-none alert-success alert-danger"
                    )
                    .addClass(
                        "alert-info"
                    )
                    .html(
                        '<i class="bi bi-hourglass-split me-2"></i>' +
                        'Salvando evento...'
                    );


                try {


                    /* =====================================
                       ENVIA PARA O CONTROLLER
                    ====================================== */

                    const resposta =
                        await fetch(
                            "controllers/EventosController.php",
                            {

                                method:
                                    "POST",

                                body:
                                    dados

                            }
                        );


                    /* =====================================
                       RECEBE O JSON
                    ====================================== */

                    const retorno =
                        await resposta.json();


                    console.log(
                        "Resposta do Controller:",
                        retorno
                    );


                    /* =====================================
                       SUCESSO
                    ====================================== */

                    if (
                        retorno.sucesso
                    ) {


                        $("#mensagem")
                            .removeClass(
                                "d-none alert-info alert-danger"
                            )
                            .addClass(
                                "alert-success"
                            )
                            .html(
                                '<i class="bi bi-check-circle me-2"></i>' +
                                retorno.mensagem
                            );


                        /* =================================
                           LIMPA O FORMULÁRIO
                        ================================== */

                        formulario.reset();


                        /* =================================
                           LIMPA O ID
                        ================================== */

                        $("#id").val(
                            ""
                        );


                        /* =================================
                           VOLTA PARA CADASTRAR
                        ================================== */

                        $("#acao").val(
                            "cadastrar"
                        );


                        /* =================================
                           VOLTA O TEXTO DO BOTÃO
                        ================================== */

                        $(".btn-evento")
                            .html(
                                '<i class="bi bi-check-circle me-2"></i>' +
                                'Cadastrar Evento'
                            );


                        /* =================================
                           LIMPA AS CLASSES
                        ================================== */

                        $("#formEvento")
                            .find(
                                ".error, .valid"
                            )
                            .removeClass(
                                "error valid"
                            );


                        /* =================================
                           ATUALIZA A TABELA
                        ================================== */

                        await listarEventos();


                        return;

                    }


                    /* =====================================
                       ERRO RETORNADO PELO CONTROLLER
                    ====================================== */

                    $("#mensagem")
                        .removeClass(
                            "d-none alert-success alert-info"
                        )
                        .addClass(
                            "alert-danger"
                        )
                        .html(
                            '<i class="bi bi-exclamation-circle me-2"></i>' +
                            retorno.mensagem
                        );


                } catch (erro) {


                    console.error(
                        erro
                    );


                    /* =====================================
                       ERRO DE COMUNICAÇÃO
                    ====================================== */

                    $("#mensagem")
                        .removeClass(
                            "d-none alert-success alert-info"
                        )
                        .addClass(
                            "alert-danger"
                        )
                        .html(
                            '<i class="bi bi-exclamation-circle me-2"></i>' +
                            'Erro ao salvar evento.'
                        );


                }

            }

    });


    /* =====================================================
       CONTADOR DA DESCRIÇÃO
    ====================================================== */

    $("#descricaoEvento").on(
        "input",
        function () {


            const limite =
                500;


            const quantidade =
                $(this).val().length;


            $(".descricao-info")
                .text(
                    `${quantidade}/${limite} caracteres`
                );


        }
    );


    /* =====================================================
       BOTÃO LIMPAR
    ====================================================== */

    $("#formEvento").on(
        "reset",
        function () {


            setTimeout(
                function () {


                    /* =====================================
                       REMOVE VALIDAÇÕES VISUAIS
                    ====================================== */

                    $("#formEvento")
                        .find(
                            ".error, .valid"
                        )
                        .removeClass(
                            "error valid"
                        );


                    /* =====================================
                       CONTADOR DA DESCRIÇÃO
                    ====================================== */

                    $(".descricao-info")
                        .text(
                            "Máximo de 500 caracteres."
                        );


                    /* =====================================
                       LIMPA O ID
                    ====================================== */

                    $("#id").val(
                        ""
                    );


                    /* =====================================
                       VOLTA PARA CADASTRAR
                    ====================================== */

                    $("#acao").val(
                        "cadastrar"
                    );


                    /* =====================================
                       TEXTO DO BOTÃO
                    ====================================== */

                    $(".btn-evento")
                        .html(
                            '<i class="bi bi-check-circle me-2"></i>' +
                            'Cadastrar Evento'
                        );


                },
                10
            );


        }
    );


});


/* =========================================================
   LISTAR EVENTOS
========================================================= */

async function listarEventos() {


    try {


        /* =================================================
           BUSCA OS EVENTOS
        ================================================== */

        const resposta =
            await fetch(
                "controllers/EventosController.php?acao=listar"
            );


        /* =================================================
           RECEBE O JSON
        ================================================== */

        const retorno =
            await resposta.json();


        console.log(
            "Lista de eventos:",
            retorno
        );


        /* =================================================
           PEGA O CORPO DA TABELA
        ================================================== */

        const tbody =
            document.querySelector(
                "#tabelaEventos tbody"
            );


        /* =================================================
           LIMPA A TABELA
        ================================================== */

        tbody.innerHTML =
            "";


        /* =================================================
           SEM EVENTOS
        ================================================== */

        if (
            !retorno.sucesso ||
            !retorno.dados ||
            retorno.dados.length === 0
        ) {


            tbody.innerHTML = `

                <tr>

                    <td
                        colspan="7"
                        class="text-center"
                    >

                        Nenhum evento cadastrado.

                    </td>

                </tr>

            `;


            return;

        }


        /* =================================================
           MONTA AS LINHAS
        ================================================== */

        retorno.dados.forEach(
            function (evento) {


                /* =========================================
                   CRIA UMA LINHA
                ========================================== */

                const linha =
                    document.createElement(
                        "tr"
                    );


                /* =========================================
                   CONTEÚDO DA LINHA
                ========================================== */

                linha.innerHTML = `

                    <td>

                        ${evento.id}

                    </td>


                    <td>

                        ${evento.nome_evento}

                    </td>


                    <td>

                        ${evento.categoria}

                    </td>


                    <td>

                        ${formatarData(
                            evento.data_evento
                        )}

                    </td>


                    <td>

                        ${formatarHora(
                            evento.hora_evento
                        )}

                    </td>


                    <td>

                        ${evento.local_evento}

                    </td>


                    <td class="text-center">


                        <!-- EDITAR -->

                        <button
                            type="button"
                            class="btn btn-warning btn-sm me-1 btn-editar"
                            data-id="${evento.id}"
                            title="Editar"
                        >

                            <i class="bi bi-pencil"></i>

                        </button>


                        <!-- EXCLUIR -->

                        <button
                            type="button"
                            class="btn btn-danger btn-sm btn-excluir"
                            data-id="${evento.id}"
                            title="Excluir"
                        >

                            <i class="bi bi-trash"></i>

                        </button>


                    </td>

                `;


                /* =========================================
                   COLOCA NA TABELA
                ========================================== */

                tbody.appendChild(
                    linha
                );


            }
        );


    } catch (erro) {


        console.error(
            "Erro ao listar eventos:",
            erro
        );


    }

}


/* =========================================================
   BOTÃO EDITAR DA TABELA
========================================================= */

$(document).on(
    "click",
    ".btn-editar",
    function () {


        /* =================================================
           PEGA O ID DO EVENTO
        ================================================== */

        const id =
            $(this).data(
                "id"
            );


        /* =================================================
           BUSCA O EVENTO
        ================================================== */

        buscarEvento(
            id
        );


    }
);


/* =========================================================
   BOTÃO EXCLUIR DA TABELA
========================================================= */

$(document).on(
    "click",
    ".btn-excluir",
    function () {


        /* =================================================
           PEGA O ID
        ================================================== */

        const id =
            $(this).data(
                "id"
            );


        /* =================================================
           EXCLUI
        ================================================== */

        excluirEvento(
            id
        );


    }
);


/* =========================================================
   BUSCAR EVENTO PARA EDITAR
========================================================= */

async function buscarEvento(id) {


    try {


        /* =================================================
           ENVIA O ID PARA O CONTROLLER
        ================================================== */

        const resposta =
            await fetch(
                "controllers/EventosController.php?acao=buscar&id=" +
                id
            );


        /* =================================================
           RECEBE O JSON
        ================================================== */

        const retorno =
            await resposta.json();


        console.log(
            "Evento encontrado:",
            retorno
        );


        /* =================================================
           VERIFICA SE ENCONTROU
        ================================================== */

        if (
            !retorno.sucesso
        ) {


            alert(
                retorno.mensagem
            );


            return;

        }


        /* =================================================
           PEGA OS DADOS
        ================================================== */

        const evento =
            retorno.dados;


        /* =================================================
           PREENCHE O ID
        ================================================== */

        $("#id").val(
            evento.id
        );


        /* =================================================
           MUDA A AÇÃO PARA EDITAR
        ================================================== */

        $("#acao").val(
            "editar"
        );


        /* =================================================
           PREENCHE O FORMULÁRIO
        ================================================== */

        $("#nomeEvento").val(
            evento.nome_evento
        );


        $("#categoria").val(
            evento.categoria
        );


        $("#dataEvento").val(
            evento.data_evento
        );


        $("#horaEvento").val(
            evento.hora_evento
        );


        $("#localEvento").val(
            evento.local_evento
        );


        $("#descricaoEvento").val(
            evento.descricao_evento
        );


        $("#organizador").val(
            evento.organizador
        );


        $("#contato").val(
            evento.contato
        );


        /* =================================================
           MUDA O TEXTO DO BOTÃO
        ================================================== */

        $(".btn-evento")
            .html(
                '<i class="bi bi-pencil-square me-2"></i>' +
                'Salvar Alterações'
            );


        /* =================================================
           ATUALIZA CONTADOR
        ================================================== */

        $(".descricao-info")
            .text(
                evento.descricao_evento.length +
                "/500 caracteres"
            );


        /* =================================================
           LIMPA MENSAGEM ANTIGA
        ================================================== */

        $("#mensagem")
            .addClass(
                "d-none"
            )
            .removeClass(
                "alert-success alert-danger alert-info"
            );


        /* =================================================
           VOLTA PARA O FORMULÁRIO
        ================================================== */

        document
            .getElementById(
                "formEvento"
            )
            .scrollIntoView({

                behavior:
                    "smooth",

                block:
                    "start"

            });


    } catch (erro) {


        console.error(
            erro
        );


        alert(
            "Erro ao buscar evento."
        );


    }

}


/* =========================================================
   EXCLUIR EVENTO
========================================================= */

async function excluirEvento(id) {


    /* =====================================================
       PEDE CONFIRMAÇÃO
    ====================================================== */

    const confirmar =
        confirm(
            "Deseja realmente excluir este evento?"
        );


    /* =====================================================
       CANCELA A EXCLUSÃO
    ====================================================== */

    if (
        !confirmar
    ) {


        return;


    }


    /* =====================================================
       CRIA OS DADOS
    ====================================================== */

    const dados =
        new FormData();


    /* =====================================================
       AÇÃO
    ====================================================== */

    dados.append(
        "acao",
        "excluir"
    );


    /* =====================================================
       ID
    ====================================================== */

    dados.append(
        "id",
        id
    );


    try {


        /* =================================================
           ENVIA PARA O CONTROLLER
        ================================================== */

        const resposta =
            await fetch(
                "controllers/EventosController.php",
                {

                    method:
                        "POST",

                    body:
                        dados

                }
            );


        /* =================================================
           RECEBE JSON
        ================================================== */

        const retorno =
            await resposta.json();


        console.log(
            "Exclusão:",
            retorno
        );


        /* =================================================
           SUCESSO
        ================================================== */

        if (
            retorno.sucesso
        ) {


            alert(
                retorno.mensagem
            );


            /* =============================================
               CASO ESTEJA EDITANDO O MESMO EVENTO
            ============================================== */

            if (
                $("#id").val() == id
            ) {


                document
                    .getElementById(
                        "formEvento"
                    )
                    .reset();


            }


            /* =============================================
               ATUALIZA A TABELA
            ============================================== */

            listarEventos();


            return;


        }


        /* =================================================
           ERRO
        ================================================== */

        alert(
            retorno.mensagem
        );


    } catch (erro) {


        console.error(
            erro
        );


        alert(
            "Erro ao excluir evento."
        );


    }

}


/* =========================================================
   FORMATAR DATA
========================================================= */

function formatarData(data) {


    /* =====================================================
       SEM DATA
    ====================================================== */

    if (
        !data
    ) {


        return "";


    }


    /* =====================================================
       SEPARA ANO, MÊS E DIA
    ====================================================== */

    const partes =
        data.split(
            "-"
        );


    /* =====================================================
       RETORNA DD/MM/AAAA
    ====================================================== */

    return (
        partes[2] +
        "/" +
        partes[1] +
        "/" +
        partes[0]
    );


}


/* =========================================================
   FORMATAR HORÁRIO
========================================================= */

function formatarHora(hora) {


    if (
        !hora
    ) {


        return "";


    }


    /* =====================================================
       BANCO PODE RETORNAR 18:30:00
       EXIBIMOS APENAS 18:30
    ====================================================== */

    return hora.substring(
        0,
        5
    );


}