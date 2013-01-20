-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: mysql.hcs.harvard.edu
-- Generation Time: Dec 09, 2012 at 02:28 AM
-- Server version: 5.0.96
-- PHP Version: 5.2.4-2ubuntu5.25

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs50-veritasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `completion`
--

CREATE TABLE IF NOT EXISTS `completion` (
  `task_id` int(11) NOT NULL,
  `completer` int(11) NOT NULL,
  `time_begin` datetime NOT NULL,
  `minutesTaken` int(11) NOT NULL,
  `time_end` datetime NOT NULL,
  `question` varchar(5000) NOT NULL,
  `submitted` int(11) NOT NULL default '0',
  PRIMARY KEY  (`task_id`,`completer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completion`
--

INSERT INTO `completion` (`task_id`, `completer`, `time_begin`, `minutesTaken`, `time_end`, `question`, `submitted`) VALUES
(28, 3, '2012-12-09 02:19:41', 0, '2012-12-09 02:20:01', 'They''re grrrrrrrrrrrrrrrreat!', 1),
(32, 3, '2012-12-09 02:15:17', 0, '2012-12-09 02:15:50', '', 1),
(31, 3, '2012-12-09 02:05:18', 0, '0000-00-00 00:00:00', '', 0),
(19, 3, '2012-12-09 02:00:22', 0, '2012-12-09 02:00:30', 'To entertain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sdescrip` text NOT NULL,
  `ldescrip` text NOT NULL,
  `time` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `money` decimal(65,2) NOT NULL,
  `surveyembed` varchar(255) NOT NULL,
  `videoembed` varchar(500) NOT NULL,
  `audioembed` varchar(500) NOT NULL,
  `question` varchar(255) NOT NULL,
  `confirmationcode` varchar(255) NOT NULL,
  `maxUsers` int(11) NOT NULL,
  `finished` tinyint(1) NOT NULL default '0',
  `numCompletions` int(11) NOT NULL default '0',
  `dateCreated` datetime NOT NULL,
  `taskType` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `sdescrip`, `ldescrip`, `time`, `name`, `createdby`, `money`, `surveyembed`, `videoembed`, `audioembed`, `question`, `confirmationcode`, `maxUsers`, `finished`, `numCompletions`, `dateCreated`, `taskType`, `paid`) VALUES
(5, 'Fill out a sample survey!', 'Fill out this amazing survey designed to see who you are!', 5, 'Basic Information Survey', '4', '0.10', '<iframe src="https://docs.google.com/a/college.harvard.edu/spreadsheet/embeddedform?formkey=dDRCX1pUdENMdUNzMnVFVFYtbHF2V2c6MQ" width="760" height="908" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>', '', '', '', '12345', 6, 0, 6, '0000-00-00 00:00:00', 1, 1),
(15, 'Give a descriptive 500 word summary of this video', '', 30, 'Summarize this video', '3', '0.25', '', '</iframe>" title="Please embed your Video"><iframe width="560" height="315" src="http://www.youtube.com/embed/9bZkp7q19f0" frameborder="0" allowfullscreen></iframe>', '', 'What is the purpose of this video?', '', 10, 1, 7, '2012-12-09 00:32:21', 2, 1),
(19, 'Watch a video and summarize it', 'We are conducting a psychology study to gauge the reactions to a video. Watch a video and summarize.', 10, 'Sample Video Summary', '4', '0.01', '', '<iframe width="560" height="315" src="http://www.youtube.com/embed/9bZkp7q19f0" frameborder="0" allowfullscreen></iframe>', '', 'What was the point in making this video, in your opinion?', '', 10, 0, 3, '2012-12-08 05:28:03', 2, 1),
(28, 'Be part of a study in how videos evoke emotions!', 'We are conducting a survey for a senior thesis to examine how people respond to certain contemporary videos.', 5, 'Rate this video!', '4', '1.00', '', '<iframe width="560" height="315" src="http://www.youtube.com/embed/NOubzHCUt48" frameborder="0" allowfullscreen></iframe>', '', 'How does this video make you feel?                    ', '', 15, 0, 6, '2012-12-08 19:59:47', 2, 1),
(29, 'it is a test', 'it is a test', 1, 'Test', '5', '0.01', '<iframe src="https://docs.google.com/a/college.harvard.edu/spreadsheet/embeddedform?formkey=dDRCX1pUdENMdUNzMnVFVFYtbHF2V2c6MQ" width="760" height="908" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>', '', '', '                    ', '12345', 3, 1, 0, '2012-12-08 20:04:59', 1, 1),
(30, 'Rate pop stars', 'Asks your favourite pop star and hot hot you think IU is', 2, 'Music Survey', '5', '0.01', '<iframe src="https://docs.google.com/a/college.harvard.edu/spreadsheet/embeddedform?formkey=dDA1RFlpZXZxVHJJdVAzOG9ITk5GV0E6MQ" width="760" height="813" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>', '', '', '                    ', '2468', 10, 0, 0, '2012-12-08 22:10:55', 1, 0),
(31, 'You will be asked about your favourite pop stars', 'You can pick which pop star is your favourite and rate how hot you think IU is', 2, 'Music', '5', '0.01', '<iframe src="https://docs.google.com/a/college.harvard.edu/spreadsheet/embeddedform?formkey=dDA1RFlpZXZxVHJJdVAzOG9ITk5GV0E6MQ" width="760" height="813" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>', '', '', '                    ', '2468', 10, 0, 3, '2012-12-08 22:15:47', 1, 1),
(32, 'Rate your favourite veggies', 'You will be asked lots of questions about your vegetable preferences', 2, ' Food Survey', '5', '0.03', '<iframe src="https://docs.google.com/a/college.harvard.edu/spreadsheet/embeddedform?formkey=dEFwNGRRSUVlTkNhTFdnR1d0TExlcUE6MQ" width="760" height="1079" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>', '', '', '                    ', '9876', 10, 0, 5, '2012-12-09 01:27:30', 1, 1),
(34, 'Please give us thoughts about music live performances!', 'Conducting a survey about human behavior... or not. Please participate in our study while being entertained.', 5, 'Thoughts on a Live Show', '5', '0.50', '', '<iframe width="560" height="315" src="http://www.youtube.com/embed/89zmxOBhEFk" frameborder="0" allowfullscreen></iframe>', '', 'What do you think about IU?                    ', '', 20, 0, 1, '2012-12-09 00:14:16', 2, 1),
(37, 'Tell us what you think about this music video', 'Think about it', 5, 'Mumford and Sons', '3', '0.24', '', '<iframe width="560" height="315" src="http://www.youtube.com/embed/lLJf9qJHR3E" frameborder="0" allowfullscreen></iframe>', '', 'Does this inspire you?', '', 19, 0, 0, '2012-12-09 01:43:02', 2, 1),
(38, 'Tell us what you think of this video.', 'Not much more to say!', 10, 'Do you like Starcraft?', '3', '0.36', '', '<iframe width="420" height="315" src="http://www.youtube.com/embed/mbrq6J8nVes" frameborder="0" allowfullscreen></iframe>', '', 'Flash or Jaedong? Terran or Zerg?', '', 18, 0, 0, '2012-12-09 01:48:18', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_types`
--

CREATE TABLE IF NOT EXISTS `task_types` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `task_types`
--

INSERT INTO `task_types` (`id`, `type`) VALUES
(1, 'Survey'),
(2, 'Video Summary'),
(3, 'Audio Transcription');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `money` decimal(65,2) NOT NULL,
  `paypalemail` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hash`, `money`, `paypalemail`) VALUES
(1, '', 'caesar', '$1$50$GHABNWBNE/o4VL7QjmQ6x0', '0.00', ''),
(3, 'Marco Gentili', 'mgentili@college.harvard.edu', '$1$YLJp8Oq6$UWvDvlClt7N73mnIjhdfy/', '1.03', 'Bob_1354846236_per@college.harvard.edu'),
(4, 'Brian Shin', 'bshin@college.harvard.edu', '$1$L8yFJjQQ$4m.iZdIuD4ITKrz2iwovs.', '0.00', 'Power_1355000947_per@college.harvard.edu'),
(5, 'Jesaiah Coy', 'jesaiahcoy@college.harvard.edu', '$1$PF9wPlEK$fB1L819RDkJip5pUorFUD.', '1.49', 'Cookie_1355000796_per@college.harvard.edu'),
(6, '', 'hello@fas.harvard.edu', '$1$felzihDl$v.Wjmja9HIiO67bNraeB81', '0.00', ''),
(7, '', 'lala@college.harvard.edu', '$1$LBqgXCrC$rjz7W0ULsVaawlKs5.NSN/', '0.00', ''),
(8, '', 'ilundberg@college.harvard.edu', '$1$KxBLi..w$F/3oGSoA0u3Oc5JECwN5s/', '0.00', ''),
(9, 'Bob Builder', 'blah@college.harvard.edu', '$1$/mpi4vpA$v6H04UxkMpubbwcFF/3M/0', '0.00', 'hello@paypal.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
