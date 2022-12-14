-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 02:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_training`
--

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loyal_customers`
--

CREATE TABLE `loyal_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loyal_customers`
--

INSERT INTO `loyal_customers` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lxc150896@gmail.com', NULL, '$2y$10$lcXa9Tulbks65bAD.EKTQ.IxVZYR8Aq10Sjl.lVVrh8TPuKR2AnSO', NULL, NULL, NULL),
(2, 'lxc@gmail.com', NULL, '$2y$10$IXiBMlHhQv.4F.YUzDZDAu2qUvkXzlStO7Fb1/NIlTl.UBF9QhKje', NULL, NULL, NULL),
(3, 'admin@gmail.com', NULL, '$2y$10$2RYt8Hw9xzo5vwvSO7kjQuFTElvWAYLJGwxtxylnUzkkz8Q/Nh7dK', NULL, NULL, NULL);

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
(5, '2021_08_03_023620_mst_users', 2),
(6, '2021_08_03_030301_loyal_customers', 3),
(7, '2021_08_06_070534_mst_customers', 4),
(8, '2021_08_07_200424_mst_imports', 5),
(9, '2021_08_08_214648_mst_imports', 6),
(10, '2021_08_08_215133_mst_imports', 7),
(11, '2021_08_09_015336_mst_product', 8);

-- --------------------------------------------------------

--
-- Table structure for table `mst_customers`
--

CREATE TABLE `mst_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_num` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_customers`
--

INSERT INTO `mst_customers` (`customer_id`, `customer_name`, `email`, `tel_num`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'nguyen van q', 'vanq@gmail.com', '0982783982', 'Huynh Kim', 1, '2021-08-06 07:13:41', NULL),
(2, 'nguyen van w', 'vanw@gmail.com', '0982793982', 'An Nhon', 1, '2021-08-06 07:13:41', NULL),
(3, 'nguyen van e', 'vane@gmail.com', '0982783982', 'H?? Giang', 1, '2021-08-06 07:16:06', NULL),
(4, 'nguyen van r', 'vanr@gmail.com', '0982783982', 'Lang Son', 1, '2021-08-07 07:16:06', NULL),
(5, 'nguyen van t', 'vant@gmail.com', '0982783982', 'Yen Bai', 1, '2021-08-07 07:17:07', NULL),
(6, 'Nguyen Van y', 'vany@gmail.com', '0982783982', 'Cao B???ng', 1, '2021-08-12 07:17:07', NULL),
(7, 'nguyen van u', 'vanu@gmail.com', '0982783982', 'Lao Cai', 1, '2021-08-10 07:18:07', NULL),
(8, 'nguyen van i', 'vani@gmail.com', '0982783982', 'Ninh Binh', 1, '2021-08-14 07:18:07', NULL),
(9, 'nguyen van o', 'vano@gmail.com', '0982783982', 'Lai Chau', 1, '2021-08-07 07:19:12', NULL),
(10, ' nguyen van p', 'vanp@gmail.com', '0982783982', 'B???c Giang', 1, '2021-08-07 07:19:12', NULL),
(11, 'nguyuen van a', 'vana@gmail.com', '0982783982', 'Thai Binh', 1, '2021-08-12 07:20:47', NULL),
(12, 'vnguyen van s', 'vans@gmail.com', '0982783982', '??i???n Bien', 1, '2021-08-20 07:20:47', NULL),
(13, 'gnjsad', 'aaaaa@gmail.com', '0973658623', 'Lang S??n', 1, '2021-08-06 09:19:37', '2021-08-13 00:07:49'),
(14, 'iuasoiduf', 'aiusdfoidsu@gmail.com', '0973628726', 'abc', 1, '2021-08-08 23:35:49', '2021-08-08 23:38:34'),
(19, 'o??ddd', 'e@gmail.com', '0983746283', 'huynhk', 1, '2021-08-11 02:51:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_imports`
--

CREATE TABLE `mst_imports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_imports`
--

