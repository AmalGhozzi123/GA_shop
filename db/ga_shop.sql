-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 oct. 2023 à 15:33
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ga_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'ghofrane', '0', 'ghajtaieb@gmail.com', '$2y$10$o4aIHiEt8KPmwd6Qhp2O9e0bsiv.sSqXJHXm5Ti/qlRDzhxuJu.OC'),
(0, 'amal', 'ghozzi', 'amalghozzi@gmail.com', '$2y$10$o4aIHiEt8KPmwd6Qhp2O9e0bsiv.sSqXJHXm5Ti/qlR...\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'vetements hommeee'),
(4, 'maison et jardin'),
(12, 'mode et beauté'),
(15, 'Vetements Femme'),
(16, 'Électronique '),
(17, 'Accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `client_id` int(10) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `numero_tlp` varchar(100) NOT NULL,
  `adresse` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `prenom`, `nom`, `email`, `password`, `numero_tlp`, `adresse`) VALUES
(1, 'amal', 'ghozzi', 'amal@gmail.com', '8e5b6ab39acd97283f413fd11acf7ba5', '96898521', '???? ??????? ?????? ??????? ??? 10 ????? 5 ??????? ????? ????'),
(30, 'ghozzi', 'amal', 'amalghozzi@gmail.com', '1d3f50d094a94e59bcb4ece4f07a7ed0', '96898514', '???? ??????? ?????? ??????? ??? 10 ????? 5 ??????? ????? ????'),
(32, 'Amal', 'Ghozzi', 'amalghozzi2002@gmail.com', '1d3f50d094a94e59bcb4ece4f07a7ed0', '96898521', 'Bardo');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `commande_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`commande_id`, `client_id`, `produit_id`, `quantite`, `trx_id`, `status`) VALUES
(5, 1, 1, 2, '1', 'Livré');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `client_id` int(10) DEFAULT NULL,
  `quantite` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `p_id`, `ip_add`, `client_id`, `quantite`) VALUES
(67, 8, '::1', 20, 1),
(68, 5, '::1', 21, 1),
(71, 8, '::1', 22, 1),
(73, 9, '::1', 25, 1),
(74, 11, '::1', 26, 1),
(80, 15, '::1', 27, 1),
(81, 11, '::1', 27, 1),
(82, 5, '::1', 28, 1),
(83, 8, '::1', 29, 1),
(86, 8, '::1', 30, 1),
(88, 9, '::1', 30, 1),
(91, 5, '::1', 32, 1),
(92, 5, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `marque_id` int(100) NOT NULL,
  `nom_marque` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`marque_id`, `nom_marque`) VALUES
(1, 'essence'),
(2, 'maybelline'),
(3, 'makeup_revolution'),
(4, 'dior'),
(10, 'Nars'),
(11, 'Samsung'),
(12, 'iphone');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `produit_id` int(100) NOT NULL,
  `produit_cat` int(11) NOT NULL,
  `produit_marque` int(100) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `prix` int(100) NOT NULL,
  `quantite` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`produit_id`, `produit_cat`, `produit_marque`, `nom_produit`, `prix`, `quantite`, `description`, `image`) VALUES
(5, 16, 11, 'Samsung Galaxy S10', 1800, 5000, 'Samsung Galaxy S10', '1685644190_1684398163_1552671096_7-2-samsung-mobile-phone-png-clipart-thumb.png'),
(8, 15, 4, 'Robe dior', 200, 120, 'Robe dior', '1684398071_7475-ladies-casual-dresses-summer-two-colors-pleated.jpg'),
(10, 16, 11, 'PC', 3700, 120, 'Good pc', '1685644209_12039452_525963140912391_6353341236808813360_n.png'),
(11, 16, 4, 'Téléviseur', 2500, 70, 'aa', '1685578494_t.jpg'),
(13, 3, 3, 'Chaussures', 360, 90, 'aaa', '1685578664_ch.jpg'),
(14, 16, 1, 'Console de jeux vidéo', 1800, 20, 'aa', '1685578742_c.jpg'),
(15, 16, 3, 'Appareil photo', 1500, 30, 'a', '1685578889_camera.jpg'),
(16, 17, 1, 'Sac à dos', 70, 120, 'aa', '1685579085_sac.jpg'),
(17, 17, 12, 'Bracelet connecté ', 250, 130, 'hh', '1685644243_1685579098_b.jpg'),
(19, 16, 1, 'Mixer', 350, 12, 'ff', '1685579330_mixer.jpg'),
(20, 4, 4, 'Fer à repasser ', 250, 13, 'gg', '1685579382_iron.JPG'),
(21, 4, 1, 'Grille-pain ', 150, 12, 'eff', '1685579704_gg.jpg'),
(22, 4, 3, 'Tondeuse à gazon ', 500, 13, 'nn', '1685579546_tt.jpg'),
(23, 4, 4, 'Arroseur automatique', 650, 130, 'aa', '1685579652_aaa.jpg'),
(24, 15, 1, 'Jube', 40, 13, 'aa', '1685579813_jube.jpg'),
(25, 12, 1, 'Blush', 70, 140, 'aaaa', '1685579892_1684398025_blush.jpg'),
(26, 12, 4, 'Rouge à lévre', 120, 45, 'aa', '1685580055_kk.jpg'),
(27, 12, 1, 'Mascara', 140, 120, 'aa', '1685580098_1683792029_1683791713_mascara.jpg'),
(28, 12, 10, 'Nars cache_cernes', 120, 120, 'eeee', '1685644384_nars.jpg'),
(29, 12, 2, 'Maybeliine Gloss', 89, 4, 'aa', '1685644478_gloas.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`commande_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`marque_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`produit_id`),
  ADD KEY `fk_product_cat` (`produit_cat`),
  ADD KEY `fk_product_brand` (`produit_marque`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `commande_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `marque_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `produit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`produit_marque`) REFERENCES `marques` (`marque_id`),
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`produit_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
