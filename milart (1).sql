-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2015 a las 12:12:03
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `milart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `img`, `descripcion`) VALUES
(1, 'Primero', 'img1.JPG', 'Wow, I have been looking for such a simple proof of concept. All of examples I have seen have either been json files or some obscure webservice with what knows backend. Thanks for such a simple and complete proof of concept!!!!!!'),
(2, 'Segundo', 'img2.JPG', 'Thanks for your kind comment. I am always charmed by proof of concept examples myself so I thought lets give it a try.\nThese simple examples get you started exactly how you want.'),
(3, 'Tercero', 'img3.JPG', 'Awesome! Thanks! Been struggling with this for a while. You should consider submitting it to the AngularJS docs because many people have been having similar issues with $http.post().'),
(4, 'Cuarto', 'img4.JPG', 'It’s weird though that PHP doesn’t include the JSON posted data in the $_POST variable. Some site i’ve found says it does this in the $_POST[‘json’] variable, but it so doesn’t!'),
(5, 'Quinto', 'img5.JPG', 'I will post it at the AngularJS docs. JSON is a specific internet media type. Of course you can put a JSON string in a HTTP Post request, but this doesn’t make it a JSON request.'),
(6, 'Sexto', 'img6.JPG', 'For syntax errors, you need to enable error display in the php.ini. By default these are turned off because you don''t want a "customer" seeing the error messages. Check this page in the PHP documentation for information on the 2 directives: error_reporting and display_errors. display_errors is probably the one you want to change.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellidos`, `email`, `password`) VALUES
(17, 'andoni', 'gonzalez', 'a@a.com', '$2y$12$bcUdynq.ov1SuESNvO1Zo.uj0AZ3/fJ8iue4dcVsbLUa2q.irYDnq'),
(18, 'jon', 'gonzalez', 'jon@gmail.com', '$2y$12$d382RtYJlxlVfOF2ODeDK.sI6rR1cABrbU1uW/qXaUfs.ifnjcmWe'),
(19, 'ane', 'gonzalez', 'ane@gmail.com', '$2y$12$yPaH50FoyTprvEOAySgUyudn6kGjCcczBQ1B4qnG.coQTSqJ7dJLG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
