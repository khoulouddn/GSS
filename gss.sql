-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 21 août 2018 à 15:46
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gss`
--

-- --------------------------------------------------------

--
-- Structure de la table `applications`
--

CREATE TABLE `applications` (
  `idapp` int(11) NOT NULL,
  `version` varchar(45) DEFAULT NULL,
  `description` text,
  `serveur dapplications_idserveur` varchar(255) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

CREATE TABLE `caracteristiques` (
  `idcaracteristiques` int(11) NOT NULL,
  `marque` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `adresseMAC` varchar(45) DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `CPU` varchar(45) DEFAULT NULL,
  `espacedisque` varchar(45) DEFAULT NULL,
  `nbrcartesreseaux` int(11) DEFAULT NULL,
  `OS` varchar(45) DEFAULT NULL,
  `typeos` varchar(45) DEFAULT NULL,
  `versionantivirus` varchar(45) DEFAULT NULL,
  `serveur_idserveur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caracteristiques`
--

INSERT INTO `caracteristiques` (`idcaracteristiques`, `marque`, `type`, `adresseMAC`, `RAM`, `CPU`, `espacedisque`, `nbrcartesreseaux`, `OS`, `typeos`, `versionantivirus`, `serveur_idserveur`) VALUES
(1, '', '', '', 0, '', '', 0, '', '', '', '000');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `idcompte` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idcompte`, `nom`, `type`, `mail`, `service`, `motdepasse`, `avatar`) VALUES
('1', 'khiat1', 'Admin', 'khiat@gmail.com', 'Système et sécurité', '111', 'user.png');

-- --------------------------------------------------------

--
-- Structure de la table `fichier partage`
--

