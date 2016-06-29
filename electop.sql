-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2016 at 05:24 
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `picture` text NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_data`
--

CREATE TABLE `barang_data` (
  `id_barang` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `spoiler` longtext NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `harga` int(255) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `keyword` longtext NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_view` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total_sell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_data`
--

INSERT INTO `barang_data` (`id_barang`, `author`, `merk`, `type`, `spoiler`, `picture`, `harga`, `stok`, `keyword`, `date_added`, `last_view`, `total_sell`) VALUES
(1, 1, 'Sony', 'MB211', 'Sony MB211 Adalah produk kamera besutan sony yang telah ', 'default.png', 2100000, 0, 'Sony MB211 Adalah produk kamera besutan sony yang telah ', '2016-06-26 02:42:00', '2016-06-27 04:56:40', 0),
(2, 1, 'Sony', 'MB211', 'Sony MB211 Adalah produk kamera besutan sony yang telah ', 'default.png', 2100000, 0, 'Sony MB211 Adalah produk kamera besutan sony yang telah ', '2016-06-26 02:42:04', '2016-06-27 06:42:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `description` text,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id_order`, `id_user`, `id_barang`, `status`, `total`, `description`, `last_activity`) VALUES
(1, 1, 1, 1, 1, NULL, '2016-06-27 06:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id_user` int(11) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `email` text NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id_user`, `username`, `password`, `email`, `last_login`) VALUES
(1, 'muhajirinlpu', 'lalala', 'muhajirinarnges@gmail.com', '2016-06-27 09:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `userprofil`
--

CREATE TABLE `userprofil` (
  `id_profil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofil`
--

INSERT INTO `userprofil` (`id_profil`, `id_user`, `nama`, `alamat`, `telepon`) VALUES
(1, 1, 'Muhajirin Ida Ilyas', 'Jl jojoran 3/48', '085731165022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang_data`
--
ALTER TABLE `barang_data`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `userprofil`
--
ALTER TABLE `userprofil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang_data`
--
ALTER TABLE `barang_data`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userprofil`
--
ALTER TABLE `userprofil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
