CREATE TABLE Tipo_Entrada (
  id_tipo_entrada INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255)
);

CREATE TABLE Entrada (
  id_entrada INT PRIMARY KEY AUTO_INCREMENT,
  id_tipo_entrada INT NOT NULL,
  descricao VARCHAR(255),
  data_hora_entrada DATETIME NOT NULL,
  valor_entrada float NOT NULL,
  FOREIGN KEY (id_tipo_entrada) REFERENCES Tipo_Entrada (id_tipo_entrada)
);

CREATE TABLE Tipo_Saida (
  id_tipo_saida INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255)
);

CREATE TABLE Saida (
  id_saida INT PRIMARY KEY AUTO_INCREMENT,
  id_tipo_saida INT NOT NULL,
  descricao VARCHAR(255),
  data_hora_saida DATETIME NOT NULL,
  valor_saida float NOT NULL,
  FOREIGN KEY (id_tipo_saida) REFERENCES Tipo_Saida (id_tipo_saida)
);