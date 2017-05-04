-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 30 Avril 2017 à 12:45
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lambdadef`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `idadresse` int(11) NOT NULL,
  `numRue` int(11) NOT NULL,
  `textAdresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `complement` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `actual` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`idadresse`, `numRue`, `textAdresse`, `complement`, `cp`, `ville`, `pays`, `actual`) VALUES
(6, 30, 'rue des acacias', 'blahblahblah', 2542, 'rouen', 'FR', 1),
(7, 40, 'rue du chose', 'au fond de la route', 57463, 'strasbourg', 'FR', 0),
(9, 120, 'rue du four', 'bof', 34000, 'TOURS', 'FR', 1),
(11, 1322, 'rue du bof', 'gfy', 34000, 'valence', 'FR', 0);

-- --------------------------------------------------------

--
-- Structure de la table `adresseuser`
--

CREATE TABLE `adresseuser` (
  `iduser` int(11) NOT NULL,
  `idadresse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adresseuser`
--

INSERT INTO `adresseuser` (`iduser`, `idadresse`) VALUES
(5, 6),
(6, 7),
(6, 9),
(6, 11);

-- --------------------------------------------------------

--
-- Structure de la table `appartientgroupe`
--

CREATE TABLE `appartientgroupe` (
  `idusergroupe` int(11) NOT NULL,
  `idgroupelien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `appartientgroupe`
--

INSERT INTO `appartientgroupe` (`idusergroupe`, `idgroupelien`) VALUES
(5, 5),
(6, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'livre'),
(2, 'automobile'),
(3, 'décoration');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `dateAjout` datetime NOT NULL,
  `idType` int(11) NOT NULL,
  `entite` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCommente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `idParametre` int(11) NOT NULL,
  `parametre` text COLLATE utf8_unicode_ci NOT NULL,
  `valeur` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idrelation` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idcontact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `idemprunteur` int(11) DEFAULT NULL,
  `idEmprunt` int(11) NOT NULL,
  `dateEmprunt` datetime NOT NULL,
  `dateRendu` datetime NOT NULL,
  `idExemplaire` int(11) DEFAULT NULL,
  `idproprietaire` int(11) DEFAULT NULL,
  `idadresse` int(11) DEFAULT NULL,
  `duree` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`idemprunteur`, `idEmprunt`, `dateEmprunt`, `dateRendu`, `idExemplaire`, `idproprietaire`, `idadresse`, `duree`) VALUES
(6, 3, '2017-04-20 15:31:41', '2017-04-27 15:31:41', 2, 5, 6, 'P7D'),
(5, 5, '2017-04-25 12:05:21', '2017-05-02 12:05:21', 8, 6, 6, 'P7D');

-- --------------------------------------------------------

--
-- Structure de la table `etatexemplaire`
--

CREATE TABLE `etatexemplaire` (
  `etat` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `idExemplaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etatitem`
--

CREATE TABLE `etatitem` (
  `etatInitial` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `idEvenement` int(11) NOT NULL,
  `titreEvenement` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `texteEvenement` text COLLATE utf8_unicode_ci NOT NULL,
  `lienImage` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dateAjout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `titreEvenement`, `texteEvenement`, `lienImage`, `dateAjout`) VALUES
(3, 'Des trésors à trouver !!!', '<p>Sur Lambda, il existe plein de tr&eacute;sors &agrave; trouver partout, tout le temps .... Ils peuvent &ecirc;tre a c&ocirc;t&eacute; de chez vous, sans que vous le sachiez !</p>\r\n<p>Cherchez, trouvez, empruntez, partagez !!!</p>', '93d9f70028b91119d35ff9c4288cc6ab.png', '2017-04-20 16:08:42'),
(4, 'Rejoignez une communauté !!!', '<p>Rejoignez des milliers de gens pr&ecirc;ts &agrave; partager, faire des rencontres, discuter, jouer ...</p>\r\n<p>&nbsp;</p>\r\n<p>Le meilleur moyen de se faire des amis, c\'est encore de participer !!!</p>', 'ea862440629d15dfaef0cc58198d4eb7.jpeg', '2017-04-20 16:11:42'),
(5, 'Partagez !!!', '<p>C\'est la philosophie de ce site : Partagez, echangez, rejoignez une communaut&eacute; ...</p>', '56534e691627ef6ebf80f36aa946ba11.jpeg', '2017-04-20 16:14:41');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `idexemplaire` int(11) NOT NULL,
  `photoExemplaire` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateAjout` datetime NOT NULL,
  `idItem` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `etatExemplaire` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Contenu de la table `exemplaire`
--

INSERT INTO `exemplaire` (`idexemplaire`, `photoExemplaire`, `dateAjout`, `idItem`, `idUser`, `etatExemplaire`) VALUES
(2, NULL, '2017-04-11 10:15:20', 4, 5, 'dsfghfgh'),
(7, NULL, '2017-04-21 10:26:58', 1, 6, 'sqksvjv'),
(8, NULL, '2017-04-21 10:29:08', 1, 6, 'sqkqegdqfg'),
(9, NULL, '2017-04-21 10:39:52', 1, 6, 'sggpspjgjsf');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `nomGroupe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `officier` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `nomGroupe`, `officier`, `description`) VALUES
(5, 'nomdegroupe', '[\"aze\",\"admin\"]', 'EZFzef'),
(6, 'groupetest', '[\"aze\"]', 'sfdlfvjqv');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `idItem` int(11) NOT NULL,
  `nomItem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `photoItem` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isValide` tinyint(1) NOT NULL,
  `idCategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`idItem`, `nomItem`, `description`, `photoItem`, `isValide`, `idCategorie`) VALUES
(1, 'blah', 'blah', NULL, 0, 1),
(3, 'qdbdfb', 'dbsb', NULL, 1, 2),
(4, 'blah ef', 'qvq', NULL, 0, 1),
(5, 'nouveau', 'nouveau', 'C:\\xampp\\tmp\\php897D.tmp', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `liencategorie`
--

CREATE TABLE `liencategorie` (
  `idItem` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `liencategorie`
--

INSERT INTO `liencategorie` (`idItem`, `idCategorie`) VALUES
(1, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `liencategoriepropriete`
--

CREATE TABLE `liencategoriepropriete` (
  `idcategorie` int(11) NOT NULL,
  `idpropriete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `liencategoriepropriete`
--

INSERT INTO `liencategoriepropriete` (`idcategorie`, `idpropriete`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `lienemprunt`
--

CREATE TABLE `lienemprunt` (
  `idEmprunt` int(11) NOT NULL,
  `idadresse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `liengroupe`
--

CREATE TABLE `liengroupe` (
  `idUser` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lienpropriete`
--

CREATE TABLE `lienpropriete` (
  `idPropriete` int(11) NOT NULL,
  `nomProp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valeur` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `lienpropriete`
--

INSERT INTO `lienpropriete` (`idPropriete`, `nomProp`, `valeur`) VALUES
(1, 'bidon d\'huile', ''),
(2, 'machin', '');

-- --------------------------------------------------------

--
-- Structure de la table `liensouscategorie`
--

CREATE TABLE `liensouscategorie` (
  `idisCategorie` int(11) NOT NULL,
  `idSousCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `idMessage` int(11) NOT NULL,
  `sujet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `corps` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `typeMessage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateEnvoi` datetime NOT NULL,
  `idUserDest` int(11) DEFAULT NULL,
  `idUserExp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`idMessage`, `sujet`, `corps`, `typeMessage`, `dateEnvoi`, `idUserDest`, `idUserExp`) VALUES
(4, 'hsfhfgh', 'dfsghdfhdfh', 'toadmin', '2017-04-10 14:14:43', 5, 5),
(5, 'hsfhfgh', 'dfsghdfhdfh', 'toadmin', '2017-04-10 14:15:15', 5, 5),
(6, 'qfsdgqdgq', 'qddfgqdsfgdfgqdfgsqdfg', 'touser', '2017-04-10 14:16:45', 6, 5),
(7, 'qsgsfgh', 'sghsfghfsghdhdgj', 'touser', '2017-04-10 14:27:12', 6, 6),
(15, 'Demande de pret de l\'objet : blah ef', '<div class=\"container\">L\'utilisateur aze vous demande le prêt de l\'objet : blah ef. Vous pouvez soit accepter, soit refuser le pret de cet objet.</br>Si vous acceptez, nous vous invitons à contacter le demandeur par l\'intermédiare de ce bouton, pour convenir d\'un rendez-vous par exemple:<a class=\"btn btn-primary btn-xs\" href=\"../message/6/new\">Contacter le demandeur</a></br>Après cela, je vous invite à signaler à l\'application, et afin d\'éviter les problèmes, un nouvel emprunt de cet objet, par l\'intérmédiaire de ce bouton :<a class=\"btn btn-primary btn-xs\" href=\"../emprunt/2/6/new\">Nouvel emprunt</a></br>Bonne journée et amusez-vous bien !</div>', 'dempret', '2017-04-13 17:30:29', 5, 6),
(16, 'Demande de pret de l\'objet : blah ef', '<div class=\"container\">L\'utilisateur aze vous demande le prêt de l\'objet : blah ef. Vous pouvez soit accepter, soit refuser le pret de cet objet.</br>Si vous acceptez, nous vous invitons à contacter le demandeur par l\'intermédiare de ce bouton, pour convenir d\'un rendez-vous par exemple:<a class=\"btn btn-primary btn-xs\" href=\"../message/6/new\">Contacter le demandeur</a></br>Après cela, je vous invite à signaler à l\'application, et afin d\'éviter les problèmes, un nouvel emprunt de cet objet, par l\'intérmédiaire de ce bouton :<a class=\"btn btn-primary btn-xs\" href=\"../emprunt/2/6/new\">Nouvel emprunt</a></br>Bonne journée et amusez-vous bien !</div>', 'dempret', '2017-04-13 17:37:02', 5, 6),
(17, 'gfqsdfg', '<h1>sfgwdfg<em>gfqgqsdsg</em></h1>', 'touser', '2017-04-13 17:49:08', 6, 6),
(18, 'gfqsdfg', '<h1>sfgwdfg<em>gfqgqsdsg</em></h1>', 'touser', '2017-04-13 17:49:56', 6, 6),
(19, 'wdgsgsdfgsg', '<p>fdwdwdxwdxwwdd</p>', 'touser', '2017-04-20 08:29:00', 6, 5),
(26, 'Demande de pret de l\'objet : blah ef', '<div class=\"container\">L\'utilisateur aze vous demande le prêt de l\'objet : blah ef. Vous pouvez soit accepter, soit refuser le pret de cet objet.</br>Si vous acceptez, nous vous invitons à contacter le demandeur par l\'intermédiare de ce bouton, pour convenir d\'un rendez-vous par exemple:<a class=\"btn btn-primary btn-xs\" href=\"../message/6/new\">Contacter le demandeur</a></br>Après cela, je vous invite à signaler à l\'application, et afin d\'éviter les problèmes, un nouvel emprunt de cet objet, par l\'intérmédiaire de ce bouton :<a class=\"btn btn-primary btn-xs\" href=\"../emprunt/2/6/new\">Nouvel emprunt</a></br>Bonne journée et amusez-vous bien !</div>', 'dempret', '2017-04-20 15:21:55', 5, 6),
(27, 'Demande de pret de l\'objet : blah ef', '<div class=\"container\">L\'utilisateur aze vous demande le prêt de l\'objet : blah ef. Vous pouvez soit accepter, soit refuser le pret de cet objet.</br>Si vous acceptez, nous vous invitons à contacter le demandeur par l\'intermédiare de ce bouton, pour convenir d\'un rendez-vous par exemple:<a class=\"btn btn-primary btn-xs\" href=\"../message/6/new\">Contacter le demandeur</a></br>Après cela, je vous invite à signaler à l\'application, et afin d\'éviter les problèmes, un nouvel emprunt de cet objet, par l\'intérmédiaire de ce bouton :<a class=\"btn btn-primary btn-xs\" href=\"../emprunt/2/6/new\">Nouvel emprunt</a></br>Bonne journée et amusez-vous bien !</div>', 'dempret', '2017-04-21 14:17:39', 5, 6),
(28, 'Demande de pret de l\'objet : blah', '<div class=\"container\">L\'utilisateur admin vous demande le prêt de l\'objet : blah. Vous pouvez soit accepter, soit refuser le pret de cet objet.</br>Si vous acceptez, nous vous invitons à contacter le demandeur par l\'intermédiare de ce bouton, pour convenir d\'un rendez-vous par exemple:<a class=\"btn btn-primary btn-xs\" href=\"../message/5/new\">Contacter le demandeur</a></br>Après cela, je vous invite à signaler à l\'application, et afin d\'éviter les problèmes, un nouvel emprunt de cet objet, par l\'intérmédiaire de ce bouton :<a class=\"btn btn-primary btn-xs\" href=\"../emprunt/8/5/new\">Nouvel emprunt</a></br>Bonne journée et amusez-vous bien !</div>', 'dempret', '2017-04-21 14:23:42', 6, 5),
(29, 'Demande de pret de l\'objet : blah', '<div class=\"container\">L\'utilisateur admin vous demande le prêt de l\'objet : blah. Vous pouvez soit accepter, soit refuser le pret de cet objet.</br>Si vous acceptez, nous vous invitons à contacter le demandeur par l\'intermédiare de ce bouton, pour convenir d\'un rendez-vous par exemple:<a class=\"btn btn-primary btn-xs\" href=\"../message/5/new\">Contacter le demandeur</a></br>Après cela, je vous invite à signaler à l\'application, et afin d\'éviter les problèmes, un nouvel emprunt de cet objet, par l\'intérmédiaire de ce bouton :<a class=\"btn btn-primary btn-xs\" href=\"../emprunt/8/5/new\">Nouvel emprunt</a></br>Bonne journée et amusez-vous bien !</div>', 'dempret', '2017-04-25 12:02:46', 6, 5),
(30, 'qdfmdfhbdqfmh', '<p>fgblmjn&ugrave;lkbj</p>\r\n<h1>gjgg<strong>hxjh</strong></h1>', 'touser', '2017-04-27 17:09:26', 6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `note` int(11) NOT NULL,
  `idCommentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `noteexemplaire`
--

CREATE TABLE `noteexemplaire` (
  `note` int(11) NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  `dateAjout` datetime NOT NULL,
  `idCommente` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `noteexemplaire`
--

INSERT INTO `noteexemplaire` (`note`, `idCommentaire`, `dateAjout`, `idCommente`, `idUser`) VALUES
(3, 2, '2017-04-19 09:12:13', 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `noteuser`
--

CREATE TABLE `noteuser` (
  `note` int(11) NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  `dateAjout` datetime NOT NULL,
  `idCommente` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produitpropriete`
--

CREATE TABLE `produitpropriete` (
  `idproduit` int(11) NOT NULL,
  `idpropriete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `produitpropriete`
--

INSERT INTO `produitpropriete` (`idproduit`, `idpropriete`) VALUES
(1, 1),
(3, 1),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `dateRDV` datetime NOT NULL,
  `idEmprunt` int(11) NOT NULL,
  `idAdresseUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE `souscategorie` (
  `idSousCategorie` int(11) NOT NULL,
  `nomSousCategorie` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `textcomexemplaire`
--

CREATE TABLE `textcomexemplaire` (
  `textcom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  `dateAjout` datetime NOT NULL,
  `idCommente` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `textcomuser`
--

CREATE TABLE `textcomuser` (
  `textcom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  `dateAjout` datetime NOT NULL,
  `idCommente` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `textcomuser`
--

INSERT INTO `textcomuser` (`textcom`, `idCommentaire`, `dateAjout`, `idCommente`, `idUser`) VALUES
('dflvkjhqdvmlqdvh', 4, '2017-04-17 13:07:41', 5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `textecommentaire`
--

CREATE TABLE `textecommentaire` (
  `texteCommentaire` longtext COLLATE utf8_unicode_ci NOT NULL,
  `idCommentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typecommentaire`
--

CREATE TABLE `typecommentaire` (
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idCommentaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `url`
--

CREATE TABLE `url` (
  `idurl` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plainpassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdepuis` datetime NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `genre` tinyint(1) DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `is_active`, `password`, `plainpassword`, `mdepuis`, `telephone`, `genre`, `roles`) VALUES
(5, 'admin', 'admin', 'admin@admin.fr', 'admin@admin.fr', 1, 1, '$2y$13$YJu.jkLc7eN1qNyykSwRE.E6VmjnyYu7Ige99BM1.L9aa6Ueu9hmm', 'admin', '2017-03-25 14:51:30', 202020202, 0, '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(6, 'aze', 'aze', 'aze@aze.fr', 'aze@aze.fr', 1, 1, '$2y$13$6ljG9kThjy0ENDWnyIIEnO4UPp2PvpAB0Gxq95dEGW26rJP19UstS', 'azert', '2017-04-04 16:35:58', 202020202, 0, '[\"ROLE_USER\"]');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`idadresse`);

--
-- Index pour la table `adresseuser`
--
ALTER TABLE `adresseuser`
  ADD PRIMARY KEY (`idadresse`,`iduser`),
  ADD KEY `IDX_C9BC5D235E5C27E9` (`iduser`),
  ADD KEY `IDX_C9BC5D231C5B5A78` (`idadresse`);

--
-- Index pour la table `appartientgroupe`
--
ALTER TABLE `appartientgroupe`
  ADD PRIMARY KEY (`idgroupelien`,`idusergroupe`),
  ADD KEY `IDX_91758309A1EA86DF` (`idusergroupe`),
  ADD KEY `IDX_91758309AA5052D8` (`idgroupelien`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `fk_commentaireuser` (`idUser`),
  ADD KEY `fk_idcommente` (`idCommente`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`idParametre`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idrelation`),
  ADD KEY `fk_idcontact` (`idcontact`),
  ADD KEY `fk_auncontact` (`iduser`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`idEmprunt`),
  ADD UNIQUE KEY `UNIQ_364071D7DC0C2278` (`idExemplaire`),
  ADD KEY `fk_empruntexemplaire` (`idExemplaire`),
  ADD KEY `fk_idemprunteur` (`idemprunteur`),
  ADD KEY `IDX_364071D71C5B5A78` (`idadresse`),
  ADD KEY `IDX_364071D72F4CE6DF` (`idproprietaire`);

--
-- Index pour la table `etatexemplaire`
--
ALTER TABLE `etatexemplaire`
  ADD PRIMARY KEY (`etat`),
  ADD UNIQUE KEY `UNIQ_E3F6DB63DC0C2278` (`idExemplaire`);

--
-- Index pour la table `etatitem`
--
ALTER TABLE `etatitem`
  ADD PRIMARY KEY (`etatInitial`),
  ADD UNIQUE KEY `UNIQ_14ABE57C6CE67B80` (`idItem`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idEvenement`);

--
-- Index pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`idexemplaire`),
  ADD KEY `fk_userexemplaire` (`idUser`),
  ADD KEY `fk_itemexemplaire` (`idItem`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`idItem`),
  ADD KEY `IDX_1F1B251EB597FD62` (`idCategorie`);

--
-- Index pour la table `liencategorie`
--
ALTER TABLE `liencategorie`
  ADD PRIMARY KEY (`idItem`,`idCategorie`),
  ADD KEY `IDX_6F1FBF9D6CE67B80` (`idItem`),
  ADD KEY `IDX_6F1FBF9DB597FD62` (`idCategorie`);

--
-- Index pour la table `liencategoriepropriete`
--
ALTER TABLE `liencategoriepropriete`
  ADD PRIMARY KEY (`idcategorie`,`idpropriete`),
  ADD KEY `IDX_2F906B5937667FC1` (`idcategorie`),
  ADD KEY `IDX_2F906B59DB3F266` (`idpropriete`);

--
-- Index pour la table `lienemprunt`
--
ALTER TABLE `lienemprunt`
  ADD PRIMARY KEY (`idEmprunt`,`idadresse`),
  ADD KEY `IDX_6402426226F91A25` (`idEmprunt`),
  ADD KEY `IDX_640242621C5B5A78` (`idadresse`);

--
-- Index pour la table `liengroupe`
--
ALTER TABLE `liengroupe`
  ADD PRIMARY KEY (`idUser`,`idGroupe`),
  ADD KEY `IDX_2E680F92FE6E88D7` (`idUser`),
  ADD KEY `IDX_2E680F9267A824BB` (`idGroupe`);

--
-- Index pour la table `lienpropriete`
--
ALTER TABLE `lienpropriete`
  ADD PRIMARY KEY (`idPropriete`);

--
-- Index pour la table `liensouscategorie`
--
ALTER TABLE `liensouscategorie`
  ADD PRIMARY KEY (`idisCategorie`,`idSousCategorie`),
  ADD KEY `IDX_9D508DF9B624175C` (`idisCategorie`),
  ADD KEY `IDX_9D508DF927E6798C` (`idSousCategorie`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `fk_destinataire` (`idUserDest`),
  ADD KEY `fk_expediteur` (`idUserExp`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD UNIQUE KEY `UNIQ_CFBDFA1427AD97C4` (`idCommentaire`);

--
-- Index pour la table `noteexemplaire`
--
ALTER TABLE `noteexemplaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD UNIQUE KEY `UNIQ_CFBDFA1427AD97C4` (`idCommentaire`),
  ADD KEY `IDX_4C37810F8E90920` (`idCommente`),
  ADD KEY `IDX_4C37810FE6E88D7` (`idUser`);

--
-- Index pour la table `noteuser`
--
ALTER TABLE `noteuser`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD UNIQUE KEY `UNIQ_CFBDFA1427AD97C4` (`idCommentaire`),
  ADD KEY `IDX_B00BEF53F8E90920` (`idCommente`),
  ADD KEY `IDX_B00BEF53FE6E88D7` (`idUser`);

--
-- Index pour la table `produitpropriete`
--
ALTER TABLE `produitpropriete`
  ADD PRIMARY KEY (`idproduit`,`idpropriete`),
  ADD KEY `IDX_74772CE0F6A1BE49` (`idproduit`),
  ADD KEY `IDX_74772CE0DB3F266` (`idpropriete`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`idEmprunt`,`idAdresseUser`),
  ADD UNIQUE KEY `UNIQ_10C31F8626F91A25` (`idEmprunt`),
  ADD KEY `fk_rdvadresse` (`idAdresseUser`);

--
-- Index pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD PRIMARY KEY (`idSousCategorie`);

--
-- Index pour la table `textcomexemplaire`
--
ALTER TABLE `textcomexemplaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD UNIQUE KEY `UNIQ_CFBDFA1427AD97C4` (`idCommentaire`),
  ADD KEY `IDX_6890A8D7F8E90920` (`idCommente`),
  ADD KEY `IDX_6890A8D7FE6E88D7` (`idUser`);

--
-- Index pour la table `textcomuser`
--
ALTER TABLE `textcomuser`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD UNIQUE KEY `UNIQ_CFBDFA1427AD97C4` (`idCommentaire`),
  ADD KEY `IDX_FF5AF050F8E90920` (`idCommente`),
  ADD KEY `IDX_FF5AF050FE6E88D7` (`idUser`);

--
-- Index pour la table `textecommentaire`
--
ALTER TABLE `textecommentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD UNIQUE KEY `UNIQ_89A8368A27AD97C4` (`idCommentaire`),
  ADD KEY `IDX_89A8368A27AD97C4` (`idCommentaire`);

--
-- Index pour la table `typecommentaire`
--
ALTER TABLE `typecommentaire`
  ADD PRIMARY KEY (`description`),
  ADD KEY `fk_commentairetype` (`idCommentaire`);

--
-- Index pour la table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`idurl`),
  ADD UNIQUE KEY `UNIQ_F47645AE6CE67B80` (`idItem`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `idadresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `idParametre` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idrelation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `idEmprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `idEvenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  MODIFY `idexemplaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `lienpropriete`
--
ALTER TABLE `lienpropriete`
  MODIFY `idPropriete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `noteexemplaire`
--
ALTER TABLE `noteexemplaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `noteuser`
--
ALTER TABLE `noteuser`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `idSousCategorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `textcomexemplaire`
--
ALTER TABLE `textcomexemplaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `textcomuser`
--
ALTER TABLE `textcomuser`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `url`
--
ALTER TABLE `url`
  MODIFY `idurl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresseuser`
--
ALTER TABLE `adresseuser`
  ADD CONSTRAINT `FK_C9BC5D231C5B5A78` FOREIGN KEY (`idadresse`) REFERENCES `adresse` (`idadresse`),
  ADD CONSTRAINT `FK_C9BC5D235E5C27E9` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `appartientgroupe`
--
ALTER TABLE `appartientgroupe`
  ADD CONSTRAINT `FK_91758309A1EA86DF` FOREIGN KEY (`idusergroupe`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_91758309AA5052D8` FOREIGN KEY (`idgroupelien`) REFERENCES `groupe` (`idGroupe`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_67F068BCF8E90920` FOREIGN KEY (`idCommente`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_67F068BCFE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E6385E5C27E9` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_4C62E6389366B456` FOREIGN KEY (`idcontact`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_364071D71C5B5A78` FOREIGN KEY (`idadresse`) REFERENCES `adresse` (`idadresse`),
  ADD CONSTRAINT `FK_364071D72F4CE6DF` FOREIGN KEY (`idproprietaire`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_364071D758897AE4` FOREIGN KEY (`idemprunteur`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_364071D7DC0C2278` FOREIGN KEY (`idExemplaire`) REFERENCES `exemplaire` (`idexemplaire`);

--
-- Contraintes pour la table `etatexemplaire`
--
ALTER TABLE `etatexemplaire`
  ADD CONSTRAINT `FK_E3F6DB63DC0C2278` FOREIGN KEY (`idExemplaire`) REFERENCES `exemplaire` (`idexemplaire`);

--
-- Contraintes pour la table `etatitem`
--
ALTER TABLE `etatitem`
  ADD CONSTRAINT `FK_14ABE57C6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`idItem`);

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `FK_5EF83C926CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`idItem`),
  ADD CONSTRAINT `FK_5EF83C92FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_1F1B251EB597FD62` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `liencategorie`
--
ALTER TABLE `liencategorie`
  ADD CONSTRAINT `FK_6F1FBF9D6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`idItem`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_6F1FBF9DB597FD62` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `liencategoriepropriete`
--
ALTER TABLE `liencategoriepropriete`
  ADD CONSTRAINT `FK_2F906B5937667FC1` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idCategorie`),
  ADD CONSTRAINT `FK_2F906B59DB3F266` FOREIGN KEY (`idpropriete`) REFERENCES `lienpropriete` (`idPropriete`);

--
-- Contraintes pour la table `lienemprunt`
--
ALTER TABLE `lienemprunt`
  ADD CONSTRAINT `FK_640242621C5B5A78` FOREIGN KEY (`idadresse`) REFERENCES `adresse` (`idadresse`),
  ADD CONSTRAINT `FK_6402426226F91A25` FOREIGN KEY (`idEmprunt`) REFERENCES `emprunt` (`idEmprunt`);

--
-- Contraintes pour la table `liengroupe`
--
ALTER TABLE `liengroupe`
  ADD CONSTRAINT `FK_2E680F9267A824BB` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`),
  ADD CONSTRAINT `FK_2E680F92FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `liensouscategorie`
--
ALTER TABLE `liensouscategorie`
  ADD CONSTRAINT `FK_9D508DF927E6798C` FOREIGN KEY (`idSousCategorie`) REFERENCES `souscategorie` (`idSousCategorie`),
  ADD CONSTRAINT `FK_9D508DF9B624175C` FOREIGN KEY (`idisCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307FDD8AD487` FOREIGN KEY (`idUserDest`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_B6BD307FEF6569AC` FOREIGN KEY (`idUserExp`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA1427AD97C4` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaire` (`idCommentaire`);

--
-- Contraintes pour la table `noteexemplaire`
--
ALTER TABLE `noteexemplaire`
  ADD CONSTRAINT `FK_4C37810F8E90920` FOREIGN KEY (`idCommente`) REFERENCES `exemplaire` (`idexemplaire`),
  ADD CONSTRAINT `FK_4C37810FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `noteuser`
--
ALTER TABLE `noteuser`
  ADD CONSTRAINT `FK_B00BEF53F8E90920` FOREIGN KEY (`idCommente`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_B00BEF53FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `produitpropriete`
--
ALTER TABLE `produitpropriete`
  ADD CONSTRAINT `FK_74772CE0DB3F266` FOREIGN KEY (`idpropriete`) REFERENCES `lienpropriete` (`idPropriete`),
  ADD CONSTRAINT `FK_74772CE0F6A1BE49` FOREIGN KEY (`idproduit`) REFERENCES `item` (`idItem`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `FK_10C31F8626F91A25` FOREIGN KEY (`idEmprunt`) REFERENCES `emprunt` (`idEmprunt`),
  ADD CONSTRAINT `FK_10C31F8629D30D65` FOREIGN KEY (`idAdresseUser`) REFERENCES `adresse` (`idadresse`);

--
-- Contraintes pour la table `textcomexemplaire`
--
ALTER TABLE `textcomexemplaire`
  ADD CONSTRAINT `FK_6890A8D7F8E90920` FOREIGN KEY (`idCommente`) REFERENCES `exemplaire` (`idexemplaire`),
  ADD CONSTRAINT `FK_6890A8D7FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `textcomuser`
--
ALTER TABLE `textcomuser`
  ADD CONSTRAINT `FK_FF5AF050F8E90920` FOREIGN KEY (`idCommente`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_FF5AF050FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `textecommentaire`
--
ALTER TABLE `textecommentaire`
  ADD CONSTRAINT `FK_89A8368A27AD97C4` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaire` (`idCommentaire`);

--
-- Contraintes pour la table `typecommentaire`
--
ALTER TABLE `typecommentaire`
  ADD CONSTRAINT `FK_19B84EE127AD97C4` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaire` (`idCommentaire`);

--
-- Contraintes pour la table `url`
--
ALTER TABLE `url`
  ADD CONSTRAINT `FK_F47645AE6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`idItem`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
