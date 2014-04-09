-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2014 at 06:08 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sketchr`
--
CREATE DATABASE IF NOT EXISTS `sketchr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sketchr`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image`) VALUES
(1, 'Gaming', 'mon_image'),
(6, 'General', 'http://www.youtube.com/results?search_query=cyprien');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE IF NOT EXISTS `category_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `post_date` date NOT NULL,
  `category_topic` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category_post_report_abuse`
--

CREATE TABLE IF NOT EXISTS `category_post_report_abuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` text NOT NULL,
  `processed` tinyint(1) NOT NULL,
  `category_post` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category_topic`
--

CREATE TABLE IF NOT EXISTS `category_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `creation_date` date NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `category` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('40fa7fbea95a524eac74e1ddac75bd5d', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36', 1396993162, ''),
('8ed180cf581e390c26f922916df7aa39', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36', 1396996244, '');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `english_name` varchar(50) NOT NULL,
  `french_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `language_english` (`english_name`),
  UNIQUE KEY `language_french` (`french_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `english_name`, `french_name`) VALUES
(1, 'Afghanistan', 'Afghanistan'),
(2, 'Albania', 'Albanie'),
(3, 'Antarctica', 'Antarctique'),
(4, 'Algeria', 'Algérie'),
(5, 'American Samoa', 'Samoa Américaines'),
(6, 'Andorra', 'Andorre'),
(7, 'Angola', 'Angola'),
(8, 'Antigua and Barbuda', 'Antigua-et-Barbuda'),
(9, 'Azerbaijan', 'Azerbaïdjan'),
(10, 'Argentina', 'Argentine'),
(11, 'Australia', 'Australie'),
(12, 'Austria', 'Autriche'),
(13, 'Bahamas', 'Bahamas'),
(14, 'Bahrain', 'Bahreïn'),
(15, 'Bangladesh', 'Bangladesh'),
(16, 'Armenia', 'Arménie'),
(17, 'Barbados', 'Barbade'),
(18, 'Belgium', 'Belgique'),
(19, 'Bermuda', 'Bermudes'),
(20, 'Bhutan', 'Bhoutan'),
(21, 'Bolivia', 'Bolivie'),
(22, 'Bosnia and Herzegovina', 'Bosnie-Herzégovine'),
(23, 'Botswana', 'Botswana'),
(24, 'Bouvet Island', 'Île Bouvet'),
(25, 'Brazil', 'Brésil'),
(26, 'Belize', 'Belize'),
(27, 'British Indian Ocean Territory', 'Territoire Britannique de l''Océan Indien'),
(28, 'Solomon Islands', 'Îles Salomon'),
(29, 'British Virgin Islands', 'Îles Vierges Britanniques'),
(30, 'Brunei Darussalam', 'Brunéi Darussalam'),
(31, 'Bulgaria', 'Bulgarie'),
(32, 'Myanmar', 'Myanmar'),
(33, 'Burundi', 'Burundi'),
(34, 'Belarus', 'Bélarus'),
(35, 'Cambodia', 'Cambodge'),
(36, 'Cameroon', 'Cameroun'),
(37, 'Canada', 'Canada'),
(38, 'Cape Verde', 'Cap-vert'),
(39, 'Cayman Islands', 'Îles Caïmanes'),
(40, 'Central African', 'République Centrafricaine'),
(41, 'Sri Lanka', 'Sri Lanka'),
(42, 'Chad', 'Tchad'),
(43, 'Chile', 'Chili'),
(44, 'China', 'Chine'),
(45, 'Taiwan', 'Taïwan'),
(46, 'Christmas Island', 'Île Christmas'),
(47, 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)'),
(48, 'Colombia', 'Colombie'),
(49, 'Comoros', 'Comores'),
(50, 'Mayotte', 'Mayotte'),
(51, 'Republic of the Congo', 'République du Congo'),
(52, 'The Democratic Republic Of The Congo', 'République Démocratique du Congo'),
(53, 'Cook Islands', 'Îles Cook'),
(54, 'Costa Rica', 'Costa Rica'),
(55, 'Croatia', 'Croatie'),
(56, 'Cuba', 'Cuba'),
(57, 'Cyprus', 'Chypre'),
(58, 'Czech Republic', 'République Tchèque'),
(59, 'Benin', 'Bénin'),
(60, 'Denmark', 'Danemark'),
(61, 'Dominica', 'Dominique'),
(62, 'Dominican Republic', 'République Dominicaine'),
(63, 'Ecuador', 'Équateur'),
(64, 'El Salvador', 'El Salvador'),
(65, 'Equatorial Guinea', 'Guinée Équatoriale'),
(66, 'Ethiopia', 'Éthiopie'),
(67, 'Eritrea', 'Érythrée'),
(68, 'Estonia', 'Estonie'),
(69, 'Faroe Islands', 'Îles Féroé'),
(70, 'Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 'Fiji', 'Fidji'),
(73, 'Finland', 'Finlande'),
(74, 'Åland Islands', 'Îles Åland'),
(75, 'France', 'France'),
(76, 'French Guiana', 'Guyane Française'),
(77, 'French Polynesia', 'Polynésie Française'),
(78, 'French Southern Territories', 'Terres Australes Françaises'),
(79, 'Djibouti', 'Djibouti'),
(80, 'Gabon', 'Gabon'),
(81, 'Georgia', 'Géorgie'),
(82, 'Gambia', 'Gambie'),
(83, 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 'Germany', 'Allemagne'),
(85, 'Ghana', 'Ghana'),
(86, 'Gibraltar', 'Gibraltar'),
(87, 'Kiribati', 'Kiribati'),
(88, 'Greece', 'Grèce'),
(89, 'Greenland', 'Groenland'),
(90, 'Grenada', 'Grenade'),
(91, 'Guadeloupe', 'Guadeloupe'),
(92, 'Guam', 'Guam'),
(93, 'Guatemala', 'Guatemala'),
(94, 'Guinea', 'Guinée'),
(95, 'Guyana', 'Guyana'),
(96, 'Haiti', 'Haïti'),
(97, 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 'Honduras', 'Honduras'),
(100, 'Hong Kong', 'Hong-Kong'),
(101, 'Hungary', 'Hongrie'),
(102, 'Iceland', 'Islande'),
(103, 'India', 'Inde'),
(104, 'Indonesia', 'Indonésie'),
(105, 'Islamic Republic of Iran', 'République Islamique d''Iran'),
(106, 'Iraq', 'Iraq'),
(107, 'Ireland', 'Irlande'),
(108, 'Israel', 'Israël'),
(109, 'Italy', 'Italie'),
(110, 'Côte d''Ivoire', 'Côte d''Ivoire'),
(111, 'Jamaica', 'Jamaïque'),
(112, 'Japan', 'Japon'),
(113, 'Kazakhstan', 'Kazakhstan'),
(114, 'Jordan', 'Jordanie'),
(115, 'Kenya', 'Kenya'),
(116, 'Democratic People''s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 'Republic of Korea', 'République de Corée'),
(118, 'Kuwait', 'Koweït'),
(119, 'Kyrgyzstan', 'Kirghizistan'),
(120, 'Lao People''s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 'Lebanon', 'Liban'),
(122, 'Lesotho', 'Lesotho'),
(123, 'Latvia', 'Lettonie'),
(124, 'Liberia', 'Libéria'),
(125, 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 'Liechtenstein', 'Liechtenstein'),
(127, 'Lithuania', 'Lituanie'),
(128, 'Luxembourg', 'Luxembourg'),
(129, 'Macao', 'Macao'),
(130, 'Madagascar', 'Madagascar'),
(131, 'Malawi', 'Malawi'),
(132, 'Malaysia', 'Malaisie'),
(133, 'Maldives', 'Maldives'),
(134, 'Mali', 'Mali'),
(135, 'Malta', 'Malte'),
(136, 'Martinique', 'Martinique'),
(137, 'Mauritania', 'Mauritanie'),
(138, 'Mauritius', 'Maurice'),
(139, 'Mexico', 'Mexique'),
(140, 'Monaco', 'Monaco'),
(141, 'Mongolia', 'Mongolie'),
(142, 'Republic of Moldova', 'République de Moldova'),
(143, 'Montserrat', 'Montserrat'),
(144, 'Morocco', 'Maroc'),
(145, 'Mozambique', 'Mozambique'),
(146, 'Oman', 'Oman'),
(147, 'Namibia', 'Namibie'),
(148, 'Nauru', 'Nauru'),
(149, 'Nepal', 'Népal'),
(150, 'Netherlands', 'Pays-Bas'),
(151, 'Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 'Aruba', 'Aruba'),
(153, 'New Caledonia', 'Nouvelle-Calédonie'),
(154, 'Vanuatu', 'Vanuatu'),
(155, 'New Zealand', 'Nouvelle-Zélande'),
(156, 'Nicaragua', 'Nicaragua'),
(157, 'Niger', 'Niger'),
(158, 'Nigeria', 'Nigéria'),
(159, 'Niue', 'Niué'),
(160, 'Norfolk Island', 'Île Norfolk'),
(161, 'Norway', 'Norvège'),
(162, 'Northern Mariana Islands', 'Îles Mariannes du Nord'),
(163, 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis'),
(164, 'Federated States of Micronesia', 'États Fédérés de Micronésie'),
(165, 'Marshall Islands', 'Îles Marshall'),
(166, 'Palau', 'Palaos'),
(167, 'Pakistan', 'Pakistan'),
(168, 'Panama', 'Panama'),
(169, 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée'),
(170, 'Paraguay', 'Paraguay'),
(171, 'Peru', 'Pérou'),
(172, 'Philippines', 'Philippines'),
(173, 'Pitcairn', 'Pitcairn'),
(174, 'Poland', 'Pologne'),
(175, 'Portugal', 'Portugal'),
(176, 'Guinea-Bissau', 'Guinée-Bissau'),
(177, 'Timor-Leste', 'Timor-Leste'),
(178, 'Puerto Rico', 'Porto Rico'),
(179, 'Qatar', 'Qatar'),
(180, 'Réunion', 'Réunion'),
(181, 'Romania', 'Roumanie'),
(182, 'Russian Federation', 'Fédération de Russie'),
(183, 'Rwanda', 'Rwanda'),
(184, 'Saint Helena', 'Sainte-Hélène'),
(185, 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis'),
(186, 'Anguilla', 'Anguilla'),
(187, 'Saint Lucia', 'Sainte-Lucie'),
(188, 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon'),
(189, 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines'),
(190, 'San Marino', 'Saint-Marin'),
(191, 'Sao Tome and Principe', 'Sao Tomé-et-Principe'),
(192, 'Saudi Arabia', 'Arabie Saoudite'),
(193, 'Senegal', 'Sénégal'),
(194, 'Seychelles', 'Seychelles'),
(195, 'Sierra Leone', 'Sierra Leone'),
(196, 'Singapore', 'Singapour'),
(197, 'Slovakia', 'Slovaquie'),
(198, 'Vietnam', 'Viet Nam'),
(199, 'Slovenia', 'Slovénie'),
(200, 'Somalia', 'Somalie'),
(201, 'South Africa', 'Afrique du Sud'),
(202, 'Zimbabwe', 'Zimbabwe'),
(203, 'Spain', 'Espagne'),
(204, 'Western Sahara', 'Sahara Occidental'),
(205, 'Sudan', 'Soudan'),
(206, 'Suriname', 'Suriname'),
(207, 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen'),
(208, 'Swaziland', 'Swaziland'),
(209, 'Sweden', 'Suède'),
(210, 'Switzerland', 'Suisse'),
(211, 'Syrian Arab Republic', 'République Arabe Syrienne'),
(212, 'Tajikistan', 'Tadjikistan'),
(213, 'Thailand', 'Thaïlande'),
(214, 'Togo', 'Togo'),
(215, 'Tokelau', 'Tokelau'),
(216, 'Tonga', 'Tonga'),
(217, 'Trinidad and Tobago', 'Trinité-et-Tobago'),
(218, 'United Arab Emirates', 'Émirats Arabes Unis'),
(219, 'Tunisia', 'Tunisie'),
(220, 'Turkey', 'Turquie'),
(221, 'Turkmenistan', 'Turkménistan'),
(222, 'Turks and Caicos Islands', 'Îles Turks et Caïques'),
(223, 'Tuvalu', 'Tuvalu'),
(224, 'Uganda', 'Ouganda'),
(225, 'Ukraine', 'Ukraine'),
(226, 'The Former Yugoslav Republic of Macedonia', 'L''ex-République Yougoslave de Macédoine'),
(227, 'Egypt', 'Égypte'),
(228, 'United Kingdom', 'Royaume-Uni'),
(229, 'Isle of Man', 'Île de Man'),
(230, 'United Republic Of Tanzania', 'République-Unie de Tanzanie'),
(231, 'United States', 'États-Unis'),
(232, 'U.S. Virgin Islands', 'Îles Vierges des États-Unis'),
(233, 'Burkina Faso', 'Burkina Faso'),
(234, 'Uruguay', 'Uruguay'),
(235, 'Uzbekistan', 'Ouzbékistan'),
(236, 'Venezuela', 'Venezuela'),
(237, 'Wallis and Futuna', 'Wallis et Futuna'),
(238, 'Samoa', 'Samoa'),
(239, 'Yemen', 'Yémen'),
(240, 'Serbia and Montenegro', 'Serbie-et-Monténégro'),
(241, 'Zambia', 'Zambie');

-- --------------------------------------------------------

--
-- Table structure for table `humorist`
--

CREATE TABLE IF NOT EXISTS `humorist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `image` varchar(300) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `humorist`
--

INSERT INTO `humorist` (`id`, `first_name`, `last_name`, `image`, `birthday`) VALUES
(1, 'Luplow', 'Luplow', 'fs <df s<wdf', '0000-00-00'),
(2, 'Luplow', 'Lol', 'http://localhost.com', '0000-00-00'),
(3, 'Luplow', 'Luplow', 'http://localhost.com', '2014-03-20'),
(4, 'jean-françois', 'ognard', 'http://localhost.com', '2014-03-16'),
(5, 'Cyprien', 'Lov', 'http://www.youtube.com/results?search_query=cyprien', '1989-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `humorist_fan`
--

CREATE TABLE IF NOT EXISTS `humorist_fan` (
  `humorist` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`member`,`humorist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `humorist_post`
--

CREATE TABLE IF NOT EXISTS `humorist_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `post_date` date NOT NULL,
  `humorist_topic` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `humorist_post_report_abuse`
--

CREATE TABLE IF NOT EXISTS `humorist_post_report_abuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` text NOT NULL,
  `processed` tinyint(1) NOT NULL,
  `humorist_post` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `humorist_topic`
--

CREATE TABLE IF NOT EXISTS `humorist_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `creation_date` date NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `humorist` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `avatar` varchar(300) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `activated_key` int(10) NOT NULL,
  `banned_for_life` tinyint(1) DEFAULT NULL,
  `banned_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `email`, `password`, `postcode`, `city`, `country`, `birthday`, `avatar`, `grade`, `activated`, `activated_key`, `banned_for_life`, `banned_date`) VALUES
(1, 'Remi', 'Ognard', 'toto@domain.com', 'tutu', '93160', 'noisy', 'france', '2014-03-19', 'http://localhost', 'admin', 0, 0, NULL, NULL),
(2, 'Alexis', 'Julien', 'toto@domain.com', 'xixi', '93154', 'bussy', 'france', '2014-03-02', 'http://localhost', 'admin', 0, 0, NULL, NULL),
(5, 'Alexis', 'Julien', 'alexis.julien@edu.esiee.fr', 'zeubiteam', '77600', 'Bussy-Saint-Georges', 'France', '1994-04-01', '', '', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_sketch_proposed`
--

CREATE TABLE IF NOT EXISTS `member_sketch_proposed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `video_link` varchar(300) NOT NULL,
  `release_date` date NOT NULL,
  `synopsis` text NOT NULL,
  `validated` tinyint(1) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member_temporarily_banned`
--

CREATE TABLE IF NOT EXISTS `member_temporarily_banned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sketch`
--

CREATE TABLE IF NOT EXISTS `sketch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `video_link` varchar(300) NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(300) NOT NULL,
  `synopsis` text NOT NULL,
  `sketch_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sketch`
--

INSERT INTO `sketch` (`id`, `title`, `video_link`, `release_date`, `image`, `synopsis`, `sketch_type`) VALUES
(2, 'Joueur du grenier', 'http://www.youtube.com/watch?v=pS9Xokt8WHo', '2014-03-23', 'http://img.youtube.com/vi/pS9Xokt8WHo/hqdefault.jpg', 'mon_synopsis', 1),
(3, 'Famille Adams', 'http://mon_site.php', '2014-07-26', 'http://mon_site.php', 'synopsis de la vidéo', 5),
(4, 'Joueur du grenier - Saint- Valentin', 'http://www.youtube.com/watch?v=uY0peQRNauY', '2014-03-23', 'http://img.youtube.com/vi/uY0peQRNauY/hqdefault.jpg', 'mon_synopsis', 1),
(5, 'Joueur du grenier - Home Alone', 'http://www.youtube.com/watch?v=z1ZrvkdOqeU', '2014-03-23', 'http://img.youtube.com/vi/z1ZrvkdOqeU/hqdefault.jpg', 'mon_synopsis', 1),
(6, 'Joueur du grenier - Superman 64 & Batman Forever', 'http://www.youtube.com/watch?v=ozf7VJf-gsU', '2014-03-23', 'http://img.youtube.com/vi/ozf7VJf-gsU/hqdefault.jpg', 'mon_synopsis', 1),
(7, 'Joueur du grenier - Les jeux de Baston 2eme Edition', 'http://www.youtube.com/watch?v=MqDWL0MgAtc', '2014-03-23', 'http://img.youtube.com/vi/MqDWL0MgAtc/hqdefault.jpg', 'mon_synopsis', 1),
(8, 'Joueur du grenier - Alex Kidd in High Tech World', 'http://www.youtube.com/watch?v=oYvocMIfCIQ', '2014-03-23', 'http://img.youtube.com/vi/oYvocMIfCIQ/hqdefault.jpg', 'mon_synopsis', 1),
(9, 'Joueur du grenier - Anti Terror Force PC', 'http://www.youtube.com/watch?v=zXZ4u9tVW8A', '2014-03-23', 'http://img.youtube.com/vi/zXZ4u9tVW8A/hqdefault.jpg', 'mon_synopsis', 1),
(10, 'Joueur du grenier - Bonus Remerciements 1 million', 'http://www.youtube.com/watch?v=xPg3_saI8Fg', '2014-03-23', 'http://img.youtube.com/vi/xPg3_saI8Fg/hqdefault.jpg', 'mon_synopsis', 1),
(11, 'Joueur du grenier - Les Jeux Disney', 'http://www.youtube.com/watch?v=5I7pukuy8sQ', '2014-03-23', 'http://img.youtube.com/vi/5I7pukuy8sQ/hqdefault.jpg', 'mon_synopsis', 1),
(12, 'Joueur du grenier - Les Jeux Famille Adams', 'http://www.youtube.com/watch?v=2pNyZJL8TqY', '2014-03-23', 'http://img.youtube.com/vi/2pNyZJL8TqY/hqdefault.jpg', 'mon_synopsis', 1),
(13, 'Cyprien répond à vos questions 3', 'http://www.youtube.com/watch?v=nUCmpthYKPQ', '2013-01-02', 'http://img.youtube.com/vi/nUCmpthYKPQ/hqdefault.jpg', 'my_snopsis', 8),
(14, 'Cyprien - Quand j''étais petit 2', 'http://www.youtube.com/watch?v=db_XBgSyi44', '2013-01-02', 'http://img.youtube.com/vi/db_XBgSyi44/hqdefault.jpg', 'my_snopsis', 8),
(15, 'Cyprien - Lecole', 'http://www.youtube.com/watch?v=RL7grUEo960', '2013-01-02', 'http://img.youtube.com/vi/RL7grUEo960/hqdefault.jpg', 'my_snopsis', 8),
(16, 'Cyprien - Noel', 'http://www.youtube.com/watch?v=Z8IQhMMlpnY', '2013-01-02', 'http://img.youtube.com/vi/Z8IQhMMlpnY/hqdefault.jpg', 'my_snopsis', 8),
(17, 'Cyprien - Les maniaques de l''hygiene', 'http://www.youtube.com/watch?v=3pKRgp9ChrE', '2013-01-02', 'http://img.youtube.com/vi/3pKRgp9ChrE/hqdefault.jpg', 'my_snopsis', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sketch_comment`
--

CREATE TABLE IF NOT EXISTS `sketch_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `post_date` date NOT NULL,
  `sketch` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `sketch_comment`
--

INSERT INTO `sketch_comment` (`id`, `message`, `post_date`, `sketch`, `member`) VALUES
(1, 'il est sympa ton site', '2014-03-19', 2, 1),
(2, 'cool', '2014-03-19', 2, 1),
(3, 'hahaaa', '2014-03-19', 2, 1),
(4, 'laule', '2014-03-19', 2, 1),
(5, 'post', '2014-03-19', 2, 1),
(6, 'hehe', '2014-03-19', 2, 1),
(7, 'coucou c''ets mwa', '2014-03-19', 2, 1),
(8, 'coucou c''est encore mwa', '2014-03-19', 2, 1),
(9, 'blabla', '2014-03-19', 2, 1),
(10, 'haha', '2014-03-19', 2, 1),
(11, 'hehe', '2014-03-19', 2, 1),
(12, 'hyhy', '2014-03-19', 2, 1),
(13, 'huhu', '2014-03-19', 2, 1),
(14, 'hihi', '2014-03-19', 2, 1),
(15, 'hoho', '2014-03-19', 2, 1),
(16, 'haha', '2014-03-19', 2, 1),
(17, 'hehe', '2014-03-19', 2, 1),
(18, 'hyhy', '2014-03-19', 2, 1),
(19, 'huhu', '2014-03-19', 2, 1),
(20, 'hihi', '2014-03-19', 2, 1),
(21, 'hoho', '2014-03-19', 2, 1),
(22, 'haha', '2014-03-19', 2, 1),
(23, 'hehe', '2014-03-19', 2, 1),
(24, 'hyhy', '2014-03-19', 2, 1),
(25, 'huhu', '2014-03-19', 2, 1),
(26, 'hihi', '2014-03-19', 2, 1),
(27, 'hoho', '2014-03-19', 2, 1),
(28, 'haha', '2014-03-19', 2, 1),
(29, 'hehe', '2014-03-19', 2, 1),
(30, 'gdhfj', '2014-03-20', 3, 1),
(31, 'hyhy', '2014-03-25', 2, 1),
(32, 'truc', '2014-04-05', 2, 1),
(33, 'Commentaire', '2014-04-06', 12, 1),
(34, 'truc', '2014-04-07', 12, 1),
(35, 'ru', '2014-04-07', 12, 1),
(36, 'machin', '2014-04-07', 12, 1),
(37, 'truc', '2014-04-07', 4, 1),
(38, 'Yolo!', '2014-04-08', 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sketch_comment_like_dislike`
--

CREATE TABLE IF NOT EXISTS `sketch_comment_like_dislike` (
  `comment` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `vote` tinyint(1) NOT NULL,
  `ip` int(11) NOT NULL,
  PRIMARY KEY (`member`,`comment`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sketch_comment_like_dislike`
--

INSERT INTO `sketch_comment_like_dislike` (`comment`, `member`, `vote`, `ip`) VALUES
(32, 0, 1, 0),
(34, 0, 2, 0),
(33, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sketch_comment_report_abuse`
--

CREATE TABLE IF NOT EXISTS `sketch_comment_report_abuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` text NOT NULL,
  `processed` tinyint(1) NOT NULL,
  `sketch_comment` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sketch_comment_report_abuse`
--

INSERT INTO `sketch_comment_report_abuse` (`id`, `notification`, `processed`, `sketch_comment`, `member`) VALUES
(1, '', 0, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sketch_dead_link`
--

CREATE TABLE IF NOT EXISTS `sketch_dead_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `processed` tinyint(1) NOT NULL,
  `sketch` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sketch_dead_link`
--

INSERT INTO `sketch_dead_link` (`id`, `processed`, `sketch`, `member`) VALUES
(1, 0, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sketch_like_dislike`
--

CREATE TABLE IF NOT EXISTS `sketch_like_dislike` (
  `sketch` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `vote` tinyint(1) NOT NULL,
  `ip` varchar(25) NOT NULL,
  PRIMARY KEY (`member`,`sketch`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sketch_like_dislike`
--

INSERT INTO `sketch_like_dislike` (`sketch`, `member`, `vote`, `ip`) VALUES
(2, 2, 1, '127.0.0.1'),
(2, 1, 1, '128.0.0.1'),
(2, 3, 1, '129.0.0.1'),
(2, 0, 1, '::1'),
(12, 0, 1, '::1'),
(12, 4, 1, '0'),
(12, 5, 1, '0'),
(12, 6, 1, '0'),
(12, 7, 1, '0'),
(12, 8, 1, '0'),
(12, 9, 1, '0'),
(12, 10, 1, '0'),
(12, 11, 1, '0'),
(12, 12, 1, '0'),
(12, 13, 1, '0'),
(12, 14, 1, '0'),
(12, 15, 1, '0'),
(12, 16, 1, '0'),
(12, 17, 1, '0'),
(12, 18, 1, '0'),
(12, 19, 1, '0'),
(12, 20, 1, '0'),
(12, 21, 1, '0'),
(12, 22, 1, '0'),
(12, 23, 1, '0'),
(12, 24, 1, '0'),
(12, 25, 1, '0'),
(12, 26, 1, '0'),
(12, 27, 1, '0'),
(12, 28, 1, '0'),
(12, 29, 1, '0'),
(12, 30, 1, '0'),
(12, 31, 1, '0'),
(12, 32, 1, '0'),
(12, 33, 1, '0'),
(12, 34, 1, '0'),
(12, 35, 1, '0'),
(12, 36, 1, '0'),
(12, 37, 1, '0'),
(12, 38, 1, '0'),
(12, 39, 1, '0'),
(12, 40, 1, '0'),
(12, 41, -1, '0'),
(12, 42, -1, '0'),
(12, 43, -1, '0'),
(12, 44, 1, '0'),
(12, 45, -1, '0'),
(12, 46, -1, '0'),
(12, 47, -1, '0'),
(12, 48, -1, '0'),
(12, 49, -1, '0'),
(12, 50, -1, '0'),
(12, 51, -1, '0'),
(12, 52, -1, '0'),
(12, 53, -1, '0'),
(12, 54, -1, '0'),
(12, 55, -1, '0'),
(12, 56, -1, '0'),
(12, 57, -1, '0'),
(12, 58, -1, '0'),
(12, 59, -1, '0'),
(12, 60, -1, '0'),
(12, 61, -1, '0'),
(12, 62, -1, '0'),
(12, 63, -1, '0'),
(12, 64, -1, '0'),
(12, 65, -1, '0'),
(12, 66, -1, '0'),
(12, 67, -1, '0'),
(12, 68, -1, '0'),
(12, 69, -1, '0'),
(12, 70, -1, '0'),
(11, 4, 1, '0'),
(11, 5, 1, '0'),
(11, 6, 1, '0'),
(11, 7, 1, '0'),
(11, 8, 1, '0'),
(11, 9, 1, '0'),
(11, 10, 1, '0'),
(11, 11, 1, '0'),
(11, 12, 1, '0'),
(11, 13, 1, '0'),
(11, 14, 1, '0'),
(11, 15, 1, '0'),
(11, 16, 1, '0'),
(11, 17, 1, '0'),
(11, 18, 1, '0'),
(11, 19, 1, '0'),
(11, 20, 1, '0'),
(11, 21, 1, '0'),
(11, 22, 1, '0'),
(11, 23, 1, '0'),
(11, 24, 1, '0'),
(11, 25, 1, '0'),
(11, 26, 1, '0'),
(11, 27, 1, '0'),
(11, 28, -1, '0'),
(11, 29, -1, '0'),
(11, 30, -1, '0'),
(11, 31, -1, '0'),
(11, 32, -1, '0'),
(11, 33, -1, '0'),
(11, 34, -1, '0'),
(11, 35, -1, '0'),
(11, 36, -1, '0'),
(11, 37, -1, '0'),
(11, 38, -1, '0'),
(11, 39, -1, '0'),
(11, 40, 1, '0'),
(11, 41, -1, '0'),
(11, 42, -1, '0'),
(11, 43, -1, '0'),
(11, 44, 1, '0'),
(11, 45, -1, '0'),
(11, 46, -1, '0'),
(11, 47, -1, '0'),
(11, 48, -1, '0'),
(11, 49, -1, '0'),
(11, 50, -1, '0'),
(11, 51, -1, '0'),
(11, 52, -1, '0'),
(11, 53, -1, '0'),
(11, 54, -1, '0'),
(11, 55, -1, '0'),
(11, 56, -1, '0'),
(11, 57, -1, '0'),
(11, 58, -1, '0'),
(11, 59, -1, '0'),
(11, 60, -1, '0'),
(11, 61, -1, '0'),
(11, 62, -1, '0'),
(11, 63, -1, '0'),
(11, 64, -1, '0'),
(11, 65, -1, '0'),
(11, 66, -1, '0'),
(11, 67, -1, '0'),
(11, 68, -1, '0'),
(11, 69, -1, '0'),
(11, 70, -1, '0'),
(10, 4, 1, '0'),
(10, 5, 1, '0'),
(10, 6, 1, '0'),
(10, 7, 1, '0'),
(10, 8, 1, '0'),
(10, 9, 1, '0'),
(10, 10, 1, '0'),
(10, 11, 1, '0'),
(10, 12, 1, '0'),
(10, 13, 1, '0'),
(10, 14, 1, '0'),
(10, 15, 1, '0'),
(10, 16, 1, '0'),
(10, 17, 1, '0'),
(10, 18, 1, '0'),
(10, 19, 1, '0'),
(10, 20, 1, '0'),
(10, 21, 1, '0'),
(10, 22, 1, '0'),
(10, 23, 1, '0'),
(10, 24, 1, '0'),
(10, 25, 1, '0'),
(10, 26, 1, '0'),
(10, 27, 1, '0'),
(10, 28, 1, '0'),
(10, 29, 1, '0'),
(10, 30, 1, '0'),
(10, 31, 1, '0'),
(10, 32, 1, '0'),
(10, 33, 1, '0'),
(10, 34, 1, '0'),
(10, 35, 1, '0'),
(10, 36, 1, '0'),
(10, 37, 1, '0'),
(10, 38, 1, '0'),
(10, 39, 1, '0'),
(10, 40, 1, '0'),
(10, 41, 1, '0'),
(10, 42, 1, '0'),
(10, 43, 1, '0'),
(10, 44, 1, '0'),
(10, 45, 1, '0'),
(10, 46, 1, '0'),
(10, 47, 1, '0'),
(10, 48, 1, '0'),
(10, 49, 1, '0'),
(10, 50, 1, '0'),
(10, 51, 1, '0'),
(10, 52, 1, '0'),
(10, 53, 1, '0'),
(10, 54, 1, '0'),
(10, 55, 1, '0'),
(10, 56, 1, '0'),
(10, 57, 1, '0'),
(10, 58, 1, '0'),
(10, 59, 1, '0'),
(10, 60, -1, '0'),
(10, 61, -1, '0'),
(10, 62, -1, '0'),
(10, 63, -1, '0'),
(10, 64, -1, '0'),
(10, 65, -1, '0'),
(10, 66, -1, '0'),
(10, 67, -1, '0'),
(10, 68, -1, '0'),
(10, 69, -1, '0'),
(10, 70, -1, '0'),
(9, 4, 1, '0'),
(9, 5, 1, '0'),
(9, 6, 1, '0'),
(9, 7, 1, '0'),
(9, 8, 1, '0'),
(9, 9, 1, '0'),
(9, 10, 1, '0'),
(9, 11, 1, '0'),
(9, 12, 1, '0'),
(9, 13, 1, '0'),
(9, 14, 1, '0'),
(9, 15, 1, '0'),
(9, 16, 1, '0'),
(9, 17, 1, '0'),
(9, 18, 1, '0'),
(9, 19, 1, '0'),
(9, 20, 1, '0'),
(9, 21, 1, '0'),
(9, 22, 1, '0'),
(9, 23, 1, '0'),
(9, 24, 1, '0'),
(9, 25, 1, '0'),
(9, 26, 1, '0'),
(9, 27, 1, '0'),
(9, 28, 1, '0'),
(9, 29, 1, '0'),
(9, 30, 1, '0'),
(9, 31, 1, '0'),
(9, 32, 1, '0'),
(9, 33, 1, '0'),
(9, 34, 1, '0'),
(9, 35, 1, '0'),
(9, 36, 1, '0'),
(9, 37, 1, '0'),
(9, 38, 1, '0'),
(9, 39, 1, '0'),
(9, 40, 1, '0'),
(9, 41, 1, '0'),
(9, 42, 1, '0'),
(9, 43, 1, '0'),
(9, 44, 1, '0'),
(9, 45, 1, '0'),
(9, 46, 1, '0'),
(9, 47, 1, '0'),
(9, 48, 1, '0'),
(9, 49, 1, '0'),
(9, 50, 1, '0'),
(9, 51, 1, '0'),
(9, 52, 1, '0'),
(9, 53, 1, '0'),
(9, 54, 1, '0'),
(9, 55, 1, '0'),
(9, 56, 1, '0'),
(9, 57, 1, '0'),
(9, 58, 1, '0'),
(9, 59, 1, '0'),
(9, 60, -1, '0'),
(9, 61, -1, '0'),
(9, 62, -1, '0'),
(9, 63, -1, '0'),
(9, 64, -1, '0'),
(9, 65, -1, '0'),
(9, 66, -1, '0'),
(9, 67, -1, '0'),
(9, 68, -1, '0'),
(9, 69, -1, '0'),
(9, 70, -1, '0'),
(8, 4, 1, '0'),
(8, 5, 1, '0'),
(8, 6, 1, '0'),
(8, 7, 1, '0'),
(8, 8, 1, '0'),
(8, 9, 1, '0'),
(8, 10, 1, '0'),
(8, 11, 1, '0'),
(8, 12, 1, '0'),
(8, 13, 1, '0'),
(8, 14, 1, '0'),
(8, 15, 1, '0'),
(8, 16, 1, '0'),
(8, 17, 1, '0'),
(8, 18, 1, '0'),
(8, 19, 1, '0'),
(8, 20, 1, '0'),
(8, 21, 1, '0'),
(8, 22, 1, '0'),
(8, 23, 1, '0'),
(8, 24, 1, '0'),
(8, 25, 1, '0'),
(8, 26, 1, '0'),
(8, 27, 1, '0'),
(8, 28, 1, '0'),
(8, 29, 1, '0'),
(8, 30, 1, '0'),
(8, 31, 1, '0'),
(8, 32, 1, '0'),
(8, 33, 1, '0'),
(8, 34, 1, '0'),
(8, 35, 1, '0'),
(8, 36, 1, '0'),
(8, 37, 1, '0'),
(8, 38, 1, '0'),
(8, 39, 1, '0'),
(8, 40, 1, '0'),
(8, 41, 1, '0'),
(8, 42, 1, '0'),
(8, 43, 1, '0'),
(8, 44, 1, '0'),
(8, 45, 1, '0'),
(8, 46, 1, '0'),
(8, 47, 1, '0'),
(8, 48, 1, '0'),
(8, 49, 1, '0'),
(8, 50, 1, '0'),
(8, 51, 1, '0'),
(8, 52, 1, '0'),
(8, 53, 1, '0'),
(8, 54, 1, '0'),
(8, 55, 1, '0'),
(8, 56, 1, '0'),
(8, 57, 1, '0'),
(8, 58, 1, '0'),
(8, 59, 1, '0'),
(8, 60, -1, '0'),
(8, 61, -1, '0'),
(8, 62, -1, '0'),
(8, 63, -1, '0'),
(8, 64, -1, '0'),
(8, 65, -1, '0'),
(8, 66, -1, '0'),
(8, 67, -1, '0'),
(8, 68, -1, '0'),
(8, 69, -1, '0'),
(8, 70, -1, '0'),
(7, 4, 1, '0'),
(7, 5, 1, '0'),
(7, 6, 1, '0'),
(7, 7, 1, '0'),
(7, 8, 1, '0'),
(7, 9, 1, '0'),
(7, 10, 1, '0'),
(7, 11, 1, '0'),
(7, 12, 1, '0'),
(7, 13, 1, '0'),
(7, 14, 1, '0'),
(7, 15, 1, '0'),
(7, 16, 1, '0'),
(7, 17, 1, '0'),
(7, 18, 1, '0'),
(7, 19, 1, '0'),
(7, 20, 1, '0'),
(7, 21, 1, '0'),
(7, 22, 1, '0'),
(7, 23, 1, '0'),
(7, 24, 1, '0'),
(7, 25, 1, '0'),
(7, 26, 1, '0'),
(7, 27, 1, '0'),
(7, 28, 1, '0'),
(7, 29, 1, '0'),
(7, 30, 1, '0'),
(7, 31, 1, '0'),
(7, 32, 1, '0'),
(7, 33, 1, '0'),
(7, 34, 1, '0'),
(7, 35, 1, '0'),
(7, 36, 1, '0'),
(7, 37, 1, '0'),
(7, 38, 1, '0'),
(7, 39, 1, '0'),
(7, 40, 1, '0'),
(7, 41, 1, '0'),
(7, 42, 1, '0'),
(7, 43, 1, '0'),
(7, 44, 1, '0'),
(7, 45, 1, '0'),
(7, 46, 1, '0'),
(7, 47, 1, '0'),
(7, 48, 1, '0'),
(7, 49, 1, '0'),
(7, 50, 1, '0'),
(7, 51, 1, '0'),
(7, 52, 1, '0'),
(7, 53, 1, '0'),
(7, 54, 1, '0'),
(7, 55, 1, '0'),
(7, 56, 1, '0'),
(7, 57, 1, '0'),
(7, 58, 1, '0'),
(7, 59, 1, '0'),
(7, 60, -1, '0'),
(7, 61, -1, '0'),
(7, 62, -1, '0'),
(7, 63, -1, '0'),
(7, 64, -1, '0'),
(7, 65, -1, '0'),
(7, 66, -1, '0'),
(7, 67, -1, '0'),
(7, 68, -1, '0'),
(7, 69, -1, '0'),
(7, 70, -1, '0'),
(6, 4, 1, '0'),
(6, 5, 1, '0'),
(6, 6, 1, '0'),
(6, 7, 1, '0'),
(6, 8, 1, '0'),
(6, 9, 1, '0'),
(6, 10, 1, '0'),
(6, 11, 1, '0'),
(6, 12, 1, '0'),
(6, 13, 1, '0'),
(6, 14, 1, '0'),
(6, 15, 1, '0'),
(6, 16, 1, '0'),
(6, 17, 1, '0'),
(6, 18, 1, '0'),
(6, 19, 1, '0'),
(6, 20, 1, '0'),
(6, 21, 1, '0'),
(6, 22, 1, '0'),
(6, 23, 1, '0'),
(6, 24, 1, '0'),
(6, 25, 1, '0'),
(6, 26, 1, '0'),
(6, 27, 1, '0'),
(6, 28, 1, '0'),
(6, 29, 1, '0'),
(6, 30, 1, '0'),
(6, 31, 1, '0'),
(6, 32, 1, '0'),
(6, 33, 1, '0'),
(6, 34, 1, '0'),
(6, 35, 1, '0'),
(6, 36, 1, '0'),
(6, 37, 1, '0'),
(6, 38, 1, '0'),
(6, 39, 1, '0'),
(6, 40, 1, '0'),
(6, 41, 1, '0'),
(6, 42, 1, '0'),
(6, 43, 1, '0'),
(6, 44, 1, '0'),
(6, 45, 1, '0'),
(6, 46, 1, '0'),
(6, 47, 1, '0'),
(6, 48, 1, '0'),
(6, 49, 1, '0'),
(6, 50, 1, '0'),
(6, 51, 1, '0'),
(6, 52, 1, '0'),
(6, 53, 1, '0'),
(6, 54, 1, '0'),
(6, 55, 1, '0'),
(6, 56, 1, '0'),
(6, 57, 1, '0'),
(6, 58, 1, '0'),
(6, 59, 1, '0'),
(6, 60, -1, '0'),
(6, 61, -1, '0'),
(6, 62, -1, '0'),
(6, 63, -1, '0'),
(6, 64, -1, '0'),
(6, 65, -1, '0'),
(6, 66, -1, '0'),
(6, 67, -1, '0'),
(6, 68, -1, '0'),
(6, 69, -1, '0'),
(6, 70, -1, '0'),
(5, 4, 1, '0'),
(5, 5, 1, '0'),
(5, 6, 1, '0'),
(5, 7, 1, '0'),
(5, 8, 1, '0'),
(5, 9, 1, '0'),
(5, 10, 1, '0'),
(5, 11, 1, '0'),
(5, 12, 1, '0'),
(5, 13, 1, '0'),
(5, 14, 1, '0'),
(5, 15, 1, '0'),
(5, 16, 1, '0'),
(5, 17, 1, '0'),
(5, 18, 1, '0'),
(5, 19, 1, '0'),
(5, 20, 1, '0'),
(5, 21, 1, '0'),
(5, 22, 1, '0'),
(5, 23, 1, '0'),
(5, 24, 1, '0'),
(5, 25, 1, '0'),
(5, 26, 1, '0'),
(5, 27, 1, '0'),
(5, 28, 1, '0'),
(5, 29, 1, '0'),
(5, 30, 1, '0'),
(5, 31, 1, '0'),
(5, 32, 1, '0'),
(5, 33, 1, '0'),
(5, 34, 1, '0'),
(5, 35, 1, '0'),
(5, 36, 1, '0'),
(5, 37, 1, '0'),
(5, 38, 1, '0'),
(5, 39, 1, '0'),
(5, 40, 1, '0'),
(5, 41, 1, '0'),
(5, 42, 1, '0'),
(5, 43, 1, '0'),
(5, 44, 1, '0'),
(5, 45, 1, '0'),
(5, 46, 1, '0'),
(5, 47, 1, '0'),
(5, 48, 1, '0'),
(5, 49, 1, '0'),
(5, 50, 1, '0'),
(5, 51, 1, '0'),
(5, 52, 1, '0'),
(5, 53, 1, '0'),
(5, 54, 1, '0'),
(5, 55, 1, '0'),
(5, 56, 1, '0'),
(5, 57, 1, '0'),
(5, 58, 1, '0'),
(5, 59, 1, '0'),
(5, 60, -1, '0'),
(5, 61, -1, '0'),
(5, 62, -1, '0'),
(5, 63, -1, '0'),
(5, 64, -1, '0'),
(5, 65, -1, '0'),
(5, 66, -1, '0'),
(5, 67, -1, '0'),
(5, 68, -1, '0'),
(5, 69, -1, '0'),
(5, 70, -1, '0'),
(4, 4, 1, '0'),
(4, 5, 1, '0'),
(4, 6, 1, '0'),
(4, 7, 1, '0'),
(4, 8, 1, '0'),
(4, 9, 1, '0'),
(4, 10, 1, '0'),
(4, 11, 1, '0'),
(4, 12, 1, '0'),
(4, 13, 1, '0'),
(4, 14, 1, '0'),
(4, 15, 1, '0'),
(4, 16, 1, '0'),
(4, 17, 1, '0'),
(4, 18, 1, '0'),
(4, 19, 1, '0'),
(4, 20, 1, '0'),
(4, 21, 1, '0'),
(4, 22, 1, '0'),
(4, 23, 1, '0'),
(4, 24, 1, '0'),
(4, 25, 1, '0'),
(4, 26, 1, '0'),
(4, 27, 1, '0'),
(4, 28, 1, '0'),
(4, 29, 1, '0'),
(4, 30, 1, '0'),
(4, 31, 1, '0'),
(4, 32, 1, '0'),
(4, 33, 1, '0'),
(4, 34, 1, '0'),
(4, 35, 1, '0'),
(4, 36, 1, '0'),
(4, 37, 1, '0'),
(4, 38, 1, '0'),
(4, 39, 1, '0'),
(4, 40, 1, '0'),
(4, 41, 1, '0'),
(4, 42, 1, '0'),
(4, 43, 1, '0'),
(4, 44, 1, '0'),
(4, 45, 1, '0'),
(4, 46, 1, '0'),
(4, 47, 1, '0'),
(4, 48, 1, '0'),
(4, 49, 1, '0'),
(4, 50, 1, '0'),
(4, 51, 1, '0'),
(4, 52, 1, '0'),
(4, 53, 1, '0'),
(4, 54, 1, '0'),
(4, 55, 1, '0'),
(4, 56, 1, '0'),
(4, 57, 1, '0'),
(4, 58, 1, '0'),
(4, 59, 1, '0'),
(4, 60, -1, '0'),
(4, 61, -1, '0'),
(4, 62, -1, '0'),
(4, 63, -1, '0'),
(4, 64, -1, '0'),
(4, 65, -1, '0'),
(4, 66, 1, '0'),
(4, 67, 1, '0'),
(4, 68, -1, '0'),
(4, 69, -1, '0'),
(4, 70, 1, '0'),
(2, 4, 1, '0'),
(2, 5, 1, '0'),
(2, 6, 1, '0'),
(2, 7, 1, '0'),
(2, 8, 1, '0'),
(2, 9, 1, '0'),
(2, 10, 1, '0'),
(2, 11, 1, '0'),
(2, 12, 1, '0'),
(2, 13, 1, '0'),
(2, 14, 1, '0'),
(2, 15, 1, '0'),
(2, 16, 1, '0'),
(2, 17, 1, '0'),
(2, 18, 1, '0'),
(2, 19, 1, '0'),
(2, 20, 1, '0'),
(2, 21, 1, '0'),
(2, 22, 1, '0'),
(2, 23, 1, '0'),
(2, 24, 1, '0'),
(2, 25, 1, '0'),
(2, 26, 1, '0'),
(2, 27, 1, '0'),
(2, 28, 1, '0'),
(2, 29, 1, '0'),
(2, 30, 1, '0'),
(2, 31, 1, '0'),
(2, 32, 1, '0'),
(2, 33, 1, '0'),
(2, 34, 1, '0'),
(2, 35, 1, '0'),
(2, 36, 1, '0'),
(2, 37, 1, '0'),
(2, 38, 1, '0'),
(2, 39, 1, '0'),
(2, 40, 1, '0'),
(2, 41, 1, '0'),
(2, 42, 1, '0'),
(2, 43, 1, '0'),
(2, 44, 1, '0'),
(2, 45, 1, '0'),
(2, 46, 1, '0'),
(2, 47, 1, '0'),
(2, 48, 1, '0'),
(2, 49, 1, '0'),
(2, 50, 1, '0'),
(2, 51, 1, '0'),
(2, 52, 1, '0'),
(2, 53, 1, '0'),
(2, 54, 1, '0'),
(2, 55, 1, '0'),
(2, 56, 1, '0'),
(2, 57, 1, '0'),
(2, 58, 1, '0'),
(2, 59, 1, '0'),
(2, 60, 1, '0'),
(2, 61, 1, '0'),
(2, 62, 1, '0'),
(2, 63, 1, '0'),
(2, 64, 1, '0'),
(2, 65, 1, '0'),
(2, 66, 1, '0'),
(2, 67, 1, '0'),
(2, 68, 1, '0'),
(2, 69, 1, '0'),
(2, 70, 1, '0'),
(4, 0, 1, '::1'),
(11, 0, 2, '::1'),
(13, 4, 1, '0'),
(13, 5, 1, '0'),
(13, 6, 1, '0'),
(13, 7, 1, '0'),
(13, 8, 1, '0'),
(13, 9, 1, '0'),
(13, 10, 1, '0'),
(13, 11, 1, '0'),
(13, 12, 1, '0'),
(13, 13, 1, '0'),
(13, 14, 1, '0'),
(13, 15, 1, '0'),
(13, 16, 1, '0'),
(13, 17, 1, '0'),
(13, 18, 1, '0'),
(13, 19, 1, '0'),
(13, 20, 1, '0'),
(13, 21, 1, '0'),
(13, 22, 1, '0'),
(13, 23, 1, '0'),
(13, 24, 1, '0'),
(13, 25, 1, '0'),
(13, 26, 1, '0'),
(13, 27, -1, '0'),
(13, 28, -1, '0'),
(13, 29, -1, '0'),
(13, 30, -1, '0'),
(13, 31, -1, '0'),
(13, 32, -1, '0'),
(13, 33, -1, '0'),
(13, 34, -1, '0'),
(13, 35, -1, '0'),
(13, 36, -1, '0'),
(13, 37, -1, '0'),
(13, 38, -1, '0'),
(13, 39, -1, '0'),
(13, 40, -1, '0'),
(13, 41, -1, '0'),
(13, 42, -1, '0'),
(13, 43, -1, '0'),
(13, 44, 1, '0'),
(13, 45, -1, '0'),
(13, 46, -1, '0'),
(13, 47, -1, '0'),
(13, 48, -1, '0'),
(13, 49, -1, '0'),
(13, 50, -1, '0'),
(13, 51, -1, '0'),
(13, 52, -1, '0'),
(13, 53, -1, '0'),
(13, 54, -1, '0'),
(13, 55, -1, '0'),
(13, 56, -1, '0'),
(13, 57, -1, '0'),
(13, 58, -1, '0'),
(13, 59, -1, '0'),
(14, 16, -1, '0'),
(14, 17, -1, '0'),
(14, 18, -1, '0'),
(14, 19, -1, '0'),
(14, 20, -1, '0'),
(14, 21, -1, '0'),
(14, 22, -1, '0'),
(14, 23, -1, '0'),
(14, 24, -1, '0'),
(14, 25, 1, '0'),
(14, 26, 1, '0'),
(14, 27, 1, '0'),
(14, 28, -1, '0'),
(14, 29, -1, '0'),
(14, 30, -1, '0'),
(14, 31, -1, '0'),
(14, 32, -1, '0'),
(14, 33, -1, '0'),
(14, 34, -1, '0'),
(14, 35, -1, '0'),
(14, 36, -1, '0'),
(14, 37, -1, '0'),
(14, 38, -1, '0'),
(14, 39, -1, '0'),
(14, 40, 1, '0'),
(14, 41, -1, '0'),
(14, 42, -1, '0'),
(14, 43, -1, '0'),
(14, 44, 1, '0'),
(14, 45, -1, '0'),
(14, 46, -1, '0'),
(14, 47, -1, '0'),
(14, 48, -1, '0'),
(14, 49, -1, '0'),
(14, 50, -1, '0'),
(14, 51, -1, '0'),
(14, 52, -1, '0'),
(14, 53, -1, '0'),
(14, 54, -1, '0'),
(14, 55, -1, '0'),
(14, 56, -1, '0'),
(14, 57, -1, '0'),
(14, 58, -1, '0'),
(14, 59, -1, '0'),
(14, 60, -1, '0'),
(14, 61, -1, '0'),
(14, 62, -1, '0'),
(15, 21, 1, '0'),
(15, 22, 1, '0'),
(15, 23, 1, '0'),
(15, 24, 1, '0'),
(15, 25, 1, '0'),
(15, 26, 1, '0'),
(15, 27, 1, '0'),
(15, 28, 1, '0'),
(15, 29, 1, '0'),
(15, 30, 1, '0'),
(15, 31, 1, '0'),
(15, 32, 1, '0'),
(15, 33, 1, '0'),
(15, 34, 1, '0'),
(15, 35, 1, '0'),
(15, 36, 1, '0'),
(15, 37, 1, '0'),
(15, 38, 1, '0'),
(15, 39, 1, '0'),
(15, 40, 1, '0'),
(15, 41, 1, '0'),
(15, 42, 1, '0'),
(15, 43, 1, '0'),
(15, 44, 1, '0'),
(15, 45, 1, '0'),
(15, 46, 1, '0'),
(15, 47, 1, '0'),
(15, 48, 1, '0'),
(15, 49, 1, '0'),
(15, 50, 1, '0'),
(15, 51, 1, '0'),
(15, 52, 1, '0'),
(15, 53, 1, '0'),
(15, 54, 1, '0'),
(15, 55, 1, '0'),
(15, 56, 1, '0'),
(15, 57, 1, '0'),
(15, 58, 1, '0'),
(15, 59, 1, '0'),
(15, 60, -1, '0'),
(15, 61, -1, '0'),
(15, 65, -1, '0'),
(15, 66, -1, '0'),
(15, 67, -1, '0'),
(15, 68, -1, '0'),
(15, 69, -1, '0'),
(15, 70, -1, '0'),
(16, 17, 1, '0'),
(16, 18, 1, '0'),
(16, 19, 1, '0'),
(16, 20, 1, '0'),
(16, 21, 1, '0'),
(16, 22, 1, '0'),
(16, 23, 1, '0'),
(16, 24, 1, '0'),
(16, 25, 1, '0'),
(16, 26, 1, '0'),
(16, 27, 1, '0'),
(16, 28, 1, '0'),
(16, 29, 1, '0'),
(16, 30, 1, '0'),
(16, 31, 1, '0'),
(16, 32, 1, '0'),
(16, 33, 1, '0'),
(16, 34, 1, '0'),
(16, 35, 1, '0'),
(16, 43, 1, '0'),
(16, 44, 1, '0'),
(16, 45, 1, '0'),
(16, 46, 1, '0'),
(16, 47, 1, '0'),
(16, 48, 1, '0'),
(16, 49, 1, '0'),
(16, 50, 1, '0'),
(16, 51, 1, '0'),
(16, 52, 1, '0'),
(16, 53, 1, '0'),
(16, 54, 1, '0'),
(16, 55, 1, '0'),
(16, 56, 1, '0'),
(16, 57, 1, '0'),
(16, 65, -1, '0'),
(16, 66, -1, '0'),
(16, 67, -1, '0'),
(16, 68, -1, '0'),
(16, 69, -1, '0'),
(16, 70, -1, '0'),
(17, 15, 1, '0'),
(17, 16, 1, '0'),
(17, 17, 1, '0'),
(17, 18, 1, '0'),
(17, 19, 1, '0'),
(17, 20, 1, '0'),
(17, 21, 1, '0'),
(17, 26, 1, '0'),
(17, 27, 1, '0'),
(17, 28, 1, '0'),
(17, 29, 1, '0'),
(17, 30, 1, '0'),
(17, 31, 1, '0'),
(17, 32, 1, '0'),
(17, 33, 1, '0'),
(17, 34, 1, '0'),
(17, 35, 1, '0'),
(17, 36, 1, '0'),
(17, 59, 1, '0'),
(17, 60, -1, '0'),
(17, 61, -1, '0'),
(17, 62, -1, '0'),
(17, 63, -1, '0'),
(17, 64, -1, '0'),
(17, 65, -1, '0'),
(17, 66, -1, '0'),
(17, 67, -1, '0'),
(17, 68, -1, '0'),
(17, 69, -1, '0'),
(17, 70, -1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `sketch_tag`
--

CREATE TABLE IF NOT EXISTS `sketch_tag` (
  `sketch` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY (`sketch`,`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sketch_type`
--

CREATE TABLE IF NOT EXISTS `sketch_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `image` varchar(300) NOT NULL,
  `synopsis` text NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sketch_type`
--

INSERT INTO `sketch_type` (`id`, `title`, `start_date`, `image`, `synopsis`, `category`) VALUES
(1, 'Joueur du grenier', '2014-03-31', 'http://img.youtube.com/vi/UuU9Oy01oWY/hqdefault.jpg', 'mon_synopsis', 1),
(5, 'MON TYPE', '2014-03-12', 'http://localhost.com', 'Type the synopsis here', 4),
(8, 'Cyprien', '2014-04-02', 'http://www.youtube.com/results?search_query=cyprien', 'Type the synopsis here', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sketch_type_fan`
--

CREATE TABLE IF NOT EXISTS `sketch_type_fan` (
  `sketch_type` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`member`,`sketch_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sketch_type_humorist`
--

CREATE TABLE IF NOT EXISTS `sketch_type_humorist` (
  `sketch_type` int(11) NOT NULL,
  `humorist` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sketch_type`,`humorist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sketch_type_humorist`
--

INSERT INTO `sketch_type_humorist` (`sketch_type`, `humorist`, `role`) VALUES
(1, 1, NULL),
(2, 3, NULL),
(4, 4, NULL),
(5, 3, NULL),
(6, 4, NULL),
(7, 4, NULL),
(8, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sketch_type_post`
--

CREATE TABLE IF NOT EXISTS `sketch_type_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `post_date` date NOT NULL,
  `sketch_type_topic` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sketch_type_post_report_abuse`
--

CREATE TABLE IF NOT EXISTS `sketch_type_post_report_abuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` text NOT NULL,
  `processed` tinyint(1) NOT NULL,
  `sketch_type_post` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sketch_type_topic`
--

CREATE TABLE IF NOT EXISTS `sketch_type_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `creation_date` date NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `sketch_type` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sketch_view`
--

CREATE TABLE IF NOT EXISTS `sketch_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `view_date` date NOT NULL,
  `sketch` int(11) NOT NULL,
  `member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
