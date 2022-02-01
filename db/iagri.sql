-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2022 at 09:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iagri`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `seller_id`) VALUES
(61, 13, 51, 1, 0),
(62, 13, 62, 1, 0),
(63, 13, 52, 1, 0),
(64, 13, 47, 1, 0),
(65, 13, 60, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(13, 'Tyres', 'tyres'),
(14, 'Saddle', 'saddle'),
(15, 'Rim', 'rim'),
(16, 'Handle Bar', 'handle-bar'),
(17, 'Group Set', 'group-set'),
(18, 'Frame Set', 'frame-set'),
(19, 'Break', 'break');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`, `seller_id`) VALUES
(52, 39, 47, 2, 1),
(53, 39, 57, 1, 1),
(54, 40, 60, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photos` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `builder_photo` varchar(200) NOT NULL,
  `ratings_one` int(11) NOT NULL,
  `ratings_two` int(11) NOT NULL,
  `ratings_three` int(11) NOT NULL,
  `ratings_four` int(11) NOT NULL,
  `ratings_five` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photos`, `date_view`, `counter`, `stock`, `builder_photo`, `ratings_one`, `ratings_two`, `ratings_three`, `ratings_four`, `ratings_five`, `seller_id`) VALUES
(44, 13, 'VITTORIA CORSA G2.0 TLR', '<p>Motorcycle tyres (tires in American English) are&nbsp;<strong>the outer part of motorcycle wheels</strong>, attached to the rims, providinge traction, resisting wear, absorbing surface irregularities, and allowing the motorcycle to turn via countersteering.</p>\r\n', 'vittoria-corsa-g2-0-tlr', 600, 'vittoria-corsa-g2-0-tlr.png', '2022-02-01', 5, 0, '', 1, 3, 1, 3, 4, 1),
(45, 13, 'Savanna', '<p>Motorcycle tyres (tires in American English) are&nbsp;<strong>the outer part of motorcycle wheels</strong>, attached to the rims, providinge traction, resisting wear, absorbing surface irregularities, and allowing the motorcycle to turn via countersteering.</p>\r\n', 'savanna', 500, 'savanna.png', '2022-02-01', 2, 0, '', 0, 0, 0, 0, 1, 1),
(46, 13, 'GRAND PRIX', '<p>Motorcycle tyres (tires in American English) are&nbsp;<strong>the outer part of motorcycle wheels</strong>, attached to the rims, providinge traction, resisting wear, absorbing surface irregularities, and allowing the motorcycle to turn via countersteering.</p>\r\n', 'grand-prix', 800, 'grand-prix.png', '2022-02-01', 1, 0, '', 0, 4, 0, 0, 5, 1),
(47, 13, 'CONTINENTAL GP 5000 TL', '<p>Motorcycle tyres (tires in American English) are&nbsp;<strong>the outer part of motorcycle wheels</strong>, attached to the rims, providinge traction, resisting wear, absorbing surface irregularities, and allowing the motorcycle to turn via countersteering.</p>\r\n', 'continental-gp-5000-tl', 650, 'continental-gp-5000-tl.png', '2022-02-01', 1, 21, '', 0, 4, 0, 0, 5, 1),
(48, 13, 'BONTRAGER R3 HARD-CASE LITE', '<p>Motorcycle tyres (tires in American English) are&nbsp;<strong>the outer part of motorcycle wheels</strong>, attached to the rims, providinge traction, resisting wear, absorbing surface irregularities, and allowing the motorcycle to turn via countersteering.</p>\r\n', 'bontrager-r3-hard-case-lite', 760, 'bontrager-r3-hard-case-lite.png', '2022-01-30', 5, 0, '', 0, 0, 0, 0, 0, 1),
(49, 14, 'Saddles for long ride', '<p>A bicycle saddle, often called a bicycle seat, is&nbsp;<strong>one of five contact points on an upright bicycle</strong>, the others being the two pedals and the two handles on the handlebars. ... It performs a similar role as a horse&#39;s saddle, not bearing all the weight of the rider as the other contact points also take some of the load.</p>\r\n', 'saddles-long-ride', 450, 'saddles-long-ride.png', '2022-02-01', 1, 0, '', 0, 0, 0, 4, 0, 1),
(50, 14, 'FIZIK ARIONE R1 OPEN', '<p>A bicycle saddle, often called a bicycle seat, is&nbsp;<strong>one of five contact points on an upright bicycle</strong>, the others being the two pedals and the two handles on the handlebars. ... It performs a similar role as a horse&#39;s saddle, not bearing all the weight of the rider as the other contact points also take some of the load.</p>\r\n', 'fizik-arione-r1-open', 700, 'fizik-arione-r1-open.png', '2022-01-30', 1, 20, '', 0, 0, 0, 0, 0, 1),
(51, 14, 'Complete Tri Best Road Bike Saddles (1)', '<p>A bicycle saddle, often called a bicycle seat, is&nbsp;<strong>one of five contact points on an upright bicycle</strong>, the others being the two pedals and the two handles on the handlebars. ... It performs a similar role as a horse&#39;s saddle, not bearing all the weight of the rider as the other contact points also take some of the load.</p>\r\n', 'complete-tri-best-road-bike-saddles-1', 650, 'complete-tri-best-road-bike-saddles-1.png', '2022-01-30', 3, 20, '', 0, 0, 0, 0, 0, 1),
(52, 14, 'carbon saddles', '<p>A bicycle saddle, often called a bicycle seat, is&nbsp;<strong>one of five contact points on an upright bicycle</strong>, the others being the two pedals and the two handles on the handlebars. ... It performs a similar role as a horse&#39;s saddle, not bearing all the weight of the rider as the other contact points also take some of the load.</p>\r\n', 'carbon-saddles', 900, 'carbon-saddles.png', '2022-02-01', 4, 15, '', 0, 0, 0, 0, 5, 1),
(53, 14, 'BONTRAGER AEOLUS PRO', '<p>A bicycle saddle, often called a bicycle seat, is&nbsp;<strong>one of five contact points on an upright bicycle</strong>, the others being the two pedals and the two handles on the handlebars. ... It performs a similar role as a horse&#39;s saddle, not bearing all the weight of the rider as the other contact points also take some of the load.</p>\r\n', 'bontrager-aeolus-pro', 1200, 'bontrager-aeolus-pro.png', '2022-01-30', 1, 10, '', 0, 0, 0, 0, 0, 1),
(54, 15, 'ZIPP 303S', '<p>A bicycle wheel is a wheel,&nbsp;<strong>most commonly a wire wheel</strong>, designed for a bicycle. ... Bicycle wheels are typically designed to fit into the frame and fork via dropouts, and hold bicycle tires.</p>\r\n', 'zipp-303s', 7000, 'zipp-303s.png', '2022-01-30', 2, 0, '', 0, 0, 0, 0, 0, 1),
(55, 15, 'ROVAL ALPINIST CLX', '<p>A bicycle wheel is a wheel,&nbsp;<strong>most commonly a wire wheel</strong>, designed for a bicycle. ... Bicycle wheels are typically designed to fit into the frame and fork via dropouts, and hold bicycle tires.</p>\r\n', 'roval-alpinist-clx', 650, 'roval-alpinist-clx.png', '2022-01-30', 2, 0, '', 0, 0, 0, 0, 0, 1),
(56, 15, 'BONTRAGER AEOLUS ELITE', '<p>A bicycle wheel is a wheel,&nbsp;<strong>most commonly a wire wheel</strong>, designed for a bicycle. ... Bicycle wheels are typically designed to fit into the frame and fork via dropouts, and hold bicycle tires.</p>\r\n', 'bontrager-aeolus-elite', 900, 'bontrager-aeolus-elite.png', '2022-01-30', 1, 7, '', 0, 0, 0, 0, 0, 1),
(57, 15, 'BONTRAGER AEOLUS ELITE 50 TLR', '<p>A bicycle wheel is a wheel,&nbsp;<strong>most commonly a wire wheel</strong>, designed for a bicycle. ... Bicycle wheels are typically designed to fit into the frame and fork via dropouts, and hold bicycle tires.</p>\r\n', 'bontrager-aeolus-elite-50-tlr', 650, 'bontrager-aeolus-elite-50-tlr.png', '2022-01-30', 2, 3, '', 0, 0, 0, 0, 0, 1),
(58, 15, 'AEOLUS RSL 37 TLR', '<p>A bicycle wheel is a wheel,&nbsp;<strong>most commonly a wire wheel</strong>, designed for a bicycle. ... Bicycle wheels are typically designed to fit into the frame and fork via dropouts, and hold bicycle tires.</p>\r\n', 'aeolus-rsl-37-tlr', 650, 'aeolus-rsl-37-tlr.png', '0000-00-00', 0, 5, '', 0, 0, 0, 0, 0, 1),
(59, 16, 'PARLEE CARBON', '<p>A bicycle handlebar is&nbsp;<strong>the steering control for bicycles</strong>. ... Besides steering, handlebars also often support a portion of the rider&#39;s weight, depending on their riding position, and provide a convenient mounting place for brake levers, shift levers, cyclocomputers, bells, etc.</p>\r\n', 'parlee-carbon', 650, 'parlee-carbon.png', '2022-01-28', 3, 0, '', 0, 0, 0, 0, 0, 14),
(60, 16, 'ENVE ROAD SHORT', '<p>A bicycle handlebar is&nbsp;<strong>the steering control for bicycles</strong>. ... Besides steering, handlebars also often support a portion of the rider&#39;s weight, depending on their riding position, and provide a convenient mounting place for brake levers, shift levers, cyclocomputers, bells, etc.</p>\r\n', 'enve-road-short', 650, 'enve-road-short.png', '2022-02-01', 1, 6, '', 0, 0, 0, 0, 0, 14),
(61, 16, 'ENVE GRAVEL', '<p>A bicycle handlebar is&nbsp;<strong>the steering control for bicycles</strong>. ... Besides steering, handlebars also often support a portion of the rider&#39;s weight, depending on their riding position, and provide a convenient mounting place for brake levers, shift levers, cyclocomputers, bells, etc.</p>\r\n', 'enve-gravel', 650, 'enve-gravel.png', '0000-00-00', 0, 5, '', 0, 0, 0, 0, 0, 14),
(62, 16, 'AEROFLY II', '<p>A bicycle handlebar is&nbsp;<strong>the steering control for bicycles</strong>. ... Besides steering, handlebars also often support a portion of the rider&#39;s weight, depending on their riding position, and provide a convenient mounting place for brake levers, shift levers, cyclocomputers, bells, etc.</p>\r\n', 'aerofly-ii', 900, 'aerofly-ii.png', '2022-01-30', 1, 20, '', 0, 0, 0, 0, 0, 14),
(63, 16, '3T SUPERERGO PRO', '<p>A bicycle handlebar is&nbsp;<strong>the steering control for bicycles</strong>. ... Besides steering, handlebars also often support a portion of the rider&#39;s weight, depending on their riding position, and provide a convenient mounting place for brake levers, shift levers, cyclocomputers, bells, etc.</p>\r\n', '3t-superergo-pro', 900, '3t-superergo-pro.png', '2022-01-30', 2, 20, '', 0, 0, 0, 0, 0, 14),
(64, 17, 'Sram X01 Eagle AXS DUB BOOST Groupset (1)', '<p>A bike&#39;s groupset is essentially&nbsp;<strong>the collection of moving parts on your bike that drive or stop the wheels</strong>. Groupsets at a glance: A bike&#39;s groupset consists of shifters, chainset, cassette, deraileurs, brakes, bottom bracket, chain, and cables.Hul 9, 2020</p>\r\n', 'sram-x01-eagle-axs-dub-boost-groupset-1', 7000, 'sram-x01-eagle-axs-dub-boost-groupset-1.png', '2022-01-30', 6, 0, '', 0, 0, 0, 0, 0, 14),
(65, 17, 'Shimano', '<p>A bike&#39;s groupset is essentially&nbsp;<strong>the collection of moving parts on your bike that drive or stop the wheels</strong>. Groupsets at a glance: A bike&#39;s groupset consists of shifters, chainset, cassette, deraileurs, brakes, bottom bracket, chain, and cables.Hul 9, 2020</p>\r\n', 'shimano', 900, 'shimano.png', '2022-01-30', 10, 1, '', 0, 0, 0, 0, 0, 14),
(66, 17, 'Shimano tiagra 4700', '<p>A bike&#39;s groupset is essentially&nbsp;<strong>the collection of moving parts on your bike that drive or stop the wheels</strong>. Groupsets at a glance: A bike&#39;s groupset consists of shifters, chainset, cassette, deraileurs, brakes, bottom bracket, chain, and cables.Hul 9, 2020</p>\r\n', 'shimano-tiagra-4700', 900, 'shimano-tiagra-4700.png', '2022-01-30', 5, 1, '', 0, 0, 0, 0, 0, 14),
(67, 17, 'Shimano deore', '<p>A bike&#39;s groupset is essentially&nbsp;<strong>the collection of moving parts on your bike that drive or stop the wheels</strong>. Groupsets at a glance: A bike&#39;s groupset consists of shifters, chainset, cassette, deraileurs, brakes, bottom bracket, chain, and cables.Hul 9, 2020</p>\r\n', 'shimano-deore', 10000, 'shimano-deore.png', '2022-01-30', 4, 1, '', 0, 0, 0, 0, 0, 14),
(68, 17, 'M$100 deore', '<p>A bike&#39;s groupset is essentially&nbsp;<strong>the collection of moving parts on your bike that drive or stop the wheels</strong>. Groupsets at a glance: A bike&#39;s groupset consists of shifters, chainset, cassette, deraileurs, brakes, bottom bracket, chain, and cables.Hul 9, 2020</p>\r\n', 'm-100-deore', 14000, 'm-100-deore.png', '2022-01-30', 4, 0, '', 0, 0, 0, 0, 0, 14),
(69, 18, 'WILIER JENA', '<p>A bicycle frame is the main component of a bicycle, onto which wheels and other components are fitted. ... A frameset&nbsp;<strong>consists of the frame and fork of a bicycle and sometimes</strong>&nbsp;includes the headset and seat post. Frame builders will often produce the frame and fork together as a paired set.</p>\r\n', 'wilier-jena', 14000, 'wilier-jena.png', '2022-01-30', 7, 6, '', 0, 0, 0, 0, 0, 1),
(70, 18, 'WILIER FILANTE SLR', '<p>A bicycle frame is the main component of a bicycle, onto which wheels and other components are fitted. ... A frameset&nbsp;<strong>consists of the frame and fork of a bicycle and sometimes</strong>&nbsp;includes the headset and seat post. Frame builders will often produce the frame and fork together as a paired set.</p>\r\n', 'wilier-filante-slr', 10000, 'wilier-filante-slr.png', '2022-01-30', 6, 4, '', 0, 0, 0, 0, 0, 1),
(71, 18, 'WILIER 0 SLR', '<p>A bicycle frame is the main component of a bicycle, onto which wheels and other components are fitted. ... A frameset&nbsp;<strong>consists of the frame and fork of a bicycle and sometimes</strong>&nbsp;includes the headset and seat post. Frame builders will often produce the frame and fork together as a paired set.</p>\r\n', 'wilier-0-slr', 10000, 'wilier-0-slr.png', '2022-01-30', 1, 0, '', 0, 0, 0, 0, 0, 1),
(72, 18, 'TREK MADONE SLR 2022', '<p>A bicycle frame is the main component of a bicycle, onto which wheels and other components are fitted. ... A frameset&nbsp;<strong>consists of the frame and fork of a bicycle and sometimes</strong>&nbsp;includes the headset and seat post. Frame builders will often produce the frame and fork together as a paired set.</p>\r\n', 'trek-madone-slr-2022', 14000, 'trek-madone-slr-2022.png', '2022-01-30', 1, 6, '', 0, 0, 0, 0, 0, 1),
(73, 18, 'MADONE SL DISC', '<p>A bicycle frame is the main component of a bicycle, onto which wheels and other components are fitted. ... A frameset&nbsp;<strong>consists of the frame and fork of a bicycle and sometimes</strong>&nbsp;includes the headset and seat post. Frame builders will often produce the frame and fork together as a paired set.</p>\r\n', 'madone-sl-disc', 14000, 'madone-sl-disc.png', '2022-01-30', 7, 5, '', 0, 0, 0, 0, 0, 1),
(79, 19, 'mountain bike hydrolic', '<p>A&nbsp;<strong>bicycle brake</strong>&nbsp;reduces the speed of a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bicycle\">bicycle</a>&nbsp;or prevents it from moving. The three main types are:&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bicycle_brake#Rim_brakes\">rim brakes</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bicycle_brake#Disc_brakes\">disc brakes</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bicycle_brake#Drum_brakes\">drum brakes</a>.</p>\r\n', 'mountain-bike-hydrolic', 650, 'mountain-bike-hydrolic.png', '0000-00-00', 0, 5, '', 0, 0, 0, 0, 0, 1),
(80, 19, 'MEROCA MTB hydraulic brakes', '<p>A&nbsp;<strong>bicycle brake</strong>&nbsp;reduces the speed of a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bicycle\">bicycle</a>&nbsp;or prevents it from moving. The three main types are:&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bicycle_brake#Rim_brakes\">rim brakes</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bicycle_brake#Disc_brakes\">disc brakes</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bicycle_brake#Drum_brakes\">drum brakes</a>.</p>\r\n', 'meroca-mtb-hydraulic-brakes', 760, 'meroca-mtb-hydraulic-brakes.png', '2022-01-30', 1, 23, '', 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`, `seller_id`) VALUES
(39, 13, '1643536047689', '2022-01-30', 1),
(40, 13, '1643536047689', '2022-01-30', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 1, 'Padyak', 'System', 'San Agustin East Agoo, La Union', '', 'alvin.jpg', 1, '', '', '2018-05-01'),
(13, 'alvinreggaelaroya@gmail.com', '$2y$10$y8BUnZSDo6rJKW8l7O.Lee2wGY0swX6SZDU/AIoJNER.BJXeAIv2W', 0, 'Alvin', 'Laroya', '161 San Agustin East Agoo, La Union', '09388566223', 'alvin.jpg', 1, '4VF2ktvuo9As', '5h6IwpqFEyXU43k', '2022-01-27'),
(14, 'allora@gmail.com', '$2y$10$0b3vi1vQJbECFKJN7gnQCeIhthQ0xX40OofQA5xM7wxiL40.tygoe', 1, 'Allora', 'Alviar', 'San marcos', '09123456789', 'cover2.jpg', 1, 'hmsxiJv2fAoE', '', '2022-01-29'),
(15, 'regine@gmail.com', '$2y$10$QJIb.lw1V0vwl0HtZkU7LOfw6AOVkXqcctAAui2XMubGdhK5wgqZG', 1, 'Regine', 'Laroya', '', '', '', 1, 'FTrwzKQf1pm5', '', '2022-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(8, 13, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
