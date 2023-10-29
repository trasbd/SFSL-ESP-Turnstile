
-- --------------------------------------------------------

--
-- Table structure for table `hourly`
--

CREATE TABLE `hourly` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ride` varchar(100) NOT NULL,
  `units` int(11) DEFAULT NULL,
  `cycles` int(11) DEFAULT NULL,
  `empty` int(11) DEFAULT NULL,
  `hourly` int(11) DEFAULT NULL,
  `wait` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hourly`
--

INSERT INTO `hourly` (`id`, `date`, `time`, `ride`, `units`, `cycles`, `empty`, `hourly`, `wait`) VALUES
(2, '2023-10-03', '18:00:00', 'American Thunder', 2, 0, 0, 0, 15),
(3, '2023-10-03', '18:00:00', 'American Thunder', 1, 0, 0, 0, 15),
(4, '2023-10-03', '19:00:00', 'American Thunder', 2, 0, 0, 0, 15),
(5, '2023-10-03', '19:00:00', 'American Thunder', 2, 0, 0, 0, 15),
(6, '2023-10-03', '19:00:00', 'American Thunder', 2, 0, 0, 0, 15),
(7, '2023-10-03', '19:00:00', 'American Thunder', 2, 0, 0, 0, 15),
(8, '2023-10-03', '19:00:00', 'American Thunder', 1, 0, 0, 0, 15),
(9, '2023-10-03', '19:00:00', 'American Thunder', 0, 0, 0, 0, 15),
(10, '2023-10-03', '20:00:00', 'Batman The Ride', 0, 0, 0, 0, 15),
(11, '2023-10-03', '21:00:00', 'Batman The Ride', 1, 0, 0, 0, 15),
(12, '2023-10-03', '22:00:00', 'Batman The Ride', 2, 0, 0, 0, 15),
(13, '2023-10-03', '23:00:00', 'Batman The Ride', 1, 0, 0, 0, 15),
(15, '2023-10-04', '01:00:00', 'Justice League: Battle for Metropolis', 1, 11, 34, 32, 15),
(16, '2023-10-04', '02:00:00', 'Justice League: Battle for Metropolis', 1, 0, 0, 0, 15),
(17, '2023-10-04', '03:00:00', 'Justice League: Battle for Metropolis', 1, 0, 0, 0, 15),
(18, '2023-10-04', '04:00:00', 'Justice League: Battle for Metropolis', 1, 0, 0, 5, 15),
(19, '2023-10-04', '05:00:00', 'Justice League: Battle for Metropolis', 1, 0, 0, 0, 15),
(20, '2023-10-04', '06:00:00', 'Justice League: Battle for Metropolis', 1, 0, 0, 0, 15),
(21, '2023-10-04', '07:00:00', 'Justice League: Battle for Metropolis', 1, 0, 0, 0, 15),
(22, '2023-10-04', '08:00:00', 'Boss', 1, 4, 3, 93, 15),
(23, '2023-10-04', '09:00:00', 'Boss', 1, 0, 0, 0, 15),
(24, '2023-10-04', '10:00:00', 'Boss', 1, 0, 0, 0, 15),
(25, '2023-10-04', '11:00:00', 'Boss', 1, 0, 0, 0, 15),
(26, '2023-10-04', '12:00:00', 'River King Mine Train', 1, 4, 3, 117, 15),
(27, '2023-10-04', '12:00:00', 'Boomerang', 1, 0, 0, 100, 15),
(28, '2023-10-04', '13:00:00', 'Boomerang', 1, 0, 0, 0, 15),
(29, '2023-10-04', '13:00:00', 'River King Mine Train', 1, 13, 37, 353, 25),
(30, '2023-10-04', '14:00:00', 'Boomerang', 1, 0, 0, 0, 15),
(31, '2023-10-04', '14:00:00', 'River King Mine Train', 1, 5, 5, 145, 25),
(32, '2023-10-04', '15:00:00', 'River King Mine Train', 2, 11, 8, 322, 60),
(33, '2023-10-04', '16:00:00', 'River King Mine Train', 1, 10, 8, 292, 45),
(34, '2023-10-04', '17:00:00', 'River King Mine Train', 1, 16, 20, 460, 45),
(35, '2023-10-04', '18:00:00', 'River King Mine Train', 1, 1, 4, 26, 75),
(36, '2023-10-04', '19:00:00', 'Pandemonium', 1, 20, 3, 77, 0),
(37, '2023-10-05', '20:00:00', 'Pandemonium', 8, 31, 7, 117, 15),
(38, '2023-10-05', '21:00:00', 'Pandemonium', 8, 0, 0, 0, 15),
(39, '2023-10-05', '23:00:00', 'Justice League: Battle for Metropolis', 6, 115, 48, 642, 30),
(40, '2023-10-06', '00:00:00', 'Justice League: Battle for Metropolis', 0, 0, 0, 6, 30),
(41, '2023-10-06', '01:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 30),
(42, '2023-10-06', '02:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 30),
(43, '2023-10-06', '03:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 30),
(44, '2023-10-06', '04:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 30),
(45, '2023-10-06', '05:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 30),
(46, '2023-10-06', '07:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 30),
(47, '2023-10-06', '08:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 30),
(48, '2023-10-06', '09:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 30),
(49, '2023-10-06', '10:00:00', 'Justice League: Battle for Metropolis', 6, 18, 7, 101, 30),
(50, '2023-10-06', '11:00:00', 'Justice League: Battle for Metropolis', 6, 3, 0, 18, 30),
(52, '2023-10-06', '12:00:00', 'Justice League: Battle for Metropolis', 1, 8, 0, 48, 15),
(53, '2023-10-06', '13:00:00', 'Justice League: Battle for Metropolis', 6, 10, 0, 60, 25),
(54, '2023-10-06', '14:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 25),
(55, '2023-10-06', '15:00:00', 'Justice League: Battle for Metropolis', 6, 0, 0, 0, 25),
(56, '2023-10-09', '14:00:00', 'Batman The Ride', 1, 14, 5, 443, 15),
(57, '2023-10-09', '14:00:00', 'Batman The Ride', 0, 0, 0, 0, 15),
(58, '2023-10-09', '16:00:00', 'Batman The Ride', 1, 7, 8, 216, 20);
