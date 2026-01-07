create database pipecel;
use pipecel;


-- 1. Tabla para Tipos de Usuario (Roles)
CREATE TABLE tipos_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE, -- 'Administrador', 'Técnico', etc.
    descripcion VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabla de Usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Siempre guardar con password_hash()
    estado ENUM('activo', 'inactivo') DEFAULT 'activo',
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (tipo_id) REFERENCES tipos_usuario(id)
);


CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('activo', 'inactivo') DEFAULT 'activo'
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT,
    codigo VARCHAR(50) UNIQUE,
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
    nombre varchar(50) NOT NULL,
    descripcion VARCHAR(100),
    estado ENUM('libre','ocupada') DEFAULT 'libre'
);

select * from cajas;


CREATE TABLE reparaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(100),
    telefono_cliente VARCHAR(20),
    caja_id INT,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    descripcion_falla TEXT,
    valor_total DECIMAL(10,2) NOT NULL,
    abono DECIMAL(10,2) DEFAULT 0,
    costo_repuestos DECIMAL(10,2) DEFAULT 0,
    estado ENUM('en_proceso','arreglado','entregado') DEFAULT 'en_proceso',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (caja_id) REFERENCES cajas(id)
);




-- cajas sujerias para ingresar al inicio 
INSERT INTO cajas (nombre) VALUES
('Caja 1'),
('Caja 2'),
('Caja 3'),
('Caja 4'),
('Caja 5'),
('Caja 6'),
('Caja 7'),
('Caja 8'),
('Caja 9'),
('Caja 10');

-- insert de categorias sugerdo 
INSERT INTO categorias (nombre, descripcion) VALUES 
('Accesorios de Carga', 'Cables USB, adaptadores de pared, cargadores para auto y bases inalámbricas.'),
('Audio y Sonido', 'Audífonos Bluetooth, diademas, parlantes y manos libres.'),
('Protección y Estética', 'Estuches (covers), vidrios templados, micas de gel y protectores de cámara.'),
('Repuestos - Pantallas', 'Displays LCD, OLED, AMOLED y táctiles para diferentes modelos.'),
('Repuestos - Baterías', 'Baterías internas y externas para smartphones.'),
('Componentes Internos', 'Pines de carga, flex de botones, cámaras, micrófonos y altavoces.'),
('Teléfonos Móviles', 'Equipos celulares nuevos, seminuevos y para repuestos.'),
('Almacenamiento', 'Tarjetas Micro SD, memorias USB y unidades de estado sólido.'),
('Herramientas Técnicas', 'Insumos para el taller: estaño, flux, destornilladores, etc.');











