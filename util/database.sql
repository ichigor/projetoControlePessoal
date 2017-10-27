create database projetoIntegrador;

create table Usuario(
idUsuario Int not null PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(50) ,
usuario VARCHAR(50) ,
senha VARCHAR(50) ,
celular VARCHAR(50) ,
ativo VARCHAR(1) ,
email VARCHAR(50) ,
cpf VARCHAR(20) ,
telefone VARCHAR(50) ,
rg VARCHAR(50) ,
tipo VARCHAR(50),
endereco VARCHAR (50)
);

create table Tarefa(
idTarefa int not null PRIMARY KEY AUTO_INCREMENT,
status varchar(50),
frequencia varchar(50),
descricao VARCHAR (50),
dataInicial DATE,
dataFinal DATE,
idUsuario int,
FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);

CREATE TABLE Historico(
idHistorico int not null PRIMARY KEY AUTO_INCREMENT,
status varchar(50),
frequencia varchar(50),
descricao VARCHAR (50),
dataInicial DATE,
dataFinal DATE,
idTarefa int,
idUsuario int,
FOREIGN KEY (idTarefa) REFERENCES Tarefa(idTarefa),
FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);



insert into usuario (nome, usuario, senha, celular, ativo, email, cpf, telefone, endereco, rg, tipo) values ('aa','aa','aa','aa','1','aa','aa','aa','aa','aa','0')