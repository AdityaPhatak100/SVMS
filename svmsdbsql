-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 03:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` char(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Test Admin', 'Admin', 7898799797, 'admin@gmail.com', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', '2022-10-14 05:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblguest`
--

CREATE TABLE `tblguest` (
  `ID` int(11) NOT NULL,
  `GuestName` varchar(50) NOT NULL,
  `Wing` char(1) NOT NULL,
  `FlatNumber` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

CREATE TABLE `tblmember` (
  `ID` int(11) NOT NULL,
  `Wing` char(1) NOT NULL,
  `AptNumber` varchar(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `TotFamNumber` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='List of all the members of the society';

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`ID`, `Wing`, `AptNumber`, `Name`, `ContactNumber`, `TotFamNumber`) VALUES
(6, 'A', '101', 'Brandi Erickson', '8970435615', 6),
(7, 'A', '102', 'Richard Gutierrez', '1582974036', 1),
(8, 'A', '103', 'Jerry White', '0617985324', 3),
(9, 'A', '201', 'Crystal Jones', '6541327890', 3),
(10, 'A', '202', 'Lori Barrett', '2597308614', 4),
(11, 'A', '203', 'Vincent Berry', '8497602351', 3),
(12, 'A', '301', 'Megan Richardson', '8741509362', 6),
(13, 'A', '302', 'Lori Dennis', '5731420869', 5),
(14, 'A', '303', 'David Ramirez', '6498157320', 1),
(15, 'A', '401', 'Melissa Mills', '9762803415', 3),
(16, 'A', '402', 'Duane Campbell', '9137025846', 6),
(17, 'A', '403', 'Colleen Nichols', '3570268419', 4),
(18, 'A', '501', 'Jeremy Lewis', '9861024573', 1),
(19, 'A', '502', 'Julie Elliott', '6034895172', 1),
(20, 'A', '503', 'Jacob Cooper', '7214589063', 6),
(21, 'A', '601', 'Keith Thompson', '3597806421', 4),
(22, 'A', '602', 'Amanda Dyer', '5610273489', 5),
(23, 'A', '603', 'Joseph Smith', '2987165430', 5),
(24, 'A', '701', 'Mitchell Robinson', '3947518062', 3),
(25, 'A', '702', 'Rebecca Lopez', '1768203945', 2),
(26, 'A', '703', 'Kayla Mcclain', '0832967145', 6),
(27, 'A', '801', 'Shane Cortez', '5498732016', 2),
(28, 'A', '802', 'Brianna Ho', '0719865234', 3),
(29, 'A', '803', 'Justin Estes', '7152463980', 3),
(30, 'B', '101', 'Robert Smith', '4176803592', 4),
(31, 'B', '102', 'Dylan Smith', '8359172406', 4),
(32, 'B', '103', 'Darryl Petty', '7436095128', 6),
(33, 'B', '201', 'Angela Perez', '0516827394', 3),
(34, 'B', '202', 'Christina Perkins', '1904823675', 6),
(35, 'B', '203', 'Natalie Hart', '8139604725', 4),
(36, 'B', '301', 'Terry Montoya', '2386975140', 4),
(37, 'B', '302', 'Charles Dalton', '3521068749', 4),
(38, 'B', '303', 'Christina Dyer', '0497562831', 3),
(39, 'B', '401', 'Steven Aguilar', '9674132850', 1),
(40, 'B', '402', 'Matthew Morgan', '1759826403', 1),
(41, 'B', '403', 'Laura Franklin', '4183792056', 4),
(42, 'B', '501', 'Sara Green', '6935148270', 4),
(43, 'B', '502', 'Justin Phillips', '4182597036', 4),
(44, 'B', '503', 'Melissa Howard', '9367580241', 2),
(45, 'B', '601', 'Philip Barker', '2304891756', 6),
(46, 'B', '602', 'Kathryn Powers', '9164238570', 6),
(47, 'B', '603', 'Shelia Martinez', '4315872906', 5),
(48, 'B', '701', 'William Adams', '0764312859', 5),
(49, 'B', '702', 'Jorge Knight', '8369510274', 3),
(50, 'B', '703', 'Mark Harper', '1698742305', 5),
(51, 'B', '801', 'James Valdez', '7893640251', 4),
(52, 'B', '802', 'Jordan Rivera', '2530641789', 5),
(53, 'B', '803', 'Tracey Ferguson', '9371250846', 2),
(54, 'C', '101', 'Connor Richard', '0692748513', 1),
(55, 'C', '102', 'Jacqueline Hobbs', '7312689450', 2),
(56, 'C', '103', 'James Murphy', '2598370614', 3),
(57, 'C', '201', 'Samuel Rios', '8927436051', 5),
(58, 'C', '202', 'Adam Taylor', '8620579413', 1),
(59, 'C', '203', 'Molly Garcia', '0294158367', 5),
(60, 'C', '301', 'Lauren Cruz', '3742185609', 5),
(61, 'C', '302', 'Jacob Matthews', '1867943520', 1),
(62, 'C', '303', 'Suzanne Baker', '7354910826', 5),
(63, 'C', '401', 'Michael Middleton', '4605871932', 2),
(64, 'C', '402', 'Jason Jarvis', '0927543861', 3),
(65, 'C', '403', 'Jason Riggs', '9102346857', 3),
(66, 'C', '501', 'Kathryn Tate', '4923086157', 2),
(67, 'C', '502', 'Ryan Hill', '1875263409', 1),
(68, 'C', '503', 'Raymond Chase V', '8602971354', 1),
(69, 'C', '601', 'Chad Walker', '6532180794', 1),
(70, 'C', '602', 'Catherine Dunlap', '5741293068', 3),
(71, 'C', '603', 'Mr. Justin Barrett', '3019458726', 3),
(72, 'C', '701', 'David White', '8190762345', 4),
(73, 'C', '702', 'Elizabeth Sanchez', '3504167892', 4),
(74, 'C', '703', 'Amanda Allen', '1657084392', 1),
(75, 'C', '801', 'Meghan Johnson', '6390258147', 6),
(76, 'C', '802', 'Sally Stewart', '4239507186', 2),
(77, 'C', '803', 'Lawrence Bauer', '5061842973', 1),
(78, 'D', '101', 'David Dunn', '9237604851', 1),
(79, 'D', '102', 'Dr. Carl Arnold', '2964105387', 3),
(80, 'D', '103', 'Benjamin Shaw', '3275104986', 1),
(81, 'D', '201', 'James Sims', '6501832947', 2),
(82, 'D', '202', 'Leslie Carpenter', '3604721985', 3),
(83, 'D', '203', 'Lindsay Harris', '5326701498', 3),
(84, 'D', '301', 'Jackie Mata', '3614895270', 3),
(85, 'D', '302', 'Darrell Harris', '4218076539', 6),
(86, 'D', '303', 'Carrie Miller', '0519347826', 4),
(87, 'D', '401', 'Christopher May', '3528691047', 6),
(88, 'D', '402', 'Gina Walsh', '7158690342', 4),
(89, 'D', '403', 'Natalie Daniels', '8259746301', 6),
(90, 'D', '501', 'Alexis Chaney', '4398501276', 1),
(91, 'D', '502', 'Jessica Rojas', '3197486205', 5),
(92, 'D', '503', 'Andrea Carr', '2917564308', 6),
(93, 'D', '601', 'Gregory Cervantes', '8025469317', 1),
(94, 'D', '602', 'Alexis Boone', '2975816034', 2),
(95, 'D', '603', 'Andrea Brown', '0854927163', 6),
(96, 'D', '701', 'John Burns', '1025943867', 5),
(97, 'D', '702', 'Susan Brady', '7021564983', 3),
(98, 'D', '703', 'Jennifer Shelton', '9256087413', 1),
(99, 'D', '801', 'Ashley Dawson', '4015897632', 4),
(100, 'D', '802', 'Brandon Lang', '2375891640', 5),
(101, 'D', '803', 'Robert Nelson', '3516947820', 3),
(102, 'E', '101', 'James Lynn', '0427816359', 3),
(103, 'E', '102', 'Wanda Harvey', '8172496350', 3),
(104, 'E', '103', 'Raymond Glover', '9473015682', 3),
(105, 'E', '201', 'Joe Smith', '7196853204', 3),
(106, 'E', '202', 'Samantha Morales', '2641807935', 3),
(107, 'E', '203', 'Angela Mason', '8609517234', 4),
(108, 'E', '301', 'Daniel Ryan', '5974061832', 3),
(109, 'E', '302', 'Brandon Hardy', '1769258043', 2),
(110, 'E', '303', 'Brittany Thomas', '7689530142', 1),
(111, 'E', '401', 'Linda Porter', '0826347159', 2),
(112, 'E', '402', 'Robert Anderson', '6310247985', 5),
(113, 'E', '403', 'Patrick Pittman', '4970831562', 2),
(114, 'E', '501', 'Sylvia Mcdaniel', '1278456039', 2),
(115, 'E', '502', 'Sabrina Dunlap', '9085723614', 1),
(116, 'E', '503', 'Anita Weaver', '9630217854', 6),
(117, 'E', '601', 'Jennifer Hunt', '7549836102', 6),
(118, 'E', '602', 'Jill Smith', '7908653412', 1),
(119, 'E', '603', 'Thomas Smith', '1802763549', 1),
(120, 'E', '701', 'Erica Newton', '0542379618', 6),
(121, 'E', '702', 'Lori Johnson', '2765089341', 1),
(122, 'E', '703', 'Vanessa Miller', '6197058234', 6),
(123, 'E', '801', 'Brittany Taylor', '2567431890', 6),
(124, 'E', '802', 'Vanessa Holmes', '3564172890', 5),
(125, 'E', '803', 'Blake Moss', '6975812403', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `ID` int(5) NOT NULL,
  `VisitorName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `FlatNumber` varchar(3) NOT NULL,
  `Wing` char(1) NOT NULL,
  `WhomtoMeet` varchar(120) DEFAULT NULL,
  `ReasontoMeet` varchar(120) DEFAULT NULL,
  `EnterDate` timestamp NULL DEFAULT current_timestamp(),
  `outtime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvisitor`
--

INSERT INTO `tblvisitor` (`ID`, `VisitorName`, `MobileNumber`, `FlatNumber`, `Wing`, `WhomtoMeet`, `ReasontoMeet`, `EnterDate`, `outtime`) VALUES
(1, 'John', 9879798777, '401', 'B', 'Mr. Birijesh', 'Deliver Product', '2017-07-05 00:41:53', '2017-07-05 10:09:46'),
(2, 'Yogesh Kumar', 6444464646, '703', 'A', 'Alok Kumar', 'Relative', '2018-06-08 01:11:05', '2018-07-01 10:09:40'),
(5, 'Amit', 1908621561, '303', 'C', 'Anuj kumar', 'Personal', '2019-07-12 10:26:42', '2019-07-12 10:27:02'),
(65, 'Rishi', NULL, '402', 'B', NULL, 'Expected Guest', '2022-11-08 09:07:02', '2022-11-30 10:42:53'),
(66, 'Burton', 9876543210, '501', 'B', 'Rahul', 'Personal Work', '2022-11-30 11:18:49', '2022-11-30 11:24:20'),
(68, 'Durant', 1234567892, '201', 'A', 'Kevin', 'Product Delivery', '2022-11-30 12:00:14', '2022-11-30 12:00:25'),
(88, 'Ajay', 9654785691, '801', 'B', 'Brijesh Gupta', 'Relative', '2022-10-02 02:00:12', '2022-10-03 13:41:56'),
(89, 'Aman', 7536412598, '403', 'C', 'Karan', 'Casual Visit', '2022-10-12 05:43:48', '2022-10-12 07:43:48'),
(90, 'Hetal', 9648532167, '101', 'D', 'Paulami', 'Study', '2022-10-19 06:09:07', '2022-10-19 12:04:08'),
(91, 'Kaushal', 784635219, '402', 'E', 'Mitra', 'Casual Visit', '2022-11-01 03:07:20', '2022-11-02 05:00:45'),
(92, 'Rohan', 7536214589, '602', 'B', 'Yash', 'AC Service', '2022-11-02 03:38:35', '2022-11-02 01:07:30'),
(93, 'Aryan', 7564853169, '303', 'A', 'Kiran', 'Plumber', '2022-11-10 06:03:28', '2022-11-11 07:48:40'),
(94, 'Ravi', 6547853125, '402', 'E', 'Rahul', 'Casual Visit', '2022-11-25 06:11:28', '2022-11-25 16:01:05'),
(95, 'Anirudh', 8654753216, '702', 'C', 'Narendra', 'Meet', '2022-11-27 10:03:28', '2022-11-27 11:07:49'),
(96, 'Shrikant', 9654786321, '401', 'B', 'Jasmin', 'Urban Clap Service', '2022-11-30 13:59:52', '2022-11-30 14:00:04'),
(99, 'Boris', 1234567890, '103', 'C', 'Boris', 'Casual', '2022-12-01 09:19:11', '2022-12-01 09:24:04'),
(100, 'Aditya', 1234567890, '301', 'D', 'Jasmin', 'Product Delivery', '2022-12-01 09:22:52', '2022-12-01 09:24:08'),
(101, 'Ross', NULL, '301', 'B', NULL, 'Expected Guest', '2022-12-01 11:08:54', '2022-12-01 11:09:19'),
(102, 'Boris', 1234567890, '401', 'D', 'Rishi', 'Product Delivery', '2022-12-01 11:10:06', '2022-12-01 11:15:47'),
(103, 'Boris', 1234567890, '302', 'C', 'Rishi Sunak', 'Product Delivery', '2022-12-01 11:11:36', '2022-12-01 11:15:49'),
(104, 'Ross', NULL, '101', 'B', NULL, 'Expected Guest', '2022-12-01 11:15:12', '2022-12-01 11:15:51'),
(105, 'John', NULL, '302', 'D', NULL, 'Expected Guest', '2022-12-01 11:15:20', '2022-12-01 11:15:52'),
(106, 'Rahul', 1234567890, '601', 'D', 'Mehta', 'Product Delivery', '2022-12-01 14:33:52', '2022-12-01 14:40:00'),
(107, 'Abhimanyu', NULL, '402', 'C', NULL, 'Expected Guest', '2022-12-01 14:48:32', '2022-12-01 14:56:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblguest`
--
ALTER TABLE `tblguest`
  ADD KEY `tblguest_ibfk_1` (`ID`);

--
-- Indexes for table `tblmember`
--
ALTER TABLE `tblmember`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblmember`
--
ALTER TABLE `tblmember`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblguest`
--
ALTER TABLE `tblguest`
  ADD CONSTRAINT `tblguest_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `tblvisitor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
