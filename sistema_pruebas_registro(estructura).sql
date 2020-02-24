/*
Navicat MySQL Data Transfer

Source Server         : sistema
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : sistema_pruebas_registro

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2020-02-23 19:35:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asegurados
-- ----------------------------
DROP TABLE IF EXISTS `asegurados`;
CREATE TABLE `asegurados` (
  `id_asegurado` int(255) NOT NULL auto_increment,
  `nssocial` text,
  `nombre_asegurado` text,
  `nombre` text,
  `ap_paterno` text,
  `ap_materno` text,
  `ciudad_procedencia` text,
  `sexo` text,
  `direccion` text,
  `telefono` text,
  `fecha_nacimiento` date default NULL,
  `correo` text,
  `id_registro` int(255) default NULL,
  `fecha_registro` date default NULL,
  `hora_registro` time default NULL,
  `activo` int(255) default NULL,
  PRIMARY KEY  (`id_asegurado`)
) ENGINE=MyISAM AUTO_INCREMENT=46966 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for departamentos
-- ----------------------------
DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `id_departamento` int(255) NOT NULL auto_increment,
  `departamento` text,
  `id_registro` int(11) default NULL,
  `fecha_registro` date default NULL,
  `hora_registro` time default NULL,
  `activo` int(255) default NULL,
  PRIMARY KEY  (`id_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for municipios
-- ----------------------------
DROP TABLE IF EXISTS `municipios`;
CREATE TABLE `municipios` (
  `id_municipio` int(11) NOT NULL auto_increment,
  `municipio` text,
  `id_registro` int(11) default NULL,
  `fecha_registro` text,
  `hora_registro` text,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_municipio`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for patrones
-- ----------------------------
DROP TABLE IF EXISTS `patrones`;
CREATE TABLE `patrones` (
  `id_patron` int(255) NOT NULL auto_increment,
  `NRegPatronal` text,
  `nombre_patron` text,
  `nombre` text,
  `ap_paterno` text,
  `ap_materno` text,
  `ciudad_procedencia` text,
  `sexo` text,
  `direccion` text,
  `telefono` text,
  `fecha_nacimiento` text,
  `correo` text,
  `id_registro` int(255) default NULL,
  `fecha_registro` date default NULL,
  `hora_registro` time default NULL,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_patron`)
) ENGINE=MyISAM AUTO_INCREMENT=4049 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id_persona` int(255) NOT NULL auto_increment,
  `nombre` text,
  `ap_paterno` text,
  `ap_materno` text,
  `sexo` text,
  `direccion` text,
  `telefono` text,
  `fecha_nacimiento` date default NULL,
  `correo` text,
  `id_registro` int(255) default NULL,
  `fecha_registro` date default NULL,
  `hora_registro` time default NULL,
  `activo` int(255) default NULL,
  PRIMARY KEY  (`id_persona`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL auto_increment,
  `cveProveedor` text,
  `proveedor` text,
  `id_registro` text,
  `fecha_registro` date default NULL,
  `hora_registro` time default NULL,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_proveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for registroasegurados
-- ----------------------------
DROP TABLE IF EXISTS `registroasegurados`;
CREATE TABLE `registroasegurados` (
  `id_registro` int(255) NOT NULL auto_increment,
  `id_asegurado` int(255) default NULL,
  `NSeguroSocial` text,
  `departamento` text,
  `tramite` text,
  `ciudad` text,
  `fecha_ingreso` date default NULL,
  `hora_ingreso` time default NULL,
  `fecha_salida` date default NULL,
  `hora_salida` time default NULL,
  `encuesta` text,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_registro`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for registropatrones
-- ----------------------------
DROP TABLE IF EXISTS `registropatrones`;
CREATE TABLE `registropatrones` (
  `id_registro` int(255) NOT NULL auto_increment,
  `id_patron` int(255) default NULL,
  `nregpatronal` text,
  `departamento` text,
  `tramite` text,
  `ciudad` text,
  `fecha_ingreso` date default NULL,
  `hora_ingreso` time default NULL,
  `fecha_salida` date default NULL,
  `hora_salida` time default NULL,
  `encuesta` text,
  `activo` int(255) default NULL,
  PRIMARY KEY  (`id_registro`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for registroproveedores
-- ----------------------------
DROP TABLE IF EXISTS `registroproveedores`;
CREATE TABLE `registroproveedores` (
  `id_registro` int(255) NOT NULL auto_increment,
  `id_proveedor` int(255) default NULL,
  `cveProveedor` text,
  `departamento` text,
  `tramite` text,
  `ciudad` text,
  `fecha_ingreso` date default NULL,
  `hora_ingreso` time default NULL,
  `fecha_salida` date default NULL,
  `hora_salida` time default NULL,
  `encuesta` text,
  `activo` int(255) default NULL,
  PRIMARY KEY  (`id_registro`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for registrovisitantes
-- ----------------------------
DROP TABLE IF EXISTS `registrovisitantes`;
CREATE TABLE `registrovisitantes` (
  `id_registro` int(11) NOT NULL auto_increment,
  `id_visitante` int(11) default NULL,
  `cveVisitante` text,
  `departamento` text,
  `tramite` text,
  `ciudad` text,
  `fecha_ingreso` date default NULL,
  `hora_ingreso` time default NULL,
  `fecha_salida` date default NULL,
  `hora_salida` time default NULL,
  `encuesta` text,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_registro`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tramites
-- ----------------------------
DROP TABLE IF EXISTS `tramites`;
CREATE TABLE `tramites` (
  `id_tramite` int(11) NOT NULL auto_increment,
  `tramite` text,
  `id_departamento` int(11) default NULL,
  `pertenece` text,
  `id_registro` int(255) default NULL,
  `fecha_registro` date default NULL,
  `hora_registro` time default NULL,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_tramite`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `usuario` text,
  `contra` text,
  `id_persona` int(11) default NULL,
  `id_registro` int(11) default NULL,
  `pvez` int(11) default NULL,
  `fecha_registro` date NOT NULL,
  `hora_registro` time default NULL,
  `tipo_usuario` text,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for visitantes
-- ----------------------------
DROP TABLE IF EXISTS `visitantes`;
CREATE TABLE `visitantes` (
  `id_visitante` int(11) NOT NULL auto_increment,
  `cveVisitante` text,
  `visitante` text,
  `id_registro` text,
  `fecha_registro` date default NULL,
  `hora_registro` time default NULL,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_visitante`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Procedure structure for datos_asegurados
-- ----------------------------
DROP PROCEDURE IF EXISTS `datos_asegurados`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_asegurados`()
BEGIN

SELECT
							id_asegurado,
							nssocial,
							nombre_asegurado,
							nombre,
							ap_paterno,
							ap_paterno,
							ciudad_procedencia,
							sexo,
							direccion,
							telefono,
							fecha_nacimiento,
							correo


							activo
						FROM
						asegurados LIMIT 10;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for extraer_datos_asegurados
-- ----------------------------
DROP PROCEDURE IF EXISTS `extraer_datos_asegurados`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `extraer_datos_asegurados`()
BEGIN
	SELECT
							id_asegurado,
							nssocial,
							nombre,
							ciudad_procedencia,
							correo,
							telefono,
							sexo,
							activo
						FROM
						asegurados;

END
;;
DELIMITER ;
