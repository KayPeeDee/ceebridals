-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `username`, `user_type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	NULL,	'kingstonepenemene@gmail.com',	NULL,	'$2y$10$RTrrbe2x7r8ZLUNfMN6fCuaZmjGi4gi5l9j7IY7jg3wdkstSDb8LO',	'Uo1u6mcdX6kC0ZxCHlLUt3IrxwheISe4me1gicx3GlvZWW2w1f6RGGKaryxd',	'2018-12-02 19:06:29',	'2018-12-02 19:06:29');

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `receipt_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_date` date NOT NULL,
  `return_date` date NOT NULL,
  `price` double NOT NULL,
  `deposit` double NOT NULL,
  `balance` double NOT NULL,
  `added_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_customer_id_foreign` (`customer_id`),
  KEY `bookings_added_by_foreign` (`added_by`),
  CONSTRAINT `bookings_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bookings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bookings` (`id`, `customer_id`, `customer_name`, `phone`, `item`, `quantity`, `receipt_number`, `collection_date`, `return_date`, `price`, `deposit`, `balance`, `added_by`, `created_at`, `updated_at`) VALUES
(1,	NULL,	'Adonis Rumbwere',	'0778678567',	'3',	1,	'RC234567',	'2018-12-15',	'2018-12-24',	35,	20,	15,	1,	'2018-12-11 07:22:13',	'2018-12-11 07:22:13');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2018_12_01_211305_create_products_table',	1),
(4,	'2018_12_01_211948_create_product_categories_table',	1),
(5,	'2018_12_01_213818_create_product_galleries_table',	1),
(6,	'2018_12_01_214119_create_product_reviews_table',	1),
(7,	'2018_12_01_225455_create_admins_table',	1),
(8,	'2018_12_02_083326_create_product_variations_table',	1),
(9,	'2018_12_02_090944_add_category_id_to_products_table',	2),
(10,	'2018_12_02_091508_add_added_by_to_product_galleries_table',	3),
(11,	'2018_12_02_091733_add_added_by_to_product_categories_table',	4),
(12,	'2018_12_02_092009_add_added_by_to_products_table',	5),
(13,	'2018_12_04_150820_create_product_orders_table',	6),
(14,	'2018_12_04_205358_create_bookings_table',	6),
(15,	'2018_12_04_212507_create_sales_table',	6);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discounted_price` double DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_in_stock` int(11) NOT NULL DEFAULT 0,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `main_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookable` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_foreign` (`category`),
  KEY `products_added_by_foreign` (`added_by`),
  CONSTRAINT `products_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_category_foreign` FOREIGN KEY (`category`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `category`, `name`, `price`, `discounted_price`, `description`, `quantity_in_stock`, `trending`, `featured`, `views`, `main_picture`, `bookable`, `created_at`, `updated_at`, `added_by`) VALUES
(1,	1,	'Slim Suits',	250,	180,	NULL,	12,	0,	0,	0,	'1543860611.jpg',	0,	'2018-12-03 16:10:12',	'2018-12-03 16:10:12',	1),
(2,	2,	'Bridal Gowns',	300,	245,	NULL,	12,	1,	1,	0,	'1543864560.jpg',	0,	'2018-12-03 17:16:01',	'2018-12-03 17:16:01',	1),
(3,	1,	'Chino Pants',	35,	30,	NULL,	13,	1,	1,	0,	'1543950959.jpg',	0,	'2018-12-04 17:16:00',	'2018-12-04 17:16:00',	1);

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories_added_by_foreign` (`added_by`),
  CONSTRAINT `product_categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `added_by`) VALUES
(1,	'Groom Suits',	'All suits for the groom and the groomsmen',	'2018-12-03 11:53:45',	'2018-12-03 11:53:45',	NULL),
(2,	'Gowns',	'Gowns of all types are found in our store come and get them at affordable prices',	'2018-12-03 11:55:14',	'2018-12-03 11:55:14',	NULL),
(3,	'Bridal Dresses',	'Bridal dresses of all types are found in our store',	'2018-12-03 11:55:52',	'2018-12-03 11:55:52',	NULL),
(4,	'Men\'s Shoes',	'Shoes of all types are available in our store',	'2018-12-04 12:56:08',	'2018-12-04 12:56:08',	NULL),
(5,	'Jewellery',	'Jewels of all types are now available in our stock',	'2018-12-04 12:57:10',	'2018-12-04 12:57:10',	NULL),
(6,	'Hats',	NULL,	'2018-12-04 17:12:26',	'2018-12-04 17:12:26',	NULL);

DROP TABLE IF EXISTS `product_galleries`;
CREATE TABLE `product_galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_galleries_product_id_foreign` (`product_id`),
  KEY `product_galleries_added_by_foreign` (`added_by`),
  CONSTRAINT `product_galleries_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_orders`;
CREATE TABLE `product_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE `product_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reviewee` int(10) unsigned DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourites` tinyint(4) NOT NULL DEFAULT 0,
  `ratings` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_reviewee_foreign` (`reviewee`),
  CONSTRAINT `product_reviews_reviewee_foreign` FOREIGN KEY (`reviewee`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_variations`;
CREATE TABLE `product_variations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `size` int(11) NOT NULL,
  `size_in_words` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variations_product_foreign` (`product_id`),
  CONSTRAINT `product_variations_product_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_variations` (`id`, `product_id`, `size`, `size_in_words`, `color`, `picture`, `created_at`, `updated_at`) VALUES
(1,	2,	34,	'Medium',	'white',	'1543867211.jpg',	'2018-12-03 18:00:11',	'2018-12-03 18:00:11'),
(2,	2,	36,	'Medium',	'white',	'1543867257.jpg',	'2018-12-03 18:00:58',	'2018-12-03 18:00:58');

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_item_foreign` (`item`),
  KEY `sales_customer_id_foreign` (`customer_id`),
  CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sales_item_foreign` FOREIGN KEY (`item`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sales` (`id`, `customer_id`, `customer_name`, `phone`, `item`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(1,	NULL,	'Adonis Rumbwere',	'0778678567',	3,	1,	55,	'2018-12-05 07:49:22',	'2018-12-05 07:49:22'),
(2,	NULL,	'Adonis Rumbwere',	'0778678567',	1,	1,	350,	'2018-12-05 07:59:01',	'2018-12-05 07:59:01'),
(3,	NULL,	'Ian Magwada',	'0775467890',	1,	1,	245,	'2018-12-05 11:45:07',	'2018-12-05 11:45:07');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `phone`, `email_verified_at`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Kingstone',	'Penemene',	'kingstonepenemene@gmail.com',	'0783966994',	NULL,	'57 3rd Crescent',	'$2y$10$S5ji.bkHvZSA0YcvaIaiducjhNcMA7wzlwcH9EvUYef5/K6X8Uf7S',	'y4Ph4ed68ihHJPaBGxPdpAZvfOUISysKqOt3efiOR3QnbJKjXawEtlQbq7dV',	'2018-12-02 18:20:49',	'2018-12-02 18:20:49');

-- 2018-12-12 05:39:05
