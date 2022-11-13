-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2022 a las 00:15:30
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
-- Indices de la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
