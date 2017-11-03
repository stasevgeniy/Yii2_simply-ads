 -- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 03 2017 г., 15:11
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ads`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Ads`
--

CREATE TABLE `Ads` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `phone` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Ads`
--

INSERT INTO `Ads` (`id`, `title`, `text`, `phone`, `date`) VALUES
(1, 'Продам квартиру в центре', 'Евроремонт, 2 комнаты, ул. Пушкинская 1', '+380965545454', '2017-11-02 23:58:51'),
(2, 'Продам ноутбук', 'Lenovo Z550, в хорошем состоянии', '+380965547295', '2017-11-02 23:58:51'),
(7, 'Продам BMW X5', '2015 года, в идеальном состоянии', '+380965547295', '2017-11-02 23:58:51'),
(8, 'Продам Iphone 7', 'Хорошее состояние, 256ГБ', '+380965547295', '2017-11-02 23:58:51'),
(15, 'Продам квартиру в центре', 'Евроремонт, 2 комнаты, ул. Пушкинская 1', '+380965547295', '2017-11-03 00:04:48'),
(16, 'Продам планшет', 'Ipad, 2015 года', '+380965547205', '2017-11-03 10:27:40'),
(17, 'Продам холодильник', 'LG, новый', '+380965547295', '2017-11-03 11:44:17'),
(18, 'Продам BMW X3', '2009, хорошее состоние', '+380965547295', '2017-11-03 11:44:52'),
(19, 'Продам дом', '200 квадратов, возле моря', '+380965547295', '2017-11-03 11:45:28'),
(20, 'Продам телевизор', 'Samsung', '+380965547295', '2017-11-03 11:46:03'),
(21, 'Продам квартиру', '2 комнаты, в центре', '+380965547295', '2017-11-03 11:46:33'),
(22, 'Продам телеофн', 'Iphone 8, новый', '+380965547295', '2017-11-03 11:46:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Ads`
--
ALTER TABLE `Ads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Ads`
--
ALTER TABLE `Ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
