CREATE DATABASE Banco_Agencia;

USE Banco_Agencia;

CREATE TABLE cadastro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT,
    descricao VARCHAR(255),
    valor DECIMAL(10,2)
);

