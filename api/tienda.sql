-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2022 a las 21:15:10
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidades`
--

CREATE TABLE `cantidades` (
  `id` int(11) NOT NULL,
  `cantidad` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cantidades`
--

INSERT INTO `cantidades` (`id`, `cantidad`) VALUES
(1, 155),
(2, 20),
(3, 255),
(4, 122),
(5, 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `link` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `link`) VALUES
(1, 'ibuprofeno.jpg'),
(2, 'noxpirin.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id` int(11) NOT NULL,
  `valor` decimal(6,3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id`, `valor`) VALUES
(1, '16.800'),
(2, '25.334'),
(3, '21.300'),
(4, '45.122'),
(5, '45.223');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_uso` int(11) DEFAULT NULL,
  `id_img` int(11) DEFAULT NULL,
  `id_cantidad` int(11) DEFAULT NULL,
  `id_precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `id_uso`, `id_img`, `id_cantidad`, `id_precio`) VALUES
(1, 'Ibuprofeno', 1, 1, 1, 1),
(2, 'Noxpirin', 1, 2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_ventas`
--

CREATE TABLE `products_ventas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products_ventas`
--

INSERT INTO `products_ventas` (`id`, `id_producto`, `id_venta`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_uso`
--

CREATE TABLE `tipo_uso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_uso`
--

INSERT INTO `tipo_uso` (`id`, `nombre`) VALUES
(1, 'Oral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha_actual` datetime NOT NULL,
  `total` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha_actual`, `total`) VALUES
(1, '2022-08-13 13:23:49', '2500.000'),
(2, '2022-08-13 13:23:49', '1230.000'),
(3, '2022-08-13 13:41:41', '2400.000');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_productos` (
`Id` int(11)
,`Nombre` varchar(50)
,`Uso` varchar(30)
,`Precio` decimal(6,3) unsigned
,`Imagen` varchar(60)
,`Cantidad` tinyint(3) unsigned
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_product_ventas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_product_ventas` (
`Id` int(11)
,`Producto` varchar(50)
,`Fecha de compra` datetime
,`Total` decimal(10,3)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_productos`
--
DROP TABLE IF EXISTS `vista_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_productos`  AS SELECT `productos`.`id` AS `Id`, `productos`.`nombre` AS `Nombre`, `tipo_uso`.`nombre` AS `Uso`, `precios`.`valor` AS `Precio`, `imagenes`.`link` AS `Imagen`, `cantidades`.`cantidad` AS `Cantidad` FROM ((((`productos` join `tipo_uso` on(`productos`.`id_uso` = `tipo_uso`.`id`)) join `precios` on(`productos`.`id_precio` = `precios`.`id`)) join `cantidades` on(`productos`.`id_cantidad` = `cantidades`.`id`)) join `imagenes` on(`productos`.`id_img` = `imagenes`.`id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_product_ventas`
--
DROP TABLE IF EXISTS `vista_product_ventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_product_ventas`  AS SELECT `ventas`.`id` AS `Id`, `productos`.`nombre` AS `Producto`, `ventas`.`fecha_actual` AS `Fecha de compra`, `ventas`.`total` AS `Total` FROM ((`productos` join `ventas`) join `products_ventas` on(`productos`.`id` = `products_ventas`.`id_producto` and `ventas`.`id` = `products_ventas`.`id_venta`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantidades`
--
ALTER TABLE `cantidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cantidad` (`id_cantidad`),
  ADD KEY `id_uso` (`id_uso`),
  ADD KEY `id_img` (`id_img`),
  ADD KEY `id_precio` (`id_precio`);

--
-- Indices de la tabla `products_ventas`
--
ALTER TABLE `products_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `tipo_uso`
--
ALTER TABLE `tipo_uso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantidades`
--
ALTER TABLE `cantidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products_ventas`
--
ALTER TABLE `products_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_uso`
--
ALTER TABLE `tipo_uso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cantidad`) REFERENCES `cantidades` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_uso`) REFERENCES `tipo_uso` (`id`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_img`) REFERENCES `imagenes` (`id`),
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`id_precio`) REFERENCES `precios` (`id`);

--
-- Filtros para la tabla `products_ventas`
--
ALTER TABLE `products_ventas`
  ADD CONSTRAINT `products_ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `products_ventas_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
