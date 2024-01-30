
--

CREATE TABLE `department` (
  `id` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `Name`, `des`, `location`) VALUES
('d001', 'ict', 'webdevlopment, database hns', 'b12/r10'),
('d002', 'Accounting', 'accounting ', 'b13/f2'),
('d003', 'Garment', 'garment ', 'b13/f4'),
('d004', 'Agro', 'agro ', 'b11/f4');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `Name`, `email`, `password`) VALUES
('a004', 'Natan', 'blacknatan@gmail.com', '123456'),
('o001', 'Natan', 'Natan@gmail.com', ''),
('o002', 'admin', 'admin@admin.com', '123456'),
('t002', 'abene', 'abeni@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `student` varchar(10) NOT NULL,
  `level` varchar(5) NOT NULL,
  `uc1` int(11) NOT NULL,
  `uc2` int(11) NOT NULL,
  `uc3` int(11) NOT NULL,
  `uc4` int(11) NOT NULL,
  `uc5` int(11) NOT NULL,
  `uc6` int(11) NOT NULL,
  `uc7` int(11) NOT NULL,
  `uc8` int(11) NOT NULL,
  `uc9` int(11) NOT NULL,
  `uc10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`student`, `level`, `uc1`, `uc2`, `uc3`, `uc4`, `uc5`, `uc6`, `uc7`, `uc8`, `uc9`, `uc10`) VALUES
('s001', 'I', 88, 77, 88, 77, 77, 77, 77, 7, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(10) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` char(10) NOT NULL,
  `DOB` date NOT NULL,
  `depaptment` varchar(10) NOT NULL,
  `grade` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstName`, `middleName`, `lastName`, `age`, `sex`, `DOB`, `depaptment`, `grade`, `email`, `password`) VALUES
('s001', 'solo', 'Aweke', 'Haile', 10, 'M', '2024-01-01', 'd004', 12, 'Black@email.com', '2024-01-01haile');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`student`,`level`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department` (`depaptment`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `student` FOREIGN KEY (`student`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `department` FOREIGN KEY (`depaptment`) REFERENCES `department` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
