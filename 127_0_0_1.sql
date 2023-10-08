-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 12:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tools_equipment`
--
CREATE DATABASE IF NOT EXISTS `tools_equipment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tools_equipment`;

-- --------------------------------------------------------

--
-- Table structure for table `electrical_equipment`
--

CREATE TABLE `electrical_equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `property_number` varchar(255) NOT NULL,
  `location_inside_building` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electrical_equipment`
--

INSERT INTO `electrical_equipment` (`id`, `name`, `property_number`, `location_inside_building`, `cost`, `quantity`, `type`, `date`, `status`) VALUES
(1, 'Laptop', '11223344556', 'Room A', 799.99, 5, 'electrical_equipment', '2010-05-15', 'Functional'),
(2, 'Printer', '22334455667', 'Room B', 199.99, 10, 'electrical_equipment', '2011-07-23', 'Non-Functional'),
(3, 'Projector', '33445566778', 'Room C', 299.99, 3, 'electrical_equipment', '2012-09-10', 'Functional'),
(4, 'Scanner', '44556677889', 'Room D', 99.99, 7, 'electrical_equipment', '2013-11-18', 'Non-Functional'),
(5, 'Desktop Computer', '55667788990', 'Room E', 899.99, 4, 'electrical_equipment', '2014-02-27', 'Functional'),
(6, 'Smartphone', '66778899001', 'Room F', 599.99, 2, 'electrical_equipment', '2015-04-14', 'Repairable'),
(7, 'Tablet', '77889900012', 'Room G', 349.99, 8, 'electrical_equipment', '2016-06-02', 'Functional'),
(8, 'Monitor', '88990001123', 'Room H', 249.99, 6, 'electrical_equipment', '2017-08-20', 'Non-Functional'),
(9, 'Router', '99000112234', 'Room I', 79.99, 3, 'electrical_equipment', '2018-10-28', 'Functional'),
(10, 'Switch', '00112233445', 'Room J', 149.99, 5, 'electrical_equipment', '2019-01-05', 'Repairable'),
(11, 'External Hard Drive', '11223344556', 'Room K', 129.99, 4, 'electrical_equipment', '2020-03-15', 'Functional'),
(12, 'UPS', '22334455667', 'Room L', 199.99, 3, 'electrical_equipment', '2021-05-23', 'Non-Functional'),
(13, 'Wireless Mouse', '33445566778', 'Room M', 29.99, 6, 'electrical_equipment', '2022-07-31', 'Functional'),
(14, 'Keyboard', '44556677889', 'Room N', 49.99, 2, 'electrical_equipment', '2023-10-08', 'Non-Functional');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_equipment`
--

