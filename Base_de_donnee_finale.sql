-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 30 jan. 2020 à 23:10
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `workshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Maillots'),
(2, 'Ballons'),
(3, 'Accesoires'),
(4, 'Survetement'),
(5, 'Chaussures');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `mot_de_passe` varchar(256) NOT NULL,
  `civilite` varchar(32) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `pays` varchar(32) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `avatar` varchar(64) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `email`, `mot_de_passe`, `civilite`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `pays`, `telephone`, `avatar`) VALUES
(1, 'enzo@gmail.com', '26429a356b1d25b7d57c0f9a6d5fed8a290cb42374185887dcd2874548df0779', 'Mr', '', 'cora', '						votre adresse1 rue du richard ... \r\n				', 75014, 'Nante', 'france', '665458547', ''),
(2, 'katiakok@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Mme', 'katia', 'kok', '						votre adresse ... \r\n	bah oui				', 75214, 'paris', 'france', '665984751', ''),
(3, 'kali@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Mr', 'dqdqd', 'dffsfsfs', '						votre adresse ... \r\n					65565656', 12345, 'lipa', 'france', '1245786455', ''),
(4, 'lololi@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Mr', 'Lololi', 'Jean', 'Poissy 15 bis', 1815, 'Kinshasa', 'france', '788459822', ''),
(5, 'younes@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Mr', 'Younes', 'Foutri', 'poissy 14 bis', 22225, 'Kinshasa', 'france', '715254487', ''),
(6, 'dddd@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'on', 'Murat', 'Beyaz', '02 Rue de Enzo', 75300, '', 'france', '755647852', ''),
(7, 'generalk@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'on', 'Murat', 'Beyaz', '02 Rue de Enzo', 75300, 'Kinshasa', 'Belgique', '07 55647852', 'images/avatar.jpg'),
(8, 'caca@gm.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'on', 'jean', 'paul', 'ruegzgfzeg', 75104, 'ge', 'france', '06 52 56 58 52', 'images/avatar.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(10) NOT NULL AUTO_INCREMENT,
  `client_commande` int(11) NOT NULL,
  `date_commande` date DEFAULT NULL,
  `prix_total` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `client_commande` (`client_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

DROP TABLE IF EXISTS `detail_commande`;
CREATE TABLE IF NOT EXISTS `detail_commande` (
  `detail_commande` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `qte_produit` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_commande`,`produit_id`),
  KEY `produit_id` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

DROP TABLE IF EXISTS `joueurs`;
CREATE TABLE IF NOT EXISTS `joueurs` (
  `id_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `poste` int(10) DEFAULT NULL,
  `club` varchar(20) DEFAULT NULL,
  `nationalite` varchar(25) DEFAULT NULL,
  `avatar_joeur` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_joueur`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id_joueur`, `nom`, `prenom`, `age`, `poste`, `club`, `nationalite`, `avatar_joeur`) VALUES
