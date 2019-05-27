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
(1,	'陳姿婷',	'coco214034@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'WaWqvNm2rAnRNNGkvnbGdSaTS3GTWshyKv4wzWfrO9V9siI0Xfr5Gsxp2UWl',	'2019-01-16 12:10:55',	NULL),
(2,	'張宏瑋',	'',	NULL,	'',	NULL,	'2019-01-16 12:10:48',	NULL),
(3,	'鄭一緯',	'',	NULL,	'',	NULL,	'2019-01-16 12:11:23',	NULL),
(4,	'陳冠宇',	'',	NULL,	'',	NULL,	'2019-01-16 12:11:43',	NULL);

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
(1,	1,	'屬於你的75折',	'本券限週ㄧ至週五平日使用，週六、週日、國定假日及彈性放假日不得使用。\r\n\r\n同桌套餐享75折：王品牛排、西堤牛排、夏慕尼、陶板屋、原燒、聚、藝奇、品田牧場、舒果、hot 7\r\n同桌贈主廚私房菜乙份：石二鍋、ita義塔、酷必、麻佬大、乍牛\r\n午市頭等餐、經典家宴享75折：甫田\r\n飲品買一送一：沐越\r\n同桌主廚招待牛培根一份：青花驕',	'100',	'王品集團coupon 1028.jpg',	'1000',	1,	'2019-01-17 14:53:10',	'2019-01-20 14:53:10',	NULL,	NULL),
(2,	1,	'生日禮 Happy Birthday',	'提供壽星會員生日優惠驚喜，讓每一年的生日都有王品\r\n\r\n壽星會員 登入官網  即可列印「9折兌換券」，持券至全台門市消費套餐即享優惠。ex：生日是5月5日，可列印時段則為4/21~5/31，當月生日前1個月的21號可列印。',	'100',	'2016最新正確版(1).jpg',	'1000',	0,	'2019-01-17 14:53:10',	'2019-01-20 14:53:10',	NULL,	NULL),
(3,	1,	'95折優惠券',	'可以折95折優惠',	'100',	'1904_mother.jpg',	'1000',	0,	'2019-01-17 00:00:00',	'2019-01-29 14:53:10',	NULL,	NULL),
(4,	3,	'滿1000抵100',	'消費總金額達1000折100',	'100',	'1904_mother.jpg',	'1000',	0,	'2019-03-26 12:00:00',	'2019-03-31 12:00:00',	NULL,	NULL),
(5,	3,	'贈送胖子一隻',	'無價',	'0',	'1555345456.jpg',	'999999',	0,	'2019-05-20 01:00:00',	'2019-05-25 12:59:00',	'2019-04-18 17:25:36',	'2019-04-18 17:25:36'),
(6,	3,	'test',	'test',	'100',	'1904_mother.jpg',	'1000',	1,	'2019-05-01 00:00:07',	'2019-05-01 00:00:07',	NULL,	NULL);

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
(1,	1,	0,	'0',	'2019-03-11 03:45:37',	NULL),
(2,	1,	0,	'0',	'2019-03-11 03:45:42',	NULL),
(3,	2,	0,	'0',	'2019-03-11 03:45:48',	NULL),
(4,	2,	0,	'0',	'2019-03-11 03:45:52',	NULL),
(5,	3,	0,	'0',	'2019-03-11 03:45:56',	NULL),
(6,	2,	0,	'0',	'2019-03-11 03:46:00',	NULL),
(7,	2,	0,	'0',	'2019-03-11 03:46:04',	NULL),
(29,	3,	0,	NULL,	'2019-03-18 23:38:01',	'2019-03-18 23:38:01'),
(30,	3,	0,	NULL,	'2019-03-18 23:40:30',	'2019-03-18 23:40:30'),
(31,	3,	0,	NULL,	'2019-03-19 00:01:18',	'2019-03-19 00:01:18'),
(32,	3,	0,	'En3Is6YfOzZ8kZv3zqNuWmq4C3Lfw0',	'2019-03-19 00:03:53',	'2019-03-19 00:03:53'),
(33,	3,	0,	'HEwfn9GIpWP4795q9c6J7twsLvdM6h',	'2019-03-19 01:10:48',	'2019-03-19 01:10:48'),
(34,	3,	0,	'5T68484xhCrN0oaq0T3n3prP7k745u',	'2019-03-19 01:11:36',	'2019-03-19 01:11:36'),
(35,	3,	0,	'r51U7bYi3YeJPT704s9MkTPyp8pGxj',	'2019-03-19 01:11:55',	'2019-03-19 01:11:55'),
(36,	3,	0,	'460kU17dRa8aCkl1zB27tL5j1tIH8S',	'2019-03-19 01:12:00',	'2019-03-19 01:12:00'),
(37,	3,	0,	'vz1N9bhRjzje5nj0URHgLySrH4ae5z',	'2019-03-19 01:13:22',	'2019-03-19 01:13:22'),
(38,	3,	0,	'QMMlG0pLoSQ1WRtnoxdK1Gcn3ioH83',	'2019-03-19 01:13:59',	'2019-03-19 01:13:59'),
(39,	3,	0,	'E01QwgyAEvm8O7W5yjOw2MDXvk385O',	'2019-03-19 01:14:32',	'2019-03-19 01:14:32'),
(40,	3,	0,	'l6z4y3b52Oyi6RxCx8m0gokO48W693',	'2019-03-19 01:14:43',	'2019-03-19 01:14:43'),
(41,	3,	0,	'mi567f9zDQ7c6c9hmzk6VQ8UgrbWb9',	'2019-03-19 01:15:22',	'2019-03-19 01:15:22'),
(42,	3,	0,	'isXT508lmK51p10PZnWLkwY2NFs7W9',	'2019-03-19 01:17:17',	'2019-03-19 01:17:17'),
(43,	3,	0,	'n7qu5G4b6Cnas88lbde68M7WuF8k4W',	'2019-03-19 01:17:29',	'2019-03-19 01:17:29'),
(44,	3,	0,	'Lmv3vF698ds69lElP9WQi695dhtv11',	'2019-03-19 01:18:03',	'2019-03-19 01:18:03'),
(45,	3,	0,	'I4G2276C907755DUfSAtu8u9Xt87H4',	'2019-03-19 01:19:13',	'2019-03-19 01:19:13'),
(46,	3,	0,	'2h28A7240Mctnpznqm0Yu5QQFj38Fe',	'2019-03-19 21:15:56',	'2019-03-19 21:15:56'),
(47,	3,	0,	'yhDbAI3aF2gu3h0sMYOVFPRnA7P1QD',	'2019-03-19 21:16:51',	'2019-03-19 21:16:51'),
(48,	3,	0,	'3uVNLtjUmrb0AeE6HbVQ25NToi05BD',	'2019-03-20 04:35:04',	'2019-03-20 04:35:04'),
(49,	3,	0,	'5ZVvNXz5KQXJXBM19czvQui81DT7lr',	'2019-03-20 04:48:57',	'2019-03-20 04:48:57'),
(50,	3,	0,	'946qvd4C2z2K41e974hnSD0cVIxlY7',	'2019-03-20 04:50:12',	'2019-03-20 04:50:12'),
(51,	3,	0,	'G4jlIGsPNJS1V5S10740sxupbb93H3',	'2019-03-20 04:56:00',	'2019-03-20 04:56:00'),
(52,	3,	0,	'E68ybrHh29ZKNCU08AYi1iSFr0mAce',	'2019-03-20 04:56:20',	'2019-03-20 04:56:20'),
(53,	3,	0,	'kYt3mp3g4ubhXlIN0dq5jOIMy9yTTK',	'2019-03-20 04:58:40',	'2019-03-20 04:58:40'),
(54,	3,	0,	'Qm1UjvV7Au9jsv904793Vd5nnCB7h2',	'2019-03-20 05:01:17',	'2019-03-20 05:01:17'),
(55,	3,	0,	'CpXSL6usP0KjqHDy8UvgeDJ2tn6Gnu',	'2019-03-20 05:03:04',	'2019-03-20 05:03:04'),
(56,	3,	0,	't4N92OgNyk0buVL4DU6TiQBF94Rt4y',	'2019-03-20 05:04:14',	'2019-03-20 05:04:14'),
(57,	3,	0,	'SmW3tnoRSME57x1FX7bZbZkj1Z4TH5',	'2019-03-20 05:06:33',	'2019-03-20 05:06:33'),
(58,	3,	7,	'SmW3tnoRSME57x1FX7bZbZkj1Z4TH5',	'2019-03-20 05:06:33',	'2019-03-20 05:06:33'),
(59,	3,	7,	'SmW3tnoRSME57x1FX7bZbZkj1Z4TH5',	'2019-03-20 05:06:33',	'2019-03-20 05:06:33'),
(60,	3,	NULL,	'du9K4Cas0q0P704qkxCZN897a99P2N',	'2019-05-12 18:56:05',	'2019-05-12 18:56:05'),
(61,	3,	NULL,	'4938d7yT6UB9ZHt6i1mbfa0510ndWR',	'2019-05-12 19:07:32',	'2019-05-12 19:07:32'),
(62,	3,	NULL,	'5WqGOU5Z6Ok6CHw0O9Vyk1N5e0nlHJ',	'2019-05-12 19:09:46',	'2019-05-12 19:09:46'),
(63,	3,	NULL,	'MEiWmqD0f9ZA6qH7h934T3X7DojOke',	'2019-05-12 21:13:48',	'2019-05-12 21:13:48'),
(64,	3,	NULL,	'I854xIk4fDfS4Pmwc3hMny2J18xwFi',	'2019-05-27 10:58:13',	'2019-05-27 10:58:13'),
(65,	3,	NULL,	'EFuY9jzOWHwnUe3om7eTJwdVQlE4gq',	'2019-05-27 10:59:01',	'2019-05-27 10:59:01'),
(66,	3,	7,	'EFuY9jzOWHwnUe3om7eTJwdVQlE4gq',	'2019-05-27 10:59:01',	'2019-05-27 10:59:01');

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
(54,	55,	103,	'2019-05-12 18:56:05',	'2019-05-12 18:56:05'),
(55,	56,	102,	'2019-05-12 19:07:32',	'2019-05-12 19:07:32'),
(56,	57,	102,	'2019-05-12 19:09:46',	'2019-05-12 19:09:46'),
(57,	58,	135,	'2019-05-12 21:13:48',	'2019-05-12 21:13:48'),
(58,	59,	115,	'2019-05-27 10:58:13',	'2019-05-27 10:58:13'),
(59,	60,	116,	'2019-05-27 10:59:01',	'2019-05-27 10:59:01'),
(60,	61,	142,	NULL,	NULL);

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
(33,	55,	9,	1,	1,	'2019-05-13 02:58:11',	'2019-05-12 18:58:11',	'2019-05-12 18:58:11'),
(34,	55,	5,	1,	1,	'2019-05-13 02:58:13',	'2019-05-12 18:58:13',	'2019-05-12 18:58:13'),
(35,	55,	13,	1,	1,	'2019-05-13 02:58:18',	'2019-05-12 18:58:18',	'2019-05-12 18:58:18'),
(36,	55,	27,	1,	1,	'2019-05-13 02:58:18',	'2019-05-12 18:58:18',	'2019-05-12 18:58:18'),
(37,	55,	5,	1,	1,	'2019-05-13 02:58:22',	'2019-05-12 18:58:22',	'2019-05-12 18:58:22'),
(38,	55,	7,	1,	1,	'2019-05-13 02:58:30',	'2019-05-12 18:58:30',	'2019-05-12 18:58:30'),
(39,	55,	5,	1,	1,	'2019-05-13 02:58:33',	'2019-05-12 18:58:33',	'2019-05-12 18:58:33'),
(40,	55,	12,	1,	1,	'2019-05-13 02:58:34',	'2019-05-12 18:58:34',	'2019-05-12 18:58:34'),
(41,	55,	15,	1,	1,	'2019-05-13 02:58:34',	'2019-05-12 18:58:34',	'2019-05-12 18:58:34'),
(42,	55,	26,	1,	1,	'2019-05-13 02:58:36',	'2019-05-12 18:58:36',	'2019-05-12 18:58:36'),
(43,	55,	25,	1,	1,	'2019-05-13 02:58:40',	'2019-05-12 18:58:40',	'2019-05-12 18:58:40'),
(44,	55,	7,	1,	1,	'2019-05-13 02:58:50',	'2019-05-12 18:58:50',	'2019-05-12 18:58:50'),
(45,	55,	1,	1,	1,	'2019-05-13 02:59:10',	'2019-05-12 18:59:10',	'2019-05-12 18:59:10'),
(46,	55,	15,	1,	1,	'2019-05-13 02:59:14',	'2019-05-12 18:59:14',	'2019-05-12 18:59:14'),
(47,	55,	12,	1,	1,	'2019-05-13 02:59:18',	'2019-05-12 18:59:18',	'2019-05-12 18:59:18'),
(48,	55,	21,	1,	1,	'2019-05-13 02:59:19',	'2019-05-12 18:59:19',	'2019-05-12 18:59:19'),
(49,	55,	27,	1,	1,	'2019-05-13 03:00:59',	'2019-05-12 19:00:59',	'2019-05-12 19:00:59'),
(50,	55,	1,	1,	1,	'2019-05-13 03:02:31',	'2019-05-12 19:02:31',	'2019-05-12 19:02:31'),
(54,	57,	1,	1,	1,	'2019-05-13 03:10:36',	'2019-05-12 19:10:36',	'2019-05-12 19:10:36'),
(56,	57,	4,	1,	1,	'2019-05-13 03:10:39',	'2019-05-12 19:10:39',	'2019-05-12 19:10:39'),
(58,	57,	5,	1,	1,	'2019-05-13 03:51:52',	'2019-05-12 19:51:52',	'2019-05-12 19:51:52'),
(59,	57,	4,	1,	1,	'2019-05-13 03:51:53',	'2019-05-12 19:51:53',	'2019-05-12 19:51:53'),
(63,	58,	5,	1,	2,	'2019-05-13 05:19:30',	'2019-05-12 21:19:30',	'2019-05-27 12:34:19'),
(64,	58,	14,	1,	1,	'2019-05-13 05:19:55',	'2019-05-12 21:19:55',	'2019-05-12 21:19:55'),
(66,	27,	2,	1,	1,	'2019-05-14 04:09:20',	'2019-05-13 12:09:20',	'2019-05-13 12:09:20'),
(69,	61,	2,	1,	2,	'2019-05-14 04:09:20',	'2019-05-13 12:09:20',	'2019-05-27 12:29:33');

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
(1,	3,	1,	'原塊牛排',	'1556486841.jpg',	'選用板腱部位，熟度可依個人喜好做選擇，建議7~8分為最佳熟度，肉的表面吃起來有碳烤的味道，加上海鹽，味道更上一層樓',	360,	NULL,	'2019-04-28 05:27:21'),
(2,	3,	1,	'牽拖起司牛排',	'1555345348.jpg',	'牛排搭配切達醬並灑上滿滿的馬札瑞拉濃郁起司。',	360,	NULL,	'2019-04-15 00:22:28'),
(3,	3,	1,	'蒜香奶油肩胛菲力',	'1555345254.jpg',	'蒜頭的點綴增加了風味，奶油則是讓整體多了點香氣，肉質有嚼勁、不老，帶點juicy肉汁，份量也比原塊牛排來得多一點點',	360,	NULL,	'2019-04-15 00:20:54'),
(4,	3,	1,	'德國豬腳',	'1555345401.jpg',	'豬腳皮烤得酥脆，入口咀嚼淡淡的肉香四溢，豬皮QQ保有嚼勁，瘦肉、肥肉比例恰恰好。搭配配菜和芥末醬，迸出新滋味。',	360,	NULL,	'2019-04-15 00:23:21'),
(5,	3,	1,	'啾C烤雞',	'1555345429.jpg',	'2支帶骨雞腿排，皮酥、肉質很嫩，咬下肉汁四溢，卻毫不油膩',	360,	NULL,	'2019-04-15 00:23:49'),
(6,	3,	1,	'海陸雙拼(雞腿+魚排)',	'1555345441.jpg',	'雞腿排上灑上墨西哥辣椒粉，很提味，幫平凡無奇的雞腿排增添杜曾有過的風味。\r\n比目魚魚排，口感鮮嫩多汁。',	360,	NULL,	'2019-04-15 00:24:01'),
(7,	3,	1,	'海陸雙拼(牛排+魚排)',	'1555345797.jpg',	'雞腿排上灑上墨西哥辣椒粉，很提味，幫平凡無奇的雞腿排增添杜曾有過的風味。\r\n比目魚魚排，口感鮮嫩多汁。',	360,	NULL,	'2019-04-15 00:29:57'),
(8,	3,	1,	'香煎鴨胸佐櫻桃紅酒醬',	'1555345824.jpg',	'不帶骨的鴨胸肉部位，還有鴨腿排，一定可以嚐到兩種部位的滋味。',	360,	NULL,	'2019-04-15 00:30:24'),
(9,	3,	1,	'時蔬厚切燉牛排',	'1555345835.jpg',	'牛排多汁又鮮嫩。',	360,	NULL,	'2019-04-15 00:30:35'),
(10,	3,	2,	'優格鮮蝦時蔬',	'1555345942.jpg',	'清爽的鮮蝦搭上帆立貝、番茄、小黃瓜、甜豆，旁邊是咖哩優格醬，滿特別的醬料搭配',	50,	NULL,	'2019-04-15 00:32:22'),
(11,	3,	3,	'洋芋沙拉',	'1555345979.jpg',	'馬鈴薯拌沙拉醬組成的主體，搭配爆爆球，裡面包有果汁，草莓口味/奇異果口味，口感上有如甜的鮭魚卵。',	80,	NULL,	'2019-04-15 00:32:59'),
(12,	3,	3,	'時令水果',	'1555346041.jpg',	'時令的水果，這次碰上的是蘋果、西瓜、哈蜜瓜、香瓜，旁邊是香芒優格醬，可以搭配一起食用。',	80,	NULL,	'2019-04-15 00:34:01'),
(13,	3,	3,	'綜合生菜沙拉',	'1555344938.jpg',	'蘿美生菜、紫萵苣、美生菜、小番茄、麵包丁，兩種醬料可供選擇:蒜味的凱薩醬或果酸的油醋醬。',	80,	NULL,	'2019-04-15 00:15:38'),
(14,	3,	4,	'焗烤蘑菇+方塊麵包',	'1555346063.jpg',	'蘑菇、培根、大蒜還有起司焗烤而成的焗烤蘑菇，麵包搭配著一起食用，濃濃的蒜香味還有奶香，麵包是無限量供應的唷',	60,	NULL,	'2019-04-15 00:34:23'),
(15,	3,	5,	'義式海鮮清湯',	'1555345995.jpg',	'蝦子、蛤蠣、鯰魚、飛卷片，清爽的番茄海鮮湯底。',	80,	NULL,	'2019-04-15 00:33:15'),
(16,	3,	5,	'法式花菜濃湯',	'1555345788.jpg',	'白醬的濃湯，濃郁的奶香，一整朵花菜藏身其中。',	80,	NULL,	'2019-04-15 00:29:48'),
(17,	3,	5,	'杏鮑菇南瓜濃湯',	'1555345778.jpg',	'濃郁的南瓜香+脆嫩的杏鮑菇',	80,	NULL,	'2019-04-15 00:29:38'),
(18,	3,	6,	'黑糖布蕾',	'1555345767.jpg',	'薄薄一層焦糖，搭配著底下又滑又嫩、舌頭輕輕一抿就消失無蹤影的布蕾，一起入口的味蕾感受到滿滿幸福。',	60,	NULL,	'2019-04-15 00:29:27'),
(19,	3,	6,	'覆盆子奶酪',	'1555345740.jpg',	'淨白的奶酪總顯得清新舒服，一口挖起的是軟嫩、是奶香、是奶酪迷人的味道~覆盆子冰，搭配著品嚐多了一份酸甜的戀愛滋味',	60,	NULL,	'2019-04-15 00:29:00'),
(20,	3,	6,	'巧克力袋冰淇淋',	'1555345718.jpg',	'熱熱的巧克力袋戳破後淋在冰淇淋上，熱巧克力遇到冷冰淇淋會馬上結成硬塊，超神奇的啦！',	60,	NULL,	'2019-04-15 00:28:38'),
(21,	3,	7,	'拿鐵(冰)',	'1555345708.jpg',	'吃得了苦，可選擇不加糖漿唷!',	60,	NULL,	'2019-04-15 00:28:28'),
(22,	3,	7,	'拿鐵(熱)',	'1555345688.jpg',	'吃得了苦，可選擇不加糖漿唷!',	60,	NULL,	'2019-04-15 00:28:08'),
(23,	3,	7,	'荔香彩蝶(孕婦不宜)',	'1555345678.jpg',	'漸層飲料是使用蝶豆花製作的喔！顏色由上而下的漸層開來~輕輕攪拌再品嚐，嘴裡的味道是荔枝的香氣，冰涼的口感',	60,	NULL,	'2019-04-15 00:27:58'),
(24,	3,	7,	'繽紛水果茶',	'1555345599.jpg',	'漸層飲料是使用當季水果製作的喔！顏色由上而下的漸層開來~輕輕攪拌再品嚐，嘴裡充滿水果香氣，冰涼口感',	60,	NULL,	'2019-04-15 00:26:39'),
(25,	3,	7,	'布蕾香紅',	'1555345481.jpg',	'奶香味超重的唷~~有奶蓋茶的感覺(偏甜適合螞蟻人)',	60,	NULL,	'2019-04-15 00:24:41'),
(26,	3,	7,	'纖盈香草茶(熱)',	'1555345471.jpg',	'享受完美食大餐之後來一杯纖盈香草茶是最佳的選擇。',	60,	NULL,	'2019-04-15 00:24:31'),
(27,	3,	7,	'紅絲絨奶茶(熱)',	'1555345456.jpg',	'巧克力味道的奶茶，加上些許棉花糖點綴。',	60,	NULL,	'2019-04-15 00:24:16');

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

INSERT INTO `members` (`id`, `name`, `email`, `email_verified_at`, `password`, `birthday`, `phone`, `address`, `verification_code`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'高偉瀚',	'm1@gmail.com',	NULL,	'abcabc',	'1998-01-01',	'09-9999-9999',	'406太平區中山路一段319號',	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	'白貫良',	'm2@gmail.com',	NULL,	'123456',	'1998-01-02',	'09-9999-9999',	'台中市太平區',	NULL,	NULL,	NULL,	NULL,	NULL),
(3,	'曾郁閔',	'm3@gmail.com',	NULL,	'123456',	'1998-01-03',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL,	NULL,	NULL),
(5,	'江珮妤',	'm4@gmail.com',	NULL,	'123456',	'1998-01-04',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL,	NULL,	NULL),
(6,	'劉宜樺',	'm5@gmail.com',	NULL,	'123456',	'1998-01-05',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL,	NULL,	NULL),
(7,	'黃婉綾',	'm6@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-06',	'09-9999-9999',	'台中',	'VZbm1M',	'eFEPIAqWEds:APA91bGzws8oUdNKny_3-5g6a27OecxPL_yH9tD_XAtDU9ZK4swmH7rOzGewULKvfCOchdPBgo5I-zxKfKO_8ceBqqRFbmKq23PbBLSncnJsysX2pMvQG59W5pdwatdCMr6YtvrKWfCv',	NULL,	NULL,	'2019-05-20 16:49:41'),
(8,	'test',	'test@gmail.com',	NULL,	'$2y$10$uD9Z3LewvIarMC.Eyg7y1u90eGUKbv2qOhcJcqZvyLZFp/mSh4Uwm',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(9,	'測試',	'm99@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-30',	'09-9999-9999',	'台中',	NULL,	'c2iYgkVfe64:APA91bFtWwEN8eqbzZA_OMv35npUCXknCo1ynC1FkJmUQFvqdeaQHDEFeaSM_7OchKTgInMRPifh6OqYNAO0rlN32k6VittNmTKrw_Tqmfwib4fcKo_np989vjNzlCdARG5X9jU3d3QT',	NULL,	NULL,	'2019-05-02 16:57:33'),
(10,	'測試b',	'm999@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-30',	'09-9999-9999',	'台中',	NULL,	'c2iYgkVfe64:APA91bFtWwEN8eqbzZA_OMv35npUCXknCo1ynC1FkJmUQFvqdeaQHDEFeaSM_7OchKTgInMRPifh6OqYNAO0rlN32k6VittNmTKrw_Tqmfwib4fcKo_np989vjNzlCdARG5X9jU3d3QT',	NULL,	NULL,	'2019-05-02 16:57:33');

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
(23,	5,	7,	NULL,	0,	NULL,	'2019-05-03 16:24:04',	'2019-05-03 16:24:04'),
(24,	5,	9,	NULL,	0,	NULL,	'2019-05-03 16:24:04',	'2019-05-03 16:24:04'),
(25,	5,	10,	NULL,	0,	NULL,	'2019-05-03 16:24:04',	'2019-05-03 16:24:04'),
(26,	5,	7,	NULL,	0,	NULL,	'2019-05-03 16:29:01',	'2019-05-03 16:29:01'),
(27,	5,	9,	NULL,	0,	NULL,	'2019-05-03 16:29:01',	'2019-05-03 16:29:01'),
(28,	5,	10,	NULL,	0,	NULL,	'2019-05-03 16:29:01',	'2019-05-03 16:29:01');

DROP TABLE IF EXISTS `member_restaurants`;
CREATE TABLE `member_restaurants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `status` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `member_restaurants` (`id`, `restaurant_id`, `member_id`, `status`, `created_at`, `updated_at`) VALUES
(21,	3,	7,	1,	'2019-05-19 23:57:02',	'2019-05-19 23:57:02');

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
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `restaurant_id`, `customer_id`, `number`, `StartTime`, `EndTime`, `total`, `PayType`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	0,	'2018-12-25 00:00:00',	NULL,	3000,	'現金',	'出餐中',	NULL,	NULL),
(2,	1,	2,	0,	'2019-01-25 00:00:00',	NULL,	3000,	'現金',	'出餐中',	NULL,	NULL),
(3,	1,	1,	0,	'0209-01-17 00:00:00',	NULL,	3000,	'現金',	'出餐中',	NULL,	NULL),
(4,	1,	1,	0,	'0209-01-17 00:00:00',	NULL,	200,	'現金',	'出餐中',	NULL,	NULL),
(5,	2,	2,	0,	'0209-01-17 00:00:00',	NULL,	390,	'現金',	'出餐中',	NULL,	NULL),
(6,	2,	2,	0,	'0209-01-17 00:00:00',	NULL,	390,	'現金',	'出餐中',	NULL,	NULL),
(27,	3,	32,	4,	NULL,	NULL,	NULL,	NULL,	'出餐中',	'2019-03-19 00:03:53',	'2019-03-19 00:03:53'),
(55,	3,	60,	4,	NULL,	NULL,	NULL,	NULL,	'出餐中',	'2019-05-12 18:56:05',	'2019-05-12 18:56:05'),
(57,	3,	62,	5,	NULL,	NULL,	1440,	NULL,	'出餐中',	'2019-05-12 19:09:46',	'2019-05-12 19:09:46'),
(58,	3,	63,	1,	NULL,	NULL,	NULL,	NULL,	'出餐中',	'2019-05-12 21:13:48',	'2019-05-12 21:13:48'),
(59,	3,	64,	1,	'2019-05-27 18:58:13',	NULL,	NULL,	NULL,	'已結帳',	'2019-05-27 10:58:13',	'2019-05-27 10:58:13'),
(60,	3,	65,	1,	NULL,	NULL,	NULL,	NULL,	'已結帳',	'2019-05-27 10:59:01',	'2019-05-27 10:59:01'),
(61,	3,	66,	1,	NULL,	NULL,	300,	NULL,	'已結帳',	'2019-05-27 10:59:01',	'2019-05-27 13:38:40');

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
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `restaurant_id`, `pic`, `title`, `content`, `DateTime`, `created_at`, `updated_at`) VALUES
(1,	1,	'',	'1/17公休至1/19',	'付不出薪資，公休三天啦',	'2019-01-19 14:51:13',	NULL,	NULL),
(2,	1,	'',	'1/19公休至1/20',	'因虧損嚴重，本次公休後，預計不再繼續營業，謝謝大家。',	'2019-01-20 14:51:00',	NULL,	NULL),
(3,	2,	'',	'高壓電檢測',	'即日起店內將進行高壓電設備之檢測，預計5/30完工，屆時將重新開幕，敬請見諒。',	'2019-01-29 14:51:00',	NULL,	NULL),
(4,	3,	'T-1.jpg',	'【刷聯邦信用卡滿2,000現折240元】',	'2019/4/1~6/30刷聯邦信用卡單筆消費滿2,000元享現折240元 (不累計折抵)。\r\n\r\n\r\n注意事項：\r\n1.本活動適用Apple/Samsung/Google Pay，不適用Visa金融卡、商務差旅卡（個人商務卡除外）、採購卡。\r\n2.結帳時須主動出示聯邦信用卡並刷卡支付消費全額方享優惠，離櫃後再告知恕無法補給折扣。\r\n3.消費滿額金額為加計10%服務費後之金額，每卡每日限享本優惠乙次，單筆消費滿2,000元(含)以上最高折抵240元，單筆金額恕無法拆刷。\r\n4.本優惠不適用外帶、禮券購買、兌現或找零，且不得與其他優惠併用。\r\n5.如遇餐廳因刷卡系統線路無法連線，餐廳與聯邦銀行保留無法給予優惠之權利。\r\n6.西堤牛排與聯邦銀行保留修改、解釋、終止活動內容細節之權利。',	'2019-01-29 14:51:00',	NULL,	NULL),
(5,	3,	'T-2.jpg',	'【牛排/排餐餐廳用餐行為調查抽獎公佈】',	'中獎名單：\r\n0937-120-XXX　0937-051-XXX　0983-551-XXX\r\n0952-556-XXX　0919-016-XXX　0920-393-XXX\r\n0913-150-XXX　0937-120-XXX　0926-805-XXX\r\n0988-078-XXX　0937-661-XXX　0972-208-XXX\r\n0926-311-XXX　0914-111-XXX　0921-633-XXX\r\n0912-029-XXX　0982-485-XXX　0919-707-XXX\r\n0911-106-XXX　0983-551-XXX\r\n\r\n注意事項：\r\n1.填寫問卷截止時間為2/28日23:59分。 \r\n2.此手機號碼將作為中獎者電子贈品券發送門號，如因號碼有誤造成發送錯誤或無法成功，將視同放棄中獎權利。 \r\n3.兌換規範請依兌換頁面所示，西堤牛排保有修改、解釋、中止活動之權利。 \r\n4.兌換日期至2019/6/30。\r\n',	'2019-01-19 00:00:00',	NULL,	NULL),
(6,	3,	'T-3.jpg',	'【香煎紐約客牛排新品上市】',	'點購經典套餐加價$150元可享主餐升級為香煎紐約客牛排。\r\n\r\n\r\n注意事項：\r\n1.花旗饗樂卡買一送一及第2客半價半價不適用。\r\n2.加價升級$150元須另收10%服務費。\r\n3.西堤牛排保有活動最終解釋之權利。\r\n\r\n',	'2019-01-19 00:00:00',	NULL,	NULL),
(7,	3,	'T-4.jpg',	'【西堤壽星我最大 當月享套餐8折】',	'會員憑官網生日優惠券包及個人照片證件，獨享單客套餐8折優惠。\r\n\r\n注意事項：\r\n1. 壽星優惠限當月使用。\r\n2. 本優惠不與其他優惠併用且不適用禮券購買、花旗饗樂卡，生日買一送一及外帶。\r\n3. 折扣優惠以原價10%計算。',	'2019-01-19 00:00:00',	NULL,	NULL),
(8,	3,	'T-5.jpg',	'【西堤會員94狂月月抽電子套餐贈品券】',	'凡於1/1-1/31加入西堤新官網會員，就可享抽西堤電子套餐贈品券100名的機會。\r\n\r\n\r\n注意事項：\r\n1.抽獎之電子套餐贈品券可享免費兌換價值$625元之經典套餐一份。\r\n2.本次抽獎活動需成功完成西堤新官網會員註冊方可享有資格。\r\n3.中獎名單將於2/20西堤官網及臉書上公布名單(假日順延)\r\n4.電子套餐贈品券將於名單公佈後隔天於簡訊發出。\r\n5.西堤電子套餐贈品券使用效期為3個月。\r\n',	'2019-01-19 00:00:00',	NULL,	NULL),
(9,	3,	'T-6.jpg',	'【禮券購 快樂Go】',	'單次購買20張(含)以上享96折，另西堤套餐禮券未授權第三方單位代銷，為確保您個人的消費權益，請至直營門市購買。\r\n(宜蘭新月店、家樂福楠梓店、台中金典綠園道店、斗六家樂福店、台中家樂福文心店、員林大潤發店、台北南港店、安平家樂福店、鳳山家樂福店，以上門市未販售禮券，請洽其他分店購買。)',	'2019-01-19 00:00:00',	NULL,	NULL);

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `restaurants` (`id`, `name`, `logo`, `map`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `phone`, `address`, `open`, `OpenHour`, `EndHour`, `category`, `token`, `token2`, `created_at`, `updated_at`) VALUES
(1,	'王品',	'1553324558.jpg',	'',	'',	'',	'',	'',	'',	'',	'09-9999-9999',	'406台中市太平區中山路一段220號',	1,	'00:00:00',	'00:00:00',	'精緻系',	NULL,	NULL,	'2019-01-16 12:15:24',	'2019-05-11 17:16:10'),
(2,	'夏慕尼',	'1553322825.jpg',	'',	'',	'',	'',	'',	'',	'',	'04-2276-5198',	'411台中市太平區中山路三段21號',	0,	'00:00:00',	'00:00:00',	'精緻系',	NULL,	NULL,	NULL,	NULL),
(3,	'西堤牛排',	'1552986617.jpg',	'map.gif',	'img-02.png',	'img-03.png',	'img-04.png',	'about_2.jpg',	'about_3.jpg',	'about_4.jpg',	'04-2310-2522',	'台中市西區健行路1049號4樓',	0,	'11:30:00',	'22:00:00',	'平價系',	'cg3cge-0YuY:APA91bGx1HDiA7QeEj6vRjE7crwdKSOMclXt3RTogR7o_4oxBERrq92o0rRLTBDCz17b7hdLduAM3tuUkBcPUN47vH6DJI2jDRq1ecIuaEPlCThGyQAcflaLSDwN3cXhlRr7BupYezpD',	NULL,	NULL,	'2019-05-03 15:12:40');

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_email_unique` (`email`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `staffs` (`id`, `restaurant_id`, `name`, `pic`, `email`, `email_verified_at`, `password`, `phone`, `address`, `position`, `remember_token`, `open`, `created_at`, `updated_at`) VALUES
(1,	1,	'萬宜旻',	'',	'1@gmail.com',	NULL,	'$2y$10$uD9Z3LewvIarMC.Eyg7y1u90eGUKbv2qOhcJcqZvyLZFp/mSh4Uwm',	'09-9999-9989',	'406台中市太平區中山路一段1號',	'主廚',	'iMLxxHcRbZTTS0PXGh616EustzBFQveRt5i96CbcQZX9qv3n2tzmJPxyrh26',	'0',	NULL,	'2019-01-29 08:04:13'),
(2,	1,	'許銘耀',	'',	'2@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段2號',	'櫃台',	NULL,	'0',	NULL,	NULL),
(3,	1,	'黃宣毓',	'',	'3@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段3號',	'櫃台',	'yYLjjMqMBi64kkwiSbItJOqV4bCbNWlQxCDLEShuCnxnqkJE3XH0V0fxA6Kt',	'0',	NULL,	NULL),
(4,	1,	'許名毅',	'',	'4@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段4號',	'櫃台',	NULL,	'0',	NULL,	NULL),
(5,	1,	'林建勳',	'',	'5@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段5號',	'經理',	'VTD4TpLBnfvnUR3ATCg4ocQI2aLHhEGRBCZkJq3StPIFYbwgtiqrI3pju1BZ',	'0',	NULL,	NULL),
(6,	2,	'陳思羽',	'',	'6@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段6號',	'主廚',	'1BXiipPDBinNncY3pDKUX1LXV7AmivqQXNep2aBplUszdVKiQP0kM8a3Kfjc',	'0',	NULL,	NULL),
(7,	2,	'顏以晴',	'',	'7@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段7號',	'經理',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	'0',	NULL,	NULL),
(8,	2,	'黃清愿',	'',	'8@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段8號',	'櫃台',	'LVBivKbOfxJa3fq7dfDc4z0BW5aqhdDCRZzAe60ISo663YxWcsdPO1hR4liz',	'0',	NULL,	NULL),
(9,	2,	'徐偉淳',	'',	'11@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段11號',	'主廚',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	'0',	NULL,	NULL),
(10,	2,	'黃子嘉',	'',	'12@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段12號',	'櫃台',	'9CFMxEL2ImAnX0veFj9NPud5h9Au0VIdiCyZir6672pGZlVCK4ETaZbeRxZD',	'0',	NULL,	NULL),
(11,	3,	'劉凰蓮',	'',	'13@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段13號',	'櫃台',	'jrPTtU2Fqf8KslD1C8kNEOFgtBvaDqyUSdYEMHdeFFWa83yombk4t9frH2Cu',	'0',	NULL,	NULL),
(12,	3,	'何發棋',	'',	'14@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段14號',	'櫃台',	'XSvwz3hgSZqUJDhWAOQYugg9OwZUavz3I3YW2EDrL3JTerCG6yY1CNOsFrQc',	'0',	NULL,	NULL),
(13,	3,	'劉彩羽',	'',	'16@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段16號',	'主廚',	'NyZhl5HWeQKl80BnOHQKhhhNVoJ1v7sGe2LIL4UsEYPNILLkdUCaIkzBpqQ2',	'0',	NULL,	NULL),
(14,	3,	'蕭晴晶',	'',	'18@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段18號',	'主廚',	'WwetbwyStKVoJMCsIWo3GYXrP4NffBuedFlER3XBl6kvZJeWMu90B4u5xGgz',	'1',	NULL,	'2019-04-12 18:06:31'),
(15,	3,	'郭家維',	'',	'19@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'09-9999-9999',	'406台中市太平區中山路一段19號',	'經理',	'sytGbMyVJSSE7nPKIep2itrzIaMghQSprlbVq3mnZi0rIdX6k2MCbLhZpe7y',	'0',	NULL,	NULL);

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
(1,	1,	1,	'點餐中',	1,	1,	0,	'2019-01-28 14:21:52',	'2019-03-17 16:43:35'),
(2,	1,	2,	'0',	1,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(3,	1,	3,	'0',	1,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(4,	1,	4,	'0',	1,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(5,	1,	5,	'0',	1,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(6,	1,	6,	'0',	1,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(7,	1,	7,	'0',	1,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(8,	1,	8,	'0',	1,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(9,	1,	9,	'0',	1,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(10,	1,	10,	'0',	1,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(11,	1,	11,	'0',	2,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(12,	1,	12,	'0',	2,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(13,	1,	13,	'0',	2,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(14,	1,	14,	'0',	2,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(15,	1,	15,	'0',	2,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(16,	1,	16,	'0',	2,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(17,	1,	17,	'0',	2,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(18,	1,	18,	'0',	2,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(19,	1,	19,	'0',	2,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(20,	1,	20,	'0',	2,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(21,	1,	21,	'0',	3,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(22,	1,	22,	'0',	3,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(23,	1,	23,	'0',	3,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(24,	1,	24,	'0',	3,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(25,	1,	25,	'0',	3,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(26,	1,	26,	'0',	3,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(27,	1,	27,	'0',	3,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(28,	1,	28,	'0',	3,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(29,	1,	29,	'0',	3,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(30,	1,	30,	'0',	3,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(31,	1,	31,	'0',	4,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(32,	1,	32,	'0',	4,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(33,	1,	33,	'0',	4,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(34,	1,	34,	'0',	4,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(35,	1,	35,	'0',	4,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(36,	1,	36,	'0',	4,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(37,	1,	37,	'0',	4,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(38,	1,	38,	'0',	4,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(39,	1,	39,	'0',	4,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(40,	1,	40,	'0',	4,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(41,	1,	41,	'0',	5,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(42,	1,	42,	'0',	5,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(43,	1,	43,	'0',	5,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(44,	1,	44,	'0',	5,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(45,	1,	45,	'0',	5,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(46,	1,	46,	'0',	5,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(47,	1,	47,	'0',	5,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(48,	1,	48,	'0',	5,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(49,	1,	49,	'0',	5,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(50,	1,	50,	'0',	5,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(51,	2,	1,	'0',	1,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(52,	2,	2,	'0',	1,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(53,	2,	3,	'0',	1,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(54,	2,	4,	'0',	1,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(55,	2,	5,	'0',	1,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(56,	2,	6,	'0',	1,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(57,	2,	7,	'0',	1,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(58,	2,	8,	'0',	1,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(59,	2,	9,	'0',	1,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(60,	2,	10,	'0',	1,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(61,	2,	11,	'0',	2,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(62,	2,	12,	'0',	2,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(63,	2,	13,	'0',	2,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(64,	2,	14,	'0',	2,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(65,	2,	15,	'0',	2,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(66,	2,	16,	'0',	2,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(67,	2,	17,	'0',	2,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(68,	2,	18,	'0',	2,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(69,	2,	19,	'0',	2,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(70,	2,	20,	'0',	2,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(71,	2,	21,	'0',	3,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(72,	2,	22,	'0',	3,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(73,	2,	23,	'0',	3,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(74,	2,	24,	'0',	3,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(75,	2,	25,	'0',	3,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(76,	2,	26,	'0',	3,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(77,	2,	27,	'0',	3,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(78,	2,	28,	'0',	3,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(79,	2,	29,	'0',	3,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(80,	2,	30,	'0',	3,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(81,	2,	31,	'0',	4,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(82,	2,	32,	'0',	4,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(83,	2,	33,	'0',	4,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(84,	2,	34,	'0',	4,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(85,	2,	35,	'0',	4,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(86,	2,	36,	'0',	4,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(87,	2,	37,	'0',	4,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(88,	2,	38,	'0',	4,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(89,	2,	39,	'0',	4,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(90,	2,	40,	'0',	4,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(91,	2,	41,	'0',	5,	1,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(92,	2,	42,	'0',	5,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(93,	2,	43,	'0',	5,	3,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(94,	2,	44,	'0',	5,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(95,	2,	45,	'0',	5,	5,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(96,	2,	46,	'0',	5,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(97,	2,	47,	'0',	5,	7,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(98,	2,	48,	'0',	5,	8,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(99,	2,	49,	'0',	5,	9,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(100,	2,	50,	'0',	5,	10,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(101,	3,	1,	'點餐中',	2,	2,	0,	'2019-01-28 14:21:52',	'2019-05-20 09:01:11'),
(102,	3,	2,	'點餐中',	2,	3,	0,	'2019-01-28 14:21:52',	'2019-05-20 09:01:11'),
(103,	3,	3,	'等餐中',	2,	4,	0,	'2019-01-28 14:21:52',	'2019-05-12 18:59:28'),
(104,	3,	4,	'等餐中',	2,	5,	0,	'2019-01-28 14:21:52',	'2019-05-13 12:08:30'),
(105,	3,	5,	'清理中',	2,	6,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(106,	3,	6,	'點餐中',	2,	7,	0,	'2019-01-28 14:21:52',	'2019-05-20 09:01:11'),
(107,	3,	7,	'點餐中',	2,	13,	0,	'2019-01-28 14:21:52',	'2019-05-20 09:12:26'),
(108,	3,	8,	'點餐中',	2,	14,	0,	'2019-01-28 14:21:52',	'2019-05-20 10:09:43'),
(109,	3,	9,	'點餐中',	2,	15,	0,	'2019-01-28 14:21:52',	'2019-05-20 10:09:43'),
(110,	3,	10,	'點餐中',	2,	16,	0,	'2019-01-28 14:21:52',	'2019-03-19 21:15:56'),
(111,	3,	11,	'點餐中',	2,	17,	0,	'2019-01-28 14:21:52',	'2019-03-17 18:18:13'),
(115,	3,	15,	'點餐中',	4,	2,	0,	'2019-01-28 14:21:52',	'2019-05-27 10:58:13'),
(116,	3,	16,	'點餐中',	4,	3,	0,	'2019-01-28 14:21:52',	'2019-05-27 10:59:01'),
(120,	3,	20,	'結帳中',	4,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(121,	3,	21,	'點餐中',	4,	5,	0,	'2019-01-28 14:21:52',	'2019-03-17 18:18:13'),
(125,	3,	25,	'點餐中',	4,	6,	0,	'2019-01-28 14:21:52',	'2019-03-20 04:48:57'),
(126,	3,	26,	'點餐中',	4,	7,	0,	'2019-01-28 14:21:52',	'2019-03-18 17:32:30'),
(130,	3,	30,	'點餐中',	4,	13,	0,	'2019-01-28 14:21:52',	'2019-03-18 17:32:30'),
(131,	3,	31,	'空閒中',	4,	14,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(135,	3,	35,	'等餐中',	4,	15,	0,	'2019-01-28 14:21:52',	'2019-05-12 21:20:09'),
(136,	3,	36,	'用餐中',	4,	16,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(140,	3,	40,	'點餐中',	4,	17,	0,	'2019-01-28 14:21:52',	'2019-03-18 17:32:30'),
(141,	3,	41,	'清理中',	6,	2,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(142,	3,	42,	'用餐中',	6,	3,	0,	'2019-01-28 14:21:52',	'2019-05-27 12:29:37'),
(143,	3,	43,	'空閒中',	6,	4,	0,	'2019-01-28 14:21:52',	'2019-01-28 14:21:52'),
(144,	3,	44,	'確認中',	6,	5,	0,	'2019-01-28 14:21:52',	'2019-05-21 00:30:48'),
(145,	3,	45,	'確認中',	6,	6,	0,	'2019-01-28 14:21:52',	'2019-05-21 00:30:48'),
(146,	3,	46,	'空閒中',	6,	7,	0,	'2019-01-28 14:21:52',	'2019-03-18 17:28:57'),
(147,	3,	47,	'點餐中',	6,	13,	0,	'2019-01-28 14:21:52',	'2019-03-18 23:40:30'),
(148,	3,	48,	'空閒中',	6,	14,	0,	'2019-01-28 14:21:52',	'2019-03-19 01:10:48'),
(149,	3,	49,	'空閒中',	6,	15,	0,	'2019-01-28 14:21:52',	'2019-03-19 00:01:18'),
(150,	3,	50,	'點餐中',	6,	16,	0,	'2019-01-28 14:21:52',	'2019-03-18 17:28:57'),
(151,	3,	51,	'點餐中',	6,	17,	0,	'2019-01-28 14:21:52',	'2019-03-18 17:28:57');

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


-- 2019-05-27 13:48:51
