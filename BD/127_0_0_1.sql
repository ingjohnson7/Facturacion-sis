-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2016 a las 22:58:34
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gje`
--
CREATE DATABASE IF NOT EXISTS `gje` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gje`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(80) DEFAULT NULL,
  `Correo` varchar(60) DEFAULT NULL,
  `Telefono` varchar(14) DEFAULT NULL,
  `RNC` int(9) DEFAULT NULL,
  `Fecha` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID`, `Nombre`, `Direccion`, `Correo`, `Telefono`, `RNC`, `Fecha`) VALUES
(11, 'Amer Import SRL.', 'no', '@.com', '8090000000', 101610271, '23-11-2015'),
(12, 'Caiemca SRL', 'no', '@.com', '8090000000', 130753709, '23-11-2015'),
(13, 'Petland', 'no', '@.com', '8090000000', 122013326, '23-11-2015'),
(14, 'Materiales industriales  SRL', 'no', '@.com', '8090000000', 0, '23-11-2015'),
(15, 'AGRO INDUSTRIAL FERRETERA', 'no', '@.com', '8090000000', 101541377, '23-11-2015'),
(16, 'WINSA', 'no', '@.com', '8090000000', 0, '23-11-2015'),
(17, 'SAS INDUSTRIAL', 'no', '@.com', '8090000000', 130559023, '23-11-2015'),
(18, 'TERMOPAC industrial S.A.', 'no', '@.com', '8090000000', 101064714, '23-11-2015'),
(19, 'Editora SARTIZA', 'no', '@.com', '8090000000', 101591315, '23-11-2015'),
(20, 'Industrial farmacÃ©uticas del caribe INFACA', 'no', '@.com', '8090000000', 101035277, '23-11-2015'),
(21, 'Sellos y rodamientos', 'no', '@.com', '8090000000', 101078308, '23-11-2015'),
(22, 'Soelca', 'no', '@.com', '8090000000', 130692302, '23-11-2015'),
(23, 'Joga SRL.', 'no', '@.com', '8090000000', 101749946, '23-11-2015'),
(24, 'Flavio DarÃ­o Espinal y asociados', 'no', '@.com', '8090000000', 131029019, '23-11-2015'),
(25, 'Soluciones ElectromecÃ¡nicas SOLEFF', 'no', '@.com', '8090000000', 130660311, '23-11-2015'),
(26, 'Fuerza aÃ©rea de Republica Dominicana', 'no', '@.com', '8090000000', 401036894, '23-11-2015'),
(27, 'CATAMOVIL', 'no', 'ventas@catamovil.com', '8090000000', 130437963, '23-11-2015'),
(28, 'Caribbean hotel amenities', 'no', '@.com', '8090000000', 130091112, '23-11-2015'),
(29, 'NULA', 'no', '@.com', '8090000000', 0, '23-11-2015'),
(30, 'TONKA FOOTWEAR', 'Zona franca Av. San isidro', 'rramon.tonka@claro.net.do;', '8090000000', 101723556, '24-11-2015'),
(31, 'Promisa', 'no', '@.com', '8090000000', 101522895, '30-11-2015'),
(32, 'Inversiones Yamel', 'no', '@.com', '8090000000', 130386349, '18-12-2015'),
(33, 'Grupo Bornes SRL.', 'no', '@.com', '8090000000', 130788431, '20-01-2016'),
(34, 'Profamilia ', 'no', '@.com', '8090000000', 401017131, '04-02-2016'),
(35, 'Plasticos mitsutama', 'no', '@.com', '8090000000', 101568933, '09-02-2016'),
(36, 'Masco', 'no', '@.com', '8090000000', 131158651, '27-02-2016'),
(37, 'Fantastico Industrial SRL', 'no', '@.com', '8090000000', 101152737, '27-06-2016'),
(38, 'Constructora Yunes ', 'no', '@.com', '8090000000', 130013225, '27-06-2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `ID` int(5) NOT NULL,
  `Nombre_cliente` varchar(200) NOT NULL,
  `ITBIS` double NOT NULL,
  `Subtotal` double NOT NULL,
  `Total` double NOT NULL,
  `Fecha` varchar(70) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`ID`, `Nombre_cliente`, `ITBIS`, `Subtotal`, `Total`, `Fecha`, `Estado`) VALUES
(0, 'null', 0, 0, 0, '00-00-0000', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `ID` int(11) NOT NULL,
  `ID_factura` int(11) NOT NULL,
  `Descripcion` varchar(3000) NOT NULL,
  `Unidad` varchar(12) DEFAULT NULL,
  `Precio` double NOT NULL,
  `Cantidad` double NOT NULL,
  `Importe` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`ID`, `ID_factura`, `Descripcion`, `Unidad`, `Precio`, `Cantidad`, `Importe`) VALUES
(13, 1, 'ConfecciÃ³n de cajuela, Cambio de escobillas y Mantenimiento, a motor de hacer rocas', 'No', 4000, 1, 4000),
(14, 2, 'Rebobinado y cambio de rodamientos a motor elÃ©ctrico de 18.5 Kilos', 'No', 28000, 1, 28000),
(15, 3, 'Trabajo al rotor', 'No', 19800, 1, 19800),
(16, 3, 'Placa de diodos', 'No', 3800, 1, 3800),
(17, 3, 'ConfecciÃ³n casquillo', 'No', 1480, 1, 1480),
(18, 3, 'Mantenimiento al campo y bobina de excitaciÃ³n', 'No', 5500, 1, 5500),
(19, 3, 'Chequeo de tarjeta reguladora de voltaje', 'No', 800, 1, 800),
(21, 3, 'Caja de bolas', 'No', 1400, 1, 1400),
(39, 5, 'Rebobinado de estator a motor de grua electrica (220 voltios)', 'No', 7000, 1, 7000),
(40, 6, 'nada', 'No', 1, 1, 1),
(41, 7, 'ReparaciÃ³n de diferencial elÃ©ctrico y confecciÃ³n de cajuela.', 'No', 3500, 1, 3500),
(42, 8, 'Avance reparaciÃ³n de generador.', 'No', 28000, 1, 28000),
(43, 9, 'Motor de arranque.', 'No', 28000, 1, 28000),
(44, 10, 'Cambio de rectificador a planta caterpilar', 'No', 23000, 1, 23000),
(45, 11, 'Rebobinado de motor extrusiÃ³n FOAM reb motor 3HP 203/46', 'No', 14500, 1, 14500),
(46, 12, 'Diferencial trifÃ¡sico de 5 toneladas', 'No', 132000, 1, 132000),
(47, 13, 'Motor reductor HP 15 ', 'No', 106000, 1, 106000),
(48, 14, 'Rebobinado y cambio de rodamientos de un motor USMOTORS de montacargas ', 'No', 10000, 1, 10000),
(49, 14, 'Cambio de platino y centrifugo', 'No', 4000, 1, 4000),
(50, 14, 'Cambio de lemi swich', 'No', 1200, 1, 1200),
(51, 14, 'Montura y desmontura', 'No', 2000, 1, 2000),
(52, 15, 'Rebobinado de guinches marca KUKDONG', 'No', 5200, 2, 10400),
(53, 16, 'Mantenimiento, cambio de sellos, cambio de rodamientos, cambio de centrifugo, cambio de capacitor y confeccion de cajuela a bomba de agua.', 'No', 22000, 1, 22000),
(54, 17, 'ReparaciÃ³n de Motosoldadora', 'No', 15000, 1, 15000),
(55, 18, 'Rebobinado y cambio de rodamientos a bomba de piscina Â¾ HP 230 voltios (desmontura y montura)', 'No', 6500, 1, 6500),
(56, 19, 'Rebobinado de motor bomba 25 HP ', 'No', 18000, 1, 18000),
(57, 20, 'Rebobinado y cambio de rodamientos a motor de 5 HP ', 'No', 11200, 1, 11200),
(58, 21, 'Mantenimiento a motor diferencial de 1 tonelada ', 'No', 5500, 1, 5500),
(59, 22, 'Rebobinado y cambio de rodamientos a motor de compresor 220 voltios ', 'No', 5000, 1, 5000),
(60, 23, 'Reparacion de maquina de miller', 'No', 14100, 1, 14100),
(61, 24, 'Rebobinado, cambio de rodamientos, cambio de impel y cambio de inyector a motor bomba de 1/2 HP.', 'No', 4500, 1, 4500),
(62, 25, 'ReparaciÃ³n, cambio de platino y centrifugo a motor de ascensor ', 'No', 4800, 1, 4800),
(63, 26, 'Mantenimiento en general a GENERADOR de 60 kilos incluye: Mantenimiento a(Rotor principal, Rotor de excitaciÃ³n, Estator principal y estator de excitaciÃ³n.', 'No', 20000, 1, 20000),
(64, 27, 'Rebobinado, cambio de abanico y reparaciÃ³n es general a bomba hidraulica', 'No', 8200, 1, 8200),
(67, 28, 'Cambio de platino y cambio de centrifugo a motor de bomba', 'No', 4200, 1, 4200),
(68, 29, 'Mano de obra (motor de bomba)', 'No', 1800, 1, 1800),
(69, 30, 'Rebobinado y cambio de rodamientos a motor bomba marca TECO HP 71/2 Voltios 220/380 19amp 11amp RPM 3470', 'No', 12000, 1, 12000),
(70, 31, 'Rebobinado y cambio de rodamientos a motor de 3HP ', 'No', 6000, 1, 6000),
(71, 32, 'Rebobinado, cambio de rodamientos, cambio de platino y cambio de sello a bomba marca A.S. (HP3, voltios 230, RPM 3450)', 'No', 7200, 1, 7200),
(72, 33, 'Mantenimiento, cambio de rodamientos y cambio de sello mecÃ¡nico a bomba de agua de 5HP', 'No', 8500, 1, 8500),
(73, 34, 'Mantenimiento, cambio de rodamientos, cambio de aspas, cambio de capa de registro de conexiÃ³n y cambio de capa de protecciÃ³n a motor de 20HP', 'No', 16000, 1, 16000),
(74, 35, 'Rebobinado y cambio de rodamientos a motor extractor 220/440 voltios', 'No', 6000, 1, 6000),
(75, 36, 'Mantenimiento, cambio de sello y cambio de rodamientos a bomba de 3HP', 'No', 6000, 1, 6000),
(76, 37, 'Instalacion de bomba', 'No', 2500, 1, 2500),
(77, 38, 'Rebobinado, cambio de rodamientos y cambio de cajuela a motor HP3 voltios 220', 'No', 7000, 1, 7000),
(78, 39, 'Rebobinado y cambio de rodamientos a motor Induction motors HP2', 'No', 7000, 1, 7000),
(79, 40, 'Rebobinado y cambio de rodamientos a motor HP5', 'No', 10000, 1, 10000),
(84, 41, 'ReparaciÃ³n de pulidora Black & Decker', 'No', 1500, 1, 1500),
(83, 41, 'ReparaciÃ³n de taladro BOSCH', 'No', 1800, 1, 1800),
(85, 41, 'ReparaciÃ³n de vibrador', 'No', 1900, 1, 1900),
(86, 42, 'Rebobinado y cambio de rodamientos a motor de 5HP marca DECO', 'No', 9000, 1, 9000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallec`
--

