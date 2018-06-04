-- create database b21190_tienda_online
use b21190_tienda_online;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaonline`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE `sp_delete_product` (IN `id_` INT)  NO SQL
UPDATE `tbproduct` SET active= b'0'  where id_Product = id_$$

CREATE PROCEDURE `sp_delete_tipo_producto` (IN `id_` INT)  NO SQL
UPDATE tbtypeproduct,tbproduct

SET
tbtypeproduct.active=b'0',tbproduct.active=b'0'
WHERE
tbtypeproduct.idTypeproduct = id_ and tbproduct.category = id_$$

CREATE   PROCEDURE `sp_exist_tipo_producto` (INOUT `nombre` VARCHAR(100))  NO SQL
    SQL SECURITY INVOKER
if EXISTS(SELECT nombre FROM `tbtypeproduct` WHERE active= b'1' AND nameTypeProduct=@nombre) THEN SET @nombre='yes'; ELSE SET @nombre='not'; END IF$$

CREATE   PROCEDURE `sp_exist_user` (IN `name` VARCHAR(40), IN `pass` VARCHAR(40))  NO SQL
SELECT idClient,emailClient,userClient,passwordClient, edad,rol,active 
FROM tbuser 
WHERE( emailClient = name or userClient=name)
and (active =b'1')and passwordClient = pass$$

CREATE   PROCEDURE `sp_insert_producto` (IN `name` VARCHAR(50), IN `category` INT, IN `price` INT, IN `description` VARCHAR(100), IN `pic` VARCHAR(2000))  NO SQL
IF EXISTS(SELECT nombre FROM tbproduct WHERE nombre=name) THEN UPDATE tbproduct SET active=b'1' WHERE nombre=name; ELSE INSERT INTO tbproduct (nombre,category, price,description,imageUrl, active) VALUES (name,category, price, description,pic, b'1') ; END IF$$

CREATE   PROCEDURE `sp_insert_tipo_producto` (IN `nombre` VARCHAR(100))  NO SQL
IF EXISTS(SELECT nombre FROM `tbtypeproduct` WHERE nameTypeProduct=nombre) THEN UPDATE `tbtypeproduct` SET active=b'1' WHERE nameTypeProduct=nombre; ELSE INSERT INTO `tbtypeproduct` (nameTypeProduct, 	active) VALUES (nombre, b'1') ; END IF$$

CREATE   PROCEDURE `sp_insert_user` (IN `email_` VARCHAR(40), IN `nick_` VARCHAR(40), IN `pass_` VARCHAR(40), IN `edad_` INT, IN `rol_` INT)  NO SQL
INSERT INTO `tbuser`( `emailClient`, `userClient`, `passwordClient`, `edad`, `rol`, `active`) VALUES (email_,nick_,pass_,edad_,rol_,b'1')$$

CREATE   PROCEDURE `sp_listar_admin` ()  NO SQL
SELECT `idClient`, `emailClient`, `userClient`, `passwordClient`,  `edad`, rol,`active` FROM tbuser WHERE rol=1$$

CREATE   PROCEDURE `sp_listar_by_tipo` (IN `id_` INT)  NO SQL
select 	id_Product,nombre,category,price,description,imageUrl, 	active 
from tbproduct where active=b'1' and category=id_$$

CREATE   PROCEDURE `sp_listar_client` ()  NO SQL
SELECT `idClient`, `emailClient`, `userClient`, `passwordClient`, `edad`,rol, `active` FROM tbuser WHERE rol=2$$

CREATE   PROCEDURE `sp_listar_producto` ()  NO SQL
select 	id_Product,nombre,category,price,description,imageUrl, 	active 
from tbproduct where active=b'1'$$

CREATE   PROCEDURE `sp_listar_tipo_productos` ()  NO SQL
select idTypeProduct,nameTypeProduct FROM `tbtypeproduct` where active=b'1' order by nametypeproduct Asc$$

CREATE   PROCEDURE `sp_select_a_product` (IN `id_` INT)  NO SQL
SELECT `id_Product`, `nombre`, `category`, `price`, `description`, `imageUrl`, `active` FROM `tbproduct` WHERE `id_Product`=id_$$

CREATE   PROCEDURE `sp_select_user_id` (IN `id_` INT)  NO SQL
SELECT `idClient`, `emailClient`, `userClient`, `passwordClient`, `edad`, `rol`, `active` FROM `tbuser` 
WHERE idClient = id_$$

CREATE   PROCEDURE `sp_update_producto` (IN `id_` INT, IN `name` VARCHAR(50), IN `categoria` INT, IN `precio_` INT, IN `descripcion` VARCHAR(100))  NO SQL
update tbproduct set nombre=name,category=categoria, price=precio_,description=descripcion, active=b'1'  where id_Product = id_$$

CREATE   PROCEDURE `sp_update_tipo_producto` (IN `id_` INT, IN `name_` VARCHAR(100))  NO SQL
update tbtypeproduct set nametypeproduct=name_ where idTypeProduct=id_$$

CREATE   PROCEDURE `sp_update_user` (IN `id_` INT, IN `email_` VARCHAR(40), IN `nick_` VARCHAR(40), IN `pass_` VARCHAR(40), IN `age_` INT, IN `rol_` INT, IN `active_` BIT)  NO SQL
UPDATE tbuser SET emailClient=email_,userClient=nick_, passwordClient=pass_,edad=age_,active=active WHERE idClient=id_$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproduct`
--

