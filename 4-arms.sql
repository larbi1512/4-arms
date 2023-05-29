SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `4-arms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `4-arms`;

CREATE TABLE `activity` (
  `user_id` int(11) NOT NULL,
  `month` varchar(4) DEFAULT NULL,
  `activity_time` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `activity` (`user_id`, `month`, `activity_time`) VALUES
(1, '5', 0.000716389),
(1, '5', 0.00109278),
(11, '5', 0.00544778),
(12, '5', 0.00128583),
(12, '5', 0.00111333),
(1, '5', 0.000957778),
(1, '5', 0.00127722);

CREATE TABLE `assigned` (
  `user_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `diet_id` int(11) NOT NULL,
  `gym_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `assigned` (`user_id`, `workout_id`, `diet_id`, `gym_id`) VALUES
(11, 2, 2, NULL),
(12, 1, 1, NULL),
(1, 3, 3, 1);

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

INSERT INTO `diet` (`diet_id`, `diet_link`, `diet_name`, `diet_link_img`, `Calories`, `Proteins`, `carbs`, `description`) VALUES
(1, './diet/diet02/diet02.pdf', 'Green blender', './diet/diet02/diet2.jpg', 300, 150, 100, 'Nourish your body with nutrient-dense foods, prioritizing fruits, vegetables, lean proteins, whole grains, and healthy fats to revitalize your energy and restore nutritional balance.'),
(2, './diet/diet01/diet01.pdf', 'Be Extra', './diet/diet01/diet1.jpg', 200, 150, 210, 'Optimize your metabolism and support muscle development with a strategic blend of high-quality proteins, complex carbohydrates, and essential fats, fueling your body for increased energy and a transformative physique.'),
(3, './diet/diet03/diet03.jpg', 'Do Not Feel Stressita, Feel Bonita', './diet/diet03/diet3.jpg', 500, 300, 200, 'Practice mindful eating and make sustainable food choices, prioritizing whole foods and plant-based options to nourish your body while considering the environmental impact of your dietary decisions for long-term well-being.'),
(4, './diet/diet04/diet04.pdf', 'SparklingSoul Regimen', './diet/diet04/diet4.jpg', 250, 150, 100, 'Support your bodys natural detoxification processes by focusing on detoxifying foods and incorporating cleansing techniques to eliminate toxins, promoting internal rejuvenation and renewed vitality.');

CREATE TABLE `gym` (
  `gym_id` int(11) NOT NULL,
  `gym_name` varchar(100) DEFAULT NULL,
  `gym_address` varchar(300) DEFAULT NULL,
  `gym_number` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `gym_img_link` varchar(300) DEFAULT NULL,
  `gym_link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `gym` (`gym_id`, `gym_name`, `gym_address`, `gym_number`, `city`, `gym_img_link`, `gym_link`) VALUES
(1, 'Extreme Gym', '101 Nasr Al Den st. - From Haram st. - Giza, After Masjed Nasr Al Den', 792771935, 'Oran', './Gym/ExtremeGym/ExtremeGym.png', 'https://goo.gl/maps/Vbh31da7ynQcPU8e7'),
(2, 'Oxygène Fitness Club', 'P2QQ+W7H, Hydra', 770274274, 'Algiers', './Gym/OxygèneFitnessClub/OxygèneFitnessClub.png', 'https://goo.gl/maps/V41AgmstdXniAQXQ9'),
(3, 'Power fitness Bejaia', 'P3V2+FJR EDIMCO, Béjaïa 06000', 550707231, 'Bejaia', './Gym/PowerfitnessBejaia/PowerfitnessBejaia.png', 'https://goo.gl/maps/9CyHBgRbP1ZdFy719');

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

