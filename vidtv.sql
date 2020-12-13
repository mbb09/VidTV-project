-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 08:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vidtv`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(0, 'Sports'),
(0, 'Technology'),
(0, 'Gaming'),
(0, 'Lifestyle'),
(0, 'News'),
(0, 'Sports'),
(0, 'Gaming'),
(0, 'Sports'),
(1, 'Gaming'),
(2, 'Technology'),
(3, 'Lifestyle'),
(4, 'Music');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postedBy` varchar(50) NOT NULL,
  `videoId` int(11) NOT NULL,
  `responseTo` int(11) NOT NULL,
  `body` text NOT NULL,
  `datePosted` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `commentId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `commentId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `userTo` varchar(50) NOT NULL,
  `userFrom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` int(11) NOT NULL,
  `videoid` int(11) NOT NULL,
  `filePath` varchar(256) NOT NULL,
  `selected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `videoid`, `filePath`, `selected`) VALUES
(1, 16, 'uploads/videos/thumbnails5fca8a60e27b5.mp4', 1),
(2, 17, 'uploads/videos/thumbnails5fca8a8a7aa74.mp4', 1),
(3, 18, 'uploads/videos/thumbnails5fca8b23bc2f3.mp4', 1),
(4, 19, 'uploads/videos/thumbnails5fca8b845a5ba.mp4', 1),
(5, 20, 'uploads/videos/thumbnails5fca8f478ade7.mp4', 1),
(6, 21, 'uploads/videos/thumbnails5fca919358c55.mp4', 1),
(7, 22, 'uploads/videos/thumbnails5fca930f5de73.mp4', 1),
(8, 23, 'uploads/videos/thumbnails5fca9314ba68f.mp4', 1),
(9, 24, 'uploads/videos/thumbnails5fca931a31d32.mp4', 1),
(10, 25, 'uploads/videos/thumbnails5fd23273a6f74.mp4', 1),
(11, 26, 'uploads/videos/thumbnails5fd2327d24b5f.mp4', 1),
(12, 27, 'uploads/videos/thumbnails5fd23457675a1.mp4', 1),
(13, 28, 'uploads/videos/thumbnails5fd234b51fcdf.mp4', 1),
(14, 29, 'uploads/videos/thumbnails5fd65735201a7.mp4', 1),
(15, 30, 'uploads/videos/thumbnails5fd6573d8e20b.mp4', 1),
(16, 31, 'uploads/videos/thumbnails5fd65e3e6823c.mp4', 1),
(17, 32, 'uploads/videos/thumbnails5fd65e4d9e337.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signUpDate` datetime NOT NULL DEFAULT current_timestamp(),
  `profilePic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(2, 'Mazen', 'Bannout', 'mbb09', 'mbb09@mail.aub.edu', 'Spa', '2020-12-10 16:10:23', '0'),
(3, 'Ma', 'Ba', 'mbb', 'mbb0@mail.aub.edu', '123', '2020-12-10 16:28:08', '0'),
(4, 'Vfdbf', 'Fgbfg', 'mbbb', 'mbb00@mail.aub.edu', '123', '2020-12-10 16:32:06', '0'),
(5, 'Vdbdgbgf', 'Bfgng', 'mbbbb', 'mbb00b@mail.aub.edu', '123', '2020-12-10 16:34:40', '0'),
(6, 'Jbhjb', 'Nnjln', 'mnjjlj', 'm@mail.com', '123', '2020-12-10 16:57:36', '0'),
(7, 'Wkexwkckjf', 'W;c;cj', 'ckjekcb', 'c@mail.com', '1234', '2020-12-10 17:05:49', '0'),
(8, 'Nlsdk', 'Kcnl', 'ckjwc', 'a@mail.com', 'a123', '2020-12-12 23:49:05', ''),
(9, 'Dvdfv', 'Dvdfv', 'dgbt', 'd@mail.com', 'd123', '2020-12-12 23:53:49', ''),
(10, 'Dvdfv', 'Dvdfv', 'dgbtc', 'dc@mail.com', 'd12345', '2020-12-13 11:49:00', ''),
(11, 'Dvdfv', 'Dvdfv', 'dgbtcg', 'dcd@mail.com', 'd12345', '2020-12-13 11:58:29', ''),
(12, 'Knln', 'Nlknl', 'njln', 'n@mail.com', 'c12345', '2020-12-13 12:06:50', ''),
(13, 'Cjcjeoe', 'Erljjnfljeb', 'vvvv', 'v@mail.com', '123', '2020-12-13 13:41:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `vids`
--

CREATE TABLE `vids` (
  `id` int(11) NOT NULL,
  `uploadedBy` varchar(50) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `privacy` int(11) NOT NULL,
  `filePath` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `uploadDate` datetime NOT NULL DEFAULT current_timestamp(),
  `views` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vids`
--

