-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 16, 2020 at 08:38 AM
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
-- Table structure for table `countries`
--

CREATE TABLE `countries`
(
  `id` int
(100) NOT NULL,
  `country` varchar
(15) NOT NULL,
  `htag` varchar
(100) DEFAULT NULL,
  `victimsName` text,
  `citationOne` varchar
(255) DEFAULT NULL,
  `title` varchar
(150) DEFAULT NULL,
  `citationTwo` text,
  `imageOne` varchar
(1000) DEFAULT NULL,
  `textIntro` text,
  `titleSpeech` text,
  `video` varchar
(1000) DEFAULT NULL,
  `citationSpeech` text,
  `person` varchar
(255) DEFAULT NULL,
  `imageTwo` varchar
(1000) DEFAULT NULL,
  `textOne` text,
  `imageThree` varchar
(1000) DEFAULT NULL,
  `textTwo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `id`
(`id`),
ADD UNIQUE KEY `country`
(`country`),
ADD UNIQUE KEY `title`
(`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int
(100) NOT NULL AUTO_INCREMENT;
