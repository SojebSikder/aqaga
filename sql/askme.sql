-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 01:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `askme`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `ans_description` text NOT NULL,
  `post_id` varchar(200) NOT NULL,
  `ans_id` varchar(200) NOT NULL,
  `ans_status` enum('Publish','Unpublish') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `user_name`, `user_id`, `ans_description`, `post_id`, `ans_id`, `ans_status`, `created_at`, `updated_at`) VALUES
(84, 'sojebsikder', '15f422cd53036a', 'Yes. win32 api let us give to create gui application.', '15f6f193019f4a', '15f6f1969c7c6e', 'Publish', '2020-09-26 10:35:21', '2020-09-26 10:35:21'),
(85, 'sojebsikder', '15f422cd53036a', 'PHP is a good language. You can learn by php official documentation. Besides you can follow my \nblog http://localhost/math-contest/blog/\n\nThank you. Hope you like it.', '15f6f19e647b0c', '15f6f1a5a5526b', 'Publish', '2020-09-26 10:39:22', '2020-09-26 10:39:22'),
(87, 'sojebsikder', '15f422cd53036a', '<b>বাংলাদেশ </b><u>প্রযুক্তিতে </u>অনেক এগিয়েছে বলে মন্তব্য করেছেন ডাক ও টেলিযোগাযোগ মন্ত্রী মোস্তফা জব্বার। তিনি বলেন, ‘পৃথিবীর সঙ্গে এখন বাংলাদেশ তাল মিলিয়ে চলে। ২০২১ সালে সারা পৃথিবী ফাইভ-জি’র দিকে যাবে, তখন বাংলাদেশেও ফাইভ-জি সেবা চালু করবে।’\nসোমবার (১৮ নভেম্বর) সকালে নেত্রকোনা জেলা প্রশাসন সম্মেলন কক্ষে মতবিনিময় সভায় তিনি এসব কথা বলেন। জেলা প্রশাসনের পক্ষ থেকে শেখ হাসিনা বিশ্ববিদ্যালয়ের কাছে জমি হস্তান্তর উপলক্ষে ওই সভার আয়োজন করা হয়।\nটেলিযোগাযোগ মন্ত্রী বলেন, ‘আমরা ২০০৮ সালে ডিজিটাল বাংলাদেশের কথা বলেছি। সেখানে জার্মানি ২০১৬ সালে চতুর্থ শিল্প বিপ্লব বা ডিজিটাল দেশের কথা বলেছে। বাংলাদেশ এখন সারা পৃথিবীর পিছিয়ে পড়া দেশগুলোর জন্য উদাহরণ। কীভাবে পিছিয়ে পড়া একটি দেশকে এগিয়ে নিতে হয় তার উদাহরণ সৃষ্টি করেছেন প্রধানমন্ত্রী শেখ হাসিনা।’\n২০২১ সালে আরও একটি বঙ্গবন্ধু স্যাটেলাইট চালুর কথা তুলে ধরে মোস্তফা জব্বার বলেন, ‘দেশের প্রতিটি শিক্ষা প্রতিষ্ঠান অল্প কয়েক দিনের মধ্যেই ইন্টারনেট সেবার আওতায় চলে আসবে। আমাদের শিক্ষার্থীরা এসব সেবা নিতে পারবে।’\nশেখ হাসিনা বিশ্ববিদ্যালয়ের উপাচার্য ড. রফিক উল্লাহ খানের সভাপতিত্বে এবং জেলা প্রশাসক মঈন উল ইসলামের সঞ্চালনায় সভায় আরও বক্তব্য রাখেন—নেত্রকোনা-৫ আসনের সংসদ সদস্য ওয়ারেসাত হোসেন বেলাল বীরপ্রতীক, প্রধানমন্ত্রী কার্যালয়ের সচিব সাজ্জাদুল হাসান, জেলা পরিষদ চেয়ারম্যান প্রশান্ত কুমার রায়, পুলিশ সুপার আকবর আলী মুন্সি, পৌর মেয়র নজরুল ইসলাম খান, জেলা আওয়ামী লীগের সভাপতি মতিউর রহমান খান, যুগ্ম-সাধারণ সম্পাদক নূর খান মিঠু, রেট ক্রিসেন্ট সম্পাদক গাজী মোজ্জাম্মেল হক টুকু প্রমুখ।', '15f70321821471', '15f70322a87af5', 'Publish', '2020-09-27 06:33:14', '2020-09-27 06:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `follow_id` varchar(200) NOT NULL,
  `sender_id` varchar(200) NOT NULL,
  `receiver_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `follow_id`, `sender_id`, `receiver_id`) VALUES
(122, '15f72ce3a3fb07', '15f422cd53036a', '15f439c159e76d'),
(123, '15f756f4cbd4fe', '15f439c159e76d', '15f422cd53036a');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `notification_type` text NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('read','unread') NOT NULL,
  `created_at` datetime NOT NULL,
  `notification_id` varchar(200) NOT NULL,
  `sentFrom` varchar(200) NOT NULL,
  `ref` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_name`, `notification_type`, `message`, `status`, `created_at`, `notification_id`, `sentFrom`, `ref`) VALUES
