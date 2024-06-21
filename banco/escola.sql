-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2023 às 21:51
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adc_mat`
--

CREATE TABLE `adc_mat` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adc_mat`
--

INSERT INTO `adc_mat` (`codigo`, `nome`) VALUES
(1, 'Portugues'),
(2, 'Matematica'),
(10, 'matematica'),
(9, 'Matematica'),
(5, 'Matematica'),
(8, 'matematica'),
(7, 'matematica'),
(11, 'matematica'),
(12, 'matematica'),
(13, 'matematica'),
(14, 'Matematica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`codigo`, `nome`, `cpf`, `rg`) VALUES
(1, 'Jose', '', ''),
(2, 'João Pedro Cisilo', '1231', '121231237'),
(3, 'João Pedro Cisilo', '12312312312', '121231237'),
(6, 'Renan', '123345', '121231237');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `cu_cod` int(11) NOT NULL,
  `cu_nome` varchar(40) DEFAULT NULL,
  `cu_turno` varchar(15) DEFAULT NULL,
  `cu_mod` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`cu_cod`, `cu_nome`, `cu_turno`, `cu_mod`) VALUES
(21, 'Agroindustria', 'Noturno', 3),
(20, 'Floresta', 'Vespertino', 3),
(19, 'Desenvolvimento de sistemas', 'Noturno', 3),
(22, 'Informatica', 'Matutino', 3),
(23, 'Marketing', 'Noturno', 3),
(24, 'AdministraÃ§Ã£o', 'Matutino', 4),
(25, 'Pedagogia', 'Matutino', 6),
(26, 'Estatistica', 'Noturno', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cu_nome` varchar(60) DEFAULT NULL,
  `prof_nome` varchar(60) DEFAULT NULL,
  `cu_mod` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`codigo`, `nome`, `cu_nome`, `prof_nome`, `cu_mod`) VALUES
(15, 'Pensamentos computacionais', 'Informatica', 'Renan Gustavo Santos Silva', 2),
(14, 'ProgramaÃ§Ã£o web', 'Desenvolvimento de sistemas', 'Julia Sobrinho Santos', 1),
(12, 'Portugues', 'AdministraÃ§Ã£o', 'Antoino Pereira', 2),
(13, 'Matematica', 'AdministraÃ§Ã£o', 'Vitor Hugo Ferreira', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `data` date NOT NULL,
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`data`, `codigo`, `nome`, `cpf`, `rg`, `tel`, `email`) VALUES
('1996-07-17', 20, 'Rainy Geovana Santos Silva', '38493000983', '376645783', '18998736456', 'rainygeovana0@gmail.com'),
('1998-06-11', 21, 'Vitor Hugo Ferreira', '23466534544', '236789875', '18998263844', 'vitorhugo@hotmail.com'),
('2004-03-04', 18, 'Julia Sobrinho Santos', '34598244509', '30987757', '18997652893', 'julia@gmail.com'),
('1994-04-09', 19, 'Antoino Pereira', '78115507849', '764954459', '18996537844', 'antonio_pereira@gmail.com'),
('2003-04-27', 17, 'Renan Gustavo Santos Silva', '50263736822', '546940420', '18996544100', 'renan27042004@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rep`
--

CREATE TABLE `rep` (
  `rep_cod` int(11) NOT NULL,
  `rep_nome` varchar(50) DEFAULT NULL,
  `rep_dta_rep` date DEFAULT NULL,
  `rep_qtde` int(2) DEFAULT NULL,
  `rep_dta_falt` date DEFAULT NULL,
  `rep_mat` varchar(50) DEFAULT NULL,
  `rep_remu` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rep`
--

INSERT INTO `rep` (`rep_cod`, `rep_nome`, `rep_dta_rep`, `rep_qtde`, `rep_dta_falt`, `rep_mat`, `rep_remu`) VALUES
(7, 'Julia Sobrinho', '2023-06-21', 2, '2023-06-05', 'ProgramaÃ§Ã£o web', 'nao'),
(6, 'Renan Gustavo Santos Silva', '2023-06-22', 1, '2023-06-15', 'Pensamentos computacionais', 'sim'),
(8, 'Rainy Geovana', '2023-06-22', 2, '2023-05-24', 'Matematica', 'nao'),
(9, 'Felipe Soares Santos', '2023-06-21', 2, '2023-05-19', 'Portugues', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subst`
--

CREATE TABLE `subst` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `materia` varchar(50) DEFAULT NULL,
  `qtde` int(2) DEFAULT NULL,
  `dta` date DEFAULT NULL,
  `remunerada` varchar(3) DEFAULT NULL,
  `prof_aus` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subst`
--

INSERT INTO `subst` (`codigo`, `nome`, `materia`, `qtde`, `dta`, `remunerada`, `prof_aus`) VALUES
(12, 'Geandra da Silva Santos', 'Portugues', 2, '2023-06-01', 'sim', 'Antoino Pereira'),
(13, 'Felipe Soares Santos', 'Matematica', 1, '2023-04-14', 'sim', 'Vitor Hugo Ferreira'),
(11, 'Joao Victor Silva', 'Pensamentos computacionais', 2, '2023-06-14', 'sim', 'Renan Gustavo Santos Silva'),
(10, 'JosÃ© Aparecido', 'ProgramaÃ§Ã£o web', 1, '2023-06-21', 'sim', 'Julia Sobrinho Santos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `created`, `modified`) VALUES
(20, 'Renan gustavo', 'renan27042004@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-06-20', '0000-00-00'),
(12, 'Julia Sobrinho santos', 'julia@etec.com', '1db68d9861e914b9a2dc65ca868c6d1f', '2023-06-15', '2023-06-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adc_mat`
--
ALTER TABLE `adc_mat`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cu_cod`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `rep`
--
ALTER TABLE `rep`
  ADD PRIMARY KEY (`rep_cod`);

--
-- Indexes for table `subst`
--
ALTER TABLE `subst`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adc_mat`
--
ALTER TABLE `adc_mat`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cu_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `rep`
--
ALTER TABLE `rep`
  MODIFY `rep_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subst`
--
ALTER TABLE `subst`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
