-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2019 at 06:41 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `municipal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `lattitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `image`, `created_at`, `lattitude`, `longitude`, `category_id`) VALUES
(2, 'Résultats des rencontres Seniors', 'ier nos 2 équipes étaient engagées pour le championnat de l\'Hérault Senior, bilan : \r\n- Large victoire de l\'équipe 1 à Frontignan 5-1\r\n- Défaite serrée de l\'équipe 2 contre le Barrou de Sète 4-2.\r\n\r\nRetour en images pour l\'équipe 2 qui recevait à la maison.', 'https://static.wixstatic.com/media/c85021_0dde6b461b5b4b43ad6dbf07c38ae7b2~mv2.jpg/v1/fill/w_630,h_419,al_c,q_80,usm_0.66_1.00_0.01/c85021_0dde6b461b5b4b43ad6dbf07c38ae7b2~mv2.webp', '2019-11-13 20:46:59', '36.8546881', '10.2838168', 3),
(3, 'Sortie annuelle au Lasergame', 'La semaine dernière, les jeunes pousses du Tennis Montagnac ont bien fêté la fin d\'année par la traditionnelle sortie au LaserGame de Clermont l\'Hérault !\r\nBon été à tous !!', 'https://static.wixstatic.com/media/c85021_d794c4768b28478385b100dfa353fc96~mv2.jpg/v1/fill/w_630,h_354,al_c,q_80,usm_0.66_1.00_0.01/c85021_d794c4768b28478385b100dfa353fc96~mv2.webp', '2019-11-13 20:47:53', '36.8546863', '10.2838048', 3),
(4, 'Route impraticable', 'Route impraticable', 'https://images.caradisiac.com/logos/0/2/9/6/180296/S0-Russie-bienvenue-sur-la-route-la-plus-impraticable-au-monde-96085.jpg', '2019-11-14 09:55:21', '36.84574920000001', '10.2697807', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`) VALUES
(1, 'Pollution', NULL),
(2, 'Roads', NULL),
(3, 'Others', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `author`, `content`, `created_at`) VALUES
(1, 3, 'Gader', 'This is really nice :D', '2019-11-14 09:36:35'),
(2, 4, 'Ahmed', 'Shame!', '2019-11-14 09:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191110210606', '2019-11-12 10:55:13'),
('20191110210743', '2019-11-12 10:55:15'),
('20191110210849', '2019-11-12 10:55:19'),
('20191110214314', '2019-11-12 10:55:20'),
('20191110233902', '2019-11-12 10:55:24'),
('20191110234311', '2019-11-12 10:55:29'),
('20191110234458', '2019-11-12 10:55:42'),
('20191110234559', '2019-11-12 10:55:48'),
('20191110234819', '2019-11-12 10:56:05'),
('20191110235253', '2019-11-12 10:56:08'),
('20191112105808', '2019-11-12 10:58:26'),
('20191112110055', '2019-11-12 11:01:00'),
('20191112111556', '2019-11-12 11:16:01'),
('20191112123821', '2019-11-12 12:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `neighborhood`
--

CREATE TABLE `neighborhood` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `officiels`
--

CREATE TABLE `officiels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officiels`
--

INSERT INTO `officiels` (`id`, `name`, `position`, `image`) VALUES
(1, 'Bill de Blasio', 'MAYOR', 'https://www1.nyc.gov/assets/home/images/mayor/index/deblasio.png'),
(2, 'Scott Stringer', 'Comptroller', 'https://s3-eu-west-2.amazonaws.com/newzimlive/wp-content/uploads/2018/10/26045109/mayor-Victoria-Falls-Dlamini.jpg'),
(3, 'Gale Brewer', 'Borough President', 'https://www.jelgava.lv/files/andris_ravins_(1).jpg'),
(4, 'Andris Rāviņš', 'Employee', 'https://cdn.vox-cdn.com/thumbor/GAI9xVQtPBrX2TZSCtwV5mVIWeg=/0x0:5568x3712/920x613/filters:focal(2858x720:3748x1610):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/62207705/922984782.jpg.0.jpg'),
(5, 'Corey Johnson', 'Speaker', 'https://s.hdnux.com/photos/51/23/24/10827008/3/920x920.jpg'),
(6, 'Gale Brewer', 'Public advocate', 'https://s.hdnux.com/photos/26/44/37/5916641/3/1024x1024.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `private_rdv_cat`
--

CREATE TABLE `private_rdv_cat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `officiel_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `private_rdv_cat`
--

INSERT INTO `private_rdv_cat` (`id`, `user_id`, `officiel_id`, `date`, `description`) VALUES
(4, NULL, 5, '2014-01-01', 'Need you for advices !'),
(5, NULL, 6, '2019-12-01', 'I\'d like to meet');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(9, 'gader@medtech.tn', 'gader', '$argon2id$v=19$m=65536,t=4,p=1$3Dxm5EVkPmiTEuEfiW7Aew$+VhcA8xe9zDcV4D5doQYzW4M7oy7FXdQ0DsdGqfZyA8'),
(10, 'lilia@gmail.com', 'Lilia', '$argon2id$v=19$m=65536,t=4,p=1$t2G+xWsHeU8nBEL4XkhGFQ$brhhnolkcoEZ27boOXQKtauZWX2an8SazhfiuGVlSsI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E6612469DE2` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C7294869C` (`article_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `neighborhood`
--
ALTER TABLE `neighborhood`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FEF1E9EE8BAC62AF` (`city_id`);

--
-- Indexes for table `officiels`
--
ALTER TABLE `officiels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `private_rdv_cat`
--
ALTER TABLE `private_rdv_cat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E40FF5A76ED395` (`user_id`),
  ADD UNIQUE KEY `UNIQ_E40FF5B80840D5` (`officiel_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_DFEC3F397294869C` (`article_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `neighborhood`
--
ALTER TABLE `neighborhood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officiels`
--
ALTER TABLE `officiels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `private_rdv_cat`
--
ALTER TABLE `private_rdv_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Constraints for table `neighborhood`
--
ALTER TABLE `neighborhood`
  ADD CONSTRAINT `FK_FEF1E9EE8BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `private_rdv_cat`
--
ALTER TABLE `private_rdv_cat`
  ADD CONSTRAINT `FK_E40FF5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_E40FF5B80840D5` FOREIGN KEY (`officiel_id`) REFERENCES `officiels` (`id`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `FK_DFEC3F397294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
