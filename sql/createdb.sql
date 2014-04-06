-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 05 Avril 2014 à 19:40
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `minishop`
--
CREATE DATABASE IF NOT EXISTS `minishop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `minishop`;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user` int(11) NOT NULL,
  `cart_product` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  UNIQUE KEY `cart_user` (`cart_user`,`cart_product`),
  KEY `cart_product` (`cart_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(256) NOT NULL,
  `cat_description` text,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(256) NOT NULL,
  `product_description` text,
  `product_price` float NOT NULL,
  `product_category` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_type`) VALUES
(1, 'root', '06948d93cd1e0855ea37e75ad516a250d2d0772890b073808d831c438509190162c0d890b17001361820cffc30d50f010c387e9df943065aa8f4e92e63ff060c', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_user`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_product`) REFERENCES `products` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
