-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2017 at 06:23 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardpine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

DROP TABLE IF EXISTS `admin_credentials`;
CREATE TABLE `admin_credentials` (
  `admin_username` varchar(40) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_password` varchar(40) NOT NULL,
  `confirmation_code` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`admin_username`, `admin_email`, `admin_password`, `confirmation_code`) VALUES
('junaid', 'junaidbhat110@gmail.com', 'jjjj', 781);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `card_id` bigint(6) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `card_description` varchar(500) NOT NULL,
  `card_price` int(5) NOT NULL,
  `card_category` varchar(20) NOT NULL,
  `main_image` varchar(100) NOT NULL,
  `front_image` varchar(100) NOT NULL,
  `content_image` varchar(100) NOT NULL,
  `back_image` varchar(100) NOT NULL,
  `card_added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `on_home` varchar(5) NOT NULL DEFAULT 'no',
  `is_latest` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `card_name`, `card_description`, `card_price`, `card_category`, `main_image`, `front_image`, `content_image`, `back_image`, `card_added_on`, `on_home`, `is_latest`) VALUES
(1, 'M-765', 'this is a muslim card', 60, 'Muslim', 'muslim1.jpg', 'muslim1.jpg', 'muslim1.jpg', 'muslim1.jpg', '2017-01-12 06:30:18', 'yes', 'no'),
(2, 'H-532', 'this is hindu card', 56, 'hindu', 'hindu3.jpg', 'hindu3.jpg', 'hindu3.jpg', 'hindu3.jpg', '2017-01-12 09:28:35', 'yes', 'no'),
(3, 'M-795', 'this is a muslim card', 46, 'Muslim', 'muslim3.jpg', 'muslim3.jpg', 'muslim3.jpg', 'muslim3.jpg', '2017-01-20 12:27:00', 'yes', 'no'),
(4, 'M-744', 'this is a muslim card', 46, 'Muslim', 'muslim4.jpg', 'muslim4.jpg', 'muslim4.jpg', 'muslim4.jpg', '2017-01-20 12:30:54', 'yes', 'no'),
(5, 'M-799', 'this is a muslim card', 46, 'Muslim', 'muslim5.jpg', 'muslim5.jpg', 'muslim5.jpg', 'muslim5.jpg', '2017-01-20 12:36:37', 'yes', 'no'),
(6, 'H-567', 'this is hindu card', 56, 'hindu', 'hindu4.jpg', 'hindu4.jpg', 'hindu4.jpg', 'hindu4.jpg', '2017-01-20 12:37:54', 'yes', 'no'),
(7, 'H-587', 'this is hindu card', 56, 'hindu', 'hindu7.jpg', 'hindu7.jpg', 'hindu7.jpg', 'hindu7.jpg', '2017-01-20 12:38:52', 'yes', 'no'),
(9, 'H-521', 'this is hindu card', 56, 'hindu', 'hindu6.jpg', 'hindu6.jpg', 'hindu6.jpg', 'hindu6.jpg', '2017-01-20 14:50:39', 'yes', 'no'),
(10, 'M-717', 'this is a muslim card', 46, 'Muslim', 'muslim6.jpg', 'muslim6.jpg', 'muslim6.jpg', 'muslim6.jpg', '2017-01-20 14:51:42', 'yes', 'yes'),
(11, 'H-554', 'this is hindu card', 56, 'hindu', 'hindu5.jpg', 'hindu5.jpg', 'hindu5.jpg', 'hindu5.jpg', '2017-01-20 14:54:25', 'yes', 'no'),
(12, 'M-705', 'this is a muslim card', 46, 'Muslim', 'muslim7.jpg', 'muslim7.jpg', 'muslim7.jpg', 'muslim7.jpg', '2017-01-20 14:54:54', 'yes', 'no'),
(13, 'M-638', 'this is a muslim card', 46, 'Muslim', 'muslim8.jpg', 'muslim8.jpg', 'muslim8.jpg', 'muslim8.jpg', '2017-01-20 14:55:11', 'yes', 'no'),
(14, 'M-775', 'this is a muslim card', 46, 'Muslim', 'muslim2.jpg', 'muslim2.jpg', 'muslim2.jpg', 'muslim2.jpg', '2017-01-20 14:55:38', 'yes', 'yes'),
(15, 'H-537', 'this is hindu card', 56, 'hindu', 'hindu2.jpg', 'hindu2.jpg', 'hindu2.jpg', 'hindu2.jpg', '2017-01-24 08:42:11', 'yes', 'yes'),
(16, 'H-581', 'this is hindu card', 56, 'hindu', 'hindu1.jpg', 'hindu1.jpg', 'hindu1.jpg', 'hindu1.jpg', '2017-01-24 08:42:11', 'yes', 'yes'),
(17, 'H-586', 'this is hindu card', 56, 'hindu', 'hindu8.jpg', 'hindu8.jpg', 'hindu8.jpg', 'hindu8.jpg', '2017-01-24 08:42:11', 'yes', 'no'),
(18, 'S-376', 'this is sikh card', 76, 'sikh', 'sikh1.jpg', 'sikh1.jpg', 'sikh1.jpg', 'sikh1.jpg', '2017-01-24 09:03:36', 'yes', 'yes'),
(19, 'S-387', 'this is sikh card', 76, 'sikh', 'sikh2.jpg', 'sikh2.jpg', 'sikh2.jpg', 'sikh2.jpg', '2017-01-24 09:03:36', 'yes', 'yes'),
(20, 'S-354', 'this is sikh card', 76, 'sikh', 'sikh3.jpg', 'sikh3.jpg', 'sikh3.jpg', 'sikh3.jpg', '2017-01-24 09:03:36', 'yes', 'no'),
(21, 'S-378', 'this is sikh card', 76, 'sikh', 'sikh4.jpg', 'sikh4.jpg', 'sikh4.jpg', 'sikh4.jpg', '2017-01-24 09:03:36', 'yes', 'no'),
(22, 'S-395', 'this is sikh card', 76, 'sikh', 'sikh5.jpg', 'sikh5.jpg', 'sikh5.jpg', 'sikh5.jpg', '2017-01-24 09:03:36', 'yes', 'no'),
(23, 'S-367', 'this is sikh card', 76, 'sikh', 'sikh5.jpg', 'sikh5.jpg', 'sikh5.jpg', 'sikh5.jpg', '2017-01-24 09:03:36', 'yes', 'no'),
(24, 'S-317', 'this is sikh card', 76, 'sikh', 'sikh7.jpg', 'sikh7.jpg', 'sikh7.jpg', 'sikh7.jpg', '2017-01-24 09:03:36', 'yes', 'no'),
(25, 'S-358', 'this is sikh card', 76, 'sikh', 'sikh8.jpg', 'sikh8.jpg', 'sikh8.jpg', 'sikh8.jpg', '2017-01-24 09:03:36', 'yes', 'no'),
(26, 'C-153', 'this is christian card', 55, 'christian', 'christian1.jpg', 'christian1.jpg', 'christian1.jpg', 'christian1.jpg', '2017-01-24 09:28:29', 'yes', 'yes'),
(27, 'C-101', 'this is christian card', 55, 'christian', 'christian2.jpg', 'christian2.jpg', 'christian2.jpg', 'christian2.jpg', '2017-01-24 09:28:29', 'yes', 'yes'),
(28, 'C-167', 'this is christian card', 55, 'christian', 'christian3.jpg', 'christian3.jpg', 'christian3.jpg', 'christian3.jpg', '2017-01-24 09:28:29', 'yes', 'no'),
(29, 'C-143', 'this is christian card', 55, 'christian', 'christian4.jpg', 'christian4.jpg', 'christian4.jpg', 'christian4.jpg', '2017-01-24 09:28:29', 'yes', 'no'),
(30, 'C-178', 'this is christian card', 55, 'christian', 'christian5.jpg', 'christian5.jpg', 'christian5.jpg', 'christian5.jpg', '2017-01-24 09:28:29', 'yes', 'no'),
(31, 'C-185', 'this is christian card', 55, 'christian', 'christian6.jpg', 'christian6.jpg', 'christian6.jpg', 'christian6.jpg', '2017-01-24 09:28:29', 'yes', 'no'),
(32, 'C-111', 'this is christian card', 55, 'christian', 'christian7.jpg', 'christian7.jpg', 'christian7.jpg', 'christian7.jpg', '2017-01-24 09:28:29', 'yes', 'no'),
(33, 'C-121', 'this is christian card', 55, 'christian', 'christian8.jpg', 'christian8.jpg', 'christian8.jpg', 'christian8.jpg', '2017-01-24 09:28:29', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` varchar(400) NOT NULL,
  `stock` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `stock`) VALUES
(1, 'Muslim', 'this is muslim category', 8),
(2, 'hindu', 'this is hindu category', 8),
(3, 'sikh', 'this is sikh category', 8),
(4, 'christian', 'this is christian category', 8),
(5, 'Category', 'This is my category', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_id` varchar(50) NOT NULL,
  `item_id` int(5) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_quantity` int(5) NOT NULL,
  `total_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `item_id`, `item_name`, `item_quantity`, `total_price`) VALUES
