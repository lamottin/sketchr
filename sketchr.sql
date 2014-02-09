-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 09 Février 2014 à 20:52
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sketchr`
--

-- --------------------------------------------------------

--
-- Structure de la table `abuse_noted`
--

CREATE TABLE IF NOT EXISTS `abuse_noted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abuse_message` text NOT NULL,
  `processed` tinyint(1) NOT NULL,
  `comment` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `post_date` date NOT NULL,
  `sketch` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `precomment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `country`
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
-- Contenu de la table `country`
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
-- Structure de la table `dead_link`
--

CREATE TABLE IF NOT EXISTS `dead_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `processed` tinyint(1) NOT NULL,
  `sketch` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fan_humorist`
--

CREATE TABLE IF NOT EXISTS `fan_humorist` (
  `member` int(11) NOT NULL,
  `humorist` int(11) NOT NULL,
  PRIMARY KEY (`member`,`humorist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fan_sketch_type`
--

CREATE TABLE IF NOT EXISTS `fan_sketch_type` (
  `member` int(11) NOT NULL,
  `sketch_type` int(11) NOT NULL,
  PRIMARY KEY (`member`,`sketch_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `humorist`
--

CREATE TABLE IF NOT EXISTS `humorist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `like_dislike_comment`
--

CREATE TABLE IF NOT EXISTS `like_dislike_comment` (
  `member` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `vote` tinyint(1) NOT NULL,
  PRIMARY KEY (`member`,`comment`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `like_dislike_sketch`
--

CREATE TABLE IF NOT EXISTS `like_dislike_sketch` (
  `member` int(11) NOT NULL,
  `sketch` int(11) NOT NULL,
  `vote` tinyint(1) NOT NULL,
  PRIMARY KEY (`member`,`sketch`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `member_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sketch`
--

CREATE TABLE IF NOT EXISTS `sketch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `video_link` varchar(300) NOT NULL,
  `release_date` date NOT NULL,
  `synopsis` text NOT NULL,
  `sketch_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sketch_type`
--

CREATE TABLE IF NOT EXISTS `sketch_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `synopsis` text NOT NULL,
  `category` int(11) NOT NULL,
  `humorist` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