CREATE TABLE `furniture_equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `property_number` varchar(50) NOT NULL,
  `location_inside_building` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `furniture_equipment`
--

INSERT INTO `furniture_equipment` (`id`, `name`, `property_number`, `location_inside_building`, `cost`, `quantity`, `type`, `date`, `status`) VALUES
(1, 'Table', '11223344559', 'Room A', 299.99, 5, 'furniture_equipment', '2010-05-15', 'Functional'),
(2, 'Chair', '22334455660', 'Room B', 49.99, 10, 'furniture_equipment', '2011-07-23', 'Non-Functional'),
(3, 'Desk', '33445566771', 'Room C', 199.99, 3, 'furniture_equipment', '2012-09-10', 'Functional'),
(4, 'Bookshelf', '44556677892', 'Room D', 149.99, 7, 'furniture_equipment', '2013-11-18', 'Non-Functional'),
(5, 'Cabinet', '55667788993', 'Room E', 129.99, 4, 'furniture_equipment', '2014-02-27', 'Functional'),
(6, 'Sofa', '66778899004', 'Room F', 599.99, 2, 'furniture_equipment', '2015-04-14', 'Repairable'),
(7, 'Lamp', '77889900015', 'Room G', 29.99, 8, 'furniture_equipment', '2016-06-02', 'Functional'),
(8, 'Coffee Table', '88990001126', 'Room H', 99.99, 6, 'furniture_equipment', '2017-08-20', 'Non-Functional'),
(9, 'Wardrobe', '99000112237', 'Room I', 349.99, 3, 'furniture_equipment', '2018-10-28', 'Functional'),
(10, 'Shelf', '00112233448', 'Room J', 79.99, 5, 'furniture_equipment', '2019-01-05', 'Repairable'),
(11, 'Dining Table', '11223344559', 'Room K', 249.99, 4, 'furniture_equipment', '2020-03-15', 'Functional'),
(12, 'Dresser', '22334455660', 'Room L', 199.99, 3, 'furniture_equipment', '2021-05-23', 'Non-Functional'),
(13, 'Side Table', '33445566771', 'Room M', 69.99, 6, 'furniture_equipment', '2022-07-31', 'Functional'),
(14, 'Couch', '44556677892', 'Room N', 499.99, 2, 'furniture_equipment', '2023-10-08', 'Non-Functional');

-- --------------------------------------------------------

--
-- Table structure for table `office_equipment`
--

CREATE TABLE `office_equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `property_number` varchar(255) NOT NULL,
  `location_inside_building` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_equipment`
--

INSERT INTO `office_equipment` (`id`, `name`, `property_number`, `location_inside_building`, `cost`, `quantity`, `type`, `date`, `status`) VALUES
(1, 'Desk', '11223344557', 'Room A', 199.99, 5, 'office_equipment', '2010-05-15', 'Functional'),
(2, 'Office Chair', '22334455668', 'Room B', 99.99, 10, 'office_equipment', '2011-07-23', 'Non-Functional'),
(3, 'Filing Cabinet', '33445566779', 'Room C', 149.99, 3, 'office_equipment', '2012-09-10', 'Functional'),
(4, 'Bookshelf', '44556677890', 'Room D', 79.99, 7, 'office_equipment', '2013-11-18', 'Non-Functional'),
(5, 'Conference Table', '55667788991', 'Conference Room', 499.99, 1, 'office_equipment', '2014-02-27', 'Functional'),
(6, 'Whiteboard', '66778899002', 'Meeting Room', 149.99, 1, 'office_equipment', '2015-04-14', 'Repairable'),
(7, 'Shredder', '77889900013', 'Room E', 79.99, 2, 'office_equipment', '2016-06-02', 'Functional'),
(8, 'File Cabinets', '88990001124', 'Room F', 299.99, 4, 'office_equipment', '2017-08-20', 'Non-Functional'),
(9, 'Office Supplies', '99000112235', 'Room G', 29.99, 5, 'office_equipment', '2018-10-28', 'Functional'),
(10, 'Reception Desk', '00112233446', 'Reception Area', 399.99, 1, 'office_equipment', '2019-01-05', 'Repairable'),
(11, 'Safe', '11223344557', 'Room A', 199.99, 1, 'office_equipment', '2020-03-15', 'Functional'),
(12, 'Office Plants', '22334455668', 'Various', 19.99, 10, 'office_equipment', '2021-05-23', 'Non-Functional'),
(13, 'Standing Desk', '33445566779', 'Room H', 299.99, 3, 'office_equipment', '2022-07-31', 'Functional'),
(14, 'Conference Chairs', '44556677890', 'Conference Room', 39.99, 12, 'office_equipment', '2023-10-08', 'Non-Functional');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'lol', 'lol'),
(2, '', ''),
(3, 'sad', 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `utilities_equipment`
--

CREATE TABLE `utilities_equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `property_number` varchar(255) NOT NULL,
  `location_inside_building` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilities_equipment`
--

INSERT INTO `utilities_equipment` (`id`, `name`, `property_number`, `location_inside_building`, `cost`, `quantity`, `type`, `date`, `status`) VALUES
(1, 'Air Conditioner', '11223344558', 'Room A', 899.99, 1, 'utilities_equipment', '2010-05-15', 'Functional'),
(2, 'Heater', '22334455669', 'Room B', 299.99, 2, 'utilities_equipment', '2011-07-23', 'Non-Functional'),
(3, 'Water Cooler', '33445566770', 'Break Room', 99.99, 1, 'utilities_equipment', '2012-09-10', 'Functional'),
(4, 'Fire Extinguisher', '44556677891', 'Various', 49.99, 5, 'utilities_equipment', '2013-11-18', 'Non-Functional'),
(5, 'Emergency Lights', '55667788992', 'Hallway', 79.99, 4, 'utilities_equipment', '2014-02-27', 'Functional'),
(6, 'First Aid Kit', '66778899003', 'Room C', 29.99, 3, 'utilities_equipment', '2015-04-14', 'Repairable'),
(7, 'Smoke Detector', '77889900014', 'Various', 19.99, 10, 'utilities_equipment', '2016-06-02', 'Functional'),
(8, 'Carbon Monoxide Detector', '88990001125', 'Various', 19.99, 10, 'utilities_equipment', '2017-08-20', 'Non-Functional'),
(9, 'Security Camera System', '99000112236', 'Security Room', 599.99, 1, 'utilities_equipment', '2018-10-28', 'Functional'),
(10, 'Fire Alarm System', '00112233447', 'Security Room', 299.99, 1, 'utilities_equipment', '2019-01-05', 'Repairable'),
(11, 'Backup Generator', '11223344558', 'Generator Room', 1999.99, 1, 'utilities_equipment', '2020-03-15', 'Functional'),
(12, 'Sump Pump', '22334455669', 'Basement', 149.99, 1, 'utilities_equipment', '2021-05-23', 'Non-Functional'),
(13, 'Water Heater', '33445566770', 'Basement', 499.99, 1, 'utilities_equipment', '2022-07-31', 'Functional'),
(14, 'Trash Compactor', '44556677891', 'Break Room', 399.99, 1, 'utilities_equipment', '2023-10-08', 'Non-Functional');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `electrical_equipment`
--
ALTER TABLE `electrical_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `furniture_equipment`
--
ALTER TABLE `furniture_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_equipment`
--
ALTER TABLE `office_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities_equipment`
--
ALTER TABLE `utilities_equipment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electrical_equipment`
--
ALTER TABLE `electrical_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `furniture_equipment`
--
ALTER TABLE `furniture_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `office_equipment`
--
ALTER TABLE `office_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilities_equipment`
--
ALTER TABLE `utilities_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
