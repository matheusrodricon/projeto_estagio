-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Nov-2017 às 21:40
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manutencao_sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `softwares_disponiveis`
--

CREATE TABLE `softwares_disponiveis` (
  `id_software` int(11) NOT NULL,
  `nome_software` varchar(120) NOT NULL,
  `descricao_software` text NOT NULL,
  `local_software` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `softwares_disponiveis`
--

INSERT INTO `softwares_disponiveis` (`id_software`, `nome_software`, `descricao_software`, `local_software`) VALUES
(1, 'Android Studio', 'Android Studio é um ambiente de desenvolvimento integrado para desenvolver para a plataforma Android. ', 'local');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `softwares_disponiveis`
--
ALTER TABLE `softwares_disponiveis`
  ADD PRIMARY KEY (`id_software`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `softwares_disponiveis`
--
ALTER TABLE `softwares_disponiveis`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
