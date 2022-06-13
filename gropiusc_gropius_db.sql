-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-04-2021 a las 14:12:39
-- Versión del servidor: 5.7.33-log-cll-lve
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gropiusc_gropius_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `menu_display` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `user`, `email`, `password`, `role`, `menu_display`, `activo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@wozial.com', '$2y$10$1zm6ifKC5Lnx2TFmlQVrCe9tQFDvOoercnMRow5fx3.5u8aHbF.U2', 1, NULL, 1, 'r1aVa296omrd0PenC3FWKAjAwtdla6jQRnTnvA3yNFbH2uP9SsZ289SlhOrK', '2020-10-14 03:24:37', '2020-10-14 03:24:37'),
(2, 'gropius', 'admin@gropius.com.mx', '$2y$10$8TZcZH/ljndn03ZrF1hfxud991FusVJg5/WQ10OR4GcBrT4vxKjuG', 1, NULL, 1, '7ijCDNLCkW', '2021-02-13 09:28:11', '2021-02-13 09:28:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusels`
--

CREATE TABLE `carrusels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrusels`
--

INSERT INTO `carrusels` (`id`, `titulo`, `subtitulo`, `image`, `url`, `video`, `llave`, `orden`) VALUES
(27, NULL, NULL, 'Qec5VWLQPnCWhs3TNFP5kePiYBAjKf.jpg', NULL, NULL, NULL, 99),
(30, NULL, NULL, 'OReUr2QvukVGdPQuGgsBKFV53GVkdV.jpg', NULL, NULL, NULL, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `parent`, `activo`, `orden`) VALUES
(1, 'SILLAS', 'sillas', 0, 1, 99),
(2, 'SILLONES', 'sillones', 0, 1, 99),
(3, 'INTERIOR', 'sillas-interior', 1, 1, 99),
(4, 'EXTERIOR', 'sillas-exterior', 1, 1, 99),
(5, 'EXTERIOR', 'sillones-exterior', 2, 1, 1),
(6, 'INTERIOR', 'sillones-interior', 2, 1, 0),
(11, 'Pa', 'sillas-pa', 8, 1, 99),
(21, 'ESCRITORIOS', 'escritorios', 0, 1, 99),
(22, 'ESCRITORIOS', 'escritorios-escritorios', 21, 1, 99),
(23, 'COLABORACIONES', 'colaboraciones', 0, 1, 99),
(24, 'BENITO SANTOS', 'colaboraciones-benito-santos', 23, 1, 99),
(25, 'PASCUAL SALVADOR', 'colaboraciones-pascual-salvador', 23, 1, 99),
(26, 'EDGAR HUERTA', 'colaboraciones-edgar-huerta', 23, 1, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categ_tamanos`
--

CREATE TABLE `categ_tamanos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sizeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '99',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categ_tamanos`
--

INSERT INTO `categ_tamanos` (`id`, `sizeName`, `slug`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'Caballaje', 'caballaje', 99, '2020-12-24 01:25:48', '2020-12-24 01:25:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hexa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `textura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BoolTexture` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `name`, `hexa`, `textura`, `BoolTexture`, `orden`) VALUES
(1, 'NEGRO', '#000000', NULL, 0, 0),
(5, 'NARANJA', '#ff0000', NULL, 0, 4),
(6, 'AMARILLO', '#ffdd00', NULL, 0, 5),
(8, 'VERDE', '#255b30', NULL, 0, 2),
(12, 'PIEL CAFÉ', NULL, 'qgvark4Bo9DDk83rqIK81QOT28CyFA.jpeg', 1, 6),
(14, 'TRIPLAY', NULL, 'jyMsh9AzickRoDBrwROVze9Pl3Vd5b.jpg', 1, 3),
(15, 'PIEL NEGRO', NULL, 'qxbqyFF1oOBPqVIZH7LlzKr9xTjGUT.jpg', 1, 7),
(16, 'CAFÉ', '#724403', NULL, 0, 1),
(17, 'ENCINO', NULL, 'zPFFOYZWwEMIjbLKMSlqUk3pEEFslc.jpg', 1, 99),
(18, 'prueba 1', NULL, 'dhaP3GQm7XDx6JBiVURthPnZ6gyQPG.png', 1, 99),
(19, 'PRUEBA 2', '#a25d5d', NULL, 0, 99),
(20, 'BEIGE', '#ddcfc0', NULL, 0, 99),
(21, 'ROSA MORADA', NULL, 'YngparKgkQIsMWu3I1b1Qn2xWoafcX.jpg', 1, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodspag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sliderhmin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sliderhmax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1000',
  `sliderproporcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slideranim` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slidertextos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypalemail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypalid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypalsecret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conektaPub` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conektaPri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destinatario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destinatario2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitente` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitentepass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitentehost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitenteport` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitenteseguridad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envioglobal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incremento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `aboutimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `title`, `description`, `prodspag`, `sliderhmin`, `sliderhmax`, `sliderproporcion`, `slideranim`, `slidertextos`, `paypalemail`, `paypalid`, `paypalsecret`, `conektaPub`, `conektaPri`, `destinatario`, `destinatario2`, `remitente`, `remitentepass`, `remitentehost`, `remitenteport`, `remitenteseguridad`, `telefono`, `telefono2`, `facebook`, `instagram`, `youtube`, `linkedin`, `envio`, `envioglobal`, `iva`, `incremento`, `about`, `aboutimg`, `banco`, `created_at`, `updated_at`) VALUES
(1, 'Gropius.com.mx', 'Tienda especializada en muebles de diseño.', '5', '0', '1000', NULL, NULL, NULL, 'comercial@cb4u.com.mx', 'AXuqJhH_2UNJihpOY1LYT5ENQq_lsUHFi0yTpZGilTjHXoqKvYevlfi_R7WW9GocqqBsjHTi-ozYgADI', 'EFSH8A7RpckidKNxdoeNM9NFD88mKHulGUtUrPmCsKwxe4FbVqDGOWsZDJPXUMl2HEh-9Gv7_l12tI87-9Gv7_l12tI87-9Gv7_l12tI87', 'key_RW2xv4N7bg8cF1rsLb3iCxg', 'key_dXG5pb1mogaQUrpR9moUZg', 'gropiusoriginart@gmail.com', 'mktdigital@cb4u.com.mx', 'noreply@gropius.com.mx', 'arrgA_.GPM;E', 'mail.gropius.com.mx', '465', 'ssl', '3337936666', '3314559218', 'https://www.facebook.com/gropiusfurniture', 'https://www.instagram.com/gropius_furniture/', 'https://www.pinterest.com.mx/GROPIUS_FURNITURE/', 'https://www.linkedin.com/company/gropius-furniture/', '0', '0', '0', NULL, 'Tangibilizamos los mejores conceptos, ideas y diseños a través de cualquier elemento que pueda interactuar con al menos uno de los sentidos de sus usuarios que los lleve a experimentar su propio mundo de forma ORIGINAL, única, trascendente, inolvidable y artística.', '9T0tkV3CM12Qj42uLeQM0HhZxLc2Sx.jpg', 'Razon Social: CB4U CREATING BUSINESS FOR YOU S DE RL DE CV\nBanco: SANTANDER\nCuenta: 65507166011\nClabe: 014320655071660118', '2020-11-20 22:41:38', '2021-03-24 05:57:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  `cantidad` double(6,2) DEFAULT NULL,
  `vigencia` date NOT NULL,
  `usos` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL DEFAULT '99',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numint` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entrecalles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Mexico',
  `favorito` tinyint(1) DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `alias`, `calle`, `numext`, `numint`, `entrecalles`, `colonia`, `cp`, `municipio`, `estado`, `pais`, `favorito`, `user`, `created_at`, `updated_at`) VALUES
