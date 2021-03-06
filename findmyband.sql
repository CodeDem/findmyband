-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2017 at 05:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findmyband`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'I have one, you can take it :)', 'Pranita', 'Dhiraj', '2017-03-22 20:24:47', 'no', 1),
(2, 'Cool, Thank you Pranita :)', 'Dhiraj', 'Dhiraj', '2017-03-22 20:25:25', 'no', 1),
(3, 'Even I have one of Rosewood, if that is what your looking for feel free to pick it up from my place', 'Chinmay', 'Dhiraj', '2017-03-22 20:48:08', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(1, 'Pranita', 1),
(2, 'Chinmay', 1),
(3, 'Rohan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `info` varchar(150) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lang` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `info`, `lat`, `lang`, `type`) VALUES
(1, 'Musicians lab', 'Lakhamsi Napoo Road, Opp Matunga Gymkhana, Matunga, Dadar, Mumbai, Maharashtra 400019', 'Cost Per Hour Rs:300 Drums Included', 19.025187, 72.850388, 'jamroom'),
(2, 'Beats Studio', '4, Lakshami Nappu Rd Matunga Central Railway Workshop', 'Cost Per Hour Rs:500 Drums and guitar Included', 19.023129, 72.847641, 'jamroom'),
(3, 'BenchMark Studio', '216, Bhalchandra bhawan, Sir Bhalchandra Road, Behind Ruia College', 'Cost Per Hour: Rs:800', 19.024097, 72.851685, 'jamrooms');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(1, 'Dhiraj', 'Pranita', 'Pranita Thorat liked your post', 'post.php?id=1', '2017-03-22 20:24:34', 'yes', 'yes'),
(2, 'Dhiraj', 'Pranita', 'Pranita Thorat commented on your post', 'post.php?id=1', '2017-03-22 20:24:47', 'yes', 'yes'),
(3, 'Pranita', 'Dhiraj', 'Dhiraj Kadam commented on a post you commented on', 'post.php?id=1', '2017-03-22 20:25:26', 'no', 'yes'),
(4, 'Dhiraj', 'Chinmay', 'Chinmay Arolkar liked your post', 'post.php?id=1', '2017-03-22 20:47:31', 'no', 'yes'),
(5, 'Dhiraj', 'Chinmay', 'Chinmay Arolkar commented on your post', 'post.php?id=1', '2017-03-22 20:48:08', 'no', 'yes'),
(6, 'Pranita', 'Chinmay', 'Chinmay Arolkar commented on a post you commented on', 'post.php?id=1', '2017-03-22 20:48:08', 'no', 'yes'),
(7, 'Chinmay', 'Rohan', 'Rohan Parab liked your post', 'post.php?id=3', '2017-03-22 20:48:52', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(1, 'I need a Cajon Box for  Jam session, can any one arrange it?', 'Dhiraj', 'none', '2017-03-22 20:23:50', 'no', 'no', 2),
(2, 'Planning to go for a Jam at Benchmark Studio , Looking for a Drummer specifically from Blues Genere. Interested Ping here', 'Rohan', 'none', '2017-03-22 20:45:17', 'no', 'no', 0),
(3, 'Battels of Band was just awesome at Ramnarian Ruia college with Dhiraj Kadam on Drums and  Pranita Thorat on Lead Guitar', 'Chinmay', 'none', '2017-03-22 20:47:11', 'no', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_email`, `password`, `username`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(33, 'Admin', 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2017-03-15', './assets/images/profile_pics/defaults/head_belize_hole.png', 0, 0, 'no', ',Rohan,Pranita,Chinmay,Dhiraj,'),
(34, 'Dhiraj', 'Kadam', 'dhiraj@gmail.com', '432639de2357c9d560a9c3d022d3fc8a', 'Dhiraj', '2017-03-18', 'assets/images/profile_pics/Dhiraj1a3d9dc57fb021daf2f3eaa9036867e8n.jpeg', 1, 2, 'no', ',Admin,Pranita,Rohan,Chinmay,'),
(35, 'Rohan', 'Parab', 'rohan@gmail.com', 'c916d142f0dc7f9389653a164f1d4e9d', 'Rohan', '2017-03-18', './assets/images/profile_pics/defaults/head_sun_flower.png', 1, 0, 'no', ',Admin,Pranita,Dhiraj,Chinmay,'),
(36, 'Pranita', 'Thorat', 'pranita@gmail.com', '21280d737171afdd9fc23d9729b8fa80', 'Pranita', '2017-03-18', './assets/images/profile_pics/defaults/head_sun_flower.png', 0, 0, 'no', ',Admin,Dhiraj,Rohan,'),
(37, 'Chinmay', 'Arolkar', 'chinmay@gmail.com', '72264e113943a77136e9a82eecd01274', 'Chinmay', '2017-03-18', './assets/images/profile_pics/defaults/head_emerald.png', 1, 1, 'no', ',Admin,Dhiraj,Rohan,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
