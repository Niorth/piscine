-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 06 jan. 2019 à 15:31
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
  `DateAvis` datetime NOT NULL,
  `NoteAvis` int(11) NOT NULL,
  `Commentaire` longtext NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  `NumClient` int(11) NOT NULL,
  PRIMARY KEY (`NumAvis`),
  KEY `AVIS_PRODUIT_FK` (`CodeProduit`),
  KEY `AVIS_CLIENT0_FK` (`NumClient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`NumAvis`, `DateAvis`, `NoteAvis`, `Commentaire`, `CodeProduit`, `NumClient`) VALUES
(1, '2019-01-04 00:00:00', 5, 'commmentaire pour test', 25, 21),
(2, '2019-01-04 00:00:01', 2, 'commmentaire pour test', 25, 22),
(3, '2019-01-04 16:47:14', 3, 'Il y a comme un air de déjà vu dans cette PS4 Slim. C’est une excellente console pour les joueurs ayant un budget serré, mais elle n’est cependant pas à la hauteur d’une PS4 Pro et n’intéressera pas ceux qui possèdent déjà une PS4 classique.', 25, 22);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`IdBoutique`, `NumSIRET`, `NomBoutique`, `RueBoutique`, `VilleBoutique`, `CPBoutique`, `TelBoutique`, `MailBoutique`, `HorairesBoutique`) VALUES
(1, '362 521 879 00034', 'Le Verger de Léa', 'Rue Henry Barbusse', 'Sète', 34200, '0951243678', 'levergerdeléa@gmail.com', '8h-17h'),
(2, '71', 'Chez bibiche', 'abeilles', 'Montpellier', 34000, '0467717171', 'chezbibiche@boutique.fr', '10h à 19h en semaine'),
(3, '72', 'ChezJO', 'scorpion', 'Béziers', 34500, '0404727272', 'chezjo@boutique.fr', '2h à 7h le week end '),
(4, '73', 'Nature and Co', 'Polygon', 'Montpellier', 34000, '0467737373', 'Natureandco@boutique.fr', '9h à 20h le week end, 18h en semaine'),
(5, '74', 'HarryFans', 'Hedwige', 'Poudlard', 70007, '0770747474', 'stupefix@boutique.fr', 'sur demande'),
(6, '75', 'AmbianceBougie', 'flamme', 'Fire City', 1, '0006660000', 'sataniscoming@boutique.fr', '20h à 8h tous les jours'),
(7, 'vrainum', 'asaa', 'adzd', 'adz', 0, 'adzd', 'adadaz@gmail.com', '12 à midi'),
(8, '12345678999', 'Boutique Hugo', '12 rue aaa', 'foo', 45000, '0606060606', 'foo@gmail.com', '12h'),
(9, '', '', '', '', 0, '', '', ''),
(10, '12345678999', 'Hugo Niort', '15 rue Pablo Neruda', 'Le Crès', 34920, '0673340152', 'hugo.niort9@gmail.com', 'lol'),
(11, '362 521 879 01245', 'D&V Electronics', '20 Rue du 4 Septembre', 'Bézier', 34500, '0442897639', 'dandvelec@gmail.com', '8h-19h'),
(12, '362 521 876 06721', 'Papeterie Nicolas', 'Rue PItot', 'Montpellier', 34000, '0442563500', 'lapapeterienico@yahoo.fr', '9h30-17 lundi mardi jeudi vendredi,\r\n9h30-12h mercredi'),
(13, '362 521 853 12034', 'Rémi Audio', 'Centre commercial Polygone', 'Montpellier', 34000, '0442122967', 'raudio@gmail.com', '8h-18'),
(14, '362 521 879 13421', 'Atelier 34', 'Rue Four des Flamme', 'Montpellier', 34000, '0635426789', 'atelier34@gmail.com', '10h-16h'),
(15, '362 521 559 35699', 'Chausse\'Tout', 'Centre commercial Les Allées Géant', 'Bézier', 34500, '0657482311', 'chaussetout@outlook.fr', '9h-20h'),
(16, '362 441 929 30629', 'Bazar\'n\'Stuff', 'Avenue Jean moulin', 'Bézier', 34500, '04428473647', 'bns@yahoo.fr', '10-18h'),
(17, '362 521 004 15739', 'Librairie Auguste', 'Rue Jean Vilar', 'Sète', 34200, '0456393024', 'augustelivre@oulook.fr', '8h-15h');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`NumClient`, `NomClient`, `PrenomClient`, `RueClient`, `VilleClient`, `CPClient`, `TelClient`, `MailClient`, `PointClient`) VALUES
(13, 'Niort', 'Hugo', '15 rue Pablo Neruda', 'Le Crès', 34920, '0673340152', 'hugo.niort9@gmail.com', 0),
(19, 'foo', 'Boutique', '12 rue aaa', 'foo', 45000, '0606060606', 'foo@gmail.com', 0),
(21, 'Cabaret', 'Emma', '5 rue de la charrue', 'Montpellier', 34000, '0658927654', 'cabaret.emma@gmail.com', 0),
(22, 'Polanchet', 'Nicolas', '11 rue Boussairolles', 'Montpellier', 34000, '0645342317', 'polannico@gmail.com', 0),
(23, 'RANARIMAHEFA', 'Michel', '32 Rue de la piscine', 'Montpellier', 34000, '0662021247', 'michel.ranari@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `NumCommande` int(11) NOT NULL AUTO_INCREMENT,
  `DateCommande` datetime NOT NULL,
  `StatusCom` varchar(32) NOT NULL,
  `PrixRemiseCom` float DEFAULT NULL,
  `MontantCom` float NOT NULL,
  `NumClient` int(11) NOT NULL,
  PRIMARY KEY (`NumCommande`),
  KEY `COMMANDE_CLIENT_FK` (`NumClient`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`NumCommande`, `DateCommande`, `StatusCom`, `PrixRemiseCom`, `MontantCom`, `NumClient`) VALUES
(1, '2018-12-08 00:00:00', 'non traite', NULL, 20, 21),
(2, '2018-12-02 00:00:00', 'non traite ', NULL, 8, 22),
(3, '2018-12-11 00:00:00', 'non traite', NULL, 766, 22),
(4, '2018-12-28 23:36:00', 'non traite', NULL, 265, 21);

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

--
-- Déchargement des données de la table `commander`
--

INSERT INTO `commander` (`CodeProduit`, `NumCommande`, `QteCommander`) VALUES
(2, 2, 1),
(4, 1, 1),
(5, 3, 1),
(12, 3, 1),
(39, 4, 1),
(40, 4, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commercant`
--

INSERT INTO `commercant` (`NumCommercant`, `NomCommercant`, `PrenomCommercant`, `RueCommercant`, `VilleCommercant`, `CPCommercant`, `TelCommercant`, `MailCommercant`) VALUES
(6, 'Niort', 'Hugo', '15 rue Pablo Neruda', 'Le Crès', 34920, '0673340152', 'hugo.niort@gmail.com'),
(7, '', 'Hugo', '15 rue Pablo Neruda', 'Le Crès', 34920, '0673340152', ''),
(8, 'Durand', 'Léa', '127 Chemin du Midi', 'Sète', 34200, '0637281936', 'durand.lea@gmail.com'),
(9, 'Bernad', 'Joël', '1 Rue Paul Fougassier', 'Bézier', 34500, '0765483934', 'bjoel@gmail.com'),
(10, 'Carassoumet', 'Paul', '7 rue de la Charrue', 'Montpellier', 34000, '0689384704', 'PaulC@gmail.com'),
(11, 'Dossin', 'Victor', '26 Rue Pierre Brossolette', 'Bézier', 34500, '0764837562', 'victor.dossin@gmail.com'),
(12, 'Polanchet', 'Nicolas', '11 rue Boussairolles', 'Montpellier', 34000, '0764837562', 'polannico@gmail.com'),
(13, 'Xavier', 'Rémi', '525 avenue du professeur jean louis vialla', 'Montpellier', 34090, '0647364069', 'xavier.remi@gmail.com'),
(15, 'Gontrand', 'Richard', '163 rue claude nougaro', 'Montpellier', 34090, '0764739284', 'grichard@gmail.com'),
(16, 'Tortoza', 'Carole', '36 rue louis malbosc', 'Bézier', 34500, '0645247542', 'carole.tortoza@gmail.com'),
(17, 'Valla', 'Michelle', '3 rue Albert Marc', 'Bézier', 34500, '0612340987', 'V.michelle@gmail.com'),
(18, 'Elie', 'Auguste', '56 chemin du Rouquier', 'Sète', 34200, '0665609123', 'elie.auguste@gmail.com'),
(19, 'commercanttest', 'a', 'adadaz', 'afazfazf', 0, 'fazfazfz', 'test@gmail.com');

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
('bjoel@gmail.com', '$2y$10$PGXIb0icA6tP3t1K29NeWOuH7L/0lozSnUrI.H8aiXWCmygIhxKqm', 2),
('cabaret.emma@gmail.com', '$2y$10$Zp7zLirs3wnRqWpT5utwqeZl2EOBLshAL17eXnTNx16hOAM0i3GEG', 1),
('carole.tortoza@gmail.com', '$2y$10$3mYLz.lO87BohhlW5nY2me99laudwJ..F37TcqRqHnezL0r0xrN5C', 2),
('durand.lea@gmail.com', '$2y$10$mOPNltX9gtIVGjGleGzD0OvRutBss2WRU47OupuuBWYspy3B34ha6', 2),
('elie.auguste@gmail.com', '$2y$10$Ye4DqOeK8oiHsn2apNhr3OcdZHQ/YYOD4I73D8T6TcWMzDbyfavJm', 2),
('foo@gmail.com', '$2y$10$Ja0wGVYn1rogzp1dw/LvZeHk/KBRTTyGigFEbi75kwxoOqsHt4YpW', 1),
('grichard@gmail.com', '$2y$10$4nWhxtdx7klLj6INU.9pv.ZYDMTwN26lWYErtogpFyGRUOKn9/2E6', 2),
('hugo.niort9@gmail.com', 'bar', 1),
('hugo.niort@gmail.com', '', 2),
('michel.ranari@gmail.com', '$2y$10$871vgaLqq.3rfq/imkT/cOYIy.QhqrwYMulfEAI5GxyMo.ZPMZaC6', 1),
('PaulC@gmail.com', '$2y$10$ftyYm9iiawBR4oGlC7VT2uR77YTr4AV689VIthYYIEL7yyIv/G92W', 2),
('polannico@gmail.com', '$2y$10$HvKOUYUZpk.cqI7un82szOaFSbV0CbSgu3JuEb23zQOU62QzoYXR.', 1),
('test@gmail.com', '$2y$10$eykP6HfR4XfN2GxYgoEL1esz1KKN2KuTOumOtmw5OWz2g9JwlYIpu', 2),
('V.michelle@gmail.com', '$2y$10$in0lk9s/Mg108LVGK7bTKO9DhLfpgOxjKVJfnQ.uUIhuSi/o5zVRq', 2),
('victor.dossin@gmail.com', '$2y$10$3WfavLqkQUOWOxAcSJhJYea05TWPyiAmUlgVCLlwOgUL3VxCh1xLi', 2),
('xavier.remi@gmail.com', '$2y$10$EZZ/i8qubPa7i.c.Qmfp0.hsMydbLydQjkGU0PLKSgAshsKd7ZXpS', 2);

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

--
-- Déchargement des données de la table `gererboutique`
--

INSERT INTO `gererboutique` (`NumCommercant`, `IdBoutique`) VALUES
(6, 10),
(19, 11),
(19, 16);

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `NumCommande` int(11) NOT NULL,
  `NumLigneCommande` int(11) NOT NULL,
  `QteLigneCommande` int(11) NOT NULL,
  `StatusLigneCom` varchar(32) NOT NULL,
  `IdBoutique` int(11) NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  PRIMARY KEY (`NumCommande`,`NumLigneCommande`),
  KEY `LIGNECOMMANDE_BOUTIQUE0_FK` (`IdBoutique`),
  KEY `LIGNECOMMANDE_PRODUIT_FK` (`CodeProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`NumCommande`, `NumLigneCommande`, `QteLigneCommande`, `StatusLigneCom`, `IdBoutique`, `CodeProduit`) VALUES
(1, 1, 1, 'traite', 5, 4),
(2, 1, 1, 'non traite', 2, 2),
(3, 1, 1, 'non traite', 6, 5),
(3, 2, 1, 'traite', 2, 12),
(4, 1, 1, 'non traite', 11, 40),
(4, 2, 1, 'non traite', 11, 39);

-- --------------------------------------------------------

--
-- Structure de la table `lignereservation`
--

DROP TABLE IF EXISTS `lignereservation`;
CREATE TABLE IF NOT EXISTS `lignereservation` (
  `NumReservation` int(11) NOT NULL,
  `NumLigneRes` int(11) NOT NULL,
  `QteLigneRes` int(11) NOT NULL,
  `StatusLigneRes` varchar(32) NOT NULL,
  `IdBoutique` int(11) NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  PRIMARY KEY (`NumReservation`,`NumLigneRes`),
  KEY `LIGNERESERVATION_BOUTIQUE0_FK` (`IdBoutique`),
  KEY `LIGNERESERVATION_PRODUIT_FK` (`CodeProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignereservation`
--

INSERT INTO `lignereservation` (`NumReservation`, `NumLigneRes`, `QteLigneRes`, `StatusLigneRes`, `IdBoutique`, `CodeProduit`) VALUES
(1, 1, 1, 'non traite', 11, 25),
(2, 2, 1, 'traite', 11, 40),
(3, 3, 1, 'non traite', 11, 39),
(3, 4, 1, 'non traite', 11, 40),
(4, 1, 1, 'traite', 2, 12),
(4, 5, 1, 'non traite', 11, 39);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `CodeProduit` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleProduit` varchar(50) NOT NULL,
  `DescriptionProd` text,
  `DureeReservation` int(11) NOT NULL,
  `PrixProd` float NOT NULL,
  `StockReel` int(11) NOT NULL,
  `StockDispo` int(11) NOT NULL,
  `ImgProd` varchar(255) DEFAULT NULL,
  `IdBoutique` int(11) NOT NULL,
  `NumCategorieP` int(11) NOT NULL,
  PRIMARY KEY (`CodeProduit`),
  KEY `PRODUIT_BOUTIQUE_FK` (`IdBoutique`),
  KEY `PRODUIT_CATEGORIEPRODUIT0_FK` (`NumCategorieP`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`CodeProduit`, `LibelleProduit`, `DescriptionProd`, `DureeReservation`, `PrixProd`, `StockReel`, `StockDispo`, `ImgProd`, `IdBoutique`, `NumCategorieP`) VALUES
(2, 'Casquette JO blue', 'Casquette de bg', 10, 0, 0, 30, 'not-available.png', 2, 1),
(3, 'analyseur de plante', 'renvoie toutes les données relatives à vos plantes', 30, 0, 0, 0, 'not-available.png', 4, 3),
(4, 'casquette HARRY', 'motif harry cicatrice en relief', 10, 0, 0, 0, 'not-available.png', 5, 2),
(5, 'parapluie lance flammes', '100x50x50, remplie au sp98', 666, 0, 0, 0, 'not-available.png', 6, 5),
(12, 'Chat en bois', 'petit chat en carton 10x20x16', 20, 100, 0, 0, 'not-available.png', 2, 1),
(15, 'Samsung Galaxy S7', 'Nom du modèle : Galaxy S7\r\nStyle : Version France\r', 3, 600, 0, 0, 'not-available.png', 1, 3),
(16, 'Samsung Galaxy S8', 'Nom du modèle : Galaxy S7\r\nStyle : Version France ', 3, 799, 25, 25, 'not-available.png', 1, 3),
(25, 'Sony PlayStation 4 Pro (1 To) Noir', 'La PlayStation 4 Pro offre les dernières avancées ', 3, 449.95, 20, 20, 'not-available.png', 11, 3),
(39, 'Huawei P20 Lite', 'Double capteur de photo de 16MP + 2MP, pour des photos ébouissantes\r\nEcran FullView FHD+ de 5.84 pouces, pour des couleurs vives et des contrastes élevés\r\nProcesseur octo-coeur Kirin 659, pour un téléphone qui reste rapide\r\nBatterie de 3000mAh, pour une autonomie plus longue et une recharge plus rapide\r\nReconnaissance faciale rapide en temps réel, pour un déverouillage aisé', 3, 242.9, 20, 20, 'not-available.png', 11, 3),
(40, 'JBL Go Enceinte portable Bluetooth', 'Puissance : 3 watts\r\nDiffusion Bluetooth\r\nConnectivité : avec fil &amp; sans fil\r\nBatterie rechargeable\r\nAutonomie : 5 heures\r\nFonction mains libres', 3, 21.77, 20, 20, 'not-available.png', 11, 3),
(41, 'zdazdddddddddddddd', 'azdaazdazeaz', 3, 32, 21, 21, 'not-available.png', 1, 1),
(42, 'adad', 'fzfazfazfazf', 3, 12, 12, 12, 'téléchargement.png', 1, 1),
(43, 'adada', 'lilltultu', 12, 0, 1212, 1212, 'Fidget-Spinmax-Hand-Spinner-Rouge.jpg', 1, 1),
(44, 'zdazfaf', 'tutdjejeje', 3, 4577, 3, 3, 'not-available.png', 16, 3);

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
  `DateDReduction` datetime NOT NULL,
  `DateFReduction` datetime NOT NULL,
  `IdBoutique` int(11) NOT NULL,
  PRIMARY KEY (`NumReduction`),
  KEY `REDUCTION_BOUTIQUE_FK` (`IdBoutique`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reduction`
--

INSERT INTO `reduction` (`NumReduction`, `CodeReduction`, `LibelleReduction`, `MontantReduction`, `DateDReduction`, `DateFReduction`, `IdBoutique`) VALUES
(1, 'noel19', 'Réduction de Noël', 10, '2019-01-05 00:00:00', '2019-01-10 00:00:00', 11),
(2, 'test', 'test', 5, '2019-01-01 00:00:00', '2019-01-03 00:00:00', 11),
(3, 'soldejanvier19', 'Bon pour solde de Janvier', 5, '2019-01-07 00:00:00', '2019-02-09 00:00:00', 12),
(4, 'afafz', 'test', 50, '2018-01-25 00:00:00', '2019-01-30 00:00:00', 14),
(5, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `NumReservation` int(11) NOT NULL AUTO_INCREMENT,
  `DateReservation` datetime NOT NULL,
  `StatusRes` varchar(32) NOT NULL,
  `MontantRes` float NOT NULL,
  `PrixRemiseRes` float DEFAULT NULL,
  `NumClient` int(11) NOT NULL,
  PRIMARY KEY (`NumReservation`),
  KEY `RESERVATION_CLIENT_FK` (`NumClient`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`NumReservation`, `DateReservation`, `StatusRes`, `MontantRes`, `PrixRemiseRes`, `NumClient`) VALUES
(1, '2018-12-19 00:00:00', 'non traite', 449.95, NULL, 13),
(2, '2018-12-15 00:00:00', 'non traite', 21.77, NULL, 22),
(3, '2018-12-29 16:00:00', 'non traite', 264.67, NULL, 19),
(4, '2018-12-27 17:00:00', 'non traite', 121.77, NULL, 22);

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

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`NumReservation`, `CodeProduit`, `QteReserver`) VALUES
(1, 25, 1),
(2, 40, 1),
(3, 39, 1),
(3, 40, 1),
(4, 12, 1),
(4, 39, 1);

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
  ADD CONSTRAINT `LIGNECOMMANDE_COMMANDE_FK` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`),
  ADD CONSTRAINT `LIGNECOMMANDE_PRODUIT_FK` FOREIGN KEY (`CodeProduit`) REFERENCES `produit` (`CodeProduit`);

--
-- Contraintes pour la table `lignereservation`
--
ALTER TABLE `lignereservation`
  ADD CONSTRAINT `LIGNERESERVATION_BOUTIQUE0_FK` FOREIGN KEY (`IdBoutique`) REFERENCES `boutique` (`IdBoutique`),
  ADD CONSTRAINT `LIGNERESERVATION_PRODUIT_FK` FOREIGN KEY (`CodeProduit`) REFERENCES `produit` (`CodeProduit`),
  ADD CONSTRAINT `LIGNERESERVATION_RESERVATION_FK` FOREIGN KEY (`NumReservation`) REFERENCES `reservation` (`NumReservation`);

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
