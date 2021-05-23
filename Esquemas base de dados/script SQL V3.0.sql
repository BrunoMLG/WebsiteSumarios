CREATE DATABASE websiteSumarios;

USE websiteSumarios;

CREATE TABLE Turma (
	id_turma int NOT NULL AUTO_INCREMENT primary key,
	curso varchar(100),
	ano tinyint,
	semestre tinyint
);

CREATE TABLE email_Aluno( 
	email varchar(30) Unique key
	
);

CREATE TABLE email_Prof(
	email varchar(30) Unique key
	
);

CREATE TABLE Professor (
	id int NOT NULL AUTO_INCREMENT primary key,
	nome varchar(100),
	morada varchar(70),
	telemovel varchar(13),
	email varchar(30) not null,
	password varchar(32),
	CONSTRAINT fk_email FOREIGN KEY (email) references email_Prof(email),
	tipo varchar(10),
	imagem longblob
);

CREATE TABLE Sumario (
 	id int NOT NULL AUTO_INCREMENT primary key,
	Sumario varchar(500)
);

CREATE TABLE Aluno (
	id int not null AUTO_INCREMENT primary key,
	nome varchar(100) not null,
	morada varchar(70),
	telemovel varchar(13),
	email varchar(30) not null UNIQUE KEY,
	password varchar(32) not null,
	id_turma int,  
	CONSTRAINT fk_id_turma FOREIGN KEY (id_turma) references Turma(id_turma),
	CONSTRAINT fk_email1 FOREIGN KEY (email) references email_Aluno(email),
	tipo varchar(10),
	imagem longblob

);


CREATE TABLE UC (
	id_uc int NOT NULL AUTO_INCREMENT primary key,
	nome varchar(60) not null,
	horas integer
);



CREATE TABLE Aula (
	id int NOT NULL AUTO_INCREMENT primary key,
	data2 VARCHAR(20) not null,
	hora_ini VARCHAR(20) not null,
	hora_fim VARCHAR(20) not null,
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
	CONSTRAINT fk_id_aluno1 FOREIGN KEY(id_aluno) references Aluno(id),
	CONSTRAINT fk_id_aula FOREIGN KEY(id_aula) references Aula(id),
	presencas varchar(10),
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
	CONSTRAINT fk_id_prof1 FOREIGN KEY(id_prof) references Professor(id),
	CONSTRAINT fk_id_uc2 FOREIGN KEY(id_uc) references UC(id_uc),
	primary key (id_prof, id_uc)
);


CREATE TABLE Admin(
	id_Admin int NOT NULL AUTO_INCREMENT primary key,
	Nome varchar(100) unique key,
	password varchar(32)
);

insert into email_prof values('rb@gmail.com')
insert into email_aluno values('bruno@gmail.com')

insert into Admin values(null,'admin','21232f297a57a5a743894a0e4a801fc3')


insert into professor values(null,'Ricardo Batista',null,null,'rb@gmail.com','123','Professor')

insert into aluno values(null,'bruno',null,null,'bruno@gmail.com','123',null,'Aluno')
