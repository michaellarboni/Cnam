-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 21 jan. 2019 à 21:53
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cat_clinic`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

DROP TABLE IF EXISTS `contenus`;
CREATE TABLE IF NOT EXISTS `contenus` (
  `ID_CONTENU` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE` varchar(50) NOT NULL,
  `AUTEUR` varchar(50) NOT NULL,
  `FICHIER` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_CONTENU`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contenus`
--

INSERT INTO `contenus` (`ID_CONTENU`, `TITRE`, `AUTEUR`, `FICHIER`) VALUES
(1, 'DOCUMENT-1', 'Auteur-1', 'fichier-1.pdf'),
(2, 'DOCUMENT-2', 'Auteur-2', 'fichier-2.pdf'),
(3, 'DOCUMENT-3', 'Auteur-3', 'fichier-3.pdf'),
(4, 'DOCUMENT-4', 'Auteur-4', 'fichier-4.pdf'),
(5, 'DOCUMENT-5', 'Auteur-5', 'fichier-5.pdf'),
(6, 'DOCUMENT-6', 'Auteur-6', 'fichier-6.pdf'),
(7, 'DOCUMENT-7', 'Auteur-7', 'fichier-7.pdf'),
(8, 'DOCUMENT-8', 'Auteur-8', 'fichier-8.pdf'),
(10, 'DOCUMENT-10', 'Auteur-10', 'fichier-10.pdf'),
(11, 'DOCUMENT-11', 'Auteur-11', 'fichier-11.pdf'),
(12, 'DOCUMENT-12', 'Auteur-12', 'fichier-12.pdf'),
(13, 'DOCUMENT-13', 'Auteur-13', 'fichier-13.pdf'),
(14, 'DOCUMENT-14', 'Auteur-14', 'fichier-14.pdf'),
(15, 'DOCUMENT-15', 'Auteur-15', 'fichier-15.pdf'),
(16, 'DOCUMENT-16', 'Auteur-16', 'fichier-16.pdf'),
(17, 'DOCUMENT-17', 'Auteur-17', 'fichier-17.pdf'),
(18, 'DOCUMENT-18', 'Auteur-18', 'fichier-18.pdf'),
(20, 'DOCUMENT-20', 'Auteur-20', 'fichier-20.pdf'),
(51, 'CV Michael Larboni', '', '1547564534_CVMichaelLARBONIDeveloppe.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `ITEMS`
--

DROP TABLE IF EXISTS `ITEMS`;
CREATE TABLE IF NOT EXISTS `ITEMS` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ITEM`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ITEMS`
--

INSERT INTO `ITEMS` (`ID_ITEM`, `ITEM`) VALUES
(1, 'Les spÃ©cialitÃ©s de la clinique'),
(2, 'L\'Ã©quipe'),
(3, 'Situation gÃ©ographique'),
(4, 'Horaires'),
(10, 'Fiches Conseils'),
(11, 'Contact'),
(19, 'photos de chat');

-- --------------------------------------------------------

--
-- Structure de la table `ITEMS_contenus`
--

DROP TABLE IF EXISTS `ITEMS_contenus`;
CREATE TABLE IF NOT EXISTS `ITEMS_contenus` (
  `ID_ITEM` int(11) NOT NULL,
  `ID_CONTENU` int(11) NOT NULL,
  PRIMARY KEY (`ID_ITEM`,`ID_CONTENU`),
  KEY `FK_ITEMS_CONTENU_2` (`ID_CONTENU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ITEMS_contenus`
--

INSERT INTO `ITEMS_contenus` (`ID_ITEM`, `ID_CONTENU`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(4, 17),
(4, 18),
(4, 20),
(5, 10),
(5, 11),
(9, 51);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
