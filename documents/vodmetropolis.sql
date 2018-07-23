-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 19 juil. 2018 à 17:30
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vodmetropolis`
--

-- --------------------------------------------------------

--
-- Structure de la table `A`
--

CREATE TABLE `A` (
  `ID_films` int(11) NOT NULL,
  `ID_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `A`
--

INSERT INTO `A` (`ID_films`, `ID_genre`) VALUES
(1, 2),
(2, 4),
(3, 3),
(51, 2);

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE `acteurs` (
  `ID_acteurs` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`ID_acteurs`, `nom`) VALUES
(1, 'Omar Sy'),
(2, 'Francois Cluzet'),
(3, 'Audrey Fleurot'),
(4, 'Cyril Mendy'),
(5, 'Bruce Willis'),
(6, 'Halley Joel Osmont'),
(7, 'Toni Colette'),
(8, 'Sam worthington'),
(9, 'Zoe Saldana'),
(10, 'Sigourney Weaver'),
(11, 'Tom Hanks'),
(12, 'Ewan Mc Gregor'),
(13, 'Ayelet Zurer'),
(14, 'John Travolta'),
(15, 'Steve  Buscemi'),
(16, 'Harvey Keitel'),
(21, ' Stella Skarsgard'),
(22, ' Cosimo Fusco'),
(31, 'Kaenu Reeves'),
(32, ' Laurence Fishburne'),
(33, ' Carrie-Ann Moss'),
(34, ' Hugo Weaving'),
(219, 'Audrey Tautou'),
(220, ' Philippe Beautier'),
(221, ' Régis Iacono'),
(222, ' Andrée DAmant');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `ID_administrateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_administrateur`, `nom`, `identifiant`, `password`) VALUES
(1, 'adminstrateur', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `administre`
--

CREATE TABLE `administre` (
  `ID_films` int(11) NOT NULL,
  `ID_administrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `est`
--

CREATE TABLE `est` (
  `ID_films` int(11) NOT NULL,
  `ID_motcle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `ID_favoris` int(11) NOT NULL,
  `enfavori` tinyint(1) NOT NULL,
  `ID_utilisateurs` int(11) NOT NULL,
  `ID_films` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `ID_films` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `synopsis` text NOT NULL,
  `annee` varchar(50) NOT NULL,
  `affiche` varchar(255) NOT NULL,
  `bandeannonce` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`ID_films`, `titre`, `synopsis`, `annee`, `affiche`, `bandeannonce`) VALUES
(1, 'intouchables', 'A la suite d’un accident de parapente, Philippe, riche aristocrate, engage comme aide à domicile Driss, un jeune de banlieue tout juste sorti de prison. Bref la personne la moins adaptée pour le job. Ensemble ils vont faire cohabiter Vivaldi et Earth\r\n					Wind and Fire, le verbe et la vanne, les costumes et les bas de survêtement... ', '2011', 'img/1.jpeg', ''),
(2, 'Avatar', 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre. Parce que l\'atmosphère de Pandora est toxique pour les humains, ceux-ci ont créé le Programme Avatar, qui permet à des \" pilotes \" humains de lier leur esprit à un avatar, un corps biologique commandé à distance, capable de survivre dans cette atmosphère létale. Ces avatars sont des hybrides créés génétiquement en croisant l\'ADN humain avec celui des Na\'vi, les autochtones de Pandora.', '2009', 'img/2.jpeg', ''),
(3, 'Anges et démons', 'Une antique confrérie secrète parmi les plus puissantes de l\'Histoire, les \"Illuminati\", qui s\'était juré autrefois d\'anéantir l\'Eglise catholique, est de retour. Cette fois, elle est sur le point de parvenir à son but : Robert Langdon, expert en religions d\'Harvard, en a la certitude.\r\nLangdon a peu de temps pour comprendre ce qui se trame contre le Vatican et déjouer ces nouveaux crimes. Une course contre la montre et contre les tueurs qui démarre tel un jeu de piste : des églises romaines aux cryptes enfouies, des catacombes les plus profondes aux majestueuses cathédrales...;', '2009', 'img/3.jpeg', 'test'),
(4, 'Matrix', 'Programmeur anonyme dans un service administratif le jour, Thomas Anderson devient Neo la nuit venue. Sous ce pseudonyme, il est l\'un des pirates les plus recherchés du cyber-espace. A cheval entre deux mondes, Neo est assailli par d\'étranges songes et des messages cryptés provenant d\'un certain Morpheus. Celui-ci l\'exhorte à aller au-delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu\'est-ce que la Matrice ? Nul ne le sait, et aucun homme n\'est encore parvenu à en percer les defenses. Mais Morpheus est persuadé que Neo est l\'Elu, le libérateur mythique de l\'humanité annoncé selon la prophétie. Ensemble, ils se lancent dans une lutte sans retour contre la Matrice et ses terribles agents... ', '2009', '/img/4.jpeg', 'test'),
(51, 'Le Fabuleux destin d Amélie Poulain', 'Amélie, une jeune serveuse dans un bar de Montmartre, passe son temps à observer les gens et à laisser son imagination divaguer. Elle s\'est fixé un but : faire le bien de ceux qui l\'entourent. Elle invente alors des stratagèmes pour intervenir incognito dans leur existence.', '2001', 'img/5.jpeg', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `ID_genre` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`ID_genre`, `nom`) VALUES
(1, 'Action'),
(2, 'Comédie'),
(3, 'Aventure'),
(4, 'Sc-Fi'),
(5, 'Humour'),
(6, 'Fantastique'),
(7, 'Jeunesse'),
(8, 'Animation');

-- --------------------------------------------------------

--
-- Structure de la table `joue`
--

CREATE TABLE `joue` (
  `ID_films` int(11) NOT NULL,
  `ID_acteurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joue`
--

INSERT INTO `joue` (`ID_films`, `ID_acteurs`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 8),
(2, 9),
(2, 10),
(2, 13),
(51, 219),
(51, 220),
(51, 221),
(51, 222);

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

CREATE TABLE `motcle` (
  `ID_motcle` int(11) NOT NULL,
  `motcle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `realisateurs`
--

CREATE TABLE `realisateurs` (
  `ID_realisateurs` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `realisateurs`
--

INSERT INTO `realisateurs` (`ID_realisateurs`, `nom`) VALUES
(1, 'Eric Toledano'),
(2, 'James cameron'),
(3, 'Ron Howard '),
(4, 'Les frères Wachowski'),
(5, 'Jean-Pierre Jeunet'),
(6, 'Quentin Tarantino'),
(7, 'M. Night Shyamalan'),
(20, 'Jean-Pierre Jeunet'),
(21, 'Jean-Pierre Jeunet'),
(22, 'Jean-Pierre Jeunet'),
(23, 'Jean-Pierre Jeunet'),
(24, 'Jean-Pierre Jeunet'),
(25, 'Jean-Pierre Jeunet'),
(26, 'Jean-Pierre Jeunet'),
(27, 'Jean-Pierre Jeunet'),
(28, 'Jean-Pierre Jeunet'),
(29, 'Jean-Pierre Jeunet'),
(30, 'Jean-Pierre Jeunet'),
(31, 'Jean-Pierre Jeunet'),
(32, 'Jean-Pierre Jeunet'),
(33, 'Jean-Pierre Jeunet'),
(34, 'Jean-Pierre Jeunet'),
(35, 'Jean-Pierre Jeunet'),
(36, 'Jean-Pierre Jeunet'),
(37, 'Jean-Pierre Jeunet'),
(38, 'Jean-Pierre Jeunet'),
(39, 'Jean-Pierre Jeunet'),
(40, 'Jean-Pierre Jeunet'),
(41, 'Jean-Pierre Jeunet'),
(42, 'Jean-Pierre Jeunet'),
(43, 'Jean-Pierre Jeunet'),
(44, 'Jean-Pierre Jeunet'),
(45, 'Jean-Pierre Jeunet'),
(46, 'Jean-Pierre Jeunet'),
(47, 'Jean-Pierre Jeunet'),
(48, 'Jean-Pierre Jeunet'),
(49, 'Jean-Pierre Jeunet'),
(50, 'Jean-Pierre Jeunet'),
(51, 'Jean-Pierre Jeunet'),
(52, 'Jean-Pierre Jeunet'),
(53, 'Jean-Pierre Jeunet'),
(54, 'Jean-Pierre Jeunet'),
(55, 'Jean-Pierre Jeunet'),
(56, 'Jean-Pierre Jeunet'),
(57, 'Jean-Pierre Jeunet'),
(58, 'Jean-Pierre Jeunet'),
(59, 'Jean-Pierre Jeunet'),
(60, 'Jean-Pierre Jeunet'),
(61, 'Jean-Pierre Jeunet'),
(62, 'Jean-Pierre Jeunet'),
(63, 'Jean-Pierre Jeunet'),
(64, 'Jean-Pierre Jeunet'),
(65, 'Jean-Pierre Jeunet'),
(66, 'Jean-Pierre Jeunet');

-- --------------------------------------------------------

--
-- Structure de la table `realise`
--

CREATE TABLE `realise` (
  `ID_films` int(11) NOT NULL,
  `ID_realisateurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `realise`
--

INSERT INTO `realise` (`ID_films`, `ID_realisateurs`) VALUES
(1, 1),
(2, 2),
(51, 5);

-- --------------------------------------------------------

--
-- Structure de la table `regarde`
--

CREATE TABLE `regarde` (
  `ID_films` int(11) NOT NULL,
  `ID_utilisateurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_utilisateurs` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `ID_administrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `A`
--
ALTER TABLE `A`
  ADD PRIMARY KEY (`ID_films`,`ID_genre`),
  ADD KEY `A_genre0_FK` (`ID_genre`);

--
-- Index pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`ID_acteurs`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID_administrateur`);

--
-- Index pour la table `administre`
--
ALTER TABLE `administre`
  ADD PRIMARY KEY (`ID_films`,`ID_administrateur`),
  ADD KEY `administre_administrateur0_FK` (`ID_administrateur`);

--
-- Index pour la table `est`
--
ALTER TABLE `est`
  ADD PRIMARY KEY (`ID_films`,`ID_motcle`),
  ADD KEY `est_motcle0_FK` (`ID_motcle`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`ID_favoris`),
  ADD KEY `favoris_utilisateurs_FK` (`ID_utilisateurs`),
  ADD KEY `favoris_films0_FK` (`ID_films`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`ID_films`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_genre`);

--
-- Index pour la table `joue`
--
ALTER TABLE `joue`
  ADD PRIMARY KEY (`ID_films`,`ID_acteurs`),
  ADD KEY `joue_acteurs0_FK` (`ID_acteurs`);

--
-- Index pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD PRIMARY KEY (`ID_motcle`);

--
-- Index pour la table `realisateurs`
--
ALTER TABLE `realisateurs`
  ADD PRIMARY KEY (`ID_realisateurs`);

--
-- Index pour la table `realise`
--
ALTER TABLE `realise`
  ADD PRIMARY KEY (`ID_films`,`ID_realisateurs`),
  ADD KEY `realise_realisateurs0_FK` (`ID_realisateurs`);

--
-- Index pour la table `regarde`
--
ALTER TABLE `regarde`
  ADD PRIMARY KEY (`ID_films`,`ID_utilisateurs`),
  ADD KEY `regarde_utilisateurs0_FK` (`ID_utilisateurs`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_utilisateurs`),
  ADD KEY `utilisateurs_administrateur_FK` (`ID_administrateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `ID_acteurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `ID_administrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `ID_favoris` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `ID_films` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `motcle`
--
ALTER TABLE `motcle`
  MODIFY `ID_motcle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `realisateurs`
--
ALTER TABLE `realisateurs`
  MODIFY `ID_realisateurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_utilisateurs` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `A`
--
ALTER TABLE `A`
  ADD CONSTRAINT `A_films_FK` FOREIGN KEY (`ID_films`) REFERENCES `films` (`ID_films`),
  ADD CONSTRAINT `A_genre0_FK` FOREIGN KEY (`ID_genre`) REFERENCES `genre` (`ID_genre`);

--
-- Contraintes pour la table `administre`
--
ALTER TABLE `administre`
  ADD CONSTRAINT `administre_administrateur0_FK` FOREIGN KEY (`ID_administrateur`) REFERENCES `administrateur` (`ID_administrateur`),
  ADD CONSTRAINT `administre_films_FK` FOREIGN KEY (`ID_films`) REFERENCES `films` (`ID_films`);

--
-- Contraintes pour la table `est`
--
ALTER TABLE `est`
  ADD CONSTRAINT `est_films_FK` FOREIGN KEY (`ID_films`) REFERENCES `films` (`ID_films`),
  ADD CONSTRAINT `est_motcle0_FK` FOREIGN KEY (`ID_motcle`) REFERENCES `motcle` (`ID_motcle`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_films0_FK` FOREIGN KEY (`ID_films`) REFERENCES `films` (`ID_films`),
  ADD CONSTRAINT `favoris_utilisateurs_FK` FOREIGN KEY (`ID_utilisateurs`) REFERENCES `utilisateurs` (`ID_utilisateurs`);

--
-- Contraintes pour la table `joue`
--
ALTER TABLE `joue`
  ADD CONSTRAINT `joue_acteurs0_FK` FOREIGN KEY (`ID_acteurs`) REFERENCES `acteurs` (`ID_acteurs`),
  ADD CONSTRAINT `joue_films_FK` FOREIGN KEY (`ID_films`) REFERENCES `films` (`ID_films`);

--
-- Contraintes pour la table `realise`
--
ALTER TABLE `realise`
  ADD CONSTRAINT `realise_films_FK` FOREIGN KEY (`ID_films`) REFERENCES `films` (`ID_films`),
  ADD CONSTRAINT `realise_realisateurs0_FK` FOREIGN KEY (`ID_realisateurs`) REFERENCES `realisateurs` (`ID_realisateurs`);

--
-- Contraintes pour la table `regarde`
--
ALTER TABLE `regarde`
  ADD CONSTRAINT `regarde_films_FK` FOREIGN KEY (`ID_films`) REFERENCES `films` (`ID_films`),
  ADD CONSTRAINT `regarde_utilisateurs0_FK` FOREIGN KEY (`ID_utilisateurs`) REFERENCES `utilisateurs` (`ID_utilisateurs`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_administrateur_FK` FOREIGN KEY (`ID_administrateur`) REFERENCES `administrateur` (`ID_administrateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
