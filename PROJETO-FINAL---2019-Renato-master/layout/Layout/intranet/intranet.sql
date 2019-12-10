-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Dez-2019 às 04:19
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `intranet`
--
CREATE DATABASE IF NOT EXISTS `intranet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `intranet`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `mat` char(8) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` VALUES('19RM0000', 'Isabela Cabrine');
INSERT INTO `aluno` VALUES('19RM0001', 'Gabriel Azevedo');
INSERT INTO `aluno` VALUES('19RM0002', 'Mayara Borges');
INSERT INTO `aluno` VALUES('19RM0003', 'Tomas S Carvalho');
INSERT INTO `aluno` VALUES('19RM0004', 'Sandra Moraes');
INSERT INTO `aluno` VALUES('19RM0005', 'Francisco Henry');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunomat`
--

CREATE TABLE `alunomat` (
  `mat_aluno` char(8) NOT NULL,
  `turma_cod` char(8) NOT NULL,
  `ano` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunomat`
--

INSERT INTO `alunomat` VALUES('19RM0000', '19RMA001', '2019');
INSERT INTO `alunomat` VALUES('19RM0001', '19RMA001', '2019');
INSERT INTO `alunomat` VALUES('19RM0002', '19RMA001', '2019');
INSERT INTO `alunomat` VALUES('19RM0003', '19RMB001', '2019');
INSERT INTO `alunomat` VALUES('19RM0004', '19RMB001', '2019');
INSERT INTO `alunomat` VALUES('19RM0005', '19RMB001', '2019');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE `nota` (
  `mat_aluno` char(8) NOT NULL,
  `periodo` int(1) NOT NULL,
  `ano` char(4) NOT NULL,
  `materia` varchar(12) NOT NULL,
  `nota` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` VALUES('19RM0004', 1, '2019', 'matematica', 7.4);
INSERT INTO `nota` VALUES('19RM0005', 1, '2019', 'matematica', 7.4);
INSERT INTO `nota` VALUES('19RM0005', 2, '2019', 'matematica', 7.4);
INSERT INTO `nota` VALUES('19RM0005', 3, '2019', 'matematica', 7.4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `mat` char(6) NOT NULL,
  `materia` varchar(12) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profmat`
--

CREATE TABLE `profmat` (
  `mat_prof` char(6) NOT NULL,
  `turma_cod` char(8) NOT NULL,
  `ano` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `cod` char(8) NOT NULL,
  `ident` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` VALUES('19RMA001', '1A');
INSERT INTO `turma` VALUES('19RMB001', '1B');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`mat`);

--
-- Índices para tabela `alunomat`
--
ALTER TABLE `alunomat`
  ADD PRIMARY KEY (`mat_aluno`,`ano`) USING BTREE,
  ADD KEY `turma_cod` (`turma_cod`);

--
-- Índices para tabela `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`mat_aluno`,`periodo`,`materia`,`ano`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`mat`);

--
-- Índices para tabela `profmat`
--
ALTER TABLE `profmat`
  ADD PRIMARY KEY (`mat_prof`,`turma_cod`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunomat`
--
ALTER TABLE `alunomat`
  ADD CONSTRAINT `alunomat_ibfk_1` FOREIGN KEY (`turma_cod`) REFERENCES `turma` (`cod`),
  ADD CONSTRAINT `alunomat_ibfk_2` FOREIGN KEY (`mat_aluno`) REFERENCES `aluno` (`mat`);

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`mat_aluno`) REFERENCES `aluno` (`mat`);

--
-- Limitadores para a tabela `profmat`
--
ALTER TABLE `profmat`
  ADD CONSTRAINT `profmat_ibfk_1` FOREIGN KEY (`mat_prof`) REFERENCES `professor` (`mat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
