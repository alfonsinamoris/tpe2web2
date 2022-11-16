-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-11-2022 a las 03:01:36
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `id_propiedad` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL,
  `habitaciones` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `alquiler_venta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id_propiedad`, `direccion`, `tipo`, `habitaciones`, `precio`, `alquiler_venta`) VALUES
(15, 'Muniz 2309', 15, 0, 24444, 'venta'),
(16, 'pinto 1235', 2, 6, 45000, 'alquiler'),
(18, 'pinto 444', 2, 3, 20000, 'alquier'),
(19, 'Muniz 2308', 15, 40, 24444, 'alquiler'),
(20, 'pinto 1235', 2, 5, 45000, 'alquiler'),
(21, 'alem 1235', 15, 6, 45000, 'alquiler'),
(22, 'alem 1235', 15, 6, 45000, 'alquiler');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_propiedad`
--

CREATE TABLE `tipo_propiedad` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_propiedad`
--

INSERT INTO `tipo_propiedad` (`id_tipo`, `tipo`) VALUES
(2, 'departamento'),
(9, 'casa'),
(10, 'monoambiente'),
(15, 'lote');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `password`, `id_user`) VALUES
('alfonsina.moris@gmail.com', '$2y$10$NH7pv0pl5WcRAHQQu7i76.TdfNA0t.97//HXION0hcQnqVBYTWxLe', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id_propiedad`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `tipo_propiedad`
--
ALTER TABLE `tipo_propiedad`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tipo_propiedad`
--
ALTER TABLE `tipo_propiedad`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `propiedades_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_propiedad` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
