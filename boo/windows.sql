-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 07 oct. 2023 à 07:30
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `windows`
--

-- --------------------------------------------------------

--
-- Structure de la table `amande`
--

DROP TABLE IF EXISTS `amande`;
CREATE TABLE IF NOT EXISTS `amande` (
  `id_amande` int NOT NULL AUTO_INCREMENT,
  `raison` text NOT NULL,
  `montant` int NOT NULL,
  `id_association` varchar(6) NOT NULL,
  PRIMARY KEY (`id_amande`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `amande`
--

INSERT INTO `amande` (`id_amande`, `raison`, `montant`, `id_association`) VALUES
(9, 'retard', 2000, '617203'),
(10, 'retard', 1200, '359821'),
(11, 'retard', 1250, '182154'),
(12, 'retard', 1500, '32613'),
(13, 'tetu', 15000, '617203');

-- --------------------------------------------------------

--
-- Structure de la table `amandem`
--

DROP TABLE IF EXISTS `amandem`;
CREATE TABLE IF NOT EXISTS `amandem` (
  `id_am` int NOT NULL AUTO_INCREMENT,
  `id_membre` varchar(6) NOT NULL,
  `id_amande` int NOT NULL,
  `id_association` int NOT NULL,
  `date_debut` date NOT NULL,
  `delai` varchar(250) NOT NULL,
  `date_remb` date NOT NULL,
  PRIMARY KEY (`id_am`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_association` varchar(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `mdp` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` int NOT NULL,
  `modification` date DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `description_A` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `responsable` varchar(100) DEFAULT NULL,
  `type_association` varchar(50) DEFAULT NULL,
  `cotisation` int DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `nbr_membre` int DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_association`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_association` (`id_association`)
) ENGINE=MyISAM AUTO_INCREMENT=32230 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`id`, `id_association`, `nom`, `mdp`, `email`, `telephone`, `modification`, `date_creation`, `description_A`, `responsable`, `type_association`, `cotisation`, `statut`, `nbr_membre`, `photo`) VALUES
(32209, '617203', 'iai', 'iai', 'iai@gmail.com', 1234567, '2023-09-24', '2023-09-06', 'dsqd', 'jean', 'tontine', 0, 'dqsd', 3, '../image/chase_title.jpg'),
(32222, '185953', 'african', 'azerty', 'african@gmail.com', 1234567, NULL, '2023-09-14', 'dsqd', 'window', 'tontine', 0, 'dqsd', 0, '../image/3.png'),
(32223, '359821', 'jeunesse bafang', 'azerty', 'clovis@gmail.com', 12345678, NULL, '2023-09-16', 'dsqd', 'clovis', 'tontine', 0, 'dqsd', 1, '../image/12.jpg'),
(32225, '384278', 'iut', '123', 'iut@gmail.com', 123, NULL, '2023-09-21', 'dsqd', 'jean', 'Syndicat', 0, 'dqsd', 0, '../image/flu.jpg'),
(32226, '3a9b17', 'skyll', 'azerty', 'ulrich@gmail.com', 0, '2023-09-23', '2023-09-23', 'dsqd', 'ulrich', 'Syndicat', 0, 'dqsd', 1, '../image/history.jpg'),
(32227, '32613', 'dschang', '8121219+', 'bertinemeka@gmail.com', 668942278, NULL, '2023-09-28', 'dsqd', 'happi', 'Syndicat', 0, 'dqsd', 1, '../image/ibu.jpg'),
(32228, '16877', 'fille de ari', '123', 'gens@gmail.com', 784523, NULL, '2023-10-06', 'dsqd', 'fongang', 'tontine', 0, 'dqsd', 1, '../image/doliprane.jpg'),
(32229, '923514', 'fille du nil', 'azerty', 'junny@gmail.com', 741852, NULL, '2023-10-06', 'dsqd', 'junny', 'tontine', 0, 'dqsd', 1, '../image/vid.png');

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `id_banque` int NOT NULL AUTO_INCREMENT,
  `id_association` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(30) NOT NULL,
  `somme` int NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_banque`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `banque`
--

INSERT INTO `banque` (`id_banque`, `id_association`, `nom`, `somme`, `photo`) VALUES
(5, '617203', 'bicec', 1000, '../image/Capture001.png'),
(6, '182154', 'bicec', 1232, '../image/2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `communication`
--

DROP TABLE IF EXISTS `communication`;
CREATE TABLE IF NOT EXISTS `communication` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_membre` int DEFAULT NULL,
  `canaux_communication` varchar(200) DEFAULT NULL,
  `messages_envoyes` varchar(200) DEFAULT NULL,
  `destinataires` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre` (`id_membre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `conseil_administration`
--

DROP TABLE IF EXISTS `conseil_administration`;
CREATE TABLE IF NOT EXISTS `conseil_administration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `contacts` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mot` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=837 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `mot`) VALUES
(833, 'DQ', 'IUH', 'DA@s', 'iuhiuh'),
(832, 'YFT', 'YFYUT', 'TYFU@cw', 'YFYT'),
(831, 'hujjh', 'HHIU', 'DQD@OIJOI', 'OIJOI'),
(830, 'jean', 'paul', 'nlkn@oji', 'csdsq'),
(834, 'huih', 'iuh', 'uih@iuhiuh', 'uiohiuh'),
(835, 'lepguo', 'ghjk', 'i@gkhlkjlm', 'dhtfcgyjkbhko,l'),
(836, 'frtf', 'ertyu', 'iut@gmail.com', 'zertyu');

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

DROP TABLE IF EXISTS `cotisation`;
CREATE TABLE IF NOT EXISTS `cotisation` (
  `id_cotisation` int NOT NULL AUTO_INCREMENT,
  `id_association` varchar(6) NOT NULL,
  `montant` float DEFAULT NULL,
  `nbr_membre` int NOT NULL,
  `taux` int NOT NULL,
  `date_debut` date NOT NULL,
  PRIMARY KEY (`id_cotisation`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `cotisation`
--

INSERT INTO `cotisation` (`id_cotisation`, `id_association`, `montant`, `nbr_membre`, `taux`, `date_debut`) VALUES
(3, '617203', 1800, 12, 20, '2023-08-31');

-- --------------------------------------------------------

--
-- Structure de la table `cotiser`
--

DROP TABLE IF EXISTS `cotiser`;
CREATE TABLE IF NOT EXISTS `cotiser` (
  `id_co` int NOT NULL AUTO_INCREMENT,
  `id_cotisation` varchar(6) NOT NULL,
  `id_association` varchar(6) NOT NULL,
  `id_membre` varchar(6) NOT NULL,
  `payer` int NOT NULL,
  `reste` int NOT NULL,
  PRIMARY KEY (`id_co`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `finances`
--

DROP TABLE IF EXISTS `finances`;
CREATE TABLE IF NOT EXISTS `finances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `revenus` decimal(10,2) DEFAULT NULL,
  `depenses` decimal(10,2) DEFAULT NULL,
  `budgets` decimal(10,2) DEFAULT NULL,
  `dons` decimal(10,2) DEFAULT NULL,
  `subventions` decimal(10,2) DEFAULT NULL,
  `rapports_financiers` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `gouvernance`
--

DROP TABLE IF EXISTS `gouvernance`;
CREATE TABLE IF NOT EXISTS `gouvernance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `procedures_assemblee` varchar(200) DEFAULT NULL,
  `elections` varchar(100) DEFAULT NULL,
  `comites` varchar(200) DEFAULT NULL,
  `processus_prise_decision` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_membre` varchar(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `mdp` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `numero_telephone` int DEFAULT NULL,
  `date_adhesion` date DEFAULT NULL,
  `usertype` varchar(50) DEFAULT 'user',
  `id_association` varchar(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `statut` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_membre` (`id_membre`),
  KEY `membre_asso` (`id_association`)
) ENGINE=MyISAM AUTO_INCREMENT=385 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `id_membre`, `nom`, `photo`, `mdp`, `adresse`, `prenom`, `numero_telephone`, `date_adhesion`, `usertype`, `id_association`, `statut`, `status`) VALUES
(2, 'AZE123', 'admin', NULL, 'admin123', NULL, NULL, NULL, NULL, 'admin', '', '', ''),
(3, '564DSQ', 'jeph', NULL, '123456', NULL, NULL, NULL, NULL, 'pro', '', '', ''),
(383, '757396', 'ange', '../image/imodium.jpg', '75f7313c20144e39edcf57a14733d074aee0c482320d5178ee0ef2f2608c2996', 'gensdd@gmail.com', 'polyne', 7845, '2023-10-06', 'user', '16877', 'normal', ''),
(382, '36314', 'belinga', '../image/d.jpg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'geni@gmail.com', 'avina', 89465, '2023-09-30', 'user', '617203', 'normal', ''),
(375, 'f81800', 'dylan', '../image/Capture001.png', 'aze', 'junior@gmail.com', 'junior', 12345678, '2023-09-16', 'user', '359821', 'Normal', ''),
(376, '4a5443', 'happi', '../image/', 'azerty', 'happi@gmai.com', 'happi', 12345, '2023-09-23', 'user', '182154', 'Normal', ''),
(377, '7a7a7a', 'karis', '../image/doliprane.jpg', '1234', 'karis@gmail.com', 'jean', 0, '2023-09-28', 'user', '32613', 'Normal', ''),
(381, '200494', 'avina', '../image/ibu.jpg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'login@gmail', 'belinga', 784512, '2023-09-30', 'user', '617203', 'Normal', ''),
(380, '61054', 'jean', '../image/imodium.jpg', '75f7313c20144e39edcf57a14733d074aee0c482320d5178ee0ef2f2608c2996', 'jean@gmail.com', 'dominique', 785, '2023-09-30', 'user', '617203', 'normal', ''),
(384, '848005', 'sorelle', '../image/imodium.jpg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'csq@foijs.com', 'jean', 894562, '2023-10-06', 'user', '923514', 'normal', '');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `id_association` varchar(6) NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `inputmessage` int NOT NULL,
  `outputmessage` int NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `id_association`, `msg`, `inputmessage`, `outputmessage`) VALUES
(1, '', 'fsd', 61054, 222600),
(2, '', 'sd', 200494, 61054),
(3, '', 'je vie pd', 61054, 200494),
(4, '', 'enfin', 36314, 61054),
(5, '', 'bonjour', 200494, 36314),
(6, '', 'pd', 61054, 36314),
(7, '', 'yes fils', 36314, 200494),
(8, '', 'salut', 36314, 200494),
(9, '', 'ioj', 61054, 200494),
(10, '', 'bonjour papa', 36314, 200494);

-- --------------------------------------------------------

--
-- Structure de la table `modpa`
--

DROP TABLE IF EXISTS `modpa`;
CREATE TABLE IF NOT EXISTS `modpa` (
  `id_mo` int NOT NULL AUTO_INCREMENT,
  `id_association` varchar(6) NOT NULL,
  `nom` varchar(12) NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_mo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `idn` int NOT NULL AUTO_INCREMENT,
  `messagen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_no` date NOT NULL,
  `etat` tinyint NOT NULL,
  `id_membre` varchar(6) NOT NULL,
  `id_association` int NOT NULL,
  PRIMARY KEY (`idn`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`idn`, `messagen`, `date_no`, `etat`, `id_membre`, `id_association`) VALUES
(22, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(21, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(19, 'Vous venez d\'être amendé', '2023-09-06', 0, '222600', 617203),
(20, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(23, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(24, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(25, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(26, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(27, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(28, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(29, 'Vous  amande retiré', '2023-09-13', 0, '222600', 617203),
(30, 'Vous venez d\'être amendé', '2023-09-14', 0, '222600', 617203),
(31, 'Vous  amande retiré', '2023-09-14', 0, '222600', 617203),
(32, 'Vous  amande retiré', '2023-09-14', 0, '222600', 617203),
(33, 'Vous venez d\'être amendé', '2023-09-16', 0, 'f81800', 359821),
(34, 'Vous  amande retiré', '2023-09-16', 0, 'f81800', 359821),
(35, 'Vous venez d\'être amendé', '2023-09-23', 0, '4a5443', 182154),
(36, 'Vous  amande retiré', '2023-09-23', 0, '4a5443', 182154),
(37, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(38, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(39, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(40, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(41, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(42, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(43, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(44, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(45, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(46, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(47, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(48, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(49, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(50, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(51, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(52, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(53, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(54, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(55, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(56, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(57, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(58, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(59, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(60, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(61, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(62, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(63, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(64, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(65, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(66, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(67, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(68, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(69, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(70, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(71, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(72, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(73, 'Vous  amande retiré', '0000-00-00', 0, '', 0),
(74, 'Vous  amande retiré', '0000-00-00', 0, '222600', 617203),
(75, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(76, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(77, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(78, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(79, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(80, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(81, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(82, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(83, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(84, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(85, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(86, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(87, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(88, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(89, 'Vous venez d\'être amendé', '2023-09-24', 0, '222600', 617203),
(90, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(91, 'Vous  amande retiré', '2023-09-24', 0, '222600', 617203),
(92, 'Vous venez d\'être amendé', '2023-09-25', 0, '222600', 617203),
(93, 'Vous  amande retiré', '2023-09-26', 0, '222600', 617203),
(94, 'Vous  amande retiré', '2023-09-26', 0, '222600', 617203),
(95, 'Vous venez d\'être amendé', '2023-09-27', 0, '33dc2b', 617203),
(96, 'Vous  amande retiré', '2023-09-27', 0, '33dc2b', 617203),
(97, 'Vous  amande retiré', '2023-09-27', 0, '33dc2b', 617203),
(98, 'Vous venez d\'être amendé', '2023-09-27', 0, '33dc2b', 617203),
(99, 'Vous  amande retiré', '2023-09-27', 0, '33dc2b', 617203),
(100, 'Vous  amande retiré', '2023-09-27', 0, '33dc2b', 617203),
(101, 'Vous venez d\'être amendé', '2023-09-27', 0, '222600', 617203),
(102, 'Vous  amande retiré', '2023-09-27', 0, '222600', 617203),
(103, 'Vous  amande retiré', '2023-09-27', 0, '222600', 617203),
(104, 'Vous venez d\'être amendé', '2023-09-27', 0, '222600', 617203),
(105, 'Vous  amande retiré', '2023-09-27', 0, '222600', 617203),
(106, 'Vous  amande retiré', '2023-09-27', 0, '222600', 617203),
(107, 'Vous venez d\'être amendé', '2023-09-28', 0, '7a7a7a', 32613),
(108, 'Vous  amande retiré', '2023-09-28', 0, '7a7a7a', 32613),
(109, 'Vous  amande retiré', '2023-09-28', 0, '7a7a7a', 32613),
(110, 'Vous  amande retiré', '2023-09-28', 0, '7a7a7a', 32613),
(111, 'Vous venez d\'être amendé', '2023-09-30', 0, 'e71b66', 617203),
(112, 'Vous  amande retiré', '2023-09-30', 0, 'e71b66', 617203),
(113, 'Vous  amande retiré', '2023-09-30', 0, 'e71b66', 617203),
(114, 'Vous venez d\'être amendé', '2023-10-01', 0, '200494', 617203),
(115, 'Vous  amande retiré', '2023-10-01', 0, '200494', 617203),
(116, 'Vous  amande retiré', '2023-10-01', 0, '200494', 617203),
(117, 'Vous venez d\'être amendé', '2023-10-02', 0, '200494', 617203),
(118, 'Vous  amande retiré', '2023-10-02', 0, '200494', 617203),
(119, 'Vous  amande retiré', '2023-10-02', 0, '200494', 617203),
(120, 'Vous venez d\'être amendé', '2023-10-04', 0, '200494', 617203),
(121, 'Vous  amande retiré', '2023-10-06', 0, '200494', 617203),
(122, 'Vous  amande retiré', '2023-10-06', 0, '200494', 617203);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_membre` int DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `objectifs` varchar(200) DEFAULT NULL,
  `ressources` varchar(200) DEFAULT NULL,
  `responsables` varchar(200) DEFAULT NULL,
  `echeances` date DEFAULT NULL,
  `resultats` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre` (`id_membre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `reglementamende`
--

DROP TABLE IF EXISTS `reglementamende`;
CREATE TABLE IF NOT EXISTS `reglementamende` (
  `id_reglement` int NOT NULL AUTO_INCREMENT,
  `id_amande` int DEFAULT NULL,
  PRIMARY KEY (`id_reglement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `regler`
--

DROP TABLE IF EXISTS `regler`;
CREATE TABLE IF NOT EXISTS `regler` (
  `id_regler` int NOT NULL AUTO_INCREMENT,
  `id_association` varchar(6) NOT NULL,
  `id_membre` varchar(6) NOT NULL,
  `date_regler` date NOT NULL,
  `raison` text NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_amande` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `statut` varchar(10) NOT NULL,
  PRIMARY KEY (`id_regler`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `regler`
--

INSERT INTO `regler` (`id_regler`, `id_association`, `id_membre`, `date_regler`, `raison`, `nom`, `prenom`, `date_amande`, `photo`, `statut`) VALUES
(64, '617203', '200494', '2023-10-02', 'retard', 'avina', 'belinga', '2023-10-02', '../image/BREC2230.JPG', 'regler'),
(63, '617203', '200494', '2023-10-01', 'tetu', 'avina', 'belinga', '2023-10-01', '../image/flu.jpg', 'regler'),
(62, '617203', 'e71b66', '2023-09-30', 'retard', 'tegomo', 'penel', '2023-09-30', '../image/BREC2230.JPG', 'regler'),
(61, '32613', '7a7a7a', '2023-09-28', 'retard', 'karis', 'jean', '2023-09-28', '../image/Capture001.png', 'regler'),
(60, '617203', '222600', '2023-09-27', 'retard', 'avina', 'paul', '2023-09-27', '../image/fo.jpg', 'regler'),
(59, '617203', '222600', '2023-09-27', 'retard', 'avina', 'paul', '2023-09-27', '../image/flu.jpg', 'regler'),
(58, '617203', '33dc2b', '2023-09-27', 'retard', 'belinga', 'belinga', '2023-09-27', '../image/fo.jpg', 'regler'),
(57, '617203', '33dc2b', '2023-09-27', 'retard', 'belinga', 'belinga', '2023-09-27', '../image/flu.jpg', 'regler'),
(56, '617203', '33dc2b', '2023-09-27', 'retard', 'belinga', 'belinga', '2023-09-27', '../image/flu.jpg', 'regler'),
(53, '617203', '222600', '2023-09-24', 'retard', 'avina', 'paul', '2023-09-24', '../image/flu.jpg', 'regler'),
(55, '617203', '222600', '2023-09-26', 'retard', 'avina', 'paul', '2023-09-25', '../image/d.jpg', 'regler'),
(54, '617203', '222600', '2023-09-26', 'retard', 'avina', 'paul', '2023-09-25', '../image/d.jpg', 'regler'),
(65, '617203', '200494', '2023-10-04', 'retard', 'avina', 'belinga', '2023-10-04', '../image/flu.jpg', 'regler'),
(66, '617203', '200494', '2023-10-06', 'retard', 'avina', 'belinga', '2023-10-04', '../image/IMG-20211115-WA0004.jpg', 'regler');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_association` varchar(6) NOT NULL,
  `date_seance` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(200) NOT NULL,
  `raison` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
