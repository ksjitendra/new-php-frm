-- Adminer 4.8.0 MySQL 8.0.33-0ubuntu0.20.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Electronics',	'2023-07-18 18:33:55',	'2023-07-18 18:33:55'),
(2,	'Fashion',	'2023-07-18 18:35:39',	'2023-07-18 18:35:39'),
(3,	'Food',	'2023-07-19 15:47:27',	'2023-07-19 15:47:27'),
(4,	'test',	'2023-07-20 04:27:33',	'2023-07-20 04:27:33');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `offer_price` float NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `offer_price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2,	2,	'Laptop',	1000,	900,	'   Best Mobile    ',	'1689748161_Screenshot from 2023-05-19 09-55-17.png',	'2023-07-19 10:59:41',	'2023-07-19 10:59:41'),
(4,	1,	'Headphone-1',	100,	90,	'                Test                 ',	'1689782606_Screenshot from 2023-05-19 09-53-41.png',	'2023-07-19 16:03:33',	'2023-07-19 16:03:33'),
(5,	1,	'test product1',	5000,	4000,	'fff  Test  ',	'1689827325_user.png',	'2023-07-20 04:28:45',	'2023-07-20 04:28:45');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` text NOT NULL,
  `user_type` tinyint NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `user_type`, `created_at`, `updated_at`) VALUES
(1,	'Jitendra',	'admin@gmail.com',	NULL,	'$2y$10$6hgd/mOUpAQhHfD9eFjM/OOTB5xYTvwzHs1NDHhku5738cHDT7bMS',	1,	'2023-07-19 15:15:18',	'2023-07-19 15:15:18');

-- 2023-07-20 04:29:42
