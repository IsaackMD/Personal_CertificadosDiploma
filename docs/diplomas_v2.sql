-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 22:07:33
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diplomas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_categoria` (IN `cat_id` INT, IN `nom` VARCHAR(50))   UPDATE categoria SET Nombre = nom WHERE CategoriaID = cat_id and Estado = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_cursos` (IN `cat_id` INT, IN `tittle` VARCHAR(50), IN `descrip` VARCHAR(50), IN `fechini` DATE, IN `fechfin` DATE, IN `inst_id` INT, IN `cur_id` INT)   begin
update curso 
Set CategoriaID=cat_id,
Titulo=tittle,
Descripcion=descrip,
Fecha_Ini=fechini,
Fecha_Fin=fechfin,
InstructorID=inst_id
WHERE CursoID=cur_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_ins` (IN `nom` VARCHAR(50), IN `ap` VARCHAR(50), IN `am` VARCHAR(50), IN `correo` VARCHAR(50), IN `s` CHAR, IN `tel` VARCHAR(50), IN `id` INT)   UPDATE `instructor` SET `ins_Nombre`=nom,`ins_Apellido_P`=ap,`ins_Apellido_M`=am,`Correo`=correo,`Sexo`=s,`Telefono`=tel,`Estado`=1 WHERE `InstructorID`= id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_usu` (IN `usu_id` INT, IN `nom` VARCHAR(50), IN `apep` VARCHAR(50), IN `apem` VARCHAR(50), IN `pass` VARCHAR(50), IN `sex` CHAR(1), IN `tel` VARCHAR(50))   begin
Update usuario
set usu_Nombre = nom, usu_Apellido_P = apep, usu_Apellido_M = apem, Password = pass, Sexo = sex, Telefono = tel where UsuarioID = usu_id;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_usu2` (IN `usu_id` INT, IN `nom` VARCHAR(50), IN `apep` VARCHAR(50), IN `apem` VARCHAR(50), IN `correo` VARCHAR(50), IN `pass` VARCHAR(50), IN `tel` VARCHAR(50), IN `sex` VARCHAR(50), IN `rol` VARCHAR(50))   begin
Update usuario
set usu_Nombre = nom, usu_Apellido_P = apep, usu_Apellido_M = apem,Correo =correo, Password = pass, Sexo = sex, Telefono = tel ,Rol_ID=rol, Estado = 1 where UsuarioID = usu_id;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contar_cursos` (IN `id` INT)   BEGIN
SELECT COUNT(*) total_cursos from curso_usu WHERE UsuarioID = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Info_usu` (IN `usu_id` INT)   begin
	select * from usuario WHERE Estado = 1 and UsuarioID=usu_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_cursos` (IN `cat_id` INT, IN `tittle` VARCHAR(50), IN `descrip` VARCHAR(50), IN `fechini` DATE, IN `fechfin` DATE, IN `inst_id` INT)   begin
insert into curso (CategoriaID,Titulo,Descripcion,Fecha_Ini,Fecha_Fin,Fecha_Registro,InstructorID,Estado)
Values (cat_id,tittle,descrip,fechini,fechfin,Now(),inst_id,1);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Ins` (IN `nom` VARCHAR(50), IN `ap` VARCHAR(50), IN `am` VARCHAR(50), IN `correo` VARCHAR(50), IN `s` CHAR, IN `tel` VARCHAR(50))   INSERT INTO `instructor`(`ins_Nombre`, `ins_Apellido_P`, `ins_Apellido_M`, `Correo`, `Sexo`, `Telefono`, `Fecha_Registro`, `Estado`) VALUES (nom,ap,am,correo,s,tel,now(),1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCursos` ()   SELECT cu.CursoID,cu.Titulo,cu.Descripcion,cu.Fecha_Ini,cu.Fecha_Fin ,ca.CategoriaID,ca.Nombre,i.InstructorID,i.ins_Nombre,i.ins_Apellido_P,i.ins_Apellido_M, i.Correo,i.Telefono, CU.Fecha_Registro FROM curso cu INNER JOIN categoria ca on cu.CategoriaID = ca.CategoriaID INNER JOIN instructor i on cu.InstructorID = i.InstructorID and cu.Estado = 1 ORDER BY cu.CursoID DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Lista_Curso_x_id` (IN `CurD_id` INT)   BEGIN
SELECT curso_usu.CursoDetalleID,
			curso.CursoID,
            curso.Titulo,
            curso.Descripcion,
            curso.Fecha_Ini,
            curso.Fecha_Fin,
            usuario.UsuarioID,
            usuario.usu_Nombre,
            usuario.usu_Apellido_P,
            usuario.usu_Apellido_M,
            instructor.InstructorID,
            instructor.ins_Nombre,
            instructor.ins_Apellido_P,
            instructor.ins_Apellido_M
            from curso_usu JOIN curso on curso_usu.CursoID = curso.CursoID
            join usuario on curso_usu.UsuarioID = usuario.UsuarioID
            join instructor on curso.InstructorID = instructor.InstructorID
            where curso_usu.CursoDetalleID = CurD_id;
            END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Lista_info` (IN `usuario_id` INT)   BEGIN
