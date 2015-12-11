-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 11 Décembre 2015 à 14:14
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cake_qwintos`
--

-- --------------------------------------------------------

--
-- Structure de la table `feuilles`
--

CREATE TABLE IF NOT EXISTS `feuilles` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `NOMBRES_CROIX` int(1) NOT NULL DEFAULT '0',
  `TABLEAU` varchar(100) DEFAULT NULL,
  `NUM_PARTY` int(12) NOT NULL,
  `LOGIN` varchar(12) NOT NULL,
  `PASSWORD` varchar(12) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `LOGIN` (`LOGIN`),
  KEY `NUM_PARTY` (`NUM_PARTY`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `feuilles`
--

INSERT INTO `feuilles` (`ID`, `NOMBRES_CROIX`, `TABLEAU`, `NUM_PARTY`, `LOGIN`, `PASSWORD`) VALUES
(2, 0, '-1,-1,0,-2,0,-1,0,-2,0,0,0,0/-1,0,0,0,0,0,-1,0,-2,0,0,-1/0,0,-2,0,-1,0,0,0,0,-2,-1,-1/', 2, 'test', 'secret');

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `TOUR` int(12) NOT NULL,
  `ORDRE` varchar(100) DEFAULT NULL,
  `DE_ROUGE` int(1) DEFAULT NULL,
  `DE_JAUNE` int(1) DEFAULT NULL,
  `DE_VIOLET` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `parties`
--

INSERT INTO `parties` (`ID`, `TOUR`, `ORDRE`, `DE_ROUGE`, `DE_JAUNE`, `DE_VIOLET`) VALUES
(2, 0, 'solo', 0, 0, 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `feuilles`
--
ALTER TABLE `feuilles`
  ADD CONSTRAINT `feuilles_ibfk_1` FOREIGN KEY (`NUM_PARTY`) REFERENCES `parties` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