(1, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:49:48', '15f756dfc2a95b', 'sikdersojeb', '15f70321821471'),
(2, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:49:51', '15f756dffe9ef1', 'sikdersojeb', '15f70321821471'),
(3, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:49:53', '15f756e01c0d8f', 'sikdersojeb', '15f70321821471'),
(4, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:49:55', '15f756e033471a', 'sikdersojeb', '15f70321821471'),
(5, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:50:19', '15f756e1b4b2a3', 'sikdersojeb', '15f70321821471'),
(6, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:50:24', '15f756e206fdc0', 'sikdersojeb', '15f70321821471'),
(7, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:50:43', '15f756e333af0b', 'sikdersojeb', '15f70321821471'),
(8, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:51:29', '15f756e6157aba', 'sikdersojeb', '15f70321821471'),
(9, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:52:50', '15f756eb226ae1', 'sikdersojeb', '15f6f19e647b0c'),
(10, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:55:11', '15f756f3f0f4b2', 'sikdersojeb', '15f70321821471'),
(11, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:56:43', '15f756f9bb4e2a', 'sikdersojeb', '15f70321821471'),
(12, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:57:06', '15f756fb2e22a4', 'sikdersojeb', '15f70321821471'),
(13, 'sojebsikder', 'like', '', 'unread', '2020-10-01 11:57:38', '15f756fd29f733', 'sikdersojeb', '15f70321821471'),
(14, 'sojebsikder', 'like', '', 'unread', '2020-10-01 12:00:48', '15f757090ad403', 'sikdersojeb', '15f70321821471'),
(15, 'sojebsikder', 'like', '', 'unread', '2020-10-01 12:02:24', '15f7570f03efca', 'sikdersojeb', '15f70321821471'),
(16, 'sojebsikder', 'like', '', 'unread', '2020-10-01 12:02:44', '15f7571046c1d6', 'sikdersojeb', '15f70321821471'),
(17, 'sojebsikder', 'like', '', 'unread', '2020-10-01 12:02:47', '15f757107341ee', 'sikdersojeb', '15f6f19e647b0c');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_author` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(200) NOT NULL,
  `post_name` varchar(200) NOT NULL,
  `post_id` varchar(200) NOT NULL,
  `post_status` enum('Publish','Unpublish') NOT NULL,
  `post_tag` text NOT NULL,
  `author_id` varchar(200) NOT NULL,
  `isAns` varchar(200) DEFAULT NULL,
  `visibility` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_author`, `created_at`, `updated_at`, `category`, `post_name`, `post_id`, `post_status`, `post_tag`, `author_id`, `isAns`, `visibility`) VALUES
(34, 'Can i make gui application using C Program', 'sojebsikder', '2020-09-26 10:34:24', '2020-09-26 10:34:24', '', 'Can i make gui application using C Program', '15f6f193019f4a', 'Publish', 'Can i make gui application using C Program', '15f422cd53036a', NULL, 'Anonymous'),
(35, 'How can i learn php to make a good website', 'sojebsikder', '2020-09-26 10:37:26', '2020-09-26 10:37:26', '', 'How can i learn php to make a good website', '15f6f19e647b0c', 'Publish', 'How can i learn php to make a good website', '15f422cd53036a', NULL, 'Anonymous'),
(36, 'ফাইভ-জি সেবা চালু ২০২১ সালে', 'sojebsikder', '2020-09-27 06:32:56', '2020-09-27 06:32:56', '', 'ফাইভ-জি সেবা চালু ২০২১ সালে', '15f70321821471', 'Publish', 'ফাইভ-জি সেবা চালু ২০২১ সালে', '15f422cd53036a', NULL, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_status` enum('Publish','Unpublish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `cat_name`, `cat_status`) VALUES
(1, 'Science', 'Publish'),
(2, 'Programming', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `ans_id` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `body` text NOT NULL,
  `comment_id` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_id` varchar(200) NOT NULL,
  `post_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post_author` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_info`
--

CREATE TABLE `post_info` (
  `id` int(11) NOT NULL,
  `post_id` varchar(200) DEFAULT NULL,
  `post_keywords` text DEFAULT NULL,
  `post_category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_info`
--

INSERT INTO `post_info` (`id`, `post_id`, `post_keywords`, `post_category`) VALUES
(19, '15f6f193019f4a', 'Can,i,make,gui,application,using,C,Program,', ''),
(20, '15f6f19e647b0c', 'How,can,i,learn,php,to,make,a,good,website,', ''),
(21, '15f70321821471', 'ফাইভ-জি,সেবা,চালু,২০২১,সালে,', ''),
(22, '15f71e6d10a84f', 'test,', ''),
(23, '15f74567d791e3', 'test,', ''),
(24, '15f746807721b0', 'testing,', ''),
(25, '15f746933c038a', 'How,to,create,own,askme,', ''),
(26, '15f746d0e3b875', 'asasa,', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_reply`
--

CREATE TABLE `post_reply` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `comment_id` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `reply_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `post_id` varchar(200) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_login` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `user_registered` datetime NOT NULL,
  `user_status` enum('active','deactive') NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `user_job` varchar(200) DEFAULT NULL,
  `user_about` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_login`, `user_pass`, `user_name`, `user_email`, `user_id`, `user_registered`, `user_status`, `display_name`, `profile_image`, `user_job`, `user_about`) VALUES
(3, 'sojebsikder@gmail.com', '$2y$10$xV28O6Ajy5KQoFRgMI5WIuDjldmqcVMd3odgW2VDV5yYKtp7idlf2', 'sojebsikder', 'sojebsikder@gmail.com', '15f422cd53036a', '0000-00-00 00:00:00', 'active', 'sojebsikder', 'assets/images/profile/Assassins_Creed_4-wallpaper-9669711.jpg', 'Programmer, Web Developer', NULL),
(4, 'sikdersojeb@gmail.com', '$2y$10$DAqnxlM3RaRA3TF8lKVEGuAm65mtbBd2PdCHF7JmCQoDW/.1v9Wn2', 'sikdersojeb', 'sikdersojeb@gmail.com', '15f439c159e76d', '0000-00-00 00:00:00', 'active', 'sikdersojeb', 'assets/images/profile/Fractal_Lion-wallpaper-10874951.jpg', 'Softwer Engineer', NULL),
(8, 'test@gmail.com', '$2y$10$4H3H.pVOblTGXt6DApipN.RlK5sePHQSqXk80r8A0iFARxhpM597i', 'test', 'test@gmail.com', '15f62a93d4fde7', '0000-00-00 00:00:00', 'active', 'test', 'assets/images/default/avatar.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_bookmark`
--

CREATE TABLE `user_bookmark` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `bookmark_id` varchar(200) NOT NULL,
  `post_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `web_title` varchar(200) NOT NULL,
  `web_slogan` varchar(200) NOT NULL,
  `about_us` text NOT NULL,
  `contact_us` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `web_title`, `web_slogan`, `about_us`, `contact_us`, `email`, `address`, `description`, `keywords`) VALUES
(1, 'AskMe', 'Ask Everything and get Answer', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`sender_id`,`receiver_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_info`
--
ALTER TABLE `post_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_reply`
--
ALTER TABLE `post_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_EMAIL` (`user_email`),
  ADD UNIQUE KEY `UNIQUE_USERNAME` (`user_name`) USING BTREE;

--
-- Indexes for table `user_bookmark`
--
ALTER TABLE `user_bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_info`
--
ALTER TABLE `post_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `post_reply`
--
ALTER TABLE `post_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_info`
--
ALTER TABLE `rating_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_bookmark`
--
ALTER TABLE `user_bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
