-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2020 at 07:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria_eventos`
--

CREATE TABLE `categoria_eventos` (
  `id_categoria` tinyint(10) NOT NULL,
  `categoria_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_eventos`
--

INSERT INTO `categoria_eventos` (`id_categoria`, `categoria_evento`, `icono`) VALUES
(1, 'Seminario', 'fa-university'),
(2, 'Conferencia', 'fa-commet'),
(3, 'Talleres', 'fa-code');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(70) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_categoria` tinyint(10) NOT NULL,
  `id_invitado` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_categoria`, `id_invitado`, `clave`) VALUES
(2, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, ''),
(3, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, ''),
(4, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, ''),
(5, 'Drupal', '2016-12-09', '17:00:00', 3, 4, ''),
(6, 'WordPress', '2016-12-09', '19:00:00', 3, 5, ''),
(7, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, ''),
(8, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, ''),
(9, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, ''),
(10, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, ''),
(11, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, ''),
(12, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, ''),
(13, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, ''),
(14, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, ''),
(15, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, ''),
(16, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, ''),
(17, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01'),
(18, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02'),
(19, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03'),
(20, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04'),
(21, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05'),
(22, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01'),
(23, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02'),
(24, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03'),
(25, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01'),
(26, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, 'taller_06'),
(27, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07'),
(28, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08'),
(29, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09'),
(30, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10'),
(31, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11'),
(32, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01'),
(33, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02'),
(34, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03'),
(35, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04'),
(36, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05'),
(37, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01'),
(38, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02'),
(39, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03'),
(40, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01'),
(41, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, 'taller_06'),
(42, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07'),
(43, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08'),
(44, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09'),
(45, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10'),
(46, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11'),
(47, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01'),
(48, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02'),
(49, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03'),
(50, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04'),
(51, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05'),
(52, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01'),
(53, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02'),
(54, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03'),
(55, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01'),
(56, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, 'taller_06'),
(57, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07'),
(58, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08'),
(59, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09'),
(60, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10'),
(61, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11'),
(62, 'Como crear una tienda online que venda millones en pocos días', '2016-12-10', '10:00:00', 2, 6, 'conf_04'),
(63, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05'),
(64, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06'),
(65, 'Aprende a Programar en una mañana', '2016-12-10', '10:00:00', 1, 3, 'sem_02'),
(66, 'Diseño UI y UX para móviles', '2016-12-10', '17:00:00', 1, 5, 'sem_03'),
(67, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12'),
(68, 'Crea tu propia API', '2016-12-11', '12:00:00', 3, 2, 'taller_13'),
(69, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_14'),
(70, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_15'),
(71, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16'),
(72, 'Como hacer Marketing en línea', '2016-12-11', '10:00:00', 2, 6, 'conf_07'),
(73, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08'),
(74, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09'),
(75, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04'),
(76, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05');

-- --------------------------------------------------------

--
-- Table structure for table `invitados`
--

CREATE TABLE `invitados` (
  `id_invitado` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invitados`
--

INSERT INTO `invitados` (`id_invitado`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Juan', 'Bautista', 'Praesent et nulla magna. Maecenas laoreet mi in risus pellentesque, ut imperdiet sem posuere. Aenean purus sem, finibus ut purus in, scelerisque dignissim massa. Sed vulputate nisl eget sodales scelerisque. Donec non massa eget odio sagittis pharetra id nec urna. Aliquam vel velit quam odio sagittis pharetra id nec urna.', 'invitado1.jpg'),
(2, 'Shari', 'Herrera', 'Praesent et nulla magna. Maecenas laoreet mi in risus pellentesque, ut imperdiet sem posuere. Aenean purus sem, finibus ut purus in, scelerisque dignissim massa. Sed vulputate nisl eget sodales scelerisque. Donec non massa eget odio sagittis pharetra id nec urna. Aliquam vel velit quam odio sagittis pharetra id nec urna.', 'invitado2.jpg'),
(3, 'Gregorio', 'Sanchez', 'Praesent et nulla magna. Maecenas laoreet mi in risus pellentesque, ut imperdiet sem posuere. Aenean purus sem, finibus ut purus in, scelerisque dignissim massa. Sed vulputate nisl eget sodales scelerisque. Donec non massa eget odio sagittis pharetra id nec urna. Aliquam vel velit quam odio sagittis pharetra id nec urna.', 'invitado3.jpg'),
(4, 'Susan', 'Rivera', 'Praesent et nulla magna. Maecenas laoreet mi in risus pellentesque, ut imperdiet sem posuere. Aenean purus sem, finibus ut purus in, scelerisque dignissim massa. Sed vulputate nisl eget sodales scelerisque. Donec non massa eget odio sagittis pharetra id nec urna. Aliquam vel velit quam odio sagittis pharetra id nec urna.', 'invitado4.jpg'),
(5, 'Harold', 'Garcia', 'Praesent et nulla magna. Maecenas laoreet mi in risus pellentesque, ut imperdiet sem posuere. Aenean purus sem, finibus ut purus in, scelerisque dignissim massa. Sed vulputate nisl eget sodales scelerisque. Donec non massa eget odio sagittis pharetra id nec urna. Aliquam vel velit quam odio sagittis pharetra id nec urna.', 'invitado5.jpg'),
(6, 'Susan', 'Sanchez', 'Praesent et nulla magna. Maecenas laoreet mi in risus pellentesque, ut imperdiet sem posuere. Aenean purus sem, finibus ut purus in, scelerisque dignissim massa. Sed vulputate nisl eget sodales scelerisque. Donec non massa eget odio sagittis pharetra id nec urna. Aliquam vel velit quam odio sagittis pharetra id nec urna.\r\n\r\n', 'invitado6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_eventos`
--
ALTER TABLE `categoria_eventos`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_invitado` (`id_invitado`);

--
-- Indexes for table `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id_invitado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_eventos`
--
ALTER TABLE `categoria_eventos`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `invitados`
--
ALTER TABLE `invitados`
  MODIFY `id_invitado` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_eventos` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_invitado`) REFERENCES `invitados` (`id_invitado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
