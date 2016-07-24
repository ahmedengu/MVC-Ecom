-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2016 at 11:50 PM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icc`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL,
  `products` text NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `timestamp`, `user`, `products`, `total`) VALUES
(1, '2016-07-23 21:09:20', 11, '{2,2,2,2,2,2,2,2,2}', 48735),
(2, '2016-07-23 21:17:19', 11, '{3,3,3,2,2,2}', 32610),
(3, '2016-07-24 22:35:23', 11, '{2,1,2,3,5,4,3,2,1,1}', 686215),
(4, '2016-07-24 23:49:07', 13, '{1,8,9,10,9,8,7,6,1,2,3,4,5,1,1,1,1}', 1870768);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `desc` text NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `desc`, `price`) VALUES
(1, 'Apple iPhone SE 16GB - Factory Unlocke', 'http://i.ebayimg.com/images/m/mjsUoPXGZ7dXm3n3YtRwGlQ/s-b250x250/p.jpg', 'Apple iPhone SE 16GB - Factory Unlocke', 400),
(2, 'NEW Apple Macbook MJY32LL/A Int', 'http://i.ebayimg.com/images/m/mJ-2mWBCeI7m-nOHzLnjXNw/s-b250x250/p.jpg', 'NEW Apple Macbook MJY32LL/A Int', 5415),
(3, 'Apple iPad Pro 32GB Wi-Fi 4G LTE', 'http://i.ebayimg.com/images/m/mBpq2LyUFBVuhnWEr4sAA3A/s-b250x250/p.jpg', 'Apple iPad Pro 32GB Wi-Fi 4G LTE', 5455),
(4, 'Full Covered Tempered Glass Scree', 'http://i.ebayimg.com/images/m/mUWb33SatW44mNZwFgq_n7Q/s-b250x250/p.jpg', 'Full Covered Tempered Glass Scree', 5695),
(5, 'Apple Beats By Dre Powerbeats 2', 'http://i.ebayimg.com/images/m/mCwtvBfXN5GnObXj9RUv3rw/s-b250x250/p.jpg', 'Apple Beats By Dre Powerbeats 2', 652165),
(6, 'Apple iPhone 5C-8GB 16GB 32GB GSM', 'http://i.ebayimg.com/images/m/m-bg86cnHyWeZoPbSASRwIA/s-b250x250/p.jpg', 'Apple iPhone 5C-8GB 16GB 32GB GSM', 56458),
(7, 'NEW Apple Macbook MK4M2LL/A Intel M ', 'http://i.ebayimg.com/images/m/mnhyhsl5ZN7uSTAFZj1Iyuw/s-b250x250/p.jpg', 'NEW Apple Macbook MK4M2LL/A Intel M ', 9569),
(8, '45/60/85W T AC Power Adapter Supply ', 'http://i.ebayimg.com/images/m/mgZ-X9GoypkZ79g0lEFyoNw/s-b250x250/p.jpg', '45/60/85W T AC Power Adapter Supply ', 959),
(9, 'Bose SoundSport In-Ear Headphones', 'http://i.ebayimg.com/images/m/m1h2weIKZylJfXFQ7T4AmeQ/s-b250x250/p.jpg', 'Bose SoundSport In-Ear Headphones', 562562),
(10, 'Apple iPhone 5C 16GB 32GB LTE 4G 8', 'http://i.ebayimg.com/images/m/mY8WmwM3mcMiqPCjyB8Jg7A/s-b250x250/p.jpg', 'Apple iPhone 5C 16GB 32GB LTE 4G 8', 6569);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(1, 'kqjkqjkqj@oeu', 'kqjkjqkqj', 'df26230a779e92634a608c95ea6fe1fb'),
(2, 'kqjkqjkqj@oeu.uo', 'kqjkjqkqj', '40b63604db4e428aafb950db4c085129'),
(3, 'kqjkqjkqj@oeu.uo', 'kqjkjqkqj', '24a1ea1cf9a51bf44941407a56177fd6'),
(4, 'kqjkqjkqj@oeu.uo', 'kqjkjqkqj', 'af1dde0e796a10da75f1a439f59b4217'),
(5, 'kqjkqjkqj@oeu.uo', 'kqjkjqkqj', 'd494bbc75a0d7fb7fa005a750a04a049'),
(6, 'kqjkqjkqj@oeu.uo', 'kqjkjqkqj', '9bba3df7b2636bb846d45c61d594ce97'),
(7, 'oeuoeeeu@oeueoueueouoeuoeuoeuoe.oeu', 'oeueoeuoeuoeuoeueeoeu', '48de7414b79903187b08edf59cbfe2f2'),
(8, 'jkxjkx@euieu.eui', 'euieui', '2cf69e3fe9278ce867edfde32fa76369'),
(9, 'jkxjkx@euieu.euiu', 'euieuiu', '32db0d59244f0b4118184ffa3e109917'),
(10, 'ahmedengu@gmeeeail.com', 'ahmedeneeeegu@gmail.com', 'a7feaf08d22309327cd695466fc449d3'),
(11, 'ahmedqqqengu@gmail.com', 'ahmedqqqengu@gmail.com', '166352845c024d528a43a989b97efe95'),
(12, 'oeuoeuoeu@oeoeoeuu.oeu', 'oeuoeuoeu@oeoeoeuu.oeu', '0898447f9a8801d6c76be1028441f91d'),
(13, 'pco52495@laoeq.com', 'pco52495@laoeq.com', '12804fe07bcc60e97c770076309e44d2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
