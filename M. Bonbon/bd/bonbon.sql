-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 mai 2022 à 17:41
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bonbon`
--

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int NOT NULL AUTO_INCREMENT,
  `noProduit` smallint NOT NULL,
  `quantite` smallint NOT NULL,
  `datePanier` datetime NOT NULL,
  PRIMARY KEY (`idPanier`,`noProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idPanier`, `noProduit`, `quantite`, `datePanier`) VALUES
(1, 7, 123, '2022-05-28 00:00:00'),
(2, 9, 12, '2022-05-06 00:00:00'),
(3, 8, 123, '2022-05-06 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` smallint NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `fournisseur` varchar(50) DEFAULT NULL,
  `quantite` smallint DEFAULT NULL,
  `format` varchar(25) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=FIXED;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `fournisseur`, `quantite`, `format`, `prix`, `description`) VALUES
(1, 'Sucette', 'Mondoux', 150, '1 kg', 15.78, 'Chaque sucon est enveloppé individuellement.'),
(2, 'Caramel', 'Kraft', 375, '1 kg', 15.98, 'Chaque caramel est enveloppé individuellement.'),
(3, 'Réglisse', 'LudikCandy', 64, '1 kg', 12.99, 'Chaque sucon est enveloppé individuellement.'),
(4, 'Guimauve', 'Oscar', 2000, '1 kg', 15.98, 'Chaque caramel est enveloppé individuellement.'),
(5, 'Chocolat', 'Cadbury', 555, '1 kg', 12.99, 'Chaque sucon est enveloppé individuellement.'),
(6, 'Canne', 'Bonbons ACME', 1250, '4 kg', 19.98, 'Chaque caramel est enveloppé individuellement.'),
(7, 'Smarties', 'Mondoux', 99, '1 kg', 12.99, 'Chaque sucon est enveloppé individuellement.'),
(8, 'Jujube', 'LudikCandy', 495, '1 kg', 15.99, 'Chaque caramel est enveloppé individuellement.'),
(9, 'Collier', 'Distribution LPD', 150, '1 kg', 12.99, 'Chaque sucon est enveloppé individuellement.'),
(10, 'Tube de Poudre', 'Bensus', 632, '1 kg', 15.98, 'Chaque caramel est enveloppé individuellement.');

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `idUsager` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`idUsager`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`idUsager`, `Email`, `Password`) VALUES
(1, '202130878@collegealma.ca', '12345'),
(2, 'root', '12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
