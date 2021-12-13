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
INSERT INTO `centrosjusticia` (`id_centroJusticia`, `centrojusticia`, `descripcion`, `status`) VALUES
	(5, 'CENTRO DE DESARROLLO MONTERREY', '', NULL),
	(6, 'CENTRO DE DESARROLLO CDMX', '', NULL);
/*!40000 ALTER TABLE `centrosjusticia` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.control_audiencias
CREATE TABLE IF NOT EXISTS `control_audiencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAudiencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.control_audiencias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `control_audiencias` DISABLE KEYS */;
INSERT INTO `control_audiencias` (`id`, `idAudiencia`) VALUES
	(9, 100),
	(32, 113),
	(33, 114),
	(34, 115),
	(35, 116),
	(36, 117),
	(37, 118);
/*!40000 ALTER TABLE `control_audiencias` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.historial_reservaciones
CREATE TABLE IF NOT EXISTS `historial_reservaciones` (
  `idhistorialReservas` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `fechaCreacion` varchar(50) DEFAULT NULL,
  `numcausa` int(11) DEFAULT NULL,
  `numAudiencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idhistorialReservas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.historial_reservaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `historial_reservaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial_reservaciones` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  `idsistema` int(11) NOT NULL DEFAULT 0,
  `nota` text DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `visibilidad` tinyint(2) DEFAULT 0,
  PRIMARY KEY (`idnota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.notas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.permiso
CREATE TABLE IF NOT EXISTS `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.permiso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
	(1, 'Audiencias'),
	(2, 'Administracion');
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.registro_accesos
CREATE TABLE IF NOT EXISTS `registro_accesos` (
  `id_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha_acceso` varchar(50) DEFAULT NULL,
  `hora_acceso` varchar(50) DEFAULT NULL,
  `hora_fin` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `fecha_fin` varchar(50) DEFAULT NULL,
  `Columna 8` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_acceso`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.registro_accesos: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `registro_accesos` DISABLE KEYS */;
