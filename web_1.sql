-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 mars 2021 à 13:23
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
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_Login` int(11) NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`),
  UNIQUE KEY `Administrateur_Authentification_AK` (`ID_Login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_Utilisateur`, `Nom`, `Prenom`, `Photo_Utilisateur`, `ID_Login`) VALUES
(1, 'Admin', 'Admin', 'Admin.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

DROP TABLE IF EXISTS `authentification`;
CREATE TABLE IF NOT EXISTS `authentification` (
  `ID_login` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(50) NOT NULL,
  `Mot_de_passe` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_login`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`ID_login`, `Login`, `Mot_de_passe`) VALUES
(1, 'testadmin', 'testmdp123*'),
(2, 'testpilote', 'testmdp123*'),
(3, 'testdelegue', 'testmdp123*'),
(4, 'testeleve', 'testmdp123*'),
(6, 'eleve', 'mdp');

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

DROP TABLE IF EXISTS `candidature`;
CREATE TABLE IF NOT EXISTS `candidature` (
  `ID_Candidature` int(11) NOT NULL AUTO_INCREMENT,
  `CV_etudiant` varchar(30) NOT NULL,
  `Lettre_de_motivation_etudiant` varchar(30) NOT NULL,
  `Fiche_de_validation` varchar(30) NOT NULL,
  `Convention_de_stage` varchar(30) NOT NULL,
  `LIEN_OFFRE` varchar(30) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  `ID_offre` int(11) NOT NULL,
  `ID_Utilisateur_Pilote` int(11) NOT NULL,
  PRIMARY KEY (`ID_Candidature`),
  KEY `Candidature_etudiant_FK` (`ID_Utilisateur`),
  KEY `Candidature_Offre0_FK` (`ID_offre`),
  KEY `Candidature_Pilote1_FK` (`ID_Utilisateur_Pilote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `delegue`
--

DROP TABLE IF EXISTS `delegue`;
CREATE TABLE IF NOT EXISTS `delegue` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Centre_Delegue` char(30) NOT NULL,
  `Promotion_delegue` varchar(20) NOT NULL,
  `Specialite` char(20) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_Utilisateur__CREE` int(11) NOT NULL,
  `ID_Login` int(11) NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`),
  UNIQUE KEY `delegue_Authentification_AK` (`ID_Login`),
  KEY `delegue_UTILISATEUR0_FK` (`ID_Utilisateur__CREE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `delegue`
--

INSERT INTO `delegue` (`ID_Utilisateur`, `Centre_Delegue`, `Promotion_delegue`, `Specialite`, `Nom`, `Prenom`, `Photo_Utilisateur`, `ID_Utilisateur__CREE`, `ID_Login`) VALUES
(3, 'nanterre', 'A2', 'informatique', 'delegue', 'delegue', 'delegue.png', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `droitdelegue`
--

DROP TABLE IF EXISTS `droitdelegue`;
CREATE TABLE IF NOT EXISTS `droitdelegue` (
  `ID_Utilisateur` int(11) NOT NULL,
  `ID_Utilisateur_droitdelegue` int(11) NOT NULL,
  `Creer_une_offre` tinyint(1) NOT NULL,
  `Modifier_une_offre` tinyint(1) NOT NULL,
  `Supprimer_une_offre` tinyint(1) NOT NULL,
  `Rechercher_un_compte_delegue` tinyint(1) NOT NULL,
  `Creer_un_delegue` tinyint(1) NOT NULL,
  `Modifier_un_compte_delegue` tinyint(1) NOT NULL,
  `Supprimer_un_compte_delegue` tinyint(1) NOT NULL,
  `Rechercher_un_compte_etudiant` tinyint(1) NOT NULL,
  `Creer_un_etudiant` tinyint(1) NOT NULL,
  `Modifier_un_etudiant` tinyint(1) NOT NULL,
  `Supprimer_un_etudiant` tinyint(1) NOT NULL,
  `Consulter_les_stats_des_etudiants` tinyint(1) NOT NULL,
  `Informer_le_systeme_de_l_avancement_de_la_candidature_step_3` tinyint(1) NOT NULL,
  `Informer_le_systeme_de_l_avancement_de_la_candidature_step_4` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`,`ID_Utilisateur_droitdelegue`),
  KEY `droitdelegue_UTILISATEUR0_FK` (`ID_Utilisateur_droitdelegue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `ID_Entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_entreprise` varchar(30) NOT NULL,
  `Secteur_activite` varchar(30) NOT NULL,
  `Competences_recherchees_dans_les_stages` varchar(100) NOT NULL,
  `Nombre_de_stagiaires_CESI_deja_acceptes_en_stage` int(11) NOT NULL,
  `Evaluation_des_stagiaires` int(11) NOT NULL,
  `Confiance_du_Pilote_de_promotion` int(11) NOT NULL,
  `Localite_entreprise` varchar(20) NOT NULL,
  `Logo_Entreprise` varchar(50) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID_Entreprise`),
  KEY `Entreprise_UTILISATEUR_FK` (`ID_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Entreprise`, `Nom_entreprise`, `Secteur_activite`, `Competences_recherchees_dans_les_stages`, `Nombre_de_stagiaires_CESI_deja_acceptes_en_stage`, `Evaluation_des_stagiaires`, `Confiance_du_Pilote_de_promotion`, `Localite_entreprise`, `Logo_Entreprise`, `ID_Utilisateur`) VALUES
(1, 'TEST', 'developpement', 'Développement', 4, 3, 3, 'Nanterre', 'api/img/entreprises/logobidon.png', 1),
(2, 'Capgemini', 'developpement', 'informatique', 8, 5, 4, 'Ile de France', 'api/img/entreprises/capgemini.png', 3),
(11, 'Renamed', 'SecteurTest', 'CompetenceTest', 0, 4, 5, 'LocaliteTest', 'api/img/entreprises/logotest.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Centre_etudiant` char(30) NOT NULL,
  `Promotion_etudiant` varchar(20) NOT NULL,
  `Specialite` char(20) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_Utilisateur__CREE` int(11) NOT NULL,
  `ID_Login` int(11) NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`),
  UNIQUE KEY `etudiant_Authentification_AK` (`ID_Login`),
  KEY `etudiant_UTILISATEUR0_FK` (`ID_Utilisateur__CREE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_Utilisateur`, `Centre_etudiant`, `Promotion_etudiant`, `Specialite`, `Nom`, `Prenom`, `Photo_Utilisateur`, `ID_Utilisateur__CREE`, `ID_Login`) VALUES
(4, 'nanterre', 'A2', 'informatique', 'etudiant', 'etudiant', 'etudiant.png', 2, 4),
(5, 'nanterre', 'a3', 'informatique', 'eleve', 'eleve', 'eleve.png', 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `ID_offre` int(11) NOT NULL AUTO_INCREMENT,
  `Secteur` varchar(20) NOT NULL,
  `Competences_offre` varchar(100) NOT NULL,
  `Localite_offre` varchar(10) NOT NULL,
  `Entreprise_offre` varchar(20) NOT NULL,
  `Type_de_promotion_concernee` varchar(20) NOT NULL,
  `Duree_du_stage` varchar(10) NOT NULL,
  `Base_de_remuneration` int(11) NOT NULL,
  `Date_de_offre` date NOT NULL,
  `Nombre_de_places_disponible` int(11) NOT NULL,
  `ID_Entreprise` int(11) DEFAULT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID_offre`),
  KEY `Offre_Entreprise_FK` (`ID_Entreprise`),
  KEY `Offre_UTILISATEUR0_FK` (`ID_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`ID_offre`, `Secteur`, `Competences_offre`, `Localite_offre`, `Entreprise_offre`, `Type_de_promotion_concernee`, `Duree_du_stage`, `Base_de_remuneration`, `Date_de_offre`, `Nombre_de_places_disponible`, `ID_Entreprise`, `ID_Utilisateur`) VALUES
(3, 'informatique', 'comptestbidon', 'localtestb', 'entrtest', '2021', '6', 1000, '2001-01-21', 5, 1, 1),
(4, 'btp', 'comptest', 'localtest', 'entrtest', '2021', '6', 1000, '2001-01-21', 5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

DROP TABLE IF EXISTS `pilote`;
CREATE TABLE IF NOT EXISTS `pilote` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Centre_pilote` char(30) NOT NULL,
  `Promotion_pilote` varchar(20) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_Utilisateur_Administrateur` int(11) DEFAULT NULL,
  `ID_Login` int(11) NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`),
  UNIQUE KEY `Pilote_Authentification_AK` (`ID_Login`),
  KEY `Pilote_Administrateur0_FK` (`ID_Utilisateur_Administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`ID_Utilisateur`, `Centre_pilote`, `Promotion_pilote`, `Nom`, `Prenom`, `Photo_Utilisateur`, `ID_Utilisateur_Administrateur`, `ID_Login`) VALUES
(2, 'nanterre', 'A2', 'Pilote', 'Pilote', 'Pilote.png', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_Utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_Login` int(11) NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`),
  UNIQUE KEY `UTILISATEUR_Authentification_AK` (`ID_Login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_Utilisateur`, `Nom`, `Prenom`, `Photo_Utilisateur`, `ID_Login`) VALUES
(1, 'Utilisateur', 'Admin', 'img/users/default_avatar.png', 1),
(2, 'Utilisateur', 'Pilote', 'img/users/default_avatar.png', 2),
(3, 'Utilisateur', 'Delegue', 'img/users/default_avatar.png', 3),
(4, 'Utilisateur', 'Eleve', 'img/users/default_avatar.png', 4),
(5, 'eleve', 'eleve', 'eleve.png', 6);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `Administrateur_Authentification0_FK` FOREIGN KEY (`ID_Login`) REFERENCES `authentification` (`ID_login`),
  ADD CONSTRAINT `Administrateur_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `Candidature_Offre0_FK` FOREIGN KEY (`ID_offre`) REFERENCES `offre` (`ID_offre`),
  ADD CONSTRAINT `Candidature_Pilote1_FK` FOREIGN KEY (`ID_Utilisateur_Pilote`) REFERENCES `pilote` (`ID_Utilisateur`),
  ADD CONSTRAINT `Candidature_etudiant_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `etudiant` (`ID_Utilisateur`);

--
-- Contraintes pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD CONSTRAINT `delegue_Authentification1_FK` FOREIGN KEY (`ID_Login`) REFERENCES `authentification` (`ID_login`),
  ADD CONSTRAINT `delegue_UTILISATEUR0_FK` FOREIGN KEY (`ID_Utilisateur__CREE`) REFERENCES `utilisateur` (`ID_Utilisateur`),
  ADD CONSTRAINT `delegue_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `droitdelegue`
--
ALTER TABLE `droitdelegue`
  ADD CONSTRAINT `droitdelegue_UTILISATEUR0_FK` FOREIGN KEY (`ID_Utilisateur_droitdelegue`) REFERENCES `utilisateur` (`ID_Utilisateur`),
  ADD CONSTRAINT `droitdelegue_delegue_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `delegue` (`ID_Utilisateur`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `Entreprise_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_Authentification1_FK` FOREIGN KEY (`ID_Login`) REFERENCES `authentification` (`ID_login`),
  ADD CONSTRAINT `etudiant_UTILISATEUR0_FK` FOREIGN KEY (`ID_Utilisateur__CREE`) REFERENCES `utilisateur` (`ID_Utilisateur`),
  ADD CONSTRAINT `etudiant_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `Offre_Entreprise_FK` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`),
  ADD CONSTRAINT `Offre_UTILISATEUR0_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD CONSTRAINT `Pilote_Administrateur0_FK` FOREIGN KEY (`ID_Utilisateur_Administrateur`) REFERENCES `administrateur` (`ID_Utilisateur`),
  ADD CONSTRAINT `Pilote_Authentification1_FK` FOREIGN KEY (`ID_Login`) REFERENCES `authentification` (`ID_login`),
  ADD CONSTRAINT `Pilote_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `UTILISATEUR_Authentification_FK` FOREIGN KEY (`ID_Login`) REFERENCES `authentification` (`ID_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
