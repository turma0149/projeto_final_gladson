<?php

// =========================================
// CADASTRAR EVENTO
// =========================================

function cadastrarEvento(
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
) {

    $stmt = $pdo->prepare(
        "INSERT INTO eventos
        (
            nome_evento,
            categoria,
            data_evento,
            hora_evento,
            local_evento,
            descricao_evento,
            organizador,
            contato,
            imagem
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );


    $stmt->execute([
        $nomeEvento,
        $categoria,
        $dataEvento,
        $horaEvento,
        $localEvento,
        $descricaoEvento,
        $organizador,
        $contato,
        $imagem
    ]);


    return $pdo->lastInsertId();

}


// =========================================
// LISTAR EVENTOS
// =========================================

function listarEventos($pdo)
{

    $stmt = $pdo->prepare(
        "SELECT *
         FROM eventos
         ORDER BY data_evento DESC"
    );


    $stmt->execute();


    return $stmt->fetchAll(
        PDO::FETCH_ASSOC
    );

}


// =========================================
// BUSCAR EVENTO PELO ID
// =========================================

function buscarEventoPorId(
    $pdo,
    $id
) {

    $stmt = $pdo->prepare(
        "SELECT *
         FROM eventos
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
// EDITAR EVENTO
// =========================================

function editarEvento(
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
) {

    $stmt = $pdo->prepare(
        "UPDATE eventos
         SET
            nome_evento = ?,
            categoria = ?,
            data_evento = ?,
            hora_evento = ?,
            local_evento = ?,
            descricao_evento = ?,
            organizador = ?,
            contato = ?,
            imagem = ?
         WHERE id = ?"
    );


    return $stmt->execute([
        $nomeEvento,
        $categoria,
        $dataEvento,
        $horaEvento,
        $localEvento,
        $descricaoEvento,
        $organizador,
        $contato,
        $imagem,
        $id
    ]);

}


// =========================================
// EXCLUIR EVENTO
// =========================================

function excluirEvento(
    $pdo,
    $id 
) {

    $stmt = $pdo->prepare(
        "DELETE FROM eventos
         WHERE id = ?"
    );


    return $stmt->execute([
        $id
    ]);

}