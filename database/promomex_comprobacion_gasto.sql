-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-03-2018 a las 12:26:53
-- Versión del servidor: 5.6.32-78.1
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `promomex_comprobacion_gasto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE IF NOT EXISTS `escuelas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ueg_id` char(5) NOT NULL,
  `municipios_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`id`, `nombre`, `ueg_id`, `municipios_id`) VALUES
(1, 'Escuela 1', '00001', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE IF NOT EXISTS `regiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `nombre`) VALUES
(1, 'Region 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `id` int(11) NOT NULL COMMENT 'catalogo de municipios',
  `nombre` varchar(45) NOT NULL,
  `regiones_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`, `regiones_id`) VALUES
(1, 'Guadalajara', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpg`
--

CREATE TABLE IF NOT EXISTS `tpg` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tpg`
--

INSERT INTO `tpg` (`id`, `descripcion`, `estatus`) VALUES
(1, 'Tipo Prog 1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ueg`
--

CREATE TABLE IF NOT EXISTS `ueg` (
  `id` char(5) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `año` int(11) NOT NULL,
  `ur_id` char(3) NOT NULL,
  `estatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ueg`
--

INSERT INTO `ueg` (`id`, `descripcion`, `año`, `ur_id`, `estatus`) VALUES
('00001', 'Descripcion UEG 000001', 2018, '001', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `up`
--

CREATE TABLE IF NOT EXISTS `up` (
  `id` char(2) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `año` int(11) NOT NULL,
  `estatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `up`
--

INSERT INTO `up` (`id`, `descripcion`, `año`, `estatus`) VALUES
('01', 'Descripcion UP01', 2018, 1),
('02', 'Descripcion UP01', 2018, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ur`
--

CREATE TABLE IF NOT EXISTS `ur` (
  `id` char(3) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `año` int(11) NOT NULL,
  `up_id` char(2) NOT NULL,
  `estatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ur`
--

INSERT INTO `ur` (`id`, `descripcion`, `año`, `up_id`, `estatus`) VALUES
('001', 'Descripcion UR001', 2018, '01', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_escuelas_ueg1_idx` (`ueg_id`), ADD KEY `fk_escuelas_municipios1_idx` (`municipios_id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_municipios_regiones1_idx` (`regiones_id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tpg`
--
ALTER TABLE `tpg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ueg`
--
ALTER TABLE `ueg`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `clave_UNIQUE` (`id`), ADD KEY `fk_ueg_ur1_idx` (`ur_id`);

--
-- Indices de la tabla `up`
--
ALTER TABLE `up`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `clave_UNIQUE` (`id`);

--
-- Indices de la tabla `ur`
--
ALTER TABLE `ur`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `clave_UNIQUE` (`id`), ADD KEY `fk_ur_up1_idx` (`up_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'catalogo de municipios',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tpg`
--
ALTER TABLE `tpg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `escuelas`
--
ALTER TABLE `escuelas`
ADD CONSTRAINT `fk_escuelas_municipios` FOREIGN KEY (`municipios_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_escuelas_ueg1` FOREIGN KEY (`ueg_id`) REFERENCES `ueg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
ADD CONSTRAINT `fk_municipios_regiones1` FOREIGN KEY (`regiones_id`) REFERENCES `regiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ueg`
--
ALTER TABLE `ueg`
ADD CONSTRAINT `fk_ueg_ur1` FOREIGN KEY (`ur_id`) REFERENCES `ur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ur`
--
ALTER TABLE `ur`
ADD CONSTRAINT `fk_ur_up1` FOREIGN KEY (`up_id`) REFERENCES `up` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
