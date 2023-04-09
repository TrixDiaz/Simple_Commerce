-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 06:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `description`, `price`, `image`) VALUES
(5, 'Shampoo', 'Grooming', 'to treat bacterial infections, skin rashes, and dandruff in pets. mild to prevent the loss of natural oils. It still gets the dirt out while protecting his skin and coat.', 469, 'Shampoo1.jpg'),
(6, 'Toothbrush', 'Grooming', 'pick a peaceful time to brush the teeth of your pet, a toothbrush with slanted handles that you can use for your pet with ease.', 51, 'tootbursh.jfif'),
(7, 'Paw cleaner', 'Grooming', 'use this paw cleanser to make cleaning easier and faster than battling with cloths and buckets of water.', 500, 'Cleaner1.jpg'),
(8, 'Perfume', 'Grooming', 'regarding our pets, we should use fragrances and scented items with caution. Directly applying strongly fragrant shampoos or sprays to a pet may result in skin responses, nausea, lethargy, or even airway irritation.', 342, 'Perfume1.jpg'),
(9, 'Travel Cage', 'Accessories', 'a well-built, easily cleanable cage with a carrying handle at the top for pet travel convenience.', 113, 'Cage1.jpg'),
(10, 'Harness', 'Accessories', 'a pet harness is a piece of gear made of webbing straps that loop almost completely around the chest of an animal and fasten together using side-release buckles.', 498, 'Harness1.jpg'),
(11, 'Toy set', 'Accosseries', 'a toy can assist your pet to avoid being bored and stop the emergence of certain behavioral behaviors.', 795, 'Toys.jpg'),
(12, 'Beds and furniture', 'Accessories', 'products that you can use to make your pets comfortable with the surroundings.', 879, 'bed1.jpg'),
(13, 'Pet clothes', 'Accessories', 'pets can wear clothes made specifically for them. Most of the pet clothing available now is designed for little dogs, class=\"gallery-item\" although certain products are also available for larger dogs and even cats.', 202, 'clothes1.jpg'),
(14, 'Pet vitamins', 'Essentials', 'vitamins benefit an animal by assisting in the regulation of bodily processes, maintaining bodily h class=\"gallery-item\"ealth, and fostering resistance to illnesses. A vitamin shortage can cause illness or even death.', 498, 'vitamins1.jpg'),
(15, 'Tick and Flea Preventive', 'Essentials', 'various products used for controlling flea and/or tick infestations on your pet and preventing infestations within your home make up flea and tick prevention.', 300, 'tea1.jpg'),
(16, 'Dog Food', 'Food', 'composed of meats, meat byproducts, cereals, grains, vitamins, and minerals to provide your dog with the proper nutrients and balance.', 1049, 'dogfood1.jpg'),
(17, 'Cat food', 'Food', 'our grain-free, organic, and nutritious cat chow is packed with the nutrients your cat needs.', 1200, 'catfood.jpg'),
(18, 'Bird Food', 'Food', 'variety of seeds, nuts, dried fruits, and vitamins are all present in this bird seed.', 800, 'birdfood.jpg'),
(19, 'Fish pellets', 'Food', '\r\nthey are a practical and simple method of feeding your fish. for easier handling, more equal intake, and less dust.', 225, 'fishfood.jpg'),
(20, 'sample', 'Food', 'sample', 213, 'dogfood1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(250) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `contact_number` bigint(10) DEFAULT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `profile_picture` varchar(200) DEFAULT NULL,
  `role` varchar(5) NOT NULL,
  `user_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `age`, `birth_date`, `contact_number`, `user_name`, `user_password`, `profile_picture`, `role`, `user_created`) VALUES
(1, 'admin admin', 20, '2023-01-17', 9451102461, 'admin', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', NULL, 'ADMIN', '2021-06-02'),
(21, 'user user', 25, '2023-01-19', 9238208986, 'user', '$2y$10$khM/baiIpdpOF.MRdsOi.O1LDXtvO.5h9lr8yVtgtL1jdEKyX6tAm', NULL, 'USER', '2023-01-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
