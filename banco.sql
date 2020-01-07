-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-01-2020 a las 06:29:14
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `nombres` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `apellidos` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `cedula` varchar(11) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nombres`, `apellidos`, `cedula`) VALUES
('1', 'jose luis', 'sagba pinduisaca', '0604066407'),
('2', 'gabriela', 'vega alarcon', '0604066409'),
('3', 'daniela liseth', 'vera vargas', '06500465789'),
('4', 'johana marcela', 'toledo vega', '0604066405'),
('5', 'luis', 'fernandez lopez', '0683298999');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `idcuenta` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `nombres` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `cliente` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `ncuenta` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `montobase` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `clave` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `estado` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`idcuenta`, `nombres`, `cliente`, `ncuenta`, `montobase`, `clave`, `estado`) VALUES
('c1', 'jose luis', '0604075407', 'NC02', '400', '1234', '1'),
('c2', 'jorge lopez', '0604066409', 'NC03', '900', '1578', '1'),
('c3', 'gabriela vargas', '06500465789', 'NC04', '600', '1984', '1'),
('c4', 'johana marcela', '0604066405', 'NC05', '400', '1983', '1'),
('C5', 'luis patricio', '0683298999', 'NC06', '1000', '2010', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE IF NOT EXISTS `operaciones` (
  `idoperacion` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `ncuentaop` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `monto` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `fecha` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `estado` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`idoperacion`, `ncuentaop`, `tipo`, `monto`, `fecha`, `estado`) VALUES
('op1', 'nc04', 'Deposito', '100', '12/12/2019', '1'),
('op2', 'nc04', 'Retiro', '200', '12/12/2019', '1'),
('op3', 'nc06', 'Retiro', '1000', '12/12/2019', '1'),
('op4', 'NC02', 'Retiro', '100', '10/11/2019', '1'),
('op5', 'nc03', 'Deposito', '100', '06/01/2020', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia`
--

CREATE TABLE IF NOT EXISTS `transferencia` (
  `idtr` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `ncuentatr` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `cuentadestino` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `monto` varchar(6) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idtr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

--
-- Volcar la base de datos para la tabla `transferencia`
--

INSERT INTO `transferencia` (`idtr`, `fecha`, `ncuentatr`, `cuentadestino`, `monto`) VALUES
(13, '', 'NC02', 'c03', '100'),
(15, '', 'NC02', 'nc03', '100'),
(21, '06/01/2020', 'nc02', 'nc04', '300'),
(22, '06/01/2020', 'nc02', 'nc04', '300'),
(23, '06/01/2020', 'nc04', 'nc02', '100');
