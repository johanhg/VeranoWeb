create table usuarios(
	nombreUsuario varchar(50) not null,
	nombre varchar(50) not null,
	apellido1 varchar(50) not null,
	apellido2 varchar(50) not null,
	contrasena varchar(50) not null,
	email varchar(50) not null,
	numeroTelefono varchar(50) not null,
	codigoArea varchar(50) not null,
	constraint primary_key primary key (nombreUsuario)
);
