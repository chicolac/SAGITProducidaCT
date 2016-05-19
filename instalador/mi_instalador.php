<?php
//CREAR UNA TABLA DE UBICACIÓN-----------------------------------------------------------
//Conexion---------------------------------
//$conexion = sqlite_open('favoritos.db') or die('Ha sido imposible establecer la conexion');
/*
 * mi conexion con mysql
 */
//Crear tablas---------------------------------
require "../mi_conexion2014/conexion.rts";
$bd = new BD;

$consulta = 
<<<SQL


/*==============================================================*/
/* Table: ATRACTIVO_TURISTICO                                   */
/*==============================================================*/
create table ATRACTIVO_TURISTICO (
   COD_AT               INT4                 not null,
   ATR_COD_AT           INT4                 null,
   NOMBRE_AT            VARCHAR(100)         not null,
   DESCRIPCION          TEXT                 not null,
   FOTOS                INT4                 not null,
   COORDENADAS          INT4                 not null,
   DIREC_FOTO           CHAR(100)            null,
   constraint PK_ATRACTIVO_TURISTICO primary key (COD_AT)
);

/*==============================================================*/
/* Index: ATRACTIVO_TURISTICO_PK                                */
/*==============================================================*/
create unique index ATRACTIVO_TURISTICO_PK on ATRACTIVO_TURISTICO (
COD_AT
);

/*==============================================================*/
/* Index: RELATIONSHIP_13_FK                                    */
/*==============================================================*/
create  index RELATIONSHIP_13_FK on ATRACTIVO_TURISTICO (
ATR_COD_AT
);

/*==============================================================*/
/* Table: CATEGORIZACION                                        */
/*==============================================================*/
create table CATEGORIZACION (
   COD_CATEG            VARCHAR(15)          not null,
   CAT_COD_CATEG        VARCHAR(15)          null,
   NOMBRE_CAT           VARCHAR(100)         not null,
   DESCRIPCION_CAT      TEXT                 not null,
   NIVEL_CAT            INT4                 null,
   constraint PK_CATEGORIZACION primary key (COD_CATEG)
);

/*==============================================================*/
/* Index: CATEGORIZACION_PK                                     */
/*==============================================================*/
create unique index CATEGORIZACION_PK on CATEGORIZACION (
COD_CATEG
);

/*==============================================================*/
/* Index: RELATIONSHIP_16_FK                                    */
/*==============================================================*/
create  index RELATIONSHIP_16_FK on CATEGORIZACION (
CAT_COD_CATEG
);

/*==============================================================*/
/* Table: CLASIFICACION                                         */
/*==============================================================*/
create table CLASIFICACION (
   COD_CATEG            VARCHAR(15)          not null,
   COD_CLASIF           VARCHAR(15)          not null,
   CLA_COD_CATEG        VARCHAR(15)          null,
   CLA_COD_CLASIF       VARCHAR(15)          null,
   NOMBRE_CLA           VARCHAR(100)         not null,
   DESCRIPCION_CLA      TEXT                 not null,
   EL_CODIGO            INT4                 not null,
   constraint PK_CLASIFICACION primary key (COD_CATEG, COD_CLASIF)
);

/*==============================================================*/
/* Index: CLASIFICACION_PK                                      */
/*==============================================================*/
create unique index CLASIFICACION_PK on CLASIFICACION (
COD_CATEG,
COD_CLASIF
);

/*==============================================================*/
/* Index: RELATIONSHIP_202_FK                                   */
/*==============================================================*/
create  index RELATIONSHIP_202_FK on CLASIFICACION (
CLA_COD_CATEG,
CLA_COD_CLASIF
);

/*==============================================================*/
/* Index: RELATIONSHIP_11_FK                                    */
/*==============================================================*/
create  index RELATIONSHIP_11_FK on CLASIFICACION (
COD_CATEG
);

/*==============================================================*/
/* Table: DEPARTAMENTO                                          */
/*==============================================================*/
create table DEPARTAMENTO (
   COD_DEPTO            INT4                 not null,
   NOMBRE_DEPTO         VARCHAR(100)         not null,
   DESCRIPCION_DEPTO    TEXT                 null,
   constraint PK_DEPARTAMENTO primary key (COD_DEPTO)
);

