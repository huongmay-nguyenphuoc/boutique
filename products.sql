-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 05 mars 2021 à 14:35
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `products` (
  `id_product` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(3) NOT NULL,
  `stock` int(3) NOT NULL,
  `shortdesc` text NOT NULL,
  `subcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `reference`, `category`, `title`, `description`, `image`, `price`, `stock`, `shortdesc`, `subcategory`) VALUES
(15, 'Blastful', 'playstation', 'Blastful', 'Blastful is a fast-paced arcade shoot-em-up.\r\n*Enjoy crazy shooting action in procedurally generated visuals with retro style.\r\n*Cyberpunk flavored techno-beats.\r\n*Blast your way through 10 different types of enemies with 5 different weapons.', 'blastful.jpeg', 14, 3, 'Blastful is a fast-paced arcade shoot-em-up.\r\n*Enjoy crazy shooting action in procedurally generated visuals with retro style.\r\n*Cyberpunk flavored techno-beats.\r\n*Blast your way through 10 different types of enemies with 5 different weapons.', 'games'),
(16, 'Dungeons AND Bombs', 'playstation', 'Dungeons AND Bombs', 'This is dynamic fusion of classic puzzles with boxes and bombs. When enemies drag people into their dark lair and do their vile deeds there, the hero and his faithful sword always come to the rescue. But what if the hero does not have a sword, but only a lot of enthusiasm and an endless supply of explosives? Well, bad for them. Go through dark labyrinths of dungeons and try not to blast yourself up!\r\n\r\n*Cyberpunk flavored techno-beats.\r\n*Blast your way through 10 different types of enemies with 5 different weapons.', 'Dungeons &amp; Bombs .jpeg', 10, 4, 'This is dynamic fusion of classic puzzles with boxes and bombs. When enemies drag people into their dark lair and do their vile deeds there, the hero and his faithful sword always come to the rescue. But what if the hero does not have a sword, but only a lot of enthusiasm and an endless supply of ex', 'games'),
(17, 'Taxi Chaos', 'playstation', 'Taxi Chaos', 'Power through midtown in a strong muscle car, race past all parks in an exotic supercar or drift around the business area in a Japanese tuner taxi. Whicher you choose - your challenge is to deliver your passengers on time! At least, if you want to make any money.\r\n\r\nNavigate through crowded streets, dodge pedestrians across sidewalks or even defy the laws of gravity by jumping over rooftops! Nothing is too extreme when it comes to delivering your passengers on time! Discover the best shortcuts and get to know New Yellow City (NYC), as well as your passengers, like the back of your hand.', 'sddefault.jpg', 25, 2, 'Power through midtown in a strong muscle car, race past all parks in an exotic supercar or drift around the business area in a Japanese tuner taxi. Whicher you choose - your challenge is to deliver your passengers on time! At least, if you want to make any money.\r\n\r\nNavigate through crowded streets, d', 'games'),
(18, 'Xbox X', 'xbox', 'Xbox X', 'Voici la Xbox Series X, notre console la plus rapide et la plus puissante jamais conçue, pour une génération de consoles qui vous place, vous, le joueur, au centre.', 'Console-Microsoft-Xbox-Series-X-Noir.jpg', 500, 5, 'Voici la Xbox Series X, notre console la plus rapide et la plus puissante jamais conçue, pour une génération de consoles qui vous place, vous, le joueur, au centre.', 'consoles'),
(19, 'Xbox S', 'xbox', 'Xbox S', 'La console Xbox One S (« slim ») a tout d\'une grande. Plus fine que les autres modèles, elle possède jusqu\'à 2 To de stockage. Elle est également dotée de la technologie HDR, pour des couleurs plus lumineuses et un rendu à l\'écran sans précédent, mais aussi d\'une résolution quatre fois plus importante que la résolution HD, vous permettant ainsi de visionner des Blu-ray 4k ! ', 'b7414f03-9878-4ed3-a9a4-b4ab8f19ca97.jpg', 300, 5, 'La console Xbox One S (« slim ») a tout d\'une grande. Plus fine que les autres modèles, elle possède jusqu\'à 2 To de stockage. Elle est également dotée de la technologie HDR, pour des couleurs plus lumineuses et un rendu à l\'écran sans précédent, mais aussi d\'une résolution quatre fois plus importan', 'consoles'),
(20, 'Xbox S', 'xbox', 'SECONDHAND box S', 'La console Xbox One S (« slim ») a tout d\'une grande. Plus fine que les autres modèles, elle possède jusqu\'à 2 To de stockage. Elle est également dotée de la technologie HDR, pour des couleurs plus lumineuses et un rendu à l\'écran sans précédent, mais aussi d\'une résolution quatre fois plus importante que la résolution HD, vous permettant ainsi de visionner des Blu-ray 4k !', '2.jpg', 40, 3, 'La console Xbox One S (« slim ») a tout d\'une grande. Plus fine que les autres modèles, elle possède jusqu\'à 2 To de stockage. Elle est également dotée de la technologie HDR, pour des couleurs plus lumineuses et un rendu à l\'écran sans précédent, mais aussi d\'une résolution quatre fois plus importan', 'secondhand');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
