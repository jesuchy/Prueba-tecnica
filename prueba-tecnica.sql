-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2022 a las 02:51:00
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba-tecnica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora`
--

CREATE TABLE `tbl_bitacora` (
  `id` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `IdVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_bitacora`
--

INSERT INTO `tbl_bitacora` (`id`, `IdPersona`, `IdVehiculo`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Identificacion` varchar(20) NOT NULL,
  `Profesion` varchar(40) NOT NULL,
  `Casado` tinyint(1) NOT NULL,
  `IngresosMensuales` double NOT NULL,
  `VeiculoActual` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`Id`, `Nombres`, `Apellidos`, `FechaNacimiento`, `Identificacion`, `Profesion`, `Casado`, `IngresosMensuales`, `VeiculoActual`, `estado`) VALUES
(1, 'Jesus Manue', 'Charry Meza', '2002-05-18', '1005681522', 'Programacion de softaware', 0, 1000122, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vehiculo`
--

CREATE TABLE `tbl_vehiculo` (
  `Id` int(11) NOT NULL,
  `Placa` varchar(20) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `NumeroPuertas` int(11) NOT NULL,
  `TipoVehiculo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_vehiculo`
--

INSERT INTO `tbl_vehiculo` (`Id`, `Placa`, `Marca`, `Modelo`, `NumeroPuertas`, `TipoVehiculo`, `estado`) VALUES
(1, 'AAA-123', 'RENAULT', 'RENAULT STEPWAY 2002', 4, 'SUV ', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdPersona` (`IdPersona`),
  ADD KEY `IdVehiculo` (`IdVehiculo`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `VeiculoActual` (`VeiculoActual`);

--
-- Indices de la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `tbl_persona` (`Id`),
  ADD CONSTRAINT `tbl_bitacora_ibfk_2` FOREIGN KEY (`IdVehiculo`) REFERENCES `tbl_vehiculo` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
