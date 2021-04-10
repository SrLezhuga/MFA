# Host: localhost  (Version 5.5.5-10.4.17-MariaDB)
# Date: 2021-04-10 09:16:12
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "movil_cupon"
#

CREATE TABLE `movil_cupon` (
  `id_cupon` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) DEFAULT NULL,
  `creditos` varchar(255) DEFAULT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `base1` varchar(255) DEFAULT NULL,
  `base2` varchar(255) DEFAULT NULL,
  `base3` varchar(255) DEFAULT NULL,
  `vigencia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cupon`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

#
# Data for table "movil_cupon"
#

INSERT INTO `movil_cupon` VALUES (1,'PROMO200','2500','DESCUENTO','$ 200','En compras mayores a $ 2000','En compras menores a $5000','Cupon no acumulable','2021'),(2,'PROMO500','6000','DESCUENTO','$ 500','En compras mayores a $ 10000','Cupon no acumulable','','2021'),(3,'PROMOP10','3000','DESCUENTO','10 %','En compras mayores a $ 2000','En compras menores a $5000','Cupon no acumulable','2021');

#
# Structure for table "movil_cuponera"
#

CREATE TABLE `movil_cuponera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cupon` varchar(255) DEFAULT NULL,
  `id_usuario` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "movil_cuponera"
#

INSERT INTO `movil_cuponera` VALUES (1,'1','1','ACTIVO');

#
# Structure for table "movil_historial"
#

CREATE TABLE `movil_historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) DEFAULT NULL,
  `id_cupon` varchar(255) DEFAULT NULL,
  `ticket-factura` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_historial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "movil_historial"
#


#
# Structure for table "movil_user"
#

CREATE TABLE `movil_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `tel_user` varchar(255) DEFAULT NULL,
  `pass_user` varchar(255) DEFAULT NULL,
  `cod_user` varchar(255) DEFAULT NULL,
  `sex_user` varchar(255) DEFAULT NULL,
  `monedero` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "movil_user"
#

INSERT INTO `movil_user` VALUES (1,'Brandon Manuel Gutierrez Lechuga','Brihand.lech@gmail.com','3317202513','123','MFA@L34SH','M','200');

#
# Structure for table "tab_asistencia"
#

