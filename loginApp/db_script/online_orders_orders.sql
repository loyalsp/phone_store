-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 08:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(30) NOT NULL,
  `customer_id` varchar(30) DEFAULT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `customer_id`, `address`) VALUES
(1, 'addii', 'abc bhalwal'),
(2, 'adnan_adi', 'St A , 1 MHC BHL');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Fasion'),
(3, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

CREATE TABLE `draft` (
  `draft_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `attach` varchar(200) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `draft`
--

INSERT INTO `draft` (`draft_id`, `user_id`, `sub`, `attach`, `msg`, `date`) VALUES
(1, 'hema', 'hiiiiiii', 'Winter.jpg', 'hiiiiiiiiiiii', '0000-00-00'),
(2, 'hema', 'my pics', 'Sunset.jpg', 'this is my pics', '0000-00-00'),
(3, 'hema', 'my pics', 'Sunset.jpg', 'this is my pics', '0000-00-00'),
(4, 'hema', 'abhi', 'Water lilies.jpg', 'hhhhhhhhhhhhh', '2013-06-09'),
(5, 'abhishek', 'my resume ', '', 'this is my resume format..........', '2013-06-13'),
(6, 'sanjeev', 'dfdf', '', 'dfd', '2016-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `imagepath` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `latestupd`
--

CREATE TABLE `latestupd` (
  `upd_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latestupd`
--

INSERT INTO `latestupd` (`upd_id`, `title`, `content`, `image`, `date`) VALUES
(1, 'dfdf', 'dfdfdf', 'Lighthouse.jpg', '2016-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `mail_id` int(11) NOT NULL,
  `rec_id` varchar(50) NOT NULL,
  `sen_id` varchar(50) NOT NULL,
  `sub` char(50) NOT NULL,
  `msg` text NOT NULL,
  `draft` text NOT NULL,
  `trash` text NOT NULL,
  `attachement` varchar(200) NOT NULL,
  `msgdate` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `username`) VALUES
(1, 'adnan'),
(2, 'adnan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customerId` varchar(30) DEFAULT NULL,
  `order_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `product_no` int(11) DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_num` int(11) NOT NULL,
  `category_num` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_num`, `category_num`, `product_name`, `price`, `stock`, `image`) VALUES
(1, 1, 'Motorola Rzar M', 10000, 100, 'images/motorola.jpg'),
(2, 1, 'JVC TV', 25000, 100, 'images/jvc.jpg'),
(3, 1, 'Lg G 5', 45000, 100, 'images/lg g5.jpg'),
(4, 1, 'SKY IM A870 K', 10000, 100, 'images/sky.jpg'),
(8, 2, 'Analog watch', 2500, 100, 'images/watch.jpg'),
(9, 3, 'table', 5000, 100, 'images/table.jpg'),
(13, 1, 'HTC one', 12000, 100, 'images/htc one.jpg'),
(14, 1, 'Bluetooth handsfree', 1999, 100, 'images/bluetooth handsfree.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `trash_id` int(11) NOT NULL,
  `rec_id` varchar(50) NOT NULL,
  `sen_id` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`trash_id`, `rec_id`, `sen_id`, `sub`, `msg`, `date`) VALUES
(1, 'sanjeev', 'sanjeev', 'hell--msg failed', 'dlfjld', '2016-07-23'),
(2, 'adi--_', 'admin@onlineorders.com', ' Welcome message', 'Congratulation adi--_You have created new account.', '2016-10-31'),
(3, 'brock', 'admin@onlineorders.com', ' Welcome message', 'Congratulation brockYou have created new account.', '2016-11-07'),
(4, 'brock', 'brock', 'testing--msg failed', 'test message', '2016-11-07'),
(5, 'brock', 'admin@onlineorders.com', ' Welcome message', 'Congratulation brockYou have created new account.', '2016-11-07'),
(6, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(7, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(8, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(9, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item ', '2016-11-09'),
(10, 'adnan', 'admin@onlineorders.com', ' Welcome message', 'Congratulation adnanYou have created new account.', '2016-11-09'),
(11, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(12, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(13, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(14, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(15, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . Lg G 5', '2016-11-09'),
(16, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(17, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(18, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . table', '2016-11-09'),
(19, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . Lg G 5', '2016-11-09'),
(20, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . Lg G 5', '2016-11-09'),
(21, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(22, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(23, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . ', '2016-11-09'),
(24, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item ', '2016-11-10'),
(25, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item ', '2016-11-10'),
(26, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item ', '2016-11-10'),
(27, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item ', '2016-11-10'),
(28, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . Analog watch', '2016-11-10'),
(29, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . Analog watch', '2016-11-10'),
(30, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . Analog watch', '2016-11-10'),
(31, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . Analog watch', '2016-11-10'),
(32, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(33, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(34, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(35, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . Analog watch', '2016-11-10'),
(36, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(37, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have made an order of .Bluetooth handsfree', '2016-11-10'),
(38, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(39, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(40, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(41, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(42, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(43, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adnan You have ordered an item . HTC one', '2016-11-10'),
(44, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree', '2016-11-11'),
(45, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree', '2016-11-11'),
(46, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree', '2016-11-11'),
(47, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree', '2016-11-11'),
(48, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Remote Control', '2016-11-11'),
(49, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree', '2016-11-11'),
(50, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfreeYou order id is 111', '2016-11-11'),
(51, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree at this time ( 2016-11-11 08:12:06pm ) Your order id is 115', '2016-11-11'),
(52, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfreeat 2016-11-11 08:09:48pm Your order id is 113', '2016-11-11'),
(53, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree at 2016-11-11 08:10:51pm Your order id is 114', '2016-11-11'),
(54, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfreeat  Your order id is 112', '2016-11-11'),
(55, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree at this time ( 2016-11-11 09:50:39pm ) Your order id is 116', '2016-11-11'),
(56, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of  at this time ( 2016-11-11 09:58:45pm ) Your order id is 117', '2016-11-11'),
(57, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree at this time ( 2016-11-11 11:30:30pm ) Your order id is 119		<div class="row">\r\n		<!--Product-->\r\n		<?php\r\n		if (! empty ( $obejct_products ))\r\n			{\r\n				?>\r\n		<div class="col-xs-6 col-md-4">\r\n			<img src="../<?=$obejct_products->image?>" class="img-responsivep p-img">\r\n			<div class="btn-pos">\r\n			<p><?=$obejct_products->product_name?></p>\r\n			<p>Price: <?=$obejct_products->price?>.Rs</p>\r\n			</div>\r\n		<div class="btn-pos">\r\n			<button\r\n				class="btn\r\n				btn-success" role="button" style="width:85px;">order id</button>\r\n				</div>\r\n		</div>\r\n		<?php\r\n			}\r\n			echo "</div>";\r\n			?>\r\n		<!--Product-->		\r\n	</div>', '2016-11-11'),
(58, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Dvd Player at this time ( 2016-11-12 12:06:43am ) Your order id is 121', '2016-11-12'),
(59, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree at this time ( 2016-11-11 10:00:05pm ) Your order id is 118', '2016-11-12'),
(60, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree at this time ( 2016-11-12 07:09:48pm ) Your order id is ', '2016-11-12'),
(61, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Travel charger at this time ( 2016-11-12 12:06:20am ) Your order id is 120', '2016-11-12'),
(62, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree at this time ( 2016-11-12 07:11:04pm ) Your order id is 123', '2016-11-12'),
(63, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of JVC TV at this time ( 2016-11-12 07:17:10pm ) Your order id is 124', '2016-11-12'),
(64, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of HTC one at this time ( 2016-11-12 07:19:06pm ) Your order id is 125', '2016-11-12'),
(65, 'adnan', 'admin', 'order', 'some msg', '2016-11-12'),
(66, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Dvd Player at this time ( 2016-11-12 08:16:08pm ) Your order id is 137', '2016-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_jd` int(11) NOT NULL,
  `user_name` char(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_jd`, `user_name`, `password`, `mobile`, `email`, `gender`, `hobbies`, `dob`, `image`) VALUES
(29, 'adnan', '123456', 0, 'adnan@onlinestore.com', '', '', '1986-04-08', 'profile_images/brock.jpg'),
(30, 'adi', '123456', 0, 'adi@onlinestore.com', 'm', '', '1928-08-14', 'profile_images/adii.jpg'),
(31, 'khuram', '123456', 0, 'khuram@onlinestore.com', 'm', '', '1911-09-11', 'profile_images/adi.jpg'),
(32, 'addi', '123456', 0, 'addi@onlinestore.com', 'm', '', '1912-05-14', 'profile_images/'),
(33, 'addii', '123456', 0, 'addii@onlinestore.com', 'm', '', '1912-05-14', 'profile_images/'),
(34, 'adnan_adi', '123456', 0, 'adnan_adi@onlinestore.com', 'm', '', '1916-08-15', 'profile_images/'),
(35, 'adnan_adii', '', 0, 'adnan_adii@onlinestore.com', 'm', '', '1916-08-15', 'profile_images/');

-- --------------------------------------------------------

--
-- Table structure for table `usermail`
--

CREATE TABLE `usermail` (
  `mail_id` int(11) NOT NULL,
  `rec_id` varchar(30) NOT NULL,
  `sen_id` varchar(30) NOT NULL,
  `sub` char(30) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `attachement` text NOT NULL,
  `recDT` date NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermail`
--

INSERT INTO `usermail` (`mail_id`, `rec_id`, `sen_id`, `sub`, `msg`, `attachement`, `recDT`, `order_id`) VALUES
(34, 'khuram', 'admin@onlineorders.com', ' Order Placed', 'Congratulation khuram You have ordered an item. ', '', '2016-11-07', 0),
(33, 'khuram', 'admin@onlineorders.com', ' Order Placed', 'Congratulation khuram You have ordered an item. ', '', '2016-11-07', 0),
(32, 'khuram', 'admin@onlineorders.com', ' Order Placed', 'Congratulation khuram You have ordered an item. ', '', '2016-11-07', 0),
(31, 'khuram', 'admin@onlineorders.com', ' Order Placed', 'Congratulation khuram You have ordered an item. ', '', '2016-11-07', 0),
(30, 'khuram', 'admin@onlineorders.com', ' Welcome message', 'Congratulation khuramYou have created new account.', '', '2016-11-07', 0),
(29, 'adi', 'admin@onlineorders.com', ' Order Placed', 'Congratulation adi You have ordered an item. ', '', '2016-11-07', 0),
(28, 'adi', 'admin@onlineorders.com', ' Welcome message', 'Congratulation adiYou have created new account.', '', '2016-11-07', 0),
(94, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Bluetooth handsfree at this time ( 2016-11-12 08:24:22pm ) Your order id is 138', '', '2016-11-12', 138),
(95, 'adnan', 'admin@onlineorders.com', ' Order Placed', 'Congratulation <strong>adnan</strong> You have made an order of Travel charger at this time ( 2016-11-12 10:39:55pm ) Your order id is 140', '', '2016-11-12', 140);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `fk_customer_id` (`customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `draft`
--
ALTER TABLE `draft`
  ADD PRIMARY KEY (`draft_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `latestupd`
--
ALTER TABLE `latestupd`
  ADD PRIMARY KEY (`upd_id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_customerId` (`customerId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderid` (`orderid`),
  ADD KEY `fk_product_no` (`product_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_num`),
  ADD KEY `fk_category_num` (`category_num`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`trash_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_jd`),
  ADD UNIQUE KEY `user_name` (`user_name`,`mobile`,`email`),
  ADD KEY `gender` (`gender`,`dob`);

--
-- Indexes for table `usermail`
--
ALTER TABLE `usermail`
  ADD PRIMARY KEY (`mail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `draft`
--
ALTER TABLE `draft`
  MODIFY `draft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `latestupd`
--
ALTER TABLE `latestupd`
  MODIFY `upd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mytable`
--
ALTER TABLE `mytable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `trash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_jd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `usermail`
--
ALTER TABLE `usermail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `userinfo` (`user_name`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customerId` FOREIGN KEY (`customerId`) REFERENCES `userinfo` (`user_name`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orderid` FOREIGN KEY (`orderid`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_product_no` FOREIGN KEY (`product_no`) REFERENCES `products` (`product_num`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_num` FOREIGN KEY (`category_num`) REFERENCES `categories` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
