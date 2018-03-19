-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2018 a las 00:58:08
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_tiendaonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_carrito`
--

CREATE TABLE IF NOT EXISTS `detalle_carrito` (
`id` int(10) NOT NULL,
  `id_producto` int(2) NOT NULL,
  `id_usuario` int(2) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `totalimporte` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_producto`
--

CREATE TABLE IF NOT EXISTS `marca_producto` (
`id_marca` int(2) NOT NULL,
  `nombre_marca` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca_producto`
--

INSERT INTO `marca_producto` (`id_marca`, `nombre_marca`) VALUES
(1, 'TOSHIBA'),
(2, 'HP'),
(3, 'LENOVO'),
(4, 'ASUS'),
(5, 'GENIUS'),
(6, 'CANON'),
(7, 'MAC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id` int(10) NOT NULL,
  `id_tipoproducto` int(2) NOT NULL,
  `id_marcaproducto` int(2) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `stock` int(5) NOT NULL,
  `precio_a` decimal(4,2) NOT NULL,
  `precio_b` decimal(4,2) NOT NULL,
  `precio_c` decimal(4,2) NOT NULL,
  `nombre_foto` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_tipoproducto`, `id_marcaproducto`, `nombre`, `descripcion`, `stock`, `precio_a`, `precio_b`, `precio_c`, `nombre_foto`) VALUES
(1, 3, 7, 'IPHONE 7', 'CAPACIDAD: 128GB, COLOR: BLANCO', 7, '3.22', '3.33', '4.44', '6090905_sd3.jpg'),
(2, 2, 2, 'hp pavilion g4-1085la', 'CAPACIDAD: 128GB, COLOR: BLANCO', 5, '3.22', '3.33', '3.33', '6.png'),
(3, 2, 2, 'hp ploma', 'CAPACIDAD: 128GB, COLOR: BLANCO', 6, '3.22', '4.44', '99.99', 'bootstrap-ecommerce-templates.PNG'),
(4, 1, 3, 'mochila negra', 'CAPACIDAD: 128GB, COLOR: BLANCO', 5, '3.22', '3.33', '3.33', '5.png'),
(5, 4, 6, 'canon multifuncion', 'CAPACIDAD: 128GB, COLOR: BLANCO', 20, '3.22', '3.33', '3.33', '2.png'),
(6, 5, 3, 'mouse inalambrico', 'CAPACIDAD: 128GB, COLOR: BLANCO', 20, '3.22', '3.33', '3.33', 'c.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE IF NOT EXISTS `tipo_producto` (
`id_tipoproducto` int(2) NOT NULL,
  `nombre_tipoproducto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipoproducto`, `nombre_tipoproducto`) VALUES
(1, 'MOCHILAS'),
(2, 'LAPTOPS'),
(3, 'TELEFONOS'),
(4, 'IMPRESORAS'),
(5, 'ACCESORIOS DE COMPUTADORAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
`id` int(2) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(10) NOT NULL,
  `id_tipousuario` int(2) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_tipousuario`, `cedula`, `nombre`, `apellido`, `correo`, `telefono`, `fecha_nacimiento`, `contrasena`) VALUES
(1, 1, '0704418144', 'Christian', 'Bustamante', 'chrisysandra1992@gmail.com', '0981105330', '1992-12-11', 'chaparro2017');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
 ADD PRIMARY KEY (`id`), ADD KEY `id_producto` (`id_producto`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
 ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id`), ADD KEY `id_tipoproducto` (`id_tipoproducto`), ADD KEY `id_marcaproducto` (`id_marcaproducto`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
 ADD PRIMARY KEY (`id_tipoproducto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cedula` (`cedula`), ADD UNIQUE KEY `correo` (`correo`), ADD UNIQUE KEY `telefono` (`telefono`), ADD KEY `id_tipousuario` (`id_tipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
MODIFY `id_marca` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
MODIFY `id_tipoproducto` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
ADD CONSTRAINT `detalle_carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
ADD CONSTRAINT `detalle_carrito_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_tipoproducto`) REFERENCES `tipo_producto` (`id_tipoproducto`),
ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_marcaproducto`) REFERENCES `marca_producto` (`id_marca`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipousuario`) REFERENCES `tipo_usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
