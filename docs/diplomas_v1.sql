-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2023 a las 15:32:40
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
(1, 'Programación', '2023-10-01 10:00:00', 1),
(2, 'Marketing', '2023-10-02 11:15:00', 1),
(3, 'Educación', '2023-10-15 11:15:00', 1),
(4, 'Negocio', '2023-10-03 14:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `CursoID` int(11) NOT NULL,
  `CategoriaID` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Descripción` varchar(500) NOT NULL,
  `Fecha_Ini` date NOT NULL,
  `Fecha_Fin` int(11) NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `Fecha_Registro` datetime DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`CursoID`, `CategoriaID`, `Nombre`, `Descripción`, `Fecha_Ini`, `Fecha_Fin`, `InstructorID`, `Fecha_Registro`, `Estado`) VALUES
(1, 1, 'Curso De HTML5', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, ', '0000-00-00', 1987, 1, '2023-10-02 07:14:18', 1),
(2, 2, 'Introduccion a los Negocios', 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo ', '0000-00-00', 1987, 1, '2023-10-02 07:15:01', 2);

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
(3, 2, 3, '2023-10-02 07:29:03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `InstructorID` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Apellido_P` varchar(150) NOT NULL,
  `Apellido_M` varchar(150) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Fecha_Registro` datetime(1) DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `Nombre`, `Apellido_P`, `Apellido_M`, `Correo`, `Sexo`, `Telefono`, `Fecha_Registro`, `Estado`) VALUES
(1, 'Carlos', 'López', 'González', 'carlos@example.com', 'H', '1234567890', '2023-10-01 10:00:00.0', 1),
(2, 'Ana', 'Martínez', 'Sánchez', 'ana@example.com', 'M', '9876543210', '2023-10-02 11:15:00.0', 1),
(3, 'Pedro', 'Ramírez', 'Rodríguez', 'pedro@example.com', 'H', '5555555555', '2023-10-03 14:30:00.0', 1),
(4, 'Luisa', 'Fernández', 'Pérez', 'luisa@example.com', 'M', '7777777777', '2023-10-04 16:45:00.0', 1),
(5, 'Juan', 'Gómez', 'Hernández', 'juan@example.com', 'H', '9999999999', '2023-10-05 09:30:00.0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `UsuarioID` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Apellido_P` varchar(150) NOT NULL,
  `Apellido_M` varchar(150) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Fecha_Registro` datetime DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`UsuarioID`, `Nombre`, `Apellido_P`, `Apellido_M`, `Correo`, `Telefono`, `Nickname`, `Password`, `Sexo`, `Fecha_Registro`, `Estado`) VALUES
(1, 'Kevin Isaac', 'Sanchez', 'Benitez', 'sanchezk801@gmail.com', '1234567897', 'IsaacK_MD', '123456789', 'H', '2023-10-01 21:38:15', 1),
(2, 'Juan', 'Pérez', 'García', 'juan@example.com', '7794246510', 'juanito123', 'clave123', 'H', '2023-10-01 21:43:19', 1),
(3, 'María', 'González', 'López', 'maria@example.com', '7792541052', 'marialinda', 'contraseña123', 'M', '2023-10-01 21:43:19', 1),
(4, 'Luis', 'Martínez', 'Rodríguez', 'luis@example.com', '5589401245', 'lucho123', 'miclave', 'H', '2023-10-01 21:43:19', 1);

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
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `CursoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `curso_usu`
--
ALTER TABLE `curso_usu`
  MODIFY `CursoDetalleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
