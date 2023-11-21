-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 19:15:41
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
(23, 'Crear plan', 'El usuario con correo jesus@gmail.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=jesus@gmail.com\'>Crear Rutina || <a href=\'Dieta/AsignarDieta.php?correo=jesus@gmail.com\'>Crear Dieta</a>', '2023-11-17', 1120, 1119),
(24, 'Crear plan', 'El usuario con correo jesusjugadordelvillanueva@gmail.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=jesusjugadordelvillanueva@gmail.com\'>Crear Rutina || <a href=\'Dieta/AsignarDieta.php?correo=jesusjugadordelvillanueva@gmail.com\'>Crear Dieta</a>', '2023-11-21', 1123, 1119),
(25, 'asunto nove er nopve er nove er nove ern vnoe c coe eoe wconweo', 'El pasaje estándar Lorem Ipsum, usado desde el año 1500. \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"  Sección 1.10.32 de \"de Finibus Bonorum et Malorum\", escrito por Cicero en el 45 antes de Cristo \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"  Traducci�n hecha por H. Rackham en 1914 \"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"  Sección 1.10.33 de \"de Finibus Bonorum et Malorum\", escrito por Cicero en el 45 antes de Cristo \"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"  Traducci�n hecha por H. Rackham en 1914 \"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '2023-11-21', 1123, 1119),
(26, 'Crear plan', 'El usuario con correo jesusjugadordelvillanueva@gmail.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=jesusjugadordelvillanueva@gmail.com\'>Crear Rutina || <a href=\'Dieta/AsignarDieta.php?correo=jesusjugadordelvillanueva@gmail.com\'>Crear Dieta</a>', '2023-11-21', 1123, 1119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `cod_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cod_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `fecha`, `cod_usu`) VALUES
(63, '2023-11-21', 1120),
(83, '2023-11-21', 1123),
(697, '2023-11-21', 1123),
(1111, '2023-11-21', 1111),
(1489, '2023-11-21', 1120),
(2231, '2023-11-21', 1120),
(4187, '2023-11-21', 1120),
(5206, '2023-11-21', 1120),
(5368, '2023-11-21', 1120),
(6737, '2023-11-21', 1111),
(9350, '2023-11-21', 1123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `cod_pedido` int(11) NOT NULL,
  `cod_producto` int(4) NOT NULL,
  `cantidad_producto` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`cod_pedido`, `cod_producto`, `cantidad_producto`) VALUES
(83, 13, 1),
(83, 20, 1),
(697, 13, 1),
(697, 20, 1),
(1489, 19, 1),
(4187, 13, 1),
(4187, 18, 1),
(4187, 19, 1),
(4187, 20, 1),
(4187, 22, 1),
(4187, 23, 1),
(4187, 37, 1),
(5206, 13, 1),
(5206, 19, 1),
(5206, 20, 1),
(5368, 13, 1),
(5368, 20, 1),
(9350, 13, 1),
(9350, 20, 1);

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
  `cod_cat` int(11) NOT NULL,
  `valoraciones_totales` int(10) NOT NULL,
  `val_num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `nombre`, `descripcion`, `precio`, `imagen`, `cod_cat`, `valoraciones_totales`, `val_num`) VALUES
(13, 'q1', 'q', 56, '/Fitclub/Img/placa.jpg', 1, 0, 0),
(18, 'Bbida Energetica monster', 'q', 12, '/Fitclub/Img/placa.jpg', 3, 0, 0),
(19, 'Gatorade', '1', 1, '', 2, 0, 0),
(20, 'Cripsy Table', '1', 99, '', 1, 0, 0),
(21, 'Mamadongo', '1', 111, '', 2, 0, 0),
(22, 'Paquete Oreo blanco x6', '1', 342, '', 3, 0, 0),
(23, '4', '4', 343, '4', 4, 0, 0),
(25, '7', '7', 7, '4', 4, 0, 0),
(26, 'weboi', '1', 1, '4', 4, 0, 0),
(30, 'wawa', 'sdsdsds', 1212, '2', 4, 0, 0),
(31, 'aas', 'as', 5, 'as', 4, 0, 0),
(32, 'xcxc', 'xcxc', 9, 'xcxc', 4, 0, 0),
(35, 'asas', 'z', 1, 'z', 2, 0, 0),
(36, 'sxz', 'asassass', 1, 'xx', 4, 0, 0),
(37, 'xxx', 'xxx', 12, 'xxx', 2, 0, 0);

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
  `plan` varchar(5) NOT NULL,
  `n_pedidos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `password`, `nombre`, `apellidos`, `correo`, `username`, `esAdmin`, `activo`, `imc`, `edad`, `plan`, `n_pedidos`) VALUES
(1119, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'admin', 'admin admin', 'admin@admin.com', 'admin', 1, 1, 'b', 12, 'pro', 0),
(1120, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jesus', 'madrid rodriguez', 'jesus@gmail.com', 'jesus', 0, 1, 'b', 12, 'pro', 3),
(1121, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jesus', 'madrid rodriguez', 'jesus2@gmail.com', 'admin@admin.com', 0, 1, 'o', 24, 'pro', 0),
(1122, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jesus', 'madrid rodriguez', 'jesus3@gmail.com', 'jesus3', 0, 1, '', 0, '', 0),
(1123, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1', '1', 'jesusjugadordelvillanueva@gmail.com', 'admin@admin.com', 0, 1, 'b', 12, 'basic', 3);

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
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`cod_pedido`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`cod_pedido`,`cod_producto`),
  ADD KEY `fk_cod_producto` (`cod_producto`);

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
  MODIFY `cod_ejercicio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `cod_mensaje` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1124;

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
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `fk_cod_pedido` FOREIGN KEY (`cod_pedido`) REFERENCES `pedido` (`cod_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cod_producto` FOREIGN KEY (`cod_producto`) REFERENCES `producto` (`cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

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
