create database bd_faculdade;

use bd_faculdade;

create table semestre(
codigo_semestre	int	not null primary key AUTO_INCREMENT,
nome_semestre	Varchar(50)	not null,
dataInicio_semestre	date	not null,
dataTermino_semestre	date	not null		
);

create table disciplina(
codigo_disciplina	int	not null	AUTO_INCREMENT PRIMARY KEY,
nome_disciplina	Varchar(50)	not null,
descricao_disciplina	Varchar(250)	not null,
codigo_semestre	int	not null,

CONSTRAINT fk_semestre FOREIGN KEY ( codigo_semestre ) REFERENCES semestre ( codigo_semestre )

);

create table prova(
codigo_prova	int	not null	AUTO_INCREMENT	PRIMARY KEY,
descricao_prova	Varchar(250)	not null,
notaAv1_prova	decimal	not null,
notaAv2_prova	decimal	not null,		
dataEntrega_prova	date	not null,		
codigo_disciplina	int	not null,

constraint fk_prova foreign key (codigo_disciplina) REFERENCES disciplina(codigo_disciplina)

);

create table trabalho(
codigo_trabalho	int	not null	AUTO_INCREMENT	PRIMARY KEY,
descricao_trabalho	Varchar(250)	not null,
nota_trabalho	decimal	not null,
dataEntrega_prova	date	not null,
codigo_disciplina	int	not null,

CONSTRAINT fk_trabalho FOREIGN KEY(codigo_disciplina) REFERENCES disciplina(codigo_disciplina)

);


UPDATE semestre SET nome_semestre = "7 semestre", dataInicio_semestre = "2021-08-10",dataTermino_semestre = "2021-11-30" WHERE codigo_semestre = 15;


select * from semestre;

DELETE from semestre where codigo_semestre = 241;

alter table semestre drop COLUMN dataInicio_semestre, drop COLUMN dataTermino_semestre;

alter table semestre add column dataInicio_semestre date, add column dataTermino_semestre date;

delete from semestre where codigo_semestre in (4,6,2,5,3);


select * from disciplina;

SELECT * FROM disciplina
INNER JOIN semestre
ON disciplina.codigo_semestre = semestre.codigo_semestre; 

SELECT disciplina.*, semestre.nome_semestre FROM disciplina INNER JOIN semestre ON disciplina.codigo_semestre = semestre.codigo_semestre;

SELECT * FROM prova;

SELECT * FROM trabalho;

ALTER TABLE trabalho add nome_trabalho varchar(50) not null after codigo_trabalho;

ALTER TABLE prova DROP COLUMN nota_prova, DROP COLUMN notaAv2_prova; 

ALTER TABLE prova add nota_prova float null after descricao_prova;

ALTER TABLE prova ADD nome_prova varchar(50) not null after codigo_prova;

ALTER TABLE prova MODIFY COLUMN descricao_prova varchar(250) NOT NULL after dataEntrega_prova;


