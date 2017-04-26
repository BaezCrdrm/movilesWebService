-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2017 a las 23:56:56
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `broadcaster`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `channels`
--

CREATE TABLE `channels` (
  `ch_id` int(11) NOT NULL,
  `ch_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ch_abv` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `ch_img` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `ev_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ev_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ev_sch` datetime NOT NULL,
  `ev_des` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Event description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_channel`
--

CREATE TABLE `event_channel` (
  `ev_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pass`
--

CREATE TABLE `pass` (
  `id` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pass`
--

INSERT INTO `pass` (`id`, `pwd`) VALUES
('admin@admin.com', '459567d3bde4418b7fe302ff9809c4b0befaf7dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `tp_id` int(11) NOT NULL,
  `tp_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tp_img` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_event`
--

CREATE TABLE `type_event` (
  `tp_id` int(11) NOT NULL,
  `ev_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_age`) VALUES
('admin@admin.com', 'Admin', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indices de la tabla `event_channel`
--
ALTER TABLE `event_channel`
  ADD KEY `fk_evch_ev_idx` (`ev_id`),
  ADD KEY `fk_evch_ch_idx` (`ch_id`);

--
-- Indices de la tabla `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indices de la tabla `type_event`
--
ALTER TABLE `type_event`
  ADD KEY `fk_ev_evtp` (`ev_id`),
  ADD KEY `fk_tp_evtp` (`tp_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `event_channel`
--
ALTER TABLE `event_channel`
  ADD CONSTRAINT `fk_evch_ch` FOREIGN KEY (`ch_id`) REFERENCES `channels` (`ch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evch_ev` FOREIGN KEY (`ev_id`) REFERENCES `event` (`ev_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pass`
--
ALTER TABLE `pass`
  ADD CONSTRAINT `fk_pass_usr` FOREIGN KEY (`id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `type_event`
--
ALTER TABLE `type_event`
  ADD CONSTRAINT `fk_ev_evtp` FOREIGN KEY (`ev_id`) REFERENCES `event` (`ev_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tp_evtp` FOREIGN KEY (`tp_id`) REFERENCES `types` (`tp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;