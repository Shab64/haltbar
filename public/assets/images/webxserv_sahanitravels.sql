-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2022 at 09:54 AM
-- Server version: 5.7.36-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webxserv_sahanitravels`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `logo` varchar(299) DEFAULT NULL,
  `slider` text,
  `home_section_1` text,
  `home_section_2` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `logo`, `slider`, `home_section_1`, `home_section_2`, `created_at`, `updated_at`) VALUES
(1, 'COVER.Maasai-e1619175922232.jpg', '[{\"image\":\"privatetrips.JPG\",\"title\":\"shahab\",\"button_name\":\"proceed\",\"desc\":\"Commodo qui iste tem\"},{\"image\":\"929f3b1f-64bd-4196-b447-c1719234e4ff.jpg\",\"title\":\"Booking  Servicess\",\"button_name\":null,\"desc\":\"Hello Service updated\"},{\"image\":\"faq-4.JPG\",\"title\":\"asd\",\"desc\":\"adddd\"}]', '[{\"image\":\"B31A241A-D805-4BEF-8E95-B717597E240C.jpeg\",\"trip_type\":\"Group Trips Updated\",\"desc\":\"Our luxury group trips go far beyond the basics to get deeper into your destination, its people, iconic places, and culture. We can arrange private access to numerous locations, accept invites to enjoy real experiences, and stay in top-notch accommodations because of our small group sizes of 10-12 travellers (rarely up to 16). From connecting with a travel expert to returning home with new friends and memorable experiences, we are committed to delivering a superior group travel experience. Updated\"},{\"image\":\"40491358-2F7A-4291-AE75-9ABE17B20431.jpeg\",\"trip_type\":\"Private Vacation\",\"desc\":\"Personal attention is an essential part of every trip with us. We have vacations tailored to your preferences and budget to the destination of your choice. Our team of travel specialists have crafted stress-free bucket list experiences just for you!\"}]', '{\"image\":[\"WhatsApp Image 2022-06-01 at 7.25.43 PM.jpeg\",\"reviewimg.jpg\",\"banner-img1.jpg\",\"faq-4.JPG\"],\"0\":{\"image\":\"about-us.jpg\"}}', '2022-07-08 08:16:57', '2022-07-08 12:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `cms_abouts`
--

CREATE TABLE `cms_abouts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `desc` text,
  `image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_abouts`
--

INSERT INTO `cms_abouts` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hello about Updated', 'This is about section Updated', '165674055413658f40-2dae-4715-b620-5b88bb22c5c3.jpg', '2022-07-02 05:42:34', '2022-07-02 00:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `cms_contacts`
--

CREATE TABLE `cms_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_contacts`
--

INSERT INTO `cms_contacts` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Contact Page Updated', 'Contact Page Description Updated', '1656742575download (13).jpg', '2022-07-02 00:08:15', '2022-07-02 01:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `cms_faqs`
--

CREATE TABLE `cms_faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_faqs`
--

INSERT INTO `cms_faqs` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'faq Updated', 'helo Updated', '1656742276cape-town-wine-tour.jpeg', '2022-07-02 06:11:16', '2022-07-02 01:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `cms_grouptrips`
--

CREATE TABLE `cms_grouptrips` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_grouptrips`
--

INSERT INTO `cms_grouptrips` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Group Trips Data Updated', 'Group Trips Description data Updated', '16567413871649667080855.jpg', '2022-07-02 05:56:27', '2022-07-02 00:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `cms_privatetrips`
--

CREATE TABLE `cms_privatetrips` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_privatetrips`
--

INSERT INTO `cms_privatetrips` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'At obcaecati officii Updated', 'Velit autem sunt a Updated', '1656741889Cafe-Del-Mar-beach-club-in-Canggu-Bali-Indonesia-11.jpg', '2022-07-02 06:04:49', '2022-07-02 01:04:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_abouts`
--
ALTER TABLE `cms_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_contacts`
--
ALTER TABLE `cms_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_faqs`
--
ALTER TABLE `cms_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_grouptrips`
--
ALTER TABLE `cms_grouptrips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privatetrips`
--
ALTER TABLE `cms_privatetrips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_abouts`
--
ALTER TABLE `cms_abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_contacts`
--
ALTER TABLE `cms_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_faqs`
--
ALTER TABLE `cms_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_grouptrips`
--
ALTER TABLE `cms_grouptrips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_privatetrips`
--
ALTER TABLE `cms_privatetrips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
