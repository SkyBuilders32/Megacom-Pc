-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2024 a las 03:51:46
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_detalle_temp` (IN `id_product` INT, IN `cantidad` INT, IN `token_user` VARCHAR(50))   BEGIN
	DECLARE precio_actual int;
    SELECT precio_de_venta INTO precio_actual FROM productos WHERE id_producto = id_product;
    
    INSERT INTO detalle_temp(token_user,producto,cantidad,precio_de_venta) VALUES (token_user,id_product,cantidad,precio_actual);
    
    SELECT tmp.correlativo, tmp.producto, p.modelo, tmp.cantidad, tmp.precio_de_venta FROM detalle_temp tmp
    INNER JOIN productos p 
    on tmp.producto = p.id_producto
    WHERE tmp.token_user = token_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_detalle_temp` (`id_detalle` INT, `token` VARCHAR(50))   BEGIN
DELETE FROM detalle_temp WHERE correlativo = id_detalle;

SELECT tmp.correlativo, tmp.producto, p.modelo, tmp.cantidad, tmp.precio_de_venta FROM detalle_temp tmp
INNER JOIN productos p
ON tmp.producto = p.id_producto
WHERE tmp.token_user = token;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procesar_venta` (IN `cod_usuario` INT, IN `cod_cliente` INT, IN `token` VARCHAR(50))   BEGIN
DECLARE factura INT;

DECLARE registros INT;
DECLARE total int;

DECLARE nueva_existencia int;
DECLARE existencia_actual int;

DECLARE tmp_cod_producto int;
DECLARE tmp_cant_producto int;
DECLARE a int;
SET a = 1;

CREATE TEMPORARY TABLE tbl_tmp_tokenuser(
		id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cod_prod BIGINT,
    cant_prod int);
    
SET registros = (SELECT COUNT(*) FROM detalle_temp WHERE token_user = token);
IF registros > 0 THEN 
	INSERT INTO tbl_tmp_tokenuser(cod_prod, cant_prod) SELECT producto,cantidad FROM detalle_temp WHERE token_user = token;
    
    INSERT INTO facturas(usuario,cliente) VALUES (cod_usuario, cod_cliente);
    SET factura = LAST_INSERT_ID();
    
    INSERT INTO detallefactura(nofactura,producto,cantidad,precio_de_venta) SELECT (factura) AS nofactura, producto, cantidad, precio_de_venta FROM detalle_temp WHERE token_user = token; 
    
   WHILE a <= registros DO
    SELECT cod_prod,cant_prod INTO tmp_cod_producto, tmp_cant_producto FROM tbl_tmp_tokenuser WHERE id = a;
    SELECT existencias INTO existencia_actual FROM productos WHERE id_producto = tmp_cod_producto;
    
    SET nueva_existencia = existencia_actual - tmp_cant_producto;
    UPDATE productos SET existencias = nueva_existencia WHERE id_producto = tmp_cod_producto;
    
    set a = a+1;
    
    END WHILE;
    
    SET total = (SELECT SUM(cantidad * precio_de_venta) FROM detalle_temp WHERE token_user = token);
    UPDATE facturas SET totalfactura = total where Id_factura = factura;
    
    DELETE from detalle_temp WHERE token_user = token;
    TRUNCATE TABLE tbl_tmp_tokenuser;
    SELECT * FROM facturas WHERE Id_factura = factura;
ELSE
SELECT 0;
END IF;
END$$

DELIMITER ;

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
(1, 1, 'CF', 'CF', 'X', 0),
(2, 1036254082, 'Adriana', 'Gallego', 'pau@gmail.com', 3012979608),
(3, 1234556, 'Usme', 'Gallego', 'juanfusme@gmail.com', 3027439430),
(4, 43295402, 'Usme', 'Gallego', 'pau@gmail.com', 4294967295),
(5, 1036254081, 'Juan Felipe', 'Usme Gallego', 'jfusme@gmail.com', 3116405286),
(13, 103254081, 'Juan Felipe', 'Usme Gallego', 'jfusme@gmail.com', 3116405286),
(14, 98512424, 'Juan Manuel', 'Usme', 'jm@gmail.com', 3103735388),
(15, 103254081, '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL DEFAULT current_timestamp(),
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_compra` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `fecha_compra`, `producto`, `cantidad`, `valor_compra`, `proveedor`, `factura`) VALUES
(1, '2023-11-14', 2, 10, 1000000, 1, 1),
(2, '2023-11-14', 1, 10, 2000000, 1, 0),
(3, '2023-12-06', 1, 100, 1, 1, 1),
(4, '2023-12-07', 1, 20, 100000, 1, 0),
(5, '2023-12-07', 1, 10, 10, 1, 0),
(6, '2023-12-07', 2, 5, 2000000, 1, 1),
(7, '2023-12-07', 1, 10, 1000000, 1, 0);

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
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` text NOT NULL,
  `iva` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nit`, `nombre`, `razon_social`, `telefono`, `email`, `direccion`, `iva`) VALUES
