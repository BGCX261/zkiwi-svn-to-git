-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2012 at 10:06 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zkiwi`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `content` text,
  `published` tinyint(4) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `title`, `images`, `content`, `published`, `order`, `created`, `question_id`, `score`, `user_id`) VALUES
(1, 'gfdgđfgf', '', '111111', 1, 1, '2012-06-27 20:42:50', 1, 1, 1),
(2, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(3, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(4, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(5, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(6, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(7, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(8, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(9, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(10, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(11, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(12, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(13, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(14, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(15, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(16, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(17, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(18, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(19, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(20, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(21, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(22, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(23, 'gregegeger', '', ',rêger', 1, 1, '2012-06-20 20:44:50', 1, 1, 1),
(30, 'htrhtrhrttrrt', '', '', 1, 54, '2012-07-02 09:25:32', 14, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `details_vote`
--

CREATE TABLE IF NOT EXISTS `details_vote` (
  `idd` int(11) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details_vote`
--


-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `introtext` text,
  `published` tinyint(4) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `title`, `introtext`, `published`, `order`) VALUES
(1, 'Group Admin', NULL, 1, 0),
(2, 'Group User', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `joiner`
--

CREATE TABLE IF NOT EXISTS `joiner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `joiner`
--

INSERT INTO `joiner` (`id`, `question_id`, `tags_id`) VALUES
(108, 32, 10),
(107, 32, 8),
(106, 32, 7);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `images` varchar(255) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `mod` int(45) DEFAULT NULL,
  `flag` int(45) DEFAULT NULL,
  `score` int(45) DEFAULT NULL,
  `type` int(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `title`, `content`, `images`, `published`, `order`, `created`, `user_id`, `mod`, `flag`, `score`, `type`) VALUES
(1, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(2, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(3, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(4, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(5, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(6, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(7, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(8, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(9, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(10, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(11, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(12, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(13, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(14, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(15, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(16, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(17, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(18, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(19, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(20, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(21, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(22, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(23, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(24, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(25, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(26, 'fcgvhbjkl', 'rtyuiokp', NULL, 1, 1, NULL, 1, 10, 10, 10, 10),
(27, 'Demo', '', '', 0, 10000, '2012-06-26 09:37:23', 1, 0, 0, 1000, 0),
(28, 'dsgsgdogosdkosdgksdogksdo', '', '', 0, 0, '2012-06-26 09:51:40', 1, 0, 0, 0, 0),
(30, 'dsgsgdogosdkosdgksdogksdo', '', '', 1, 10, '2012-06-26 09:56:24', 1, 0, 0, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `introtext` text,
  `published` tinyint(4) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `introtext`, `published`, `order`, `created`, `type`) VALUES
(1, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(2, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(3, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(4, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(5, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(6, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(7, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(8, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(9, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(10, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(11, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(12, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(13, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(14, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(15, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(16, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(17, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(18, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(19, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(20, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(21, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(22, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(23, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(24, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(25, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(26, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(27, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(28, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(29, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(30, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(31, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(32, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(33, 'ogrdgfdf', 'kffdkngsdgsdkgnsk', 1, 1, '2012-06-25 21:19:37', 1),
(43, 'Dmo', '<p>\r\n	bfdgmdldlhflhdbmdfbldf100</p>\r\n', 0, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE IF NOT EXISTS `tips` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `content` varchar(45) DEFAULT NULL,
  `published` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` varchar(45) DEFAULT NULL,
  `order` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tips`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `activi` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `email`, `avatar`, `full_name`, `activi`, `created`, `telephone`, `ip`, `group_id`) VALUES
(1, 'ti', 'e00fba6fedfb8a49e13346f7099a23fc', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1),
(2, 'rgregergre', 'e10adc3949ba59abbe56e057f20f883e', 'bontru2@gmail.com', NULL, 'cscac', 0, '2012-07-03 09:43:01', NULL, '127.0.0.1', 2),
(3, 'rgregergre', 'e10adc3949ba59abbe56e057f20f883e', 'bontru2@gmail.com', NULL, 'cscac', 0, '2012-07-03 09:46:04', NULL, '127.0.0.1', 2),
(4, 'rgregergre', 'e10adc3949ba59abbe56e057f20f883e', 'bontru2@gmail.com', NULL, 'cscac', 0, '2012-07-03 09:46:13', NULL, '127.0.0.1', 2),
(5, 'rgregergre', 'e369853df766fa44e1ed0ff613f563bd', 'bontru2@gmail.com', NULL, 'cscac', 0, '2012-07-03 10:06:40', NULL, '127.0.0.1', 2),
(6, 'rgregergre', '202cb962ac59075b964b07152d234b70', 'bontru2@gmail.com', NULL, 'cscac', 0, '2012-07-03 10:07:25', NULL, '127.0.0.1', 2),
(7, 'rgregergre', '202cb962ac59075b964b07152d234b70', 'bontru2@gmail.com', NULL, 'cscac', 0, '2012-07-03 10:17:49', NULL, '127.0.0.1', 2),
(8, 'rgregergre', '202cb962ac59075b964b07152d234b70', 'bontru2@gmail.com', NULL, 'cscac', 0, '2012-07-03 10:18:11', NULL, '127.0.0.1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `violating_rules`
--

CREATE TABLE IF NOT EXISTS `violating_rules` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `introtext` text,
  `question_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `violating_rules`
--


-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