SELECT curso_usu.CursoDetalleID,
			curso.CursoID,
            curso.Titulo,
            curso.Descripcion,
            curso.Fecha_Ini,
            curso.Fecha_Fin,
            usuario.UsuarioID,
            usuario.usu_Nombre,
            usuario.usu_Apellido_P,
            usuario.usu_Apellido_M,
            instructor.InstructorID,
            instructor.ins_Nombre,
            instructor.ins_Apellido_P,
            instructor.ins_Apellido_M
            from curso_usu JOIN curso on curso_usu.CursoID = curso.CursoID
            join usuario on curso_usu.UsuarioID = usuario.UsuarioID
            join instructor on curso.InstructorID = instructor.InstructorID
            where curso_usu.UsuarioID = usuario_id;
            END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Lista_top` (IN `usuario_id` INT)   BEGIN
SELECT curso_usu.CursoDetalleID,
			curso.CursoID,
            curso.Titulo,
            curso.Descripcion,
            curso.Fecha_Ini,
            curso.Fecha_Fin,
            usuario.UsuarioID,
            usuario.usu_Nombre,
            usuario.usu_Apellido_P,
            usuario.usu_Apellido_M,
            instructor.InstructorID,
            instructor.ins_Nombre,
            instructor.ins_Apellido_P,
            instructor.ins_Apellido_M
            from curso_usu JOIN curso on curso_usu.CursoID = curso.CursoID
            join usuario on curso_usu.UsuarioID = usuario.UsuarioID
            join instructor on curso.InstructorID = instructor.InstructorID
            where curso_usu.UsuarioID = usuario_id
			limit 10;            
            END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CategoriaID` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Fecha_Registrada` datetime NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CategoriaID`, `Nombre`, `Fecha_Registrada`, `Estado`) VALUES