(1, '43764177', 'MEGACOM', '', 3103735388, 'megacompc@gmail.com', 'calle 10 bb # 33-21', '19.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `correlativo` int(11) NOT NULL,
  `nofactura` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_de_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`correlativo`, `nofactura`, `producto`, `cantidad`, `precio_de_venta`) VALUES
(1, 1, 1, 1, 13),
(2, 2, 1, 8, 13),
(3, 3, 1, 1, 13),
(4, 4, 1, 1, 13),
(5, 5, 2, 4, 2500000),
(6, 5, 1, 2, 1250000),
(8, 6, 1, 1, 1250000),
(9, 7, 1, 1, 1250000),
(10, 8, 2, 1, 2500000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `correlativo` int(11) NOT NULL,
  `token_user` varchar(50) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_de_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `Id_factura` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `totalfactura` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`Id_factura`, `fecha`, `usuario`, `cliente`, `totalfactura`, `estatus`) VALUES
(1, '2023-12-07 00:33:42', 1, 1, 13, 1),
(2, '2023-12-07 00:34:31', 1, 13, 104, 1),
(3, '2023-12-07 00:36:00', 1, 1, 13, 1),
(4, '2023-12-07 00:42:24', 1, 1, 13, 1),
(5, '2023-12-07 18:12:39', 1, 14, 12500000, 1),
(6, '2024-01-04 21:39:19', 1, 13, 1250000, 1),
(7, '2024-01-13 21:50:59', 1, 5, 1250000, 1),
(8, '2024-01-13 21:53:10', 1, 14, 2500000, 1);

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
(0, '232425'),
(1, '232425');

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
  `precio_base` int(11) NOT NULL DEFAULT 0,
  `precio_de_venta` int(11) NOT NULL DEFAULT 0,
  `ganancia` int(11) NOT NULL DEFAULT 0,
  `existencias` int(11) NOT NULL DEFAULT 0,
  `descripcion` varchar(150) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `usuario` int(11) NOT NULL,
  `date_add` date NOT NULL DEFAULT current_timestamp(),
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `marca`, `modelo`, `precio_base`, `precio_de_venta`, `ganancia`, `existencias`, `descripcion`, `proveedor`, `imagen`, `usuario`, `date_add`, `estatus`) VALUES
(1, 'ASUS', 'ROG GALAXY', 1000000, 1250000, 250000, 5, 'OK', 1, 'IMAGENES/IMAGES.JPEG', 1, '2023-12-07', 1),
(2, 'HP', 'ALL-IN-ONE', 2000000, 2500000, 500000, 0, 'OK', 1, 'imagenes/images (1).jpeg', 1, '2023-12-07', 1);

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
(1, 43764177, 'Juan Manuel', 'JMUSME@GMAIL.COM', 'CALLE 46#52-67', 'RIONEGRO', '3103735388');

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
(1, 20, 1000000, 1, 1),
(2, 5, 2000000, 2, 1);

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
(1, 'admin', 'admin@admin', '1234', 1);

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
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`correlativo`),
  ADD KEY `producto` (`producto`),
  ADD KEY `nofactura` (`nofactura`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`correlativo`),
  ADD KEY `producto` (`producto`),
  ADD KEY `nofactura` (`token_user`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `usuario` (`usuario`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `correlativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `correlativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `numero_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `Id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`nofactura`) REFERENCES `facturas` (`Id_factura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
