-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2020 г., 23:31
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `power` int(1) NOT NULL,
  `health` int(1) NOT NULL,
  `level` int(2) NOT NULL,
  `expirience` int(2) NOT NULL,
  `level_points` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `power`, `health`, `level`, `expirience`, `level_points`) VALUES
(2, 'Makirta', 8, 7, 15, 11, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users_save`
--

CREATE TABLE `users_save` (
  `id` int(11) NOT NULL,
  `user_id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `power` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `expirience` int(11) NOT NULL,
  `level_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_save`
--

INSERT INTO `users_save` (`id`, `user_id`, `name`, `power`, `health`, `level`, `expirience`, `level_points`) VALUES
(25, 2, 'Makirta', 8, 7, 15, 11, 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_save`
--
ALTER TABLE `users_save`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users_save`
--
ALTER TABLE `users_save`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
