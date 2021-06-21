-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-06-2021 a las 09:36:40
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

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

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_correo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_administrador_usuario1_idx` (`usuario_correo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario_correo`) VALUES
(1, 'admin@admin.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacionproductos`
--

DROP TABLE IF EXISTS `aprobacionproductos`;
CREATE TABLE IF NOT EXISTS `aprobacionproductos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aprobacion` tinyint(4) NOT NULL,
  `administrador_id` int(11) NOT NULL,
  `catalogodeproductos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aprobacionproductos_administrador1_idx` (`administrador_id`),
  KEY `fk_aprobacionproductos_catalogodeproductos1_idx` (`catalogodeproductos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogodeproductos`
--

DROP TABLE IF EXISTS `catalogodeproductos`;
CREATE TABLE IF NOT EXISTS `catalogodeproductos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendedor_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `avgcalificacion` int(11) DEFAULT NULL,
  `precio` double(9,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catalogodeproductos_vendedor1_idx` (`vendedor_id`),
  KEY `fk_catalogodeproductos_producto1_idx` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catalogodeproductos`
--

INSERT INTO `catalogodeproductos` (`id`, `vendedor_id`, `producto_id`, `avgcalificacion`, `precio`) VALUES
(1, 1, 1, NULL, 0.00),
(2, 1, 2, NULL, 0.00),
(3, 1, 3, 10, 0.00),
(4, 3, 4, 10, 0.00),
(5, 3, 5, 10, 0.00),
(6, 3, 6, 10, 0.00),
(7, 3, 7, 10, 0.00),
(8, 3, 8, 10, 0.00),
(9, 4, 9, 10, 0.00),
(10, 4, 10, 10, 0.00),
(11, 4, 11, 10, 0.00),
(20, 7, 20, 3, 13.50),
(21, 7, 21, 5, 3.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idregistroDeChat` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mensaje` varchar(300) DEFAULT NULL,
  `correoEnvia` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idregistroDeChat` (`idregistroDeChat`),
  KEY `correoEnvia` (`correoEnvia`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `idregistroDeChat`, `fecha`, `mensaje`, `correoEnvia`) VALUES
(1, 1, '2021-06-07 13:51:14', 'Hola', 'joss.alberto.r.m@gmail.com'),
(2, 1, '2021-06-07 16:04:15', 'Hola', 'rodrigo@rodrigo.com'),
(3, 1, '2021-06-07 16:04:15', 'Busco información', 'joss.alberto.r.m@gmail.com'),
(4, 1, '2021-06-07 16:04:15', 'De ser posible lo mas rápido que pueda', 'joss.alberto.r.m@gmail.com'),
(5, 1, '2021-06-07 17:12:11', 'Por favor', 'joss.alberto.r.m@gmail.com'),
(6, 1, '2021-06-07 17:12:36', 'Hola', 'joss.alberto.r.m@gmail.com'),
(7, 1, '2021-06-07 17:17:00', 'Disculpe', 'joss.alberto.r.m@gmail.com'),
(8, 2, '2021-06-21 09:22:52', 'hola', 'prueba@prueba.com'),
(9, 2, '2021-06-21 09:22:59', 'como tas', 'prueba@prueba.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

DROP TABLE IF EXISTS `comprador`;
CREATE TABLE IF NOT EXISTS `comprador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_correo` varchar(50) NOT NULL,
  `info_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comprador_info1_idx` (`info_id`),
  KEY `fk_comprador_usuario1` (`usuario_correo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprador`
--

INSERT INTO `comprador` (`id`, `usuario_correo`, `info_id`) VALUES
(1, 'joss.alberto.r.m@gmail.com', 1),
(2, 'prueba@prueba.com', 3),
(3, 'eliel_comprador@prueba.com', 5),
(4, 'adrian@comprador.ipn.com', 7),
(5, 'omar_comprador@prueba.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comprador` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `total` double NOT NULL,
  `estatus` varchar(40) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_vendedor` (`id_vendedor`),
  KEY `id_comprador` (`id_comprador`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_comprador`, `id_vendedor`, `total`, `estatus`, `fecha`) VALUES
(34, 2, 3, 24998, 'En proceso de entrega', '2021-06-21 09:05:44'),
(35, 2, 3, 24998, 'En proceso de entrega', '2021-06-21 09:06:38'),
(36, 2, 3, 24998, 'En proceso de entrega', '2021-06-21 09:06:40'),
(37, 2, 3, 24998, 'En proceso de entrega', '2021-06-21 09:08:27'),
(38, 2, 3, 24998, 'En proceso de entrega', '2021-06-21 09:08:28'),
(39, 2, 3, 43999, 'En proceso de entrega', '2021-06-21 09:13:18'),
(40, 2, 3, 43999, 'En proceso de entrega', '2021-06-21 09:16:47'),
(41, 2, 3, 43999, 'En proceso de entrega', '2021-06-21 09:18:13'),
(42, 2, 7, 35, 'En proceso de entrega', '2021-06-21 09:26:23'),
(43, 2, 7, 35, 'En proceso de entrega', '2021-06-21 09:29:05'),
(44, 2, 7, 35, 'En proceso de entrega', '2021-06-21 09:29:13'),
(45, 2, 7, 35, 'En proceso de entrega', '2021-06-21 09:29:43'),
(46, 2, 7, 35, 'En proceso de entrega', '2021-06-21 09:30:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion`
--

DROP TABLE IF EXISTS `descripcion`;
CREATE TABLE IF NOT EXISTS `descripcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `altoprod` float(9,2) DEFAULT NULL,
  `anchoprod` float(9,2) DEFAULT NULL,
  `bateriasinclu` varchar(20) DEFAULT NULL,
  `tamaram` int(11) DEFAULT NULL,
  `tamadiscoduro` int(11) DEFAULT NULL,
  `sistemaoperativo` varchar(45) DEFAULT NULL,
  `procesador` varchar(45) DEFAULT NULL,
  `tamapantalla` float(9,2) DEFAULT NULL,
  `resolucion` varchar(45) DEFAULT NULL,
  `numeroprocesadores` int(11) DEFAULT NULL,
  `tipodiscoduro` varchar(45) DEFAULT NULL,
  `imagen1` varchar(60) NOT NULL,
  `imagen2` varchar(60) NOT NULL,
  `imagen3` varchar(60) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `precio` float(9,2) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`id`, `marca`, `fabricante`, `altoprod`, `anchoprod`, `bateriasinclu`, `tamaram`, `tamadiscoduro`, `sistemaoperativo`, `procesador`, `tamapantalla`, `resolucion`, `numeroprocesadores`, `tipodiscoduro`, `imagen1`, `imagen2`, `imagen3`, `color`, `precio`, `descripcion`) VALUES
(1, 'Motorola', 'Motorola', 15.24, 10.16, 'SI', 4, 128, 'Android 10.0', 'Snapdragon 730G', 6.80, '1080x 2400', 8, 'N/A', 'Motog9.jpg', 'Motog92.jpg', 'Motog93.jpg', 'Azul', 5362.46, ''),
(2, 'Prueba', 'Prueba', 1.10, 1.10, 'Prueba', 1, 1, 'Prueba', 'Prueba', 1.10, '123', 2, 'N/A', 'prueba.jpg', 'prueba2.jpg', 'prueba3.jpg', 'Prueba', 123.00, ''),
(3, 'Samsung', 'CANCELAR', 15.30, 12.20, 'CANCELAR', 4, 120, 'Android 10', 'Snapdragon', 10.20, '1920 x 2400', 4, 'N/A', 'Motog9.jpg', 'Motog92.jpg', 'Motog93.jpg', 'Negro', 3500.00, ''),
(4, 'HUAWEI', 'CANCELAR', 9.00, 13.00, 'CANCELAR', 8, 256, '', 'AMD Ryzen 5 3500U', 13.00, '2160x1440', 4, 'SSD', 'HUAWEI-MATEBOOK-13-01.jpg', 'HUAWEI-MATEBOOK-13-02.jpg', 'HUAWEI-MATEBOOK-13-03.jpg', '#d1d1d1', 17999.00, ''),
(5, 'HUAWEI', 'CANCELAR', 9.00, 14.00, 'CANCELAR', 8, 512, 'Windows 10 Home', '10th Gen Intel® Core™ i7-10510U Procesador', 14.00, '2160x1440', 4, 'SSD', 'HUAWEI-MATEBOOK-14-01.jpg', 'HUAWEI-MATEBOOK-14-02.jpg', 'HUAWEI-MATEBOOK-14-03.jpg', '#007580', 21000.00, ''),
(6, 'HUAWEI', 'CANCELAR', 10.00, 16.00, 'CANCELAR', 16, 512, 'Windows 10 Home', 'Intel® Core ™ i5-1135G7 de 11.a generación', 15.60, '1920x1080', 4, 'SSD', 'HUAWEI-MATEBOOK-15-01.jpg', 'HUAWEI-MATEBOOK-15-02.jpg', 'HUAWEI-MATEBOOK-15-03.jpg', '#566a86', 22999.00, ''),
(7, 'HUAWEI', 'CANCELAR', 7.00, 10.00, 'CANCELAR', 12, 128, 'EMUI 10.1 (Basado en Android 10.0)', 'Snapdragon 870', 10.40, '2000 x1200', 4, 'ROM', 'Huawei-Matepad-10-4-01.jpg', 'Huawei-Matepad-10-4-02.jpg', 'Huawei-Matepad-10-4-03.jpg', '#096390', 10999.00, ''),
(8, 'HUAWEI', 'CANCELAR', 9.40, 6.30, 'CANCELAR', 3, 64, 'EMUI 10.1 (basado en Android 10.0)', 'Kirin 710A', 10.10, '1920 x 1200', 2, 'ROM', 'HUAWEI-MatePad-10.4-01.jpg', 'HUAWEI-MatePad-10.4-02.jpg', 'HUAWEI-MatePad-10.4-03.jpg', '#002080', 6999.00, ''),
(9, 'Iphone', 'CANCELAR', 5.00, 3.00, 'CANCELAR', 3, 256, 'iOS 12.1', 'Apple A12 Bionic', 4.00, '1920x1080', 4, 'SSD', 'CaratulaIphoneRojo.jpg', 'IphoneRojoImagen1.jpg', 'IphoneRojoImagen2.jpg', '#e13d5e', 13000.00, ''),
(10, 'Iphone', 'CANCELAR', 5.00, 3.00, 'CANCELAR', 4, 128, 'iOS 13', 'Apple A13 Bionic', 6.00, '1.792x828', 4, 'SSD', 'CaratulaIphone11Negro.jpg', 'Iphone11Imagen1.jpg', 'Iphone11Imagen2.jpg', '#e13d5e', 22000.00, ''),
(11, 'Iphone', 'CANCELAR', 7.00, 5.00, 'CANCELAR', 6, 512, 'iOS 14', 'Apple A14 Bionic', 6.00, '2.778x1.284', 4, 'SSD', 'CaratulaIphone12Azul.jpg', 'Iphone12ProMaxImagen1.jpg', 'Iphone12ProMaxImagen2.jpg', '#007580', 32000.00, ''),
(12, 'Corsair', 'CANCELAR', 3.00, 1.00, 'CANCELAR', 1, 1, 'Ninguno', 'Ninguno', 1.00, '0', 1, 'Ninguno', 'AudifonosCorsairHS70_01.jpg', 'AudifonosCorsairHS70_02.jpg', 'AudifonosCorsairHS70_03.jpg', '#000000', 2000.00, ''),
(13, 'Intel', 'CANCELAR', 1.00, 1.00, 'CANCELAR', 128, 128, 'Windows,Linux', 'Core i7-10700KA', 100.00, '4096 x 2304', 8, 'SSD', 'Corei7-10700KA_01.png', 'Corei7-10700KA_02.jpg', 'Corei7-10700KA_03.jpg', '#0109f9', 8000.00, ''),
(14, 'Acer', 'CANCELAR', 10.03, 14.29, 'CANCELAR', 16, 1128, 'Windows 10 Pro', 'Intel Ci710750H', 15.60, '1920x1080', 6, 'SSD+HDD', 'LaptopAcerGamer01.jpg', 'LaptopAcerGamer02.jpg', 'LaptopAcerGamer03.jpg', '#000000', 32500.00, ''),
(15, 'Asus', 'CANCELAR', 20.75, 21.17, 'CANCELAR', 1, 1, 'Ninguno', 'Ninguno', 23.60, '1920x1080', 1, 'Ninguno', 'MonitorGamerAsus_01.jpg', 'MonitorGamerAsus_02.jpg', 'MonitorGamerAsus_03.jpg', '#000000', 6000.00, ''),
(16, 'XPG', 'CANCELAR', 1.00, 1.80, 'CANCELAR', 16, 16, 'Windows,Linux', 'Ninguno', 1.00, '0', 4, 'DDR4', 'RAMSpectrix01.jpg', 'RAMSpectrix02.jpg', 'RAMSpectrix03.jpg', '#00a4b3', 2500.00, ''),
(17, 'Samsung', 'CANCELAR', 5.97, 2.80, 'CANCELAR', 8, 256, 'Android 11 One UI 3.0', 'Exynos 2100 a 2,9GHz', 6.20, '1080x2400', 8, 'SSD', 'SamsungGalaxyS21_01.jpg', 'SamsungGalaxyS21_02.jpg', 'SamsungGalaxyS21_03.jpg', '#007580', 27000.00, ''),
(18, 'Western', 'CANCELAR', 3.14, 1.00, 'CANCELAR', 1, 1000, 'Windows,Linux', 'Ninguno', 1.00, '0', 1, 'SSD', 'SSDWestern01.jpg', 'SSDWestern02.jpg', 'SSDWestern03.jpg', '#000000', 3500.00, ''),
(19, 'Microsoft', 'CANCELAR', 1.10, 1.00, 'CANCELAR', 16, 1000, 'Microsoft Xbox', 'CPU Zen 2', 400.00, '8192 x 4320', 8, 'SSD', 'XboxSeriesX01.jpg', 'XboxSeriesX02.jpg', 'XboxSeriesX03.jpg', '#007580', 17000.00, ''),
(20, '1n4007', 'Micro Commercial Co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'diodo1', 'diodo2', 'diodo3', 'negro', 35.00, 'Voltaje inverso pico: 1000v o 1KV Corriente de sobretensión máxima: 30A'),
(21, '1N47', 'litlefuse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zenner1', 'zenner2', 'zenner3', 'cafe', 3.50, '\r\nDiodo Zener de 5,6 Volts a 1/2 Watt, con tolerancia del 5%.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas_compras`
--

DROP TABLE IF EXISTS `entregas_compras`;
CREATE TABLE IF NOT EXISTS `entregas_compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `hora_entrega` time NOT NULL,
  `Linea` varchar(50) NOT NULL,
  `Estacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vendedor` (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entregas_compras`
--

INSERT INTO `entregas_compras` (`id`, `id_compra`, `fecha_entrega`, `hora_entrega`, `Linea`, `Estacion`) VALUES
(11, 37, '2021-06-21', '04:08:27', 'A', 'La paz'),
(12, 37, '2021-06-21', '04:08:27', 'A', 'La paz'),
(13, 38, '2021-06-21', '04:08:28', 'A', 'La paz'),
(14, 38, '2021-06-21', '04:08:28', 'A', 'La paz'),
(15, 39, '2021-06-21', '04:13:18', 'A', 'La paz'),
(16, 39, '2021-06-21', '04:13:19', 'A', 'La paz'),
(17, 40, '2021-06-21', '04:16:47', 'A', 'La paz'),
(18, 40, '2021-06-21', '04:16:47', 'A', 'La paz'),
(19, 41, '2021-06-21', '04:18:13', 'A', 'La paz'),
(20, 41, '2021-06-21', '04:18:13', 'A', 'La paz'),
(21, 42, '2021-06-21', '04:26:24', 'A', 'La paz'),
(22, 43, '2021-06-21', '04:29:06', 'A', 'La paz'),
(23, 44, '2021-06-21', '04:29:13', 'A', 'La paz'),
(24, 45, '2021-06-21', '04:29:43', 'A', 'La paz'),
(25, 46, '2021-06-21', '04:30:31', 'A', 'La paz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidop` varchar(45) NOT NULL,
  `apellidom` varchar(45) NOT NULL,
  `institucion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info`
--

INSERT INTO `info` (`id`, `nombre`, `apellidop`, `apellidom`, `institucion`) VALUES
(1, 'José Alberto', 'Rincón', 'Mendoza', 'ESCOM'),
(2, 'Rodrigo', 'González', 'Pérez', 'ESCOM'),
(3, 'Omar', 'Aguirre', 'Alvarez', 'ESCOM'),
(4, 'Omar', 'Doncel', 'Beltran', 'ESCOM'),
(5, 'Eliel', 'Guerra', 'Garcia', 'ESCOM'),
(6, 'Josue', 'Guerra ', 'Garcia', 'ESCOM'),
(7, 'Adrian', 'Castañeda', 'Lopez', 'ESCOM'),
(8, 'Prueba', 'de', 'Tarjeta', 'ESCOM'),
(9, 'Luis Francisco', 'Sosa', 'Xiqui', 'Escom');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infobancaria`
--

DROP TABLE IF EXISTS `infobancaria`;
CREATE TABLE IF NOT EXISTS `infobancaria` (
  `idinfobancaria` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `infotarjeta_id` int(11) NOT NULL,
  PRIMARY KEY (`idinfobancaria`),
  KEY `fk_infobancaria_info1_idx` (`info_id`),
  KEY `fk_infobancaria_infotarjeta1_idx` (`infotarjeta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infobancaria`
--

INSERT INTO `infobancaria` (`idinfobancaria`, `info_id`, `infotarjeta_id`) VALUES
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infotarjeta`
--

DROP TABLE IF EXISTS `infotarjeta`;
CREATE TABLE IF NOT EXISTS `infotarjeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` varchar(30) NOT NULL,
  `exp` varchar(10) NOT NULL,
  `codigo` varchar(4) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infotarjeta`
--

INSERT INTO `infotarjeta` (`id`, `num`, `exp`, `codigo`, `correo_usuario`) VALUES
(1, '1234 1234 1234 1234', '09/25', '123', '0'),
(2, '123456789123456', '12/12', '1234', 'omar.fi.wwr@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listacategorias`
--

DROP TABLE IF EXISTS `listacategorias`;
CREATE TABLE IF NOT EXISTS `listacategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategoria_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_listacategorias_subcategoria1_idx` (`subcategoria_id`),
  KEY `fk_listacategorias_categorias1_idx` (`categorias_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `metododepago`;
CREATE TABLE IF NOT EXISTS `metododepago` (
  `idmetododepago` int(11) NOT NULL AUTO_INCREMENT,
  `metodo` varchar(45) NOT NULL,
  PRIMARY KEY (`idmetododepago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

DROP TABLE IF EXISTS `privilegios`;
CREATE TABLE IF NOT EXISTS `privilegios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilegio` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `listacategorias_id` int(11) NOT NULL,
  `descripcion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_listacategorias1_idx` (`listacategorias_id`),
  KEY `fk_producto_descripcion1_idx` (`descripcion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `stock`, `estado`, `calificacion`, `listacategorias_id`, `descripcion_id`) VALUES
(1, 'Moto G9 Plus', 6, 'PUBLICADO', NULL, 11, 1),
(2, 'Prueba', 12, 'PUBLICADO', NULL, 8, 2),
(3, 'Celular Prueba', 20, 'PUBLICADO', 5, 2, 3),
(4, 'HUAWEI MateBook 13', 12, 'PUBLICADO', 5, 1, 4),
(5, 'HUAWEI MateBook 14', 5, 'PUBLICADO', 5, 1, 5),
(6, 'HUAWEI MateBook D 15', 8, 'PUBLICADO', 5, 1, 6),
(7, 'HUAWEI MatePad 10.4', 14, 'PUBLICADO', 5, 1, 7),
(8, 'HUAWEI MatePad T 10s (Deepsea blue)', 3, 'PUBLICADO', 5, 1, 8),
(9, 'Iphone Xr', 3, 'ESPERA', 5, 2, 9),
(10, 'Iphone 11', 2, 'ESPERA', 5, 1, 10),
(11, 'Iphone 12', 5, 'ESPERA', 5, 1, 11),
(12, 'Audifonos Corsair HS70', 15, 'ESPERA', 5, 1, 12),
(13, 'Procesador Intel Core i7-10700KA', 10, 'ESPERA', 5, 1, 13),
(14, 'Laptop Acer Nitro 5 AN515-55-73EJ', 5, 'ESPERA', 5, 1, 14),
(15, 'Monitor Asus Tuf Gaming', 12, 'ESPERA', 5, 1, 15),
(16, 'Memoria RAM XPG SPECTRIX D60G', 32, 'ESPERA', 5, 1, 16),
(17, 'Samsung Galaxy S21', 21, 'ESPERA', 5, 2, 17),
(18, 'SSD Western Digital WD Black SN750 NVMe', 37, 'ESPERA', 5, 1, 18),
(19, 'Xbox Series X', 13, 'ESPERA', 5, 1, 19),
(20, 'Diodo rectificador', 10, 'PUBLICADO', 3, 16, 20),
(21, 'Diodo zener', 40, 'PUBLICADO', 5, 16, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comprados`
--

DROP TABLE IF EXISTS `productos_comprados`;
CREATE TABLE IF NOT EXISTS `productos_comprados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_compra` (`id_compra`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_comprados`
--

INSERT INTO `productos_comprados` (`id`, `id_compra`, `id_producto`, `cantidad`, `subtotal`) VALUES
(45, 34, 8, 1, 6999),
(46, 34, 4, 1, 17999),
(47, 35, 8, 1, 6999),
(48, 35, 4, 1, 17999),
(49, 36, 8, 1, 6999),
(50, 36, 4, 1, 17999),
(51, 37, 8, 1, 6999),
(52, 37, 4, 1, 17999),
(53, 38, 8, 1, 6999),
(54, 38, 4, 1, 17999),
(55, 39, 5, 1, 21000),
(56, 39, 6, 1, 22999),
(57, 40, 6, 1, 22999),
(58, 40, 5, 1, 21000),
(59, 41, 6, 1, 22999),
(60, 41, 5, 1, 21000),
(61, 42, 20, 1, 35),
(62, 43, 20, 1, 35),
(63, 44, 20, 1, 35),
(64, 45, 20, 1, 35),
(65, 46, 20, 1, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_e`
--

DROP TABLE IF EXISTS `punto_e`;
CREATE TABLE IF NOT EXISTS `punto_e` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipotrans` int(11) DEFAULT NULL,
  `linea_esc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `punto_e`
--

INSERT INTO `punto_e` (`id`, `id_tipotrans`, `linea_esc`) VALUES
(1, 1, 'Linea 1'),
(2, 1, 'Linea 2'),
(3, 1, 'Linea 3'),
(4, 1, 'Linea 4'),
(5, 1, 'Linea 4'),
(6, 1, 'Linea 5'),
(7, 1, 'Linea 6'),
(8, 1, 'Linea 7'),
(9, 1, 'Linea 8'),
(10, 1, 'Linea 9'),
(11, 1, 'Linea A'),
(12, 1, 'Linea B'),
(13, 1, 'Linea 12'),
(14, 2, 'Linea 1'),
(15, 2, 'Linea 2'),
(16, 2, 'Linea 3'),
(17, 2, 'Linea 4'),
(18, 2, 'Linea 4'),
(19, 2, 'Linea 5'),
(20, 2, 'Linea 6'),
(21, 2, 'Linea 7'),
(22, 3, 'ESCOM'),
(23, 3, 'ESIME TICOMAN'),
(24, 3, 'ESIME ZACATENCO'),
(25, 3, 'ESIME CULHUACAN'),
(26, 3, 'ESIME AZCAPOTZALCO'),
(27, 3, 'UPIITA'),
(28, 3, 'UPIICSA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrodechat`
--

DROP TABLE IF EXISTS `registrodechat`;
CREATE TABLE IF NOT EXISTS `registrodechat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comprador_id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `catalogodeproductos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registrodechat_comprador1_idx` (`comprador_id`),
  KEY `fk_registrodechat_vendedor1_idx` (`vendedor_id`),
  KEY `fk_registrodechat_catalogodeproductos1_idx` (`catalogodeproductos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrodechat`
--

INSERT INTO `registrodechat` (`id`, `comprador_id`, `vendedor_id`, `catalogodeproductos_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrodecompra`
--

DROP TABLE IF EXISTS `registrodecompra`;
CREATE TABLE IF NOT EXISTS `registrodecompra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comprador_id` int(11) NOT NULL,
  `catalogodeproductos_id` int(11) NOT NULL,
  `metododepago_idmetododepago` int(11) NOT NULL,
  `total` float(9,2) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registrodecompra_metododepago1_idx` (`metododepago_idmetododepago`),
  KEY `fk_registrodecompra_comprador1_idx` (`comprador_id`),
  KEY `fk_registrodecompra_catalogodeproductos1_idx` (`catalogodeproductos_id`),
  KEY `fk_registrodecompra_status1_idx` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `estatus` varchar(30) NOT NULL,
  `privilegios_id` int(11) NOT NULL,
  PRIMARY KEY (`correo`),
  KEY `fk_usuario_privilegios1_idx` (`privilegios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `contrasena`, `hash`, `estatus`, `privilegios_id`) VALUES
('admin@admin.com', 'Contraseña123', '', 'VERIFICADO', 1),
('adrian@comprador.ipn.com', '12345', '', 'VERIFICADO', 2),
('adrian@vendedor.ipn.com', '12345', '', 'VERIFICADO', 3),
('eliel_comprador@prueba.com', 'prueba', '', 'VERIFICADO', 2),
('eliel_vendedor@prueba.com', 'prueba', '', 'VERIFICADO', 3),
('franciscov@gmail.com', 'vendedor', '1002', 'VERIFICADO', 3),
('joss.alberto.r.m@gmail.com', 'Contraseña', '', 'VERIFICADO', 2),
('omar.fi.wwr@gmail.com', '1234', '285e19f20beded7d215102b49d5c09a0', 'SIN_VERIFICAR', 3),
('omar_comprador@prueba.com', 'prueba', '', 'VERIFICADO', 2),
('omar_vendedor@prueba.com', 'prueba', '', 'VERIFICADO', 3),
('prueba@prueba.com', 'Contra', '', 'VERIFICADO', 2),
('rodrigo@rodrigo.com', 'Contraseña', '', 'VERIFICADO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE IF NOT EXISTS `vendedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_correo` varchar(50) NOT NULL,
  `info_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vendedor_usuario1_idx` (`usuario_correo`),
  KEY `fk_vendedor_info1_idx` (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id`, `usuario_correo`, `info_id`) VALUES
(1, 'rodrigo@rodrigo.com', 2),
(3, 'omar_vendedor@prueba.com', 4),
(4, 'eliel_vendedor@prueba.com', 5),
(5, 'adrian@vendedor.ipn.com', 7),
(6, 'omar.fi.wwr@gmail.com', 8),
(7, 'franciscov@gmail.com', 9);

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
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idregistroDeChat`) REFERENCES `registrodechat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`correoEnvia`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD CONSTRAINT `fk_comprador_info1` FOREIGN KEY (`info_id`) REFERENCES `info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comprador_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_comprador`) REFERENCES `comprador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregas_compras`
--
ALTER TABLE `entregas_compras`
  ADD CONSTRAINT `entregas_compras_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD CONSTRAINT `productos_comprados_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_comprados_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
