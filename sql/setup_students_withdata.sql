-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2012 at 12:24 AM
-- Server version: 5.1.50
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE IF NOT EXISTS `account_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `title`) VALUES
(1, 'CHEQUE'),
(2, 'SAVINGS'),
(3, 'twice weekly');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `title`) VALUES
(1, 'Standard'),
(2, 'FNB'),
(3, 'ABSA'),
(4, 'Nedbank'),
(5, 'capitec Bank Ltd'),
(6, 'Bidvest'),
(7, 'see kris Rabeling'),
(8, 'nebank'),
(9, 'see Dan'),
(10, 'ABSA/Chk'),
(11, 'dad pays cash '),
(12, 'see Tyrone '),
(13, 'Absa (Marie Capelle)'),
(14, 'see father Mario'),
(15, 'standard(S.Jones)'),
(16, 'Absa(Johan Erasmus)'),
(17, 'Nedbank (Sibylle Stehli) '),
(18, 'Standard (W. Fourie payee)'),
(19, 'SEE FATHER'),
(20, 'Absa (liza mother)'),
(21, 'FNB(Tracey Moore )'),
(22, 'FNB (Anthea mother)'),
(23, 'see Marco'),
(24, 'FNB (CR Scott acct)'),
(25, 'Absa (Father Abraham Spies)'),
(26, 'ABSA (MOTHER L SEGAL)');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `title`, `site_url`, `contact_email`) VALUES
(1, 'Students', 'http://http://localhost/students_database/', 'students@psykrotek.co.za');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `primary` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `student_id`, `primary`, `title`, `telephone`, `mobile`, `email`, `created`, `modified`) VALUES
(1, 1, 1, '', '', '083 4961779', 'adrian.alexander@live.com', '2012-01-03 00:24:15', '2012-01-03 00:24:15'),
(2, 2, 1, '', '', '082 4901060', 'chris@bamarchitechts.co.za', '2012-01-03 00:24:15', '2012-01-03 00:24:15'),
(3, 3, 1, '', '', '083 2907722', 'gustav@isquared.co.za', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(4, 4, 1, '', '', '829027211', 'bryan.banfield@gmail.com', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(5, 5, 1, '', '', '082521 7222', 'oogly@hotmail.co.za', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(6, 6, 1, '', '021 5544909', '082 3314965', 'tyroneb@switchdesign.com', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(7, 7, 1, '', '021 557 5250', '083 397 0055', 'robertob@eurekadiy.co.za', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(8, 8, 1, '', '', '084 5495178', 'arhemb@gmail.com', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(9, 9, 1, '', '', '084 5843435', 'jacob@prestigeacademy.co.za', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(10, 10, 1, '', '', '082 4455357', 'clyde@molimonan.co.za', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(11, 11, 1, '', '021 981 0295', '084 901 3818', 'psykro@gmail.com', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(12, 12, 1, '', '021 55 88879', '084 4776463', 'abburger@mweb.co.za', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(13, 13, 1, '', '', '074 2176924', '', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(14, 14, 1, '', '', '0845529970', 'dominic.brummer@gmail.com', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(15, 15, 1, '', '021 9381916', '084 9888635', 'david@home.co.za', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(16, 16, 1, '', '', '074 5801816', 'dheobulletdc@yahoo.com', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(17, 17, 1, '', '', '072 2647467', 'irgert@yahoo.com', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(18, 18, 1, '', '', '0827098640', 'hallsofdartford@vodamail.co.za', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(19, 19, 1, '', '', '072 5771000', 'toni@continobros.co.za', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(20, 20, 1, '', '', '082 2992866', 'info@labelaid.co.za', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(21, 21, 1, '', '', '082 9793180', 'lesley.davids@computacenter.com', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(22, 22, 1, '', '021 556 2380', '083 523 1474', 'anton@itec-cpt.co.za', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(23, 23, 1, '', '', '072 9041463 ', 'b2live4eva@yahoo.com', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(24, 24, 1, '', '', '072 9768879 ', 'renatodasil@gmail.com', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(25, 25, 1, '', '', '072 22206396', 'emiledewet@gmail.com', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(26, 26, 1, '', '021 5542217', '083 4155110', 'sdewet@intekom.co.za', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(27, 27, 1, '', '021 5584849', '084 4843068', 'delmistro@telkomsa.net', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(28, 28, 1, '', '', '084 5895541', 'craigd@netpoint.co.za', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(29, 29, 1, '', '082 8152654', '084 7177082', 'Dreyerfamilie@ddcswartland.co.za', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(30, 31, 1, '', '215579989', '083 602 0968', 'dudley@cap.za.net', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(31, 32, 1, '', '', '082 7332381', 'sumojunkie@gmail.com', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(32, 33, 1, '', '021 9527540', '083 5056545', 'andreensil@yahoo.com', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(33, 34, 1, '', '', '084 436448', 'engledoe@gmail.com', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(34, 35, 1, '', '', '', 'hoosain.essop@capetown.gov.za', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(35, 36, 1, '', '', '076 4689969', 'hfoulds@gmail.com', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(36, 37, 1, '', '', '084 4910698', 'reinhardt.gallowitz@isobar.net', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(37, 38, 1, '', '', '084 5812752', 'heinog@prestigeacademy.co.za', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(38, 39, 1, '', '', '084 6282406', 'michael.gaylard@media24.com', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(39, 40, 1, '', '021 5517309', '731772260', 'victor.geldenhuys@gmail.com', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(40, 41, 1, '', '021 9379251', '071 8892141', 'Jarrydg@cybersmart.co.za', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(41, 42, 1, '', '219759658', '082 6654795', 'adjust@xsinet.co.za', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(42, 44, 1, '', '021 5588691', '082 8232618 ', 'diffelec@worldonline.co.za', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(43, 45, 1, '', '021 5588691', '078 5122200', 'kimgrauso@worldonline.co.za', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(44, 46, 1, '', '021 555 2227', '083 6774584', 'lance@showersolutions.co.za', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(45, 47, 1, '', '021 5534440', '083 6430666', 'caryn@gilt-edge.com', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(46, 48, 1, '', '', '083 3212079', 'bjarga@gmail.com', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(47, 49, 1, '', '', '073 0850456', 'allypant@gmail.com', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(48, 50, 1, '', '021 5102206', '072 3497487', 'rhryanhenry@gmail.com', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(49, 51, 1, '', '021 3743132', '083 2693175', 'danielderekisaacs@gmail.com', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(50, 52, 1, '', '021 3715554', '083 3555235', 'alleemi@boe.co.za', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(51, 53, 1, '', '021 5931650', ' ', 'ebrahim@neoncape.co.za', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(52, 54, 1, '', '', '076 3336004', 'RJD842003@gmail.com', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(53, 55, 1, '', '', '', 'josua_joubert@hotmail.com', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(54, 56, 1, '', '', '074 7666434', 'keanjohannes@yahoo.com', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(55, 57, 1, '', '', '084 6849213', 'kurt@kurtjoshua.co.za', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(56, 59, 1, '', '', '', 'shaibkhan33@gmail.com', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(57, 60, 1, '', '021 9480353', '083 2346677', 'rankilla@gmail.com', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(58, 61, 1, '', '', '084 7023823', 'clyde.koen@capetown.gov.za', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(59, 62, 1, '', '021 5566482', '072 3885405', 'krugeral@mweb.co.za', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(60, 63, 1, '', '', '079 5962296', 'alwiclandman@gmail.com', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(61, 64, 1, '', '', '079 2409463', 'llanterme@mweb.com', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(62, 65, 1, '', '', '078 6294044', 'madangryscientist@gmail.com', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(63, 66, 1, '', '', '834774979', 'rogerjames@netactive.co.za', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(64, 67, 1, '', '', '082 9236510', 'john-william.lotriet@virgin1on1.co.za', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(65, 68, 1, '', '', '082 9940529', 'sidneyd1@yahoo.com', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(66, 70, 1, '', '215530590', '0761554603', 'stmidgley@gmail.com', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(67, 70, 0, '', '', '', 'romayne@promanage.co.za', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(68, 71, 1, '', '', '072 6084825', 'precisionwurx@gmail.com', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(69, 72, 1, '', '', '072 5671892', 'g79wolverine@gmail.com', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(70, 73, 1, '', '021 5910022', '072 9510117', 'junaid.moodley@eon.co.za', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(71, 74, 1, '', '021 5910022', '083 8930569', 'justin@danneberg.co.za', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(72, 75, 1, '', '', '073 3457978', 'johan@cja.co.za', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(73, 76, 1, '', '0215545057', '0739161819', 'info@canopy-man.co.za', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(74, 77, 1, '', '', '0722095457', 'vasigan@hotmail.com', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(75, 78, 1, '', '', '079 9867852', 'ksnsolutions@gmail.com', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(76, 79, 1, '', '', '084 6112726', 'don9000@gmail.com', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(77, 80, 1, '', '', '083 4651722', 'dnagel@webafrica.org.za', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(78, 81, 1, '', '021 9828761', '083 2334988', 'marion@hrpsa.co.za', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(79, 82, 1, '', '021 5593274', '0825 738883', 'fragranceemporium@vodamail.co.za', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(80, 83, 1, '', '', '074 1012828', 'lisa.muir@yahoo.com', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(81, 84, 1, '', '', '083 4629089', 'jerome@karate-jutsu.co.za', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(82, 85, 1, '', '', '082 55728239', 'edwinjpietersen@gmail.com', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(83, 86, 1, '', '021 554 2454', '082 3743610', 'davep@crs.co.za', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(84, 87, 1, '', '021 5587796', '083 5160639', 'stamper.jp@gmail.com', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(85, 88, 1, '', '', '071 8909689', 'potterjuan@yahoo.com', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(86, 89, 1, '', '', '0739161819', 'info@canopy-man.co.za', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(87, 90, 1, '', '021 5525011', '083 7776049', 'sainfo.ct@raux.com', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(88, 91, 1, '', '021 5910230', '084 3523022', 'gert.roux@gmail.com', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(89, 92, 1, '', '021 6868138', '028 2109293', 'f.rusty@telkomsa.net', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(90, 93, 1, '', '', '084 5554959', 'srutgers@shoprite.co.za', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(91, 94, 1, '', '021 9885929', '082 7205282', 'oarutgers@gmail.com', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(92, 95, 1, '', '021 5568609', '073 4442527', 'kyle_sad@live.com', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(93, 96, 1, '', '', '079 5155597', 'salmon.barry1@gmail.com', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(94, 97, 1, '', '', '079 4915802', 'samm@cput.ac.za', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(95, 98, 1, '', '021 5544327', '082 570 4414', 'marcos@za.ibm.com', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(96, 99, 1, '', '', '083 7071392', 'graemes@incline.co.za', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(97, 100, 1, '', '', '082 9901684', 'shaun.schulze@gmail.com', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(98, 101, 1, '', '', '072 3735157', 'ds@ilanga.co.za', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(99, 102, 1, '', '', '', 'fabio@remaxpa.co.za', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(100, 103, 1, '', '021 5563527', '084 5563527', 'farryl@mycoza.com', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(101, 104, 1, '', '', '083 925 9408', 'sing.shalendta@gmail.com', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(102, 105, 1, '', '', '', 'grant.slmn@gmail.com', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(103, 106, 1, '', '021 9209626', '072 8740803', 'andrew.stephen@uct.ac.za', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(104, 107, 1, '', '021 5542353', '072 5940102', 'wesmansince1984@hotmail.com', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(105, 108, 1, '', '', '083 2911617', 'jjstrydom@gmx.com', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(106, 109, 1, '', '', '082 8594589', 'dan@conduit.za.net', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(107, 110, 1, '', '', '', 'robyn@solaltech.com', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(108, 111, 1, '', '082 7448851', '021 9750999', 'thaysens@telkomsa.net', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(109, 112, 1, '', '021 4343829', '', 'teeyogacapetown@yahoo.co.za', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(110, 113, 1, '', '', '0798914383', 'annavdeijl@gmail.com', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(111, 114, 1, '', '', '0714932008', 'wilcovandeijl@gmail.com', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(112, 116, 1, '', '', '', 'pierre@rockcapital.co.za', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(113, 117, 1, '', '', '', 'rene@kurtjoshua.co.za', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(114, 118, 1, '', '', '082 4270141', 'evanwyk@webafrica.org.za', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(115, 119, 1, '', '', '084 7672635', 'rmvaneeden@chevron.com', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(116, 120, 1, '', '', '074 1930114', 'LMvanNiekerk1@gmail.com', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(117, 121, 1, '', '084 7872207', '021 9143488', 'g@sansure.co.za', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(118, 122, 1, '', '', '082 7869858', 'jacoventersa@gmail.com', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(119, 123, 1, '', '021 4123130', '083 2344726', 'albrechtv@nfp.nedbank.co.za', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(120, 124, 1, '', '', '083 5501762', 'steve@circle.co.za', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(121, 125, 1, '', '021 5517074', '082 3316374', 'steve@circle.co.za', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(122, 126, 1, '', '', '082 7811721', 'kettlebell@mweb.co.za', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(123, 127, 1, '', '', '', 'rory@goldenharvest.co.za', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(124, 131, 1, '', '', '824722984', 'austinhome@absamail.co.za', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(125, 133, 1, '', '215521884', '0844120846', 'antoinetteb@medschme.co.za', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(126, 134, 1, '', '', '083 7561657', '', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(127, 136, 1, '', '021 5562997', '0824182821', 'Mcapelle@mweb.co.za', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(128, 140, 1, '', '', '084 5895541', 'dreyerfamilie@ddcswartland.co.za', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(129, 142, 1, '', '021 5542217', '', '', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(130, 143, 1, '', '021 5570417', '082 8094082', 'sian1@telkomsa.net', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(131, 144, 1, '', '', '082 4422758', '', '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(132, 145, 1, '', '076 9405657', '021 5564140', 'joker.fourie@gmail.com', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(133, 146, 1, '', '', '084 6766739', 'micky.fourie@tigerbrands.com', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(134, 147, 1, '', '021 4620026', '072 467 5320', 'w.fourieatt@gmail.com', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(135, 148, 1, '', '', '072 9391143', 'karen.gayham@betterbond.co.za', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(136, 149, 1, '', '021 9575639', '718964394', 'duncan.hoole@gmail.com', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(137, 150, 1, '', '0215545449', '0833060657', 'ainglese@mweb.co.za', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(138, 152, 1, '', '', '', 'ebrahim@neoncape.co.za', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(139, 153, 1, '', '', '083 5929794', 'anthony@wcp.co.za', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(140, 154, 1, '', '021 5532222', '083 4418759', 'liza@rangercutback.co.za', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(141, 155, 1, '', '', '083 3215178', 'jason@moyo.co.za', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(142, 157, 1, '', '', '0731678539', 'terje@proaktive.co.za', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(143, 159, 1, '', '', '083 386 4049', 'tracey.moore@fresenius-kabi.com', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(144, 160, 1, '', '021 5564708', '082 5170346', '', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(145, 162, 1, '', '215572021', '0724636524', 'grant@quadrantconsulting.co.za', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(146, 163, 1, '', '0215566241', '021 5570953', 'info@smartbag.co.za', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(147, 164, 1, '', '021 5570127', ',0733623950', 'kelbrand@telkomsa.net', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(148, 165, 1, '', '021 5544327', '082 5704414', 'marcos@za.ibm.com', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(149, 166, 1, '', '', '083 7694024', 'salomien@Richardscott.com', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(150, 167, 1, '', '215542965', '0832722658', 'ami@brantex.net', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(151, 168, 1, '', '', '082 874 5503', 'lisar@firstresorts.co.za', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(152, 171, 1, '', '', '073 7868833', 'nadine.stockwell @gmail.com', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(153, 173, 1, '', '', '', 'expressions@mweb.co.za', '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(154, 174, 1, '', '', '021 5511 602', 'melinda@spydercomp.com', '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(155, 175, 1, '', '', '021 5511 602', 'melinda@spydercomp.com', '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(156, 176, 1, '', '021 5528159', '083 7767302', 'annelize@wilsonlangman.za.org', '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(157, 177, 1, '', '021 5567050', '076 1608890', 'lauriennewood@gmail.com', '2012-01-03 00:24:34', '2012-01-03 00:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `title`) VALUES
(1, 'white 4'),
(2, 'white 2'),
(3, 'blue'),
(4, 'blue 2'),
(5, 'blue 4'),
(6, 'white'),
(7, 'white 3'),
(8, 'blue 3'),
(9, 'brown'),
(10, 'white 1'),
(11, 'yellow 1'),
(12, 'orange'),
(13, 'yellow 3'),
(14, 'yellow 2'),
(15, 'yellow'),
(16, 'orange/white 3'),
(17, 'white1'),
(18, 'yellow 4'),
(19, 'orange 1'),
(20, 'white  2 '),
(21, 'orange/white 2'),
(22, '050610');

-- --------------------------------------------------------

--
-- Table structure for table `mailing_lists`
--

CREATE TABLE IF NOT EXISTS `mailing_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mailing_lists`
--


-- --------------------------------------------------------

--
-- Table structure for table `mailing_list_students`
--

CREATE TABLE IF NOT EXISTS `mailing_list_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailing_list_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mailing_list_id` (`mailing_list_id`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mailing_list_students`
--


