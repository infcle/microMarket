insert  into `usuario_login`(`id_usuario`,`nombre`,`fecha_registro`,`usuario`,`contrasenia`,`estado`,`tipo`) values (1,'Haki Ari','2018-02-01 02:26:10','admin','$2y$10$I18B6QvoVkPXvkgGTCdqNOx34WRsatkevdUvKbvfihfLizu/GmuTO',1,0);

#Lista de usuarios con estado=1
DELIMITER //

CREATE PROCEDURE  usuario_estado1()
BEGIN
select * from usuario_login where estado=1;
END
//
DELIMITER ; 

#Lista de productos de acuerdo a la categoría
DELIMITER //

CREATE PROCEDURE  producto_categoria(
in cat bigint)
BEGIN
select * from producto where id_cat=cat;
END
//
DELIMITER ; 

#lista de clientes
DELIMITER //

CREATE PROCEDURE  lista_clientes(
in cat bigint)
BEGIN
select * from cliente;
END
//
DELIMITER ; 