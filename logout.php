<?php

// =========================================
// INICIA A SESSÃO
// =========================================

if (
    session_status() !==
    PHP_SESSION_ACTIVE
) {

    session_start();

}


// =========================================
// LIMPA A SESSÃO
// =========================================

session_unset();

session_destroy();


// =========================================
// VOLTA PARA O LOGIN
// =========================================

header(
    "Location: index.php?page=login"
);

exit;