/*==============================================================*/
/* Index: DEPARTAMENTO_PK                                       */
/*==============================================================*/
create unique index DEPARTAMENTO_PK on DEPARTAMENTO (
COD_DEPTO
);

/*==============================================================*/
/* Table: GALERIA_IMAGENES                                      */
/*==============================================================*/
create table GALERIA_IMAGENES (
   ID_GALERIAI          SERIAL               not null,
   COD_AT               INT4                 not null,
   NOMBRE_IMAGENGI      CHAR(85)             not null,
   CARPETAGI            CHAR(85)             not null,
   constraint PK_GALERIA_IMAGENES primary key (ID_GALERIAI)
);

/*==============================================================*/
/* Index: GALERIA_IMAGENES_PK                                   */
/*==============================================================*/
create unique index GALERIA_IMAGENES_PK on GALERIA_IMAGENES (
ID_GALERIAI
);

/*==============================================================*/
/* Index: RELATIONSHIP_15_FK                                    */
/*==============================================================*/
create  index RELATIONSHIP_15_FK on GALERIA_IMAGENES (
COD_AT
);

/*==============================================================*/
/* Table: INCLUYE                                               */
/*==============================================================*/
create table INCLUYE (
   COD_AT               INT4                 not null,
   COD_CATEG            VARCHAR(15)          not null,
   COD_CLASIF           VARCHAR(15)          not null,
   constraint PK_INCLUYE primary key (COD_AT, COD_CATEG, COD_CLASIF)
);

/*==============================================================*/
/* Index: INCLUYE_PK                                            */
/*==============================================================*/
create unique index INCLUYE_PK on INCLUYE (
COD_AT,
COD_CATEG,
COD_CLASIF
);

/*==============================================================*/
/* Index: RELATIONSHIP_7_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_7_FK on INCLUYE (
COD_AT
);

/*==============================================================*/
/* Index: RELATIONSHIP_12_FK                                    */
/*==============================================================*/
create  index RELATIONSHIP_12_FK on INCLUYE (
COD_CATEG,
COD_CLASIF
);

/*==============================================================*/
/* Table: MUNICIPIO                                             */
/*==============================================================*/
create table MUNICIPIO (
   COD_MUNICIPIO        INT4                 not null,
   COD_PROVINCIA        INT4                 not null,
   NOMBRE_MUN           CHAR(100)            not null,
   DESCRIPCION_MUN      TEXT                 null,
   constraint PK_MUNICIPIO primary key (COD_MUNICIPIO)
);

/*==============================================================*/
/* Index: MUNICIPIO_PK                                          */
/*==============================================================*/
create unique index MUNICIPIO_PK on MUNICIPIO (
COD_MUNICIPIO
);

/*==============================================================*/
/* Index: RELATIONSHIP_2_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_2_FK on MUNICIPIO (
COD_PROVINCIA
);

/*==============================================================*/
/* Table: PISO_ECOLOGICO                                        */
/*==============================================================*/
create table PISO_ECOLOGICO (
   ID_PISOECO           INT4                 not null,
   NOMBRE_PISOECO       VARCHAR(100)         not null,
   DESCRIP_PISOECO      TEXT                 null,
   ALTURA_INICIO        INT4                 null,
   ALTURA_FIN           INT4                 null,
   constraint PK_PISO_ECOLOGICO primary key (ID_PISOECO)
);

/*==============================================================*/
/* Index: PISO_ECOLOGICO_PK                                     */
/*==============================================================*/
create unique index PISO_ECOLOGICO_PK on PISO_ECOLOGICO (
ID_PISOECO
);

/*==============================================================*/
/* Table: PROVINCIA                                             */
/*==============================================================*/
create table PROVINCIA (
   COD_PROVINCIA        INT4                 not null,
   COD_DEPTO            INT4                 not null,
   NOMBRE_PROVINCIA     CHAR(65)             not null,
   DESCRIP_PROVINCIA    TEXT                 null,
   constraint PK_PROVINCIA primary key (COD_PROVINCIA)
);

/*==============================================================*/
/* Index: PROVINCIA_PK                                          */
/*==============================================================*/
create unique index PROVINCIA_PK on PROVINCIA (
COD_PROVINCIA
);

