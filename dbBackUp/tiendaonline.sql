-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2018 a las 03:21:24
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_category` (IN `name` VARCHAR(100))  NO SQL
insert into tbtypeproduct (nameTypeProduct,active)values(@name, b'1')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_exist_tipo_producto` (INOUT `nombre` VARCHAR(100))  NO SQL
    SQL SECURITY INVOKER
if EXISTS(SELECT nombre FROM `tbtypeproduct` WHERE active= b'1' AND nameTypeProduct=@nombre) THEN SET @nombre='yes'; ELSE SET @nombre='not'; END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_producto` (IN `name` VARCHAR(50), IN `category` INT, IN `price` DOUBLE, IN `description` VARCHAR(100), IN `pic` VARCHAR(200))  NO SQL
IF EXISTS(SELECT nombre FROM `tbproduct` WHERE active= b'0' AND nombre=@name) THEN UPDATE `tbproduct` SET active=b'1' WHERE nombre=@name; ELSE INSERT INTO `tbproduct` (nombre,category, 	price,description,imageUrl, active) VALUES (@name,@category, @price, @description,@pic, b'1') ; END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_tipo_producto` (IN `name` VARCHAR(100))  NO SQL
IF EXISTS(SELECT nombre FROM `tbtypeproduct` WHERE active= b'0' AND nameTypeProduct=@nombre) THEN UPDATE `tbtypeproduct` SET active=b'1' WHERE nameTypeProduct=@nombre; ELSE INSERT INTO `tbtypeproduct` (nameTypeProduct, 	active) VALUES (@nombre, b'1') ; END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_producto` ()  NO SQL
select 	id_Product,nombre,category,price,description,imageUrl, 	active 
from tbproduct where active=b'1'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_tipo_productos` ()  NO SQL
select idTypeProduct,nameTypeProduct,active FROM `tbtypeproduct` where active=b'1'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproduct`
--

CREATE TABLE `tbproduct` (
  `id_Product` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imageUrl` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`id_Product`);

--
-- Indices de la tabla `tbtypeproduct`
--
ALTER TABLE `tbtypeproduct`
  ADD PRIMARY KEY (`idTypeProduct`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbproduct`
--
ALTER TABLE `tbproduct`
  MODIFY `id_Product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbtypeproduct`
--
ALTER TABLE `tbtypeproduct`
  MODIFY `idTypeProduct` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
