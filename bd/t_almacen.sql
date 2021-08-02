-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 09:13 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almacenhardware`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_almacen`
--

CREATE TABLE `t_almacen` (
  `id_almacen` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `numero_serie` int(255) DEFAULT NULL,
  `capacidad` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `nombreImagen` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_almacen`
--

INSERT INTO `t_almacen` (`id_almacen`, `nombre`, `modelo`, `numero_serie`, `capacidad`, `descripcion`, `nombreImagen`, `extension`) VALUES
(9, 'Mouse gamer', 'Cooler Master ', 0, ' 1,000 Hz', 'con características de punta pero una apariencia más bien poco refinada. Cuenta con más iluminación RGB que sus antecesores, un DPI máximo más alto, un D-Pad único y hasta una pantalla OLED. ', 'mouse-gamer.jpg', 'jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_almacen`
--
ALTER TABLE `t_almacen`
  ADD PRIMARY KEY (`id_almacen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_almacen`
--
ALTER TABLE `t_almacen`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
