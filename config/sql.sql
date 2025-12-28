

create database pipecel;
use pipecel;



CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio_compra DECIMAL(10,2) NOT NULL,
    precio_venta DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    estado ENUM('activo','inactivo') DEFAULT 'activo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);


CREATE TABLE producto_imagenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT,
    imagen_principal VARCHAR(255),
    imagen_secundaria VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

CREATE TABLE cajas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    descripcion VARCHAR(100),
    estado ENUM('libre','ocupada') DEFAULT 'libre'
);


CREATE TABLE reparaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- Datos del cliente
    nombre_cliente VARCHAR(100),
    telefono_cliente VARCHAR(20),
    -- Ubicación física
    caja_id INT,
    -- Datos del celular
    marca VARCHAR(50),
    modelo VARCHAR(50),
    descripcion_falla TEXT,
    -- Pagos
    valor_total DECIMAL(10,2) NOT NULL,
    abono DECIMAL(10,2) DEFAULT 0,
    -- Estado del arreglo
    estado ENUM('en_proceso','arreglado','entregado')
        DEFAULT 'en_proceso',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (caja_id) REFERENCES cajas(id)
);












