-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Ago-2025 às 10:37
-- Versão do servidor: 9.1.0
-- versão do PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trumbowyg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigos`
--

DROP TABLE IF EXISTS `artigos`;
CREATE TABLE IF NOT EXISTS `artigos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `artigos`
--

INSERT INTO `artigos` (`id`, `titulo`, `conteudo`) VALUES
(9, 'Teste de registro 02', '<p style=\"text-align: left;\"><img src=\"http://localhost/trumbowyg/imagens/1fc7b044ac8f5f2a.jpg\" style=\"width: 100%; max-width: 214px; height: auto; max-height: 214px;\" alt=\"Foto de Nubelson Fernandes na Unsplash\"></p><p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum ac purus at iaculis. Duis ac mi rhoncus, iaculis lorem ac, malesuada eros. Sed id purus a lorem rhoncus mattis a at libero. Suspendisse maximus arcu a urna consequat, id faucibus dui feugiat. Vivamus ultricies orci lacus, nec iaculis diam volutpat sit amet. Quisque felis urna, hendrerit eget metus quis, euismod efficitur libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi nisl, pretium at fermentum eu, malesuada ut magna. Donec at est eros.</p>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
