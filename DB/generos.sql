-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2019 a las 22:20:41
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `genero` text NOT NULL,
  `id_peliculasFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `genero`, `id_peliculasFK`) VALUES
(1, '123', 13),
(2, '12', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`),
  ADD KEY `id_peliculasfk` (`id_peliculasFK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `generos`
--
ALTER TABLE `generos`
  ADD CONSTRAINT `id_peliculasfk` FOREIGN KEY (`id_peliculasFK`) REFERENCES `peliculas` (`id_pelicula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
