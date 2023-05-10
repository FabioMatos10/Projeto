
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `ID_Acesso` int(10) NOT NULL,
  `ID_Ginasio` int(10) NOT NULL,
  `ID_Utilizadores` int(10) NOT NULL,
  `Data_entrada` date NOT NULL,
  `Data_saida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `ID_Atividade` int(11) NOT NULL,
  `ID_Ginasio` int(10) NOT NULL,
  `NomeAtividade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(0, 0, '0000-00-00', '');

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
(0, 'ujujl', '');

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
(8, 'esgaca', 'esgaca@gmail.com', '698d51a19d8a121ce581499d7b701668', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`ID_Acesso`,`ID_Ginasio`,`ID_Utilizadores`),
  ADD KEY `ID_Ginasio` (`ID_Ginasio`),
  ADD KEY `ID_Utilizadores` (`ID_Utilizadores`);

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
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `ID_Utilizadores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `acessos`
--
ALTER TABLE `acessos`
  ADD CONSTRAINT `acessos_ibfk_3` FOREIGN KEY (`ID_Ginasio`) REFERENCES `ginasio` (`ID_Ginaio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acessos_ibfk_4` FOREIGN KEY (`ID_Utilizadores`) REFERENCES `utilizador` (`ID_Utilizadores`) ON DELETE CASCADE ON UPDATE CASCADE;

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