CREATE TABLE `tbproduct` (
  `id_Product` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imageUrl` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbproduct`
--

INSERT INTO `tbproduct` (`id_Product`, `nombre`, `category`, `price`, `description`, `imageUrl`, `active`) VALUES
(1, 'Hewelt', 3, 200000, 'Nueva', 'imagenes_/Laptop-hp-15bw005la_1.jpg', b'1'),
(2, 'HP Laptop', 3, 150038, 'Segunda', 'imagenes_/Laptop-hp-15bw005la_1.jpg', b'1'),
(3, 'Computadora HP', 3, 150000, 'Usada', 'imagenes_/Laptop-hp-15bw005la_1.jpg', b'1'),
(4, 'HP', 3, 150516, ' Segunda', 'imagenes_/Laptop-hp-15bw005la_1.jpg', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpurchase`
--

CREATE TABLE `tbpurchase` (
  `id_compra` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtypeproduct`
--

CREATE TABLE `tbtypeproduct` (
  `idTypeProduct` int(11) NOT NULL,
  `nameTypeProduct` varchar(100) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtypeproduct`
--

INSERT INTO `tbtypeproduct` (`idTypeProduct`, `nameTypeProduct`, `active`) VALUES
(1, 'Pantallas', b'1'),
(2, 'Mouse', b'1'),
(3, 'Computador', b'1'),
(4, 'Discos Duros', b'1'),
(5, 'Teclados', b'1'),
(6, 'Impresora', b'1'),
(7, 'Celular', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbuser`
--

CREATE TABLE `tbuser` (
  `idClient` int(11) NOT NULL,
  `emailClient` varchar(40) NOT NULL,
  `userClient` varchar(40) NOT NULL,
  `passwordClient` varchar(40) NOT NULL,
  `edad` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbuser`
--

INSERT INTO `tbuser` (`idClient`, `emailClient`, `userClient`, `passwordClient`, `edad`, `rol`, `active`) VALUES
(-22, ' adminPro@albur.com', 'adminPro', 'adminPro', 27, 1, b'1'),
(0, '', '', '', 0, 0, b'0'),
(1, 'admin1@albur.com', 'admin1', 'admin1', 35, 1, b'1'),
(2, '  client1@albur.com', 'client1', 'client1', 26, 2, b'1'),
(3, 'admin2@albur.com', 'admin2', 'admin2', 20, 1, b'1'),
(4, ' admin3@albur.com', 'admin3', 'admin3', 25, 1, b'0'),
(5, 'client2@albur.com', 'client2', 'client2', 22, 2, b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`id_Product`);

--
-- Indices de la tabla `tbpurchase`
--
ALTER TABLE `tbpurchase`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `tbtypeproduct`
--
ALTER TABLE `tbtypeproduct`
  ADD PRIMARY KEY (`idTypeProduct`);

--
-- Indices de la tabla `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `emailClient` (`emailClient`),
  ADD UNIQUE KEY `userClient` (`userClient`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbproduct`
--
ALTER TABLE `tbproduct`
  MODIFY `id_Product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbpurchase`
--
ALTER TABLE `tbpurchase`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbtypeproduct`
--
ALTER TABLE `tbtypeproduct`
  MODIFY `idTypeProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
