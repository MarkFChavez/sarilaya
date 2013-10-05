-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2013 at 10:34 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sarilaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` text NOT NULL,
  `article_image` text NOT NULL,
  `article_content` text NOT NULL,
  `article_isActive` int(11) NOT NULL,
  `article_cremod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `article_image`, `article_content`, `article_isActive`, `article_cremod`) VALUES
(1, 'Article One', '1898_1409747145907067_1168890027_n.jpg', 'this is a sample content this is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample contentthis is a sample content', 1, '2013-10-05 14:01:32'),
(2, 'Article Two', '', 'This is a sample content again', 1, '2013-10-05 09:07:12'),
(3, 'Article Three', '', 'xxxxxxxxxxxxxxxx', 1, '2013-10-05 11:59:33'),
(4, 'Article Four', '', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 1, '2013-10-05 11:59:41'),
(5, 'Article FIve', '', 'xxxxxxxxxxxxxxxxxxxxxxxxxx', 1, '2013-10-05 11:59:43'),
(11, 'Article Six ', '', 'six six ', 1, '2013-10-05 14:01:27'),
(12, 'Article Seven ', '', 'newest article', 1, '2013-10-05 14:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `comment_name` text NOT NULL,
  `comment_content` text NOT NULL,
  `comment_cremod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `folder_gallery`
--

CREATE TABLE IF NOT EXISTS `folder_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_title` text NOT NULL,
  `gallery_cover` text NOT NULL,
  `gallery_total` int(11) NOT NULL,
  `gallery_folder_cremod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `folder_gallery`
--

INSERT INTO `folder_gallery` (`gallery_id`, `gallery_title`, `gallery_cover`, `gallery_total`, `gallery_folder_cremod`) VALUES
(1, 'gallery onessss', '006Charizard.png', 0, '2013-10-05 19:44:33'),
(2, 'gallery two', '', 0, '0000-00-00 00:00:00'),
(3, 'gallery three', '', 0, '0000-00-00 00:00:00'),
(4, 'gallery four', '', 0, '0000-00-00 00:00:00'),
(5, 'gallery five', '', 0, '0000-00-00 00:00:00'),
(6, 'gallery six', '', 0, '0000-00-00 00:00:00'),
(7, '', '1898_1409747145907067_1168890027_n.jpg', 0, '2013-10-05 18:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `main_gallery`
--

CREATE TABLE IF NOT EXISTS `main_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_name` text NOT NULL,
  `gallery_folder` int(11) NOT NULL,
  `gallery_cremod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload_file`
--

CREATE TABLE IF NOT EXISTS `upload_file` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_filename` text NOT NULL,
  `upload_type` text NOT NULL,
  `upload_cremod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `user_cremod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_cremod`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
