-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 12 fév. 2021 à 14:41
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `date_register` date NOT NULL,
  `state` enum('being processed','send','delivered') NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id_order`, `id_member`, `amount`, `date_register`, `state`) VALUES
(26, 1, 154, '2021-02-11', 'being processed'),
(27, 1, 105, '2021-02-11', 'being processed'),
(28, 1, 126, '2021-02-12', 'being processed');

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id_order_details` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id_order_details`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`id_order_details`, `id_order`, `id_product`, `quantity`, `price`) VALUES
(23, 26, 2, 2, 35),
(24, 26, 5, 2, 42),
(25, 27, 2, 3, 35),
(26, 28, 5, 3, 42);

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` varchar(255) NOT NULL,
  `payment_status` text NOT NULL,
  `payment_amount` text NOT NULL,
  `payment_currency` text NOT NULL,
  `payment_date` datetime NOT NULL,
  `payer_email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(3) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price` int(3) NOT NULL,
  `stock` int(3) NOT NULL,
  `shortdesc` text NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `reference`, `category`, `title`, `description`, `picture`, `price`, `stock`, `shortdesc`, `subcategory`) VALUES
(1, '', 'xbox', 'Minecraft Master Collection', 'Create anything you can imagine. Explore the mighty mountains and living oceans of infinite worlds, expanded further by free game updates, amazing community-made maps, servers, thrilling minigames and more! Survive online with friends on console, mobile, and Windows 10, or share the adventure at home in split-screen multiplayer. This collection includes the Minecraft base game, 1000 Minecoins, Starter Pack DLC and Creators Pack DLC.\r\nIncludes:\r\n● 1,000 MINECOINS. Use them to get maps, skins, textures packs and more from the in-game Marketplace!\r\n● STARTER PACK: Greek Mythology Mash-up, Plastic Texture Pack, Skin Pack 1, and Villains Skin Pack\r\n● CREATORS PACK: Adventurer’s Dream Mashup and Winter Mini-Games Festival by Noxcrew, Relics of the Privateers by Imagiverse, PureBDcraft Texture Pack by BDcraft, Pastel Skin Pack by Eneija, and Wildlife: Savanna by PixelHeads', '', 49, 5, 'Create anything you can imagine. Explore the mighty mountains and living oceans of infinite worlds, expanded further by free game updates, amazing community-made maps, servers, thrilling minigames and more!', 'games'),
(2, '', 'nintendo', 'pokemon', '', '', 35, 0, '\r\nUne nouvelle aventure Pokémon commence !\r\n\r\nAvec Pokémon Épée et Pokémon Bouclier, une nouvelle génération de jeux de rôle Pokémon arrive sur Nintendo Switch !', 'games'),
(5, '', 'nintendo', 'Pokemon Let\'s Go', '', '', 42, 0, 'Sac à dos, casquette, Poké Ball... il ne vous manque plus que votre premier Pokémon pour commencer votre aventure sur Nintendo Switch !\')', 'games');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zip` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adress` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_member`, `login`, `password`, `lastname`, `firstname`, `email`, `city`, `zip`, `adress`, `status`) VALUES
(1, 'may', '$2y$10$GGCt3z0Di.0FbJWLRmtgCueROfrq3wKmkN.5NBWq9t5MKY2VzFnyy', 'may', 'may', 'may@hotmail.fr', 'Marseille', 13001, '8 rue d\'hozier', 0),
(3, 'admin', '$2y$10$R8HHF15lCT6oD8l7TKMBJuzAPGTOdZV7lWD5NOKyjFOjjcM.oPPAS', 'admin', 'admin', 'admin@hotmail.fr', 'Marseille', 13001, '8 rue d\'Hozier', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