CREATE TABLE `tab_asistencia` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `nom_empleado` varchar(100) NOT NULL DEFAULT '0',
  `status` varchar(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_empleado`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_asistencia"
#

INSERT INTO `tab_asistencia` VALUES ('004','2021-01-31','Barriga Reyes Gerardo','2'),('004','2021-02-01','Barriga Reyes Gerardo','RR'),('004','2021-02-02','Barriga Reyes Gerardo','1'),('004','2021-02-03','Barriga Reyes Gerardo','1'),('004','2021-02-04','Barriga Reyes Gerardo','R'),('004','2021-02-05','Barriga Reyes Gerardo','F'),('004','2021-02-06','Barriga Reyes Gerardo','1'),('004','2021-02-07','Barriga Reyes Gerardo','1'),('004','2021-02-08','Barriga Reyes Gerardo','1'),('153','2021-01-31','Leal García Víctor Manuel','1'),('153','2021-02-01','Leal García Víctor Manuel','1'),('153','2021-02-02','Leal García Víctor Manuel','R'),('153','2021-02-03','Leal García Víctor Manuel','RR'),('153','2021-02-04','Leal García Víctor Manuel','1'),('153','2021-02-05','Leal García Víctor Manuel','1'),('153','2021-02-06','Leal García Víctor Manuel','1'),('153','2021-02-07','Leal García Víctor Manuel','1'),('153','2021-02-08','Leal García Víctor Manuel','1'),('316','2021-01-31','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-01','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-02','Gutierrez Lechuga Brandon Manuel','2'),('316','2021-02-03','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-04','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-05','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-06','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-07','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-08','Gutierrez Lechuga Brandon Manuel','1');

#
# Structure for table "tab_baja"
#

CREATE TABLE `tab_baja` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `fecha` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_baja"
#


#
# Structure for table "tab_banner_sucursal"
#

CREATE TABLE `tab_banner_sucursal` (
  `Url` varchar(30) NOT NULL DEFAULT '',
  `Url_imagen` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`Url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_banner_sucursal"
#

INSERT INTO `tab_banner_sucursal` VALUES ('Agroforestal','SUCURSAL AGROFORESTAL.jpg'),('Dewalt','VANNER 3.png'),('La-Paz','SUCURSAL LA PAZ.jpg'),('Mikels','mikels fondo.jpg'),('Milwaukee','VANNER 8.png'),('Outlet','OTLET CON FONDO.jpg'),('Tepatitlan','SUCURSAL TEPATITLAN.jpg'),('Ujueta','UJUETA CON FONDO.jpg'),('Urrea','VANNER 1.png');

#
# Structure for table "tab_bono"
#

CREATE TABLE `tab_bono` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `bono` double(11,2) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_bono"
#


#
# Structure for table "tab_caja"
#

CREATE TABLE `tab_caja` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `caja_ahorro` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_caja"
#

INSERT INTO `tab_caja` VALUES ('153',100.00),('316',100.00);

#
# Structure for table "tab_candidatos"
#

CREATE TABLE `tab_candidatos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `vacante` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_candidatos"
#

INSERT INTO `tab_candidatos` VALUES (1,'Becario Sistemas','Brandon Lechuga','3317202513','cv prueba.pdf','2021-02-25','Archivado'),(2,'Chofer Vendedor','Pedro Picapiedras','3334353637','Formato capacitaciòn.docx','2021-02-25','Revisado'),(3,'Diseñador Grafico','Stephen S. Harris','8328863372','este no es un cv.docx','2021-02-25','Sin revisar'),(4,'Becario Sistemas','Todd G. Granger','6303731952','este no es un cv.docx','2021-03-01','Revisado'),(5,'Becario Sistemas','Richard D. Espinoza','9852942426','este no es un cv.docx','2021-03-01','Rechazado'),(6,'Chofer Vendedor','Paul O. McLoughlin','3317202513','Paul O McLoughlin CV.doc','2021-03-02','Sin revisar'),(7,'Cajera Vendedora','Kari C. Bradford','3317202513','Kari C Bradford CV.docx','2021-03-02','Sin revisar'),(8,'Chofer Vendedor','Enviado del celular','3317202513','Enviado del celular CV.pdf','2021-03-02','Sin revisar'),(9,'Chofer Vendedor','juan carlos','38387657','juan carlos CV.pdf','2021-03-02','Sin revisar'),(10,'Chofer Vendedor','steeeeph','45545456546465465011','steeeeph CV.pdf','2021-03-02','Sin revisar'),(11,'Ejecutivo de Ventas Telemarketing','Axel','3314278911','Axel CV.pdf','2021-03-02','Rechazado');

#
# Structure for table "tab_catalogo"
#

CREATE TABLE `tab_catalogo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sucursal` varchar(50) NOT NULL DEFAULT '',
  `href` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(50) NOT NULL DEFAULT '',
  `desc` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_catalogo"
#

INSERT INTO `tab_catalogo` VALUES (1,'Milwaukee','https://view.publitas.com/mfa/catalogo-herramientas-manuales-baja-reso/','Herramientas Manuales.jpg','Herramientas Manuales'),(2,'Milwaukee','https://view.publitas.com/mfa/catalogo-manufactura/','Manufactura.jpg','Manufactura'),(3,'Milwaukee','https://view.publitas.com/mfa/catalogo-milwaukee-utility-electrico/','Electrico.jpg','Eléctrico'),(4,'Milwaukee','https://view.publitas.com/mfa/accesorios_milwaukeetools/','Accesorios.jpg','Accesorios'),(5,'Urrea','https://view.publitas.com/mfa/catalogo-urrea-2017/','URREA 2018.jpg','Catálogo General'),(6,'Urrea','https://view.publitas.com/mfa/catalogo-lock-2017/','URREA FLUYE.jpg','Urrea Lock'),(7,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/16-17','Surtek Herramientas.jpg','Surtek Herramientas'),(8,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/161','Surtek Hidraulicos.jpg','Herramienta Hidráulica '),(9,'Dewalt','https://view.publitas.com/mfa/catalogo_dewalt/page/1','CATALOGO DEWALT.jpg','Catálogo General'),(10,'Dewalt','https://view.publitas.com/mfa/in_dewalt-power-tools-catalog-2018/page/1','Dewalt Power Tools.jpg','Professional Power Tools'),(11,'Dewalt','https://view.publitas.com/mfa/dewalt_programa_de_formacion_es/page/1','DEWALT Programa Formacion.jpg','Programa de Formaciónn'),(12,'Dewalt','https://view.publitas.com/mfa/dewalt-onsite_q1_2021/page/1','DEWALT Onsite.jpg','Novedades y Promociones'),(14,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/1','MIKELS 2021.jpg','Catálogo Corporativo 2021'),(15,'Soldaduras','https://view.publitas.com/mfa/catalogo_furius/','FURIUS.jpg','Furius'),(39,'Multimarcas','https://view.publitas.com/mfa/catalogo_grambel/','GRAMBEL.jpg','Grambel'),(40,'Soldaduras','https://view.publitas.com/mfa/catalogo_sweiss_5-3/','SWEISS.jpg','Sweiss'),(41,'Soldaduras','https://view.publitas.com/mfa/catalogo_elite_soldadura/','ELITE_SOLDADURA.jpg','Elite Soldadura '),(42,'Multimarcas','https://view.publitas.com/mfa/catalogo-phillips-candados/','PHILLIPS CANDADOS.jpg','Phillips Candados'),(43,'Multimarcas','https://view.publitas.com/mfa/catalogo_maraga/','MARAGA.jpg','Maraga'),(44,'Multimarcas','https://view.publitas.com/mfa/craftsman-guadalaraja/','CRAFTSMAN.jpg','Craftsman'),(45,'Soldaduras','https://view.publitas.com/mfa/synergy-catalogo-2018/','SYNERGY.jpg','Synergy'),(46,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/148-149','Surtek Automotriz.jpg','Herramientas Automotrices'),(47,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/164-165','Surtek Electrica.jpg','Herramienta Eléctrica'),(48,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/211','Surtek Agricultura.jpg','Agricultura y Jardinería'),(49,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/235','Surtek Proteccion.jpg','Protección y Seguridad'),(50,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/253','Surtek Carga.jpg','Manejo de Carga'),(51,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/266-267','Surtek Iluminacion.jpg','Iluminación '),(52,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/299','Surtek Ferretero.jpg','Productos Ferreteros'),(53,'Urrea','https://view.publitas.com/mfa/surtek_2017/page/316-317','Surtek Mercadeo.jpg','Mercadeo'),(54,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/14','MIKELS AUTOMOTRIZ.jpg','Línea Automotriz'),(55,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/72','MIKELS CICLISMO.jpg','Línea Ciclismo'),(56,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/78','MIKELS MOTOCICLISMO.jpg','Línea Motociclismo'),(57,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/84','MIKELS ELECTRICO.jpg','Línea Eléctrica '),(58,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/101','MIKELS FERRETERIA.jpg','Línea Ferretería '),(59,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/122','MIKELS TITAN.jpg','Línea TITAN'),(60,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/126','MIKELS INDUSTRIAL.jpg','Línea Industrial'),(61,'Mikels','https://view.publitas.com/mfa/catalogo-mikels/page/137','MIKELS LIMPIEZA.jpg','Línea Limpieza'),(62,'Dewalt','https://view.publitas.com/mfa/catalogo_dewalt_2020/page/1','CATALOGO_DEWALT.jpg','Catálogo Productos 2021'),(63,'Dewalt','https://view.publitas.com/mfa/catalogo_dewalt_2020/page/4-5','DEWALT INALAMBRICA.jpg','Herramienta Inalámbrica'),(64,'Dewalt','https://view.publitas.com/mfa/catalogo_dewalt_2020/page/50-51','DEWALT ELECTRICA.jpg','Herramienta Eléctrica'),(65,'Dewalt','https://view.publitas.com/mfa/catalogo_dewalt_2020/page/72-73','DEWALT ALMACENAMIENTO.jpg','Almacenamiento'),(66,'Dewalt','https://view.publitas.com/mfa/catalogo_dewalt_2020/page/70-71','DEWALT NEUMATICA.jpg','Herramienta Neumática '),(67,'Dewalt','https://view.publitas.com/mfa/catalogo_tarifa_sfm_herr-_electricas_accesorios_2020_es/page/1','SFM_Herr._Electricas_Accesorios.jpg','Herramientas Stanley ');

#
# Structure for table "tab_categoria"
#

CREATE TABLE `tab_categoria` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sucursal` varchar(50) NOT NULL DEFAULT '',
  `Img` varchar(50) NOT NULL DEFAULT '',
  `Href` varchar(255) NOT NULL DEFAULT '',
  `Desc` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_categoria"
#

INSERT INTO `tab_categoria` VALUES (1,'Milwaukee','2.jpg','https://cloudmfa.duckdns.org/index.php/s/MaBxpxFZaacYk8P','Accesorios'),(2,'Milwaukee','2.jpg','#','Pruebas y Medición'),(3,'Milwaukee','2.jpg','#','Manuales'),(4,'Milwaukee','2.jpg','#','Alambricos'),(5,'Milwaukee','2.jpg','#','Iluminación'),(6,'Milwaukee','2.jpg','#','Almacenaje'),(7,'Milwaukee','2.jpg','#','Seguridad Personal'),(8,'Milwaukee','2.jpg','#','Empire'),(9,'Dewalt','1.jpg','#','Accesorios'),(10,'Dewalt','1.jpg','#','Anclajes y Fijaciones'),(11,'Dewalt','1.jpg','#','Manuales'),(12,'Dewalt','1.jpg','#','Jardín'),(13,'Dewalt','1.jpg','#','Eléctricas'),(14,'Dewalt','1.jpg','#','In Situ'),(15,'Dewalt','1.jpg','#','Almacenamiento'),(16,'Urrea','3.png','#','Manuales'),(17,'Urrea','3.png','#','De Poder'),(18,'Urrea','3.png','#','Consumibles'),(19,'Urrea','3.png','#','Hidráulico y Carga'),(20,'Urrea','3.png','#','Diagnóstico, Medición y Trazo'),(21,'Urrea','3.png','#','Organización y Almacenamiento'),(22,'Urrea','3.png','#','Iluminación y Eléctricos'),(23,'Urrea','3.png','#','Seguridad'),(24,'Urrea','3.png','#','Ferretero'),(25,'Urrea','3.png','#','Grasa, Aceite y Fluidos'),(26,'Urrea','3.png','#','Mercadeo'),(27,'Mikels','4.jpg','#','Impacto'),(28,'Mikels','4.jpg','#','Eléctrica'),(29,'Mikels','4.jpg','#','Kits'),(30,'Mikels','4.jpg','#','General'),(31,'Mikels','4.jpg','#','Datos y Accesorios'),(32,'Mikels','4.jpg','#','Llaves'),(33,'Mikels','4.jpg','#','Desarmadores'),(34,'Mikels','4.jpg','#','Pinzas y Tijeras'),(35,'Atlas','5.png','#','Ferretería '),(36,'Atlas','5.png','#','Herramienta Eléctrica'),(37,'Atlas','5.png','#','Herramienta Inalámbrica'),(38,'Atlas','5.png','#','Herramienta de Jardín'),(39,'Atlas','5.png','#','Herramienta Manual');

#
# Structure for table "tab_cedis"
#

CREATE TABLE `tab_cedis` (
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `direccion` varchar(100) NOT NULL DEFAULT '',
  `colonia` varchar(10) NOT NULL DEFAULT '',
  `codigo_postal` varchar(5) NOT NULL DEFAULT '',
  `rfc` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_cedis"
#

INSERT INTO `tab_cedis` VALUES ('MAYOREO FERRETERO ATLAS S.A. DE C.V.','CALZADA INDEPENDENCIA SUR 375 ','ANALCO','44450','MFA030403T73');

#
# Structure for table "tab_empleado"
#

CREATE TABLE `tab_empleado` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '0',
  `status_empleado` varchar(50) NOT NULL DEFAULT 'ACTIVO',
  `apellido_pat_empleado` varchar(25) NOT NULL DEFAULT '',
  `apellido_mat_empleado` varchar(25) NOT NULL DEFAULT '',
  `nombre_empleado` varchar(50) NOT NULL DEFAULT '',
  `domicilio_empleado` varchar(100) NOT NULL DEFAULT '',
  `colonia_empleado` varchar(100) NOT NULL DEFAULT '',
  `codigo_postal_empleado` varchar(5) NOT NULL DEFAULT '',
  `ciudad_empleado` varchar(25) NOT NULL DEFAULT '',
  `estado_empleado` varchar(20) NOT NULL DEFAULT '',
  `NSS_empleado` varchar(11) NOT NULL DEFAULT '',
  `RFC_empleado` varchar(13) NOT NULL DEFAULT '',
  `CURP_empleado` varchar(18) NOT NULL DEFAULT '',
  `sexo_empleado` varchar(10) NOT NULL DEFAULT '',
  `fecha_nacimiento_empleado` date DEFAULT NULL,
  `pais_nacimiento_empleado` varchar(25) NOT NULL DEFAULT '',
  `estado_nacimiento_empleado` varchar(25) NOT NULL DEFAULT '',
  `ciudad_nacimiento_empleado` varchar(25) NOT NULL DEFAULT '',
  `estado_civil_empleado` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_empleado"
#

INSERT INTO `tab_empleado` VALUES ('004','ACTIVO','Barriga','Reyes','Gerardo','RIO BENUE #1430','JARDINES DEL ROSARIO','44890','GUADAJALARA','JALISCO','04825704317','BARG5711051K5','BARG571105HDFRYR04','Masculino','1957-11-05','MÉXICO','MÉXICO','DF','CASADO'),('153','ACTIVO','Leal','García','Víctor Manuel','AV. FEDERALISMO#817','MODERNA','44190','GUADAJALARA','JALISCO','O4967725898','LEGN770406F49','LEGN770406HJCLRC07','Masculino','1977-04-06','México','GUADALAJARA','JALISCO','CASADO'),('316','ACTIVO','Gutierrez','Lechuga','Brandon Manuel','FLOR DE SANTA MARIA #52','GUAYABITOS/ARROYO HONDO','45530','TLAQUEPAQUE','JALISCO','4129488037','GULB940724LB1','GULB940724HJCTCR00','Masculino','1994-07-24','MÉXICO','JALISCO','GUADAJALARA','SOLTERO');

#
# Structure for table "tab_extra"
#

CREATE TABLE `tab_extra` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `dias` int(11) DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_extra"
#


#
# Structure for table "tab_facebook"
#

CREATE TABLE `tab_facebook` (
  `Sucursal` varchar(50) NOT NULL DEFAULT '',
  `Url` text NOT NULL,
  PRIMARY KEY (`Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_facebook"
#

INSERT INTO `tab_facebook` VALUES ('Agroforestal','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAgroforestalAtlasTools&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId'),('Dewalt','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdewaltgdl&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId'),('La Paz',''),('Mayoreo','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmayoreoferreatlasgdl%2F&tabs&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId'),('Mikels','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmikelsguadalajara&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId'),('Milwaukee','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmilwaukeestorecalzada%2F&tabs&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId'),('Outlet','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Foutletgdlatlas%2F&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId'),('Tepatitlan','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAtlasToolsTEPA&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId'),('Ujueta','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsoldadorasatlastools&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId'),('Urrea','https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Furreastorecalzada&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId');

#
# Structure for table "tab_galeria"
#

CREATE TABLE `tab_galeria` (
  `Sucursal` varchar(30) NOT NULL DEFAULT '',
  `Img0` varchar(50) DEFAULT NULL,
  `Img1` varchar(50) DEFAULT NULL,
  `Img2` varchar(50) DEFAULT NULL,
  `Img3` varchar(50) DEFAULT NULL,
  `Img4` varchar(50) DEFAULT NULL,
  `Img5` varchar(50) DEFAULT NULL,
  `Img6` varchar(50) DEFAULT NULL,
  `Img7` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_galeria"
#

INSERT INTO `tab_galeria` VALUES ('Agroforestal','0.jpg','1.jpg','2.jpg','3.jpg','4.jpg','','',''),('Dewalt','0.jpg','1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg',NULL),('La Paz','0.jpg','1.jpg','2.jpg','3.jpg','','','',''),('Mikels','0.jpg','1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg'),('Milwaukee','0.jpg','1.jpg','2.jpg','3.jpg','4.jpg',NULL,NULL,NULL),('Outlet','0.jpeg','1.jpeg','2.jpeg','3.jpeg','4.jpeg','5.jpeg','6.jpeg',NULL),('Tepatitlan','SUCURSAL TEPATITLAN.jpg','','','','','','',''),('Ujueta','0.jpg','1.jpg','2.jpeg','3.jpeg','4.jpeg','','',''),('Urrea','0.jpg','1.jpg','','','','','','');

#
# Structure for table "tab_incapacidad"
#

CREATE TABLE `tab_incapacidad` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_incapacidad"
#


#
# Structure for table "tab_infonavit"
#

CREATE TABLE `tab_infonavit` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `descuento` double(11,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_infonavit"
#


#
# Structure for table "tab_login"
#

CREATE TABLE `tab_login` (
  `User` varchar(50) NOT NULL DEFAULT '0',
  `Pass` varchar(255) NOT NULL DEFAULT '',
  `Priv` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_login"
#

INSERT INTO `tab_login` VALUES ('Administrator','f384582d5f0867ac2021ffd613656aa878251788','Admin'),('Reclutar','66f4c0c2501ab42d0384fe6ec4e92445e7bf2604','RH');

#
# Structure for table "tab_marca"
#

CREATE TABLE `tab_marca` (
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Img_url` varchar(255) NOT NULL DEFAULT '',
  `Link` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_marca"
#

INSERT INTO `tab_marca` VALUES ('ADIR','BANNER 13.png','#'),('AX TECH','VANNER 7.png','#'),('BLACK + DECKER','BANNER 12.png','#'),('BOSCH','BANNER 14.png','#'),('BOSTITCH','BANNER 15.png','#'),('DEWALT','VANNER 3.png','#'),('DOGO TULS','VANNER 6.png','#'),('EINHELL','BANNER 16.png','#'),('ELITE','VANNER 4.png','#'),('FESTOOL','BANNER 17.png','#'),('FURIUS','VANNER 10.png','#'),('HILTI','BANNER 18.png','#'),('LOCK','VANNER 9.png','#'),('MILWAUKEE','VANNER 8.png','#'),('STANLEY','VANNER 5.png','#'),('SURTEK','VANNER 2.png','#'),('SWEISS','VANNER 11.png','#'),('URREA','VANNER 1.png','#');

#
# Structure for table "tab_modal_promocion"
#

CREATE TABLE `tab_modal_promocion` (
  `Id_promocion` int(11) NOT NULL AUTO_INCREMENT,
  `Imagen_url` varchar(100) NOT NULL DEFAULT '',
  `Url` varchar(255) NOT NULL DEFAULT '',
  `Status` varchar(5) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`Id_promocion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_modal_promocion"
#

INSERT INTO `tab_modal_promocion` VALUES (1,'1.png','#','true'),(2,'istockphoto-1134876408-170667a.jpg','#','true'),(3,'48e597a03f8b02d62757d1447ec567ad.jpg','#','true'),(4,'POSTER-OFICIAL-SANCOCHO-FEST.jpg','#','true'),(5,'white-poster.jpg','#','true'),(6,'Canva-Coronavirus-Disease-Collection-poster-5.png','#','false');

#
# Structure for table "tab_nosotros"
#

CREATE TABLE `tab_nosotros` (
  `Sucursal` varchar(50) NOT NULL DEFAULT '',
  `Mision` varchar(255) DEFAULT NULL,
  `Mision_txt` text DEFAULT NULL,
  `Vision` varchar(255) DEFAULT NULL,
  `Vision_txt` text DEFAULT NULL,
  `Adicional` varchar(255) DEFAULT NULL,
  `Adicional_txt` text DEFAULT NULL,
  PRIMARY KEY (`Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_nosotros"
#

INSERT INTO `tab_nosotros` VALUES ('Mayoreo','Misión','Somos un empresa con cobertura Nacional en la comercialización de herramientas y suministro industriales de marcas líderes en el mercado, creando una experiencia de compra y buscando exceder las expectativas de nuestros clientes, potencializando el talento y desarrollo colectivo.','Visión','Seguiremos siendo una empresa dinámica, reinventándonos las veces que sean necesarias para crecer de la mano de nuestros clientes y proveedores. Siendo buscadores de talento, anteponiendo el trato humano de calidad con calidez, excediendo las expectativas','Valores','ORIENTACIÒN AL SERVICIO\nINTEGRIDAD\nCOMPROMISO\nADAPTABILIDAD\nINNOVACIÒN\nCONSTANCIA');

#
# Structure for table "tab_rrhh"
#

CREATE TABLE `tab_rrhh` (
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `correo` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(20) NOT NULL DEFAULT '',
  `fb` varchar(255) NOT NULL DEFAULT '',
  `wp_txt` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_rrhh"
#

INSERT INTO `tab_rrhh` VALUES ('Lic. Carlos Grajeda','karlos@mayoreoferreteroatlas.com','33 1889 8437','https://www.messenger.com/t/100040982919290/','Quiero ser parte del equipo!'),('Lic. Stephany Lopez','fany@mayoreoferreteroatlas.com','33 2972 4073','https://www.messenger.com/t/100055884110792/','Quiero ser parte del equipo!');

#
# Structure for table "tab_social"
#

CREATE TABLE `tab_social` (
  `red_social` varchar(50) NOT NULL DEFAULT '',
  `Url_social` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`red_social`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_social"
#

INSERT INTO `tab_social` VALUES ('facebook','https://www.messenger.com/t/456003581199003/'),('twitter','https://twitter.com/sisteatlas'),('whatsapp','https://api.whatsapp.com/send?phone=523315731134'),('youtube','https://www.youtube.com/channel/UCvOGiYvRYUUTkRZC35t28Qg');

#
# Structure for table "tab_sucursal"
#

CREATE TABLE `tab_sucursal` (
  `nombre_sucursal` varchar(30) NOT NULL DEFAULT '',
  `direccion` varchar(100) NOT NULL DEFAULT '',
  `colonia` varchar(50) NOT NULL DEFAULT '',
  `codigo_postal` varchar(5) NOT NULL DEFAULT '',
  `municipio` varchar(50) NOT NULL DEFAULT '',
  `correo` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(25) NOT NULL DEFAULT '',
  `horario_1` varchar(25) NOT NULL DEFAULT '',
  `horario_2` varchar(25) NOT NULL DEFAULT '',
  `mapa` text NOT NULL,
  `mapa_cel` text NOT NULL,
  PRIMARY KEY (`nombre_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_sucursal"
#

INSERT INTO `tab_sucursal` VALUES ('Tienda Agroforestal','Calz. Independencia Sur #543A','Col. Analco','44050','Guadalajara, Jal.','clientes@todoaljardin.com.mx','33 3345 0116 ','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m18!1m12!1m3!1d3733.038557245888!2d-103.34771538507339!3d20.668010286194914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1a1ce921b35%3A0xfdd6bceae649d421!2sAgroforestal%20guadalajara!5e0!3m2!1ses-419!2smx!4v1611849639905!5m2!1ses-419!2smx','Agroforestal+guadalajara/@20.6680103,-103.3477154,17z/data=!3m1!4b1!4m5!3m4!1s0x8428b1a1ce921b35:0xfdd6bceae649d421!8m2!3d20.6680103!4d-103.3455267'),('Tienda Dewalt','Guadalupe Victora #31','Col. Analco','44050','Guadalajara, Jal.','ventas@dewaltguadalajara.com','33 3837 7658','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m14!1m8!1m3!1d7466.050977233369!2d-103.344994!3d20.668542!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6af65a82c8239da6!2sHerramientas%20Dewalt%20-%20Dewalt%20Guadalajara!5e0!3m2!1ses!2smx!4v1611775706918!5m2!1ses!2smx','Herramientas+Dewalt+-+Dewalt+Guadalajara/@20.668542,-103.344994,16z/data=!4m5!3m4!1s0x0:0x6af65a82c8239da6!8m2!3d20.668542!4d-103.344994?hl=es'),('Tienda La Paz','Calz Independencia Sur #601','Barragán Hdez','44469','Guadalajara, Jal.','info.clientes@atlastools.com.mx ','33 3837 7662','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m18!1m12!1m3!1d3733.0816014326047!2d-103.34862168507348!3d20.66625888619584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfdf674bcec5e423b!2sAtlas%20Tools%20Multilapaz!5e0!3m2!1ses-419!2smx!4v1613151342813!5m2!1ses-419!2smx','Atlas+Tools+Multilapaz/@20.6662589,-103.3486217,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xfdf674bcec5e423b!8m2!3d20.6662589!4d-103.346433'),('Tienda Mikels','Calz. Independencia Sur #375','Col. Analco','44050','Guadalajara, Jal.','clientes@mikelsguadalajara.com','33 3837 7648','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m18!1m12!1m3!1d3733.009778071753!2d-103.34708698507337!3d20.66918118619422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1f70419b7cd%3A0xce1a7c887efc98de!2sMikels%20Guadalajara%20-%20Tienda%20Multimarcas!5e0!3m2!1ses-419!2smx!4v1611846839060!5m2!1ses-419!2smx','Mikels+Guadalajara+-+Tienda+Multimarcas/@20.6691812,-103.347087,17z/data=!3m1!4b1!4m5!3m4!1s0x8428b1f70419b7cd:0xce1a7c887efc98de!8m2!3d20.6691812!4d-103.3448983'),('Tienda Milwaukee','Calz. Independencia #533','Col. Analco','44050','Guadalajara, Jal.','clientes@milwaukeeguadalajara.com','33 3314 0116','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m14!1m8!1m3!1d14932.13498787118!2d-103.3454144!3d20.668206!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x17c7bdb616a8a917!2sMILWAUKEE%20TOOL%20HERRAMIENTAS%20PUNTO%20ROJO!5e0!3m2!1ses-419!2smx!4v1613150784999!5m2!1ses-419!2smx','MILWAUKEE+TOOL+HERRAMIENTAS+PUNTO+ROJO/@20.668206,-103.3454144,15z/data=!4m5!3m4!1s0x0:0x17c7bdb616a8a917!8m2!3d20.668206!4d-103.3454144'),('Tienda Outlet','Guadalupe Victora #55','Col. Analco','44050','Guadalajara, Jal.','clientes@tiendaoutletgdl.com','33 3837 7661','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m18!1m12!1m3!1d933.257808481859!2d-103.34504351086959!3d20.6683082463341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3224e2c938b4d5d8!2sHERRAMIENTAS%20OUTLET%20GUADALAJARA!5e0!3m2!1ses-419!2smx!4v1611847117391!5m2!1ses-419!2smx','HERRAMIENTAS+OUTLET+GUADALAJARA/@20.6683082,-103.3450435,19z/data=!4m8!1m2!2m1!1stienda+outlet+gdl!3m4!1s0x0:0x3224e2c938b4d5d8!8m2!3d20.6683749!4d-103.3447313'),('Tienda Tepatitlan','Blvd. Gonzales Flores #1328','Las Aguilillas','47698','Tepatitlán de Morelos, Jal.','info.clientes@atlastools.com.mx ','37 8157 0001','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m18!1m12!1m3!1d3729.918898624292!2d-102.77207668507354!3d20.79456870110776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84292971a632df29%3A0xbed9beba4a403cc9!2sATLAS%20TOOLS!5e0!3m2!1ses-419!2smx!4v1613150709115!5m2!1ses-419!2smx','ATLAS+TOOLS/@20.7945687,-102.7720767,17z/data=!3m1!4b1!4m5!3m4!1s0x84292971a632df29:0xbed9beba4a403cc9!8m2!3d20.7945637!4d-102.769888'),('Tienda Ujueta','Calz Independencia Sur #351','Col. Analco','44450','Guadalajara, Jal.','info.clientes@atlastools.com.mx ','33 3466 4834','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m14!1m8!1m3!1d14932.00044235416!2d-103.3445787!3d20.6695745!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x47d3b76568caad47!2sUJUETA%20STORE!5e0!3m2!1ses-419!2smx!4v1613143848883!5m2!1ses-419!2smx','UJUETA+STORE/@20.6695745,-103.3445787,15z/data=!4m5!3m4!1s0x0:0x47d3b76568caad47!8m2!3d20.6695745!4d-103.3445787'),('Tienda Urrea','Calz Independencia sur #359','Col. Analco','44050','Guadalajara, Jal.','info.clientes@mayoreoferreteroatlas.com','33 3837 7649','8:30 AM - 6:30PM','8:30 AM - 2:00PM','!1m18!1m12!1m3!1d2639.6337212723765!2d-103.34531033205101!3d20.669342693197613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2a5e3e2820d46bdc!2sUrrea%20Store!5e0!3m2!1ses-419!2smx!4v1611847569645!5m2!1ses-419!2smx','Urrea+Store/@20.6693427,-103.3453103,17.5z/data=!4m8!1m2!2m1!1stienda+urrea+gdl!3m4!1s0x0:0x2a5e3e2820d46bdc!8m2!3d20.6695745!4d-103.3445786');

#
# Structure for table "tab_suscripcion"
#

CREATE TABLE `tab_suscripcion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL DEFAULT '',
  `Correo` varchar(255) NOT NULL DEFAULT '',
  `Telefono` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_suscripcion"
#

INSERT INTO `tab_suscripcion` VALUES (1,'Brandon Lechuga','brihand.lech@gmail.com','3317202513');

#
# Structure for table "tab_vacantes"
#

CREATE TABLE `tab_vacantes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `vacante` varchar(50) NOT NULL DEFAULT '',
  `requisitos` text NOT NULL,
  `ofrecemos` text NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '',
  `visible` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_vacantes"
#

INSERT INTO `tab_vacantes` VALUES (1,'Chofer Vendedor','● Experiencia en venta al detalle de herramientas y ferretería.\n● Contar con licencia de conducir vigente.','✔ Sueldo $1,500 iniciales + comisiones.\n✔ Pago semanal.\n✔ Prestaciones de ley.\n✔ Descuentos en productos de la empresa.\n✔ Crecimiento laboral.\n✔ Contratación directa por la empresa.\n✔ Uniformes.','Chofer-de-Reparto.jpg','true'),(2,'Ejecutivo de Ventas Telemarketing','● Sexo: Indistinto.\n● Edad: 19 años en adelante.\n● Escolaridad: Preparatoria.\n● Experiencia: En ventas y/o Telemarketing.\n● Persona, persuasiva, con facilidad de palabra, dinámica, comprometida con el cliente.','✔ Pago semanal + comisiones 1% y 3%.\n✔ Prestaciones de ley.\n✔ Descuentos en productos de la empresa.\n✔ Contratación directa.','mtk1.jpg','true'),(3,'Cajera Vendedora','● Experiencia en el giro ferretero.\n● 20 -40 años.\n● Disponibilidad de horario.\n● Excelente presentación\n● Gusto por la atención al cliente.\n● Ganas de aprender','✔ Sueldo $1,500 + comisiones.\n✔ Prestaciones de ley.\n✔ Descanso los domingos.\n✔ Contratación directa.','cajero-de-tienda.webp','true'),(4,'Chofer','','','','true');

#
# Structure for table "tab_web"
#

CREATE TABLE `tab_web` (
  `Sucursal` varchar(50) NOT NULL DEFAULT '',
  `Img_logo` varchar(50) NOT NULL DEFAULT '',
  `Titulo` varchar(50) NOT NULL DEFAULT '',
  `Sub_titulo` varchar(100) NOT NULL DEFAULT '',
  `Slogan` varchar(100) NOT NULL DEFAULT '',
  `Sub_slogan` text NOT NULL,
  `Img_sucursal` varchar(50) NOT NULL DEFAULT '',
  `Mfa_texto` text NOT NULL,
  PRIMARY KEY (`Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_web"
#

INSERT INTO `tab_web` VALUES ('Agroforestal','SUCURSAL AGROFORESTAL SFONDO.png','TODO PARA EL JARDIN','Atlas Tools','Herramientas y Variedad de marcas.','Contamos con las mejores marcas a nivel mundial.','Captura.PNG','Con mas de 100 años en el mercado, siempre nos hemos caracterizado por ser la mejor opción, en calidad, garantía y precio para nuestros clientes contando con una extensa gama de productos ferreteros.'),('Dewalt','VANNER 3.png','DEWALT GUADALAJARA','Solidez Garantizada.','Tecnologia y Calidad en herramientas','Somos una de las primeras tiendas exclusivas de la marca Dewalt en guadalajara. Nuestra experiencia en el ramo ferretero nos respalda; tenemos como único objetivo logras que tú estes satisfecho con nuestro servicio y compruebes la calidad nuestras herramientas.','dewalt.jpg','Somos una empresa de Distribución Mayorista , líder en la Industria, Ramo Ferretero, Automotriz y Eléctrico. Especialistas en todo tipo de Industria. Nuestra permanencia y trayectoria en el mercado nos proporciona una alta experiencia que nos avala como una empresa preocupada por la calidad y el servicio en nuestros productos, que complementamos con un rápido, eficaz y excelente precio.'),('La Paz','SUCURSAL LA PAZ SFONDO.png','MULTIHERRAMIENTAS Y MÁS .','Atlas Tools','Todo lo que necesitas en un solo lugar.','Contamos con las mejores marcas a nivel mundial.','83205227_114818156750984_3254619014525091840_o.jpg','Con mas de 100 años en el mercado, siempre nos hemos caracterizado por ser la mejor opción, en calidad, garantía y precio para nuestros clientes contando con una extensa gama de productos ferreteros.'),('Mikels','MIKELS.png','MIKEL`S GUADALAJARA','Cuidar su seguridad con calidad','Enfocada a dar soluciones empresariales desde 1960','La promesa de Industrias Tamer es más que un aspecto único de nuestra cultura, es un compromiso sincero con nuestros clientes, con nuestros empleados y con nuestra comunidad, de que siempre nos apegaremos a los más altos estándares de calidad en todo lo que hagamos.','mikels.jpg','Actualmente nuestra línea de productos abarca más de 1000 productos para abastecer diferentes canales de venta.\nSomos una empresa certificada en la norma de calidad ISO/TS y en la norma ambiental ISO-14001. Lo cual ha contribuido a fortalecer nuestra presencia en el campo de equipo original, obteniendo el liderazgo en el consumo de este sector en México. Como nuestro eslogan lo puntualiza: “Cuidar su seguridad con calidad” es y seguirá siendo nuestra meta y compromiso.'),('Milwaukee','VANNER 8.png','MILWAUKEE GUADALAJARA','El poder esta en tus manos.','Milwaukee siempre pensando en ti.','Contamos con una variedad de clasificación de catálogos que te ayudaran para escoger tus herramientas','milwaukee.jpg','La marca número 1 en herramientas en Estados Unidos llega a Guadalajara, Mayoreo Ferretero Atlas incrementa su extensa líneas de marcas para ofrecerte herramientas de calidad y duración ( Milwaukee Guadalajara).'),('Outlet','outlet_logo.jpg','OUTLET DE HERRAMIENTAS','Herramientas de Calidad al mejor precio','Especialistas en todo tipo de  Industria. ','Contamos con las mejores marcas a nivel mundial.','outlet.jpg','Herramientas Outlet Guadalajara es una empresa con la exclusividad de especialización en distribución de herramientas OUTLET, en las marcas URREA, SURTEK, FOY y LOCK. Contamos con una importante red de distribución que  cubre gran parte del país.'),('Tepatitlan','SUCURSAL TEPATITLAN SFONDO.png','.','Atlas Tools','Nuestras mejores marcas cercas de ti.','Contamos con las mejores marcas a nivel mundial.','DSC_0614.jpg','Con mas de 100 años en el mercado, siempre nos hemos caracterizado por ser la mejor opción, en calidad, garantía y precio para nuestros clientes contando con una extensa gama de productos ferreteros.'),('Ujueta','UJUETA.png','SOLDADORA Y EQUIPOS INVERSORES','Atlas Tools','Soldando con calidad','Contamos con las mejores marcas a nivel mundial.','ujueta.jpg','Con mas de 100 años en el mercado, siempre nos hemos caracterizado por ser la mejor opción, en calidad, garantía y precio para nuestros clientes contando con una extensa gama de productos ferreteros.'),('Urrea','VANNER 1.png','URREA GUADALAJARA','Herramientas de calidad superiror.','Grupo Urrea','Somos una empresa 100% Mexicana con presencia global, con más de 100 años de vida','urrea.jpg','Es la marca preferida por los usuarios que requieren “Herramientas de Calidad Superior” para uso pesado y continuo, pues saben que obtendrán productos con INNOVACIÓN, TECNOLOGÍA, RENDIMIENTO y DISEÑO SUPERIOR.\n');

#
# Structure for table "tab_youtube"
#

CREATE TABLE `tab_youtube` (
  `Url` varchar(20) NOT NULL DEFAULT '',
  `posicion` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_youtube"
#

INSERT INTO `tab_youtube` VALUES ('f0_amW5OBrE',5),('n9Yeq2HQ7Z4',4),('TACkDaAZsX0',1),('WmrxL688ZTc',2),('ZVrwtvz9P28',3);
