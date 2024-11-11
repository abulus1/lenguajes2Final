-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2024 a las 20:50:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_cine_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_crud_php`
--

CREATE TABLE `clientes_crud_php` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_registro` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes_crud_php`
--

INSERT INTO `clientes_crud_php` (`id_cliente`, `nombre`, `email`, `telefono`, `fecha_registro`) VALUES
(1, 'Juan Pérez', 'juan.perez@example.com', '123456789', '2024-11-11'),
(2, 'Ana Gómez', 'ana.gomez@example.com', '987654321', '2024-11-11'),
(3, 'Luis Martínez', 'luis.martinez@example.com', NULL, '2024-11-11'),
(4, 'María López', 'maria.lopez@example.com', '555555555', '2024-11-11'),
(5, 'Carlos Ramírez', 'carlos.ramirez@example.com', '444444444', '2024-11-11'),
(6, 'Laura Fernández', 'laura.fernandez@example.com', NULL, '2024-11-11'),
(7, 'José García', 'jose.garcia@example.com', '333333333', '2024-11-11'),
(8, 'Clara Rodríguez', 'clara.rodriguez@example.com', '222222222', '2024-11-11'),
(9, 'Miguel Torres', 'miguel.torres@example.com', NULL, '2024-11-11'),
(10, 'Elena Méndez', 'elena.mendez@example.com', '111111111', '2024-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_crud_php`
--

