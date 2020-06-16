-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 16, 2020 at 09:02 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `webdoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `definition`
--

CREATE TABLE `definition`
(
  `id` int
(255) NOT NULL,
  `word` varchar
(100) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `definition`
--
ALTER TABLE `definition`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `definition`
--
ALTER TABLE `definition`
  MODIFY `id` int
(255) NOT NULL AUTO_INCREMENT;
