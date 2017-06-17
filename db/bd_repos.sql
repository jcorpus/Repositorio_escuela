-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2017 a las 01:57:14
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_repos`
--
CREATE DATABASE IF NOT EXISTS `bd_repos` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bd_repos`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_buscar_usuario` (IN `_codigo_user` VARCHAR(12))  SELECT u.idUsuario,u.Usuario,p.NomPersona,p.ApePaterno,p.ApeMaterno,u.EstadoUsuario,u.fecha_reg_user,tp.DesTipoUsuario FROM usuario u INNER JOIN persona p ON u.idPersona = p.idPersona INNER JOIN tipousuario tp ON u.idTipoUsuario = tp.idTipoUsuario WHERE u.Usuario LIKE _codigo_user ORDER BY u.idUsuario DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_contar_filial` (IN `_id_filial` INT(11))  SELECT COUNT(t.idTesis) AS contador FROM tesis t INNER JOIN filial fl ON t.idFilial = fl.idFilial INNER JOIN estadopublicacion est ON est.idEstadoPublicacion = t.idEstadoPublicacion WHERE t.idEstadoPublicacion = 1 AND t.idFilial =  _id_filial$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_tesis_filial` (IN `_par_filial` VARCHAR(200))  SELECT idTesis,Autor,Titulo  from tesis INNER JOIN filial on filial.idFilial=tesis.idFilial where filial.DesFilial=_par_filial$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_tesis_publicadas` (IN `_titulo` VARCHAR(70), IN `_autor` VARCHAR(50))  SELECT t.idTesis,t.Titulo,t.Autor, est.DesEstadoPublicacion, fl.DesFilial FROM tesis t INNER JOIN estadopublicacion est ON est.idEstadoPublicacion = t.idEstadoPublicacion INNER JOIN filial fl ON fl.idFilial = t.idFilial
WHERE t.idEstadoPublicacion = 1 AND (t.Titulo LIKE '%`_titulo`%' OR t.Autor LIKE _autor)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_usuario_todo` ()  SELECT u.idUsuario, u.idPersona, u.Usuario, p.Email, p.NomPersona, p.ApePaterno, p.ApeMaterno, u.imgUsuario, u.idTipoUsuario, tp.DesTipoUsuario,u.Password FROM usuario u INNER JOIN persona p ON p.idPersona = u.idPersona INNER JOIN tipousuario tp ON tp.idTipoUsuario = u.idTipoUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_list_tesis` (IN `_id_tesis` INT(11))  SELECT t.idTesis, t.CodTesis,t.Titulo,t.Autor,t.Palabra_Clave,t.FechaRegistro,t.Citacion,t.Resumen,tpt.idTipoTesis,tpt.DesTipoTesis,fl.idFilial,fl.DesFilial,ga.idGradoAcademico,ga.DesGradoAcademico,ctg.idCategoria,ctg.DesCategoria,t.Archivo,t.Formato,t.size_tesis FROM tesis t INNER JOIN tipotesis tpt ON tpt.idTipoTesis = t.idTipoTesis INNER JOIN filial fl ON fl.idFilial = t.idFilial INNER JOIN gradoacademico ga ON ga.idGradoAcademico = t.idGradoAcademico INNER JOIN categoria ctg ON ctg.idCategoria = t.idCategoria WHERE t.idTesis = _id_tesis LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_report_tesisfilial` ()  SELECT COUNT(*) as contador, filial.DesFilial FROM tesis INNER JOIN filial ON filial.idFilial = tesis.idFilial GROUP BY filial.DesFilial$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int(10) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `UspCodAlu` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `idPersona`, `UspCodAlu`) VALUES
(1, 3, '888888888'),
(2, 4, '1110022001'),
(3, 5, '99999'),
(4, 6, '777021'),
(5, 7, '1122364502'),
(6, 8, '1103210141'),
(26, 65, '2147483647'),
(27, 91, '1113435345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(10) NOT NULL,
  `DesCategoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `DesCategoria`) VALUES
