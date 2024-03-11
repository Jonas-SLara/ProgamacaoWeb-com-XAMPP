-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/12/2023 às 20:26
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pmaquina`
--
CREATE DATABASE IF NOT EXISTS `pmaquina` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pmaquina`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dono`
--

CREATE TABLE `dono` (
  `idD` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `dono`
--

INSERT INTO `dono` (`idD`, `nome`, `senha`, `cpf`) VALUES
(1, 'jonas', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', ''),
(2, 'user2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', ''),
(3, 'user3', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `maquina`
--

CREATE TABLE `maquina` (
  `idM` int(4) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `idD` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `maquina`
--

INSERT INTO `maquina` (`idM`, `descricao`, `marca`, `idD`) VALUES
(1, 'notbook', 'microsoft', 1),
(2, 'telefone', 'Apple', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `dono`
--
ALTER TABLE `dono`
  ADD PRIMARY KEY (`idD`);

--
-- Índices de tabela `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`idM`),
  ADD KEY `idD` (`idD`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dono`
--
ALTER TABLE `dono`
  MODIFY `idD` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `maquina`
--
ALTER TABLE `maquina`
  MODIFY `idM` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `maquina`
--
ALTER TABLE `maquina`
  ADD CONSTRAINT `idD` FOREIGN KEY (`idD`) REFERENCES `dono` (`idD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
