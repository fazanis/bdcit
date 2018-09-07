-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 07 2018 г., 14:57
-- Версия сервера: 5.7.11
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bdcit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orobrazovania`
--

CREATE TABLE IF NOT EXISTS `orobrazovania` (
  `id` int(11) NOT NULL,
  `id_org` int(20) NOT NULL,
  `raion` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_kz` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orobrazovania`
--

INSERT INTO `orobrazovania` (`id`, `id_org`, `raion`, `name`, `name_kz`, `type`, `password`, `fio`, `phone`, `email`) VALUES
(1, 1234234, 2, 'назв ру', 'назв каз', 1, '$2y$10$8l7U61aPoHMej5dVhKHwKO5GA4N38kfvce9yjRlzazWjbMZBivKJq', NULL, NULL, NULL),
(2, 123654, 2, 'Каирбаева', 'Каирбаева', 1, '$2y$10$KWzuhXGVVyKILKTc/tm/3ekMRqvZ.AISLXugteLQYj0U7XcF22.am', NULL, NULL, NULL),
(3, 11111, 5, 'СШ им. М. Каирбаева Актогайского района', 'Каирбаева', 2, '$2y$10$o5hvVFoVsdA52YFqOo7no.fQce2dbmADp/7rQ2gH0y5TJ0DguYpq2', 'Выкрутасов Семен Николаеич', '+77052658963', 'semen@maeil.ru'),
(4, 3418, 6, 'Коммунальное государственное учреждение ''Кудайкольская средняя общеобразовательная школа отдела образования акимата города Экибастуза''', 'Екібастуз қаласы әкімдігінің білім бөлімінің Құдайкөл жалпы орта білім беретін мектеп коммуналдық мемлекеттік мекеме', 2, '', NULL, NULL, NULL),
(5, 123455, 4, 'новая школа', 'новая школа', 2, '$2y$10$ZlpQUFrjinE.b3gtBlYo4ekw21QI0v3d3tHA2cTQnZnf9HneIYPQq', NULL, NULL, NULL),
(6, 5555555, 5, 'Какаято школа', 'Какаято школа', 1, '5555555', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `raioni`
--

CREATE TABLE IF NOT EXISTS `raioni` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `raioni`
--

INSERT INTO `raioni` (`id`, `name`) VALUES
(2, 'Аксу'),
(4, 'Павлодарский район'),
(5, 'Актогайский район'),
(6, 'Иртышский район');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`, `role`) VALUES
(1, 'Администратор ', 'admin'),
(2, 'Аналитик', 'analitik'),
(3, 'Отдел образования', 'otdel');

-- --------------------------------------------------------

--
-- Структура таблицы `type_org`
--

CREATE TABLE IF NOT EXISTS `type_org` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_org`
--

INSERT INTO `type_org` (`id`, `name`) VALUES
(1, 'Специализированные организации образования'),
(2, 'Организации среднего образования(начального, основного среднего и общего среднего)');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fio`, `name`, `email`, `phone`, `login`, `password`, `access`) VALUES
(1, 'Кравчук Александр', 'ЦЕНТР ИНФОРМАЦИОННЫХ ТЕХНОЛОГИЙ', 'fazanis@mail.ru', '7052685886', 'admin', '$2y$10$KVFUia6lIfBbetQFqw2zvODwh/NQe.QbYMd0qXVUb06a6WNCmrqWG', 1),
(2, 'Асия', 'ЦИТ', '325092@mail.ru', '325092', 'asia', '$2y$10$reyFbQxaefQtN2RFeZGIE.6HVZ2lyuXzAkGWyQ8RquI.eJzMfL0T2', 2),
(3, 'Роман', 'Отдел образования Актогайского Района', 'roman@mail.ru', '526352225', 'roman', '$2y$10$HRb5tKuMiAlsl1.TRGSNYepAYX51feHfdivdxm.ws5W/Jxi.t7bHe', 3),
(8, 'Павел', 'Отдел образования Иртышского Района', 'pavel@mail.ru', '87075236987', 'pavel', '$2y$10$068ZuvZoXGGlWStiqIrZvelam0WgyySDrPPlgSEZGn2J9LQ3KXo9C', 3),
(9, 'Рауан', 'Отдел образования Успенского Района', 'rauana@mail.ru', '87013692578', 'rauan', '$2y$10$4jTmedaUL1kmKl0eACnPlOO8Srmg3Sp6ea8VYoJH8c3.DllhO54qe', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orobrazovania`
--
ALTER TABLE `orobrazovania`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `raioni`
--
ALTER TABLE `raioni`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_org`
--
ALTER TABLE `type_org`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orobrazovania`
--
ALTER TABLE `orobrazovania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `raioni`
--
ALTER TABLE `raioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `type_org`
--
ALTER TABLE `type_org`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
