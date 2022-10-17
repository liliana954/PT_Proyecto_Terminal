CREATE DATABASE siatechmx;

CREATE TABLE tipo_usuario (
  id_tipo_usuario  INTEGER NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(30) NOT NULL,
  PRIMARY KEY (id_tipo_usuario)
);

CREATE TABLE usuario (
	id_usuario INTEGER NOT NULL AUTO_INCREMENT,
    nombre_usuario VARCHAR(15) NOT NULL,
    contra_usuario VARCHAR(20) NOT NULL,
    id_tipo_usuario INTEGER NOT NULL,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_tipo_usuario) REFERENCES tipo_usuario(id_tipo_usuario)
);

CREATE TABLE rol_empleado (
	id_rol_empleado INTEGER NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(50) NOT NULL,
    activo BOOLEAN NOT NULL,
    PRIMARY KEY (id_rol_empleado)
);

CREATE TABLE empleado (
	id_empleado INTEGER NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    apellido_paterno VARCHAR(30) NOT NULL,
    apellido_materno VARCHAR(30) NOT NULL,
    rfc VARCHAR(13) NOT NULL,
    curp VARCHAR(18) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    correo VARCHAR(75) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    activo BOOLEAN NOT NULL,
    id_rol_empleado INTEGER NOT NULL,
    id_usuario INTEGER NOT NULL,
    PRIMARY KEY (id_empleado),
    FOREIGN KEY (id_rol_empleado) REFERENCES rol_empleado(id_rol_empleado),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

INSERT INTO tipo_usuario (descripcion) VALUES('Administrador'),('Empleado'),('Pruebas');
INSERT INTO rol_empleado (descripcion, activo) VALUES('Desarrollador BackEnd', true), ('Desarrollador FrontEnd', true), ('Desarrollador Full Stack', true), ('Ingeniero de servicios', true);