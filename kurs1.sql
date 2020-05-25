-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 26 2020 р., 00:37
-- Версія сервера: 10.3.22-MariaDB
-- Версія PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `kurs1`
--

-- --------------------------------------------------------

--
-- Структура таблиці `table_content`
--

CREATE TABLE `table_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photourl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `table_content`
--

INSERT INTO `table_content` (`id`, `title`, `decs`, `photourl`, `created_by`) VALUES
(1, 'Blue', 'Blue', 'https://s.ftcdn.net/v2013/pics/all/curated/RKyaEDwp8J7JKeZWQPuOVWvkUjGQfpCx_cover_580.jpg?r=1a0fc22192d0c808b8bb2b9bcfbf4a45b1793687', 0),
(3, 'Butterfly', 'Butterfly', 'https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg', 0),
(7, 'Sea', 'Sea', 'https://www.vladmuz.ru/travel_photos/crimea/11-big.jpg', 0),
(14, 'Wolf', 'Wolf', 'https://bigpicture.ru/wp-content/uploads/2015/11/nophotoshop29-800x532.jpg', 0),
(16, 'Nature', 'Nature', 'https://12millionov.com/wp-content/uploads/2016/08/%D0%A4%D0%BE%D1%82%D0%BE-%D0%BF%D1%80%D0%B8%D1%80%D0%BE%D0%B4%D1%8B_1.jpg', 0),
(18, 'Gopher', 'Gopher', 'https://static.ukrinform.com/photos/2019_09/thumb_files/630_360_1568214250-612.jpg', 0),
(19, 'Carpathians', 'Carpathians', 'https://natworld.info/wp-content/uploads/2018/01/Сочинение-на-тему-Природа-900x500.jpeg', 34),
(20, 'Koala', 'Koala', 'https://businessvisit.com.ua/wp-content/uploads/2016/08/Koala-1.jpg', 34),
(21, 'Flowers', 'Flowers', 'https://cdn.pixabay.com/photo/2018/02/26/05/20/flowers-3182324_960_720.jpg', 34);

-- --------------------------------------------------------

--
-- Структура таблиці `ticket`
--

CREATE TABLE `ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `email`, `created_at`, `updated_at`, `user_id`) VALUES
(28, 'sophiast', 'stsofi973@gmail.com', '2020-05-25 20:48:54', '2020-05-25 20:48:54', 34),
(29, 'Anna', 'anna123@gmail.com', '2020-05-25 21:15:15', '2020-05-25 21:15:15', 34),
(30, 'Inna', 'inna1inna@gmail.com', '2020-05-25 21:17:28', '2020-05-25 21:17:28', 34),
(31, 'Ilona', 'ilona1256@gmail.com', '2020-05-25 21:17:42', '2020-05-25 21:17:42', 34),
(32, 'Olena', 'olena123@gmail.com', '2020-05-25 21:18:21', '2020-05-25 21:18:21', 34),
(33, 'Lilia', 'lilialilia1@gmail.com', '2020-05-25 21:18:50', '2020-05-25 21:18:50', 34),
(34, 'Vira', 'Vira667@gmail.com', '2020-05-25 21:19:18', '2020-05-25 21:19:18', 34),
(35, 'Nadya', 'Nadya7@gmail.com', '2020-05-25 21:19:45', '2020-05-25 21:19:45', 34),
(36, 'Alina', 'Alinadr2@gmail.com', '2020-05-25 21:20:34', '2020-05-25 21:20:34', 34),
(37, 'Yulia', 'yulia12@gmail.com', '2020-05-25 21:20:54', '2020-05-25 21:20:54', 34),
(38, 'Sophia', 'sophiast1506@gmail.com', '2020-05-25 21:21:20', '2020-05-25 21:21:20', 34);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
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
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, ':name', ':email', NULL, ':pass', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'admin', 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Inna', 'inna1inna@gmail.com', NULL, '307ddd2a1908f59f48bf273c3dd98b9f', NULL, '2020-05-25 19:57:01', '2020-05-25 19:57:01'),
(39, 'Ilona', 'ilona1256@gmail.com', NULL, '59e6b1b15309e6a6f8644e3f2a98a392', NULL, '2020-05-25 20:48:27', '2020-05-25 20:48:27'),
(40, 'Sophia', 'stsofi973@gmail.com', NULL, '4297f44b13955235245b2497399d7a93', NULL, '2020-05-25 21:22:17', '2020-05-25 21:22:17'),
(41, 'Ilona', 'ilonkaa@gmail.com', NULL, '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2020-05-25 21:22:53', '2020-05-25 21:22:53'),
(42, 'Yulia', 'yilia34@gmail.com', NULL, 'e9e80fe53a666677723fceacaa87365d', NULL, '2020-05-25 21:23:27', '2020-05-25 21:23:27'),
(43, 'Nadya', 'Nadya7@gmail.com', NULL, '045dd8a8bae7202f1929a8c1b7050492', NULL, '2020-05-25 21:24:10', '2020-05-25 21:24:10'),
(44, 'Vira', 'Vira667@gmail.com', NULL, '2a2717956118b4d223ceca17ce3865e2', NULL, '2020-05-25 21:24:25', '2020-05-25 21:24:25'),
(45, 'Alina', 'Alinadr2@gmail.com', NULL, 'a5e00132373a7031000fd987a3c9f87b', NULL, '2020-05-25 21:24:42', '2020-05-25 21:24:42'),
(46, 'Svitlana', 'svitlana5@gmail.com', NULL, 'd90b70e389d1383be0f5ee2d6018760f', NULL, '2020-05-25 21:35:32', '2020-05-25 21:35:32');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `table_content`
--
ALTER TABLE `table_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Індекси таблиці `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `table_content`
--
ALTER TABLE `table_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблиці `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
