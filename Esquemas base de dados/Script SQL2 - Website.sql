CREATE DATABASE websiteSumarios;

USE websiteSumarios;

CREATE TABLE Turma (
	id_turma int NOT NULL AUTO_INCREMENT primary key,
	curso varchar(100),
	ano tinyint,
	semestre tinyint
);

CREATE TABLE Professor (
	id_prof int NOT NULL AUTO_INCREMENT primary key,
	nome varchar(100),
	morada varchar(70),
	telemovel varchar(13),
	email varchar(30) not null,
	password varchar(20)
);

CREATE TABLE Sumario (
 	id int NOT NULL AUTO_INCREMENT primary key
);

CREATE TABLE Aluno (
	id_aluno int NOT NULL AUTO_INCREMENT primary key,
	nome varchar(100),
	morada varchar(70),
	telemovel varchar(13),
	email varchar(30) not null,
	password varchar(20),
	id_turma int not null,  
	CONSTRAINT fk_id_turma FOREIGN KEY (id_turma) references Turma(id_turma)
);


CREATE TABLE UC (
	id_uc int NOT NULL AUTO_INCREMENT primary key,
	nome varchar(60) not null,
	horas integer
);



CREATE TABLE Aula (
	id int NOT NULL AUTO_INCREMENT primary key,
	data2 date not null,
	hora_ini datetime not null,
	hora_fim datetime not null,
	duracao integer not null,
	modo varchar(30) not null,
	tipo varchar(30) not null,
	id_sum int not null unique key,
	id_uc int not null,
	CONSTRAINT fk_id_sum FOREIGN KEY(id_sum) references Sumario(id),
	CONSTRAINT fk_id_uc FOREIGN KEY(id_uc) references UC(id_uc)
	);


CREATE TABLE marca (
	id_aluno int not null,
	id_aula int not null,
	CONSTRAINT fk_id_aluno FOREIGN KEY(id_aluno) references Aluno(id_aluno),
	CONSTRAINT fk_id_aula FOREIGN KEY(id_aula) references Aula(id),
	presencas boolean,
	primary key (id_aluno, id_aula)
);

CREATE TABLE tem (
	id_turma int not null,
	id_uc int not null,
	CONSTRAINT fk_id_turma1 FOREIGN KEY(id_turma) references Turma(id_turma),
	CONSTRAINT fk_id_uc1 FOREIGN KEY(id_uc) references UC(id_uc),
	primary key (id_turma, id_uc)
);

CREATE TABLE leciona (
	id_prof int not null,
	id_uc int not null,
	CONSTRAINT fk_id_prof FOREIGN KEY(id_prof) references Professor(id_prof),
	CONSTRAINT fk_id_uc2 FOREIGN KEY(id_uc) references UC(id_uc),
	primary key (id_prof, id_uc)
);