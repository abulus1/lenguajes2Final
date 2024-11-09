-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2024 a las 03:35:57
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
(1, 'Juan Pérez', 'juan.perez@example.com', '1234567890', '2024-11-07'),
(2, 'Ana Gómez', 'ana.gomez@example.com', '2345678901', '2024-11-07'),
(3, 'Luis Martínez', 'luis.martinez@example.com', '3456789012', '2024-11-07'),
(4, 'María López', 'maria.lopez@example.com', '4567890123', '2024-11-07'),
(5, 'Carlos Ramírez', 'carlos.ramirez@example.com', '5678901234', '2024-11-07'),
(6, 'Sofía Torres', 'sofia.torres@example.com', '6789012345', '2024-11-07'),
(7, 'Pedro Díaz', 'pedro.diaz@example.com', '7890123456', '2024-11-07'),
(8, 'Laura Fernández', 'laura.fernandez@example.com', '8901234567', '2024-11-07'),
(9, 'Miguel Castillo', 'miguel.castillo@example.com', '9012345678', '2024-11-07');

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
(1, 'Inception', 'Ladrón especializado en infiltrarse en los sueños debe llevar a cabo una misión que cambiará su vida para siempre.', 'Christopher Nolan', 'Ciencia Ficcion', 148, 'PG-13', 'https://i.pinimg.com/originals/89/87/ce/8987ce6a44674f18846622a9cc0e9867.jpg'),
(2, 'Toy Story 2', 'Un grupo de juguetes cobra vida y debe afrontar nuevos retos cuando su dueño crece y deja de jugar con ellos.', 'John Lasseter', 'Animacion', 81, 'G', NULL),
(3, 'The Godfather', 'La saga de una familia de la mafia italiana mientras navegan el poder, la lealtad y la traición.', 'Francis Ford Coppola', 'Drama', 175, 'R', NULL),
(4, 'Jurassic Park', 'Un parque temático con dinosaurios clonados se convierte en una pesadilla cuando las criaturas se escapan.', 'Steven Spielberg', 'Aventura', 127, 'PG-13', NULL),
(5, 'Pulp Fiction', 'Historias entrelazadas de crimen en Los Ángeles, llenas de giros, estilo y diálogos memorables.', 'Quentin Tarantino', 'Accion', 154, 'R', NULL),
(6, 'Finding Nemo', 'Un pez payaso recorre el océano para encontrar a su hijo perdido, enfrentando numerosos desafíos.', 'Andrew Stanton', 'Animacion', 100, 'G', NULL),
(8, 'Interstellar', 'Un grupo de astronautas viaja a través de un agujero de gusano en busca de un nuevo hogar para la humanidad.', 'Christopher Nolan', 'Ciencia Ficcion', 169, 'PG-13', NULL);

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
(1, 'Sala 1', 150),
(2, 'Sala 2', 120),
(3, 'Sala 3', 200),
(4, 'Sala 4', 100),
(5, 'Sala 5', 180),
(6, 'Sala 6', 90),
(7, 'Sala 7', 160),
(8, 'Sala 8', 140),
(9, 'Sala 10', 130);

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
-- AUTO_INCREMENT de la tabla `peliculas_crud_php`
--
ALTER TABLE `peliculas_crud_php`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `salas_crud_php`
--
ALTER TABLE `salas_crud_php`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
