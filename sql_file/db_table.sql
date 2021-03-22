-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promotion`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ginko`
--

CREATE TABLE `ginko` (
  `ginko_id` int(11) NOT NULL,
  `ginko_code_id` varchar(12) NOT NULL COMMENT '金融機関コード4桁',
  `siten_code_id` varchar(12) NOT NULL COMMENT '支店コード3桁',
  `ginko_name_kana` varchar(255) NOT NULL COMMENT '金融機関名称',
  `ginko_name` varchar(255) NOT NULL,
  `branch` int(1) NOT NULL COMMENT '1本店2支店',
  `kubetu` int(1) NOT NULL COMMENT '1母店2出張所',
  `group_id` int(11) NOT NULL,
  `gojuon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `gojuon`
--

CREATE TABLE `gojuon` (
  `gojuon_id` int(11) NOT NULL,
  `gojuon_name` varchar(12) NOT NULL,
  `gojuon_group_id` int(11) NOT NULL,
  `gojuon_group_top` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ginko`
--
ALTER TABLE `ginko`
  ADD PRIMARY KEY (`ginko_id`);

--
-- Indexes for table `gojuon`
--
ALTER TABLE `gojuon`
  ADD PRIMARY KEY (`gojuon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ginko`
--
ALTER TABLE `ginko`
  MODIFY `ginko_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gojuon`
--
ALTER TABLE `gojuon`
  MODIFY `gojuon_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
