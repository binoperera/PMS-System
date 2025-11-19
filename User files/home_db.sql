-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 09:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sso_provider` varchar(50) DEFAULT NULL,
  `sso_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `sso_provider`, `sso_id`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'admin1', 'f865b53623b121fd34ee5426c792e5c33af8c227', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chatapp`
--

CREATE TABLE `chatapp` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `message`) VALUES
('ZQfNT3XgBhBe6XukB0gt', 'Nimsara bunowan', 'I&#39;m a fucking play boy , So i need a LUXARY room to have sex with my new girl from HR'),
('sxB6cvaves0fXxG8ZH8M', 'abhishek', 'Bye'),
('0rmWK0p2FGHrw2AargOH', 'admin', 'Hsdgkubkjbxsjcbnb bvkhvkhbvkxjcb kjZC'),
('p8tSYgDrTqdPI5HNWULX', 'admin', 'jbsdkbkndklnklNDKsd'),
('Yk9xT3kuqQf0aCHHMuKN', 'admin', 'lndscnkndck');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `number`, `message`) VALUES
('AUKie2q6umaphy58IY6a', 'sanjeevani ranasinghe', 'sanjeevanisr817@gmail.com', '0764661682', 'hello'),
('UMTNZqqe5NbKxdLIkbLJ', 'ss', 'bb@gmail.com', '255', 'bbb'),
('3hcTf14v9L6z2b8DOFJr', 'paul', 's.p.d.paul1026@gmail.com', '0702054177', 'i don&#39;t need a boarding');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `name` varchar(12) NOT NULL,
  `price` varchar(20) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `discription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`name`, `price`, `duration`, `discription`) VALUES
('EasyPromo', '6000', 'per day', 'this package valid for 15 days'),
('freetrail', 'free', 'per day', 'this package valid for 1 days'),
('promo', '12000', 'per month', 'this package valid for 30 days');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `name` text NOT NULL,
  `number` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `date` date NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `type` varchar(12) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`name`, `number`, `price`, `date`, `payment_status`, `type`, `id`) VALUES
('Nimsara', 718709807, 12000, '2025-07-18', 'completed', 'Promo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `offer` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `furnished` varchar(50) NOT NULL,
  `bhk` varchar(10) NOT NULL,
  `deposite` varchar(10) NOT NULL,
  `bedroom` varchar(10) NOT NULL,
  `bathroom` varchar(10) NOT NULL,
  `balcony` varchar(10) NOT NULL,
  `carpet` varchar(10) NOT NULL,
  `age` varchar(2) NOT NULL,
  `total_floors` varchar(2) NOT NULL,
  `room_floor` varchar(2) NOT NULL,
  `loan` varchar(50) NOT NULL,
  `lift` varchar(3) NOT NULL DEFAULT 'no',
  `security_guard` varchar(3) NOT NULL DEFAULT 'no',
  `play_ground` varchar(3) NOT NULL DEFAULT 'no',
  `garden` varchar(3) NOT NULL DEFAULT 'no',
  `water_supply` varchar(3) NOT NULL DEFAULT 'no',
  `power_backup` varchar(3) NOT NULL DEFAULT 'no',
  `parking_area` varchar(3) NOT NULL DEFAULT 'no',
  `gym` varchar(3) NOT NULL DEFAULT 'no',
  `shopping_mall` varchar(3) NOT NULL DEFAULT 'no',
  `hospital` varchar(3) NOT NULL DEFAULT 'no',
  `school` varchar(3) NOT NULL DEFAULT 'no',
  `market_area` varchar(3) NOT NULL DEFAULT 'no',
  `image_01` varchar(50) NOT NULL,
  `image_02` varchar(50) NOT NULL,
  `image_03` varchar(50) NOT NULL,
  `image_04` varchar(50) NOT NULL,
  `image_05` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(12) NOT NULL,
  `payment_price` int(12) NOT NULL,
  `user_number` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `user_id`, `property_name`, `address`, `price`, `type`, `offer`, `status`, `furnished`, `bhk`, `deposite`, `bedroom`, `bathroom`, `balcony`, `carpet`, `age`, `total_floors`, `room_floor`, `loan`, `lift`, `security_guard`, `play_ground`, `garden`, `water_supply`, `power_backup`, `parking_area`, `gym`, `shopping_mall`, `hospital`, `school`, `market_area`, `image_01`, `image_02`, `image_03`, `image_04`, `image_05`, `description`, `date`, `payment_id`, `payment_type`, `payment_price`, `user_number`, `user_name`) VALUES
