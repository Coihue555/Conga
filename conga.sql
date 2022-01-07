-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-01-2022 a las 22:41:33
-- Versión del servidor: 8.0.27-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL,
  `Categoria` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipoCat` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `Categoria`, `tipoCat`, `usuario`) VALUES
(1, 'Comida', 'Gasto', 'Andy'),
(2, 'Comida Afuera', 'Gasto', 'Andy'),
(3, 'Arreglos Casa', 'Gasto', 'Andy'),
(4, 'Ropa', 'Gasto', 'Andy'),
(7, 'Transporte', 'Gasto', 'Andy'),
(8, 'Telefono', 'Gasto', 'Andy'),
(9, 'Extra', 'Gasto', 'Andy'),
(10, 'Alquiler', 'Gasto', 'Andy'),
(11, 'Salud', 'Gasto', 'Andy'),
(12, 'Impuestos', 'Gasto', 'Andy'),
(13, 'Sueldo', 'Ingreso', 'Andy'),
(14, 'Changas', 'Ingreso', 'Andy'),
(15, 'Intereses', 'Ingreso', 'Andy'),
(18, 'Regalos', 'Ingreso', 'Andy'),
(21, 'Celu', 'Gasto', 'Elliot'),
(22, 'Sueldo', 'Ingreso', 'Elliot'),
(23, 'Freelance', 'Ingreso', 'Elliot'),
(24, 'Youtube', 'Ingreso', 'Elliot'),
(26, 'Comida', 'Gasto', 'Elliot'),
(27, 'Comida', 'Gasto', 'macaco'),
(28, 'Comida Afuera', 'Gasto', 'macaco'),
(29, 'Arreglos Casa', 'Gasto', 'macaco'),
(30, 'Ropa', 'Gasto', 'macaco'),
(31, 'Transporte', 'Gasto', 'macaco'),
(32, 'Telefono', 'Gasto', 'macaco'),
(33, 'Extra', 'Gasto', 'macaco'),
(34, 'Alquiler', 'Gasto', 'macaco'),
(35, 'Salud', 'Gasto', 'macaco'),
(36, 'Impuestos', 'Gasto', 'macaco'),
(37, 'Sueldo', 'Ingreso', 'macaco'),
(38, 'Changas', 'Ingreso', 'macaco'),
(39, 'Intereses', 'Ingreso', 'macaco'),
(40, 'Regalos', 'Ingreso', 'macaco'),
(41, 'Comida', 'Gasto', 'garcia'),
(42, 'Comida Afuera', 'Gasto', 'garcia'),
(43, 'Arreglos Casa', 'Gasto', 'garcia'),
(44, 'Ropa', 'Gasto', 'garcia'),
(45, 'Transporte', 'Gasto', 'garcia'),
(46, 'Telefono', 'Gasto', 'garcia'),
(47, 'Extra', 'Gasto', 'garcia'),
(48, 'Alquiler', 'Gasto', 'garcia'),
(49, 'Salud', 'Gasto', 'garcia'),
(50, 'Impuestos', 'Gasto', 'garcia'),
(51, 'Sueldo', 'Ingreso', 'garcia'),
(52, 'Changas', 'Ingreso', 'garcia'),
(53, 'Intereses', 'Ingreso', 'garcia'),
(54, 'Regalos', 'Ingreso', 'garcia'),
(57, 'Comida', 'Gasto', ''),
(58, 'Comida Afuera', 'Gasto', ''),
(59, 'Arreglos Casa', 'Gasto', ''),
(60, 'Ropa', 'Gasto', ''),
(61, 'Transporte', 'Gasto', ''),
(62, 'Telefono', 'Gasto', ''),
(63, 'Extra', 'Gasto', ''),
(64, 'Alquiler', 'Gasto', ''),
(65, 'Salud', 'Gasto', ''),
(66, 'Impuestos', 'Gasto', ''),
(67, 'Sueldo', 'Ingreso', ''),
(68, 'Changas', 'Ingreso', ''),
(69, 'Intereses', 'Ingreso', ''),
(70, 'Regalos', 'Ingreso', ''),
(71, 'Comida', 'Gasto', ''),
(72, 'Comida Afuera', 'Gasto', ''),
(73, 'Arreglos Casa', 'Gasto', ''),
(74, 'Ropa', 'Gasto', ''),
(75, 'Transporte', 'Gasto', ''),
(76, 'Telefono', 'Gasto', ''),
(77, 'Extra', 'Gasto', ''),
(78, 'Alquiler', 'Gasto', ''),
(79, 'Salud', 'Gasto', ''),
(80, 'Impuestos', 'Gasto', ''),
(81, 'Sueldo', 'Ingreso', ''),
(82, 'Changas', 'Ingreso', ''),
(83, 'Intereses', 'Ingreso', ''),
(84, 'Regalos', 'Ingreso', ''),
(85, 'Comida', 'Gasto', 'macac'),
(86, 'Comida Afuera', 'Gasto', 'macac'),
(87, 'Arreglos Casa', 'Gasto', 'macac'),
(88, 'Ropa', 'Gasto', 'macac'),
(89, 'Transporte', 'Gasto', 'macac'),
(90, 'Telefono', 'Gasto', 'macac'),
(91, 'Extra', 'Gasto', 'macac'),
(92, 'Alquiler', 'Gasto', 'macac'),
(93, 'Salud', 'Gasto', 'macac'),
(94, 'Impuestos', 'Gasto', 'macac'),
(95, 'Sueldo', 'Ingreso', 'macac'),
(96, 'Changas', 'Ingreso', 'macac'),
(97, 'Intereses', 'Ingreso', 'macac'),
(98, 'Regalos', 'Ingreso', 'macac'),
(99, 'Comida', 'Gasto', 'maicol'),
(100, 'Comida Afuera', 'Gasto', 'maicol'),
(101, 'Arreglos Casa', 'Gasto', 'maicol'),
(102, 'Ropa', 'Gasto', 'maicol'),
(103, 'Transporte', 'Gasto', 'maicol'),
(104, 'Telefono', 'Gasto', 'maicol'),
(105, 'Extra', 'Gasto', 'maicol'),
(106, 'Alquiler', 'Gasto', 'maicol'),
(107, 'Salud', 'Gasto', 'maicol'),
(108, 'Impuestos', 'Gasto', 'maicol'),
(109, 'Sueldo', 'Ingreso', 'maicol'),
(110, 'Changas', 'Ingreso', 'maicol'),
(111, 'Intereses', 'Ingreso', 'maicol'),
(112, 'Regalos', 'Ingreso', 'maicol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int NOT NULL,
  `nomCuen` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `totalParcial` float NOT NULL DEFAULT '0',
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `nomCuen`, `totalParcial`, `usuario`) VALUES
(1, 'Nac Dani', -456, 'Andy'),
(2, 'Nac Andy', 0, 'Andy'),
(3, 'Efectivo', 0, 'Andy'),
(4, 'Sant Deb', 0, 'Andy'),
(5, 'Sant Cre', -78.45, 'Andy'),
(6, 'Naranja', 0, 'Andy'),
(7, 'Yac Dani', 0, 'Andy'),
(8, 'Yac Andy', 193.94, 'Andy'),
(12, 'Efectivo', 0, 'Elliot'),
(13, 'Nacion', 0, 'Elliot'),
(14, 'Yac Elliot', 0, 'Elliot'),
(15, 'Sant Deb', 0, 'Elliot'),
(17, 'MercPago', 0, 'Elliot'),
(18, 'Banco', 0, 'macaco'),
(19, 'Sueldo', 0, 'macaco'),
(20, 'Mercado Pago', 0, 'macaco'),
(21, 'Efectivo', 0, 'macaco'),
(22, 'Freelance', 0, 'macaco'),
(23, 'Tarj Cred 1', 0, 'macaco'),
(24, 'Tarj Cred 2', 0, 'macaco'),
(25, 'App de Pagos', 0, 'macaco'),
(26, 'Banco', 0, 'garcia'),
(27, 'Sueldo', 0, 'garcia'),
(28, 'Mercado Pago', 0, 'garcia'),
(29, 'Efectivo', 0, 'garcia'),
(30, 'Freelance', 0, 'garcia'),
(31, 'Tarj Cred 1', 0, 'garcia'),
(32, 'Tarj Cred 2', 0, 'garcia'),
(33, 'App de Pagos', 0, 'garcia'),
(35, 'Banco', 12000, ''),
(36, 'Sueldo', 0, ''),
(37, 'Mercado Pago', 0, ''),
(38, 'Efectivo', 13.22, ''),
(39, 'Freelance', 0, ''),
(40, 'Tarj Cred 1', 0, ''),
(41, 'Tarj Cred 2', 0, ''),
(42, 'App de Pagos', 0, ''),
(43, 'Banco', 12000, ''),
(44, 'Sueldo', 0, ''),
(45, 'Mercado Pago', 0, ''),
(46, 'Efectivo', 23.68, ''),
(47, 'Freelance', 0, ''),
(48, 'Tarj Cred 1', 0, ''),
(49, 'Tarj Cred 2', 0, ''),
(50, 'App de Pagos', 0, ''),
(51, 'Banco', 0, 'macac'),
(52, 'Sueldo', 0, 'macac'),
(53, 'Mercado Pago', 0, 'macac'),
(54, 'Efectivo', 0, 'macac'),
(55, 'Freelance', 0, 'macac'),
(56, 'Tarj Cred 1', 0, 'macac'),
(57, 'Tarj Cred 2', 0, 'macac'),
(58, 'App de Pagos', 0, 'macac'),
(59, 'Banco', 0, 'maicol'),
(60, 'Sueldo', 0, 'maicol'),
(61, 'Mercado Pago', 0, 'maicol'),
(62, 'Efectivo', 0, 'maicol'),
(63, 'Freelance', 0, 'maicol'),
(64, 'Tarj Cred 1', 0, 'maicol'),
(65, 'Tarj Cred 2', 0, 'maicol'),
(66, 'App de Pagos', 0, 'maicol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int NOT NULL,
  `fecha` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `Categoria` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'sin categoria',
  `cuenta` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `detalle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `fecha`, `valor`, `Categoria`, `cuenta`, `detalle`, `usuario`) VALUES
