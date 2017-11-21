-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Nov-2017 às 15:50
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `nome_arquivo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `softwares_disponiveis`
--

INSERT INTO `softwares_disponiveis` (`id_software`, `nome_software`, `descricao_software`, `nome_arquivo`) VALUES
(1, 'Android Studio', 'Android Studio é um ambiente de desenvolvimento integrado para desenvolver para a plataforma Android. ', 'android-studio-bundle-135.1641136.exe');

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
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
