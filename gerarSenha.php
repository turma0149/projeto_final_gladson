<?php

// =========================================
// SENHA QUE SERÁ CRIPTOGRAFADA
// =========================================

$senha = "123456";


// =========================================
// GERA O HASH DA SENHA
// =========================================

$senhaHash = password_hash(
    $senha,
    PASSWORD_DEFAULT
);


// =========================================
// MOSTRA O RESULTADO
// =========================================

echo "<h2>Gerador de Senha</h2>";

echo "<strong>Senha:</strong> ";

echo $senha;

echo "<br><br>";

echo "<strong>Hash:</strong> ";

echo $senhaHash;