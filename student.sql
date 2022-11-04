-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 03:22 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(5) NOT NULL,
  `pn_email` varchar(50) NOT NULL,
  `batch_year` varchar(50) NOT NULL,
  `student_address` varchar(50) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `age`, `pn_email`, `batch_year`, `student_address`, `pcontact`, `photo`, `datetime`) VALUES
(51, 'Anna Mae Jorge ', 20, 'anna_mae.jorge@student.passerellesnumeriques.org', '2023', 'Dalaguete', '09234787231', '4444542022-10-29-10-30.png', '2022-10-29 02:02:30'),
(55, 'Ruby Doclara ', 21, 'rubbyjane.doclar@student.passerellesnumeriques.org', '2023', 'Leyte', '09565652894', '4444592022-10-29-10-14.png', '2022-10-29 02:10:14'),
(56, 'Allan Divino', 21, 'allan.divino@student.passerellesnumeriques.org', '2023', 'Mindanao', '09234721352', '4444512022-10-29-10-40.png', '2022-10-29 02:11:40'),
(57, 'Jovanie Dasian', 22, 'jovanie.dasian@student.passerellesnumeriques.org', '2023', 'Cebu', '09814270547', '4444522022-10-29-10-45.png', '2022-10-29 02:12:45'),
(58, 'J-Marie Cartalla', 22, 'jmarie.cartalla@student.passerellesnumeriques.org', '2023', 'Alcoy', '09814270548', '4444532022-10-29-10-10.png', '2022-10-29 02:14:10'),
(59, 'John Laurence Castil', 20, 'john_laurence.cstudent.passerellesnumeriques.org', '2023', 'Leyte', '09814270543', '4444582022-10-29-10-48.png', '2022-10-29 02:15:48'),
(62, 'Rob Wilson Caldosa', 21, 'rob.caldoza@student.passerellesnumeriques.org', '2023', 'Pasil,Cebu', '09814270542', '4444562022-10-29-10-46.png', '2022-10-29 02:20:46'),
(93, 'Aron Balais ', 20, 'aron.balais@student.passerellesnumeriques.org', '2023', 'Leyte', '09181427054', 'png2022-11-02-11-22.png', '2022-11-02 02:49:22'),
(94, 'Richel Jane Bacayan', 21, 'richel_jane.bacayan@student.passerellesnumeriques.', '2023', 'Cebu City', '09814270542', 'png2022-11-02-11-19.png', '2022-11-02 02:55:19'),
(95, 'Juspher Balangyao', 21, 'juspher.balangyao@student.passerellesnumeriques.or', '2023', 'Bohol', '09814270242', 'png2022-11-02-11-26.png', '2022-11-02 02:56:26'),
(96, 'Bebie Grace Balbeuna', 21, 'bebie_grace.balbeuna@student.passerellesnumeriques', '2023', 'Cebu', '09814270542', 'png2022-11-02-11-09.png', '2022-11-02 02:58:09'),
(97, 'Jei Ann Bayer', 21, 'jei_ann.bayer@student.passerellesnumeriques.org', '2023', 'Negros', '09181327054', 'png2022-11-02-11-11.png', '2022-11-02 03:00:11'),
(98, 'Lesly Bataluna', 21, 'lesly.bataluna@student.passerellesnumeriques.org', '2023', 'Compostela', '09114270242', 'png2022-11-02-11-32.png', '2022-11-02 03:01:32'),
(99, 'Soseit Bedoria', 21, 'soseit.bedoria@student.passerellesnumeriques.org', '2023', 'Dalageute', '09181427053', 'png2022-11-02-11-54.png', '2022-11-02 03:02:54'),
(100, 'Charebel Bejoc', 21, 'charebel.bejoc@student.passerellesnumeriques.org', '2023', 'Danao Cebu', '09814270542', 'png2022-11-02-11-32.png', '2022-11-02 03:05:32'),
(101, 'Jo-an Bernadez', 21, 'jo-an.bernadez@student.passerellesnumeriques.org', '2023', 'Davao', '09814270543', 'png2022-11-02-11-36.png', '2022-11-02 03:06:36'),
(102, 'Lorgem Bosque', 20, 'lorgem.bosque@student.passerellesnumeriques.org', '2023', 'Cebu', '09814270542', 'png2022-11-02-11-38.png', '2022-11-02 03:07:38'),
(103, 'Hannah Cagaanan', 21, 'hannah.cagaanan,@student.passerellesnumeriques.org', '2023', 'Bohol', '09181327052', 'png2022-11-02-11-32.png', '2022-11-02 03:08:32'),
(104, 'John Rey Callesa', 21, 'john_rey.callesa@student.passerellesnumeriques.org', '2023', 'Leyte', '09181227054', 'png2022-11-02-11-00.png', '2022-11-02 03:10:00'),
(105, 'Jomel Calungsod', 20, ' jomel.calungsod@student.passerellesnumeriques.org', '2023', 'Cebu', '09714270542', 'png2022-11-02-11-57.png', '2022-11-02 03:10:57'),
(106, 'John Kevin Campanill', 20, 'john_kevin.campanilla@student.passerellesnumerique', '2023', 'Bohol', '09814271242', 'png2022-11-02-11-12.png', '2022-11-02 03:12:12'),
(107, 'JeaneCardiente', 21, 'jeane.cardiente@student.passerellesnumeriques.org', '2023', 'Negros', '09181127054', 'png2022-11-02-11-07.png', '2022-11-02 03:13:07'),
(108, 'Chemuel Castillo', 21, 'chemuel.castillo@student.passerellesnumeriques.org', '2023', 'Leyte', '09181426054', 'png2022-11-02-11-16.png', '2022-11-02 03:14:16'),
(109, 'John Laurence Castil', 21, 'john_laurence.castillo@student.passerellesnumeriqu', '2023', 'Leyte', '09811270542', 'png2022-11-02-11-25.png', '2022-11-02 03:15:25'),
(110, 'Alyssa Cazarte', 21, 'alyssa.azarte@student.passerellesnumeriques.org', '2023', 'Cebu City', '09714270242', 'png2022-11-02-11-22.png', '2022-11-02 03:16:22'),
(111, 'Lorenfe Cuadero', 21, 'lorenfe.cuadero@student.passerellesnumeriques.org', '2023', 'Cebu', '09181127054', 'png2022-11-02-11-09.png', '2022-11-02 03:20:09'),
(112, 'Jovanie Dasian', 21, 'Jovanie Dasian@student.passerellesnumeriques.org', '2023', 'Cebu', '09714270542', 'png2022-11-02-11-04.png', '2022-11-02 03:21:04'),
(115, 'Junnalyn Doning', 23, 'junnalyn.doning@student.passerellesnumeriques.org', '2023', 'Mindanao', '09215270542', 'png2022-11-02-11-26.png', '2022-11-02 03:23:26'),
(116, 'Mary Grace Elias', 21, 'mary _grace.elias@student.passerellesnumeriques.or', '2023', 'Leyte', '09814270547', 'png2022-11-02-11-48.png', '2022-11-02 05:35:48'),
(117, 'Via Enopia', 21, 'via.enopia@student.passerellesnumeriques.org', '2023', 'Cebu', '09813270544', 'png2022-11-02-11-00.png', '2022-11-02 05:40:00'),
(118, 'Julecenio Estorco', 21, 'julecenio.estorco@student.passerellesnumeriques.or', '2023', 'Negros', '09914270544', 'png2022-11-02-11-24.png', '2022-11-02 05:41:24'),
(119, 'Hadrian Evarola', 20, 'hadrian.evarola@student.passerellesnumeriques.org', '2023', 'Cebu', '09814270542', 'png2022-11-02-11-03.png', '2022-11-02 05:43:03'),
(120, 'Janrae Fagaragan', 21, 'janrae.fagaragan@student.passerellesnumeriques.org', '2023', 'Leyte', '09814270548', 'png2022-11-02-11-45.png', '2022-11-02 05:44:45'),
(121, 'Maria Elena Fuentes', 21, 'maria_elena.fuentes@student.passerellesnumeriques.', '2023', 'Cebu', '09814270544', 'png2022-11-02-11-50.png', '2022-11-02 05:52:50'),
(122, 'Mark Steven Geraga', 21, 'mark _steven.geraga@student.passerellesnumeriques.', '2023', 'Leyte', '09814270544', 'png2022-11-02-11-21.png', '2022-11-02 05:54:21'),
(123, 'Jordan Jorolan', 21, ' jordan.jorolann@student.passerellesnumeriques.org', '2023', 'Cebu', '09714270544', 'png2022-11-02-11-33.png', '2022-11-02 05:55:33'),
(124, 'Thriezia Mae Lebosad', 21, 'thriezia_mae.lebosada@student.passerellesnumerique', '2023', 'Malabuyoc ', '09813270544', 'png2022-11-02-11-58.png', '2022-11-02 05:58:58'),
(125, 'Michelle Maglapus', 21, 'michelle.maglapus@student.passerellesnumeriques.or', '2023', 'medlelin', '09813271544', 'png2022-11-02-11-40.png', '2022-11-02 06:02:40'),
(126, 'Cristina Mangapuro', 21, 'cristina.mangapuro@student.passerellesnumeriques.o', '2023', 'Leyte', '01814290550', 'png2022-11-02-11-55.png', '2022-11-02 06:06:55'),
(127, 'Jan Nino Baoc', 20, 'jan_nino.baoc@student.passerellesnumeriques.org', '2023', 'Bantayan', '09503803215', 'png2022-11-04-11-48.png', '2022-11-04 00:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `email`, `address`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(36, 'Irish May Bulan', 28, 'irish_may.bulan@staff.passerellesnumeriques.org', 'Cebu City', 'irish123', '891db9cc997c053ad8638b571a6e433f16420b4d', '2022-11-02-11-48.jpg', 'active', '2022-11-02 01:36:15'),
(37, 'Tresha Torino ', 26, 'tresha.torino@staff.passerellesnumeriques.org', 'Cebu City', 'tresha2323', '38d0a6b76a71a2138aba773a66c1d15695b95c81', '2022-11-02-11-25.jpg', 'active', '2022-11-02 11:46:59'),
(39, 'Jayann Carzon', 26, 'jayann.carzon@staff.passerellesnumeriques.org', 'Cebu City', 'Jayann0123', '4d9b4db98a23e02da926f3635b6132970e2951e8', '2022-11-02-11-28.jpg', 'active', '2022-11-02 12:21:58'),
(40, 'Arjay Chan', 25, 'arjay.chan@staff.passerellesnumeriques.org', 'Cebu City', 'Arjay0123', 'bf0f5199c49b95e88b038e38efaa53f6c5de9ef0', '2022-11-04-11-37.jpg', 'inactive', '2022-11-02 12:28:30'),
(41, 'Jean Salve', 30, 'jean.salve@staff.passerellesnumeriques.org', 'Cebu City', 'Jean0123', 'c8fca595070e80f1f48b003435b9eb64cf2a5b12', '2022-11-02-11-03.jpg', 'active', '2022-11-02 12:29:37'),
(42, 'Luchi Flores', 45, 'luchi.flores@staff.passerellesnumeriques.org', 'Cebu City', 'Luchi0123', '24e08a2a0ffe11814ea491f4bfd73b0d38018fcf', '2022-11-02-11-45.jpg', 'active', '2022-11-02 12:30:46'),
(43, 'Randy Paquibot', 35, 'randy.paquibot@staff.passerellesnumeriques.org', 'Cebu City', 'Randy0123', 'b04e3607de7d87bdef8911d0b62183cfbc760585', '2022-11-02-11-00.jpg', 'active', '2022-11-02 12:36:57'),
(44, 'Russlle Garma', 25, 'russlle.garma@staff.passerellesnumeriques.org', 'Cebu City', 'Russlle0123!', 'fe2b136a64adde4087c995d712ba039985356501', '2022-11-04-11-04.jpg', 'inactive', '2022-11-02 12:43:00'),
(45, 'Lyn Mari', 48, 'lyn.mari@staff.passerellesnumeriques.org', 'Cebu City', 'Lyn01234', '75730a4aabc5c4ef64b75772c9df1193bf3172e6', '2022-11-04-11-29.jpg', 'inactive', '2022-11-02 12:44:55'),
(46, 'Rubylyn Rafols', 28, 'rubylyn.rafols@staff.passerellesnumeriques.org', 'Cebu City', 'rubylyn0101', 'b2e9d433f270b5cf96d05c267017df1f67e00d6c', 'rubylyn0101.jpg', 'inactive', '2022-11-04 01:19:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`pn_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
