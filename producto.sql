-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 09:37:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fitclub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_producto` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` int(4) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `cod_cat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `nombre`, `descripcion`, `precio`, `imagen`, `cod_cat`) VALUES
(13, 'q1', 'q', 56, '/Fitclub/Img/placa.jpg', '1'),
(15, 'q3', '1', 64, '', '1'),
(16, 'q2', '1', 252, '', '2'),
(18, 'Bbida Energetica monster', 'q', 12, '/Fitclub/Img/placa.jpg', '3'),
(19, 'Gatorade', '1', 1, '', '2'),
(20, 'Cripsy Table', '1', 99, '', '1'),
(21, 'Mamadongo', '1', 111, '', '2'),
(22, 'Paquete Oreo blanco x6', '1', 342, '', '3'),
(23, '4', '4', 343, '4', '4'),
(25, '7', '7', 7, '4', '4'),
(26, 'weboi', '1', 1, '4', '4'),
(27, 'z', 'z', 1, 'z', '1'),
(30, 'wawa', 'sdsdsds', 1212, '2', '4'),
(31, 'aas', 'as', 5, 'as', '4'),
(32, 'xcxc', 'xcxc', 9, 'xcxc', '4'),
(34, 'a', 'a', 12, 'a', '2'),
(35, 'asas', 'z', 1, 'z', '2'),
(36, 'sxz', 'asassass', 1, 'xx', '4'),
(37, 'xxx', 'xxx', 12, 'xxx', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
