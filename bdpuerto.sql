-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.10-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para dbpermisos
CREATE DATABASE IF NOT EXISTS `dbpermisos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbpermisos`;


-- Volcando estructura para procedimiento dbpermisos.buscar_cargo
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_cargo`(dato VARCHAR (250))
select * from cargo where nombre = dato//
DELIMITER ;


-- Volcando estructura para procedimiento dbpermisos.buscar_departamento
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_departamento`(dato VARCHAR (250))
select * from departamento where nombre = dato//
DELIMITER ;


-- Volcando estructura para tabla dbpermisos.cargo
CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `estado` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.cargo: ~35 rows (aproximadamente)
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
REPLACE INTO `cargo` (`id`, `nombre`, `descripcion`, `estado`) VALUES
	(1, 'Trabajador', 'se', '0'),
	(2, 'altar', 'NO TODAY', '0'),
	(3, 'Abogado', 'werw', '0'),
	(4, 'Koi', 'probar', '0'),
	(5, 'PROCESO', 'Sistema', '0'),
	(6, 'Secretaria', 'Si today', '0'),
	(7, 'camaleon', 'sdsd', '0'),
	(8, 'xmen', 'dssd', '0'),
	(9, 'Trabajador', 'opop', '0'),
	(10, 'Trabajador', 'oppopo', '0'),
	(11, 'Trabajador', 'dfdfddfgdf', '0'),
	(12, 'Trabajador', 'ppoop', '0'),
	(13, 'ROBOT', 'SDDS', '0'),
	(14, 'v', 'fg', '0'),
	(20, 'qwerty', 'n', '0'),
	(21, 'df', 'df', '0'),
	(24, 'kokook', 'okokoko', '0'),
	(25, 'pepe', 'sdsdds', '0'),
	(26, 'pelado', 'sd', '0'),
	(27, 'pirulino', 'anaiz', '0'),
	(28, 'pirulino', 'haver', '0'),
	(29, 'willina', 'sd', '0'),
	(30, 'gins', 's', '0'),
	(31, 'kamila', 'dd', '0'),
	(32, 'alto', 'sd', '0'),
	(33, 'CRREDIT CARDS', 'BINES', '0'),
	(34, 'OLAppp', 'CAMPEONn', '0'),
	(35, 'html', 's', '0'),
	(44, 'popo', 'bolívar con ñññññqqqqq', '0'),
	(45, 'pruebaedicion', 'cccc', '0'),
	(46, 'qwerty', 'zzzzZzz', '1'),
	(48, 'xx', 'xxx', '0'),
	(49, 'www.google.com.ec', 'pagina web', '1'),
	(50, 'yahoodd', 'dd', '1'),
	(51, 'cargoooo', 'ddddd', '1'),
	(52, 'pppppooooo', 'ddffdfdfddf', '0'),
	(53, 'nuevorecien', 'e', '0'),
	(54, 'ppp', 'ppp', '1');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;


-- Volcando estructura para tabla dbpermisos.cuenta_usuario
CREATE TABLE IF NOT EXISTS `cuenta_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_empleado` (`id_empleado`),
  KEY `FK_id_rol` (`id_rol`),
  CONSTRAINT `FK_id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`),
  CONSTRAINT `FK_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.cuenta_usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta_usuario` DISABLE KEYS */;
REPLACE INTO `cuenta_usuario` (`id`, `id_empleado`, `email`, `password`, `estado`, `id_rol`) VALUES
	(14, '1111111111', 'kokooio@arroba.com', '000a28367458ee02544376753253263a', '1', 2),
	(16, '0706430980', 'kokooio@arroba.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', 1);
/*!40000 ALTER TABLE `cuenta_usuario` ENABLE KEYS */;


