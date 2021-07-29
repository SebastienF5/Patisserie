-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 08:32 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `sexe` enum('masculin','feminin','autre','') DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` int(10) DEFAULT NULL,
  `image` varchar(25) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `pseudo`, `firstname`, `lastname`, `sexe`, `email`, `password`, `tel`, `image`, `dateCreation`) VALUES
(8, 'seb', '', '', '', 'sebastienfieffe@gmail.com', '$2y$14$/EgON6r8ACIILAtD.3CPWOXfWyjNph9FayviskyFpVwBtvgA7hDHa', 0, 'default.jpg', '2021-07-28 21:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `id_customers` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `qte` int(10) NOT NULL,
  `price` float NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `category` varchar(25) NOT NULL,
  `image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`, `image`) VALUES
(1, 'manchon', '\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Neque nisi quisquam repellat cupiditate deleniti', 23.45, 'pate', 'manchon.jpg'),
(2, 'coeurfidel', '\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Neque nisi quisquam repellat cupiditate deleniti', 93.05, 'desert', 'coeurfidele.jpg'),
(3, 'succes', '\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Neque nisi quisquam repellat cupiditate deleniti', 193.05, 'Gateaux', 'succes.jpg'),
(4, 'Pudding de pain', '\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Neque nisi quisquam repellat cupiditate deleniti', 10.05, 'desert', 'puddingdepain.jpg'),
(5, 'pate', '\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Neque nisi quisquam repellat cupiditate deleniti', 293.05, 'Pate', 'home3.jpg'),
(6, 'Gateau Blanc', '\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Neque nisi quisquam repellat cupiditate deleniti', 1093.05, 'Gateaux', 'gateau.jpg'),
(7, 'cup cake', '\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Neque nisi quisquam repellat cupiditate deleniti', 8.05, 'desert', 'home5.jpg'),
(8, 'Gateau chocolat', '\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Neque nisi quisquam repellat cupiditate deleniti', 793.05, 'Gateaux', 'home2.jpg'),
(9, 'Brownies', '  Lorem ipsum dolor sit amet consectetur adipisicing elit.0', 56.66, 'desert', 'brownies.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