/*==============================================================*/
/* Index: RELATIONSHIP_1_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_1_FK on PROVINCIA (
COD_DEPTO
);

/*==============================================================*/
/* Table: REGION                                                */
/*==============================================================*/
create table REGION (
   ID_REGION            INT4                 not null,
   NOMBRE_REGION        VARCHAR(100)         not null,
   DESCRIP_REGION       TEXT                 null,
   constraint PK_REGION primary key (ID_REGION)
);

/*==============================================================*/
/* Index: REGION_PK                                             */
/*==============================================================*/
create unique index REGION_PK on REGION (
ID_REGION
);

/*==============================================================*/
/* Table: SE_ENCUENTRA                                          */
/*==============================================================*/
create table SE_ENCUENTRA (
   COD_AT               INT4                 not null,
   COD_SENCUENTRA       INT4                 not null,
   ID_UBICACION         INT4                 not null,
   COORD_X              FLOAT8               not null,
   COORD_Y              FLOAT8               not null,
   COORD_Z              FLOAT8               null,
   ALTURA_AT            FLOAT8               null,
   constraint PK_SE_ENCUENTRA primary key (COD_AT, COD_SENCUENTRA)
);

/*==============================================================*/
/* Index: SE_ENCUENTRA_PK                                       */
/*==============================================================*/
create unique index SE_ENCUENTRA_PK on SE_ENCUENTRA (
COD_AT,
COD_SENCUENTRA
);

/*==============================================================*/
/* Index: RELATIONSHIP_6_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_6_FK on SE_ENCUENTRA (
ID_UBICACION
);

/*==============================================================*/
/* Index: RELATIONSHIP_14_FK                                    */
/*==============================================================*/
create  index RELATIONSHIP_14_FK on SE_ENCUENTRA (
COD_AT
);

/*==============================================================*/
/* Table: UBICACION                                             */
/*==============================================================*/
create table UBICACION (
   ID_UBICACION         INT4                 not null,
   COD_MUNICIPIO        INT4                 null,
   ID_REGION            INT4                 null,
   ID_PISOECO           INT4                 null,
   constraint PK_UBICACION primary key (ID_UBICACION)
);

/*==============================================================*/
/* Index: UBICACION_PK                                          */
/*==============================================================*/
create unique index UBICACION_PK on UBICACION (
ID_UBICACION
);

/*==============================================================*/
/* Index: RELATIONSHIP_3_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_3_FK on UBICACION (
ID_REGION
);

/*==============================================================*/
/* Index: RELATIONSHIP_4_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_4_FK on UBICACION (
ID_PISOECO
);

/*==============================================================*/
/* Index: RELATIONSHIP_5_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_5_FK on UBICACION (
COD_MUNICIPIO
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO (
   COD_USUARIO          VARCHAR(15)          not null,
   USUARIO              CHAR(85)             not null,
   CONTRASENA           CHAR(85)             not null,
   NOMBRE_U             CHAR(85)             not null,
   APELLIDO_U           CHAR(100)            not null,
   EDAD_U               INT4                 not null,
   PERMISOS_U           INT4                 not null,
   constraint PK_USUARIO primary key (COD_USUARIO)
);

/*==============================================================*/
/* Index: USUARIO_PK                                            */
/*==============================================================*/
create unique index USUARIO_PK on USUARIO (
COD_USUARIO
);

alter table ATRACTIVO_TURISTICO
   add constraint FK_ATRACTIV_RELATIONS_ATRACTIV foreign key (ATR_COD_AT)
      references ATRACTIVO_TURISTICO (COD_AT)
      on delete restrict on update restrict;

alter table CATEGORIZACION
   add constraint FK_CATEGORI_RELATIONS_CATEGORI foreign key (CAT_COD_CATEG)
      references CATEGORIZACION (COD_CATEG)
      on delete restrict on update restrict;

alter table CLASIFICACION
   add constraint FK_CLASIFIC_RELATIONS_CATEGORI foreign key (COD_CATEG)
      references CATEGORIZACION (COD_CATEG)
      on delete restrict on update restrict;

alter table CLASIFICACION
   add constraint FK_CLASIFIC_RELATIONS_CLASIFIC foreign key (CLA_COD_CATEG, CLA_COD_CLASIF)
      references CLASIFICACION (COD_CATEG, COD_CLASIF)
      on delete restrict on update restrict;