(1, 'Administración de Redes'),
(2, 'Administracion en Base de Datos'),
(3, 'Area Investigacion'),
(4, 'Seguridad Computacional'),
(7, 'dhgjdfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_public_tesis`
--

CREATE TABLE `detalle_public_tesis` (
  `id_detalle_public_tesis` int(11) NOT NULL,
  `idTesis` int(11) NOT NULL,
  `fecha_public_tesis` date NOT NULL,
  `hora_cambio_estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_mod` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado_public` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_public_tesis`
--

INSERT INTO `detalle_public_tesis` (`id_detalle_public_tesis`, `idTesis`, `fecha_public_tesis`, `hora_cambio_estado`, `usuario_mod`, `estado_public`) VALUES
(1, 63, '2016-12-25', '13:46:46', 'usuario defecto', 'publicado'),
(2, 62, '2016-12-25', '13:53:34', 'usuario defecto', 'publicado'),
(3, 61, '2016-12-25', '14:00:58', 'usuario defecto', 'publicado'),
(4, 60, '2016-12-25', '18:29:36', '2', 'publicado'),
(5, 59, '2017-01-01', '20:39:11', '2', 'publicado'),
(6, 64, '2017-01-01', '21:50:33', '2', 'publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tesis_alunna`
--

CREATE TABLE `detalle_tesis_alunna` (
  `idDetalle` int(10) NOT NULL,
  `idAlumno` int(10) NOT NULL,
  `idTesis` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_tesis_alunna`
--

INSERT INTO `detalle_tesis_alunna` (`idDetalle`, `idAlumno`, `idTesis`) VALUES
(1, 4, 48),
(2, 5, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopublicacion`
--

CREATE TABLE `estadopublicacion` (
  `idEstadoPublicacion` int(10) NOT NULL,
  `DesEstadoPublicacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estadopublicacion`
--

INSERT INTO `estadopublicacion` (`idEstadoPublicacion`, `DesEstadoPublicacion`) VALUES
(1, 'Publicado'),
(2, 'Registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filial`
--

CREATE TABLE `filial` (
  `idFilial` int(10) NOT NULL,
  `DesFilial` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `filial`
--

INSERT INTO `filial` (`idFilial`, `DesFilial`) VALUES
(1, 'Chimbote'),
(2, 'Huaraz'),
(3, 'Lima'),
(4, 'Huacho'),
(5, 'Arequipa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gradoacademico`
--

CREATE TABLE `gradoacademico` (
  `idGradoAcademico` int(10) NOT NULL,
  `DesGradoAcademico` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `gradoacademico`
--

INSERT INTO `gradoacademico` (`idGradoAcademico`, `DesGradoAcademico`) VALUES
(1, 'Doctorado'),
(2, 'Maestria'),
(3, 'Licencia'),
(4, 'Bachiller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(10) NOT NULL,
  `NomPersona` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ApePaterno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ApeMaterno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DNI` int(8) NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` int(9) NOT NULL,
  `FechaNacimmiento` date NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `NomPersona`, `ApePaterno`, `ApeMaterno`, `DNI`, `Direccion`, `Sexo`, `Telefono`, `FechaNacimmiento`, `Email`) VALUES
(1, 'Daniel', 'Narvaez', 'Castillo', 46864567, 'Urb. El Carmen Mz 24 lt7', 'Masculino', 944940055, '1992-02-26', 'daniel121_2003@hotmail.com'),
(2, 'Julio Cesar', 'Corpus', 'Mechato', 45864575, 'Urb. P.P.A.O. Mz 5 Lt 8', 'Masculino', 943245874, '1993-12-09', 'doombakuryo@gmail.com'),
(3, 'n cambio', 'ape cambio', 'mat cambio', 88888888, 'direccion cambio', 'Masculino', 888, '1993-05-20', 'email cambio'),
(4, 'Sheyla ', 'Huánmanchumo', 'Sosa', 48524257, 'ubr. 21 de abril Maz 10 lt 5', 'Femenino', 943785236, '1993-10-12', 'Sheyla@hotmail.com'),
(5, 'mod', 'mod', 'mod', 66666666, 'address', 'Masculino', 666666, '1992-05-07', '666@gmail.com'),
(6, 'Aldino', 'Fructuoso ', 'Barahona', 47488568, '98898989', 'Masculino', 943256985, '1990-07-10', '888ino@hotmail.com'),
(7, 'Ines', 'Diestra', 'Reyes', 45235874, 'Av. Pardo nº340', 'Femenino', 943568245, '1993-09-15', 'InesDiestra@hotmail.com'),
(8, 'Gardis', 'Castro', 'Valentin', 47582365, 'AV. Pardo nº 560', 'Masculino', 943256986, '1989-10-20', 'Castro@hotmail.com'),
(9, 'Wilson', 'Izaguirre', 'Minaya', 45687962, 'Av. Balta nº 350', 'Masculino', 943654159, '1989-03-10', 'Wilson@hotmail.com'),
(10, 'Maria', 'Davila', 'Miranda', 46897582, 'Urb. Pensacola Mz 2 Lt 3', 'Femenino', 943589621, '1993-10-12', 'Miranda@hotmail.com'),
(11, 'Eduardo', 'Hurtado', 'Pulido', 46258769, 'Av Pardo nº 305', 'Masculino', 943651470, '1989-05-07', 'eduhurtado@hotmail.com'),
(12, 'Frank', 'Henostrosa', 'Ramos', 47856942, 'Av. Balta nº 100', 'Masculino', 943002569, '1993-06-20', 'Frank@hotmail.com'),
(34, 'julioo', 'corpus', 'mechato', 45456756, 'ppaoo', 'M', 346456, '2015-12-12', 'doofyo@gmail.com'),
(35, 'julioo', 'corpus', 'mechato', 45456756, 'ppaoo', 'M', 346456, '2015-12-12', 'doof4@gmail.com'),
(36, 'julioo', 'corpus', 'mechato', 45456756, 'ppaoo', 'M', 346456, '2015-12-12', 'doo65f4@gmail.com'),
(37, 'bakuryo', 'corpus', 'mechato', 12345678, 'Saturno', 'M', 767675, '2007-11-26', 'doomba453yo@gmail.com'),
(38, 'bakuryo', 'corpus', 'mechato', 44565645, 'Saturno', 'M', 767675, '2005-02-16', 'd43akuryo@gmail.com'),
(39, 'diana', 'ore', 'gutierrez', 54689486, 'Saturno', 'F', 767675, '2005-01-17', 'diana@gmail.com'),
(40, 'bakuryo', 'corpus', 'mechato', 54545678, 'Saturno', 'F', 767675, '2006-04-18', 'doo454uryo@gmail.com'),
(41, 'bakuryo', 'corpus', 'mechato', 86584684, 'Saturno', 'M', 767675, '2007-02-15', '569846o@gmail.com'),
(42, 'bakuryo', 'corpus', 'mechato', 55555558, 'Saturno', 'M', 767675, '2005-03-17', 'ttkuryo@gmail.com'),
(43, 'n cambio', 'ape cambio', 'mechato', 0, '57679878', 'M', 767675, '2005-03-17', 'tt8985o@gmail.com'),
(44, 'bakuryo', 'corpus', 'mechato', 12888678, 'Saturno', 'F', 767675, '2003-02-14', 'doo8989akuryo@gmail.com'),
(45, 'min', 'm m', ' a pe', 0, '44444444', 'M', 888888888, '2007-03-16', '5555556@gmail.com'),
(46, 'bakuryo', 'corpus', 'mechato', 88777888, 'Saturno', 'F', 767675, '2007-01-16', 'jujjujjujjjujujuujuj'),
(47, 'bakuryo', 'corpus', 'mechato', 8888878, 'Saturno', 'F', 767675, '2006-04-16', 'doombakurmail.com'),
(48, 'bakuryo', 'corpus', 'mechato', 87687, 'Saturno', 'F', 767675, '2006-03-17', 'doombgmail.com'),
(49, 'bakuryo', 'corpus', 'mechato', 12365678, 'Saturno', 'F', 767675, '2005-02-16', 'emailom@ail.com'),
(50, 'bakuryo', 'corpus', 'mechato', 12969678, 'Saturno', 'F', 767675, '2005-02-16', 'emailo55m@ail.com'),
(51, 'bakuryo', 'corpus', 'mechato', 96996678, 'Saturno', 'F', 767675, '2005-02-16', 'emailo5555m@ail.com'),
(52, 'bakuryo', 'corpus', 'mechato', 76767678, 'Saturno', 'F', 767675, '2005-02-16', 'ema4m@ail.com'),
(53, 'bakuryo', 'corpus', 'mechato', 88887678, 'Saturno', 'F', 767675, '2005-02-16', 'ema4565m@ail.com'),
(54, 'bakuryo', 'corpus', 'mechato', 78, 'Saturno', 'F', 767675, '2005-02-16', 'ema4565m@6ail.com'),
(55, 'bakuryo', 'corpus', 'mechato', 99990078, 'Saturno', 'F', 767675, '2005-02-16', 'ema456665m@6ail.com'),
(56, 'bakuryo', 'corpus', 'mechato', 76776767, 'Saturno', 'F', 767675, '2008-02-15', 'doombakuryg@mail.com'),
(57, 'juancho', 'mendoza', 'luna', 45684568, 'Saturno', 'F', 767675, '2004-03-18', '8865896@gmail.com'),
(58, 'juancho', 'mendoza', 'luna', 45684577, 'Saturno', 'F', 767675, '2004-03-18', '8656@gmail.com'),
(59, 'nuevo alumno', 'corpus', 'hhjhj', 57847567, 'hhhjSaturno', 'M', 767675, '1991-03-02', '489694856@gsdgd.ne'),
(60, 'probando', 'corpus', 'mechato', 45684756, 'Saturno', 'F', 767675, '2004-04-12', 'doomb45675675@gmail.com'),
(61, 'bakuryo', 'corpus', 'mechato', 56765675, 'Saturno', 'F', 767675, '1997-02-17', 'doombaku555556ryo@gmail.com'),
(62, 'bakuryo', 'corpus', 'mechato', 88787676, 'Saturno', 'F', 767675, '0000-00-00', 'doom45u544ryo@gmail.com'),
(63, 'bakuryo', 'corpus', 'mechato', 88787674, 'Saturno', 'F', 767675, '1997-10-16', 'doo54u544ryo@gmail.com'),
(64, 'bakuryo', 'corpus', 'mechato', 54656578, 'Saturno', 'F', 767675, '0000-00-00', 'domombakuryo@gmail.com'),
(65, 'bakuryo', 'corpus', 'mechato', 54655555, 'Saturno', 'M', 767675, '1988-02-17', 'doombakuryo@g77878.om'),
(66, 'bakuryo', 'corpus', 'mechato', 33434678, 'Saturno', 'F', 767675, '0000-00-00', 'doewrwerwerwerryo@gmail.com'),
(67, 'bakuryo', 'corpus', 'mechato', 56756678, 'Saturno', 'F', 767675, '0000-00-00', '65756756yo@gmail.com'),
(68, 'bakuryo', 'corpus', 'mechato', 12344545, 'Saturno', 'F', 767675, '0000-00-00', 'doombakur544o@gmail.com'),
(69, 'bakuryo', 'corpus', 'mechato', 65756778, 'Saturno', 'F', 767675, '0000-00-00', 'doomba57567567567566o@gmail.com'),
(70, 'bakuryo', 'corpus', 'mechato', 44534534, 'Saturno', 'F', 767675, '1988-03-15', 'doombrereryo@gmail.com'),
(71, 'bakuryo', 'corpus', 'mechato', 65534534, 'Saturno', 'F', 767675, '1988-03-15', 'doombr34ereryo@gmail.com'),
(72, 'bakuryo', 'corpus', 'mechato', 68684534, 'Saturno', 'F', 767675, '1988-03-15', 'doombr3ddd4ereryo@gmail.com'),
(73, 'bakuryo', 'corpus', 'mechato', 68655534, 'Saturno', 'F', 767675, '1988-03-15', 'doombr3ddd994ereryo@gmail.com'),
(74, 'bakuryo', 'corpus', 'mechato', 74895678, 'Saturno', 'F', 767675, '1982-04-16', 'doom3434bakuryo@gmail.com'),
(75, 'bakuryo', 'corpus', 'mechato', 45678, 'Saturno', 'F', 767675, '1983-01-16', 'doombae534kuryo@gmail.com'),
(76, 'bakuryo', 'corpus', 'mechato', 34353453, 'Saturno', 'F', 767675, '1994-03-19', 'doombakerwuryo@gmail.com'),
(77, 'bakuryo', 'corpus', 'mechato', 47596416, 'Saturno', 'F', 767675, '1987-02-15', 'doombaku58464869845yo@gmail.com'),
(78, 'bakuryo', 'corpus', 'mechato', 12345668, 'Saturno', 'F', 767675, '1987-02-16', 'doombakh7huryo@gmail.com'),
(79, 'juan endes', 'corpus', 'mechato', 49576848, '878Saturno', 'F', 7, '1985-01-17', 'dghdfg@dsgdf.com'),
(80, 'khbhbnh', 'hbjhbh', 'bhjb', 89879879, 'hjb', 'F', 87878787, '1985-03-16', 'lklfhdfh@gfddfg.com'),
(81, 'hjhjhjj', 'jhbjbnb', 'hhjhbhjb', 98798797, 'bbnbmnb', 'F', 8787877, '1983-02-15', 'sdfsdf@fsdfsd.omc'),
(82, 'hjhjhjj', 'jhbjbnb', 'hhjhbhjb', 54645797, 'bbnbmnb', 'F', 8787877, '1983-02-15', 'sdfsdf@fsdfsd.omcgd'),
(83, 'hjhh', 'gjh', 'gfjhgf', 88798798, 'dfgjkdfkgj', 'F', 2147483647, '1984-02-16', 'dfgdf@gdfgd.cop'),
(84, 'dfguhfdhg', 'hj', 'jh', 78878787, 'bjhbjhbhjb', 'F', 988898, '1984-03-17', 'hjj@fdfgfd.com'),
(85, 'ff', 'fghf', 'gjkjfh', 98309694, 'fggf', 'F', 546456, '1987-03-16', 'fghg@gdfgdf.omc'),
(86, 'jghdjghdfj', 'KJHJHJHJH', 'JHKJHJHJH', 67867867, 'JHJHHJJH', 'F', 2147483647, '1982-02-16', 'FSDF@FDSFSDF.COM.PE'),
(87, 'fdgkjdfhgjkhj', 'hjhgjhg', 'hjghjg', 98765984, 'hjgjh', 'M', 2147483647, '1982-04-15', 'fgdf@dfgdf.om.pe'),
(88, 'iruyiutir', 'ghjgjhgjhg', 'ghghgjhg', 88787687, 'ghghjgh', 'F', 2147483647, '1986-03-06', 'dfgdf@gd.gdom'),
(89, 'dgfhgjkdhjk', 'jh', 'gfgkjjdfhkgjdf', 69857956, 'fhfg', 'F', 546456456, '1986-02-18', 'dfgdfg@gdfg.om'),
(90, 'rhjgdfjgh', 'jhhh', 'jhgjhg', 78987654, 'jhgjh', 'F', 2147483647, '1985-02-07', 'fdfgdfg@dfgdfg.ocm'),
(91, 'juan', 'mendoza', 'luna', 98775765, 'chao xd', 'M', 2147483647, '1992-04-03', 'juam@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `idTesis` int(10) NOT NULL,
  `CodTesis` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Autor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Palabra_Clave` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FechaRegistro` date NOT NULL,
  `Citacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Resumen` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `idTipoTesis` int(10) NOT NULL,
  `idFilial` int(10) NOT NULL,
  `idGradoAcademico` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idCategoria` int(10) NOT NULL,
  `idEstadoPublicacion` int(10) NOT NULL,
  `Archivo` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `Formato` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `size_tesis` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_tesis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`idTesis`, `CodTesis`, `Titulo`, `Autor`, `Palabra_Clave`, `FechaRegistro`, `Citacion`, `Resumen`, `idTipoTesis`, `idFilial`, `idGradoAcademico`, `idUsuario`, `idCategoria`, `idEstadoPublicacion`, `Archivo`, `Formato`, `size_tesis`, `fecha_tesis`) VALUES
(1, '3434567', 'si web de ventas, compras y almacen', 'julio corpus', 'web, si, compras, ventas', '2016-11-11', 'cita de tesis', 'el resumen qui va muchas cosas xd', 1, 1, 1, 1, 1, 1, 'html/doc_server/ejemplo.pdf', 'application/pdf', '12345kb', '0000-00-00'),
(44, 'OavH5J5I', 'probando', 'bakuryo corpus mechato', 'paralfdgfdg', '2016-12-11', 'citacion aqui', 'resumen aqui y mas', 3, 1, 1, 2, 3, 1, 'html/doc_server/584e0c002d59a-manual-canvas-html5.pdf', 'application/pdf', '476,02 KB', '2016-12-08'),
(45, 'E8uJuUZJ', 'fundamento de redes', 'bakuryo corpus mechato', 'sdfsdfsdf', '2016-12-11', 'uhjhj', 'resumen', 1, 3, 4, 2, 4, 1, 'html/doc_server/584e197d88065-S04 - 1 Combinacion de Factores.pdf', 'application/pdf', '773,04 KB', '2010-12-20'),
(46, 'EHgwsWql', 'fundamento de redesfgf', 'bakuryo corpus mechato', 'sdfsdfsdf', '2016-12-11', 'uhjhj', 'resumen', 1, 4, 4, 2, 4, 1, 'html/doc_server/584e1999bd913-S04 - 1 Combinacion de Factores.pdf', 'application/pdf', '773,04 KB', '2010-12-20'),
(47, 'MgzMLw0O', 'ejemploooo', 'bakuryo corpus mechato', 'kjfdhkjghdfgd gdfgdf', '2016-12-13', '45o6845jtigt', 'Saturno', 1, 1, 1, 2, 1, 1, 'html/doc_server/5850b84b65f9c-cap_22.pdf', 'application/pdf', '287,11 KB', '2016-12-08'),
(48, 'apFPVXjR', 'ejemplooo5o', 'bakuryo corpus mechato', 'kjfdhkjghdfgd gdfgdf', '2016-12-13', '45o6845jtigt', 'Saturno', 1, 1, 1, 2, 1, 1, 'html/doc_server/5850b853142cd-cap_22.pdf', 'application/pdf', '287,11 KB', '2016-12-08'),
(49, 'u1fbc3z1', 'ejemdhhjfdplooo5o', 'bakuryo corpus mechato', 'kjfdhkjghdfgd gdfgdf', '2016-12-13', '45o6845jtigt', 'Saturno', 1, 1, 1, 2, 1, 1, 'html/doc_server/5850b86dc630a-cap_22.pdf', 'application/pdf', '287,11 KB', '2016-12-08'),
(50, '9820XK5H', 'tesis te aldino', 'Aldino Fructuoso  Barahona', 'web sistema web', '2016-12-16', 'citacion aqui', 'Saturno', 1, 2, 4, 2, 2, 1, 'html/doc_server/585409c3b3f97-Documento_completo__.4.4-Un-Conjunto-de-Métricas-para-Proyectos-de-Transición-de-Software-Offshore.pdf', 'application/pdf', '6,97 MB', '2016-12-16'),
(53, 'UgzFpIE6', 'huuuu', 'bakuryo corpus mechato', 'dfgdf', '2016-12-16', 'dfgdfg', 'gsg', 3, 3, 1, 2, 1, 1, 'html/doc_server/5854b14d493cc-ClaseRedes.pdf', 'application/pdf', '2,82 MB', '2016-12-08'),
(54, 'Vuttof17', 'nuevoooooooooooooooo', 'Sheyla  Huánmanchumo Sosa', 'fdskfhsdjkhfkdsf', '2016-12-21', 'sdfkjsdkjfhsdjkfh', 'Saturnoffffffffffff', 1, 1, 1, 2, 1, 1, 'html/doc_server/585a458f4a5e8-ejemplo tesis.pdf', 'application/pdf', '3,13 MB', '2016-12-22'),
(55, 'zrotqt6H', 'example', 'mod mod mod', 'palabras claves', '2016-12-21', 'ciANSGKDFMGDMF', 'resumennnnnnnnnnnnn', 1, 4, 2, 2, 3, 1, 'html/doc_server/585a6d7fdf2c9-el-gran-libro-de-html5-css3-y-javascript.pdf', 'application/pdf', '1,74 MB', '2016-12-07'),
(56, 'XFlMefWG', 'example55', 'mod mod mod', 'palabras claves', '2016-12-21', 'ciANSGKDFMGDMF', 'resumennnnnnnnnnnnn', 1, 4, 2, 2, 3, 1, 'html/doc_server/585a6d9ebf9b1-el-gran-libro-de-html5-css3-y-javascript.pdf', 'application/pdf', '1,74 MB', '2016-12-07'),
(57, 'RWfQVX6g', 'example55rrr', 'mod mod mod', 'palabras claves', '2016-12-21', 'ciANSGKDFMGDMF', 'resumennnnnnnnnnnnn', 1, 4, 2, 2, 3, 1, 'html/doc_server/585a6dc971ae1-el-gran-libro-de-html5-css3-y-javascript.pdf', 'application/pdf', '1,74 MB', '2016-12-07'),
(58, 'IJx8t1X3', 'tesis de error', 'mod mod mod', 'lfghglf,fh,, ,g, h,,gf ,h,gh', '2016-12-25', 'griotry', 'resuemnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmm', 3, 2, 1, 2, 4, 1, 'html/doc_server/585ffdd14625e-Texier2012.pdf', 'application/pdf', '763,91 KB', '2016-12-15'),
(59, 'BGiyW4XO', 'tesis de errorg', 'mod mod mod', 'lfghglf,fh,, ,g, h,,gf ,h,gh', '2016-12-25', 'griotry', 'resuemnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmm', 3, 2, 1, 2, 4, 1, 'html/doc_server/58600c0b42b0f-Texier2012.pdf', 'application/pdf', '763,91 KB', '2016-12-15'),
(60, 'dqQpTQab', 'tesis de errorgt', 'mod mod mod', 'lfghglf,fh,, ,g, h,,gf ,h,gh', '2016-12-25', 'griotry', 'resuemnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmm', 3, 2, 1, 2, 4, 1, 'html/doc_server/58600c108591b-Texier2012.pdf', 'application/pdf', '763,91 KB', '2016-12-15'),
(61, 'WVGtPLz8', 'tesis de errorgtt th gf', 'mod mod mod', 'lfghglf,fh,, ,g, h,,gf ,h,gh', '2016-12-25', 'griotry', 'resuemnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmm', 3, 2, 1, 2, 4, 1, 'html/doc_server/58600c1717282-Texier2012.pdf', 'application/pdf', '763,91 KB', '2016-12-15'),
(62, 'xXAvwAUq', 'tesis de errorgtt th gfrt', 'mod mod mod', 'lfghglf,fh,, ,g, h,,gf ,h,gh', '2016-12-25', 'griotry', 'resuemnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmm', 3, 2, 1, 2, 4, 1, 'html/doc_server/58600c1b2ce6e-Texier2012.pdf', 'application/pdf', '763,91 KB', '2016-12-15'),
(63, 'KgheH3VN', 'tesis de errorgtt th gfrt  56', 'mod mod mod', 'lfghglf,fh,, ,g, h,,gf ,h,gh', '2016-12-25', 'griotry', 'resuemnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmm', 3, 2, 1, 2, 4, 1, 'html/doc_server/58600c2011b2a-Texier2012.pdf', 'application/pdf', '763,91 KB', '2016-12-15'),
(64, 'eeJGH9mK', 'año nuevo', 'n cambio ape cambio mat cambio', 'lol', '2017-01-01', 'xd', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 4, 2, 2, 1, 'html/doc_server/5869bfdf9c2ba-GQM_book.desbloqueado.pdf', 'application/pdf', '1,26 MB', '2017-01-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotesis`
--

CREATE TABLE `tipotesis` (
  `idTipoTesis` int(10) NOT NULL,
  `DesTipoTesis` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipotesis`
--

INSERT INTO `tipotesis` (`idTipoTesis`, `DesTipoTesis`) VALUES
(1, 'Descriptiva'),
(2, 'transcriptivas'),
(3, 'experimental'),
(4, 'julio'),
(5, 'julioo'),
(6, 'julooio'),
(7, 'nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(10) NOT NULL,
  `DesTipoUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `DesTipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'AsistenteAdministrador'),
(3, 'Alumno'),
(5, 'dfgkjdkjgdf'),
(6, 'dgfd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idTrabajador` int(10) NOT NULL,
  `idPersona` int(10) NOT NULL,
  `UspCodTra` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idTrabajador`, `idPersona`, `UspCodTra`) VALUES
(1, 1, '1109200107'),
(2, 2, '1112101346'),
(23, 37, '1112104345'),
(24, 38, '2147483647'),
(25, 79, '7867877868'),
(26, 80, '5896749867'),
(27, 81, '9879887879'),
(28, 82, '5656887879'),
(29, 83, '8694596847'),
(30, 84, '86948694'),
(31, 85, '4569837456'),
(32, 86, '5469479867'),
(33, 87, '8459689456'),
(34, 88, '4667566765'),
(35, 89, '4534534534'),
(36, 90, '5654456546');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) NOT NULL,
  `idPersona` int(10) NOT NULL,
  `Usuario` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `imgUsuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idTipoUsuario` int(10) NOT NULL,
  `EstadoUsuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reg_user` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idPersona`, `Usuario`, `Password`, `imgUsuario`, `idTipoUsuario`, `EstadoUsuario`, `fecha_reg_user`) VALUES
(1, 1, '1109200107', 'pass cambio', 'html/img_server/user-default.png', 1, 'activo', '0000-00-00'),
(2, 2, '1112101346', 'dXNwYmFrdXJ5bw==', 'html/img_server/user-default.png', 1, 'activo', '0000-00-00'),
(3, 3, '1107200107', '1107200107', 'imagen cambio.png', 3, 'activo', '0000-00-00'),
(4, 4, '1110022001', '1110022001', 'html/img_server/user-default.png', 3, 'activo', '0000-00-00'),
(5, 5, '1120147560', '1120147560', '66666.png', 3, 'activo', '0000-00-00'),
(6, 6, '1159547021', '1159547021', 'html/img_server/58450c03cfbe1-12552602_10207489201820934_1296422173575067322_n.jpg', 3, 'activo', '0000-00-00'),
(7, 7, '1122364502', '1122364502', 'html/img_server/58575e3188ab7-10170936_456064461194821_230908078_n.jpg', 3, 'activo', '0000-00-00'),
(8, 79, '7867877868', 'Nzg2Nzg3Nzg2OA==', 'html/img_server/user-default.png', 1, 'activo', '2016-12-18'),
(9, 80, '5896749867', 'NTg5Njc0OTg2Nw==', 'html/img_server/user-default.png', 2, 'activo', '2016-12-21'),
(10, 81, '9879887879', 'OTg3OTg4Nzg3OQ==', 'html/img_server/user-default.png', 2, 'activo', '2016-12-21'),
(11, 82, '5656887879', 'NTY1Njg4Nzg3OQ==', 'html/img_server/user-default.png', 2, 'activo', '2016-12-21'),
(12, 83, '8694596847', 'ODY5NDU5Njg0Nw==', 'html/img_server/user-default.png', 2, 'activo', '2016-12-21'),
(13, 84, '86948694', 'ODY5NDg2OTQ=', 'html/img_server/user-default.png', 1, 'activo', '2016-12-21'),
(14, 85, '4569837456', 'NDU2OTgzNzQ1Ng==', 'html/img_server/user-default.png', 1, 'activo', '2016-12-21'),
(15, 86, '5469479867', 'NTQ2OTQ3OTg2Nw==', 'html/img_server/user-default.png', 1, 'activo', '2016-12-21'),
(16, 87, '8459689456', 'ODQ1OTY4OTQ1Ng==', 'html/img_server/user-default.png', 1, 'activo', '2016-12-21'),
(17, 88, '4667566765', 'NDY2NzU2Njc2NQ==', 'html/img_server/user-default.png', 1, 'activo', '2016-12-21'),
(18, 89, '4534534534', 'NDUzNDUzNDUzNA==', 'html/img_server/user-default.png', 1, 'activo', '2016-12-21'),
(19, 90, '5654456546', 'NTY1NDQ1NjU0Ng==', 'html/img_server/user-default.png', 1, 'activo', '2016-12-21'),
(20, 91, '1113435345', 'MTExMzQzNTM0NQ==', 'html/img_server/user-default.png', 3, 'activo', '2016-12-25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `detalle_public_tesis`
--
ALTER TABLE `detalle_public_tesis`
  ADD PRIMARY KEY (`id_detalle_public_tesis`),
  ADD KEY `id_Tesis` (`idTesis`);

--
-- Indices de la tabla `detalle_tesis_alunna`
--
ALTER TABLE `detalle_tesis_alunna`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idTesis` (`idTesis`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `estadopublicacion`
--
ALTER TABLE `estadopublicacion`
  ADD PRIMARY KEY (`idEstadoPublicacion`);

--
-- Indices de la tabla `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`idFilial`);

--
-- Indices de la tabla `gradoacademico`
--
ALTER TABLE `gradoacademico`
  ADD PRIMARY KEY (`idGradoAcademico`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`idTesis`),
  ADD KEY `idTipoTesis` (`idTipoTesis`),
  ADD KEY `idEstadoPublicacion` (`idEstadoPublicacion`),
  ADD KEY `idFilial` (`idFilial`,`idGradoAcademico`,`idUsuario`,`idCategoria`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idGradoAcademico` (`idGradoAcademico`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tipotesis`
--
ALTER TABLE `tipotesis`
  ADD PRIMARY KEY (`idTipoTesis`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idTrabajador`),
  ADD UNIQUE KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `idPersona` (`idPersona`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idAlumno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `detalle_public_tesis`
--
ALTER TABLE `detalle_public_tesis`
  MODIFY `id_detalle_public_tesis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalle_tesis_alunna`
--
ALTER TABLE `detalle_tesis_alunna`
  MODIFY `idDetalle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estadopublicacion`
--
ALTER TABLE `estadopublicacion`
  MODIFY `idEstadoPublicacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `filial`
--
ALTER TABLE `filial`
  MODIFY `idFilial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `gradoacademico`
--
ALTER TABLE `gradoacademico`
  MODIFY `idGradoAcademico` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `idTesis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `tipotesis`
--
ALTER TABLE `tipotesis`
  MODIFY `idTipoTesis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idTrabajador` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `Alumno_Persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);

--
-- Filtros para la tabla `detalle_public_tesis`
--
ALTER TABLE `detalle_public_tesis`
  ADD CONSTRAINT `detalle_public_tesis_ibfk_1` FOREIGN KEY (`idTesis`) REFERENCES `tesis` (`idTesis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_tesis_alunna`
--
ALTER TABLE `detalle_tesis_alunna`
  ADD CONSTRAINT `detalle_tesis_alunna_ibfk_1` FOREIGN KEY (`idTesis`) REFERENCES `tesis` (`idTesis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_tesis_alunna_ibfk_2` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD CONSTRAINT `tesis_ibfk_1` FOREIGN KEY (`idEstadoPublicacion`) REFERENCES `estadopublicacion` (`idEstadoPublicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tesis_ibfk_2` FOREIGN KEY (`idFilial`) REFERENCES `filial` (`idFilial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tesis_ibfk_3` FOREIGN KEY (`idTipoTesis`) REFERENCES `tipotesis` (`idTipoTesis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tesis_ibfk_4` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tesis_ibfk_5` FOREIGN KEY (`idGradoAcademico`) REFERENCES `gradoacademico` (`idGradoAcademico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tesis_ibfk_6` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `Trabajador_Persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_tipousuario` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
