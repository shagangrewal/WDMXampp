-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 06:43 AM
-- Server version: 5.7.19-log
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `name`, `address`, `phone`, `email`, `password`) VALUES
(1, 'Shagan', '415 Arlie', '1234567890', 'G@mail.com', 'b16d93db2e91954d0b95a358c86710f8'),
(2, 'Nagar', 'timber ', '1234567890', 'N12@mail.com', 'f42d0d345958f1284724b22214740b00'),
(3, 'Jas', '521 Dallas', '8967452310', 'Mail@gmail.com', '1dd591ae95ee568d2b8878e6dbab31a2'),
(4, 'Sim', 'Hayw', '7890123456', 'Sim@mail.com', 'b2b34d2c4c0992716e2c0b67ffa67e5f'),
(5, 'QWeqw', 'South', '8765543210', 'Hall@mail.com', 'b6a67efdb0d88c4cd85359895e49687c');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `comments`) VALUES
('shagan', 'grewal@sakroudi.com', 'ok done!'),
('Shagan', 'G@mail.com', 'well done'),
('GM', 'M@mail.com', 'Good Job'),
('Parrot', 'Raabit@g.com', 'Well said'),
('Aman', 'nagar@12.com', 'Project 4');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petid` int(11) NOT NULL,
  `petname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petid`, `petname`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Rabbit'),
(4, 'Pig'),
(5, 'Red fox'),
(6, 'Hamster'),
(7, 'Chicken');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionid` int(11) NOT NULL,
  `question` varchar(500) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionid`, `question`, `answer`) VALUES
(1, 'What is the best diet for the pet?', 'It depends on pet to pet, their body strucuture and other conditions as well'),
(2, 'Is there any danger in feeding my pet the wrong diet?', 'yes, the diet should be formulated for the pet according to his stage of life as diets are designed to meet specific nutrition requirements.'),
(3, 'My pet is overweight, what can i do?', 'Feed your pet regular meals every day rather than having food available all the time and increasing exercise helps as well.'),
(4, 'Our dog likes to eat whatever the kids are snaking on. Is it ok for the dog to eat chocolate?', 'Choclate is toxic to dogs. Please do not feed your dog the chocolate. Try playing a game with your children when you feed them people treats, they can feed dog treats.'),
(5, 'is my pet at a healthy weight?', 'Most of the pets are overweight. If your pet is overweight, consult a doctor, though it is a very rare issue for the pet not to get well from the overweight condition');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(11) NOT NULL,
  `servicename` varchar(50) DEFAULT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `servicename`, `description`) VALUES
(1, 'Medical Services', 'We offer state-of-the-art equipment and technology.'),
(2, 'Surgical Services', 'Full range of surgical procedures including orthopedics and emergency surgeries.'),
(3, 'Dental Care', 'A dental exam can determine whether your pet needs preventive dental care such as scaling and polishing.'),
(4, 'House Calls', 'The elderly, physically challenged and multiple pet households often find out-in-home veterinary service helpful and environment.'),
(5, 'Emergencies', 'Atleast one of our doctors is on every call day and night');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `clientid` int(11) DEFAULT NULL,
  `serviceid` int(11) DEFAULT NULL,
  `petid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`clientid`, `serviceid`, `petid`, `date`) VALUES
(1, 2, 4, '2017-11-21'),
(2, 2, 7, '2017-11-21'),
(3, 2, 3, '2017-11-21'),
(4, 4, 3, '2017-11-21'),
(5, 5, 2, '2017-11-21'),
(5, 5, 2, '2017-11-21'),
(5, 5, 2, '2017-11-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD KEY `clientid` (`clientid`),
  ADD KEY `serviceid` (`serviceid`),
  ADD KEY `petid` (`petid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`),
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`serviceid`) REFERENCES `service` (`serviceid`),
  ADD CONSTRAINT `subscription_ibfk_3` FOREIGN KEY (`petid`) REFERENCES `pet` (`petid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
