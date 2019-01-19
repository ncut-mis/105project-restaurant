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
(1,	'陳姿婷',	'2019-01-17 04:10:55',	NULL),
(2,	'張宏瑋',	'2019-01-17 04:10:48',	NULL),
(3,	'鄭一緯',	'2019-01-17 04:11:23',	NULL),
(4,	'陳冠宇',	'2019-01-17 04:11:43',	NULL);

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `coupons` (`id`, `res_id`, `title`, `content`, `status`, `StartTime`, `EndTime`, `created_at`, `updated_at`) VALUES
(1,	1,	'8折優惠卷',	'可以折8折優惠',	1,	'2019-01-17 14:53:10',	'2019-01-20 14:53:10',	NULL,	NULL),
(2,	1,	'6折優惠卷',	'可以折6折優惠',	0,	'2019-01-17 14:53:10',	'2019-01-20 14:53:10',	NULL,	NULL),
(3,	1,	'95折優惠券',	'可以折95折優惠',	0,	'2019-01-17 00:00:00',	'2019-01-29 14:53:10',	NULL,	NULL);

DROP TABLE IF EXISTS `couponsstatuses`;
CREATE TABLE `couponsstatuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cou_id` int(10) unsigned NOT NULL,
  `mem_id` int(10) unsigned NOT NULL,
  `rec_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `StartTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `couponsstatuses` (`id`, `cou_id`, `mem_id`, `rec_id`, `status`, `StartTime`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	2,	0,	'2019-01-17 15:01:44',	NULL,	NULL),
