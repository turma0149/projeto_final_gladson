<?php

// =========================================
// FUNÇÃO DE CONEXÃO COM O BANCO DE DADOS
// =========================================

function conectarBanco()
{

    // =====================================
    // DADOS DO BANCO
    // =====================================

    $host = "localhost";

    $banco = "contagem360";

    $usuario = "root";

    $senha = "";


    // =====================================
    // TENTA REALIZAR A CONEXÃO
    // =====================================

    try {

        $pdo = new PDO(

            "mysql:host=$host;dbname=$banco;charset=utf8mb4",

            $usuario,

            $senha

        );


        // =================================
        // CONFIGURA O PDO PARA MOSTRAR ERROS
        // =================================

        $pdo->setAttribute(

            PDO::ATTR_ERRMODE,

            PDO::ERRMODE_EXCEPTION

        );


        // =================================
        // RETORNA A CONEXÃO
        // =================================

        return $pdo;


    } catch (PDOException $erro) {


        // =================================
        // MOSTRA O ERRO CASO NÃO CONECTE
        // =================================

        die(

            "Erro ao conectar ao banco de dados: "
            . $erro->getMessage()

        );

    }

}