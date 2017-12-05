-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2016 at 09:25 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `birds`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `image` varchar(120) NOT NULL,
  `u_number` varchar(20) NOT NULL,
  `u_type` varchar(20) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `email`, `username`, `password`, `image`, `u_number`, `u_type`) VALUES
(1, 'Neri', 'neri@ham.com', '', 'ac48a1b83910cea7e950f675f1213a45', '', '1610732', 'Admin'),
(2, 'Hamsoft', 'hamsoft2013@gmail.com', '', 'ac48a1b83910cea7e950f675f1213a45', '', '1610147', 'User'),
(3, 'Neri 4488', 'stack4488@gmail.com', '', 'ac48a1b83910cea7e950f675f1213a45', '', '1610609', 'User'),
(4, 'mugoya raymond', 'raysteph12@gmail.com', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '1610750', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `admin_client_chat`
--

CREATE TABLE IF NOT EXISTS `admin_client_chat` (
  `chat_id` int(12) NOT NULL,
  `chat_u_num` varchar(20) NOT NULL,
  `chat_msg` text NOT NULL,
  `chat_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chat_status` tinyint(1) NOT NULL DEFAULT '0',
  `chat_topic` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_client_chat`
--

INSERT INTO `admin_client_chat` (`chat_id`, `chat_u_num`, `chat_msg`, `chat_date_time`, `chat_status`, `chat_topic`) VALUES
(1, '1610750', 'hullo', '2016-10-02 22:16:10', 1, '1610750'),
(2, '1610732', 'Yes', '2016-10-02 22:16:43', 1, '1610750'),
(3, '1610750', 'watsap', '2016-10-02 22:20:29', 1, '1610750');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `name` varchar(100) NOT NULL,
  `resource` varchar(40) NOT NULL,
  `id_resource` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`name`, `resource`, `id_resource`) VALUES
('4.jpg', 'package', 1),
('data.png', 'package', 1),
('picture.jpg', 'package', 2),
('prod5.jpg', 'package', 2),
('', 'package', 2),
('img.jpg', 'package', 2);

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE IF NOT EXISTS `itinerary` (
  `id_itinerary` int(11) NOT NULL,
  `id_packages` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id_package` int(12) NOT NULL,
  `title` varchar(45) NOT NULL,
  `objective` varchar(45) NOT NULL,
  `p_length` int(11) NOT NULL,
  `timing` varchar(45) NOT NULL,
  `sites` varchar(45) NOT NULL,
  `targets` varchar(45) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id_package`, `title`, `objective`, `p_length`, `timing`, `sites`, `targets`, `details`) VALUES
(1, 'BIRDS & BUTTERFLIES OF UGANDA TOUR.', 'Tour At-A-Glance', 12, 'Nov â€“ March, May â€“ August', 'Mabira, Budongo, Semiliki and Kibale Forests.', 'African Green Broad bill, Dwarf Honey Guide, ', 'Birding and butterfly watching go together like peas and carrots, especially here in Africa. For many wildlife safaris, especially in Uganda, birding is best done in the morning hours. As it gets warmer, the birds tend to relax in the shade while butterflies become more active, which allows a natural shift of our attention to another set of beautiful flying creatures.\r\n\r\nOur Birds and Butterflies of Uganda tour has been well designed to bring a memorable birding and wildlife safari experience in Uganda. Photographers will have no reason to rest throughout the tour.'),
(2, 'BIRDS & BUTTERFLIES OF UGANDA TOUR.', 'Tour At-A-Glance', 19, 'Nov â€“ March, May â€“ August', 'Mabira, Budongo, Semiliki and Kibale Forests.', 'African Green Broad bill, Dwarf Honey Guide, ', 'Birding and butterfly watching go together like peas and carrots, especially here in Africa. For many wildlife safaris, especially in Uganda, birding is best done in the morning hours. As it gets warmer, the birds tend to relax in the shade while butterflies become more active, which allows a natural shift of our attention to another set of beautiful flying creatures.\r\n\r\nOur Birds and Butterflies of Uganda tour has been well designed to bring a memorable birding and wildlife safari experience in Uganda. Photographers will have no reason to rest throughout the tour.');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id_sites` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `size` varchar(100) NOT NULL,
  `habitat` text NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id_sites`, `title`, `size`, `habitat`, `details`) VALUES
(1, 'Kidepo Valley National Park', '1442 sq. km, Elevation: 900-1200m at the boarder with Sudan to 2750m at the top of Mt. Morungole, Bi', 'Semi-desert scrub, open thorn scrub, open thorn bush, long and short-grass open tree savanna, riparian woodland including Borassus and Kigelia woodland, thick â€œmiombo-likeâ€ woodland, montane forest and granite outcrops.', 'Kidepo is one of Ugandaâ€™s most spectacular parks. It harbors scenery unsurpassed in any other park in East Africa. Tucked into the corner of Ugandaâ€™s border with Sudan and Kenya, the park offers breathtaking savannah and mountain landscapes which end in a rugged horizon. A huge altitudinal range, correspondingly wide climatic conditions have evolved an extremely diverse flora. As a result the variety of animal species in the park is equally abundant including, many which are found nowhere else in Uganda.\r\n\r\nBirding Uganda in Kidepo valley National Park \r\nAccording to our records, Kidepo Valley is second only to Bwindi in Birdâ€™s diversity. Amongst the host of dry, eastern â€œspecialsâ€ not found in any other Ugandan national parks are some of East Africaâ€™s rarest and most sought after birds as Black-breasted Barbet and Karamoja Apalis.\r\n\r\nOther species that are in KIdepo include; Golden Pipit, Ring-necked Spurfowl, Taita Fiscal, Rufous Chatterer, Foxâ€™s Cisticola, Yellow and red spotted Barbet, Foxâ€™s Weaver, Lesser Kestrel, Pallid Harrier, Black-winged Pranticole, White-crested, Hartlaubâ€™s Turaccos, Dusky-turtle Dove, White-bellied Go-Away bird, Abyssinian Scimitar bill, Jacksonâ€™s and African-pied Hornbills, Yellow-billed Shrike, Eminâ€™s Shrike, Piapiac, Red-winged Lark, Black-rumped Waxbill. .The park has 23 of Ugandaâ€™s 32 Somali-Masai biome species. There are also 21 Afro-tropical highland species (recorded mainly from highlands of Lonyili, Morungole, Zulia and Lomej with their characteristic mosaic of forest, savanna and thicket). Notable species are Little Rock thrush and Brown Parisona, are in all other parks or IBAs. The site also has 16 Sudan and Guinea Savanna, and 4 Guinea Congo forest Biome species.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `admin_client_chat`
--
ALTER TABLE `admin_client_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`id_itinerary`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id_sites`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_client_chat`
--
ALTER TABLE `admin_client_chat`
  MODIFY `chat_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id_itinerary` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id_package` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id_sites` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
