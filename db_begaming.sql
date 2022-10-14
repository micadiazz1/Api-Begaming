-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 21:07:14
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_begaming`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Memoria Ram'),
(8, 'Procesador'),
(9, 'Mother'),
(10, 'Fuente'),
(11, 'Placa de video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(60) NOT NULL,
  `id_categoria_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `precio`, `imagen`, `id_categoria_fk`) VALUES
(1, ' ASUS PRIME A520M-K AM4 ', 'Plataforma AMD Socket AM4 Ryzen 3th Gen,AM4 APU 3th Gen,AM4 Ryzen 4th Gen,AM4 APU 5000 Chipsets Principal AMD A520 Boton Bios Flashback No', 17350, 'img/6349b0af3752e.jpg', 9),
(3, 'Asrock B450 Steel Legend AM4 RGB Dual M.2 Dual USB 3.1 ', 'Plataforma AMD Socket AM4 APU 1th Gen,AM4 APU 2th Gen,AM4 Ryzen 1th Gen,AM4 Ryzen 2th Gen,AM4 Ryzen 3th Gen,AM4 APU 3th Gen,AM4 Ryzen 4th Gen,AM4 APU 5000 Chipsets Principal AMD B450 Boton Bios Flashback No', 30000, 'img/6349b16d923e1.jpg', 9),
(4, 'GeiL DDR4 16GB 3000MHz Super Luce RGB Black ', 'Capacidad 16 gb Velocidad 3000 mhz Tipo DDR4 Cantidad De Memorias 1 Latencia 16 cl Voltaje 1.35 v', 21100, 'img/6349b18faac0a.jpg', 1),
(5, 'AMD Ryzen 7 5800X 4.7GHz Turbo AM4 - No incluye Cooler ', 'Modelo 5800X Socket AM4 Ryzen 4th Gen Núcleos 8 Frecuencia 3800.00 mhz Proceso De Fabricación 7 nm Chipset Gpu NO Posee Gráficos Integrados Hilos 16 Frecuencia Turbo 4700 mhz Familia AMD RYZEN 7', 72450, 'img/6349b1d382cda.jpg', 8),
(6, 'Intel Core i5 10400F 4.3GHz Turbo 1200 Comet Lake', 'Modelo Core i5 10400F Socket 1200 Comet Lake Núcleos 6 Frecuencia 2900.00 mhz Proceso De Fabricación 14 nm Chipset Gpu NO Posee Gráficos Integrados Hilos 12 Frecuencia Turbo 4300 mhz Familia Intel Core i5', 30600, 'img/6349b20d25efc.jpg', 8),
(7, 'MSI GeForce RTX 3090 24GB GDDR6X GAMING X TRIO', 'Tipo pcie Chipset Gpu RTX 3090 Entrada Video No Puente Para Sli/croosfirex SLI Doble Puente No Características Especiales Ray Tracing + DLSS', 295000, 'img/6349b26cae6ec.jpg', 11),
(8, 'Placa de Video Asrock RX 570 8GB GDDR5 Phantom Gaming Elite ', 'Tipo pcie Chipset Gpu RX 570 Entrada Video No Puente Para Sli/croosfirex Crossfire Doble Puente No', 50000, 'img/6349b2bc5abbc.jpg', 11),
(9, 'ASUS ROG STRIX 850W 80 Plus Gold Full Modular White 850G ', 'Watts Nominal 850 w Watts Reales 840 w Formato ATX Compatible Con Posición Inferior Si Certificacion 80 Plus 80 PLUS Gold Modo Híbrido Si Tipo De Cableado Full Modular Ampers En Linea +12V 70 a Fuente Digital No Color Blanco', 41450, 'img/6349b30e2268b.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$jbd2UEtLXYKOZjv6qHd4KuboT4KUSIqPK6zXuYwUnYWUBarlaAiVa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria_fk` (`id_categoria_fk`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