INSERT INTO `orders` (`orders_id`, `product_id`, `user_id`, `date_order`, `date_delivery`, `user_address`, `quantity`, `phone_number`, `name`, `deliverd`) VALUES
(1, 1, 1, '2023-04-22', '2023-05-01', 'bir el djir oran', 1, 792765351, 'hafida boukedjar', 1),
(3, 1, 1, '2023-05-24', '2023-06-08', 'bir el djir oran', 1, 792765351, 'hafida boukedjar', 1),
(4, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(5, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(6, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(7, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(10, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(12, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(13, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(14, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(15, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(16, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(17, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(18, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(19, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(20, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(21, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(23, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(24, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(25, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(26, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(27, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(28, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(29, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(30, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(31, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(32, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(33, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1),
(34, 2, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 0),
(35, 2, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 10, 561636981, 'Mohammed Mouncef Kadri', 0),
(36, 1, 1, '2023-05-29', '2023-06-13', 'ENSIA, Sidi abdellah, ALGIERS,ALGERIA', 1, 561636981, 'Mohammed Mouncef Kadri', 1);

CREATE TABLE `product` (
  `price` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` varchar(50) DEFAULT NULL,
  `png_link` varchar(90) NOT NULL,
  `product_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product` (`price`, `product_id`, `product_name`, `product_category`, `png_link`, `product_description`) VALUES
(1300, 1, 'Whey Protein', 'Supplement', './public/whey.png', 'Reach your goal daily proteins easily.'),
(1000, 2, 'Rope', 'Tools', 'public/rope.png', 'Jumping rope to burn calories fast and destroy fat. '),
(1500, 3, 'All in one bar', 'tools', 'public/bar.png', 'Bar to hang in your room. build a monster back in your house.'),
(2000, 4, 'Dumbells', 'Tools', 'public/dumbells.png', 'Dumbbells are a versatile fitness accessory that are used to strengthen various muscle groups. Metal grip on both ends Various sizes and weights suitable for different exercises'),
(4500, 5, 'Creatine', 'Supplement', 'public/Creatine.png', 'Intensely Stimulates Muscle Growth and Strength Without aroma. 99.9% pure creatine'),
(2300, 6, 'Pre Workout', 'Tools', 'public/preworkout.png', 'Boost your workouts and achieve your best sessions.');

CREATE TABLE `progress` (
  `progress_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `update_date` date NOT NULL,
  `workout_id` int(11) NOT NULL,
  `diet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `progress` (`progress_id`, `weight`, `update_date`, `workout_id`, `diet_id`, `user_id`) VALUES
(1, 40, '2023-05-29', 1, 1, 18),
(2, 40, '2023-05-29', 1, 1, 0),
(3, 40, '2023-04-28', 1, 1, 19),
(4, 0, '2023-05-29', 2, 2, 19),
(5, 0, '2023-05-29', 2, 2, 19),
(6, 60, '2023-05-29', 1, 1, 1),
(7, 999, '2023-05-29', 2, 2, 1),
(8, 0, '2023-05-29', 2, 2, 1),
(9, 0, '2023-05-29', 0, 0, 1),
(10, 0, '2023-05-29', 0, 0, 1),
(11, 0, '2023-05-29', 3, 3, 1),
(12, 0, '2023-05-29', 3, 3, 1),
(13, 5, '2023-05-29', 3, 3, 1),
(14, 5, '2023-05-29', 3, 3, 1),
(15, 5, '2023-05-29', 3, 3, 1),
(16, 5, '2023-05-29', 3, 3, 1),
(17, 5, '2023-05-29', 3, 3, 1);

CREATE TABLE `team` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(70) DEFAULT NULL,
  `member_email` varchar(300) DEFAULT NULL,
  `member_number` int(11) DEFAULT NULL,
  `memeber_img_link` varchar(500) DEFAULT NULL,
  `memeber_link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `team` (`member_id`, `member_name`, `member_email`, `member_number`, `memeber_img_link`, `memeber_link`) VALUES
(1, 'Dayaa Bou', 'BouDaia@gmail.com', 775171633, NULL, NULL),
(2, 'Baraa Lalagui', 'Baraa@gmail.com', 771298765, NULL, NULL),
(3, 'Hichem BKR', 'hichembkr@gmail.com', 555181966, NULL, NULL);

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

INSERT INTO `user_signup` (`user_name`, `user_email`, `user_id`, `user_password`, `gender`, `weight`, `height`, `user_img`) VALUES
('kadri', 'mohammed.kadri@ensia.edu.dz', 1, '$2y$10$WoQiIMmjLLtTWVaFRSp2VeWxPUT.znUZ4ZfAtkr0nKXAzYtwTD.Ym', NULL, 40, 140, NULL);

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

INSERT INTO `workout_plan` (`workout_id`, `workout_planer_id`, `workout_name`, `workout_img_link`, `workout_plan_link`, `description`, `workout_summary`, `goal`, `duration`, `length`) VALUES
(1, 1, 'BuildMuscle', './workout_plans/BuildMuscle/BuildMuscle.png', './workout_plans/BuildMuscle/BuildMuscle.pdf', 'For a better fit building a mass of muscles\r\n', 'The workout plan is a 3-6 day split you can follow for the next 6 weeks to build muscle. Its focus is to help increase muscle gain and strength development. The muscle building program is suitable for beginners and intermediates.\r\n\r\nYour rep tempo should be slow and controlled. Focus on the eccentric contraction of the muscle. For example when you are lowering the barbell during a curl, a bench press, or when you’re lowering yourself on a chest dip.', 'Build Muscle', 6, 0),
(2, 2, 'GetFit', './workout_plans/GetFit/GetFit.png', './workout_plans/GetFit/GetFit.pdf', 'This program can help you establish a fitness mindset that can then lead to better body composition, less-fat-more-muscle. Unless you get it together in the kitchen, don’t expect to lose fat. In fact, if your nutrition is really bad, you may continue to gain fat.', 'Splits are a popular way to organize exercises into workouts which are performed on specified days. Those can be specific calendar days (Monday, Wednesday, Friday) or simply Day 1, Day 2 and so forth. The latter is helpful for people whose work or school schedules vary week to week.\r\n\r\nUpper-Lower splits divide the body at the waist, generally speaking. Chest, shoulders, back, arms, and core are “Upper”, and legs are “Lower” with the exception that some leg exercises involve the back and arms.\r\n', 'Build And Tone', 8, 0),
(3, 1, 'DefineYou', './workout_plans/DefineYou/DefineYou.png', './workout_plans/DefineYou/DefineYou.pdf\r\n ', 'It is a program that ensures the define of the body in 8 weeks making use of the inner burn of the fat', 'Gaining muscle should be priority, no matter how much fat you lose, you need to put on some lean muscle if you want to improve the way you look and feel. The less muscle you have means the lower your body fat percentage has to be to see it. Gaining muscle also helps you to burn more calories; a pound of fat burns about 2-3 calories per day while a pound of muscle can burn 7- 10 calories daily. Aim for at least three workout sessions per week and make sure to perform the bigger compound lifts suc', 'Define Your body and Muscles', 8, NULL),
(4, 3, 'Fat Destroyer', './workout_plans/FatDestroyer/FatDestroyer.png', './workout_plans/FatDestroyer/fatdestroyer.pdf', 'To lose weight in a healthy non toxic way for a better fit and a good progress', 'Fat BurnerWhey ProteinBCAA Intra-WorkoutFish Oil (EFAs)Creatine Monohydrate', 'Lose Fat', 12, 5);


ALTER TABLE `activity`
  ADD KEY `fk_activity` (`user_id`);

ALTER TABLE `assigned`
  ADD PRIMARY KEY (`user_id`,`workout_id`,`diet_id`),
  ADD KEY `fk_workout_id` (`workout_id`),
  ADD KEY `fk_diet_id` (`diet_id`),
  ADD KEY `fk_gym_id` (`gym_id`);

ALTER TABLE `diet`
  ADD PRIMARY KEY (`diet_id`);

ALTER TABLE `gym`
  ADD PRIMARY KEY (`gym_id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `fk_product` (`product_id`),
  ADD KEY `fk_user` (`user_id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`);

ALTER TABLE `team`
  ADD PRIMARY KEY (`member_id`);

ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `workout_plan`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `fk_workout_planer_id` (`workout_planer_id`);
    
ALTER TABLE `diet`
  MODIFY `diet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `gym`
  MODIFY `gym_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `progress`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `user_signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `workout_plan`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `activity`
  ADD CONSTRAINT `fk_activity` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`);

ALTER TABLE `assigned`
  ADD CONSTRAINT `fk_diet_id` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`diet_id`),
  ADD CONSTRAINT `fk_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gym` (`gym_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_ID`),
  ADD CONSTRAINT `fk_workout_id` FOREIGN KEY (`workout_id`) REFERENCES `workout_plan` (`workout_id`);

ALTER TABLE `orders`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`user_id`);

ALTER TABLE `workout_plan`
  ADD CONSTRAINT `fk_workout_planer_id` FOREIGN KEY (`workout_planer_id`) REFERENCES `team` (`member_id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
