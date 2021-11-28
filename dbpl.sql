-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2021 a las 03:38:47
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbpl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida`
--

CREATE TABLE `bebida` (
  `Codbe` int(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Precio` float NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bebida`
--

INSERT INTO `bebida` (`Codbe`, `Nombre`, `Precio`, `Cantidad`, `Foto`, `Estado`) VALUES
(1, 'Coca-Cola 2 Litros', 12, 24, '', 1),
(2, 'Fanta Naranja 2 Litros', 12, 16, '', 1),
(3, 'Coca-Cola 1.5 Litros', 7, 15, '', 1),
(4, 'Fanta 1.5 Litros', 7, 11, '', 1),
(5, 'Coca-Cola 1 Litro', 5, 10, '', 1),
(6, 'Fanta 1 Litro', 5, 8, '', 1),
(7, 'Sprite 1.5 Litros', 7, 0, '', 1),
(8, 'Sprite 1 Litro', 5, 0, '', 1),
(9, 'Pepsi 3 litros', 13, 10, '', 1),
(11, 'Fanta Mandarina 2 Litros', 12, 25, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `Ci` int(12) DEFAULT 0,
  `Nombre` varchar(25) DEFAULT 'sin',
  `Apellidos` varchar(30) DEFAULT 'nombre',
  `Telefono` varchar(15) DEFAULT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `Ci`, `Nombre`, `Apellidos`, `Telefono`, `Estado`) VALUES
(1, 0, 'Sin', 'nombre', NULL, 1),
(2, 524536, 'Susana', 'Rivero', '75485444', 1),
(3, 721512, 'Ximena', 'Guzman', '76154224', 1),
(4, 721566, 'Roberto', 'Gomez', '76154333', 1),
(5, 772322, 'Arnold', 'Roldan', '77166123', 1),
(6, 854254, 'Carla', 'Bejarano', '61254884', 1),
(7, 1866912, 'magaly', 'aguirre', '77177077', 1),
(8, 3322587, 'Roxana', 'Romero', '0', 1),
(9, 3358442, 'Raul', 'Miranda', '0', 1),
(10, 3555478, 'Valeria', 'Gomez', '0', 1),
(11, 3655987, 'Saul', 'Fernandez', '0', 1),
(12, 4422587, 'Gabriel', 'Flores', '0', 1),
(13, 4435195, 'Sergio', 'Ramirez', '0', 1),
(14, 4441325, 'qqqq', 'wwww', '12312312', 1),
(15, 4442266, 'www', 'wwqq', '45688225', 1),
(16, 4447558, 'Carmen', 'Rodriguez', '0', 1),
(17, 4455225, 'Omar', 'Castro', '0', 1),
(18, 4455872, 'Rita', 'Sanchez', '0', 1),
(19, 4477885, 'Sergio', 'Lopez', '0', 1),
(20, 4478598, 'William', 'Vera', '0', 1),
(21, 4568852, 'oooo', 'pppp', '0', 1),
(22, 4587444, 'Pablo', 'ZuÃ±iga', '0', 1),
(23, 4587690, 'Maribel', 'Condori', '76512382', 1),
(24, 4777877, 'Pablo', 'Ramos', '0', 1),
(25, 5441225, 'Osmar', 'Nina', '0', 1),
(26, 5458522, 'GABRIELA', 'ROSAS', '63582945', 1),
(27, 5478235, 'Raul', 'Cardozo', '64587125', 1),
(28, 5557477, 'Elmer', 'Galarza', '0', 1),
(29, 5557748, 'Xavier', 'Ruiz', '0', 1),
(30, 5774120, 'Jorge', 'Donorio', '0', 1),
(31, 5774582, 'Elena', 'Garcia', '0', 1),
(32, 5874225, 'Hernan', 'CalapiÃ±a', '0', 1),
(33, 5874244, 'Norma', 'Gutierrez', '0', 1),
(34, 5874258, 'Fabio', 'Almazan', '0', 1),
(35, 5874582, 'Gabriela', 'Nabal', '0', 1),
(36, 5874589, 'Javier', 'Gonzales', '0', 1),
(37, 5877748, 'Karla', 'Perez', '0', 1),
(38, 6541254, 'Silvia', 'Ramos', NULL, 1),
(39, 6587458, 'Diana', 'Oropeza', '0', 1),
(40, 6655877, 'Elio', 'Andia', '0', 1),
(41, 6688745, 'Tadeo', 'Miranda', '0', 1),
(42, 6987485, 'Oscar', 'Ortiz', '0', 1),
(43, 7002548, 'Ramiro', 'Subia', '60284578', 1),
(44, 7172371, 'Roxana', 'Gutierrez', '76271883', 1),
(45, 7172372, 'Jorge', 'Montellanos', '762718892', 1),
(46, 7172375, 'Rox', 'Balboa', '771662873', 1),
(47, 7188231, 'Alex', 'Choque', '77166232', 1),
(48, 7215488, 'Rocio', 'Calderon', '75185847', 1),
(49, 7215874, 'Roberto', 'Urzagaste', '0', 1),
(50, 7216902, 'Miguel', 'Sanchez', '76271992', 1),
(51, 7216903, 'Cristian', 'Mamani', '76191403', 1),
(52, 7216905, 'Miguel', 'Sanchez', '76271959', 1),
(53, 7216919, 'Carlos', 'Gutierrez', '75455225', 1),
(54, 7252022, 'Ruben', 'Aguirre', '75144587', 1),
(55, 7252033, 'Carlos', 'Romero', '78455872', 1),
(56, 7254406, 'alex', 'marquez', '66666666', 1),
(57, 7258738, 'Jose', 'Gutierrez', '75452541', 1),
(58, 7258745, 'Cristian', 'Urzagaste', '0', 1),
(59, 7541225, 'Maria', 'Santos', '0', 1),
(60, 7541231, 'Jorge', 'Diaz', '72544877', 1),
(61, 7541252, 'Feliciano', 'Zeballos', '75411254', 1),
(62, 7541254, 'Neyda', 'Sanchez', '78220082', 1),
(63, 7541551, 'Roxana', 'Flores', '75411224', 1),
(64, 7542553, 'Alejandra', 'Flores', '60280572', 1),
(65, 7542561, 'Rodolfo', 'Gutierrez', '60587455', 1),
(66, 7542566, ' Carlo', 'Gonzales', NULL, 1),
(67, 7544875, 'Juan', 'Garcia', NULL, 1),
(68, 7546787, 'Gualberto', 'Zeballos', '76182881', 1),
(69, 7548221, 'Ramon', 'Gomez', '65785712', 1),
(70, 7548333, 'Jose', 'Ramos', '76157788', 1),
(71, 7548596, 'Bruno', 'Jaramillo', '76545875', 1),
(72, 7548857, 'Laura', 'Ramirez', '0', 1),
(73, 7548877, 'Alberto', 'Gonzales', '0', 1),
(74, 7554125, 'Nimia', 'Gonzales', '0', 1),
(75, 7585412, 'Gabriela', 'Zarate', '75425748', 1),
(76, 7616231, 'Carlos', 'Cordero', '76616231', 1),
(77, 7616235, 'Roxana', 'Copa', '71266382', 1),
(78, 7618823, 'Neyda', 'Sanchez', '76618823', 1),
(79, 7618828, 'Juan', 'Ortega', '76188822', 1),
(80, 7618829, 'MATILDE', 'QUIROGA', '76188293', 1),
(81, 7621882, 'Brian', 'Perez', '76177283', 1),
(82, 7625123, 'Jose', 'Gutierrez', '78123221', 1),
(83, 7627718, 'Jorge', 'MuÃ±oz', '76127772', 1),
(84, 7628802, 'Roberto', 'Subia', '76188293', 1),
(85, 7637182, 'Magaly', 'Flores', '76128832', 1),
(86, 7638188, 'fernada', 'castillo', '76152572', 1),
(87, 7654321, 'Joseph', 'Torrejon', '87654321', 1),
(88, 7658764, 'Elizabeth', 'Castro', '76217723', 1),
(89, 7718922, 'Rodrigo', 'Dolz', '77188221', 1),
(90, 7722999, 'Daniel', 'Flores', '77166288', 1),
(91, 7723881, 'Carlos', 'Cordero', '77166273', 1),
(92, 7726612, 'Juan', 'Perez', '77189251', 1),
(93, 7726618, 'Juan', 'Perez', '77189233', 1),
(94, 7726623, 'Carla', 'Grageda', '76172832', 1),
(95, 7744871, 'Raul', 'Calle', '0', 1),
(96, 7781999, 'gonzalo', 'Vasquez', '77162388', 1),
(97, 8574582, 'Ilsen', 'Carvajal', '0', 1),
(98, 8592613, 'Daniel', 'Jaimes', '60485797', 1),
(99, 8744525, 'Ulises', 'Martinez', '0', 1),
(100, 12440407, 'Graciela', 'Zeballos', '78220038', 1),
(101, 71662883, 'Raul', 'Torrez', '71662773', 1),
(102, 76127772, 'Joselin', 'Santos', '761882812', 1),
(103, 76188292, 'Jose', 'Rodriguez', '761882993', 1),
(104, 77888282, 'Elmer', 'Juarez', '81877278', 1),
(129, 0, 'sin', 'nombre', '+59177174288', 1),
(130, 0, 'sin', 'nombre', '+59172971356', 1),
(131, 0, 'sin', 'nombre', '+59177894488', 1),
(132, 0, 'sin', 'nombre', '+59176191405', 1),
(133, 7210040, 'Rodrigo', 'Gonzales', '77894488', 1),
(136, 7216955, 'Gabriela', 'Gomez', NULL, 1),
(138, 0, 'sin', 'nombre', '+59176191403', 1),
(139, 7216900, 'Carlos', 'Ramirez', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `Ci` int(12) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`Ci`, `Usuario`, `Password`, `Estado`) VALUES
(7215549, '7215549', '12345678', 1),
(7216903, '7216903', 'aaaaaa1', 1),
(7318281, '7318281', 'contrasenia', 1),
(7458765, '7458765', 'rodrigogd1212', 1),
(7544587, '7544587', '1244graciela', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_bebida`
--

