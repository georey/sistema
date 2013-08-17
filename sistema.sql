-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-06-2013 a las 20:03:45
-- Versión del servidor: 5.5.30
-- Versión de PHP: 5.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(4, '192.168.1.12', 'admin', '2013-06-08 02:54:21'),
(5, '192.168.1.12', 'admin', '2013-06-08 02:54:25'),
(6, '192.168.1.12', 'admin', '2013-06-08 02:54:50'),
(7, '192.168.1.12', 'admin', '2013-06-08 02:54:54'),
(8, '192.168.1.12', 'admin', '2013-06-08 02:55:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opc_opcion`
--

CREATE TABLE IF NOT EXISTS `opc_opcion` (
  `opc_id` int(11) NOT NULL AUTO_INCREMENT,
  `opc_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `opc_funcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `opc_descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `opc_padre` int(11) DEFAULT NULL,
  `opc_nivel` int(11) NOT NULL,
  `opc_hijo` int(11) DEFAULT NULL,
  `opc_icono` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`opc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `opc_opcion`
--

INSERT INTO `opc_opcion` (`opc_id`, `opc_nombre`, `opc_funcion`, `opc_descripcion`, `opc_padre`, `opc_nivel`, `opc_hijo`, `opc_icono`) VALUES
(1, 'Sistema', 'sistema', 'Administracion de la informacion del sistema', 0, 0, 0, 's'),
(2, 'Acceso', 'acceso', 'Administracion de acceso al sitio', 1, 1, 1, NULL),
(3, 'Roles', 'roles', 'Administracion de roles', 2, 2, 0, NULL),
(4, 'Permisos', 'permisos', 'Administracion de permisos', 2, 2, 0, NULL),
(5, 'Usuarios', 'usuarios', 'Administracion de usuarios', 2, 2, 0, NULL),
(6, 'Catalogos generales', 'catalogos', 'Informacion necesaria para el funcionamiento del sistema', 1, 1, 1, NULL),
(7, 'Opciones', 'opciones', 'Modificar los nombres y descripciones de los menus', 6, 2, 0, NULL),
(8, 'UATM', 'uatm', 'Modulo de administracion tributaria', 0, 0, 1, 'f'),
(9, 'Gestion de pagos', 'pagos', 'Gestion de pagos', 8, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oxr_opcionxrol`
--

CREATE TABLE IF NOT EXISTS `oxr_opcionxrol` (
  `oxr_id` int(11) NOT NULL AUTO_INCREMENT,
  `oxr_id_opc` int(11) NOT NULL,
  `oxr_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`oxr_id`),
  KEY `oxr_id_opc_idx` (`oxr_id_opc`),
  KEY `oxr_id_rol_idx` (`oxr_id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `oxr_opcionxrol`
--

INSERT INTO `oxr_opcionxrol` (`oxr_id`, `oxr_id_opc`, `oxr_id_rol`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_rol`
--

CREATE TABLE IF NOT EXISTS `rol_rol` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol_descripcion` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `rol_rol`
--

INSERT INTO `rol_rol` (`rol_id`, `rol_nombre`, `rol_descripcion`) VALUES
(1, 'Administrador', 'Administrador del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'ADMIN', '$2a$08$y2T9OEu8LeJohmihe3j3xeLpuMnsg0bj0XhArVdRoRo9ZOWx.VFr.', 'admin@admin.com', 1, 0, NULL, NULL, NULL, NULL, 'e67d80ed428bc7a44bdf315b4bf89f4b', '192.168.1.117', '2013-06-07 19:31:30', '2013-06-06 10:18:02', '2013-06-08 02:31:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uxr_usuarioxrol`
--

CREATE TABLE IF NOT EXISTS `uxr_usuarioxrol` (
  `uxr_id` int(11) NOT NULL AUTO_INCREMENT,
  `uxr_id_usu` int(11) NOT NULL,
  `uxr_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`uxr_id`),
  KEY `uxr_id_usu_idx` (`uxr_id_usu`),
  KEY `uxr_id_rol_idx` (`uxr_id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `uxr_usuarioxrol`
--

INSERT INTO `uxr_usuarioxrol` (`uxr_id`, `uxr_id_usu`, `uxr_id_rol`) VALUES
(1, 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `oxr_opcionxrol`
--
ALTER TABLE `oxr_opcionxrol`
  ADD CONSTRAINT `oxr_id_opc` FOREIGN KEY (`oxr_id_opc`) REFERENCES `opc_opcion` (`opc_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `oxr_id_rol` FOREIGN KEY (`oxr_id_rol`) REFERENCES `rol_rol` (`rol_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `uxr_usuarioxrol`
--
ALTER TABLE `uxr_usuarioxrol`
  ADD CONSTRAINT `uxr_id_rol` FOREIGN KEY (`uxr_id_rol`) REFERENCES `rol_rol` (`rol_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `uxr_id_usu` FOREIGN KEY (`uxr_id_usu`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
