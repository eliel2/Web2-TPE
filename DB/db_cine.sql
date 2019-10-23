-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2019 a las 22:23:06
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `sinopsis` text NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `titulo`, `sinopsis`, `valor`) VALUES
(2, '', 'qwef', 213),
(7, '', 'un mago poderoso ', 233),
(12, '', '', 0),
(13, 'aze', 'wer', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contrasena` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `email`, `contrasena`) VALUES
(0, 'admi', 'af', '$2y$10$iN7mo17qt.xhE0veEtmGp.OKIzYSG9pyq4twARk8oU7fGw357bClO'),
(2, 'lucas', 'aaaa', '123'),
(3, 'ele', 'alonx320@hotmail.com', '$2y$10$zxeBypVOHdexGI4pNYnTV.sDe0vrW0oJerIGvQEsRpu4/0/C3chpS'),
(4, 'admin', 'alonx320@hotmail.com', '0');

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
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
