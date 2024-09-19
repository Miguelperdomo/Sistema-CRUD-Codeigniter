-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2024 a las 22:31:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemacrud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(5) UNSIGNED NOT NULL,
  `nombreArea` varchar(50) NOT NULL,
  `codigoArea` int(3) NOT NULL,
  `descripcion` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombreArea`, `codigoArea`, `descripcion`) VALUES
(1, 'Sistemas', 111, 'Es la Area de Sistemas, encargados de todo el funcionamiento del equipo, y las redes de Internet'),
(2, 'Administracion', 222, 'Es la Area de Administracion, Tiene como objetivo principal lograr el máximo beneficio posible para una entidad. Logra esto mediante la organización, planificación.'),
(3, 'Cartera', 333, 'Es la Area de Cartera, la colección de negocios y productos que conforman tu empresa. Además, evalua el rendimiento de sus productos o servicios.'),
(4, 'Auditoria', 444, 'Es la Area de Auditoria, revisar los protocolos que se utilizan en la empresa para encontrar posibles errores e implantar las mejoras que correspondan. '),
(5, 'Comercializacion', 555, 'Es la Area de Comercializacion, genera estrategias de promoción y venta de productos de manera que puedan alcanzar al consumidor de manera eficaz. '),
(6, 'Recursos Humanos', 666, 'Es la Area de Recursos Humanos, se gestiona todo lo relacionado con las personas que trabajan en ella. '),
(7, 'Nomina', 777, 'Es la Area de Nomina, la empresa entrega al trabajador en el que se recogen el sueldo que recibe a cambio del trabajo realizado. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) UNSIGNED NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombreempleado` varchar(50) NOT NULL,
  `apellidoempleado` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `id_area` int(5) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `password`, `nombreempleado`, `apellidoempleado`, `fecha_nacimiento`, `correo`, `telefono`, `id_area`, `created_at`, `updated_at`) VALUES
(1, 'Miguel2004', 'Miguel Angel', 'Rodriguez Perdomo', '2004-01-28', 'perdomomiguel2004@gmail.com', '3160539301', 1, '2024-09-19 16:24:27', '2024-09-19 19:25:16'),
(2, 'juan1234', 'Juan Fernando', 'Quintero', '2024-09-02', 'thebug@gmail.com', '3133854821', 3, '2024-09-19 16:36:29', '2024-09-19 19:42:54'),
(3, 'JAJA234', 'Luis', 'Vidal', '1987-04-28', 'luis@soydev.com', '3108882721', 1, '2024-09-19 16:41:31', '2024-09-19 19:42:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-09-17-174326', 'App\\Database\\Migrations\\Areas', 'default', 'App', 1726600246, 1),
(2, '2024-09-17-191144', 'App\\Database\\Migrations\\Empleados', 'default', 'App', 1726604580, 2),
(3, '2024-09-17-202456', 'App\\Database\\Migrations\\AgregarFechasEmpleados', 'default', 'App', 1726605124, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `empleados_id_area_foreign` (`id_area`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
