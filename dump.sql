CREATE DATABASE bisaweb;
USE bisaweb;

-- Criação da tabela Tipos_Entradas
CREATE TABLE Tipos_Entradas (
  id_tipo_entrada INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL
);

-- Criação da tabela Entradas
CREATE TABLE Entradas (
id_entrada INT PRIMARY KEY NOT NULL auto_increment,
id_tipo_entrada INT NULL,
descricao VARCHAR(255),
data_hora_entrada DATETIME,
valor_entrada DECIMAL(10,2)
);
	
ALTER TABLE Entradas
ADD CONSTRAINT fk_Entradas_Tipos_Entradas
FOREIGN KEY (id_tipo_entrada) REFERENCES Tipos_Entradas(id_tipo_entrada);

-- Criação da tabela Tipos_Saidas
CREATE TABLE Tipos_Saidas (
  id_tipo_saida INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL
);

-- Criação da tabela Saidas
CREATE TABLE Saidas (
  id_saida INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_tipo_saida INT NULL,
  descricao VARCHAR(255),
  data_hora_saida DATETIME,
  valor_saida DECIMAL(10,2)

);

ALTER TABLE Saidas
ADD CONSTRAINT fk_Saidas_Tipos_Saidas
FOREIGN KEY (id_tipo_saida) REFERENCES Tipos_Saidas(id_tipo_saida);
