SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*==============================================================*/
/* Base de datos: `exportaciones`                                 */
/*==============================================================*/
CREATE DATABASE IF NOT EXISTS `exportaciones` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `exportaciones`;


drop table if exists LOGTRANSACCIONES;

create table LOGTRANSACCIONES (
IDLOGTRANSACCIONES bigint unsigned not null auto_increment,
IDACCESO bigint unsigned not null,
NOMTABLA varchar(30) null,
ACCION char(1) null,
DESCRIPCION varchar(30) null,
primary key (IDLOGTRANSACCIONES)
);
 

drop table if exists ACCESO;

/*==============================================================*/
/* Table: ACCESO                                                */
/*==============================================================*/
create table ACCESO (
   IDACCESO             bigint unsigned not null auto_increment,
   NOMUSUARIO           varchar(20)          null,
   PWDUSUARIO           varchar(40)          null,
   NOMBRE               varchar(40)          null,
   primary key (IDACCESO)
);

drop table if exists PRODUCTOS;

/*==============================================================*/
/* Table: PRODUCTOS                                             */
/*==============================================================*/
create table PRODUCTOS (
   IDPRODUCTO           bigint unsigned not null auto_increment,
   NOMBRE               varchar(100)         null,
   TOTALUSD             int                  null,
   ANO                  int                  null,
   primary key (IDPRODUCTO)
);
/*==============================================================*/
/* Table: PERMISOS_ACCESO                                       */
/*==============================================================*/
create table PERMISOS_ACCESO (
   IDPERMISO            bigint unsigned not null auto_increment,
   IDPRODUCTO           bigint unsigned not null,
   IDACCESO             bigint unsigned not null,
   primary key (IDPERMISO)
);

alter table PERMISOS_ACCESO add constraint FK_PERMISO_PRO foreign key (IDPRODUCTO)
      references PRODUCTOS (IDPRODUCTO) on delete cascade on update cascade;

alter table PERMISOS_ACCESO add constraint FK_PERMISO_ACC foreign key (IDACCESO)
      references ACCESO (IDACCESO) on delete cascade on update cascade;
	  
/*Creación de registros 1234/123478*/
INSERT INTO ACCESO(NOMUSUARIO,PWDUSUARIO,NOMBRE)
     VALUES ('flopez','81dc9bdb52d04dc20036dbd8313ed055','Fabián Lopez');

INSERT INTO ACCESO(NOMUSUARIO,PWDUSUARIO,NOMBRE)
     VALUES ('psuazo','fcea920f7412b5da7be0cf42b8c93759','Patricio Suazo');


INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)
VALUES('Agricultura, fruticultura, ganadería, silvicultura y pesca extractiva',5110,2012);
INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)
VALUES('Minería',48286,2012);
INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)
VALUES('Industria',24878,2012);
INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)
VALUES('Otros',1,2012);
INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)
VALUES('Agricultura, fruticultura, ganadería, silvicultura y pesca extractiva',5858,2013);
INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)
VALUES('Minería',45273,2013);
INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)
VALUES('Industria',26234,2013);
INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)
VALUES('Otros',2,2013);