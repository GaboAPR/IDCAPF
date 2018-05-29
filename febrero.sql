-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2018 a las 17:56:43
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `febrero`
--
CREATE DATABASE IF NOT EXISTS `febrero` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `febrero`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
  `cod_aud` int(11) NOT NULL AUTO_INCREMENT,
  `fec_aud` datetime NOT NULL,
  `ip_aud` varchar(15) NOT NULL,
  `fky_usuario` int(11) NOT NULL,
  `fky_opcion` int(11) NOT NULL,
  `sql_aud` text NOT NULL,
  `id_aud` int(11) NOT NULL,
  PRIMARY KEY (`cod_aud`),
  KEY `fky_usuario` (`fky_usuario`),
  KEY `fky_opcion` (`fky_opcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`cod_aud`, `fec_aud`, `ip_aud`, `fky_usuario`, `fky_opcion`, `sql_aud`, `id_aud`) VALUES
(1, '2018-04-06 14:47:16', '127.0.0.1', 1, 1, 'insert', 2),
(2, '2018-04-09 12:56:57', '127.0.0.1', 1, 1, 'insert', 2),
(3, '2018-04-09 14:51:58', '127.0.0.1', 1, 1, 'insert', 2),
(4, '2018-04-09 14:58:46', '127.0.0.1', 1, 1, 'insert', 3),
(5, '2018-04-11 14:36:03', '127.0.0.1', 1, 1, 'insert', 3),
(6, '2018-04-11 14:37:55', '127.0.0.1', 1, 1, 'insert', 4),
(7, '2018-04-11 14:38:42', '127.0.0.1', 1, 1, 'insert', 5),
(8, '2018-04-11 14:39:23', '127.0.0.1', 1, 1, 'insert', 6),
(9, '2018-04-11 02:41:38', '127.0.0.1', 1, 1, 'insert', 3),
(10, '2018-04-11 14:42:24', '127.0.0.1', 1, 1, 'insert', 7),
(11, '2018-04-11 14:43:03', '127.0.0.1', 1, 1, 'insert', 8),
(12, '2018-04-11 14:43:26', '127.0.0.1', 1, 1, 'insert', 9),
(13, '2018-04-11 14:45:18', '127.0.0.1', 1, 1, 'insert', 10),
(14, '2018-04-11 02:45:37', '127.0.0.1', 1, 1, 'insert', 4),
(15, '2018-04-11 14:46:06', '127.0.0.1', 1, 1, 'insert', 11),
(16, '2018-04-11 14:46:25', '127.0.0.1', 1, 1, 'insert', 12),
(17, '2018-04-11 14:46:50', '127.0.0.1', 1, 1, 'insert', 13),
(18, '2018-04-11 14:47:14', '127.0.0.1', 1, 1, 'insert', 14),
(19, '2018-04-11 02:47:42', '127.0.0.1', 1, 1, 'insert', 5),
(20, '2018-04-11 14:48:04', '127.0.0.1', 1, 1, 'insert', 15),
(21, '2018-04-11 14:48:30', '127.0.0.1', 1, 1, 'insert', 16),
(22, '2018-04-11 14:48:56', '127.0.0.1', 1, 1, 'insert', 17),
(23, '2018-04-11 02:50:15', '127.0.0.1', 1, 1, 'insert', 6),
(24, '2018-04-11 14:50:43', '127.0.0.1', 1, 1, 'insert', 18),
(25, '2018-04-11 14:51:23', '127.0.0.1', 1, 1, 'insert', 19),
(26, '2018-04-11 14:52:50', '127.0.0.1', 1, 1, 'insert', 20),
(27, '2018-04-11 14:53:09', '127.0.0.1', 1, 1, 'insert', 21),
(28, '2018-04-11 02:54:32', '127.0.0.1', 1, 1, 'insert', 7),
(29, '2018-04-11 14:54:54', '127.0.0.1', 1, 1, 'insert', 22),
(30, '2018-04-11 14:55:16', '127.0.0.1', 1, 1, 'insert', 23),
(31, '2018-04-11 14:56:01', '127.0.0.1', 1, 1, 'insert', 24),
(32, '2018-04-11 14:57:21', '127.0.0.1', 1, 1, 'insert', 25),
(33, '2018-04-11 14:57:45', '127.0.0.1', 1, 1, 'insert', 26),
(34, '2018-04-11 02:58:19', '127.0.0.1', 1, 1, 'insert', 8),
(35, '2018-04-11 14:58:42', '127.0.0.1', 1, 1, 'insert', 27),
(36, '2018-04-11 14:59:05', '127.0.0.1', 1, 1, 'insert', 28),
(37, '2018-04-11 14:59:22', '127.0.0.1', 1, 1, 'insert', 29),
(38, '2018-04-11 15:00:04', '127.0.0.1', 1, 1, 'insert', 30),
(39, '2018-04-11 03:01:15', '127.0.0.1', 1, 1, 'insert', 9),
(40, '2018-04-11 15:02:03', '127.0.0.1', 1, 1, 'insert', 31),
(41, '2018-04-11 15:02:52', '127.0.0.1', 1, 1, 'insert', 32),
(42, '2018-04-11 03:05:08', '127.0.0.1', 1, 1, 'insert', 10),
(43, '2018-04-11 15:06:37', '127.0.0.1', 1, 1, 'insert', 33),
(44, '2018-04-11 15:07:19', '127.0.0.1', 1, 1, 'insert', 34),
(45, '2018-04-11 15:08:35', '127.0.0.1', 1, 1, 'insert', 35),
(46, '2018-04-20 12:36:43', '127.0.0.1', 1, 1, 'insert', 11),
(47, '2018-04-20 12:39:08', '127.0.0.1', 1, 1, 'insert', 36),
(48, '2018-05-28 15:29:49', '127.0.0.1', 1, 1, 'insert', 37),
(49, '2018-05-28 03:31:48', '127.0.0.1', 1, 1, 'insert', 12),
(50, '2018-05-28 15:33:06', '127.0.0.1', 1, 1, 'insert', 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `cod_ban` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ban` varchar(35) NOT NULL,
  `est_ban` char(1) NOT NULL,
  PRIMARY KEY (`cod_ban`),
  UNIQUE KEY `nom_ban` (`nom_ban`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`cod_ban`, `nom_ban`, `est_ban`) VALUES
(1, 'BBVA BANCOMER.', 'A'),
(3, 'BANAMEX', 'A'),
(4, 'SANTANDER', 'A'),
(5, 'SCOTIABANK', 'A'),
(6, 'BANCO DEL BAJIO', 'A'),
(7, 'BANCO HSBC', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `cod_ciu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ciu` varchar(35) NOT NULL,
  `fky_estado` int(11) NOT NULL,
  `est_ciu` char(1) NOT NULL,
  PRIMARY KEY (`cod_ciu`),
  KEY `fky_estado` (`fky_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`cod_ciu`, `nom_ciu`, `fky_estado`, `est_ciu`) VALUES
(1, 'Aguascalientes', 1, 'A'),
(2, 'Ensenada', 2, 'A'),
(3, 'La Paz', 3, 'A'),
(4, 'Campeche', 4, 'A'),
(5, 'Tapachula', 5, 'A'),
(6, 'JuÃ¡rez', 6, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cod_cli` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_cli` varchar(15) NOT NULL,
  `com_cli` varchar(80) NOT NULL,
  `raz_cli` varchar(80) NOT NULL,
  `ref_cli` varchar(20) NOT NULL,
  `cue_cli` varchar(20) NOT NULL,
  `fil_cli` varchar(35) NOT NULL,
  `dep_cli` varchar(20) NOT NULL,
  `re1_cli` varchar(25) NOT NULL,
  `te1_cli` varchar(15) NOT NULL,
  `di1_cli` varchar(80) NOT NULL,
  `em1_cli` varchar(80) NOT NULL,
  `re2_cli` varchar(25) DEFAULT NULL,
  `te2_cli` varchar(15) DEFAULT NULL,
  `di2_cli` varchar(80) DEFAULT NULL,
  `em2_cli` varchar(80) DEFAULT NULL,
  `re3_cli` varchar(25) DEFAULT NULL,
  `te3_cli` varchar(15) DEFAULT NULL,
  `di3_cli` varchar(80) DEFAULT NULL,
  `em3_cli` varchar(80) NOT NULL,
  `cre_cli` float NOT NULL,
  `dia_cli` int(11) NOT NULL,
  `pag_cli` date NOT NULL,
  `pdf_cli` text NOT NULL,
  `est_cli` char(1) NOT NULL,
  PRIMARY KEY (`cod_cli`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cli`, `rfc_cli`, `com_cli`, `raz_cli`, `ref_cli`, `cue_cli`, `fil_cli`, `dep_cli`, `re1_cli`, `te1_cli`, `di1_cli`, `em1_cli`, `re2_cli`, `te2_cli`, `di2_cli`, `em2_cli`, `re3_cli`, `te3_cli`, `di3_cli`, `em3_cli`, `cre_cli`, `dia_cli`, `pag_cli`, `pdf_cli`, `est_cli`) VALUES
(1, 'J091223071', 'Farmatodo.', '', '9981726312', '814712', '.', '.', 'Dario PeÃ±aranda', '98271233', 'Distrito Federal', 'dario@gmail.com', 'Carlos Buitrago', '98712451', 'Guadalajara', 'carlos@gmail.com', 'Hernan Crespo', '9875423', 'Nuevo Leon', 'Hernanc@gmail.com', 0, 15, '2018-05-21', '', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `cod_emp` int(11) NOT NULL AUTO_INCREMENT,
  `dni_emp` varchar(10) NOT NULL,
  `nom_emp` varchar(25) NOT NULL,
  `ape_emp` varchar(25) NOT NULL,
  `sex_emp` char(1) NOT NULL,
  `te1_emp` varchar(15) NOT NULL,
  `te2_emp` varchar(15) DEFAULT NULL,
  `ema_emp` varchar(80) NOT NULL,
  `est_emp` char(1) NOT NULL,
  PRIMARY KEY (`cod_emp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cod_emp`, `dni_emp`, `nom_emp`, `ape_emp`, `sex_emp`, `te1_emp`, `te2_emp`, `ema_emp`, `est_emp`) VALUES
(1, 'V-24743077', 'Gabriel Alejandro.', 'Paredes Rojas', 'M', '04247711289', '02763913305', 'gabalej091194@gmail.com', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `cod_est` int(11) NOT NULL AUTO_INCREMENT,
  `nom_est` varchar(35) NOT NULL,
  `est_est` char(1) NOT NULL,
  PRIMARY KEY (`cod_est`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`cod_est`, `nom_est`, `est_est`) VALUES
(1, 'Aguascalientes', 'A'),
(2, 'Baja California', 'A'),
(3, 'Baja California Sur', 'A'),
(4, 'Campeche', 'A'),
(5, 'Chiapas', 'A'),
(6, 'Chihuahua', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `cod_mar` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mar` varchar(25) NOT NULL,
  `est_mar` char(1) NOT NULL,
  PRIMARY KEY (`cod_mar`),
  UNIQUE KEY `nom_mar` (`nom_mar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`cod_mar`, `nom_mar`, `est_mar`) VALUES
(1, 'Chevrolet.', 'A'),
(2, 'Toyota', 'A'),
(3, 'Ford', 'A'),
(4, 'Kia', 'A'),
(5, 'Volvo', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `cod_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(35) NOT NULL,
  `fky_marca` int(11) NOT NULL,
  `est_mod` char(1) NOT NULL,
  PRIMARY KEY (`cod_mod`),
  KEY `fky_marca` (`fky_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`cod_mod`, `nom_mod`, `fky_marca`, `est_mod`) VALUES
(1, 'Aveo LT', 1, 'A'),
(2, 'Ka', 3, 'A'),
(3, 'Corolla', 2, 'A'),
(4, 'Corsa', 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `cod_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(25) NOT NULL,
  `url_mod` varchar(50) NOT NULL,
  `est_mod` char(1) NOT NULL,
  PRIMARY KEY (`cod_mod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`cod_mod`, `nom_mod`, `url_mod`, `est_mod`) VALUES
(1, 'Rol', 'frontend/pantalla/rol', 'A'),
(6, 'Rol', 'frontend/pantalla/rol', 'A'),
(7, 'MÃ³dulo', 'frontend/pantalla/modulo', 'A'),
(8, 'OpciÃ³n', 'frontend/pantalla/opcion', 'A'),
(9, 'Usuario', 'frontend/pantalla/usuario', 'A'),
(10, 'Permiso', 'frontend/pantalla/permiso', 'A'),
(12, 'Banco', 'frontend/pantalla/banco', 'A'),
(13, 'Estado', 'frontend/pantalla/estado', 'A'),
(15, 'Ciudad', 'frontend/pantalla/ciudad', 'A'),
(16, 'Empleado', 'frontend/pantalla/empleado', 'A'),
(17, 'Marca', 'frontend/pantalla/marca', 'A'),
(18, 'Taller', 'frontend/pantalla/taller', 'A'),
(19, 'Cliente', 'frontend/pantalla/cliente', 'A'),
(20, 'Modelo', 'frontend/pantalla/modelo', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE IF NOT EXISTS `opcion` (
  `cod_opc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_opc` varchar(25) NOT NULL,
  `fky_modulo` int(11) NOT NULL,
  `url_opc` varchar(50) NOT NULL,
  `est_opc` char(1) NOT NULL,
  PRIMARY KEY (`cod_opc`),
  KEY `fky_modulo` (`fky_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`cod_opc`, `nom_opc`, `fky_modulo`, `url_opc`, `est_opc`) VALUES
(1, 'Agregar Rol', 1, 'agregar_rol.php', 'A'),
(20, 'Listar Rol', 1, 'listar_rol.php', 'A'),
(22, 'Agregar MÃ³dulo', 7, 'agregar_modulo.php', 'A'),
(27, 'Agregar OpciÃ³n', 8, 'agregar_opcion.php', 'A'),
(31, 'Agregar Usuario', 9, 'agregar_usuario.php', 'A'),
(32, 'Modificar Usuario', 9, 'listar_usuario.php', 'A'),
(35, 'Asignar Permisos', 10, 'filtrar_usuario.php', 'A'),
(37, 'Listar MÃ³dulos', 7, 'listar_modulo.php', 'A'),
(38, 'Agregar Banco', 12, 'agregar_banco.php', 'A'),
(39, 'Listar Banco', 12, 'listar_banco.php', 'A'),
(41, 'Listar Estado', 13, 'filtrar_estado.php', 'A'),
(42, 'Agregar Estado', 13, 'agregar_estado.php', 'A'),
(43, 'Agregar Ciudad', 15, 'agregar_ciudad.php', 'A'),
(44, 'Listar Ciudad', 15, 'filtrar_ciudad.php', 'A'),
(45, 'Agregar Empleado', 16, 'agregar_empleado.php', 'A'),
(46, 'Listar Empleado', 16, 'filtrar_empleado.php', 'A'),
(47, 'Agregar Marca', 17, 'agregar_marca.php', 'A'),
(48, 'Listar Marca', 17, 'filtrar_marca.php', 'A'),
(49, 'Agregar Taller', 18, 'agregar_taller.php', 'A'),
(50, 'Listar Taller', 18, 'filtrar_taller.php', 'A'),
(51, 'Agregar Cliente', 19, 'agregar_cliente.php', 'A'),
(52, 'Listar Cliente', 19, 'filtrar_cliente.php', 'A'),
(53, 'Listar Modelo', 20, 'filtrar_modelo.php', 'A'),
(54, 'Agregar Modelo', 20, 'agregar_modelo.php', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `cod_per` int(11) NOT NULL AUTO_INCREMENT,
  `fky_usuario` int(11) NOT NULL,
  `fky_opcion` int(11) NOT NULL,
  `est_per` char(1) NOT NULL,
  PRIMARY KEY (`cod_per`),
  UNIQUE KEY `fky_usuario` (`fky_usuario`,`fky_opcion`),
  KEY `fky_opcion` (`fky_opcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`cod_per`, `fky_usuario`, `fky_opcion`, `est_per`) VALUES
(10, 1, 22, 'A'),
(14, 1, 20, 'A'),
(16, 1, 32, 'A'),
(17, 1, 31, 'A'),
(22, 1, 27, 'A'),
(23, 1, 35, 'A'),
(32, 1, 1, 'A'),
(33, 1, 37, 'A'),
(34, 1, 38, 'A'),
(35, 1, 39, 'A'),
(36, 1, 41, 'A'),
(37, 1, 42, 'A'),
(38, 1, 43, 'A'),
(39, 1, 44, 'A'),
(40, 1, 45, 'A'),
(41, 1, 46, 'A'),
(42, 1, 47, 'A'),
(43, 1, 48, 'A'),
(44, 1, 49, 'A'),
(45, 1, 50, 'A'),
(46, 1, 51, 'A'),
(47, 1, 52, 'A'),
(48, 1, 53, 'A'),
(49, 1, 54, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `cod_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rol` varchar(25) NOT NULL,
  `est_rol` char(1) NOT NULL,
  PRIMARY KEY (`cod_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `nom_rol`, `est_rol`) VALUES
(1, 'Administrador', 'A'),
(2, 'Operador', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE IF NOT EXISTS `taller` (
  `cod_tal` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tal` varchar(50) NOT NULL,
  `ubi_tal` varchar(50) NOT NULL,
  `te1_tal` varchar(15) NOT NULL,
  `te2_tal` varchar(15) DEFAULT NULL,
  `res_tal` varchar(50) NOT NULL,
  `ema_tal` varchar(80) NOT NULL,
  `fky_banco` int(11) NOT NULL,
  `cue_tal` varchar(20) NOT NULL,
  `tip_tal` char(1) NOT NULL,
  `fky_ciudad` int(11) NOT NULL,
  `est_tal` char(1) NOT NULL,
  PRIMARY KEY (`cod_tal`),
  KEY `fky_banco` (`fky_banco`),
  KEY `fky_ciudad` (`fky_ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`cod_tal`, `nom_tal`, `ubi_tal`, `te1_tal`, `te2_tal`, `res_tal`, `ema_tal`, `fky_banco`, `cue_tal`, `tip_tal`, `fky_ciudad`, `est_tal`) VALUES
(1, 'Multiservicios Parras', 'Barrio Obrero carrera 22', '04147824321', '02763561643', 'Pedro Parra', 'pedro.parra82@gmail.com', 1, '0182391723', 'G', 5, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `ema_usu` varchar(60) NOT NULL,
  `cla_usu` varchar(32) NOT NULL,
  `reg_usu` datetime NOT NULL,
  `nom_usu` varchar(25) NOT NULL,
  `ape_usu` varchar(25) NOT NULL,
  `fky_rol` int(11) NOT NULL,
  `est_usu` char(1) NOT NULL,
  PRIMARY KEY (`cod_usu`),
  KEY `fky_rol` (`fky_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `ema_usu`, `cla_usu`, `reg_usu`, `nom_usu`, `ape_usu`, `fky_rol`, `est_usu`) VALUES
(1, 'bennysrugo@platinumfleet.com.mx', '827ccb0eea8a706c4c34a16891f84e7b', '2018-04-04 11:31:00', 'Platinium', 'Fleet', 1, 'A'),
(2, 'jose.varela@hotmail.com', '12345', '2018-04-09 14:51:58', 'Jose', 'Varela', 2, 'A'),
(3, 'gabalej091194@gmail.com', 'b89d2b4ccd998271d270f33a17db25c6', '2018-04-09 14:58:46', 'Gabriel', 'Paredes', 2, 'A');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`fky_usuario`) REFERENCES `usuario` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `auditoria_ibfk_2` FOREIGN KEY (`fky_opcion`) REFERENCES `opcion` (`cod_opc`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`fky_estado`) REFERENCES `estado` (`cod_est`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`fky_marca`) REFERENCES `marca` (`cod_mar`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD CONSTRAINT `opcion_ibfk_1` FOREIGN KEY (`fky_modulo`) REFERENCES `modulo` (`cod_mod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`fky_usuario`) REFERENCES `usuario` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`fky_opcion`) REFERENCES `opcion` (`cod_opc`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `taller`
--
ALTER TABLE `taller`
  ADD CONSTRAINT `taller_ibfk_1` FOREIGN KEY (`fky_banco`) REFERENCES `banco` (`cod_ban`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taller_ibfk_2` FOREIGN KEY (`fky_ciudad`) REFERENCES `ciudad` (`cod_ciu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fky_rol`) REFERENCES `rol` (`cod_rol`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
