-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 12:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `antar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `mobile`, `password`, `created_at`) VALUES
(1, 'admin', '', '', '21232f297a57a5a743894a0e4a801fc3', '2017-09-18 15:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE IF NOT EXISTS `tbl_blog` (
`blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_slug` varchar(255) NOT NULL,
  `blog_cat` int(11) NOT NULL,
  `blog_banner` varchar(255) NOT NULL,
  `blog_descr` text NOT NULL,
  `blog_tags` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_title`, `blog_slug`, `blog_cat`, `blog_banner`, `blog_descr`, `blog_tags`, `created_at`) VALUES
(16, 'Test Blog', 'test-blog', 3, '1515455259_sample4_l.jpg', '<p>Lorem ipsum doalr sit amet. lorem ipsum doalr sit amet.</p>\r\n', 'tag2, tag1', '2018-01-09 17:17:39'),
(18, 'test blg1', 'test-blg1', 3, '1515455569_sample4_l.jpg', '<p>asdf asdf</p>\r\n', 'tag2', '2018-01-09 17:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_cat`
--

CREATE TABLE IF NOT EXISTS `tbl_blog_cat` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_blog_cat`
--

INSERT INTO `tbl_blog_cat` (`cat_id`, `cat_name`, `created_at`) VALUES
(3, 'Test', '2018-01-09 17:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
`id` int(11) NOT NULL,
  `gal_cat` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `gal_cat`, `name`, `created_at`) VALUES
(6, 5, 'nature1.jpg', '2018-01-10 16:02:29'),
(8, 6, 'science 1.jpg', '2018-01-10 16:03:04'),
(9, 6, 'sample4_l.jpg', '2018-01-10 16:03:04'),
(10, 5, 'nature2.jpg', '2018-01-10 16:47:01'),
(11, 5, 'sample4_l.jpg', '2018-01-10 16:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_cat`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_cat` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_gallery_cat`
--

INSERT INTO `tbl_gallery_cat` (`cat_id`, `cat_name`, `created_at`) VALUES
(5, 'Nature', '2018-01-10 15:52:54'),
(6, 'Science', '2018-01-10 15:52:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
 ADD PRIMARY KEY (`blog_id`), ADD UNIQUE KEY `blog_slug` (`blog_slug`);

--
-- Indexes for table `tbl_blog_cat`
--
ALTER TABLE `tbl_blog_cat`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_cat`
--
ALTER TABLE `tbl_gallery_cat`
 ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_blog_cat`
--
ALTER TABLE `tbl_blog_cat`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_gallery_cat`
--
ALTER TABLE `tbl_gallery_cat`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