INSERT INTO `registro_accesos` (`id_acceso`, `idusuario`, `usuario`, `fecha_acceso`, `hora_acceso`, `hora_fin`, `status`, `fecha_fin`, `Columna 8`) VALUES
	(15, '1', 'admin', '02/11/2021', '07:58:17', NULL, '1', NULL, NULL),
	(16, NULL, 'memo', '02/11/2021', '08:05:45', NULL, '0', NULL, NULL),
	(17, '1', 'admin', '02/11/2021', '08:05:49', NULL, '0', NULL, NULL),
	(18, NULL, 'memo', '02/11/2021', '08:06:42', NULL, 'Acceso denegado', NULL, NULL),
	(19, '1', 'admin', '02/11/2021', '08:06:47', NULL, 'Acceso correcto', NULL, NULL),
	(20, '1', 'admin', '04/11/2021', '06:35:46', NULL, 'Acceso correcto', NULL, NULL),
	(21, '1', 'admin', '04/11/2021', '17:44:29', NULL, 'Acceso correcto', NULL, NULL),
	(22, '1', 'admin', '04/11/2021', '18:04:32', NULL, 'Acceso correcto', NULL, NULL),
	(23, '1', 'admin', '04/11/2021', '21:45:25', NULL, 'Acceso correcto', NULL, NULL),
	(24, '1', 'admin', '04/11/2021', '23:53:58', NULL, 'Acceso correcto', NULL, NULL),
	(25, '1', 'admin', '05/11/2021', '00:14:44', NULL, 'Acceso correcto', NULL, NULL),
	(26, '1', 'admin', '05/11/2021', '00:27:42', NULL, 'Acceso correcto', NULL, NULL),
	(27, '1', 'admin', '05/11/2021', '06:26:06', NULL, 'Acceso correcto', NULL, NULL),
	(28, '1', 'admin', '05/11/2021', '16:47:42', NULL, 'Acceso correcto', NULL, NULL),
	(29, NULL, 'admin', '05/11/2021', '17:02:26', NULL, 'Acceso denegado', NULL, NULL),
	(30, NULL, 'admin', '05/11/2021', '17:04:37', NULL, 'Acceso denegado', NULL, NULL),
	(31, '9', 'admin', '05/11/2021', '19:59:51', NULL, 'Acceso correcto', NULL, NULL),
	(32, '9', 'admin', '05/11/2021', '22:01:50', NULL, 'Acceso correcto', NULL, NULL),
	(33, '9', 'admin', '06/11/2021', '00:27:13', NULL, 'Acceso correcto', NULL, NULL),
	(34, '9', 'admin', '06/11/2021', '00:51:27', NULL, 'Acceso correcto', NULL, NULL),
	(35, '9', 'admin', '06/11/2021', '05:08:29', NULL, 'Acceso correcto', NULL, NULL),
	(36, '9', 'admin', '08/11/2021', '17:56:02', NULL, 'Acceso correcto', NULL, NULL),
	(37, '9', 'admin', '08/11/2021', '18:26:21', NULL, 'Acceso correcto', NULL, NULL),
	(38, '9', 'admin', '10/11/2021', '00:40:56', NULL, 'Acceso correcto', NULL, NULL),
	(39, '9', 'admin', '10/11/2021', '06:25:32', NULL, 'Acceso correcto', NULL, NULL),
	(40, '9', 'admin', '13/11/2021', '07:15:27', NULL, 'Acceso correcto', NULL, NULL),
	(41, '9', 'admin', '15/11/2021', '20:51:28', NULL, 'Acceso correcto', NULL, NULL),
	(42, '9', 'admin', '17/11/2021', '06:10:53', NULL, 'Acceso correcto', NULL, NULL),
	(43, '9', 'admin', '17/11/2021', '17:46:26', NULL, 'Acceso correcto', NULL, NULL),
	(44, '9', 'admin', '17/11/2021', '19:00:44', NULL, 'Acceso correcto', NULL, NULL),
	(45, '9', 'admin', '17/11/2021', '22:11:12', NULL, 'Acceso correcto', NULL, NULL),
	(46, '9', 'admin', '18/11/2021', '07:36:28', NULL, 'Acceso correcto', NULL, NULL),
	(47, '9', 'admin', '18/11/2021', '17:48:00', NULL, 'Acceso correcto', NULL, NULL),
	(48, '9', 'admin', '18/11/2021', '22:46:40', NULL, 'Acceso correcto', NULL, NULL);
/*!40000 ALTER TABLE `registro_accesos` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  KEY `idrol` (`idrol`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.roles: 10 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`idrol`, `rol`, `descripcion`) VALUES
	(7, 'JUEZ', ''),
	(8, 'JUEZ / MAGISTRADO', ''),
	(9, 'AUXILIAR DE SALA', ''),
	(20, 'SECRETARIO', NULL),
	(14, 'ASESOR JÚRIDICO', ''),
	(15, 'DEMANDADO', ''),
	(16, 'IMPUTADO', ''),
	(17, 'MINISTERIO PÚBLICO', ''),
	(18, 'OTRO', ''),
	(19, 'VICTIMA', '');
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
INSERT INTO `salas` (`idsala`, `sala`, `numsala`, `ubicacion`, `capacidad`, `status`) VALUES
	(11, 'SALA DE PRUEBA', '1', 'MTY', '10', '1');
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.status_audiencias
CREATE TABLE IF NOT EXISTS `status_audiencias` (
  `id_statusaudiencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombreStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_statusaudiencia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.status_audiencias: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `status_audiencias` DISABLE KEYS */;
INSERT INTO `status_audiencias` (`id_statusaudiencia`, `nombreStatus`) VALUES
	(1, 'Registrada'),
	(2, 'En sesión'),
	(3, 'Cancelada'),
	(4, 'En receso');
