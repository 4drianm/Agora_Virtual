# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.19)
# Base de datos: Agora
# Tiempo de Generación: 2018-09-27 23:37:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla categoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` int(255) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(15) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;

INSERT INTO `categoria` (`id_categoria`, `categoria`)
VALUES
	(1,'Bebidas'),
	(2,'Comidas'),
	(3,'Dulces'),
	(4,'Cigarros'),
	(5,'Postres');

/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla productos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(75) DEFAULT NULL,
  `id_vendedor` bigint(20) NOT NULL,
  `id_categoria` int(255) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_id_categoria` (`id_categoria`),
  KEY `fk_id_vendedor` (`id_vendedor`),
  CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE,
  CONSTRAINT `fk_id_vendedores` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id_vendedor`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `descripcion`, `id_vendedor`, `id_categoria`)
VALUES
  (1,'Producto en venta_5',23,'descripción del producto',1,2),
	(2,'pay de limon',10,NULL,2,5),
	(3,'coca-cola',19,'ZERO',2,1),
	(4,'tortas',25,'jamon, quesoamarillo, lechugays jamon,queso',1,2),
	(5,'cigarros',5,'marlboro, camel',1,4),
	(6,'pizza',28,'peperoni, hawaiana',1,2),
  (7,'Elemento en venta_1',23,'descripción del producto',2,1),
  (8,'Elemento en venta_2',23,'descripción del elemento',1,5),
  (9,'Elemento en venta',23,NULL,2,1),
  (10,'Producto en venta',23,'descripción del -',2,4),
  (11,'Producto en venta_3',23,NULL,1,3),
  (12,'Producto en venta',23,'des del producto',2,1),
  (13,'coca-cola',19,'ZERO',2,1),
  (14,'tortas',25,'jamon, quesoamarillo, lechugays jamon,queso',1,2),
  (15,'cigarros',5,'marlboro, camel',1,4),
  (16,'pizza',28,'peperoni, hawaiana',1,2),
  (17,'Elemento en venta_1',23,'descripción del producto',2,1),
  (18,'Elemento en venta_2',23,'descripción del elemento',1,5),
  (19,'Elemento en venta',23,NULL,2,1);

/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla vendedores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vendedores`;

CREATE TABLE `vendedores` (
  `id_vendedor` bigint(255) NOT NULL,
  `nombre_vendedor` varchar(255) NOT NULL,
  `horario_inicio` time DEFAULT NULL,
  `disponibilidad` int(1) DEFAULT NULL,
  `horario_final` time DEFAULT NULL,
  `mail` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_vendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;

INSERT INTO `vendedores` (`id_vendedor`, `nombre_vendedor`, `horario_inicio`, `disponibilidad`, `horario_final`, `mail`, `password`)
VALUES
	(1,'Adrian','07:00:00',1,'08:00:00','a1','a1'),
	(2,'Fernanda','07:00:00',1,'08:00:00','a2','a2');

/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
