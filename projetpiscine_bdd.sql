-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 14 nov. 2018 à 19:58
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `agirreduction`
--

DROP TABLE IF EXISTS `agirreduction`;
CREATE TABLE IF NOT EXISTS `agirreduction` (
  `CodeProduit` int(11) NOT NULL,
  `NumReduction` int(11) NOT NULL,
  PRIMARY KEY (`CodeProduit`,`NumReduction`) USING BTREE,
  KEY `agirReduction_REDUCTION0_FK` (`NumReduction`) USING BTREE
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
  `IdBoutique` int(11) NOT NULL AUTO_INCREMENT,
  `NumSIRET` varchar(50) NOT NULL,
  `NomBoutique` varchar(50) NOT NULL,
  `RueBoutique` varchar(50) NOT NULL,
  `VilleBoutique` varchar(50) NOT NULL,
  `CPBoutique` int(11) NOT NULL,
  `TelBoutique` varchar(50) NOT NULL,
  `MailBoutique` varchar(50) NOT NULL,
  `HorairesBoutique` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdBoutique`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`IdBoutique`, `NumSIRET`, `NomBoutique`, `RueBoutique`, `VilleBoutique`, `CPBoutique`, `TelBoutique`, `MailBoutique`, `HorairesBoutique`) VALUES
(2, '71', 'Chez bibiche', 'abeilles', 'Montpellier', 34000, '0467717171', 'chezbibiche@boutique.fr', '10h à 19h en semaine'),
(3, '72', 'ChezJO', 'scorpion', 'Béziers', 34500, '0404727272', 'chezjo@boutique.fr', '2h à 7h le week end '),
(4, '73', 'Nature and Co', 'Polygon', 'Montpellier', 34000, '0467737373', 'Natureandco@boutique.fr', '9h à 20h le week end, 18h en semaine'),
(5, '74', 'HarryFans', 'Hedwige', 'Poudlard', 70007, '0770747474', 'stupefix@boutique.fr', 'sur demande'),
(6, '75', 'AmbianceBougie', 'flamme', 'Fire City', 1, '0006660000', 'sataniscoming@boutique.fr', '20h à 8h tous les jours'),
(7, 'vrainum', 'asaa', 'adzd', 'adz', 0, 'adzd', 'adadaz@gmail.com', '12 à midi'),
(8, '12345678999', 'Boutique Hugo', '12 rue aaa', 'foo', 45000, '0606060606', 'foo@gmail.com', '12h'),
(9, '', '', '', '', 0, '', '', ''),
(10, '12345678999', 'Hugo Niort', '15 rue Pablo Neruda', 'Le Crès', 34920, '0673340152', 'hugo.niort9@gmail.com', 'lol');

-- --------------------------------------------------------

--
-- Structure de la table `categorieproduit`
--

DROP TABLE IF EXISTS `categorieproduit`;
CREATE TABLE IF NOT EXISTS `categorieproduit` (
  `NumCategorieP` int(11) NOT NULL AUTO_INCREMENT,
  `NomCategorieProduit` varchar(50) NOT NULL,
  PRIMARY KEY (`NumCategorieP`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorieproduit`
--

INSERT INTO `categorieproduit` (`NumCategorieP`, `NomCategorieProduit`) VALUES
(1, 'animaux'),
(2, 'casquettes'),
(3, 'high-tech'),
(4, 'CoursIG'),
(5, 'parapluie');

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
  PRIMARY KEY (`NumClient`),
  KEY `MailClient` (`MailClient`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`NumClient`, `NomClient`, `PrenomClient`, `RueClient`, `VilleClient`, `CPClient`, `TelClient`, `MailClient`, `PointClient`) VALUES
(13, 'Niort', 'Hugo', '15 rue Pablo Neruda', 'Le Crès', 34920, '0673340152', 'hugo.niort9@gmail.com', 0),
(19, 'foo', 'Boutique', '12 rue aaa', 'foo', 45000, '0606060606', 'foo@gmail.com', 0);

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
  PRIMARY KEY (`NumCommercant`),
  KEY `MailCommercant` (`MailCommercant`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commercant`
--

INSERT INTO `commercant` (`NumCommercant`, `NomCommercant`, `PrenomCommercant`, `RueCommercant`, `VilleCommercant`, `CPCommercant`, `TelCommercant`, `MailCommercant`) VALUES
(6, 'Niort', 'Hugo', '15 rue Pablo Neruda', 'Le Crès', 34920, '0673340152', 'hugo.niort@gmail.com'),
(7, '', 'Hugo', '15 rue Pablo Neruda', 'Le Crès', 34920, '0673340152', '');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `login` varchar(50) NOT NULL,
  `password` varchar(360) NOT NULL,
  `privilege` int(11) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`login`, `password`, `privilege`) VALUES
('', '', 2),
('foo@gmail.com', '$2y$10$Ja0wGVYn1rogzp1dw/LvZeHk/KBRTTyGigFEbi75kwxoOqsHt4YpW', 1),
('hugo.niort9@gmail.com', 'bar', 1),
('hugo.niort@gmail.com', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `gererboutique`
--

DROP TABLE IF EXISTS `gererboutique`;
CREATE TABLE IF NOT EXISTS `gererboutique` (
  `NumCommercant` int(11) NOT NULL,
  `IdBoutique` int(11) NOT NULL,
  PRIMARY KEY (`NumCommercant`,`IdBoutique`),
  KEY `GererBoutique_BOUTIQUE0_FK` (`IdBoutique`)
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
  `IdBoutique` int(11) NOT NULL,
  PRIMARY KEY (`NumCommande`,`NumLigneCommande`),
  KEY `LIGNECOMMANDE_BOUTIQUE0_FK` (`IdBoutique`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `CodeProduit` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleProduit` varchar(50) NOT NULL,
  `DescriptionProd` varchar(50) DEFAULT NULL,
  `PrixProd` int(11) NOT NULL,
  `StockReel` int(11) NOT NULL,
  `StockDispo` int(11) NOT NULL,
  `DureeReservation` int(11) NOT NULL,
  `IdBoutique` int(11) NOT NULL,
  `NumCategorieP` int(11) NOT NULL,
  PRIMARY KEY (`CodeProduit`),
  KEY `PRODUIT_BOUTIQUE_FK` (`IdBoutique`),
  KEY `PRODUIT_CATEGORIEPRODUIT0_FK` (`NumCategorieP`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`CodeProduit`, `LibelleProduit`, `DescriptionProd`, `PrixProd`, `StockReel`, `StockDispo`, `DureeReservation`, `IdBoutique`, `NumCategorieP`) VALUES
(1, 'Chat en bois', 'petit chat en carton 10x20x16', 100, 10, 10, 20, 2, 1),
(2, 'Casquette JO blue', 'Casquette de bg', 8, 3, 3, 10, 2, 1),
(3, 'analyseur de plante', 'renvoie toutes les données relatives à vos plantes', 200, 10, 9, 30, 4, 3),
(4, 'casquette HARRY', 'motif harry cicatrice en relief', 20, 5, 5, 10, 5, 2),
(5, 'parapluie lance flammes', '100x50x50, remplie au sp98', 666, 66, 6, 666, 6, 5),
(12, 'Chat en bois', 'petit chat en carton 10x20x16', 100, 10, 10, 20, 2, 1),
(13, 'Chat en bois', 'petit chat en carton 10x20x16', 100, 10, 10, 20, 2, 1),
(14, 'Chat en bois', 'petit chat en carton 10x20x16', 100, 10, 10, 20, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reduction`
--

DROP TABLE IF EXISTS `reduction`;
CREATE TABLE IF NOT EXISTS `reduction` (
  `NumReduction` int(11) NOT NULL AUTO_INCREMENT,
  `CodeReduction` varchar(50) NOT NULL,
  `LibelleReduction` varchar(50) NOT NULL,
  `MontantReduction` int(11) NOT NULL,
  `DateDReduction` date NOT NULL,
  `DateFReduction` date NOT NULL,
  `IdBoutique` int(11) NOT NULL,
  PRIMARY KEY (`NumReduction`),
  KEY `REDUCTION_BOUTIQUE_FK` (`IdBoutique`)
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
  ADD CONSTRAINT `agirReduction_REDUCTION0_FK` FOREIGN KEY (`NumReduction`) REFERENCES `reduction` (`NumReduction`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `AVIS_CLIENT0_FK` FOREIGN KEY (`NumClient`) REFERENCES `client` (`NumClient`),
  ADD CONSTRAINT `AVIS_PRODUIT_FK` FOREIGN KEY (`CodeProduit`) REFERENCES `produit` (`CodeProduit`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`MailClient`) REFERENCES `compte` (`login`);

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
-- Contraintes pour la table `commercant`
--
ALTER TABLE `commercant`
  ADD CONSTRAINT `commercant_ibfk_1` FOREIGN KEY (`MailCommercant`) REFERENCES `compte` (`login`);

--
-- Contraintes pour la table `gererboutique`
--
ALTER TABLE `gererboutique`
  ADD CONSTRAINT `GererBoutique_BOUTIQUE0_FK` FOREIGN KEY (`IdBoutique`) REFERENCES `boutique` (`IdBoutique`),
  ADD CONSTRAINT `GererBoutique_COMMERCANT_FK` FOREIGN KEY (`NumCommercant`) REFERENCES `commercant` (`NumCommercant`);

--
-- Contraintes pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `LIGNECOMMANDE_BOUTIQUE0_FK` FOREIGN KEY (`IdBoutique`) REFERENCES `boutique` (`IdBoutique`),
  ADD CONSTRAINT `LIGNECOMMANDE_COMMANDE_FK` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `PRODUIT_BOUTIQUE_FK` FOREIGN KEY (`IdBoutique`) REFERENCES `boutique` (`IdBoutique`),
  ADD CONSTRAINT `PRODUIT_CATEGORIEPRODUIT0_FK` FOREIGN KEY (`NumCategorieP`) REFERENCES `categorieproduit` (`NumCategorieP`);

--
-- Contraintes pour la table `reduction`
--
ALTER TABLE `reduction`
  ADD CONSTRAINT `REDUCTION_BOUTIQUE_FK` FOREIGN KEY (`IdBoutique`) REFERENCES `boutique` (`IdBoutique`);

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
