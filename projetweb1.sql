-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 mai 2024 à 11:38
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb1`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `usertype` varchar(33) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id_admin`, `username`, `password`, `usertype`) VALUES
(2, 'ezzahra', '2004', 'admin'),
(3, 'chaimaa', '2005', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_dep` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `id_admi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_dep`, `name`, `id_admi`) VALUES
(25, 'INFORMATIQUE', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `intern`
--

CREATE TABLE `intern` (
  `id_intern` int(11) NOT NULL,
  `f_name` varchar(33) NOT NULL,
  `l_name` varchar(33) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `intern`
--

INSERT INTO `intern` (`id_intern`, `f_name`, `l_name`, `birthday`) VALUES
(6, 'Mahmoud', 'Gomi', '2015-09-11'),
(7, 'salama', 'fikri', '2005-04-15'),
(9, 'DOUAA', 'NAHLI', '2005-10-12'),
(10, 'KAOUTAR', 'LEMAACHI', '2005-07-20');

-- --------------------------------------------------------

--
-- Structure de la table `internship`
--

CREATE TABLE `internship` (
  `id_ship` int(11) NOT NULL,
  `id_admins` int(11) DEFAULT NULL,
  `id_deps` int(11) DEFAULT NULL,
  `id_interns` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `id_admi` (`id_admi`);

--
-- Index pour la table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`id_intern`);

--
-- Index pour la table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id_ship`),
  ADD KEY `id_admins` (`id_admins`),
  ADD KEY `id_deps` (`id_deps`),
  ADD KEY `id_interns` (`id_interns`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `intern`
--
ALTER TABLE `intern`
  MODIFY `id_intern` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `internship`
--
ALTER TABLE `internship`
  MODIFY `id_ship` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`id_admi`) REFERENCES `administration` (`id_admin`);

--
-- Contraintes pour la table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`id_admins`) REFERENCES `administration` (`id_admin`),
  ADD CONSTRAINT `internship_ibfk_2` FOREIGN KEY (`id_deps`) REFERENCES `departement` (`id_dep`),
  ADD CONSTRAINT `internship_ibfk_3` FOREIGN KEY (`id_interns`) REFERENCES `intern` (`id_intern`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
