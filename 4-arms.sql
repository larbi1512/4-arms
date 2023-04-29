-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 29 avr. 2023 à 22:51
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
-- Base de données : `4-arms`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `user_id` int(11) NOT NULL,
  `time_activity` int(11) DEFAULT NULL,
  `month` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`user_id`, `time_activity`, `month`) VALUES
(1, 12, 'Jan'),
(1, 18, 'Feb'),
(1, 56, 'mar'),
(1, 17, 'apr'),
(1, 12, 'may');

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

--
-- Déchargement des données de la table `assigned`
--

INSERT INTO `assigned` (`user_id`, `workout_id`, `diet_id`, `gym_id`) VALUES
(1, 2, 2, NULL),
(1, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diet`



CREATE TABLE `diet` (
  `diet_id` int(11) NOT NULL AUTO_INCREMENT,
  `diet_link` varchar(100) DEFAULT NULL,
  `diet_name` varchar(50) DEFAULT NULL,
  `diet_link_img` varchar(100) DEFAULT NULL,
  `diet_calories` int(11) DEFAULT NULL,
  `diet_protien` int(11) DEFAULT NULL,
  `diet_carbs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `diet`
  ADD PRIMARY KEY (`diet_id`);

--
-- Déchargement des données de la table `diet`
--

INSERT INTO `diet` (`diet_id`, `diet_link`, `diet_name`, `diet_link_img`, `diet_calories`, `diet_protien`, `diet_carbs`) VALUES
(1, 'bo', 'bo', NULL, NULL, NULL, NULL),
(2, NULL, 'gg', NULL, NULL, NULL, NULL),
(3, NULL, 'ggg', NULL, NULL, NULL, NULL),
(4, NULL, 'lolgg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gym`
--

CREATE TABLE `gym` (
  `gym_id` int(11) NOT NULL AUTO_INCREMENT,
  `gym_name` varchar(100) DEFAULT NULL,
  `gym_address` varchar(300) DEFAULT NULL,
  `gym_number` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `gym_img_link` varchar(300) DEFAULT NULL,
  `gym_link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gym`
--

INSERT INTO `gym` (`gym_id`, `gym_name`, `gym_address`, `gym_number`, `city`, `gym_img_link`, `gym_link`) VALUES
(1, 'Extreme Gym', '101 Nasr Al Den st. - From Haram st. - Giza, After Masjed Nasr Al Den', 792771935, 'Oran', './Gym/ExtremeGym/ExtremeGym.png', 'https://goo.gl/maps/Vbh31da7ynQcPU8e7'),
(2, 'Oxygène Fitness Club', 'P2QQ+W7H, Hydra', 770274274, 'Algiers', './Gym/OxygèneFitnessClub/OxygèneFitnessClub.png', 'https://goo.gl/maps/V41AgmstdXniAQXQ9'),
(3, 'Power fitness Bejaia', 'P3V2+FJR EDIMCO, Béjaïa 06000', 550707231, 'Bejaia', './Gym/PowerfitnessBejaia/PowerfitnessBejaia.png', 'https://goo.gl/maps/9CyHBgRbP1ZdFy719');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `messagetext` text DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `date_sending` date NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `seen` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `date_delivery` date DEFAULT NULL,
  `user_address` varchar(300) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `price` float NOT NULL,
  `product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `png_link` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `progress`
--

CREATE TABLE `progress` (
  `calories` float DEFAULT NULL,
  `protien` float DEFAULT NULL,
  `carbs` float DEFAULT NULL,
  `wined_weight` float DEFAULT NULL,
  `lost_weight` float DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `progress`
--

INSERT INTO `progress` (`calories`, `protien`, `carbs`, `wined_weight`, `lost_weight`, `user_id`, `last_update`) VALUES
(12, 12, 12, 12, 12, 1, '2015-12-17');

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

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`member_id`, `memebr_name`, `memebr_email`, `member_number`) VALUES
(1, 'Dayaa Bou', 'BouDaia@gmail.com', 775171633),
(2, 'Baraa Lalagui', 'Baraa@gmail.com', 771298765),
(3, 'Hichem BKR', 'hichembkr@gmail.com', 555181966);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

--------------------------------------------------------

--
-- Structure de la table `user_info`


CREATE TABLE `user_info` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
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


CREATE TABLE `user_signup` (
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `user_password` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `user_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_signup`


INSERT INTO `user_signup` (`user_name`, `user_email`, `user_ID`, `user_password`, `age`, `gender`, `user_img`) VALUES
('hafida', 'bou@gmail.com', 1, 12, 12, 'f', './avatar.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `workout_plan`

CREATE TABLE `workout_plan` (
  `workout_id` int(11) NOT NULL AUTO_INCREMENT,
  `workout_planer_id` int(11) DEFAULT NULL,
  `workout_name` varchar(60) DEFAULT NULL,
  `workout_img_link` varchar(300) DEFAULT NULL,
  `workout_plan_link` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `workout_summary` varchar(500) DEFAULT NULL,
  `Goal` varchar(500) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `lenght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `workout_plan`
--

INSERT INTO `workout_plan` (`workout_id`, `workout_planer_id`, `workout_name`, `workout_img_link`, `workout_plan_link`, `description`, `workout_summary`, `Goal`, `duration`, `lenght`) VALUES
(1, 1, 'BuildMuscle', './workout_plans/BuildMuscle/BuildMuscle.png', './workout_plans/BuildMuscle/BuildMuscle.pdf', 'For a better fit building a mass of muscles\r\n', 'The workout plan is a 3-6 day split you can follow for the next 6 weeks to build muscle. Its focus is to help increase muscle gain and strength development. The muscle building program is suitable for beginners and intermediates.\r\n\r\nYour rep tempo should be slow and controlled. Focus on the eccentric contraction of the muscle. For example when you are lowering the barbell during a curl, a bench press, or when you’re lowering yourself on a chest dip.', 'Build Muscle', 6, 0),
(2, 2, 'GitFit', './workout_plans/GetFit/GetFit.png', './workout_plans/GetFit/GetFit.pdf', 'This program can help you establish a fitness mindset that can then lead to better body composition, less-fat-more-muscle. Unless you get it together in the kitchen, don’t expect to lose fat. In fact, if your nutrition is really bad, you may continue to gain fat.', 'Splits are a popular way to organize exercises into workouts which are performed on specified days. Those can be specific calendar days (Monday, Wednesday, Friday) or simply Day 1, Day 2 and so forth. The latter is helpful for people whose work or school schedules vary week to week.\r\n\r\nUpper-Lower splits divide the body at the waist, generally speaking. Chest, shoulders, back, arms, and core are “Upper”, and legs are “Lower” with the exception that some leg exercises involve the back and arms.\r\n', 'Build And Tone', 8, 0),
(3, 1, 'DefineYou', './workout_plans/DefineYou/DefineYou.png', './workout_plans/DefineYou/DefineYou.pdf\r\n ', 'It is a program that ensures the define of the body in 8 weeks making use of the inner burn of the fat', 'Gaining muscle should be priority, no matter how much fat you lose, you need to put on some lean muscle if you want to improve the way you look and feel. The less muscle you have means the lower your body fat percentage has to be to see it. Gaining muscle also helps you to burn more calories; a pound of fat burns about 2-3 calories per day while a pound of muscle can burn 7- 10 calories daily. Aim for at least three workout sessions per week and make sure to perform the bigger compound lifts suc', 'Define Your body and Muscles', 8, NULL),
(4, 3, 'Fat Desctroyer', './workout_plans/FatDestroyer/FatDestroyer.png', './workout_plans/FatDestroyer/fatdestroyer.pdf', 'To lose weight in a healthy non toxic way for a better fit and a good progress', 'Fat Burner\r\nWhey Protein\r\nBCAA Intra-Workout\r\nFish Oil (EFAs)\r\nCreatine Monohydrate', 'Lose Fat', 12, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assigned`

ALTER TABLE `assigned`
  ADD PRIMARY KEY (`user_id`,`workout_id`,`diet_id`),
  ADD KEY `fk_workout_id` (`workout_id`),
  ADD KEY `fk_diet_id` (`diet_id`),
  ADD KEY `fk_gym_id` (`gym_id`);

--
-- Index pour la table `chat`

ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `diet`



--
-- Index pour la table `gym`

ALTER TABLE `gym`
  ADD PRIMARY KEY (`gym_id`);

--
-- Index pour la table `message`

ALTER TABLE `message`
  ADD PRIMARY KEY (`sender_id`,`date_sending`),
  ADD KEY `fk_destination` (`destination_id`);

--
-- Index pour la table `orders`

ALTER TABLE `orders`
  ADD PRIMARY KEY (`product_id`,`user_id`,`date_order`),
  ADD KEY `fk_user` (`user_id`);

--
-- Index pour la table `product`

ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Index pour la table `progress`

ALTER TABLE `progress`
  ADD PRIMARY KEY (`user_id`,`last_update`);

--
-- Index pour la table `team`

ALTER TABLE `team`
  ADD PRIMARY KEY (`member_id`);

--
-- Index pour la table `user_info`

ALTER TABLE `user_info`
  ADD KEY `f_user_info` (`user_ID`);

--
-- Index pour la table `user_signup`

ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`user_ID`);

--
-- Index pour la table `workout_plan`

ALTER TABLE `workout_plan`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `fk_workout_planer_id` (`workout_planer_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assigned`

ALTER TABLE `assigned`
  ADD CONSTRAINT `fk_diet_id` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`diet_id`),
  ADD CONSTRAINT `fk_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gym` (`gym_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`),
  ADD CONSTRAINT `fk_workout_id` FOREIGN KEY (`workout_id`) REFERENCES `workout_plan` (`workout_id`);

--
-- Contraintes pour la table `message`

ALTER TABLE `message`
  ADD CONSTRAINT `fk_destination` FOREIGN KEY (`destination_id`) REFERENCES `team` (`member_id`),
  ADD CONSTRAINT `fk_sender` FOREIGN KEY (`sender_id`) REFERENCES `user_signup` (`user_ID`);

--
-- Contraintes pour la table `orders`

ALTER TABLE `orders`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_ID`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`);

--
-- Contraintes pour la table `progress`

ALTER TABLE `progress`
  ADD CONSTRAINT `fk_progress` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`);

--
-- Contraintes pour la table `user_info`

ALTER TABLE `user_info`
  ADD CONSTRAINT `f_user_info` FOREIGN KEY (`user_ID`) REFERENCES `user_signup` (`user_ID`);

--
-- Contraintes pour la table `workout_plan`

ALTER TABLE `workout_plan`
  ADD CONSTRAINT `fk_workout_planer_id` FOREIGN KEY (`workout_planer_id`) REFERENCES `team` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

