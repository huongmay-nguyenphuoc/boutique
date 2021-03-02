-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 02 mars 2021 à 11:57
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
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_message` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_message` date NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_message`, `message`, `date_message`, `id_member`, `title`) VALUES
(2, 'sls,dòsdjs^do\r\njs\r\nd^', '2021-03-05', 2, 'TITLE'),
(3, 'sfsfsfs', '2021-03-24', 2, 'TITLE'),
(4, 'sd', '2021-03-12', 2, 'DJ'),
(5, 'sdij', '2021-03-12', 3, 'TITLE2'),
(6, 'csYour message', '2021-03-01', 1, 'LOL'),
(7, 'Your messageco', '2021-03-01', 1, 'contrôle'),
(8, 'Your message', '2021-03-01', 1, ''),
(9, 'Your message', '2021-03-01', 1, 'sd'),
(10, 'ljd', '2021-03-01', 1, 'f'),
(11, 'sdsdds', '2021-03-01', 1, 'sdsdsdsd');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_message`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
