-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 sep. 2021 à 18:55
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_tyssere`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `historique`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `historique` ()  NO SQL
SELECT CONCAT(p.Nom_personne,' ',p.Prenom_personne) as "nom" , p.Dateembauche,p.nbrj_conge,c.date_debut,c.date_fin,t.type_conge
FROM personne p, conges c, type_conge t
WHERE p.Cin_personne = c.personne and t.Id_type_conge = c.type_conge and YEAR(c.date_debut) = YEAR(NOW())
GROUP BY Nom_personne$$

DROP PROCEDURE IF EXISTS `historique_ing`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `historique_ing` ()  NO SQL
SELECT CONCAT(p.Nom_personne,' ',p.Prenom_personne) as "nom" , p.Dateembauche,p.nbrj_conge,c.date_debut,c.date_fin,t.type_conge
FROM personne p, conges c, type_conge t
WHERE p.Cin_personne = c.personne and t.Id_type_conge = c.type_conge and YEAR(c.date_debut) = YEAR(NOW()) and p.service= 4
GROUP BY Nom_personne$$

DROP PROCEDURE IF EXISTS `historique_tech`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `historique_tech` ()  NO SQL
SELECT CONCAT(p.Nom_personne,' ',p.Prenom_personne) as "nom" , p.Dateembauche,p.nbrj_conge,c.date_debut,c.date_fin,t.type_conge
FROM personne p, conges c, type_conge t
WHERE p.Cin_personne = c.personne and t.Id_type_conge = c.type_conge and YEAR(c.date_debut) = YEAR(NOW()) and p.service= 3
GROUP BY Nom_personne$$

DROP PROCEDURE IF EXISTS `profile_emp`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `profile_emp` (IN `cin` VARCHAR(20))  NO SQL
SELECT * FROM personne p , service s WHERE s.Id_service = p.service AND p.Cin_personne = cin$$

DROP PROCEDURE IF EXISTS `salaire_mensuel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `salaire_mensuel` (IN `cin_p` VARCHAR(20))  NO SQL
SELECT s.salaire,p.nbrj_conge FROM personne p , service s WHERE p.service=s.Id_service and p.Cin_personne = cin_p$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `bonus`
--

DROP TABLE IF EXISTS `bonus`;
CREATE TABLE IF NOT EXISTS `bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raison` varchar(50) NOT NULL,
  `somme` float NOT NULL,
  `Personne` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_personne_id` (`Personne`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bonus`
--

INSERT INTO `bonus` (`id`, `raison`, `somme`, `Personne`, `date`) VALUES
(5, 'HSKJFDHFLKH', 100, 'CB318188', '2021-09-06 21:48:30');

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

DROP TABLE IF EXISTS `conges`;
CREATE TABLE IF NOT EXISTS `conges` (
  `id_conge` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `Personne` varchar(10) NOT NULL,
  `type_conge` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `raison` varchar(50) NOT NULL,
  PRIMARY KEY (`id_conge`),
  KEY `Personne` (`Personne`),
  KEY `type_conge` (`type_conge`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id_conge`, `date_debut`, `date_fin`, `Personne`, `type_conge`, `status`, `raison`) VALUES
(63, '2021-08-31', '2021-09-25', 'CB318188', 1, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `Cin_personne` varchar(10) NOT NULL,
  `Nom_personne` varchar(20) NOT NULL,
  `Prenom_personne` varchar(20) NOT NULL,
  `Gender_personne` char(2) NOT NULL,
  `Datenaissance` date NOT NULL,
  `Dateembauche` date NOT NULL,
  `service` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nbrj_conge` int(11) NOT NULL,
  PRIMARY KEY (`Cin_personne`),
  KEY `service` (`service`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`Cin_personne`, `Nom_personne`, `Prenom_personne`, `Gender_personne`, `Datenaissance`, `Dateembauche`, `service`, `email`, `nbrj_conge`) VALUES
('CB318188', 'Hanaa', 'Louk', 'M', '1998-08-02', '2021-08-01', 1, 'loukilisoufianee@gmail.com', 30),
('CB1000', 'Soufiane', 'Loukili', 'M', '1999-08-03', '2021-01-01', 3, 'aaa@gmail.com', 30),
('SH1000', 'Maryam', 'Khider', 'F', '1998-04-01', '2021-08-29', 4, 'khider.maryam@gmail.com', 30);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `Id_service` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_service` varchar(20) NOT NULL,
  `salaire` float DEFAULT NULL,
  PRIMARY KEY (`Id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`Id_service`, `Nom_service`, `salaire`) VALUES
(1, 'Administration', 8000),
(3, 'Techniciens', 4500),
(4, 'Ingenieurs', 7500);

-- --------------------------------------------------------

--
-- Structure de la table `type_conge`
--

DROP TABLE IF EXISTS `type_conge`;
CREATE TABLE IF NOT EXISTS `type_conge` (
  `Id_type_conge` int(11) NOT NULL AUTO_INCREMENT,
  `type_conge` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id_type_conge`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_conge`
--

INSERT INTO `type_conge` (`Id_type_conge`, `type_conge`) VALUES
(1, 'Vacance'),
(2, 'Malade');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
