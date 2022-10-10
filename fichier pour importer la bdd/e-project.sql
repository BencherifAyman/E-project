-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 20 Juin 2022 à 15:32
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `e-project`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessoire`
--

CREATE TABLE IF NOT EXISTS `accessoire` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Produit` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `Prix_Unitaire` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produit`),
  FULLTEXT KEY `Nom_Produit` (`Nom_Produit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `accessoire`
--

INSERT INTO `accessoire` (`id_produit`, `Nom_Produit`, `image`, `description`, `Prix_Unitaire`) VALUES
(8, 'Manette Xbox', 'manetteXbox.png', 'Manette Xbox série X', 40),
(7, 'Manette PS5', 'manettePS5.jpg', 'Manette Playstation 5', 70),
(9, 'Manette Switch', 'manetteSwitch.jpg', 'Manette Switch pro', 59.99);

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

CREATE TABLE IF NOT EXISTS `console` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Produit` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `Prix_Unitaire` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produit`),
  FULLTEXT KEY `Nom_Produit` (`Nom_Produit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `console`
--

INSERT INTO `console` (`id_produit`, `Nom_Produit`, `image`, `description`, `Prix_Unitaire`) VALUES
(4, 'PS5', 'ps5.jpg', 'Console Playstation 5', 499),
(5, 'Xbox serie X', 'xbox.jpg', 'Console Xbox serie X', 499),
(6, 'Nintendo Switch', 'switch.jpg', 'Console Nintendo Switch', 260);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `Idcom` int(255) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) NOT NULL,
  `commentaire` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Idcom`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`Idcom`, `id_user`, `commentaire`, `Date`) VALUES
(3, 21, 'Je test à  nouveau ', '2022-06-20 00:54:55');

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE IF NOT EXISTS `jeu` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Produit` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `Prix_Unitaire` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produit`),
  FULLTEXT KEY `Nom_Produit` (`Nom_Produit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`id_produit`, `Nom_Produit`, `image`, `description`, `Prix_Unitaire`) VALUES
(1, 'LEGO Star Wars', 'starwars.jpg', 'La galaxie vous appartient, dans ce nouveau jeu!\r\n\r\n', 37.79),
(2, 'Sniper Elite 5', 'sniperelite.jpg', 'Sniper Elite 5, le dernier volet de la franchise primée.', 37.49),
(3, 'Dune: Spice Wars', 'spicewars.jpg', 'Jeu de stratégie en temps réel intégrant des éléments 4X.', 19.66);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `Num_Commande` int(255) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  PRIMARY KEY (`Num_Commande`,`id_produit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`Num_Commande`, `id_produit`, `id_user`, `Quantite`) VALUES
(5, 3, 26, 2),
(36, 6, 21, 13),
(35, 1, 21, 20),
(31, 9, 21, 2),
(30, 7, 21, 5),
(29, 2, 21, 10);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `anniversaire` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `sexe`, `prenom`, `nom`, `anniversaire`) VALUES
(21, 'BESTBUFFPCK4EVER', 'bakoror93@hotmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Homme', 'Ayman', 'BENCHERIF', '2001-07-23'),
(23, 'capripri', 'bakoror@hotmail.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Homme', 'Ayman', 'BENCHERIF', '2001-07-23'),
(25, 'capripri', 'bakoror93@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Homme', 'Ayman', 'BENCHERIF', '2001-07-23'),
(26, 'LUNH', 'lunh@hotmail.fr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Homme', 'lunh', 'lunh', '2001-08-07'),
(1, 'visiteur', '', '', 'N/A', '', '', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
