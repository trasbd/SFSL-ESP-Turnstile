
--
-- Indexes for dumped tables
--

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`ride`,`units`);

--
-- Indexes for table `hourly`
--
ALTER TABLE `hourly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ride` (`ride`);

--
-- Indexes for table `mac`
--
ALTER TABLE `mac`
  ADD PRIMARY KEY (`mac`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`ride`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hourly`
--
ALTER TABLE `hourly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capacity`
--
ALTER TABLE `capacity`
  ADD CONSTRAINT `capacity_ibfk_1` FOREIGN KEY (`ride`) REFERENCES `seats` (`ride`);

--
-- Constraints for table `hourly`
--
ALTER TABLE `hourly`
  ADD CONSTRAINT `hourly_ibfk_1` FOREIGN KEY (`ride`) REFERENCES `seats` (`ride`);
