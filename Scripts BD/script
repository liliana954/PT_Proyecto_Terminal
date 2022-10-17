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

CREATE TABLE servicio (
	id_servicio INTEGER NOT NULL AUTO_INCREMENT,
    nombre_servicio VARCHAR(75) NOT NULL,
    descripcion VARCHAR(250) NOT NULL,
    PRIMARY KEY (id_servicio)
);

CREATE TABLE estatus_contacto(
	id_estatus INTEGER NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(50),
    PRIMARY KEY (id_estatus)
);

CREATE TABLE entrada_contacto (
	id_entrada_contacto INTEGER NOT NULL AUTO_INCREMENT,
    nombre_cliente VARCHAR(80) NOT NULL,
    correo VARCHAR(75) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    mensaje TEXT,
    id_tipo_servicio INTEGER NOT NULL,
    id_estatus INTEGER NOT NULL,
    id_empleado INTEGER NOT NULL,
    PRIMARY KEY (id_entrada_contacto),
    FOREIGN KEY(id_tipo_servicio) REFERENCES servicio(id_servicio),
    FOREIGN KEY(id_estatus) REFERENCES estatus_contacto(id_estatus),
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado)
);

CREATE TABLE domicilio (
	id_domicilio INTEGER NOT NULL AUTO_INCREMENT,
    calle VARCHAR(70) NOT NULL,
    numero_exterior VARCHAR(30),
    numero_interior VARCHAR(30),
    ciudad VARCHAR(70) NOT NULL,
    municipio VARCHAR(70) NOT NULL,
    estado VARCHAR(70) NOT NULL,
    codigo_postal INTEGER NOT NULL,
    id_empleado INTEGER NOT NULL,
    PRIMARY KEY(id_domicilio),
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado)
);

CREATE TABLE cliente (
	id_cliente INTEGER NOT NULL AUTO_INCREMENT,
    razon_social VARCHAR(75),
    persona_responsable VARCHAR(50),
    telefono VARCHAR(15) NOT NULL,
    correo VARCHAR(75),
    calle VARCHAR(50),
    numero_interior VARCHAR(10),
    numero_exterior VARCHAR(10),
    colonia VARCHAR(50),
    municipio VARCHAR(50),
    estado VARCHAR(50),
    activo BOOLEAN,
    id_entrada_contacto INTEGER,
    PRIMARY KEY (id_cliente),
    FOREIGN KEY(id_entrada_contacto) REFERENCES entrada_contacto(id_entrada_contacto)
);

CREATE TABLE fase_proyecto (
	id_fase_proyecto INTEGER NOT NULL AUTO_INCREMENT,
    nombre_fase VARCHAR(75),
    PRIMARY KEY(id_fase_proyecto)
);

CREATE TABLE proyecto (
	id_proyecto INTEGER NOT NULL AUTO_INCREMENT,
    titulo_proyecto VARCHAR(150) NOT NULL,
    url VARCHAR(150),
    descripcion TEXT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE,
    activo BOOLEAN,
    id_cliente INTEGER NOT NULL,
    id_fase_proyecto INTEGER NOT NULL,
    PRIMARY KEY(id_proyecto),
    FOREIGN KEY(id_cliente) REFERENCES cliente(id_cliente),
    FOREIGN KEY(id_fase_proyecto) REFERENCES fase_proyecto(id_fase_proyecto)
);

CREATE TABLE estado_tarea (
	id_estado_tarea INTEGER NOT NULL AUTO_INCREMENT,
    nombre_estado VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_estado_tarea)
);

CREATE TABLE nivel_prioridad (
	id_nivel_prioridad INTEGER NOT NULL AUTO_INCREMENT,
    nombre_prioridad VARCHAR(75),
    PRIMARY KEY(id_nivel_prioridad)
);

CREATE TABLE tarea_proyecto (
	id_tarea INTEGER NOT NULL AUTO_INCREMENT,
    nombre_tarea VARCHAR(150) NOT NULL,
    descripcion TEXT,
    id_proyecto INTEGER NOT NULL,
    horas_estimadas INTEGER,
    fecha_inicio DATE,
    fecha_fin DATE,
    id_estado_tarea INTEGER NOT NULL,
    id_nivel_prioridad INTEGER NOT NULL,
    id_empleado INTEGER NOT NULL,
    PRIMARY KEY(id_tarea),
    FOREIGN KEY(id_proyecto) REFERENCES proyecto(id_proyecto),
    FOREIGN KEY(id_estado_tarea) REFERENCES estado_tarea(id_estado_tarea),
    FOREIGN KEY(id_nivel_prioridad) REFERENCES nivel_prioridad(id_nivel_prioridad),
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado)
);

CREATE TABLE estatus_subtarea (
	id_estatus_subtarea INTEGER NOT NULL AUTO_INCREMENT,
    nombre_estatus VARCHAR(30) NOT NULL,
    PRIMARY KEY(id_estatus_subtarea)
);

CREATE TABLE subtarea_proyecto (
	id_subtarea INTEGER NOT NULL AUTO_INCREMENT,
    nombre_subtarea VARCHAR(150),
    descripcion Text,
    fecha DATETIME NOT NULL,
    horas_trabajadas INTEGER,
    id_estatus INTEGER NOT NULL,
    id_tarea INTEGER NOT NULL,
    PRIMARY KEY(id_subtarea),
    FOREIGN KEY(id_estatus) REFERENCES estatus_subtarea(id_estatus_subtarea),
    FOREIGN KEY(id_tarea) REFERENCES tarea_proyecto(id_tarea)
);


/*INSERT*/
INSERT INTO tipo_usuario (descripcion) VALUES('Administrador'),('Empleado'),('Pruebas');
INSERT INTO rol_empleado (descripcion, activo) VALUES('Desarrollador BackEnd', true), ('Desarrollador FrontEnd', true), ('Desarrollador Full Stack', true), ('Ingeniero de servicios', true);
INSERT INTO servicio (nombre_servicio, descripcion) VALUES('Desarrollo y mantenimiento de sitios', 'Desarrollos de sistemas, sitios, aplicación móvil y de Voz.'),('Arrendamiento de equipos', 'Herramienta estratégica para el desarrollo, modernización y competitividad de las empresas.'),
('Impresoras / Consumibles', 'Alquiler y venta de impresoras y consumibles'), ('Instalación de cámaras', 'Servicio de instalación');
INSERT INTO estatus_contacto (descripcion) VALUES ('Pendiente'), ('Revisado'), ('Aceptado'), ('Rechazado');
INSERT INTO fase_proyecto (nombre_fase) VALUES ('Estudio del cliente'),('Requerimientos'),('Análisis y diseño'),('Codificación'),('Pruebas'),('Implementación');
INSERT INTO estatus_subtarea (nombre_estatus) VALUES ('En consideración'), ('En progreso'),('Terminado');
INSERT INTO estado_tarea (nombre_estado) VALUES ('En consideración'),('En análisis y diseño'),('En desarrollo'),('Pruebas calidad'),('Liberación de código'),('Post-Implementación');
INSERT INTO nivel_prioridad (nombre_prioridad) VALUES ('Bajo'),('Medio'),('Alto');