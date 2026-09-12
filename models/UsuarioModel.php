<?php

// =========================================
// BUSCAR USUÁRIO PELO E-MAIL
// =========================================

function buscarUsuarioPorEmail(
    $pdo,
    $email
) {

    $stmt = $pdo->prepare(
        "SELECT *
         FROM usuarios
         WHERE email = ?"
    );

    $stmt->execute([
        $email
    ]);

    return $stmt->fetch(
        PDO::FETCH_ASSOC
    );
}


// =========================================
// BUSCAR USUÁRIO PELO ID
// =========================================

function buscarUsuarioPorId(
    $pdo,
    $id
) {

    $stmt = $pdo->prepare(
        "SELECT *
         FROM usuarios
         WHERE id = ?"
    );

    $stmt->execute([
        $id
    ]);

    return $stmt->fetch(
        PDO::FETCH_ASSOC
    );
}


// =========================================
// LISTAR USUÁRIOS
// =========================================

function listarUsuarios($pdo)
{

    $stmt = $pdo->prepare(
        "SELECT
            id,
            nome,        
            email         
         FROM usuarios
         ORDER BY id DESC"
    );

    $stmt->execute();

    return $stmt->fetchAll(
        PDO::FETCH_ASSOC
    );
}


// =========================================
// CADASTRAR USUÁRIO
// =========================================

function cadastrarUsuario(
    $pdo,
    $nome,
    $email,  
    $senha
) {

    // Cria o hash da senha
    $senhaHash = password_hash(
        $senha,
        PASSWORD_DEFAULT
    );


    $stmt = $pdo->prepare(
        "INSERT INTO usuarios
        (
            nome,          
            email,
            senha
        )
        VALUES (?, ?, ?)"
    );


    $stmt->execute([
        $nome,
        $email,
        $senhaHash
    ]);


    // Retorna o ID do usuário cadastrado
    return $pdo->lastInsertId();
}


// =========================================
// EDITAR USUÁRIO
// =========================================

function editarUsuario(
    $pdo,
    $id,
    $nome,
    $email,
) {

    $stmt = $pdo->prepare(
        "UPDATE usuarios
         SET
            nome = ?,
            email = ?
         WHERE id = ?"
    );


    return $stmt->execute([
        $nome,       
        $email,      
        $id
    ]);
}


// =========================================
// EXCLUIR USUÁRIO
// =========================================

function excluirUsuario(
    $pdo,
    $id
) {

    $stmt = $pdo->prepare(
        "DELETE FROM usuarios
         WHERE id = ?"
    );


    return $stmt->execute([
        $id
    ]);
}