INSERT INTO `vids` (`id`, `uploadedBy`, `title`, `description`, `privacy`, `filePath`, `category`, `uploadDate`, `views`, `duration`) VALUES
(1, 'replacing by', 'Brazil', 'mkjkbkjb', 0, 'uploads/videos/5fc8f36a48e90.mp4', 0, '2020-12-03 16:17:14', 0, ''),
(2, 'replacing by', 'Brazil', ' mnmnm', 0, 'uploads/videos/5fca3eec7241f.mp4', 0, '2020-12-04 15:51:40', 0, ''),
(3, 'replacing by', 'Brazil', 'eefsfs', 0, 'uploads/videos/5fca4328535ad.mp4', 0, '2020-12-04 16:09:44', 0, ''),
(4, 'replacing by', 'Brazil', 'd mnsc s', 0, 'uploads/videos/5fca4351df911.mp4', 0, '2020-12-04 16:10:25', 0, ''),
(5, 'replacing by', 'Brazil', 'mmm', 0, 'uploads/videos/5fca60af042cb.mp4', 0, '2020-12-04 18:15:43', 0, ''),
(6, 'replacing by', 'Brazil', 'mmm', 0, 'uploads/videos/5fca60ef53473.mp4', 0, '2020-12-04 18:16:47', 0, ''),
(7, 'replacing by', 'Brazil', 'kjbcajkbd', 0, 'uploads/videos/5fca67615d939.mp4', 0, '2020-12-04 18:44:17', 0, ''),
(8, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/5fca7f643986d.mp4', 0, '2020-12-04 20:26:44', 0, ''),
(9, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/5fca7f7667ef3.mp4', 0, '2020-12-04 20:27:02', 0, ''),
(10, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/5fca8268c2e12.mp4', 0, '2020-12-04 20:39:36', 0, ''),
(11, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/5fca82a74b8e1.mp4', 0, '2020-12-04 20:40:39', 0, ''),
(12, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/5fca82c26248f.mp4', 0, '2020-12-04 20:41:06', 0, ''),
(13, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/5fca83662c7b3.mp4', 0, '2020-12-04 20:43:50', 0, ''),
(14, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/thumbnails5fca840587d97.mp4', 0, '2020-12-04 20:46:29', 0, ''),
(15, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/thumbnails5fca845b5cf43.mp4', 0, '2020-12-04 20:47:55', 0, '0'),
(16, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/thumbnails5fca8a60e27b5.mp4', 0, '2020-12-04 21:13:36', 0, '0'),
(17, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/thumbnails5fca8a8a7aa74.mp4', 0, '2020-12-04 21:14:18', 0, '0'),
(18, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/thumbnails5fca8b23bc2f3.mp4', 0, '2020-12-04 21:16:51', 0, '0'),
(19, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/thumbnails5fca8b845a5ba.mp4', 0, '2020-12-04 21:18:28', 0, '0'),
(20, 'replacing by', 'Black Ops', '\',;\';,m\';', 0, 'uploads/videos/thumbnails5fca8f478ade7.mp4', 0, '2020-12-04 21:34:31', 0, '0'),
(21, 'replacing by', 'Black Ops', 'n;nn', 0, 'uploads/videos/thumbnails5fca919358c55.mp4', 0, '2020-12-04 21:44:19', 0, '0'),
(22, 'replacing by', 'Black Ops', 'nmbmbm', 0, 'uploads/videos/thumbnails5fca930f5de73.mp4', 0, '2020-12-04 21:50:39', 0, '0'),
(23, 'replacing by', 'Black Ops', 'nmbmbm', 0, 'uploads/videos/thumbnails5fca9314ba68f.mp4', 0, '2020-12-04 21:50:44', 0, '0'),
(24, 'replacing by', 'Black Ops', 'nmbmbm', 0, 'uploads/videos/thumbnails5fca931a31d32.mp4', 0, '2020-12-04 21:50:50', 0, '0'),
(25, 'replacing by', 'Black Ops', 'fgbhgjmhj,', 0, 'uploads/videos/thumbnails5fd23273a6f74.mp4', 0, '2020-12-10 16:36:35', 0, '0'),
(26, 'replacing by', 'Black Ops', 'fgbhgjmhj,', 0, 'uploads/videos/thumbnails5fd2327d24b5f.mp4', 0, '2020-12-10 16:36:45', 0, '0'),
(27, 'replacing by', 'Black Ops', 'fgbhgjmhj,', 0, 'uploads/videos/thumbnails5fd23457675a1.mp4', 0, '2020-12-10 16:44:39', 0, '0'),
(28, 'replacing by', 'Black Ops', 'knlkn', 0, 'uploads/videos/thumbnails5fd234b51fcdf.mp4', 0, '2020-12-10 16:46:13', 0, '0'),
(29, 'replacing by', ';glbgl', ';mgf;bl', 0, 'uploads/videos/thumbnails5fd65735201a7.mp4', 0, '2020-12-13 20:02:29', 0, '0'),
(30, 'replacing by', ';glbgl', ';mgf;bl', 0, 'uploads/videos/thumbnails5fd6573d8e20b.mp4', 0, '2020-12-13 20:02:37', 0, '0'),
(31, 'replacing by', ';glbgl', ';mgf;bl', 0, 'uploads/videos/thumbnails5fd65e3e6823c.mp4', 0, '2020-12-13 20:32:30', 0, '0'),
(32, 'replacing by', ';glbgl', ';mgf;bl', 0, 'uploads/videos/thumbnails5fd65e4d9e337.mp4', 0, '2020-12-13 20:32:45', 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vids`
--
ALTER TABLE `vids`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vids`
--
ALTER TABLE `vids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
