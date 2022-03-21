-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2022 at 12:21 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aet_hall_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditorium`
--

DROP TABLE IF EXISTS `auditorium`;
CREATE TABLE IF NOT EXISTS `auditorium` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ccode` int NOT NULL,
  `name_auditorium` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `auditorium`
--

INSERT INTO `auditorium` (`id`, `ccode`, `name_auditorium`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 'AET AUDITORIUM', '0', 1, '2022-03-16 13:51:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
CREATE TABLE IF NOT EXISTS `booking_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auditorium` int NOT NULL,
  `ccode` int NOT NULL,
  `dcode` int NOT NULL,
  `date` date NOT NULL,
  `timing` varchar(255) NOT NULL,
  `event_info` longtext NOT NULL,
  `invitation` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booking_by` varchar(255) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `approve_status` enum('Approve','Pending','Cancelled','Postponed') NOT NULL DEFAULT 'Pending',
  `remark` longtext NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `approved_by` int DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `cgd` varchar(255) DEFAULT NULL,
  `nfa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `auditorium`, `ccode`, `dcode`, `date`, `timing`, `event_info`, `invitation`, `booking_by`, `contact_no`, `approve_status`, `remark`, `created_by`, `created_at`, `update_by`, `update_at`, `approved_by`, `approved_at`, `cgd`, `nfa`) VALUES
(1, 1, 2001, 101, '2022-03-18', '10:00 AM to 01:00 PM', 'Annual Day', '', 'Mr.S.Sivaraman AP/CSE/VCEW', '9090909090', 'Approve', '', 0, '2022-03-16 22:18:31', NULL, NULL, 1, '2022-03-21 04:23:11', NULL, NULL),
(2, 1, 2016, 1, '2022-03-21', '10:00', 'meeting', '', 'Ananth', '999999999', 'Pending', '', 0, '2022-03-21 04:42:31', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 2001, 101, '2022-03-22', 'FN', 'Event', '', 'Mr.R.Dhamodharan AP/CSE/VCEW', '9898989898', 'Pending', '', 0, '2022-03-21 12:13:39', NULL, NULL, NULL, NULL, 'Dr. Manimaran', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
CREATE TABLE IF NOT EXISTS `college` (
  `ccode` int NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  `short` varchar(20) NOT NULL,
  PRIMARY KEY (`ccode`)
) ENGINE=MyISAM AUTO_INCREMENT=2022 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`ccode`, `cname`, `short`) VALUES
(2001, 'Vivekanandha College of Engineering for Women', 'VCEW'),
(2003, 'Vivekanandha College of Technology for Women', 'VCTW'),
(2004, 'Vivekanandha College of Arts and Sciences for Women', 'VICAS'),
(2005, 'Vivekanandha College for Women', 'VCW'),
(2006, 'Vivekanandha Nursing College', 'VNC'),
(2007, 'Swamy Vivekanandha College of Pharmacy', 'SVCP'),
(2008, 'Vivekanandha College of Nursing', 'VCN'),
(2009, 'Vivekanandha Vidya Bhavan matric hr.sec.School', 'VVBS'),
(2010, 'Vivekanandha Institute of Information and Management studies', 'VIIMS'),
(2011, 'Vivekanandha Pharmacy College for Women', 'VPCW'),
(2012, 'Vivekanandha College of Education for Women', 'V.C.Ed'),
(2013, 'Krishna College of Education for Women', 'K.C.Ed'),
(2014, 'Krishnasree College of Education for Women', 'KS.C.Ed'),
(2015, 'Vivekanandha Dental College for Women', 'VDCW'),
(2016, 'Vivekanandha Allied Health Science', 'AHS'),
(2017, 'Vivekanandha Arts and Science for Women', 'VASW'),
(2018, 'Rabindranath Tagore College of Education for women', 'RTCEd'),
(2019, 'Viswa Bharathi College of Education for Women', 'VBCEd'),
(2020, 'Vivekanandha Medical Care Hospital', 'VMCH'),
(2021, 'Angammal Educational Trust', 'AET');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `ccode` int NOT NULL,
  `dcode` varchar(20) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `short` varchar(20) NOT NULL,
  PRIMARY KEY (`ccode`,`dcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ccode`, `dcode`, `branch`, `short`) VALUES
