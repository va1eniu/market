CREATE DATABASE val;


USE val;

CREATE TABLE campers(
    id INT primary key AUTO_INCREMENT,
    NOMBRES VARCHAR (50) NOT NULL,
    direccion VARCHAR (50),
    logros VARCHAR (60)

);
CREATE TABLE categorias(
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50),
    imagen VARCHAR (60)

);

CREATE TABLE clientes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    celular VARCHAR(100) NOT NULL,
    compañia VARCHAR(100) NOT NULL 
);


CREATE TABLE empleados(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    celular INT(100) NOT null,
    direccion VARCHAR(100) NOT NULL,
    imagen VARCHAR(200) NOT NULL
);


CREATE TABLE facturas(
    id INT NOT NULL AUTO_INCREMENT,
    empleadoId INT,
    clienteId INT,
    fecha DATE,
    PRIMARY KEY(id),
    FOREIGN KEY (empleadoId) REFERENCES empleados(id),
    FOREIGN KEY (clienteId) REFERENCES clientes(id)
);


CREATE TABLE proveedores(

id INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(100) NOT NULL,
telefono INT (120) NOT NULL,
ciudad VARCHAR(100) NOT NULL

);