(2,	1,	1,	3,	0,	'2019-01-17 15:01:44',	NULL,	NULL);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1,	0,	NULL,	NULL),
(2,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rec_id` int(10) unsigned NOT NULL,
  `meals_id` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `EndTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `details` (`id`, `rec_id`, `meals_id`, `amount`, `total`, `status`, `EndTime`, `created_at`, `updated_at`) VALUES
(1,	1,	5,	100,	100,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(2,	1,	6,	100,	100,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(3,	1,	7,	100,	100,	0,	'2019-01-17 14:58:35',	NULL,	NULL),
(4,	1,	8,	100,	100,	0,	'2019-01-17 14:58:35',	NULL,	NULL);

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE `keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `keywords` (`id`, `keyword`, `created_at`, `updated_at`) VALUES
(1,	'拉麵',	NULL,	NULL),
(2,	'漢堡',	NULL,	NULL),
(3,	'義大利麵',	NULL,	NULL);

DROP TABLE IF EXISTS `mealkeywords`;
CREATE TABLE `mealkeywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meals_id` int(10) unsigned NOT NULL,
  `kw_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `mealkeywords` (`id`, `meals_id`, `kw_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	NULL,	NULL),
(3,	10,	3,	NULL,	NULL),
(4,	5,	1,	NULL,	NULL),
(5,	6,	1,	NULL,	NULL),
(6,	7,	1,	NULL,	NULL),
(7,	8,	1,	NULL,	NULL),
(8,	9,	1,	NULL,	NULL),
(9,	1,	2,	NULL,	NULL);

DROP TABLE IF EXISTS `meals`;
CREATE TABLE `meals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `meals` (`id`, `res_id`, `name`, `photo`, `ingredients`, `price`, `created_at`, `updated_at`) VALUES
(1,	1,	'泡菜拉麵漢堡',	'http://i.epochtimes.com/assets/uploads/2017/11/Kimchi-Ramen-Burger-600x400.jpg',	'因為味道獨特出眾，韓式料理的方法和食材被越來越多的國際廚師所採用。在雞蛋中加入泡菜，就會有酸辣刺激的味道；抹上辣椒醬之後，雞翅就會變得格外美味。',	500,	NULL,	NULL),
(2,	1,	'炸醬麵',	'http://farm9.staticflickr.com/8313/7995164086_5d29ff2370.jpg',	'他的炸醬麵的醬汁顏色略為偏紅，炸醬麵的調味適中吃起來還蠻順口的，麵條的口感比較偏中等。\r\n',	50,	NULL,	NULL),
(3,	1,	'川味牛肉麵',	'https://www.alberthsieh.com/wp-content/gallery/tosibe/tosibe_0081.jpg',	'肉麵有分為小辣、中辣、大辣三種辣度，麵條有拉麵、寬麵、陽春麵三種麵條可以選擇，麵條給的份量多的，湯喝不夠可以續加，\r\n整碗麵除了有牛肉(牛肋條)之外，還有蔥花以及酸菜。',	80,	NULL,	NULL),
(4,	1,	'麵線糊',	'https://img.i17fun.com/20171126231257_62.jpg',	'除了有腸子之外，還有肉塊，是屬於濃稠度稍高，帶點微微的甜滋味麵線。',	40,	NULL,	NULL),
(5,	1,	'鹽味拉麵',	'https://i2.wp.com/www.daisyyohoho.com/wp-content/uploads/2016/11/hakodate-ramen-4.jpg?fit=1000%2C664&ssl=1',	'北海道經典的鹽味拉麵，裡頭的配料除了湯頭外，幾乎都跟上一道背脂拉麵很相像，不過鹽味拉麵透明的湯頭喝起來的清爽度卻是高上許多。喝到最後感覺也不死鹹。',	100,	NULL,	NULL),
(6,	1,	'青蔥拉麵',	'https://cdn2.ettoday.net/images/3519/d3519741.jpg',	'這碗是蔥控們必點的拉麵，虎麗選擇正常版蔥量，份量已經給得很足，如果想要整碗鋪著滿滿青蔥可以再加點升級！原文網址: 蔥控必點！日人開的高雄大海拉麵　蔥拉麵整碗蔥花滿滿 ',	120,	NULL,	NULL),
(7,	1,	'矢壯拉麵',	'https://www.cythia0805.com/wp-content/uploads/2017/02/DSC_9374.jpg',	'這碗矢壯拉麵320元 每日限量5碗\r\n，整碗很有視覺效果，滿滿的豆芽菜，還有整顆對半切的溏心蛋，有8大片叉燒，每片都有一定厚度，對於肉控吃起來絕對有感',	320,	NULL,	NULL),
(8,	1,	'雞叉燒辛辣雞白湯拉麵',	'http://imgs.weekendhk.com/wp-content/uploads/2018/08/cwb00402_caption_7301072075b6d6271407a6.jpg',	'以香濃雞湯為本的湯底，味道較豚骨清淡，混入日式辛辣口味，香口又過癮。另一亮點是以雞肉製成的圓形叉燒，表層同樣炙燒過，肉質嫩滑鬆軟，獨特少見。',	88,	NULL,	NULL),
(9,	1,	'辛辣炙燒豚肉味玉拉麵',	'http://imgs.weekendhk.com/wp-content/uploads/2018/08/cwb00403_caption_612073585b6d627478f25.jpg',	'紅紅湯底是濃厚豚骨湯混合3款辣椒秘製的辣油而成，那份餘韻停留在喉嚨內，刺激過癮！',	93,	NULL,	NULL),
(10,	1,	'茄汁義大利麵',	'https://tokyo-kitchen.icook.network/uploads/recipe/cover/101691/large_4b615674852fc2e1.jpg',	'番茄脆塊(罐頭)、紅蘿蔔碎、洋蔥碎、西芹碎、蒜頭碎、橄欖油、百里香、月桂葉、乾燥奧立岡、雞高湯、鹽、白胡椒、九層塔末',	120,	NULL,	NULL);

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cus_id` int(10) unsigned NOT NULL,
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

INSERT INTO `members` (`id`, `cus_id`, `name`, `email`, `email_verified_at`, `password`, `birthday`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	0,	'高偉瀚',	'm1@gmail.com',	NULL,	'123456',	'1998-01-01',	'09-9999-9999',	'406太平區中山路一段319號',	NULL,	NULL,	NULL),
(2,	0,	'白貫良',	'm2@gmail.com',	NULL,	'123456',	'1998-01-01',	'09-9999-9999',	'台中市太平區',	NULL,	NULL,	NULL),
(3,	1,	'',	'',	NULL,	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2018_12_14_014501_create_admins_table',	1),
(4,	'2018_12_14_014653_create_restaurants_table',	1),
(5,	'2018_12_14_014717_create_staff_table',	1),
(6,	'2018_12_14_014737_create_coupons_table',	1),
(7,	'2018_12_14_014815_create_posts_table',	1),
(8,	'2018_12_14_014838_create_meals_table',	1),
(9,	'2018_12_14_014857_create_keywords_table',	1),
(10,	'2018_12_14_014957_create_customers_table',	1),
(11,	'2018_12_14_015050_create_details_table',	1),
(12,	'2019_01_17_024307_create_coupons_statuses_table',	1),
(13,	'2019_01_17_025120_create_meal_keywords_table',	1),
(14,	'2019_01_17_030554_create_records_table',	1);

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
  `res_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `res_id` (`res_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `res_id`, `title`, `content`, `DateTime`, `created_at`, `updated_at`) VALUES
(1,	1,	'1/17本日公休至1/19',	'公休拉',	'2019-01-19 14:51:13',	NULL,	NULL),
(2,	1,	'1/19本日公休至1/20',	'公休拉',	'2019-01-20 14:51:00',	NULL,	NULL);

DROP TABLE IF EXISTS `records`;
CREATE TABLE `records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(10) unsigned NOT NULL,
  `cus_id` int(10) unsigned NOT NULL,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `PayType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `records` (`id`, `res_id`, `cus_id`, `table`, `time`, `PayType`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'5',	'2018-12-25 00:00:00',	'現金',	NULL,	NULL),
(2,	1,	0,	'7',	'2019-01-25 00:00:00',	'現金',	NULL,	NULL),
(3,	1,	0,	'12',	'0209-01-17 00:00:00',	'現金',	NULL,	NULL);

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
(1,	'勤美麵食館',	'https://i.imgur.com/rLZ7YsJ.jpg',	'09-9999-9999',	'406台中市太平區中山路一段220號',	'2019-01-17 04:15:24',	'2019-01-17 04:15:24');

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(10) unsigned DEFAULT NULL,
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
  UNIQUE KEY `staff_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `staff` (`id`, `res_id`, `name`, `email`, `email_verified_at`, `password`, `birthday`, `phone`, `address`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	'萬宜旻',	'1@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-01',	'09-9999-9999',	'406台中市太平區中山路一段1號',	'主廚',	NULL,	NULL,	NULL),
(2,	1,	'許銘耀',	'2@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-02',	'09-9999-9999',	'406台中市太平區中山路一段2號',	'櫃台',	NULL,	NULL,	NULL),
(3,	1,	'黃宣毓',	'3@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-03',	'09-9999-9999',	'406台中市太平區中山路一段3號',	'櫃台',	NULL,	NULL,	NULL),
(4,	1,	'許名毅',	'4@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-04',	'09-9999-9999',	'406台中市太平區中山路一段4號',	'櫃台',	NULL,	NULL,	NULL),
(5,	1,	'林建勳',	'5@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-09',	'09-9999-9999',	'406台中市太平區中山路一段5號',	'經理',	NULL,	NULL,	NULL);

-- 2019-01-19 02:07:15