alter table GALERIA_IMAGENES
   add constraint FK_GALERIA__RELATIONS_ATRACTIV foreign key (COD_AT)
      references ATRACTIVO_TURISTICO (COD_AT)
      on delete restrict on update restrict;

alter table INCLUYE
   add constraint FK_INCLUYE_RELATIONS_CLASIFIC foreign key (COD_CATEG, COD_CLASIF)
      references CLASIFICACION (COD_CATEG, COD_CLASIF)
      on delete restrict on update restrict;

alter table INCLUYE
   add constraint FK_INCLUYE_RELATIONS_ATRACTIV foreign key (COD_AT)
      references ATRACTIVO_TURISTICO (COD_AT)
      on delete restrict on update restrict;

alter table MUNICIPIO
   add constraint FK_MUNICIPI_RELATIONS_PROVINCI foreign key (COD_PROVINCIA)
      references PROVINCIA (COD_PROVINCIA)
      on delete restrict on update restrict;

alter table PROVINCIA
   add constraint FK_PROVINCI_RELATIONS_DEPARTAM foreign key (COD_DEPTO)
      references DEPARTAMENTO (COD_DEPTO)
      on delete restrict on update restrict;

alter table SE_ENCUENTRA
   add constraint FK_SE_ENCUE_RELATIONS_ATRACTIV foreign key (COD_AT)
      references ATRACTIVO_TURISTICO (COD_AT)
      on delete restrict on update restrict;

alter table SE_ENCUENTRA
   add constraint FK_SE_ENCUE_RELATIONS_UBICACIO foreign key (ID_UBICACION)
      references UBICACION (ID_UBICACION)
      on delete restrict on update restrict;

alter table UBICACION
   add constraint FK_UBICACIO_RELATIONS_REGION foreign key (ID_REGION)
      references REGION (ID_REGION)
      on delete restrict on update restrict;

alter table UBICACION
   add constraint FK_UBICACIO_RELATIONS_PISO_ECO foreign key (ID_PISOECO)
      references PISO_ECOLOGICO (ID_PISOECO)
      on delete restrict on update restrict;

alter table UBICACION
   add constraint FK_UBICACIO_RELATIONS_MUNICIPI foreign key (COD_MUNICIPIO)
      references MUNICIPIO (COD_MUNICIPIO)
      on delete restrict on update restrict;


SQL;
//Insertar contenido en la tabla--------------------
$resultado = pg_query($consulta);
//Cerrar la conexion---------------------------------
//sqlite_close($conexion);
/*
 * no estoy poniendo el close me lo salto
 */
//CONTENIDO DE PRUEBA PARA LA BASE DE DATOS UBICACIÓN--------------------------------------
//Establecer
//$conexion = sqlite_open('favoritos.db') or die('Ha sido imposible establecer la conexion');
/*
 * me estoy saltando esta conexion
 */
//Preparar
// para que la parte de los departamentos tenga peso deberian tener características al igual que los municipios
$consulta2 = 
<<<SQL
INSERT INTO departamento VALUES (1,'cochabamba','una linda ciudad de Bolivia'), 
							(2,'la paz','una ciudad linda de Bolivia'),
							(3,'oruro','una ciudad linda de Bolivia'),
							(4,'santa cruz','una ciudad linda de Bolivia'),
							(5,'potosí','una ciudad linda de Bolivia'),
							(6,'pando','una ciudad linda de Bolivia'),
							(7,'tarija','una ciudad linda de Bolivia');

      
SQL;
//Insertar
$resultado = pg_query($consulta2);
// para que las provincias tengan sus datos
$consulta3 = 
<<<SQL

