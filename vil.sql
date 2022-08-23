-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 23 2022 г., 01:54
-- Версия сервера: 5.7.31
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vil`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `cid` int(11) NOT NULL,
  `cname` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`cid`, `cname`) VALUES
(0, 'Msk'),
(1, 'Spb'),
(2, 'Down-Town'),
(3, 'N-city');

-- --------------------------------------------------------

--
-- Структура таблицы `villagers`
--

DROP TABLE IF EXISTS `villagers`;
CREATE TABLE IF NOT EXISTS `villagers` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `cid` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `villagers`
--

INSERT INTO `villagers` (`id`, `name`, `age`, `cid`) VALUES
(1, 'Petya', 23, 0),
(2, 'Vanya', 17, 1),
(5, 'Michael', 32, 2),
(6, 'Unknown', 43, 3),
(7, 'Antuan', 10, 0),
(8, 'Mila', 51, 1),
(10, 'Gregor', 35, 2),
(15, 'Anastasiya', 23, 0),
(17, 'Bruh', 28, 0),
(18, 'Hello World!', 12, 1),
(19, 'Try', 19, 2),
(20, 'Another', 19, 1),
(23, 'Nerida', 18, 0),
(28, 'Zubenko Michael Petrovich', 66, 0),
(29, 'Boris', 35, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
