CREATE DATABASE bdproductos;

CREATE TABLE IF NOT EXISTS producto (
  codigo int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(120) DEFAULT NULL,
  descripcion VARCHAR(1024) DEFAULT NULL,
  precio int(255) DEFAULT NULL,
  imagen mediumblob DEFAULT NULL,
  PRIMARY KEY (codigo)
);

CREATE TABLE IF NOT EXISTS carrito_usuarios(
    id_sesion VARCHAR(255) NOT NULL,
    id_producto int (11) NOT NULL,
    contador int (11) NOT NULL
);

CREATE TABLE IF NOT EXISTS usuario (
  id int(11) NOT NULL AUTO_INCREMENT,
  usuario varchar(120) DEFAULT NULL,
  clave int(120) DEFAULT NULL,
  nombre varchar(120) DEFAULT NULL,
  rol varchar(120) DEFAULT NULL,
  PRIMARY KEY (id)
  );

CREATE TABLE IF NOT EXISTS formulario (
  nombre varchar(120) DEFAULT NULL,
  correo varchar(120) DEFAULT NULL,
  celular BigInt(255) DEFAULT NULL,
  problema varchar(120) DEFAULT NULL
  );


INSERT INTO formulario (nombre, correo, celular, problema) VALUES ('nombre', 'correo', 3117663705, 'problema');
INSERT INTO producto (nombre, descripcion, precio, imagen) VALUES ('nombre', 'descripcion', 1111, 'imagen');
INSERT INTO usuario (usuario, clave, nombre, rol) values ('usuario', 123, 'nombre', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('DanielN21', 123, 'Daniel', 'admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('FelipeN22', 124, 'Felipe', 'admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('ManuelN23', 125, 'Manuel', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('AndresN24', 126, 'Andres', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('AndreaN26', 128, 'Andrea', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('Yeisordo27', 129, 'Yesion', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('LuisaN21', 112, 'Luisa', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('FernandaN60', 113, 'Fernanda', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('LauraN61', 116, 'Laura', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('LinaN29', 133, 'Lina', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('JulianaN28', 135, 'Juliana', 'no-admin');
INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('CarlosN73', 143, 'Carlos', 'no-admin');