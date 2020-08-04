CREATE TABLE `summer2020`.`users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(30) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `summer2020`.`game` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL DEFAULT '0',
  `is_enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `game_sale` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(11) unsigned NOT NULL,
  `date_end` datetime NOT CURRENT_DATE,
  `discount` varchar(10) DEFAULT "0",
  `is_active` tinyint(11) DEFAULT "1",
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `summer2020`.`user_wishlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `game_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `phone`, `username`, `password`, `date_create`, `is_enabled`)
VALUES
	(1, '89999999999', 'tester', '$2y$10$6Rgh0A42A9Jc1O77ALL/me4MV6TBo8D8dG7aGw6o.y6iZI/t8wczC', '2020-08-02 20:11:37', 1);

INSERT INTO `game` (`id`, `sku`, `name`, `description`, `image_url`, `release_date`, `is_free`, `is_enabled`)
VALUES
	(1, 'rito_lol', 'League of legends', 'League of Legends (LoL) is a multiplayer online battle arena video game developed and published by Riot Games for Microsoft Windows and macOS.', 'https://theme.zdassets.com/theme_assets/43400/87a1ef48e43b8cf114017e3ad51b801951b20fcf.jpg', '2009-10-27 00:00:00', 1, 1),
	(2, 'cdpr_witcher3', 'The Witcher 3: Wild hunt', 'The Witcher 3: Wild Hunt[b] is a 2015 action role-playing game developed and published by Polish developer CD Projekt and is based on The Witcher series of fantasy novels by Andrzej Sapkowski.', 'https://cdn-products.eneba.com/resized-products/0c87248bbfac2866d434aad19334b24b_390x400_1x-0.jpg', '2018-06-15 00:00:00', 0, 1),
	(3, 'micro_seaofthieves', 'Sea of thieves', 'Sea of Thieves is a 2018 action-adventure game developed by Rare and published by Xbox Game Studios.', 'https://upload.wikimedia.org/wikipedia/en/7/77/Sea_of_thieves_cover_art.jpg', '2018-03-20 00:00:00', 0, 0);

INSERT INTO `game_sale` (`id`, `game_id`, `date_end`, `discount`, `is_active`)
VALUES
	(1, 2, '2020-12-30 00:00:00', '40%', 1);
