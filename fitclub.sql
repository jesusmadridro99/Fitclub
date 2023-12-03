-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2023 a las 12:16:51
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
(6, 'Proteínas', 'Alimentos que contienen muchas proteínas'),
(7, 'Carnes', 'Variados de carne'),
(8, 'Snacks', 'Variados de comida para pasar el hambre'),
(9, 'Pasta', 'Productos provenientes de la sémola'),
(10, 'Pan', 'Pan');

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
(4, 'Toque de conos', 'Coloca dos conos a tu izquierda y derecha y tócalos con las manos dando pequeñas zancadas para acercarte a ellos.', 'o'),
(13, 'Levantar pesas', 'Coge 1 pesa en cada mano y acerca tu mano a tu hombro solo moviendo tu antebrazo. ', 'b');

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
(21, 'Crear plan', 'El usuario con correo admin@admin.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=admin@admin.com\'>Crear Rutina || <a href=\'Ejercicio/AsignarDieta.php?correo=admin@admin.com\'>Crear Dieta</a>', '2023-11-17', 1119, 1119),
(22, 'Crear plan', 'El usuario con correo admin@admin.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=admin@admin.com\'>Crear Rutina || <a href=\'Dieta/AsignarDieta.php?correo=admin@admin.com\'>Crear Dieta</a>', '2023-11-17', 1119, 1119),
(23, 'Crear plan', 'El usuario con correo jesus@gmail.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=jesus@gmail.com\'>Crear Rutina || <a href=\'Dieta/AsignarDieta.php?correo=jesus@gmail.com\'>Crear Dieta</a>', '2023-11-17', 1120, 1119),
(27, 'Crear plan', 'El usuario con correo admin@admin.com se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href=\'Ejercicio/AsignarRutina.php?correo=admin@admin.com\'>Crear Rutina || <a href=\'Dieta/AsignarDieta.php?correo=admin@admin.com\'>Crear Dieta</a>', '2023-11-24', 1119, 1119),
(28, 'primero', '213e', '2023-11-24', 1119, 1119),
(29, 'segundo', '213e', '2023-11-24', 1119, 1119),
(30, 'afqerfv', 'eqwvwervwervrwvwervewrvg  ewerer wwerg ewrgwe ', '2023-11-28', 1120, 1119),
(31, 'wdf', 'wdfwebgwd', '2023-11-29', 1120, 1119),
(32, 'sdfbsfdbs', 'sdfbsdfbsdfbsdfb  sdfg fdg g r erewwerer  rewg er geg ewg ewg er er ge e e ew eg', '2023-11-29', 1119, 1120);

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
(276, '2023-12-03', 1120),
(4971, '2023-12-03', 1120),
(6224, '2023-12-03', 1120),
(7115, '2023-12-03', 1120);

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
(276, 50, 1),
(276, 52, 13),
(276, 58, 8),
(4971, 56, 1),
(4971, 59, 1),
(4971, 60, 9),
(6224, 50, 10),
(6224, 52, 20),
(6224, 53, 1),
(6224, 57, 1),
(6224, 58, 1),
(7115, 52, 6),
(7115, 55, 14),
(7115, 59, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `cod_plato` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(10000) NOT NULL,
  `imc` varchar(1) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`cod_plato`, `nombre`, `descripcion`, `imc`, `imagen`) VALUES
