CREATE DATABASE clinica_bendicion;


//Estructura de tabla para la tabla tipousuario

CREATE TABLE tipousuario(
idtipousuario int(10) NOT NULL,
tipo varchar(45)NOT NULL,
descripcion varchar(64)NOT NULL,
fechacreado date NOT NULL
)

ALTER TABLE `tipousuario` ADD PRIMARY KEY(`idtipousuario`);

//Volcado de datos para la tabla 'tipousuario'

INSERT INTO `tipousuario` (`idtipousuario`, `tipo`, `descripcion`, `fechacreado`) VALUES ('1', 'Administrador', 'Con privilegios de gestionar todo el sistema', '2020-08-26')
INSERT INTO `tipousuario` (`idtipousuario`, `tipo`, `descripcion`, `fechacreado`) VALUES ('2', 'Secretaria', 'Crea pacientes, crea citas y las gestiona', '2020-08-26')

//Estructura de tabla para la tabla usuario

CREATE TABLE  usuario  (
 idusuario  int(10) NOT NULL,
 nombre  varchar(45),
 apellido  varchar(45),
 login  varchar(45),
 idtipousuario  int(10),
 correo  varchar(45),
 telefono  int(45),
 contrasena  varchar(64),
 imagen  varchar(50),
 estado  varchar(45),
 fechacreado  date
)

ALTER TABLE `usuario` ADD PRIMARY KEY(`idusuario`)
ALTER TABLE `usuario` CHANGE `idusuario` `idusuario` INT(10) NOT NULL AUTO_INCREMENT;

//Volcado de datos para la tabla 'usuario'

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `login`, `idtipousuario`, `correo`, `telefono`, `contrasena`, `imagen`, `estado`, `fechacreado`) VALUES ('1', 'Admin', 'User', '1410131310', '1', 'admin@gmail.com', '1410131310', '1410131310', 'img.jpg', 'Activo', '2020-08-20');

//Estructura de tabla para la tabla 'paciente'

CREATE TABLE  paciente (
 idpaciente  int(10) NOT NULL,
 nombre  varchar(45),
 apellido  varchar(45),
 genero  varchar(45),
 tiposangre  varchar(45),
 direccion  varchar(64),
 telefono  int(45),
 correo  varchar(45),
 fechacreado  datetime
)

ALTER TABLE `paciente` ADD PRIMARY KEY(`idpaciente`)
ALTER TABLE `paciente` CHANGE `idpaciente` `idpaciente` INT(10) NOT NULL AUTO_INCREMENT;

//Estructura de tabla para la tabla 'estado'

CREATE TABLE  estado (
 idestado  int(10) NOT NULL,
 estado_ varchar(45),
 descripcion  varchar(64)
)

ALTER TABLE `estado` ADD PRIMARY KEY(`idestado`)

//Volcado de datos para la tabla 'estado'

INSERT INTO `estado` (`idestado`, `estado_`, `descripcion`) VALUES 
('1', 'Activa', 'Para las citas que aun estén pendientes de llevarse a cabo'), 
('2', 'Completa', 'Para las citas que ya se hayan llevado a cabo'), 
('3', 'Cancelada', 'Para las citas que sean canceladas'), 
('4', 'Postpuesta', 'Para las citas que se pospongan por cualquier situación');

//Estructura de tabla para la tabla 'cita'

CREATE TABLE cita ( 
 idcita int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
 idpaciente int(10), 
 fecha date, 
 idestado int(10)
)

//Estructura de tabla para la tabla 'receta'

CREATE TABLE  receta (
 idreceta  int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
 fecha  date,
 diagnostico  varchar(128),
 tratamiento  varchar(256),
 idcita  int(10),
 idusuario int(10)
)

alter table usuario add CONSTRAINT idtipousuario FOREIGN key(idtipousuario) references tipousuario(idtipousuario);
alter table receta add CONSTRAINT idusuario FOREIGN key(idusuario) references usuario(idusuario);
alter table cita add CONSTRAINT idestado FOREIGN key(idestado) references estado(idestado);
alter table cita add CONSTRAINT idpaciente FOREIGN key(idpaciente) references estado(idpaciente);
alter table receta add CONSTRAINT idcita FOREIGN key(idcita) references cita(idcita);

//procedimiento almacenado para logearse
CREATE PROCEDURE Login() SELECT * FROM USUARIO WHERE login = '".$login."' and contrasena = '".$contrasena."'

//procedimiento almacenado para Citas del dia
CREATE PROCEDURE Citas_Hoy() SELECT cita.idcita, cita.fecha, estado.estado_, cita.idpaciente, paciente.nombre, paciente.apellido, paciente.genero, paciente.direccion, paciente.telefono, paciente.correo FROM cita INNER JOIN estado ON estado.idestado=cita.idestado INNER JOIN paciente ON cita.idpaciente=paciente.idpaciente WHERE cita.fecha=CURRENT_DATE

//procedimiento almacenado para mostrar los usuarios
CREATE PROCEDURE R_Usuarios() SELECT usuario.*, tipousuario.tipo from usuario INNER JOIN tipousuario ON usuario.idtipousuario=tipousuario.idtipousuario ORDER BY apellido DESC

//procedimiento almacenado para mostrar los pacientes
CREATE PROCEDURE R_Pacientes() SELECT * FROM paciente ORDER BY apellido DESC

//procedimiento almacenado para mostrar todas las citas 
CREATE PROCEDURE R_Citas() SELECT cita.idcita, cita.fecha, estado.estado_, cita.idpaciente, paciente.nombre, paciente.apellido, paciente.genero, paciente.direccion, paciente.telefono, paciente.correo FROM cita INNER JOIN estado ON estado.idestado=cita.idestado INNER JOIN paciente ON cita.idpaciente=paciente.idpaciente ORDER BY cita.fecha DESC

//procedimiento almacenado para mostrar todas las recetas
CREATE PROCEDURE R_Recetas() SELECT cita.idcita, cita.fecha, paciente.nombre, paciente.apellido, receta.idreceta, receta.diagnostico, receta.tratamiento FROM cita INNER JOIN paciente ON paciente.idpaciente=cita.idpaciente INNER JOIN receta ON receta.idcita=cita.idcita ORDER BY cita.fecha DESC

