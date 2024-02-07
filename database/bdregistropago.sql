CREATE DATABASE IF NOT EXISTS `bdregistropago` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdregistropago`;

-- Tabla cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `NoFactura` INT AUTO_INCREMENT,
  `Nombre` VARCHAR(75) NOT NULL,
  `Apellido` VARCHAR(75) NOT NULL,
  `Direccion` VARCHAR(150) NOT NULL,
  `Dui` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`NoFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla registro
DROP TABLE IF EXISTS `registro`;
CREATE TABLE `registro` (
  `NoFactura` INT AUTO_INCREMENT,
  `Nombre` VARCHAR(75) NOT NULL,
  `Apellido` VARCHAR(75) NOT NULL,
  `Fecha` VARCHAR(200) NOT NULL,
  `Monto` DECIMAL(10,2) NOT NULL,
  `CantidaMeses` VARCHAR(255) NOT NULL,
  `Concepto` VARCHAR(255) NOT NULL,
  `Dui` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`NoFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

-- Tabla usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
    `IdUsuario` INT NOT NULL,
    `Usuario` VARCHAR(50) NOT NULL,
    `Clave` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla admin
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `IdUsuario` INT NOT NULL,
    `UserAdmin` VARCHAR(50) NOT NULL,
    `Password` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla cantidad_acumulada
DROP TABLE IF EXISTS `cantidad_acumulada`;
CREATE TABLE `cantidad_acumulada` (
    `id` INT AUTO_INCREMENT,
    `fecha_actualizacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `cantidad` DECIMAL(10, 2) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insertar la cantidad inicial acumulada
INSERT INTO cantidad_acumulada (cantidad) VALUES (0);

-- Tabla resta_acumulada
DROP TABLE IF EXISTS `resta_acumulada`;
CREATE TABLE `resta_acumulada` (
    `id` INT AUTO_INCREMENT,
    `fecha_actualizacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `cantidad_resta` DECIMAL(10, 2) DEFAULT 0,
    `concepto` VARCHAR(250) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insertar la cantidad inicial de la resta acumulada
INSERT INTO resta_acumulada (cantidad_resta) VALUES (0);

-- Crear un TRIGGER para actualizar la cantidad acumulada después de cada inserción en la tabla registro
DELIMITER //
CREATE TRIGGER actualizar_cantidad_acumulada AFTER INSERT ON registro
FOR EACH ROW
BEGIN
    UPDATE cantidad_acumulada
    SET cantidad = cantidad + NEW.Monto;
END //
DELIMITER ;

-- Crea el nuevo trigger
DELIMITER //
CREATE TRIGGER actualizar_resta_acumulada BEFORE INSERT ON resta_acumulada
FOR EACH ROW
BEGIN
    DECLARE cantidad_a_restar DECIMAL(10, 2);
    SET cantidad_a_restar = NEW.cantidad_resta;

    UPDATE cantidad_acumulada
    SET cantidad = cantidad - cantidad_a_restar;
END //
DELIMITER ;

-- Insertar los datos encriptados en la tabla usuarios
INSERT INTO usuario (IdUsuario, Usuario, Clave)
VALUES
    (1, 'AGUAADMIN', 'capvi.art3334'),
    (2, 'COMITEDEAGUA', '15demayode1998');

insert into user (IdUsuario, UserAdmin, Password)
values (1, 'acaapli', '*acaapliadmin24');

commit;