CREATE TABLE `entradas_crud_php` (
  `id_entrada` int(11) NOT NULL,
  `id_funcion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` decimal(10,2) GENERATED ALWAYS AS (`cantidad` * 5000) STORED,
  `fecha_compra` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradas_crud_php`
--

INSERT INTO `entradas_crud_php` (`id_entrada`, `id_funcion`, `id_cliente`, `cantidad`, `fecha_compra`) VALUES
(1, 1, 1, 2, '2024-11-11 19:48:19'),
(2, 2, 2, 3, '2024-11-11 19:48:19'),
(3, 3, 3, 1, '2024-11-11 19:48:19'),
(4, 4, 4, 4, '2024-11-11 19:48:19'),
(5, 5, 5, 2, '2024-11-11 19:48:19'),
(6, 6, 6, 3, '2024-11-11 19:48:19'),
(7, 7, 7, 1, '2024-11-11 19:48:19'),
(8, 8, 8, 5, '2024-11-11 19:48:19'),
(9, 9, 9, 2, '2024-11-11 19:48:19'),
(10, 10, 10, 3, '2024-11-11 19:48:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones_crud_php`
--

CREATE TABLE `funciones_crud_php` (
  `id_funcion` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo_funcion` enum('2D','3D','TURBO') DEFAULT NULL,
  `idioma` enum('CAST','SUB') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `funciones_crud_php`
--

INSERT INTO `funciones_crud_php` (`id_funcion`, `id_pelicula`, `id_sala`, `fecha`, `hora`, `tipo_funcion`, `idioma`) VALUES
(1, 1, 1, '2024-11-12', '15:00:00', '2D', 'CAST'),
(2, 2, 2, '2024-11-12', '18:00:00', '3D', 'SUB'),
(3, 3, 3, '2024-11-12', '20:30:00', 'TURBO', 'CAST'),
(4, 4, 4, '2024-11-13', '14:30:00', '2D', 'SUB'),
(5, 5, 5, '2024-11-13', '17:45:00', '3D', 'CAST'),
(6, 6, 6, '2024-11-13', '19:00:00', 'TURBO', 'SUB'),
(7, 7, 7, '2024-11-14', '16:00:00', '2D', 'CAST'),
(8, 8, 8, '2024-11-14', '18:15:00', '3D', 'SUB'),
(9, 9, 9, '2024-11-14', '21:00:00', 'TURBO', 'CAST'),
(10, 10, 10, '2024-11-15', '17:00:00', '2D', 'SUB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_crud_php`
--

CREATE TABLE `peliculas_crud_php` (
  `id_pelicula` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `genero` enum('Accion','Comedia','Drama','Terror','Aventura','Ciencia Ficcion','Animacion') DEFAULT NULL,
  `duracion` int(11) NOT NULL,
  `clasificacion` enum('G','PG','PG-13','R','NC-17') DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas_crud_php`
--

INSERT INTO `peliculas_crud_php` (`id_pelicula`, `titulo`, `descripcion`, `director`, `genero`, `duracion`, `clasificacion`, `imagen`) VALUES
(1, 'Inception', 'Un ladrón que roba secretos corporativos debe plantar una idea en la mente de un director ejecutivo.', 'Christopher Nolan', 'Ciencia Ficcion', 148, 'PG', 'inception.jpg'),
(2, 'Toy Story', 'Juguetes que cobran vida cuando los humanos no los ven.', 'John Lasseter', 'Animacion', 81, 'G', 'toystory.jpg'),
(3, 'The Godfather', 'La historia de una poderosa familia de la mafia en Nueva York.', 'Francis Ford Coppola', 'Drama', 175, 'R', 'godfather.jpg'),
(4, 'Jurassic Park', 'Un parque temático con dinosaurios clonados se convierte en una pesadilla.', 'Steven Spielberg', 'Aventura', 127, 'PG-13', 'jurassicpark.jpg'),
(5, 'The Dark Knight', 'Batman se enfrenta al Joker, quien siembra el caos en Gotham City.', 'Christopher Nolan', 'Accion', 152, 'PG-13', 'darkknight.jpg'),
(6, 'Finding Nemo', 'Un pez payaso busca a su hijo perdido en el océano.', 'Andrew Stanton', 'Animacion', 100, 'G', 'findingnemo.jpg'),
(7, 'Parasite', 'Dos familias coreanas de clases sociales opuestas se entrelazan con consecuencias devastadoras.', 'Bong Joon-ho', 'Drama', 132, 'R', 'parasite.jpg'),
(8, 'Get Out', 'Un joven afroamericano visita la misteriosa casa de los padres de su novia.', 'Jordan Peele', 'Terror', 104, 'R', 'getout.jpg'),
(9, 'Avengers: Endgame', 'Los Vengadores restantes intentan revertir el daño hecho por Thanos.', 'Anthony y Joe Russo', 'Accion', 181, 'PG-13', 'endgame.jpg'),
(10, 'Interstellar', 'Exploradores espaciales buscan un nuevo hogar para la humanidad.', 'Christopher Nolan', 'Ciencia Ficcion', 169, 'PG-13', 'interstellar.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas_crud_php`
--

CREATE TABLE `salas_crud_php` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(50) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salas_crud_php`
--

INSERT INTO `salas_crud_php` (`id_sala`, `nombre_sala`, `capacidad`) VALUES
(1, 'Sala 1', 100),
(2, 'Sala 2', 120),
(3, 'Sala 3', 80),
(4, 'Sala 4', 150),
(5, 'Sala 5', 200),
(6, 'Sala 6', 90),
(7, 'Sala 7', 130),
(8, 'Sala 8', 110),
(9, 'Sala 9', 95),
(10, 'Sala 10', 85);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes_crud_php`
--
ALTER TABLE `clientes_crud_php`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `entradas_crud_php`
--
ALTER TABLE `entradas_crud_php`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_funcion` (`id_funcion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `funciones_crud_php`
--
ALTER TABLE `funciones_crud_php`
  ADD PRIMARY KEY (`id_funcion`),
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `peliculas_crud_php`
--
ALTER TABLE `peliculas_crud_php`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `salas_crud_php`
--
ALTER TABLE `salas_crud_php`
  ADD PRIMARY KEY (`id_sala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes_crud_php`
--
ALTER TABLE `clientes_crud_php`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entradas_crud_php`
--
ALTER TABLE `entradas_crud_php`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `funciones_crud_php`
--
ALTER TABLE `funciones_crud_php`
  MODIFY `id_funcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `peliculas_crud_php`
--
ALTER TABLE `peliculas_crud_php`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `salas_crud_php`
--
ALTER TABLE `salas_crud_php`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas_crud_php`
--
ALTER TABLE `entradas_crud_php`
  ADD CONSTRAINT `entradas_crud_php_ibfk_1` FOREIGN KEY (`id_funcion`) REFERENCES `funciones_crud_php` (`id_funcion`),
  ADD CONSTRAINT `entradas_crud_php_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes_crud_php` (`id_cliente`);

--
-- Filtros para la tabla `funciones_crud_php`
--
ALTER TABLE `funciones_crud_php`
  ADD CONSTRAINT `funciones_crud_php_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas_crud_php` (`id_pelicula`),
  ADD CONSTRAINT `funciones_crud_php_ibfk_2` FOREIGN KEY (`id_sala`) REFERENCES `salas_crud_php` (`id_sala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
