-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 18:45:07
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cod_cat` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cod_cat`, `nombre`, `descripcion`) VALUES
(1, 'bebidas', 'awawaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(2, 'galletas', 'aefgbqewgwrbwrbwrbwrb'),
(3, 'Carnes', 'awawawawaw'),
(4, 'ennove', 'wfewrfwerf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `cod_ejercicio` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `imc` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`cod_ejercicio`, `nombre`, `descripcion`, `imc`) VALUES
(1, 'Caminar', 'Un ejercicio básico que vale para todo tipo de rutina.', 'o'),
(2, 'Correr', 'Ejercicio que puedes realizar tanto en una cinta de correr como en la calle o en el campo. ', 'b'),
(3, 'Subir escaleras', 'El mejor ejercico tanto para bajar peso como para mantenerte en forma.', 'o'),
(4, 'Toque de conos', 'Coloca dos conos a tu izquierda y derecha y tócalos con las manos dando pequeñas zancadas para acercarte a ellos.', 'o');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `cod_mensaje` int(4) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `cuerpo` varchar(10000) NOT NULL,
  `fecha` date NOT NULL,
  `remitente` int(11) NOT NULL,
  `destinatario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`cod_mensaje`, `asunto`, `cuerpo`, `fecha`, `remitente`, `destinatario`) VALUES
(5, 'Crear plan', 'El usuario con correo admin@admin.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=admin@admin.com\'>Crear</a>', '2023-11-15', 1119, 1119),
(8, 'Crear plan', 'El usuario con correo jesus@gmail.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=jesus@gmail.com\'>Crear</a>', '2023-11-15', 1120, 1119),
(17, 'Contacto de usuario no registrado', 'Correo: e@gmail.com | asas as as sa s a s a s ckned dikcd ckd ckdc dkc dk', '2023-11-17', 1119, 1119),
(19, 'hola', 'hola wenas', '2023-11-17', 1121, 1119),
(20, 'Crear plan', 'El usuario con correo jesus2@gmail.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=jesus2@gmail.com\'>Crear</a>', '2023-11-17', 1121, 1119),
(21, 'Crear plan', 'El usuario con correo admin@admin.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=admin@admin.com\'>Crear Rutina || <a href=\'Ejercicio/AsignarDieta.php?correo=admin@admin.com\'>Crear Dieta</a>', '2023-11-17', 1119, 1119),
(22, 'Crear plan', 'El usuario con correo admin@admin.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=admin@admin.com\'>Crear Rutina || <a href=\'Dieta/AsignarDieta.php?correo=admin@admin.com\'>Crear Dieta</a>', '2023-11-17', 1119, 1119),
(23, 'Crear plan', 'El usuario con correo jesus@gmail.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=jesus@gmail.com\'>Crear Rutina || <a href=\'Dieta/AsignarDieta.php?correo=jesus@gmail.com\'>Crear Dieta</a>', '2023-11-17', 1120, 1119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `cod_plato` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imc` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`cod_plato`, `nombre`, `descripcion`, `imc`) VALUES
(1, 'pollo al curry', 'que bueno\r\n- sfsefwe\r\n-wefdwefdewfdw\r\n-wefwef e wefwefewf\r\n-wefwewefwefwefwefwefwefwefwe\r\n-wefwefwefefwe f we fwe f wef we fwe f wef we fwe f f we fwe f we few fwef ew f ewf ew fwe f ewf we f wef we fwe f ewf we f wef we fwe f wef ew f wef ew fwe f ew few', 'o'),
(2, 'weg', 'wewervwerv', 'b'),
(3, 'pollo al curry', 'que bueno\r\n- sfsefwe\r\n-wefdwefdewfdw\r\n-wefwef e wefwefewf\r\n-wefwewefwefwefwefwefwefwefwe\r\n-wefwefwefefwe f we fwe f wef we fwe f wef we fwe f f we fwe f we few fwef ew f ewf ew fwe f ewf we f wef we fwe f ewf we f wef we fwe f wef ew f wef ew fwe f ew few', 'o'),
(4, 'weg', 'wewervwerv', 'b');

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
  `cod_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `nombre`, `descripcion`, `precio`, `imagen`, `cod_cat`) VALUES
(13, 'q1', 'q', 56, '/Fitclub/Img/placa.jpg', 1),
(16, 'q2', '1', 252, '', 2),
(18, 'Bbida Energetica monster', 'q', 12, '/Fitclub/Img/placa.jpg', 3),
(19, 'Gatorade', '1', 1, '', 2),
(20, 'Cripsy Table', '1', 99, '', 1),
(21, 'Mamadongo', '1', 111, '', 2),
(22, 'Paquete Oreo blanco x6', '1', 342, '', 3),
(23, '4', '4', 343, '4', 4),
(25, '7', '7', 7, '4', 4),
(26, 'weboi', '1', 1, '4', 4),
(27, 'z', 'z', 1, 'z', 1),
(30, 'wawa', 'sdsdsds', 1212, '2', 4),
(31, 'aas', 'as', 5, 'as', 4),
(32, 'xcxc', 'xcxc', 9, 'xcxc', 4),
(34, 'a', 'a', 12, 'a', 2),
(35, 'asas', 'z', 1, 'z', 2),
(36, 'sxz', 'asassass', 1, 'xx', 4),
(37, 'xxx', 'xxx', 12, 'xxx', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usu` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `esAdmin` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `imc` varchar(1) NOT NULL,
  `edad` int(11) NOT NULL,
  `plan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `password`, `nombre`, `apellidos`, `correo`, `username`, `esAdmin`, `activo`, `imc`, `edad`, `plan`) VALUES
(1119, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'admin', 'admin admin', 'admin@admin.com', 'admin', 1, 1, 'b', 12, 'pro'),
(1120, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jesus', 'madrid rodriguez', 'jesus@gmail.com', 'jesus', 0, 1, 'b', 12, 'pro'),
(1121, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jesus', 'madrid rodriguez', 'jesus2@gmail.com', 'admin@admin.com', 0, 1, 'o', 24, 'pro'),
(1122, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jesus', 'madrid rodriguez', 'jesus3@gmail.com', 'jesus3', 0, 1, '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ejercicio`
--

CREATE TABLE `usuario_ejercicio` (
  `cod_usu` int(11) NOT NULL,
  `cod_ejercicio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_ejercicio`
--

INSERT INTO `usuario_ejercicio` (`cod_usu`, `cod_ejercicio`) VALUES
(1119, 1),
(1119, 2),
(1119, 3),
(1120, 1),
(1120, 2),
(1120, 4),
(1121, 1),
(1121, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_plato`
--

CREATE TABLE `usuario_plato` (
  `cod_usu` int(11) NOT NULL,
  `cod_plato` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_plato`
--

INSERT INTO `usuario_plato` (`cod_usu`, `cod_plato`) VALUES
(1119, 3),
(1119, 4),
(1120, 1),
(1120, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_cat`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`cod_ejercicio`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`cod_mensaje`),
  ADD KEY `fk_remitente` (`remitente`),
  ADD KEY `fk_destinatario` (`destinatario`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`cod_plato`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_producto`),
  ADD KEY `fk_cod_cat` (`cod_cat`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usu`);

--
-- Indices de la tabla `usuario_ejercicio`
--
ALTER TABLE `usuario_ejercicio`
  ADD PRIMARY KEY (`cod_usu`,`cod_ejercicio`),
  ADD KEY `fk_cod_ejercicio` (`cod_ejercicio`);

--
-- Indices de la tabla `usuario_plato`
--
ALTER TABLE `usuario_plato`
  ADD PRIMARY KEY (`cod_usu`,`cod_plato`),
  ADD KEY `fk_cod_plato` (`cod_plato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `cod_ejercicio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `cod_mensaje` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `cod_plato` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1123;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_destinatario` FOREIGN KEY (`destinatario`) REFERENCES `usuario` (`cod_usu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_remitente` FOREIGN KEY (`remitente`) REFERENCES `usuario` (`cod_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_cod_cat` FOREIGN KEY (`cod_cat`) REFERENCES `categoria` (`cod_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_ejercicio`
--
ALTER TABLE `usuario_ejercicio`
  ADD CONSTRAINT `fk_cod_ejercicio` FOREIGN KEY (`cod_ejercicio`) REFERENCES `ejercicio` (`cod_ejercicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cod_usu` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_plato`
--
ALTER TABLE `usuario_plato`
  ADD CONSTRAINT `fk_cod_plato` FOREIGN KEY (`cod_plato`) REFERENCES `plato` (`cod_plato`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
