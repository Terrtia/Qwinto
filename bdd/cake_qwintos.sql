-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 04 Décembre 2015 à 10:53
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
  `USER_ID` int(12) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NUM_PARTY` (`NUM_PARTY`,`USER_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `feuilles`
--

INSERT INTO `feuilles` (`ID`, `NOMBRES_CROIX`, `TABLEAU`, `NUM_PARTY`, `USER_ID`) VALUES
(1, 0, '-1,-1,0,0,0,-1,0,0,0,0,0,0/-1,0,0,0,0,0,-1,0,0,0,0,-1/0,0,0,0,-1,0,0,0,0,0,-1,-1', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `TOUR` int(12) NOT NULL,
  `ORDRE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `parties`
--

INSERT INTO `parties` (`ID`, `TOUR`, `ORDRE`) VALUES
(1, 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(12) NOT NULL,
  `PASSWORD` varchar(12) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`) VALUES
(1, 'test', 'secret');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `feuilles`
--
ALTER TABLE `feuilles`
  ADD CONSTRAINT `feuilles_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feuilles_ibfk_1` FOREIGN KEY (`NUM_PARTY`) REFERENCES `parties` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
