CREATE DATABASE IF NOT EXISTS tickets_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tickets_db;

CREATE TABLE IF NOT EXISTS ticket (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    titulo      VARCHAR(150) NOT NULL,
    descripcion TEXT         NOT NULL,
    estado      VARCHAR(20)  NOT NULL DEFAULT 'pendiente'
);

INSERT INTO ticket (titulo, descripcion, estado) VALUES
('Ticket de prueba', 'Dato de ejemplo para verificar la tabla', 'pendiente');
