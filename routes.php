<?php
//definir url do  projeto
//http://localhost/projetos-gladson/mvc/contagem-mvc/index.php?page=landing

//definir páginas válidas no projeto
$paginasValidas = [
    "landing" => __DIR__ . "/views/landing.php",
    "home" => __DIR__ . "/views/home.php",
    "login" => __DIR__ . "/views/login.php",
    "eventos" => __DIR__ . "/views/evento.php",
    "usuario" => __DIR__ . "/views/usuario.php",
    "ex-evento" => __DIR__ . "/views/ex-evento.php",
    "suporte" => __DIR__ . "/views/suporte.php",
];

// Capturar a página informada na url 
$page = $_GET["page"] ?? "landing";

//Verificar se a página existe
if (array_key_exists($page, $paginasValidas)) {
    require $paginasValidas[$page];
} else {
    http_response_code(404);
    require __DIR__ . "/views/404.php";
}