-- --------------------------------------------------------

--
-- Table structure for table `membership_types`
--

CREATE TABLE IF NOT EXISTS `membership_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `membership_types`
--

INSERT INTO `membership_types` (`id`, `title`) VALUES
(1, 'Unlimited'),
(2, 'privates'),
(3, 'twice weekly'),
(4, 'privates/classes'),
(5, 'per session'),
(6, 'once week'),
(7, 'sponsored (panther)'),
(8, 'Beginners MTH'),
(9, 'sponsored (Pather)'),
(10, '3 month free'),
(11, 'unlimited/private'),
(12, 'twice week'),
(13, 'family membership'),
(14, '6 mnth PIF'),
(15, 'twice wekly'),
(16, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `title`, `controller`, `action`) VALUES
(1, 'Students', 'students', 'index'),
(2, 'Attendance', 'students', 'attendance'),
(3, 'Newsletters', 'newsletters', 'index'),
(4, 'Mailing Lists', 'mailing_lists', 'index'),
(5, 'Maintenance', 'maintenance', 'index');

-- --------------------------------------------------------

--
-- Table structure for table `modules_users`
--

CREATE TABLE IF NOT EXISTS `modules_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `modules_users`
--

INSERT INTO `modules_users` (`id`, `module_id`, `user_id`) VALUES
(14, 1, 2),
(15, 2, 2),
(16, 3, 2),
(17, 5, 2),
(18, 1, 1),
(19, 2, 1),
(20, 3, 1),
(21, 4, 1),
(22, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `newsletters`
--


-- --------------------------------------------------------

--
-- Table structure for table `newsletter_attachments`
--

CREATE TABLE IF NOT EXISTS `newsletter_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsletter_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `newsletter_attachments`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `title`) VALUES
(1, 'DB'),
(2, 'EFT'),
(3, 'cash'),
(4, 'PIF'),
(5, 'automatic'),
(6, '3 month in adv'),
(7, 'cash/EFT'),
(8, '3 months in adv EFT'),
(9, 'sign up for university for July and organise new payment as away');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `created`, `modified`) VALUES
(1, 'combatives', '2012-01-03 00:24:15', '2012-01-03 00:24:15'),
(2, 'MC', '2012-01-03 00:24:15', '2012-01-03 00:24:15'),
(3, 'combatives/private', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(4, '72245662', '2012-01-03 00:24:34', '2012-01-03 00:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `program_students`
--

CREATE TABLE IF NOT EXISTS `program_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `program_id` (`program_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `program_students`
--

INSERT INTO `program_students` (`id`, `program_id`, `student_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 1, 3),
(5, 2, 3),
(6, 1, 4),
(7, 2, 4),
(8, 1, 5),
(9, 1, 6),
(10, 2, 6),
(11, 1, 7),
(12, 2, 7),
(13, 1, 8),
(14, 2, 8),
(15, 1, 9),
(16, 1, 10),
(17, 1, 11),
(18, 2, 11),
(19, 1, 12),
(20, 2, 12),
(21, 1, 13),
(22, 1, 14),
(23, 1, 15),
(24, 2, 15),
(25, 1, 16),
(26, 1, 17),
(27, 2, 17),
(28, 1, 18),
(29, 1, 19),
(30, 2, 19),
(31, 1, 20),
(32, 2, 20),
(33, 1, 21),
(34, 2, 21),
(35, 1, 22),
(36, 2, 22),
(37, 1, 23),
(38, 1, 24),
(39, 1, 25),
(40, 1, 26),
(41, 2, 26),
(42, 1, 27),
(43, 1, 28),
(44, 1, 29),
(45, 1, 30),
(46, 2, 30),
(47, 1, 31),
(48, 2, 31),
(49, 1, 32),
(50, 1, 33),
(51, 2, 33),
(52, 1, 34),
(53, 1, 35),
(54, 1, 36),
(55, 2, 36),
(56, 1, 37),
(57, 2, 37),
(58, 1, 38),
(59, 2, 38),
(60, 1, 39),
(61, 1, 40),
(62, 1, 41),
(63, 1, 42),
(64, 2, 42),
(65, 1, 43),
(66, 2, 43),
(67, 1, 44),
(68, 1, 45),
(69, 1, 46),
(70, 2, 46),
(71, 1, 47),
(72, 1, 48),
(73, 2, 48),
(74, 1, 49),
(75, 2, 49),
(76, 1, 50),
(77, 2, 50),
(78, 1, 51),
(79, 1, 52),
(80, 1, 53),
(81, 1, 54),
(82, 1, 55),
(83, 2, 55),
(84, 1, 56),
(85, 2, 56),
(86, 1, 57),
(87, 2, 57),
(88, 1, 58),
(89, 2, 58),
(90, 1, 59),
(91, 1, 60),
(92, 2, 60),
(93, 1, 61),
(94, 1, 62),
(95, 1, 63),
(96, 2, 63),
(97, 1, 64),
(98, 1, 65),
(99, 2, 65),
(100, 1, 66),
(101, 1, 67),
(102, 1, 68),
(103, 1, 69),
(104, 2, 69),
(105, 3, 70),
(106, 1, 71),
(107, 1, 72),
(108, 1, 73),
(109, 2, 73),
(110, 1, 74),
(111, 2, 74),
(112, 1, 75),
(113, 2, 75),
(114, 1, 76),
(115, 1, 77),
(116, 1, 78),
(117, 1, 79),
(118, 1, 80),
(119, 1, 81),
(120, 1, 82),
(121, 2, 82),
(122, 1, 83),
(123, 1, 84),
(124, 2, 84),
(125, 1, 85),
(126, 2, 85),
(127, 1, 86),
(128, 2, 86),
(129, 1, 87),
(130, 2, 87),
(131, 1, 88),
(132, 2, 88),
(133, 1, 89),
(134, 1, 90),
(135, 2, 90),
(136, 1, 91),
(137, 1, 92),
(138, 2, 92),
(139, 1, 93),
(140, 1, 94),
(141, 1, 95),
(142, 2, 95),
(143, 1, 96),
(144, 2, 96),
(145, 1, 97),
(146, 2, 97),
(147, 1, 98),
(148, 2, 98),
(149, 1, 99),
(150, 1, 100),
(151, 1, 101),
(152, 1, 102),
(153, 1, 103),
(154, 1, 104),
(155, 2, 104),
(156, 1, 105),
(157, 1, 106),
(158, 1, 107),
(159, 1, 108),
(160, 1, 109),
(161, 2, 109),
(162, 1, 110),
(163, 1, 111),
(164, 2, 111),
(165, 1, 112),
(166, 2, 112),
(167, 1, 113),
(168, 1, 114),
(169, 1, 118),
(170, 1, 119),
(171, 1, 120),
(172, 1, 121),
(173, 2, 121),
(174, 1, 122),
(175, 2, 122),
(176, 1, 123),
(177, 1, 124),
(178, 1, 125),
(179, 1, 126),
(180, 2, 126),
(181, 1, 127),
(182, 4, 184);

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE IF NOT EXISTS `ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ranks`
--


-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE IF NOT EXISTS `searches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `searches`
--


-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_number` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `join_date` date DEFAULT NULL,
  `level_id` int(11) NOT NULL,
  `graded_date` date DEFAULT NULL,
  `membership_type_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `cancellation_date` date DEFAULT NULL,
  `contract_renewal_date` date DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `membership_type_id` (`membership_type_id`),
  KEY `payment_method_id` (`payment_method_id`),
  KEY `account_type_id` (`account_type_id`),
  KEY `bank_id` (`bank_id`),
  KEY `level_id` (`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_number`, `first_name`, `last_name`, `join_date`, `level_id`, `graded_date`, `membership_type_id`, `payment_method_id`, `payment_amount`, `payment_date`, `account_number`, `branch_code`, `account_type_id`, `bank_id`, `notes`, `cancellation_date`, `contract_renewal_date`, `created`, `modified`) VALUES
(1, '376', 'Adrian', 'Alexander', '2011-02-03', 1, NULL, 1, 1, '525', '1st', '073202428', '036309', 1, 1, '', NULL, '2012-02-01', '2012-01-03 00:24:15', '2012-01-03 00:24:15'),
(2, '402', 'Chris', 'Bam', NULL, 2, NULL, 2, 2, 'PIF', '40909', '', '', 2, 2, 'PRIVATES', NULL, '2012-02-01', '2012-01-03 00:24:15', '2012-01-03 00:24:15'),
(3, '230', 'Gustav', 'Bam', '2009-04-04', 3, NULL, 1, 1, '525', '1st', '50210023095', '261649', 1, 2, '', NULL, '2012-04-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(4, '334', 'Bryan', 'Banfield', '2010-06-28', 1, NULL, 1, 1, '525', '6th', '071862943', '022209', 1, 1, '', NULL, '2012-06-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(5, '064', 'David ', 'Banks', NULL, 1, NULL, 1, 1, NULL, NULL, '', '', 1, 1, '', '0000-00-00', NULL, '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(6, '236', 'Tyrone', 'Beck', '2009-04-14', 4, NULL, 3, 1, '395', '1st', '62163048781', '203809', 1, 2, 'PRIVATES', NULL, '2012-04-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(7, '002', 'Roberto', 'Bellotto', '2007-09-13', 5, NULL, 1, 1, '250', '1st', '4061909320', '632005', 1, 3, '', NULL, '2012-09-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(8, '270', 'Arnhem', 'Bezuidenhout', '2009-07-14', 1, NULL, 3, 1, '395', '1st', '012061298', '020009', 1, 1, '', NULL, '2012-07-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(9, '381', 'Jaco ', 'Blom', '2011-05-12', 1, NULL, 3, 1, '400', '6TH', '9115693321', '632005', 2, 3, '', NULL, '2012-05-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(10, '397', 'Clyde', 'Bodenham', '2011-02-07', 1, NULL, 4, 1, '1000', '1st', '4069841752', '632005', 1, 3, 'PRIVATES', NULL, '2012-02-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(11, '038', 'Jonathan', 'Bossenger', '2007-10-18', 3, NULL, 1, 1, '600', '1st', '4065220534', '632005', 1, 3, '', NULL, '2012-10-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(12, '082', 'Andrew', 'Burger', '2008-01-14', 3, NULL, 3, 1, '330', '1st', '73065005', '036509', 1, 1, '', NULL, '2012-01-01', '2012-01-03 00:24:16', '2012-01-03 00:24:16'),
(13, '081', 'Belinda', 'Burger', '2008-01-14', 1, NULL, 5, 5, NULL, NULL, '', '', 5, 5, '', NULL, NULL, '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(14, '396', 'Dominic', 'Brummer', '2011-08-25', 6, NULL, 3, 1, '400', '6th', '70676690', '020909', 2, 1, '', NULL, '2012-09-01', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(15, '163', 'David', 'Chu', '2008-11-10', 1, NULL, 6, 1, '200', '1st', '62069770264', '204209', 1, 2, '', NULL, '2012-11-01', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(16, '299', 'Dimitri', 'Cloots', '2009-12-08', 6, NULL, 1, 1, NULL, NULL, '', '', 1, 1, 'teaching Judo/free membership', NULL, NULL, '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(17, '327', 'Gert', 'Coetzee', '2010-04-22', 3, '0000-00-00', 3, 1, '395', '1st', '4067250771', '632005', 1, 3, '', NULL, '2012-05-01', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(18, '388', 'Leon', 'Coetzee', '2011-10-18', 6, NULL, 1, 1, '550', '28th', '9099905666', '632005', 2, 3, '', NULL, '2012-10-01', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(19, '171', 'Antonio', 'Cutino', '2008-12-23', 3, NULL, 1, 1, '550', '1st', '4059892404', '632005', 1, 3, '', NULL, '2012-01-01', '2012-01-03 00:24:17', '2012-01-03 00:24:17'),
(20, '024', 'Alain', 'David', '2007-10-02', 3, NULL, 1, 1, '250', '28th', '270422927', '026509', 1, 1, '', NULL, '2012-10-01', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(21, '320', 'Lesley', 'Davids', '2010-02-25', 1, NULL, 1, 1, '550', '1st', '4075174440', '632005', 1, 3, '', NULL, '2012-04-01', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(22, '042', 'Anton', 'Dewet', '2007-10-27', 5, NULL, 1, 1, '495', '1st', '1004434863', '120710', 1, 4, '', NULL, '2012-11-01', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(23, '391', 'Nelson', 'Das Neves', '2011-07-27', 6, NULL, 1, 1, '550', '1st', '270508228', '024109', 1, 1, '', NULL, '2012-08-01', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(24, '398', 'Renato', 'Bacelar Da Silveira', '2011-09-07', 6, NULL, 1, 1, '550', '1st', '1039114008', '115610', 1, 4, '', NULL, '2012-09-01', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(25, '340', 'Emile', 'De Wet', '2010-08-03', 6, NULL, 1, 1, '525', '1st', '4074553712', '632500', 1, 3, 'no payment December owes', NULL, NULL, '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(26, '226', 'Stephen', 'De Wet', '2009-03-12', 3, NULL, 1, 1, '275', '1st', '272186082', '02220900', 1, 1, '', NULL, '2012-04-01', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(27, '378', 'Mario', 'Del Mistro', '2011-03-23', 6, NULL, 3, 2, '375', '1st', '', '', 2, 2, '', NULL, '2012-04-01', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(28, '380', 'Craig', 'Duke', '2011-05-25', 1, NULL, 3, 1, '400', '1st', '073275999', '026509', 1, 1, '', NULL, '2012-06-01', '2012-01-03 00:24:18', '2012-01-03 00:24:18'),
(29, '232', 'Elna', 'Dreyer', '2009-03-01', 6, NULL, 6, 2, '375', '1st', '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(30, '215', 'Kobus', 'Dreyer', '2009-03-01', 6, NULL, 3, 2, '375', '1st', '', '', 2, 2, '', NULL, '2012-03-01', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(31, '014', 'Dudley', 'Drummond - Hayes', '2007-09-25', 3, NULL, 1, 1, '525', '1st', '272188026', '022209', 1, 1, 'on hold ', '0000-00-00', '2012-10-01', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(32, '347', 'Kealoha ', 'du Toit', '2010-08-17', 6, NULL, 3, 1, '375', '6th', '071342842', '024909', 1, 1, 'stop 1st FEB 2012', NULL, NULL, '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(33, '246', 'Andre', 'Ensil', '2009-04-21', 3, NULL, 3, 1, '395', '1st', '4056703995', '632005', 1, 3, '', NULL, '2012-05-01', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(34, '348', 'Jason', 'Engledoe', '2010-08-23', 6, NULL, 1, 1, '425', '6th', '4075930979', '632005', 1, 3, 'on hold', '0000-00-00', NULL, '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(35, '406', 'Hoosain', 'Essop', NULL, 2, NULL, 5, 5, NULL, NULL, '', '', 5, 5, '', NULL, NULL, '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(36, '375', 'Hannes', 'Foulds', '2011-05-04', 1, NULL, 1, 1, '450', '1st', '62006532742', '241038', 1, 2, '', NULL, '2012-05-01', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(37, '317', 'Reinhardt', 'Gallowitz', '2010-02-20', 3, NULL, 3, 1, '395', '1st', '9174967646', '632005', 2, 3, '', NULL, '2012-03-01', '2012-01-03 00:24:19', '2012-01-03 00:24:19'),
(38, '331', 'Heino', 'Gallowitz', '2010-06-06', 5, NULL, 1, 1, '525', '1st', '9115686952', '632005', 2, 3, '', NULL, '2012-06-01', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(39, '368', 'Michael', 'Gaylard', '2011-05-04', 7, NULL, 1, 1, '550', '28th', '001618873', '004305', 1, 1, '', NULL, '2012-05-01', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(40, '165', 'victor ', 'Geldenhuys', '2008-12-02', 6, NULL, 3, 1, '375', '6th', '270475230', '026509', 1, 1, '', NULL, '2012-12-01', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(41, '361', 'Jarryd', 'Gerber', NULL, 7, NULL, 3, 1, '375', '1ST', '62180587457', '220323', 1, 2, '', NULL, NULL, '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(42, '399', 'Dave', 'Gillespie', '2011-12-12', 3, NULL, 1, 3, '3 months pay', '1st', '', '', 3, 3, '', NULL, '2012-12-01', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(43, '407', 'Themba', 'Gonmbo', NULL, 6, NULL, 7, 7, NULL, NULL, '', '', 7, 7, '', NULL, NULL, '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(44, '239', 'Mario', 'Grauso', '2009-04-03', 2, NULL, 3, 1, '605', '1st', '070436657', '20009', 1, 1, '', NULL, '2012-04-01', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(45, '231', 'Michele', 'Grauso', '2009-04-03', 7, NULL, 3, 1, '290', '1st', '073274119', '026509', 1, 1, '', NULL, '2012-04-01', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(46, '080', 'Lance', 'Greeff', '2008-01-15', 3, NULL, 1, 1, '810', '1st', '1006300597', '187505', 1, 4, '', NULL, '2012-01-01', '2012-01-03 00:24:20', '2012-01-03 00:24:20'),
(47, '408', 'Caryn', 'Greeff', NULL, 1, NULL, 3, 3, NULL, NULL, '', '', 3, 3, '', NULL, NULL, '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(48, '172', 'Burger', 'Grobler', '2009-01-05', 6, NULL, 1, 1, '550', '1st', '1225523514', '470010', 1, 5, '', NULL, NULL, '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(49, '273', 'Tertius', 'Groenewald', '2010-02-08', 1, NULL, 3, 1, '395', '1st', '4077831797', '632005', 1, 3, '', NULL, '2012-03-01', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(50, '235', 'Ryan', 'Henry', '2009-04-09', 4, NULL, 1, 2, NULL, '1st', '73049158', '036309', 1, 1, '', NULL, NULL, '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(51, '354', 'Daniel', 'Isaacs', '2010-10-30', 1, NULL, 3, 1, '375', '28th', '50221124668', '200510', 1, 2, '', NULL, '2012-11-01', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(52, '255', 'Alleem ', 'Isaacs', '2009-06-02', 1, NULL, 3, 1, '395', '1st', '1041001134', '104109', 1, 4, 'on hold', '0000-00-00', '2012-06-01', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(53, '254', 'Ebrahim', 'Jacobs', '2009-06-02', 1, NULL, 8, 1, '420', '1st', '1926001028', '192621', 1, 4, '', NULL, '2012-06-01', '2012-01-03 00:24:21', '2012-01-03 00:24:21'),
(54, '369', 'Richard', 'Jansen', '2011-04-13', 7, NULL, 3, 1, '300', '28th', '4068992592', '632005', 1, 3, '', NULL, '2012-04-01', '2012-01-03 00:24:21', '2012-01-03 00:24:22'),
(55, '437', 'Josua', 'Joubut', NULL, 1, NULL, 1, 3, NULL, NULL, '', '', 3, 3, '', NULL, NULL, '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(56, '356', 'Kean', 'Johannes', '2010-11-16', 1, NULL, 3, 1, '275', '28th', '2032037416', '103210', 2, 4, '', NULL, '2012-11-01', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(57, '176', 'Kurt', 'Joshua', NULL, 1, NULL, 1, 1, '525', '1st', '62204656617', '204109', 1, 2, '', NULL, NULL, '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(58, '411', 'Francoi', 'Kabulou', NULL, 6, NULL, 9, 9, NULL, NULL, '', '', 9, 9, '', NULL, NULL, '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(59, '412', 'Shuaib', 'Khan', NULL, 2, NULL, 5, 5, NULL, NULL, '', '', 5, 5, '', NULL, NULL, '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(60, '287', 'Ross', 'Killassy', '2009-10-14', 1, NULL, 1, 1, '525', '1st', '4060146181', '632005', 1, 3, '', NULL, '2012-10-01', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(61, '200', 'Clyde', 'Koen', '2009-01-26', 1, NULL, 1, 1, '550', '1ST', '62088891257', '201109', 1, 2, 'PLEASE PUT ON HOLD FOR JAN FEB AND MARCH - BACK ON NETCASH IN APRIL', NULL, '2012-02-01', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(62, '249', 'Anne-liese', 'Kruger', '2009-05-12', 1, NULL, 3, 1, '395', '1st', '4078134920', '632005', 2, 3, '', NULL, '2012-05-01', '2012-01-03 00:24:22', '2012-01-03 00:24:22'),
(63, '352', 'Alwyn', 'Landman', '2010-08-08', 3, NULL, 1, 1, '425', '6th', '9204927475', '632005', 2, 3, '', NULL, '2012-08-01', '2012-01-03 00:24:22', '2012-01-03 00:24:23'),
(64, '387', 'Luke ', 'Lanterme', '2011-08-06', 7, NULL, 1, 1, '550', '1st', '62134939913', '261251', 1, 2, '', NULL, '2012-08-01', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(65, '304', 'Jacobus', 'Langner', '2010-01-08', 4, NULL, 3, 1, '400', '1st', '62237701554', '210117', 1, 2, '', NULL, '2012-02-01', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(66, '394', 'Roger ', 'Leverton', '2011-06-11', 2, NULL, 3, 1, '400', '1st', '62049565776', '200109', 2, 2, '', NULL, '2012-07-01', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(67, '377', 'John', 'Lotriet', '2011-05-10', 1, NULL, 1, 1, '550', '1st', '276257243', '026509', 2, 1, '', NULL, '2012-06-01', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(68, '373', 'Sidney', 'Louw', '2011-03-31', 6, NULL, 3, 1, '375', '1st', '623343898', '632005', 2, 3, '', NULL, '2012-04-01', '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(69, '005', 'Skye', 'Middleton', NULL, 8, NULL, 8, 8, NULL, NULL, '', '', 8, 8, '', NULL, NULL, '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(70, 'C071', 'St John', 'Midgley', '2010-03-04', 5, NULL, 3, 1, '350', '1st', '4060970326', '632005', 1, 3, 'Romayne mother acct name', NULL, NULL, '2012-01-03 00:24:23', '2012-01-03 00:24:23'),
(71, '362', 'Craig', 'Moore', '2011-02-23', 1, NULL, 3, 1, '375', '1st', '54450034961', '?', 1, 2, '', NULL, '2012-03-01', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(72, '418', 'Jarryd', 'Moore', '2011-06-27', 6, NULL, 3, 1, '300', '1st', '360228003', '462005', 2, 6, 'start netcash Aug Please put through at R300 for August, September, October then back R450.00 ', NULL, '2012-08-01', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(73, '323', 'Junaid', 'Moodley', '2010-04-08', 1, NULL, 3, 1, '395', '1st', '4071797662', '632005', 1, 3, '', NULL, '2012-04-01', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(74, '319', 'Justin', 'Moodley', '2010-03-16', 1, NULL, 3, 1, '550', '1st', '4061478082', '632005', 1, 3, '', NULL, '2012-03-01', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(75, '364', 'Johan', 'Mostert', '2011-01-11', 6, NULL, 3, 1, '275', '1st', '061073385', '022209', 1, 1, '', NULL, '2012-01-01', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(76, '392', 'Shaun', 'Mac Wyne', '2011-11-04', 6, NULL, 1, 1, NULL, NULL, '', '', 1, 7, '', NULL, '2012-11-01', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(77, '395', 'Vas', 'Naidoo', '2011-10-08', 6, NULL, 3, 1, '400', '28th', '272084727', '026509', 1, 1, '', NULL, '2012-10-01', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(78, '363', 'Krigan', 'Naiker', '2011-01-28', 1, NULL, 3, 1, '275', '1st', '136572235', '51001', 1, 1, '', NULL, '2012-02-01', '2012-01-03 00:24:24', '2012-01-03 00:24:24'),
(79, '382', 'Donovan', 'Neethling', '2011-06-08', 6, NULL, 3, 1, '375', '28th', '9074575105', '632005', 2, 3, '', NULL, '2012-06-01', '2012-01-03 00:24:24', '2012-01-03 00:24:25'),
(80, '361', 'Danie', 'Nagel', '2010-11-03', 1, NULL, 1, 1, '525', '1st', '62109580664', '203809', 1, 2, 'stop 1st Feb 2012', '0000-00-00', '2012-11-01', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(81, '243', 'Mario', 'Nortje', '2009-04-27', 1, NULL, 1, 1, '375', '1st', '1019246596', '101910', 1, 4, '', '0000-00-00', NULL, '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(82, '015', 'Gareth ', 'Oliver', '2007-09-21', 8, NULL, 1, 1, '450', '6th', '4062588606', '632005', 1, 3, '', NULL, '2012-10-01', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(83, '143', 'Lisa ', 'Olivier', '2008-09-03', 1, NULL, 3, 1, '375', '1st', '4051712109', '632005', 1, 3, 'on hold Jan/Feb', NULL, '2012-09-01', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(84, '359', 'Jerome', 'Petersen', '2010-11-15', 1, NULL, 3, 1, '375', '6th', '271119721', '026509', 1, 1, '', NULL, '2012-10-01', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(85, '371', 'Edwin', 'Pietersen', '2011-03-30', 6, NULL, 1, 1, '550', '28th', '202052044', '23910', 1, 1, '', NULL, '2012-04-01', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(86, '305', 'David', 'Philp', '2010-01-07', 1, NULL, 1, 1, '550', '1st', '54641150188', '203808', 1, 2, '', NULL, '2012-02-01', '2012-01-03 00:24:25', '2012-01-03 00:24:25'),
(87, '275', 'Juan', 'Poerstamper', '2009-10-01', 1, NULL, 5, 1, NULL, NULL, '', '', 1, 1, '', NULL, '2012-10-01', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(88, '372', 'Juan', 'Potter', '2011-04-21', 6, NULL, 1, 1, '550', '1ST', '9246115444', '6931', 2, 3, '', NULL, '2012-05-01', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(89, '393', 'Kris', 'Rabeling', '2011-11-04', 6, NULL, 1, 1, '1100', '6th', '270476873', '026509', 1, 1, '', NULL, '2012-11-01', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(90, '344', 'Charles', 'Rose', '2010-08-03', 1, NULL, 3, 1, '375', '1st', '1207001341', '120710', 1, 4, '', NULL, '2012-08-01', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(91, '272', 'Gert', 'Roux', '2009-09-02', 6, NULL, 3, 1, '395', '1st', '1457540258', '104609', 1, 4, '', NULL, '2012-09-01', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(92, '184', 'Frederick', 'Rusterholz', '2009-01-07', 1, NULL, 1, 1, '550', '1st', '62071639101', '200309', 1, 2, '', NULL, '2012-02-01', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(93, '383', 'Shaun', 'Rutgers', '2011-05-17', 6, NULL, 3, 1, '400', '28th', '62064802939', '201409', 1, 2, '', NULL, '2012-06-01', '2012-01-03 00:24:26', '2012-01-03 00:24:26'),
(94, '425', 'Owen', 'Rutgers', '2011-05-24', 6, NULL, 3, 1, '400', '28th', '2152001729', '115209', 2, 8, '', NULL, '2012-06-01', '2012-01-03 00:24:26', '2012-01-03 00:24:27'),
(95, '203', 'Kyle', 'Saddington', '2009-01-27', 3, NULL, 1, 1, '290', '1st', '62082116304', '200209', 2, 2, '', NULL, '2012-02-01', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(96, '271', 'Barry', 'Salmon', '2009-08-28', 1, NULL, 1, 1, '525', '1st', '9141085653', '632005', 2, 3, 'on hold back on April', '0000-00-00', '2012-09-01', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(97, '128', 'Michael', 'Sam', '2008-07-26', 1, NULL, 3, 1, '395', '1st', '4055655892', '632005', 1, 3, '', NULL, '2012-08-01', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(98, '029', 'Marco', 'Savio', '2007-10-05', 4, NULL, 3, 1, '630', '1st', '73278157', '6559', 1, 1, '', NULL, '2012-10-01', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(99, '338', 'Graeme', 'Shepherd', '2010-07-19', 1, NULL, 3, 1, '375', '1st', '50269037245', '201110', 1, 2, '', NULL, '2012-08-01', '2012-01-03 00:24:27', '2012-01-03 00:24:27'),
(100, '108', 'Shaun', 'Shulze', '2008-04-19', 6, NULL, 1, 1, '525', '1st', '60198059715', '210218', 1, 2, '', NULL, '2012-05-01', '2012-01-03 00:24:27', '2012-01-03 00:24:28'),
(101, '341', 'Diana', 'Siccardi', NULL, 1, NULL, 3, 2, '750', '1st', '1057211683', '632005', 1, 3, '', NULL, NULL, '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(102, '342', 'Fabio', 'Siccardi', NULL, 1, NULL, 3, 2, NULL, NULL, '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(103, '295', 'Farryl', 'Singh', '2009-11-27', 6, NULL, 3, 1, '525', '1st', '4053986891', '632005', 1, 3, '', NULL, '2012-12-01', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(104, '121', 'Shalendra', 'Singh', '2008-07-07', 3, NULL, 1, 1, '525', '1st', '71179305', '026509', 1, 1, '', NULL, '2012-07-01', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(105, '426', 'Grant', 'Solomon', NULL, 2, NULL, 5, 5, NULL, NULL, '', '', 5, 5, '', NULL, NULL, '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(106, '326', 'Andrew', 'Stephen', '2010-04-14', 1, NULL, 1, 1, '525', '15th', '62004260494', '200510', 1, 2, '', NULL, '2012-04-01', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(107, '378', 'Wesley', 'Stewart', '2011-05-11', 6, NULL, 1, 1, '550', '6th', '1071395653', '107110', 2, 4, '', NULL, '2012-06-01', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(108, '379', 'Joshua', 'Strydom', '2011-03-01', 6, NULL, 3, 1, '275', '1st', '1046549642', '1040901', 1, 4, '', NULL, '2012-03-01', '2012-01-03 00:24:28', '2012-01-03 00:24:28'),
(109, '264', 'Daniel', 'Taylor', '2009-07-20', 1, NULL, 1, 1, '950', '1st', '       072535873', '022209', 1, 1, '', NULL, '2012-08-01', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(110, '389', 'Robyn', 'Taylor', '2011-09-17', 7, NULL, 3, 3, NULL, NULL, '', '', 3, 9, '', NULL, '2012-10-01', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(111, '090', 'Shaun', 'Thaysen', '2008-01-26', 3, NULL, 1, 4, NULL, NULL, '4064160436', '632005', 4, 3, '', NULL, '2012-02-01', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(112, '168', 'Tetsuya', 'Tomitsuka', '2008-12-11', 3, NULL, 1, 1, '375', '1st', '1083373749', '108309', 1, 4, '', NULL, '2012-01-01', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(113, '394', 'Annalize', 'Van Deijl', '2011-11-16', 2, NULL, 1, 1, '550', '1st', '62067796220', '250655', 2, 2, '', NULL, '2012-12-01', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(114, '431', 'Wilco', 'Van Deijl', '2011-11-17', 6, NULL, 3, 1, '400', '1st', '62049724695', '250655', 2, 2, '', NULL, '2012-12-01', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(115, '430', 'John', 'van der Veen', NULL, 9, NULL, 9, 9, NULL, NULL, '', '', 9, 9, '', NULL, NULL, '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(116, '432', 'Pierre', 'van der Walt', NULL, 3, NULL, 3, 3, NULL, NULL, '', '', 3, 3, '', NULL, NULL, '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(117, '433', 'Rene', 'van der Westhuizen', NULL, 6, NULL, 10, 10, NULL, NULL, '', '', 10, 10, '', NULL, NULL, '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(118, '282', 'Eugene', 'Van Wyk', '2009-10-06', 1, NULL, 3, 1, '375', '1st', '38040181978', '632005', 2, 3, '', NULL, '2012-10-01', '2012-01-03 00:24:29', '2012-01-03 00:24:29'),
(119, '269', 'Roderick', 'Van Eeden', '2009-08-12', 7, NULL, 6, 1, '180', '1st', '9011689419', '632005', 2, 3, '', NULL, '2012-09-01', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(120, '385', 'Lawrence', 'Van Niekerk', '2011-07-13', 1, NULL, 1, 1, '550', '1st', '9068103964', '632005', 2, 3, '', NULL, '2012-08-01', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(121, '078', 'Gerhardt', 'Van Zyl', '2008-01-10', 8, NULL, 3, 5, '315', '1st', '', 'auto pay', 5, 3, '', NULL, '0000-00-00', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(122, '102', 'Jaco', 'Venter', '2008-03-08', 3, NULL, 1, 1, '525', '1st', '4050315768', '632005', 1, 3, '', '0000-00-00', NULL, '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(123, '386', 'Albrecht', 'von Maltzahn', '2011-06-01', 2, NULL, 3, 1, '400', '6th', '1083395955', '108309', 2, 8, '', NULL, '2012-06-01', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(124, '219', 'Marc', 'Vorster', '2009-02-18', 7, NULL, 3, 1, '375', '1st', '62251591345', '201410', 1, 2, '', NULL, '2012-04-01', '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(125, '154', 'Steve', 'Walker', '2008-10-02', 6, NULL, 1, 1, NULL, NULL, '', '', 1, 1, '', '0000-00-00', NULL, '2012-01-03 00:24:30', '2012-01-03 00:24:30'),
(126, '125', 'Marco', 'Wentzel', '2008-07-17', 1, NULL, 11, 1, '525', '1st', '4048069101', '632005', 1, 3, '', NULL, '2012-08-01', '2012-01-03 00:24:30', '2012-01-03 00:24:31'),
(127, '144', 'Rory', 'Young', '2008-09-17', 6, NULL, 1, 1, '525', '26TH', '4054902412', '632005', 1, 10, '', '0000-00-00', NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(128, '', '', '', NULL, 10, NULL, 10, 10, NULL, NULL, '', '', 10, 10, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(129, '', '', '', NULL, 10, NULL, 10, 10, NULL, NULL, '', '', 10, 10, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(130, '', '', '', NULL, 10, NULL, 10, 10, NULL, NULL, '', '', 10, 10, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(131, 'C102', 'Adam', 'Austin', '2011-08-03', 2, NULL, 3, 3, '300', '1ST', '', '', 3, 11, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(132, 'C070', 'Matthew', 'Beck', NULL, 11, NULL, 3, 3, '140', NULL, '', '', 3, 12, '', '0000-00-00', NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(133, 'C105', 'Rhys', 'Botha', '2011-08-16', 10, NULL, 3, 3, '375', '1st', '50220116129', '200510', 3, 3, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(134, 'C103', 'Grwen', 'Bizarro', '2011-10-01', 6, NULL, 6, 3, '200', '1ST', '', '', 3, 3, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(135, 'C068', 'Max', 'Capelle', '2010-02-16', 11, NULL, 3, 1, '500', '1st', '9093076368', '632005', 2, 13, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(136, 'C067', 'Felix', 'Capelle', '2010-02-16', 11, NULL, 3, 1, NULL, NULL, '', '', 1, 1, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(137, 'C048', 'Lloyd', 'Darwell', NULL, 11, NULL, 11, 2, NULL, NULL, '', '', 2, 2, '', '0000-00-00', NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(138, 'C097', 'Brandon', 'David', '2011-05-01', 10, NULL, 12, 12, NULL, NULL, '', '', 12, 12, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(139, 'C107', 'Paolo', 'De Sousa', '2011-12-15', 6, NULL, 12, 1, NULL, NULL, '', '', 1, 1, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(140, 'C108', 'Clarice', 'Dreyer', '2011-08-11', 6, NULL, 6, 2, '200', '1st', '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(141, 'C096', 'Antonio', 'Grauso', '2010-08-05', 6, NULL, 3, 1, NULL, NULL, '', '', 1, 14, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(142, 'C098', 'Leandro', 'Del Mistro', '2010-07-30', 12, NULL, 3, 2, NULL, NULL, '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(143, 'C064', 'Morgan', 'Erasmus', '2010-01-20', 13, NULL, 3, 1, '250', '1st', '070858136', 'Bayside', 1, 15, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(144, 'C065', 'Aeddan', 'Erasmus', '2010-01-20', 13, NULL, 3, 1, '250', '1st', '1520145741', '632005', 1, 16, '', NULL, NULL, '2012-01-03 00:24:31', '2012-01-03 00:24:31'),
(145, 'C093', 'Christopher', 'Fourie', '2011-02-06', 7, NULL, 3, 2, '265', '1st', '106132613', '106012', 1, 17, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(146, 'C093', 'Louis', 'Fourie', '2011-04-15', 2, NULL, 3, 3, NULL, NULL, '', '', 3, 3, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(147, 'C059', 'Wildre ', 'Fourie', '2009-10-09', 14, NULL, 3, 1, '250', '15th', '270948694', '020909', 1, 18, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(148, 'C109', 'Joel ', 'Gaynham', '2011-06-01', 7, NULL, 3, 1, '265', '1st', '', '', 1, 1, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(149, 'C104', 'Duncan', 'Hoole', '2011-12-02', 6, NULL, 3, 1, '300', '1st', '1088001904', '', 1, 4, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(150, 'C111', 'Luca', 'Inglese', '2011-10-20', 6, NULL, 3, 6, '1125', '1st Feb 2012', ' ', '', 6, 6, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(151, 'C057', 'Shuaib', 'Jacobs', '2009-11-01', 15, NULL, 13, 13, NULL, NULL, '', '', 13, 19, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(152, 'C058', 'Mahdi', 'Jacobs', '2009-11-01', 15, NULL, 13, 13, NULL, NULL, '', '', 13, 13, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(153, 'C035', 'Austin', 'kettle', '2008-10-20', 16, NULL, 3, 1, '265', '1st', '1457539322', '145710', 1, 4, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(154, 'C097', 'Ethan', 'Lindeque', '2011-03-07', 2, NULL, 3, 1, '265', '1st', '9053877059', '632005', 2, 20, '', NULL, '2012-01-01', '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(155, 'C081', 'Elijah', 'Lurie', '2010-09-01', 1, NULL, 14, 2, '1950', '1st April 2012', '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(156, 'C096', 'Mica', 'Lurie', '2011-04-29', 2, NULL, 3, 3, '265', '1st', '', '', 3, 3, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(157, 'C101', 'Bianca', 'Moen', '2011-06-26', 2, NULL, 3, 1, '750', '1st', '272210722', '00051001', 1, 1, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(158, 'C100', 'Daniel', 'Moen', '2011-06-26', 2, NULL, 15, 1, NULL, NULL, '', '', 1, 1, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(159, 'C078', 'Axel', 'Moore', '2010-09-20', 12, NULL, 1, 1, '350', '1st', '501 70037558', 'Rondebosch', 1, 21, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(160, 'C062', 'Angelo', 'Nunes', '2009-12-04', 14, NULL, 3, 2, '265', '1st', '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:32'),
(161, 'C063', 'Romelo', 'Nunes', '2009-12-04', 14, NULL, 3, 2, '265', '1st', '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:32', '2012-01-03 00:24:33'),
(162, 'C074', 'Nicholas ', 'Philp', '2010-08-05', 1, NULL, 3, 1, '158', '1st', '271226870', '022209', 1, 1, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(163, 'C104', 'Brandon', 'Roman', '2011-11-16', 6, NULL, 12, 1, '375', '1st', '4045067473', '632005', 1, 3, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(164, 'C069', 'Brandon', 'Renda', '2010-02-18', 11, NULL, 3, 1, '265', '28th', '62091001257', '203309', 1, 22, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(165, 'C113', 'Matthew', 'Savio', '2011-08-29', 17, NULL, 3, 1, '375', '1st', '', '', 1, 23, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(166, 'C042', 'Richard', 'Scott', '2009-02-12', 18, NULL, 3, 1, '265', '1st', '62006249503', '203809', 1, 24, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(167, 'C075', 'Aydan', 'Spies', '2010-08-13', 11, NULL, 6, 1, '265', '6th', '4060488440', '632550', 1, 25, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(168, 'C025', 'Triston', 'Segal', '2008-06-12', 19, NULL, 12, 1, '350', '28th', '4047941594', '632005', 1, 26, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(169, 'C103', 'Natasha', 'Siccardi', '2011-07-22', 10, NULL, 6, 7, '200', '1st', '', '', 7, 7, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(170, 'C102', 'Nicole', 'Siccardi', '2011-07-22', 10, NULL, 6, 7, NULL, NULL, '', '', 7, 7, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(171, 'C094', 'Kaya', 'Stockwell', '2011-03-23', 20, NULL, 12, 2, '265', '1ST', '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(172, 'C114', 'Joshua', 'Stockwell', '2011-03-23', 10, NULL, 12, 2, '265', '1ST', '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(173, 'C115', 'Alec', 'Webb', '2011-06-22', 10, NULL, 10, 10, NULL, NULL, '', '', 10, 10, '', NULL, NULL, '2012-01-03 00:24:33', '2012-01-03 00:24:33'),
(174, 'C002', 'Luke ', 'Webb', '2007-09-13', 21, NULL, 12, 1, '210', '2nd', '4061061225', '632005', 1, 3, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(175, 'C003', 'Emma ', 'Webb', '2007-09-13', 21, NULL, 12, 1, '210', '2nd', '', '', 1, 1, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(176, 'C099', 'Benjamin', 'Wilson-Langman', '2009-10-13', 14, NULL, 12, 2, '265', '1ST', '', '', 2, 2, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(177, 'C095', 'Brendan', 'Woodbourne', '2011-03-25', 7, NULL, 12, 8, '780', 'Jan 1st 2012', '', '', 8, 8, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(178, '', '', '', NULL, 8, NULL, 8, 8, NULL, NULL, '', '', 8, 8, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(179, '', '', '', NULL, 8, NULL, 8, 8, NULL, NULL, '', '', 8, 8, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(180, '', '', '', NULL, 8, NULL, 8, 8, NULL, NULL, '', '', 8, 8, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(181, '', '', '', NULL, 8, NULL, 8, 8, NULL, NULL, '', '', 8, 8, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(182, '', '', '', NULL, 8, NULL, 8, 8, NULL, NULL, '', '', 8, 8, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(183, '', '', '', NULL, 8, NULL, 8, 8, NULL, NULL, '', '', 8, 8, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34'),
(184, '374', 'Alexander', 'Leigh', '0000-00-00', 22, '0000-00-00', 16, 9, '082 8258328', NULL, 'alexleigh85@gmail.com', '39147', 3, 3, '', NULL, NULL, '2012-01-03 00:24:34', '2012-01-03 00:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE IF NOT EXISTS `student_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_attendances`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE IF NOT EXISTS `student_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_emails`
--

CREATE TABLE IF NOT EXISTS `system_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(100) NOT NULL,
  `replyTo` varchar(255) NOT NULL,
  `to` varchar(100) NOT NULL,
  `cc` varchar(100) NOT NULL,
  `bcc` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `attachments` text NOT NULL,
  `layout` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `sendAs` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `processed` tinyint(1) NOT NULL,
  `date` datetime DEFAULT NULL,
  `opened` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system_emails`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `created`, `modified`, `active`) VALUES
(1, 'Jonathan', 'Bossenger', 'admin', 'aae5ad56d986b6c89aa80c1110b9bfc9f20981be', 'psykro@gmail.com', '2011-10-10 09:10:32', '2011-12-29 15:19:21', 1),
(2, 'James', 'Smart', 'james', 'bbe012f01796054910b42e9c8cf2960dcf720ee4', 'james@graciejiujitsu.co.za', '2011-10-12 14:55:14', '2011-10-31 15:10:27', 1);
