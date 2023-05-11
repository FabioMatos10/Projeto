-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Maio-2023 às 09:08
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `ID_Acesso` int(10) NOT NULL,
  `ID_Ginasio` int(10) NOT NULL,
  `ID_Utilizadores` int(10) NOT NULL,
  `Hora_entrada` time NOT NULL,
  `Hora_saida` time NOT NULL,
  `Dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`ID_Acesso`, `ID_Ginasio`, `ID_Utilizadores`, `Hora_entrada`, `Hora_saida`, `Dia`) VALUES
(9, 1, 7, '10:00:00', '22:00:00', '2023-10-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `ID_Atividade` int(11) NOT NULL,
  `ID_Ginasio` int(10) NOT NULL,
  `NomeAtividade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`ID_Atividade`, `ID_Ginasio`, `NomeAtividade`) VALUES
(1, 1, 'musculação'),
(2, 3, 'Pilates'),
(3, 1, 'zumba');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `ID_Aula` int(11) NOT NULL,
  `ID_Ginasio` int(10) NOT NULL,
  `DataAula` date NOT NULL,
  `NomeAula` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`ID_Aula`, `ID_Ginasio`, `DataAula`, `NomeAula`) VALUES
(2, 1, '2023-10-03', 'musculação'),
(3, 1, '2023-10-03', 'Pilates');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ginasio`
--

CREATE TABLE `ginasio` (
  `ID_Ginaio` int(10) NOT NULL,
  `NomeGinasio` varchar(255) NOT NULL,
  `Localidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ginasio`
--

INSERT INTO `ginasio` (`ID_Ginaio`, `NomeGinasio`, `Localidade`) VALUES
(1, 'GYMENERGY', 'estarreja'),
(2, 'GYMENERGY', 'Avanca'),
(3, 'GYMENERGY', 'Ovar'),
(4, 'GYMENERGY', 'Algarve');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `ID_Utilizadores` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permissao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`ID_Utilizadores`, `nome`, `email`, `password`, `permissao`) VALUES
(7, 'fabio', 'fabio@gmail.com', 'fabio123', 'admin'),
(14, 'aaa', 'aaa@aaa.com', 'aaa', 'user'),
(15, 'Ricardo', 'ricardo@gmail.com', 'asasasas', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`ID_Acesso`,`ID_Ginasio`,`ID_Utilizadores`),
  ADD KEY `ID_Utilizadores` (`ID_Utilizadores`),
  ADD KEY `ID_Ginasio` (`ID_Ginasio`);

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`ID_Atividade`,`ID_Ginasio`),
  ADD KEY `ID_Ginasio` (`ID_Ginasio`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`ID_Aula`,`ID_Ginasio`),
  ADD KEY `ID_Ginasio` (`ID_Ginasio`);

--
-- Índices para tabela `ginasio`
--
ALTER TABLE `ginasio`
  ADD PRIMARY KEY (`ID_Ginaio`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`ID_Utilizadores`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `ID_Acesso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `ID_Atividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `ID_Aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ginasio`
--
ALTER TABLE `ginasio`
  MODIFY `ID_Ginaio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `ID_Utilizadores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `acessos`
--
ALTER TABLE `acessos`
  ADD CONSTRAINT `acessos_ibfk_4` FOREIGN KEY (`ID_Utilizadores`) REFERENCES `utilizador` (`ID_Utilizadores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acessos_ibfk_5` FOREIGN KEY (`ID_Ginasio`) REFERENCES `ginasio` (`ID_Ginaio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `atividades_ibfk_1` FOREIGN KEY (`ID_Ginasio`) REFERENCES `ginasio` (`ID_Ginaio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `aulas_ibfk_1` FOREIGN KEY (`ID_Ginasio`) REFERENCES `ginasio` (`ID_Ginaio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
