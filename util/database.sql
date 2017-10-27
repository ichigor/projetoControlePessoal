-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2017 às 01:53
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetointegrador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `idHistorico` int(11) NOT NULL,
  `nomeTarefa` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `frequencia` varchar(50) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `dataInicial` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `idTarefa` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `idTarefa` int(11) NOT NULL,
  `nomeTarefa` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `frequencia` varchar(50) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `dataInicial` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`idTarefa`, `nomeTarefa`, `status`, `frequencia`, `descricao`, `dataInicial`, `dataFinal`, `idUsuario`) VALUES
  (3, 'tarefa III', 'Incompleto', 'Diariamente', 'sadasdasd', '2045-06-04', '2045-06-04', 11),
  (4, 'teste 2 ', 'Em avaliacao', 'Diariamente', 'asdasd', '2045-06-04', '2056-04-06', 11),
  (5, 'as', 'Completo', 'Diariamente', 'dasdas', '2012-03-12', '2045-06-04', 11),
  (6, 'Teste 3', 'Em avaliacao', 'Diariamente', 'teste 3', '2018-11-05', '2019-11-05', 11),
  (7, 'Verificar Email', 'Incompleto', 'Diariamente', 'Verificiar no email imobiliaria@gmail.com, novos emails e responder quando necessario', '2017-10-23', '2017-10-23', 11),
  (8, 'Teste', 'Incompleto', 'Diariamente', 'testestesad', '2015-04-06', '2078-09-07', 11),
  (9, 'teste', 'Em avaliacao', 'Diariamente', '65456456', '2046-04-04', '2046-05-04', 11),
  (10, 'qewqwe', 'Cancelada', 'Diariamente', '56465456', '2045-06-04', '2054-06-04', 11),
  (11, 'ada', 'Cancelada', 'Diariamente', '97987979', '2046-04-06', '2017-10-25', 11),
  (12, 'asds', 'Em avaliacao', 'Diariamente', '98798', '2046-05-04', '2078-09-07', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `rg` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `usuario`, `senha`, `celular`, `ativo`, `email`, `cpf`, `telefone`, `rg`, `tipo`, `endereco`) VALUES
  (11, 'aa', 'aa', 'aa', 'aa', 0, 'aa', 'aa', 'aa', 'aa', '0', 'aa'),
  (12, 'aa', 'aa', 'aa', 'aa', 0, 'aa', 'aa', 'aa', 'aa', '0', 'aa'),
  (13, 'çççççç', 'teste', '', 'dsad', 0, 'dsad@asd', 'asda', 'dasd', 'dsad', '0', 'dad'),
  (17, 'aaaa5', 'tste', '1341', '7987', 1, '797@adsa', '0225457813', '(797) ___-____', '8977', 'Gerente', 'asd79879'),
  (18, 'bbbbb', 'bbbb', '555555', '55555', 1, '', '5555555', '5555', '5555555', '0', '55555'),
  (24, 'Usuario Teste', 'Teste', '123456789', '(45) 61378-9414', 1, 'teste@gmail', '454.654.654-46', '(23) 1231-3213', '123456', 'Gerente', 'Av Teste');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`idHistorico`),
  ADD KEY `idTarefa` (`idTarefa`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`idTarefa`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `idHistorico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `idTarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`idTarefa`) REFERENCES `tarefa` (`idTarefa`),
  ADD CONSTRAINT `historico_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `tarefa_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
