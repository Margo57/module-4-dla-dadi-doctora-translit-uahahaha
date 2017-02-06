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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(120) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `avatar` varchar(1000) NOT NULL,
  `address` varchar(100) NOT NULL,
  `img_room` varchar(1000) NOT NULL,
  `info` varchar(500) NOT NULL,
  `rating` int(20) NOT NULL,
  `rating_sum` int(100) NOT NULL,
  `rating_user_selected` varchar(100) NOT NULL,
  `comments_sum` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `first_name`, `last_name`, `email`, `phone`, `pass`, `avatar`, `address`, `img_room`, `info`, `rating`, `rating_sum`, `rating_user_selected`, `comments_sum`) VALUES
(1, 'rita', 'Маргарита', 'Вербицкая', 'rita070597@gmail.com', '79185145094', '81dc9bdb52d04dc20036dbd8313ed055', 'users/avatar/rita-плашки-02.png', '40-лет Победы, 2', 'users/img-room/rita-плашки-12.png,users/img-room/rita-плашки-08.png', 'Информация обо мне', 5, 2, '1,2', 3),
(2, 'login', 'Иван', 'Иванович', 'dk@insitu.by', '79185145094', 'd93591bdf7860e1e4ee2fca799911215', 'users/avatar/плашки-03.png', '40-лет Победы, 1', 'users/img-room/login-плашки-05.png,users/img-room/login-плашки-04.png,users/img-room/login-плашки-03.png', 'Инфо', 5, 1, '1', 5),
(3, 'moonbegg', 'Марина', 'Морозова', 'margo0705rksi@gmail.com', '+7 (918) 514-50-94', '6074c6aa3488f3c2dddff2a7ca821aab', 'users/avatar/moonbegg-плашки-07.png', 'Адрес', 'users/img-room/moonbegg-плашки-02.png,users/img-room/moonbegg-плашки-03.png', 'Ьщщтиупп', 5, 1, '2', 1),
(4, 'rita0705', 'Маргарита', 'Вербицкая', 'ritav161@mail.ru', '+7 (918) 514-50-94', 'd79c8788088c2193f0244d8f1f36d2db', 'users/avatar/rita0705-oop.jpg', 'Адрес', 'users/img-room/rita0705-плашки-02.png,users/img-room/rita0705-плашки-03.png', 'Информация', 5, 1, '2', 0),
(5, 'rita070597', 'Маргарита', 'Вербицкая', 'ritav161@mail.ru', '+7 (918) 514-50-94', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'users/avatar/rita070597-oop.jpg', 'Адрес', 'users/img-room/rita070597-плашки-02.png,users/img-room/rita070597-плашки-03.png', 'Информация', 0, 0, '', 0);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