(12, 'Pollo al curry', 'Ingredientes:\r\n\r\n- 1 cucharada de jengibre rallado\r\n- 10 g de mantequilla\r\n- 1 cucharadita de sal\r\n- 1 cucharada de curry en polvo\r\n- 400 g de contramuslos de pollo (o pechugas de pollo)\r\n- Pimienta negra molida\r\n- 200 g de tomates envasados\r\n\r\nPreparación:\r\n\r\nPelamos y cortamos 100 g de cebolla en trozos pequeños. Prensamos 2 dientes de ajo. Si tenemos un trozo de jengibre, lo pelamos y lo rallamos.\r\n\r\nCalentamos 10 g de mantequilla en una sartén y sofreímos la cebolla, el ajo y el jengibre durante 5 minutos a fuego medio, junto 1 cucharadita de sal para que la cebolla se ablande sin coger color.\r\n\r\nCortamos 400 g de contramuslos de pollo (o pechugas de pollo) en dados de tamaño bocado, los salpimentamos y los añadimos a la sartén. Subimos a fuego medio-alto y cocinamos hasta que el pollo esté hecho, aproximadamente 8-10 minutos, removiendo.\r\n\r\nVertemos 200 ml de leche de coco. Removemos, llevamos a ebullición, bajamos el fuego y cocinamos el conjunto durante 15 minutos. Probamos y salpimentamos si fuera necesario.\r\n\r\nAntes de servir, repartimos 1 cucharada de hojas de cilantro picadas por encima.', 'o', '/Fitclub/Img/platos/pollo_curry.jpg'),
(13, 'Crema de calabaza', 'Ingredientes (2 personas):\r\n\r\n- 400 gr de calabaza\r\n- 1 patata (200 gr)\r\n- 2 zanahorias\r\n- 1 puerro\r\n- 2 cucharadas de aceite de oliva\r\n- agua\r\n- sal\r\n\r\n\r\n\r\nElaboración de la receta de crema de calabaza:\r\n\r\nPara preparar la crema de calabaza, pon a calentar 5 vasos de agua con 2 cucharadas de aceite de oliva en una cazuela al fuego.\r\n\r\nMientras se calienta, prepara las verduras. Para ello, pela la calabaza y córtala en dados grandes.\r\n\r\nRetira la parte inferior y superior de las zanahorias, pélalas y córtalas en rodajas de 1 centímetro aproximadamente.\r\n\r\nLimpia el puerro bien para retirar toda la suciedad. Corta un trozo pequeño y resérvalo para decorar los platos. Corta en rodajas el resto del puerro.\r\n\r\nPor último, pela la patata y trocéala como para guisar, es decir, cáscala con ayuda de un cuchillo.\r\n\r\nUna vez estén listas las verduras, introdúcelas en la cazuela: la calabaza, las zanahorias, el puerro y la patata. Añade sal a tu gusto.', 'o', '/Fitclub/Img/platos/crema_calabaza.jpg'),
(14, 'Durum de pollo', 'Ingredientes: \r\n\r\n- Pierna de cordero deshuesada y troceada 1\r\n- Cebolla morada 1\r\n- Diente de ajo 2\r\n- Pan de molde rebanadas empapadas en leche 2\r\n- Canela molida cucharadita 1\r\n- Cardamomo cucharadita 1\r\n- Clavo de olor cucharadita 1\r\n- Comino molido cucharadita 1\r\n- Pimentón picante cucharadita 1\r\n- Cilantro molido cucharadita 1\r\n- Cúrcuma molida cucharadita 1\r\n- Orégano seco cucharadita 1\r\n- Semillas de cilantro cucharadita 1\r\n- Salsa de tomate para la salsa roja 100 g\r\n -Tomate concentrado para la salsa roja 20 g\r\n- Comino molido cucharadita para la salsa roja 1\r\n- Orégano seco cucharadita para la salsa roja 0.5\r\n- Pimienta negra molida para la salsa roja\r\n- Yogur griego para la salsa blanca 200 g\r\n- Mayonesa cucharada para la salsa blanca 1\r\n- Zumo de lima para la salsa blanca 1\r\n- Sal para la salsa blanca\r\n- Pimienta negra molida para la salsa blanca\r\n- Perejil fresco picado para la salsa blanca 1\r\n- Hierbabuena hojitas para la salsa blanca 10\r\n- Tortillas de trigo para montar el dúrum 10\r\n- Tomate rodajas para montar el dúrum 10 \r\n- Lechuga romana hojas para montar el dúrum 10\r\n\r\n\r\nReceta:\r\n\r\nPicamos el cordero en Thermomix o procesador de alimentos pero sin picarlo finamente, pues no queremos que sea carne picada, sino que tenga mordisco. Si queremos, podemos añadir 75 gramos de panceta picada para hacerlo más jugoso.\r\n\r\nPonemos la carne en una fuente para horno, añadimos la cebolla y ajo finamente picados y luego el resto de ingredientes, sazonando con sal y pimienta tras remover un poco todo el contenido.\r\n\r\nPrecalentamos el horno a 175 ºC y cuando esté caliente, horneamos durante 40 minutos a 160 ºC. Revisamos a los 25 minutos, si se comienza a tostar demasiado, tapamos con papel de aluminio entonces.\r\n\r\nSacamos y dejamos reposar tapado con aluminio mientras preparamos las salsas y el resto de la guarnición. Para la salsa roja mezclamos todo con una túrmix y reservar en una manga. Para la salsa blanca mezclamos todo en un bol con una cuchara y reservar en otra manga.\r\n\r\nSobre las tortillas de trigo ponemos una hoja de lechuga, tomate fresco al gusto y encima la carne de cordero cortada en trozos de bocado y salseamos al gusto con cualquiera de las dos opciones.', 'b', '/Fitclub/Img/platos/durum.jpg'),
(17, 'Gachas de Avena', 'Ingredientes:\r\n\r\n- 250 ml leche\r\n- 50 g copos avena\r\n- Miel o sirope de arce\r\n- 1/2 cdta canela molida (opcional)\r\n- 1 plátano a rodajas\r\n\r\n\r\nPreparación\r\n\r\n\r\nPaso 1\r\nPonemos a calentar la leche en un cazo e incorporamos la avena. Lo removemos todo bien y esperamos a que eche a hervir, bajando el fuego y sin dejar de remover de vez en cuando.\r\n\r\n\r\nPaso 2\r\nCuando veamos que la avena está ya hecha, pasados unos cuatro minutos, apagamos el fuego y servimos en un bol. Si vemos que nos ha quedado demasiado espesa, podemos añadir un poco más de leche, consiguiendo la consistencia deseada de casa uno.\r\n\r\n\r\nPaso 3\r\nA continuación, cortamos un plátano en rodajas y endulzamos nuestro porridge con miel, un poco de canela y las rodajas de plátano.\r\n\r\n\r\nPaso 4\r\nY aquí tenemos un desayuno muy sano para comenzar el día.', 'b', '/Fitclub/Img/Platos/avena.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_producto` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(4) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `cod_cat` int(11) NOT NULL,
  `valoraciones_totales` int(10) NOT NULL,
  `val_num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `nombre`, `precio`, `imagen`, `cod_cat`, `valoraciones_totales`, `val_num`) VALUES
(50, 'Pack Papilla Fitwilly', 38, '/Fitclub/Img/Productos/papilla_fitwilly.jpg', 6, 3, 8),
(52, 'Protein Cream Choco', 7, '/Fitclub/Img/Productos/cream_choco.jpg', 6, 2, 9),
(53, '10 bandejas Burgers Proteicas', 66, '/Fitclub/Img/Productos/burger_pro.jpg', 7, 2, 6),
(54, 'Filipinos Proteicos', 3, '/Fitclub/Img/Productos/filipinos.jpg', 8, 0, 0),
(55, 'Konjac Fetuccine 200g', 7, '/Fitclub/Img/Productos/konjac_fetuccine.jpg', 9, 0, 0),
(56, 'Konjac Noodles 200g', 6, '/Fitclub/Img/Productos/konjac_noodles.jpg', 9, 0, 0),
(57, 'Tableta Choco Monky ', 2, '/Fitclub/Img/Productos/tableta_choco.jpg', 8, 0, 0),
(58, 'Ice Dream 90g', 12, '/Fitclub/Img/Productos/ice_dream.jpg', 6, 0, 0),
(59, 'Protein Bread 250g', 3, '/Fitclub/Img/Productos/protein_bread.jpg', 10, 0, 0),
(60, 'Protein Wrap 8x40g', 6, '/Fitclub/Img/Productos/protein_wrap.jpg', 10, 0, 0);

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
  `imc` varchar(1) NOT NULL,
  `edad` int(11) NOT NULL,
  `plan` varchar(5) NOT NULL,
  `n_pedidos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `password`, `nombre`, `apellidos`, `correo`, `username`, `esAdmin`, `imc`, `edad`, `plan`, `n_pedidos`) VALUES
(1119, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'admin', 'admin admin', 'admin@admin.com', 'admin', 1, 'b', 12, 'pro', 0),
(1120, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jesus', 'madrid rodriguez', 'jesus@gmail.com', 'jesus', 0, 'b', 12, 'pro', 17);

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
(1120, 1),
(1120, 2),
(1120, 4);

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
(1120, 12),
(1120, 13),
(1120, 14);

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
  MODIFY `cod_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `cod_ejercicio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `cod_mensaje` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `cod_plato` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1126;

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