(53, '2021-12-03', '60.42', 'Sueldo', 'Nac Andy', 'Saldo Inicial', 'Andy'),
(54, '2021-12-03', '3000.00', 'Sueldo', 'Yac Dani', 'Saldo Inicial', 'Andy'),
(55, '2021-12-03', '0.00', 'Sueldo', 'Efectivo', 'Saldo Inicial', 'Andy'),
(56, '2021-12-05', '5467.27', 'Sueldo', 'Sant Deb', 'Saldo Inicial', 'Andy'),
(57, '2021-12-06', '-311.46', 'Comida', 'Sant Deb', 'Huevos y Palitos', 'Andy'),
(58, '2021-12-06', '-80.00', 'Extra', 'Sant Deb', 'Lapicera', 'Andy'),
(59, '2021-12-06', '-1189.70', 'Salud', 'Sant Deb', 'Tomate y lechuga', 'Andy'),
(103, '2021-12-16', '12000.00', 'Sueldo', 'Banco', 'ff', 'macac'),
(115, '2022-01-06', '-550.00', 'Comida', 'Efectivo', 'Kanikama', 'Elliot'),
(116, '2022-01-05', '-55.00', 'Comida', 'Efectivo', 'Caramelos', 'Elliot'),
(117, '2021-12-27', '55000.00', 'Sueldo', 'Nacion', 'Saldo Inicial', 'Elliot'),
(118, '2022-01-01', '-350.00', 'Celu', 'Yac Elliot', 'broccoli', 'Elliot'),
(119, '2021-12-27', '-1500.00', 'Celu', 'MercPago', 'Hosting', 'Elliot'),
(120, '2021-11-29', '-499.00', 'Celu', 'Nacion', 'Netflix', 'Elliot'),
(121, '2022-01-12', '-600.00', 'Comida', 'Nacion', 'papas', 'Elliot');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
