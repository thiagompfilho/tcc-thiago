-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/11/2023 às 21:00
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `barbearia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_agendas`
--

CREATE TABLE `tb_agendas` (
  `codaage` int(11) NOT NULL,
  `horario` varchar(5) DEFAULT NULL,
  `dataag` date DEFAULT NULL,
  `statusa` varchar(1) DEFAULT 'A',
  `codprof_fk` int(11) DEFAULT NULL,
  `procedimento` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_agendas`
--

INSERT INTO `tb_agendas` (`codaage`, `horario`, `dataag`, `statusa`, `codprof_fk`, `procedimento`, `cliente`) VALUES
(1, '06:00', '2023-11-01', 'A', NULL, 1, 0),
(2, '07:00', '2023-11-01', 'A', NULL, 1, 0),
(3, '08:00', '2023-11-01', 'A', NULL, 1, 0),
(4, '09:00', '2023-11-01', 'A', NULL, 1, 0),
(5, '10:00', '2023-11-01', 'A', NULL, 1, 0),
(6, '11:00', '2023-11-01', 'A', NULL, 1, 0),
(7, '13:00', '2023-11-01', 'A', NULL, 1, 0),
(8, '14:00', '2023-11-01', 'A', NULL, 1, 0),
(9, '15:00', '2023-11-01', 'A', NULL, 1, 0),
(10, '16:00', '2023-11-01', 'A', NULL, 1, 0),
(11, '17:00', '2023-11-01', 'A', NULL, 1, 0),
(12, '06:00', '2023-11-02', 'A', NULL, 1, 0),
(13, '07:00', '2023-11-02', 'A', NULL, 1, 0),
(14, '08:00', '2023-11-02', 'A', NULL, 1, 0),
(15, '09:00', '2023-11-02', 'A', NULL, 1, 0),
(16, '10:00', '2023-11-02', 'A', NULL, 1, 0),
(17, '11:00', '2023-11-02', 'A', NULL, 1, 0),
(18, '13:00', '2023-11-02', 'A', NULL, 1, 0),
(19, '14:00', '2023-11-02', 'A', NULL, 1, 0),
(20, '15:00', '2023-11-02', 'A', NULL, 1, 0),
(21, '16:00', '2023-11-02', 'A', NULL, 1, 0),
(22, '17:00', '2023-11-02', 'A', NULL, 1, 0),
(23, '06:00', '2023-11-03', 'A', NULL, 1, 0),
(24, '07:00', '2023-11-03', 'A', NULL, 1, 0),
(25, '08:00', '2023-11-03', 'A', NULL, 1, 0),
(26, '09:00', '2023-11-03', 'A', NULL, 1, 0),
(27, '10:00', '2023-11-03', 'A', NULL, 1, 0),
(28, '11:00', '2023-11-03', 'A', NULL, 1, 0),
(29, '13:00', '2023-11-03', 'A', NULL, 1, 0),
(30, '14:00', '2023-11-03', 'A', NULL, 1, 0),
(31, '15:00', '2023-11-03', 'A', NULL, 1, 0),
(32, '16:00', '2023-11-03', 'A', NULL, 1, 0),
(33, '17:00', '2023-11-03', 'A', NULL, 1, 0),
(34, '06:00', '2023-11-01', 'A', NULL, 1, 0),
(35, '07:00', '2023-11-01', 'A', NULL, 1, 0),
(36, '08:00', '2023-11-01', 'A', NULL, 1, 0),
(37, '09:00', '2023-11-01', 'A', NULL, 1, 0),
(38, '10:00', '2023-11-01', 'A', NULL, 1, 0),
(39, '11:00', '2023-11-01', 'A', NULL, 1, 0),
(40, '13:00', '2023-11-01', 'A', NULL, 1, 0),
(41, '14:00', '2023-11-01', 'A', NULL, 1, 0),
(42, '15:00', '2023-11-01', 'A', NULL, 1, 0),
(43, '16:00', '2023-11-01', 'A', NULL, 1, 0),
(44, '17:00', '2023-11-01', 'A', NULL, 1, 0),
(45, '06:00', '2023-11-02', 'A', NULL, 1, 0),
(46, '07:00', '2023-11-02', 'A', NULL, 1, 0),
(47, '08:00', '2023-11-02', 'A', NULL, 1, 0),
(48, '09:00', '2023-11-02', 'A', NULL, 1, 0),
(49, '10:00', '2023-11-02', 'A', NULL, 1, 0),
(50, '11:00', '2023-11-02', 'A', NULL, 1, 0),
(51, '13:00', '2023-11-02', 'A', NULL, 1, 0),
(52, '14:00', '2023-11-02', 'A', NULL, 1, 0),
(53, '15:00', '2023-11-02', 'A', NULL, 1, 0),
(54, '16:00', '2023-11-02', 'A', NULL, 1, 0),
(55, '17:00', '2023-11-02', 'A', NULL, 1, 0),
(56, '06:00', '2023-11-03', 'A', NULL, 1, 0),
(57, '07:00', '2023-11-03', 'A', NULL, 1, 0),
(58, '08:00', '2023-11-03', 'A', NULL, 1, 0),
(59, '09:00', '2023-11-03', 'A', NULL, 1, 0),
(60, '10:00', '2023-11-03', 'A', NULL, 1, 0),
(61, '11:00', '2023-11-03', 'A', NULL, 1, 0),
(62, '13:00', '2023-11-03', 'A', NULL, 1, 0),
(63, '14:00', '2023-11-03', 'A', NULL, 1, 0),
(64, '15:00', '2023-11-03', 'A', NULL, 1, 0),
(65, '16:00', '2023-11-03', 'A', NULL, 1, 0),
(66, '17:00', '2023-11-03', 'A', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cidades`
--

CREATE TABLE `tb_cidades` (
  `codcid` int(11) NOT NULL,
  `nomecid` varchar(50) DEFAULT NULL,
  `estadocid` varchar(2) DEFAULT NULL CHECK (`estadocid` in ('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cidades`
--

INSERT INTO `tb_cidades` (`codcid`, `nomecid`, `estadocid`) VALUES
(2853, 'Cascavel', 'PR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `codcli` int(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT NULL CHECK (`ativo` in ('S','N')),
  `codcid_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`codcli`, `nome`, `email`, `senha`, `telefone`, `ativo`, `codcid_fk`) VALUES
(3, 'power guido', 'powerguido@escola.com', 'c4ca4238a0b923820dcc509a6f75849b', '(45) 98432-6950', 'S', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_horarios`
--

CREATE TABLE `tb_horarios` (
  `codhorario` int(11) NOT NULL,
  `entradam` time DEFAULT NULL,
  `saidam` time DEFAULT NULL,
  `entradat` time DEFAULT NULL,
  `saidat` time DEFAULT NULL,
  `hora` time NOT NULL,
  `codprof_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_horarios`
--

INSERT INTO `tb_horarios` (`codhorario`, `entradam`, `saidam`, `entradat`, `saidat`, `hora`, `codprof_fk`) VALUES
(1, '08:00:00', '12:00:00', '13:00:00', '18:00:00', '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_profissionais`
--

CREATE TABLE `tb_profissionais` (
  `codprof` int(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT 'S' CHECK (`ativo` in ('S','N')),
  `ck_cadastro` varchar(1) DEFAULT 'F' CHECK (`ck_cadastro` in ('F','A'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_profissionais`
--

INSERT INTO `tb_profissionais` (`codprof`, `nome`, `email`, `telefone`, `senha`, `ativo`, `ck_cadastro`) VALUES
(1, 'thiago mafra', 'thiago@gmail.com', '(45) 98342-6950', 'videogame12', 'S', 'A'),
(2, 'jaiminho', 'juda@gmail.com', '(45) 96784-3563', 'c4ca4238a0b923820dcc509a6f75849b', 'S', 'F'),
(3, 'raul', 'raul@gmail.com', '(47) 93983-7829', 'c81e728d9d4c2f636f067f89cc14862c', 'S', 'F'),
(4, 'petter', 'petter@gmail.com', '(45) 67678-8677', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'S', 'F'),
(5, 'lucas', 'lucasv@gmail.com', '(45) 67876-9897', 'a87ff679a2f3e71d9181a67b7542122c', 'S', 'F'),
(6, 'jordana', 'jo@gmail.com', '(45) 32123-4546', 'e4da3b7fbbce2345d7772b0674a318d5', 'S', 'F');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_profissionais_servicos`
--

CREATE TABLE `tb_profissionais_servicos` (
  `valor` float(5,2) DEFAULT NULL,
  `codprof_fk` int(11) NOT NULL,
  `codservico_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_servicos`
--

CREATE TABLE `tb_servicos` (
  `codservico` int(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT 'S' CHECK (`ativo` in ('S','N')),
  `valor` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_servicos`
--

INSERT INTO `tb_servicos` (`codservico`, `nome`, `ativo`, `valor`) VALUES
(1, 'coerte e cabelo', 'S', 20.00),
(2, 'discoloração e cabelo', 'S', 120.00),
(3, 'sombrancelha', 'S', 30.00),
(4, 'navalha zero', 'S', 10.00),
(5, 'corte de barba', 'S', 19.00),
(6, 'cocaina', 'S', 999.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_agendas`
--
ALTER TABLE `tb_agendas`
  ADD PRIMARY KEY (`codaage`),
  ADD KEY `codprof_fk` (`codprof_fk`),
  ADD KEY `codservico_fk` (`procedimento`);

--
-- Índices de tabela `tb_cidades`
--
ALTER TABLE `tb_cidades`
  ADD PRIMARY KEY (`codcid`);

--
-- Índices de tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`codcli`),
  ADD KEY `codcid_fk` (`codcid_fk`);

--
-- Índices de tabela `tb_horarios`
--
ALTER TABLE `tb_horarios`
  ADD PRIMARY KEY (`codhorario`),
  ADD KEY `codprof_fk` (`codprof_fk`);

--
-- Índices de tabela `tb_profissionais`
--
ALTER TABLE `tb_profissionais`
  ADD PRIMARY KEY (`codprof`);

--
-- Índices de tabela `tb_profissionais_servicos`
--
ALTER TABLE `tb_profissionais_servicos`
  ADD PRIMARY KEY (`codprof_fk`,`codservico_fk`),
  ADD KEY `codservico_fk` (`codservico_fk`);

--
-- Índices de tabela `tb_servicos`
--
ALTER TABLE `tb_servicos`
  ADD PRIMARY KEY (`codservico`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_agendas`
--
ALTER TABLE `tb_agendas`
  MODIFY `codaage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `tb_cidades`
--
ALTER TABLE `tb_cidades`
  MODIFY `codcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2854;

--
-- AUTO_INCREMENT de tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `codcli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_horarios`
--
ALTER TABLE `tb_horarios`
  MODIFY `codhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_profissionais`
--
ALTER TABLE `tb_profissionais`
  MODIFY `codprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_servicos`
--
ALTER TABLE `tb_servicos`
  MODIFY `codservico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_agendas`
--
ALTER TABLE `tb_agendas`
  ADD CONSTRAINT `tb_agendas_ibfk_1` FOREIGN KEY (`codprof_fk`) REFERENCES `tb_profissionais` (`codprof`),
  ADD CONSTRAINT `tb_agendas_ibfk_2` FOREIGN KEY (`procedimento`) REFERENCES `tb_servicos` (`codservico`);

--
-- Restrições para tabelas `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD CONSTRAINT `tb_clientes_ibfk_1` FOREIGN KEY (`codcid_fk`) REFERENCES `tb_cidades` (`codcid`);

--
-- Restrições para tabelas `tb_horarios`
--
ALTER TABLE `tb_horarios`
  ADD CONSTRAINT `tb_horarios_ibfk_1` FOREIGN KEY (`codprof_fk`) REFERENCES `tb_profissionais` (`codprof`);

--
-- Restrições para tabelas `tb_profissionais_servicos`
--
ALTER TABLE `tb_profissionais_servicos`
  ADD CONSTRAINT `tb_profissionais_servicos_ibfk_1` FOREIGN KEY (`codprof_fk`) REFERENCES `tb_profissionais` (`codprof`),
  ADD CONSTRAINT `tb_profissionais_servicos_ibfk_2` FOREIGN KEY (`codservico_fk`) REFERENCES `tb_servicos` (`codservico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
