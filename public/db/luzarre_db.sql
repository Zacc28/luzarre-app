-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luzarre_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `media_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `slug`, `description`, `media_url`, `created_at`, `updated_at`) VALUES
(1, 'Campaign 1', 'campaign-1', 'This is description.', 'campaign-1.jpg', '2024-09-14 09:44:09', '2024-09-14 09:44:09'),
(2, 'Campaign 2', 'campaign-2', 'This is description.', 'campaign-2.jpg', '2024-09-14 09:44:09', '2024-09-14 09:44:09'),
(3, 'Campaign 3', 'campaign-3', 'This is description.', 'campaign-3.jpg', '2024-09-14 09:44:09', '2024-09-14 09:44:09'),
(4, 'Campaign 4', 'campaign-4', 'This is description.', 'campaign-video.mp4', '2024-09-14 09:44:09', '2024-09-14 09:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `media_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `media_url`, `created_at`, `updated_at`) VALUES
(1, 'Collection 1', 'collection-1', 'This is description.', 'collection-1.png', '2024-09-14 09:45:34', '2024-09-14 09:45:34'),
(2, 'Collection 2', 'collection-2', 'This is description.', 'collection-2.png', '2024-09-14 09:45:34', '2024-09-14 09:45:34'),
(3, 'Collection 3', 'collection-3', 'This is description.', 'collection-3.png', '2024-09-14 09:45:34', '2024-09-14 09:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_14_091834_create_categories_table', 2),
(7, '2024_09_14_092142_create_campaigns_table', 3),
(8, '2024_09_14_092447_create_products_table', 3),
(9, '2024_09_14_093157_create_product_images_table', 4),
(10, '2024_09_14_093245_create_orders_table', 5),
(11, '2024_09_14_093325_create_order_items_table', 6),
(12, '2024_09_14_093413_create_shopping_carts_table', 7),
(13, '2024_09_14_093502_create_wishlist_table', 8),
(14, '2024_09_14_093907_create_product_ratings_table', 9),
(15, '2024_09_14_094229_add_average_rating_to_products_table', 10),
(16, '2024_09_16_014730_create_payment_methods_table', 11),
(17, '2024_09_20_223345_create_product_sizes_table', 12),
(18, '2024_09_21_005538_add_type_to_product_images_table', 13),
(19, '2024_09_21_121829_remove_stock_column_from_products_table', 14),
(20, '2024_09_21_121941_add_stock_column_to_product_sizes_table', 14),
(21, '2024_09_24_082517_add_size_to_shopping_carts_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `media_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `media_url`, `created_at`, `updated_at`) VALUES
(1, 'BCA', 'bank-bca.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36'),
(2, 'BRI', 'bank-bri.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36'),
(3, 'BNI', 'bank-bni.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36'),
(4, 'Mandiri', 'bank-mandiri.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36'),
(5, 'Qris', 'qris.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36'),
(6, 'Dana', 'dana.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36'),
(7, 'Gopay', 'gopay.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36'),
(8, 'Shopee Pay', 'shopee-pay.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36'),
(9, 'Ovo', 'ovo.png', '2024-09-16 02:09:36', '2024-09-16 02:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `average_rating` decimal(3,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `average_rating`, `category_id`, `campaign_id`, `created_at`, `updated_at`) VALUES
(8, 'debitis', 'Nemo quo veritatis vel omnis illo optio.', 322202.24, NULL, 1, 1, '2024-09-18 21:47:21', '2024-09-18 21:47:21'),
(9, 'sint', 'Doloremque aspernatur repudiandae nobis.', 581866.17, NULL, 1, 3, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(10, 'quod', 'Est expedita voluptatem et et veniam suscipit.', 298013.02, NULL, 2, 2, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(11, 'nesciunt', 'Est id doloribus quasi in occaecati.', 308342.53, NULL, 2, 3, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(12, 'ut', 'Velit omnis qui error dolor quae.', 129464.03, NULL, 1, 3, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(13, 'autem', 'Aut quia sed adipisci animi magnam at eum.', 167225.03, NULL, 2, 1, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(14, 'voluptas', 'Architecto impedit dolorem sit repellat quod.', 765233.86, NULL, 3, 3, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(15, 'quos', 'Ipsa quia quaerat voluptates et at id veniam.', 620727.21, NULL, 2, 4, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(16, 'labore', 'Minus rerum tempora dolor.', 291047.16, NULL, 3, 1, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(17, 'labore', 'Numquam eius ratione nisi eos sed.', 317354.06, NULL, 1, 2, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(18, 'qui', 'Similique laborum et in quisquam aliquid.', 768423.78, NULL, 2, 3, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(19, 'molestiae', 'Ut dolores eum earum maxime ducimus necessitatibus unde.', 289845.66, NULL, 1, 3, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(20, 'dolores', 'Accusantium ut et ipsam sint at consectetur.', 131851.73, NULL, 2, 4, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(21, 'debitis', 'Aperiam doloremque esse eos ut asperiores.', 334029.53, NULL, 3, 1, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(22, 'illo', 'Eum praesentium quod illum ad est similique at assumenda.', 196949.87, NULL, 1, 3, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(23, 'aliquam', 'Et ut porro ut harum et.', 583533.54, NULL, 2, 1, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(24, 'magnam', 'Est facilis et nihil occaecati quo unde.', 893971.82, NULL, 2, 4, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(25, 'enim', 'Sunt doloribus quam repudiandae deleniti veritatis et.', 764440.94, NULL, 2, 1, '2024-09-18 21:47:22', '2024-09-18 21:47:22'),
(26, 'molestiae', 'Amet quia qui explicabo ut rerum excepturi culpa.', 225704.27, NULL, 1, 2, '2024-09-18 21:47:23', '2024-09-18 21:47:23'),
(27, 'est', 'Sunt et necessitatibus minus dolorum excepturi dolorem facilis.', 711031.35, NULL, 2, 2, '2024-09-18 21:47:23', '2024-09-18 21:47:23'),
(28, 'perferendis', 'Quia fugiat exercitationem esse modi fuga nulla.', 507645.96, NULL, 1, 4, '2024-09-18 21:47:23', '2024-09-18 21:47:23'),
(29, 'non', 'Et earum dolor repellat quia eum quo in.', 508114.62, NULL, 3, 3, '2024-09-18 21:47:23', '2024-09-18 21:47:23'),
(30, 'tempore', 'Ullam cupiditate asperiores excepturi rem reiciendis sint eius officia.', 456425.57, NULL, 1, 3, '2024-09-18 21:47:23', '2024-09-18 21:47:23'),
(31, 'laborum', 'Laborum consequuntur sed sed ratione est.', 860263.51, NULL, 3, 3, '2024-09-18 21:47:23', '2024-09-18 21:47:23'),
(32, 'non', 'Molestiae quam iste at rerum exercitationem.', 397891.46, NULL, 1, 2, '2024-09-18 21:47:23', '2024-09-18 21:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'additional'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`, `created_at`, `updated_at`, `type`) VALUES
(1, 8, 'product-3_1.jpg', '2024-09-20 20:32:30', '2024-09-20 20:32:30', 'cover'),
(2, 8, 'product-3_2.jpg', '2024-09-20 20:32:30', '2024-09-20 20:32:30', 'hover'),
(3, 8, 'product-3_3.jpg', '2024-09-20 20:32:30', '2024-09-20 20:32:30', 'additional'),
(4, 8, 'product-3_4.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(5, 8, 'product-3_5.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(6, 9, 'product-3_1.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'cover'),
(7, 9, 'product-3_2.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'hover'),
(8, 9, 'product-3_3.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(9, 9, 'product-3_4.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(10, 9, 'product-3_5.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(11, 10, 'product-2_1.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'cover'),
(12, 10, 'product-2_2.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'hover'),
(13, 10, 'product-2_3.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(14, 10, 'product-2_4.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(15, 10, 'product-2_5.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(16, 11, 'product-2_1.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'cover'),
(17, 11, 'product-2_2.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'hover'),
(18, 11, 'product-2_3.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(19, 11, 'product-2_4.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(20, 11, 'product-2_5.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(21, 12, 'product-2_1.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'cover'),
(22, 12, 'product-2_2.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'hover'),
(23, 12, 'product-2_3.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(24, 12, 'product-2_4.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(25, 12, 'product-2_5.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(26, 13, 'product-2_1.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'cover'),
(27, 13, 'product-2_2.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'hover'),
(28, 13, 'product-2_3.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(29, 13, 'product-2_4.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(30, 13, 'product-2_5.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'additional'),
(31, 14, 'product-2_1.jpg', '2024-09-20 20:32:31', '2024-09-20 20:32:31', 'cover'),
(32, 14, 'product-2_2.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'hover'),
(33, 14, 'product-2_3.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(34, 14, 'product-2_4.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(35, 14, 'product-2_5.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(36, 15, 'product-3_1.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'cover'),
(37, 15, 'product-3_2.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'hover'),
(38, 15, 'product-3_3.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(39, 15, 'product-3_4.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(40, 15, 'product-3_5.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(41, 16, 'product-1_1.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'cover'),
(42, 16, 'product-1_2.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'hover'),
(43, 16, 'product-1_3.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(44, 16, 'product-1_4.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(45, 16, 'product-1_5.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(46, 17, 'product-2_1.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'cover'),
(47, 17, 'product-2_2.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'hover'),
(48, 17, 'product-2_3.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(49, 17, 'product-2_4.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(50, 17, 'product-2_5.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(51, 18, 'product-1_1.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'cover'),
(52, 18, 'product-1_2.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'hover'),
(53, 18, 'product-1_3.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(54, 18, 'product-1_4.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(55, 18, 'product-1_5.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'additional'),
(56, 19, 'product-1_1.jpg', '2024-09-20 20:32:32', '2024-09-20 20:32:32', 'cover'),
(57, 19, 'product-1_2.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'hover'),
(58, 19, 'product-1_3.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(59, 19, 'product-1_4.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(60, 19, 'product-1_5.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(61, 20, 'product-1_1.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'cover'),
(62, 20, 'product-1_2.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'hover'),
(63, 20, 'product-1_3.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(64, 20, 'product-1_4.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(65, 20, 'product-1_5.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(66, 21, 'product-3_1.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'cover'),
(67, 21, 'product-3_2.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'hover'),
(68, 21, 'product-3_3.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(69, 21, 'product-3_4.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(70, 21, 'product-3_5.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(71, 22, 'product-3_1.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'cover'),
(72, 22, 'product-3_2.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'hover'),
(73, 22, 'product-3_3.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(74, 22, 'product-3_4.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(75, 22, 'product-3_5.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(76, 23, 'product-3_1.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'cover'),
(77, 23, 'product-3_2.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'hover'),
(78, 23, 'product-3_3.jpg', '2024-09-20 20:32:33', '2024-09-20 20:32:33', 'additional'),
(79, 23, 'product-3_4.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(80, 23, 'product-3_5.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(81, 24, 'product-1_1.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'cover'),
(82, 24, 'product-1_2.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'hover'),
(83, 24, 'product-1_3.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(84, 24, 'product-1_4.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(85, 24, 'product-1_5.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(86, 25, 'product-1_1.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'cover'),
(87, 25, 'product-1_2.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'hover'),
(88, 25, 'product-1_3.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(89, 25, 'product-1_4.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(90, 25, 'product-1_5.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(91, 26, 'product-2_1.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'cover'),
(92, 26, 'product-2_2.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'hover'),
(93, 26, 'product-2_3.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(94, 26, 'product-2_4.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(95, 26, 'product-2_5.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(96, 27, 'product-3_1.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'cover'),
(97, 27, 'product-3_2.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'hover'),
(98, 27, 'product-3_3.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(99, 27, 'product-3_4.jpg', '2024-09-20 20:32:34', '2024-09-20 20:32:34', 'additional'),
(100, 27, 'product-3_5.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(101, 28, 'product-1_1.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'cover'),
(102, 28, 'product-1_2.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'hover'),
(103, 28, 'product-1_3.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(104, 28, 'product-1_4.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(105, 28, 'product-1_5.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(106, 29, 'product-2_1.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'cover'),
(107, 29, 'product-2_2.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'hover'),
(108, 29, 'product-2_3.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(109, 29, 'product-2_4.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(110, 29, 'product-2_5.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(111, 30, 'product-1_1.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'cover'),
(112, 30, 'product-1_2.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'hover'),
(113, 30, 'product-1_3.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(114, 30, 'product-1_4.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(115, 30, 'product-1_5.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(116, 31, 'product-3_1.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'cover'),
(117, 31, 'product-3_2.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'hover'),
(118, 31, 'product-3_3.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(119, 31, 'product-3_4.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(120, 31, 'product-3_5.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'additional'),
(121, 32, 'product-1_1.jpg', '2024-09-20 20:32:35', '2024-09-20 20:32:35', 'cover'),
(122, 32, 'product-1_2.jpg', '2024-09-20 20:32:36', '2024-09-20 20:32:36', 'hover'),
(123, 32, 'product-1_3.jpg', '2024-09-20 20:32:36', '2024-09-20 20:32:36', 'additional'),
(124, 32, 'product-1_4.jpg', '2024-09-20 20:32:36', '2024-09-20 20:32:36', 'additional'),
(125, 32, 'product-1_5.jpg', '2024-09-20 20:32:36', '2024-09-20 20:32:36', 'additional');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size`, `created_at`, `updated_at`, `stock`) VALUES
(1, 8, 'small', '2024-09-21 05:49:43', '2024-09-21 05:49:43', 42),
(2, 8, 'medium', '2024-09-21 05:49:43', '2024-09-21 05:49:43', 75),
(3, 8, 'large', '2024-09-21 05:49:43', '2024-09-21 05:49:43', 58),
(4, 8, 'x-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 30),
(5, 8, 'xx-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 0),
(6, 9, 'small', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 21),
(7, 9, 'medium', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 50),
(8, 9, 'large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 6),
(9, 9, 'x-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 8),
(10, 9, 'xx-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 0),
(11, 10, 'small', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 18),
(12, 10, 'medium', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 94),
(13, 10, 'large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 75),
(14, 10, 'x-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 26),
(15, 10, 'xx-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 0),
(16, 11, 'small', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 12),
(17, 11, 'medium', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 8),
(18, 11, 'large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 100),
(19, 11, 'x-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 50),
(20, 11, 'xx-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 0),
(21, 12, 'small', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 46),
(22, 12, 'medium', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 19),
(23, 12, 'large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 12),
(24, 12, 'x-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 48),
(25, 12, 'xx-large', '2024-09-21 05:49:44', '2024-09-21 05:49:44', 0),
(26, 13, 'small', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 93),
(27, 13, 'medium', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 75),
(28, 13, 'large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 30),
(29, 13, 'x-large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 23),
(30, 13, 'xx-large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 0),
(31, 14, 'small', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 28),
(32, 14, 'medium', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 17),
(33, 14, 'large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 4),
(34, 14, 'x-large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 85),
(35, 14, 'xx-large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 0),
(36, 15, 'small', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 1),
(37, 15, 'medium', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 97),
(38, 15, 'large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 48),
(39, 15, 'x-large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 63),
(40, 15, 'xx-large', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 0),
(41, 16, 'small', '2024-09-21 05:49:45', '2024-09-21 05:49:45', 44),
(42, 16, 'medium', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 24),
(43, 16, 'large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 74),
(44, 16, 'x-large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 85),
(45, 16, 'xx-large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 0),
(46, 17, 'small', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 89),
(47, 17, 'medium', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 30),
(48, 17, 'large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 2),
(49, 17, 'x-large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 89),
(50, 17, 'xx-large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 0),
(51, 18, 'small', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 91),
(52, 18, 'medium', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 10),
(53, 18, 'large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 71),
(54, 18, 'x-large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 77),
(55, 18, 'xx-large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 0),
(56, 19, 'small', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 4),
(57, 19, 'medium', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 87),
(58, 19, 'large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 46),
(59, 19, 'x-large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 39),
(60, 19, 'xx-large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 0),
(61, 20, 'small', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 9),
(62, 20, 'medium', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 3),
(63, 20, 'large', '2024-09-21 05:49:46', '2024-09-21 05:49:46', 92),
(64, 20, 'x-large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 82),
(65, 20, 'xx-large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 0),
(66, 21, 'small', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 59),
(67, 21, 'medium', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 12),
(68, 21, 'large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 44),
(69, 21, 'x-large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 3),
(70, 21, 'xx-large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 0),
(71, 22, 'small', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 72),
(72, 22, 'medium', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 9),
(73, 22, 'large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 100),
(74, 22, 'x-large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 24),
(75, 22, 'xx-large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 0),
(76, 23, 'small', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 62),
(77, 23, 'medium', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 65),
(78, 23, 'large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 76),
(79, 23, 'x-large', '2024-09-21 05:49:47', '2024-09-21 05:49:47', 4),
(80, 23, 'xx-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 0),
(81, 24, 'small', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 24),
(82, 24, 'medium', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 86),
(83, 24, 'large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 86),
(84, 24, 'x-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 16),
(85, 24, 'xx-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 0),
(86, 25, 'small', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 63),
(87, 25, 'medium', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 17),
(88, 25, 'large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 64),
(89, 25, 'x-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 47),
(90, 25, 'xx-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 0),
(91, 26, 'small', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 31),
(92, 26, 'medium', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 11),
(93, 26, 'large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 65),
(94, 26, 'x-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 95),
(95, 26, 'xx-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 0),
(96, 27, 'small', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 84),
(97, 27, 'medium', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 9),
(98, 27, 'large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 69),
(99, 27, 'x-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 8),
(100, 27, 'xx-large', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 0),
(101, 28, 'small', '2024-09-21 05:49:48', '2024-09-21 05:49:48', 3),
(102, 28, 'medium', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 81),
(103, 28, 'large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 51),
(104, 28, 'x-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 94),
(105, 28, 'xx-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 0),
(106, 29, 'small', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 95),
(107, 29, 'medium', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 62),
(108, 29, 'large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 7),
(109, 29, 'x-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 85),
(110, 29, 'xx-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 0),
(111, 30, 'small', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 55),
(112, 30, 'medium', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 9),
(113, 30, 'large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 42),
(114, 30, 'x-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 36),
(115, 30, 'xx-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 0),
(116, 31, 'small', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 62),
(117, 31, 'medium', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 54),
(118, 31, 'large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 75),
(119, 31, 'x-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 19),
(120, 31, 'xx-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 0),
(121, 32, 'small', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 64),
(122, 32, 'medium', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 45),
(123, 32, 'large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 62),
(124, 32, 'x-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 94),
(125, 32, 'xx-large', '2024-09-21 05:49:49', '2024-09-21 05:49:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 5, 'Ratione voluptas et provident eveniet placeat unde blanditiis enim ad.', '2024-09-21 07:26:26', '2024-09-21 07:26:26'),
(2, 1, 9, 5, 'Sapiente explicabo et rem nostrum optio sint id velit et ad incidunt dicta qui.', '2024-09-21 07:26:26', '2024-09-21 07:26:26'),
(3, 1, 10, 5, 'Rerum et ad praesentium occaecati ut quam deserunt iure labore.', '2024-09-21 07:26:26', '2024-09-21 07:26:26'),
(4, 1, 11, 4, 'Saepe blanditiis id nisi amet mollitia dolorem autem asperiores iusto animi minima sed qui.', '2024-09-21 07:26:26', '2024-09-21 07:26:26'),
(5, 1, 12, 5, 'Eum aliquam recusandae recusandae optio occaecati maiores eum vel eaque non.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(6, 1, 13, 4, 'Soluta debitis blanditiis pariatur in voluptatem ipsam eius enim.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(7, 1, 14, 5, 'Enim et nam atque molestiae aut quas non qui qui expedita non eaque.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(8, 1, 15, 5, 'Enim fugit occaecati quidem saepe molestias vitae alias rem.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(9, 1, 16, 5, 'Recusandae iste dolorum nam id atque natus iste maiores nostrum odit ullam.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(10, 1, 17, 5, 'Voluptatem maxime distinctio quas consequatur sint quis rerum omnis dicta non hic.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(11, 1, 18, 4, 'Deleniti nostrum quae minima provident aut illum ut adipisci qui eos consequatur maiores ut.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(12, 1, 19, 4, 'Quae quidem alias cupiditate et aut ratione culpa amet libero.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(13, 1, 20, 5, 'Fugit praesentium sunt et alias repellendus ipsum tenetur voluptatem quia id quibusdam quasi.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(14, 1, 21, 5, 'Asperiores laudantium sequi dolores quia debitis consequatur sed aut in aut.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(15, 1, 22, 5, 'Atque eos itaque qui ut sunt sed dolore.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(16, 1, 23, 5, 'Et veritatis minus incidunt iure quaerat veritatis harum.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(17, 1, 24, 5, 'Sunt nemo qui et sed odio incidunt culpa vitae.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(18, 1, 25, 4, 'Laboriosam dolorum iure asperiores voluptatibus et debitis rerum voluptas.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(19, 1, 26, 4, 'Voluptates aut vel autem ex hic reiciendis enim.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(20, 1, 27, 4, 'Delectus veniam aperiam omnis temporibus quas ipsa est sunt et quidem officia voluptatem consequuntur.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(21, 1, 28, 5, 'Enim ad quas minima eius vitae est.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(22, 1, 29, 5, 'Sed earum sint quo laborum magnam vero modi velit.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(23, 1, 30, 5, 'Est ut non error voluptatem harum velit.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(24, 1, 31, 4, 'Reprehenderit enim unde cumque voluptates dignissimos ut dolore optio ea vitae et autem.', '2024-09-21 07:26:27', '2024-09-21 07:26:27'),
(25, 1, 32, 4, 'Error eum voluptatem et quas ut blanditiis temporibus voluptas commodi consectetur aliquam exercitationem itaque.', '2024-09-21 07:26:27', '2024-09-21 07:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('J3TNkKNqSse9nPcCFQs8LyVClh3tTyJAadHUZD7k', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWUd1ODM1Q2owTlRxclVvMWpoVGNvaGdscVQ3QjdDRzZZN2VVNHZxMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LzE0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjk6ImNhcnRJdGVtcyI7YTowOnt9fQ==', 1727166956);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2024-09-18 21:22:11', '$2y$12$1jYuqz6KWt0KEKAfFfAmg.ZzoKJZYw.RPgYqQTGdT/CrSqVnsnVT6', 'NrwKeMO9Up', '2024-09-18 21:22:13', '2024-09-18 21:22:13'),
(4, 'Test 2', 'test2@gmail.com', '2024-09-23 21:22:11', '$2y$12$LJx6nMitkVZsOHGZ3WZLvuRz7zt.OoSLGB6iqfmG1.jVn.o4yZX3C', 'tJR6Tr0xD08wUWSCsTktC4Ijqdy7MIDnezA4F8ULHZYyON3gjLA9vvBEOOzT', '2024-09-23 06:42:51', '2024-09-23 06:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `campaigns_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_campaign_id_foreign` (`campaign_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_user_id_foreign` (`user_id`),
  ADD KEY `shopping_carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
