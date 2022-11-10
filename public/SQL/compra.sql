-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2022 a las 06:44:40
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
-- Base de datos: `compra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personal`
--

CREATE TABLE `tbl_personal` (
  `tbl_personal_ID` int(11) NOT NULL,
  `tbl_personal_NOMBRE` varchar(30) NOT NULL,
  `tbl_personal_APELLIDO` varchar(20) NOT NULL,
  `tbl_personal_TIPO_DOCUMENTO` varchar(10) NOT NULL,
  `tbl_personal_DOCUMENTO` varchar(20) NOT NULL,
  `tbl_personal_EMPRESA` varchar(30) NOT NULL,
  `tbl_personal_DIRECCION` varchar(30) NOT NULL,
  `tbl_personal_CELULAR` varchar(30) NOT NULL,
  `tbl_personal_CORREO` varchar(50) NOT NULL,
  `tbl_personal_PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_personal`
--

INSERT INTO `tbl_personal` (`tbl_personal_ID`, `tbl_personal_NOMBRE`, `tbl_personal_APELLIDO`, `tbl_personal_TIPO_DOCUMENTO`, `tbl_personal_DOCUMENTO`, `tbl_personal_EMPRESA`, `tbl_personal_DIRECCION`, `tbl_personal_CELULAR`, `tbl_personal_CORREO`, `tbl_personal_PASSWORD`) VALUES
(2, 'jeus', '', 'xx', 'Documento', 'Empresa', 'Direccion', 'Celular', 'CorreoElectronico', 'Contra'),
(3, 'Jesus', 'charry', 'CC', '1005681522', 'red', 'hjdhdbf', '3018765432', 'usuario', 'charry'),
(4, 'Jesus', 'Charry', 'CC', '1005681522', 'red', 'dfdfsdf', '3018765432', 'j@gail.com', 'chatt'),
(5, 'jesus ', 'charry', 'CE', '1005681522', 'red', 'dfdfsdf', '3018765432', 'j@gail.com', 'cjdnndjkndj');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_personal`
--
ALTER TABLE `tbl_personal`
  ADD PRIMARY KEY (`tbl_personal_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_personal`
--
ALTER TABLE `tbl_personal`
  MODIFY `tbl_personal_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
