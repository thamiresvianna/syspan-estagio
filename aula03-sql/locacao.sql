CREATE DATABASE IF NOT EXISTS syspan_locacao_estagio
 DEFAULT CHARACTER SET utf8mb4
 DEFAULT COLLATE utf8mb4_general_ci;
USE syspan_locacao_estagio;

-- Clientes
CREATE TABLE IF NOT EXISTS clientes (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120) NOT NULL,
 email VARCHAR(120) NOT NULL,
 telefone VARCHAR(20) NULL,
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX uk_clientes_email ON clientes(email);

-- Equipamentos
CREATE TABLE IF NOT EXISTS equipamentos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 descricao VARCHAR(120) NOT NULL,
 diaria DECIMAL(10,2) NOT NULL,
 ativo TINYINT(1) NOT NULL DEFAULT 1,
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Contratos de Locação (simplificado)
CREATE TABLE IF NOT EXISTS contratos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 id_cliente INT NOT NULL,
 data_inicio DATE NOT NULL,
 data_fim DATE NOT NULL,
 status VARCHAR(15) NOT NULL DEFAULT 'AGENDADO',
 observacao VARCHAR(255) NULL,
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 CONSTRAINT fk_contratos_cliente
 FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

-- Itens do contrato (muitos equipamentos por contrato)
CREATE TABLE IF NOT EXISTS contrato_itens (
 id INT AUTO_INCREMENT PRIMARY KEY,
 id_contrato INT NOT NULL,
 id_equipamento INT NOT NULL,
 diaria DECIMAL(10,2) NOT NULL,
 qtd INT NOT NULL DEFAULT 1,
 CONSTRAINT fk_itens_contrato
 FOREIGN KEY (id_contrato) REFERENCES contratos(id),
 CONSTRAINT fk_itens_equip
 FOREIGN KEY (id_equipamento) REFERENCES equipamentos(id)
);

-- Inserção de Clientes
INSERT INTO clientes (nome, email, telefone) VALUES ('Marcelo Dias', 'marcelodias@gmail.com', '98610-2385');
INSERT INTO clientes (nome, email, telefone) VALUES ('Eduardo Moreira', 'eduardomoreira@gmail.com', '98104-1361');
INSERT INTO clientes (nome, email, telefone) VALUES ('Renata Santos', 'renatasantos@gmail.com', '98686-4038');
INSERT INTO clientes (nome, email, telefone) VALUES ('Sarah Gonçalves', 'sarahg@gmail.com', '99619-7297');
INSERT INTO clientes (nome, email, telefone) VALUES ('Luisa Marcon', 'luisa@gmail.com', '98574-0147');

-- Inserção de Equipamentos
INSERT INTO equipamento (descricao, diaria) VALUES ('Gerador de Energia', 230.00);
INSERT INTO equipamento (descricao, diaria) VALUES ('Martelo Demolidor', 35.00);
INSERT INTO equipamento (descricao, diaria) VALUES ('Plataforma Elevatória Articulada', 550.00);
INSERT INTO equipamento (descricao, diaria) VALUES ('Rolo Compactador', 250.00);
INSERT INTO equipamento (descricao, diaria) VALUES ('Betoneira', 19.00);

-- Inserção de Contratos
INSERT INTO contratos (id_cliente, data_inicio, data_fim, status, observacao) VALUES (1, '2026-05-18', '2026-05-22', 'ATIVO', 'Contrato em endamento');
INSERT INTO contratos (id_cliente, data_inicio, data_fim, status, observacao) VALUES (3, '2026-06-01', '2026-06-05', 'AGENDADO', 'Contrato futuro');
