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

require __DIR__ . "/../models/LoginModel.php";

require __DIR__ . "/../models/LogModel.php";


// =========================================
// CONECTA COM O BANCO
// =========================================

$pdo = conectarBanco();


// =========================================
// RECEBE OS DADOS DO FORMULÁRIO
// =========================================

$email = trim(
    $_POST["email"] ?? ""
);

$senha =
    $_POST["senha"] ?? "";


// =========================================
// VALIDA OS CAMPOS
// =========================================

if (
    $email === "" ||
    $senha === ""
) {

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Preencha e-mail e senha."
    ]);

    exit;
}


// =========================================
// VALIDA O FORMATO DO E-MAIL
// =========================================

if (
    !filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )
) {

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Informe um e-mail válido."
    ]);

    exit;
}


// =========================================
// BUSCA O USUÁRIO PELO E-MAIL
// =========================================

$usuario =
    buscarUsuarioPorEmail(
        $pdo,
        $email
    );


// =========================================
// VERIFICA SE O USUÁRIO EXISTE
// =========================================

if (!$usuario) {

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "E-mail ou senha incorretos."
    ]);

    exit;
}


// =========================================
// VERIFICA A SENHA
// =========================================

if (
    !password_verify(
        $senha,
        $usuario["senha"]
    )
) {

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "E-mail ou senha incorretos."
    ]);

    exit;
}


// =========================================
// CRIA A SESSÃO
// =========================================

$_SESSION["usuario_id"] =
    $usuario["id"];

$_SESSION["usuario_nome"] =
    $usuario["nome"];

$_SESSION["usuario_email"] =
    $usuario["email"];


// =========================================
// REGISTRA O LOGIN NO LOG
// =========================================

registrarLog(
    $pdo,
    $usuario["id"],
    "LOGIN"
);


// =========================================
// RETORNA SUCESSO
// =========================================

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Login realizado com sucesso."
]);

exit;