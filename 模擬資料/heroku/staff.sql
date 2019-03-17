-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

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
(5,	1,	'林建勳',	'5@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-05',	'09-9999-9999',	'406台中市太平區中山路一段5號',	'經理',	'WG17VX2E2MxYA80YIsQKw1OuFDGBXUJIFg6FQxKKweLOPAEM2t1MUuTdo46b',	NULL,	NULL),
(6,	2,	'陳思羽',	'6@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-06',	'09-9999-9999',	'406台中市太平區中山路一段6號',	'主廚',	'ZL7awcEMO2OXaJm7Dqa8H21J5N5VdfWLGBoaSBOmQ9aR3fSdChw3OkN3otlb',	NULL,	NULL),
(7,	2,	'顏以晴',	'7@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-07',	'09-9999-9999',	'406台中市太平區中山路一段7號',	'經理',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	NULL,	NULL),
(8,	2,	'黃清愿',	'8@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-08',	'09-9999-9999',	'406台中市太平區中山路一段8號',	'櫃台',	'sWBAu4jKMPdwvVSwVuhPIRg7LhsspSNeya1F1xxVGbbgTWyT84E2QjJKcZ5r',	NULL,	NULL),
(9,	2,	'徐偉淳',	'11@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-11',	'09-9999-9999',	'406台中市太平區中山路一段11號',	'主廚',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	NULL,	NULL),
(10,	2,	'黃子嘉',	'12@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-12',	'09-9999-9999',	'406台中市太平區中山路一段12號',	'櫃台',	'9CFMxEL2ImAnX0veFj9NPud5h9Au0VIdiCyZir6672pGZlVCK4ETaZbeRxZD',	NULL,	NULL),
(11,	3,	'劉凰蓮',	'13@gmail.com',	NULL,	'$2y$10$q8fAaEKQ0yafC.lyy0h/VOuorazGLR6TCJ.tg.6MaBrouqjiBR/zK',	'1998-01-13',	'09-9999-9999',	'406台中市太平區中山路一段13號',	'櫃台',	'hCcqVT4ChqFoxlWOw2LdjUscyhdliQRk6vQ0MweSOk2CaMwHgWw9FRzuuEEO',	NULL,	'2019-03-12 07:12:50'),
(12,	3,	'何發棋',	'14@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-14',	'09-9999-9999',	'406台中市太平區中山路一段14號',	'櫃台',	'2Ho9cKHAAp5DbyBN2lOBDOKypJiQOeSesZCkjzROLT79e4bv6LwIvuShlROB',	NULL,	NULL),
(13,	3,	'劉彩羽',	'16@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-16',	'09-9999-9999',	'406台中市太平區中山路一段16號',	'主廚',	'klIoFKwGblwuppNCbM15fEXYntq2qCmf6j4iXJ5bcF1xClXc9t68WSUw97TZ',	NULL,	NULL),
(14,	3,	'蕭晴晶',	'18@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-18',	'09-9999-9999',	'406台中市太平區中山路一段18號',	'主廚',	'Ad4nXVxyUAs3ETnz2ckBmcAKodslfxqSc6OGLniNcK1VKH8P0CNz9MTo2YuD',	NULL,	NULL),
(15,	3,	'郭家維',	'19@gmail.com',	NULL,	'$2y$10$9Gg8n6Ut486mFl9kYj5jFOi0LHQesfZsOiNzkgfL0GN9C3.YQox8m',	'1998-01-19',	'09-9999-9999',	'406台中市太平區中山路一段19號',	'經理',	'4MhxR3GIvsZZiR3PPlzFftWlREzrq7EiQBvrM0hLR9tGOm1hH1I0UovvCqkl',	NULL,	NULL);

-- 2019-03-17 10:10:45
