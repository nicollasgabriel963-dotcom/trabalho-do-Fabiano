CREATE DATABASE cadastro_site;

USE cadastro_site;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    mensagem VARCHAR(250) NOT NULL
);