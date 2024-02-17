-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2024 a las 04:21:36
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadeventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen`
--

CREATE TABLE `tb_almacen` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `stock_maximo` int(11) DEFAULT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci,
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `usuario_id`, `categoria_id`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'P-00001', 'Coca Cola', '2 litros retornable', 10, 20, 200, '800.00', '1200.00', '2024-02-14', '2024-02-14-07-11-41_Coca Cola Clasica Retornable 2 lts pet__1.jpg', 1, 7, '2024-02-14 19:11:41', '0000-00-00 00:00:00'),
(2, 'P-00002', 'Auriculares', 'con cargador incorporado', 100, 10, 200, '5000.00', '7600.00', '2024-02-15', '2024-02-15-02-52-03_auriculares.jpg', 1, 11, '2024-02-15 14:52:03', '0000-00-00 00:00:00'),
(3, 'P-00003', 'Vino Tinto', 'Vino tinto de 300ml', 60, 10, 50, '500.00', '900.00', '2024-02-15', '2024-02-15-02-55-40_vino_tinto.jpg', 1, 1, '2024-02-15 14:55:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'LÍQUIDO', '2024-02-11 00:00:00', '2024-02-11 23:23:23'),
(2, 'FRUTAS Y VERDURAS', '2024-02-11 22:06:01', '2024-02-11 23:21:48'),
(3, 'PLATOS PREPARADOS', '2024-02-11 22:11:14', '2024-02-12 14:56:50'),
(4, 'ELECTRODOMESTICOS', '2024-02-11 22:11:44', '0000-00-00 00:00:00'),
(5, 'VERDURAS', '2024-02-11 22:11:52', '0000-00-00 00:00:00'),
(6, 'MEDICAMENTOS', '2024-02-11 22:12:04', '0000-00-00 00:00:00'),
(7, 'BEBIDAS', '2024-02-11 22:13:56', '0000-00-00 00:00:00'),
(8, 'LIMPIEZA', '2024-02-11 23:16:19', '0000-00-00 00:00:00'),
(9, 'MASCOTAS', '2024-02-12 14:36:08', '2024-02-12 14:45:16'),
(10, 'DESPENSA', '2024-02-12 14:43:09', '2024-02-12 14:57:33'),
(11, 'ELECTRÓNICOS', '2024-02-12 17:30:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id_compra` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `comprobante` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_compras`
--

INSERT INTO `tb_compras` (`id_compra`, `producto_id`, `nro_compra`, `fecha_compra`, `proveedor_id`, `comprobante`, `usuario_id`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 1, 1, '2024-02-14', 1, 'FACTURA', 1, '800.00', 50, '2024-02-14 00:00:00', '2024-02-14 00:00:00'),
(2, 3, 2, '2024-02-16', 2, 'FACTURA NRO 10000-00001', 1, '8000.00', 10, '2024-02-16 15:18:31', '0000-00-00 00:00:00'),
(3, 3, 2, '2024-02-16', 2, 'FACTURA NRO 10000-00001', 1, '8000.00', 10, '2024-02-16 15:18:31', '0000-00-00 00:00:00'),
(4, 1, 4, '2024-02-16', 3, 'FACTURA NRO 10000-00002', 1, '8000.00', 10, '2024-02-16 15:26:41', '0000-00-00 00:00:00'),
(5, 3, 5, '2024-02-16', 2, 'FACTURA NRO 10000-00003', 1, '8000.00', 10, '2024-02-16 15:49:27', '0000-00-00 00:00:00'),
(6, 3, 6, '2024-02-16', 2, 'FACTURA NRO 10000-00005', 1, '8000.00', 10, '2024-02-16 15:54:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

CREATE TABLE `tb_proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_proveedores`
--

INSERT INTO `tb_proveedores` (`id_proveedor`, `nombre_proveedor`, `celular`, `telefono`, `empresa`, `email`, `direccion`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Pablo Martin Morrone', '38661609', '1145879687', 'MORRONE SHOP', 'morroneshop@mail.com', 'El Arreo 220 - (1738) La Reja', '2024-02-13 00:00:00', '2024-02-14 19:33:06'),
(2, 'Water trinidad', '1165889974', '1125778924', 'Walter Light', 'walter@gmail.com', 'Av. Rivadavia 10444 6 F', '2024-02-13 20:33:14', '0000-00-00 00:00:00'),
(3, 'Diego Martin Trinidad', '1166907858', '1170896987', 'Diego Gaseosas', 'diegoweb@gmail.com', 'Av. Rivadavia 10444 6 F', '2024-02-16 15:24:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'ADMINISTRADOR', '2024-02-11 00:00:00', '2024-02-11 00:00:00'),
(2, 'VENDEDOR', '2024-02-11 15:39:41', '2024-02-11 16:19:03'),
(3, 'CONTADOR', '2024-02-11 18:15:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password_user` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol_id` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombres`, `email`, `password_user`, `token`, `rol_id`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Pablo Martin Morrone', 'morronepablo@gmail.com', '$2y$10$4FrlJ5apIssyihxc4LiK0.OCHXqutv8b7l/Gp56h3ZrayzGMcSRDe', '', 1, '2024-02-11 00:00:00', '2024-02-11 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `proveedor_id` (`proveedor_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD CONSTRAINT `tb_almacen_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `tb_categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `tb_proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `tb_roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
