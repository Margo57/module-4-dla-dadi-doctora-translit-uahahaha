-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 05 2017 г., 16:30
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
  `info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `first_name`, `last_name`, `email`, `phone`, `pass`, `avatar`, `address`, `img_room`, `info`) VALUES
(1, 'rita', 'Маргарита', 'Вербицкая', 'rita070597@gmail.com', '79185145094', '81dc9bdb52d04dc20036dbd8313ed055', 'users/avatar/rita-плашки-02.png', '40-лет Победы', 'users/img-room/rita-плашки-11.png,users/img-room/rita-плашки-06.png,users/img-room/rita-плашки-05.png,users/img-room/rita-плашки-04.png,users/img-room/rita-плашки-02.png,', 'Информация обо мне'),
(2, 'login', 'Иван', 'Иванович', 'dk@insitu.by', '79185145094', 'd93591bdf7860e1e4ee2fca799911215', 'users/avatar/плашки-03.png', '40-лет Победы', 'users/img-room/login-плашки-11.png', 'Инфо');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