('ORDER1486714018aid', 5, 'M-799', 1, 46),
('ORDER1486714018aid', 13, 'M-638', 1, 46),
('ORDER1486714018aid', 12, 'M-705', 1, 46),
('ORDER1486714018aid', 10, 'M-717', 1, 46),
('ORDER1486806583ni', 3, 'M-795', 2, 92),
('ORDER1486806583ni', 4, 'M-744', 1, 46);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `slider_id` int(5) NOT NULL,
  `main_text` varchar(50) NOT NULL,
  `sub_heading_top` varchar(100) NOT NULL,
  `sub_heading_bottom` varchar(100) NOT NULL,
  `background_img` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `main_text`, `sub_heading_top`, `sub_heading_bottom`, `background_img`, `status`) VALUES
(1, 'kashmir collections', 'Save upto 75% off', 'Shop Now & Save Big', 'mybanner1.jpg', 'published'),
(2, 'Indias collection', 'save upto 40% off', 'Shop Now & Save Big', 'mybanner.jpg', 'unpublished'),
(3, 'designer collection', 'save upto 75% off', 'Shop Now & Save Big', 'mybanner3.jpg', 'published'),
(4, 'exclusive cards', 'save upto 75% off', 'Shop Now & Save Big', 'mybanner4.jpg', 'published'),
(5, 'best collection', 'save upto 50% off', 'Shop Now & Save Big', 'mybanner5.jpg', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `testimonial_id` int(5) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_message` varchar(400) NOT NULL,
  `customer_image` varchar(50) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `testimonial_on_home` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `customer_name`, `customer_message`, `customer_image`, `added_on`, `testimonial_on_home`) VALUES
(3, 'Aaqib', 'I loved my invites!  They had a wide range to select and fast shipping services. The quality of all Invitations was awesome. Great value as well with the discounts they run! Highly recommended.', 'c3.png', '2017-01-23 06:29:50', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tiles`
--

DROP TABLE IF EXISTS `tiles`;
CREATE TABLE `tiles` (
  `tile_id` int(5) NOT NULL,
  `tile_main_text` varchar(50) NOT NULL,
  `top_heading` varchar(100) NOT NULL,
  `tile_image` varchar(100) NOT NULL,
  `tile_on_left` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiles`
--

INSERT INTO `tiles` (`tile_id`, `tile_main_text`, `top_heading`, `tile_image`, `tile_on_left`) VALUES
(1, 'muslim', '75% OFF', 'bb1.jpg', 'no'),
(2, 'hindu', '40% OFFF', 'bb2.jpg', 'yes'),
(3, 'Sikhh', '60% OFF', 'bb3.jpg', 'no'),
(4, 'Wedding', '90% OFF', 'bb4.jpg', 'no'),
(5, 'Birthday', '30% OFF', 'bb5.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

DROP TABLE IF EXISTS `user_cart`;
CREATE TABLE `user_cart` (
  `card_id` int(5) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `total_quantity` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`card_id`, `user_email`, `total_quantity`) VALUES
(3, 'junaidbhat@gmail.com', 2),
(4, 'junaidbhat@gmail.com', 1),
(3, 'junaidbhat110@gmail.com', 1),
(4, 'junaidbhat110@gmail.com', 1),
(1, 'waq@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

DROP TABLE IF EXISTS `user_credentials`;
CREATE TABLE `user_credentials` (
  `user_id` bigint(7) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(30) DEFAULT NULL,
  `registered_from` varchar(20) NOT NULL DEFAULT 'mainsite',
  `confirmation_code` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`user_id`, `user_name`, `user_email`, `user_password`, `registered_from`, `confirmation_code`) VALUES
(2, 'juni bhat', 'junaidbhat@gmail.com', 'junaid', 'mainsite', 2887),
(4, 'junaid bhat', 'junaidbhat110@gmail.com', NULL, 'gmail', NULL),
(7, 'Bhat Junaid', 'bhatjunaid_jb@rediffmail.com', NULL, 'facebook', NULL),
(8, 'junaid', 'junaid110@gmail.com', 'juniii', 'mainsite', 8887),
(9, 'junai', 'juni@gmail.com', 'juna', 'mainsite', 9560),
(10, 'waq', 'waq@gmail.com', 'abcde', 'mainsite', NULL),
(11, 'AB ROUF SHAH', 'roufsh@gmail.com', NULL, 'gmail', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

DROP TABLE IF EXISTS `user_orders`;
CREATE TABLE `user_orders` (
  `order_id` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `invoice` varchar(30) DEFAULT NULL,
  `billing_address` varchar(400) NOT NULL,
  `shipping_address` varchar(400) NOT NULL,
  `status` int(1) DEFAULT '0',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_name`, `user_email`, `invoice`, `billing_address`, `shipping_address`, `status`, `order_date`, `delivery_date`) VALUES
('ORDER1486714018aid', 'junaid bhat', 'junaidbhat110@gmail.com', 'invoice_ORDER1486714018aid', 'junaid junaid,,junaid@gmail.ocm,787687,junaddjhakjh kajh kahk ,,kjhkh,kjhkjhh,979886', 'jhkjhkjh kajhskh,jhasgdjh,akjshdkjah@kjh.kjh,878768768,mnbasbakjk,jhasgdjhga, kjhkjhkjh,khkhkjhskjhk,87686876', 1, '2017-02-10 08:06:58', '2017-02-19 05:20:47'),
('ORDER1486806583ni', 'juni bhat', 'junaidbhat@gmail.com', 'invoice_ORDER1486806583ni', 'junaid bhat,,junaidbhat@gmail.com,76876,kjhkjhaksjdh akjsd ,,jhaskdhj,akjsdhkhaj,8787877', 'junaid  jhgjh,,ajhsgd@jashg.kash,9768756876,kashgdkjh kajshd kajhskj,,akjshdkjh,kajshdkajhs,876876', 0, '2017-02-11 09:49:43', '2017-02-19 05:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

DROP TABLE IF EXISTS `user_reviews`;
CREATE TABLE `user_reviews` (
  `card_id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_review` varchar(500) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reviews`
--

INSERT INTO `user_reviews` (`card_id`, `user_name`, `user_email`, `user_review`, `user_rating`, `added_on`) VALUES
(12, 'junaid', 'junaid@gmail.com', 'junaid', 4, '2017-01-29 17:31:55'),
(12, 'waleed', 'waleedahqureshi@gmail.com', 'this is very nice card', 5, '2017-01-29 17:36:12'),
(3, 'junaiddd', 'junaid@gmail.com', 'my review', 3, '2017-01-30 05:31:51'),
(12, 'juni', 'juni@gmail.com', 'very poor', 2, '2017-01-30 08:01:19'),
(1, 'jjjj', 'junaid@gmail.com', 'high card', 3, '2017-01-30 08:03:33'),
(12, 'juniii baba', 'junaidbhat110@gmail.com', 'this is latest review', 4, '2017-01-30 08:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

DROP TABLE IF EXISTS `user_wishlist`;
CREATE TABLE `user_wishlist` (
  `card_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wishlist`
--

INSERT INTO `user_wishlist` (`card_id`, `user_email`) VALUES
(1, 'bhatjunaid_jb@rediffmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`admin_email`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `tiles`
--
ALTER TABLE `tiles`
  ADD PRIMARY KEY (`tile_id`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tiles`
--
ALTER TABLE `tiles`
  MODIFY `tile_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_credentials`
--
ALTER TABLE `user_credentials`
  MODIFY `user_id` bigint(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