CREATE TABLE `fichier partage` (
  `idfichierpartage` int(11) NOT NULL,
  `nomfichier` varchar(45) DEFAULT NULL,
  `chemin` varchar(45) DEFAULT NULL,
  `membre` varchar(45) DEFAULT NULL,
  `le` date DEFAULT NULL,
  `serveur de partage_idserveur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupe-admin`
--

CREATE TABLE `groupe-admin` (
  `idadmin` varchar(255) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `service` varchar(45) DEFAULT NULL,
  `motdepasse` varchar(45) DEFAULT NULL,
  `description` longtext,
  `serveur_idserveur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupe-partage`
--

CREATE TABLE `groupe-partage` (
  `idgrppartage` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `autresdroits` varchar(45) DEFAULT NULL,
  `fichier partage_idfichierpartage` int(11) NOT NULL,
  `droits` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idmembre` varchar(255) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `motdepasse` varchar(45) DEFAULT NULL,
  `groupepartage_idgrppartage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `serveur`
--

CREATE TABLE `serveur` (
  `idserveur` varchar(255) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `IP` varchar(45) DEFAULT NULL,
  `DNS` varchar(45) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `localisation` varchar(45) DEFAULT NULL,
  `passerelle` varchar(45) DEFAULT NULL,
  `dernieremodification` date DEFAULT NULL,
  `dureegarantie` varchar(45) DEFAULT NULL,
  `typeserveur` varchar(45) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `serveur dapplications_idserveur` varchar(255) NOT NULL,
  `serveur de partage_idserveur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `serveur`
--

INSERT INTO `serveur` (`idserveur`, `nom`, `IP`, `DNS`, `etat`, `localisation`, `passerelle`, `dernieremodification`, `dureegarantie`, `typeserveur`, `avatar`, `serveur dapplications_idserveur`, `serveur de partage_idserveur`) VALUES
('000', '000', '', '', '', '', '', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `serveur dapplications`
--

CREATE TABLE `serveur dapplications` (
  `idserveur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `serveur de partage`
--

CREATE TABLE `serveur de partage` (
  `idserveur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `serveur relier`
--

CREATE TABLE `serveur relier` (
  `idserveur` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `IP` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `DNS` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `etat` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `localisation` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `passerelle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dernieremodification` date DEFAULT NULL,
  `dureegarantie` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `typeserveur` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `marque` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `adresseMAC` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `CPU` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `espacedisque` int(255) DEFAULT NULL,
  `nbrcartesreseaux` varchar(11) DEFAULT NULL,
  `OS` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `typeos` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `versionantivirus` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `serveur_idserveur` varchar(255) CHARACTER SET utf8 NOT NULL,
  `caracteristiques_idcaracteristiques` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`idapp`,`serveur dapplications_idserveur`),
  ADD KEY `fk_applications_serveur dapplications1_idx` (`serveur dapplications_idserveur`);

--
-- Index pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD PRIMARY KEY (`idcaracteristiques`,`serveur_idserveur`),
  ADD KEY `fk_caracteristiques_serveur1_idx` (`serveur_idserveur`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idcompte`);

--
-- Index pour la table `fichier partage`
--
ALTER TABLE `fichier partage`
  ADD PRIMARY KEY (`idfichierpartage`,`serveur de partage_idserveur`),
  ADD KEY `fk_fichier partage_serveur de partage1_idx` (`serveur de partage_idserveur`);

--
-- Index pour la table `groupe-admin`
--
ALTER TABLE `groupe-admin`
  ADD PRIMARY KEY (`idadmin`,`serveur_idserveur`),
  ADD KEY `fk_groupe-admin_serveur1_idx` (`serveur_idserveur`);

--
-- Index pour la table `groupe-partage`
--
ALTER TABLE `groupe-partage`
  ADD PRIMARY KEY (`idgrppartage`,`fichier partage_idfichierpartage`),
  ADD KEY `fk_groupe-partage_fichier partage1_idx` (`fichier partage_idfichierpartage`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idmembre`,`groupepartage_idgrppartage`),
  ADD KEY `fk_membre_groupe-partage1_idx` (`groupepartage_idgrppartage`);

--
-- Index pour la table `serveur`
--
ALTER TABLE `serveur`
  ADD PRIMARY KEY (`idserveur`,`serveur dapplications_idserveur`,`serveur de partage_idserveur`);

--
-- Index pour la table `serveur dapplications`
--
ALTER TABLE `serveur dapplications`
  ADD PRIMARY KEY (`idserveur`);

--
-- Index pour la table `serveur de partage`
--
ALTER TABLE `serveur de partage`
  ADD PRIMARY KEY (`idserveur`);

--
-- Index pour la table `serveur relier`
--
ALTER TABLE `serveur relier`
  ADD PRIMARY KEY (`idserveur`,`serveur_idserveur`,`caracteristiques_idcaracteristiques`),
  ADD KEY `serveur_idserveur` (`serveur_idserveur`),
  ADD KEY `serveur relier_ibfk_2` (`caracteristiques_idcaracteristiques`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `applications`
--
ALTER TABLE `applications`
  MODIFY `idapp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  MODIFY `idcaracteristiques` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fichier partage`
--
ALTER TABLE `fichier partage`
  MODIFY `idfichierpartage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupe-partage`
--
ALTER TABLE `groupe-partage`
  MODIFY `idgrppartage` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `fk_applications_serveur dapplications1` FOREIGN KEY (`serveur dapplications_idserveur`) REFERENCES `serveur dapplications` (`idserveur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD CONSTRAINT `fk_caracteristiques_serveur1` FOREIGN KEY (`serveur_idserveur`) REFERENCES `serveur` (`idserveur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fichier partage`
--
ALTER TABLE `fichier partage`
  ADD CONSTRAINT `fk_fichier partage_serveur de partage1` FOREIGN KEY (`serveur de partage_idserveur`) REFERENCES `serveur de partage` (`idserveur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupe-admin`
--
ALTER TABLE `groupe-admin`
  ADD CONSTRAINT `fk_groupe-admin_serveur1` FOREIGN KEY (`serveur_idserveur`) REFERENCES `serveur` (`idserveur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupe-partage`
--
ALTER TABLE `groupe-partage`
  ADD CONSTRAINT `fk_groupe-partage_fichier partage1` FOREIGN KEY (`fichier partage_idfichierpartage`) REFERENCES `fichier partage` (`idfichierpartage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_membre_groupe-partage1` FOREIGN KEY (`groupepartage_idgrppartage`) REFERENCES `groupe-partage` (`idgrppartage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `serveur dapplications`
--
ALTER TABLE `serveur dapplications`
  ADD CONSTRAINT `fk_serveur dapplications_serveur1` FOREIGN KEY (`idserveur`) REFERENCES `serveur` (`idserveur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `serveur de partage`
--
ALTER TABLE `serveur de partage`
  ADD CONSTRAINT `fk_serveur de partage_serveur1` FOREIGN KEY (`idserveur`) REFERENCES `serveur` (`idserveur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `serveur relier`
--
ALTER TABLE `serveur relier`
  ADD CONSTRAINT `serveur relier_ibfk_1` FOREIGN KEY (`serveur_idserveur`) REFERENCES `serveur` (`idserveur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serveur relier_ibfk_2` FOREIGN KEY (`caracteristiques_idcaracteristiques`) REFERENCES `caracteristiques` (`idcaracteristiques`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
