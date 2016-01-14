-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2016 at 01:18 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emo_assess`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `scale_type` varchar(5) NOT NULL,
  `sq_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `scale_type`, `sq_id`) VALUES
(0, 'I’m fairly cheerful person.', '5', 1),
(1, 'I like helping people.', '2', 2),
(2, 'I’m unable to express my ideas to others', '1', 3),
(3, 'It is a problem controlling my anger.', '3', 4),
(4, 'My approach in overcoming difficulties is to move step by step', '4', 5),
(5, 'I don’t do anything bad in my life.', '7', 6),
(6, 'I feel sure of myself in most situations.', '5', 7),
(7, 'I’m unable to understand the way other people feel.', '2', 8),
(8, 'I prefer others to make decisions for me.', '1', 9),
(9, 'My impulsiveness creates problems.', '3', 10),
(10, 'I try to see things as they really are, without fantasizing or daydreaming about them.', '4', 11),
(11, 'Nothing disturbs me.', '7', 12),
(12, 'I believe that I can stay on top of tough situations.', '5', 13),
(13, 'I‘m good at understanding the way other people feel.', '2', 14),
(14, 'It’s hard for me to understand the way I fell.', '1', 15),
(15, 'I feel that it’s hard for me to control my anxiety.', '3', 16),
(16, 'When faced with a difficult situation, I like to collect all the information about it that I can.', '4', 17),
(17, 'I have not told a lie in my life.', '7', 18),
(18, 'I’m optimistic about most things I do.', '5', 19),
(19, 'My friends can tell me intimate things about themselves.', '2', 20),
(20, 'In the past few years, I’ve accomplished little.', '1', 21),
(21, 'I tend to explode with anger easily.', '3', 22),
(22, 'I like to get an overview of a problem before trying to solve it.', '4', 23),
(23, 'I have not broken a law of any kind.', '7', 24),
(24, 'I care what happens to other people.', '2', 25),
(25, 'It’s hard for me to enjoy life.', '5', 26),
(26, 'It’s hard for me to make decisions on my own.', '1', 27),
(27, 'I have strong impulses that are hard to control.', '3', 28),
(28, 'When facing a problem, the first thing I do is stop and think.', '4', 29),
(29, 'I don’t have bad days.', '7', 30),
(30, 'I am satisfied with my life.', '5', 31),
(31, 'My close relationships mean a lot to me and to my friends.', '2', 32),
(32, 'It’s hard to express my intimate feelings.', '1', 33),
(33, 'I’m impulsive.', '3', 34),
(34, 'When trying to solve a problem, I look at each possibility and then decide on the best way.', '4', 35),
(35, 'I have not been embarrassed for anything that I’ve done.', '7', 36),
(36, 'I get depressed.', '5', 37),
(37, 'I ‘m able to respect others.', '2', 38),
(38, 'I’m more of a follower than a leader.', '1', 39),
(39, 'I’ve got a bad temper.', '3', 40),
(40, 'In handling situations that arise, I try to think of as many approaches as I can.', '4', 41),
(41, 'I generally expect things will turn out all right, despite setbacks from time to time.', '5', 42),
(42, 'I’m sensitive to the feelings of others.', '2', 43),
(43, 'Others think that I lack assertiveness.', '1', 44),
(44, 'I’m impatient.', '3', 45),
(45, 'I believe in my ability to handle most upsetting problems', '5', 46),
(46, 'I have good relations with others.', '2', 47),
(47, 'It’s hard for me to describe my feelings.', '1', 48),
(48, 'Before beginning something new, I usually feel that I’ll fail.', '5', 49),
(49, 'It’s difficult for me to stand up for my rights.', '1', 50),
(50, 'People think that I’m sociable.', '2', 51);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` smallint(6) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_test` datetime NOT NULL,
  `test_id` int(11) NOT NULL,
  `sq_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `age`, `gender`, `date_test`, `test_id`, `sq_id`) VALUES
(0, 'saitama', 'onepunch', 20, 'm', '2016-01-14 08:09:15', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_question`
--

CREATE TABLE IF NOT EXISTS `student_question` (
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `intra_score` int(11) NOT NULL,
  `inter_score` int(11) NOT NULL,
  `stress_mgt_score` int(11) NOT NULL,
  `adaptability_score` int(11) NOT NULL,
  `general_mood_score` int(11) NOT NULL,
  `total_eq` int(11) NOT NULL,
  `positive_imprssn_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sq_id` (`sq_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_question`
--
ALTER TABLE `student_question`
  ADD PRIMARY KEY (`student_id`,`question_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `student_id_2` (`student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_question`
--
ALTER TABLE `student_question`
  ADD CONSTRAINT `student_question_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_question_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
