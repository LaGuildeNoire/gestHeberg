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
  `dateDebut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prix` float NOT NULL,
  `dateFin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idTypeContrat` int(11) DEFAULT NULL,
  PRIMARY KEY (`numero`,`idDemandeur`),
  KEY `idDemandeur` (`idDemandeur`),
  KEY `idTypeContrat` (`idTypeContrat`),
  CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`idDemandeur`) REFERENCES `users` (`id`),
  CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`idTypeContrat`) REFERENCES `contract_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `contract_types`;
CREATE TABLE `contract_types` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contract_types` (`id`, `nom`, `libelle`) VALUES
(1, 'newHeberg',  'Nouvelle hebergement');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `adress`, `phoneNumber`, `email`) VALUES
(1, 'SISR', 'Admin',  'root', '*81F5E21E35407D884A6CD4A731AEBFB6AF209E1B',  'Nothing',  0,  'Nothing'),
(2, 'Louis Jean', 'ARNAUD', 'Lurius', '*05DEE8A0CCE0166A36DEB2EFC54077C29334AF50',  '30900 RD 1082',  660686293,  'louis.arnaud.pro@gmail.com'),
(3, 'Léo-Paul', 'Baccou', 'Hiro', '*28BAF6A931BA40C1912FF1987C4E74892CE65083',  '10 Avenue de la Trachardière', 781892618,  'leopaul.baccou@gmail.com');

-- 2018-03-15 14:25:06