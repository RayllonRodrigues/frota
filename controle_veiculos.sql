-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Dez-2024 às 20:29
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle_veiculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `veiculo` varchar(100) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `motorista` varchar(100) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `data_saida` date NOT NULL,
  `hora_saida` time NOT NULL,
  `data_chegada` date DEFAULT NULL,
  `hora_chegada` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registros`
--

INSERT INTO `registros` (`id`, `veiculo`, `placa`, `motorista`, `destino`, `data_saida`, `hora_saida`, `data_chegada`, `hora_chegada`) VALUES
(1, 'FORD', '123.123', 'Rayllon', 'Palmas-TO', '2024-12-02', '12:04:00', '2024-04-22', '03:54:00'),
(2, 'Ford Focus', 'SDA-XS3', 'Rayllon', 'Palmas-TO', '2024-09-12', '12:05:00', '1994-09-24', '02:50:00'),
(3, 'Ford Focus', 'SDA-XS3', 'Rayllon', 'Palmas-TO', '2024-09-23', '12:00:00', '1994-04-30', '12:00:00'),
(4, 'Ford Focus', '123.123', 'Rayllon', 'Palmas-TO', '2024-12-02', '11:00:00', '2025-01-01', '12:00:00'),
(5, 'Ford Focus', 'SDA-XS3', 'Rayllon', 'Palmas-TO', '2024-09-13', '14:00:00', '2024-05-04', '12:00:00'),
(6, 'FORD', '123.123', 'Rayllon', 'Palmas-TO', '1994-09-23', '08:00:00', '1994-09-23', '00:00:00'),
(7, 'Ford Focus', 'SDA-XS3', 'Rayllon', 'Palmas-TO', '2029-10-23', '12:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
CREATE TABLE IF NOT EXISTS `veiculo` (
  `vei_id` int(11) NOT NULL AUTO_INCREMENT,
  `vei_nome` varchar(255) NOT NULL,
  `vei_placa` varchar(255) NOT NULL,
  `vei_status` varchar(255) NOT NULL,
  PRIMARY KEY (`vei_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
