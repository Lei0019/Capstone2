-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2025 at 02:56 AM
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
-- Database: `ifx`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `product_id`, `name`, `price`, `description`, `image`) VALUES
(1, 222, 'Wireless Bluetooth Headphones', 349, 'High-quality wireless headphones with noise cancellation and 20 hours of battery life. Perfect for music lovers and professionals.', './img/Wireless Bluetooth Headphones.webp'),
(3, 223, 'Smart Fitness Watch', 1679, 'A sleek and modern smartwatch designed to track fitness, monitor heart rate, and provide smart notifications.', 'img/smart watch.webp'),
(4, 224, 'Portable Blender', 263, 'Compact and powerful blender for smoothies and protein shakes. USB rechargeable and easy to clean.', 'img/Portable Blender.webp'),
(5, 225, 'Wireless Charging Pad', 572, 'A sleek and fast wireless charging pad compatible with all Qi-enabled devices.', 'img/Wireless Charging Pad.webp'),
(6, 226, 'Ergonomic Office Chair', 769, 'Comfortable and adjustable office chair with lumbar support. Perfect for home and office use.', 'img/Ergonomic Office Chair.webp'),
(7, 227, 'Smartphone Camera Lens Kit', 720, 'Enhance your smartphone photography with this high-quality lens kit, including macro, wide-angle, and fisheye lenses.', 'img/Smartphone Camera Lens Kit.webp'),
(8, 228, 'Gaming Mouse', 135, 'High precision gaming mouse with customizable buttons and RGB lighting, perfect for gamers.', 'img/Gaming Mouse.webp'),
(9, 229, '4K Action Camera', 849, 'Capture stunning 4K video and photos with this compact action camera. Waterproof and shockproof.', 'img/4K Action Camera.webp'),
(10, 230, 'Electric Toothbrush', 144, 'Rechargeable electric toothbrush with a 2-minute timer and various brushing modes for effective oral hygiene.', 'img/Electric Toothbrush.webp'),
(11, 231, 'Bluetooth Speaker', 499, 'Portable Bluetooth speaker with powerful sound, long battery life, and waterproof design.', 'img/Bluetooth Speaker.webp'),
(12, 232, 'Air Purifier', 326, 'Air purifier with HEPA filter to remove dust, allergens, and pollutants for cleaner air.', 'img/Air Purifier.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
