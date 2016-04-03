-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 03 Avril 2016 à 11:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `owl`
--

-- --------------------------------------------------------

--
-- Structure de la table `gdc_items_capsules`
--

CREATE TABLE IF NOT EXISTS `gdc_items_capsules` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `path_image` text NOT NULL,
  `value_recup` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `gdc_items_capsules`
--

TRUNCATE TABLE `gdc_items_capsules`;
--
-- Contenu de la table `gdc_items_capsules`
--

INSERT INTO `gdc_items_capsules` (`id`, `name`, `description`, `path_image`, `value_recup`) VALUES
(1, 'capsule ROUGE', 'Permet de dupliquer les items dedans tous les 24 / 48 heures. meilleur Ratio, 96/100 car au maximum 4 items seront dupliquées au maximum', '/images/items/capsules/capsule_ROUGE.jpg', 3),
(2, 'capsule BLEUE', 'Pratique pour s''échanger des items', '/images/items/capsules/capsule_BLEUE.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `gdc_portals`
--

CREATE TABLE IF NOT EXISTS `gdc_portals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `localisation_x` varchar(255) NOT NULL,
  `localisation_y` varchar(255) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `pays` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `public` text NOT NULL,
  `horaires` text NOT NULL,
  `level` int(2) NOT NULL DEFAULT '1',
  `id_type` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=256 ;

--
-- Vider la table avant d'insérer `gdc_portals`
--

TRUNCATE TABLE `gdc_portals`;
--
-- Contenu de la table `gdc_portals`
--

INSERT INTO `gdc_portals` (`id`, `name`, `localisation_x`, `localisation_y`, `ville`, `code_postal`, `adresse`, `pays`, `comments`, `phone`, `public`, `horaires`, `level`, `id_type`) VALUES
(251, 'Entr&eacute;e Fleurie', '48.84', '2.332884', '', '', '', '', 'Johnchen', '', '', '', 2, 83),
(255, 'Richelieu et Mazarin', '48.829240', '2.338778', '', '', '', '', 'Lobbiaz', '', '', '', 1, 90);

-- --------------------------------------------------------

--
-- Structure de la table `gdc_portalstypes`
--

CREATE TABLE IF NOT EXISTS `gdc_portalstypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `color` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Vider la table avant d'insérer `gdc_portalstypes`
--

TRUNCATE TABLE `gdc_portalstypes`;
--
-- Contenu de la table `gdc_portalstypes`
--

INSERT INTO `gdc_portalstypes` (`id`, `name`, `description`, `color`) VALUES
(89, 'HP Resistance', 'com aaa', '#3366FF'),
(90, 'HP Martians', 'ccc', '#339966');

-- --------------------------------------------------------

--
-- Structure de la table `gdc_users`
--

CREATE TABLE IF NOT EXISTS `gdc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vider la table avant d'insérer `gdc_users`
--

TRUNCATE TABLE `gdc_users`;
--
-- Contenu de la table `gdc_users`
--

INSERT INTO `gdc_users` (`id`, `pseudo`, `login`, `pwd`) VALUES
(1, 'gcblue', 'gcblue', 'kangourou');

-- --------------------------------------------------------

--
-- Structure de la table `owl_products`
--

CREATE TABLE IF NOT EXISTS `owl_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `localisation_x` varchar(255) NOT NULL,
  `localisation_y` varchar(255) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `pays` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `public` text NOT NULL,
  `horaires` text NOT NULL,
  `id_type` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=256 ;

--
-- Vider la table avant d'insérer `owl_products`
--

TRUNCATE TABLE `owl_products`;
--
-- Contenu de la table `owl_products`
--

INSERT INTO `owl_products` (`id`, `name`, `localisation_x`, `localisation_y`, `ville`, `code_postal`, `adresse`, `pays`, `comments`, `phone`, `public`, `horaires`, `id_type`) VALUES
(25, 'CENTER CUIR', '48.83', '2.33', 'Paris', '75018', '', '', 'LES PSA comments prov\n\nElles ont le m&ecirc;me r&ocirc;le ...', '', '', '', 62),
(158, 'A Sacr&eacute; Coeur', '48.886221', '2.343291', 'Paris 121', '75018 Cedex 18', 'test adresse', 'France', 'toto &#039;exemple&#039; com', '0033870664', 'sK', 'sh', 62),
(208, 'A2', '48.881512', '2.308962', '', '', '', 'France', 'a com', '', '', '', 62),
(250, 'Orangerie', '48.863908', '2.324499', '', '', '', '', '', '', '', '', 62),
(251, 'XXX', '48.84', '2.338763', '', '', '', '', '', '', '', '', 83),
(254, 'ccccccccccccc', '48.82', '2.338763', '', '', '', '', '', '', '', '', 10),
(255, 'TEST type vert', '48.829240', '2.338778', '', '', '', '', '', '', '', '', 78);

-- --------------------------------------------------------

--
-- Structure de la table `owl_types`
--

CREATE TABLE IF NOT EXISTS `owl_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `color` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Vider la table avant d'insérer `owl_types`
--

TRUNCATE TABLE `owl_types`;
--
-- Contenu de la table `owl_types`
--

INSERT INTO `owl_types` (`id`, `name`, `description`, `color`) VALUES
(10, 'za 3456', 'za com 3456', '#ccff99'),
(12, 'zaa 1', 'com 1', '#669999'),
(13, 'za2', 'com2', '#ff2222'),
(17, 'za 16', 'c16', '#ff0066'),
(33, 'Besoin1', 'Description Besoin 1\n', '#ff6600'),
(62, 'LES PSA', 'Elles ont le m&ecirc;me r&ocirc;le que les services sociaux des arrondissements, mais s&rsquo;adressent plus sp&eacute;cialement aux personnes sans domicile, en situation r&eacute;guli&egrave;re depuis plus d&rsquo;un mois &agrave; Paris.\n\nElles vous permettent en plus d&rsquo;obtenir une domiciliation administrative pour faciliter vos d&eacute;marches (ouvertures de droits, aides du Centre d&rsquo;action sociale, etc.) et recevoir vos documents officiels (par exemple : la carte nationale d&rsquo;identit&eacute; ou la carte de r&eacute;sident).', '#0099cc'),
(63, 'toto55', 'com toto55', '#ffcc00'),
(64, 'toto44', 'com toto4444444444444444444444444444444444', '#009933'),
(65, 'nnzzzzzzzzz', 'dd22', '#ff66ff'),
(67, 'n2222', 'n', '#99ff33'),
(69, 'toto', 'com t', '#000080'),
(75, 'gggggg red', 'ggggggggggg', '#ff0066'),
(77, 'bb22', '222bbb', '#333300'),
(78, 'bl', 'bl55555555', '#008000'),
(79, 'ddddd', 'dd', '#ffff00'),
(82, 'tata', 'com tata', '#999999'),
(83, 'ggg', 'gg', '#ff0000'),
(84, 'toto', 'com', '#339966'),
(85, 'toto', 'com toto', '#339966'),
(86, 'toto', 'com toto', '#339966'),
(87, 'toto', 'com toto', '#339966'),
(88, 'toto', 'com toto', '#339966'),
(89, 'aaaaa', 'com aaa', '#00ccff'),
(90, 'a2', 'ccc', '#339966'),
(91, 'a0', 'cc0', '#333399'),
(92, 'a1', 'c1', '#800080'),
(93, 'a3', 'c3', '#00ffff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
