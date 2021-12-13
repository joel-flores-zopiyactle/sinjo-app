-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_sinjo
CREATE DATABASE IF NOT EXISTS `db_sinjo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_sinjo`;

-- Volcando estructura para tabla db_sinjo.centrosjusticia
CREATE TABLE IF NOT EXISTS `centrosjusticia` (
  `id_centroJusticia` int(11) NOT NULL AUTO_INCREMENT,
  `centrojusticia` varchar(100) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id_centroJusticia`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.centrosjusticia: 2 rows
/*!40000 ALTER TABLE `centrosjusticia` DISABLE KEYS */;
INSERT IGNORE INTO `centrosjusticia` (`id_centroJusticia`, `centrojusticia`, `descripcion`, `status`) VALUES
	(5, 'CENTRO DE DESARROLLO MONTERREY', '', NULL),
	(6, 'CENTRO DE DESARROLLO CDMX', '', NULL);
/*!40000 ALTER TABLE `centrosjusticia` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.control_audiencias
CREATE TABLE IF NOT EXISTS `control_audiencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAudiencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.control_audiencias: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `control_audiencias` DISABLE KEYS */;
INSERT IGNORE INTO `control_audiencias` (`id`, `idAudiencia`) VALUES
	(9, 100),
	(20, 101),
	(21, 102),
	(22, 103),
	(23, 104),
	(24, 105),
	(25, 106),
	(26, 107),
	(27, 108),
	(28, 109),
	(29, 110);
/*!40000 ALTER TABLE `control_audiencias` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.participantes
CREATE TABLE IF NOT EXISTS `participantes` (
  `idparticipante` int(11) NOT NULL AUTO_INCREMENT,
  `id_audiencia` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `rol` int(3) NOT NULL DEFAULT 0,
  `descripcion` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idparticipante`),
  KEY `idparticipante` (`idparticipante`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.participantes: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `participantes` DISABLE KEYS */;
INSERT IGNORE INTO `participantes` (`idparticipante`, `id_audiencia`, `nombre`, `rol`, `descripcion`) VALUES
	(19, 101, 'mario villalobos', 7, ''),
	(20, 101, 'javier garcia', 8, ''),
	(21, 101, 'josue gonzalez', 9, ''),
	(22, 102, 'memo', 7, ''),
	(23, 102, 'carlos', 8, ''),
	(24, 103, '', 7, ''),
	(25, 104, '', 7, ''),
	(26, 105, '', 7, ''),
	(27, 106, '', 7, ''),
	(28, 107, '', 7, ''),
	(29, 108, '', 7, ''),
	(30, 109, '', 7, ''),
	(31, 110, 'manuel rodriguez', 7, ''),
	(32, 110, 'carlos alberto', 8, ''),
	(33, 110, 'laura garcia flores', 9, '');
/*!40000 ALTER TABLE `participantes` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `idpermiso` int(11) NOT NULL,
  `permiso` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.permisos: 0 rows
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.permisos_usuario
CREATE TABLE IF NOT EXISTS `permisos_usuario` (
  `idpermisoUsuario` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.permisos_usuario: 0 rows
/*!40000 ALTER TABLE `permisos_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.reservacion_salas
CREATE TABLE IF NOT EXISTS `reservacion_salas` (
  `id_reservacion_sala` int(11) NOT NULL AUTO_INCREMENT,
  `id_audiencia` int(11) DEFAULT NULL,
  `idsala` int(11) NOT NULL,
  `id_centroJusticia` int(11) DEFAULT NULL,
  `tipoAudiencia` int(11) DEFAULT NULL,
  `identificador` varchar(50) DEFAULT NULL,
  `numcausa` varchar(100) DEFAULT NULL,
  `fecha_reserva` varchar(100) DEFAULT NULL,
  `inicio_normal` varchar(50) DEFAULT NULL,
  `final_normal` varchar(50) DEFAULT NULL,
  `hora_inicio` varchar(100) DEFAULT NULL,
  `hora_final` varchar(100) DEFAULT NULL,
  `status` tinytext DEFAULT '0',
  `token` varchar(50) DEFAULT NULL,
  `token_invitado` varchar(50) DEFAULT NULL,
  `reservado` tinyint(4) DEFAULT 0,
  `publico` tinyint(2) DEFAULT 0,
  PRIMARY KEY (`id_reservacion_sala`),
  UNIQUE KEY `final_normal` (`final_normal`),
  UNIQUE KEY `inicio_normal` (`inicio_normal`),
  UNIQUE KEY `num_audiencia` (`id_audiencia`) USING BTREE,
  KEY `idsala` (`idsala`),
  KEY `id_centroJusticia` (`id_centroJusticia`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.reservacion_salas: 1 rows
/*!40000 ALTER TABLE `reservacion_salas` DISABLE KEYS */;
INSERT IGNORE INTO `reservacion_salas` (`id_reservacion_sala`, `id_audiencia`, `idsala`, `id_centroJusticia`, `tipoAudiencia`, `identificador`, `numcausa`, `fecha_reserva`, `inicio_normal`, `final_normal`, `hora_inicio`, `hora_final`, `status`, `token`, `token_invitado`, `reservado`, `publico`) VALUES
	(17, 110, 11, 5, 10, '1630564048', '3233', '09/01/2021', '09/01/2021 11:00', '09/01/2021 12:00', '11:00', '12:00', '0', '1630564048SiJ110', '110I4N1630564048', 0, 0);
/*!40000 ALTER TABLE `reservacion_salas` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  KEY `idrol` (`idrol`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.roles: 3 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT IGNORE INTO `roles` (`idrol`, `rol`, `descripcion`) VALUES
	(7, 'JUEZ', ''),
	(8, 'JUEZ / MAGISTRADO', ''),
	(9, 'AUXILIAR DE SALA', '');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.salas
CREATE TABLE IF NOT EXISTS `salas` (
  `idsala` int(11) NOT NULL AUTO_INCREMENT,
  `sala` varchar(50) DEFAULT NULL,
  `numsala` varchar(3) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `capacidad` varchar(5) DEFAULT NULL,
  `status` tinytext DEFAULT NULL,
  PRIMARY KEY (`idsala`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.salas: 1 rows
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT IGNORE INTO `salas` (`idsala`, `sala`, `numsala`, `ubicacion`, `capacidad`, `status`) VALUES
	(11, 'SALA DE PRUEBA', '1', 'MTY', '10', '1');
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tipoaudiencias
CREATE TABLE IF NOT EXISTS `tipoaudiencias` (
  `idtipoaudiencia` int(4) NOT NULL AUTO_INCREMENT,
  `nombreaudiencia` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idtipoaudiencia`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tipoaudiencias: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoaudiencias` DISABLE KEYS */;
INSERT IGNORE INTO `tipoaudiencias` (`idtipoaudiencia`, `nombreaudiencia`, `descripcion`, `status`) VALUES
	(10, 'AUDIENCIA DE MEDIDA CAUTELAR', '', 0),
	(11, 'AUDIENCIA DE PRUEBA ANTICIPADA', '', 0);
/*!40000 ALTER TABLE `tipoaudiencias` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `curp` varchar(25) NOT NULL,
  `p4ss` varchar(68) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `perfil` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.usuario: 1 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT IGNORE INTO `usuario` (`idusuario`, `nombre`, `correo`, `telefono`, `imagen`, `curp`, `p4ss`, `status`, `perfil`) VALUES
	(0, 'Admin', 'admin@gmai.com', '', '', 'bacg800705', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
