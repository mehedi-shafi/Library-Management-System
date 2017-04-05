-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 03:08 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookshelf`
--

CREATE TABLE `bookshelf` (
  `no.` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `book_id` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookshelf`
--

INSERT INTO `bookshelf` (`no.`, `user_id`, `status`, `book_id`, `genre`) VALUES
(1, 112001, 'read', 1110001, 'Novel'),
(2, 112001, 'read', 1110002, 'SciFi'),
(3, 112001, 'read', 1110003, 'SciFi'),
(4, 112001, 'read', 1110004, 'Novel'),
(5, 112001, 'read', 1110005, 'Fiction'),
(6, 112001, 'read', 1110006, 'Novel'),
(7, 112001, 'read', 1110007, 'SciFi'),
(8, 112001, 'read', 1110008, 'SciFi'),
(9, 112001, 'read', 1110010, 'SciFi'),
(10, 112002, 'read', 1110001, 'Novel'),
(11, 112002, 'read', 1110009, 'SciFi'),
(14, 212001, 'reading', 1110011, 'Fantasy'),
(15, 112001, 'reading', 1110011, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `summary` text NOT NULL,
  `availability` int(11) NOT NULL,
  `published_on` date NOT NULL,
  `img_src` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`book_id`, `book_name`, `genre`, `writer`, `summary`, `availability`, `published_on`, `img_src`) VALUES
