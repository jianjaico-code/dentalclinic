-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 09:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lourdesclinicdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fs_inv`
--

CREATE TABLE `fs_inv` (
  `EntryID` int(11) NOT NULL,
  `Quantity` double(15,4) DEFAULT 0.0000,
  `Cost` double(15,4) DEFAULT 0.0000,
  `FinalAmount` double(15,4) DEFAULT 0.0000,
  `AccountingType` varchar(30) DEFAULT '-' COMMENT 'GR = Goods Receive; INV = Invoicing;',
  `EmployeeID` int(11) DEFAULT NULL,
  `xTimestamp` timestamp NULL DEFAULT current_timestamp(),
  `MaterialID` int(11) DEFAULT NULL,
  `ControlNumber` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fs_inv`
--

INSERT INTO `fs_inv` (`EntryID`, `Quantity`, `Cost`, `FinalAmount`, `AccountingType`, `EmployeeID`, `xTimestamp`, `MaterialID`, `ControlNumber`) VALUES
(1, 999.0000, 13.0000, 12987.0000, 'GR', 1, '2022-01-03 23:21:19', 1, 'GR20220104002119'),
(2, 1.0000, 15.0000, 15.0000, 'INV', 1, '2022-01-05 08:44:07', 1, 'INV20220105094356'),
(3, 5.0000, 15.0000, 75.0000, 'INV', 1, '2022-01-05 08:44:51', 1, 'INV20220105094445');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `TempCartID` int(11) NOT NULL,
  `InvoiceNumber` varchar(30) DEFAULT NULL,
  `MaterialID` int(11) DEFAULT NULL,
  `Quantity` double(15,4) DEFAULT 0.0000,
  `Price` double(15,4) DEFAULT 0.0000,
  `FinalAmount` double(15,4) DEFAULT 0.0000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbldental_examination_summary`
--

CREATE TABLE `tbldental_examination_summary` (
  `DentalExamID` int(11) NOT NULL,
  `PatientNumber` varchar(30) DEFAULT NULL,
  `DateExamined` date DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `Dentist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldental_examination_summary`
--

INSERT INTO `tbldental_examination_summary` (`DentalExamID`, `PatientNumber`, `DateExamined`, `Description`, `Remarks`, `Dentist`) VALUES
(2, '1641349432125', '2022-01-05', 'Good ', 'Good', 'Dr. Jian Jaico');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Middlename` varchar(30) DEFAULT NULL,
  `Lastname` varchar(30) DEFAULT NULL,
  `EmployeeType` varchar(30) DEFAULT NULL,
  `BasePay` double(15,4) DEFAULT 0.0000,
  `Position` varchar(100) DEFAULT 'Staff',
  `Address` varchar(100) DEFAULT NULL,
  `EmployeeIDNo` varchar(100) DEFAULT NULL,
  `Birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`EmployeeID`, `Name`, `Middlename`, `Lastname`, `EmployeeType`, `BasePay`, `Position`, `Address`, `EmployeeIDNo`, `Birthday`) VALUES
(1, 'Jian Jaico', 'Manoop', 'Cajita', 'Regular', 10000.0000, 'Administrator', 'Blk 29 - Lot 12, NHA, Phase 2, Kauswagan, Cagayan de Oro City, Mis Or', '20150464437', '1999-04-12'),
(3, 'JR', 'Maks', 'Makiling', 'Regular', 200.0000, 'Administrator', 'asdfsadfasdf asdf', '20150464438', '1998-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `tblmaterials`
--

CREATE TABLE `tblmaterials` (
  `MaterialID` int(11) NOT NULL,
  `MaterialCode` varchar(30) DEFAULT NULL,
  `MaterialDescription` varchar(100) DEFAULT NULL,
  `price` double(15,4) DEFAULT 0.0000,
  `soh` double(15,4) DEFAULT 0.0000,
  `maxstock` double(15,4) DEFAULT 0.0000,
  `isActive` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmaterials`
--