(14, 'Muslera', 'Fernando', 33, 1, 'Galatasaray', 'Argentin', 'img/muslera.jpg'),
(2, 'Lloris', 'Hugo', 33, 1, 'Tottenham', 'Francais', 'img/lloris.jpg'),
(3, 'Becker', 'Allison', 27, 1, 'Liverpool', ' Brésilien', 'img/allison.jpg'),
(4, 'Kabak', 'Ozan', 19, 2, 'Schalke', 'Turc', 'img/kabak.jpg'),
(5, 'Demiral', 'Merih', 21, 2, 'Juventus', 'Turc', 'img/demiral.jpg'),
(6, 'Hasan', 'Ali', 30, 2, 'Fenerbahçe', 'Turc', 'img/hasan.jpg'),
(7, 'Yazici', 'Yusuf', 23, 3, 'LOSC Lille', 'Turc', 'img/yusuf.jpg'),
(27, 'Turan', 'Arda', 32, 3, 'FC Barcelone', 'Turc', 'img/arda.jpg'),
(44, 'Akbaba', 'Emre', 27, 3, 'Galatasaray', 'Turc', 'img/emre.jpg'),
(45, 'Calhanoglu ', 'Hakan ', 25, 4, 'AC Milan ', 'Turc', 'img/calhanoglu.jpg'),
(46, 'Cenk ', 'Tosun ', 28, 4, 'Crystal Palace', 'Turc', 'img/tosun.jpg'),
(47, 'Cengiz', 'Under', 25, 4, 'AC Roma ', 'Turc', 'img/under.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(5) NOT NULL AUTO_INCREMENT,
  `panier_produit` int(11) NOT NULL,
  `panier_client` int(11) NOT NULL,
  `panier_total` decimal(9,2) DEFAULT NULL,
  `quantite_panier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_panier`),
  KEY `panier_client` (`panier_client`),
  KEY `panier_produit` (`panier_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `panier_produit`, `panier_client`, `panier_total`, `quantite_panier`) VALUES
(1, 1, 1, '85.55', 5),
(2, 2, 1, '75.99', 1),
(3, 63, 5, '70.00', 20),
(4, 64, 5, '120.00', 2),
(5, 64, 2, '120.00', 2),
(6, 61, 2, '70.00', 19),
(7, 109, 1, '120.00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) DEFAULT NULL,
  `detail_produit` text,
  `prix` decimal(6,2) DEFAULT NULL,
  `img_produit` varchar(64) DEFAULT NULL,
  `titre_produit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_categorie`, `detail_produit`, `prix`, `img_produit`, `titre_produit`) VALUES
(61, 1, 'Tenue de Sport', '70.00', 'images/1.jpg', 'Tenue de Sport Femme'),
(63, 1, 'Tenue de Sport', '70.00', 'images/2.jpg', 'Tenue de Sport Homme'),
(64, 1, 'Tenue de Sport', '120.00', 'images/3.jpg', 'Tenue de Sport Homme/Femme'),
(65, 1, 'Tenue de Sport', '70.00', 'images/4.jpg', 'Tenue de Sport Homme'),
(66, 1, 'Tenue de Sport', '70.00', 'images/5.jpg', 'Tenue de Sport Homme'),
(67, 1, 'Tenue de Sport', '70.00', 'images/6.jpg', 'Vest Homme'),
(68, 4, 'Tenue de Sport', '50.00', 'images/7.jpg', 'Tenue de Sport Femme'),
(69, 1, 'Tenue de Sport', '120.00', 'images/8.jpg', 'Tenue de Sport Homme/Femme'),
(70, 4, 'Tenue de Sport', '50.00', 'images/9.jpg', 'Pontalon Homme'),
(71, 1, 'Tenue de Sport', '70.00', 'images/10.jpg', 'Pull Homme'),
(72, 1, 'Tenue de Sport', '40.00', 'images/11.jpg', 'T-shirt Femme'),
(74, 1, 'Tenue de Sport', '120.00', 'images/13.jpg', 'Homme/Femme'),
(75, 1, 'Tenue de Sport', '40.00', 'images/14.jpg', 'T-shirt Homme'),
(77, 4, 'Tenue de Sport', '70.00', 'images/16.jpg', 'Pontalon Femme'),
(78, 1, 'Tenue de Sport', '120.00', 'images/17.jpg', 'Tenue de Sport Homme'),
(79, 1, 'Tenue de Sport ', '80.00', 'images/18.jpg', 'Veste Homme'),
(80, 1, 'Tenue de Sport', '30.00', 'images/19.jpg', 'Veste Homme'),
(81, 1, 'Tenue de Sport', '30.00', 'images/20.jpg', 'T Shirt Femme'),
(82, 4, 'Tenue de Sport', '120.00', 'images/21.jpg', 'Homme'),
(83, 4, 'Tenue de Sport', '20.00', 'images/22.jpg', 'Homme'),
(84, 4, 'Tenue de Sport', '120.00', 'images/23.jpg', 'Homme/Femme'),
(85, 4, 'Tenue de Sport', '70.00', 'images/24.jpg', 'Tenue de sport Femme'),
(86, 4, 'Tenue de Sport', '40.00', 'images/25.jpg', 'Survetement'),
(87, 5, 'Chaussures', '70.00', 'images/26.jpg', 'Chaussures Homme'),
(88, 5, 'Chaussures', '80.00', 'images/27.jpg', 'Chaussures Homme'),
(89, 5, 'Chaussures', '70.00', 'images/28.jpg', 'Chaussures Homme'),
(90, 5, 'Chaussures', '90.00', 'images/29.jpg', 'Chaussures Homme'),
(91, 5, 'Chaussures', '70.00', 'images/30.jpg', 'Chaussures Homme'),
(92, 5, 'Chaussures', '80.00', 'images/31.jpg', 'Chaussures Femme'),
(93, 5, 'Chaussures', '90.00', 'images/32.jpg', 'Chaussures Femme'),
(94, 5, 'Chaussures', '70.00', 'images/33.jpg', 'Chaussures Femme'),
(95, 5, 'Chaussures', '120.00', 'images/34.jpg', 'Chaussures Femme'),
(96, 5, 'Chaussures', '50.00', 'images/35.jpg', 'Chaussures Femme'),
(97, 3, 'Sac a Dos', '40.00', 'images/36.jpg', 'Sac'),
(98, 3, 'Sac a Main', '50.00', 'images/37.jpg', 'Sac'),
(99, 3, 'Casquette', '20.00', 'images/38.jpg', 'Casquette Homme/Femme'),
(100, 3, 'Sac', '20.00', 'images/39.jpg', 'Sac Homme/Femme'),
(101, 3, 'Casquette', '15.00', 'images/40.jpg', 'Casquette Homme/Femme'),
(102, 3, 'Bonnet', '20.00', 'images/41.jpg', 'Bonnet Homme/Femme'),
(103, 3, 'Casquette', '20.00', 'images/42.jpg', 'Casquette Homme/Femme'),
(104, 3, 'Jambieres de training ', '20.00', 'images/43.jpg', ' Homme/Femme'),
(105, 3, 'Bob de tennis imprime', '20.00', 'images/44.jpg', 'Homme/Femme'),
(106, 3, 'Protege-tibias de football', '25.00', 'images/45.jpg', 'Homme/Femme'),
(107, 2, 'Ballons', '40.00', 'images/46.jpg', 'Ballons de Foot'),
(108, 2, 'Ballons', '40.00', 'images/47.jpg', 'Ballons de Foot'),
(109, 2, 'Ballons', '40.00', 'images/48.jpg', 'Ballons de Foot'),
(110, 2, 'Ballons', '40.00', 'images/49.jpg', 'Ballons de Foot'),
(111, 2, 'Ballons', '40.00', 'images/50.jpg', 'Ballons de Foot');

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE IF NOT EXISTS `statistique` (
  `id_stat` int(10) NOT NULL AUTO_INCREMENT,
  `joueur_id` int(11) NOT NULL,
  `apparition` int(11) DEFAULT NULL,
  `buts` int(11) DEFAULT NULL,
  `p_decisives` int(11) DEFAULT NULL,
  `carton_jaune` int(11) DEFAULT NULL,
  `carton_rouge` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stat`),
  KEY `joueur_id` (`joueur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statistique`
--

INSERT INTO `statistique` (`id_stat`, `joueur_id`, `apparition`, `buts`, `p_decisives`, `carton_jaune`, `carton_rouge`) VALUES
(1, 27, 24, 2, 4, 3, 1),
(2, 7, 40, 12, 2, 4, 1),
(3, 14, 45, 0, 0, 2, 1),
(4, 2, 41, 0, 0, 4, 2),
(5, 3, 35, 0, 0, 2, 1),
(6, 4, 38, 4, 6, 7, 3),
(7, 44, 43, 7, 9, 7, 2),
(8, 45, 39, 10, 11, 8, 3),
(9, 46, 48, 23, 13, 6, 1),
(10, 47, 49, 26, 17, 3, 1),
(11, 5, 42, 8, 5, 6, 3),
(12, 6, 34, 3, 6, 3, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`client_commande`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `detail_commande_ibfk_1` FOREIGN KEY (`detail_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
