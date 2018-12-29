-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 22 déc. 2018 à 00:01
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
  `titreEn` varchar(255) NOT NULL,
  `titreAr` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descriptionFr` longtext NOT NULL,
  `descriptionEn` longtext NOT NULL,
  `descriptionAr` longtext CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `publication` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_categorie`
--

INSERT INTO `tap_categorie` (`id`, `titreFr`, `titreEn`, `titreAr`, `descriptionFr`, `descriptionEn`, `descriptionAr`, `image`, `publication`) VALUES
(3, 'Coiffure', '', '', '', '', '', '8d11f61fd6978cd12416620852bd85b2.JPG', 1),
(4, 'Onglerie', '', '', '', '', '', '', 1),
(5, 'Epilation', '', '', '', '', '', '', 1),
(6, 'Maquillage', '', '', '', '', '', '', 1),
(7, 'Massage', '', '', '', '', '', '', 1),
(8, 'Fitness', '', '', '', '', '', '', 1);

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
  `login` varchar(255) NOT NULL,
  `motPasse` varchar(255) NOT NULL,
  `motPasseMd5` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `id_region` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_connexion` datetime NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `connected` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_client`
--

INSERT INTO `tap_client` (`id`, `nom_prenom`, `email`, `tel`, `code_vip`, `login`, `motPasse`, `motPasseMd5`, `adresse`, `code_postal`, `id_region`, `date_creation`, `date_connexion`, `etat`, `connected`) VALUES
(1, 'Dridi Hatem', 'dridihatem@gmail.com', '56 301 096', 1, 'admin', 'admin', '$1$E8ZE1dLf$cfxu2hGT.ivbEPksyKtHf1', '03 paris', '', 1, '2018-12-21 00:00:00', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tap_code_promo`
--

CREATE TABLE `tap_code_promo` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `valeur` float NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `date_depart` date NOT NULL,
  `date_echeance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_code_promo`
--

INSERT INTO `tap_code_promo` (`id`, `code`, `valeur`, `etat`, `date_depart`, `date_echeance`) VALUES
(1, 'MV0011', 5, 1, '2018-12-18', '2018-12-18'),
(2, 'MV0012', 8, 0, '2018-12-18', '2018-12-26');

-- --------------------------------------------------------

--
-- Structure de la table `tap_code_vip`
--

CREATE TABLE `tap_code_vip` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `date_echeance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_code_vip`
--

INSERT INTO `tap_code_vip` (`id`, `code`, `etat`, `date_echeance`) VALUES
(1, '200VIP001', 1, '2018-12-17');

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
  `matricule_fiscal` varchar(255) NOT NULL,
  `code_comptable` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `motPasse` varchar(255) NOT NULL,
  `motPasseMd5` varchar(255) NOT NULL,
  `date_insertion` datetime NOT NULL,
  `publication` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_fournisseur`
--

INSERT INTO `tap_fournisseur` (`id`, `societe`, `registre_commerce`, `matricule_fiscal`, `code_comptable`, `role`, `adresse`, `tel`, `email`, `user`, `motPasse`, `motPasseMd5`, `date_insertion`, `publication`) VALUES
(1, 'synapse', '0002020202', '1333', '1222', 1, 'Tunis', '222', 'dridihatem@gmail.com', 'admin', 'admin', '$1$U2kk7W1h$NnuRjIvLP0pN1wdaEx0QX1', '0000-00-00 00:00:00', 1);

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
(1, 'Accueil', '', '', '<p>qss</p>\r\n', '', '', '', 1, 0, 1, 'Home', 'ss', '', ''),
(2, 'Services', '', '', '', '', '', '', 1, 0, 2, 'Services', '', '', ''),
(3, 'Packs', 'Packs', '', '', '', '', '', 1, 0, 4, 'Pack', '', '', ''),
(4, 'Contact', '', '', '', '', '', '', 1, 0, 3, 'Contact', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `tap_option_service`
--

CREATE TABLE `tap_option_service` (
  `id` int(11) NOT NULL,
  `titreFr` varchar(255) NOT NULL,
  `titreEn` varchar(255) NOT NULL,
  `titreAr` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prix` float NOT NULL,
  `prix_promo` float NOT NULL,
  `id_service` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_option_service`
--

INSERT INTO `tap_option_service` (`id`, `titreFr`, `titreEn`, `titreAr`, `prix`, `prix_promo`, `id_service`, `etat`) VALUES
(1, 'Option1', '', '', 10, 5, '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tap_pack`
--

CREATE TABLE `tap_pack` (
  `id` int(11) NOT NULL,
  `titreFr` varchar(255) NOT NULL,
  `titreEn` varchar(255) NOT NULL,
  `titreAr` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descriptionFr` text NOT NULL,
  `descriptionEn` text NOT NULL,
  `descriptionAr` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_service` varchar(255) NOT NULL,
  `id_option_service` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `prix_promo` float NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_insertion` date NOT NULL,
  `vu` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_pack`
--

INSERT INTO `tap_pack` (`id`, `titreFr`, `titreEn`, `titreAr`, `descriptionFr`, `descriptionEn`, `descriptionAr`, `image`, `id_service`, `id_option_service`, `prix`, `prix_promo`, `date_debut`, `date_fin`, `date_insertion`, `vu`, `etat`) VALUES
(1, 'Pack1', '', '', '<p>dqsdqsd</p>\r\n', '', '', 'b12f6ae235f247ac0766c400aac530ed.jpg', '', '', 200, 190, '2018-12-19', '2018-12-27', '2018-12-19', 0, 1);

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

--
-- Déchargement des données de la table `tap_prestataire`
--

INSERT INTO `tap_prestataire` (`id`, `nom_prenom`, `email`, `adresse`, `tel`, `id_fournisseur`, `login`, `motPasse`, `motPasseMd5`, `avatar`, `date_insertion`, `publication`) VALUES
(1, 'Dridi Hatem', 'dridihatem@gmail.com', '03 paris', '56 301 096', 1, 'admin', 'admin', '$1$WEYoMqwX$LnIxC87XIBHYvtwsLczAk/', '', '2018-12-18 16:09:52', 1);

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

--
-- Déchargement des données de la table `tap_region`
--

INSERT INTO `tap_region` (`id`, `titre`, `etat`) VALUES
(1, 'Tunis', 1),
(2, 'Bizerte', 1);

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
  `date_insertion` datetime NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `id_prestataire` int(11) NOT NULL,
  `date1` date NOT NULL,
  `prix1` float NOT NULL,
  `prix_promo1` float NOT NULL,
  `date2` date NOT NULL,
  `prix2` float NOT NULL,
  `prix_promo2` float NOT NULL,
  `date3` date NOT NULL,
  `prix3` float NOT NULL,
  `prix_promo3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_service`
--

INSERT INTO `tap_service` (`id`, `titreFr`, `titreEn`, `titreAr`, `descriptionFr`, `descriptionEn`, `descriptionAr`, `image`, `id_categorie`, `date_insertion`, `etat`, `id_prestataire`, `date1`, `prix1`, `prix_promo1`, `date2`, `prix2`, `prix_promo2`, `date3`, `prix3`, `prix_promo3`) VALUES
(1, 'Brushing', '', '', '', '', '', 'c58b45cf4c3011d832114d3947ffdd66.jpg', 3, '0000-00-00 00:00:00', 1, 1, '0000-00-00', 0, 0, '0000-00-00', 0, 0, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tap_sous_categorie`
--

CREATE TABLE `tap_sous_categorie` (
  `id` int(11) NOT NULL,
  `titreFr` varchar(255) NOT NULL,
  `titreEn` varchar(255) NOT NULL,
  `titreAr` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descriptionFr` longtext NOT NULL,
  `descriptionEn` longtext NOT NULL,
  `descriptionAr` longtext CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `publication` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tap_sous_categorie`
--

INSERT INTO `tap_sous_categorie` (`id`, `titreFr`, `titreEn`, `titreAr`, `descriptionFr`, `descriptionEn`, `descriptionAr`, `image`, `id_categorie`, `publication`) VALUES
(3, 'Brushing', '', '', '', '', '', '', 3, 1),
(4, 'Chignon / tresse', '', '', '', '', '', '', 3, 1),
(5, 'Mini coiffure', '', '', '', '', '', '', 3, 1),
(6, 'KÃ©ratine', '', '', '', '', '', '', 3, 1),
(7, 'PÃ©dicure', '', '', '', '', '', '', 4, 1),
(8, 'Manucure', '', '', '', '', '', '', 4, 1),
(9, 'Pose vernis', '', '', '', '', '', '', 4, 1),
(10, 'Pose vernis permanent', '', '', '', '', '', '', 4, 1),
(11, 'Gel naturel', '', '', '', '', '', '', 4, 1),
(12, 'Gel rÃ©sine', '', '', '', '', '', '', 4, 1),
(13, 'Gel remplissage', '', '', '', '', '', '', 4, 1),
(14, 'Epilation visage', '', '', '', '', '', '', 5, 1),
(15, 'Epilation maillot intÃ©grale', '', '', '', '', '', '', 5, 1),
(16, 'Epilation aisselle & Bras', '', '', '', '', '', '', 5, 1),
(17, 'Epilation jambe', '', '', '', '', '', '', 5, 1),
(18, 'Corps complet', '', '', '', '', '', '', 5, 1),
(19, 'Makeup', '', '', '', '', '', '', 6, 1),
(20, 'Makeup soirÃ©e + faux cils', '', '', '', '', '', '', 6, 1),
(21, 'Massage relaxant 1h', '', '', '', '', '', '', 7, 1),
(22, 'Massage relaxant 30 min', '', '', '', '', '', '', 7, 1),
(23, 'Cure anti-cellulite 30 min', '', '', '', '', '', '', 7, 1),
(24, 'Massage prÃ©natal', '', '', '', '', '', '', 7, 1),
(25, 'Massage prÃ©natale 8 sÃ©ances', '', '', '', '', '', '', 7, 1),
(26, 'Massage postnatal 30 min', '', '', '', '', '', '', 7, 1),
(27, 'Pilate 1 sÃ©ance', '', '', '', '', '', '', 8, 1),
(28, 'Pilage 5 sÃ©ances', '', '', '', '', '', '', 8, 1),
(29, 'Pilage 20 sÃ©ances', '', '', '', '', '', '', 8, 1),
(30, 'BodyTech', '', '', '', '', '', '', 8, 1),
(31, 'Yoga', '', '', '', '', '', '', 8, 1),
(32, 'Coach fitness', '', '', '', '', '', '', 8, 1),
(33, 'Coach fitness 12 sÃ©ances', '', '', '', '', '', '', 8, 1);

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
-- Index pour la table `tap_code_vip`
--
ALTER TABLE `tap_code_vip`
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
-- Index pour la table `tap_pack`
--
ALTER TABLE `tap_pack`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tap_client`
--
ALTER TABLE `tap_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tap_code_promo`
--
ALTER TABLE `tap_code_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tap_code_vip`
--
ALTER TABLE `tap_code_vip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tap_commande`
--
ALTER TABLE `tap_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_fournisseur`
--
ALTER TABLE `tap_fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tap_mode_paiement`
--
ALTER TABLE `tap_mode_paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_module`
--
ALTER TABLE `tap_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tap_option_service`
--
ALTER TABLE `tap_option_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tap_pack`
--
ALTER TABLE `tap_pack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tap_prestataire`
--
ALTER TABLE `tap_prestataire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tap_prix_service`
--
ALTER TABLE `tap_prix_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_region`
--
ALTER TABLE `tap_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tap_reservation`
--
ALTER TABLE `tap_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tap_service`
--
ALTER TABLE `tap_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tap_sous_categorie`
--
ALTER TABLE `tap_sous_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