('RBzt7ugwhpGKfPmo4CLj', 'zhgCpRI57SjdHK20bZPW', 'samanmal rooms', '153/B,Gamman Road,Aluthgama , Bandaragama.', '1000000000', 'house', 'sale', 'ready to move', 'furnished', '', '500000000', '1', '1', '4', '123', '12', '2', '2', 'available', 'no', 'no', 'no', 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', '2E9wacp80nUETJQVtHmi.jpeg', 'GKx5rsuVG5uT9tYFFFZj.jpeg', 'TifFvLASTvKgJfsfYEOu.jpeg', '48wNCTnpr7fEZ3uzMNos.jpeg', 'G4TYBsnasz7IxiopvBRS.jpeg', 'stay where you hearts smile', '2023-09-26', 0, '', 0, 0, ''),
('XvNOupweGU7Ti385WV87', 'zhgCpRI57SjdHK20bZPW', 'tharumal', '153/B,Gamman Road,Aluthgama , panadura', '12000', '12000', 'sale', 'ready to move', 'furnished', '', '120', '1', '1', '0', '', '10', '2', '2', 'available', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', '9d2Zk8kNcateX7FlPOLy.jpeg', '', '', '', '', 'best', '2023-10-10', 0, '', 0, 0, ''),
('QFCnHUHErUexhP5eggQl', 'NVnCkIC4tnqfkUL4vdd8', 'hirumal', 'Boralla', '12000', 'shop', 'rent', 'ready to move', 'furnished', '', '2000', '0', '1', '1', '', '10', '2', '3', 'available', 'no', 'no', 'no', 'no', 'yes', 'yes', 'yes', 'no', 'no', 'no', 'no', 'yes', 'Mp8t5LxveAmoriKuVLcR.png', '', '', '', '', 'good for your business', '2023-10-20', 0, '', 0, 0, ''),
('ush8hVgp3fEuhlyPcVSc', 'r0p8IrMCIraAglBUxw2D', 'Flat', 'No.100 Athurugiriya Road Malabe, Malabe', '30000', 'flat', 'rent', 'ready to move', 'furnished', '', '15000', '5', '3', '3', '', '6', '5', '5', 'available', 'no', 'yes', 'no', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'no', 'no', 'yes', 'aCO8OnjpHMS1WspjbYda.jpg', 'j3RNuMSHaT40DsFbqKkj.jpg', 'urpsMwCtDVngTCDqqU15.jpg', '9VohIqo4s2zPcRJjpDrA.jpg', '90U5wQUOHI4OSxS0cNG6.jpg', 'Group 10 boys or 5 girls can be accommodate with this flat ', '2025-03-22', 0, '', 0, 0, ''),
('Z5qzsLN0V2OPbWepCak2', 'Dr61jD8JyJlSlpfS9m0V', 'Guest House', 'No.80 Athurugiriya Road Malabe, Malabe', '30000', 'house', 'sale', 'ready to move', 'semi-furnished', '', '15000', '2', '1', '0', '', '5', '2', '2', 'available', 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', '03Rk1IGX9IWZp0jMjHCS.jpg', 'wxduJONLcJOQHfDQKN6c.jpg', 'OpZxvDJXUqhww0OW7OnA.jpg', 'oMBtSGhjisdC0RkbSYyW.jpg', 'HIOKHLxaIvQmP4ek9hW1.jpg', 'Best guest house in the area with friendly environment', '2025-03-23', 0, '', 0, 0, ''),
('C7qjWyZBCKbmIG04G3sZ', 'r0p8IrMCIraAglBUxw2D', 'Guest House 2', 'No.300 Pittugala Malabe', '35000', 'house', 'rent', 'ready to move', 'unfurnished', '', '10000', '2', '1', '0', '', '3', '2', '1', 'not available', 'no', 'no', 'no', 'no', 'no', 'no', 'yes', 'yes', 'yes', 'no', 'no', 'no', 'UDxIsDJdRNoJAT3MJNle.jpg', 'meZ20OKcR390tAClYude.jpg', '4yudtVxGJIV3Wvc9pD00.jpg', 'bt3PnsIMNksTHb6e0qW0.jpg', 'OVSLqTwiMC5JKv5Am03L.jpg', 'Best suite for university students as this is near to SLIIT university and only boys are allowed.', '2025-04-27', 0, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` varchar(20) NOT NULL,
  `property_id` varchar(20) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `property_id`, `sender`, `receiver`, `date`) VALUES
('kU2NlM7wDat1glNQipwg', 'RBzt7ugwhpGKfPmo4CLj', 'jDtw8aorpPnmk3CrpXHa', 'zhgCpRI57SjdHK20bZPW', '2023-10-03'),
('3CoeVtWeLhRv8lcEDFkg', 'RBzt7ugwhpGKfPmo4CLj', 'zhgCpRI57SjdHK20bZPW', 'zhgCpRI57SjdHK20bZPW', '2023-10-04'),
('MMUaNODhLMkeEDn1OgNz', 'XvNOupweGU7Ti385WV87', '1AififqU0AohExyXrzhf', 'zhgCpRI57SjdHK20bZPW', '2023-10-10'),
('3Saaa3Ugkdw6zrhHW5JY', 'QFCnHUHErUexhP5eggQl', 'NVnCkIC4tnqfkUL4vdd8', 'NVnCkIC4tnqfkUL4vdd8', '2023-10-20'),
('ekH6zUwIMiNs6srWJWlm', 'Z5qzsLN0V2OPbWepCak2', 'mlMkGM7IBWapouKUDx4B', 'Dr61jD8JyJlSlpfS9m0V', '2025-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id` varchar(20) NOT NULL,
  `property_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`id`, `property_id`, `user_id`) VALUES
('BDxF9T7Xx24aQaGUEYjx', 'XkLIULnMZetrnC6Z1dVL', 'zhgCpRI57SjdHK20bZPW'),
('eyJH92n9EYA46AgIpK1W', 'XvNOupweGU7Ti385WV87', '1AififqU0AohExyXrzhf'),
('NNcVMeom2sDdPDCH9HnE', 'RBzt7ugwhpGKfPmo4CLj', 'zhgCpRI57SjdHK20bZPW'),
('aIYBYzTUYdmEyduxdPoE', 'QFCnHUHErUexhP5eggQl', 'NVnCkIC4tnqfkUL4vdd8'),
('h4hO9QfvziMDCczN4aYi', 'Z5qzsLN0V2OPbWepCak2', 'Dr61jD8JyJlSlpfS9m0V'),
('ru5A7gIkSPQgsCZhU4DN', 'ush8hVgp3fEuhlyPcVSc', 'Dr61jD8JyJlSlpfS9m0V'),
('1woyZ20DRqoTwApXXFy7', 'Z5qzsLN0V2OPbWepCak2', 'mlMkGM7IBWapouKUDx4B'),
('RAecJUGlmq2HocRlhpwX', 'C7qjWyZBCKbmIG04G3sZ', 'r0p8IrMCIraAglBUxw2D'),
('4hPy9IUn8QD226WZAchh', 'C7qjWyZBCKbmIG04G3sZ', 'BenghSQex8X3T1GgyH9t'),
('ACMeVameP4TRJavfcWJk', 'Z5qzsLN0V2OPbWepCak2', 'BenghSQex8X3T1GgyH9t');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `last_active` date DEFAULT NULL,
  `User_active_tatus` enum('active','inactive') DEFAULT 'active',
  `sso_provider` varchar(50) DEFAULT NULL,
  `sso_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `email`, `password`, `type`, `unique_id`, `status`, `img`, `lname`, `last_active`, `User_active_tatus`, `sso_provider`, `sso_id`) VALUES
('bGPbaOXvepVtqYdY6WEA', 'saman', '0771378637', 'saman@gmail.com', '2df806ae8cc8cc3cfc72edeb05436a162b248e9d', '0', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('jZKXXjoKKC6SQfwCVp70', 'sanju', '0112121224', 'sanju@gmail.com', '47f10db6bd41f394d2514249987d23de96a09998', 'B', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('p190gl4kJrH4rUkYuUW3', 'raj', '0764551783', 'raj@gmail.com', '40f8fc38bbdec0d6e7a7dc6fb7dd3a0e8de6e223', 'B', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('Fi7wg3TyUFA4jrv0Q0Nk', 'samanali', '0764895613', 'samanali@gmail.com', '74f6554fe5c10104971acb47420b9dcc47bfdb21', 'S', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('9WaqTKv6uSqLu94XmiYm', 'Nimal perera', '0112121224', 'nimal@gmail.com', 'e602dbd63b495f61db8953cce9bd7dceec1babff', 'S', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('zhgCpRI57SjdHK20bZPW', 'abc', '078945612', 'abc@gmail.com', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'B', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('jDtw8aorpPnmk3CrpXHa', 'shaveen', '076456218', 'shaveen@gmail.com', '06cd6dd4edf018f1723285b014d2fcc4b6a2db6c', 'B', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('1AififqU0AohExyXrzhf', 'paul', '0702054177', 's.p.d.paul1026@gmail.com', '183723726a927563ad46963f2138cc147d04cea0', 'B', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('NVnCkIC4tnqfkUL4vdd8', 'nadun', '2233335687', 'nadun@gmail.com', '5a4b0cebaccbdea73928244a89273ed29392c18d', 'S', 0, '', '', '', '0000-00-00', '', NULL, NULL),
('Ay8A0pPrXXPfdzuiYwL8', 'ravi', '55665556', 'ravi@gmail.com', 'aa153b5d1fcb55096034df7a27565f4297f195d2', 'S', 0, '', '', 'roister', '0000-00-00', '', NULL, NULL),
('jFmjrvV62CVbZMs3blCa', 'Anu', '55665556', 'anu@gmail.com', 'e067b0486639afb997c04c24de3cb95bb74f6b23', 'S', 0, '', 'pic-2.png', 'Kanu', '0000-00-00', '', NULL, NULL),
('MF1mK8gqOflNrl8I5qjy', 'Chathuri', '0776349891', 'chathuri@gmail.com', '884d30ba6ab59447c2232ed31edbd8f114979c2f', 'S', 0, '', 'pic-4.png', 'Ranasinghe', '0000-00-00', '', NULL, NULL),
('r0p8IrMCIraAglBUxw2D', 'Nimsara Perera', '0702054188', 'ranbpereraa@gmail.com', 'c9b359951c09c5d04de4f852746671ab2b2d0994', 'S', 0, '', '2024_04_15_13_49_IMG_4582.JPG', '.....', NULL, 'active', NULL, NULL),
('Dr61jD8JyJlSlpfS9m0V', 'Binowan', '740042430', 'binowanperera@gmail.com', 'e95878d6ebac2985df09df1d60024111a5d35a3d', 'Sseller', 0, '', 'download (3).jpg', 'Perera', NULL, 'active', NULL, NULL),
('vuSMBCZWsvBZiiEObrwv', 'Binowan', '0740034423', 'ranbperera12@gmail.com', '3faaf9c46c6182f00d024f19f16d832cf1fed02d', 'Buyer', 0, '', 'img_0556.jpg', 'Silva', NULL, 'active', NULL, NULL),
('mlMkGM7IBWapouKUDx4B', 'Binuk ', '0742344573', 'binuksena@gmail.com', '3faaf9c46c6182f00d024f19f16d832cf1fed02d', 'Sseller', 0, '', 'download (4).jpg', 'Senanayake', NULL, 'active', NULL, NULL),
('9N0PxNf2stiUBOfIL3W8', 'Nimsara', '0712345678', 'ranbperera@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Seller', 0, '', 'TGDAmYh9GSyif18AJsR2.png', 'Binowan', NULL, 'active', NULL, NULL),
('NvaavrZUsSDHO6o7dzUL', 'Shamila ', '0751231234', 'shamila@gmail.com', 'b38b647f2c2b98143a7cd95a27c7dbcae3dca6e5', 'Seller', 0, '', 'eSLx7SDtRBtTSTa08w4c.JPG', 'Perera', NULL, 'active', NULL, NULL),
('mrxJxMFb2fg8dA5dzONL', 'Nimsara', '1234567888', 'binukdias@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Seller', 0, '', 'GoKDQVaWZYjhWJ3WGrA9.JPG', 'Binowan', NULL, 'active', NULL, NULL),
('Um5FG4JbL61LZkOkZiLd', 'Nimsara', '1234567869', 'nimsaraperera@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Seller', 0, '', 'lEw6PQZQlHzO8GGg1gO5.JPG', 'Binowan', NULL, 'active', NULL, NULL),
('h56RS83h3c0Fa7gLGCU4', 'Nimsara', '1233214565', 'testtest@gmail.com', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 'Seller', 0, '', 'te3iwHkTyj3FJK5G4oLs.JPG', 'Binowan', NULL, 'active', NULL, NULL),
('LS1uvRUjxM93neQ7WoQZ', 'Nimsara', '6542341233', 'perera@gmail.com', '3d7a8e1a881f751caa1eea0c3ce8f9cce2d54e71', 'Seller', 0, '', 'n4LUY9EykG4Kockvr86v.JPG', 'Binowan', NULL, 'active', NULL, NULL),
('U91OkTE8LUpFOJ39ulpB', 'Nimsara', '1233213454', 'ranbperera@yahoo.com', '9a828bf5b0881f7d68b3d35a6bec37b1c15d7f4d', 'Seller', 0, '', 'OkzvveLBcAThyKWbnYPL.JPG', 'Binowan', NULL, 'active', NULL, NULL),
('uWmFY8vAMhWBMjp8GRJa', 'Nimsara', '1321321321', 'ranbperera@gmail.lk', '9ec062c683c7ed4769acba2093deb22225f39be7', 'Buyer', 0, '', 'HzX8iGlGbdcu0N6FnDJz.JPG', 'Binowan', NULL, 'active', NULL, NULL),
('oOmJW7hiPHVRg4m9CSgC', 'Nimsara', '1321321322', 'ranbperera@msn.com', 'c8a7b3f2b35744a8aec56a1cf4ca6eacb3a7f583', 'Seller', 0, '', '18lwOF0MyI6cJFMEKt2p.JPG', 'Binowan', NULL, 'active', NULL, NULL),
('BenghSQex8X3T1GgyH9t', 'Nimsara', '0718709807', 'ranb@gmail.com', 'c9b359951c09c5d04de4f852746671ab2b2d0994', 'Sseller', 0, '', 'IMG_3494.JPG', 'Binowan', NULL, 'active', NULL, NULL),
('4EXTdoRy1o38SMiCaUpi', 'Nimsara', '0740042439', 'nimsarabinowan@gmail.com', 'f687a6a55d11b70f3a00697772fc3a88945aa4e6', 'Buyer', 0, '', 'IMG_3558.JPG', 'Binowan', NULL, 'active', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatapp`
--
ALTER TABLE `chatapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chatapp`
--
ALTER TABLE `chatapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
