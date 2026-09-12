<?php

// =========================================
// INICIA A SESSÃO
// =========================================

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


// =========================================
// VERIFICA SE O USUÁRIO ESTÁ LOGADO
// =========================================

if (!isset($_SESSION["usuario_id"])) {

    // Se não estiver logado,
    // volta para a página de login.

    header(
        "Location: index.php?page=login"
    );

    exit;
}