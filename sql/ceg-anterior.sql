-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2021 a las 08:46:33
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

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
CREATE DATABASE IF NOT EXISTS `ceg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ceg`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE DATABASE IF NOT EXISTS ceg;

use ceg;

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
  `avgcalificacion` int(11) DEFAULT NULL,
  `precio` double(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(12, 5, 12, 10, 0.00),
(13, 5, 13, 10, 0.00),
(14, 5, 14, 10, 0.00),
(15, 5, 15, 10, 0.00),
(16, 5, 16, 10, 0.00),
(17, 5, 17, 10, 0.00),
(18, 5, 18, 10, 0.00),
(19, 5, 19, 10, 0.00);

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
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `idregistroDeChat` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `mensaje` varchar(300) DEFAULT NULL,
  `correoEnvia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 1, '2021-06-07 17:17:00', 'Disculpe', 'joss.alberto.r.m@gmail.com');

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
(2, 'prueba@prueba.com', 3),
(3, 'eliel_comprador@prueba.com', 5),
(4, 'adrian@comprador.ipn.com', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`id`, `marca`, `fabricante`, `altoprod`, `anchoprod`, `bateriasinclu`, `tamaram`, `tamadiscoduro`, `sistemaoperativo`, `procesador`, `tamapantalla`, `resolucion`, `numeroprocesadores`, `tipodiscoduro`, `imagen1`, `imagen2`, `imagen3`, `color`, `precio`, `descripcion`) VALUES
(1, 'Motorola', 'Motorola', 15.24, 10.16, 'SI', 4, 128, 'Android 10.0', 'Snapdragon 730G', 6.80, '1080x 2400', 8, 'N/A', 'Motog9.jpg', 'Motog92.jpg', 'Motog93.jpg', 'Azul', 5362.46, ''),
(2, 'Prueba', 'Prueba', 1.10, 1.10, 'Prueba', 1, 1, 'Prueba', 'Prueba', 1.10, '123', 2, 'N/A', 'prueba.jpg', 'prueba2.jpg', 'prueba3.jpg', 'Prueba', 123.00, ''),
(3, 'Samsung', 'CANCELAR', 15.30, 12.20, 'CANCELAR', 4, 120, 'Android 10', 'Snapdragon', 10.20, '1920 x 2400', 4, 'N/A', 'Motog9.jpg', 'Motog92.jpg', 'Motog93.jpg', 'Negro', 3500.00, ''),
(4, 'HUAWEI', 'CANCELAR', 9.00, 13.00, 'CANCELAR', 8, 256, '', 'AMD Ryzen 5 3500U', 13.00, '2160x1440', 4, 'SSD', 'HUAWEI-MATEBOOK-13-01.jpg', 'HUAWEI-MATEBOOK-13-02.jpg', 'HUAWEI-MATEBOOK-13-03.jpg', '#d1d1d1', 17999.00, ''),
(5, 'HUAWEI', 'CANCELAR', 9.00, 14.00, 'CANCELAR', 8, 512, 'Windows 10 Home', '10th Gen Intel® Core™ i7-10510U Procesador', 14.00, '2160x1440', 4, 'SSD', 'HUAWEI-MATEBOOK-14-01.jpg', 'HUAWEI-MATEBOOK-14-02.jpg', 'HUAWEI-MATEBOOK-14-03.jpg', '#007580', 21000.00, ''),
(6, 'HUAWEI', 'CANCELAR', 10.00, 16.00, 'CANCELAR', 16, 512, 'Windows 10 Home', 'Intel® Core ™ i5-1135G7 de 11.a generación', 15.60, '1920x1080', 4, 'SSD', 'HUAWEI-MATEBOOK-15-01', 'HUAWEI-MATEBOOK-15-02', 'HUAWEI-MATEBOOK-15-03', '#566a86', 22999.00, ''),
(7, 'HUAWEI', 'CANCELAR', 7.00, 10.00, 'CANCELAR', 12, 128, 'EMUI 10.1 (Basado en Android 10.0)', 'Snapdragon 870', 10.40, '2000 x1200', 4, 'ROM', 'Huawei-Matepad-10-4-01', 'Huawei-Matepad-10-4-02', 'Huawei-Matepad-10-4-03', '#096390', 10999.00, ''),
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
(19, 'Microsoft', 'CANCELAR', 1.10, 1.00, 'CANCELAR', 16, 1000, 'Microsoft Xbox', 'CPU Zen 2', 400.00, '8192 x 4320', 8, 'SSD', 'XboxSeriesX01.jpg', 'XboxSeriesX02.jpg', 'XboxSeriesX03.jpg', '#007580', 17000.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas_compras`
--

CREATE TABLE `entregas_compras` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `hora_entrega` time NOT NULL,
  `Linea` varchar(50) NOT NULL,
  `Estacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'Omar', 'Aguirre', 'Alvarez', 'ESCOM'),
(4, 'Omar', 'Doncel', 'Beltran', 'ESCOM'),
(5, 'Eliel', 'Guerra', 'Garcia', 'ESCOM'),
(6, 'Josue', 'Guerra ', 'Garcia', 'ESCOM'),
(7, 'Adrian', 'Castañeda', 'Lopez', 'ESCOM');

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
(19, 'Xbox Series X', 13, 'ESPERA', 5, 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comprados`
--

CREATE TABLE `productos_comprados` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_e`
--

CREATE TABLE `punto_e` (
  `id` int(11) NOT NULL,
  `id_tipotrans` int(11) DEFAULT NULL,
  `linea_esc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `registrodechat` (
  `id` int(11) NOT NULL,
  `comprador_id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `catalogodeproductos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrodechat`
--

INSERT INTO `registrodechat` (`id`, `comprador_id`, `vendedor_id`, `catalogodeproductos_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1);

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
  `hash` varchar(32) NOT NULL,
  `estatus` varchar(30) NOT NULL,
  `privilegios_id` int(11) NOT NULL
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
('joss.alberto.r.m@gmail.com', 'Contraseña', '', 'VERIFICADO', 2),
('omar_comprador@prueba.com', 'prueba', '', 'VERIFICADO', 2),
('omar_vendedor@prueba.com', 'prueba', '', 'VERIFICADO', 3),
('prueba@prueba.com', 'Contraseña', '', 'VERIFICADO', 2),
('rodrigo@rodrigo.com', 'Contraseña', '', 'VERIFICADO', 3);

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
(1, 'rodrigo@rodrigo.com', 2),
(3, 'omar_vendedor@prueba.com', 4),
(4, 'eliel_vendedor@prueba.com', 5),
(5, 'adrian@vendedor.ipn.com', 7);

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
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idregistroDeChat` (`idregistroDeChat`),
  ADD KEY `correoEnvia` (`correoEnvia`);

--
-- Indices de la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comprador_info1_idx` (`info_id`),
  ADD KEY `fk_comprador_usuario1` (`usuario_correo`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_comprador` (`id_comprador`);

--
-- Indices de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregas_compras`
--
ALTER TABLE `entregas_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compra` (`id_compra`);

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
-- Indices de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `punto_e`
--
ALTER TABLE `punto_e`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comprador`
--
ALTER TABLE `comprador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `entregas_compras`
--
ALTER TABLE `entregas_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `punto_e`
--
ALTER TABLE `punto_e`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `registrodechat`
--
ALTER TABLE `registrodechat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"angular_direct\":\"direct\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"ceg\",\"table\":\"usuario\"},{\"db\":\"ceg2\",\"table\":\"usuario\"},{\"db\":\"ceg\",\"table\":\"punto_e\"},{\"db\":\"ceg\",\"table\":\"descripcion\"},{\"db\":\"ceg\",\"table\":\"vendedor\"},{\"db\":\"ceg\",\"table\":\"comprador\"},{\"db\":\"ceg\",\"table\":\"info\"},{\"db\":\"ceg\",\"table\":\"privilegios\"},{\"db\":\"ceg\",\"table\":\"producto\"},{\"db\":\"ceg\",\"table\":\"status\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2021-06-17 06:39:55', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
