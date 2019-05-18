-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'陳姿婷',	'coco214034@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'WaWqvNm2rAnRNNGkvnbGdSaTS3GTWshyKv4wzWfrO9V9siI0Xfr5Gsxp2UWl',	'2019-01-16 20:10:55',	NULL),
(2,	'張宏瑋',	'',	NULL,	'',	NULL,	'2019-01-16 20:10:48',	NULL),
(3,	'鄭一緯',	'',	NULL,	'',	NULL,	'2019-01-16 20:11:23',	NULL),
(4,	'陳冠宇',	'',	NULL,	'',	NULL,	'2019-01-16 20:11:43',	NULL);

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'主餐',	NULL,	NULL),
(2,	'開胃品',	NULL,	NULL),
(3,	'沙拉',	NULL,	NULL),
(4,	'前菜',	NULL,	NULL),
(5,	'湯品',	NULL,	NULL),
(6,	'甜點',	NULL,	NULL),
(7,	'飲料',	NULL,	NULL);

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lowestprice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `coupons_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `coupons` (`id`, `restaurant_id`, `title`, `content`, `discount`, `photo`, `lowestprice`, `status`, `StartTime`, `EndTime`, `created_at`, `updated_at`) VALUES
(1,	1,	'8折優惠卷',	'可以折8折優惠',	'',	'',	'',	1,	'2019-01-17 14:53:10',	'2019-01-20 14:53:10',	NULL,	NULL),
(2,	1,	'6折優惠卷',	'可以折6折優惠',	'',	'',	'',	0,	'2019-01-17 14:53:10',	'2019-01-20 14:53:10',	NULL,	NULL),
(3,	1,	'95折優惠券',	'可以折95折優惠',	'',	'',	'',	0,	'2019-01-17 00:00:00',	'2019-01-29 14:53:10',	NULL,	NULL),
(4,	3,	'滿1000抵100',	'消費總金額達1000折100',	'100',	'',	'1000',	0,	'2019-03-26 12:00:00',	'2019-03-31 12:00:00',	NULL,	NULL),
(5,	3,	'贈送胖子一隻',	'無價',	'0',	'',	'999999',	0,	'2019-04-25 01:00:00',	'2019-05-09 12:59:00',	'2019-04-19 01:25:36',	'2019-04-19 01:25:36'),
(6,	3,	'test',	'test',	'',	'',	'',	0,	'2019-05-01 00:00:07',	'2019-05-01 00:00:07',	NULL,	NULL);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`id`, `restaurant_id`, `member_id`, `verification_code`, `created_at`, `updated_at`) VALUES
(1,	1,	0,	'0',	'2019-03-11 11:45:37',	NULL),
(2,	1,	0,	'0',	'2019-03-11 11:45:42',	NULL),
(3,	2,	0,	'0',	'2019-03-11 11:45:48',	NULL),
(4,	2,	0,	'0',	'2019-03-11 11:45:52',	NULL),
(5,	3,	0,	'0',	'2019-03-11 11:45:56',	NULL),
(6,	2,	0,	'0',	'2019-03-11 11:46:00',	NULL),
(7,	2,	0,	'0',	'2019-03-11 11:46:04',	NULL),
(29,	3,	0,	NULL,	'2019-03-19 07:38:01',	'2019-03-19 07:38:01'),
(30,	3,	0,	NULL,	'2019-03-19 07:40:30',	'2019-03-19 07:40:30'),
(31,	3,	0,	NULL,	'2019-03-19 08:01:18',	'2019-03-19 08:01:18'),
(32,	3,	0,	'En3Is6YfOzZ8kZv3zqNuWmq4C3Lfw0',	'2019-03-19 08:03:53',	'2019-03-19 08:03:53'),
(33,	3,	0,	'HEwfn9GIpWP4795q9c6J7twsLvdM6h',	'2019-03-19 09:10:48',	'2019-03-19 09:10:48'),
(34,	3,	0,	'5T68484xhCrN0oaq0T3n3prP7k745u',	'2019-03-19 09:11:36',	'2019-03-19 09:11:36'),
(35,	3,	0,	'r51U7bYi3YeJPT704s9MkTPyp8pGxj',	'2019-03-19 09:11:55',	'2019-03-19 09:11:55'),
(36,	3,	0,	'460kU17dRa8aCkl1zB27tL5j1tIH8S',	'2019-03-19 09:12:00',	'2019-03-19 09:12:00'),
(37,	3,	0,	'vz1N9bhRjzje5nj0URHgLySrH4ae5z',	'2019-03-19 09:13:22',	'2019-03-19 09:13:22'),
(38,	3,	0,	'QMMlG0pLoSQ1WRtnoxdK1Gcn3ioH83',	'2019-03-19 09:13:59',	'2019-03-19 09:13:59'),
(39,	3,	0,	'E01QwgyAEvm8O7W5yjOw2MDXvk385O',	'2019-03-19 09:14:32',	'2019-03-19 09:14:32'),
(40,	3,	0,	'l6z4y3b52Oyi6RxCx8m0gokO48W693',	'2019-03-19 09:14:43',	'2019-03-19 09:14:43'),
(41,	3,	0,	'mi567f9zDQ7c6c9hmzk6VQ8UgrbWb9',	'2019-03-19 09:15:22',	'2019-03-19 09:15:22'),
(42,	3,	0,	'isXT508lmK51p10PZnWLkwY2NFs7W9',	'2019-03-19 09:17:17',	'2019-03-19 09:17:17'),
(43,	3,	0,	'n7qu5G4b6Cnas88lbde68M7WuF8k4W',	'2019-03-19 09:17:29',	'2019-03-19 09:17:29'),
(44,	3,	0,	'Lmv3vF698ds69lElP9WQi695dhtv11',	'2019-03-19 09:18:03',	'2019-03-19 09:18:03'),
(45,	3,	0,	'I4G2276C907755DUfSAtu8u9Xt87H4',	'2019-03-19 09:19:13',	'2019-03-19 09:19:13'),
(46,	3,	0,	'2h28A7240Mctnpznqm0Yu5QQFj38Fe',	'2019-03-20 05:15:56',	'2019-03-20 05:15:56'),
(47,	3,	0,	'yhDbAI3aF2gu3h0sMYOVFPRnA7P1QD',	'2019-03-20 05:16:51',	'2019-03-20 05:16:51'),
(48,	3,	0,	'3uVNLtjUmrb0AeE6HbVQ25NToi05BD',	'2019-03-20 12:35:04',	'2019-03-20 12:35:04'),
(49,	3,	0,	'5ZVvNXz5KQXJXBM19czvQui81DT7lr',	'2019-03-20 12:48:57',	'2019-03-20 12:48:57'),
(50,	3,	0,	'946qvd4C2z2K41e974hnSD0cVIxlY7',	'2019-03-20 12:50:12',	'2019-03-20 12:50:12'),
(51,	3,	0,	'G4jlIGsPNJS1V5S10740sxupbb93H3',	'2019-03-20 12:56:00',	'2019-03-20 12:56:00'),
(52,	3,	0,	'E68ybrHh29ZKNCU08AYi1iSFr0mAce',	'2019-03-20 12:56:20',	'2019-03-20 12:56:20'),
(53,	3,	0,	'kYt3mp3g4ubhXlIN0dq5jOIMy9yTTK',	'2019-03-20 12:58:40',	'2019-03-20 12:58:40'),
(54,	3,	0,	'Qm1UjvV7Au9jsv904793Vd5nnCB7h2',	'2019-03-20 13:01:17',	'2019-03-20 13:01:17'),
(55,	3,	0,	'CpXSL6usP0KjqHDy8UvgeDJ2tn6Gnu',	'2019-03-20 13:03:04',	'2019-03-20 13:03:04'),
(56,	3,	0,	't4N92OgNyk0buVL4DU6TiQBF94Rt4y',	'2019-03-20 13:04:14',	'2019-03-20 13:04:14'),
(57,	3,	0,	'SmW3tnoRSME57x1FX7bZbZkj1Z4TH5',	'2019-03-20 13:06:33',	'2019-03-20 13:06:33'),
(58,	3,	7,	'SmW3tnoRSME57x1FX7bZbZkj1Z4TH5',	'2019-03-20 13:06:33',	'2019-03-20 13:06:33'),
(59,	3,	7,	'SmW3tnoRSME57x1FX7bZbZkj1Z4TH5',	'2019-03-20 13:06:33',	'2019-03-20 13:06:33'),
(60,	3,	NULL,	'du9K4Cas0q0P704qkxCZN897a99P2N',	'2019-05-13 02:56:05',	'2019-05-13 02:56:05'),
(61,	3,	NULL,	'4938d7yT6UB9ZHt6i1mbfa0510ndWR',	'2019-05-13 03:07:32',	'2019-05-13 03:07:32'),
(62,	3,	NULL,	'5WqGOU5Z6Ok6CHw0O9Vyk1N5e0nlHJ',	'2019-05-13 03:09:46',	'2019-05-13 03:09:46'),
(63,	3,	NULL,	'MEiWmqD0f9ZA6qH7h934T3X7DojOke',	'2019-05-13 05:13:48',	'2019-05-13 05:13:48');

DROP TABLE IF EXISTS `dining_tables`;
CREATE TABLE `dining_tables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `dining_tables` (`id`, `order_id`, `table_id`, `created_at`, `updated_at`) VALUES
(25,	24,	101,	'2019-03-19 07:38:01',	'2019-03-19 07:38:01'),
(26,	25,	147,	'2019-03-19 07:40:30',	'2019-03-19 07:40:30'),
(27,	26,	149,	'2019-03-19 08:01:18',	'2019-03-19 08:01:18'),
(28,	27,	104,	'2019-03-19 08:03:53',	'2019-03-19 08:03:53'),
(29,	28,	148,	'2019-03-19 09:10:48',	'2019-03-19 09:10:48'),
(30,	29,	148,	'2019-03-19 09:11:36',	'2019-03-19 09:11:36'),
(31,	30,	148,	'2019-03-19 09:11:55',	'2019-03-19 09:11:55'),
(32,	31,	148,	'2019-03-19 09:12:00',	'2019-03-19 09:12:00'),
(33,	32,	109,	'2019-03-19 09:13:22',	'2019-03-19 09:13:22'),
(34,	33,	109,	'2019-03-19 09:13:59',	'2019-03-19 09:13:59'),
(35,	34,	109,	'2019-03-19 09:14:32',	'2019-03-19 09:14:32'),
(36,	35,	109,	'2019-03-19 09:14:43',	'2019-03-19 09:14:43'),
(37,	36,	109,	'2019-03-19 09:15:22',	'2019-03-19 09:15:22'),
(38,	37,	109,	'2019-03-19 09:17:17',	'2019-03-19 09:17:17'),
(39,	38,	109,	'2019-03-19 09:17:29',	'2019-03-19 09:17:29'),
(40,	39,	109,	'2019-03-19 09:18:03',	'2019-03-19 09:18:03'),
(41,	40,	109,	'2019-03-19 09:19:13',	'2019-03-19 09:19:13'),
(42,	41,	110,	'2019-03-20 05:15:56',	'2019-03-20 05:15:56'),
(43,	42,	110,	'2019-03-20 05:16:51',	'2019-03-20 05:16:51'),
(44,	43,	115,	'2019-03-20 12:35:04',	'2019-03-20 12:35:04'),
(45,	44,	125,	'2019-03-20 12:48:57',	'2019-03-20 12:48:57'),
(46,	45,	125,	'2019-03-20 12:50:12',	'2019-03-20 12:50:12'),
(47,	46,	125,	'2019-03-20 12:56:00',	'2019-03-20 12:56:00'),
(48,	47,	125,	'2019-03-20 12:56:20',	'2019-03-20 12:56:20'),
(49,	48,	108,	'2019-03-20 12:58:40',	'2019-03-20 12:58:40'),
(50,	49,	108,	'2019-03-20 13:01:17',	'2019-03-20 13:01:17'),
(51,	50,	145,	'2019-03-20 13:03:04',	'2019-03-20 13:03:04'),
(52,	51,	145,	'2019-03-20 13:04:15',	'2019-03-20 13:04:15'),
(53,	52,	145,	'2019-03-20 13:06:33',	'2019-03-20 13:06:33'),
(54,	55,	103,	'2019-05-13 02:56:05',	'2019-05-13 02:56:05'),
(55,	56,	102,	'2019-05-13 03:07:32',	'2019-05-13 03:07:32'),
(56,	57,	102,	'2019-05-13 03:09:46',	'2019-05-13 03:09:46'),
(57,	58,	135,	'2019-05-13 05:13:48',	'2019-05-13 05:13:48');

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `meal_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `EndTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meal_id` (`meal_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `items` (`id`, `order_id`, `meal_id`, `quantity`, `status`, `EndTime`, `created_at`, `updated_at`) VALUES
(1,	1,	5,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(2,	1,	6,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(3,	2,	7,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(4,	2,	8,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(5,	3,	4,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(6,	4,	9,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(7,	5,	14,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(8,	5,	19,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(12,	6,	20,	1,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(13,	7,	3,	2,	1,	'2019-02-21 02:51:40',	'2019-02-20 18:51:40',	'2019-02-20 18:51:40'),
(14,	7,	10,	1,	1,	'2019-02-21 02:52:07',	'2019-02-20 18:52:07',	'2019-02-20 18:52:07'),
(15,	7,	12,	2,	1,	'2019-02-21 02:52:26',	'2019-02-20 18:52:26',	'2019-02-20 18:52:26'),
(16,	7,	14,	2,	1,	'2019-02-21 02:52:51',	'2019-02-20 18:52:51',	'2019-02-20 18:52:51'),
(17,	7,	16,	2,	1,	'2019-02-21 02:53:12',	'2019-02-20 18:53:12',	'2019-02-20 18:53:12'),
(18,	7,	18,	2,	1,	'2019-02-21 02:53:35',	'2019-02-20 18:53:35',	'2019-02-20 18:53:35'),
(19,	7,	25,	2,	1,	'2019-02-21 02:53:55',	'2019-02-20 18:53:55',	'2019-02-20 18:53:55'),
(20,	53,	25,	2,	1,	'2019-02-21 02:53:55',	'2019-02-20 18:53:55',	'2019-02-20 18:53:55'),
(24,	53,	10,	2,	1,	'2019-02-21 02:53:55',	'2019-02-20 18:53:55',	'2019-02-20 18:53:55'),
(26,	54,	19,	2,	1,	'2019-02-21 02:53:55',	'2019-02-20 18:53:55',	'2019-02-20 18:53:55'),
(33,	55,	9,	1,	1,	'2019-05-13 02:58:11',	'2019-05-13 02:58:11',	'2019-05-13 02:58:11'),
(34,	55,	5,	1,	1,	'2019-05-13 02:58:13',	'2019-05-13 02:58:13',	'2019-05-13 02:58:13'),
(35,	55,	13,	1,	1,	'2019-05-13 02:58:18',	'2019-05-13 02:58:18',	'2019-05-13 02:58:18'),
(36,	55,	27,	1,	1,	'2019-05-13 02:58:18',	'2019-05-13 02:58:18',	'2019-05-13 02:58:18'),
(37,	55,	5,	1,	1,	'2019-05-13 02:58:22',	'2019-05-13 02:58:22',	'2019-05-13 02:58:22'),
(38,	55,	7,	1,	1,	'2019-05-13 02:58:30',	'2019-05-13 02:58:30',	'2019-05-13 02:58:30'),
(39,	55,	5,	1,	1,	'2019-05-13 02:58:33',	'2019-05-13 02:58:33',	'2019-05-13 02:58:33'),
(40,	55,	12,	1,	1,	'2019-05-13 02:58:34',	'2019-05-13 02:58:34',	'2019-05-13 02:58:34'),
(41,	55,	15,	1,	1,	'2019-05-13 02:58:34',	'2019-05-13 02:58:34',	'2019-05-13 02:58:34'),
(42,	55,	26,	1,	1,	'2019-05-13 02:58:36',	'2019-05-13 02:58:36',	'2019-05-13 02:58:36'),
(43,	55,	25,	1,	1,	'2019-05-13 02:58:40',	'2019-05-13 02:58:40',	'2019-05-13 02:58:40'),
(44,	55,	7,	1,	1,	'2019-05-13 02:58:50',	'2019-05-13 02:58:50',	'2019-05-13 02:58:50'),
(45,	55,	1,	1,	1,	'2019-05-13 02:59:10',	'2019-05-13 02:59:10',	'2019-05-13 02:59:10'),
(46,	55,	15,	1,	1,	'2019-05-13 02:59:14',	'2019-05-13 02:59:14',	'2019-05-13 02:59:14'),
(47,	55,	12,	1,	1,	'2019-05-13 02:59:18',	'2019-05-13 02:59:18',	'2019-05-13 02:59:18'),
(48,	55,	21,	1,	1,	'2019-05-13 02:59:19',	'2019-05-13 02:59:19',	'2019-05-13 02:59:19'),
(49,	55,	27,	1,	1,	'2019-05-13 03:00:59',	'2019-05-13 03:00:59',	'2019-05-13 03:00:59'),
(50,	55,	1,	1,	1,	'2019-05-13 03:02:31',	'2019-05-13 03:02:31',	'2019-05-13 03:02:31'),
(54,	57,	1,	1,	1,	'2019-05-13 03:10:36',	'2019-05-13 03:10:36',	'2019-05-13 03:10:36'),
(56,	57,	4,	1,	1,	'2019-05-13 03:10:39',	'2019-05-13 03:10:39',	'2019-05-13 03:10:39'),
(58,	57,	5,	1,	1,	'2019-05-13 03:51:52',	'2019-05-13 03:51:52',	'2019-05-13 03:51:52'),
(59,	57,	4,	1,	1,	'2019-05-13 03:51:53',	'2019-05-13 03:51:53',	'2019-05-13 03:51:53'),
(63,	58,	5,	1,	1,	'2019-05-13 05:19:30',	'2019-05-13 05:19:30',	'2019-05-13 05:19:30'),
(64,	58,	14,	1,	1,	'2019-05-13 05:19:55',	'2019-05-13 05:19:55',	'2019-05-13 05:19:55'),
(66,	27,	2,	1,	1,	'2019-05-14 04:09:20',	'2019-05-13 20:09:20',	'2019-05-13 20:09:20'),
(67,	27,	5,	1,	1,	'2019-05-14 08:43:05',	'2019-05-14 00:43:05',	'2019-05-14 00:43:05'),
(68,	27,	27,	1,	1,	'2019-05-14 08:43:15',	'2019-05-14 00:43:15',	'2019-05-14 00:43:15');

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE `keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `keywords` (`id`, `keyword`, `created_at`, `updated_at`) VALUES
(1,	'鹹',	NULL,	NULL),
(2,	'甜',	NULL,	NULL),
(3,	'酸',	NULL,	NULL),
(4,	'辣',	NULL,	NULL),
(5,	'大食客',	NULL,	NULL),
(6,	'小鳥胃',	NULL,	NULL),
(7,	'兒童',	NULL,	NULL),
(8,	'蛋奶素',	NULL,	NULL),
(9,	'全素',	NULL,	NULL),
(10,	'鮮味',	NULL,	NULL);

DROP TABLE IF EXISTS `meals`;
CREATE TABLE `meals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `meals` (`id`, `restaurant_id`, `category_id`, `name`, `photo`, `ingredients`, `price`, `created_at`, `updated_at`) VALUES
(1,	3,	1,	'原塊牛排',	'1556486841.jpg',	'a',	360,	NULL,	'2019-04-28 13:27:21'),
(2,	3,	1,	'牽拖起司牛排',	'1555345348.jpg',	NULL,	360,	NULL,	'2019-04-15 08:22:28'),
(3,	3,	1,	'蒜香奶油肩胛菲力',	'1555345254.jpg',	NULL,	360,	NULL,	'2019-04-15 08:20:54'),
(4,	3,	1,	'德國豬腳',	'1555345401.jpg',	NULL,	360,	NULL,	'2019-04-15 08:23:21'),
(5,	3,	1,	'啾C烤雞',	'1555345429.jpg',	NULL,	360,	NULL,	'2019-04-15 08:23:49'),
(6,	3,	1,	'海陸雙拼(雞腿+魚排)',	'1555345441.jpg',	NULL,	360,	NULL,	'2019-04-15 08:24:01'),
(7,	3,	1,	'海陸雙拼(牛排+魚排)',	'1555345797.jpg',	NULL,	360,	NULL,	'2019-04-15 08:29:57'),
(8,	3,	1,	'香煎鴨胸佐櫻桃紅酒醬',	'1555345824.jpg',	NULL,	360,	NULL,	'2019-04-15 08:30:24'),
(9,	3,	1,	'時蔬厚切燉牛排',	'1555345835.jpg',	NULL,	360,	NULL,	'2019-04-15 08:30:35'),
(10,	3,	2,	'優格鮮蝦時蔬',	'1555345942.jpg',	NULL,	50,	NULL,	'2019-04-15 08:32:22'),
(11,	3,	3,	'洋芋沙拉',	'1555345979.jpg',	NULL,	80,	NULL,	'2019-04-15 08:32:59'),
(12,	3,	3,	'時令水果',	'1555346041.jpg',	NULL,	80,	NULL,	'2019-04-15 08:34:01'),
(13,	3,	3,	'綜合生菜沙拉',	'1555344938.jpg',	NULL,	80,	NULL,	'2019-04-15 08:15:38'),
(14,	3,	4,	'焗烤蘑菇+方塊麵包',	'1555346063.jpg',	NULL,	60,	NULL,	'2019-04-15 08:34:23'),
(15,	3,	5,	'義式海鮮清湯',	'1555345995.jpg',	NULL,	80,	NULL,	'2019-04-15 08:33:15'),
(16,	3,	5,	'法式花菜濃湯',	'1555345788.jpg',	NULL,	80,	NULL,	'2019-04-15 08:29:48'),
(17,	3,	5,	'杏鮑菇南瓜濃湯',	'1555345778.jpg',	NULL,	80,	NULL,	'2019-04-15 08:29:38'),
(18,	3,	6,	'黑糖布蕾',	'1555345767.jpg',	NULL,	60,	NULL,	'2019-04-15 08:29:27'),
(19,	3,	6,	'覆盆子奶酪',	'1555345740.jpg',	NULL,	60,	NULL,	'2019-04-15 08:29:00'),
(20,	3,	6,	'巧克力袋冰淇淋',	'1555345718.jpg',	NULL,	60,	NULL,	'2019-04-15 08:28:38'),
(21,	3,	7,	'拿鐵(冰)',	'1555345708.jpg',	NULL,	60,	NULL,	'2019-04-15 08:28:28'),
(22,	3,	7,	'拿鐵(熱)',	'1555345688.jpg',	NULL,	60,	NULL,	'2019-04-15 08:28:08'),
(23,	3,	7,	'荔香彩蝶(孕婦不宜)',	'1555345678.jpg',	NULL,	60,	NULL,	'2019-04-15 08:27:58'),
(24,	3,	7,	'繽紛水果茶',	'1555345599.jpg',	NULL,	60,	NULL,	'2019-04-15 08:26:39'),
(25,	3,	7,	'布蕾香紅',	'1555345481.jpg',	NULL,	60,	NULL,	'2019-04-15 08:24:41'),
(26,	3,	7,	'纖盈香草茶(熱)',	'1555345471.jpg',	NULL,	60,	NULL,	'2019-04-15 08:24:31'),
(27,	3,	7,	'紅絲絨奶茶(熱)',	'1555345456.jpg',	NULL,	60,	NULL,	'2019-04-15 08:24:16');

DROP TABLE IF EXISTS `meal_keywords`;
CREATE TABLE `meal_keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meal_id` int(10) unsigned NOT NULL,
  `keyword_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meal_id` (`meal_id`),
  KEY `keyword_id` (`keyword_id`),
  CONSTRAINT `meal_keywords_ibfk_2` FOREIGN KEY (`keyword_id`) REFERENCES `keywords` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `meal_keywords` (`id`, `meal_id`, `keyword_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	NULL,	NULL),
(3,	10,	3,	NULL,	NULL),
(4,	5,	1,	NULL,	NULL),
(5,	6,	1,	NULL,	NULL),
(6,	7,	1,	NULL,	NULL),
(7,	8,	4,	NULL,	NULL),
(8,	9,	4,	NULL,	NULL),
(9,	1,	4,	NULL,	NULL),
(10,	11,	1,	NULL,	NULL),
(11,	7,	5,	NULL,	NULL),
(12,	12,	2,	NULL,	NULL),
(13,	13,	1,	NULL,	NULL),
(14,	14,	2,	NULL,	NULL),
(15,	15,	9,	NULL,	NULL),
(16,	16,	1,	NULL,	NULL),
(17,	17,	1,	NULL,	NULL),
(18,	18,	1,	NULL,	NULL),
(19,	18,	2,	NULL,	NULL),
(20,	19,	1,	NULL,	NULL),
(21,	19,	2,	NULL,	NULL),
(22,	20,	3,	NULL,	NULL),
(23,	20,	4,	NULL,	NULL);

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `members` (`id`, `restaurant_id`, `name`, `email`, `email_verified_at`, `password`, `birthday`, `phone`, `address`, `verification_code`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	0,	'高偉瀚',	'm1@gmail.com',	NULL,	'abcabc',	'1998-01-01',	'09-9999-9999',	'406太平區中山路一段319號',	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	0,	'白貫良',	'm2@gmail.com',	NULL,	'123456',	'1998-01-02',	'09-9999-9999',	'台中市太平區',	NULL,	NULL,	NULL,	NULL,	NULL),
(3,	0,	'曾郁閔',	'm3@gmail.com',	NULL,	'123456',	'1998-01-03',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL,	NULL,	NULL),
(5,	0,	'江珮妤',	'm4@gmail.com',	NULL,	'123456',	'1998-01-04',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL,	NULL,	NULL),
(6,	0,	'劉宜樺',	'm5@gmail.com',	NULL,	'123456',	'1998-01-05',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL,	NULL,	NULL),
(7,	3,	'黃婉綾',	'm6@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-06',	'09-9999-9999',	'台中',	'zVj619',	'eFEPIAqWEds:APA91bGzws8oUdNKny_3-5g6a27OecxPL_yH9tD_XAtDU9ZK4swmH7rOzGewULKvfCOchdPBgo5I-zxKfKO_8ceBqqRFbmKq23PbBLSncnJsysX2pMvQG59W5pdwatdCMr6YtvrKWfCv',	NULL,	NULL,	'2019-05-17 22:10:11'),
(8,	0,	'test',	'test@gmail.com',	NULL,	'$2y$10$uD9Z3LewvIarMC.Eyg7y1u90eGUKbv2qOhcJcqZvyLZFp/mSh4Uwm',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(9,	3,	'測試',	'm99@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-30',	'09-9999-9999',	'台中',	NULL,	'c2iYgkVfe64:APA91bFtWwEN8eqbzZA_OMv35npUCXknCo1ynC1FkJmUQFvqdeaQHDEFeaSM_7OchKTgInMRPifh6OqYNAO0rlN32k6VittNmTKrw_Tqmfwib4fcKo_np989vjNzlCdARG5X9jU3d3QT',	NULL,	NULL,	'2019-05-03 00:57:33'),
(10,	3,	'測試b',	'm999@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-30',	'09-9999-9999',	'台中',	NULL,	'c2iYgkVfe64:APA91bFtWwEN8eqbzZA_OMv35npUCXknCo1ynC1FkJmUQFvqdeaQHDEFeaSM_7OchKTgInMRPifh6OqYNAO0rlN32k6VittNmTKrw_Tqmfwib4fcKo_np989vjNzlCdARG5X9jU3d3QT',	NULL,	NULL,	'2019-05-03 00:57:33');

DROP TABLE IF EXISTS `member_coupons`;
CREATE TABLE `member_coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `UseTime` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coupon_id` (`coupon_id`),
  KEY `member_id` (`member_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `member_coupons_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  CONSTRAINT `member_coupons_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  CONSTRAINT `member_coupons_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `member_coupons` (`id`, `coupon_id`, `member_id`, `order_id`, `status`, `UseTime`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	2,	1,	'2019-01-17 15:01:44',	NULL,	NULL),
(2,	1,	2,	3,	1,	'2019-01-17 15:01:44',	NULL,	NULL),
(3,	2,	2,	4,	1,	'2019-01-17 15:01:44',	NULL,	NULL),
(4,	2,	7,	4,	1,	'2019-01-17 15:01:44',	NULL,	NULL),
(5,	6,	7,	4,	1,	'2019-01-17 15:01:44',	NULL,	NULL),
(23,	5,	7,	NULL,	0,	NULL,	'2019-05-04 00:24:04',	'2019-05-04 00:24:04'),
(24,	5,	9,	NULL,	0,	NULL,	'2019-05-04 00:24:04',	'2019-05-04 00:24:04'),
(25,	5,	10,	NULL,	0,	NULL,	'2019-05-04 00:24:04',	'2019-05-04 00:24:04'),
(26,	5,	7,	NULL,	0,	NULL,	'2019-05-04 00:29:01',	'2019-05-04 00:29:01'),
(27,	5,	9,	NULL,	0,	NULL,	'2019-05-04 00:29:01',	'2019-05-04 00:29:01'),
(28,	5,	10,	NULL,	0,	NULL,	'2019-05-04 00:29:01',	'2019-05-04 00:29:01');

DROP TABLE IF EXISTS `member_restaurants`;
CREATE TABLE `member_restaurants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2018_12_14_014501_create_admins_table',	1),
(4,	'2018_12_14_014653_create_restaurants_table',	1),
(5,	'2018_12_14_014717_create_staff_table',	1),
(6,	'2018_12_14_014737_create_coupons_table',	1),
(7,	'2018_12_14_014815_create_posts_table',	1),
(9,	'2018_12_14_014857_create_keywords_table',	1),
(11,	'2018_12_14_015050_create_details_table',	1),
(12,	'2019_01_17_024307_create_coupons_statuses_table',	1),
(13,	'2019_01_17_025120_create_meal_keywords_table',	1),
(14,	'2019_01_28_172121_create_orders_table',	1),
(15,	'2019_01_28_172635_create_tables_table',	1),
(16,	'2018_12_14_014838_create_meals_table',	2),
(17,	'2019_02_20_174200_create_meal_types_table',	2),
(20,	'2014_10_12_000000_create_users_table',	3),
(21,	'2018_12_14_014957_create_customers_table',	3),
(22,	'2019_03_18_092411_create_order_tables_table',	4);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `number` int(10) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `PayType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `restaurant_id`, `customer_id`, `number`, `StartTime`, `EndTime`, `total`, `PayType`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	0,	'2018-12-25 00:00:00',	NULL,	3000,	'現金',	NULL,	NULL),
(2,	1,	2,	0,	'2019-01-25 00:00:00',	NULL,	3000,	'現金',	NULL,	NULL),
(3,	1,	1,	0,	'0209-01-17 00:00:00',	NULL,	3000,	'現金',	NULL,	NULL),
(4,	1,	1,	0,	'0209-01-17 00:00:00',	NULL,	200,	'現金',	NULL,	NULL),
(5,	2,	2,	0,	'0209-01-17 00:00:00',	NULL,	390,	'現金',	NULL,	NULL),
(6,	2,	2,	0,	'0209-01-17 00:00:00',	NULL,	390,	'現金',	NULL,	NULL),
(7,	3,	5,	0,	'2019-02-21 02:49:04',	NULL,	5000,	'現金',	'2019-02-20 18:49:04',	'2019-02-20 18:49:04'),
(24,	3,	29,	1,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 07:38:01',	'2019-03-19 07:38:01'),
(25,	3,	30,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 07:40:30',	'2019-03-19 07:40:30'),
(26,	3,	31,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 08:01:18',	'2019-03-19 08:01:18'),
(27,	3,	32,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 08:03:53',	'2019-03-19 08:03:53'),
(28,	3,	33,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:10:48',	'2019-03-19 09:10:48'),
(29,	3,	34,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:11:36',	'2019-03-19 09:11:36'),
(30,	3,	35,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:11:55',	'2019-03-19 09:11:55'),
(31,	3,	36,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:12:00',	'2019-03-19 09:12:00'),
(32,	3,	37,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:13:22',	'2019-03-19 09:13:22'),
(33,	3,	38,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:13:59',	'2019-03-19 09:13:59'),
(34,	3,	39,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:14:32',	'2019-03-19 09:14:32'),
(35,	3,	40,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:14:43',	'2019-03-19 09:14:43'),
(36,	3,	41,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:15:22',	'2019-03-19 09:15:22'),
(37,	3,	42,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:17:17',	'2019-03-19 09:17:17'),
(38,	3,	43,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:17:29',	'2019-03-19 09:17:29'),
(39,	3,	44,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:18:03',	'2019-03-19 09:18:03'),
(40,	3,	45,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-19 09:19:13',	'2019-03-19 09:19:13'),
(41,	3,	46,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 05:15:56',	'2019-03-20 05:15:56'),
(42,	3,	47,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 05:16:51',	'2019-03-20 05:16:51'),
(43,	3,	48,	6,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 12:35:04',	'2019-03-20 12:35:04'),
(44,	3,	49,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 12:48:57',	'2019-03-20 12:48:57'),
(45,	3,	50,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 12:50:12',	'2019-03-20 12:50:12'),
(46,	3,	51,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 12:56:00',	'2019-03-20 12:56:00'),
(47,	3,	52,	4,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 12:56:20',	'2019-03-20 12:56:20'),
(48,	3,	53,	8,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 12:58:40',	'2019-03-20 12:58:40'),
(49,	3,	54,	8,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 13:01:17',	'2019-03-20 13:01:17'),
(50,	3,	55,	3,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 13:03:04',	'2019-03-20 13:03:04'),
(51,	3,	56,	3,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 13:04:14',	'2019-03-20 13:04:14'),
(52,	3,	57,	3,	NULL,	NULL,	NULL,	NULL,	'2019-03-20 13:06:33',	'2019-03-20 13:06:33'),
(53,	3,	58,	4,	'2019-05-01 01:12:16',	NULL,	2000,	NULL,	'2019-03-20 13:06:33',	'2019-03-20 13:06:33'),
(54,	3,	59,	4,	'2019-05-01 01:57:36',	NULL,	3000,	NULL,	'2019-03-20 13:06:33',	'2019-03-20 13:06:33'),
(55,	3,	60,	4,	NULL,	NULL,	NULL,	NULL,	'2019-05-13 02:56:05',	'2019-05-13 02:56:05'),
(56,	3,	61,	5,	NULL,	NULL,	NULL,	NULL,	'2019-05-13 03:07:32',	'2019-05-13 03:07:32'),
(57,	3,	62,	5,	NULL,	NULL,	NULL,	NULL,	'2019-05-13 03:09:46',	'2019-05-13 03:09:46'),
(58,	3,	63,	1,	NULL,	NULL,	NULL,	NULL,	'2019-05-13 05:13:48',	'2019-05-13 05:13:48');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `restaurant_id`, `title`, `content`, `DateTime`, `created_at`, `updated_at`) VALUES
(1,	1,	'1/17公休至1/19',	'付不出薪資，公休三天啦',	'2019-01-19 14:51:13',	NULL,	NULL),
(2,	1,	'1/19公休至1/20',	'因虧損嚴重，本次公休後，預計不再繼續營業，謝謝大家。',	'2019-01-20 14:51:00',	NULL,	NULL),
(3,	2,	'高壓電檢測',	'即日起店內將進行高壓電設備之檢測，預計5/30完工，屆時將重新開幕，敬請見諒。',	'2019-01-29 14:51:00',	NULL,	NULL),
(4,	3,	'本店將自1/30開幕',	'本店將自1/30開幕，當日來店民眾將獲帳單8折優惠，歡迎攜家帶眷蒞臨，謝謝。',	'2019-01-29 14:51:00',	NULL,	NULL);

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open` tinyint(4) NOT NULL DEFAULT '0',
  `OpenHour` time DEFAULT NULL,
  `EndHour` time DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `restaurants` (`id`, `name`, `logo`, `phone`, `address`, `open`, `OpenHour`, `EndHour`, `category`, `token`, `token2`, `created_at`, `updated_at`) VALUES
(1,	'王品',	'1553324558.jpg',	'09-9999-9999',	'406台中市太平區中山路一段220號',	1,	'00:00:00',	'00:00:00',	'精緻系',	NULL,	NULL,	'2019-01-16 20:15:24',	'2019-05-12 01:16:10'),
(2,	'夏慕尼',	'1553322825.jpg',	'04-2276-5198',	'411台中市太平區中山路三段21號',	0,	'00:00:00',	'00:00:00',	'精緻系',	NULL,	NULL,	NULL,	NULL),
(3,	'西堤牛排',	'1552986617.jpg',	'04-2247-3922',	'406台中市北屯區文心路四段695號',	0,	'00:00:00',	'00:00:00',	'平價系',	'cg3cge-0YuY:APA91bGx1HDiA7QeEj6vRjE7crwdKSOMclXt3RTogR7o_4oxBERrq92o0rRLTBDCz17b7hdLduAM3tuUkBcPUN47vH6DJI2jDRq1ecIuaEPlCThGyQAcflaLSDwN3cXhlRr7BupYezpD',	NULL,	NULL,	'2019-05-03 23:12:40');

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_email_unique` (`email`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `staffs` (`id`, `restaurant_id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `position`, `remember_token`, `open`, `created_at`, `updated_at`) VALUES
(1,	1,	'萬宜旻',	'1@gmail.com',	NULL,	'$2y$10$uD9Z3LewvIarMC.Eyg7y1u90eGUKbv2qOhcJcqZvyLZFp/mSh4Uwm',	'09-9999-9989',	'406台中市太平區中山路一段1號',	'主廚',	'iMLxxHcRbZTTS0PXGh616EustzBFQveRt5i96CbcQZX9qv3n2tzmJPxyrh26',	0,	NULL,	'2019-01-29 16:04:13'),
(2,	1,	'許銘耀',	'2@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段2號',	'櫃台',	NULL,	0,	NULL,	NULL),
(3,	1,	'黃宣毓',	'3@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段3號',	'櫃台',	'yYLjjMqMBi64kkwiSbItJOqV4bCbNWlQxCDLEShuCnxnqkJE3XH0V0fxA6Kt',	0,	NULL,	NULL),
(4,	1,	'許名毅',	'4@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段4號',	'櫃台',	NULL,	0,	NULL,	NULL),
(5,	1,	'林建勳',	'5@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段5號',	'經理',	'VTD4TpLBnfvnUR3ATCg4ocQI2aLHhEGRBCZkJq3StPIFYbwgtiqrI3pju1BZ',	0,	NULL,	NULL),
(6,	2,	'陳思羽',	'6@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段6號',	'主廚',	'1BXiipPDBinNncY3pDKUX1LXV7AmivqQXNep2aBplUszdVKiQP0kM8a3Kfjc',	0,	NULL,	NULL),
(7,	2,	'顏以晴',	'7@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段7號',	'經理',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	0,	NULL,	NULL),
(8,	2,	'黃清愿',	'8@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段8號',	'櫃台',	'LVBivKbOfxJa3fq7dfDc4z0BW5aqhdDCRZzAe60ISo663YxWcsdPO1hR4liz',	0,	NULL,	NULL),
(9,	2,	'徐偉淳',	'11@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段11號',	'主廚',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	0,	NULL,	NULL),
(10,	2,	'黃子嘉',	'12@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段12號',	'櫃台',	'9CFMxEL2ImAnX0veFj9NPud5h9Au0VIdiCyZir6672pGZlVCK4ETaZbeRxZD',	0,	NULL,	NULL),
(11,	3,	'劉凰蓮',	'13@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段13號',	'櫃台',	'J7EY7LfcXOoetSNdcxryW8CuZjwy1VVd60cdrKVWPzZwKtRaF5JX3liiaBpd',	0,	NULL,	NULL),
(12,	3,	'何發棋',	'14@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段14號',	'櫃台',	'XSvwz3hgSZqUJDhWAOQYugg9OwZUavz3I3YW2EDrL3JTerCG6yY1CNOsFrQc',	0,	NULL,	NULL),
(13,	3,	'劉彩羽',	'16@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段16號',	'主廚',	'NyZhl5HWeQKl80BnOHQKhhhNVoJ1v7sGe2LIL4UsEYPNILLkdUCaIkzBpqQ2',	0,	NULL,	NULL),
(14,	3,	'蕭晴晶',	'18@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段18號',	'主廚',	'laNLUAJPcrDjIuNGt3LUfWS3LMO3z7ZS7bSKS0v7uk0Ufp4dLa2x6vW7pyeN',	1,	NULL,	'2019-04-13 02:06:31'),
(15,	3,	'郭家維',	'19@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段19號',	'經理',	'XymiVPzbH0aKwforhrPeBvlGCE91lCsQRaEgBesp4paeKq9qgp66dMNEe1Iw',	0,	NULL,	NULL);

DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `row` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tables` (`id`, `restaurant_id`, `number`, `status`, `row`, `col`, `people`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'點餐中',	1,	1,	0,	'2019-01-28 22:21:52',	'2019-03-18 00:43:35'),
(2,	1,	2,	'0',	1,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(3,	1,	3,	'0',	1,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(4,	1,	4,	'0',	1,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(5,	1,	5,	'0',	1,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(6,	1,	6,	'0',	1,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(7,	1,	7,	'0',	1,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(8,	1,	8,	'0',	1,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(9,	1,	9,	'0',	1,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(10,	1,	10,	'0',	1,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(11,	1,	11,	'0',	2,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(12,	1,	12,	'0',	2,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(13,	1,	13,	'0',	2,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(14,	1,	14,	'0',	2,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(15,	1,	15,	'0',	2,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(16,	1,	16,	'0',	2,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(17,	1,	17,	'0',	2,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(18,	1,	18,	'0',	2,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(19,	1,	19,	'0',	2,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(20,	1,	20,	'0',	2,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(21,	1,	21,	'0',	3,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(22,	1,	22,	'0',	3,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(23,	1,	23,	'0',	3,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(24,	1,	24,	'0',	3,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(25,	1,	25,	'0',	3,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(26,	1,	26,	'0',	3,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(27,	1,	27,	'0',	3,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(28,	1,	28,	'0',	3,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(29,	1,	29,	'0',	3,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(30,	1,	30,	'0',	3,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(31,	1,	31,	'0',	4,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(32,	1,	32,	'0',	4,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(33,	1,	33,	'0',	4,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(34,	1,	34,	'0',	4,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(35,	1,	35,	'0',	4,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(36,	1,	36,	'0',	4,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(37,	1,	37,	'0',	4,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(38,	1,	38,	'0',	4,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(39,	1,	39,	'0',	4,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(40,	1,	40,	'0',	4,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(41,	1,	41,	'0',	5,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(42,	1,	42,	'0',	5,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(43,	1,	43,	'0',	5,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(44,	1,	44,	'0',	5,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(45,	1,	45,	'0',	5,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(46,	1,	46,	'0',	5,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(47,	1,	47,	'0',	5,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(48,	1,	48,	'0',	5,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(49,	1,	49,	'0',	5,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(50,	1,	50,	'0',	5,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(51,	2,	1,	'0',	1,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(52,	2,	2,	'0',	1,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(53,	2,	3,	'0',	1,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(54,	2,	4,	'0',	1,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(55,	2,	5,	'0',	1,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(56,	2,	6,	'0',	1,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(57,	2,	7,	'0',	1,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(58,	2,	8,	'0',	1,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(59,	2,	9,	'0',	1,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(60,	2,	10,	'0',	1,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(61,	2,	11,	'0',	2,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(62,	2,	12,	'0',	2,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(63,	2,	13,	'0',	2,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(64,	2,	14,	'0',	2,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(65,	2,	15,	'0',	2,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(66,	2,	16,	'0',	2,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(67,	2,	17,	'0',	2,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(68,	2,	18,	'0',	2,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(69,	2,	19,	'0',	2,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(70,	2,	20,	'0',	2,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(71,	2,	21,	'0',	3,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(72,	2,	22,	'0',	3,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(73,	2,	23,	'0',	3,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(74,	2,	24,	'0',	3,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(75,	2,	25,	'0',	3,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(76,	2,	26,	'0',	3,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(77,	2,	27,	'0',	3,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(78,	2,	28,	'0',	3,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(79,	2,	29,	'0',	3,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(80,	2,	30,	'0',	3,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(81,	2,	31,	'0',	4,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(82,	2,	32,	'0',	4,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(83,	2,	33,	'0',	4,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(84,	2,	34,	'0',	4,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(85,	2,	35,	'0',	4,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(86,	2,	36,	'0',	4,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(87,	2,	37,	'0',	4,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(88,	2,	38,	'0',	4,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(89,	2,	39,	'0',	4,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(90,	2,	40,	'0',	4,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(91,	2,	41,	'0',	5,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(92,	2,	42,	'0',	5,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(93,	2,	43,	'0',	5,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(94,	2,	44,	'0',	5,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(95,	2,	45,	'0',	5,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(96,	2,	46,	'0',	5,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(97,	2,	47,	'0',	5,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(98,	2,	48,	'0',	5,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(99,	2,	49,	'0',	5,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(100,	2,	50,	'0',	5,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(101,	3,	1,	'點餐中',	1,	1,	0,	'2019-01-28 22:21:52',	'2019-03-19 07:38:01'),
(102,	3,	2,	'等餐中',	1,	2,	0,	'2019-01-28 22:21:52',	'2019-05-13 03:13:31'),
(103,	3,	3,	'等餐中',	1,	3,	0,	'2019-01-28 22:21:52',	'2019-05-13 02:59:28'),
(104,	3,	4,	'等餐中',	1,	4,	0,	'2019-01-28 22:21:52',	'2019-05-13 20:08:30'),
(105,	3,	5,	'清理中',	1,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(106,	3,	6,	'點餐中',	1,	6,	0,	'2019-01-28 22:21:52',	'2019-03-18 02:38:56'),
(107,	3,	7,	'點餐中',	1,	7,	0,	'2019-01-28 22:21:52',	'2019-03-18 02:38:56'),
(108,	3,	8,	'點餐中',	1,	8,	0,	'2019-01-28 22:21:52',	'2019-03-20 12:58:40'),
(109,	3,	9,	'點餐中',	1,	9,	0,	'2019-01-28 22:21:52',	'2019-03-19 09:13:22'),
(110,	3,	10,	'點餐中',	1,	10,	0,	'2019-01-28 22:21:52',	'2019-03-20 05:15:56'),
(111,	3,	11,	'點餐中',	2,	1,	0,	'2019-01-28 22:21:52',	'2019-03-18 02:18:13'),
(115,	3,	15,	'點餐中',	2,	5,	0,	'2019-01-28 22:21:52',	'2019-03-20 12:35:04'),
(116,	3,	16,	'點餐中',	2,	6,	0,	'2019-01-28 22:21:52',	'2019-03-19 01:33:41'),
(120,	3,	20,	'結帳中',	2,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(121,	3,	21,	'點餐中',	3,	1,	0,	'2019-01-28 22:21:52',	'2019-03-18 02:18:13'),
(125,	3,	25,	'點餐中',	3,	5,	0,	'2019-01-28 22:21:52',	'2019-03-20 12:48:57'),
(126,	3,	26,	'點餐中',	3,	6,	0,	'2019-01-28 22:21:52',	'2019-03-19 01:32:30'),
(130,	3,	30,	'點餐中',	3,	10,	0,	'2019-01-28 22:21:52',	'2019-03-19 01:32:30'),
(131,	3,	31,	'空閒中',	4,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(135,	3,	35,	'等餐中',	4,	5,	0,	'2019-01-28 22:21:52',	'2019-05-13 05:20:09'),
(136,	3,	36,	'用餐中',	4,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(140,	3,	40,	'點餐中',	4,	10,	0,	'2019-01-28 22:21:52',	'2019-03-19 01:32:30'),
(141,	3,	41,	'清理中',	5,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(142,	3,	42,	'點餐中',	5,	2,	0,	'2019-01-28 22:21:52',	'2019-03-19 01:43:40'),
(143,	3,	43,	'用餐中',	5,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(144,	3,	44,	'結帳中',	5,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(145,	3,	45,	'點餐中',	5,	5,	0,	'2019-01-28 22:21:52',	'2019-03-20 13:03:04'),
(146,	3,	46,	'點餐中',	5,	6,	0,	'2019-01-28 22:21:52',	'2019-03-19 01:28:57'),
(147,	3,	47,	'點餐中',	5,	7,	0,	'2019-01-28 22:21:52',	'2019-03-19 07:40:30'),
(148,	3,	48,	'點餐中',	5,	8,	0,	'2019-01-28 22:21:52',	'2019-03-19 09:10:48'),
(149,	3,	49,	'點餐中',	5,	9,	0,	'2019-01-28 22:21:52',	'2019-03-19 08:01:18'),
(150,	3,	50,	'點餐中',	5,	10,	0,	'2019-01-28 22:21:52',	'2019-03-19 01:28:57');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2019-05-18 06:50:59