INSERT INTO `mst_imports` (`id`, `name`, `email`, `tel_num`, `address`, `is_active`) VALUES
(157, 'e', 'e@gmail.com', '0983746283', 'huynhk', 1),
(158, NULL, 'e@gmail.com', '0983746283', 'huynhk', 1),
(159, NULL, 'e@gmail.com', '098374', 'huynhk', 1),
(160, 'h', 'e@gmail.com', '0983746283', 'huynhk', 1),
(162, 'ds??dd', 'e@gmail.com', '0983746283', 'dsaf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_product`
--

CREATE TABLE `mst_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `is_sales` tinyint(4) NOT NULL DEFAULT 1,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_product`
--

INSERT INTO `mst_product` (`product_id`, `product_name`, `product_image`, `product_price`, `is_sales`, `description`, `created_at`, `updated_at`) VALUES
(1, 'k???o b???n m??a', NULL, 5000, 1, NULL, NULL, NULL),
(2, 'k???o v???i', NULL, 5000, 1, NULL, NULL, NULL),
(3, 'm??t s???y', NULL, 7000, 1, NULL, NULL, NULL),
(4, 'v???i s???y', '', 8000, 1, NULL, '2021-08-10 03:35:03', '2021-08-10 21:23:37'),
(5, 'k???o v???i thi???u', NULL, 6000, 1, 'H????ng v??? ng???t d???u c???a v??i thi???u ???????c ?????p l???nh, mang ?????n c???m gi??c s???ng kho??i khi th?????ng th???c. ', NULL, NULL),
(6, 'me', NULL, 7000, 1, 'H????ng v??? ng???t d???u c???a v??i thi???u ???????c ?????p l???nh, mang ?????n c???m gi??c s???ng kho??i khi th?????ng th???c. ', NULL, NULL),
(7, 'm??t', NULL, 7000, 1, 'H????ng v??? ng???t d???u c???a v??i thi???u ???????c ?????p l???nh, mang ?????n c???m gi??c s???ng kho??i khi th?????ng th???c. ', NULL, NULL),
(8, 'm???n', NULL, 6000, 1, 'H????ng v??? ng???t d???u c???a v??i thi???u ???????c ?????p l???nh, mang ?????n c???m gi??c s???ng kho??i khi th?????ng th???c. ', NULL, NULL),
(9, 'cam', NULL, 7000, 1, 'H????ng v??? ng???t d???u c???a v??i thi???u ???????c ?????p l???nh, mang ?????n c???m gi??c s???ng kho??i khi th?????ng th???c. ', NULL, NULL),
(10, 'qu??t', 'keo_2.jpg', 4000, 1, 'H????ng v??? ng???t d???u c???a v??i thi???u ???????c ?????p l???nh, mang ?????n c???m gi??c s???ng kho??i khi th?????ng th???c.', NULL, '2021-08-13 00:13:25'),
(11, 's???u ri??ng', NULL, 9000, 1, 'H????ng v??? ng???t d???u c???a v??i thi???u ???????c ?????p l???nh, mang ?????n c???m gi??c s???ng kho??i khi th?????ng th???c.', NULL, '2021-08-10 20:58:07'),
(13, 'm??ng_c???t', NULL, 9000, 1, 'H????ng v??? ng???t d???u c???a v??i thi???u ???????c ?????p l???nh, mang ?????n c???m gi??c s???ng kho??i khi th?????ng th???c.', NULL, NULL),
(14, 'a', '', 12, 0, 'abc', '2021-08-10 04:26:01', NULL),
(16, 'vnem', '', 12300, 1, 'abc', '2021-08-10 05:49:31', '2021-08-10 21:33:47'),
(17, 'bc', 'keo_1.jpg', 1200, 1, 'kjg', '2021-08-10 20:16:40', '2021-08-13 00:13:09'),
(18, 'abc', 'keo_4.jpg', 12000, 0, 'adfasdf', '2021-08-10 20:24:49', '2021-08-13 00:12:56'),
(19, 'nemc', 'keo_3.jpg', 123000, 0, 'd???', '2021-08-10 21:00:03', '2021-08-13 00:12:42'),
(20, '??df', 'keo_2.jpg', 2213214, 0, '??dfasdf', '2021-08-11 01:24:55', '2021-08-13 00:12:29'),
(21, 'k???o m???c', 'keo_1.jpg', 15000, 0, 'abc', '2021-08-11 01:27:26', '2021-08-13 00:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `mst_users`
--

CREATE TABLE `mst_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 1,
  `group_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_users`
--

INSERT INTO `mst_users` (`id`, `name`, `email`, `password`, `verify_email`, `is_active`, `is_delete`, `group_role`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Truong Van  Bui', 'vanbui@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 1, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-04 01:31:59', NULL),
(2, 'Nguyen Van B', 'ad@gmail.com', '$2y$10$w6o39sKXMnspOCdEWGU4neKhG.M6PyYVQNPw8o4V2eqQewg4RoxGK', 'Null', 0, 1, '1', '2021-08-13 07:07:03', '127.0.0.1', 'SLCYVJOoZe6AniVQfumLvH5I4rH0ExSnRVrhiMJ3mxTBfcxOM7fAvHk7YmjR', NULL, NULL),
(3, 'Tr????ng V??n A', 'vana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 1, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-04 01:27:22', NULL),
(4, 'Tr????ng B??i', 'trbui@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-04 01:27:22', NULL),
(5, 'Nguyen Van Sang', 'vansang@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-04 01:31:59', NULL),
(7, 'B??i V??n A', 'buivana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 1, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-04 01:33:55', NULL),
(8, 'Truong Van Nhien', 'vannhien@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 01:33:55', NULL),
(9, 'Cao Nghia', 'caonghia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 1, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-04 01:35:36', NULL),
(10, 'Cao Th??i A', 'thaia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 01:35:36', NULL),
(11, 'Cao Van Nguyen', 'vannguyen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-06 01:37:25', NULL),
(12, 'Tran Dan A', 'trandana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-06 01:37:25', NULL),
(13, '?????m ri', 'dambri@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-07 01:38:54', NULL),
(14, 'L??m A', 'lama@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-10 01:38:54', NULL),
(15, 'H?? Giang', 'hagiang@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-10 01:42:05', NULL),
(16, 'Ninh B??nh', 'ninhbinh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-02 01:42:05', NULL),
(17, 'Y??n B??i', 'yenbai@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-11 01:43:30', NULL),
(18, 'Nguyen Binh Thu???n', 'binhthuan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-10 01:44:11', NULL),
(19, 'Nguy??n Ninh Thu???n', 'ninhthuan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-17 01:44:11', NULL),
(20, 'Nguy???n T??y ', 'nguyentay@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 01:45:40', NULL),
(21, 'Nguy???n T??y B', 'tayb@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 01:45:40', NULL),
(22, '????o V??n A', 'daovana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 01:47:19', NULL),
(23, '??inh V??n A', 'dinhvana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-17 01:47:19', NULL),
(24, 'Th??i Van A', 'thaivana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-17 01:52:37', NULL),
(25, 'Thai Van B', 'thaivanb@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-18 01:52:37', NULL),
(26, 'Th??i Van C', 'thaivanc@gmail.com', '12345', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-26 01:53:50', NULL),
(27, 'Th??i V??n D', 'thaivand@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-26 01:53:50', NULL),
(28, 'Thai Van E', 'thaivane@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-18 01:55:00', NULL),
(29, 'Thai Van F', 'thaivanf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-12 01:55:00', NULL),
(30, 'Ni A Man', 'niaman@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-11 01:56:11', NULL),
(31, 'Ni A Van ', 'niavan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-18 01:56:11', NULL),
(32, 'A Bon Ng??', 'abonngo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-31 01:57:44', NULL),
(33, 'B???p V??n T??y', 'bapvantay@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 01:57:44', NULL),
(34, 'Ng?? Th???a Ana', 'ngothuaan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-18 01:58:57', NULL),
(35, 'Ng?? V??n Nguy??n', 'ngovannguyen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-17 01:58:57', NULL),
(36, 'L??u Vi??m', 'luuviem@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 02:00:24', NULL),
(37, 'Ngy Van A', 'ngyvana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-19 02:00:24', NULL),
(40, '?? V??n B', 'ovanb@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-25 02:02:29', NULL),
(41, '?? V??n C', 'ovanc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-12 02:02:29', NULL),
(42, 'Nguyen Di Anh', 'dianh@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(43, 'ng?? v??n ?????t', 'ngovandat@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(44, 'ng?? vn s???', 'ngovnso@gmail.com', '12345Aa', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(45, 'nguyen van man', 'nguyenvanman@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(46, 'truongthienan', 'truongthienan@gmail.com', '123Aa', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(47, 'nguyenabc', 'nguyenabc@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(48, 'Truong thua anh', 'kdlsio@gmail.com', '123Aa', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(49, 'Nguye', 'kdjisisi@gmail.com', 'aA123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(50, 'ng???ylkajdl', 'kdjishuqo@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(51, 'ngkadsjfo', 'ngkadsjfo@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(52, 'klkjaskdjfkdjsf', 'klkjaskdjfkdjsf@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(53, 'jksjlskdajfdkjd', 'jksjlskdajfdkj@gmail.com', 'aA123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(54, 'ngkjalksdf', 'ngkjalksdf@gmail.com', 'aA123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(55, 'timkiem', 'timkiem@gmail.com', '123Aa', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(56, 'kjaslkdfjlk', 'kjaslkdfjlk@gmail.com', 'aA123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(57, 'kljasdlkjsdakjf', 'kljasdlkjsdakjf@gmail.com', '123aA', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(59, 'nguyennguyen', 'nguyennguyen@gmail.com', '123Aa', 'Null', 1, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(60, 'nguyenguye', 'nguyenguye@gmail.com', '123Aa', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(61, 'nguyen_5', 'nguyen_5@gmail.com', '123Aa', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, NULL, NULL),
(62, 'nguyen_4', 'nguyen_4@gmail.com', '123Aa', 'Null', 1, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 05:54:55', NULL),
(76, 'banchuabiet', 'banchuabiet@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 23:14:55', '2021-08-05 23:15:45'),
(77, 'bancobiet', 'bancobiet@gmail.com', 'Aa123', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-05 23:15:23', '2021-08-05 23:15:37'),
(78, 'minhkobiet', 'minhkobiet@gmail.com', 'Aa123', 'Null', 1, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-06 01:30:53', '2021-08-06 01:34:21'),
(79, 'themmoi', 'themmoi@gmail.com', 'Aa123', 'Null', 1, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-06 02:09:58', '2021-08-06 02:10:05'),
(80, 'phimmoi', 'phimmoi@gmail.com', 'Aa123', 'Null', 0, 1, '3', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-06 03:27:17', NULL),
(81, 'phimnet', 'phimnet@gmail.com', 'Aa123', 'Null', 0, 1, '2', '2021-08-13 07:07:03', '127.0.0.1', NULL, '2021-08-06 03:28:56', '2021-08-06 03:30:46');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loyal_customers`
--
ALTER TABLE `loyal_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loyal_customers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_customers`
--
ALTER TABLE `mst_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mst_imports`
--
ALTER TABLE `mst_imports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `mst_users`
--
ALTER TABLE `mst_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mst_users_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loyal_customers`
--
ALTER TABLE `loyal_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mst_customers`
--
ALTER TABLE `mst_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mst_imports`
--
ALTER TABLE `mst_imports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `mst_product`
--
ALTER TABLE `mst_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mst_users`
--
ALTER TABLE `mst_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
