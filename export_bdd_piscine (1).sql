-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 15 oct. 2018 à 17:45
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `agirreduction`
--

DROP TABLE IF EXISTS `agirreduction`;
CREATE TABLE IF NOT EXISTS `agirreduction` (
  `CodeProduit` int(11) NOT NULL,
  `CodeReduction` int(11) NOT NULL,
  PRIMARY KEY (`CodeProduit`,`CodeReduction`),
  KEY `agirReduction_REDUCTION0_FK` (`CodeReduction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `NumAvis` int(11) NOT NULL AUTO_INCREMENT,
  `DateAvis` date NOT NULL,
  `NoteAvis` int(11) NOT NULL,
  `Commentaire` longtext NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  `NumClient` int(11) NOT NULL,
  PRIMARY KEY (`NumAvis`),
  KEY `AVIS_PRODUIT_FK` (`CodeProduit`),
  KEY `AVIS_CLIENT0_FK` (`NumClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

DROP TABLE IF EXISTS `boutique`;
CREATE TABLE IF NOT EXISTS `boutique` (
  `NumSIRET` int(11) NOT NULL,
  `NomBoutique` varchar(50) NOT NULL,
  `RueBoutique` varchar(50) NOT NULL,
  `VilleBoutique` varchar(50) NOT NULL,
  `CPBoutique` int(11) NOT NULL,
  `TelBoutique` varchar(50) NOT NULL,
  `MailBoutique` varchar(50) NOT NULL,
  `HorairesBoutique` varchar(50) NOT NULL,
  PRIMARY KEY (`NumSIRET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorieproduit`
--

DROP TABLE IF EXISTS `categorieproduit`;
CREATE TABLE IF NOT EXISTS `categorieproduit` (
  `NumCategorieP` int(11) NOT NULL AUTO_INCREMENT,
  `NomCategorieProduit` varchar(50) NOT NULL,
  PRIMARY KEY (`NumCategorieP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `NumClient` int(11) NOT NULL AUTO_INCREMENT,
  `NomClient` varchar(50) NOT NULL,
  `PrenomClient` varchar(50) NOT NULL,
  `RueClient` varchar(50) NOT NULL,
  `VilleClient` varchar(50) NOT NULL,
  `CPClient` int(11) NOT NULL,
  `TelClient` varchar(50) NOT NULL,
  `MailClient` varchar(50) NOT NULL,
  `PointClient` int(11) NOT NULL,
  PRIMARY KEY (`NumClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `NumCommande` int(11) NOT NULL AUTO_INCREMENT,
  `DateCommande` date NOT NULL,
  `PrixRemiseCom` int(11) NOT NULL,
  `MontantCom` int(11) NOT NULL,
  `NumClient` int(11) NOT NULL,
  PRIMARY KEY (`NumCommande`),
  KEY `COMMANDE_CLIENT_FK` (`NumClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE IF NOT EXISTS `commander` (
  `CodeProduit` int(11) NOT NULL,
  `NumCommande` int(11) NOT NULL,
  `QteCommander` int(11) NOT NULL,
  PRIMARY KEY (`CodeProduit`,`NumCommande`),
  KEY `Commander_COMMANDE0_FK` (`NumCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commercant`
--

DROP TABLE IF EXISTS `commercant`;
CREATE TABLE IF NOT EXISTS `commercant` (
  `NumCommercant` int(11) NOT NULL AUTO_INCREMENT,
  `NomCommercant` varchar(50) NOT NULL,
  `PrenomCommercant` varchar(50) NOT NULL,
  `RueCommercant` varchar(50) NOT NULL,
  `VilleCommercant` varchar(50) NOT NULL,
  `CPCommercant` int(11) NOT NULL,
  `TelCommercant` varchar(50) NOT NULL,
  `MailCommercant` varchar(50) NOT NULL,
  PRIMARY KEY (`NumCommercant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gererboutique`
--

DROP TABLE IF EXISTS `gererboutique`;
CREATE TABLE IF NOT EXISTS `gererboutique` (
  `NumCommercant` int(11) NOT NULL,
  `NumSIRET` int(11) NOT NULL,
  PRIMARY KEY (`NumCommercant`,`NumSIRET`),
  KEY `GererBoutique_BOUTIQUE0_FK` (`NumSIRET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `NumCommande` int(11) NOT NULL,
  `NumLigneCommande` int(11) NOT NULL,
  `QteLigneCommande` int(11) NOT NULL,
  `NumSIRET` int(11) NOT NULL,
  PRIMARY KEY (`NumCommande`,`NumLigneCommande`),
  KEY `LIGNECOMMANDE_BOUTIQUE0_FK` (`NumSIRET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `CodeProduit` int(11) NOT NULL,
  `LibelleProduit` varchar(50) NOT NULL,
  `DescriptionProd` varchar(50) NOT NULL,
  `PrixProd` int(11) NOT NULL,
  `StockReel` int(11) NOT NULL,
  `StockDispo` int(11) NOT NULL,
  `DureeReservation` int(11) NOT NULL,
  `NumSIRET` int(11) NOT NULL,
  `NumCategorieP` int(11) NOT NULL,
  PRIMARY KEY (`CodeProduit`),
  KEY `PRODUIT_BOUTIQUE_FK` (`NumSIRET`),
  KEY `PRODUIT_CATEGORIEPRODUIT0_FK` (`NumCategorieP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reduction`
--

DROP TABLE IF EXISTS `reduction`;
CREATE TABLE IF NOT EXISTS `reduction` (
  `CodeReduction` int(11) NOT NULL,
  `LibelleReduction` varchar(50) NOT NULL,
  `MontantReduction` int(11) NOT NULL,
  `DateDReduction` date NOT NULL,
  `DateFReduction` date NOT NULL,
  `NumSIRET` int(11) NOT NULL,
  PRIMARY KEY (`CodeReduction`),
  KEY `REDUCTION_BOUTIQUE_FK` (`NumSIRET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `NumReservation` int(11) NOT NULL AUTO_INCREMENT,
  `DateReservation` date NOT NULL,
  `MontantRes` int(11) NOT NULL,
  `PrixRemiseRes` int(11) NOT NULL,
  `Paye` tinyint(1) NOT NULL,
  `NumClient` int(11) NOT NULL,
  PRIMARY KEY (`NumReservation`),
  KEY `RESERVATION_CLIENT_FK` (`NumClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `NumReservation` int(11) NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  `QteReserver` int(11) NOT NULL,
  PRIMARY KEY (`NumReservation`,`CodeProduit`),
  KEY `RESERVER_PRODUIT0_FK` (`CodeProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `varianteproduit`
--

DROP TABLE IF EXISTS `varianteproduit`;
CREATE TABLE IF NOT EXISTS `varianteproduit` (
  `NumVarianteP` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleVarianteP` varchar(50) NOT NULL,
  `DescriptionVarianteP` varchar(50) NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  PRIMARY KEY (`NumVarianteP`),
  KEY `VARIANTEPRODUIT_FK` (`CodeProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agirreduction`
--
ALTER TABLE `agirreduction`
  ADD CONSTRAINT `agirReduction_PRODUIT_FK` FOREIGN KEY (`CodeProduit`) REFERENCES `produit` (`CodeProduit`),
  ADD CONSTRAINT `agirReduction_REDUCTION0_FK` FOREIGN KEY (`CodeReduction`) REFERENCES `reduction` (`CodeReduction`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `AVIS_CLIENT0_FK` FOREIGN KEY (`NumClient`) REFERENCES `client` (`NumClient`),
  ADD CONSTRAINT `AVIS_PRODUIT_FK` FOREIGN KEY (`CodeProduit`) REFERENCES `produit` (`CodeProduit`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `COMMANDE_CLIENT_FK` FOREIGN KEY (`NumClient`) REFERENCES `client` (`NumClient`);

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `Commander_COMMANDE0_FK` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`),
  ADD CONSTRAINT `Commander_PRODUIT_FK` FOREIGN KEY (`CodeProduit`) REFERENCES `produit` (`CodeProduit`);

--
-- Contraintes pour la table `gererboutique`
--
ALTER TABLE `gererboutique`
  ADD CONSTRAINT `GererBoutique_BOUTIQUE0_FK` FOREIGN KEY (`NumSIRET`) REFERENCES `boutique` (`NumSIRET`),
  ADD CONSTRAINT `GererBoutique_COMMERCANT_FK` FOREIGN KEY (`NumCommercant`) REFERENCES `commercant` (`NumCommercant`);

--
-- Contraintes pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `LIGNECOMMANDE_BOUTIQUE0_FK` FOREIGN KEY (`NumSIRET`) REFERENCES `boutique` (`NumSIRET`),
  ADD CONSTRAINT `LIGNECOMMANDE_COMMANDE_FK` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `PRODUIT_BOUTIQUE_FK` FOREIGN KEY (`NumSIRET`) REFERENCES `boutique` (`NumSIRET`),
  ADD CONSTRAINT `PRODUIT_CATEGORIEPRODUIT0_FK` FOREIGN KEY (`NumCategorieP`) REFERENCES `categorieproduit` (`NumCategorieP`);

--
-- Contraintes pour la table `reduction`
--
ALTER TABLE `reduction`
  ADD CONSTRAINT `REDUCTION_BOUTIQUE_FK` FOREIGN KEY (`NumSIRET`) REFERENCES `boutique` (`NumSIRET`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `RESERVATION_CLIENT_FK` FOREIGN KEY (`NumClient`) REFERENCES `client` (`NumClient`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `RESERVER_PRODUIT0_FK` FOREIGN KEY (`CodeProduit`) REFERENCES `produit` (`CodeProduit`),
  ADD CONSTRAINT `RESERVER_RESERVATION_FK` FOREIGN KEY (`NumReservation`) REFERENCES `reservation` (`NumReservation`);

--
-- Contraintes pour la table `varianteproduit`
--
ALTER TABLE `varianteproduit`
  ADD CONSTRAINT `VARIANTEPRODUIT_FK` FOREIGN KEY (`CodeProduit`) REFERENCES `produit` (`CodeProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
