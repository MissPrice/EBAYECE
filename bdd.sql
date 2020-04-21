-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2020 at 07:29 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `IdItem` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `Video` varchar(255) DEFAULT NULL,
  `Prix` varchar(11) NOT NULL,
  `Categorie` varchar(3) NOT NULL,
  `IdVendeur` varchar(11) NOT NULL,
  PRIMARY KEY (`IdItem`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`IdItem`, `Nom`, `Photo`, `Description`, `Video`, `Prix`, `Categorie`, `IdVendeur`) VALUES
(6, 'montre diamant swarovski', 'montre-eternal-bracelet-metal-blanc-or-rose-swarovski.jpg', 'boitier en acier inoxydable de couleur or rose et cristaux Swarovski.', NULL, '329', '3', '2'),
(5, 'MUG Noel', 'mugnoel.jpg', 'Mug de noel rouge et blanc pour cafÃ© ou thÃ©', NULL, '8', '1', '4'),
(4, 'Manette Xbox One', 'xboxone_controller.jpg', 'Manette Xbox One parfaitement fonctionnelle achetÃ©e il y a un an', NULL, '11', '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `IdLivraison` int(11) NOT NULL AUTO_INCREMENT,
  `IdLogin` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`IdLivraison`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`IdLivraison`, `IdLogin`, `Nom`, `Prenom`, `Adresse`) VALUES
(1, 2, 'Barroyer', 'Phenix', 'Grenoble'),
(2, 1, 'Price', 'Chloe', 'Versailles'),
(3, 3, 'Yuffy', 'Moira', 'Bordeaux');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `IdLogin` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Niveau` varchar(255) NOT NULL DEFAULT 'acheteur',
  PRIMARY KEY (`IdLogin`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`IdLogin`, `Login`, `Mdp`, `Niveau`) VALUES
(1, 'chloe.baut@edu.ece.fr', '1234abcd', 'admin'),
(2, 'phoenix@edu.ece.fr', '4444', 'acheteur'),
(3, 'tipoui@edu.ece.fr', '55555', 'vendeur'),
(4, 'julia.roberts@edu.ece.fr', 'jr12', 'acheteur');

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `IdPaiement` int(11) NOT NULL AUTO_INCREMENT,
  `IdLogin` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Numero` int(255) NOT NULL,
  `NomPrenom` varchar(255) NOT NULL,
  `DateExp` varchar(6) NOT NULL,
  `Code` text NOT NULL,
  PRIMARY KEY (`IdPaiement`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paiement`
--

INSERT INTO `paiement` (`IdPaiement`, `IdLogin`, `Type`, `Numero`, `NomPrenom`, `DateExp`, `Code`) VALUES
(1, 3, 'VISA', 1111111111, 'Moira Yuffy', '092022', '67');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `IDproduit` int(11) NOT NULL AUTO_INCREMENT,
  `NomProduit` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `NomImage` varchar(255) NOT NULL,
  PRIMARY KEY (`IDproduit`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`IDproduit`, `NomProduit`, `Prix`, `NomImage`) VALUES
(1, 'une table', 10, 'kratos_avatar.jpg'),
(2, 'Chaise', 25, 'Drapeau_Nilfgaard.jfif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
