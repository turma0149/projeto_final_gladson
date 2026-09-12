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