/*!40000 ALTER TABLE `status_audiencias` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_actividad
CREATE TABLE IF NOT EXISTS `tbl_actividad` (
  `idactividad` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `actividad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idactividad`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_actividad: ~28 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_actividad` DISABLE KEYS */;
INSERT INTO `tbl_actividad` (`idactividad`, `idusuario`, `fecha`, `hora`, `actividad`) VALUES
	(5, 1, '2021-11-05', '15:44:36', 'NUEVO EXPEDIENTE'),
	(6, 1, '2021-11-05', '15:44:45', 'NUEVO EXPEDIENTE'),
	(7, 1, '2021-11-05', '15:45:00', 'NUEVO EXPEDIENTE'),
	(8, 1, '2021-11-05', '15:45:38', 'NUEVO EXPEDIENTE'),
	(9, 1, '2021-11-05', '15:58:21', 'NUEVO EXPEDIENTE'),
	(10, 1, '2021-11-05', '23:42:26', 'NUEVO EXPEDIENTE'),
	(11, 1, '2021-11-06', '01:21:02', 'NUEVO EXPEDIENTE'),
	(12, 1, '2021-11-08', '17:00:01', 'NUEVO EXPEDIENTE'),
	(13, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(14, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(15, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(16, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(17, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(18, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(19, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(20, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(21, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(22, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(23, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(24, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(25, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(26, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(27, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(28, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(29, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(30, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(31, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(32, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA'),
	(33, 1, '2021-11-18', '01:07:49', 'NUEVO EXPEDIENTE'),
	(34, 1, '0000-00-00', '00:00:00', 'NUEVA AUDIENCIA');
/*!40000 ALTER TABLE `tbl_actividad` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_audiencias
CREATE TABLE IF NOT EXISTS `tbl_audiencias` (
  `id_audiencia` int(11) NOT NULL AUTO_INCREMENT,
  `IDAudiencia` varchar(50) NOT NULL DEFAULT '0',
  `id_centrojusticia` int(11) DEFAULT NULL,
  `numAudiencia` varchar(50) DEFAULT NULL,
  `id_TipoAudiencia` int(11) DEFAULT NULL,
  `id_sala` int(11) DEFAULT NULL,
  `expediente` varchar(50) DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `finaliza` datetime DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL,
  `token_invitado` varchar(10) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `borrado` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id_audiencia`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_audiencias: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_audiencias` DISABLE KEYS */;
INSERT INTO `tbl_audiencias` (`id_audiencia`, `IDAudiencia`, `id_centrojusticia`, `numAudiencia`, `id_TipoAudiencia`, `id_sala`, `expediente`, `inicio`, `finaliza`, `token`, `token_invitado`, `status`, `borrado`) VALUES
	(20, '1637218063', 5, '1001', 10, 11, '1234/2021', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 1, NULL),
	(21, '1637218372', 5, '1001', 10, 11, '1234/2021', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 1, NULL),
	(22, '1637218412', 5, '1002', 10, 11, '1234/2021', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 1, NULL),
	(23, '1637218504', 5, '1003', 10, 11, '1234/2021', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 1, NULL),
	(24, '1637219293', 5, '101', 10, 11, '4321/2020', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 1, NULL);
/*!40000 ALTER TABLE `tbl_audiencias` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_expedientes
CREATE TABLE IF NOT EXISTS `tbl_expedientes` (
  `id_expediente` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(50) NOT NULL DEFAULT '0',
  `NumExpediente` varchar(50) NOT NULL DEFAULT '0',
  `fechaRegistro` datetime DEFAULT NULL,
  `juzgado` varchar(50) DEFAULT NULL,
  `TipoJuicio` tinyint(4) DEFAULT NULL,
  `Actor` varchar(50) DEFAULT NULL,
  `Demandado` varchar(50) DEFAULT NULL,
  `Juez` varchar(50) DEFAULT NULL,
  `Secretario` varchar(50) DEFAULT NULL,
  `borrado` tinyint(4) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_expediente`),
  UNIQUE KEY `NumExpediente` (`NumExpediente`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_expedientes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_expedientes` DISABLE KEYS */;
INSERT INTO `tbl_expedientes` (`id_expediente`, `folio`, `NumExpediente`, `fechaRegistro`, `juzgado`, `TipoJuicio`, `Actor`, `Demandado`, `Juez`, `Secretario`, `borrado`, `estado`) VALUES
	(29, '0', '1234/2021', '2021-11-05 00:00:00', 'JUZGADO CUARTO CIVIL DE PROCESO ORAL', 1, 'CARLOS HERNANDEZ GUTIERREZ', 'RICARDO REYES OLIVARES', '8', '10', NULL, '1'),
	(30, '0', 'abc/2021', '2021-11-20 00:00:00', 'juzgado nombre', 1, 'CARLOS HERNANDEZ GUTIERREZ', 'RICARDO REYES OLIVARES', '8', '10', NULL, '1'),
	(31, '0', '123/2019', '2021-11-08 00:00:00', 'JUZGADO CUARTO CIVIL DE PROCESO ORAL', 1, 'CARLOS HERNANDEZ GUTIERREZ', 'RICARDO REYES OLIVARES', '8', '10', NULL, '1'),
	(32, '0', '4321/2020', '2021-11-19 00:00:00', 'JUZGADO NO SE QUIEN SEA', 1, 'CARLOS HERNANDEZ GUTIERREZ', 'JUAN FRANCISCO GOMEZ HERNANDEZ', '8', '10', NULL, '1');
/*!40000 ALTER TABLE `tbl_expedientes` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_identificacionsistema
CREATE TABLE IF NOT EXISTS `tbl_identificacionsistema` (
  `idIdentificacion` int(11) NOT NULL AUTO_INCREMENT,
  `IDAudiencia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idIdentificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_identificacionsistema: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_identificacionsistema` DISABLE KEYS */;
INSERT INTO `tbl_identificacionsistema` (`idIdentificacion`, `IDAudiencia`) VALUES
	(1, '100');
/*!40000 ALTER TABLE `tbl_identificacionsistema` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_numaudiencias
CREATE TABLE IF NOT EXISTS `tbl_numaudiencias` (
  `idNumAudiencia` int(11) NOT NULL AUTO_INCREMENT,
  `NumAudiencia` varchar(50) DEFAULT NULL,
  `Expediente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idNumAudiencia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_numaudiencias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_numaudiencias` DISABLE KEYS */;
INSERT INTO `tbl_numaudiencias` (`idNumAudiencia`, `NumAudiencia`, `Expediente`) VALUES
	(1, '1000', '1234/2021'),
	(2, '1001', '1234/2021'),
	(3, '1002', '1234/2021'),
	(4, '1003', '1234/2021'),
	(5, '100', '4321/2020'),
	(6, '101', '4321/2020');
/*!40000 ALTER TABLE `tbl_numaudiencias` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_participantes
CREATE TABLE IF NOT EXISTS `tbl_participantes` (
  `idparticipantes` int(11) NOT NULL AUTO_INCREMENT,
  `idAudiencia` int(11) DEFAULT 0,
  `Nombre` varchar(50) DEFAULT NULL,
  `Comentarios` varchar(200) DEFAULT NULL,
  `Rol` int(11) DEFAULT 0,
  `NumExpediente` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`idparticipantes`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_participantes: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_participantes` DISABLE KEYS */;
INSERT INTO `tbl_participantes` (`idparticipantes`, `idAudiencia`, `Nombre`, `Comentarios`, `Rol`, `NumExpediente`, `status`) VALUES
	(1, 6, 'memo', '', 7, '1234/2021', 0),
	(2, 6, 'raul', '', 18, '1234/2021', 0),
	(3, 7, '', '', 7, '', 0),
	(4, 8, '', '', 7, '1234/2021', 0),
	(5, 9, '', '', 7, '1234/2021', 0),
	(6, 10, '', '', 7, '1234/2021', 0),
	(7, 11, '', '', 7, '1234/2021', 0),
	(8, 13, '', '', 7, '1234/2021', 0),
	(9, 14, '', '', 7, '1234/2021', 0),
	(10, 14, '', '', 7, '1234/2021', 0),
	(11, 14, '', '', 7, '1234/2021', 0),
	(12, 14, '', '', 7, '1234/2021', 0),
	(13, 18, '', '', 7, '1234/2021', 0),
	(14, 18, '', '', 7, '1234/2021', 0),
	(15, 1001, '', '', 7, '1234/2021', 0),
	(16, 1001, '', '', 7, '1234/2021', 0),
	(17, 1002, '', '', 7, '1234/2021', 0),
	(18, 1003, '', '', 7, '1234/2021', 0),
	(19, 101, '', '', 7, '4321/2020', 0);
/*!40000 ALTER TABLE `tbl_participantes` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_tipojuicios
CREATE TABLE IF NOT EXISTS `tbl_tipojuicios` (
  `id_juicio` int(4) NOT NULL AUTO_INCREMENT,
  `TipoJuicio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_juicio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_tipojuicios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_tipojuicios` DISABLE KEYS */;
INSERT INTO `tbl_tipojuicios` (`id_juicio`, `TipoJuicio`) VALUES
	(1, 'JUICIO MERCANTIL'),
	(2, 'JUICIO CIVIL'),
	(3, 'JUICIO PENAL'),
	(4, 'JUICIO LABORAL'),
	(5, 'JUICIO CONTENCIOSO ADMINSITRATIVO');
/*!40000 ALTER TABLE `tbl_tipojuicios` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_tokeninvitados
CREATE TABLE IF NOT EXISTS `tbl_tokeninvitados` (
  `idtokeninvitado` int(11) NOT NULL AUTO_INCREMENT,
  `tokeninvitado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtokeninvitado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_tokeninvitados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_tokeninvitados` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tokeninvitados` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.tbl_tokens
CREATE TABLE IF NOT EXISTS `tbl_tokens` (
  `idtoken` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtoken`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.tbl_tokens: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_tokens` DISABLE KEYS */;
INSERT INTO `tbl_tokens` (`idtoken`, `token`) VALUES
	(1, 'abc123'),
	(2, 'di7w5nDL');
/*!40000 ALTER TABLE `tbl_tokens` ENABLE KEYS */;

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
INSERT INTO `tipoaudiencias` (`idtipoaudiencia`, `nombreaudiencia`, `descripcion`, `status`) VALUES
	(10, 'AUDIENCIA DE MEDIDA CAUTELAR', '1', 0),
	(11, 'AUDIENCIA DE PRUEBA ANTICIPADA', '', 0);
/*!40000 ALTER TABLE `tipoaudiencias` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `rol` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `p4ss` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `login` (`login`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.usuario: 3 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`, `rol`, `nombre`, `telefono`, `email`, `cargo`, `login`, `p4ss`, `imagen`, `status`) VALUES
	(9, 18, 'Memo Del Barrio', '', 'gdelbarrioc@gmail.com', '', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '', 1),
	(8, 7, 'Sergio gonzalez hdz', '8', 'marketing@mfgmaquinaria.com', '', 'juez', 'aa41b046702484c49e85eb97b0d4ba30d91ed017bf32c3be5f97dc7e25fd519e', '', 1),
	(10, 20, 'ALFONO REYES HERNANDEZ', '+528181866479', 'gdelbarrioc@gmail.com', '', 'secretario', 'b29477c5f1d025f92ea87548dafaab5e7d51d75cbd59c3f1c8d732a3dc4a6b4a', '', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla db_sinjo.usuario_permiso
CREATE TABLE IF NOT EXISTS `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `idpermiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`idusuario_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_sinjo.usuario_permiso: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_permiso` DISABLE KEYS */;
INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
	(1, 1, 1);
/*!40000 ALTER TABLE `usuario_permiso` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
