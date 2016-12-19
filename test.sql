-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 19 2016 г., 01:52
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `phone`
--

CREATE TABLE IF NOT EXISTS `phone` (
  `id_phone` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(11) NOT NULL,
  `id_phonbook` int(11) NOT NULL,
  PRIMARY KEY (`id_phone`),
  KEY `id_phonbook` (`id_phonbook`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `phone`
--

INSERT INTO `phone` (`id_phone`, `number`, `id_phonbook`) VALUES
(26, '123456789', 14),
(27, '123456789', 14),
(28, '123456789', 14),
(30, '123456789', 14),
(31, '7894561230', 14),
(35, '1232123123', 14),
(37, '0123123123', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `phonebook`
--

CREATE TABLE IF NOT EXISTS `phonebook` (
  `id_phonbook` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `surname` varchar(55) NOT NULL,
  `patronymic` varchar(55) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id_phonbook`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `phonebook`
--

INSERT INTO `phonebook` (`id_phonbook`, `name`, `surname`, `patronymic`, `date`) VALUES
(14, '21331', '231231', '23123123', '2018'),
(16, '123123', '3212313', '1232311232123', '19-12-16');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`id_phonbook`) REFERENCES `phonebook` (`id_phonbook`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
