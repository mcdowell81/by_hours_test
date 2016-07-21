-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-07-2016 a las 16:54:05
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `by_hours_test_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

CREATE TABLE `hotels` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `created`, `modified`) VALUES
('953f354c-4ea5-11e6-8c4a-3c07546b3c35', 'hotel01', '2016-07-20 00:00:00', '2016-07-20 00:00:00'),
('953f44a6-4ea5-11e6-8c4a-3c07546b3c35', 'hotel02', '2016-07-20 00:00:00', '2016-07-20 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`) VALUES
(20160720175152, 'CreateHotels', '2016-07-20 16:06:35', '2016-07-20 16:06:35'),
(20160720175457, 'CreateRooms', '2016-07-20 16:06:35', '2016-07-20 16:06:35'),
(20160720175634, 'CreateReservations', '2016-07-20 16:06:35', '2016-07-20 16:06:35'),
(20160720175719, 'CreateUsers', '2016-07-20 16:06:35', '2016-07-20 16:06:35'),
(20160720175828, 'AddIdUserToReservations', '2016-07-20 16:06:35', '2016-07-20 16:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` char(36) NOT NULL,
  `idRoom` char(36) NOT NULL,
  `idUser` char(36) NOT NULL,
  `checkinDate` datetime NOT NULL,
  `nights` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` char(36) NOT NULL,
  `idHotel` char(36) NOT NULL,
  `roomNumber` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `nightPrice` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `idHotel`, `roomNumber`, `beds`, `nightPrice`, `created`, `modified`) VALUES
('036bd336-4ea6-11e6-8c4a-3c07546b3c35', '953f354c-4ea5-11e6-8c4a-3c07546b3c35', 101, 2, 70, '2016-07-20 00:00:00', '2016-07-20 00:00:00'),
('036bdf5c-4ea6-11e6-8c4a-3c07546b3c35', '953f354c-4ea5-11e6-8c4a-3c07546b3c35', 201, 1, 60, '2016-07-20 00:00:00', '2016-07-20 00:00:00'),
('24887358-4ea6-11e6-8c4a-3c07546b3c35', '953f44a6-4ea5-11e6-8c4a-3c07546b3c35', 101, 2, 80, '2016-07-20 00:00:00', '2016-07-20 00:00:00'),
('24887fb0-4ea6-11e6-8c4a-3c07546b3c35', '953f44a6-4ea5-11e6-8c4a-3c07546b3c35', 102, 2, 82, '2016-07-20 00:00:00', '2016-07-20 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `created`, `modified`) VALUES
('41963836-4ea6-11e6-8c4a-3c07546b3c35', 'user01', '2016-07-20 00:00:00', '2016-07-20 00:00:00'),
('4196434e-4ea6-11e6-8c4a-3c07546b3c35', 'user02', '2016-07-20 00:00:00', '2016-07-20 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
