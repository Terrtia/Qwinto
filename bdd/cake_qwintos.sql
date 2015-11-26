-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 26 Novembre 2015 à 18:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cake_qwintos`
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
  `NUM_PARTY` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NOMBRES_ID` (`NOMBRES_ID`),
  KEY `NUM_PARTY` (`NUM_PARTY`),
  KEY `ID_USER` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `feuilles`
--

INSERT INTO `feuilles` (`ID`, `NOMBRES_ID`, `NOMBRES_CROIX`, `AJOUTER`, `ORDRE`, `NUM_PARTY`, `USER_ID`) VALUES
(4, 2, 0, 0, 1, 1, 2),
(5, 2, 0, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `nombres`
--

CREATE TABLE IF NOT EXISTS `nombres` (
  `TABLE_ID` int(11) NOT NULL,
  `NOMBRES_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIGNE` int(11) DEFAULT NULL,
  `COLONE` int(11) DEFAULT NULL,
  `VAL` int(11) NOT NULL,
  PRIMARY KEY (`NOMBRES_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `nombres`
--

INSERT INTO `nombres` (`TABLE_ID`, `NOMBRES_ID`, `LIGNE`, `COLONE`, `VAL`) VALUES
(0, 1, 3, 1, 0),
(0, 2, 3, 1, 1),
(0, 3, 2, 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TOUR` int(11) NOT NULL,
  `NUM_FEUILLES` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `NUM_FEUILLES` (`NUM_FEUILLES`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `parties`
--

INSERT INTO `parties` (`ID`, `TOUR`, `NUM_FEUILLES`) VALUES
(1, 1, NULL),
(2, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(10) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `NUM_FEUILLES` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `NUM_FEUILLES` (`NUM_FEUILLES`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `NUM_FEUILLES`) VALUES
(2, 'axel', '1234', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `feuilles`
--
ALTER TABLE `feuilles`
  ADD CONSTRAINT `feuilles_ibfk_1` FOREIGN KEY (`NUM_PARTY`) REFERENCES `parties` (`ID`),
  ADD CONSTRAINT `feuilles_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `feuilles_ibfk_3` FOREIGN KEY (`NOMBRES_ID`) REFERENCES `nombres` (`NOMBRES_ID`);

--
-- Contraintes pour la table `parties`
--
ALTER TABLE `parties`
  ADD CONSTRAINT `parties_ibfk_1` FOREIGN KEY (`NUM_FEUILLES`) REFERENCES `feuilles` (`ID`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`NUM_FEUILLES`) REFERENCES `feuilles` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