(1, '1111', '2023-10-01 10:00:00', 0),
(2, 'Marketing', '2023-10-02 11:15:00', 1),
(3, 'Educación', '2023-10-15 11:15:00', 1),
(4, 'Negocio', '2023-10-03 14:30:00', 1),
(5, 'ssa', '2023-11-04 11:16:09', 0),
(6, '2222', '2023-11-07 07:12:34', 0),
(7, 'ssdsdd', '2023-11-16 21:09:58', 0),
(8, 'z', '2023-11-16 21:10:05', 0),
(9, 'xx', '2023-11-16 21:10:12', 0),
(10, 'x', '2023-11-16 21:10:16', 0),
(11, 'q', '2023-11-16 21:10:22', 0),
(12, 'q', '2023-11-16 21:10:28', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `CursoID` int(11) NOT NULL,
  `CategoriaID` int(11) NOT NULL,
  `Titulo` varchar(150) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Fecha_Ini` date NOT NULL,
  `Fecha_Fin` date NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `Fecha_Registro` datetime DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`CursoID`, `CategoriaID`, `Titulo`, `Descripcion`, `Fecha_Ini`, `Fecha_Fin`, `InstructorID`, `Fecha_Registro`, `Estado`) VALUES
(1, 1, 'Curso Html5', 'loeem', '2023-11-01', '2023-09-12', 2, '2023-10-02 07:14:18', 1),
(2, 1, 'Curso De HTML5', 'Lorem Ipsum es simplemente el texto de relleno de ', '2023-11-02', '2023-12-29', 1, '2023-10-02 07:15:01', 1),
(3, 2, '3', 'asasdd', '0000-00-00', '2023-10-13', 2, '2023-10-02 07:15:01', 0),
(35, 1, 'test', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500', '2023-09-12', '2023-12-20', 2, '2023-10-02 07:14:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_usu`
--

CREATE TABLE `curso_usu` (
  `CursoDetalleID` int(11) NOT NULL,
  `CursoID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `Fecha_Registro` datetime NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso_usu`
--

INSERT INTO `curso_usu` (`CursoDetalleID`, `CursoID`, `UsuarioID`, `Fecha_Registro`, `Estado`) VALUES
(1, 1, 1, '2023-10-02 07:29:03', 1),
(2, 1, 2, '2023-10-02 07:29:03', 1),
(3, 2, 3, '2023-10-02 07:29:03', 1),
(4, 2, 1, '2023-10-02 07:29:03', 1),
(5, 3, 1, '2023-10-02 07:29:03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `InstructorID` int(11) NOT NULL,
  `ins_Nombre` varchar(150) NOT NULL,
  `ins_Apellido_P` varchar(150) NOT NULL,
  `ins_Apellido_M` varchar(150) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Fecha_Registro` datetime(1) DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `ins_Nombre`, `ins_Apellido_P`, `ins_Apellido_M`, `Correo`, `Sexo`, `Telefono`, `Fecha_Registro`, `Estado`) VALUES
(1, 'Carlos', 'López', 'González', 'carlos@example.com', 'H', '1234567890', '2023-10-01 10:00:00.0', 1),
(2, 'Ana', 'Martínez', 'Sánchez', 'ana@example.com', 'M', '9876543210', '2023-10-02 11:15:00.0', 1),
(3, 'Pedro', 'Ramírez', 'Rodríguez', 'pedro@example.com', 'H', '5555555555', '2023-10-03 14:30:00.0', 1),
(4, 'Maria', 'test', 'test', 'test', 'H', '7787972', '2023-10-04 16:45:00.0', 1),
(5, 'Juan', 'Gómez', 'Hernández', 'juan@example.com', 'H', '9999999999', '2023-10-05 09:30:00.0', 1),
(8, 'Pedr', 'Ramírez', 'Rodríguez', 'pedro@example.com', 'H', '5555555555', '2023-11-15 14:32:43.0', 0),
(9, 'Pedro2', 'Ramírez', 'Rodríguez', 'pedro@example.com', 'H', '5555555555', '2023-11-15 14:32:59.0', 0),
(10, 'Pedro2', 'Ramírez', 'Rodríguez', 'pedro@example.com', 'H', '5555555555', '2023-11-15 14:33:49.0', 0),
(11, 'test2', 'Ramírez', 'Rodríguez', 'admin123', 'H', '5465456', '2023-11-15 14:36:41.0', 0),
(12, 'test2', 'Ramírez', 'Rodríguez', 'admin12', 'H', '5465456', '2023-11-15 14:36:48.0', 0),
(13, 'test2', 'Ramírez', 'Rodríguez', 'admin12', 'H', '5465456', '2023-11-15 14:37:48.0', 0),
(14, 'Pedro3', 'Ramírez', 'Rodríguez', 'pedro@example.com', 'H', '5555555555', '2023-11-15 14:39:27.0', 0),
(24, 'Mariasss', 'test', 'test', 'test', 'H', '7787972', '2023-11-15 21:18:23.0', 0),
(25, 'a', 'test', 'test', 'test', 'M', '54564564', '2023-11-16 20:49:28.0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `UsuarioID` int(11) NOT NULL,
  `usu_Nombre` varchar(150) NOT NULL,
  `usu_Apellido_P` varchar(150) NOT NULL,
  `usu_Apellido_M` varchar(150) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Fecha_Registro` datetime DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `Rol_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`UsuarioID`, `usu_Nombre`, `usu_Apellido_P`, `usu_Apellido_M`, `Correo`, `Telefono`, `Password`, `Sexo`, `Fecha_Registro`, `Estado`, `Rol_ID`) VALUES
(1, 'Kevin Isaac', 'Sanchez', 'Benitez', 'sanchezk801@gmail.com', '1234567897', '123456789', 'H', '2023-10-01 21:38:15', 1, 1),
(2, 'Juan', 'Pérez', 'García', 'juan@example.com', '7794246510', 'clave123', 'H', '2023-10-01 21:43:19', 1, 1),
(3, '', 'test2', 'test', 'test', '1', 'test', '5', '2023-10-01 21:43:19', 0, 0),
(4, 'Luis', 'Martínez', 'Rodríguez', 'luis@example.com', '5589401245', 'miclave', 'H', '2023-10-01 21:43:19', 1, 1),
(5, 'Admin', 'Super Admin', 'Rodríguez', 'admin@example.com', '4564824012', 'admin', 'H', '2023-10-01 21:43:19', 1, 2),
(6, 'Mariasss', 'Perez', 'Martinez', 'maria@example.com', '7787972871', 'pypypy', 'M', '2023-10-01 21:43:19', 0, 1),
(7, 'a', 'test', 'test', 'test', '7787972', 'test', 'M', '2023-11-16 23:38:13', 0, 1),
(9, 'asdd', 'sddsa', 'saddsa', 'sdad', '6545646', 'ssdd', 'H', '2023-11-17 16:05:36', 0, 1),
(12, 'Test', 'test1', 'test2', 'test3', '77878', 'test4', 'H', '2023-11-20 13:59:50', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`CursoID`);

--
-- Indices de la tabla `curso_usu`
--
ALTER TABLE `curso_usu`
  ADD PRIMARY KEY (`CursoDetalleID`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`InstructorID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `CursoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `curso_usu`
--
ALTER TABLE `curso_usu`
  MODIFY `CursoDetalleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
