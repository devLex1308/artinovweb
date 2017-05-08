-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 06 2017 р., 21:38
-- Версія сервера: 5.5.50
-- Версія PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `goto`
--

-- --------------------------------------------------------

--
-- Структура таблиці `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `id` int(11) NOT NULL,
  `name_start` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_end` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carriage_id` int(11) NOT NULL,
  `id_stations_start` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_stations_end` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delta_time_start` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delta_time_end` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_real` tinyint(1) NOT NULL,
  `neighboring_stop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_x` double NOT NULL,
  `map_y` double NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `time_route_start_id` int(11) NOT NULL,
  `carriage_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `is_rest_day` tinyint(1) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `time_route_start`
--

CREATE TABLE IF NOT EXISTS `time_route_start` (
  `id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `way` tinyint(1) NOT NULL,
  `time_start` time NOT NULL,
  `depo` int(11) NOT NULL,
  `is_rest_day` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carriage_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `type_carriage`
--

CREATE TABLE IF NOT EXISTS `type_carriage` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `type_carriage`
--

INSERT INTO `type_carriage` (`id`, `name`) VALUES
(1, 'Трамвай'),
(2, 'Тролейбус'),
(3, 'Автобус');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carriage_id` (`carriage_id`);

--
-- Індекси таблиці `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `time_route_start_id` (`time_route_start_id`),
  ADD KEY `carriage_id` (`carriage_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Індекси таблиці `time_route_start`
--
ALTER TABLE `time_route_start`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `depo` (`depo`);

--
-- Індекси таблиці `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carriage_id` (`carriage_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Індекси таблиці `type_carriage`
--
ALTER TABLE `type_carriage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `time_route_start`
--
ALTER TABLE `time_route_start`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `type_carriage`
--
ALTER TABLE `type_carriage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`carriage_id`) REFERENCES `type_carriage` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_5` FOREIGN KEY (`station_id`) REFERENCES `station` (`id`),
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`time_route_start_id`) REFERENCES `time_route_start` (`id`),
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`carriage_id`) REFERENCES `type_carriage` (`id`),
  ADD CONSTRAINT `timetable_ibfk_4` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `time_route_start`
--
ALTER TABLE `time_route_start`
  ADD CONSTRAINT `time_route_start_ibfk_2` FOREIGN KEY (`depo`) REFERENCES `station` (`id`),
  ADD CONSTRAINT `time_route_start_ibfk_1` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `transport_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`),
  ADD CONSTRAINT `transport_ibfk_1` FOREIGN KEY (`carriage_id`) REFERENCES `type_carriage` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
