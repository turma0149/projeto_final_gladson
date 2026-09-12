CREATE DATABASE IF NOT EXISTS contagem360;

USE contagem360;


/* =========================================
   USUÁRIOS
========================================= */

CREATE TABLE usuarios (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    senha VARCHAR(255) NOT NULL

);


/* =========================================
   EVENTOS
========================================= */

CREATE TABLE eventos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome_evento VARCHAR(100) NOT NULL,

    categoria VARCHAR(50) NOT NULL,

    data_evento DATE NOT NULL,

    hora_evento TIME NOT NULL,

    local_evento VARCHAR(150) NOT NULL,

    descricao_evento VARCHAR(500) NOT NULL,

    organizador VARCHAR(100) NOT NULL,

    contato VARCHAR(11) NOT NULL,

    imagem VARCHAR(255) DEFAULT NULL

);


/* =========================================
   LOGS
========================================= */

CREATE TABLE logs (

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT NOT NULL,

    evento_id INT DEFAULT NULL,

    acao VARCHAR(255) NOT NULL,

    data_log TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_logs_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id),

    CONSTRAINT fk_logs_evento
        FOREIGN KEY (evento_id)
        REFERENCES eventos(id)
        ON DELETE SET NULL

);

/* =========================================
   USUÁRIO ADMINISTRADOR PADRÃO
========================================= */

INSERT INTO usuarios
(
    nome,
  
    email,
  
    senha
)
VALUES
(
    'Administrador',
  
    'admin@email.com',
  
    '$2y$12$vdqNnjqdf1TznZGgYIni4eRgqQpdK/71owBsVtO5dTNerpXKOnfLu');