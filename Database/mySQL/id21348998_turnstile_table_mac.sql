
-- --------------------------------------------------------

--
-- Table structure for table `mac`
--

CREATE TABLE `mac` (
  `ride` varchar(100) DEFAULT NULL,
  `mac` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mac`
--

INSERT INTO `mac` (`ride`, `mac`) VALUES
('Boomerang', 'AC:0B:FB:D8:8A:14'),
('Batman The Ride', 'D8:BF:C0:F2:6D:00'),
('None', 'test');