-- Volcando estructura para tabla dbpermisos.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.departamento: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
REPLACE INTO `departamento` (`id`, `nombre`, `descripcion`, `estado`) VALUES
	(1, 'Procesos', 'qwerty', '0'),
	(2, 'procesos', 'sddsds', '0'),
	(3, 'procesos', 'swdsd', '0'),
	(4, 'la quimica', 'asasdasd', '0'),
	(5, 'Sociales', 'qwerty', '0'),
	(6, 'Matematica', 'dfgdfgdfg', '0'),
	(7, 'antiguo', 'fgfg', '0'),
	(8, 'pruebaash', 'utm', '0'),
	(9, 'camaleon', 'we', '0'),
	(10, 'rr', 'rrr', '0'),
	(11, 'exteb', 'exx', '0'),
	(12, 'portuari', 'k\'ppo', '0'),
	(13, 'scrash', 'latasi', '0'),
	(14, 'probado', 'fd', '0'),
	(15, 'un registro', 'cmabiado', '1'),
	(16, 'Departamento de Agronomía', 'ñn', '1'),
	(17, 'ootro', 'x', '1');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;


-- Volcando estructura para tabla dbpermisos.detalle_firma_permiso
CREATE TABLE IF NOT EXISTS `detalle_firma_permiso` (
  `id_empleado` varchar(11) NOT NULL,
  `id_permiso` bigint(20) NOT NULL,
  `fima_solicitante` mediumblob NOT NULL,
  `firma_rh` mediumblob NOT NULL,
  `firma_gerente` mediumblob NOT NULL,
  PRIMARY KEY (`id_empleado`,`id_permiso`),
  KEY `FKid_permiso_on_detalle_firma_permiso` (`id_permiso`),
  KEY `FKid_empleado_on_detalle_firma_permiso` (`id_empleado`),
  CONSTRAINT `FKid_empleado_on_detalle_firma_permiso` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`),
  CONSTRAINT `FKid_permiso_on_detalle_firma_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.detalle_firma_permiso: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_firma_permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_firma_permiso` ENABLE KEYS */;


-- Volcando estructura para tabla dbpermisos.detalle_permiso
CREATE TABLE IF NOT EXISTS `detalle_permiso` (
  `id_permiso` bigint(20) NOT NULL,
  `id_vacaciones` bigint(20) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `total_tiempo` time NOT NULL,
  KEY `FK_id_permiso` (`id_permiso`),
  KEY `FK_id_vacaciones` (`id_vacaciones`),
  CONSTRAINT `FK_id_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id`),
  CONSTRAINT `FK_id_vacaciones` FOREIGN KEY (`id_vacaciones`) REFERENCES `vacaciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.detalle_permiso: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_permiso` DISABLE KEYS */;
REPLACE INTO `detalle_permiso` (`id_permiso`, `id_vacaciones`, `fecha_inicio`, `fecha_fin`, `total_tiempo`) VALUES
	(2, 0, '2016-07-21 15:29:23', '2016-07-28 15:29:36', '15:29:40'),
	(2, 0, '2016-07-22 15:24:00', '2016-08-10 15:30:00', '15:30:01'),
	(3, 0, '2016-07-28 16:50:30', '2016-07-28 16:50:35', '16:50:37'),
	(3, 0, '2016-07-28 16:51:37', '2016-07-28 16:51:39', '16:51:41'),
	(3, 0, '2016-07-28 16:52:11', '2016-07-28 16:52:13', '16:52:15'),
	(3, 0, '2016-07-28 17:19:06', '2016-07-28 17:19:08', '17:19:09'),
	(2, 0, '2016-07-28 01:30:00', '2016-07-28 17:19:49', '17:19:50');
/*!40000 ALTER TABLE `detalle_permiso` ENABLE KEYS */;


-- Volcando estructura para tabla dbpermisos.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `firma` mediumblob,
  `jefe` varchar(10) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_jefe` (`jefe`),
  KEY `FK_cargo` (`id_cargo`),
  KEY `FK_departamento` (`id_departamento`),
  CONSTRAINT `FK_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`),
  CONSTRAINT `FK_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`),
  CONSTRAINT `FK_jefe` FOREIGN KEY (`jefe`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.empleado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
REPLACE INTO `empleado` (`id`, `nombre`, `apellido`, `direccion`, `estado_civil`, `telefono`, `sexo`, `fecha_nacimiento`, `email`, `estado`, `firma`, `jefe`, `id_cargo`, `id_departamento`) VALUES
	('0706430980', 'fernando', 'guiña', 'Santa Rosa', NULL, '944544', NULL, '2016-08-01', 'electrofo@yahoo.es', '1', NULL, NULL, 3, 16),
	('1111111111', 'Luis Ronaldo', 'Guiña Vivian', 'Las Cañas', 'Casado', '1232443', 'Masculino', '1994-12-16', 'electrnnnnn@gmail.com', '1', NULL, '0706430980', 1, 1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;


-- Volcando estructura para procedimiento dbpermisos.empleado_estandar
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `empleado_estandar`(IN `dato` VARCHAR (10))
select * from empleado where id =dato and jefe is not null//
DELIMITER ;


-- Volcando estructura para procedimiento dbpermisos.empleado_jefe
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `empleado_jefe`(IN `dato` VARCHAR (10))
select * from empleado where id =dato and jefe is null//
DELIMITER ;


-- Volcando estructura para procedimiento dbpermisos.login
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(`_id_empleado` VARCHAR(10), `_password` VARCHAR(250))
select * from cuenta_usuario where id_empleado = _id_empleado and password = _password//
DELIMITER ;


-- Volcando estructura para tabla dbpermisos.periodo
CREATE TABLE IF NOT EXISTS `periodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anio` int(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.periodo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;


-- Volcando estructura para tabla dbpermisos.permiso
CREATE TABLE IF NOT EXISTS `permiso` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_empleado` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(250) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `disponible` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FKempleado` (`id_empleado`),
  CONSTRAINT `FKempleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.permiso: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
REPLACE INTO `permiso` (`id`, `id_empleado`, `fecha`, `motivo`, `estado`, `disponible`) VALUES
	(2, '0706430980', '2016-07-14', 'Asuntos de la base de datos para recuperarla todo el dia ', 'Aceptado', '1'),
	(3, '0706430980', '2016-07-18', 'iii', 'Pendiente', '1'),
	(5, '0706430980', '2016-07-18', 'on', 'Rechazado', '0'),
	(6, '0706430980', '2016-10-10', 'prueba', 'Pendiente', '0'),
	(7, '0706430980', '2016-07-19', 'xxxxxxxx', 'Pendiente', '0');
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;


-- Volcando estructura para procedimiento dbpermisos.registrarCuentaUsuario
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarCuentaUsuario`(`_id_empleado` VARCHAR(10), `_email` VARCHAR(100), `_password` VARCHAR(250), `_estado` CHAR(1), `_id_rol` INT(11))
insert into cuenta_usuario (id_empleado, email,password,estado,id_rol) values(_id_empleado , _email,_password,_estado, _id_rol)//
DELIMITER ;


-- Volcando estructura para tabla dbpermisos.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.rol: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
REPLACE INTO `rol` (`id_rol`, `nombre`, `descripcion`) VALUES
	(1, 'Administrador', 'Usuario con mayor cantidad de privilegios, acceso total al sistema'),
	(2, 'Estandar', 'Usuario con privilegios menores que administrador, cada empleado es un usuario estandar');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;


-- Volcando estructura para tabla dbpermisos.vacaciones
CREATE TABLE IF NOT EXISTS `vacaciones` (
  `id` bigint(20) NOT NULL,
  `id_empleado` varchar(10) NOT NULL,
  `fech_ini` date DEFAULT NULL,
  `fech_fin` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKEmpleado_Vac` (`id_empleado`),
  CONSTRAINT `FKEmpleado_Vac` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla dbpermisos.vacaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vacaciones` DISABLE KEYS */;
REPLACE INTO `vacaciones` (`id`, `id_empleado`, `fech_ini`, `fech_fin`, `total`) VALUES
	(0, '0706430980', '2016-07-28', '2016-07-28', 30);
/*!40000 ALTER TABLE `vacaciones` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
