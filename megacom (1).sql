-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2023 a las 20:24:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `megacom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `Telefono` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id`, `cedula`, `nombre`, `apellido`, `correo`, `Telefono`) VALUES
(1, 98512424, 'Juan Manuel', 'Usme', 'admin@admin', 3103735388),
(2, 1036254081, 'Felipe', 'Gallego', 'jfusme@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_compra` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `compras`
--
DELIMITER $$
CREATE TRIGGER `act` AFTER INSERT ON `compras` FOR EACH ROW BEGIN
UPDATE stocks SET stocks.Cantidad = stocks.Cantidad + NEW.cantidad, stocks.Precio = NEW.valor_compra
WHERE stocks.producto = NEW.producto;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sumarcant` AFTER INSERT ON `compras` FOR EACH ROW BEGIN
Update productos
set productos.existencias = productos.existencias + NEW.cantidad, 
productos.precio_base = NEW.valor_compra, productos.precio_de_venta = NEW.valor_compra / 0.8, productos.ganancia = productos.precio_de_venta - NEW.valor_compra
where productos.id_producto = NEW.producto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `Id_factura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL,
  `Descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_compras`
--

CREATE TABLE `facturas_compras` (
  `numero_factura` int(11) NOT NULL,
  `factura` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas_compras`
--

INSERT INTO `facturas_compras` (`numero_factura`, `factura`) VALUES
(1, '2201255');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `numero_pedido` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_relizacion_pedido` date NOT NULL,
  `fecha_entrega_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(15) NOT NULL,
  `precio_base` int(11) NOT NULL,
  `precio_de_venta` int(11) NOT NULL,
  `ganancia` int(11) NOT NULL,
  `existencias` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `usuario` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `productos`
--
DELIMITER $$
CREATE TRIGGER `entradas_A_I` AFTER INSERT ON `productos` FOR EACH ROW BEGIN 
INSERT INTO stocks(producto, Cantidad, Precio, usuario) VALUES (new.id_producto,new.existencias,new.precio_base,new.usuario);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nit` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(15) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nit`, `nombre`, `correo`, `direccion`, `ciudad`, `telefono`) VALUES
(1, 1012062481, 'USMESAS', '', 'calle 46#52-67', 'Rionegro', '311640286'),
(2, 98512424, 'USMESAS', 'jfusme@gmail.com', 'calle 46#52-67', 'Rionegro', '311640286'),
(19, 1036254081, 'USMESAS', 'juanfusme@gmail.com', 'calle 46#52-67', 'Rionegro', '3116405286');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE `stocks` (
  `Id_stock` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`Id_stock`, `Cantidad`, `Precio`, `producto`, `usuario`) VALUES
(3, 61, 100000, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `correo`, `contraseña`, `rol`) VALUES
(1, 'j', 'admin@admin', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `factura` (`factura`),
  ADD KEY `comprasfk1` (`proveedor`),
  ADD KEY `comprasfk3` (`producto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `facturasfk1` (`Id_producto`),
  ADD KEY `facturasfk2` (`Cedula`);

--
-- Indices de la tabla `facturas_compras`
--
ALTER TABLE `facturas_compras`
  ADD PRIMARY KEY (`numero_factura`),
  ADD UNIQUE KEY `numero_factura` (`numero_factura`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`numero_pedido`),
  ADD KEY `pedidosfk1` (`Id_producto`),
  ADD KEY `pedidosfk2` (`cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `productosfk1` (`proveedor`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`Id_stock`),
  ADD KEY `stocksfk1` (`producto`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `ventasfk1` (`cliente`),
  ADD KEY `ventasfk2` (`productos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `numero_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `Id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `comprasfk1` FOREIGN KEY (`proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `comprasfk2` FOREIGN KEY (`factura`) REFERENCES `facturas_compras` (`numero_factura`),
  ADD CONSTRAINT `comprasfk3` FOREIGN KEY (`producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturasfk1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturasfk2` FOREIGN KEY (`Cedula`) REFERENCES `clientes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidosfk1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidosfk2` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productosfk1` FOREIGN KEY (`proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocksfk1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventasfk1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventasfk2` FOREIGN KEY (`productos`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
