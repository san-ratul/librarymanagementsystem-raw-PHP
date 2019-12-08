-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 05:56 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` varchar(20) NOT NULL,
  `aName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aName`, `email`, `password`, `phoneNumber`) VALUES
('100001', 'Md Kabir Shikdar', 'kabir.library@diu.edu.bd', '874d808f72bb6c4a0d9470ca0b23bef4', '01714230619'),
('100002', 'Md Rasel Kabir', 'rasel.library@diu.edu.bd', '5aeba19d373c72ec68e5252c2fe45628', '01714230620'),
('100003', 'Md Shafiq Ahamed', 'ahmed.libray@diu.edu.bd', '42b9f82ec67086bad757ce7230c137fd', '01714230621'),
('100004', 'Md Faruk Kabir', 'faruk.lib@diu.edu.bd', '03d58a42db5206cc06dc5ade71f92611', '01621482565'),
('100005', 'Md. Ratul Hasan', 'ratul@gmail.com', '599437e47e0f8fa834b39a5a48fb2019', '01537113434');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `authorname` varchar(150) NOT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `reserved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `bname`, `authorname`, `edition`, `price`, `reserved`) VALUES
(1, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 1),
(2, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(3, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(4, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(5, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(6, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(7, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 1),
(8, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(9, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(10, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(11, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(12, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 1),
(13, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(14, 'Data Communications and Networking', 'Behrouza A Forouzan', '4th edition', 600, 0),
(15, 'Data Communications and Networking', 'Behrouza A Forouzan', '5th edition', 600, 0),
(16, 'Data Communications and Networking', 'Behrouza A Forouzan', '5th edition', 600, 0),
(17, 'Data Communications and Networking', 'Behrouza A Forouzan', '5th edition', 600, 0),
(18, 'Data Communications and Networking', 'Behrouza A Forouzan', '6th edition', 600, 0),
(19, 'Data Communications and Networking', 'Behrouza A Forouzan', '6th edition', 600, 0),
(20, 'Data Communications and Networking', 'Behrouza A Forouzan', '6th edition', 600, 0),
(21, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(22, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(23, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(24, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(25, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(26, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(27, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(28, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(29, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(30, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(31, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(32, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(33, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(34, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(35, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 1),
(36, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(37, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(38, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(39, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(40, 'Word Smart I & II', 'Adam Robinson and The Staff Of The Princeton Review', NULL, 400, 0),
(41, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(42, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(43, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(44, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(45, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(46, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(47, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(48, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(49, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(50, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(51, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(52, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(53, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(54, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(55, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(56, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(57, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(58, 'Professional C Programming Volume 3 Beginning of Recursion', 'Muhammad Ashraf-ul Asad', NULL, 400, 0),
(59, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '1st Edition', 350, 0),
(60, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 0),
(61, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 0),
(62, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 0),
(63, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 0),
(64, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 0),
(65, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 0),
(66, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 0),
(67, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 0),
(68, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '3rd Edition', 350, 0),
(69, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '3rd Edition', 350, 0),
(70, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '3rd Edition', 350, 0),
(71, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '2nd Edition', 350, 1),
(72, 'Apache-MySQL-PHP Shohozpath', 'Suhrid Sharkar', '3rd Edition', 350, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parentdetails`
--

CREATE TABLE `parentdetails` (
  `pid` varchar(20) NOT NULL,
  `fatherName` varchar(100) DEFAULT NULL,
  `motherName` varchar(100) DEFAULT NULL,
  `fatherMobileNumber` varchar(20) DEFAULT NULL,
  `motherMobileNumber` varchar(20) DEFAULT NULL,
  `fatherOccupation` varchar(30) DEFAULT NULL,
  `motherOccupation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parentdetails`
--

INSERT INTO `parentdetails` (`pid`, `fatherName`, `motherName`, `fatherMobileNumber`, `motherMobileNumber`, `fatherOccupation`, `motherOccupation`) VALUES
('153-15-586', 'Md. Al-Amin Kiron', 'Most. Salma Amin', '01629819048', '01553019909', 'Business Man', 'Home Maker'),
('161-15-7260', NULL, NULL, NULL, NULL, NULL, NULL),
('161-15-7354', NULL, NULL, NULL, NULL, NULL, NULL),
('161-15-847', NULL, NULL, NULL, NULL, NULL, NULL),
('161-15-849', NULL, NULL, NULL, NULL, 'CIvil Service', 'Home Maker'),
('161-15-865', NULL, NULL, NULL, NULL, NULL, NULL),
('163-15-1108', NULL, NULL, NULL, NULL, NULL, NULL),
('181-15-555', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservedbooks`
--

CREATE TABLE `reservedbooks` (
  `id` int(11) NOT NULL,
  `studentId` varchar(20) DEFAULT NULL,
  `bookId` int(11) DEFAULT NULL,
  `reservationDate` varchar(50) DEFAULT NULL,
  `returnDate` varchar(50) DEFAULT NULL,
  `returnedBook` int(11) NOT NULL DEFAULT '0',
  `renewBook` int(11) NOT NULL DEFAULT '0',
  `due` int(11) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `paidAmount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservedbooks`
--

INSERT INTO `reservedbooks` (`id`, `studentId`, `bookId`, `reservationDate`, `returnDate`, `returnedBook`, `renewBook`, `due`, `paid`, `paidAmount`) VALUES
(1, '153-15-586', 1, '2018/08/13', '2018/09/09', 0, 1, 180, 0, 180),
(2, '161-15-847', 35, '2018/08/13', '2018/08/31', 0, 0, 180, 0, 0),
(3, '153-15-586', 4, '2018/08/07', '2018/08/14', 1, 0, 0, 1, 0),
(4, '153-15-586', 71, '2018/08/18', '2018/08/26', 0, 0, 280, 0, 0),
(5, '153-15-586', 7, '2018/09/02', '2018/09/08', 0, 0, 20, 0, 0),
(6, '161-15-849', 12, '2018/09/02', '2018/09/08', 0, 0, 20, 0, 20),
(7, '161-15-847', 3, '2018/09/02', '2018/09/26', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(20) NOT NULL,
  `sName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `due` float NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sName`, `email`, `password`, `phoneNumber`, `due`, `active`) VALUES
('153-15-586', 'Saleh Ahammed Noor', 'saleh15-586@diu.edu.bd', '14742df7ba398dc3e0908182ef3097db', '01621482563', 300, 1),
('161-15-7260', 'Kamrul Hasan Shemul', 'kamrul15-7260@diu.edu.bd', 'd61a81807c00cb45197f3ca4c8eca293', '01712740461', 0, 0),
('161-15-7354', 'Shah Alom Mondal', 'alom15-7354@diu.edu.bd', '37de650bb612bf7291c35eb3eab09b79', '01683372899', 0, 0),
('161-15-847', 'Mahimul Islam Nadim', 'nadim15-847@diu.edu.bd', '5003a6e04e90947f3d6c9875ba2eea42', '01714230622', 180, 1),
('161-15-849', 'Mahedy Hasan', 'mahedy15-849@diu.edu.bd', '91ec7e851774bf7b5fccfe180be55637', '01798173317', 0, 1),
('161-15-865', 'Faruk Ahamed', 'faruk15-865@diu.edu.bd', '03d58a42db5206cc06dc5ade71f92611', '01757710256', 0, 0),
('163-15-1108', 'Sadia Tanzin Neela', 'sadia15-1108@diu.edu.bd', '99b017f591a900c11e3efb5016094fab', '01636945033', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `parentdetails`
--
ALTER TABLE `parentdetails`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reservedbooks`
--
ALTER TABLE `reservedbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `reservedbooks`
--
ALTER TABLE `reservedbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservedbooks`
--
ALTER TABLE `reservedbooks`
  ADD CONSTRAINT `reservedbooks_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`sid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservedbooks_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `books` (`bid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