(1, 'casa', 'avenida lapizlazuli 2074', '2', '1', 'mauna loa', 'ciudad del sol', '6777', 'zapopan', 'Jalisco', 'Mexico', NULL, 1, '2021-02-14 03:00:58', '2021-02-14 03:00:58'),
(2, 'Trabajo', 'Las Lomas 100, Los Robles, 45134 Nuevo México, Jal', '100', NULL, 'av Angel leaño', 'Los robles', '45134', 'nuevo mexico', 'Jalisco', 'Mexico', NULL, 2, '2021-02-20 01:58:21', '2021-02-20 01:58:21'),
(3, 'sara', 'lapiz', '2074', '3', 'perla', 'perla', '45070', 'zapopan', 'Jalisco', 'Mexico', NULL, 3, '2021-03-02 22:21:12', '2021-03-02 22:21:12'),
(4, 'trabajo', 'av lapizlazuli', '2074', NULL, 'asdfasdfasdf', 'bosques', '45089', 'zapopan', 'Jalisco', 'Mexico', NULL, 5, '2021-03-12 23:53:48', '2021-03-12 23:53:48'),
(5, 'Casa', 'Av Juan Gil Preciado', '4065', 'C', 'Casi esquina Av Guadalajara', 'Jardines de Nuevo México', '45138', 'Zapopan', 'Jalisco', 'Mexico', NULL, 4, '2021-03-13 00:03:17', '2021-03-13 00:03:17'),
(6, 'Trabajo', 'AV ANGEL LEÑO 401', '401', 'Nave 3 Módulo 12', 'n/a', 'Los Robles', '45134', 'Zapopan', 'Jalisco', 'Mexico', NULL, 7, '2021-03-13 21:44:10', '2021-03-13 21:44:10'),
(7, 'casa', 'Av Lopez mateos norte', '968', NULL, 'florencia', 'italia providencia', '44648', 'guadalajara', 'Jalisco', 'Mexico', NULL, 8, '2021-03-16 07:26:05', '2021-03-16 07:26:05'),
(8, 'casa', 'Av Lopez mateos norte', '968', NULL, 'florencia', 'italia providencia', '44648', 'guadalajara', 'Jalisco', 'Mexico', NULL, 8, '2021-03-16 07:26:11', '2021-03-16 07:26:11'),
(9, 'casa', 'Av Lopez mateos norte', '968', NULL, 'florencia', 'italia providencia', '44648', 'guadalajara', 'Jalisco', 'Mexico', NULL, 8, '2021-03-16 07:26:22', '2021-03-16 07:26:22'),
(10, 'casa', 'Av Lopez mateos norte', '968', NULL, 'florencia', 'italia providencia', '44648', 'guadalajara', 'Jalisco', 'Mexico', NULL, 8, '2021-03-16 07:26:35', '2021-03-16 07:26:35'),
(11, 'casa', 'Av. Lopez mateos norte', '968', NULL, 'florencia', 'italia providencia', '45134', 'guadalajara', 'Selecciona tu estado', 'Mexico', NULL, 2, '2021-03-16 07:28:19', '2021-03-16 07:28:19'),
(12, 'casa', 'Av. Lopez mateos norte', '968', NULL, 'florencia', 'italia providencia', '44648', 'guadalajara', 'Jalisco', 'Mexico', NULL, 2, '2021-03-16 07:28:34', '2021-03-16 07:28:34'),
(13, 'casa', 'Av. Lopez mateos norte', '968', NULL, 'florencia', 'italia providencia', '44648', 'guadalajara', 'Jalisco', 'Mexico', NULL, 2, '2021-03-16 07:30:06', '2021-03-16 07:30:06'),
(14, 'claudia', 'avenida lapizlazuli 2074', '222', '222', 'ss', 's', 's', 's', 'Jalisco', 'Mexico', NULL, 9, '2021-03-17 01:03:37', '2021-03-17 01:03:37'),
(15, 'casa', 'rio tuxcacuesco', '644', NULL, 'av tabachines', 'Loma Bonita', '45085', 'ZAPOPAN', 'Jalisco', 'Mexico', NULL, 10, '2021-03-17 04:05:19', '2021-03-17 04:05:19'),
(16, 'casa', 'rio tuxcacuesco', '644', NULL, 'av tabachines', 'Loma Bonita', '45085', 'ZAPOPAN', 'Jalisco', 'Mexico', NULL, 10, '2021-03-17 04:05:26', '2021-03-17 04:05:26'),
(17, 'ANA PAULA', 'lapizlazilu 2074', '2074', '3', 'perla', 'residencial victoria', '45070', 'Jalisco', 'Jalisco', 'Mexico', NULL, 11, '2021-03-17 06:25:17', '2021-03-17 06:25:17'),
(18, 'test', 'test', '123', NULL, 'asdf asdfsd', 'asdf as', '23423', 'asdfas', 'Jalisco', 'Mexico', NULL, 5, '2021-03-17 07:23:42', '2021-03-17 07:23:42'),
(19, 'test 2', 'test', '123', NULL, 'asdf asdfsd', 'asdf as', '23423', 'asdfas', 'Jalisco', 'Mexico', NULL, 5, '2021-03-17 07:24:11', '2021-03-17 07:24:11'),
(20, 'test 2', 'test', '123', NULL, 'asdf asdfsd', 'asdf as', '23423', 'asdfas', 'Jalisco', 'Mexico', NULL, 5, '2021-03-17 07:24:15', '2021-03-17 07:24:15'),
(21, 'test 3', 'test 3', '123', NULL, 'asdfasdf', 'asdfasdf', '12312', 'asdfasdf', 'Jalisco', 'Mexico', NULL, 5, '2021-03-17 07:24:58', '2021-03-17 07:24:58'),
(22, 'Ana pau 2', 'Test 1 avenida lapizlazuli', '2074', '3', 'perla', 'VOLCAN 1', '45070', 'Jalisco', 'Jalisco', 'Mexico', NULL, 11, '2021-03-17 07:55:41', '2021-03-17 07:55:41'),
(23, 'HOLA', 'HOLA', 'HOLA', 'HO', 'HOLA', 'HOLA', 'HOLA', 'HOLA', 'Querétaro', 'Mexico', NULL, 11, '2021-03-17 09:00:28', '2021-03-17 09:00:28'),
(24, 'HOLA', 'HOLA', 'HOLA', 'HO', 'HOLA', 'HOLA', 'HOLA', 'HOLA', 'Querétaro', 'Mexico', NULL, 11, '2021-03-17 09:00:31', '2021-03-17 09:00:31'),
(25, 'TEST 2222', '2', '2', '2', '2', '2', '2', '2', 'Jalisco', 'Mexico', NULL, 11, '2021-03-17 09:01:30', '2021-03-17 09:01:30'),
(26, 'test4', 'test4', 'test4', 'test4', 'test4', 'test4', 'test4', 'test4', 'Campeche', 'Mexico', NULL, 14, '2021-03-17 09:34:06', '2021-03-17 09:34:06'),
(27, 'hhhhhh', 'jjjjjjj', '89', '9', 'jaja', '99', '99999', 'iii', 'Jalisco', 'Mexico', NULL, 15, '2021-03-20 07:07:48', '2021-03-20 07:07:48'),
(28, 'Wozial', 'Av.Lapizlazuli', '2048', '3', 'Topacio', 'Bosques de la victoria', '45678', 'Guadalajara', 'Jalisco', 'Mexico', NULL, 16, '2021-03-23 03:34:22', '2021-03-23 03:34:22'),
(29, 'Wozial', 'Av.Lapizlazuli', '2048', '3', 'Topacio', 'Bosques de la victoria', '45678', 'Guadalajara', 'Jalisco', 'Mexico', NULL, 16, '2021-03-23 03:34:25', '2021-03-23 03:34:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `elemnto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id`, `elemnto`, `texto`, `imagen`, `url`, `seccion`) VALUES
(1, 'bloque1', 'Somos #Originart', NULL, NULL, 1),
(2, 'bloque2', 'No pierdas de vista las subastas exclusivas que tenemos para tí.\nSuscríbete al newsletter para más información.', NULL, NULL, 1),
(3, 'bloque3', '¡Suscríbete a nuestro Newsletter! Y recibe todas nuestras promociones.', NULL, NULL, 1),
(4, 'bloque1', 'Por el momento no existen subastas anteriores.\nSíguenos para mas información.', NULL, NULL, 4),
(5, 'bloque-1', '¡Queremos saber de tí! Deja tu mensaje.', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacioproductos`
--

CREATE TABLE `espacioproductos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `espacio` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios`
--

CREATE TABLE `espacios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `espacios`
--

INSERT INTO `espacios` (`id`, `titulo`, `subtitulo`, `image`, `orden`) VALUES
(18, 'SILLÓN MANDARIN', 'Estructura en lámina de acero acabado electroestático negro mate.\n\nTapíz acojinado en secciones o gajos modulares 100% piel.', 'Pflm7lxjGOpTpOCZE5WdiuCsrnRM3u.jpg', 99),
(19, 'SILLA PITTA', 'Silla monocromatica en piel y acabado electroestático mate.', 'XClwiS8AZ5fxuNosjKMhdWKZn2UBAO.jpg', 99),
(22, 'ESCRITORIO WEIMAR', 'Escritorio de cubierta desmontable y estructura de acero acabado electroestático negro mate.', 'X741rQzsm5JSQiz4SCLCMsoZBFz0Xh.jpg', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razon_social` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numext` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numint` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `rfc`, `mail`, `razon_social`, `calle`, `numext`, `numint`, `colonia`, `cp`, `municipio`, `estado`, `user`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalisco', 2),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalisco', 8),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respuesta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '99',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `pregunta`, `respuesta`, `orden`, `created_at`, `updated_at`) VALUES
(3, '¿DONDE PUEDO COMPRAR LOS PRODUCTOS DE GROPIUS?', '<p>PR&Oacute;XIMAMENTE SHOWROOM GROPIUS O LL&Aacute;MANOS AL : 3314559218</p>', 99, '2021-03-13 01:48:56', '2021-03-13 01:52:40'),
(4, '¿CUÁLES SON MIS OPCIONES DE PAGO?', '<ul>\r\n<li>DEPOSITO O TRANSFERENCIA:</li>\r\n</ul>\r\n<p>Razon Social: CB4U CREATING BUSINESS FOR YOU S DE RL DE CV<br />Banco: SANTANDER<br />Cuenta: 65507166011<br />Clabe: 014320655071660118</p>\r\n<ul>\r\n<li>CONEKTA</li>\r\n</ul>', 99, '2021-03-13 01:54:45', '2021-03-23 08:57:17'),
(5, '¿QUIÉN DISEÑA LOS PRODUCTOS DE GROPIUS?', '<p>TODOS LOS PRODUCTOS DE GROPIUS SON DISE&Ntilde;ADOS INTERNAMENTE EN NUESTROS <em>HEADQUARTERS </em>Y SON FABRICADOS EN M&Eacute;XICO CON INSUMOS IMPORTADOS.</p>', 99, '2021-03-13 01:58:44', '2021-03-13 02:42:50'),
(6, '¿QUE PASA SI NO ESTOY CONFORME CON MI COMPRA?', '<p>ANALIZ&Aacute;MOS TODOS LOS CASOS INDIVIDUALMENTE PARA ENCONTRAR LA MEJOR SOLUCI&Oacute;N.</p>\r\n<p>COMUN&Iacute;CATE CON NOSOTROS AL WHATSAPP 3314559218</p>', 99, '2021-03-13 02:02:41', '2021-03-13 02:04:34'),
(7, '¿MIS COMPRAS EN WWW.GROPIUS.COM.MX GENERAN IVA?', '<p>TODOS NUESTROS PRECIOS YA INCLUYEN IVA</p>', 99, '2021-03-13 02:06:25', '2021-03-13 02:06:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_subastas`
--

CREATE TABLE `galeria_subastas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `galeria_subastas`
--

INSERT INTO `galeria_subastas` (`id`, `image`, `url`, `orden`) VALUES
(1, 'UBzSPVkTIyCZzbqKZki96mt92mdB8t.jpg', NULL, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_12_153249_create_domicilios_table', 1),
(5, '2020_10_13_163806_create_admins_table', 1),
(6, '2020_10_14_181530_create_configuracions_table', 1),
(7, '2020_11_23_155924_create_colors_table', 1),
(8, '2020_12_08_170359_create_carrusels_table', 1),
(9, '2020_12_09_193424_create_politicas_table', 1),
(10, '2020_12_16_000636_create_faqs_table', 1),
(11, '2020_12_18_163712_create_categ_tamanos_table', 1),
(12, '2020_12_18_163750_create_sizes_table', 1),
(13, '2020_12_24_194725_create_cupons_table', 1),
(14, '2021_01_10_233204_create_subastas_table', 1),
(15, '2021_01_11_050541_create_subastas_photos_table', 1),
(16, '2021_01_11_100948_create_pujas_table', 1),
(17, '2021_01_16_102703_create_categorias_table', 1),
(18, '2021_01_16_103723_create_productos_table', 1),
(19, '2021_01_16_135303_create_productos_photos_table', 1),
(20, '2021_01_20_025504_create_producto_versions_table', 1),
(21, '2021_01_20_110254_create_producto_version_photos_table', 1),
(22, '2021_01_20_130231_create_producto_relacions_table', 1),
(23, '2021_01_21_215846_create_facturas_table', 1),
(24, '2021_01_22_192915_create_espacios_table', 1),
(25, '2021_01_22_221443_create_nosotrosgalerias_table', 1),
(26, '2021_01_25_180515_create_seccions_table', 1),
(27, '2021_01_25_180534_create_elementos_table', 1),
(28, '2021_01_25_195631_create_espacioproductos_table', 1),
(29, '2021_01_27_192446_create_pedidos_table', 1),
(30, '2021_01_27_212728_create_pedido_detalles_table', 1),
(31, '2021_01_28_013618_create_sucursals_table', 1),
(32, '2021_01_29_191337_create_galeria_subastas_table', 1),
(33, '2021_01_30_010556_create_newslatters_table', 1),
(34, '2021_02_09_070022_create_payment2s_table', 1),
(35, '2021_02_10_194801_create_payments_table', 1),
(37, '2021_02_10_204052_create_pedido_subastas_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newslatters`
--

CREATE TABLE `newslatters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `newslatters`
--

INSERT INTO `newslatters` (`id`, `nombre`, `mail`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Raúl Martínez Barba', 'Carlosmba@me.com', '2021-03-12 22:48:42', '2021-03-12 22:48:42'),
(2, 'Paloma Muñoz', 'paloma.munoz14@gmail.com', '2021-03-13 02:57:12', '2021-03-13 02:57:12'),
(3, 'carlos raul', 'carlosmba@me.com', '2021-03-13 21:28:25', '2021-03-13 21:28:25'),
(4, 'Edgar', 'edgar.almaraz@cb4u.com.mx', '2021-03-19 22:41:13', '2021-03-19 22:41:13'),
(5, 'CARLOS RAÚL MARTÍNEZ BARBA', 'CARLOSMBA73@GMAIL.COM', '2021-03-27 01:04:37', '2021-03-27 01:04:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotrosgalerias`
--

CREATE TABLE `nosotrosgalerias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nosotrosgalerias`
--

INSERT INTO `nosotrosgalerias` (`id`, `image`, `url`, `orden`) VALUES
(1, '9jlXtHTKRZqoKqHOi6EpbtCMDLITWk.jpg', NULL, 99),
(2, 'QW2o2tBZi1gzw1aT1paHoGjw6Gx3oS.jpg', NULL, 99),
(3, 'Cpj23FC1bq1Rgg5MKl4MZ4kuxhlFFM.jpg', NULL, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('paloma.munoz14@gmail.com', '$2y$10$QFwQRbH3TNsFwjrWJbuzBuPJbDrJ3RVu8poj3gEwPsjbXOEgP9fB2', '2021-03-17 03:56:36'),
('yahir@wozial.com', '$2y$10$u0fXpY10nkhBfbrhGywgGO0zhNP/NhYsfw7KYnY/S1P5/i5dgo81S', '2021-03-26 23:19:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment2s`
--

CREATE TABLE `payment2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pedido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_last4` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_banco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subasta` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payment2s`
--

INSERT INTO `payment2s` (`id`, `orden`, `pedido`, `email`, `status`, `auth_code`, `card_last4`, `card_name`, `card_banco`, `card_type`, `subasta`, `created_at`, `updated_at`) VALUES
(1, 'ord_2pJ7zoFNAcaMoA1yq', '5153517b-5352-44bf-b67b-cd8da747dc4e', 'paloma.munoz14@gmail.com', 'paid', '055742', '4242', 'yahir lopez', 'visa', 'credit', 0, '2021-02-23 00:39:20', '2021-02-23 00:39:20'),
(2, 'ord_2pSRm3CFtib7NjiUm', 'cd08b901-a5dc-4dd1-a28f-0cb010115deb', 'yahir@wozial.com', 'paid', '062231', '9092', 'edson yahir ruvalcaba', 'visa', 'credit', 0, '2021-03-20 10:26:23', '2021-03-20 10:26:23'),
(3, 'ord_2pSRpk2gQjVNQdwai', '2537cbd3-a29b-4684-be7c-16be50d759da', 'edgar.almaraz@cb4u.com.mx', 'paid', '011627', '1598', 'Paloma Nayeli Muñoz Orozco', 'mastercard', 'debit', 0, '2021-03-20 10:31:09', '2021-03-20 10:31:09'),
(4, 'ord_2pTYMXzjudEJwATUk', 'e17ebf73-daa7-4f56-b19e-02e2d8de00cc', 'paloma.munoz14@gmail.com', 'paid', '013879', '1598', 'PALOMA MUÑOZ OROZCO', 'mastercard', 'debit', 0, '2021-03-23 20:11:52', '2021-03-23 20:11:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` int(11) DEFAULT '0',
  `guia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkguia` text COLLATE utf8mb4_unicode_ci,
  `domicilio` bigint(20) UNSIGNED NOT NULL,
  `factura` tinyint(1) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` double(9,2) NOT NULL,
  `iva` double(9,2) NOT NULL,
  `envio` double(9,2) DEFAULT NULL,
  `comprobante` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelado` tinyint(1) DEFAULT '0',
  `usuario` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `uid`, `estatus`, `guia`, `linkguia`, `domicilio`, `factura`, `cantidad`, `importe`, `iva`, `envio`, `comprobante`, `cupon`, `cancelado`, `usuario`, `data`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '47419abe-dc72-4079-901d-77a9b3b16b64', 0, NULL, NULL, 1, NULL, 2, 5700.00, 0.00, 500.00, NULL, NULL, 0, 1, NULL, NULL, '2021-02-14 03:01:21', '2021-02-14 03:01:21'),
(2, '707f9dea-4be8-4a9c-8332-d0a253f9efc2', 1, NULL, NULL, 1, NULL, 2, 5700.00, 0.00, 500.00, NULL, NULL, 0, 1, NULL, NULL, '2021-02-14 03:01:30', '2021-02-14 03:08:16'),
(3, '4bceda45-168a-4d67-af72-0ecff325c7fe', 0, NULL, NULL, 2, NULL, 1, 5.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, '2021-02-20 02:32:59', '2021-02-20 01:59:06', '2021-02-20 02:32:59'),
(4, 'f90e925c-f0d9-4b6f-94ae-1ab1e933bb67', 1, NULL, NULL, 2, NULL, 1, 5.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, '2021-02-20 02:32:54', '2021-02-20 02:03:34', '2021-02-20 02:32:54'),
(5, 'ca3d765d-6493-4353-83d8-436e92d32cd7', 0, NULL, NULL, 2, NULL, 1, 5.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, '2021-02-23 00:42:02', '2021-02-20 02:33:23', '2021-02-23 00:42:02'),
(6, 'fb8d5b02-6c1c-4175-a909-7aeac9c78f9e', 0, NULL, NULL, 2, NULL, 1, 5.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, '2021-02-20 04:08:30', '2021-02-20 02:34:57', '2021-02-20 04:08:30'),
(7, '0615d23e-77be-4c16-aa3e-c24a320adc49', 0, NULL, NULL, 2, NULL, 1, 20.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, '2021-02-23 00:42:05', '2021-02-20 04:09:07', '2021-02-23 00:42:05'),
(8, 'fc961abf-d81a-4562-8469-151eda611b44', 0, NULL, NULL, 2, NULL, 1, 20.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-02-23 00:36:14', '2021-02-23 00:36:14'),
(9, '5153517b-5352-44bf-b67b-cd8da747dc4e', 1, NULL, NULL, 2, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-02-23 00:37:48', '2021-02-23 00:39:20'),
(10, 'c409b939-0985-472a-b3d6-1511be2d549b', 0, NULL, NULL, 3, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 3, NULL, NULL, '2021-03-02 22:21:35', '2021-03-02 22:21:35'),
(11, 'e5fc9e1f-c5b8-4376-8700-ed800408f65a', 0, NULL, NULL, 3, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 3, NULL, NULL, '2021-03-02 22:22:05', '2021-03-02 22:22:05'),
(12, 'e2cfe7f5-d96b-4ca5-8048-4ca70835c72a', 0, NULL, NULL, 3, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 3, NULL, NULL, '2021-03-02 22:22:13', '2021-03-02 22:22:13'),
(13, 'cf074152-660d-42a5-b651-0aa72fe827ba', 0, NULL, NULL, 3, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 3, NULL, NULL, '2021-03-02 22:22:22', '2021-03-02 22:22:22'),
(14, 'b0aa50e4-7a54-4755-831c-e1d60ac069c9', 0, NULL, NULL, 3, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 3, NULL, NULL, '2021-03-02 22:22:39', '2021-03-02 22:22:39'),
(15, 'd3817d06-3e1b-4676-b388-28bb67a999f3', 0, NULL, NULL, 4, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-12 23:54:08', '2021-03-12 23:54:08'),
(16, 'fca60281-9c1b-4850-9238-ec4138d8e69c', 0, NULL, NULL, 4, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-12 23:54:25', '2021-03-12 23:54:25'),
(17, '36f9e669-ecdf-4d90-8375-4567034a3469', 0, NULL, NULL, 4, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-12 23:54:33', '2021-03-12 23:54:33'),
(18, 'b16bd6de-2245-4235-b61c-8ce4c73d27a6', 0, NULL, NULL, 5, NULL, 1, 6089.00, 0.00, 0.00, NULL, NULL, 0, 4, NULL, NULL, '2021-03-13 00:05:04', '2021-03-13 00:05:04'),
(19, 'e8343843-e292-4a4b-8da6-dfbaf75987e0', 0, NULL, NULL, 5, NULL, 1, 6089.00, 0.00, 0.00, NULL, NULL, 0, 4, NULL, NULL, '2021-03-13 00:05:06', '2021-03-13 00:05:06'),
(20, '1fb81833-20d9-4bf1-8589-3d50002a34eb', 0, NULL, NULL, 2, NULL, 1, 4900.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-13 00:12:29', '2021-03-13 00:12:29'),
(21, '6c89af66-fbb2-4d31-a238-26f3427c68f8', 0, NULL, NULL, 2, NULL, 1, 4900.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-13 00:13:15', '2021-03-13 00:13:15'),
(22, '7be81feb-c9d7-4aa7-8b85-8054b8417b9a', 0, NULL, NULL, 2, NULL, 1, 4900.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-13 00:13:26', '2021-03-13 00:13:26'),
(23, 'd04444e7-4099-446d-b9f2-acbf028465f3', 0, NULL, NULL, 5, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 4, NULL, NULL, '2021-03-13 00:15:58', '2021-03-13 00:15:58'),
(24, 'b7e225b3-fe65-417b-9b03-65dc285cb353', 0, NULL, NULL, 5, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 4, NULL, NULL, '2021-03-13 00:16:02', '2021-03-13 00:16:02'),
(25, '4c606244-1d94-4552-973c-08b19d5f3e80', 0, NULL, NULL, 5, NULL, 1, 7579.00, 0.00, 0.00, NULL, NULL, 0, 4, NULL, NULL, '2021-03-13 00:16:06', '2021-03-13 00:16:06'),
(26, '781e91da-2d63-4714-bc19-6959d27b1f22', 0, NULL, NULL, 2, NULL, 1, 4999.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, '2021-03-13 09:37:54', '2021-03-13 09:30:05', '2021-03-13 09:37:54'),
(27, '169d7501-37de-4bd5-ba84-df73badd7173', 0, NULL, NULL, 2, NULL, 1, 4999.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-13 09:31:02', '2021-03-13 09:31:02'),
(28, '92d8cf1d-44a7-4f23-9053-eb7d17bfb7b8', 0, NULL, NULL, 2, NULL, 1, 4999.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-13 09:35:13', '2021-03-13 09:35:13'),
(29, 'eaa90398-03de-4c35-8b6c-ac8170026af4', 0, NULL, NULL, 2, NULL, 1, 4999.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-13 09:38:16', '2021-03-13 09:38:16'),
(30, '1d40dc47-dd46-4c75-99d9-b1cfead5e132', 0, NULL, NULL, 2, NULL, 1, 4999.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-13 09:45:44', '2021-03-13 09:45:44'),
(31, '46a08697-1fc3-4a03-9407-0f839a9a7a67', 0, NULL, NULL, 5, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 4, NULL, NULL, '2021-03-13 22:04:38', '2021-03-13 22:04:38'),
(32, 'd6820299-560c-4308-a369-df0cd9b6c629', 0, NULL, NULL, 5, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 4, NULL, NULL, '2021-03-13 22:04:46', '2021-03-13 22:04:46'),
(33, 'eacf62b9-0cbb-4902-ab56-3d7966f4918f', 0, NULL, NULL, 5, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 4, NULL, NULL, '2021-03-13 22:04:54', '2021-03-13 22:04:54'),
(34, '2b7d08fd-3efa-4bbf-8cdb-720c29317200', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 01:53:21', '2021-03-17 01:53:21'),
(35, '72e50ba3-aa35-4946-909a-a25639da63ec', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 01:55:06', '2021-03-17 01:55:06'),
(36, '2e044713-5475-43dd-93c6-7c4000fa1de8', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:00:31', '2021-03-17 02:00:31'),
(37, 'aa74fd65-9e91-487a-974f-f68d7ef3c05a', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:07:06', '2021-03-17 02:07:06'),
(38, '6717e133-0d02-4cfa-93a9-3be595cfefb8', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:07:28', '2021-03-17 02:07:28'),
(39, 'eb484d31-3480-42c5-8405-66f1de5f32b8', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:07:45', '2021-03-17 02:07:45'),
(40, '41b6db80-7ae8-4fc2-8018-c009480cad5d', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:07:55', '2021-03-17 02:07:55'),
(41, 'ea27b7b7-9bd3-4398-9a02-0e9a7ca5b19a', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:09:53', '2021-03-17 02:09:53'),
(42, '1e12f02d-d8ac-40b8-82ee-165ead0777ae', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:12:51', '2021-03-17 02:12:51'),
(43, '8d24574c-25f9-46e0-b30c-1f84649721be', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:13:41', '2021-03-17 02:13:41'),
(44, '00ded784-4018-4fcb-8f37-72da7fe64b53', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:13:53', '2021-03-17 02:13:53'),
(45, 'e583b43f-e986-4833-beb6-6bb4fbd5f741', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:21:17', '2021-03-17 02:21:17'),
(46, '1a2120c1-13da-440a-84ec-1c2286e5549c', 0, NULL, NULL, 14, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 9, NULL, NULL, '2021-03-17 02:29:12', '2021-03-17 02:29:12'),
(47, '5fd0cbf7-2a6d-4224-b1b8-52e25d60e559', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:29:15', '2021-03-17 02:29:15'),
(48, '3155e5da-4be7-4dac-a007-7099bfaf4340', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:30:24', '2021-03-17 02:30:24'),
(49, '9dad73dc-5b9e-409c-a7f5-bcb69f6347ec', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:38:01', '2021-03-17 02:38:01'),
(50, 'db2a7e6c-c416-49da-ad8b-de12a32f117d', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:44:29', '2021-03-17 02:44:29'),
(51, '183e43bf-67cc-4ad2-88c5-ce579666ed39', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:49:39', '2021-03-17 02:49:39'),
(52, '9b9e7d0d-eac4-4807-8f3d-409c816616e3', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:50:35', '2021-03-17 02:50:35'),
(53, '3e67001f-1a48-4a1f-be78-a088b4c00c79', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:51:36', '2021-03-17 02:51:36'),
(54, 'b19f5925-7013-4c69-b7e9-87aa7c6a8417', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:52:37', '2021-03-17 02:52:37'),
(55, '3c7ef29b-9d1f-4885-9fd9-96378058522b', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-17 02:55:08', '2021-03-17 02:55:08'),
(56, '71361fbb-0b1f-451b-92ee-94491d0a3412', 0, NULL, NULL, 11, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-17 03:25:39', '2021-03-17 03:25:39'),
(57, '6232a4f7-686c-42bc-8fc5-a45206c42745', 0, NULL, NULL, 11, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-17 03:29:30', '2021-03-17 03:29:30'),
(58, '09921758-61b5-43e8-b268-e97853385b7b', 0, NULL, NULL, 11, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-17 03:30:17', '2021-03-17 03:30:17'),
(59, '51a77166-712d-44f6-9486-45f920f2129c', 0, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, NULL, NULL, '2021-03-17 04:05:59', '2021-03-17 04:05:59'),
(60, 'ee72ac79-c25b-4fa4-a5b6-259625860387', 0, NULL, NULL, 25, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 11, NULL, NULL, '2021-03-17 09:01:50', '2021-03-17 09:01:50'),
(61, '759eefff-ce38-48d3-945b-414be5442124', 0, NULL, NULL, 25, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 11, NULL, NULL, '2021-03-17 09:01:58', '2021-03-17 09:01:58'),
(62, '246be233-e0dd-43e2-a9f0-4ab2afd388da', 0, NULL, NULL, 26, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 14, NULL, NULL, '2021-03-17 09:34:20', '2021-03-17 09:34:20'),
(63, 'dcf18257-aa77-4780-aab6-b8bf1e884c2a', 0, NULL, NULL, 26, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 14, NULL, NULL, '2021-03-17 09:34:29', '2021-03-17 09:34:29'),
(64, '342d190c-572e-4bdf-9a01-c27e74be31f7', 0, NULL, NULL, 26, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 14, NULL, NULL, '2021-03-17 09:34:39', '2021-03-17 09:34:39'),
(65, '821c9733-1280-42f1-89ef-b710dd025c9f', 0, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, NULL, NULL, '2021-03-19 22:42:56', '2021-03-19 22:42:56'),
(66, 'a3c43666-3139-4e57-8182-70bfdde29154', 0, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, NULL, NULL, '2021-03-19 22:43:08', '2021-03-19 22:43:08'),
(67, '18d57b5b-2c7b-495b-bb08-2fb2e74b6d34', 0, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, NULL, NULL, '2021-03-20 04:55:25', '2021-03-20 04:55:25'),
(68, 'e00c86cc-fcea-469a-9fcf-eb2f1e04a944', 0, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, NULL, NULL, '2021-03-20 04:55:34', '2021-03-20 04:55:34'),
(69, 'd9aa3c6f-7af5-4bcf-9031-2002892a4194', 0, NULL, NULL, 27, NULL, 1, 4999.00, 0.00, 0.00, NULL, NULL, 0, 15, NULL, NULL, '2021-03-20 07:07:57', '2021-03-20 07:07:57'),
(70, 'b0555a64-42b9-4094-b9eb-7f999fef7201', 0, NULL, NULL, 27, NULL, 1, 4999.00, 0.00, 0.00, NULL, NULL, 0, 15, NULL, NULL, '2021-03-20 07:08:10', '2021-03-20 07:08:10'),
(71, '6fdb371c-ad39-4dcd-9d21-ac2e6d90a943', 0, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, NULL, NULL, '2021-03-20 08:29:47', '2021-03-20 08:29:47'),
(72, '358fc81a-a1e5-47fb-aaa6-70a08da15f58', 0, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, NULL, NULL, '2021-03-20 08:55:13', '2021-03-20 08:55:13'),
(73, 'a12117d7-0fd9-47d6-b93d-62fd641a1912', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-20 09:49:58', '2021-03-20 09:49:58'),
(74, 'cd08b901-a5dc-4dd1-a28f-0cb010115deb', 1, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-20 09:51:11', '2021-03-20 10:26:23'),
(75, '2537cbd3-a29b-4684-be7c-16be50d759da', 1, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, NULL, NULL, '2021-03-20 10:30:36', '2021-03-20 10:31:09'),
(76, '53eb9f0e-e5aa-4d67-ba9c-e68f3c87ffcc', 0, NULL, NULL, 26, NULL, 1, 4550.00, 0.00, 0.00, NULL, NULL, 0, 14, NULL, NULL, '2021-03-22 22:16:44', '2021-03-22 22:16:44'),
(77, 'c219af08-b867-4d5e-9e76-2f798847e653', 0, NULL, NULL, 28, NULL, 1, 4999.00, 0.00, 0.00, NULL, NULL, 0, 16, NULL, NULL, '2021-03-23 03:34:40', '2021-03-23 03:34:40'),
(78, 'e17ebf73-daa7-4f56-b19e-02e2d8de00cc', 1, NULL, NULL, 11, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 2, NULL, NULL, '2021-03-23 20:11:16', '2021-03-23 20:11:52'),
(79, '12cb1ba4-f42d-41a2-a0af-c5d022721e32', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:01:21', '2021-03-23 23:01:21'),
(80, '9361fddd-9a48-41ba-b5e3-9ec7196d433a', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:03:01', '2021-03-23 23:03:01'),
(81, 'fc15fc87-8b12-4a19-9457-384d87f992bb', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:20:46', '2021-03-23 23:20:46'),
(82, '9b4935f6-fd1e-4094-a74d-4a001d2798a3', 0, NULL, NULL, 4, NULL, 2, 50.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:23:16', '2021-03-23 23:23:16'),
(83, 'b236d869-4d0b-453a-9ad5-f197ec974038', 0, NULL, NULL, 4, NULL, 2, 50.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:28:20', '2021-03-23 23:28:20'),
(84, '38c7ba1a-91ae-497e-b52b-0110dd54cac0', 0, NULL, NULL, 4, NULL, 2, 50.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:40:30', '2021-03-23 23:40:30'),
(85, '98c73e11-55cf-4926-9241-b642f55fd0bf', 0, NULL, NULL, 4, NULL, 2, 50.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:41:10', '2021-03-23 23:41:10'),
(86, '45fc8d6d-7e65-4653-992b-a291496e6bea', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:41:38', '2021-03-23 23:41:38'),
(87, '4927707a-5809-4b00-ab66-a67842d3a664', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:42:45', '2021-03-23 23:42:45'),
(88, 'd605600b-aa82-411d-9133-51f69fa97f6f', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, NULL, NULL, '2021-03-23 23:43:20', '2021-03-23 23:43:20'),
(89, '9477c823-4bda-40ba-943c-2b9ef81cdbe8', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, '{\"391210948-20\":{\"id\":\"391210948-20\",\"name\":\"ESCRITORIO WEIMAR\",\"price\":25,\"quantity\":\"1\",\"attributes\":{\"version\":{\"id\":20,\"coltex\":{\"id\":14,\"name\":\"TRIPLAY\",\"hexa\":null,\"textura\":\"jyMsh9AzickRoDBrwROVze9Pl3Vd5b.jpg\",\"BoolTexture\":\"1\",\"orden\":\"3\"},\"producto\":\"17\",\"precio\":null,\"existencia\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-13 03:03:35\"}},\"conditions\":{\"name\":\"Descuento en producto\",\"type\":\"promo\",\"value\":\"0\"},\"associatedModel\":{\"id\":17,\"sku\":\"0000000006\",\"titulo_es\":\"ESCRITORIO WEIMAR\",\"descripcion_es\":\"<ul>\\r\\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate.<\\/li>\\r\\n<li>Cubierta desmontable de triplay de pino.<\\/li>\\r\\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.<\\/strong><\\/li>\\r\\n<\\/ul>\",\"min_descripcion_es\":\"ESCRITORIO DESARMABLE\",\"titulo_en\":null,\"descripcion_en\":null,\"min_descripcion_en\":null,\"coti\":\"0\",\"textura\":\"1\",\"precio\":\"25.00\",\"descuento\":null,\"med_alt\":\"80.00\",\"med_anc\":\"120.00\",\"med_lar\":\"60.90\",\"categoria\":\"22\",\"metaDescripcion\":null,\"llave\":\"391210948\",\"inicio\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-23 14:10:43\"}}}', NULL, '2021-03-24 07:25:59', '2021-03-24 07:25:59'),
(90, 'fa6501a8-d238-4173-ad9b-1bae45beb800', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, '{\"391210948-20\":{\"id\":\"391210948-20\",\"name\":\"ESCRITORIO WEIMAR\",\"price\":25,\"quantity\":\"1\",\"attributes\":{\"version\":{\"id\":20,\"coltex\":{\"id\":14,\"name\":\"TRIPLAY\",\"hexa\":null,\"textura\":\"jyMsh9AzickRoDBrwROVze9Pl3Vd5b.jpg\",\"BoolTexture\":\"1\",\"orden\":\"3\"},\"producto\":\"17\",\"precio\":null,\"existencia\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-13 03:03:35\"}},\"conditions\":{\"name\":\"Descuento en producto\",\"type\":\"promo\",\"value\":\"0\"},\"associatedModel\":{\"id\":17,\"sku\":\"0000000006\",\"titulo_es\":\"ESCRITORIO WEIMAR\",\"descripcion_es\":\"<ul>\\r\\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate.<\\/li>\\r\\n<li>Cubierta desmontable de triplay de pino.<\\/li>\\r\\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.<\\/strong><\\/li>\\r\\n<\\/ul>\",\"min_descripcion_es\":\"ESCRITORIO DESARMABLE\",\"titulo_en\":null,\"descripcion_en\":null,\"min_descripcion_en\":null,\"coti\":\"0\",\"textura\":\"1\",\"precio\":\"25.00\",\"descuento\":null,\"med_alt\":\"80.00\",\"med_anc\":\"120.00\",\"med_lar\":\"60.90\",\"categoria\":\"22\",\"metaDescripcion\":null,\"llave\":\"391210948\",\"inicio\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-23 14:10:43\"}}}', NULL, '2021-03-24 07:34:34', '2021-03-24 07:34:34'),
(91, '17764197-ec6d-46fe-b647-b5dffd0b4648', 0, NULL, NULL, 4, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 5, '{\"391210948-20\":{\"id\":\"391210948-20\",\"name\":\"ESCRITORIO WEIMAR\",\"price\":25,\"quantity\":\"1\",\"attributes\":{\"version\":{\"id\":20,\"coltex\":{\"id\":14,\"name\":\"TRIPLAY\",\"hexa\":null,\"textura\":\"jyMsh9AzickRoDBrwROVze9Pl3Vd5b.jpg\",\"BoolTexture\":\"1\",\"orden\":\"3\"},\"producto\":\"17\",\"precio\":null,\"existencia\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-13 03:03:35\"}},\"conditions\":{\"name\":\"Descuento en producto\",\"type\":\"promo\",\"value\":\"0\"},\"associatedModel\":{\"id\":17,\"sku\":\"0000000006\",\"titulo_es\":\"ESCRITORIO WEIMAR\",\"descripcion_es\":\"<ul>\\r\\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate.<\\/li>\\r\\n<li>Cubierta desmontable de triplay de pino.<\\/li>\\r\\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.<\\/strong><\\/li>\\r\\n<\\/ul>\",\"min_descripcion_es\":\"ESCRITORIO DESARMABLE\",\"titulo_en\":null,\"descripcion_en\":null,\"min_descripcion_en\":null,\"coti\":\"0\",\"textura\":\"1\",\"precio\":\"25.00\",\"descuento\":null,\"med_alt\":\"80.00\",\"med_anc\":\"120.00\",\"med_lar\":\"60.90\",\"categoria\":\"22\",\"metaDescripcion\":null,\"llave\":\"391210948\",\"inicio\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-23 14:10:43\"}}}', NULL, '2021-03-24 07:34:42', '2021-03-24 07:34:42'),
(92, '4db802fb-edc7-4988-9d9b-4b4fa003586a', 1, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, '{\"391210948-20\":{\"id\":\"391210948-20\",\"name\":\"ESCRITORIO WEIMAR\",\"price\":25,\"quantity\":\"1\",\"attributes\":{\"version\":{\"id\":20,\"coltex\":{\"id\":14,\"name\":\"TRIPLAY\",\"hexa\":null,\"textura\":\"jyMsh9AzickRoDBrwROVze9Pl3Vd5b.jpg\",\"BoolTexture\":\"1\",\"orden\":\"3\"},\"producto\":\"17\",\"precio\":null,\"existencia\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-13 03:03:35\"}},\"conditions\":{\"name\":\"Descuento en producto\",\"type\":\"promo\",\"value\":\"0\"},\"associatedModel\":{\"id\":17,\"sku\":\"0000000006\",\"titulo_es\":\"ESCRITORIO WEIMAR\",\"descripcion_es\":\"<ul>\\r\\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate.<\\/li>\\r\\n<li>Cubierta desmontable de triplay de pino.<\\/li>\\r\\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.<\\/strong><\\/li>\\r\\n<\\/ul>\",\"min_descripcion_es\":\"ESCRITORIO DESARMABLE\",\"titulo_en\":null,\"descripcion_en\":null,\"min_descripcion_en\":null,\"coti\":\"0\",\"textura\":\"1\",\"precio\":\"25.00\",\"descuento\":null,\"med_alt\":\"80.00\",\"med_anc\":\"120.00\",\"med_lar\":\"60.90\",\"categoria\":\"22\",\"metaDescripcion\":null,\"llave\":\"391210948\",\"inicio\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-23 14:10:43\"}}}', NULL, '2021-03-24 20:09:06', '2021-03-26 04:48:11'),
(93, '38112d0f-85e4-4522-b682-e1aca2c31a2f', 1, NULL, NULL, 15, NULL, 1, 25.00, 0.00, 0.00, NULL, NULL, 0, 10, '{\"391210948-20\":{\"id\":\"391210948-20\",\"name\":\"ESCRITORIO WEIMAR\",\"price\":25,\"quantity\":\"1\",\"attributes\":{\"version\":{\"id\":20,\"coltex\":{\"id\":14,\"name\":\"TRIPLAY\",\"hexa\":null,\"textura\":\"jyMsh9AzickRoDBrwROVze9Pl3Vd5b.jpg\",\"BoolTexture\":\"1\",\"orden\":\"3\"},\"producto\":\"17\",\"precio\":null,\"existencia\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-13 03:03:35\"}},\"conditions\":{\"name\":\"Descuento en producto\",\"type\":\"promo\",\"value\":\"0\"},\"associatedModel\":{\"id\":17,\"sku\":\"0000000006\",\"titulo_es\":\"ESCRITORIO WEIMAR\",\"descripcion_es\":\"<ul>\\r\\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate.<\\/li>\\r\\n<li>Cubierta desmontable de triplay de pino.<\\/li>\\r\\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.<\\/strong><\\/li>\\r\\n<\\/ul>\",\"min_descripcion_es\":\"ESCRITORIO DESARMABLE\",\"titulo_en\":null,\"descripcion_en\":null,\"min_descripcion_en\":null,\"coti\":\"0\",\"textura\":\"1\",\"precio\":\"25.00\",\"descuento\":null,\"med_alt\":\"80.00\",\"med_anc\":\"120.00\",\"med_lar\":\"60.90\",\"categoria\":\"22\",\"metaDescripcion\":null,\"llave\":\"391210948\",\"inicio\":\"1\",\"activo\":\"1\",\"orden\":\"99\",\"created_at\":\"2021-03-13 02:51:19\",\"updated_at\":\"2021-03-23 14:10:43\"}}}', NULL, '2021-03-24 20:41:10', '2021-03-26 04:48:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalles`
--

CREATE TABLE `pedido_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(9,2) NOT NULL,
  `importe` double(9,2) NOT NULL,
  `pedido` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `color` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_detalles`
--

INSERT INTO `pedido_detalles` (`id`, `cantidad`, `precio`, `importe`, `pedido`, `producto`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 25.00, 25.00, 37, 17, 20, '2021-03-17 02:07:06', '2021-03-17 02:07:06'),
(2, 1, 25.00, 25.00, 38, 17, 20, '2021-03-17 02:07:28', '2021-03-17 02:07:28'),
(3, 1, 25.00, 25.00, 39, 17, 20, '2021-03-17 02:07:45', '2021-03-17 02:07:45'),
(4, 1, 25.00, 25.00, 40, 17, 20, '2021-03-17 02:07:55', '2021-03-17 02:07:55'),
(5, 1, 25.00, 25.00, 41, 17, 20, '2021-03-17 02:09:53', '2021-03-17 02:09:53'),
(6, 1, 25.00, 25.00, 42, 17, 20, '2021-03-17 02:12:51', '2021-03-17 02:12:51'),
(7, 1, 25.00, 25.00, 43, 17, 20, '2021-03-17 02:13:41', '2021-03-17 02:13:41'),
(8, 1, 25.00, 25.00, 44, 17, 20, '2021-03-17 02:13:53', '2021-03-17 02:13:53'),
(9, 1, 25.00, 25.00, 45, 17, 20, '2021-03-17 02:21:17', '2021-03-17 02:21:17'),
(10, 1, 25.00, 25.00, 46, 17, 20, '2021-03-17 02:29:12', '2021-03-17 02:29:12'),
(11, 1, 25.00, 25.00, 47, 17, 20, '2021-03-17 02:29:15', '2021-03-17 02:29:15'),
(12, 1, 25.00, 25.00, 48, 17, 20, '2021-03-17 02:30:24', '2021-03-17 02:30:24'),
(13, 1, 25.00, 25.00, 49, 17, 20, '2021-03-17 02:38:01', '2021-03-17 02:38:01'),
(14, 1, 25.00, 25.00, 50, 17, 20, '2021-03-17 02:44:29', '2021-03-17 02:44:29'),
(15, 1, 25.00, 25.00, 51, 17, 20, '2021-03-17 02:49:39', '2021-03-17 02:49:39'),
(16, 1, 25.00, 25.00, 52, 17, 20, '2021-03-17 02:50:35', '2021-03-17 02:50:35'),
(17, 1, 25.00, 25.00, 53, 17, 20, '2021-03-17 02:51:36', '2021-03-17 02:51:36'),
(18, 1, 25.00, 25.00, 54, 17, 20, '2021-03-17 02:52:37', '2021-03-17 02:52:37'),
(19, 1, 25.00, 25.00, 55, 17, 20, '2021-03-17 02:55:08', '2021-03-17 02:55:08'),
(20, 1, 25.00, 25.00, 56, 17, 20, '2021-03-17 03:25:39', '2021-03-17 03:25:39'),
(21, 1, 25.00, 25.00, 57, 17, 20, '2021-03-17 03:29:30', '2021-03-17 03:29:30'),
(22, 1, 25.00, 25.00, 58, 17, 20, '2021-03-17 03:30:17', '2021-03-17 03:30:17'),
(23, 1, 25.00, 25.00, 59, 17, 20, '2021-03-17 04:05:59', '2021-03-17 04:05:59'),
(24, 1, 25.00, 25.00, 60, 17, 20, '2021-03-17 09:01:50', '2021-03-17 09:01:50'),
(25, 1, 25.00, 25.00, 61, 17, 20, '2021-03-17 09:01:58', '2021-03-17 09:01:58'),
(26, 1, 25.00, 25.00, 62, 17, 20, '2021-03-17 09:34:20', '2021-03-17 09:34:20'),
(27, 1, 25.00, 25.00, 63, 17, 20, '2021-03-17 09:34:29', '2021-03-17 09:34:29'),
(28, 1, 25.00, 25.00, 64, 17, 20, '2021-03-17 09:34:39', '2021-03-17 09:34:39'),
(29, 1, 25.00, 25.00, 65, 17, 20, '2021-03-19 22:42:56', '2021-03-19 22:42:56'),
(30, 1, 25.00, 25.00, 66, 17, 20, '2021-03-19 22:43:08', '2021-03-19 22:43:08'),
(31, 1, 25.00, 25.00, 67, 17, 20, '2021-03-20 04:55:25', '2021-03-20 04:55:25'),
(32, 1, 25.00, 25.00, 68, 17, 20, '2021-03-20 04:55:34', '2021-03-20 04:55:34'),
(33, 1, 4999.00, 4999.00, 69, 15, 18, '2021-03-20 07:07:57', '2021-03-20 07:07:57'),
(34, 1, 4999.00, 4999.00, 70, 15, 18, '2021-03-20 07:08:10', '2021-03-20 07:08:10'),
(35, 1, 25.00, 25.00, 71, 17, 20, '2021-03-20 08:29:47', '2021-03-20 08:29:47'),
(36, 1, 25.00, 25.00, 72, 17, 20, '2021-03-20 08:55:13', '2021-03-20 08:55:13'),
(37, 1, 25.00, 25.00, 73, 17, 20, '2021-03-20 09:49:58', '2021-03-20 09:49:58'),
(38, 1, 25.00, 25.00, 74, 17, 20, '2021-03-20 09:51:11', '2021-03-20 09:51:11'),
(39, 1, 25.00, 25.00, 75, 17, 20, '2021-03-20 10:30:36', '2021-03-20 10:30:36'),
(40, 1, 4550.00, 4550.00, 76, 19, 22, '2021-03-22 22:16:44', '2021-03-22 22:16:44'),
(41, 1, 4999.00, 4999.00, 77, 15, 18, '2021-03-23 03:34:40', '2021-03-23 03:34:40'),
(42, 1, 25.00, 25.00, 78, 17, 20, '2021-03-23 20:11:16', '2021-03-23 20:11:16'),
(43, 1, 25.00, 25.00, 79, 17, 20, '2021-03-23 23:01:21', '2021-03-23 23:01:21'),
(44, 1, 25.00, 25.00, 80, 17, 20, '2021-03-23 23:03:01', '2021-03-23 23:03:01'),
(45, 1, 25.00, 25.00, 81, 17, 20, '2021-03-23 23:20:46', '2021-03-23 23:20:46'),
(46, 2, 25.00, 50.00, 82, 17, 20, '2021-03-23 23:23:16', '2021-03-23 23:23:16'),
(47, 2, 25.00, 50.00, 83, 17, 20, '2021-03-23 23:28:20', '2021-03-23 23:28:20'),
(48, 2, 25.00, 50.00, 84, 17, 20, '2021-03-23 23:40:30', '2021-03-23 23:40:30'),
(49, 2, 25.00, 50.00, 85, 17, 20, '2021-03-23 23:41:10', '2021-03-23 23:41:10'),
(50, 1, 25.00, 25.00, 86, 17, 20, '2021-03-23 23:41:38', '2021-03-23 23:41:38'),
(51, 1, 25.00, 25.00, 87, 17, 20, '2021-03-23 23:42:45', '2021-03-23 23:42:45'),
(52, 1, 25.00, 25.00, 88, 17, 20, '2021-03-23 23:43:20', '2021-03-23 23:43:20'),
(53, 1, 25.00, 25.00, 89, 17, 20, '2021-03-24 07:25:59', '2021-03-24 07:25:59'),
(54, 1, 25.00, 25.00, 90, 17, 20, '2021-03-24 07:34:34', '2021-03-24 07:34:34'),
(55, 1, 25.00, 25.00, 91, 17, 20, '2021-03-24 07:34:42', '2021-03-24 07:34:42'),
(56, 1, 25.00, 25.00, 92, 17, 20, '2021-03-24 20:09:06', '2021-03-24 20:09:06'),
(57, 1, 25.00, 25.00, 93, 17, 20, '2021-03-24 20:41:10', '2021-03-24 20:41:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_subastas`
--

CREATE TABLE `pedido_subastas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subasta` bigint(20) UNSIGNED NOT NULL,
  `estatus` int(11) DEFAULT NULL,
  `guia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkguia` text COLLATE utf8mb4_unicode_ci,
  `domicilio` bigint(20) UNSIGNED DEFAULT NULL,
  `factura` tinyint(1) DEFAULT NULL,
  `importe` double(9,2) DEFAULT NULL,
  `iva` double(9,2) DEFAULT NULL,
  `total` double(9,2) DEFAULT NULL,
  `envio` double(9,2) DEFAULT NULL,
  `comprobante` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelado` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_subastas`
--

INSERT INTO `pedido_subastas` (`id`, `uid`, `subasta`, `estatus`, `guia`, `linkguia`, `domicilio`, `factura`, `importe`, `iva`, `total`, `envio`, `comprobante`, `cancelado`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '9aaf387f-1815-4a91-8677-33d2ce36a733', 1, NULL, NULL, NULL, NULL, NULL, 3400.00, 0.00, 3400.00, 0.00, NULL, 0, NULL, '2021-03-23 03:44:34', '2021-03-27 01:08:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `politicas`
--

CREATE TABLE `politicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `archivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `politicas`
--

INSERT INTO `politicas` (`id`, `titulo`, `descripcion`, `archivo`, `created_at`, `updated_at`) VALUES
(1, 'Aviso de privacidad', '<p><strong>Al hacer uso de este sitio el usuario est&aacute; de acuerdo con todos los t&eacute;rminos y condiciones de uso del portal.</strong></p>\r\n<p><strong>Acuerdos impl&iacute;citos.</strong>&nbsp;Al utilizar este sitio usted est&aacute; de acuerdo con todos los t&eacute;rminos y condiciones de uso descritos a continuaci&oacute;n y las pol&iacute;ticas de privacidad del sitio. En el caso de infracci&oacute;n de cualquiera de ellos, el usuario est&aacute; de acuerdo en someterse a las leyes aplicables.</p>\r\n<p><strong>Leyes aplicables.</strong>&nbsp;Al utilizar el sitio o cualquiera de los servicios desde cualquier parte del mundo el usuario est&aacute; de acuerdo en someterse a la ley aplicable en el estado de Guadalajara, Jalisco y atender cualquier juicio dentro del mismo.</p>\r\n<p><strong>Aceptaci&oacute;n de t&eacute;rminos.</strong>&nbsp;El uso de este sitio implica la aceptaci&oacute;n de todos los t&eacute;rminos y condiciones mencionados en este sitio. Adem&aacute;s incluye la aceptaci&oacute;n de las pol&iacute;ticas de privacidad establecidas en este sitio. Pol&iacute;ticas de <strong>GROPIUS</strong>&nbsp;hace de su consentimiento seg&uacute;n LEY FEDERAL DE PROTECCI&Oacute;N DE DATOS PERSONALES EN POSESI&Oacute;N DE LOS PARTICULARES que todos los datos personales que maneja de sus usuarios son utilizados con el fin de proveerle un mejor servicio, una comunicaci&oacute;n plena y una experiencia de atenci&oacute;n y uso diferenciados. Los datos recopilados se usan para darle un mejor servicio. No ser&aacute;n por ning&uacute;n motivo vendidos a terceros. Usted tiene derecho sobre el uso de sus datos personales. En caso que desee limitar o modificar el uso de su informaci&oacute;n por favor h&aacute;galo a trav&eacute;s de nuestra forma de contacto con la informaci&oacute;n siguiente: Informaci&oacute;n del titular y petici&oacute;n. En caso de se efect&uacute;en transferencias de datos adicionales a las requeridas para el funcionamiento de la empresa y extenderle un mejor servicio a cliente se dar&aacute; aviso al due&ntilde;o de la forma, cantidad y detalle de los datos que sean necesarios. Se reserva el derecho de cambiar, modificar o complementar el presente aviso, en cualquier momento. En dicho caso se har&aacute; de su conocimiento la modificaci&oacute;n a trav&eacute;s de cualquiera de los medios que establece la legislaci&oacute;n.</p>\r\n<p><strong>Propiedad intelectual y derechos de autor.</strong>&nbsp;Todo el contenido de este sitio se tiene derechos de autor propios del sitio. La propiedad intelectual y derechos de autor complementarios y ajenos al sitio tienen licencias y derechos de uso. Al utilizar este sitio y participar de la elaboraci&oacute;n informaci&oacute;n, datos o contenido del mismo, el usuario acepta una cesi&oacute;n no exclusiva de derechos de autor del contenido que provea. De manera que el sitio utilizar&aacute; dicho contenido para enriquecer la experiencia de m&aacute;s usuarios. Ning&uacute;n usuario podr&aacute; subir, pegar o a&ntilde;adir informaci&oacute;n al sitio si no tiene permiso expl&iacute;cito de uso por el titular correspondiente. El sitio no se hace responsable de cualquier informaci&oacute;n a&ntilde;adida ilegalmente por terceros. Esta responsabilidad cae solamente sobre el autor de dicha acci&oacute;n. Si desea reportar una infracci&oacute;n de propiedad intelectual contacte al administrador del sitio para tomar las medidas correspondientes.</p>\r\n<p><strong>Uso de servicios y contenido.</strong>&nbsp;Al utilizar este sitio usted est&aacute; de acuerdo con todos los t&eacute;rminos y condiciones de uso descritos en este documento y las pol&iacute;ticas de privacidad del sitio.</p>\r\n<p><strong>Conducta.</strong>&nbsp;Toda persona que presente una conducta sospechosa, da&ntilde;ina y con dolo ser&aacute; reportada a las autoridades para un proceso jur&iacute;dico seg&uacute;n la legislaci&oacute;n aplicable. La recolecci&oacute;n il&iacute;cita de datos o informaci&oacute;n en este sitio o cualquiera de sus usuarios est&aacute; prohibida. La reproducci&oacute;n de cualquier informaci&oacute;n o contenido de este sito est&aacute; estrictamente prohibida sin los permisos correspondientes y bibliograf&iacute;as adecuadas. El acceso a informaci&oacute;n o material sin consentimiento previo del sitio se considerar&aacute; robo de propiedad intelectual y/o datos personales. Dicha acci&oacute;n es perseguida por la legislaci&oacute;n aplicable.</p>\r\n<p><strong>Resoluci&oacute;n de Disputas.</strong>&nbsp;La resoluci&oacute;n de disputas se llevar&aacute; a cabo estrictamente bajo la jurisdicci&oacute;n del estado. Miscel&aacute;neos.</p>\r\n<p><strong>Uso de Cookies:</strong>&nbsp;Las cookies son peque&ntilde;os archivos de texto que se almacenan en su computadora para complementar la experiencia de uso de portales web. Este portal web utiliza las cookies con fines de satisfacci&oacute;n del cliente, mercadol&oacute;gicos y bit&aacute;coras de seguridad. Si usted desea deshabilitar el uso de cookies lo puede hacer directamente mediante las preferencias su navegador web. &nbsp;</p>', NULL, '2020-12-09 22:21:05', '2021-03-13 04:54:03'),
(2, 'Métodos de pago', '<div id=\"smart-button-container\">\r\n<h2 id=\"paypal-button-container\">DEP&Oacute;SITO O TRANSFERENCIA</h2>\r\n<p>Razon Social: CB4U CREATING BUSINESS FOR YOU S DE RL DE CV<br />Banco: SANTANDER<br />Cuenta: 65507166011<br />Clabe: 014320655071660118</p>\r\n<p>* ENVIAR COMPROBANTE DE PAGO V&Iacute;A WHATSAPP 3314559218 *</p>\r\n<h2 id=\"paypal-button-container\">PAGOS CON TARJETA POR MEDIO DE:</h2>\r\n<p><a title=\"PAGO SEGURO CON TARJETA A TRAV&Eacute;S DE\" href=\"https://conekta.com/\">https://conekta.com/</a></p>\r\n</div>\r\n<div id=\"smart-button-container\">\r\n<div style=\"text-align: center;\">\r\n<div id=\"paypal-button-container\"></div>\r\n</div>\r\n</div>', NULL, '2020-12-09 22:21:41', '2021-03-23 20:00:21'),
(3, 'Devoluciones y envío', '<p><strong>RESCISI&Oacute;N O CANCELACI&Oacute;N DEL PEDIDO</strong></p>\r\n<p>Para solicitar cualquier rescisi&oacute;n o cancelaci&oacute;n, EL CLIENTE deber&aacute; enviar la orden de compra via e mail a mktdigital@cb4u.com.mx, bajo las siguientes consideraciones:</p>\r\n<ol>\r\n<li>Una vez recibidos LOS PRODUCTOS y firmados de conformidad, no se aceptan cancelaciones por cambio de modelo, tama&ntilde;o, color, y/o cancelaciones definitivas por causas imputables al cliente.</li>\r\n<li>Cuando EL CLIENTE no tenga PRODUCTOS en su poder, la cancelaci&oacute;n del pedido y la devoluci&oacute;n de su dinero se efectuar&aacute; en la sucursal donde se realiz&oacute; la operaci&oacute;n de compra presentando el documento y recibos de pago originales.</li>\r\n<li>La devoluci&oacute;n del dinero al EL CLIENTE, se efectuar&aacute; en la sucursal donde se realiz&oacute; la operaci&oacute;n de compra presentando el documento y recibos de pago originales, cinco d&iacute;as despu&eacute;s de que GROPIUS tenga los PRODUCTOS en su poder.</li>\r\n<li>El plazo para obtener el reembolso de las cantidades pagadas a que tenga derecho EL CLIENTE, prescribir&aacute; al t&eacute;rmino de un a&ntilde;o, contado a partir de la fecha de la cancelaci&oacute;n del pedido.</li>\r\n<li>Para todos los casos de cancelaci&oacute;n con devoluci&oacute;n de dinero para EL CLIENTE, &eacute;ste se efectuar&aacute; de acuerdo a lo siguiente: Cuando el pago haya sido efectuado en efectivo, cheque y/o tarjeta de d&eacute;bito se reembolsar&aacute; con cheque a nombre de el CLIENTE que aparece como titular en el pedido.</li>\r\n<li>Cuando el pago haya sido efectuado con cualquier tipo de tarjeta de cr&eacute;dito se acreditar&aacute; a la tarjeta utilizada en el momento de la compra, dentro de los cinco d&iacute;as h&aacute;biles siguientes a la fecha de cancelaci&oacute;n.</li>\r\n<li>Para cualquier cambio o devoluci&oacute;n se necesita que el producto cuente con el empaque original o uno similar.</li>\r\n</ol>\r\n<p>&nbsp;</p>', NULL, '2020-12-09 22:21:41', '2021-03-23 03:42:01'),
(4, 'Términos y condiciones', '<div class=\"elementor-element elementor-element-70f730d elementor-widget elementor-widget-heading\" data-id=\"70f730d\" data-element_type=\"widget\" data-widget_type=\"heading.default\">\r\n<div class=\"elementor-widget-container\">\r\n<ol>\r\n<li><strong> </strong><strong><u>Objeto</u></strong>.<strong> </strong>El objeto de presente Contrato es la compraventa de muebles fabricados y/o el dise&ntilde;o de los mismos (en lo sucesivo los &ldquo;Productos&rdquo;). En los t&eacute;rminos del presente Contrato, CB4U, S. de R.L. de C.V. (en lo sucesivo &ldquo;GROPIUS&rdquo;) se compromete a entregar al Comprador los Productos y el Comprador a recibirlos de acuerdo con las especificaciones hechas en la Orden de Compra.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<ol start=\"2\">\r\n<li><strong> </strong><strong><u>Condiciones de Compra</u></strong>. Todas las compras se regir&aacute;n conforme a los t&eacute;rminos de este Contrato. La Orden de Compra es el documento mediante el cual el Comprador solicitar&aacute; a GROPIUS la fabricaci&oacute;n de los Productos para ser entregados en la fecha, cantidades y lugar se&ntilde;alados en ella.</li>\r\n</ol>\r\n<p><strong><u>&nbsp;</u></strong></p>\r\n<ol start=\"3\">\r\n<li><strong> </strong><strong><u>Pagos</u></strong>. A fin de documentar el pago del Precio en t&eacute;rminos del presente Contrato, el Comprador suscribe en favor de GROPIUS un pagar&eacute; no causal por el monto total de Precio (cantidad especificada en la Orden de Compra), mismo del que se adjunta una copia del documento suscrito como Anexo &ldquo;B&rdquo; a la Orden de Compra, el cual forma parte integral del presente Contrato, con vencimientos sucesivos precisamente en las fechas que se se&ntilde;alan en la Orden de Compra anterior y en el cual se anotar&aacute;n en el t&iacute;tulo de cr&eacute;dito las amortizaciones que haga el comprador.</li>\r\n</ol>\r\n<p><strong><u>&nbsp;</u></strong></p>\r\n<ol start=\"4\">\r\n<li><strong> </strong><strong><u>Entrega de los Productos</u></strong>.<strong> </strong>Los Productos deber&aacute;n ser entregados al Comprador en los t&eacute;rminos descritos en la Orden de Compra, al momento en que el Comprador los reciba en su domicilio, los Productos pasar&aacute;n a ser responsabilidad del Comprador.</li>\r\n</ol>\r\n<p><strong><u>&nbsp;</u></strong></p>\r\n<ol start=\"5\">\r\n<li><strong> </strong><strong><u>Limitaci&oacute;n de Responsabilidad y Garant&iacute;a</u></strong>. GROPIUS garantiza que los Productos que le provea al Comprador, cumplir&aacute;n con las especificaciones de fabricaci&oacute;n indicados, est&aacute;ndares de calidad y requerimientos contenidos en este Contrato y conforme a la Orden de Compra.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>El t&eacute;rmino de la garant&iacute;a y la limitaci&oacute;n de la responsabilidad por parte de GROPIUS sobre Productos adquiridos por el Comprador, ser&aacute; de 60 d&iacute;as (contados a partir de fecha de entrega de los Productos, por fallas o deficiencias en su fabricaci&oacute;n.</p>\r\n<p><strong><u>&nbsp;</u></strong></p>\r\n<ol start=\"6\">\r\n<li><strong> </strong><strong><u>Terminaci&oacute;n por Incumplimiento</u></strong>. Las partes convienen que, en caso de incumplimiento de cualquier obligaci&oacute;n bajo el presente Contrato, la Parte afectada notificar&aacute; dicho incumplimiento por escrito a la otra. La Parte en incumplimiento tendr&aacute; 15 d&iacute;as h&aacute;biles para subsanarlo. Una vez transcurrido dicho plazo, sin que sea subsanado, la Parte afectada podr&aacute;:</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>Extender el plazo para el cumplimiento de la obligaci&oacute;n(es) incumplida(s);</li>\r\n<li>Obtener el cumplimiento de la(s) obligaci&oacute;n(es) incumplida(s) mediante el ejercicio de los recursos legales aplicables;</li>\r\n<li>Rescindir el presente Contrato sin necesidad de resoluci&oacute;n arbitral, judicial o de cualquier otra naturaleza, mediante simple notificaci&oacute;n por escrito a la Parte en incumplimiento.</li>\r\n<li>En cualquiera de los supuestos a que se refieren los incisos &ldquo;b)&rdquo; y &ldquo;c)&rdquo; anteriores, la Parte afectada podr&aacute; reclamar el pago de una pena convencional por una cantidad equivalente al Precio establecido en la Orden de Compra.</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"7\">\r\n<li><strong> </strong><strong><u>Avisos y Notificaciones</u></strong>.<strong> </strong>Todas las notificaciones, solicitudes de informaci&oacute;n o comunicaciones que deban ser entregadas o enviadas de acuerdo con el presente Contrato, deber&aacute;n hacerse por escrito y enviarse a los domicilios especificados en la Orden de Compra</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<ol start=\"8\">\r\n<li><strong> </strong><strong><u>Miscel&aacute;neos</u></strong>.<strong> </strong>Este Contrato no podr&aacute; ser modificado, a menos que se haga por escrito y firmado por ambas partes.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Todos los Anexos que se agregan al Contrato son incorporados mediante esta referencia como si a la letra se insertasen y ser&aacute;n considerados como parte del mismo.</p>\r\n<p>&nbsp;</p>\r\n<p>Los t&iacute;tulos y encabezados de las Cl&aacute;usulas de este Contrato se utilizan exclusivamente para referencia y de ninguna manera modificar&aacute;n el significado de los t&eacute;rminos y condiciones aqu&iacute; pactadas.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"9\">\r\n<li><strong> </strong><strong><u>Jurisdicci&oacute;n y ley aplicable</u></strong>.<strong> </strong>Para la interpretaci&oacute;n y cumplimiento de las obligaciones contra&iacute;das en virtud del presente Contrato, las partes se someten a los Tribunales competentes de la ciudad de Guadalajara, Jalisco, y renuncian expresamente a cualquier otro fuero o &aacute;mbito de aplicaci&oacute;n legal, que por razones de domicilio pudiera corresponderles. Las partes manifiestan que, para la elaboraci&oacute;n, firma y cumplimiento del presente Contrato no ha existido error, violencia o mala fe y que reconocen la legitimidad de sus declaraciones.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Le&iacute;do que fue los T&eacute;rminos y Condiciones que junto con la Orden de Compra debidamente firmada, integran el Contrato y enteradas del alcance y contenido legal de todas y cada una de las cl&aacute;usulas lo ratifican al momento de ejercer cualquier acto de comercio relacionado con el mismo, tal como, la firma de la Orden, la confirmaci&oacute;n por cualquier v&iacute;a incluso electr&oacute;nica de: (i) la Orden de Compra, (ii) cotizaciones, (iii) aprobaci&oacute;n de dise&ntilde;o, o cualquiera otro similar, as&iacute; como la firma del Pagar&eacute; o el pago de cualquier monto relacionado con el Precio.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-14f22ed4 elementor-widget elementor-widget-text-editor\" data-id=\"14f22ed4\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div class=\"elementor-text-editor elementor-clearfix\">\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>', NULL, '2020-12-09 22:22:06', '2021-03-13 04:50:13'),
(5, 'Garantía', '<p>GROPIUS otorga una garant&iacute;a de 60 d&iacute;as a partir de la entrega de LOS PRODUCTOS, por desperfectos imputables a GROPIUS o bien por vicios, defectos o da&ntilde;os ocultos, observando lo siguiente:</p>\r\n<ol>\r\n<li>Toda reclamaci&oacute;n por da&ntilde;os o entregas incompletas debe notificarse dentro de los primeros 3 d&iacute;as h&aacute;biles siguientes a la fecha en que EL CLIENTE recibi&oacute; LOS PRODUCTOS, debiendo reportarse al centro de atenci&oacute;n a clientes tel. 3314559218; en caso contrario, se entender&aacute; que el CLIENTE recibi&oacute; LOS PRODUCTOS a su entera satisfacci&oacute;n.</li>\r\n<li>Cuando se trate de PRODUCTOS en liquidaci&oacute;n y/ o saldo, LOS PRODUCTOS se entregar&aacute;n en las condiciones f&iacute;sicas en que se encuentren al momento de su venta. Sobre estos PRODUCTOS no se aceptar&aacute; reclamaci&oacute;n, reparaci&oacute;n, devoluci&oacute;n o cambio f&iacute;sico alguno, debiendo EL CLIENTE firmar de conformidad al momento de levantar el pedido y recibir los PRODUCTOS.</li>\r\n<li>En caso de que LOS PRODUCTOS presenten da GROPIUS los menores derivados de la entrega efectuada por GROPIUS, EL CLIENTE acepta que un t&eacute;cnico especializado de GROPIUS efect&uacute;e la evaluaci&oacute;n correspondiente y en su caso el toque fino de terminado en el domicilio del CLIENTE.</li>\r\n<li>GROPIUSno estar&aacute; obligado a cumplir con lo que se menciona en esta cl&aacute;usula, cuando el plazo de garant&iacute;a haya prescrito o en su defecto, LOS PRODUCTOS hayan sido usados en condiciones diferentes a las normales, presenten reparaciones efectuadas por un tercero o hayan sido trasladados a otro lugar del domicilio donde se efectu&oacute; su entrega.</li>\r\n</ol>\r\n<p>&nbsp;</p>', NULL, NULL, '2021-03-23 03:42:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_es` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_es` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_descripcion_es` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_en` text COLLATE utf8mb4_unicode_ci,
  `min_descripcion_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coti` tinyint(1) NOT NULL DEFAULT '0',
  `textura` tinyint(1) NOT NULL DEFAULT '0',
  `precio` double(9,2) DEFAULT NULL,
  `descuento` double(9,2) DEFAULT NULL,
  `med_alt` double(6,2) DEFAULT NULL,
  `med_anc` double(6,2) DEFAULT NULL,
  `med_lar` double(6,2) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `metaDescripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '99',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `sku`, `titulo_es`, `descripcion_es`, `min_descripcion_es`, `titulo_en`, `descripcion_en`, `min_descripcion_en`, `coti`, `textura`, `precio`, `descuento`, `med_alt`, `med_anc`, `med_lar`, `categoria`, `metaDescripcion`, `llave`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(14, '0000000002', 'SILLA BOMBARDIER', '<p><u>Ideal para estudio u oficina.</u></p>\r\n<ul>\r\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico color negro texturizado mate.</li>\r\n<li>Tapicer&iacute;a textil tipo alcantara color negro.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'SILLA LOUNGE', NULL, NULL, NULL, 0, 0, 10599.00, NULL, 85.00, 70.00, 53.00, 3, NULL, '1641439209', 1, 1, 99, '2021-03-13 07:17:41', '2021-03-20 05:45:13'),
(15, '0000000004', 'SILLA SAN PANCHO', '<p><u>Acento ideal para una sala contempor&aacute;nea</u>.</p>\r\n<ul>\r\n<li>Estructura en varilla de acero acabado electroest&aacute;tico color negro texturizado mate.</li>\r\n<li>Tapicer&iacute;a 100% piel.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'SILLA LOUNGE', NULL, NULL, NULL, 0, 1, 4999.00, NULL, 81.00, 91.00, 71.00, 3, NULL, '1895483812', 1, 1, 99, '2021-03-13 07:21:57', '2021-03-20 05:45:32'),
(17, '0000000006', 'ESCRITORIO WEIMAR', '<ul>\r\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate.</li>\r\n<li>Cubierta desmontable de triplay de pino.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'ESCRITORIO DESARMABLE', NULL, NULL, NULL, 0, 1, 5169.00, NULL, 80.00, 120.00, 60.90, 22, NULL, '391210948', 1, 1, 99, '2021-03-13 08:51:19', '2021-03-25 21:06:30'),
(18, '0000000008', 'SILLA PITTA', '<ul>\r\n<li>Tapicer&iacute;a 100% piel</li>\r\n<li>Estructura de metal acabado electroest&aacute;tico mate.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'SILLA DE INTERIOR', NULL, NULL, NULL, 0, 0, 4900.00, NULL, 90.00, 53.00, 67.00, 3, NULL, '915545047', 0, 0, 99, '2021-03-13 09:05:46', '2021-03-20 05:47:27'),
(19, '0000000010', 'OTTOMAN', '<ul>\r\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico color negro texturizado mate.</li>\r\n<li>Tapicer&iacute;a textil tipo alcantara color negro.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'BANCO OTOMANO', NULL, NULL, NULL, 0, 0, 4550.00, NULL, 42.00, 54.00, 57.00, 3, NULL, '303669407', 0, 1, 99, '2021-03-13 09:14:09', '2021-03-20 05:47:44'),
(20, '0000000012', 'SILLON MANDARÍN', '<ul>\r\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate</li>\r\n<li>Tapiz acojinado en secciones o gajos modulares 100% piel.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'SILLON LOUNGE DE UNA PLAZA', NULL, NULL, NULL, 0, 0, 9899.00, NULL, 74.00, 67.00, 70.00, 6, NULL, '1350843292', 1, 1, 99, '2021-03-13 09:20:45', '2021-03-20 05:47:59'),
(21, '0000000014', 'SILLA SAN PANCHO NEGRO', '<p><u>Acento ideal para una sala contempor&aacute;nea</u>.</p>\r\n<ul>\r\n<li>Estructura en varilla de acero acabado electroest&aacute;tico color negro texturizado mate.</li>\r\n<li>Tapicer&iacute;a 100% piel.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'SILLA LOUNGE', NULL, NULL, NULL, 0, 0, 4999.00, NULL, 81.00, 91.00, 71.00, 3, NULL, '756423105', 0, 1, 99, '2021-03-13 09:59:21', '2021-03-20 05:48:14'),
(22, '0000000016', 'SILLON MANDARÍN CAFÉ', '<p><u>Complemento de estudio u oficina.</u></p>\r\n<ul>\r\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate</li>\r\n<li>Tapiz acojinado en secciones o gajos modulares 100% piel.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'SILLON LOUNGE DE UNA PLAZA', NULL, NULL, NULL, 0, 0, 9899.00, NULL, 74.00, 67.00, 70.00, 6, NULL, '816761695', 0, 1, 99, '2021-03-13 10:02:36', '2021-03-31 21:14:28'),
(23, '0000000018', 'SILLON MANDARIN NARANJA', '<p><u>Complemento de estudio u oficina.</u></p>\r\n<ul>\r\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico negro mate</li>\r\n<li>Tapiz acojinado en secciones o gajos modulares 100% piel.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'SILLON LOUNGE DE UNA PLAZA', NULL, NULL, NULL, 0, 0, 9899.00, NULL, 74.00, 67.00, 70.00, 6, NULL, '1125421943', 0, 0, 99, '2021-03-13 10:17:19', '2021-03-31 06:14:05'),
(25, 'BSGRO-001', 'SOFÁ AGUAMIEL', '<ul>\r\n<li>Tapicer&iacute;a textil color beige</li>\r\n<li>Detalles en 100% piel</li>\r\n<li>Estructura met&aacute;lica con acabado electroest&aacute;tico</li>\r\n<li>No incluye cojines decorativos</li>\r\n</ul>', 'SOFÁ DE DOS PLAZAS', NULL, NULL, NULL, 1, 0, NULL, NULL, 78.00, 95.00, 179.00, 24, NULL, '-1374797543', 0, 0, 99, '2021-03-30 08:33:23', '2021-04-06 19:26:15'),
(26, 'BS-P02', 'POLTRONA AGUA MIEL', '<ul>\r\n<li>Tapizado textil color beige</li>\r\n<li>Tapizado trasero Benito Santos</li>\r\n<li>Estructura met&aacute;lica acabado electroest&aacute;tico</li>\r\n</ul>', 'SOFÁ DE UNA PLAZA', NULL, NULL, NULL, 0, 0, 0.00, 0.00, 92.00, 85.00, 93.00, 24, NULL, '-986898907', 0, 0, 99, '2021-03-31 04:52:19', '2021-03-31 06:14:03'),
(27, 'BSPOL-AGAVE01', 'POLTRONA AGAVERO', '<ul>\r\n<li>Estructura de Rosa Morada</li>\r\n<li>Tapiceria textil</li>\r\n<li>Correas de respaldo 100% piel</li>\r\n<li>Base met&aacute;lica acabado electroest&aacute;tico</li>\r\n</ul>', 'POLTRONA DE MADERA', NULL, NULL, NULL, 0, 0, 0.00, 0.00, 71.00, 70.00, 70.00, 24, NULL, '1662667105', 0, 0, 99, '2021-03-31 04:58:34', '2021-03-31 06:14:02'),
(29, 'CR-BS02', 'CREDENZA AGUA MIEL', '<ul>\r\n<li>Credenza de rosa morada entintada en color az&uacute;l&nbsp;</li>\r\n<li>Compuerta forrada en print <em>Coraz&oacute;n de Agave&nbsp;</em></li>\r\n<li>Estructura met&aacute;lica acabado electroest&aacute;tico&nbsp;</li>\r\n</ul>', 'CREDENZA', NULL, NULL, NULL, 0, 0, 0.00, 0.00, 77.00, 41.00, 180.00, 24, NULL, '-421473933', 0, 0, 99, '2021-03-31 05:18:32', '2021-03-31 06:14:00'),
(30, 'CR-BS03', 'CREDENZA PUNTAS DE AGAVE', '<ul>\r\n<li>Chapa de nogal americano entintado</li>\r\n<li>Puertas forradas en textil <em>Puntas de Agave</em></li>\r\n<li>Estructura met&aacute;lica acabado electroest&aacute;tico</li>\r\n</ul>', 'CREDENZA', NULL, NULL, NULL, 0, 0, 0.00, 0.00, 100.00, 41.00, 120.00, 24, NULL, '-1686023019', 0, 0, 99, '2021-03-31 05:23:53', '2021-03-31 06:14:00'),
(31, 'CR-BS1', 'CREDENZA BENITO SANTOS', '<ul>\r\n<li>Chapa de nogal americano entintato</li>\r\n<li>Puertas forradas print <em>Coraz&oacute;n de Agave</em></li>\r\n<li>Base met&aacute;lica con acabado electroest&aacute;tico</li>\r\n</ul>', 'CREDENZA', NULL, NULL, NULL, 0, 0, 0.00, 0.00, 57.00, 41.00, 180.00, 24, NULL, '-351170085', 0, 0, 99, '2021-03-31 05:30:33', '2021-03-31 06:13:59'),
(32, 'BOM-BS01', 'SILLA BOMBARDIER PIEL', '<ul>\r\n<li>Estructura en l&aacute;mina de acero acabado electroest&aacute;tico color negro texturizado mate.</li>\r\n<li>Tapicer&iacute;a 100% piel.</li>\r\n<li><strong>Tiempo de entrega 4 semanas a partir de la compra.</strong></li>\r\n</ul>', 'SILLA LOUNGE', NULL, NULL, NULL, 0, 0, 0.00, 0.00, 85.00, 70.00, 53.00, 24, NULL, '607392612', 0, 0, 99, '2021-03-31 05:34:10', '2021-03-31 06:13:59'),
(33, 'BSLAM-03', 'LÁMPARA AGAVERO', '<ul>\r\n<li>Estructura de &aacute;cero al carb&oacute;n acabado electroest&aacute;tico&nbsp;</li>\r\n<li>Detalles en piel y madera de Rosa Morada</li>\r\n<li>Pantalla textil</li>\r\n</ul>', 'LÁMPARA DE PISO', NULL, NULL, NULL, 0, 0, 0.00, 0.00, 152.00, 25.00, 27.00, 24, NULL, '-475519123', 0, 0, 99, '2021-03-31 05:48:36', '2021-03-31 06:13:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_photos`
--

CREATE TABLE `productos_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos_photos`
--

INSERT INTO `productos_photos` (`id`, `producto`, `image`, `orden`) VALUES
(43, 14, 'zN3dGUvuhWvtJSNqx3SvIX7WAVFjcT.jpg', 99),
(44, 14, 'feqiokPJlfborUEEk9bfB2Ec33xvTP.jpg', 99),
(45, 14, 'hagjAzR2VPWYP7Lnz3LDj1ZhobE818.jpg', 99),
(46, 14, '396wUknAM5fnVf6RqM2l4LYxnTNGFL.jpg', 99),
(47, 14, 's20ll1NpW0KMl5Vv9yKUR1DojSkqxo.jpg', 99),
(48, 15, 'e3sRRo1HgAlV6a5ovhCyqzADd2Me7o.jpg', 99),
(49, 15, 'Q0ZIDSeM8ODBvlX0sRBbAYdX9Ps8uL.jpg', 99),
(50, 15, 'xrXttf29feJCsCSmRVN1AADOjVeZpg.jpg', 99),
(51, 17, 'yHcJxPJgSxRUY0NxOxx6o8lP0nLDn0.jpg', 99),
(52, 17, 'BWEoXngdPUAHIaEp7kqDsvHNeNFeXd.jpg', 99),
(53, 17, 'ZrlydEqi4Eqs08TKNK6bLGlQiPJTSb.jpg', 99),
(54, 17, 'UzO4LGBZOrpy9EQo01h361Ahjodcfu.jpg', 99),
(55, 18, 'eFW0d516OvKWXzgWKozDVHxumlNPih.jpg', 99),
(56, 18, '4uq5PHv9l56kMQYHA5vQoWNltNNOCp.jpg', 99),
(57, 18, 'sPzVfAVuvTr4wuzq63whrzd8VeKx7r.jpg', 99),
(58, 18, 'E5PZ3SwUg1JQSo3O2j3yy00yyAI2zz.jpg', 99),
(59, 18, 'g0rVpo5oQu6c9LccBfDpalVCZ8Wkkg.jpg', 99),
(60, 19, 'Xy3JnG1c7aamLxQX7SL635fdrYOnxO.jpg', 99),
(61, 19, 'vRXcGCzxMwHPD0Rp6pNPHwfwe1ZuBv.jpg', 99),
(63, 19, 'q7BqZUaNdAqED9tu8Dl3oqtqzPjreM.jpg', 99),
(64, 20, 'eO3q1RoAYctCoh0KLxYu5aLrC6LjoH.jpg', 99),
(65, 20, 'yK4tggdaFnGUkyRi3ujiq5MiKlfa8l.jpg', 99),
(66, 20, 'bFLwoi5OjhYQPrmeUKzXF7CTMNOXOL.jpg', 99),
(67, 20, 'pZeQxIArgJV0mzJ6Xn1U8wr8FGyCFD.jpg', 99),
(68, 20, 'xzAfQKuqxBDfoSNbH1PmdmPmT9hVUW.jpg', 99),
(69, 21, 'YE3GgrWAdn3cv4cbazzDdl6Pf9ALAC.jpg', 99),
(70, 21, '7oQqdSvdHNfQzbemuti5zDUECdsMbh.jpg', 99),
(71, 21, 'TrDW46eg172kgRy0MfjccqpDwEF9As.jpg', 99),
(72, 21, 'iN8obUDag6kDbIcIpsz7iwBVYxZelu.jpg', 99),
(73, 22, 'DytDtSzVpaLZpo00EUt6dB7MUe3Z1R.jpg', 0),
(74, 22, 'pDi4EXXJAfbvEtnSE66sKHWMeI5SnE.jpg', 1),
(75, 22, 'xLrGMZEPDtP8o3tWsBFXVVPq40GIzq.jpg', 2),
(76, 22, '8oNz4DNRdMXObltGJcfn1zmiDk78rQ.jpg', 3),
(81, 23, 'sfqJEpMht5FFAsaQLQ0SvAackyemwn.jpg', 99),
(82, 23, 'xOdk0prE0hdYQ9ntPxTnVZdqGUR889.jpg', 99),
(83, 23, 'DTdGH9AMEVheEjApQSxwaFPu7vSlIk.jpg', 99),
(102, 25, 'wFqPskGoYQBQ3PDrmMywJyi3Xmfw3G.jpg', 99),
(103, 25, 'oSFiF4OUx5X35tLWEdIioKJbT54unF.jpg', 99),
(104, 25, 'wSpsaX8puqVd3ACNYgO4SZ9c5fNyCR.jpg', 99),
(105, 26, 'o43ZgdAd2HikrUacv57zacjdyWDMQI.jpg', 99),
(106, 26, 'CeCLoX7tNBnXx3EjuaBzUaAqWbYs3W.jpg', 99),
(107, 26, '0ItFQGuhVDZ1f105xcctIygkUJ8kso.jpg', 99),
(108, 26, 'Kc8JGWYj3LT53VKpkvYBvTNOW2kLQ5.jpg', 99),
(109, 27, 'z65SOCkvZq2snMEY310uSdGVflKDwD.jpg', 99),
(110, 27, 'JrEybhJfGLPZ4F64T7WBfj5wcnSSm2.jpg', 99),
(111, 27, 'l1eKZPvYmo9eY7shzgPI6fhtF0icOp.jpg', 99),
(113, 27, 'xY4QSQP7ktR6io0szbvNudw0IN5z3g.jpg', 99),
(115, 29, 'aPkTSs4P6Nc9Gq02B9HLXJogXuCzi9.jpg', 99),
(116, 29, 't0eEENCw9P2dDMvjZWwLEzLeD8uyXr.jpg', 99),
(117, 29, 'A6rjxG3emL1nDVOxDtR6LDmf9y0Niq.jpg', 99),
(118, 30, '1WgVr9vyjD81zaS2HKnwMkaEOlbU8J.jpg', 99),
(119, 30, 'YeNG5lda2vGIUQ5ecvlnqzo4AIFves.jpg', 99),
(120, 30, 'bfbGOb446icOk6JT2gUUOhGTODIfcL.jpg', 99),
(121, 30, 'UjMRPAGocfKs8MGnjH4r8o1wHJrJA1.jpg', 99),
(122, 31, 'OFgpk3jHTbSknSkkdkcgEQrOjHqH0Q.jpg', 1),
(123, 31, 'SCZATIVBaGuhPeO2gwtWO2zkI3Gm0J.jpg', 0),
(124, 31, '5Y2HIcKCgOIvb21szec8LeAhDHX4l0.jpg', 2),
(125, 31, 'ewsIIGSBhwP52a8aYy8BihTwjEsDDO.jpg', 3),
(127, 32, '4hcuAcWmVA1Il0cGctUEm2VLY1VlxF.jpg', 2),
(128, 32, 'xlK5wm6BOBNNopOr2SJySBCrzqsmuo.jpg', 3),
(129, 32, 'aPTFJGj7ghD1b2BfS3cc135i9Y6ndo.jpg', 4),
(130, 32, 'YgVP1MtSqetRN8Usep9wKwzXbGmUQk.jpg', 0),
(131, 33, 'fAbhQiIXsN0HDOYqu6th8RMHffmMkK.jpg', 1),
(132, 33, 'tOReHDTNu3NyeoRlqYQrJEm1yfVNLm.jpg', 2),
(133, 33, '1m9nMeWQrWjAY6idR9e5VhK24D4hP7.jpg', 0),
(134, 33, '9grIFXtsRfsyMvF6Yh3qHdJg4poXDm.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_relacions`
--

CREATE TABLE `producto_relacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `otroProducto` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_relacions`
--

INSERT INTO `producto_relacions` (`id`, `producto`, `otroProducto`) VALUES
(4, 19, 14),
(5, 21, 15),
(6, 22, 20),
(7, 23, 20),
(8, 23, 22),
(9, 14, 19),
(10, 15, 21),
(11, 20, 22),
(12, 20, 23),
(13, 26, 25),
(15, 29, 27),
(16, 30, 25),
(17, 33, 27),
(18, 33, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_versions`
--

CREATE TABLE `producto_versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coltex` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `precio` double(9,2) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '99',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_versions`
--

INSERT INTO `producto_versions` (`id`, `coltex`, `producto`, `precio`, `existencia`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(17, 1, 14, NULL, 1, 1, 99, '2021-03-13 07:17:41', '2021-03-13 07:19:04'),
(18, 12, 15, NULL, 1, 1, 99, '2021-03-13 07:21:57', '2021-03-13 07:24:41'),
(20, 14, 17, NULL, 1, 1, 99, '2021-03-13 08:51:19', '2021-03-13 09:03:35'),
(21, 15, 18, NULL, 1, 1, 99, '2021-03-13 09:05:46', '2021-03-13 09:07:21'),
(22, 1, 19, NULL, 1, 1, 99, '2021-03-13 09:14:09', '2021-03-13 09:16:59'),
(23, 8, 20, NULL, NULL, 1, 99, '2021-03-13 09:20:45', '2021-03-13 09:20:45'),
(24, 15, 21, NULL, 1, 1, 99, '2021-03-13 09:59:21', '2021-03-13 10:01:07'),
(25, 16, 22, NULL, 1, 1, 99, '2021-03-13 10:02:36', '2021-03-13 10:02:51'),
(26, 5, 23, NULL, 1, 1, 99, '2021-03-13 10:17:19', '2021-03-13 10:36:08'),
(28, 16, 25, NULL, 1, 1, 99, '2021-03-30 08:33:23', '2021-03-31 04:49:30'),
(29, 16, 26, NULL, NULL, 1, 99, '2021-03-31 04:52:19', '2021-03-31 04:52:19'),
(30, 16, 27, NULL, NULL, 1, 99, '2021-03-31 04:58:34', '2021-03-31 04:58:34'),
(32, 21, 29, NULL, NULL, 1, 99, '2021-03-31 05:18:32', '2021-03-31 05:18:32'),
(33, 21, 30, NULL, NULL, 1, 99, '2021-03-31 05:23:53', '2021-03-31 05:23:53'),
(34, 21, 31, NULL, NULL, 1, 99, '2021-03-31 05:30:33', '2021-03-31 05:30:33'),
(35, 12, 32, NULL, NULL, 1, 99, '2021-03-31 05:34:10', '2021-03-31 05:34:10'),
(36, 20, 33, NULL, NULL, 1, 99, '2021-03-31 05:48:36', '2021-03-31 05:48:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_version_photos`
--

CREATE TABLE `producto_version_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_version_photos`
--

INSERT INTO `producto_version_photos` (`id`, `version`, `image`, `orden`) VALUES
(9, 17, 'IUr2sJbMRGb8AXiCFnxsQXl4N9w18q.jpg', 99),
(10, 18, 'IKTmJEmpSAkIdEvY1qH74mzfonvXb8.jpg', 99),
(11, 20, 'crytS8cILi8sNmRegRTH95riIdnLIP.jpg', 99),
(12, 21, 'BP30vMyTXqaCVmsn08KpZ3KJCLogOX.jpg', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas`
--

CREATE TABLE `pujas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subasta` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED DEFAULT NULL,
  `puja` double(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pujas`
--

INSERT INTO `pujas` (`id`, `subasta`, `user`, `puja`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2800.00, '2021-03-27 01:07:14', '2021-03-27 01:07:14'),
(2, 1, 4, 3100.00, '2021-03-27 01:07:26', '2021-03-27 01:07:26'),
(3, 1, 4, 3400.00, '2021-03-27 01:08:09', '2021-03-27 01:08:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccions`
--

CREATE TABLE `seccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portada` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccions`
--

INSERT INTO `seccions` (`id`, `seccion`, `portada`) VALUES
(1, 'index', NULL),
(2, 'about', NULL),
(3, 'productos', NULL),
(4, 'subastas', NULL),
(5, 'contacto', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catSize` bigint(20) UNSIGNED NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '99',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `catSize`, `orden`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 3, '2020-12-24 23:51:58', '2020-12-25 00:08:22'),
(2, '1 1/2', 1, 4, '2020-12-24 23:56:24', '2020-12-25 00:08:22'),
(3, '3/4', 1, 2, '2020-12-24 23:56:35', '2020-12-25 00:08:22'),
(4, '1/2', 1, 1, '2020-12-24 23:56:42', '2020-12-25 00:08:19'),
(5, '1/4', 1, 0, '2020-12-24 23:57:06', '2020-12-25 00:08:08'),
(6, '2', 1, 5, '2020-12-24 23:57:17', '2020-12-25 00:08:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas`
--

CREATE TABLE `subastas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo_es` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_es` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_descripcion_es` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_en` text COLLATE utf8mb4_unicode_ci,
  `min_descripcion_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_inicial` double(9,2) NOT NULL,
  `precio_actual` double(20,2) DEFAULT NULL,
  `puja_min` double(9,2) NOT NULL,
  `deadline` datetime NOT NULL,
  `lastUserId` int(11) DEFAULT NULL,
  `ended` tinyint(1) NOT NULL DEFAULT '0',
  `inicio` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '66',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subastas`
--

INSERT INTO `subastas` (`id`, `titulo_es`, `descripcion_es`, `min_descripcion_es`, `titulo_en`, `descripcion_en`, `min_descripcion_en`, `precio_inicial`, `precio_actual`, `puja_min`, `deadline`, `lastUserId`, `ended`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'SILLA PITTA', '<ul>\r\n<li>Estructura de metal acabado electroest&aacute;tico negro mate.</li>\r\n<li>Tapicer&iacute;a 100% piel</li>\r\n</ul>', 'SILLA DE INTERIOR', NULL, NULL, NULL, 2500.00, 3400.00, 300.00, '2021-04-05 23:59:59', 4, 0, 1, 1, 66, '2021-03-23 03:44:33', '2021-03-27 01:08:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas_photos`
--

CREATE TABLE `subastas_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subasta` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subastas_photos`
--

INSERT INTO `subastas_photos` (`id`, `subasta`, `image`, `orden`) VALUES
(1, 1, 'EXBKhg4l0EcmThrSZoHFp5yMShbAIn.jpg', 99),
(2, 1, 'CJPNRmFxk3RMepzkFLrhPkV1lLmnAp.jpg', 99),
(3, 1, 'g7ayyc3pgAYbYqYe22mzmF8PxcgWu6.jpg', 99),
(4, 1, 'IpXE4REZ9YD7GH4jk2J8wMSZSgObdB.jpg', 99),
(5, 1, '6sqOveg5D2cDEd4iDL1GuN6ym0nox7.jpg', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursals`
--

CREATE TABLE `sucursals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci,
  `lat` text COLLATE utf8mb4_unicode_ci,
  `lon` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursals`
--

INSERT INTO `sucursals` (`id`, `nombre`, `tel`, `mail`, `direccion`, `cp`, `ubicacion`, `maps`, `lat`, `lon`) VALUES
(1, 'GROPIUS SEDE', '3314559218', 'mktdigital@cb4u.com.mx', 'Av. Dr. Angel Lea&ntilde;o 401, Los Robles, 45134 Zapopan, Jal.', '45134', 'SAN ÁNGEL INDUSTRIAL PARK', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `email_verified_at`, `telefono`, `facebook`, `empresa`, `rfc`, `role`, `password`, `profile`, `activo`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ANA', NULL, NULL, 'wozialmarketinglovers@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$mzj2B92AqcvvZOG83kqSceDUOg0x62CHV8SfZgm8jcAb7k3VVELXO', NULL, 1, NULL, NULL, '2021-02-14 02:53:28', '2021-02-14 02:53:28'),
(2, 'PALOMA', 'Orozco', NULL, 'paloma.munoz14@gmail.com', NULL, '3314559218', NULL, NULL, NULL, NULL, '$2y$10$pa8R1LJuh2jt2d/ZGO.pc.HxK2YgQJ.uPORqgIOpqTy41YNgUchwq', NULL, 1, NULL, NULL, '2021-02-17 20:55:12', '2021-03-16 07:27:38'),
(3, 'alejandra', NULL, NULL, 'sara@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$.U4OxeEkbZ1ub0HJLdNUneQZhsRAlJDSTr1Opt1fvR5j2cgxVSxEm', NULL, 1, NULL, NULL, '2021-03-02 22:19:57', '2021-03-02 22:19:57'),
(4, 'Carlos Raúl', 'Martínez Barba', 'CRMB73', 'carlosmba@me.com', NULL, '3319185956', NULL, NULL, NULL, NULL, '$2y$10$morrsBQ/BS0Nc4UcRDw6yOMg/1gv5bbTQ29e7WiqrB8IQBrMBur/W', NULL, 1, NULL, NULL, '2021-03-12 23:10:11', '2021-03-13 00:02:08'),
(5, 'yahir', NULL, NULL, 'yahir@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$8GJM2H.Lz2NT3EHLJ2I7F.Tow/41DF74FoiVNZoeCjoUY0GMxMYQW', NULL, 1, NULL, NULL, '2021-03-12 23:52:21', '2021-03-12 23:52:21'),
(6, 'andres', NULL, NULL, 'yahir1@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$N3ihl5jsYoEQrCMylCmpruijmCG3sXApt.yTF.ZC65amrjhAtHw1m', NULL, 1, NULL, NULL, '2021-03-13 00:04:42', '2021-03-13 00:04:42'),
(7, 'Carlos Raúl', 'Barba', NULL, 'carlosmba73@gmail.com', NULL, '+523319185956', NULL, NULL, NULL, NULL, '$2y$10$EgaVJIdE10gi60gHKeOCkurHUspTjyTyCnWBspj1KvzCd7E/9Xwm2', NULL, 1, NULL, NULL, '2021-03-13 21:40:21', '2021-03-13 21:40:59'),
(8, 'PALOMA', 'MUÑOZ', 'Paloma_123', 'mktdigital@cb4u.com.mx', NULL, '3314559218', NULL, NULL, NULL, NULL, '$2y$10$pdMkQuqWikLw3pap8VVaneU4wDf7uK0Lbp/25XmTlzdBUDisv06ci', NULL, 1, NULL, NULL, '2021-03-16 07:22:58', '2021-03-16 07:23:50'),
(9, 'CLAUDIA', NULL, NULL, 'yahir@wozial.com1', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$1Hl6ayzC1mv77CemE/Ga6u8EKBAPuFdejvC4Se0VcOSI1YvH0xi2u', NULL, 1, NULL, NULL, '2021-03-17 00:55:21', '2021-03-17 00:55:21'),
(10, 'Edgar', NULL, NULL, 'edgar.almaraz@cb4u.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tqicHVmRcyYqYFgwWWsFZOcK5UC8iyT0CwMcJWES/girk/6W9fS9a', NULL, 1, NULL, NULL, '2021-03-17 04:03:01', '2021-03-17 04:03:01'),
(11, 'ana paula', NULL, NULL, 'anapaula@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$FNqZ4EZT2W5hUeKUOWt03euo8t7CuqKxP3nX9i1exJ5Iu0AF8FbyC', NULL, 1, NULL, NULL, '2021-03-17 06:24:03', '2021-03-17 06:24:03'),
(12, 'TEST 1', NULL, NULL, 'anapaulatest1@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$VTNKXOHBLYgHqquSRBhsJu7qyPaKdOSoyHZdyqJ4EY.JFuIbXLAYO', NULL, 1, NULL, NULL, '2021-03-17 09:04:46', '2021-03-17 09:04:46'),
(13, 'test6', NULL, NULL, 'tes6@co.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$qF5Nzh1R9P.cf.uADssMeuvuk8.bnTIHD79gXFyzrZKTZnw0.jpm2', NULL, 1, NULL, NULL, '2021-03-17 09:07:41', '2021-03-17 09:07:41'),
(14, 'test3', NULL, NULL, 'test3@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$MExOGiL2hbG3.FG1d3D.2.IYZQmwYvVbWVFLrJKts3mLxmsolkcNC', NULL, 1, NULL, NULL, '2021-03-17 09:33:23', '2021-03-17 09:33:23'),
(15, 'pris', NULL, NULL, 'ana@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$s0Dyna..Fsrab9P33OejEu0U5KR6WS8aTFogIiUBcg2waeN5WWPYG', NULL, 1, NULL, NULL, '2021-03-20 04:52:35', '2021-03-20 04:52:35'),
(16, 'adrian', NULL, NULL, 'adrian@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$zdnbD.DDwnBZC8Mdn03mbedRUeFVYToRfLOAq9kBP.I0WN2XSaVnG', NULL, 1, NULL, NULL, '2021-03-23 03:33:32', '2021-03-23 03:33:32'),
(17, 'Irak', NULL, NULL, 'irak.vargas.bernal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$yPhVhvkHKPxmBx5K/QB6KuUtwaBmG4easJ9b3qfuO61A/32t.4q6C', NULL, 1, NULL, NULL, '2021-03-23 07:37:43', '2021-03-23 07:37:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_user_unique` (`user`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indices de la tabla `carrusels`
--
ALTER TABLE `carrusels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_slug_unique` (`slug`);

--
-- Indices de la tabla `categ_tamanos`
--
ALTER TABLE `categ_tamanos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupons_codigo_unique` (`codigo`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domicilios_user_foreign` (`user`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elementos_seccion_foreign` (`seccion`);

--
-- Indices de la tabla `espacioproductos`
--
ALTER TABLE `espacioproductos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `espacioproductos_producto_foreign` (`producto`),
  ADD KEY `espacioproductos_espacio_foreign` (`espacio`);

--
-- Indices de la tabla `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facturas_rfc_unique` (`rfc`),
  ADD UNIQUE KEY `facturas_mail_unique` (`mail`),
  ADD KEY `facturas_user_foreign` (`user`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria_subastas`
--
ALTER TABLE `galeria_subastas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newslatters`
--
ALTER TABLE `newslatters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nosotrosgalerias`
--
ALTER TABLE `nosotrosgalerias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payment2s`
--
ALTER TABLE `payment2s`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_usuario_foreign` (`usuario`);

--
-- Indices de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_detalles_pedido_foreign` (`pedido`),
  ADD KEY `pedido_detalles_producto_foreign` (`producto`);

--
-- Indices de la tabla `pedido_subastas`
--
ALTER TABLE `pedido_subastas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_subastas_subasta_foreign` (`subasta`);

--
-- Indices de la tabla `politicas`
--
ALTER TABLE `politicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_sku_unique` (`sku`),
  ADD UNIQUE KEY `productos_llave_unique` (`llave`);

--
-- Indices de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_photos_producto_foreign` (`producto`);

--
-- Indices de la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_relacions_producto_foreign` (`producto`),
  ADD KEY `producto_relacions_otroproducto_foreign` (`otroProducto`);

--
-- Indices de la tabla `producto_versions`
--
ALTER TABLE `producto_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_version_photos`
--
ALTER TABLE `producto_version_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_version_photos_version_foreign` (`version`);

--
-- Indices de la tabla `pujas`
--
ALTER TABLE `pujas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pujas_subasta_foreign` (`subasta`),
  ADD KEY `pujas_user_foreign` (`user`);

--
-- Indices de la tabla `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_catsize_foreign` (`catSize`);

--
-- Indices de la tabla `subastas`
--
ALTER TABLE `subastas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subastas_photos`
--
ALTER TABLE `subastas_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subastas_photos_subasta_foreign` (`subasta`);

--
-- Indices de la tabla `sucursals`
--
ALTER TABLE `sucursals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrusels`
--
ALTER TABLE `carrusels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `categ_tamanos`
--
ALTER TABLE `categ_tamanos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `espacioproductos`
--
ALTER TABLE `espacioproductos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `espacios`
--
ALTER TABLE `espacios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `galeria_subastas`
--
ALTER TABLE `galeria_subastas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `newslatters`
--
ALTER TABLE `newslatters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nosotrosgalerias`
--
ALTER TABLE `nosotrosgalerias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `payment2s`
--
ALTER TABLE `payment2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `pedido_subastas`
--
ALTER TABLE `pedido_subastas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `politicas`
--
ALTER TABLE `politicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `producto_versions`
--
ALTER TABLE `producto_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `producto_version_photos`
--
ALTER TABLE `producto_version_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pujas`
--
ALTER TABLE `pujas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `subastas`
--
ALTER TABLE `subastas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subastas_photos`
--
ALTER TABLE `subastas_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sucursals`
--
ALTER TABLE `sucursals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `domicilios_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_seccion_foreign` FOREIGN KEY (`seccion`) REFERENCES `seccions` (`id`);

--
-- Filtros para la tabla `espacioproductos`
--
ALTER TABLE `espacioproductos`
  ADD CONSTRAINT `espacioproductos_espacio_foreign` FOREIGN KEY (`espacio`) REFERENCES `espacios` (`id`),
  ADD CONSTRAINT `espacioproductos_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_usuario_foreign` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  ADD CONSTRAINT `pedido_detalles_pedido_foreign` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_detalles_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido_subastas`
--
ALTER TABLE `pedido_subastas`
  ADD CONSTRAINT `pedido_subastas_subasta_foreign` FOREIGN KEY (`subasta`) REFERENCES `subastas` (`id`);

--
-- Filtros para la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  ADD CONSTRAINT `productos_photos_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  ADD CONSTRAINT `producto_relacions_otroproducto_foreign` FOREIGN KEY (`otroProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_relacions_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `producto_version_photos`
--
ALTER TABLE `producto_version_photos`
  ADD CONSTRAINT `producto_version_photos_version_foreign` FOREIGN KEY (`version`) REFERENCES `producto_versions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pujas`
--
ALTER TABLE `pujas`
  ADD CONSTRAINT `pujas_subasta_foreign` FOREIGN KEY (`subasta`) REFERENCES `subastas` (`id`),
  ADD CONSTRAINT `pujas_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_catsize_foreign` FOREIGN KEY (`catSize`) REFERENCES `categ_tamanos` (`id`);

--
-- Filtros para la tabla `subastas_photos`
--
ALTER TABLE `subastas_photos`
  ADD CONSTRAINT `subastas_photos_subasta_foreign` FOREIGN KEY (`subasta`) REFERENCES `subastas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
