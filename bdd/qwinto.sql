-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 17 Novembre 2015 à 17:48
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `qwinto`
--

-- --------------------------------------------------------

--
-- Structure de la table `feuilles`
--

CREATE TABLE IF NOT EXISTS `feuilles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRES_ID` int(11) NOT NULL,
  `NOMBRES_CROIX` int(11) NOT NULL,
  `AJOUTER` tinyint(1) NOT NULL,
  `ORDRE` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NOMBRES_ID` (`NOMBRES_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `nombres`
--

CREATE TABLE IF NOT EXISTS `nombres` (
  `NOMBRES_ID` int(11) NOT NULL DEFAULT '0',
  `LIGNE` int(11) DEFAULT NULL,
  `COLONE` int(11) DEFAULT NULL,
  `VAL` int(11) NOT NULL,
  PRIMARY KEY (`NOMBRES_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `feuilles`
--
ALTER TABLE `feuilles`
  ADD CONSTRAINT `Nombres_Tableau` FOREIGN KEY (`NOMBRES_ID`) REFERENCES `nombres` (`NOMBRES_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
