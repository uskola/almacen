-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2014 a las 15:58:18
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `catcodigo` int(10) unsigned NOT NULL,
  `catnombre` varchar(45) NOT NULL,
  PRIMARY KEY (`catcodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`catcodigo`, `catnombre`) VALUES
(1, 'Ordenadores'),
(2, 'Impresoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `clicodigo` decimal(10,0) NOT NULL DEFAULT '0',
  `clinombre` char(11) NOT NULL DEFAULT '',
  `clirepresentante` char(11) DEFAULT NULL,
  `clifecha` datetime DEFAULT NULL,
  `clifechamod` date NOT NULL,
  `cliusuario` char(12) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`clicodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clicodigo`, `clinombre`, `clirepresentante`, `clifecha`, `clifechamod`, `cliusuario`) VALUES
('1', 'FUTURE', 'Julio', '2014-05-21 00:00:00', '0000-00-00', ''),
('2', 'SERMICRO', 'Eduardo', '2014-05-21 00:00:00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `procodigo` decimal(10,0) NOT NULL DEFAULT '0',
  `pronombre` text CHARACTER SET latin1 NOT NULL,
  `proprecioventa` decimal(10,0) DEFAULT '0',
  `procostoactual` decimal(10,0) DEFAULT '0',
  `proexistencia` decimal(10,0) DEFAULT '0',
  `proobservaciones` char(100) CHARACTER SET latin1 DEFAULT NULL,
  `proimagen` char(255) CHARACTER SET latin1 DEFAULT NULL,
  `procategoria` int(10) unsigned NOT NULL,
  `profechamod` datetime DEFAULT NULL COMMENT 'Fecha de modificacion',
  `profecha` date DEFAULT NULL COMMENT 'Fecha en la que se ingreso el producto',
  `prousuario` char(12) DEFAULT NULL,
  PRIMARY KEY (`procodigo`),
  KEY `FK_productos_1` (`procategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`procodigo`, `pronombre`, `proprecioventa`, `procostoactual`, `proexistencia`, `proobservaciones`, `proimagen`, `procategoria`, `profechamod`, `profecha`, `prousuario`) VALUES
('1', 'Acer Aspire 5678', '500', '400', '5', '', NULL, 1, NULL, '2014-05-21', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usrlogin` char(12) NOT NULL,
  `usrclave` char(50) NOT NULL DEFAULT '',
  `usrnombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`usrlogin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usrlogin`, `usrclave`, `usrnombre`) VALUES
('admin', 'admin', 'Daniel Perez');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_productos_1` FOREIGN KEY (`procategoria`) REFERENCES `categorias` (`catcodigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
