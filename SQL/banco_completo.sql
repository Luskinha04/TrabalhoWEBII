-- Criação do banco de dados
CREATE DATABASE Supermercado;
USE Supermercado;

-- Tabela usuario
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(15),
    endereco VARCHAR(255),
    data_cadastro DATE
);

-- Tabela admin
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nivel_acesso TINYINT DEFAULT 1,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

-- Tabela produto
CREATE TABLE produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT DEFAULT 0
);

-- Tabela venda
CREATE TABLE venda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    data_venda TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (produto_id) REFERENCES produto(id)
);

-- Inserir dados na tabela usuario
INSERT INTO usuario (nome, email, senha, telefone, endereco) VALUES
('João Silva', 'joao.silva@example.com', 'senha123', '11987654321', 'Rua das Flores, 123'),
('Maria Oliveira', 'maria.oliveira@example.com', 'senha456', '11976543210', 'Avenida Paulista, 456'),
('Carlos Souza', 'carlos.souza@example.com', 'senha789', '11965432109', 'Rua Augusta, 789');

-- Inserir dados na tabela admin
INSERT INTO admin (usuario_id, nivel_acesso) VALUES
(1, 1),
(2, 2);

-- Inserir dados na tabela produto
INSERT INTO produto (nome, descricao, preco, estoque) VALUES
('Arroz', 'Arroz branco tipo 1', 25.50, 100),
('Feijão', 'Feijão preto', 8.90, 200),
('Macarrão', 'Macarrão espaguete', 4.50, 150),
('Óleo de Soja', 'Óleo de soja 900ml', 7.80, 50);

-- Inserir dados na tabela venda
INSERT INTO venda (usuario_id, produto_id, quantidade, total) VALUES
(1, 1, 2, 51.00),
(2, 3, 3, 13.50),
(3, 2, 5, 44.50);


SELECT * FROM usuario;