CREATE TABLE `det_bebida` (
  `Codbe` int(20) NOT NULL,
  `Codv` int(20) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Precio` float NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_ped`
--

CREATE TABLE `det_ped` (
  `Codped` int(11) NOT NULL,
  `Codpla` int(20) NOT NULL,
  `Cant` int(5) NOT NULL,
  `Precio` float NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_ped`
--

INSERT INTO `det_ped` (`Codped`, `Codpla`, `Cant`, `Precio`, `Estado`) VALUES
(124, 18, 1, 20, 1),
(124, 21, 2, 35, 1),
(125, 21, 1, 35, 1),
(126, 18, 1, 20, 1),
(126, 19, 1, 22, 1),
(126, 22, 1, 20, 1),
(127, 18, 1, 20, 1),
(128, 18, 1, 20, 1),
(129, 18, 1, 20, 1),
(130, 18, 1, 20, 1),
(131, 18, 1, 20, 1),
(132, 18, 1, 20, 1),
(133, 17, 1, 59, 1),
(134, 18, 1, 20, 1),
(134, 22, 1, 20, 1),
(135, 18, 1, 20, 1),
(135, 19, 1, 22, 1),
(135, 21, 1, 35, 1),
(135, 22, 1, 20, 1),
(135, 24, 1, 10, 1),
(136, 17, 1, 59, 1),
(136, 18, 1, 20, 1),
(136, 19, 1, 22, 1),
(136, 20, 1, 25, 1),
(136, 21, 1, 35, 1),
(137, 21, 1, 35, 1),
(137, 22, 1, 20, 1),
(138, 18, 1, 20, 1),
(139, 18, 1, 20, 1),
(140, 17, 3, 59, 1),
(141, 17, 8, 59, 1),
(142, 17, 8, 59, 1),
(142, 18, 8, 20, 1),
(142, 21, 8, 35, 1),
(143, 17, 8, 59, 1),
(143, 18, 8, 20, 1),
(143, 21, 8, 35, 1),
(143, 22, 8, 20, 1),
(144, 17, 8, 59, 1),
(144, 18, 8, 20, 1),
(144, 21, 8, 35, 1),
(144, 22, 8, 20, 1),
(145, 18, 3, 20, 1),
(146, 17, 3, 59, 1),
(147, 17, 3, 59, 1),
(148, 17, 3, 59, 1),
(148, 19, 3, 22, 1),
(149, 19, 1, 22, 1),
(150, 17, 1, 59, 1),
(151, 17, 1, 59, 1),
(153, 17, 1, 59, 1),
(154, 18, 5, 12, 1),
(156, 17, 1, 65, 1),
(157, 17, 1, 65, 1),
(157, 33, 1, 12, 1),
(158, 17, 1, 65, 1),
(159, 17, 1, 65, 1),
(160, 17, 1, 65, 1),
(161, 24, 1, 7, 1),
(162, 24, 1, 7, 1),
(163, 17, 1, 65, 1),
(169, 17, 1, 65, 1),
(169, 21, 1, 35, 1),
(174, 35, 4, 20, 1),
(174, 36, 2, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_plato`
--

CREATE TABLE `det_plato` (
  `Codpla` int(20) NOT NULL,
  `Codv` int(20) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Precio` float NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_plato`
--

INSERT INTO `det_plato` (`Codpla`, `Codv`, `Cantidad`, `Precio`, `Estado`) VALUES
(21, 162, 1, 35, 1),
(18, 163, 1, 20, 1),
(21, 163, 2, 35, 1),
(18, 164, 1, 20, 1),
(19, 164, 1, 22, 1),
(22, 164, 1, 20, 1),
(18, 165, 1, 20, 1),
(18, 166, 1, 20, 1),
(18, 167, 1, 20, 1),
(18, 168, 1, 20, 1),
(18, 169, 1, 20, 1),
(18, 170, 1, 20, 1),
(17, 171, 1, 59, 1),
(18, 172, 1, 20, 1),
(22, 172, 1, 20, 1),
(18, 173, 1, 20, 1),
(19, 173, 1, 22, 1),
(21, 173, 1, 35, 1),
(22, 173, 1, 20, 1),
(24, 173, 1, 10, 1),
(17, 174, 1, 59, 1),
(18, 174, 1, 20, 1),
(19, 174, 1, 22, 1),
(20, 174, 1, 25, 1),
(21, 174, 1, 35, 1),
(21, 175, 1, 35, 1),
(22, 175, 1, 20, 1),
(18, 176, 1, 20, 1),
(18, 177, 1, 20, 1),
(17, 178, 3, 59, 1),
(17, 179, 8, 59, 1),
(17, 180, 8, 59, 1),
(18, 180, 8, 20, 1),
(21, 180, 8, 35, 1),
(17, 181, 8, 59, 1),
(18, 181, 8, 20, 1),
(21, 181, 8, 35, 1),
(22, 181, 8, 20, 1),
(17, 182, 8, 59, 1),
(18, 182, 8, 20, 1),
(21, 182, 8, 35, 1),
(22, 182, 8, 20, 1),
(18, 183, 3, 20, 1),
(17, 184, 3, 59, 1),
(17, 185, 3, 59, 1),
(17, 186, 3, 59, 1),
(19, 186, 3, 22, 1),
(19, 187, 1, 22, 1),
(17, 188, 1, 59, 1),
(17, 189, 1, 59, 1),
(18, 190, 5, 12, 1),
(17, 191, 1, 59, 1),
(17, 197, 1, 65, 1),
(22, 197, 1, 10, 1),
(17, 198, 1, 65, 1),
(24, 198, 1, 7, 1),
(36, 198, 2, 20, 1),
(17, 199, 1, 65, 1),
(21, 199, 1, 35, 1),
(20, 200, 1, 22, 1),
(21, 200, 1, 35, 1),
(20, 201, 1, 22, 1),
(17, 202, 1, 65, 1),
(17, 203, 1, 65, 1),
(17, 204, 1, 65, 1),
(17, 205, 1, 65, 1),
(35, 206, 1, 20, 1),
(21, 207, 1, 35, 1),
(20, 208, 1, 22, 1),
(20, 209, 1, 22, 1),
(17, 210, 1, 65, 1),
(20, 210, 1, 22, 1),
(24, 210, 1, 7, 1),
(17, 211, 1, 65, 1),
(22, 212, 1, 10, 1),
(20, 213, 1, 22, 1),
(21, 214, 1, 35, 1),
(17, 215, 1, 65, 1),
(20, 216, 1, 22, 1),
(17, 217, 1, 65, 1),
(17, 218, 1, 65, 1),
(17, 219, 1, 65, 1),
(20, 220, 1, 22, 1),
(22, 220, 1, 10, 1),
(17, 221, 1, 65, 1),
(20, 221, 1, 22, 1),
(22, 221, 4, 10, 1),
(22, 222, 1, 10, 1),
(20, 223, 5, 22, 1),
(22, 223, 3, 10, 1),
(36, 223, 5, 20, 1),
(21, 224, 1, 35, 1),
(22, 224, 2, 10, 1),
(22, 225, 1, 10, 1),
(22, 232, 1, 10, 1),
(33, 232, 1, 12, 1),
(21, 233, 1, 35, 1),
(22, 233, 1, 10, 1),
(17, 234, 1, 65, 1),
(17, 235, 1, 65, 1),
(33, 235, 1, 12, 1),
(20, 236, 1, 22, 1),
(17, 237, 1, 65, 1),
(21, 238, 1, 35, 1),
(20, 239, 3, 22, 1),
(17, 240, 3, 65, 1),
(17, 241, 1, 65, 1),
(17, 242, 1, 65, 1),
(24, 243, 1, 7, 1),
(24, 244, 1, 7, 1),
(17, 245, 1, 65, 1),
(20, 246, 4, 22, 1),
(33, 246, 1, 12, 1),
(17, 247, 1, 65, 1),
(21, 247, 1, 35, 1),
(21, 248, 4, 35, 1),
(33, 249, 3, 12, 1),
(36, 249, 3, 20, 1),
(21, 250, 2, 35, 1),
(35, 251, 4, 20, 1),
(36, 251, 2, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Code` int(20) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`Code`, `Direccion`, `Nombre`, `Telefono`, `Estado`) VALUES
(1, 'B./ San Jorge Av. Jorge Paz', 'Embol Tarija', '46634304', 1),
(2, 'Parque Urbano Central al lado nuevo parque Zoológico', 'Delizia', '76760322', 1),
(3, 'B. Aeropuerto Av. Heroes del Chaco', 'Cascada Tarija', '46631111', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Codfac` int(20) NOT NULL,
  `Codtal` int(20) NOT NULL,
  `Codv` int(20) DEFAULT NULL,
  `Codp` int(20) DEFAULT NULL,
  `Ci_cli` int(12) DEFAULT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp(),
  `Hora` time NOT NULL DEFAULT current_timestamp(),
  `Nro_fac` int(20) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Codfac`, `Codtal`, `Codv`, `Codp`, `Ci_cli`, `Fecha`, `Hora`, `Nro_fac`, `Estado`) VALUES
(1, 1, 86, NULL, 7254406, '2019-11-13', '22:41:38', 1, 1),
(2, 1, 85, NULL, 7254406, '2019-11-13', '22:42:20', 2, 1),
(4, 1, 84, NULL, 7726623, '2019-11-13', '22:43:16', 3, 1),
(11, 1, NULL, 104, 7002548, '2019-10-17', '13:58:26', 4, 1),
(13, 1, NULL, 105, 854254, '2019-10-17', '14:04:51', 5, 1),
(14, 1, NULL, 106, 5478235, '2019-10-17', '14:06:46', 6, 1),
(15, 1, NULL, 107, 5458522, '2019-10-17', '14:10:50', 7, 1),
(16, 1, NULL, 108, 7548596, '2019-10-17', '23:40:54', 8, 1),
(17, 1, 139, NULL, 4455872, '2019-10-18', '01:16:40', 9, 1),
(18, 1, 140, NULL, 6655877, '2019-10-18', '01:19:21', 10, 1),
(19, 1, 141, NULL, 4435195, '2019-10-18', '01:23:20', 11, 1),
(20, 1, 142, NULL, 4422587, '2019-10-18', '01:36:54', 12, 1),
(21, 1, 143, NULL, 4455225, '2019-10-18', '01:37:46', 13, 1),
(22, 1, 144, NULL, 3322587, '2019-10-18', '01:38:47', 14, 1),
(23, 1, 145, NULL, 3358442, '2019-10-18', '01:39:39', 15, 1),
(28, 1, 150, NULL, 5774120, '2019-10-18', '02:00:51', 16, 1),
(29, 1, 151, NULL, 7216902, '2019-10-18', '02:19:09', 17, 1),
(30, 1, 152, NULL, 7216903, '2019-10-18', '02:21:20', 18, 1),
(31, 1, 153, NULL, 7216903, '2021-07-10', '22:02:09', 19, 1),
(32, 1, 154, NULL, 7216903, '2021-07-18', '01:29:09', 20, 1),
(33, 1, 155, NULL, 7216903, '2021-07-18', '01:44:09', 21, 1),
(34, 1, 156, NULL, 7216903, '2021-07-18', '01:45:23', 22, 1),
(35, 1, 157, NULL, 7216903, '2021-07-18', '07:08:45', 23, 1),
(36, 1, 158, NULL, 7216903, '2021-08-01', '18:48:48', 24, 1),
(44, 1, NULL, 134, NULL, '2021-09-13', '00:30:38', 25, 1),
(45, 1, NULL, 135, NULL, '2021-09-13', '00:35:34', 26, 1),
(46, 1, NULL, 136, NULL, '2021-09-13', '00:42:34', 27, 1),
(47, 1, NULL, 137, NULL, '2021-09-13', '00:44:51', 28, 1),
(48, 1, NULL, 138, NULL, '2021-09-13', '00:49:17', 29, 1),
(49, 1, NULL, 139, NULL, '2021-09-13', '00:52:43', 30, 1),
(50, 1, NULL, 140, NULL, '2021-09-13', '00:57:50', 31, 1),
(51, 1, NULL, 141, NULL, '2021-09-13', '01:03:50', 32, 1),
(52, 1, NULL, 142, NULL, '2021-09-13', '09:08:23', 33, 1),
(53, 1, NULL, 143, NULL, '2021-09-13', '09:13:24', 34, 1),
(54, 1, NULL, 144, NULL, '2021-09-13', '09:14:01', 35, 1),
(55, 1, NULL, 145, NULL, '2021-09-13', '09:17:08', 36, 1),
(56, 1, NULL, 146, NULL, '2021-09-13', '09:28:09', 37, 1),
(57, 1, NULL, 147, NULL, '2021-09-13', '09:40:07', 38, 1),
(58, 1, NULL, 148, NULL, '2021-09-13', '10:00:58', 39, 1),
(59, 1, NULL, 149, NULL, '2021-09-13', '14:44:16', 40, 1),
(60, 1, NULL, 150, NULL, '2021-09-13', '15:24:30', 41, 1),
(61, 1, NULL, 151, NULL, '2021-09-13', '15:52:16', 42, 1),
(62, 1, NULL, 154, NULL, '2021-09-14', '10:18:29', 43, 1),
(63, 1, NULL, 153, NULL, '2021-09-13', '16:07:59', 44, 1),
(64, 1, 218, NULL, 0, '2021-09-15', '01:27:03', 45, 1),
(65, 1, 219, NULL, 0, '2021-09-15', '01:29:57', 46, 1),
(66, 1, 220, NULL, 0, '2021-09-15', '01:30:09', 47, 1),
(67, 1, 221, NULL, 0, '2021-09-15', '01:30:59', 48, 1),
(68, 1, 222, NULL, 0, '2021-09-15', '09:45:00', 49, 1),
(69, 1, 223, NULL, 0, '2021-09-15', '10:01:52', 50, 1),
(70, 1, 224, NULL, 0, '2021-09-15', '10:48:25', 51, 1),
(71, 1, 225, NULL, 0, '2021-09-15', '11:16:25', 52, 1),
(72, 1, 232, NULL, 0, '2021-09-16', '10:22:38', 53, 1),
(73, 1, 233, NULL, 7210040, '2021-09-18', '03:24:57', 54, 1),
(74, 1, NULL, 156, NULL, '2021-09-18', '15:11:17', 55, 1),
(75, 1, NULL, 157, NULL, '2021-09-18', '15:12:09', 56, 1),
(76, 1, 236, NULL, 0, '2021-09-18', '18:48:44', 57, 1),
(77, 1, NULL, 158, NULL, '2021-09-18', '22:13:44', 58, 1),
(78, 1, 238, NULL, 0, '2021-09-18', '23:07:35', 59, 1),
(79, 1, 239, NULL, 0, '2021-09-19', '17:33:54', 60, 1),
(80, 1, 240, NULL, 0, '2021-09-20', '00:57:48', 61, 1),
(81, 1, NULL, 159, NULL, '2021-09-18', '23:23:22', 62, 1),
(82, 1, NULL, 160, NULL, '2021-09-22', '17:38:41', 63, 1),
(83, 1, NULL, 161, NULL, '2021-09-22', '18:07:49', 64, 1),
(84, 1, NULL, 162, NULL, '2021-09-22', '18:48:24', 65, 1),
(85, 1, NULL, 163, NULL, '2021-09-22', '23:25:31', 66, 1),
(86, 1, 246, NULL, 0, '2021-09-23', '00:08:07', 67, 1),
(87, 1, NULL, 169, NULL, '2021-09-23', '00:35:30', 68, 1),
(88, 1, NULL, 173, NULL, '2021-09-25', '00:49:23', 69, 1),
(89, 1, 249, NULL, 0, '2021-09-25', '07:23:03', 70, 1),
(90, 1, 250, NULL, 7216900, '2021-09-25', '07:25:27', 71, 1),
(91, 1, NULL, 174, NULL, '2021-09-25', '07:31:30', 72, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Codped` int(11) NOT NULL,
  `idcli` int(12) NOT NULL,
  `Total` float NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Direccion` varchar(200) DEFAULT NULL,
  `Lat` varchar(100) DEFAULT NULL,
  `Lng` varchar(100) DEFAULT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Codped`, `idcli`, `Total`, `Fecha`, `Direccion`, `Lat`, `Lng`, `Estado`) VALUES
(124, 132, 90, '2021-09-30 23:41:43', NULL, '-21.528576', '-64.7430144', 0),
(125, 129, 35, '2021-10-12 08:16:17', NULL, '-21.5201', '-64.7522', 0),
(126, 129, 62, '2021-10-12 17:56:05', NULL, '-21.5201', '-64.7522', 0),
(127, 129, 20, '2021-10-12 18:51:57', NULL, '-21.517320981431862', '-64.75126072046163', 0),
(128, 129, 20, '2021-10-12 18:54:05', NULL, '-21.519222841225098', '-64.75027953834534', 0),
(129, 129, 20, '2021-10-12 18:55:08', NULL, '-21.51913301239754', '-64.7502902671814', 0),
(130, 129, 20, '2021-10-12 18:57:22', NULL, '-21.519312669997113', '-64.75031172485352', 0),
(131, 129, 20, '2021-10-13 00:22:17', NULL, '-21.51760591383307', '-64.750397555542', 0),
(132, 129, 20, '2021-10-13 00:24:05', NULL, '-21.5201', '-64.7522', 0),
(133, 129, 59, '2021-10-13 00:25:40', NULL, '-21.5201', '-64.7522', 0),
(134, 129, 40, '2021-10-13 00:30:38', NULL, '-21.519472365454725', '-64.74939977378845', 0),
(135, 129, 107, '2021-10-13 00:35:34', NULL, '-21.5201', '-64.7522', 0),
(136, 129, 161, '2021-10-13 00:42:34', NULL, '-21.5201', '-64.7522', 0),
(137, 129, 55, '2021-10-13 00:44:51', NULL, '-21.5201', '-64.7522', 0),
(138, 129, 20, '2021-10-13 00:49:17', NULL, '-21.5201', '-64.7522', 0),
(139, 129, 20, '2021-10-13 00:52:43', NULL, '-21.5201', '-64.7522', 0),
(140, 129, 177, '2021-10-13 00:57:50', NULL, '-21.5201', '-64.7522', 0),
(141, 129, 472, '2021-10-13 01:03:50', NULL, '-21.5201', '-64.7522', 0),
(142, 129, 912, '2021-10-13 09:08:23', NULL, '-21.5201', '-64.7522', 0),
(143, 129, 1072, '2021-10-13 09:13:24', NULL, '-21.5201', '-64.7522', 0),
(144, 129, 1072, '2021-10-13 09:14:01', NULL, '-21.5201', '-64.7522', 0),
(145, 129, 60, '2021-10-13 09:17:08', NULL, '-21.5201', '-64.7522', 0),
(146, 129, 177, '2021-10-13 09:28:09', NULL, '-21.5201', '-64.7522', 0),
(147, 129, 177, '2021-10-13 09:40:07', NULL, '-21.5201', '-64.7522', 0),
(148, 129, 243, '2021-10-13 10:00:58', NULL, '-21.5201', '-64.7522', 0),
(149, 129, 22, '2021-10-13 14:44:16', NULL, '-21.518080442998926', '-64.74687340907816', 0),
(150, 129, 59, '2021-10-13 15:24:30', 'Barrio juan pablo 2 calle jordán', '-21.51790150236245', '-64.74494720026905', 0),
(151, 129, 59, '2021-10-13 15:52:16', 'tarija', '-21.5201', '-64.7522', 0),
(153, 129, 59, '2021-10-13 16:07:59', 'tarija', '-21.5201', '-64.7522', 0),
(154, 131, 60, '2021-10-14 10:18:29', 'El Tejar', '-21.542139903480443', '-64.72115116935561', 0),
(155, 129, 0, '2021-10-14 23:39:49', 'tarija', '-21.5201', '-64.7522', 2),
(156, 129, 65, '2021-10-18 15:11:17', 'Tarija', '-21.5201', '-64.7522', 0),
(157, 129, 77, '2021-10-18 15:12:09', 'Tarija', '-21.5201', '-64.7522', 0),
(158, 129, 65, '2021-10-18 22:13:44', 'Tarija ', '-21.5201', '-64.7522', 0),
(159, 129, 65, '2021-10-18 23:23:22', 'B/ JUAN PABLO II C/ JORDAN NO.0348-TJA', '-21.5201', '-64.7522', 0),
(160, 129, 65, '2021-10-22 17:38:41', 'Barrio juan pablo II', '-21.5252992', '-64.749568', 0),
(161, 129, 7, '2021-10-22 18:07:49', 'Barrio juan pablo II', '-21.5252992', '-64.749568', 0),
(162, 129, 7, '2021-10-22 18:48:24', 'Barrio juan pablo II', '-21.5252992', '-64.749568', 0),
(163, 129, 65, '2021-10-22 23:25:31', 'Barrio juan pablo II', '-21.5252992', '-64.749568', 0),
(169, 129, 100, '2021-10-23 00:35:30', 'Barrio juan pablo II', '-21.5252992', '-64.749568', 0),
(174, 129, 120, '2021-10-25 07:31:30', 'Barrio Juan XXIII', '-21.517950494000264', '-64.74476148144531', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `Codpla` int(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Precio` float NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`Codpla`, `Nombre`, `Precio`, `Descripcion`, `Foto`, `Estado`) VALUES
(17, 'Pollo spiedo entero', 65, 'pollo entero + 3 guarniciones y salsas', 'images/01938-adobar-pollo.jpg', 1),
(18, 'Hamburguesa', 12, 'nueva hamburguesa', 'images/img_pan_para_hamburguesa_28980_orig.jpg', 0),
(19, 'Alitas de pollo', 22, '8 piezas de pollo con arroz y papas', 'images/depositphotos_181911914-stock-photo-juicy-fried-chicken-meat-pieces.jpg', 0),
(20, '1/4 pollo', 22, '1/4 de pollo surtido + papas o arroz', 'images/cuarto_pollo.jpg', 1),
(21, 'Especial', 35, '4 presas de pollo, guarniciones, papas, salsas a elección', 'images/especial.jpg', 1),
(22, 'Papas Fritas grande', 10, 'papas fritas sobre grande', 'images/papasfritas.jpg', 1),
(24, 'Papas Fritas Pequeño', 7, 'papas fritas sobre pequeño', 'images/papaspeque.PNG', 1),
(32, 'Hamburguesa doble', 18, 'Hamburguesa con doble carne, queso, tocino, ensalada, papas, mayonesa y ketchup', 'images/hamburguesadoble.png', 1),
(33, 'Hamburguesa simple', 12, 'Hamburguesa con carne, queso, tocino, ensalada, papas mayonesa y ketchup', 'images/hamburguesasimple.png', 1),
(34, 'Alitas de pollo', 22, 'Acompañado de papas fritas y salsas a elección', 'images/alitasdepollo.png', 1),
(35, 'Sandwich de lomito', 20, 'Sandwich de lomito con huevo, ensalada, papas mayonesa y ketchup', 'images/sandwichlomito.png', 1),
(36, 'Nuggets de pollo', 20, '6 piezas de nuggets con papas y salsas a elección', 'images/nuggets6uni.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Codrol` int(20) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Codrol`, `Descripcion`, `Nombre`, `Estado`) VALUES
(2, 'Administrador del sistema', 'Administrador', 1),
(3, 'Encargado de la sección de ventas del sistema', 'Vendedor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talonario`
--

CREATE TABLE `talonario` (
  `Codtal` int(20) NOT NULL,
  `Autorizacion` varchar(100) NOT NULL,
  `Cant_emitidos` int(10) NOT NULL,
  `Fecha_emision` date NOT NULL,
  `Llave_dosif` varchar(64) NOT NULL,
  `Nit` varchar(30) NOT NULL,
  `Num_fin` int(5) NOT NULL,
  `Num_inicio` int(5) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talonario`
--

INSERT INTO `talonario` (`Codtal`, `Autorizacion`, `Cant_emitidos`, `Fecha_emision`, `Llave_dosif`, `Nit`, `Num_fin`, `Num_inicio`, `Estado`) VALUES
(1, '7904006306693', 0, '2022-01-01', 'zZ7Z]xssKqkEf_6K9uH(EcV+%x+u[Cca9T%+_$kiLjT8(zr3T9b5Fx2xG-D+_EBS', '1665979018', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Ci` int(12) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Email` varchar(35) DEFAULT NULL,
  `Fecha_nac` date NOT NULL,
  `Foto` varchar(200) DEFAULT NULL,
  `Codrol` int(20) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Ci`, `Nombre`, `Apellidos`, `Direccion`, `Telefono`, `Email`, `Fecha_nac`, `Foto`, `Codrol`, `Estado`) VALUES
(7215549, 'Marcelo', 'Ramos', 'B./ Las Panosas C/ #321', 76155487, 'marcelo_ramos@hotmail.com', '1998-08-20', 'images/tai.png', 3, 1),
(7216903, 'Cristian', 'Mamani Cardozo', 'TJA - B./ JP #123', 76191403, 'cristian.preof1@gmail.com', '1993-07-25', 'images/hal_9000_by_ali_radicali-d4f2l2w.jpg', 2, 1),
(7318281, 'Jose', 'Jose', 'Barrio 4 de julio', 76182883, 'jose4jose@gmail.com', '1993-10-26', 'images/betty.jpg', 3, 1),
(7458765, 'Rodrigo', 'Gonzales', 'San Geronimo', 77894488, 'rodrigodolz@gmail.com', '1993-08-26', 'images/MisterPInk.jpg', 3, 1),
(7544587, 'Graciela', 'Zeballos', 'B./ IV Centenario C/ Ernesto trigo #441', 78220038, 'graciela_z@gmail.com', '1994-11-10', 'images/defecto.png', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `Codv` int(20) NOT NULL,
  `Ciusu` int(12) NOT NULL,
  `idcli` int(12) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp(),
  `Total` float NOT NULL,
  `Codped` int(11) DEFAULT NULL,
  `Estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`Codv`, `Ciusu`, `idcli`, `Fecha`, `Total`, `Codped`, `Estado`) VALUES
(162, 7216903, 129, '2021-10-12', 35, 125, 1),
(163, 7216903, 132, '2021-09-30', 90, 124, 1),
(164, 7216903, 129, '2021-10-12', 62, 126, 1),
(165, 7216903, 129, '2021-10-12', 20, 127, 1),
(166, 7216903, 129, '2021-10-12', 20, 128, 1),
(167, 7216903, 129, '2021-10-12', 20, 129, 1),
(168, 7216903, 129, '2021-10-12', 20, 130, 1),
(169, 7216903, 129, '2021-10-13', 20, 131, 1),
(170, 7216903, 129, '2021-10-13', 20, 132, 1),
(171, 7216903, 129, '2021-10-13', 59, 133, 1),
(172, 7216903, 129, '2021-10-13', 40, 134, 1),
(173, 7216903, 129, '2021-10-13', 107, 135, 1),
(174, 7216903, 129, '2021-10-13', 161, 136, 1),
(175, 7216903, 129, '2021-10-13', 55, 137, 1),
(176, 7216903, 129, '2021-10-13', 20, 138, 1),
(177, 7216903, 129, '2021-10-13', 20, 139, 1),
(178, 7216903, 129, '2021-10-13', 177, 140, 1),
(179, 7216903, 129, '2021-10-13', 472, 141, 1),
(180, 7216903, 129, '2021-10-13', 912, 142, 1),
(181, 7216903, 129, '2021-10-13', 1072, 143, 1),
(182, 7216903, 129, '2021-10-13', 1072, 144, 1),
(183, 7216903, 129, '2021-10-13', 60, 145, 1),
(184, 7216903, 129, '2021-10-13', 177, 146, 1),
(185, 7216903, 129, '2021-10-13', 177, 147, 1),
(186, 7216903, 129, '2021-10-13', 243, 148, 1),
(187, 7216903, 129, '2021-10-13', 22, 149, 1),
(188, 7216903, 129, '2021-10-13', 59, 150, 1),
(189, 7216903, 129, '2021-10-13', 59, 151, 1),
(190, 7216903, 131, '2021-10-14', 60, 154, 1),
(191, 7216903, 129, '2021-10-13', 59, 153, 1),
(196, 7216903, 1, '2021-10-15', 100, NULL, 1),
(197, 7216903, 1, '2021-10-15', 75, NULL, 1),
(198, 7216903, 1, '2021-10-15', 112, NULL, 1),
(199, 7216903, 1, '2021-10-15', 100, NULL, 1),
(200, 7216903, 1, '2021-10-15', 57, NULL, 1),
(201, 7216903, 1, '2021-10-15', 22, NULL, 1),
(202, 7216903, 1, '2021-10-15', 65, NULL, 1),
(203, 7216903, 1, '2021-10-15', 65, NULL, 1),
(204, 7216903, 1, '2021-10-15', 65, NULL, 1),
(205, 7216903, 1, '2021-10-15', 65, NULL, 1),
(206, 7216903, 1, '2021-10-15', 20, NULL, 1),
(207, 7216903, 1, '2021-10-15', 35, NULL, 1),
(208, 7216903, 1, '2021-10-15', 22, NULL, 1),
(209, 7216903, 1, '2021-10-15', 22, NULL, 1),
(210, 7216903, 1, '2021-10-15', 94, NULL, 1),
(211, 7216903, 1, '2021-10-15', 65, NULL, 1),
(212, 7216903, 1, '2021-10-15', 10, NULL, 1),
(213, 7216903, 1, '2021-10-15', 22, NULL, 1),
(214, 7216903, 1, '2021-10-15', 35, NULL, 1),
(215, 7216903, 1, '2021-10-15', 65, NULL, 1),
(216, 7216903, 1, '2021-10-15', 22, NULL, 1),
(217, 7216903, 1, '2021-10-15', 65, NULL, 1),
(218, 7216903, 1, '2021-10-15', 65, NULL, 1),
(219, 7216903, 1, '2021-10-15', 65, NULL, 1),
(220, 7216903, 1, '2021-10-15', 32, NULL, 1),
(221, 7216903, 1, '2021-10-15', 127, NULL, 1),
(222, 7216903, 1, '2021-10-15', 10, NULL, 1),
(223, 7216903, 1, '2021-10-15', 240, NULL, 1),
(224, 7216903, 1, '2021-10-15', 55, NULL, 1),
(225, 7216903, 1, '2021-10-15', 10, NULL, 1),
(232, 7216903, 1, '2021-10-16', 22, NULL, 1),
(233, 7216903, 133, '2021-10-18', 45, NULL, 1),
(234, 7216903, 129, '2021-10-18', 65, 156, 1),
(235, 7216903, 129, '2021-10-18', 77, 157, 1),
(236, 7216903, 1, '2021-10-18', 22, NULL, 1),
(237, 7216903, 129, '2021-10-18', 65, 158, 1),
(238, 7216903, 1, '2021-10-18', 35, NULL, 1),
(239, 7216903, 1, '2021-10-19', 66, NULL, 1),
(240, 7216903, 1, '2021-10-20', 195, NULL, 1),
(241, 7216903, 129, '2021-10-18', 65, 159, 1),
(242, 7216903, 129, '2021-10-22', 65, 160, 1),
(243, 7216903, 129, '2021-10-22', 7, 161, 1),
(244, 7216903, 129, '2021-10-22', 7, 162, 1),
(245, 7216903, 129, '2021-10-22', 65, 163, 1),
(246, 7216903, 1, '2021-10-23', 100, NULL, 1),
(247, 7216903, 129, '2021-10-23', 100, 169, 1),
(248, 7216903, 129, '2021-10-25', 140, 173, 1),
(249, 7216903, 1, '2021-10-25', 96, NULL, 1),
(250, 7216903, 139, '2021-10-25', 70, NULL, 1),
(251, 7216903, 129, '2021-10-25', 120, 174, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`Codbe`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`Ci`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `det_bebida`
--
ALTER TABLE `det_bebida`
  ADD KEY `Codbe` (`Codbe`),
  ADD KEY `Codv` (`Codv`);

--
-- Indices de la tabla `det_ped`
--
ALTER TABLE `det_ped`
  ADD KEY `Codped` (`Codped`),
  ADD KEY `Codpla` (`Codpla`);

--
-- Indices de la tabla `det_plato`
--
ALTER TABLE `det_plato`
  ADD KEY `Codpla` (`Codpla`),
  ADD KEY `Codv` (`Codv`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Code`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Codfac`),
  ADD KEY `Ci_cli` (`Ci_cli`),
  ADD KEY `Codtal` (`Codtal`),
  ADD KEY `Codv` (`Codv`),
  ADD KEY `Codp` (`Codp`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Codped`),
  ADD KEY `Cicli` (`idcli`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`Codpla`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Codrol`);

--
-- Indices de la tabla `talonario`
--
ALTER TABLE `talonario`
  ADD PRIMARY KEY (`Codtal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Ci`),
  ADD KEY `Codrol` (`Codrol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`Codv`),
  ADD UNIQUE KEY `Codped` (`Codped`),
  ADD KEY `Ciusu` (`Ciusu`),
  ADD KEY `Cicli` (`idcli`),
  ADD KEY `idcli` (`idcli`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebida`
--
ALTER TABLE `bebida`
  MODIFY `Codbe` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Codfac` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Codped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `Codpla` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Codrol` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `talonario`
--
ALTER TABLE `talonario`
  MODIFY `Codtal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `Codv` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`Ci`) REFERENCES `usuario` (`Ci`);

--
-- Filtros para la tabla `det_bebida`
--
ALTER TABLE `det_bebida`
  ADD CONSTRAINT `det_bebida_ibfk_3` FOREIGN KEY (`Codbe`) REFERENCES `bebida` (`Codbe`),
  ADD CONSTRAINT `det_bebida_ibfk_4` FOREIGN KEY (`Codv`) REFERENCES `venta` (`Codv`);

--
-- Filtros para la tabla `det_ped`
--
ALTER TABLE `det_ped`
  ADD CONSTRAINT `det_ped_ibfk_3` FOREIGN KEY (`Codped`) REFERENCES `pedido` (`Codped`),
  ADD CONSTRAINT `det_ped_ibfk_4` FOREIGN KEY (`Codpla`) REFERENCES `plato` (`Codpla`);

--
-- Filtros para la tabla `det_plato`
--
ALTER TABLE `det_plato`
  ADD CONSTRAINT `det_plato_ibfk_3` FOREIGN KEY (`Codpla`) REFERENCES `plato` (`Codpla`),
  ADD CONSTRAINT `det_plato_ibfk_4` FOREIGN KEY (`Codv`) REFERENCES `venta` (`Codv`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Codtal`) REFERENCES `talonario` (`Codtal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Codrol`) REFERENCES `rol` (`Codrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
