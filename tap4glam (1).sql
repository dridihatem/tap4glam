-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 17 déc. 2018 à 14:24
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tap4glam`
--

-- --------------------------------------------------------

--
-- Structure de la table `tap_administrator`
--

CREATE TABLE `tap_administrator` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motPasse` varchar(255) NOT NULL,
  `motPasseMd5` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1- superadmin, 2 webmaster',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_administrator`
--

INSERT INTO `tap_administrator` (`id`, `login`, `motPasse`, `motPasseMd5`, `type`, `date`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2018-12-13');

-- --------------------------------------------------------

--
-- Structure de la table `tap_categorie`
--

CREATE TABLE `tap_categorie` (
  `id` int(11) NOT NULL,
  `titreFr` varchar(255) NOT NULL,
  `descriptionFr` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `publication` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_client`
--

CREATE TABLE `tap_client` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `code_vip` int(11) NOT NULL,
  `code_promo` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motPasse` varchar(255) NOT NULL,
  `motPasseMd5` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `region` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_connexion` datetime NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_code_promo`
--

CREATE TABLE `tap_code_promo` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_code_vip`
--

CREATE TABLE `tap_code_vip` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_commande`
--

CREATE TABLE `tap_commande` (
  `id` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adresse_livraison` text NOT NULL,
  `id_paiement` int(11) NOT NULL,
  `type_paiement` int(11) NOT NULL COMMENT '1-montant total , 2 : avance , 3 a la livraison'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_fournisseur`
--

CREATE TABLE `tap_fournisseur` (
  `id` int(11) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `registre_commerce` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `motPasse` varchar(255) NOT NULL,
  `motPasseMd5` varchar(255) NOT NULL,
  `date_insertion` datetime NOT NULL,
  `publication` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_mode_paiement`
--

CREATE TABLE `tap_mode_paiement` (
  `id` int(11) NOT NULL,
  `mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_module`
--

CREATE TABLE `tap_module` (
  `id` int(11) NOT NULL,
  `nomFr` varchar(255) NOT NULL,
  `nomEn` varchar(255) NOT NULL,
  `nomAr` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contenuFr` varchar(255) NOT NULL,
  `contenuEn` longtext NOT NULL,
  `contenuAr` longtext CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `menu1` int(11) NOT NULL,
  `moduleParent` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `seotitle` varchar(255) NOT NULL,
  `seodescription` text NOT NULL,
  `seokey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_module`
--

INSERT INTO `tap_module` (`id`, `nomFr`, `nomEn`, `nomAr`, `contenuFr`, `contenuEn`, `contenuAr`, `image`, `menu1`, `moduleParent`, `ordre`, `type`, `seotitle`, `seodescription`, `seokey`) VALUES
(1, 'Accueil', '', '', '<p>qss</p>\r\n', '', '', '', 1, 0, 0, 'Home', 'ss', '', ''),
(2, 'Services', '', '', '', '', '', '', 1, 0, 2, 'Services', '', '', ''),
(3, 'Contact', '', '', '', '', '', '', 1, 0, 3, 'Module', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `tap_option_service`
--

CREATE TABLE `tap_option_service` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date1` date NOT NULL,
  `prix1` float NOT NULL,
  `prix_promo1` float NOT NULL,
  `date2` date NOT NULL,
  `prix2` float NOT NULL,
  `prix_promo2` float NOT NULL,
  `date3` date NOT NULL,
  `prix3` float NOT NULL,
  `prix_promo3` float NOT NULL,
  `id_service` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_prestataire`
--

CREATE TABLE `tap_prestataire` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motPasse` varchar(255) NOT NULL,
  `motPasseMd5` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date_insertion` varchar(255) NOT NULL,
  `publication` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_prix_service`
--

CREATE TABLE `tap_prix_service` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `prix` float NOT NULL,
  `prix_promo` float NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_region`
--

CREATE TABLE `tap_region` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_reservation`
--

CREATE TABLE `tap_reservation` (
  `id` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_prestataire` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_mode_paiement` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL,
  `date_insertion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_service`
--

CREATE TABLE `tap_service` (
  `id` int(11) NOT NULL,
  `titreFr` varchar(255) NOT NULL,
  `titreEn` varchar(255) NOT NULL,
  `titreAr` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descriptionFr` longtext NOT NULL,
  `descriptionEn` longtext NOT NULL,
  `descriptionAr` longtext CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) NOT NULL,
  `pack` tinyint(1) NOT NULL,
  `date_insertion` datetime NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `id_prestataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tap_sous_categorie`
--

CREATE TABLE `tap_sous_categorie` (
  `id` int(11) NOT NULL,
  `titreFr` varchar(255) NOT NULL,
  `descriptionFr` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `publication` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tap_administrator`
--
ALTER TABLE `tap_administrator`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_categorie`
--
ALTER TABLE `tap_categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_client`
--
ALTER TABLE `tap_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_code_promo`
--
ALTER TABLE `tap_code_promo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_commande`
--
ALTER TABLE `tap_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_fournisseur`
--
ALTER TABLE `tap_fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_mode_paiement`
--
ALTER TABLE `tap_mode_paiement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_module`
--
ALTER TABLE `tap_module`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_option_service`
--
ALTER TABLE `tap_option_service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_prestataire`
--
ALTER TABLE `tap_prestataire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_prix_service`
--
ALTER TABLE `tap_prix_service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_region`
--
ALTER TABLE `tap_region`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_reservation`
--
ALTER TABLE `tap_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_service`
--
ALTER TABLE `tap_service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tap_sous_categorie`
--
ALTER TABLE `tap_sous_categorie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tap_administrator`
--
ALTER TABLE `tap_administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tap_categorie`
--
ALTER TABLE `tap_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_client`
--
ALTER TABLE `tap_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_code_promo`
--
ALTER TABLE `tap_code_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_commande`
--
ALTER TABLE `tap_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_fournisseur`
--
ALTER TABLE `tap_fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_mode_paiement`
--
ALTER TABLE `tap_mode_paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_module`
--
ALTER TABLE `tap_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tap_option_service`
--
ALTER TABLE `tap_option_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_prestataire`
--
ALTER TABLE `tap_prestataire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_prix_service`
--
ALTER TABLE `tap_prix_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_region`
--
ALTER TABLE `tap_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_reservation`
--
ALTER TABLE `tap_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_service`
--
ALTER TABLE `tap_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_sous_categorie`
--
ALTER TABLE `tap_sous_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
