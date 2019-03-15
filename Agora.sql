# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.19)
# Base de datos: Agora
# Tiempo de Generación: 2019-03-15 05:05:51 +0000
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `precio` float NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `id_vendedor` int(255) NOT NULL,
  `id_categoria` int(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_id_categoria` (`id_categoria`),
  KEY `fk_id_vendedor` (`id_vendedor`),
  CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE,
  CONSTRAINT `fk_id_vendedores` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id_vendedor`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `descripcion`, `id_vendedor`, `id_categoria`, `imagen`)
VALUES
	(2,'Flan',10,'Rico flan!! ',0,5,'uploads/42821503_897510513787629_2764844703848333312_o.jpg'),
	(3,'coca-cola',15,'',2,1,'uploads/42213868_1886312321452591_7735926279865630720_n.jpg'),
	(6,'hamburguesas vegetarianas',28,'Ricas y saludables hamburguesas vegetarianas! De avena con zanahoria!',1,2,'uploads/42500822_1843967932383106_8669617767327989760_n.jpg'),
	(7,'Refrescos',10,'La manzanita está agotada',2,1,'uploads/34108635_1728372103913281_3704966328583454720_n.jpg'),
	(10,'cigarros',5,'1 x 5 ó 3 x12',4,4,'uploads/28424945_2240430069304220_521342992777950048_o.jpg'),
	(11,'BOTANAS',6,'RICAS GOMITAS ENCHILADAS, PAMNDITAS, CACHUATES SALADOS Y CON CHILE',0,3,'uploads/42181864_2376364335712796_3704508661163360256_n.jpg'),
	(16,'coca -cola',10,'',2,1,'uploads/28698580_2240430132637547_3819348440180011689_o.jpg'),
	(22,'Gashetas',10,'orejitas, estrella,polvorones, barras de nuez y paquetes surtidos',1,5,'uploads/42529455_10156602022738407_1642465828374839296_o.jpg'),
	(23,'Pay de limón',12,'Rico pay de limón',0,5,'uploads/42424679_895747277297286_7831653417196978176_n.jpg'),
	(24,'kinder délice',10,'Kit kat $15 / kinder chocolate $5',4,3,'uploads/28827186_2240430199304207_6315191319909334666_o.jpg'),
	(25,'Dulces, palomitas, cacahu',1,'Chocolates 2 pesos\nMini mazapanes 50 centavos\nPica fresas 50 centavos etc..',0,3,'uploads/28378468_2018531024842499_2415595064506246659_n.jpg'),
	(26,'Rollitos de hojaldre !',12,'2 x $20\nZarzamora ó Durazno c/queso philadelfia',2,5,'uploads/28699042_2051548551527937_885529304554849151_o.jpg'),
	(27,'Dulces - varios',10,NULL,4,3,'uploads/28061118_220350411860885_5775617156781116179_o.jpg'),
	(30,'cigarros',5,'gran variedad en cigarros y promociones exclusivas con apoyo a la economía ',0,4,'uploads/28276559_209433549797845_1333883865444909229_n.jpg'),
	(31,'Pan relleno de queso Philadelfia',4,NULL,4,2,'uploads/27173561_1539731296141662_840994587980429147_o.jpg'),
	(32,'Burritos grandes',20,'pollo con champiñones, lechuga y frijoles',1,2,'uploads/27355590_10156044809324931_3747036957320683443_o.jpg'),
	(33,'sandwich',20,'jamón\nqueso amarillo\nchiles chipotle\ntomate\nlechuga',2,2,'uploads/26230625_1714102655307124_1398698138886971142_n.jpg'),
	(34,'Gatorade Flow',20,'aprovecha si tienes partido con tus compañeros armate la promo 3 x 50',4,1,'uploads/36621279_10204342616441144_4328974701020839936_o.jpg'),
	(36,'Pack de milanesa',50,'Milanesa-lechuga\nPepino y zanahoria\npuré de papa con tocino.\nSopa de fideos\nAgua simple de 500ml',4,2,'uploads/42397434_2042451645794395_2822423915886804992_o.jpg'),
	(37,'Sandwich Tostado',15,'sandwich de pan Integral Tostado en la sandwichera, con quesito Oaxaca. ',4,2,'uploads/37259784_1515620088543302_8141659599661957120_n.jpg'),
	(40,'Pambazos',20,'Buen Fin de semana chicos!\n¡Es viernes! Conscientete con un rico pambazo de Pollo o papá con Chorizo.',2,2,'uploads/37126973_1511174998987811_1895706922737205248_o.jpg'),
	(41,'Dulces y botanas',10,'Hot nuts $10 \nCanelitas $5 \nCrunch $12 \nHersheys $7\nTakis $6\nPaletas bubaloo azul/roja, peloneta, frutas $5\nMazapan $4\nMamut $5\nMuibon $5 ',0,3,'uploads/36938945_1713265858768684_3183154400851918848_n.jpg'),
	(42,'Manzanas cubiertas de chamoy y miguelito',16,NULL,2,3,'uploads/36367207_10212146212918746_1385199640986517504_n.jpg'),
	(43,'chicharrones con salsa',5,NULL,0,3,'uploads/35853450_2114912048553607_5009240187188805632_n.jpg'),
	(45,'Crepas de nutellaaaa',20,'Deliciosas y nutritivas crepas de nutella con arándanos, almendras o nuez a elegir - 1x20 ó 2x35',2,5,'uploads/34703105_2340145956213837_5891011142154715136_o.jpg'),
	(46,'Combitos',30,'Delicioso Sándwich +Sopa fría +Boing de 500ml',0,2,'uploads/34603310_1839904572712996_8282497534417436672_n.jpg'),
	(47,'¡Ricas banderillas!',5,NULL,4,2,'uploads/34018389_1859395394117024_1894989259471847424_n.jpg'),
	(48,'cigarros',5,NULL,1,4,'uploads/34207148_976941072481510_23754613710651392_o.jpg'),
	(49,'Donas :)',10,NULL,0,5,'uploads/33528418_1966899283380035_8620476130211659776_o.jpg'),
	(50,'Pastes',15,'Papá con chorizo\n\nJamón y queso mozzarella ( una salsa Valentina de regalo)',4,2,'uploads/33120348_1863083300397898_4790953486596440064_n.jpg');

/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla vendedores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vendedores`;

CREATE TABLE `vendedores` (
  `id_vendedor` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_vendedor` varchar(255) NOT NULL,
  `disponibilidad` int(1) DEFAULT NULL,
  `mail` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `telefono` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_vendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;

INSERT INTO `vendedores` (`id_vendedor`, `nombre_vendedor`, `disponibilidad`, `mail`, `password`, `telefono`)
VALUES
	(0,'Jessica',0,'a0','a0','5215543565440'),
	(1,'Adrian',0,'a1','a1','5215543435730'),
	(2,'Fernanda',0,'a2','a2','5215584273499'),
	(4,'Gabriel',1,'a4','a4','5215512322560');

/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
