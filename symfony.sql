-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 04 mai 2020 à 15:33
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `product_id`, `user_id`, `comment`, `date`, `name`) VALUES
(25, 3, 8, 'super article !', '2020-05-04 15:11:47', 'kurt'),
(26, 3, 8, 'tous se passe au mieux', '2020-05-04 15:21:09', 'kurt'),
(30, 3, 11, 'très bon iphone.', '2020-05-04 15:26:24', 'test'),
(31, 6, 11, 'trottinette parfaite pour la ville.', '2020-05-04 15:27:28', 'test'),
(32, 5, 11, 'ordinateur de bonne qualité je recommande.', '2020-05-04 15:30:23', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `number_article` int(11) NOT NULL,
  `couts_totaux` int(11) NOT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttc` int(11) NOT NULL,
  `date_buy` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `product_id`, `user_id`, `number_article`, `couts_totaux`, `reference_id`, `ttc`, `date_buy`) VALUES
(131, 3, 8, 4, 3000, '62ff878b6db2ebea', 5550, '2020-04-29 17:02:31'),
(132, 2, 8, 7, 1400, '62ff878b6db2ebea', 5550, '2020-04-29 17:02:32'),
(133, 4, 8, 2, 700, '62ff878b6db2ebea', 5550, '2020-04-29 17:02:32'),
(134, 7, 8, 1, 450, '62ff878b6db2ebea', 5550, '2020-04-29 17:02:32'),
(135, 4, 8, 1, 350, 'a4caeddc36705147', 350, '2020-04-30 14:03:14'),
(136, 4, 8, 2, 700, 'd9f01eb7d666ec24', 700, '2020-05-01 14:06:33'),
(137, 2, 8, 1, 200, '8b8ee9bea7a4df32', 650, '2020-05-01 15:32:54'),
(138, 6, 8, 3, 450, '8b8ee9bea7a4df32', 650, '2020-05-01 15:32:54'),
(139, 2, 8, 3, 600, '1a4dfb0d7b384275', 2100, '2020-05-03 13:09:20'),
(140, 3, 8, 2, 1500, '1a4dfb0d7b384275', 2100, '2020-05-03 13:09:21'),
(141, 3, 8, 1, 750, '0d945cd1c7591d6d', 1100, '2020-05-03 14:22:35'),
(142, 4, 8, 1, 350, '0d945cd1c7591d6d', 1100, '2020-05-03 14:22:35'),
(143, 6, 8, 3, 450, 'a6e706ad1f06e317', 1200, '2020-05-04 12:34:05'),
(144, 3, 8, 1, 750, 'a6e706ad1f06e317', 1200, '2020-05-04 12:34:06'),
(145, 3, 11, 3, 2250, 'ca03d4aeb020f7a5', 2250, '2020-05-04 15:26:58');

-- --------------------------------------------------------

--
-- Structure de la table `like_product`
--

CREATE TABLE `like_product` (
  `id` int(11) NOT NULL,
  `product_like_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `like_product`
--

INSERT INTO `like_product` (`id`, `product_like_id`, `user_id`) VALUES
(16, 4, 8),
(19, 2, 9),
(20, 4, 9),
(34, 2, 8),
(37, 6, 8),
(39, 3, 8),
(40, 3, 11),
(41, 5, 11);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200408134840', '2020-04-08 13:49:18'),
('20200414131838', '2020-04-14 13:18:46'),
('20200414132116', '2020-04-14 13:21:21'),
('20200416122427', '2020-04-16 12:24:37'),
('20200421121908', '2020-04-21 12:19:16'),
('20200421122049', '2020-04-21 12:20:55'),
('20200421135454', '2020-04-21 13:55:00'),
('20200421135659', '2020-04-21 13:57:03'),
('20200421141002', '2020-04-21 14:10:25'),
('20200421141207', '2020-04-21 14:12:19'),
('20200421141315', '2020-04-21 14:13:21'),
('20200421141949', '2020-04-21 14:19:57'),
('20200421142036', '2020-04-21 14:20:41'),
('20200421142748', '2020-04-21 14:27:53'),
('20200421144146', '2020-04-21 14:41:50'),
('20200422132308', '2020-04-22 13:23:24'),
('20200422132545', '2020-04-22 13:25:56'),
('20200422133240', '2020-04-22 13:32:49'),
('20200422133619', '2020-04-22 13:36:23'),
('20200427121902', '2020-04-27 12:19:11'),
('20200427122353', '2020-04-27 12:24:31'),
('20200427122732', '2020-04-27 12:27:59'),
('20200427123630', '2020-04-27 12:36:58'),
('20200427125552', '2020-04-27 12:56:59'),
('20200428134143', '2020-04-28 13:43:03'),
('20200428134257', '2020-04-28 14:04:14'),
('20200428140343', '2020-04-28 14:04:14'),
('20200428140654', '2020-04-28 14:07:07'),
('20200504104348', '2020-05-04 10:44:05'),
('20200504120851', '2020-05-04 12:09:25');

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `id` int(11) NOT NULL,
  `historique_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_card` int(11) NOT NULL,
  `expir_m` int(11) NOT NULL,
  `expir_y` int(11) NOT NULL,
  `crypto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payement`
--

INSERT INTO `payement` (`id`, `historique_id`, `name`, `firstname`, `city`, `cp`, `addr`, `number_card`, `expir_m`, `expir_y`, `crypto`) VALUES
(20, 131, 'ce', 'de', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 12, 24, 121),
(21, 132, 'ce', 'de', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 12, 24, 121),
(22, 133, 'ce', 'de', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 12, 24, 121),
(23, 134, 'ce', 'de', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 12, 24, 121),
(24, 135, 'cengiz', 'cengiz', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 21, 215),
(25, 136, 'ce', 'cengiz', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 24, 121),
(26, 137, 'Cengiz', 'Cengiz', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 24, 154),
(27, 138, 'Cengiz', 'Cengiz', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 24, 154),
(28, 139, 'ce', 'cengiz', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 24, 125),
(29, 140, 'ce', 'cengiz', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 24, 125),
(30, 141, 'ce', 'ce', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 24, 121),
(31, 142, 'ce', 'ce', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 24, 121),
(32, 143, 'ce', 'dz', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 1, 24, 214),
(33, 144, 'ce', 'dz', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 1, 24, 214),
(34, 145, 'odo', 'dea', 'Chens Sur Leman', 74140, '151 Chemin du levant', 2147483647, 10, 21, 154);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `garantie` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `garantie`, `image`, `categorie`) VALUES
(2, 'Imprimante', 200, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.', 0, 'imprimante.jpg', 'imprimante'),
(3, 'Iphone 10', 750, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.', 1, 'iphone.jpg', 'phone'),
(4, 'Xiamo', 350, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.', 1, 'xiamo.jpeg', 'phone'),
(5, 'Ordinateur Samsung', 450, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.', 0, 'ordinateur.jpg', 'ordinateur'),
(6, 'Trotinette', 150, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.', 1, 'trotinette.jpg', 'trotinette'),
(7, 'Samsung A50', 450, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.', 0, 'a50.png', 'phone');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `password`, `date_create`) VALUES
(8, 'cengiz', 'kurt', 'cengiz74@live.fr', '$2y$13$lVZXK6jkIrs4lbMHwmPvy.HJ.5pT77IXvctM03WA/u4X6EGtKj6gy', '2020-04-13 15:12:47'),
(9, 'kurt', 'cengiz', 'kurtt.cengiz@gmail.com', '$2y$13$/CMRsVwIzl7D6MG7aAVIx.du8Yc8HYZiL0tWoSJJLog2OF35606AC', '2020-04-13 15:37:35'),
(10, 'titan', 'albert', 'cengisz74@live.fr', '$2y$13$1n9UT82/KmdnJFnyIAmG.O.daGghgL9vfrPxhHzISvxL6gKfpUcy.', '2020-04-13 17:13:59'),
(11, 'tod', 'test', 'tod@gmail.com', '$2y$13$Pu4MoxTzPybb9lWqX2pdsulQXK1ZhCY4EhBYWaoDC.SgkcDy0Xsvi', '2020-05-04 15:25:16'),
(12, 'test', 'test', 'test@dam.com', '$2y$13$tyPxd4NC5rnMOzjXTQV2heruWVKKy6/L78G5v2WW1i8VWv/6DmT6W', '2020-05-04 15:25:46');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_67F068BC4584665A` (`product_id`),
  ADD KEY `IDX_67F068BCA76ED395` (`user_id`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EDBFD5EC4584665A` (`product_id`),
  ADD KEY `IDX_EDBFD5ECA76ED395` (`user_id`);

--
-- Index pour la table `like_product`
--
ALTER TABLE `like_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_80C74E8E5442E182` (`product_like_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B20A78856128735E` (`historique_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT pour la table `like_product`
--
ALTER TABLE `like_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_67F068BC4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_67F068BCA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `FK_EDBFD5EC4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_EDBFD5ECA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `like_product`
--
ALTER TABLE `like_product`
  ADD CONSTRAINT `FK_80C74E8E5442E182` FOREIGN KEY (`product_like_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `FK_B20A78856128735E` FOREIGN KEY (`historique_id`) REFERENCES `historique` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