INSERT INTO provincia VALUES (1, 1, 'Cercado','una linda provincia de Cochabamba'), 
							(2, 1, 'Narciso Campero','una linda provincia de Cochabamba'),
							(3, 1, 'Ayopaya','una linda provincia de Cochabamba'),
							(4, 1, 'Esteban Arce','una linda provincia de Cochabamba'),
							(5, 1, 'Arani','una linda provincia de Cochabamba'),
							(6, 1, 'Arque','una linda provincia de Cochabamba'),
							(7, 1, 'Capinota','una linda provincia de Cochabamba'),
							(8, 1, 'Germán Jordán','una linda provincia de Cochabamba'),
							(9, 1, 'Quillacollo','una linda provincia de Cochabamba'),
							(10, 1, 'Chapare','una linda provincia de Cochabamba'),
							(11, 1, 'Tapacarí','una linda provincia de Cochabamba'),
							(12, 1, 'Carrasco','una linda provincia de Cochabamba'),
							(13, 1, 'Mizque','una linda provincia de Cochabamba'),
							(14, 1, 'Punata','una linda provincia de Cochabamba'),
							(15, 1, 'Bolívar','una linda provincia de Cochabamba'),
							(16, 1, 'Tiraque','una linda provincia de Cochabamba');
        
SQL;
//Insertar
$resultado = pg_query($consulta3);
// para que las provincias tengan sus datos
$consulta4 = 
<<<SQL

INSERT INTO municipio VALUES (1, 2, 'Aiquile','un lindo municipio de Cochabamba'), 
							(2, 9, 'Quillacollo','un lindo municipio de Cochabamba'),
							(3, 9, 'Sipe Sipe','un lindo municipio de Cochabamba'),
							(4, 9, 'Tiquipaya','un lindo municipio de Cochabamba'),
							(5, 9, 'Vinto','un lindo municipio de Cochabamba'),
							(6, 9, 'Colcapirhua','un lindo municipio de Cochabamba'),
							(7, 10, 'Sacaba','un lindo municipio de Cochabamba'),
							(8, 10, 'Colomi','un lindo municipio de Cochabamba'),
							(9, 10, 'Villa Tunari','un lindo municipio de Cochabamba'),
							(10, 6, 'Arque','un lindo municipio de Cochabamba'),
							(11, 6, 'Tacopaya','un lindo municipio de Cochabamba'),
							(12, 4, 'Anzaldo','un lindo municipio de Cochabamba'),
							(13, 5, 'Arani','un lindo municipio de Cochabamba'),
							(14, 14, 'Villa Gualberto Villarroel (Cuchumuela)','un lindo municipio de Cochabamba'),
							(15, 13, 'Vila Vila','un lindo municipio de Cochabamba'),
							(16, 5, 'Vacas','un lindo municipio de Cochabamba'),
							(17, 12, 'Totora','un lindo municipio de Cochabamba'),
							(18, 8, 'Tolata','un lindo municipio de Cochabamba'),
							(19, 14, 'Villa Rivero','un lindo municipio de Cochabamba'),
							(20, 8, 'Tolata','un lindo municipio de Cochabamba'),
							(21, 1, 'Cochabamba','un lindo municipio de Cochabamba'),
							(22, 2, 'Pasorapa','un lindo municipio de Cochabamba'),
							(23, 2, 'Omereque','un lindo municipio de Cochabamba'),
							(24, 3, 'Ayopaya (Villa de Independencia)','un lindo municipio de Cochabamba'),
							(25, 3, 'Morochata','un lindo municipio de Cochabamba'),
							(26, 4, 'Tarata','un lindo municipio de Cochabamba'),
							(27, 7, 'Capinota','un lindo municipio de Cochabamba'),
							(28, 4, 'Arbieto','un lindo municipio de Cochabamba'),
							(29, 4, 'Sacabamba','un lindo municipio de Cochabamba'),
							(30, 7, 'Santiváñez','un lindo municipio de Cochabamba'),
							(31, 7, 'Sicaya','un lindo municipio de Cochabamba'),
							(32, 8, 'Cliza','un lindo municipio de Cochabamba'),
							(33, 8, 'Toco','un lindo municipio de Cochabamba'),
							(34, 11, 'Tapacarí','un lindo municipio de Cochabamba'),
							(35, 12, 'Pojo','un lindo municipio de Cochabamba'),
							(36, 12, 'Pocona','un lindo municipio de Cochabamba'),
							(37, 12, 'Chimoré','un lindo municipio de Cochabamba'),
							(38, 12, 'Puerto Villarroel','un lindo municipio de Cochabamba'),
							(39, 12, 'Entre Ríos','un lindo municipio de Cochabamba'),
							(40, 13, 'Mizque','un lindo municipio de Cochabamba'),
							(41, 13, 'Alalay','un lindo municipio de Cochabamba'),
							(42, 14, 'Punata','un lindo municipio de Cochabamba'),
							(43, 14, 'Villa Rivero','un lindo municipio de Cochabamba'),
							(44, 14, 'San Benito','un lindo municipio de Cochabamba'),
							(45, 15, 'Bolívar','un lindo municipio de Cochabamba'),
							(46, 16, 'Tiraque','un lindo municipio de Cochabamba');
        
