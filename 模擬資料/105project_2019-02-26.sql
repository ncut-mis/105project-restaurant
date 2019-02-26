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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'陳姿婷',	'2019-01-16 20:10:55',	NULL),
(2,	'張宏瑋',	'2019-01-16 20:10:48',	NULL),
(3,	'鄭一緯',	'2019-01-16 20:11:23',	NULL),
(4,	'陳冠宇',	'2019-01-16 20:11:43',	NULL);

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `coupons_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `coupons` (`id`, `restaurant_id`, `title`, `content`, `status`, `StartTime`, `EndTime`, `created_at`, `updated_at`) VALUES
(1,	1,	'8折優惠卷',	'可以折8折優惠',	1,	'2019-01-17 14:53:10',	'2019-01-20 14:53:10',	NULL,	NULL),
(2,	1,	'6折優惠卷',	'可以折6折優惠',	0,	'2019-01-17 14:53:10',	'2019-01-20 14:53:10',	NULL,	NULL),
(3,	1,	'95折優惠券',	'可以折95折優惠',	0,	'2019-01-17 00:00:00',	'2019-01-29 14:53:10',	NULL,	NULL);

DROP TABLE IF EXISTS `couponsstatuses`;
CREATE TABLE `couponsstatuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `StartTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coupon_id` (`coupon_id`),
  KEY `member_id` (`member_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `couponsstatuses_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  CONSTRAINT `couponsstatuses_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  CONSTRAINT `couponsstatuses_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `couponsstatuses` (`id`, `coupon_id`, `member_id`, `order_id`, `status`, `StartTime`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	2,	0,	'2019-01-17 15:01:44',	NULL,	NULL),
(2,	1,	2,	3,	0,	'2019-01-17 15:01:44',	NULL,	NULL),
(3,	2,	2,	4,	0,	'2019-01-17 15:01:44',	NULL,	NULL);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`id`, `restaurant_id`, `member_id`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	NULL,	NULL),
(2,	1,	2,	1,	NULL,	NULL),
(3,	2,	3,	1,	NULL,	NULL),
(4,	2,	4,	1,	NULL,	NULL),
(5,	3,	5,	1,	NULL,	NULL),
(6,	2,	6,	1,	NULL,	NULL),
(7,	2,	7,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
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
  CONSTRAINT `details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `details` (`id`, `order_id`, `meal_id`, `quantity`, `status`, `EndTime`, `created_at`, `updated_at`) VALUES
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
(14,	7,	10,	2,	1,	'2019-02-21 02:52:07',	'2019-02-20 18:52:07',	'2019-02-20 18:52:07'),
(15,	7,	12,	2,	1,	'2019-02-21 02:52:26',	'2019-02-20 18:52:26',	'2019-02-20 18:52:26'),
(16,	7,	14,	2,	1,	'2019-02-21 02:52:51',	'2019-02-20 18:52:51',	'2019-02-20 18:52:51'),
(17,	7,	16,	2,	1,	'2019-02-21 02:53:12',	'2019-02-20 18:53:12',	'2019-02-20 18:53:12'),
(18,	7,	18,	2,	1,	'2019-02-21 02:53:35',	'2019-02-20 18:53:35',	'2019-02-20 18:53:35'),
(19,	7,	25,	2,	1,	'2019-02-21 02:53:55',	'2019-02-20 18:53:55',	'2019-02-20 18:53:55');

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

DROP TABLE IF EXISTS `mealkeywords`;
CREATE TABLE `mealkeywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meal_id` int(10) unsigned NOT NULL,
  `keyword_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meal_id` (`meal_id`),
  KEY `keyword_id` (`keyword_id`),
  CONSTRAINT `mealkeywords_ibfk_2` FOREIGN KEY (`keyword_id`) REFERENCES `keywords` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `mealkeywords` (`id`, `meal_id`, `keyword_id`, `created_at`, `updated_at`) VALUES
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

DROP TABLE IF EXISTS `meals`;
CREATE TABLE `meals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `meal_types_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `meals` (`id`, `restaurant_id`, `meal_types_id`, `name`, `photo`, `ingredients`, `price`, `created_at`, `updated_at`) VALUES
(1,	3,	1,	'原塊牛排',	'',	'',	360,	NULL,	NULL),
(2,	3,	1,	'牽拖起司牛排',	'',	'',	360,	NULL,	NULL),
(3,	3,	1,	'蒜香奶油肩胛菲力',	'',	'',	360,	NULL,	NULL),
(4,	3,	1,	'德國豬腳',	'',	'',	360,	NULL,	NULL),
(5,	3,	1,	'啾C烤雞',	'',	'',	360,	NULL,	NULL),
(6,	3,	1,	'海陸雙拼(雞腿+魚排)',	'',	'',	360,	NULL,	NULL),
(7,	3,	1,	'海陸雙拼(牛排+魚排)',	'',	'',	360,	NULL,	NULL),
(8,	3,	1,	'香煎鴨胸佐櫻桃紅酒醬',	'',	'',	360,	NULL,	NULL),
(9,	3,	1,	'時蔬厚切燉牛排',	'',	'',	360,	NULL,	NULL),
(10,	3,	2,	'優格鮮蝦時蔬',	'',	'',	50,	NULL,	NULL),
(11,	3,	3,	'洋芋沙拉',	'',	'',	80,	NULL,	NULL),
(12,	3,	3,	'時令水果',	'',	'',	80,	NULL,	NULL),
(13,	3,	3,	'燻鴨蘿美生菜',	'',	'',	80,	NULL,	NULL),
(14,	3,	4,	'焗烤蘑菇+方塊麵包',	'',	'',	60,	NULL,	NULL),
(15,	3,	5,	'義式海鮮清湯',	'',	'',	80,	NULL,	NULL),
(16,	3,	5,	'法式花菜濃湯',	'',	'',	80,	NULL,	NULL),
(17,	3,	5,	'杏鮑菇南瓜濃湯',	'',	'',	80,	NULL,	NULL),
(18,	3,	6,	'黑糖布蕾',	'',	'',	60,	NULL,	NULL),
(19,	3,	6,	'覆盆子奶酪',	'',	'',	60,	NULL,	NULL),
(20,	3,	6,	'巧克力袋冰淇淋',	'',	'',	60,	NULL,	NULL),
(21,	3,	7,	'拿鐵(冰)',	'',	'',	60,	NULL,	NULL),
(22,	3,	7,	'拿鐵(熱)',	'',	'',	60,	NULL,	NULL),
(23,	3,	7,	'荔香彩蝶(孕婦不宜)',	'',	'',	60,	NULL,	NULL),
(24,	3,	7,	'繽紛水果茶',	'',	'',	60,	NULL,	NULL),
(25,	3,	7,	'布蕾香紅',	'',	'',	60,	NULL,	NULL),
(26,	3,	7,	'纖盈香草茶(熱)',	'',	'',	60,	NULL,	NULL),
(27,	3,	7,	'紅絲絨奶茶(熱)',	'',	'',	60,	NULL,	NULL);

DROP TABLE IF EXISTS `meal_types`;
CREATE TABLE `meal_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `meal_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'主餐',	NULL,	NULL),
(2,	'開胃品',	NULL,	NULL),
(3,	'沙拉',	NULL,	NULL),
(4,	'前菜',	NULL,	NULL),
(5,	'湯品',	NULL,	NULL),
(6,	'甜點',	NULL,	NULL),
(7,	'飲料',	NULL,	NULL);

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `members` (`id`, `name`, `email`, `email_verified_at`, `password`, `birthday`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'高偉瀚',	'm1@gmail.com',	NULL,	'123456',	'1998-01-01',	'09-9999-9999',	'406太平區中山路一段319號',	NULL,	NULL,	NULL),
(2,	'白貫良',	'm2@gmail.com',	NULL,	'123456',	'1998-01-02',	'09-9999-9999',	'台中市太平區',	NULL,	NULL,	NULL),
(3,	'曾郁閔',	'm3@gmail.com',	NULL,	'123456',	'1998-01-03',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL),
(5,	'江珮妤',	'm4@gmail.com',	NULL,	'123456',	'1998-01-04',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL),
(6,	'劉宜樺',	'm5@gmail.com',	NULL,	'123456',	'1998-01-05',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL),
(7,	'黃婉綾',	'm6@gmail.com',	NULL,	'123456',	'1998-01-06',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL);

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
(21,	'2018_12_14_014957_create_customers_table',	3);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `time` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `PayType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  KEY `customer_id` (`customer_id`),
  KEY `table_id` (`table_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `restaurant_id`, `customer_id`, `table_id`, `time`, `total`, `PayType`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	5,	'2018-12-25 00:00:00',	3000,	'現金',	NULL,	NULL),
(2,	1,	2,	7,	'2019-01-25 00:00:00',	3000,	'現金',	NULL,	NULL),
(3,	1,	1,	12,	'0209-01-17 00:00:00',	3000,	'現金',	NULL,	NULL),
(4,	1,	1,	49,	'0209-01-17 00:00:00',	200,	'現金',	NULL,	NULL),
(5,	2,	2,	67,	'0209-01-17 00:00:00',	390,	'現金',	NULL,	NULL),
(6,	2,	2,	98,	'0209-01-17 00:00:00',	390,	'現金',	NULL,	NULL),
(7,	3,	5,	5,	'2019-02-21 02:49:04',	5000,	'現金',	'2019-02-20 18:49:04',	'2019-02-20 18:49:04');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `restaurants` (`id`, `name`, `logo`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1,	'勤美麵食館',	'https://i.imgur.com/rLZ7YsJ.jpg',	'09-9999-9999',	'406台中市太平區中山路一段220號',	'2019-01-16 20:15:24',	'2019-01-16 20:15:24'),
(2,	'偈亭泡菜鍋',	'https://i.imgur.com/PjfyKdR.jpg',	'04-2276-5198',	'411台中市太平區中山路三段21號',	NULL,	NULL),
(3,	'西堤牛排',	'https://i.imgur.com/hkKrSWU.jpg',	'04-2247-3922',	'406台中市北屯區文心路四段695號',	NULL,	NULL);

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_email_unique` (`email`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `staff` (`id`, `restaurant_id`, `name`, `email`, `email_verified_at`, `password`, `birthday`, `phone`, `address`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	'萬宜旻',	'1@gmail.com',	NULL,	'$2y$10$uD9Z3LewvIarMC.Eyg7y1u90eGUKbv2qOhcJcqZvyLZFp/mSh4Uwm',	'1998-01-01',	'09-9999-9989',	'406台中市太平區中山路一段1號',	'主廚',	'iMLxxHcRbZTTS0PXGh616EustzBFQveRt5i96CbcQZX9qv3n2tzmJPxyrh26',	NULL,	'2019-01-29 16:04:13'),
(2,	1,	'許銘耀',	'2@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-02',	'09-9999-9999',	'406台中市太平區中山路一段2號',	'櫃台',	NULL,	NULL,	NULL),
(3,	1,	'黃宣毓',	'3@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-03',	'09-9999-9999',	'406台中市太平區中山路一段3號',	'櫃台',	'XJUlPMvc0Es2JwDYVOOjfWjRa6rqpGIS4HX6uAG7PEestxJ3sXUyNysYJrLs',	NULL,	NULL),
(4,	1,	'許名毅',	'4@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-04',	'09-9999-9999',	'406台中市太平區中山路一段4號',	'櫃台',	NULL,	NULL,	NULL),
(5,	1,	'林建勳',	'5@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-05',	'09-9999-9999',	'406台中市太平區中山路一段5號',	'經理',	'byJKahjydqZicnU8TtdbJ3Nu2spmTZWRzQL2SVqFXjoAMkXPvX3GH8VhD301',	NULL,	NULL),
(6,	2,	'陳思羽',	'6@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-06',	'09-9999-9999',	'406台中市太平區中山路一段6號',	'主廚',	'ZL7awcEMO2OXaJm7Dqa8H21J5N5VdfWLGBoaSBOmQ9aR3fSdChw3OkN3otlb',	NULL,	NULL),
(7,	2,	'顏以晴',	'7@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-07',	'09-9999-9999',	'406台中市太平區中山路一段7號',	'經理',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	NULL,	NULL),
(8,	2,	'黃清愿',	'8@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-08',	'09-9999-9999',	'406台中市太平區中山路一段8號',	'櫃台',	'sWBAu4jKMPdwvVSwVuhPIRg7LhsspSNeya1F1xxVGbbgTWyT84E2QjJKcZ5r',	NULL,	NULL),
(9,	2,	'徐偉淳',	'11@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-11',	'09-9999-9999',	'406台中市太平區中山路一段11號',	'主廚',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	NULL,	NULL),
(10,	2,	'黃子嘉',	'12@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-12',	'09-9999-9999',	'406台中市太平區中山路一段12號',	'櫃台',	'9CFMxEL2ImAnX0veFj9NPud5h9Au0VIdiCyZir6672pGZlVCK4ETaZbeRxZD',	NULL,	NULL),
(11,	3,	'劉凰蓮',	'13@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-13',	'09-9999-9999',	'406台中市太平區中山路一段13號',	'櫃台',	'hCcqVT4ChqFoxlWOw2LdjUscyhdliQRk6vQ0MweSOk2CaMwHgWw9FRzuuEEO',	NULL,	NULL),
(12,	3,	'何發棋',	'14@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-14',	'09-9999-9999',	'406台中市太平區中山路一段14號',	'櫃台',	'upyr4vg9YsHyrYle6X4iq6R4HSIq6TA2CvQU7VgbP3jW2uZod1et3U4Jsefc',	NULL,	NULL),
(13,	3,	'劉彩羽',	'16@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-16',	'09-9999-9999',	'406台中市太平區中山路一段16號',	'主廚',	'TTUsgRw4dhA0Y64PV82QezEk82dEmIPxh5EaO2jbNZjd9OanImJPIOcPOkN7',	NULL,	NULL),
(14,	3,	'蕭晴晶',	'18@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-18',	'09-9999-9999',	'406台中市太平區中山路一段18號',	'主廚',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	NULL,	NULL),
(15,	3,	'郭家維',	'19@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-19',	'09-9999-9999',	'406台中市太平區中山路一段19號',	'經理',	'eSftUYAElSl3lhqtwlQCw758MMyGGtbraMOH3XKht1drFAwVOyOduPVHl2SF',	NULL,	NULL);

DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(10) unsigned NOT NULL,
  `table` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tables` (`id`, `restaurant_id`, `table`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(2,	1,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(3,	1,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(4,	1,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(5,	1,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(6,	1,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(7,	1,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(8,	1,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(9,	1,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(10,	1,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(11,	1,	11,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(12,	1,	12,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(13,	1,	13,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(14,	1,	14,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(15,	1,	15,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(16,	1,	16,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(17,	1,	17,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(18,	1,	18,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(19,	1,	19,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(20,	1,	20,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(21,	1,	21,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(22,	1,	22,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(23,	1,	23,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(24,	1,	24,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(25,	1,	25,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(26,	1,	26,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(27,	1,	27,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(28,	1,	28,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(29,	1,	29,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(30,	1,	30,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(31,	1,	31,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(32,	1,	32,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(33,	1,	33,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(34,	1,	34,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(35,	1,	35,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(36,	1,	36,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(37,	1,	37,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(38,	1,	38,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(39,	1,	39,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(40,	1,	40,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(41,	1,	41,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(42,	1,	42,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(43,	1,	43,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(44,	1,	44,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(45,	1,	45,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(46,	1,	46,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(47,	1,	47,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(48,	1,	48,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(49,	1,	49,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(50,	1,	50,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(51,	2,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(52,	2,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(53,	2,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(54,	2,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(55,	2,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(56,	2,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(57,	2,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(58,	2,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(59,	2,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(60,	2,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(61,	2,	11,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(62,	2,	12,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(63,	2,	13,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(64,	2,	14,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(65,	2,	15,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(66,	2,	16,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(67,	2,	17,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(68,	2,	18,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(69,	2,	19,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(70,	2,	20,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(71,	2,	21,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(72,	2,	22,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(73,	2,	23,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(74,	2,	24,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(75,	2,	25,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(76,	2,	26,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(77,	2,	27,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(78,	2,	28,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(79,	2,	29,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(80,	2,	30,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(81,	2,	31,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(82,	2,	32,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(83,	2,	33,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(84,	2,	34,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(85,	2,	35,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(86,	2,	36,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(87,	2,	37,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(88,	2,	38,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(89,	2,	39,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(90,	2,	40,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(91,	2,	41,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(92,	2,	42,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(93,	2,	43,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(94,	2,	44,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(95,	2,	45,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(96,	2,	46,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(97,	2,	47,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(98,	2,	48,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(99,	2,	49,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(100,	2,	50,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(177,	3,	1,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(178,	3,	2,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(179,	3,	3,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(180,	3,	4,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(181,	3,	5,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(182,	3,	6,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(183,	3,	7,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(184,	3,	8,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(185,	3,	9,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(186,	3,	10,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(187,	3,	11,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(188,	3,	12,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(189,	3,	13,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(190,	3,	14,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(191,	3,	15,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(192,	3,	16,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(193,	3,	17,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(194,	3,	18,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(195,	3,	19,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(196,	3,	20,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(197,	3,	21,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(198,	3,	22,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(199,	3,	23,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(200,	3,	24,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(201,	3,	25,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(202,	3,	26,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(203,	3,	27,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(204,	3,	28,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(205,	3,	29,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(206,	3,	30,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(207,	3,	31,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(208,	3,	32,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(209,	3,	33,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(210,	3,	34,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(211,	3,	35,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(212,	3,	36,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(213,	3,	37,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(214,	3,	38,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(215,	3,	39,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(216,	3,	40,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(217,	3,	41,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(218,	3,	42,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(219,	3,	43,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(220,	3,	44,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(221,	3,	45,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(222,	3,	46,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(223,	3,	47,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(224,	3,	48,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(225,	3,	49,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52'),
(226,	3,	50,	0,	'2019-01-28 22:21:52',	'2019-01-28 22:21:52');

-- 2019-02-26 12:08:20
