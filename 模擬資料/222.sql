
INSERT INTO `customers` (`id`, `restaurant_id`, `member_id`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,  1, 1,	NULL,	NULL),
(2,	1,	2, 1,	NULL,	NULL),
(3,	2,	3, 1,	NULL,	NULL),
(4,	2,	4, 1,	NULL,	NULL),
(5,	3,	5, 1,	NULL,	NULL),
(6,	2,	6, 1,	NULL,	NULL),
(7,	2,	7, 1,	NULL,	NULL);



INSERT INTO `members` (`id`,  `name`, `email`, `email_verified_at`, `password`, `birthday`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,		'高偉瀚',	'm1@gmail.com',	NULL,	'123456',	'1998-01-01',	'09-9999-9999',	'406太平區中山路一段319號',	NULL,	NULL,	NULL),
(2,		'白貫良',	'm2@gmail.com',	NULL,	'123456',	'1998-01-02',	'09-9999-9999',	'台中市太平區',	NULL,	NULL,	NULL),
(3,		'曾郁閔',	'm3@gmail.com',	NULL,	'123456',	'1998-01-03',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL),
(5,		'江珮妤',	'm4@gmail.com',	NULL,	'123456',	'1998-01-04',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL),
(6,		'劉宜樺',	'm5@gmail.com',	NULL,	'123456',	'1998-01-05',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL),
(7,		'黃婉綾',	'm6@gmail.com',	NULL,	'123456',	'1998-01-06',	'09-9999-9999',	'台中',	NULL,	NULL,	NULL);


