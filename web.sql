-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 mars 2021 à 19:04
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

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

CREATE TABLE `administrateur` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `ID_login` int(11) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Mot_de_passe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`ID_login`, `Login`, `Mot_de_passe`) VALUES
(1, 'oue', 'yes'),
(2, 'DIO', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `ID_candidature` int(11) NOT NULL,
  `CV_etudiant` varchar(30) NOT NULL,
  `Lettre_de_motivation_etudiant` varchar(30) NOT NULL,
  `Fiche_de_validation` varchar(30) NOT NULL,
  `Convention_de_stage` varchar(30) NOT NULL,
  `LIEN_OFFRE` varchar(30) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  `ID_offre` int(11) NOT NULL,
  `ID_Utilisateur_Pilote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `delegue`
--

CREATE TABLE `delegue` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Centre_Delegue` char(10) NOT NULL,
  `Promotion_delegue` varchar(20) NOT NULL,
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
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_Utilisateur__Assigne_DROIT` int(11) DEFAULT NULL,
  `ID_Utilisateur__CREE` int(11) NOT NULL,
  `ID_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_Entreprise` int(11) NOT NULL,
  `Nom_entreprise` varchar(30) NOT NULL,
  `Secteur_activite` varchar(30) NOT NULL,
  `Competences_recherchees_dans_les_stages` varchar(100) NOT NULL,
  `Nombre_de_stagiaires_CESI_deja_acceptes_en_stage` int(11) NOT NULL,
  `Evaluation_des_stagiaires` int(11) NOT NULL,
  `Confiance_du_Pilote_de_promotion` int(11) NOT NULL,
  `Localite_entreprise` varchar(20) NOT NULL,
  `Logo_Entreprise` varchar(50) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Entreprise`, `Nom_entreprise`, `Secteur_activite`, `Competences_recherchees_dans_les_stages`, `Nombre_de_stagiaires_CESI_deja_acceptes_en_stage`, `Evaluation_des_stagiaires`, `Confiance_du_Pilote_de_promotion`, `Localite_entreprise`, `Logo_Entreprise`, `ID_Utilisateur`) VALUES
(1, 'cesi', 'ingenieurie', 'autonome', 1, 4, 2, 'nanterre', '', 2),
(2, 'Thales', 'aérospatiale', 'Curiosité', 2, 4, 3, 'La Défense', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Centre_etudiant` char(10) NOT NULL,
  `promotion_etudiant` varchar(20) NOT NULL,
  `Specialite` char(20) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_Utilisateur__CREE` int(11) NOT NULL,
  `ID_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `ID_offre` int(11) NOT NULL,
  `Competences_offre` varchar(100) NOT NULL,
  `Localite_offre` varchar(10) NOT NULL,
  `Entreprise_offre` varchar(20) NOT NULL,
  `Type_de_promotion_concernee` varchar(20) NOT NULL,
  `Duree_du_stage` varchar(10) NOT NULL,
  `Base_de_remuneration` int(11) NOT NULL,
  `Date_de_l’offre` date NOT NULL,
  `Nombre_de_places_disponible` int(11) NOT NULL,
  `ID_Entreprise` int(11) DEFAULT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Centre_pilote` char(10) NOT NULL,
  `Promotion_pilote` varchar(20) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_Utilisateur_Administrateur` int(11) DEFAULT NULL,
  `ID_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_Utilisateur` int(11) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Photo_Utilisateur` varchar(50) NOT NULL,
  `ID_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_Utilisateur`, `Nom`, `Prenom`, `Photo_Utilisateur`, `ID_login`) VALUES
(1, 'DIO', 'GOLDEN', '', 2),
(2, 'jo', 'jo', '', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID_Utilisateur`),
  ADD UNIQUE KEY `Administrateur_Authentification_AK` (`ID_login`);

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`ID_login`);

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`ID_candidature`),
  ADD KEY `Candidature_etudiants_FK` (`ID_Utilisateur`),
  ADD KEY `Candidature_Offre0_FK` (`ID_offre`),
  ADD KEY `Candidature_Pilote1_FK` (`ID_Utilisateur_Pilote`);

--
-- Index pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD PRIMARY KEY (`ID_Utilisateur`),
  ADD UNIQUE KEY `delegue_Authentification_AK` (`ID_login`),
  ADD KEY `delegue_UTILISATEUR0_FK` (`ID_Utilisateur__Assigne_DROIT`),
  ADD KEY `delegue_UTILISATEUR1_FK` (`ID_Utilisateur__CREE`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ID_Entreprise`),
  ADD UNIQUE KEY `Entreprise_UTILISATEUR_AK` (`ID_Utilisateur`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`ID_Utilisateur`),
  ADD UNIQUE KEY `etudiants_Authentification_AK` (`ID_login`),
  ADD KEY `etudiants_UTILISATEUR0_FK` (`ID_Utilisateur__CREE`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`ID_offre`),
  ADD UNIQUE KEY `Offre_UTILISATEUR_AK` (`ID_Utilisateur`),
  ADD KEY `Offre_Entreprise_FK` (`ID_Entreprise`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`ID_Utilisateur`),
  ADD UNIQUE KEY `Pilote_Authentification_AK` (`ID_login`),
  ADD KEY `Pilote_Administrateur0_FK` (`ID_Utilisateur_Administrateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_Utilisateur`),
  ADD UNIQUE KEY `UTILISATEUR_Authentification_AK` (`ID_login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `ID_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `ID_candidature` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `ID_Entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `ID_offre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `Administrateur_Authentification0_FK` FOREIGN KEY (`ID_login`) REFERENCES `authentification` (`ID_login`),
  ADD CONSTRAINT `Administrateur_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `Candidature_Offre0_FK` FOREIGN KEY (`ID_offre`) REFERENCES `offre` (`ID_offre`),
  ADD CONSTRAINT `Candidature_Pilote1_FK` FOREIGN KEY (`ID_Utilisateur_Pilote`) REFERENCES `pilote` (`ID_Utilisateur`),
  ADD CONSTRAINT `Candidature_etudiants_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `etudiants` (`ID_Utilisateur`);

--
-- Contraintes pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD CONSTRAINT `delegue_Authentification2_FK` FOREIGN KEY (`ID_login`) REFERENCES `authentification` (`ID_login`),
  ADD CONSTRAINT `delegue_UTILISATEUR0_FK` FOREIGN KEY (`ID_Utilisateur__Assigne_DROIT`) REFERENCES `utilisateur` (`ID_Utilisateur`),
  ADD CONSTRAINT `delegue_UTILISATEUR1_FK` FOREIGN KEY (`ID_Utilisateur__CREE`) REFERENCES `utilisateur` (`ID_Utilisateur`),
  ADD CONSTRAINT `delegue_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `Entreprise_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_Authentification1_FK` FOREIGN KEY (`ID_login`) REFERENCES `authentification` (`ID_login`),
  ADD CONSTRAINT `etudiants_UTILISATEUR0_FK` FOREIGN KEY (`ID_Utilisateur__CREE`) REFERENCES `utilisateur` (`ID_Utilisateur`),
  ADD CONSTRAINT `etudiants_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

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
  ADD CONSTRAINT `Pilote_Authentification1_FK` FOREIGN KEY (`ID_login`) REFERENCES `authentification` (`ID_login`),
  ADD CONSTRAINT `Pilote_UTILISATEUR_FK` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `UTILISATEUR_Authentification_FK` FOREIGN KEY (`ID_login`) REFERENCES `authentification` (`ID_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