CREATE TABLE `detallec` (
  `ID` int(11) NOT NULL,
  `ID_cotizacion` int(11) NOT NULL,
  `Descripcion` varchar(3000) NOT NULL,
  `Unidad` varchar(12) DEFAULT NULL,
  `Precio` double NOT NULL,
  `Cantidad` double NOT NULL,
  `Importe` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallec`
--

INSERT INTO `detallec` (`ID`, `ID_cotizacion`, `Descripcion`, `Unidad`, `Precio`, `Cantidad`, `Importe`) VALUES
(2, 1, 'Rebobinado y cambio de rodamientos a motor General Electric HP150, voltios 460, RPM 1786, AMPS 165 ', 'No', 188000, 1, 188000),
(3, 1, 'aaaaa', 'No', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallei`
--

CREATE TABLE `detallei` (
  `ID` int(11) NOT NULL,
  `ID_factura` int(11) NOT NULL,
  `Descripcion` varchar(3000) NOT NULL,
  `Unidad` varchar(12) DEFAULT NULL,
  `Precio` double NOT NULL,
  `Cantidad` double NOT NULL,
  `Importe` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallei`
--

INSERT INTO `detallei` (`ID`, `ID_factura`, `Descripcion`, `Unidad`, `Precio`, `Cantidad`, `Importe`) VALUES
(3, 1, 'Sangrado de planta y cambio de filtros a planta cummins 1000 kilos.', 'Pulgada', 15000, 1, 15000),
(4, 2, 'Saldo y mano de obra a planta cummins de 1000 kilos', 'Pulgada', 175000, 1, 175000),
(5, 3, 'Rebobinado y cambio de rodamientos a motor KW11 voltio 480', 'Pulgada', 27000, 4, 108000),
(6, 4, 'Rebobinado y cambio de rodamientos a motor de HP1 230/460 voltios', 'Pulgada', 8500, 1, 8500),
(7, 5, 'Compra de piezas para planta cummins de 1 mega.', 'Pulgada', 360000, 1, 360000),
(8, 5, 'Mano de obra(planta cummins). ', 'Pulgada', 125000, 1, 125000),
(9, 6, 'Rebobinado, cambio de rodamientos a motor LINCOLN \r\nHP 150,\r\nRPM 1780,\r\nAMPS 169,\r\nVoltios 460\r\n', 'Pulgada', 175000, 1, 175000),
(10, 7, 'ReparaciÃ³n de motor de arranque', 'Pulgada', 15000, 2, 30000),
(11, 8, 'Rebobinado y cambio de rodamientos a motor WESTINGHOUSE HP40 Voltios 230/460 RPM 1765 AMPS 98/49', 'Pulgada', 65000, 1, 65000),
(12, 8, 'Rebobinado y cambio de rodamientos a motor GeneralElectric HP30 Voltios 230/460 AMPS 76/38 RPM 1760', 'Pulgada', 55000, 1, 55000),
(13, 9, 'Rebobinado y cambio de rodamientos a motor General Electric HP150, voltios 460, RPM 1786, AMPS 165', 'Pulgada', 188000, 1, 188000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID` int(5) NOT NULL,
  `NCF` varchar(20) NOT NULL,
  `Nombre_cliente` varchar(200) NOT NULL,
  `ITBIS` double NOT NULL,
  `Subtotal` double NOT NULL,
  `Total` double NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID`, `NCF`, `Nombre_cliente`, `ITBIS`, `Subtotal`, `Total`, `Fecha`, `Estado`) VALUES
(0, '0', 'null', 0, 0, 0, '0000-00-00', ''),
(1, 'A010010010100000001', 'Amer Import SRL.', 720, 4000, 4720, '2015-01-05', 'PENDIENTE'),
(2, 'A010010010100000002', 'Caiemca SRL', 5040, 28000, 33040, '2015-01-18', 'PENDIENTE'),
(3, 'A010010010100000003', 'Petland', 5900.4, 32780, 38680.4, '2015-01-21', 'PENDIENTE'),
(5, 'A010010010100000005', 'Materiales industriales SRL', 1260, 7000, 8260, '2015-03-04', 'PENDIENTE'),
(6, 'A010010010100000006', 'NULA', 0.18, 1, 1.18, '0000-00-00', 'PENDIENTE'),
(7, 'A010010010100000007', 'AGRO INDUSTRIAL FERRETERA', 630, 3500, 4130, '2015-05-08', 'PENDIENTE'),
(8, 'A010010010100000008', 'WINSA', 5040, 28000, 33040, '2015-05-14', 'PENDIENTE'),
(9, 'A010010010100000009', 'SAS INDUSTRIAL', 5040, 28000, 33040, '2015-05-19', 'PENDIENTE'),
(10, 'A010010010100000010', 'WINSA', 4140, 23000, 27140, '2015-05-29', 'PENDIENTE'),
(11, 'A010010010100000011', 'TERMOPAC industrial S.A.', 2610, 14500, 17110, '2015-06-01', 'PENDIENTE'),
(12, 'A010010010100000012', 'Editora SARTIZA', 23760, 132000, 155760, '2015-06-19', 'PENDIENTE'),
(13, 'A010010010100000013', 'Industrial farmacÃ©uticas del caribe INFACA', 19080, 106000, 125080, '2015-06-22', 'PENDIENTE'),
(14, 'A010010010100000014', 'Amer Import SRL.', 3096, 17200, 20296, '2015-06-30', 'PENDIENTE'),
(15, 'A010010010100000015', 'Sellos y rodamientos', 1872, 10400, 12272, '2015-07-24', 'PENDIENTE'),
(16, 'A010010010100000016', 'Soelca', 3960, 22000, 25960, '2015-08-10', 'PENDIENTE'),
(17, 'A010010010100000017', 'Joga SRL.', 2700, 15000, 17700, '2015-09-17', 'PENDIENTE'),
(18, 'A010010010100000018', 'Flavio DarÃ­o Espinal y asociados', 1170, 6500, 7670, '2015-10-02', 'PENDIENTE'),
(19, 'A010010010100000019', 'Soluciones ElectromecÃ¡nicas SOLEFF', 3240, 18000, 21240, '2015-10-10', 'PENDIENTE'),
(20, 'A010010010100000020', 'Fuerza aÃ©rea de Republica Dominicana', 2016, 11200, 13216, '2015-10-19', 'PENDIENTE'),
(21, 'A010010010100000021', 'CATAMOVIL', 990, 5500, 6490, '2015-11-03', 'PENDIENTE'),
(22, 'A010010010100000022', 'Caribbean hotel amenities', 900, 5000, 5900, '2015-11-18', 'PENDIENTE'),
(23, 'A010010010100000023', 'Promisa', 2538, 14100, 16638, '2015-11-30', 'PENDIENTE'),
(24, 'A010010010100000024', 'Inversiones Yamel', 810, 4500, 5310, '2015-12-18', 'PENDIENTE'),
(25, 'A010010010100000025', 'Amer Import SRL.', 756, 4200, 4956, '2016-01-13', 'PENDIENTE'),
(26, 'A010010010100000026', 'Grupo Bornes SRL.', 3600, 20000, 23600, '2016-01-20', 'PENDIENTE'),
(27, 'A010010010100000027', 'Amer Import SRL.', 1476, 8200, 9676, '2016-02-02', 'PENDIENTE'),
(28, 'A010010010100000028', 'Profamilia', 756, 4200, 4956, '2016-02-04', 'PENDIENTE'),
(29, 'A010010010100000029', 'Profamilia', 324, 1800, 2124, '2016-02-04', 'PENDIENTE'),
(30, 'A010010010100000030', 'Plasticos mitsutama', 2160, 12000, 14160, '2016-02-09', 'PENDIENTE'),
(31, 'A010010010100000031', 'Plasticos mitsutama', 1080, 6000, 7080, '2016-02-23', 'PENDIENTE'),
(32, 'A010010010100000032', 'Profamilia', 1296, 7200, 8496, '2016-02-23', 'PENDIENTE'),
(33, 'A010010010100000033', 'Masco', 1530, 8500, 10030, '2016-02-29', 'PENDIENTE'),
(34, 'A010010010100000034', 'Masco', 2880, 16000, 18880, '2016-02-29', 'PENDIENTE'),
(35, 'A010010010100000035', 'Plasticos mitsutama', 1080, 6000, 7080, '2016-03-01', 'PENDIENTE'),
(36, 'A010010010100000036', 'Masco', 1080, 6000, 7080, '2016-03-04', 'PENDIENTE'),
(37, 'A010010010100000037', 'Profamilia', 450, 2500, 2950, '2016-03-07', 'PENDIENTE'),
(38, 'A010010010100000038', 'Plasticos mitsutama', 1260, 7000, 8260, '2016-03-23', 'PENDIENTE'),
(39, 'A010010010100000039', 'Fantastico Industrial SRL', 1260, 7000, 8260, '2016-03-30', 'PENDIENTE'),
(40, 'A010010010100000040', 'Plasticos mitsutama', 1800, 10000, 11800, '2016-04-09', 'PENDIENTE'),
(41, 'A010010010100000041', 'Constructora Yunes', 936, 5200, 6136, '2016-05-05', 'PENDIENTE'),
(42, 'A010010010100000042', 'Plasticos mitsutama', 1620, 9000, 10620, '2016-05-06', 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_i`
--

CREATE TABLE `factura_i` (
  `ID` int(5) NOT NULL,
  `NCF` varchar(20) NOT NULL,
  `Nombre_cliente` varchar(200) NOT NULL,
  `Total` double NOT NULL,
  `Fecha` varchar(70) NOT NULL,
  `Estado` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura_i`
--

INSERT INTO `factura_i` (`ID`, `NCF`, `Nombre_cliente`, `Total`, `Fecha`, `Estado`) VALUES
(0, '0', 'null', 0, '00-00-0000', ''),
(1, 'A010010011400000001', 'TONKA FOOTWEAR', 15000, '03-03-2015', 'PENDIENTE'),
(2, 'A010010011400000002', 'TONKA FOOTWEAR', 175000, '25-03-2015', 'PENDIENTE'),
(3, 'A010010011400000003', 'TONKA FOOTWEAR', 108000, '19-05-2015', 'PENDIENTE'),
(4, 'A010010011400000004', 'TONKA FOOTWEAR', 8500, '01-06-2015', 'PENDIENTE'),
(5, 'A010010011400000005', 'TONKA FOOTWEAR', 485000, '17-07-2015', 'PENDIENTE'),
(6, 'A010010011400000006', 'TONKA FOOTWEAR', 175000, '25-08-2015', 'PENDIENTE'),
(7, 'A010010011400000007', 'TONKA FOOTWEAR', 30000, '04-09-2015', 'PENDIENTE'),
(8, 'A010010011400000008', 'TONKA FOOTWEAR', 120000, '23-09-2015', 'PENDIENTE'),
(9, 'A010010011400000009', 'TONKA FOOTWEAR', 188000, '24-01-2016', 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `Nombre` varchar(10) NOT NULL,
  `Clave` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`Nombre`, `Clave`) VALUES
('john', '9185f3ec501c674c7c788464a36e7fb3'),
('lolo', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `detallec`
--
ALTER TABLE `detallec`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `detallei`
--
ALTER TABLE `detallei`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `factura_i`
--
ALTER TABLE `factura_i`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de la tabla `detallec`
--
ALTER TABLE `detallec`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `detallei`
--
ALTER TABLE `detallei`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
