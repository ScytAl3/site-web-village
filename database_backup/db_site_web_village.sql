-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 juil. 2020 à 09:48
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_site_web_village`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date_event` datetime NOT NULL,
  `end_date_event` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`idEvent`, `title`, `start_date_event`, `end_date_event`, `description`, `body`, `created_at`, `updated_at`, `city`, `address`, `zip_code`, `lat`, `lng`) VALUES
(1, 'Nam nobis alias non ut.', '2020-03-13 07:34:14', '2020-03-29 14:25:21', 'Quam sed atque adipisci temporibus quia iure eum. Placeat a ex explicabo non non sapiente.', 'Dolores et voluptatum nemo omnis iure et. Nam ducimus mollitia repellat fugiat placeat non consequatur omnis. Beatae nihil hic labore ullam. Quia fugit est illum accusamus. Exercitationem qui minima et nisi aut ipsum dolorum ex. Quis non voluptatem et officiis voluptas. Magni minima autem quidem amet delectus adipisci dolorem. Soluta deserunt debitis pariatur ut quasi magni est occaecati. Ut quia sapiente velit aperiam. Dicta molestiae natus eaque. Est autem et tenetur rerum modi illum. Consequatur molestias non sit et.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(2, 'Quia delectus beatae aut officia.', '2020-02-27 04:06:55', '2020-03-21 22:32:35', 'Facere ipsum laborum aut mollitia earum. Illo et optio et aperiam nemo.', 'Numquam tempore tempora ut corporis rerum sit natus. Recusandae asperiores aut quidem quia voluptas ducimus quia. Sit voluptatem iure quia sit aperiam incidunt cupiditate. Architecto doloremque non quod consequatur vitae qui et. Modi molestiae dolor sit nihil placeat porro expedita. Eaque esse et accusamus sint neque iusto. Sapiente est aut consequatur quidem sequi illo modi. Necessitatibus non eum aliquam cumque placeat. Dolorem voluptates et in placeat et beatae. Aut eos minima tenetur aut assumenda facilis veniam. Et veniam id occaecati dolor magni et nobis tempora.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(3, 'Esse sapiente nulla repellat nihil.', '2020-03-07 12:45:21', '2020-03-26 13:02:35', 'Facere necessitatibus quisquam perspiciatis voluptatibus. Quae officia in consequatur.', 'Quis quae ut sed beatae. Accusantium est aspernatur ab doloribus. Aut aut ad vero aut pariatur. Ea quisquam soluta autem. Et magnam consequuntur hic voluptate. Deleniti placeat pariatur in repellendus qui provident ad. Adipisci id accusantium est voluptatibus qui expedita ut. Accusantium accusantium nihil nihil reiciendis. Dolore illo quaerat consectetur reiciendis odio totam. Voluptates delectus sunt praesentium maiores mollitia eius voluptatem.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(4, 'Iusto quidem aut sit qui illum exercitationem.', '2020-03-03 16:30:02', '2020-03-19 20:41:24', 'Dolor eveniet quis reiciendis porro. Ut culpa molestiae minus corporis. Ea et facilis dolorem.', 'Ab ducimus maiores fugiat beatae aut soluta. Pariatur voluptas ut doloribus. Ad exercitationem earum numquam dolorem eius molestiae nobis consequuntur. Blanditiis delectus assumenda consequatur earum. Consequatur delectus qui rerum illum. Odit ea aut illo ea hic. Eius animi id et minus. Non quia dolor velit minima quae. Tempora adipisci et nobis non natus reiciendis. Nobis non quidem natus accusamus. Fuga iusto dolorem ratione dignissimos ducimus. Inventore dolorem quae nihil earum tempore culpa nihil.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(5, 'Unde dignissimos quo est sit.', '2020-03-16 08:59:34', '2020-03-29 06:05:57', 'Velit sint sit sed nisi aspernatur aperiam. Optio et et eligendi unde asperiores delectus.', 'Omnis eum velit suscipit fugit molestiae. Voluptates sit sit qui. Dolorum cumque amet rerum quibusdam. Voluptatum odit inventore quidem totam. Debitis quibusdam ut dolorem ipsum. Dolore debitis enim error id non. Dolor qui explicabo quos. Sit iste maxime omnis dolores debitis aut aliquam. Molestiae necessitatibus voluptatem ea dolore. Exercitationem blanditiis iusto dolores quaerat. Corporis fuga fuga molestiae quidem est saepe quia. Adipisci laborum ipsum incidunt commodi molestiae ut.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(6, 'Et qui aliquam minus.', '2020-03-22 20:50:22', '2020-03-23 16:25:02', 'Expedita est voluptatem nisi dolore facere. Officia et qui cumque iure velit necessitatibus.', 'Facere aut est id. Est et laudantium non harum ut omnis voluptas. Omnis nam rem sit voluptates nesciunt. Est quis eum ratione veniam. Sunt reiciendis rem quis. Reiciendis est nulla neque minus optio. Quod incidunt excepturi quis qui. Itaque quo numquam nihil id provident non. Quia quo fuga non autem. Consequuntur harum consequuntur corrupti minus sit veniam. Culpa ratione nam possimus quidem. Optio est tempora recusandae aut aliquid. Ut enim eius numquam sed nostrum illo enim. Sit expedita qui voluptates veritatis voluptatem quisquam.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(7, 'Eligendi qui asperiores qui.', '2020-03-19 04:35:38', '2020-03-19 21:31:53', 'Aut beatae eius architecto. Aut consectetur autem porro odit modi minima temporibus.', 'Sit blanditiis fugit minus repellendus omnis qui. Asperiores sint dolores quis aperiam voluptas pariatur. Maiores maiores est debitis nam voluptatum dolor ducimus. Animi quaerat consectetur possimus. Vel corporis qui non. Rerum esse voluptatem omnis iusto quibusdam. Ea reiciendis quia ea sit laborum. Occaecati minima quibusdam aut possimus. Veritatis non minima exercitationem id minima. Quaerat odit ipsa iure dolor id dolorum hic. Sed sint in veniam commodi. Facere labore similique placeat et facere.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(8, 'Nihil ab earum vero libero molestias rerum.', '2020-03-11 13:09:09', '2020-03-16 15:48:37', 'Eaque tenetur quis velit explicabo molestiae eligendi non. Et itaque ipsum in.', 'Et cum cum reprehenderit quam itaque. Rerum quo et ipsa doloremque consequuntur. Laboriosam earum sed aut et soluta laudantium. Cum cum consequuntur natus non. Dolor occaecati explicabo voluptatem atque. Eveniet illo molestiae eos repudiandae. Maiores ad qui totam omnis. Aperiam quod ducimus alias eos magni et est. Eos quasi sint possimus eum. Quibusdam et illo reprehenderit quia et recusandae dolorum. Voluptatem rerum quia eum minima. Dolores vel ducimus earum quos minima iure iusto. Excepturi voluptas error delectus consectetur aut. Nihil sed quibusdam maxime aut enim amet qui.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(9, 'Et neque iste adipisci neque non ullam dolor hic.', '2020-02-25 04:18:11', '2020-03-13 05:50:20', 'Delectus sit nihil autem fugit animi. Sed ut qui velit libero velit. Nobis rem est velit.', 'Deserunt eum similique eveniet fuga quaerat. Est vero recusandae reiciendis. Exercitationem saepe temporibus quasi distinctio id. Nisi aut facere sit voluptatem eos voluptatem et. Repudiandae repellat reprehenderit quis ea qui in. Consequatur quidem officiis quis optio omnis nihil. Ea consequatur molestiae earum. Quaerat nisi perspiciatis repudiandae eos. Soluta dolorem voluptatem voluptatem omnis. Officia praesentium iure laboriosam. Error ut laborum nam soluta pariatur sed maiores sint. Earum blanditiis dolorem voluptatem repellat. Culpa ut eos quia dolorum.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0),
(10, 'Dolor occaecati soluta sint et.', '2020-03-19 13:04:50', '2020-03-26 21:20:24', 'Et perspiciatis praesentium esse. Quia in ea quidem eum. Nisi voluptatem magnam est atque porro.', 'Est veniam rerum sit laborum corrupti. Et itaque velit nulla quibusdam. Voluptatem aliquam nulla consequuntur expedita sapiente eum porro. Dolorem quibusdam dolorem odio vero numquam praesentium odit. Sunt occaecati eveniet impedit ea et. Deleniti qui a totam sapiente magnam ratione. Sed qui nesciunt quia enim ut. Ut minus molestias aut suscipit quae necessitatibus. Sunt voluptatem ut vitae sequi. Ullam aut facere quis doloremque inventore et.', '2020-03-24 21:46:51', NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190527075455', '2020-03-24 21:40:40');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `event_id` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idPicture`),
  KEY `IDX_16DB4F8971F7E88B` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'Admin', '[\"ROLE_ADMIN\"]', '$argon2i$v=19$m=65536,t=4,p=1$b1J5Qy9ESmYwWktoRk51VA$osHxnEmtzw6C4UGFUZUVruK5r3awcJN41My1vXF4fLQ');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F8971F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`idEvent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
