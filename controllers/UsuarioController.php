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

require __DIR__ . "/../config/database.php";

require __DIR__ . "/../models/UsuarioModel.php";

require __DIR__ . "/../models/LogModel.php";


// =========================================
// CONECTA COM O BANCO
// =========================================

$pdo = conectarBanco();


// =========================================
// RECEBE A AÇÃO
// =========================================

$acao =
    $_POST["acao"] ?? "";


// =========================================
// VERIFICA QUAL AÇÃO SERÁ EXECUTADA
// =========================================

switch ($acao) {


    // =====================================
    // CADASTRAR USUÁRIO
    // =====================================

    case "cadastrar":


        // =================================
        // RECEBE OS DADOS
        // =================================

        $nome = trim(
            $_POST["nome"] ?? ""
        );

        $email = trim(
            $_POST["email"] ?? ""
        );

        $senha =
            $_POST["senha"] ?? "";


        // =================================
        // VALIDA CAMPOS OBRIGATÓRIOS
        // =================================

        if (
            $nome === "" ||
            $email === "" ||
            $senha === ""
        ) {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Preencha todos os campos."
            ]);

            exit;
        }


        // =================================
        // VALIDA O E-MAIL
        // =================================

        if (
            !filter_var(
                $email,
                FILTER_VALIDATE_EMAIL
            )
        ) {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Digite um e-mail válido."
            ]);

            exit;
        }


        // =================================
        // VALIDA A SENHA
        // =================================

        if (
            strlen($senha) < 6
        ) {

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "A senha deve possuir pelo menos 6 caracteres."
            ]);

            exit;
        }


        try {


            // =================================
            // CADASTRA O USUÁRIO
            // =================================

            $usuarioId =
                cadastrarUsuario(
                    $pdo,
                    $nome,
                    $email,
                    $senha
                );


            // =================================
            // REGISTRA O LOG
            // =================================

            registrarLog(
                $pdo,
                $_SESSION["usuario_id"],
                "CADASTROU USUÁRIO: " . $usuarioId
            );


            // =================================
            // RETORNA SUCESSO
            // =================================

            echo json_encode([
                "sucesso" => true,
                "mensagem" =>
                    "Usuário cadastrado com sucesso.",
                "id" => $usuarioId
            ]);


        } catch (PDOException $erro) {


            // =================================
            // E-MAIL DUPLICADO
            // =================================

            if (
                $erro->getCode() == 23000
            ) {

                echo json_encode([
                    "sucesso" => false,
                    "mensagem" =>
                        "Este e-mail já está cadastrado."
                ]);

                exit;
            }


            // =================================
            // OUTRO ERRO
            // =================================

            echo json_encode([
                "sucesso" => false,
                "mensagem" =>
                    "Erro ao cadastrar usuário."
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
                "Ação inválida."
        ]);


        break;

}