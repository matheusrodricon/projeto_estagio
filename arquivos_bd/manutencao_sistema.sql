-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2017 às 15:44
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
-- Estrutura da tabela `softwares_cadastrados`
--

CREATE TABLE `softwares_cadastrados` (
  `id_software` int(11) NOT NULL,
  `nome_software` varchar(120) NOT NULL,
  `descricao_software` text NOT NULL,
  `nome_arquivo` varchar(120) NOT NULL,
  `nome_imagem` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `softwares_cadastrados`
--

INSERT INTO `softwares_cadastrados` (`id_software`, `nome_software`, `descricao_software`, `nome_arquivo`, `nome_imagem`) VALUES
(1, 'Android Studio', 'Android Studio é um ambiente de desenvolvimento integrado para desenvolver para a plataforma Android. ', 'android-studio-bundle-135.1641136.exe', 'android-studio.jpg'),
(5, 'Astah', 'IDE para Modelagem de Dados (UML) criada com Java e de uso fácil e intuitivo.', 'astah-community-6_8_0-d254c5-jre-setup.exe', 'astah.png'),
(6, 'Case Studio', 'Ferramenta para modelagem de dados.', 'CS2_setup.exe', 'case_studio.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `softwares_deletados`
--

CREATE TABLE `softwares_deletados` (
  `id_software` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `softwares_cadastrados`
--
ALTER TABLE `softwares_cadastrados`
  ADD PRIMARY KEY (`id_software`);

--
-- Indexes for table `softwares_deletados`
--
ALTER TABLE `softwares_deletados`
  ADD KEY `id_software` (`id_software`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `softwares_cadastrados`
--
ALTER TABLE `softwares_cadastrados`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `softwares_deletados`
--
ALTER TABLE `softwares_deletados`
  ADD CONSTRAINT `softwares_deletados_ibfk_1` FOREIGN KEY (`id_software`) REFERENCES `softwares_cadastrados` (`id_software`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
