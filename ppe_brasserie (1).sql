-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 09 mai 2021 à 16:29
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ppe_brasserie`
--

-- --------------------------------------------------------

--
-- Structure de la table `biere`
--

CREATE TABLE `biere` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `biere`
--

INSERT INTO `biere` (`id`, `nom`) VALUES
(1, 'laSagesse'),
(2, 'la Bonté'),
(3, 'La Douceur Basique'),
(4, 'La Brute');

-- --------------------------------------------------------

--
-- Structure de la table `brassin`
--

CREATE TABLE `brassin` (
  `code` int(11) NOT NULL,
  `nomBiere` varchar(50) NOT NULL,
  `dateBrass` datetime NOT NULL,
  `dateMiseBout` datetime NOT NULL,
  `volume` double NOT NULL,
  `pourAlcool` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `brassin`
--

INSERT INTO `brassin` (`code`, `nomBiere`, `dateBrass`, `dateMiseBout`, `volume`, `pourAlcool`) VALUES
(1, 'la Bonté', '2020-12-17 00:00:00', '2020-12-20 00:00:00', 4.8, 1.5),
(2, 'laSagesse', '2020-12-05 00:00:00', '2020-12-17 00:00:00', 2.5, 3.5),
(3, 'La Douceur Basique', '2020-12-07 00:00:00', '2020-12-18 00:00:00', 1.8, 4.8),
(4, 'La Brute', '2020-12-13 00:00:00', '2020-12-22 00:00:00', 5.8, 1.5),
(10, 'La Redemption', '2021-01-03 00:00:00', '2021-01-14 00:00:00', 2.5, 6.5);

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE `mouvement` (
  `id` int(11) NOT NULL,
  `dateMouv` date NOT NULL,
  `contenance` double NOT NULL,
  `nbBouteilles` int(11) NOT NULL,
  `stockMois` int(11) NOT NULL,
  `stockRealise` int(11) NOT NULL,
  `sortieVendues` int(11) NOT NULL,
  `sortieDeg` int(11) NOT NULL,
  `sortieFinMois` int(11) NOT NULL,
  `volSorties` int(11) NOT NULL,
  `coutDouane` int(11) NOT NULL,
  `nomBrassin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mouvement`
--

INSERT INTO `mouvement` (`id`, `dateMouv`, `contenance`, `nbBouteilles`, `stockMois`, `stockRealise`, `sortieVendues`, `sortieDeg`, `sortieFinMois`, `volSorties`, `coutDouane`, `nomBrassin`) VALUES
(1, '2020-12-17', 2.6, 25, 25, 25, 14, 14, 14, 40, 0, 'Bonté'),
(4, '2020-12-21', 2.9, 32, 32, 32, 22, 22, 22, 44, 0, 'Sagesse'),
(6, '2021-01-03', 3.2, 28, 28, 28, 24, 24, 24, 52, 149, 'Redemption');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `logi` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `logi`, `mdp`, `nom`, `prenom`) VALUES
(6, 'administrateur', '0550002D', 'Oster', 'Steven');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `biere`
--
ALTER TABLE `biere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brassin`
--
ALTER TABLE `brassin`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `biere`
--
ALTER TABLE `biere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `brassin`
--
ALTER TABLE `brassin`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `mouvement`
--
ALTER TABLE `mouvement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
