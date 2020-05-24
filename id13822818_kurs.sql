-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 24 2020 г., 17:18
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `id13822818_kurs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_23_031433_create_table_content', 2),
(4, '2020_05_23_040430_create_ticket_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `table_content`
--

CREATE TABLE `table_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photourl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `table_content`
--

INSERT INTO `table_content` (`id`, `title`, `decs`, `photourl`, `created_by`) VALUES
(1, 'sdas', 'asdas', 'https://s.ftcdn.net/v2013/pics/all/curated/RKyaEDwp8J7JKeZWQPuOVWvkUjGQfpCx_cover_580.jpg?r=1a0fc22192d0c808b8bb2b9bcfbf4a45b1793687', 0),
(3, 'asdasd', 'sds', 'https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg', 0),
(6, 'sdd', 'ddsd', 'https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png', 0),
(7, '12', '12', 'https://www.vladmuz.ru/travel_photos/crimea/11-big.jpg', 0),
(14, 'sdd', '12', 'https://bigpicture.ru/wp-content/uploads/2015/11/nophotoshop29-800x532.jpg', 0),
(16, '213', '121', 'https://12millionov.com/wp-content/uploads/2016/08/%D0%A4%D0%BE%D1%82%D0%BE-%D0%BF%D1%80%D0%B8%D1%80%D0%BE%D0%B4%D1%8B_1.jpg', 0),
(18, '222', '222', 'https://static.ukrinform.com/photos/2019_09/thumb_files/630_360_1568214250-612.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `email`, `created_at`, `updated_at`, `user_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL),
(2, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(3, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(4, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(5, '', '', NULL, NULL, NULL),
(6, '', '', NULL, NULL, NULL),
(7, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(8, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(9, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(10, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(11, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(12, 'sdasdasdas asdasdasd', '', NULL, NULL, NULL),
(13, '', '', NULL, NULL, NULL),
(14, '', '', NULL, NULL, NULL),
(15, '', '', NULL, NULL, NULL),
(16, '', '', NULL, NULL, NULL),
(17, '', '', NULL, NULL, NULL),
(18, '', '', NULL, NULL, NULL),
(19, '', '', NULL, NULL, NULL),
(20, '', '', NULL, NULL, NULL),
(21, 'Стець Софія Ігорівна', 'sost833@gmail.com', NULL, NULL, NULL),
(22, 'Стець Софія Ігорівна', 'sost833@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, ':name', ':email', NULL, ':pass', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'sadasd', 'asdasd', NULL, 'dasdas', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'sadasd', 'asdas', NULL, '202cb962ac59075b964b07152d234b70', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'admin', 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'asd', 'asd', NULL, '7815696ecbf1c96e6894b779456d330e', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_content`
--
ALTER TABLE `table_content`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `table_content`
--
ALTER TABLE `table_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
