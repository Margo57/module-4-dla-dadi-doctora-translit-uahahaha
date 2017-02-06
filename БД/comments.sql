-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 06 2017 г., 14:30
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `module4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `id_author` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `text_comment` varchar(500) NOT NULL,
  `time_comment` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_author`, `id_user`, `text_comment`, `time_comment`) VALUES
(1, 2, 1, 'Комментарий Ивана Ивановича пользователю Маргарите Вербицкой', '15:53:55'),
(2, 3, 2, 'Комментарий Марины Морозовой пользователю Ивану Ивановичу', '17:50:55'),
(3, 1, 2, 'Комментарий Маргариты Вербицкой пользователю Ивану Ивановичу', '18:44:42'),
(4, 2, 1, 'Комментарий Ивана Ивановича пользователю Маргарите Вербицкой', '19:34:00'),
(5, 3, 1, 'Комментарий Марины Морозовой пользователю Маргарите Вербицкой', '20:50:55'),
(6, 3, 2, 'Марина оставила ещё один комментарий о пользователе Иване Ивановиче', '08:43:36'),
(7, 3, 2, 'Марина Морозова решила оставить ещё один комментарий, дабы посмотреть, увеличится ли количество комментариев', '08:56:55'),
(8, 3, 2, '&quot;Урааа, количество комментариев увеличилось&quot; - воскликнула Марина', '08:57:26'),
(9, 1, 3, 'Комментарий для Марины', '10:15:28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`,`id_user`),
  ADD KEY `id_users` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
