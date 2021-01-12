-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 12 Janvier 2021 à 09:18
-- Version du serveur :  10.1.45-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `userRFID`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Classe` varchar(255) NOT NULL,
  `Num_carte` varchar(255) NOT NULL,
  `imageUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `mdp`, `Nom`, `Prenom`, `Age`, `Classe`, `Num_carte`, `imageUser`) VALUES
(1, 'greg123', '123456', 'Colbert', 'Grégoire', 19, 'SN', '0x37CDD569', 'https://static1.purepeople.com/articles/7/34/34/57/@/4909151-exclusif-gregoire-gregoire-boissenot-237x237-2.jpg'),
(2, 'flo123', '123456', 'Garcia', 'Florian', 22, 'SN', '0xF6141C35', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Florian_Thauvin_2018_%28cropped%29.jpg/150px-Florian_Thauvin_2018_%28cropped%29.jpg'),
(3, 'pilex123', '123456', 'Prieux', 'Pierre-Louis', 21, 'BTSSN2', '0xF5781258', 'https://pbs.twimg.com/profile_images/862836785411485698/To0EwGxC_400x400.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
