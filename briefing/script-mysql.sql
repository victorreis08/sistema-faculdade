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

create table tarefa(
codigo_tarefa	int	not null	AUTO_INCREMENT	PRIMARY KEY,
descricao_tarefa	Varchar(250)	not null,
nota_tarefa	decimal	not null,	
dataEntrega_tarefa	date	not null,		
codigo_disciplina	int	not null,

constraint fk_tarefa foreign key (codigo_disciplina) REFERENCES disciplina(codigo_disciplina)

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

SELECT * FROM tarefa;
SELECT * FROM tarefa where status_tarefa="P";

SELECT * FROM tarefa;

ALTER TABLE tarefa add status_tarefa char(1) not null after nota_tarefa;

ALTER TABLE tarefa DROP COLUMN nota_tarefa;

ALTER TABLE tarefa DROP COLUMN nota_prova, DROP COLUMN notaAv2_prova; 

ALTER TABLE prova add nota_prova float null after descricao_prova;

ALTER TABLE tarefa ADD nome_tarefa varchar(50) not null after codigo_tarefa;

ALTER TABLE prova MODIFY COLUMN descricao_prova varchar(250) NOT NULL after dataEntrega_prova;

SELECT tarefa.*, disciplina.nome_disciplina FROM tarefa INNER JOIN disciplina ON tarefa.codigo_disciplina = disciplina.codigo_disciplina where status_tarefa='C' ORDER BY nome_disciplina ASC ;



