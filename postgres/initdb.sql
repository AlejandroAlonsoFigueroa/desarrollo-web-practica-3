--create user myuser with password 'mypass';
CREATE USER myuser;
CREATE DATABASE mydb;

GRANT ALL PRIVILEGES ON DATABASE mydb TO myuser;

CREATE TABLE empleado
(
	clave integer,
	nombre character varying,
	direccion character varying,
	telefono character varying,
	CONSTRAINT pk_clave PRIMARY KEY (clave) 
);

CREATE TABLE USUARIOS(
	id integer,
	username  character varying unique,
	password character varying,
	CONSTRAINT pk_id_usuario PRIMARY KEY (id) 
);

INSERT INTO USUARIOS(id, username, password) VALUES(1, 'alejandro', 'contraCuenta');