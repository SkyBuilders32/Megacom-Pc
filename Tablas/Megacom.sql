CREATE DATABASE Megacom;

CREATE TABLE proveedores(
    id_proveedor INT PRIMARY KEY AUTO_INCREMENT,
    Nit INT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    ciudad VARCHAR(15) NOT NULL,
    telefono VARCHAR(50) NOT NULL
    );

CREATE TABLE productos(
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(15) NOT NULL,
    modelo VARCHAR(15) NOT NULL,
    precio_base INT NOT NULL,
    precio_descuento INT NOT NULL,
    existencias INT NOT NULL,
    disponibilidad VARCHAR(2) NOT NULL CHECK (disponibilidad in ('SI', 'NO')), 
    descripcion VARCHAR(150) NOT NULL
    );

CREATE TABLE pedidos(
    numero_pedido INT PRIMARY KEY AUTO_INCREMENT,
    fecha_pedido DATE NOT NULL,
    cantidad INT NOT NULL
    );

CREATE TABLE clientes (
  cedula INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido varchar(50),
  correo varchar(50)
);
CREATE TABLE facturas (
  Id_factura INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Descripcion VARCHAR(150) NOT NULL, 
  valor_total INT NOT NULL,
  id_producto  INT NOT NULL,
  cedula INT NOT NULL
);


ALTER TABLE facturas ADD CONSTRAINT facturasfk1 FOREIGN KEY(id_producto) REFERENCES productos(id_producto) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE facturas ADD CONSTRAINT facturasfk2 FOREIGN KEY(cedula) REFERENCES clientes(cedula) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE productos ADD CONSTRAINT productosfk1 FOREIGN KEY(id_proveedor) REFERENCES proveedores(id_proveedor) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE pedidos ADD CONSTRAINT pedidosfk2 FOREIGN KEY(cliente) REFERENCES clientes(cedula) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE pedidos ADD CONSTRAINT pedidosfk1 FOREIGN KEY(id_producto) REFERENCES productos(id_producto) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE facturas ADD CONSTRAINT facturasfk1 FOREIGN KEY(id_carrera) REFERENCES carrera(id) ON UPDATE CASCADE ON DELETE CASCADE; 