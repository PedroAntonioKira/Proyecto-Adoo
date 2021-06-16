-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2021 a las 04:32:11
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ceg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario_correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario_correo`) VALUES
(1, 'admin@admin.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacionproductos`
--

CREATE TABLE `aprobacionproductos` (
  `id` int(11) NOT NULL,
  `aprobacion` tinyint(4) NOT NULL,
  `administrador_id` int(11) NOT NULL,
  `catalogodeproductos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogodeproductos`
--

CREATE TABLE `catalogodeproductos` (
  `id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `avgcalificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catalogodeproductos`
--

INSERT INTO `catalogodeproductos` (`id`, `vendedor_id`, `producto_id`, `avgcalificacion`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL),
(3, 1, 3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Computo'),
(2, 'Telefonía'),
(3, 'Electrónica'),
(4, 'Medición'),
(5, 'Refacciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

CREATE TABLE `comprador` (
  `id` int(11) NOT NULL,
  `usuario_correo` varchar(50) NOT NULL,
  `info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprador`
--

INSERT INTO `comprador` (`id`, `usuario_correo`, `info_id`) VALUES
(1, 'joss.alberto.r.m@gmail.com', 1),
(2, 'prueba@prueba.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion`
--

CREATE TABLE `descripcion` (
  `id` int(11) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `altoprod` float(9,2) DEFAULT NULL,
  `anchoprod` float(9,2) DEFAULT NULL,
  `bateriasinclu` varchar(20) DEFAULT NULL,
  `tamañoram` int(11) DEFAULT NULL,
  `tamañodiscoduro` int(11) DEFAULT NULL,
  `sistemaoperativo` varchar(45) DEFAULT NULL,
  `procesador` varchar(45) DEFAULT NULL,
  `tamañopantalla` float(9,2) DEFAULT NULL,
  `resolucion` varchar(45) DEFAULT NULL,
  `numeroprocesadores` int(11) DEFAULT NULL,
  `tipodiscoduro` varchar(45) DEFAULT NULL,
  `imagen1` varchar(60) NOT NULL,
  `imagen2` varchar(60) NOT NULL,
  `imagen3` varchar(60) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `precio` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`id`, `marca`, `fabricante`, `altoprod`, `anchoprod`, `bateriasinclu`, `tamañoram`, `tamañodiscoduro`, `sistemaoperativo`, `procesador`, `tamañopantalla`, `resolucion`, `numeroprocesadores`, `tipodiscoduro`, `imagen1`, `imagen2`, `imagen3`, `color`, `precio`) VALUES
(1, 'Motorola', 'Motorola', 15.24, 10.16, 'SI', 4, 128, 'Android 10.0', 'Snapdragon 730G', 6.80, '1080x 2400', 8, 'N/A', 'Motog9.jpg', 'Motog92.jpg', 'Motog93.jpg', 'Azul', 5362.46),
(2, 'Prueba', 'Prueba', 1.10, 1.10, 'Prueba', 1, 1, 'Prueba', 'Prueba', 1.10, '123', 2, 'N/A', 'prueba.jpg', 'prueba2.jpg', 'prueba3.jpg', 'Prueba', 123.00),
(3, 'Samsung', 'CANCELAR', 15.30, 12.20, 'CANCELAR', 4, 120, 'Android 10', 'Snapdragon', 10.20, '1920 x 2400', 4, 'N/A', 'Motog9.jpg', 'Motog92.jpg', 'Motog93.jpg', 'Negro', 3500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidop` varchar(45) NOT NULL,
  `apellidom` varchar(45) NOT NULL,
  `institucion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info`
--

INSERT INTO `info` (`id`, `nombre`, `apellidop`, `apellidom`, `institucion`) VALUES
(1, 'José Alberto', 'Rincón', 'Mendoza', 'ESCOM'),
(2, 'Rodrigo', 'González', 'Pérez', 'ESCOM'),
(3, 'Omar', 'Aguirre', 'Alvarez', 'ESCOM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infobancaria`
--

CREATE TABLE `infobancaria` (
  `idinfobancaria` int(11) NOT NULL,
  `info_id` int(11) NOT NULL,
  `infotarjeta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infobancaria`
--

INSERT INTO `infobancaria` (`idinfobancaria`, `info_id`, `infotarjeta_id`) VALUES
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infotarjeta`
--

CREATE TABLE `infotarjeta` (
  `id` int(11) NOT NULL,
  `num` varchar(30) NOT NULL,
  `exp` varchar(10) NOT NULL,
  `codigo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infotarjeta`
--

INSERT INTO `infotarjeta` (`id`, `num`, `exp`, `codigo`) VALUES
(1, '1234 1234 1234 1234', '09/25', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listacategorias`
--

CREATE TABLE `listacategorias` (
  `id` int(11) NOT NULL,
  `subcategoria_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `listacategorias`
--

INSERT INTO `listacategorias` (`id`, `subcategoria_id`, `categorias_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 4, 2),
(10, 9, 2),
(11, 10, 2),
(12, 11, 2),
(13, 12, 2),
(14, 13, 3),
(15, 14, 3),
(16, 15, 3),
(17, 16, 3),
(18, 17, 3),
(19, 18, 3),
(20, 19, 3),
(21, 20, 3),
(22, 21, 4),
(23, 22, 4),
(24, 23, 4),
(25, 24, 4),
(26, 25, 4),
(27, 26, 4),
(28, 27, 4),
(29, 28, 5),
(30, 29, 5),
(31, 30, 5),
(32, 31, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metododepago`
--

CREATE TABLE `metododepago` (
  `idmetododepago` int(11) NOT NULL,
  `metodo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL,
  `privilegio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `privilegio`) VALUES
(1, 'Administrador'),
(2, 'Comprador'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `listacategorias_id` int(11) NOT NULL,
  `descripcion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `stock`, `estado`, `calificacion`, `listacategorias_id`, `descripcion_id`) VALUES
(1, 'Moto G9 Plus', 6, 'PUBLICADO', NULL, 11, 1),
(2, 'Prueba', 12, 'PUBLICADO', NULL, 8, 2),
(3, 'Celular Prueba', 20, 'ESPERA', 5, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrodechat`
--

CREATE TABLE `registrodechat` (
  `id` int(11) NOT NULL,
  `chat` varchar(45) DEFAULT NULL,
  `comprador_id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `catalogodeproductos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrodecompra`
--

CREATE TABLE `registrodecompra` (
  `id` int(11) NOT NULL,
  `comprador_id` int(11) NOT NULL,
  `catalogodeproductos_id` int(11) NOT NULL,
  `metododepago_idmetododepago` int(11) NOT NULL,
  `total` float(9,2) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `subcategoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `subcategoria`) VALUES
(1, 'Lenovo'),
(2, 'Asus'),
(3, 'HP'),
(4, 'Samsung'),
(5, 'MacBook'),
(6, 'Apple'),
(7, 'ZTE'),
(8, 'Xiaomi'),
(9, 'Huawei'),
(10, 'Motorola'),
(11, 'Nokia'),
(12, 'Alcatel'),
(13, 'Cableado'),
(14, 'Resistencias'),
(15, 'Diodos'),
(16, 'Transistores'),
(17, 'Transformadores'),
(18, 'Compuertas'),
(19, 'Protoboard'),
(20, 'Inductores'),
(21, 'Metro'),
(22, 'Multimetro'),
(23, 'Osciloscopio'),
(24, 'Fuentes'),
(25, 'Generadores'),
(26, 'Termometros'),
(27, 'Comprobadores'),
(28, 'De computo'),
(29, 'De telefonia'),
(30, 'De dispositivo'),
(31, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `actividad` int(11) NOT NULL,
  `privilegios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `contrasena`, `actividad`, `privilegios_id`) VALUES
('admin@admin.com', 'Contraseña123', 1, 1),
('joss.alberto.r.m@gmail.com', 'Contraseña', 1, 2),
('prueba@prueba.com', 'Contraseña', 1, 2),
('rodrigo@rodrigo.com', 'Contraseña', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `usuario_correo` varchar(50) NOT NULL,
  `info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id`, `usuario_correo`, `info_id`) VALUES
(1, 'rodrigo@rodrigo.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_administrador_usuario1_idx` (`usuario_correo`);

--
-- Indices de la tabla `aprobacionproductos`
--
ALTER TABLE `aprobacionproductos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aprobacionproductos_administrador1_idx` (`administrador_id`),
  ADD KEY `fk_aprobacionproductos_catalogodeproductos1_idx` (`catalogodeproductos_id`);

--
-- Indices de la tabla `catalogodeproductos`
--
ALTER TABLE `catalogodeproductos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_catalogodeproductos_vendedor1_idx` (`vendedor_id`),
  ADD KEY `fk_catalogodeproductos_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comprador_info1_idx` (`info_id`),
  ADD KEY `fk_comprador_usuario1` (`usuario_correo`);

--
-- Indices de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `infobancaria`
--
ALTER TABLE `infobancaria`
  ADD PRIMARY KEY (`idinfobancaria`),
  ADD KEY `fk_infobancaria_info1_idx` (`info_id`),
  ADD KEY `fk_infobancaria_infotarjeta1_idx` (`infotarjeta_id`);

--
-- Indices de la tabla `infotarjeta`
--
ALTER TABLE `infotarjeta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listacategorias`
--
ALTER TABLE `listacategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_listacategorias_subcategoria1_idx` (`subcategoria_id`),
  ADD KEY `fk_listacategorias_categorias1_idx` (`categorias_id`);

--
-- Indices de la tabla `metododepago`
--
ALTER TABLE `metododepago`
  ADD PRIMARY KEY (`idmetododepago`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_listacategorias1_idx` (`listacategorias_id`),
  ADD KEY `fk_producto_descripcion1_idx` (`descripcion_id`);

--
-- Indices de la tabla `registrodechat`
--
ALTER TABLE `registrodechat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_registrodechat_comprador1_idx` (`comprador_id`),
  ADD KEY `fk_registrodechat_vendedor1_idx` (`vendedor_id`),
  ADD KEY `fk_registrodechat_catalogodeproductos1_idx` (`catalogodeproductos_id`);

--
-- Indices de la tabla `registrodecompra`
--
ALTER TABLE `registrodecompra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_registrodecompra_metododepago1_idx` (`metododepago_idmetododepago`),
  ADD KEY `fk_registrodecompra_comprador1_idx` (`comprador_id`),
  ADD KEY `fk_registrodecompra_catalogodeproductos1_idx` (`catalogodeproductos_id`),
  ADD KEY `fk_registrodecompra_status1_idx` (`status_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`),
  ADD KEY `fk_usuario_privilegios1_idx` (`privilegios_id`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendedor_usuario1_idx` (`usuario_correo`),
  ADD KEY `fk_vendedor_info1_idx` (`info_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aprobacionproductos`
--
ALTER TABLE `aprobacionproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogodeproductos`
--
ALTER TABLE `catalogodeproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comprador`
--
ALTER TABLE `comprador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `infobancaria`
--
ALTER TABLE `infobancaria`
  MODIFY `idinfobancaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `infotarjeta`
--
ALTER TABLE `infotarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `listacategorias`
--
ALTER TABLE `listacategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `metododepago`
--
ALTER TABLE `metododepago`
  MODIFY `idmetododepago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrodechat`
--
ALTER TABLE `registrodechat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrodecompra`
--
ALTER TABLE `registrodecompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aprobacionproductos`
--
ALTER TABLE `aprobacionproductos`
  ADD CONSTRAINT `fk_aprobacionproductos_administrador1` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aprobacionproductos_catalogodeproductos1` FOREIGN KEY (`catalogodeproductos_id`) REFERENCES `catalogodeproductos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `catalogodeproductos`
--
ALTER TABLE `catalogodeproductos`
  ADD CONSTRAINT `fk_catalogodeproductos_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_catalogodeproductos_vendedor1` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD CONSTRAINT `fk_comprador_info1` FOREIGN KEY (`info_id`) REFERENCES `info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comprador_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `infobancaria`
--
ALTER TABLE `infobancaria`
  ADD CONSTRAINT `fk_infobancaria_info1` FOREIGN KEY (`info_id`) REFERENCES `info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_infobancaria_infotarjeta1` FOREIGN KEY (`infotarjeta_id`) REFERENCES `infotarjeta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listacategorias`
--
ALTER TABLE `listacategorias`
  ADD CONSTRAINT `fk_listacategorias_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_listacategorias_subcategoria1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_descripcion1` FOREIGN KEY (`descripcion_id`) REFERENCES `descripcion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_listacategorias1` FOREIGN KEY (`listacategorias_id`) REFERENCES `listacategorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registrodechat`
--
ALTER TABLE `registrodechat`
  ADD CONSTRAINT `fk_registrodechat_catalogodeproductos1` FOREIGN KEY (`catalogodeproductos_id`) REFERENCES `catalogodeproductos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registrodechat_comprador1` FOREIGN KEY (`comprador_id`) REFERENCES `comprador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registrodechat_vendedor1` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registrodecompra`
--
ALTER TABLE `registrodecompra`
  ADD CONSTRAINT `fk_registrodecompra_catalogodeproductos1` FOREIGN KEY (`catalogodeproductos_id`) REFERENCES `catalogodeproductos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registrodecompra_comprador1` FOREIGN KEY (`comprador_id`) REFERENCES `comprador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registrodecompra_metododepago1` FOREIGN KEY (`metododepago_idmetododepago`) REFERENCES `metododepago` (`idmetododepago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registrodecompra_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_privilegios1` FOREIGN KEY (`privilegios_id`) REFERENCES `privilegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `fk_vendedor_info1` FOREIGN KEY (`info_id`) REFERENCES `info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vendedor_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
