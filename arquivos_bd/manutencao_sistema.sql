-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2017 às 16:46
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
  `nome_arquivo` varchar(120) NOT NULL,
  `nome_imagem` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `softwares_disponiveis`
--

INSERT INTO `softwares_disponiveis` (`id_software`, `nome_software`, `descricao_software`, `nome_arquivo`, `nome_imagem`) VALUES
(1, 'Android Studio', 'Android Studio é um ambiente de desenvolvimento integrado para desenvolver para a plataforma Android. ', 'android-studio-bundle-135.1641136.exe', 'android-studio.jpg'),
(5, 'Astah', 'IDE para Modelagem de Dados (UML) criada com Java e de uso fácil e intuitivo.', 'astah-community-6_8_0-d254c5-jre-setup.exe', 'astah.png'),
(6, 'Case Studio', 'Ferramenta para modelagem de dados.', 'CS2_setup.exe', 'case_studio.gif'),
(9, 'Cisco Packet Tracer', 'O Packet Tracer é um programa educacional gratuito que permite simular uma rede de computadores, através de equipamentos e configurações presente em situações reais.', 'packettracer533.exe', 'packet_tracer.jpg'),
(10, 'Dev C++', 'Linguagem de programação de alto nível com facilidades para o uso em baixo nível, multiparadigma e de uso geral.', 'Dev-Cpp 64 bits.exe', 'dev_c++.jpg'),
(11, 'Dia', 'Dia é uma aplicação gratuita/freeware para desenho de diagramas.', 'dia-setup-0.97.2-2.exe', 'dia.jpg');

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
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
