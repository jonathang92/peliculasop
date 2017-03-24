-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2016 a las 06:40:09
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gamestart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `id_cuenta` varchar(15) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `nombre`, `tipo`) VALUES
('1-0-0-00-000', 'Activo', 'real'),
('1-1-0-00-000', 'circulante o corriente', ''),
('1-1-1-00-000', 'caja', 'real'),
('1-1-2-00-000', 'banco', ''),
('1-1-3-00-000', 'cartera de valores (temporal)', 'real'),
('1-1-4-00-000', 'exigible', 'real'),
('1-1-4-01-000', 'efectos por cobrar', ''),
('1-1-4-02-000', 'cuentas por cobrar', 'real'),
('1-1-5-00-000', 'inventario', ''),
('1-1-6-00-000', 'mercancía en transito', 'real'),
('1-1-7-00-000', 'seguros pagados por anticipado', ''),
('1-1-8-00-000', 'intereses pagados por anticipado', ''),
('1-1-9-00-000', 'Impuestos pagados por anticipado', ''),
('1-2-0-00-000', 'cuentas y efectos por cobrar a largo plazo', ''),
('1-3-0-00-000', 'inversiones a largo plazo', ''),
('1-3-1-00-000', 'cartera de valores (largo plazo)', ''),
('1-3-2-00-000', 'edificios', ''),
('1-3-3-00-000', 'terrenos', ''),
('1-4-0-00-000', 'fijo o inmovilizado', ''),
('1-4-1-00-000', 'sujetos a depreciacion', ''),
('1-4-1-01-000', 'edificios', ''),
('1-4-1-02-000', 'maquinaria', ''),
('1-4-1-03-000', 'equipos', ''),
('1-4-1-04-000', 'instalaciones', ''),
('1-4-2-00-000', 'no sujeto a depreciacion', ''),
('1-4-2-01-000', 'terrenos', ''),
('1-5-0-00-000', 'intangible', ''),
('1-5-1-00-000', 'patentes', ''),
('1-5-2-00-000', 'marcas de fabrica', ''),
('1-5-3-00-000', 'fondos de comercio', ''),
('1-6-0-00-000', 'cargos diferidos', ''),
('1-6-1-00-000', 'gastos de constitucion', ''),
('1-6-2-00-000', 'gastos de desarrollo', ''),
('1-6-3-00-000', 'gastos de explotacion', ''),
('1-7-0-00-000', 'otros activos', ''),
('1-7-1-00-000', 'fondos para pensiones, jubilaciones, etc', ''),
('1-7-2-00-000', 'fondos para garantías y bloqueados', ''),
('1-7-3-00-000', 'fondos para usos determinados e indeterminados', ''),
('2-0-0-00-000', 'Pasivos', ''),
('2-1-0-00-000', 'Circulante', ''),
('2-1-1-00-000', 'Pagares', ''),
('2-1-2-00-000', 'efectos por pagar', ''),
('2-1-3-00-000', 'cuentas por pagar', ''),
('2-1-4-00-000', 'impuestos por pagar', ''),
('2-1-5-00-000', 'gastos acumulados por pagar', ''),
('2-1-6-00-000', 'saldos acreedores de cuentas por pagar', ''),
('2-2-0-00-000', 'a largo plazo', ''),
('2-2-1-00-000', 'emprestitos', ''),
('2-2-2-00-000', 'Hipotecas', ''),
('2-2-3-00-000', 'efectos por pagar', ''),
('2-2-4-00-000', 'efectos por pagar', ''),
('2-3-0-00-000', 'apartados', ''),
('2-3-1-00-000', 'apartados prestaciones sociales', ''),
('2-3-2-00-000', 'apartados litigios pendientes', ''),
('2-3-3-00-000', 'apartados para indemnizaciones ', ''),
('2-4-0-00-000', 'creditos diferidos', ''),
('2-4-1-00-000', 'ingresos diferidos', ''),
('2-4-2-00-000', 'intereses cobrados por anticipado', ''),
('2-4-3-00-000', 'alquileres cobrados por anticipado', ''),
('2-5-0-00-000', 'otros pasivos', ''),
('2-5-1-00-000', 'utilidades empleados no reclamados', ''),
('2-5-2-00-000', 'depósitos recibidos en garantia', ''),
('3-0-0-00-000', 'Cuentas de orden', ''),
('3-1-0-00-000', 'depositantes de mercancía en consignacion', ''),
('3-2-0-00-000', 'giros al cobro en banco', ''),
('4-0-0-00-000', 'Patrimonio', ''),
('4-1-0-00-000', 'Capital Social', ''),
('4-2-0-00-000', 'Superavit', ''),
('4-3-0-00-000', 'Reservas', ''),
('5-0-0-00-000', 'Cuentas nominales', ''),
('5-1-0-00-000', 'ingresos', ''),
('5-2-0-00-000', 'gastos', ''),
('5-3-0-00-000', 'costos de ventas', ''),
('5-4-0-00-000', 'costos de produccion', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` int(5) NOT NULL,
  `id_cuenta` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `id_cuenta`, `nombre`, `tipo`) VALUES
(1, '1-0-0-00-000', 'Activo', 'real'),
(2, '1-1-0-00-000', 'circulante o corriente', 'nominal'),
(3, '1-1-1-00-000', 'caja', 'nominal'),
(4, '1-1-2-00-000', 'banco', 'real'),
(5, '1-1-3-00-000', 'cartera de valores (temporal)', 'real'),
(6, '1-1-4-00-000', 'exigible', 'nominal'),
(7, '1-1-4-01-000', 'efectos por cobrar', 'nominal'),
(8, '1-1-4-02-000', 'cuentas por cobrar', 'real'),
(9, '1-1-5-00-000', 'inventario', ''),
(10, '1-1-6-00-000', 'mercancia en transito', ''),
(11, '1-1-7-00-000', 'seguros pagados por anticipado', ''),
(12, '1-1-8-00-000', 'intereses pagados por anticipado', ''),
(13, '1-1-9-00-000', 'Impuestos pagados por anticipado', ''),
(14, '1-2-0-00-000', 'cuentas y efectos por cobrar a largo plazo', ''),
(15, '1-3-0-00-000', 'inversiones a largo plazo', ''),
(16, '1-3-1-00-000', 'cartera de valores (largo plazo)', ''),
(17, '1-3-2-00-000', 'edificios', ''),
(18, '1-3-3-00-000', 'terrenos', ''),
(19, '1-4-0-00-000', 'fijo o inmovilizado', ''),
(20, '1-4-1-00-000', 'sujetos a depreciacion', ''),
(21, '1-4-1-01-000', 'edificios', ''),
(22, '1-4-1-02-000', 'maquinaria', ''),
(23, '1-4-1-03-000', 'equipos', ''),
(24, '1-4-1-04-000', 'instalaciones', ''),
(25, '1-4-2-00-000', 'no sujeto a depreciacion', ''),
(26, '1-4-2-01-000', 'terrenos', ''),
(27, '1-5-0-00-000', 'intangible', ''),
(28, '1-5-1-00-000', 'patentes', ''),
(29, '1-5-2-00-000', 'marcas de fabrica', ''),
(30, '1-5-3-00-000', 'fondos de comercio', ''),
(31, '1-6-0-00-000', 'cargos diferidos', ''),
(32, '1-6-1-00-000', 'gastos de constitucion', ''),
(33, '1-6-2-00-000', 'gastos de desarrollo', ''),
(34, '1-6-3-00-000', 'gastos de explotacion', ''),
(35, '1-7-0-00-000', 'otros activos', ''),
(36, '1-7-1-00-000', 'fondos para pensiones, jubilaciones, etc', ''),
(37, '1-7-2-00-000', 'fondos para garantías y bloqueados', ''),
(38, '1-7-3-00-000', 'fondos para usos determinados e indeterminados', ''),
(39, '2-0-0-00-000', 'Pasivos', ''),
(40, '2-1-0-00-000', 'Circulante', ''),
(41, '2-1-1-00-000', 'Pagares', ''),
(42, '2-1-2-00-000', 'efectos por pagar', ''),
(43, '2-1-3-00-000', 'cuentas por pagar', ''),
(44, '2-1-4-00-000', 'impuestos por pagar', ''),
(45, '2-1-5-00-000', 'gastos acumulados por pagar', ''),
(46, '2-1-6-00-000', 'saldos acreedores de cuentas por pagar', ''),
(47, '2-2-0-00-000', 'a largo plazo', ''),
(48, '2-2-1-00-000', 'emprestitos', ''),
(49, '2-2-2-00-000', 'Hipotecas', ''),
(50, '2-2-3-00-000', 'efectos por pagar', ''),
(51, '2-2-4-00-000', 'efectos por pagar', ''),
(52, '2-3-0-00-000', 'apartados', ''),
(53, '2-3-1-00-000', 'apartados prestaciones sociales', ''),
(54, '2-3-2-00-000', 'apartados litigios pendientes', ''),
(55, '2-3-3-00-000', 'apartados para indemnizaciones ', ''),
(56, '2-4-0-00-000', 'creditos diferidos', ''),
(57, '2-4-1-00-000', 'ingresos diferidos', ''),
(58, '2-4-2-00-000', 'intereses cobrados por anticipado', ''),
(59, '2-4-3-00-000', 'alquileres cobrados por anticipado', ''),
(60, '2-5-0-00-000', 'otros pasivos', ''),
(61, '2-5-1-00-000', 'utilidades empleados no reclamados', ''),
(62, '2-5-2-00-000', 'depósitos recibidos en garantia', ''),
(63, '3-0-0-00-000', 'Cuentas de orden', ''),
(64, '3-1-0-00-000', 'depositantes de mercancía en consignacion', ''),
(65, '3-2-0-00-000', 'giros al cobro en banco', ''),
(66, '4-0-0-00-000', 'Patrimonio', ''),
(67, '4-1-0-00-000', 'Capital Social', ''),
(68, '4-2-0-00-000', 'Superavit', ''),
(69, '4-3-0-00-000', 'Reservas', ''),
(70, '5-0-0-00-000', 'Cuentas nominales', ''),
(71, '5-1-0-00-000', 'ingresos', ''),
(72, '5-2-0-00-000', 'gastos', ''),
(73, '5-3-0-00-000', 'costos de ventas', ''),
(74, '5-4-0-00-000', 'costos de produccion', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza`
--

CREATE TABLE IF NOT EXISTS `poliza` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `id_cuenta` varchar(15) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `hecho` varchar(30) NOT NULL,
  `autorizado` varchar(30) NOT NULL,
  `revisado` varchar(30) NOT NULL,
  `aumenta_por` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `poliza`
--

INSERT INTO `poliza` (`id`, `id_tipo`, `numero`, `fecha`, `concepto`, `id_cuenta`, `monto`, `total`, `hecho`, `autorizado`, `revisado`, `aumenta_por`) VALUES
(1, 4, 1, '2016-07-19', 'Concepto', '1', '10000', '0', 'Aly', 'Aly', 'Michelle', 'debe'),
(2, 4, 1, '2016-07-19', 'Concepto', '3', '10000', '0', 'Aly', 'Aly', 'Michelle', 'haber'),
(3, 4, 1, '2016-07-19', 'Concepto1', '5', '20000', '0', 'Aly', 'Osmar', 'Aly', 'debe'),
(4, 4, 1, '2016-07-19', 'Concepto1', '6', '20000', '0', 'Aly', 'Osmar', 'Aly', 'haber'),
(5, 4, 2, '2016-07-20', 'Concepto', '2', '15000', '0', 'Aly', 'Osmar', 'Aly', 'debe'),
(6, 4, 2, '2016-07-20', 'Concepto', '5', '15000', '0', 'Aly', 'Osmar', 'Aly', 'haber'),
(18, 2, 1, '2016-07-23', 'algo de cheque', '3', '50000', '0', 'Osmar', 'Michelle', 'Aly', 'debe'),
(19, 2, 1, '2016-07-23', 'algo de cheque', '5', '50000', '0', 'Osmar', 'Michelle', 'Aly', 'haber'),
(25, 3, 1, '2016-07-25', 'Cheque!', '4', '15000', '0', 'Aly', 'Osmar', 'Michelle', 'debe'),
(26, 3, 1, '2016-07-25', 'Cheque!', '4', '15000', '0', 'Aly', 'Osmar', 'Michelle', 'haber'),
(33, 2, 2, '2016-07-25', 'vaina de cheque', '4', '15000', '0', 'Osmar', 'Aly', 'Michelle', 'debe'),
(34, 2, 2, '2016-07-25', 'vaina de cheque', '4', '15000', '0', 'Osmar', 'Aly', 'Michelle', 'haber');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre`) VALUES
(1, 'Diario'),
(2, 'Cheque'),
(3, 'Egresos'),
(4, 'Ingresos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `poliza`
--
ALTER TABLE `poliza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `poliza`
--
ALTER TABLE `poliza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
