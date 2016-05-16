-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 03 Janvier 2016 à 19:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `P62_DBkitDem_lite`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id (clef principale) de l''article',
  `name` varchar(256) NOT NULL COMMENT 'Nom de l''article ',
  `category_id` int(11) DEFAULT NULL COMMENT 'Catégorie à laquelle appartient l''article',
  `description` varchar(1024) NOT NULL COMMENT 'Description de l''article',
  `picture` varchar(128) NOT NULL COMMENT 'Photo de l''article',
  `price` decimal(8,2) DEFAULT NULL COMMENT 'Prix de l''article',
  `is_online` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Indique si l''article est affiché ou pas',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table des articles (forfaits, livres, metériel, etc...) du site' AUTO_INCREMENT=52 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `name`, `category_id`, `description`, `picture`, `price`, `is_online`) VALUES
(1, 'Céline au Centre Bell', 1, 'Bla bla bla en HTML', 'photo_article.jpg', '159.99', 1),
(2, 'Grand prix cycliste de Montréal', 2, 'Bla bla bla en HTML', 'photo_article.jpg', '98.90', 1),
(3, 'Lady Gaga au centre Bell', 1, 'Bla bla bla en HTML', 'photo_article.jpg', '134.00', 1),
(4, 'Formule 1 au Parc Jean Drapeau', 2, 'Bla bla bla en HTML', 'photo_article.jpg', '225.00', 1),
(5, 'Concert des Fifty Six', 1, 'Bla bla bla en HTML', 'photo_article.jpg', '112.00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `item_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id (clef principale) catégorie',
  `name` varchar(256) NOT NULL COMMENT 'Nom de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table des catégories des articles du site' AUTO_INCREMENT=4 ;

--
-- Contenu de la table `item_category`
--

INSERT INTO `article_category` (`id`, `name`) VALUES
(1, 'Musique'),
(2, 'Sport'),
(3, 'Sciences');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id (clef principale) utilisateur',
  `username` varchar(128) NOT NULL COMMENT 'Username',
  `password_hash` varchar(128) NOT NULL COMMENT 'Hash du mot de passe',
  `firstname` varchar(128) NOT NULL COMMENT 'Prénom',
  `lastname` varchar(256) NOT NULL COMMENT 'Nom',
  `email` varchar(128) NOT NULL COMMENT 'Adresse courriel utilisateur',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table des utilisateurs du site' AUTO_INCREMENT=191 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `firstname`, `lastname`, `email`) VALUES
(188, 'gp', '$2y$10$qgHMNfbLXi0C90dMVratou9TMQ/zf9Le/mIkVQF9856lYlZvVHKg2', 'Gilles', 'Pénissard', 'gilles.penissard@isi-mtl.com'),
(189, 'pinocchio', '$2y$10$HMedEASO9EmJAYK0MayBzud05y.WacMwvtilOCivigCMFlVkGSHS2', 'Pinocchio', 'La marionetta', 'pinocchio.marionetta@isi-mtl.com'),
(190, 'jiminy', '$2y$10$bmywgS/L.oHNJnZnI4Xc9e82yzLkQjQoFXthoBatwVBRhRQik7scW', 'Jiminy', 'Cricket', 'jiminy.cricket@isi-mtl.com');


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `article_category` (`id`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
