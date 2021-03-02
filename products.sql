-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 02 mars 2021 à 15:43
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
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(3) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(3) NOT NULL,
  `stock` int(3) NOT NULL,
  `shortdesc` text NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `reference`, `category`, `title`, `description`, `image`, `price`, `stock`, `shortdesc`, `subcategory`) VALUES
(1, '', 'xbox', 'Minecraft Master Collection', 'Create anything you can imagine. Explore the mighty mountains and living oceans of infinite worlds, expanded further by free game updates, amazing community-made maps, servers, thrilling minigames and more! Survive online with friends on console, mobile, and Windows 10, or share the adventure at home in split-screen multiplayer. This collection includes the Minecraft base game, 1000 Minecoins, Starter Pack DLC and Creators Pack DLC.\r\nIncludes:\r\n● 1,000 MINECOINS. Use them to get maps, skins, textures packs and more from the in-game Marketplace!\r\n● STARTER PACK: Greek Mythology Mash-up, Plastic Texture Pack, Skin Pack 1, and Villains Skin Pack\r\n● CREATORS PACK: Adventurer’s Dream Mashup and Winter Mini-Games Festival by Noxcrew, Relics of the Privateers by Imagiverse, PureBDcraft Texture Pack by BDcraft, Pastel Skin Pack by Eneija, and Wildlife: Savanna by PixelHeads', 'EqRwwFJXMAMKKo8.jpeg', 49, 3, 'Create anything you can imagine. Explore the mighty mountains and living oceans of infinite worlds, expanded further by free game updates, amazing community-made maps, servers, thrilling minigames and more!', 'games'),
(2, 'Ref', 'nintendo', 'pokemon', 'dkdkdd', 'ff2a111443ab5d318c9050244dc3a634.jpg', 35, 0, 'Une nouvelle aventure Pokémon commence !\r\n\r\nAvec Pokémon Épée et Pokémon Bouclier, une nouvelle génération de jeux de rôle Pokémon arrive sur Nintendo Switch !', 'games'),
(5, '', 'nintendo', 'Pokemon Let\'s Go', '', '', 42, 0, 'Sac à dos, casquette, Poké Ball... il ne vous manque plus que votre premier Pokémon pour commencer votre aventure sur Nintendo Switch !\')', 'games'),
(7, 'fkfk', 'nintendo', 'dkkd', 'dkd', '', 55, 1, 'dod', 'games'),
(8, 'uu', 'nintendo', 'ddk', 'zkz', '62c4c4dc7682552ba0d72563fca3dbf8--posts-klance-wallpaper.jpg', 44, 1, 'dkdk', 'games'),
(10, 'uujj', 'nintendo', 'POKEMOOOON', 'zkz', 'IMG_0621.jpg', 44, 32, 'dkdk', 'games'),
(11, 'jj', 'nintendo', 'hh', 'dj', 'Esg59FiU4AA1pua.jpg', 33, 2, 'jj', 'games'),
(12, 'kk', 'nintendo', 'jj', 'jj', 'Escq5HTXMAcmlLe.jpg', 2, 0, 'kk', 'secondhand'),
(13, 'kkjjjjk', 'xbox', 'Jojo', 'fkke', '89a2884d3501922fd5a2cdd50be5d756--drawing-reference-poses-posing-drawing.jpg', 40, 4, 'jedofcd', 'secondhand'),
(14, 'fkkeozf', 'nintendo', 'kkgk', 'efezfze', 'coat-PAFrock-lrg.jpg', 34, 2, 'efzdsfze', 'games');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
