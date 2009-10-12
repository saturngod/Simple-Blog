-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2009 at 02:32 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `website` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `name`, `email`, `website`, `body`, `date`) VALUES
(1, 1, 'htainlinshwe', 'htainlinshwe@gmail.com', 'http://en.saturngod.net', 'This is comment', 'Sep 25 2009 11:55:32'),
(2, 1, 'comment', 'comment@gmail.com', 'comment.com', 'This is comment 2', 'Sep 25 2009 11:58:38'),
(3, 1, 'saturngod', 'saturngod@gmail.com', 'en.saturngod.net', 'This is another comment', 'Sep 26 2009 01:09:05'),
(6, 1, 'Saturngod', 'saturngod@gmail.com', 'en.satu', 'saturngod', 'Sep 27 2009 01:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `body`, `username`, `date`) VALUES
(1, 'This is simple post', 'This is a body text. This is sample text. ', 'admin', 'Sep 25 2009 11:54:33'),
(9, 'Another Post', 'This is another post', 'admin', 'Sep 27 2009 06:09:32'),
(10, 'Simple', 'This is <span style="font-weight: bold;">GUI editor</span>. <big><big><big>jwysiwyg</big></big></big> editor<br><br>my blog is <a href="http://en.saturngod.net">here</a>.', 'admin', 'Sep 27 2009 10:09:38'),
(14, 'Test', 'RSS test', 'admin', 'Sep 27 2009 10:09:22'),
(16, 'Test', 'Test', 'admin', 'Sep 27 2009 11:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `type`) VALUES
(1, 'admin', '0a14de5a76e5e14758b04c209f266726', '1');