(1110001, 'Dipu Number 2', 'Novel', 'Muhammod Jafor Iqbal', 'Dipu (Arun Saha), a boy of about twelve years lives with his father (Bulbul Ahmed ). Dipu''s father is a government officer and because of his transferable job, they arrive at a picturesque town. Dipu immediately develops a liking to this new town and his new school. He makes a lot of friends but starts a feud with the school bully Tarique (Shubhashish) on the very first day. Tarique, unable to intimidate Dipu tries many tricks on him and even beats him up one day. Though Dipu does not complain this to anybody, instead he contemplates to punish Tarique himself. But one day a small adventure atop a high water tank changes his feelings towards Tarique', 4, '1996-01-01', 'images/book_cover/dipu-number-2.png'),
(1110002, 'Tukunjil', 'SciFi', 'Muhammod Jafor Iqbal', 'A boy of school suddenly got a magnifying glass as gift and through which he met an alien from andromidra galaxy. They made amazing friendship. ', 4, '2006-06-01', 'images/book_cover/tukunjil.jpg'),
(1110003, 'Tratuler Jogot', 'SciFi', 'Muhammod Jafor Iqbal', 'Plotted on future after apocalyptic earth hopes for humanity dimmed. Would it be too much to expect love in a world where copotron is the only way human sees around? ', 3, '2003-02-05', 'images/book_cover/tratul.jpg'),
(1110004, 'Aj Himur Biye', 'Novel', 'Humayon Ahmed', 'Is it possible for Himu to be attached in string by getting married? They are not like us.', 2, '1999-02-05', 'images/book_cover/himur_biye.jpg'),
(1110005, 'Gabbu', 'SciFi', 'Muhammod Jafor Iqbal', 'Talented kids are not gifted they are talented by doing what do best. And being at ease with understanding things that they truly desire. Gabbu is one of them.', 3, '2006-02-05', 'images/book_cover/gabbu.jpg\r\n'),
(1110006, 'Ballpoint', 'Novel', 'Humayon Ahmed', 'Writing is not always a fun journey. Writers write what they want to express. They are the one because we have advanced and yet have the ability to look back to wait for a while to see what we have accomplished in the past. This book is dedicated for all the writers that works heart and soul where their weapon is a ball point', 4, '1999-02-08', 'images/book_cover/ballpoint.jpg'),
(1110007, 'Omega Point', 'SciFi', 'Humayon Ahmed', 'Is the development of human race infinity? Or will they one day stop and think that the end is reached and no way to move forward. or.. Is it possible that one day the necessity of human is done and gets erased from the face of earth. Will there ever be a point where we really can look back and edit the way we want things to be?', 3, '2017-02-10', 'images/book_cover/omegapoint.jpg'),
(1110008, 'Neuron E Onuronon', 'SciFi', 'Muhammod Jafor Iqbal', 'Neuron is the basic unit of our brain. How does it work? Is it just a pulse that we are controlled and feel with? How is a electric pulse is capable of this task?', 3, '2010-02-15', 'images/book_cover/neuron.jpg'),
(1110009, 'Octopus Er Chokh', 'SciFi', 'Muhammod Jafor Iqbal', 'A collection of 10 scientific stories from the writer.', 2, '2000-02-15', 'images/book_cover/octopus.jpg'),
(1110010, 'Ruhan Ruhan', 'SciFi', 'Muhammod Jafor Iqbal', 'In a distant future when the world is crumbled down to few remaining human being the resources are limited. Hopes for humanity''s future is at stake. War battle is all the leaders got. Is it possible for one man to change the course of humanity to a betterment or a man is too weak for making that happen?', 5, '2012-02-05', 'images/book_cover/ruhan.jpg'),
(1110011, 'A Game of Thrones', 'Fantasy', 'George R.R. Martin', 'Summers span decades. Winter can last a lifetime. And the struggle for the Iron Throne has begun.\r\n\r\nAs Warden of the north, Lord Eddard Stark counts it a curse when King Robert bestows on him the office of the Hand. His honour weighs him down at court where a true man does what he will, not what he must â€¦ and a dead enemy is a thing of beauty.\r\n\r\nThe old gods have no power in the south, Starkâ€™s family is split and there is treachery at court. Worse, the vengeance-mad heir of the deposed Dragon King has grown to maturity in exile in the Free Cities. He claims the Iron Throne', 3, '1996-08-06', 'images/book_cover/1489302862.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE `book_list` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`book_id`, `book_name`, `genre`) VALUES
(1110001, 'Dipu Number 2', 'Novel'),
(1110002, 'Tukunjil', 'SciFi'),
(1110003, 'Tratuler Jogot', 'SciFi'),
(1110004, 'Aj Himur Biye', 'Novel'),
(1110005, 'Gabbu', 'Fiction'),
(1110006, 'Ballpoint', 'Novel'),
(1110007, 'Omega Point', 'SciFi'),
(1110008, 'Neuron E Onuron', 'SciFi'),
(1110009, 'Octopus er Chokh', 'SciFi'),
(1110010, 'Ruhan Ruhan', 'SciFi'),
(1110011, 'A Game of Thrones', 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_of_taken` date NOT NULL,
  `date_of_return` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`user_id`, `book_id`, `date_of_taken`, `date_of_return`, `status`) VALUES
(112001, 1110001, '2017-02-01', '2017-02-11', 'ret'),
(112004, 1110002, '2017-02-06', '2017-02-16', 'ret'),
(112001, 1110011, '2017-04-01', '2017-04-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `no.` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_recieved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`no.`, `user_id`, `amount`, `date_recieved`) VALUES
(1, 112001, 775, '2017-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `password`, `type`, `user_id`) VALUES
('admin', 'admin', 'admin', 112007),
('eva', 'eva_afa', 'admin', 112004),
('fateha', 'ifateha', 'creator', 112002),
('penguin', '123456', 'user', 212008),
('sajiya', 'sajiya_afa', 'admin', 112003),
('sanjida', 'sanjida_afa', 'admin', 112005),
('shafi', 'itsme', 'creator', 112001),
('shafi1', 'beast', 'admin', 112006),
('user1', '123456', 'user', 212001),
('user2', '123456', 'user', 212002),
('user3', '123456', 'user', 212003),
('user4', '123456', 'user', 212004),
('user5', '123456', 'user', 212005),
('user50', '123456', 'user', 212007);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `no` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`no`, `year`, `month`) VALUES
(1, 2017, 2),
(4, 2017, 3),
(5, 2017, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `entry` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`entry`, `user_id`, `pay_date`, `user_name`, `amount`, `payment_type`, `month`, `year`) VALUES
(1, 112001, '2017-02-01', 'shafi', 500, 'monthly', 'February', 2017),
(2, 112001, '2017-03-01', 'shafi', 500, 'monthly', 'March', 2017),
(3, 112002, '2017-02-01', 'fateha', 500, 'monthly', 'February', 2017),
(4, 112003, '2017-02-01', 'sajiya', 500, 'monthly', 'February', 2017),
(5, 112004, '2017-02-01', 'eva', 500, 'monthly', 'February', 2017),
(6, 112005, '2017-02-01', 'sanjida', 500, 'monthly', 'February', 2017),
(7, 212002, '2017-02-15', 'user2', 200, 'due', '', 2017),
(8, 212002, '2017-02-01', 'user2', 500, 'monthly', 'February', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image_loc` text NOT NULL,
  `fav_quote` varchar(300) NOT NULL,
  `last_read` varchar(200) NOT NULL,
  `join_date` date NOT NULL,
  `target` int(11) NOT NULL,
  `due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `first_name`, `last_name`, `email`, `mobile`, `user_name`, `gender`, `address`, `occupation`, `date_of_birth`, `image_loc`, `fav_quote`, `last_read`, `join_date`, `target`, `due`) VALUES
(112001, 'Mehedi', 'Shafi', 'mehedishafi@gmail.com', '01920884121', 'shafi', 'male', 'shoni akhra, dhaka', 'student', '1996-05-11', 'images/user_pp/1489249633.jpg', 'Perfection is always a work in progress', 'Veronica Decides to Die', '2017-02-15', 12, 1000),
(112002, 'Israt Jahan', 'Fateha', 'fateha@gmail.com', '019XXXXXXXX', 'ifateha', 'female', 'Dhaka, Bangladesh', 'student', '1996-03-02', 'images/profile_img/fateha_pro.jpg', 'Try not to become a man of success, but rather try to become a man of value', 'Ami E Misir Ali', '2017-02-16', 5, 1000),
(112003, 'Sajiya', 'Akond', 'sajiya@gmail.com', '019XXXXXXXX', 'sajiya', 'female', 'Benjir bagan', 'student', '0000-00-00', 'images/profile_img/sajiya_pro.jpg', '', '', '2017-02-16', 5, 1000),
(112004, 'Tahia', 'Eva', 'eva@gmail.com', '019XXXXXXXX', 'eva', 'female', 'Arambag', 'student', '1997-05-16', 'images/profile_img/eva_pro.jpg', '', '', '2017-02-16', 5, 1000),
(112005, 'Sanjida', 'Tasnim', 'sanjida@gmail.com', '019XXXXXXXX', 'sanjida', 'female', 'konapara', 'student', '0000-00-00', 'images/profile_img/sanjida_pro.jpg', '', '', '0000-00-00', 5, 1000),
(112006, 'shafi', 'mehedi', 'sajdklsaasd@njdksl.asda', 'adajdkl', 'shafi1', 'male', 'djsfksg', 'hjklsfjkl', '1997-05-11', 'images/admin_pp/1489249464.jpg', 'fuck it um good', '', '2017-03-11', 0, 1000),
(112007, 'Public', 'Admin', 'admin@library.com', '01911111111', 'admin', 'male', 'Dhaka, Bangladesh', 'AI', '2017-03-05', 'images/admin_pp/1491397547.jpg', 'Test whatever you want to test', '', '2017-04-05', 0, 0),
(212001, 'sample user', 'ai', 'user@ai.com', '01920456123', 'user1', 'undefined', '321321 Planet Eart', 'ai', '2017-02-01', 'images/user_pp/1488989608.jpg', 'I am in a goddamn red box.', '', '0000-00-00', 5, 1000),
(212002, 'sample user', 'ai', 'sample@email.com', 'sample', 'user1', 'undefined', 'udefined', 'ai', '1995-01-01', 'images/profile_img/ai_pro.png', '', '', '0000-00-00', 0, 1000),
(212003, 'sample user', 'ai', 'sample@email.com', 'sample', 'user2', 'undefined', 'udefined', 'ai', '1995-01-01', 'images/profile_img/ai_pro.png', '', '', '0000-00-00', 0, 1000),
(212004, 'sample user', 'ai', 'sample@email.com', 'sample', 'user3', 'undefined', 'udefined', 'ai', '1995-01-01', 'images/profile_img/ai_pro.png', '', '', '0000-00-00', 0, 1000),
(212005, 'sample user', 'ai', 'sample@email.com', 'sample', 'user4', 'undefined', 'udefined', 'ai', '1995-01-01', 'images/profile_img/ai_pro.png', '', '', '0000-00-00', 0, 1000),
(212007, 'Beta', 'Tester', 'user@email.com', '0192054632', 'user50', 'male', 'dhaka, bangladesh', 'undefined', '1997-05-11', 'images/profile_img/ai_pro.png', 'undefined', '', '2017-03-08', 0, 1000),
(212008, 'Penguin', 'Dance', 'peng@uin.com', '123456', 'penguin', 'male', 'Anterctica', 'undefined', '1999-01-12', 'images/user_pp/1491328068.jpg', 'undefined', '', '2017-04-04', 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user_stat`
--

CREATE TABLE `user_stat` (
  `user_id` int(11) NOT NULL,
  `number_read` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `current_borrow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookshelf`
--
ALTER TABLE `bookshelf`
  ADD PRIMARY KEY (`no.`);

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`no.`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`entry`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_stat`
--
ALTER TABLE `user_stat`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookshelf`
--
ALTER TABLE `bookshelf`
  MODIFY `no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
