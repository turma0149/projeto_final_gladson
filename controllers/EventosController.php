<?php

// =========================================
// INICIA A SESSÃO
// =========================================

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


// =========================================
// RESPOSTA EM JSON
// =========================================

header(
    "Content-Type: application/json; charset=utf-8"
);


// =========================================
// ARQUIVOS NECESSÁRIOS
// =========================================

require __DIR__ . "/../libs/php/Validator.php";

require __DIR__ . "/../config/database.php";

require __DIR__ . "/../models/EventoModel.php";

require __DIR__ . "/../models/LogModel.php";


// =========================================
// CONECTA COM O BANCO
// =========================================

$pdo = conectarBanco();


// =========================================
// RECEBE A AÇÃO
// =========================================

$acao =
    $_POST["acao"] ??
    $_GET["acao"] ??
    "";


// =========================================
// ESCOLHE A OPERAÇÃO
// =========================================

switch ($acao) {


    // =====================================
    // CADASTRAR EVENTO
    // =====================================

    case "cadastrar":


        // =================================
        // PERMITE SOMENTE POST
        // =================================

        if (
            $_SERVER["REQUEST_METHOD"] !== "POST"
        ) {

            http_response_code(405);

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Método não permitido.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        // =================================
        // CRIA O VALIDADOR
        // =================================

        $validator =
            new Validator(
                $_POST
            );


        // =================================
        // EXECUTA AS VALIDAÇÕES
        // =================================

        validarCadastro(
            $validator
        );


        // =================================
        // VERIFICA ERROS
        // =================================

        if (
            $validator->fails()
        ) {

            http_response_code(422);

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Corrija os campos indicados.",
                "dados" => null,
                "erros" =>
                    $validator->errors()
            ]);

            exit;
        }


        // =================================
        // RECEBE OS DADOS
        // =================================

        $nomeEvento =
            trim(
                $_POST["nomeEvento"] ?? ""
            );

        $categoria =
            trim(
                $_POST["categoria"] ?? ""
            );

        $dataEvento =
            $_POST["dataEvento"] ?? "";

        $horaEvento =
            $_POST["horaEvento"] ?? "";

        $localEvento =
            trim(
                $_POST["localEvento"] ?? ""
            );

        $descricaoEvento =
            trim(
                $_POST["descricaoEvento"] ?? ""
            );

        $organizador =
            trim(
                $_POST["organizador"] ?? ""
            );

        $contato =
            trim(
                $_POST["contato"] ?? ""
            );


        // =================================
        // IMAGEM
        // =================================

        $imagem = null;


        if (
            isset(
                $_FILES["imagemEvento"]
            ) &&
            $_FILES["imagemEvento"]["name"]
                !== ""
        ) {

            // Mantendo simples:
            // salva apenas o nome do arquivo

            $imagem =
                $_FILES["imagemEvento"]["name"];

        }


        try {


            // =================================
            // CADASTRA NO BANCO
            // =================================

            $eventoId =
                cadastrarEvento(
                    $pdo,
                    $nomeEvento,
                    $categoria,
                    $dataEvento,
                    $horaEvento,
                    $localEvento,
                    $descricaoEvento,
                    $organizador,
                    $contato,
                    $imagem
                );


            // =================================
            // REGISTRA LOG
            // =================================

            registrarLog(
                $pdo,
                $_SESSION["usuario_id"],
                "CADASTROU EVENTO: "
                    . $eventoId,
                $eventoId
            );


            // =================================
            // RETORNA SUCESSO
            // =================================

            echo json_encode([
                "sucesso" => true,
                "mensagem" =>
                    "Evento cadastrado com sucesso.",
                "dados" => [
                    "id" => $eventoId
                ],
                "erros" => null
            ]);


        } catch (PDOException $erro) {


            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Erro ao cadastrar evento.",
                "dados" => null,
                "erros" => null
            ]);

        }


        break;


    // =====================================
    // LISTAR EVENTOS
    // =====================================

    case "listar":


        $eventos =
            listarEventos(
                $pdo
            );


        echo json_encode([
            "sucesso" => true,
            "mensagem" =>
                "Eventos carregados com sucesso.",
            "dados" => $eventos,
            "erros" => null
        ]);


        break;


    // =====================================
    // BUSCAR EVENTO
    // =====================================

    case "buscar":


        $id =
            $_GET["id"] ??
            $_POST["id"] ??
            "";


        if ($id === "") {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Informe o evento.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        $evento =
            buscarEventoPorId(
                $pdo,
                $id
            );


        if (!$evento) {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Evento não encontrado.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        echo json_encode([
            "sucesso" => true,
            "mensagem" =>
                "Evento encontrado.",
            "dados" => $evento,
            "erros" => null
        ]);


        break;


    // =====================================
    // EDITAR EVENTO
    // =====================================

    case "editar":


        // =================================
        // PERMITE SOMENTE POST
        // =================================

        if (
            $_SERVER["REQUEST_METHOD"] !== "POST"
        ) {

            http_response_code(405);

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Método não permitido.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        // =================================
        // RECEBE O ID
        // =================================

        $id =
            $_POST["id"] ?? "";


        if ($id === "") {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Evento inválido.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        // =================================
        // VALIDA OS DADOS
        // =================================

        $validator =
            new Validator(
                $_POST
            );


        validarCadastro(
            $validator
        );


        if (
            $validator->fails()
        ) {

            http_response_code(422);

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Corrija os campos indicados.",
                "dados" => null,
                "erros" =>
                    $validator->errors()
            ]);

            exit;
        }


        // =================================
        // BUSCA O EVENTO ATUAL
        // =================================

        $eventoAtual =
            buscarEventoPorId(
                $pdo,
                $id
            );


        if (!$eventoAtual) {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Evento não encontrado.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        // =================================
        // RECEBE OS NOVOS DADOS
        // =================================

        $nomeEvento =
            trim(
                $_POST["nomeEvento"] ?? ""
            );

        $categoria =
            trim(
                $_POST["categoria"] ?? ""
            );

        $dataEvento =
            $_POST["dataEvento"] ?? "";

        $horaEvento =
            $_POST["horaEvento"] ?? "";

        $localEvento =
            trim(
                $_POST["localEvento"] ?? ""
            );

        $descricaoEvento =
            trim(
                $_POST["descricaoEvento"] ?? ""
            );

        $organizador =
            trim(
                $_POST["organizador"] ?? ""
            );

        $contato =
            trim(
                $_POST["contato"] ?? ""
            );


        // =================================
        // MANTÉM A IMAGEM ANTIGA
        // =================================

        $imagem =
            $eventoAtual["imagem"];


        // =================================
        // CASO TENHA NOVA IMAGEM
        // =================================

        if (
            isset(
                $_FILES["imagemEvento"]
            ) &&
            $_FILES["imagemEvento"]["name"]
                !== ""
        ) {

            $imagem =
                $_FILES["imagemEvento"]["name"];

        }


        try {


            // =================================
            // EDITA NO BANCO
            // =================================

            editarEvento(
                $pdo,
                $id,
                $nomeEvento,
                $categoria,
                $dataEvento,
                $horaEvento,
                $localEvento,
                $descricaoEvento,
                $organizador,
                $contato,
                $imagem
            );


            // =================================
            // REGISTRA LOG
            // =================================

            registrarLog(
                $pdo,
                $_SESSION["usuario_id"],
                "EDITOU EVENTO: " . $id,
                $id
            );


            echo json_encode([
                "sucesso" => true,
                "mensagem" =>
                    "Evento editado com sucesso.",
                "dados" => [
                    "id" => $id
                ],
                "erros" => null
            ]);


        } catch (PDOException $erro) {


            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Erro ao editar evento.",
                "dados" => null,
                "erros" => null
            ]);

        }


        break;


    // =====================================
    // EXCLUIR EVENTO
    // =====================================

    case "excluir":


        if (
            $_SERVER["REQUEST_METHOD"] !== "POST"
        ) {

            http_response_code(405);

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Método não permitido.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        $id =
            $_POST["id"] ?? "";


        if ($id === "") {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Evento inválido.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        $evento =
            buscarEventoPorId(
                $pdo,
                $id
            );


        if (!$evento) {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Evento não encontrado.",
                "dados" => null,
                "erros" => null
            ]);

            exit;
        }


        try {


            // =================================
            // REGISTRA O LOG ANTES
            // =================================
            //
            // Fazemos antes de excluir porque
            // logs.evento_id possui a FK.
            // =================================

            registrarLog(
                $pdo,
                $_SESSION["usuario_id"],
                "EXCLUIU EVENTO: " . $id,
                $id
            );


            // =================================
            // EXCLUI DO BANCO
            // =================================

            excluirEvento(
                $pdo,
                $id
            );


            echo json_encode([
                "sucesso" => true,
                "mensagem" =>
                    "Evento excluído com sucesso.",
                "dados" => null,
                "erros" => null
            ]);


        } catch (PDOException $erro) {


            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Erro ao excluir evento.",
                "dados" => null,
                "erros" => null
            ]);

        }


        break;


    // =====================================
    // AÇÃO INVÁLIDA
    // =====================================

    default:


        echo json_encode([
            "sucesso" => false,
            "mensagem" =>
                "Ação inválida.",
            "dados" => null,
            "erros" => null
        ]);


        break;

}


