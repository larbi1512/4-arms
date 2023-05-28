-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 28 mai 2023 à 19:35
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
  `month` varchar(4) DEFAULT NULL,
  `activity_time` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`user_id`, `month`, `activity_time`) VALUES
(1, 'Jan', 12),
(1, 'Feb', 17),
(1, 'mar', 12),
(1, 'apr', 18),
(1, 'may', 23),
(1, 'jun', 22),
(1, '5', 0.000391389),
(1, '5', 0.000356111),
(1, '5', 0.0009775),
(1, '5', 0.000499167),
(1, '5', 0.000382778),
(1, '5', 0.000290556),
(11, '5', 0.000360833),
(1, '5', 0.000354167),
(1, '5', 0.000443056),
(1, '5', 0.000251389),
(1, '5', 0.000738611),
(1, '5', 0.000711111),
(12, '5', 0.000295556),
(12, '5', 0.000373333),
(12, '5', 0.000790278);

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
(8, 2, 2, NULL),
(9, 2, 2, NULL),
(11, 3, 3, NULL),
(12, 3, 3, NULL),
(1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `diet`
--

CREATE TABLE `diet` (
  `diet_id` int(11) NOT NULL,
  `diet_link` varchar(100) DEFAULT NULL,
  `diet_name` varchar(50) DEFAULT NULL,
  `diet_link_img` varchar(100) DEFAULT NULL,
  `Calories` int(11) DEFAULT NULL,
  `Proteins` int(11) DEFAULT NULL,
  `carbs` int(11) DEFAULT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `diet`
--

INSERT INTO `diet` (`diet_id`, `diet_link`, `diet_name`, `diet_link_img`, `Calories`, `Proteins`, `carbs`, `description`) VALUES
(1, './diet/diet01/diet01.pdf', 'Green blender', './diet/diet01/diet1.jpg', 300, 150, 100, 'Nourish your body with nutrient-dense foods, prioritizing fruits, vegetables, lean proteins, whole grains, and healthy fats to revitalize your energy and restore nutritional balance.'),
(2, './diet/diet01/diet01.pdf', 'Be Extra', './diet/diet01/diet1.jpg', 700, 200, 400, 'Optimize your metabolism and support muscle development with a strategic blend of high-quality proteins, complex carbohydrates, and essential fats, fueling your body for increased energy and a transformative physique.'),
(3, './diet/diet03/diet03.jpg', 'Do Not Feel Stressita, Feel Bonita', './diet/diet03/diet3.jpg', 500, 300, 200, 'Practice mindful eating and make sustainable food choices, prioritizing whole foods and plant-based options to nourish your body while considering the environmental impact of your dietary decisions for long-term well-being.'),
(4, './diet/diet04/diet04.pdf', 'SparklingSoul Regimen', './diet/diet04/diet4.jpg', 250, 150, 100, 'Support your bodys natural detoxification processes by focusing on detoxifying foods and incorporating cleansing techniques to eliminate toxins, promoting internal rejuvenation and renewed vitality.');

-- --------------------------------------------------------

--
-- Structure de la table `gym`
--

CREATE TABLE `gym` (
  `gym_id` int(11) NOT NULL,
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
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_order` date NOT NULL DEFAULT current_timestamp(),
  `date_delivery` date DEFAULT NULL,
  `user_address` varchar(300) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `deliverd` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`orders_id`, `product_id`, `user_id`, `date_order`, `date_delivery`, `user_address`, `quantity`, `phone_number`, `name`, `deliverd`) VALUES
(1, 1, 1, '2023-04-22', '2023-05-01', 'bir el djir oran', 1, 792765351, 'hafida boukedjar', 1),
(2, 1, 1, '2023-05-04', '2023-05-19', 'bir el djir oran', 1, 792765351, 'hafida boukedjar', 0),
(3, 1, 1, '2023-05-24', '2023-06-08', 'bir el djir oran', 1, 792765351, 'hafida boukedjar', 0),
(4, 1, 1, '2023-05-24', '2023-06-08', 'bir el djir oran', 1, 792765351, 'hafida boukedjar', 0),
(5, 1, 1, '2023-05-28', '2023-06-12', 'bir el djir oran', 1, 792765351, 'hafida boukedjar', 0);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `price` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `png_link` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`price`, `product_id`, `product_name`, `product_category`, `png_link`) VALUES
(1300, 1, 'Whey Protein', '', './public/whey.png');

-- --------------------------------------------------------

--
-- Structure de la table `progress`
--

CREATE TABLE `progress` (
  `gained_weight` float DEFAULT NULL,
  `lost_weight` float DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `last_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `progress`
--

INSERT INTO `progress` (`gained_weight`, `lost_weight`, `user_id`, `last_update`) VALUES
(12, 12, 1, '2015-12-17');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(70) DEFAULT NULL,
  `member_email` varchar(300) DEFAULT NULL,
  `member_number` int(11) DEFAULT NULL,
  `memeber_img_link` varchar(500) DEFAULT NULL,
  `memeber_link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`member_id`, `member_name`, `member_email`, `member_number`, `memeber_img_link`, `memeber_link`) VALUES
(1, 'Dayaa Bou', 'BouDaia@gmail.com', 775171633, NULL, NULL),
(2, 'Baraa Lalagui', 'Baraa@gmail.com', 771298765, NULL, NULL),
(3, 'Hichem BKR', 'hichembkr@gmail.com', 555181966, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_signup`
--

CREATE TABLE `user_signup` (
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `weight` int(4) DEFAULT NULL,
  `height` int(4) DEFAULT NULL,
  `user_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_signup`
--

INSERT INTO `user_signup` (`user_name`, `user_email`, `user_id`, `user_password`, `gender`, `weight`, `height`, `user_img`) VALUES
('hafida', 'bou@gmail.com', 1, '121212', NULL, NULL, NULL, './avatar.jpg'),
('hafida', 'bou@gmail.com', 5, '$2y$10$2CYM5zuxZWYARPvDLAD55OjmhQus55FkGomo.QitDvXkuu8yURxUy', NULL, 144, 144, NULL),
('hafida', 'bou@gmail.com', 6, '$2y$10$SVg1tsdtzExjF2aiN2SV1eZy2sY9Xp.cksOZ8GTTg7V4rvraoeWlC', NULL, 144, 144, NULL),
('hafid', 'aniszemali31@gmail.com', 7, '$2y$10$ZA8a4yQ4QflVBhXuxvdtUOXx6Cv0/q178AHIe0k5FTCXmDm9KfJZu', NULL, 40, 140, NULL),
('hafidaa', 'aniszemali31@gmail.co', 8, '$2y$10$Je/pa2a4JLTIges9XIIoMO4NAMhMAiP5BfQgpAsrHknQJYAP/pisW', 'femal', 40, 140, NULL),
('ha', 'boukedjarhafida@gmail.co', 9, '$2y$10$1bRsGkDlg2ymhiZmFBuehOu4tXsZJ7Hnvp7Zl/QTYdqzNEmhwHDp.', 'femal', 40, 140, NULL),
('dayaa.d1', 'dayaa@gmail.com', 10, '$2y$10$f2qgtdfnTbT7OytDYaE/sOtf9KPxuhVSNf9RKKgWjLqiCf2ii3JsC', NULL, 40, 140, NULL),
('lealea', 'lea@gmail.com', 11, '$2y$10$ZTdPg5x5R0L8bBF1ekVqIeKo5Cvza2V35sIfJ7fZracy8ROeEdi0a', 'male', 40, 140, NULL),
('hichem', 'hichem@gmail.com', 12, '$2y$10$WzjZNCeQXklH3w/n/Rg4Pu48ZNAORzOtWumO3ZAVZLUCvyMmppZNO', 'femal', 70, 178, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `workout_plan`
--

CREATE TABLE `workout_plan` (
  `workout_id` int(11) NOT NULL,
  `workout_planer_id` int(11) DEFAULT NULL,
  `workout_name` varchar(60) DEFAULT NULL,
  `workout_img_link` varchar(300) DEFAULT NULL,
  `workout_plan_link` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `workout_summary` varchar(500) DEFAULT NULL,
  `goal` varchar(500) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `workout_plan`
--

INSERT INTO `workout_plan` (`workout_id`, `workout_planer_id`, `workout_name`, `workout_img_link`, `workout_plan_link`, `description`, `workout_summary`, `goal`, `duration`, `length`) VALUES
(2, 2, 'GitFit', './workout_plans/GetFit/GetFit.png', './workout_plans/GetFit/GetFit.pdf', 'This program can help you establish a fitness mindset that can then lead to better body composition, less-fat-more-muscle. Unless you get it together in the kitchen, don’t expect to lose fat. In fact, if your nutrition is really bad, you may continue to gain fat.', 'Splits are a popular way to organize exercises into workouts which are performed on specified days. Those can be specific calendar days (Monday, Wednesday, Friday) or simply Day 1, Day 2 and so forth. The latter is helpful for people whose work or school schedules vary week to week.\r\n\r\nUpper-Lower splits divide the body at the waist, generally speaking. Chest, shoulders, back, arms, and core are “Upper”, and legs are “Lower” with the exception that some leg exercises involve the back and arms.\r\n', 'Build And Tone', 8, 0),
(3, 1, 'DefineYou', './workout_plans/DefineYou/DefineYou.png', './workout_plans/DefineYou/DefineYou.pdf\r\n ', 'It is a program that ensures the define of the body in 8 weeks making use of the inner burn of the fat', 'Gaining muscle should be priority, no matter how much fat you lose, you need to put on some lean muscle if you want to improve the way you look and feel. The less muscle you have means the lower your body fat percentage has to be to see it. Gaining muscle also helps you to burn more calories; a pound of fat burns about 2-3 calories per day while a pound of muscle can burn 7- 10 calories daily. Aim for at least three workout sessions per week and make sure to perform the bigger compound lifts suc', 'Define Your body and Muscles', 8, NULL),
(4, 3, 'Fat Desctroyer', './workout_plans/FatDestroyer/FatDestroyer.png', './workout_plans/FatDestroyer/fatdestroyer.pdf', 'To lose weight in a healthy non toxic way for a better fit and a good progress', 'Fat BurnerWhey ProteinBCAA Intra-WorkoutFish Oil (EFAs)Creatine Monohydrate', 'Lose Fat', 12, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD KEY `fk_activity` (`user_id`);

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
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`sender_id`,`date_sending`),
  ADD KEY `fk_destination` (`destination_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `fk_product` (`product_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`user_id`,`last_update`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`member_id`);

--
-- Index pour la table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `workout_plan`
--
ALTER TABLE `workout_plan`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `fk_workout_planer_id` (`workout_planer_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `workout_plan`
--
ALTER TABLE `workout_plan`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_activity` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`);

--
-- Contraintes pour la table `assigned`
--
ALTER TABLE `assigned`
  ADD CONSTRAINT `fk_diet_id` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`diet_id`),
  ADD CONSTRAINT `fk_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gym` (`gym_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`),
  ADD CONSTRAINT `fk_workout_id` FOREIGN KEY (`workout_id`) REFERENCES `workout_plan` (`workout_id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_destination` FOREIGN KEY (`destination_id`) REFERENCES `team` (`member_id`),
  ADD CONSTRAINT `fk_sender` FOREIGN KEY (`sender_id`) REFERENCES `user_signup` (`user_ID`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_id`);

--
-- Contraintes pour la table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `fk_progress` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`);

--
-- Contraintes pour la table `workout_plan`
--
ALTER TABLE `workout_plan`
  ADD CONSTRAINT `fk_workout_planer_id` FOREIGN KEY (`workout_planer_id`) REFERENCES `team` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
