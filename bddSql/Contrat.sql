-- Adminer 4.5.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `Contrat`;
CREATE DATABASE `Contrat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `Contrat`;

DROP TABLE IF EXISTS `contracts`;
CREATE TABLE `contracts` (
  `numero` int(11) NOT NULL,
  `idDemandeur` int(11) NOT NULL,
  `title` varchar(66) NOT NULL,
  `libelle` text NOT NULL,
  `prix` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idTypeContrat` int(11) DEFAULT NULL,
  PRIMARY KEY (`numero`,`idDemandeur`),
  KEY `idDemandeur` (`idDemandeur`),
  KEY `idTypeContrat` (`idTypeContrat`),
  CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`idDemandeur`) REFERENCES `users` (`id`),
  CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`idTypeContrat`) REFERENCES `contract_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contracts` (`numero`, `idDemandeur`, `title`, `libelle`, `prix`, `created_at`, `updated_at`, `dateDebut`, `dateFin`, `idTypeContrat`) VALUES
(1, 3,  'ddqs', 'qdqsd',  0,  '2018-03-23 15:46:01',  '2018-03-23 15:46:01',  '2018-03-23', '2019-03-26', 1);

DROP TABLE IF EXISTS `contract_types`;
CREATE TABLE `contract_types` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contract_types` (`id`, `nom`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'newHeberg',  'Nouvelle hebergement', '2018-03-23 15:38:50',  '2018-03-23 15:38:50');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `login` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `validate` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `adress`, `phoneNumber`, `email`, `validate`) VALUES
(1, 'SISR', 'Admin',  'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'Nothing',  0,  'Nothing',  'YES'),
(2, 'Louis Jean', 'ARNAUD', 'Lurius', '5c8f0d6aff5edea08a652febf7d9b09e51c2e92d', '30900 RD 1082',  660686293,  'louis.arnaud.pro@gmail.com', 'YES'),
(3, 'Léo-Paul', 'Baccou', 'Hiro', '66a6773fc58a87a014ddcd190ae63252135dad99', '10 Avenue de la Trachardière', 781892618,  'leopaul.baccou@gmail.com', 'YES');

-- 2018-03-23 15:58:47