INSERT INTO `tblmaterials` (`MaterialID`, `MaterialCode`, `MaterialDescription`, `price`, `soh`, `maxstock`, `isActive`) VALUES
(1, 'BIOFLU-001', 'BioFlu', 15.0000, 993.0000, 999.0000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedical_examination_details`
--

CREATE TABLE `tblmedical_examination_details` (
  `MedicalExaminationDetailID` int(11) NOT NULL,
  `MedicalExamID` int(11) NOT NULL,
  `BloodType` varchar(30) DEFAULT NULL,
  `allergies` varchar(100) DEFAULT NULL,
  `asthma` tinyint(4) DEFAULT NULL,
  `kidneyInfection` tinyint(4) DEFAULT NULL,
  `UTI` tinyint(4) DEFAULT NULL,
  `heartDisease` tinyint(4) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `MedFever` varchar(100) DEFAULT NULL,
  `MedCough` varchar(100) DEFAULT NULL,
  `MedStomachAche` varchar(100) DEFAULT NULL,
  `MedColds` varchar(100) DEFAULT NULL,
  `OtherIllness` varchar(100) DEFAULT NULL,
  `Maintenance` varchar(100) DEFAULT NULL,
  `Complains` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmedical_examination_details`
--

INSERT INTO `tblmedical_examination_details` (`MedicalExaminationDetailID`, `MedicalExamID`, `BloodType`, `allergies`, `asthma`, `kidneyInfection`, `UTI`, `heartDisease`, `others`, `MedFever`, `MedCough`, `MedStomachAche`, `MedColds`, `OtherIllness`, `Maintenance`, `Complains`) VALUES
(2, 2, 'B+', 'None', 0, 0, 0, 1, 'None', 'Bioflu', 'Bioflu', 'Bioflu', 'Bioflu', 'None', 'None', 'Headache');

-- --------------------------------------------------------

--
-- Table structure for table `tblmedical_examination_summary`
--

CREATE TABLE `tblmedical_examination_summary` (
  `MedicalExamID` int(11) NOT NULL,
  `PatientNumber` varchar(30) DEFAULT NULL,
  `DateExamined` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmedical_examination_summary`
--

INSERT INTO `tblmedical_examination_summary` (`MedicalExamID`, `PatientNumber`, `DateExamined`) VALUES
(2, '1641349432125', '2022-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `MenuID` int(11) NOT NULL,
  `Description` varchar(30) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 1,
  `icon` varchar(30) DEFAULT NULL,
  `isPatient` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`MenuID`, `Description`, `action`, `isActive`, `icon`, `isPatient`) VALUES
(2, 'Patients', 'load_patients()', 1, 'people', 0),
(3, 'Medical Records', 'load_med_rec()', 1, 'folder', 1),
(4, 'Inventory', 'load_inventory()', 1, 'inventory', 0),
(5, 'Admin Settings', 'load_admin()', 1, 'admin_panel_settings', 0),
(6, 'Point of Sales', 'load_pos()', 1, 'point_of_sales', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `PatientID` int(11) NOT NULL,
  `PatientNumber` varchar(30) DEFAULT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `MiddleName` varchar(30) DEFAULT NULL,
  `Lastname` varchar(30) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `PatientType` varchar(30) DEFAULT 'Student',
  `Address` varchar(100) DEFAULT NULL,
  `xTimestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`PatientID`, `PatientNumber`, `FirstName`, `MiddleName`, `Lastname`, `Birthday`, `PatientType`, `Address`, `xTimestamp`) VALUES
(2, '1641349432125', 'Jian Jaico', 'Manoop', 'Cajita', '1998-04-12', 'Student', 'Blk 29 - Lot 12, NHA, Phase 2, Kauswagan, Cagayan de Oro City, Mis Or', '2022-01-05 02:24:15'),
(3, '1641350834296', 'Hazel Mier', 'Fajardo', 'Villamor', '2000-09-24', 'Student', 'Blk 29 Lot 12 NHA Phase 2 Kauswagan', '2022-01-05 02:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `UserID` int(11) NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `UserName` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `UserType` varchar(30) DEFAULT 'Regular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`UserID`, `EmployeeID`, `UserName`, `Password`, `UserType`) VALUES
(1, 1, 'jianjaico', 'jianjaico', 'Administrator'),
(2, 3, 'jrmaks', '12345', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `_tblpos_detail`
--

CREATE TABLE `_tblpos_detail` (
  `posDetailID` int(11) NOT NULL,
  `ORNumber` varchar(30) DEFAULT NULL,
  `MaterialID` int(11) DEFAULT NULL,
  `Price` double(15,4) DEFAULT 0.0000,
  `Quantity` double(15,4) DEFAULT 0.0000,
  `FinalAmount` double(15,4) DEFAULT 0.0000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_tblpos_detail`
--

INSERT INTO `_tblpos_detail` (`posDetailID`, `ORNumber`, `MaterialID`, `Price`, `Quantity`, `FinalAmount`) VALUES
(1, 'OR20220105094407', 1, 15.0000, 1.0000, 15.0000),
(2, 'OR20220105094450', 1, 15.0000, 5.0000, 75.0000);

-- --------------------------------------------------------

--
-- Table structure for table `_tblpos_summary`
--

CREATE TABLE `_tblpos_summary` (
  `posID` int(11) NOT NULL,
  `ORNumber` varchar(30) DEFAULT NULL,
  `xTimeStamp` timestamp NULL DEFAULT current_timestamp(),
  `EmployeeID` int(11) DEFAULT NULL,
  `InvoiceNumber` varchar(30) DEFAULT NULL,
  `AmountPaid` double(15,4) DEFAULT 0.0000,
  `AmountChange` double(15,4) DEFAULT 0.0000,
  `Remarks` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_tblpos_summary`
--

INSERT INTO `_tblpos_summary` (`posID`, `ORNumber`, `xTimeStamp`, `EmployeeID`, `InvoiceNumber`, `AmountPaid`, `AmountChange`, `Remarks`) VALUES
(1, 'OR20220105094407', '2022-01-05 08:44:07', 1, 'INV20220105094356', 15.0000, 0.0000, 'good'),
(2, 'OR20220105094450', '2022-01-05 08:44:50', 1, 'INV20220105094445', 100.0000, 25.0000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fs_inv`
--
ALTER TABLE `fs_inv`
  ADD PRIMARY KEY (`EntryID`),
  ADD KEY `fs_inv_FK` (`EmployeeID`) USING BTREE,
  ADD KEY `fs_inv_FK_1` (`MaterialID`) USING BTREE;

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`TempCartID`),
  ADD KEY `tblcart_FK` (`MaterialID`) USING BTREE;

--
-- Indexes for table `tbldental_examination_summary`
--
ALTER TABLE `tbldental_examination_summary`
  ADD PRIMARY KEY (`DentalExamID`),
  ADD KEY `tbldental_examination_summary_FK` (`PatientNumber`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `tblmaterials`
--
ALTER TABLE `tblmaterials`
  ADD PRIMARY KEY (`MaterialID`);

--
-- Indexes for table `tblmedical_examination_details`
--
ALTER TABLE `tblmedical_examination_details`
  ADD PRIMARY KEY (`MedicalExaminationDetailID`),
  ADD KEY `tblmedical_examination_details_FK` (`MedicalExamID`);

--
-- Indexes for table `tblmedical_examination_summary`
--
ALTER TABLE `tblmedical_examination_summary`
  ADD PRIMARY KEY (`MedicalExamID`),
  ADD KEY `tblmedical_examination_summary_FK` (`PatientNumber`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`PatientID`),
  ADD UNIQUE KEY `tblpatient_un` (`PatientNumber`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `tbluseraccount_un` (`EmployeeID`);

--
-- Indexes for table `_tblpos_detail`
--
ALTER TABLE `_tblpos_detail`
  ADD PRIMARY KEY (`posDetailID`),
  ADD KEY `_tblpos_detail_FK` (`ORNumber`) USING BTREE;

--
-- Indexes for table `_tblpos_summary`
--
ALTER TABLE `_tblpos_summary`
  ADD PRIMARY KEY (`posID`),
  ADD UNIQUE KEY `_tblpos_summary_un` (`ORNumber`),
  ADD KEY `_tblpos_summary_FK` (`EmployeeID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fs_inv`
--
ALTER TABLE `fs_inv`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `TempCartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbldental_examination_summary`
--
ALTER TABLE `tbldental_examination_summary`
  MODIFY `DentalExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblmaterials`
--
ALTER TABLE `tblmaterials`
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblmedical_examination_details`
--
ALTER TABLE `tblmedical_examination_details`
  MODIFY `MedicalExaminationDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmedical_examination_summary`
--
ALTER TABLE `tblmedical_examination_summary`
  MODIFY `MedicalExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `_tblpos_detail`
--
ALTER TABLE `_tblpos_detail`
  MODIFY `posDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `_tblpos_summary`
--
ALTER TABLE `_tblpos_summary`
  MODIFY `posID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldental_examination_summary`
--
ALTER TABLE `tbldental_examination_summary`
  ADD CONSTRAINT `tbldental_examination_summary_FK` FOREIGN KEY (`PatientNumber`) REFERENCES `tblpatient` (`PatientNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `tblmedical_examination_details`
--
ALTER TABLE `tblmedical_examination_details`
  ADD CONSTRAINT `tblmedical_examination_details_FK` FOREIGN KEY (`MedicalExamID`) REFERENCES `tblmedical_examination_summary` (`MedicalExamID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblmedical_examination_summary`
--
ALTER TABLE `tblmedical_examination_summary`
  ADD CONSTRAINT `tblmedical_examination_summary_FK` FOREIGN KEY (`PatientNumber`) REFERENCES `tblpatient` (`PatientNumber`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
