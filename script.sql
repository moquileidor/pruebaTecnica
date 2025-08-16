-- Crear la base de datos 
CREATE DATABASE prueba_tecnica;

-- Usar la base de datos
USE prueba_tecnica;

-- Crear la tabla de empleados
CREATE TABLE empleados (
    idEmpleado INT PRIMARY KEY AUTO_INCREMENT,
    nombreCompletoEmpleado VARCHAR(100) NOT NULL,
    cargoEmpleado VARCHAR(50) NOT NULL,
    correoElectronicoEmpleado VARCHAR(100) NOT NULL,
    fechaIngresoEmpleado DATE NOT NULL
);