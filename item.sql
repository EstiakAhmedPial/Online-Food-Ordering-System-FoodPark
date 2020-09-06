-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2020 at 07:44 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodpark`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `item_des` varchar(255) DEFAULT NULL,
  `item_price` int(100) DEFAULT NULL,
  `item_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`sl`, `item_name`, `item_des`, `item_price`, `item_img`) VALUES
(7, 'Spicy Chicken Burgers', 'Spicy  soft Chicken with Burgers', 230, './img/dd7822b4b7802ced3651044d13b51a36.jpg'),
(6, 'Hajir Biriany', 'Hajir Biriany with beef and rice of high quality.', 120, './img/biriany-1.jpg'),
(13, 'Mutton Biriany', 'Mutton Biriany by Kazi', 87, './img/biriany-Mutton.jpg'),
(10, 'spicy-chicken-burgers', 'spicy-chicken-burgers-3', 30, './img/spicy-chicken-burgers-3.jpg'),
(9, 'Mutton burger and French fry', 'Mutton burger and French fry by Burger point', 370, './img/burgers-3.jpg'),
(11, 'avocado-bun-burgers', 'Natural Green avocado-bun-burgers-', 500, './img/avocado-bun-burgers-11a.jpg'),
(12, 'Pizza', 'Onion Chicken pizza', 400, './img/pizza-3.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
