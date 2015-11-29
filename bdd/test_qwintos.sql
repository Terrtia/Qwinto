-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 29 Novembre 2015 à 14:39
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `test_qwintos`
--

-- --------------------------------------------------------

--
-- Structure de la table `feuilles`
--

CREATE TABLE IF NOT EXISTS `feuilles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRES_CROIX` int(11) NOT NULL,
  `AJOUTER` tinyint(1) NOT NULL,
  `ORDRE` int(11) NOT NULL,
  `NUM_PARTY` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NUM_PARTY` (`NUM_PARTY`),
  KEY `ID_USER` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `feuilles`
--

INSERT INTO `feuilles` (`ID`, `NOMBRES_CROIX`, `AJOUTER`, `ORDRE`, `NUM_PARTY`, `USER_ID`) VALUES
(7, 1, 0, 2, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `nombres`
--

CREATE TABLE IF NOT EXISTS `nombres` (
  `FEUILLE_ID` int(11) NOT NULL,
  `LIGNE` int(11) NOT NULL,
  `COLONNE` int(11) NOT NULL,
  `VAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`FEUILLE_ID`,`LIGNE`,`COLONNE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `nombres`
--

INSERT INTO `nombres` (`FEUILLE_ID`, `LIGNE`, `COLONNE`, `VAL`) VALUES
(7, 0, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TOUR` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `parties`
--

INSERT INTO `parties` (`ID`, `TOUR`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(10) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`) VALUES
(6, 'test', 'secret');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `feuilles`
--
ALTER TABLE `feuilles`
  ADD CONSTRAINT `feuilles_ibfk_1` FOREIGN KEY (`NUM_PARTY`) REFERENCES `parties` (`ID`),
  ADD CONSTRAINT `feuilles_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`ID`);

--
-- Contraintes pour la table `nombres`
--
ALTER TABLE `nombres`
  ADD CONSTRAINT `nombres_ibfk_1` FOREIGN KEY (`FEUILLE_ID`) REFERENCES `feuilles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
