
-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `ride` varchar(100) NOT NULL,
  `units` int(2) NOT NULL DEFAULT 1,
  `hourlyCap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `capacity`
--

INSERT INTO `capacity` (`ride`, `units`, `hourlyCap`) VALUES
('American Thunder', 1, 450),
('American Thunder', 2, 800),
('Batman The Ride', 1, 900),
('Batman The Ride', 2, 2000),
('Boomerang', 1, 667),
('Boss', 1, 555),
('Pandemonium', 1, 100),
('Pandemonium', 2, 200),
('River King Mine Train', 1, 500),
('River King Mine Train', 2, 900);
