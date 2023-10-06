-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2023 at 06:33 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21348998_turnstile`
--

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `ride` varchar(1024) NOT NULL,
  `seats` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`ride`, `seats`) VALUES
('American Thunder', 24),
('Batman The Ride', 32),
('Boomerang', 24),
('Boss', 24),
('Bugs Bunny Fort Fun', 1),
('Bugs Bunny Ranger Pilot', 1),
('Catwoman Whip', 8),
('Colossus', 6),
('Daffy Duck Stars on Parade', 20),
('Elmer Fudd Weather Balloons', 24),
('Fireball', 1),
('Foghorn Leghorn National Park Railway', 1),
('Grand Ole Carousel', 72),
('Joker', 1),
('Justice League: Battle for Metropolis', 6),
('Log Flume', 4),
('Marvin the Martian Camp Invasion', 24),
('Mr. Freeze', 20),
('Ninja', 24),
('Pandemonium', 4),
('Railroad', 1),
('River King Mine Train', 30),
('Rookie Racer', 16),
('Screamin Eagle', 24),
('Shazam!', 1),
('SkyScreamer', 1),
('Spinsanity', 1),
('Supergirl Star Flyer', 1),
('Taz Twister', 20),
('Thunder River', 12),
('Tsunami Soaker', 1),
('Tweety Tree House', 6),
('Yosimete Sam Tugboat Tailspin', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`ride`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
