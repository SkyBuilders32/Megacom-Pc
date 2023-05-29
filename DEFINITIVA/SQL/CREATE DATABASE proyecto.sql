CREATE DATABASE proyecto;

CREATE TABLE registro(

Id INT PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR(30) NOT NULL,
Correo VARCHAR(30) NOT NULL,
Contraseña VARCHAR(50) NOT NULL)

CREATE TABLE fabricant es(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    telefono VARCHAR(50) NOT NULL);

CREATE TABLE productos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_fabricante INT NOT NULL,
    id_producto INT NOT NULL,
    descripcion VARCHAR(15) NOT NULL,
    precio FLOAT NOT NULL,
    existencias INT NOT NULL);
CREATE TABLE pedidos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero_pedido INT NOT NULL,
    fecha_pedido DATE NOT NULL,
    id_cliente INT NOT NULL,
    id_empleado INT NOT NULL,
    id_fabricante VARCHAR(7) NOT NULL,
    producto VARCHAR(10) NOT NULL,
    cantidad INT NOT NULL,
    importe FLOAT NOT NULL);
CREATE TABLE oficinas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    oficina INT NOT NULL,
    ciudad VARCHAR(30) NOT NULL,
    region VARCHAR(20) NOT NULL,
    direccion VARCHAR(50),
    objetivo FLOAT,
    ventas FLOAT);

CREATE TABLE Estudiantes(
id INT PRIMARY KEY AUTO_INCREMENT,
Matricula INT,
Nombre VARCHAR(50) NOT NULL,
Direccion VARCHAR(45) NOT NULL,
Numero INT NOT NULL,
Carrera VARCHAR(45) NOT NULL);

CREATE TABLE Materias(
Num_Materia INT PRIMARY KEY AUTO_INCREMENT,
Materia VARCHAR(50) NOT NULL);

ALTER TABLE Materias ADD CONSTRAINT Materias_fk1 FOREIGN KEY (Matricula) REFERENCES Estudiantes(Matricula) ON DELETE CASCADE ON UPDATE CASCADE;

-- normalizacion
CREATE TABLE clientes (
  id_cliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido varchar(50),
  cedula varchar(50),
  correo varchar(50)
);

CREATE TABLE habitaciones (
  id_habitacion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  disponibilidad VARCHAR(50) NOT NULL
);

CREATE TABLE reservas (
  id_reserva INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  fecha VARCHAR(50) NOT NULL,
  vigencia VARCHAR(50) NOT NULL
);

CREATE TABLE sede (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  direccion VARCHAR(50),
  codigo VARCHAR(50)
);

CREATE TABLE carrera (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  codigo VARCHAR(50) NOT NULL
);

CREATE TABLE alumno_curso (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_curso INT NOT NULL,
  id_alumno INT NOT NULL
);

CREATE TABLE docente_curso (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_docente INT NOT NULL,
  id_curso INT NOT NULL
);

CREATE TABLE curso_carrera (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_curso INT NOT NULL,
  id_carrera INT NOT NULL
);

CREATE TABLE sede_carrera (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_sede INT NOT NULL,
  id_carrera INT NOT NULL
);

ALTER TABLE alumno_curso ADD CONSTRAINT alumno_cursofk1 FOREIGN KEY(id_alumno) REFERENCES alumno(id) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE alumno_curso ADD CONSTRAINT alumno_cursofk2 FOREIGN KEY(id_curso) REFERENCES curso(id) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE docente_curso ADD CONSTRAINT docente_cursofk1 FOREIGN KEY(id_docente) REFERENCES docente(id) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE docente_curso ADD CONSTRAINT docente_cursofk2 FOREIGN KEY(id_curso) REFERENCES curso(id) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE curso_carrera ADD CONSTRAINT curso_carrerafk1 FOREIGN KEY(id_curso) REFERENCES curso(id) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE curso_carrera ADD CONSTRAINT curso_carrerafk2 FOREIGN KEY(id_carrera) REFERENCES carrera(id) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE sede_carrera ADD CONSTRAINT sede_carrerafk1 FOREIGN KEY(id_sede) REFERENCES sede(id) ON UPDATE CASCADE ON DELETE CASCADE; 
ALTER TABLE sede_carrera ADD CONSTRAINT sede_carrerafk2 FOREIGN KEY(id_carrera) REFERENCES carrera(id) ON UPDATE CASCADE ON DELETE CASCADE;