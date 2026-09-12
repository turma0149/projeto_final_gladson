<?php

// =========================================
// REGISTRAR LOG
// =========================================

function registrarLog(
    $pdo,
    $usuarioId,
    $acao,
    $eventoId = null
) {

    $stmt = $pdo->prepare(
        "INSERT INTO logs
        (
            usuario_id,
            evento_id,
            acao
        )
        VALUES (?, ?, ?)"
    );


    return $stmt->execute([
        $usuarioId,
        $eventoId,
        $acao
    ]);
}