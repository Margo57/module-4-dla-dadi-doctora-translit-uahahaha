-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 04 2017 г., 21:16
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
  `lol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `first_name`, `last_name`, `email`, `phone`, `pass`, `avatar`, `address`, `img_room`, `info`, `lol`) VALUES
(1, 'login', 'Маргарит', 'Вербицкая', 'rita070597@gmail.com', '79185145094', '81dc9bdb52d04dc20036dbd8313ed055', 'users/avatar/??????-02.png', '40-лет Победы', 'users/img-room/??????-03.png,users/img-room/??????-04.png,users/img-room/??????-05.png,users/img-room/??????-06.png,users/img-room/??????-07.png,users/img-room/??????-08.png,users/img-room/??????-09.png,users/img-room/??????-10.png,users/img-room/??????-11.png,users/img-room/??????-12.png,', 'Информация обо мне', 0),
(2, 'login', 'Маргарит', 'Вербицкая', 'rita070597@gmail.com', '79185145094', '81dc9bdb52d04dc20036dbd8313ed055', 'users/avatar/плашки-02.png', '40-лет Победы', 'users/img-room/плашки-03.png,users/img-room/плашки-04.png,users/img-room/плашки-05.png,users/img-room/плашки-06.png,users/img-room/плашки-07.png,users/img-room/плашки-08.png,users/img-room/плашки-09.png,users/img-room/плашки-10.png,users/img-room/плашки-11.png,users/img-room/плашки-12.png,', 'Информация обо мне', 0),
(3, 'login', 'Маргарит', 'Вербицкая', 'rita070597@gmail.com', '79185145094', '81dc9bdb52d04dc20036dbd8313ed055', 'users/avatar/плашки-02.png', '40-лет Победы', 'users/img-room/плашки-03.png,users/img-room/плашки-04.png,users/img-room/плашки-05.png,users/img-room/плашки-06.png,users/img-room/плашки-07.png,users/img-room/плашки-08.png,users/img-room/плашки-09.png,users/img-room/плашки-10.png,users/img-room/плашки-11.png,users/img-room/плашки-12.png,', 'Информация обо мне', 0),
(4, 'login', 'Маргарит', 'Вербицкая', 'rita070597@gmail.com', '79185145094', '81dc9bdb52d04dc20036dbd8313ed055', 'users/avatar/??????-02.png', '40-лет Победы', 'users/img-room/??????-03.png,users/img-room/??????-04.png,users/img-room/??????-05.png,users/img-room/??????-06.png,users/img-room/??????-07.png,users/img-room/??????-08.png,users/img-room/??????-09.png,users/img-room/??????-10.png,users/img-room/??????-11.png,users/img-room/??????-12.png,', 'Информация обо мне', 0),
(5, 'login', 'Маргарит', 'Вербицкая', 'rita070597@gmail.com', '79185145094', '81dc9bdb52d04dc20036dbd8313ed055', 'users/avatar/??????-02.png', '40-лет Победы', 'users/img-room/??????-03.png,users/img-room/??????-04.png,users/img-room/??????-05.png,users/img-room/??????-06.png,users/img-room/??????-07.png,users/img-room/??????-08.png,users/img-room/??????-09.png,users/img-room/??????-10.png,users/img-room/??????-11.png,users/img-room/??????-12.png,', 'Информация обо мне', 0),
(6, 'login', 'Маргарит', 'Вербицкая', 'rita070597@gmail.com', '79185145094', '81dc9bdb52d04dc20036dbd8313ed055', 'users/avatar/??????-02.png', '40-лет Победы', 'users/img-room/??????-03.png,users/img-room/??????-04.png,users/img-room/??????-05.png,users/img-room/??????-06.png,users/img-room/??????-07.png,users/img-room/??????-08.png,users/img-room/??????-09.png,users/img-room/??????-10.png,users/img-room/??????-11.png,users/img-room/??????-12.png,', 'Информация обо мне', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