(2001, '101', 'Computer Science and Engineering', 'CSE'),
(2001, '102', 'Electrical and Electronics Engineering', 'EEE'),
(2001, '103', 'Electonics and Communication Engineering', 'ECE'),
(2001, '104', 'Information Technology', 'IT'),
(2001, '105', 'Biotechnology', 'BT'),
(2001, '106', 'Physics', 'PHY'),
(2001, '107', 'Chemistry', 'CHE'),
(2001, '108', 'Mathematics', 'MATH'),
(2001, '109', 'English', 'ENG'),
(2001, '110', 'Mechanical', 'MECH'),
(2001, '111', 'Master of Business Administration', 'MBA'),
(2002, '112', 'Computer Science and Engineering', 'CSE'),
(2002, '113', 'Electrical and Electronics Engineering', 'EEE'),
(2002, '114', 'Electonics and Communication Engineering', 'ECE'),
(2002, '115', 'Information Technology', 'IT'),
(2002, '116', 'Physics', 'PHY'),
(2002, '117', 'Chemistry', 'CHE'),
(2002, '118', 'Mathematics', 'MATH'),
(2002, '119', 'English', 'ENG'),
(2002, '120', 'Mechanical', 'MECH'),
(2003, '121', 'Computer Science and Engineering', 'CSE'),
(2003, '122', 'Electrical and Electronics Engineering', 'EEE'),
(2003, '123', 'Electonics and Communication Engineering', 'ECE'),
(2003, '124', 'Information Technology', 'IT'),
(2003, '125', 'Civil Engineering', 'CIVIL'),
(2003, '126', 'Physics', 'PHY'),
(2003, '127', 'Chemistry', 'CHE'),
(2003, '128', 'Mathematics', 'MATH'),
(2003, '129', 'English', 'ENG'),
(2003, '130', 'Mechanical', 'MECH'),
(2004, '131', 'Computer Science', 'CSE'),
(2004, '132', 'Computer Application', 'CA'),
(2004, '133', 'Computer Technology', 'CT'),
(2004, '134', 'Information Technology', 'IT'),
(2004, '135', 'Microbiology', 'MB'),
(2004, '136', 'Bio-Technology', 'BT'),
(2004, '137', 'Bio-Chemistry', 'BC'),
(2004, '138', 'Mathematics', 'MATH'),
(2004, '139', 'Mathematics(Actuarial Science)', 'MATH(AS)'),
(2004, '140', 'Physics', 'PHY'),
(2004, '141', 'Chemistry', 'CHE'),
(2004, '142', 'Botany', 'BY'),
(2004, '143', 'Zoology', 'ZY'),
(2004, '144', 'Textile & Fashion Design', 'TFD'),
(2004, '145', 'Costume Design & Fashion', 'CDF'),
(2004, '146', 'Applied Microbiology', 'AM'),
(2005, '147', 'Computer Science', 'CS'),
(2005, '148', 'Computer Application', 'CA'),
(2005, '149', 'Microbiology', 'MB'),
(2005, '150', 'Bio-Technology', 'BT'),
(2005, '151', 'Bio-Chemistry', 'BC'),
(2005, '152', 'Mathematics', 'MATH'),
(2005, '153', 'Mathematics(Actuarial Science)', 'MATH(AS)'),
(2005, '154', 'Physics', 'PHY'),
(2005, '155', 'Chemistry', 'CHE'),
(2005, '156', 'Textile & Fashion Design', 'TFD'),
(2005, '157', 'Costume Design & Fashion', 'CDF'),
(2005, '158', 'Applied Microbiology', 'AM'),
(2001, '159', 'Principal Office', 'PO'),
(2001, '160', 'COE Office', 'COE'),
(2001, '161', 'Exam Cell', 'EC'),
(2001, '162', 'Library', 'LB'),
(2001, '163', 'Physical Director', 'PD'),
(2001, '164', 'IQAC', 'IQ'),
(2002, '165', 'Principal Office', 'PO'),
(2002, '166', 'COE Office', 'COE'),
(2002, '167', 'Exam Cell', 'EC'),
(2002, '168', 'Library', 'LB'),
(2002, '169', 'Physical Director', 'PD'),
(2002, '170', 'IQAC', 'IQ'),
(2003, '171', 'Principal Office', 'PO'),
(2003, '172', 'COE Office', 'COE'),
(2003, '173', 'Exam Cell', 'EC'),
(2003, '174', 'Library', 'LB'),
(2003, '175', 'Physical Director', 'PD'),
(2003, '176', 'IQAC', 'IQ'),
(2004, '177', 'Principal Office', 'PO'),
(2004, '178', 'COE Office', 'COE'),
(2004, '179', 'Exam Cell', 'EC'),
(2004, '180', 'Library', 'LB'),
(2004, '181', 'Physical Director', 'PD'),
(2004, '182', 'IQAC', 'IQ'),
(2005, '183', 'Principal Office', 'PO'),
(2005, '184', 'COE Office', 'COE'),
(2005, '185', 'Exam Cell', 'EC'),
(2005, '186', 'Library', 'LB'),
(2005, '187', 'Physical Director', 'PD'),
(2005, '188', 'IQAC', 'IQ'),
(2006, '189', 'Principal Office', 'PO'),
(2006, '190', 'COE Office', 'COE'),
(2006, '191', 'Exam Cell', 'EC'),
(2006, '192', 'Library', 'LB'),
(2006, '193', 'Physical Director', 'PD'),
(2006, '194', 'IQAC', 'IQ'),
(2001, '195', 'MCA', 'MCA'),
(2002, '196', 'MCA', 'MCA'),
(2003, '197', 'MCA', 'MCA'),
(2004, '198', 'MCA', 'MCA'),
(2005, '199', 'MCA', 'MCA'),
(2003, '200', 'E&I', 'EI'),
(2001, '201', 'Maintenance', 'MA'),
(2001, '202', 'Accounts', 'AC'),
(2002, '203', 'Maintenance', 'MA'),
(2002, '204', 'Accounts', 'AC'),
(2003, '205', 'Maintenance', 'MA'),
(2003, '206', 'Accounts', 'AC'),
(2004, '207', 'Maintenance', 'MA'),
(2004, '208', 'Accounts', 'AC'),
(2005, '209', 'Maintenance', 'MA'),
(2005, '210', 'Accounts', 'AC'),
(2006, '211', 'Maintenance', 'MA'),
(2006, '212', 'Accounts', 'AC'),
(2001, '213', 'Applied Science', 'AS'),
(2001, '214', 'E&I', 'EI'),
(2004, '215', 'English', 'ENG'),
(2004, '216', 'Commerce', 'COM'),
(2005, '217', 'English', 'ENG'),
(2005, '218', 'Commerce', 'COM'),
(2007, '219', 'Pharmaceutics', 'Pharm'),
(2007, '220', 'Doctor of Pharmacy', 'DOC.PHARM'),
(2007, '221', 'Pharmacology', 'PHARMCOLOGY'),
(2007, '222', 'Pharmaceutical Analysis', 'PA'),
(2007, '223', 'Pharmaceutical Chemistry', 'PC'),
(2007, '224', 'Pharmacognosy', 'PHARMCOG'),
(2007, '225', 'Principal Office', 'PO'),
(2007, '226', 'COE office', 'COE'),
(2007, '227', 'Exam cell', 'EC'),
(2007, '228', 'Library', 'LB'),
(2007, '229', 'Physical director', 'PD'),
(2007, '230', 'Maintenance', 'MA'),
(2007, '231', 'Accounts', 'ACC'),
(2008, '232', 'Principal office', 'PO'),
(2008, '233', 'COE office', 'COE'),
(2008, '234', 'Exam cell', 'EC'),
(2008, '235', 'Library', 'LB'),
(2008, '236', 'Physical director', 'PD'),
(2008, '237', 'Maintenance', 'MA'),
(2008, '238', 'Accounts', 'ACC'),
(2008, '239', 'Bsc nursing', 'Bsc'),
(2008, '240', 'Msc.Nursing', 'Msc'),
(2008, '241', 'P.B.B.Sc.Nursing', 'Bsc'),
(2008, '242', 'Diploma in general nursing and midwifery', 'DGNM'),
(2008, '243', 'ANM', 'ANM'),
(2010, '244', 'Principal Office', 'PO'),
(2010, '245', 'COE office', 'COE'),
(2010, '246', 'Exam cell', 'EC'),
(2010, '247', 'Library', 'LB'),
(2010, '248', 'Physical Director', 'PD'),
(2010, '249', 'Maintenance', 'MA'),
(2010, '250', 'Accounts', 'ACC'),
(2010, '251', 'MBA', 'MBA'),
(2010, '252', 'MCA', 'MCA'),
(2010, '253', 'IQAC', 'IQAC'),
(2011, '254', 'Principal office', 'PO'),
(2011, '255', 'COE office', 'COE'),
(2011, '256', 'Exam cell', 'EC'),
(2011, '257', 'Library', 'LB'),
(2011, '258', 'Physical Director', 'PD'),
(2011, '259', 'Maintenance', 'MA'),
(2011, '260', 'Accounts', 'ACC'),
(2011, '261', 'Pharmaceutical Chemistry', 'PC'),
(2011, '262', 'Pharmaceutical Analysis', 'PA'),
(2011, '263', 'Pharmaceutics', 'Pharm'),
(2011, '264', 'Pharmacology', 'Pharmacology'),
(2011, '265', 'Pharmacognosy', 'Pharmacognosy'),
(2012, '266', 'Principal office', 'PO'),
(2012, '267', 'COE office', 'COE'),
(2012, '268', 'Exam Cell', 'EC'),
(2012, '269', 'Library', 'LB'),
(2012, '270', 'Physical director', 'PD'),
(2012, '271', 'Maintenance', 'MA'),
(2012, '272', 'Accounts', 'ACC'),
(2012, '273', 'Economy', 'EC'),
(2012, '274', 'Geography', 'GEO'),
(2012, '275', 'History', 'HIS'),
(2012, '276', 'Education', 'EDU'),
(2013, '277', 'Principal office', 'PO'),
(2013, '278', 'COE office', 'COE'),
(2013, '279', 'Exam cell', 'EC'),
(2013, '280', 'Library', 'LIB'),
(2013, '281', 'Physical director', 'PD'),
(2013, '282', 'Maintenance', 'MA'),
(2013, '283', 'Accounts', 'ACC'),
(2013, '284', 'History', 'HIS'),
(2013, '285', 'Zoology', 'ZOO'),
(2013, '286', 'Geography', 'GEO'),
(2013, '287', 'Tamil', 'TAM'),
(2013, '288', 'English', 'ENG'),
(2013, '289', 'Mathematics', 'MAT'),
(2013, '290', 'Commerce', 'COMM'),
(2013, '291', 'computer Science', 'CS'),
(2013, '292', 'Physical science', 'PHY SCI'),
(2013, '293', 'Biological science', 'BIO SCI'),
(2013, '294', 'Fine arts', 'FA'),
(2013, '295', 'Performing arts', 'PA'),
(2013, '296', 'IQAC', 'IQAC'),
(2014, '297', 'Principal office', 'PO'),
(2014, '298', 'COE office', 'COE'),
(2014, '299', 'Exam cell', 'EC'),
(2014, '300', 'Library', 'LIB'),
(2014, '301', 'Physical director', 'PD'),
(2014, '302', 'Maintenance', 'MA'),
(2014, '303', 'Accounts', 'ACC'),
(2015, '304', 'Principal office', 'PO'),
(2015, '305', 'COE office', 'COE'),
(2015, '306', 'Exam cell', 'EC'),
(2015, '307', 'Library', 'LIB'),
(2015, '308', 'IQAC', 'IQAC'),
(2015, '309', 'Maintenance', 'MA'),
(2015, '310', 'Accounts', 'ACC'),
(2015, '311', 'Prosthodontics, Crown & Bridge ', 'PCB'),
(2015, '312', 'Periodontology', 'PDO'),
(2015, '313', 'Conservative Dentistry & Endodontics', 'CDE'),
(2015, '314', 'Orthodontics & Dentofacial Orthopaedics', 'ODO'),
(2015, '315', 'Public Health Dentistry', 'PHD'),
(2015, '316', 'Oral Pathology & Microbiology\r\n', 'OPM'),
(2015, '317', 'Pedodontics & Preventive Dentistry', 'PPD'),
(2015, '318', 'Oral Medicine & Radiology', 'OMR'),
(2015, '319', 'Oral & Maxillofacial Surgery', 'OMS'),
(2007, '320', 'Pharmacy practice', 'PP'),
(2011, '321', 'Pharmacy practice', 'PP'),
(2016, '322', 'Principal office', 'PO'),
(2016, '323', 'COE office', 'COE'),
(2016, '324', 'Exam Cell', 'EC'),
(2016, '325', 'Library', 'LIB'),
(2016, '326', 'Physical director', 'PD'),
(2016, '327', 'IQAC', 'IQAC'),
(2016, '328', 'Maintenance', 'MA'),
(2016, '329', 'Accounts', 'ACC'),
(2016, '330', ' Radiology & Imaging Technology', 'RIT'),
(2016, '331', 'Accident & Emergency Care Technology', 'AEC'),
(2016, '332', 'Cardiac Technology', 'CT'),
(2016, '333', 'Operation Theatre & Anesthesia Technology', 'OTA'),
(2016, '334', 'Physician Assistant', 'PA'),
(2016, '335', 'Medical Laboratory Technology', 'MLT'),
(2016, '336', 'Dialysis Technology', 'DT'),
(2016, '337', 'Optometry Technology', 'OT'),
(2017, '338', 'Principal office', 'PO'),
(2017, '339', 'COE office', 'COE'),
(2017, '340', 'Exam cell', 'EC'),
(2017, '341', 'Library', 'LIB'),
(2017, '342', 'Physical director', 'PD'),
(2017, '343', 'Maintenance', 'MA'),
(2017, '344', 'Accounts', 'ACC'),
(2017, '345', 'Computer Science & Computer Applications ', 'CS&CA'),
(2017, '346', 'Mathematics', 'MAT'),
(2017, '347', 'Physics', 'PHY'),
(2017, '348', 'Chemistry', 'CHE'),
(2017, '349', 'Bio-Chemistry', 'BIO-CHE'),
(2017, '350', 'Bio-Technology', 'Bio-Tech'),
(2017, '351', 'Micro-Biology', 'MB'),
(2017, '352', 'Nutrition & Dietetics', 'N&D'),
(2017, '353', 'Costume Design & Fashion', 'CDF'),
(2017, '354', 'Commerce', 'COMM'),
(2017, '355', 'Tamil', 'TAM'),
(2017, '356', 'English', 'ENG'),
(2018, '357', 'Principal office', 'PO'),
(2018, '358', 'COE office', 'COE'),
(2018, '359', 'Exam cell', 'EC'),
(2018, '360', 'Library', 'LIB'),
(2018, '361', 'Physical director', 'PD'),
(2018, '362', 'Maintenance', 'MA'),
(2018, '363', 'Accounts', 'ACC'),
(2018, '364', 'History', 'HIS'),
(2018, '365', 'Economics', 'ECO'),
(2018, '366', 'Tamil', 'TAM'),
(2018, '367', 'English', 'ENG'),
(2018, '368', 'Maths', 'MAT'),
(2018, '369', 'Physics', 'PHY'),
(2018, '370', 'Botany', 'BOT'),
(2018, '371', 'Computer Science', 'CS'),
(2018, '372', 'Commerce', 'COMM'),
(2018, '373', 'Fine arts', 'FA'),
(2019, '374', 'Principal office', 'PO'),
(2019, '375', 'COE office', 'COE'),
(2019, '376', 'Exam cell', 'EC'),
(2019, '377', 'Library', 'LIB'),
(2019, '378', 'Physical director', 'PD'),
(2019, '379', 'Maintenance', 'MA'),
(2019, '380', 'Accounts', 'ACC'),
(2019, '381', 'Tamil', 'TAM'),
(2019, '382', 'English', 'ENG'),
(2019, '383', 'Mathematics', 'MAT'),
(2019, '384', 'Physics', 'PHY'),
(2019, '385', 'Chemistry', 'CHE'),
(2019, '386', 'Botany', 'BOT'),
(2019, '387', 'Zoology', 'ZOO'),
(2019, '388', 'Commerce', 'COMM'),
(2019, '389', 'History', 'HIS'),
(2019, '390', 'Computer science', 'CS'),
(2021, '391', 'Record section', 'RS'),
(2021, '392', 'Transport', 'TRANS'),
(2021, '393', 'Civil', 'CIV'),
(2021, '394', 'Electrical', 'ELECTRIC'),
(2021, '395', 'Plumber', 'PLUMB'),
(2021, '396', 'Photo Studio', 'PS'),
(2021, '397', 'RO', 'RO'),
(2021, '398', 'General stores', 'GS'),
(2021, '399', 'Placement Cell', 'PLACEMENT'),
(2021, '400', 'Admission office', 'AO'),
(2004, '401', 'Tamil', 'TAM'),
(2005, '402', 'Tamil', 'TAM'),
(2014, '403', 'History', 'HIS'),
(2014, '404', 'Zoology', 'ZOO'),
(2014, '405', 'Geography', 'GEO'),
(2014, '406', 'Tamil', 'TAM'),
(2014, '407', 'English', 'ENG'),
(2014, '408', 'Mathematics', 'MAT'),
(2014, '409', 'Commerce', 'COMM'),
(2014, '410', 'Computer Science', 'CS'),
(2014, '411', 'Physical Science', 'PS'),
(2014, '412', 'Biological Science', 'BIO SCI'),
(2014, '413', 'Fine arts', 'FA'),
(2014, '414', 'Performing Arts', 'PA'),
(2012, '415', 'Tamil', 'TAM'),
(2012, '416', 'English', 'ENG'),
(2012, '417', 'Maths', 'MAT'),
(2012, '418', 'Physics', 'PHY'),
(2012, '419', 'Chemistry', 'CHE'),
(2012, '420', 'BIO-Science', 'BIOSCI'),
(2012, '421', 'Commerce', 'COMM'),
(2012, '422', 'Computer Science', 'CS'),
(2013, '423', 'Physics', 'PHY'),
(2013, '424', 'Chemistry', 'CHE'),
(2014, '425', 'Physics', 'PHY'),
(2014, '426', 'Chemistry', 'CHE'),
(2009, '427', 'Tamil', 'TAM'),
(2009, '428', 'English', 'ENG'),
(2009, '429', 'Maths', 'MAT'),
(2009, '430', 'Physics', 'PHY'),
(2009, '431', 'Chemistry', 'CHE'),
(2009, '432', 'Biology', 'BIO'),
(2009, '433', 'Computer Science', 'CS'),
(2009, '434', 'Office', 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ccode` int NOT NULL,
  `dcode` int NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `name`, `ccode`, `dcode`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Admin', '3e89ebdb49f712c7d90d1b39e348bbbf', 'Admin', 1, 1, '0', 1, '2022-03-16 17:55:33', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
