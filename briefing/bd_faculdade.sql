-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2021 às 06:18
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_faculdade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `codigo_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(50) NOT NULL,
  `descricao_disciplina` varchar(250) NOT NULL,
  `codigo_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`codigo_disciplina`, `nome_disciplina`, `descricao_disciplina`, `codigo_semestre`) VALUES
(28, 'Banco de dados', 'Sem descrição', 241),
(29, 'Estatística', 'Sem descrição', 241),
(30, 'Fundamentos de Administração', 'Disciplina EAD', 241),
(31, 'Lógica de Programação Algorítmica', 'Sem descrição', 241),
(32, 'Organização e Arquitetura de Computadores', 'Sem descrição', 241),
(33, 'Programação', 'Sem descrição', 241),
(34, 'Estrutura de dados', 'Sem descrição', 242),
(35, 'Metodologia da Pesquisa', 'Disciplina EAD', 242),
(36, 'Programação Orientada a Objetos', 'Sem descrição', 242),
(37, 'Projeto de banco de dados', 'Sem descrição', 242),
(38, 'Sistemas operacionais', 'Sem descrição', 242),
(39, 'Engenharia de Software', 'Sem descrição', 243),
(40, 'Ética e cidadania', 'Sem descrição', 243),
(41, 'Linguagens formais e autômatos', 'Sem descrição', 243),
(42, 'Programação avançada', 'Sem descrição', 243),
(43, 'Redes de computadores', 'Sem descrição', 243),
(44, 'Tópicos integradores 1', 'Sem descrição', 243),
(45, 'Análise e modelagem de sistemas', 'Sem descrição', 245),
(46, 'Cálculo', 'Sem descrição', 245),
(47, 'Empreendedorismo', 'Disciplina EAD', 245),
(48, 'Geometria analítica e álgebra linear', 'Sem descrição', 245),
(49, 'Metodologia de desenvolvimento de sistemas', 'Sem descrição', 245),
(50, 'Teoria dos grafos', 'Sem descrição', 245),
(51, 'Usabilidade e interação humano computador', 'Sem descrição', 245),
(52, 'Computação Gráfica', 'Sem descrição', 246),
(53, 'Desenvolvimento de aplicações para internet', 'Sem descrição', 246),
(54, 'Projeto de redes de computadores', 'Sem descrição', 246),
(55, 'Responsabilidade socioambiental', 'Disciplina EAD', 246),
(56, 'Sistemas lógicos e digitais', 'Sem descrição', 246),
(57, 'Tópicos integradores 2', 'Sem descrição', 246),
(58, 'Compiladores', 'Sem descrição', 247),
(59, 'Desenvolvimento de aplicações para dispositivos mó', 'Sem descrição', 247),
(60, 'Gerência de projetos', 'Sem descrição', 247),
(61, 'Inteligência artificial', 'Sem descrição', 247),
(62, 'Projeto Integrador', 'Sem descrição', 247),
(63, 'Sistemas multimídia', 'Sem descrição', 247),
(64, 'Paradigmas de linguagens de programação', 'Sem descrição', 248),
(65, 'Prática Profissional', 'Sem descrição', 248),
(66, 'Qualidade e teste de software', 'Sem descrição', 248),
(67, 'Segurança da informação', 'Disciplina EAD', 248),
(68, 'Sistemas distribuídos', 'Sem descrição', 248),
(69, 'Sistemas embarcados', 'Sem descrição', 248);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova`
--

CREATE TABLE `prova` (
  `codigo_prova` int(11) NOT NULL,
  `descricao_prova` varchar(250) NOT NULL,
  `notaAv1_prova` decimal(10,0) NOT NULL,
  `notaAv2_prova` decimal(10,0) NOT NULL,
  `dataEntrega_prova` date NOT NULL,
  `codigo_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `semestre`
--

CREATE TABLE `semestre` (
  `codigo_semestre` int(11) NOT NULL,
  `nome_semestre` varchar(50) NOT NULL,
  `dataInicio_semestre` date DEFAULT NULL,
  `dataTermino_semestre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `semestre`
--

INSERT INTO `semestre` (`codigo_semestre`, `nome_semestre`, `dataInicio_semestre`, `dataTermino_semestre`) VALUES
(241, '1 Semestre', '2018-08-10', '2018-11-30'),
(242, '2 Semestre', '2019-02-10', '2019-06-15'),
(243, '3 Semestre', '2019-08-10', '2019-11-18'),
(245, '4 Semestre', '2020-02-10', '2020-06-15'),
(246, '5 Semestre', '2020-08-10', '2020-11-30'),
(247, '6 Semestre', '2021-02-10', '2021-06-15'),
(248, '7 Semestre', '2021-08-10', '2021-11-30'),
(249, '8 Semestre', '2022-02-10', '2022-06-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho`
--

CREATE TABLE `trabalho` (
  `codigo_trabalho` int(11) NOT NULL,
  `descricao_trabalho` varchar(250) NOT NULL,
  `nota_trabalho` decimal(10,0) NOT NULL,
  `dataEntrega_prova` date NOT NULL,
  `codigo_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`codigo_disciplina`),
  ADD KEY `fk_semestre` (`codigo_semestre`);

--
-- Índices para tabela `prova`
--
ALTER TABLE `prova`
  ADD PRIMARY KEY (`codigo_prova`),
  ADD KEY `fk_prova` (`codigo_disciplina`);

--
-- Índices para tabela `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`codigo_semestre`);

--
-- Índices para tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD PRIMARY KEY (`codigo_trabalho`),
  ADD KEY `fk_trabalho` (`codigo_disciplina`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `codigo_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `prova`
--
ALTER TABLE `prova`
  MODIFY `codigo_prova` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `semestre`
--
ALTER TABLE `semestre`
  MODIFY `codigo_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT de tabela `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `codigo_trabalho` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_semestre` FOREIGN KEY (`codigo_semestre`) REFERENCES `semestre` (`codigo_semestre`);

--
-- Limitadores para a tabela `prova`
--
ALTER TABLE `prova`
  ADD CONSTRAINT `fk_prova` FOREIGN KEY (`codigo_disciplina`) REFERENCES `disciplina` (`codigo_disciplina`);

--
-- Limitadores para a tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD CONSTRAINT `fk_trabalho` FOREIGN KEY (`codigo_disciplina`) REFERENCES `disciplina` (`codigo_disciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
