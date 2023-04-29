-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 29 avr. 2023 à 22:07
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `4_arms`
--

-- --------------------------------------------------------

--
-- Structure de la table `assigned`
--

CREATE TABLE `assigned` (
  `user_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `diet_id` int(11) NOT NULL,
  `gym_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diet`
--

CREATE TABLE `diet` (
  `diet_id` int(11) NOT NULL,
  `diet_link` varchar(100) DEFAULT NULL,
  `diet_name` varchar(50) DEFAULT NULL,
  `Calories` int(11) NOT NULL DEFAULT 0,
  `Proteins` int(11) NOT NULL DEFAULT 0,
  `carbs` int(11) NOT NULL DEFAULT 0,
  `diet_link_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gym`
--

CREATE TABLE `gym` (
  `gym_id` int(11) NOT NULL,
  `gym_name` varchar(100) DEFAULT NULL,
  `gym_address` varchar(300) DEFAULT NULL,
  `gym_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `price` float NOT NULL,
  `product_ID` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `png_link` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `member_id` int(11) NOT NULL,
  `memebr_name` varchar(70) DEFAULT NULL,
  `memebr_email` varchar(300) DEFAULT NULL,
  `member_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nameuser` int(11) NOT NULL,
  `idname` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_info`
--

CREATE TABLE `user_info` (
  `user_ID` int(11) NOT NULL,
  `weight` float DEFAULT NULL,
  `hight` float DEFAULT NULL,
  `goal` float DEFAULT NULL,
  `calories` float DEFAULT NULL,
  `protien` float DEFAULT NULL,
  `carbs` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_signup`
--

CREATE TABLE `user_signup` (
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `user_password` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `workout_plan`
--

CREATE TABLE `workout_plan` (
  `workout_id` int(11) NOT NULL,
  `workout_planer_id` int(11) DEFAULT NULL,
  `workout_name` varchar(60) DEFAULT NULL,
  `workout_img_link` varchar(300) DEFAULT NULL,
  `workout_plan_link` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`user_id`,`workout_id`,`diet_id`),
  ADD KEY `fk_workout_id` (`workout_id`),
  ADD KEY `fk_diet_id` (`diet_id`),
  ADD KEY `fk_gym_id` (`gym_id`);

--
-- Index pour la table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`diet_id`);

--
-- Index pour la table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`gym_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`member_id`);

--
-- Index pour la table `user_info`
--
ALTER TABLE `user_info`
  ADD KEY `f_user_info` (`user_ID`);

--
-- Index pour la table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`user_ID`);

--
-- Index pour la table `workout_plan`
--
ALTER TABLE `workout_plan`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `fk_workout_planer_id` (`workout_planer_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assigned`
--
ALTER TABLE `assigned`
  ADD CONSTRAINT `fk_diet_id` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`diet_id`),
  ADD CONSTRAINT `fk_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gym` (`gym_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`),
  ADD CONSTRAINT `fk_workout_id` FOREIGN KEY (`workout_id`) REFERENCES `workout_plan` (`workout_id`);

--
-- Contraintes pour la table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `f_user_info` FOREIGN KEY (`user_ID`) REFERENCES `user_signup` (`user_ID`);

--
-- Contraintes pour la table `workout_plan`
--
ALTER TABLE `workout_plan`
  ADD CONSTRAINT `fk_workout_planer_id` FOREIGN KEY (`workout_planer_id`) REFERENCES `team` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
