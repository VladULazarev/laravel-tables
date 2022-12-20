-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 13, 2022 at 09:04 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveltables`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_url_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_url_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Category One', 'category-one', 'Description of the category one', '2022-09-03 16:35:27', '2022-09-11 14:00:16'),
(2, 'Category Two', 'category-two', 'Description of the category two', '2022-09-03 16:35:27', '2022-09-11 14:00:29'),
(3, 'Category Three', 'category-three', 'Description of the category three', '2022-09-03 16:35:27', '2022-09-11 15:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `email`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Tremaye', 'Dickinsonf', '877-914-7934', 'tremay@kuhlman.com', '681 Reynolds Coves Suite 673Port Damian, IN 09005-6980', 'Hillsland', 'IL', '2022-08-29 15:48:19', '2022-09-03 11:16:50'),
(2, 'Doug', 'Fisher', '844.749.7084', 'turner14@bartell.net', '45641 Levi Street\nWest Jaydaborough, FL 92747', 'South Giovaniport', 'GA', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(3, 'Bernhard', 'Hirthe', '1-855-551-8689', 'cdickens@yahoo.com', '5995 Ferry Prairie\nEast Alfordhaven, LA 10887', 'North Maverickton', 'IA', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(4, 'Roel', 'Prosacco', '800-968-2030', 'fahey.michele@hotmail.com', '373 Kacie Greens\nEast Neoma, MA 67833-4163', 'Port Brennan', 'KS', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(5, 'Rocky', 'Doyle', '(866) 976-5805', 'oliver.ratke@hotmail.com', '21166 Michel Junction\nSpinkaton, NV 77504-7363', 'North Oleta', 'RI', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(6, 'Ryan', 'Jakubowski', '(877) 582-8402', 'qthiel@schiller.com', '8407 Ayden Villages Apt. 853\nSchmittmouth, NJ 25200', 'Lake Harley', 'NV', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(7, 'Marlen', 'Cassin', '1-877-366-7215', 'bahringer.julie@russel.com', '68165 Goldner Road Suite 364\nWest Clifton, ND 73854-4483', 'New Graciela', 'NJ', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(8, 'Adalberto', 'Funk', '800.578.2089', 'senger.israel@gleichner.com', '98413 Lubowitz Manors Apt. 052South Nora, ID 44187', 'North Cortezmouth', 'UT', '2022-08-29 15:48:19', '2022-09-01 15:27:40'),
(9, 'Cristobal', 'Tromp', '1-800-521-8665', 'edward.cummerata@yahoo.com', '542 Dicki Rue\nPort Brainberg, RI 91696-8993', 'Katherynville', 'OK', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(10, 'Katlyn', 'Cormier', '855-284-4640', 'guy14@reichel.org', '76310 Nitzsche Stream Apt. 073\nHuelmouth, MI 75060', 'Framiside', 'NY', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(11, 'Lorenz', 'Baumbach', '855.302.5983', 'francesco78@grimes.com', '60268 Preston Street Suite 203Lake Meggie, AZ 99404', 'Littelfurt', 'NV', '2022-08-29 15:48:19', '2022-09-03 10:38:46'),
(12, 'Hellen', 'Vandervort', '(866) 385-5820', 'jerald29@gmail.com', '5805 Sanford Stravenue Apt. 649\nEast Jabariland, MN 68790', 'New Gretastad', 'AR', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(13, 'Consuelo', 'Lesch', '866.608.7816', 'msteuber@koch.com', '18975 Tremblay Rapids Suite 826\nSophiaside, KY 46081', 'Cormierburgh', 'MT', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(14, 'Mittie', 'Marvin', '888-854-2936', 'frowe@quitzon.com', '9380 Charley Throughway Apt. 305\nWest Daryl, SC 82018', 'Suzannebury', 'AZ', '2022-08-29 15:48:19', '2022-08-29 15:48:19'),
(15, 'Garland', 'Dickinson', '1-888-212-9047', 'xfahey@schuppe.com', '90478 Bogan Field\nSouth Elwintown, ND 58656-8058', 'Gerlachville', 'MO', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(16, 'Alfreda', 'Bogisich', '855-817-2630', 'qrippin@hotmail.com', '47005 Armstrong Mountains\nWest Lisette, NY 04666-2895', 'West Dejon', 'MI', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(17, 'Harvey', 'Schmitt', '888-906-7777', 'toney22@goodwin.org', '16630 Koch Islands\nCoralieberg, WI 36384', 'Quentinstad', 'IN', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(18, 'Sierra', 'Hill', '1-888-308-1409', 'tomasa01@gmail.com', '99144 Abernathy Grove Suite 286New Khalil, NV 51361', 'Margaretteborough', 'ID', '2022-08-29 15:48:20', '2022-09-09 11:08:23'),
(19, 'Providenci', 'Predovic', '866-532-3433', 'carlo65@eichmann.com', '9507 Hintz Islands Suite 283\nEast Brenna, ND 04253-7829', 'Lake Jadon', 'NC', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(20, 'Leatha', 'Lehner', '855.968.6313', 'delores.heathcote@zemlak.com', '572 Kole Spur Apt. 815\nJaymechester, VT 69590-7239', 'Markschester', 'ND', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(21, 'Nathen', 'Beatty', '(877) 945-331', 'prosacco.eli@yahoo.com', '954 Rowe Mill\nNorth Madge, VT 33939', 'Hermistonhaven', 'AK', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(22, 'Adrianna', 'Stiedemann', '(866) 204-9604', 'yost.jamey@gmail.com', '392 Meda Plains Apt. 285\nNew Rosetta, CO 50447-0044', 'Lake Gwenmouth', 'NC', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(23, 'Aurore', 'Collins', '(855) 990-6712', 'murphy.tromp@jacobi.biz', '15618 Hunter Locks Suite 726\nKoelpintown, VA 04826', 'Chelseaburgh', 'OH', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(24, 'Cielo', 'Hauck', '1-855-995-4861', 'olson.norwood@reichel.info', '442 Wilderman Motorway Suite 134\nAmandaburgh, NH 89456', 'Dylanland', 'MN', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(25, 'Lizeth', 'Wilderman', '800-503-8469', 'wjast@yost.info', '7605 Adelbert Drive Suite 498\nFadelhaven, MS 65837-9045', 'North Georgemouth', 'TX', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(26, 'Kathlyn', 'Ziemann', '844-733-2669', 'yolanda82@yahoo.com', '4957 Keara Haven\nPollichshire, MD 13065-4874', 'West Eudoramouth', 'DC', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(27, 'Ora', 'Goodwin', '800-366-6865', 'jarod.donnelly@price.com', '60443 Jaunita Prairie Suite 632\nPort Demarcusstad, KY 87654-4784', 'North Darbyton', 'HI', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(28, 'Litzy', 'Fadel', '1-855-826-7109', 'johnston.cornell@yahoo.com', '95333 Vanessa Islands Apt. 905\nMorarstad, ND 50177', 'Ardellahaven', 'CA', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(29, 'Andyi', 'Walter', '(888) 508-3976', 'dmacejkovic@gleason.com', '2018 Brook FallWest Belleview, ME 27982', 'Framiburgh', 'DE', '2022-08-29 15:48:20', '2022-09-01 16:32:19'),
(30, 'Jaden', 'Goyette', '877.426.4329', 'kessler.ernie@daniel.net', '60439 Nicholaus Turnpike Apt. 892\nEast Yolandamouth, MS 26417-2154', 'Jodiemouth', 'KY', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(31, 'Jordi', 'Hansen', '(888) 634-8114', 'brisa.hansen@yahoo.com', '38603 Frami Fords Suite 425\nPort Tryciaville, CA 88667-1804', 'Rowetown', 'DE', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(32, 'Tessie', 'Zieme', '(855) 874-3556', 'ilynch@yahoo.com', '4969 Ebert Mews Suite 768Queenfurt, NM 69835', 'Sophiaside', 'TN', '2022-08-29 15:48:20', '2022-09-01 15:53:20'),
(33, 'Christop', 'Pfeffer', '855.307.5451', 'otho22@hotmail.com', '372 Lori Islands\nEast Margarett, NH 58549-5416', 'West Cristal', 'NY', '2022-08-29 15:48:20', '2022-08-29 15:48:20'),
(34, 'Lea', 'Gutmann', '(855) 417-1649', 'maddison.hane@hotmail.com', '4896 Maximus SquareBayerland, CA 63451', 'Faheyland', 'MT', '2022-08-29 15:48:20', '2022-09-11 15:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_29_180350_create_customers_table', 2),
(7, '2022_08_30_175613_create_products_table', 3),
(8, '2022_08_30_190249_create_orders_table', 4),
(9, '2022_09_03_162605_create_categories_table', 6),
(10, '2022_09_04_154322_create_product_statuses_table', 7),
(11, '2022_09_09_143158_create_order_statuses_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `category_id` int(8) DEFAULT NULL,
  `order_date` date NOT NULL,
  `unit_amount` int(11) NOT NULL DEFAULT '1',
  `total_sum` double(8,2) NOT NULL,
  `order_status_id` int(8) NOT NULL,
  `comments` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipped_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `customer_id`, `category_id`, `order_date`, `unit_amount`, `total_sum`, `order_status_id`, `comments`, `shipped_date`, `created_at`, `updated_at`) VALUES
(1, 6, 32, 2, '2022-08-10', 1, 96.18, 3, 'Qui nostrum quisquam nobis rerum est. Ea omnis quis nulla recusandae accusantium.', '2022-08-14', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(2, 17, 15, 2, '2022-08-10', 1, 61.62, 3, 'Perspiciatis reprehenderit quis dolor atque. Ipsa id et quos laudantium.', '2022-08-14', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(3, 9, 10, 3, '2022-08-10', 1, 24.47, 3, 'Iusto similique consequuntur sit qui odio cum. Atque maxime ad quas sapiente.', '2022-08-14', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(4, 4, 3, 3, '2022-08-10', 1, 39.71, 3, 'Qui dolor qui quo. Tenetur nulla rerum sit mollitia nobis.', '2022-08-14', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(5, 18, 8, 2, '2022-08-10', 1, 81.21, 3, 'Et nihil est ipsa. Sapiente illum consequuntur optio dolorem. ', '2022-08-14', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(6, 4, 13, 3, '2022-08-10', 1, 39.71, 3, 'Quas est qui est quos aut. Quia vel minima officiis. Magni ratione et enim laboriosam.', '2022-08-14', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(7, 19, 20, 1, '2022-08-16', 1, 56.24, 3, 'Autem esse minus aut ab. Voluptas totam dolor dolore quis ipsum sint corrupti.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(8, 14, 32, 2, '2022-08-17', 1, 87.91, 3, 'Sed libero nulla aut sed dignissimos. Non exercitationem non omnis non.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(9, 8, 22, 2, '2022-08-17', 1, 85.75, 3, 'Minus libero in quia ab cupiditate. Consequatur aut vel sed dolor.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(10, 6, 23, 2, '2022-08-17', 1, 96.18, 3, 'Vel porro facere laborum. Modi voluptate voluptatem voluptas.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(11, 7, 19, 2, '2022-08-17', 1, 0.38, 3, 'Voluptatum sed hic ipsam. Cupiditate qui delectus laborum et alias qui est.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(12, 1, 5, 1, '2022-08-17', 1, 39.15, 3, 'Assumenda fugit minus ipsam dolorem. Sed enim magnam iusto amet. ', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(13, 20, 20, 1, '2022-08-17', 1, 53.33, 3, 'Consequatur culpa aliquid corporis omnis sequi cupiditate. Corrupti dolorem nisi et et.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(14, 11, 18, 1, '2022-08-17', 1, 70.88, 3, 'Est quae ut enim eaque et aut. Ullam labore distinctio non.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(15, 16, 33, 3, '2022-08-17', 1, 15.03, 3, 'Quibusdam occaecati id nisi. Et et nobis aut ducimus. Omnis vel et.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(16, 19, 4, 1, '2022-08-17', 1, 56.24, 3, 'Natus sunt eos in eveniet. Ea assumenda cumque iure ut. ', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(17, 7, 31, 2, '2022-08-18', 1, 0.38, 3, 'Eos laudantium ut impedit eos aut reiciendis provident. Molestias et a sit.', '2022-08-20', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(18, 12, 21, 3, '2022-08-21', 1, 31.56, 2, 'Omnis est veritatis dolor. Corrupti corrupti molestiae ut quia. Sequi labore nemo sapiente.', '2022-08-27', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(19, 19, 3, 1, '2022-08-24', 1, 56.24, 2, 'Ducimus eos doloremque at voluptas vero et. Et in similique doloremque fdfgf', '2022-08-27', '2022-08-31 10:36:58', '2022-09-10 12:57:36'),
(20, 20, 5, 1, '2022-08-26', 1, 53.33, 2, 'Ullam reprehenderit eum fuga vel ipsum. Asperiores minima facere debitis itaque.', '2022-08-27', '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(21, 5, 17, 1, '2022-08-25', 1, 41.55, 2, 'Accusantium maiores est ea ut tempora sed. Quia a est nobis aut rerum aut iure.', '2022-08-27', '2022-08-31 10:36:58', '2022-09-09 17:28:51'),
(22, 17, 7, 2, '2022-08-25', 1, 61.62, 1, 'Impedit ea alias suscipit. Omnis cumque quia voluptatem velit autem aliquam fit.z', '2022-08-08', '2022-08-31 10:36:58', '2022-09-10 15:37:47'),
(23, 13, 2, 1, '2022-08-25', 1, 4.41, 1, 'Quaerat eveniet amet dolor blanditiis alias facere odio omnis.', NULL, '2022-08-31 10:36:58', '2022-09-10 02:41:53'),
(24, 17, 34, 2, '2022-08-25', 1, 61.62, 1, 'Qui consequatur rerum harum qui assumenda. Similique eos aspernatur.', NULL, '2022-08-31 10:36:58', '2022-08-31 10:36:58'),
(25, 14, 30, 2, '2022-08-28', 1, 87.99, 1, 'Voluptates numquam ullam velit non magni iure sint. Quia aliquid quas deserunt.', NULL, '2022-08-31 10:36:58', '2022-09-10 04:12:53'),
(26, 9, 12, 1, '2022-09-10', 1, 24.27, 4, 'sdfg sdff', NULL, '2022-09-10 04:12:08', '2022-09-11 12:13:25'),
(27, 20, 29, 1, '2022-08-26', 1, 53.33, 2, 'Ullam reprehenderit eum fuga vel ipsum. Asperiores minima facere debitis itaque.', '2022-08-27', '2022-08-31 10:36:58', '2022-08-31 10:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `order_status_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`order_status_id`, `order_status_name`, `created_at`, `updated_at`) VALUES
(1, 'Processed', '2022-09-09 14:34:53', '2022-09-09 14:34:53'),
(2, 'Shipped', '2022-09-09 14:34:53', '2022-09-09 14:34:53'),
(3, 'Delivered', '2022-09-09 14:34:53', '2022-09-09 14:34:53'),
(4, 'Accepted', '2022-09-09 14:34:53', '2022-09-09 14:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_url_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(8) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `product_url_name`, `category_id`, `quantity`, `unit_price`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'nam', 'nam', 1, 60, 39.15, 1, '2022-08-29 15:18:35', '2022-08-30 15:18:35'),
(2, 'blanditiis gfd', 'blanditiis-gfd', 2, 81, 25.13, 1, '2022-08-29 15:18:35', '2022-08-30 15:18:35'),
(3, 'utt', 'utt', 3, 81, 99.38, 1, '2022-08-29 15:18:35', '2022-09-08 15:00:34'),
(4, 'quibusdam', 'quibusdam', 3, 25, 39.71, 1, '2022-08-29 15:18:35', '2022-09-09 11:08:56'),
(5, 'amet om', 'amet-om', 1, 0, 41.05, 3, '2022-08-28 15:18:35', '2022-08-30 15:18:35'),
(6, 'placeat', 'placeat', 2, 71, 96.18, 1, '2022-08-28 15:18:35', '2022-08-30 15:18:35'),
(7, 'tempora', 'tempora', 2, 0, 0.38, 2, '2022-08-28 15:18:35', '2022-08-30 15:18:35'),
(8, 'autdy bvc', 'autdy-bvc', 2, 90, 85.40, 1, '2022-08-28 15:18:35', '2022-09-03 16:22:01'),
(9, 'distinctio', 'distinctio', 3, 49, 24.47, 1, '2022-08-27 15:18:35', '2022-08-30 15:18:35'),
(10, 'etic', 'etic', 2, 0, 59.14, 2, '2022-08-27 15:18:35', '2022-09-08 15:21:16'),
(11, 'nostru', 'nostru', 1, 80, 70.88, 1, '2022-08-27 15:18:35', '2022-09-09 11:09:39'),
(12, 'molestias', 'molestias', 3, 70, 31.56, 1, '2022-08-27 15:18:35', '2022-08-30 15:18:35'),
(13, 'quia jkl', 'quia-jkl', 1, 47, 4.41, 1, '2022-08-27 15:18:35', '2022-09-04 15:44:18'),
(14, 'auttu', 'auttu-xcv', 2, 0, 0.91, 2, '2022-08-26 15:18:35', '2022-09-11 16:52:49'),
(15, 'ut et', 'ut-et', 3, 93, 28.40, 1, '2022-08-26 15:18:35', '2022-08-30 15:18:35'),
(16, 'nullaa', 'nullaa', 3, 98, 15.00, 1, '2022-08-26 15:18:35', '2022-09-04 15:53:54'),
(17, 'delectusf', 'delectusf', 2, 90, 61.12, 1, '2022-08-26 15:18:35', '2022-09-03 16:06:35'),
(18, 'nulla vbn', 'nulla-vbn', 2, 0, 81.22, 3, '2022-08-25 15:18:35', '2022-09-11 14:32:17'),
(19, 'non', 'non', 1, 34, 56.24, 1, '2022-08-25 15:18:35', '2022-09-04 15:04:12'),
(20, 'praesentiut', 'praesentiut', 1, 0, 53.33, 3, '2022-08-25 15:18:35', '2022-09-07 11:15:25'),
(21, 'hhhh opt', 'hhhh-opt', 1, 12, 98.00, 1, '2022-09-25 16:12:00', '2022-09-07 15:26:02'),
(22, 'sdfg hry', 'sdfg-hry', 1, 2, 23.00, 1, '2022-09-25 06:40:16', '2022-09-08 06:40:16'),
(23, 'last', 'last', 1, 11, 12.00, 1, '2022-09-25 07:15:05', '2022-09-09 11:09:10'),
(24, 'bollds gf', 'bollds-gf', 1, 45, 12.99, 1, '2022-09-25 04:06:53', '2022-09-10 04:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_statuses`
--

CREATE TABLE `product_statuses` (
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_statuses`
--

INSERT INTO `product_statuses` (`status_id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'In stock', '2022-09-04 15:45:43', '2022-09-04 15:45:43'),
(2, 'Out of stock', '2022-09-04 15:45:43', '2022-09-04 15:45:43'),
(3, 'Marked deleted', '2022-09-04 15:45:43', '2022-09-04 15:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jimmy', 'getyourbestsite@gmail.com', NULL, '$2y$10$rtYhkZD8ZmM1Ajpj5yi16uRx.VxOuVk88fkdv0EnUqDv.thPbt5N2', NULL, '2022-08-26 12:51:22', '2022-08-26 12:51:22'),
(2, 'Admin', 'admin@mail.com', NULL, '$2y$10$ejKMLGErEGrjEQi1HgDOLewBPR5zvX6MT30MdRpCoh0VgKf095ldC', NULL, '2022-08-29 15:58:10', '2022-08-29 15:58:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_statuses`
--
ALTER TABLE `product_statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `order_status_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_statuses`
--
ALTER TABLE `product_statuses`
  MODIFY `status_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