// =========================================================
// FUNÇÃO DE VALIDAÇÃO
// =========================================================

function validarCadastro($validator)
{

    // =====================================================
    // NOME DO EVENTO
    // =====================================================

    $validator->required(
        "nomeEvento",
        "O nome do evento é obrigatório."
    );

    $validator->string(
        "nomeEvento",
        "O nome do evento deve ser um texto válido."
    );

    $validator->minLength(
        "nomeEvento",
        3,
        "O nome do evento deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "nomeEvento",
        100,
        "O nome do evento deve conter no máximo 100 caracteres."
    );


    // =====================================================
    // CATEGORIA
    // =====================================================

    $validator->required(
        "categoria",
        "A categoria é obrigatória."
    );

    $validator->string(
        "categoria",
        "A categoria deve ser um texto válido."
    );


    // =====================================================
    // DATA DO EVENTO
    // =====================================================

    $validator->required(
        "dataEvento",
        "A data do evento é obrigatória."
    );

    $validator->string(
        "dataEvento",
        "A data do evento deve ser válida."
    );


    // =====================================================
    // HORÁRIO
    // =====================================================

    $validator->required(
        "horaEvento",
        "O horário do evento é obrigatório."
    );

    $validator->string(
        "horaEvento",
        "O horário do evento deve ser válido."
    );


    // =====================================================
    // LOCAL
    // =====================================================

    $validator->required(
        "localEvento",
        "O local do evento é obrigatório."
    );

    $validator->string(
        "localEvento",
        "O local do evento deve ser um texto válido."
    );

    $validator->minLength(
        "localEvento",
        3,
        "O local do evento deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "localEvento",
        150,
        "O local do evento deve conter no máximo 150 caracteres."
    );


    // =====================================================
    // DESCRIÇÃO
    // =====================================================

    $validator->required(
        "descricaoEvento",
        "A descrição do evento é obrigatória."
    );

    $validator->string(
        "descricaoEvento",
        "A descrição deve ser um texto válido."
    );

    $validator->minLength(
        "descricaoEvento",
        10,
        "A descrição deve conter no mínimo 10 caracteres."
    );

    $validator->maxLength(
        "descricaoEvento",
        500,
        "A descrição deve conter no máximo 500 caracteres."
    );


    // =====================================================
    // ORGANIZADOR
    // =====================================================

    $validator->required(
        "organizador",
        "O nome do organizador é obrigatório."
    );

    $validator->string(
        "organizador",
        "O nome do organizador deve ser um texto válido."
    );

    $validator->minLength(
        "organizador",
        3,
        "O nome do organizador deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "organizador",
        100,
        "O nome do organizador deve conter no máximo 100 caracteres."
    );


    // =====================================================
    // CONTATO
    // =====================================================

    $validator->required(
        "contato",
        "O contato do organizador é obrigatório."
    );

    $validator->string(
        "contato",
        "O contato deve ser um texto válido."
    );

    $validator->minLength(
        "contato",
        10,
        "O contato deve conter no mínimo 10 caracteres."
    );

    $validator->maxLength(
        "contato",
        15,
        "O contato deve conter no máximo 15 caracteres."
    );

}