SQL;
//Insertar
$resultado = pg_query($consulta4);
// para que las provincias tengan sus datos
$consulta5 = 
<<<SQL

INSERT INTO piso_ecologico VALUES (1, 'Llanura','el pisoeco', 1750, 1800), 
							(2, 'Montano','el pisoeco', 1800, 1950),
							(3, 'Montano bajo','el pisoeco', 1950, 2100),
							(4, 'Nival','el pisoeco', 2100, 2200),
							(5, 'Pie de monte','el pisoeco', 2200, 2300),
							(6, 'Premontano','el pisoeco', 2250, 2350),
							(7, 'Subalpino','el pisoeco', 2300, 2400);
        
SQL;
//Insertar
$resultado = pg_query($consulta5);
// para llenar las regiones
$consulta6 = 
<<<SQL
INSERT INTO region VALUES (1,'Valle Central','falta la extensión para esta región'), 
							(2,'Valle Alto','falta la extensión para esta región'),
							(3,'Valle Bajo','falta la extensión para esta región'),
							(4,'Valle Mesotérmico','falta la extensión para esta región'),
							(5,'Región Trópico','falta la extensión para esta región'),
							(6,'Región Mesetas','falta la extensión para esta región');

      
SQL;
//Insertar
$resultado = pg_query($consulta6);
// para ir llenando las ubicaciones
$consulta7 = 
<<<SQL
INSERT INTO ubicacion VALUES (1, 1, null, null), 
							(2, 2, null, null),
							(3, 3, null, null),
							(4, 4, null, null),
							(5, 5, null, null),
							(6, 6, null, null),
							(7, 7, null, null),
							(8, 8, null, null),
							(9, 9, null, null),
							(10, 10, null, null),
							(11, 11, null, null),
                                                        (12, 12, null, null),
                                                        (13, 13, null, null),
                                                        (14, 14, null, null),
                                                        (15, 15, null, null),
                                                        (16, 16, null, null),
							(17, 17, null, null),
							(18, null, 1, null),
							(19, null, 2, null),
							(20, null, 4, null),
							(21, null, 5, null),
							(22, null, 6, null),
							(23, null, 3, null),
							(24, null, null, 1),
							(25, null, null, 2),
							(26, null, null, 3),
							(27, null, null, 4),
							(28, null, null, 5),
							(29, null, null, 6),
							(30, null, null, 7),
							(31, 18, null, null),
							(32, 19, null, null),
							(33, 20, null, null),
							(34, 21, null, null),
							(35, 22, null, null),
							(36, 23, null, null),
							(37, 24, null, null),
							(38, 25, null, null),
							(39, 26, null, null),
							(40, 27, null, null),
							(41, 28, null, null),
							(42, 29, null, null),
							(43, 30, null, null),
							(44, 31, null, null),
							(45, 32, null, null),
							(46, 33, null, null),
							(47, 34, null, null),
							(48, 35, null, null),
							(49, 36, null, null),
							(50, 37, null, null),
							(51, 38, null, null),
							(53, 39, null, null),
							(52, 40, null, null),
							(54, 41, null, null),
							(55, 42, null, null),
							(56, 43, null, null),
							(57, 44, null, null),
							(58, 45, null, null),
							(59, 46, null, null);
                                                            
SQL;
//Insertar
$resultado = pg_query($consulta7);

// para llenar las categorización
$consulta8 = 
<<<SQL
INSERT INTO categorizacion VALUES ('cat001', 'cat002', 'categoría', 'categoría', 1),
							('cat002', 'cat003','tipo', 'tipo', null),
							('cat003', 'cat004', 'subtipo', 'subtipo', null),
							('cat004', 'cat005', 'sub-subtipo', 'sub-subtipo', null),
							('cat005', 'cat006', 'super-subtipo', 'super-subtipo', null),
							('cat006', 'cat007', 'archimega-subtipo', 'archimega-subtipo', null),
							('cat007', null, 'archimegasub-subtipo', 'archimegasub-subtipo', null);

SQL;
//Insertar
$resultado = pg_query($consulta8);

// para llenar las clasificaciones
// 1. SITIOS NATURALES, 2. MANIFESTACIONES CULTURALES, 3. FOLKLORE, 4. REALIZACIONES TECNICAS, CIENTIFICAS O ARTISTICAS CONTEMPORANEAS
// 5. ACONTECIMIENTOS PROGRAMADOS, 6. ETNOLOGICO
$consulta9 = 
<<<SQL
INSERT INTO clasificacion VALUES ('cat001', 'cla001', null, null, 'patrimonio natural', 'patrimonio natural', 1),
				('cat001', 'cla002', null, null, 'patrimonio histórico', 'patrimonio histórico', 2),
				('cat001', 'cla003', null, null, 'patrimonio cultural', 'patrimonio cultural', 3),
				('cat001', 'cla004', null, null, 'realizaciones técnicas contemporaneas', 'realizaciones técnicas contemporaneas', 4),
				('cat002', 'cla005', 'cat001', 'cla004', 'explotaciones mineras', 'explotaciones mineras',	1),
				('cat002', 'cla006', 'cat001', 'cla004', 'explotaciones agropecuarias o pesqueras', 'explotaciones agropecuarias o pesqueras', 2),
				('cat002', 'cla007', 'cat001', 'cla004', 'explotaciones industriales', 'explotaciones industriales', 3),
				('cat002', 'cla008', 'cat001', 'cla004', 'centros científicos y técnicos', 'centros científicos y técnicos', 4),
				('cat002', 'cla009', 'cat001', 'cla004', 'otros contemporaneas', 'otros contemporaneas', 5),
				('cat002', 'cla010', 'cat001', 'cla001', 'Elevaciones', 'Elevaciones', 1),
				('cat002', 'cla011', 'cat001', 'cla001', 'Planicies', 'Planicies', 2),
				('cat002', 'cla012', 'cat001', 'cla001', 'Valles', 'Valles', 3),
				('cat002', 'cla013', 'cat001', 'cla001', 'Quebradas', 'Quebradas', 4),
				('cat002', 'cla014', 'cat001', 'cla001', 'Cañones', 'Cañones', 5),
				('cat002', 'cla015', 'cat001', 'cla001', 'Pongos', 'Pongos', 6),
				('cat002', 'cla016', 'cat001', 'cla001', 'Lagos, Lagunas, Oasis, Pantanos, Albuferas', 'Lagos, Lagunas, Oasis, Pantanos, Albuferas', 7),
				('cat002', 'cla017', 'cat001', 'cla001', 'Ríos', 'Ríos', 8),
				('cat002', 'cla018', 'cat001', 'cla001', 'Caídas de agua', 'Caídas de agua', 9),
				('cat002', 'cla019', 'cat001', 'cla001', 'Manantiales', 'Manantiales', 10),
				('cat002', 'cla020', 'cat001', 'cla001', 'Aguas Minero Medicinales', 'Aguas Minero Medicinales', 11),
				('cat002', 'cla021', 'cat001', 'cla001', 'Costas', 'Costas', 12),
				('cat002', 'cla022', 'cat001', 'cla001', 'Grutas, Cavernas y Cuevas', 'Grutas, Cavernas y Cuevas', 13),
				('cat002', 'cla023', 'cat001', 'cla001', 'Areas protegidas', 'Areas protegidas', 14),
				('cat002', 'cla024', 'cat001', 'cla001', 'Otros', 'Otros', 15),
				('cat003', 'cla025', 'cat002', 'cla010', 'Cordilleras y/o Nevados', 'Cordilleras y/o Nevados', 1),
				('cat003', 'cla026', 'cat002', 'cla010', 'Montañas y/o Montes', 'Montañas y/o Montes', 2),
				('cat003', 'cla027', 'cat002', 'cla010', 'Sierras', 'Sierras', 3),
				('cat003', 'cla028', 'cat002', 'cla010', 'Cerros, Colinas y Lomas', 'Cerros, Colinas y Lomas', 4),
				('cat003', 'cla029', 'cat002', 'cla010', 'Volcanes', 'Volcanes', 5),
				('cat003', 'cla030', 'cat002', 'cla010', 'Valles', 'Valles', 6),
				('cat003', 'cla031', 'cat002', 'cla010', 'Yungas y/o Quebradas', 'Yungas y/o Quebradas', 7),
				('cat003', 'cla032', 'cat002', 'cla010', 'Ventisqueros', 'Ventisqueros', 8),
				('cat003', 'cla033', 'cat002', 'cla010', 'Glaciares', 'Glaciares', 9),
				('cat003', 'cla034', 'cat002', 'cla010', 'Hielos Continentales', 'Hielos continentales', 10),
				('cat003', 'cla035', 'cat002', 'cla011', 'Llanuras, Praderas y/o Estepas', 'Llanuras, Praderas y/o Estepas', 1),
				('cat003', 'cla036', 'cat002', 'cla011', 'Desiertos', 'Desiertos', 2),
				('cat003', 'cla037', 'cat002', 'cla011', 'Salinas', 'Salinas', 3),
				('cat003', 'cla038', 'cat002', 'cla011', 'Salares', 'Salares', 4),
				('cat003', 'cla039', 'cat002', 'cla011', 'Altiplanos', 'Altiplanos', 5),
				('cat003', 'cla040', 'cat002', 'cla011', 'Selvas', 'Selvas', 6),
				('cat003', 'cla041', 'cat002', 'cla023', 'Parque', 'Parque', 1),
				('cat003', 'cla042', 'cat002', 'cla023', 'Reserva', 'Reserva', 2),
				('cat003', 'cla043', 'cat002', 'cla023', 'Santuario de vida Silvestre', 'Santuario de Vida Silvestre', 3),
				('cat003', 'cla044', 'cat002', 'cla023', 'Area de manejo Integrado', 'Area de manejo Integrado', 4),
				('cat003', 'cla045', 'cat002', 'cla023', 'Unidad de Conservación', 'Unidad de Conservación', 5),
				('cat003', 'cla046', 'cat002', 'cla023', 'Monumento Natural', 'Monumento Natural', 6),
				('cat003', 'cla047', 'cat002', 'cla023', 'Gueisers y/o fumarolas', 'Gueisers y/o fumarolas', 7),
				('cat003', 'cla048', 'cat002', 'cla023', 'Rios', 'Rios', 6),
				('cat003', 'cla049', 'cat002', 'cla023', 'Arroyos', 'Arroyos', 6),
				('cat003', 'cla050', 'cat002', 'cla023', 'Dibortium Acuarium', 'Dibortium Acuarium', 6),
				('cat003', 'cla051', 'cat002', 'cla023', 'Cataratas', 'Cataratas', 6),
				('cat003', 'cla052', 'cat002', 'cla023', 'Saltos', 'Saltos', 6),
				('cat003', 'cla053', 'cat002', 'cla023', 'Cascadas', 'Cascadas', 6),
				('cat003', 'cla054', 'cat002', 'cla023', 'Lugares de observación de Fauna', 'Lugares de observación de Fauna', 6),
				('cat003', 'cla055', 'cat002', 'cla023', 'Lugares de observación de Flora', 'Lugares de observación de Flora', 6),
				('cat003', 'cla056', 'cat002', 'cla023', 'Lugares de caza', 'Lugares de pesca', 6);

SQL;
//Insertar
$resultado = pg_query($consulta9);

// para llenar las tabla usuario
$consulta10 = 
<<<SQL
INSERT INTO usuario VALUES ('usr0001', 'turismo', 'turismo', 'carrera', 'turismo', 10, 3), 
							('usr0002', 'edgar', 'edgar', 'edgar', 'valencia', 31, 3),
							('usr0003', 'qw', 'qw', 'qw', 'qw', 32, 3),
							('usr0004', 'bbb', 'bbb', 'bbb', 'bbb', 21, 3);

SQL;
//Insertar
$resultado = pg_query($consulta10);

//Cerrar
//sqlite_close($conexion);
/*
 * me voy a saltar este close
 */
