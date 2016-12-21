-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 09:30 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(5) NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `group_id`, `address`, `phone`, `profile`) VALUES
(1, 'T.M International', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '32 Purana paltan, Dhaka-1000', '01712567645', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `search_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `country_name`, `search_key`) VALUES
(1, 'Dhaka', 'Bangladesh', 'India'),
(2, 'Chittagong', 'Bangladesh', 'India'),
(3, 'Khulna', 'Bangladesh', 'India'),
(4, 'Jessore', 'Bangladesh', ''),
(5, 'Rajshahi', 'Bangladesh', 'India'),
(6, 'Pabna', 'Bangladesh', ''),
(7, 'Comilla', 'Bangladesh', ''),
(8, 'Sylhet', 'Bangladesh', ''),
(9, 'India', 'Bangladesh', '');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `cid` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `clong_name` varchar(80) NOT NULL,
  `cname` varchar(80) NOT NULL,
  `prefix` int(5) NOT NULL,
  `search_key` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cid`, `iso`, `clong_name`, `cname`, `prefix`, `search_key`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 93, 'India'),
(2, 'AL', 'ALBANIA', 'Albania', 355, ''),
(3, 'DZ', 'ALGERIA', 'Algeria', 213, ''),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 1684, 'India'),
(5, 'AD', 'ANDORRA', 'Andorra', 376, ''),
(6, 'AO', 'ANGOLA', 'Angola', 244, ''),
(7, 'AI', 'ANGUILLA', 'Anguilla', 1264, ''),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', 0, ''),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 1268, ''),
(10, 'AR', 'ARGENTINA', 'Argentina', 54, ''),
(11, 'AM', 'ARMENIA', 'Armenia', 374, ''),
(12, 'AW', 'ARUBA', 'Aruba', 297, ''),
(13, 'AU', 'AUSTRALIA', 'Australia', 61, ''),
(14, 'AT', 'AUSTRIA', 'Austria', 43, ''),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 994, ''),
(16, 'BS', 'BAHAMAS', 'Bahamas', 1242, ''),
(17, 'BH', 'BAHRAIN', 'Bahrain', 973, ''),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 880, ''),
(19, 'BB', 'BARBADOS', 'Barbados', 1246, ''),
(20, 'BY', 'BELARUS', 'Belarus', 375, ''),
(21, 'BE', 'BELGIUM', 'Belgium', 32, ''),
(22, 'BZ', 'BELIZE', 'Belize', 501, ''),
(23, 'BJ', 'BENIN', 'Benin', 229, ''),
(24, 'BM', 'BERMUDA', 'Bermuda', 1441, ''),
(25, 'BT', 'BHUTAN', 'Bhutan', 975, ''),
(26, 'BO', 'BOLIVIA', 'Bolivia', 591, ''),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 387, ''),
(28, 'BW', 'BOTSWANA', 'Botswana', 267, ''),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', 0, ''),
(30, 'BR', 'BRAZIL', 'Brazil', 55, ''),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', 246, ''),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 673, ''),
(33, 'BG', 'BULGARIA', 'Bulgaria', 359, ''),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 226, ''),
(35, 'BI', 'BURUNDI', 'Burundi', 257, ''),
(36, 'KH', 'CAMBODIA', 'Cambodia', 855, ''),
(37, 'CM', 'CAMEROON', 'Cameroon', 237, ''),
(38, 'CA', 'CANADA', 'Canada', 1, ''),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 238, ''),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 1345, ''),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 236, ''),
(42, 'TD', 'CHAD', 'Chad', 235, ''),
(43, 'CL', 'CHILE', 'Chile', 56, ''),
(44, 'CN', 'CHINA', 'China', 86, ''),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', 61, ''),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', 672, ''),
(47, 'CO', 'COLOMBIA', 'Colombia', 57, ''),
(48, 'KM', 'COMOROS', 'Comoros', 269, ''),
(49, 'CG', 'CONGO', 'Congo', 242, ''),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 242, ''),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 682, ''),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 506, ''),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 225, ''),
(54, 'HR', 'CROATIA', 'Croatia', 385, ''),
(55, 'CU', 'CUBA', 'Cuba', 53, ''),
(56, 'CY', 'CYPRUS', 'Cyprus', 357, ''),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 420, ''),
(58, 'DK', 'DENMARK', 'Denmark', 45, ''),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 253, ''),
(60, 'DM', 'DOMINICA', 'Dominica', 1767, ''),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 1809, ''),
(62, 'EC', 'ECUADOR', 'Ecuador', 593, ''),
(63, 'EG', 'EGYPT', 'Egypt', 20, ''),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 503, ''),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 240, ''),
(66, 'ER', 'ERITREA', 'Eritrea', 291, ''),
(67, 'EE', 'ESTONIA', 'Estonia', 372, ''),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 251, ''),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 500, ''),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 298, ''),
(71, 'FJ', 'FIJI', 'Fiji', 679, ''),
(72, 'FI', 'FINLAND', 'Finland', 358, ''),
(73, 'FR', 'FRANCE', 'France', 33, ''),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 594, ''),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 689, ''),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', 0, ''),
(77, 'GA', 'GABON', 'Gabon', 241, ''),
(78, 'GM', 'GAMBIA', 'Gambia', 220, ''),
(79, 'GE', 'GEORGIA', 'Georgia', 995, ''),
(80, 'DE', 'GERMANY', 'Germany', 49, ''),
(81, 'GH', 'GHANA', 'Ghana', 233, ''),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 350, ''),
(83, 'GR', 'GREECE', 'Greece', 30, ''),
(84, 'GL', 'GREENLAND', 'Greenland', 299, ''),
(85, 'GD', 'GRENADA', 'Grenada', 1473, ''),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 590, ''),
(87, 'GU', 'GUAM', 'Guam', 1671, ''),
(88, 'GT', 'GUATEMALA', 'Guatemala', 502, ''),
(89, 'GN', 'GUINEA', 'Guinea', 224, ''),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 245, ''),
(91, 'GY', 'GUYANA', 'Guyana', 592, ''),
(92, 'HT', 'HAITI', 'Haiti', 509, ''),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', 0, ''),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 39, ''),
(95, 'HN', 'HONDURAS', 'Honduras', 504, ''),
(96, 'HK', 'HONG KONG', 'Hong Kong', 852, ''),
(97, 'HU', 'HUNGARY', 'Hungary', 36, ''),
(98, 'IS', 'ICELAND', 'Iceland', 354, ''),
(99, 'IN', 'INDIA', 'India', 91, 'India'),
(100, 'ID', 'INDONESIA', 'Indonesia', 62, ''),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 98, ''),
(102, 'IQ', 'IRAQ', 'Iraq', 964, ''),
(103, 'IE', 'IRELAND', 'Ireland', 353, ''),
(104, 'IL', 'ISRAEL', 'Israel', 972, ''),
(105, 'IT', 'ITALY', 'Italy', 39, ''),
(106, 'JM', 'JAMAICA', 'Jamaica', 1876, ''),
(107, 'JP', 'JAPAN', 'Japan', 81, ''),
(108, 'JO', 'JORDAN', 'Jordan', 962, ''),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 7, ''),
(110, 'KE', 'KENYA', 'Kenya', 254, ''),
(111, 'KI', 'KIRIBATI', 'Kiribati', 686, ''),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 850, ''),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 82, ''),
(114, 'KW', 'KUWAIT', 'Kuwait', 965, ''),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 996, ''),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 856, ''),
(117, 'LV', 'LATVIA', 'Latvia', 371, ''),
(118, 'LB', 'LEBANON', 'Lebanon', 961, ''),
(119, 'LS', 'LESOTHO', 'Lesotho', 266, ''),
(120, 'LR', 'LIBERIA', 'Liberia', 231, ''),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 218, ''),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 423, ''),
(123, 'LT', 'LITHUANIA', 'Lithuania', 370, ''),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 352, ''),
(125, 'MO', 'MACAO', 'Macao', 853, ''),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 389, ''),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 261, ''),
(128, 'MW', 'MALAWI', 'Malawi', 265, ''),
(129, 'MY', 'MALAYSIA', 'Malaysia', 60, ''),
(130, 'MV', 'MALDIVES', 'Maldives', 960, ''),
(131, 'ML', 'MALI', 'Mali', 223, ''),
(132, 'MT', 'MALTA', 'Malta', 356, ''),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 692, ''),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 596, ''),
(135, 'MR', 'MAURITANIA', 'Mauritania', 222, ''),
(136, 'MU', 'MAURITIUS', 'Mauritius', 230, ''),
(137, 'YT', 'MAYOTTE', 'Mayotte', 269, ''),
(138, 'MX', 'MEXICO', 'Mexico', 52, ''),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 691, ''),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 373, ''),
(141, 'MC', 'MONACO', 'Monaco', 377, ''),
(142, 'MN', 'MONGOLIA', 'Mongolia', 976, ''),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 1664, ''),
(144, 'MA', 'MOROCCO', 'Morocco', 212, ''),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 258, ''),
(146, 'MM', 'MYANMAR', 'Myanmar', 95, ''),
(147, 'NA', 'NAMIBIA', 'Namibia', 264, ''),
(148, 'NR', 'NAURU', 'Nauru', 674, ''),
(149, 'NP', 'NEPAL', 'Nepal', 977, ''),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 31, ''),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 599, ''),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 687, ''),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 64, ''),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 505, ''),
(155, 'NE', 'NIGER', 'Niger', 227, ''),
(156, 'NG', 'NIGERIA', 'Nigeria', 234, ''),
(157, 'NU', 'NIUE', 'Niue', 683, ''),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 672, ''),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 1670, ''),
(160, 'NO', 'NORWAY', 'Norway', 47, ''),
(161, 'OM', 'OMAN', 'Oman', 968, ''),
(162, 'PK', 'PAKISTAN', 'Pakistan', 92, ''),
(163, 'PW', 'PALAU', 'Palau', 680, ''),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', 970, ''),
(165, 'PA', 'PANAMA', 'Panama', 507, ''),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 675, ''),
(167, 'PY', 'PARAGUAY', 'Paraguay', 595, ''),
(168, 'PE', 'PERU', 'Peru', 51, ''),
(169, 'PH', 'PHILIPPINES', 'Philippines', 63, ''),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 0, ''),
(171, 'PL', 'POLAND', 'Poland', 48, ''),
(172, 'PT', 'PORTUGAL', 'Portugal', 351, ''),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 1787, ''),
(174, 'QA', 'QATAR', 'Qatar', 974, ''),
(175, 'RE', 'REUNION', 'Reunion', 262, ''),
(176, 'RO', 'ROMANIA', 'Romania', 40, ''),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 70, ''),
(178, 'RW', 'RWANDA', 'Rwanda', 250, ''),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 290, ''),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 1869, ''),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 1758, ''),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 508, ''),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 1784, ''),
(184, 'WS', 'SAMOA', 'Samoa', 684, ''),
(185, 'SM', 'SAN MARINO', 'San Marino', 378, ''),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 239, ''),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 966, ''),
(188, 'SN', 'SENEGAL', 'Senegal', 221, ''),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', 381, ''),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 248, ''),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 232, ''),
(192, 'SG', 'SINGAPORE', 'Singapore', 65, ''),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 421, ''),
(194, 'SI', 'SLOVENIA', 'Slovenia', 386, ''),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 677, ''),
(196, 'SO', 'SOMALIA', 'Somalia', 252, ''),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 27, ''),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', 0, ''),
(199, 'ES', 'SPAIN', 'Spain', 34, ''),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 94, ''),
(201, 'SD', 'SUDAN', 'Sudan', 249, ''),
(202, 'SR', 'SURINAME', 'Suriname', 597, ''),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 47, ''),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 268, ''),
(205, 'SE', 'SWEDEN', 'Sweden', 46, ''),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 41, ''),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 963, ''),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 886, ''),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 992, ''),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 255, ''),
(211, 'TH', 'THAILAND', 'Thailand', 66, ''),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', 670, ''),
(213, 'TG', 'TOGO', 'Togo', 228, ''),
(214, 'TK', 'TOKELAU', 'Tokelau', 690, ''),
(215, 'TO', 'TONGA', 'Tonga', 676, ''),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 1868, ''),
(217, 'TN', 'TUNISIA', 'Tunisia', 216, ''),
(218, 'TR', 'TURKEY', 'Turkey', 90, ''),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 7370, ''),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 1649, ''),
(221, 'TV', 'TUVALU', 'Tuvalu', 688, ''),
(222, 'UG', 'UGANDA', 'Uganda', 256, ''),
(223, 'UA', 'UKRAINE', 'Ukraine', 380, ''),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 971, ''),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 44, ''),
(226, 'US', 'UNITED STATES', 'United States', 1, ''),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', 1, ''),
(228, 'UY', 'URUGUAY', 'Uruguay', 598, ''),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 998, ''),
(230, 'VU', 'VANUATU', 'Vanuatu', 678, ''),
(231, 'VE', 'VENEZUELA', 'Venezuela', 58, ''),
(232, 'VN', 'VIET NAM', 'Viet Nam', 84, ''),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 1284, ''),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 1340, ''),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 681, ''),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 212, ''),
(237, 'YE', 'YEMEN', 'Yemen', 967, ''),
(238, 'ZM', 'ZAMBIA', 'Zambia', 260, ''),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 263, '');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(250) NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `country`) VALUES
(1, 'AUD', 'Australian Dollar'),
(2, 'BRL', 'Brazilian Real'),
(3, 'CAD', 'Canadian Dollar'),
(4, 'CZK', 'Czech Koruna'),
(5, 'DKK', 'Danish Krone'),
(6, 'EUR', 'Euro'),
(7, 'HKD', 'Hong Kong Dollar'),
(8, 'HUF', 'Hungarian Forint'),
(9, 'ILS', 'Israeli New Sheqel'),
(10, 'JPY', 'Japanese Yen'),
(11, 'MYR', 'Malaysian Ringgit'),
(12, 'MXN', 'Mexican Peso'),
(13, 'NOK', 'Norwegian Krone'),
(14, 'NZD', 'New Zealand Dollar'),
(15, 'PHP', 'Philippine Peso'),
(16, 'PLN', 'Polish Zloty'),
(17, 'GBP', 'Pound Sterling'),
(18, 'SGD', 'Singapore Dollar'),
(19, 'SEK', 'Swedish Krona'),
(20, 'CHF', 'Swiss Franc'),
(21, 'TWD', 'Taiwan New Dollar'),
(22, 'THB', 'Thai Baht'),
(23, 'TRY', 'Turkish Lira'),
(24, 'USD', 'U.S. Dollar'),
(25, 'BDT', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` bigint(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_company` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `proj_id` varchar(10) NOT NULL,
  `contact_no` varchar(13) NOT NULL,
  `customer_type` varchar(50) DEFAULT NULL,
  `ledger_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_migrate`
--

CREATE TABLE `data_migrate` (
  `data_id` int(10) NOT NULL,
  `Timestamp` varchar(100) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Industry` varchar(50) NOT NULL,
  `OfficePhone1` varchar(50) NOT NULL,
  `OfficePhone2` varchar(50) NOT NULL,
  `Fax` varchar(50) NOT NULL,
  `Mobile1` varchar(50) NOT NULL,
  `Mobile2` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `User` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_migrate`
--

INSERT INTO `data_migrate` (`data_id`, `Timestamp`, `FullName`, `Designation`, `department`, `Company`, `Address`, `Country`, `Type`, `Industry`, `OfficePhone1`, `OfficePhone2`, `Fax`, `Mobile1`, `Mobile2`, `Email`, `User`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '8801715474842', '8801615474842', '', ''),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '8801730173617', '8801715064858', '', ''),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '8801819229567', '', '', ''),
(6, '', '', '', '', '', '', '', '', '', '', '', '', '8801711538910', '8801971538910', '', ''),
(7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '', '', '', '', '', '', '', '', '', '', '', '', '8801715105316', '8801778960968', '', ''),
(9, '', '', '', '', '', '', '', '', '', '', '', '', '8801711322162', '8801552487854', '', ''),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '8801711561869', '8801912127773', '', ''),
(11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '', '', '', '', '', '', '', '', '', '', '', '', '8801912370005', '8801718257688', '', ''),
(13, '', '', '', '', '', '', '', '', '', '', '', '', '8801715340016', '', '', ''),
(14, '', '', '', '', '', '', '', '', '', '', '', '', '8801721824333', '8801718308073', '', ''),
(15, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '', '', '', '', '', '', '', '', '', '', '', '', '8801911365623', '', '', ''),
(17, '', '', '', '', '', '', '', '', '', '', '', '', '8801762625657', '', '', ''),
(18, '', '', '', '', '', '', '', '', '', '', '', '', '8801713032262', '8801911350544', '', ''),
(19, '', '', '', '', '', '', '', '', '', '', '', '', '8801916145217', '', '', ''),
(20, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, '', '', '', '', '', '', '', '', '', '', '', '', '8801715730929', '8801674251608', '', ''),
(22, '', '', '', '', '', '', '', '', '', '', '', '', '8801717095133', '', '', ''),
(23, '', '', '', '', '', '', '', '', '', '', '', '', '8801712077125', '', '', ''),
(24, '', '', '', '', '', '', '', '', '', '', '', '', '8801713457255', '8801973457255', '', ''),
(25, '', '', '', '', '', '', '', '', '', '', '', '', '8801712615038', '', '', ''),
(26, '', '', '', '', '', '', '', '', '', '', '', '', '8801711540300', '', '', ''),
(27, '', '', '', '', '', '', '', '', '', '', '', '', '8801715912647', '', '', ''),
(28, '', '', '', '', '', '', '', '', '', '', '', '', '8801715054639', '8801672783966', '', ''),
(29, '', '', '', '', '', '', '', '', '', '', '', '', '8801915092055', '', '', ''),
(30, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, '', '', '', '', '', '', '', '', '', '', '', '', '8801943688089', '', '', ''),
(32, '', '', '', '', '', '', '', '', '', '', '', '', '8801736733845', '8801917302224', '', ''),
(33, '', '', '', '', '', '', '', '', '', '', '', '', '8801715144737', '', '', ''),
(34, '', '', '', '', '', '', '', '', '', '', '', '', '8801929715937', '8801825569344', '', ''),
(35, '', '', '', '', '', '', '', '', '', '', '', '', '8801711627155', '', '', ''),
(36, '', '', '', '', '', '', '', '', '', '', '', '', '8801674615556', '', '', ''),
(37, '', '', '', '', '', '', '', '', '', '', '', '', '8801711545180', '', '', ''),
(38, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, '', '', '', '', '', '', '', '', '', '', '', '', '8801715227165', '8801675805144', '', ''),
(40, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, '', '', '', '', '', '', '', '', '', '', '', '', '8801915748899', '8801946130103', '', ''),
(42, '', '', '', '', '', '', '', '', '', '', '', '', '8801819467661', '8801711522312', '', ''),
(43, '', '', '', '', '', '', '', '', '', '', '', '', '8801673863812', '8801722924927', '', ''),
(44, '', '', '', '', '', '', '', '', '', '', '', '', '8801711330952', '8801711542080', '', ''),
(45, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, '', '', '', '', '', '', '', '', '', '', '', '', '8801715411123', '8801674085020', '', ''),
(47, '', '', '', '', '', '', '', '', '', '', '', '', '8801715667611', '', '', ''),
(48, '', '', '', '', '', '', '', '', '', '', '', '', '8801911446544', '', '', ''),
(49, '', '', '', '', '', '', '', '', '', '', '', '', '8801714096865', '', '', ''),
(50, '', '', '', '', '', '', '', '', '', '', '', '', '8801819193125', '8801674933748', '', ''),
(51, '', '', '', '', '', '', '', '', '', '', '', '', '8801755709029', '', '', ''),
(52, '', '', '', '', '', '', '', '', '', '', '', '', '8801933306692', '', '', ''),
(53, '', '', '', '', '', '', '', '', '', '', '', '', '8801923475820', '8801686890188', '', ''),
(54, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, '', '', '', '', '', '', '', '', '', '', '', '', '8801731260611', '8801672315063', '', ''),
(56, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, '', '', '', '', '', '', '', '', '', '', '', '', '8801711535280', '8801971535280', '', ''),
(58, '', '', '', '', '', '', '', '', '', '', '', '', '8801713040340', '', '', ''),
(59, '', '', '', '', '', '', '', '', '', '', '', '', '8801977337722', '', '', ''),
(60, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, '', '', '', '', '', '', '', '', '', '', '', '', '8801932721989', '8801676205422', '', ''),
(62, '', '', '', '', '', '', '', '', '', '', '', '', '8801911480744', '', '', ''),
(63, '', '', '', '', '', '', '', '', '', '', '', '', '8801713005016', '8801970888777', '', ''),
(64, '', '', '', '', '', '', '', '', '', '', '', '', '8801715566477', '8801914223032', '', ''),
(65, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, '', '', '', '', '', '', '', '', '', '', '', '', '8801717344030', '8801711828273', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `group_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `permission` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`group_id`, `name`, `description`, `permission`) VALUES
(1, 'Admin', 'Admin', '1'),
(2, 'Business Manager', 'Business Manager', '0'),
(3, 'Contractor', 'Contractor', ''),
(4, 'Property Owner', 'Property Owner', ''),
(5, 'Maintenance', 'Maintenance', ''),
(6, 'Property Manager', 'Property Manager', ''),
(7, 'Applicant', 'Applicant', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense_bill_details`
--

CREATE TABLE `expense_bill_details` (
  `id` int(10) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `exp_type` tinyint(4) NOT NULL,
  `dst_from` varchar(200) NOT NULL,
  `dst_to` varchar(200) NOT NULL,
  `trans_mode` int(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `purpose` text NOT NULL,
  `currency` varchar(50) NOT NULL,
  `amount` float(20,2) NOT NULL,
  `receipt_available` int(10) NOT NULL,
  `exp_details` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_bill_details`
--

INSERT INTO `expense_bill_details` (`id`, `bill_no`, `exp_type`, `dst_from`, `dst_to`, `trans_mode`, `from_date`, `to_date`, `purpose`, `currency`, `amount`, `receipt_available`, `exp_details`) VALUES
(1, '00000001', 1, 'Dhanmodi', 'Gulshan', 5, '2016-08-03', '0000-00-00', 'to meet appex', '25', 150.00, 0, ''),
(2, '00000001', 1, 'Uttara', 'Paltan', 2, '2016-08-05', '0000-00-00', 'to meet client', '25', 250.00, 0, ''),
(3, '00000002', 1, 'Malibag', 'Puran Dhaka', 2, '2016-08-10', '0000-00-00', 'adfaf', '25', 50.00, 1, ''),
(4, '00000002', 1, 'Sahbag', 'Office', 2, '2016-08-10', '0000-00-00', 'meet client', '25', 60.00, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `expense_bill_master`
--

CREATE TABLE `expense_bill_master` (
  `exp_id` int(10) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `total_amount` float(20,2) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `mgr_id` varchar(50) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=unpaid,1=approved,2=paid,3=reject',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action_by` varchar(50) NOT NULL,
  `action_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_bill_master`
--

INSERT INTO `expense_bill_master` (`exp_id`, `bill_no`, `total_amount`, `user_id`, `mgr_id`, `reason`, `status`, `created_date`, `action_by`, `action_date`) VALUES
(1, '00000001', 400.00, 'ishrat', '0', NULL, 2, '2016-08-05 05:18:29', 'mannan', '2016-08-05 22:16:45'),
(2, '00000002', 110.00, 'zahid', 'ishrat', 'test', 3, '2016-08-05 13:32:28', 'mannan', '2016-08-05 22:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `freight`
--

CREATE TABLE `freight` (
  `id` int(10) NOT NULL,
  `freight` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freight`
--

INSERT INTO `freight` (`id`, `freight`) VALUES
(1, 'Air'),
(2, 'Ocean'),
(3, 'Road'),
(4, 'MultiModal');

-- --------------------------------------------------------

--
-- Table structure for table `incoterm`
--

CREATE TABLE `incoterm` (
  `id` int(10) NOT NULL,
  `incoterm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoterm`
--

INSERT INTO `incoterm` (`id`, `incoterm`) VALUES
(1, 'CFR'),
(2, 'FOB'),
(3, 'CIF'),
(4, 'EXW'),
(5, 'FAS');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`cat_id`, `cat_name`, `status`) VALUES
(1, 'Product', 1),
(2, 'Service', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bengali` longtext COLLATE utf8_unicode_ci NOT NULL,
  `spanish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `arabic` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dutch` longtext COLLATE utf8_unicode_ci NOT NULL,
  `russian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `chinese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `turkish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `portuguese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hungarian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `french` longtext COLLATE utf8_unicode_ci NOT NULL,
  `greek` longtext COLLATE utf8_unicode_ci NOT NULL,
  `german` longtext COLLATE utf8_unicode_ci NOT NULL,
  `italian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `thai` longtext COLLATE utf8_unicode_ci NOT NULL,
  `urdu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hindi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `latin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `indonesian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `japanese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `korean` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `his_id` int(10) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `login_date` varchar(20) NOT NULL,
  `logout_date` varchar(20) NOT NULL,
  `login_session` varchar(50) NOT NULL,
  `login_ip` varchar(50) NOT NULL,
  `login_location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`his_id`, `user_id`, `login_date`, `logout_date`, `login_session`, `login_ip`, `login_location`) VALUES
(1, 'mannan', '1470250439', '', '30c45262e13a8d0c0ae9c6c850e36f49', '127.0.0.1', ''),
(2, 'mannan', '1470319999', '', '1326e4a5ad15ab64cea6d41fb1ffc8be', '::1', ''),
(3, 'mannan', '1470320327', '', 'b849d89a5d831e1f623ca3192a5f47d0', '::1', ''),
(4, 'ishrat', '1470320497', '', 'e6455d6fe3a1ccb972afe11d002c1515', '::1', ''),
(5, 'mannan', '1470320699', '', '334c03b92b64d026df5a12dd782c43bb', '::1', ''),
(6, 'mannan', '1470321034', '', '1d09f78b0bee4b3d1d379d67c56429fb', '::1', ''),
(7, 'ishrat', '1470321175', '1470326410', '3441043718e09300f62f4e2267ec8cb9', '::1', ''),
(8, 'bashar', '1470326430', '', 'f0613d41869a38c3df3f398357e7f8c5', '::1', ''),
(9, 'mannan', '1470366366', '', '2b9fb29ebe562b82c115993c007e972a', '::1', ''),
(10, 'bashar', '1470366477', '1470366630', 'c2b60cca5339df8d28752803f113d31b', '::1', ''),
(11, 'ishrat', '1470366642', '', '43877e554e308c19a4c301f53221b7c8', '::1', ''),
(12, 'mannan', '1470384815', '', 'b4de5bb8d0791e71bcfa687a8fffc1d0', '::1', ''),
(13, 'mannan', '1470403336', '', '51a0e304075d82a7d78699d79780a2bb', '::1', ''),
(14, 'zahid', '1470403635', '', '84005bad84cbdad2da6810a553512426', '::1', ''),
(15, 'mannan', '1470405114', '', '0bb071df1c33b6285e11f0c36c32c734', '::1', ''),
(16, 'mannan', '1470454092', '1470461621', '49f2610f2f41700ae84cc72bb306cfce', '::1', ''),
(17, 'ishrat', '1470460883', '', 'c0393754eb879463f0473ced94efea41', '::1', ''),
(18, 'zahid', '1470461632', '1470462843', '0467e86c408745851c5f8135476a51e8', '::1', ''),
(19, 'mannan', '1470462847', '', '5c6c8a3f3815bf12bc10af8133088e8e', '::1', ''),
(20, 'mannan', '1470470806', '', '263852f2e4e38d00a2673584026a100a', '::1', ''),
(21, 'mannan', '1470486452', '', 'c51a9c3658d9795065f2e803429941f0', '::1', ''),
(22, 'mannan', '1470583933', '', 'cf1da3c8b3e0bb680be483bfc5b83b7f', '::1', ''),
(23, 'mannan', '1470683164', '', '7783ee116a6bcbd421ae9ceac4c18b21', '::1', ''),
(24, 'mannan', '1470752117', '', 'fa9cb0f422921401a35e85408216ec33', '::1', ''),
(25, 'mannan', '1470838112', '', 'e04ba385c8aba76904ac22024cb39b0f', '::1', ''),
(26, 'mannan', '1470853949', '', '768863b99e3dfaac51790d828a7411da', '::1', ''),
(27, 'mannan', '1470922956', '', 'abe7148fa9ae1f2d33d11580983c3e59', '::1', ''),
(28, 'mannan', '1470943915', '', 'ce12eb1bb87e48e0aa14f5e7ad600d8f', '::1', ''),
(29, 'mannan', '1471008128', '', '25c40539fa46cad41a0e962451064a34', '::1', ''),
(30, 'mannan', '1471022139', '', 'ebe220ea1cf4d01dec46fffaea6727c2', '::1', ''),
(31, 'mannan', '1471065572', '', 'ca755e730260a557b55b6cfa4abffc47', '::1', ''),
(32, 'mannan', '1471081509', '1471082491', '71a0583e80bd84cc99669beb9b179242', '::1', ''),
(33, 'mannan', '1471082497', '', '5375f19d410fdc9f597f5b9b92d6473a', '::1', ''),
(34, 'mannan', '1471091079', '', 'c9b821ffe39e11c37d71816c19864811', '::1', ''),
(35, 'mannan', '1471183313', '', '0e2c9bb483c865feeb8c0f7bb7f9e5ed', '::1', ''),
(36, 'mannan', '1471197331', '', 'caffe096cf926ff2c2f05500cf1f2605', '::1', ''),
(37, 'mannan', '1471226331', '', 'af04c2017bdc268532038b593c7eb35f', '::1', ''),
(38, 'mannan', '1471240692', '', 'a6cffee3ae3f3449e9561fd05136c3ce', '::1', ''),
(39, 'mannan', '1471270523', '', '8df9cfa445399c95e99b9ead986a8301', '::1', ''),
(40, 'mannan', '1471355025', '', '805612b62df14a49b39234320767ca45', '::1', ''),
(41, 'mannan', '1471355911', '', 'c12d88230078df0e2e3a8c9593b31ad8', '::1', ''),
(42, 'mannan', '1471442965', '', 'e615e12d72572cd3740f33c95d2827f2', '::1', ''),
(43, 'mannan', '1471530977', '', '6d3d87349e27b400dd862ad2768a7162', '::1', ''),
(44, 'mannan', '1471617836', '', '2d40252b83b0445c1f7826852002ed18', '::1', ''),
(45, 'mannan', '1471689923', '', '2297362f3b3e7e37fd8eea6f0f9267cd', '::1', ''),
(46, 'mannan', '1471792466', '', 'c9e92998aaacdfda335979746421a1d2', '::1', ''),
(47, 'mannan', '1471875505', '', 'ab5999015f7397e851f9603e3a04c544', '::1', ''),
(48, 'mannan', '1471961883', '', 'cdaa75d6e4c26d92afe44b79f7066230', '::1', ''),
(49, 'mannan', '1471963180', '', 'b6432e23f2dc39e8110f311958044236', '::1', ''),
(50, 'mannan', '1472047512', '', '6077ab240c4bfba30cf7531a067a5e89', '::1', ''),
(51, 'mannan', '1472097663', '', '5f00556fe31d9b72eb4377a1522de406', '::1', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(10) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `sub_menu` int(10) NOT NULL,
  `menu_file` varchar(100) NOT NULL,
  `css_class` varchar(50) NOT NULL,
  `morder` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `sub_menu`, `menu_file`, `css_class`, `morder`) VALUES
(1, 'Dashboard', 0, 'admin/dashboard', 'ti-home', 1),
(2, 'Quotations', 0, '#', 'ti-pencil-alt', 4),
(3, 'People', 0, 'admin/manage_people', 'ti-user', 3),
(4, 'Companies', 0, 'admin/manage_company', 'ti-paint-bucket', 2),
(5, 'Products', 0, '#', 'ti-pencil-alt', 8),
(6, 'Settings', 0, '#', 'icon-settings', 9),
(7, 'Users', 0, '#', 'ti-user', 10),
(8, 'User Accounts Setup', 7, 'user/user_management', '', 1),
(9, 'Menu Setup', 7, 'user/menu_management', '', 2),
(10, 'Access Setup', 7, 'user/access_management', '', 3),
(11, 'Reports', 0, '#', 'ti-pencil-alt', 12),
(12, 'Expense Memo', 0, '#', 'ti-pencil-alt', 11),
(13, 'Create New order', 14, 'admin/manage_orders', '', 0),
(14, 'Orders', 0, '#', 'ti-pencil-alt', 5),
(15, 'Commissions', 0, 'admin/manage_orders/commission', 'ti-pencil-alt', 7),
(16, 'Create Expense Memo', 12, 'admin/expense_management', '', 0),
(17, 'Expense Memo List', 12, 'admin/expense_management/list', '', 0),
(18, 'Assisgn To-Do', 0, 'admin/todo_management', 'ti-user', 6),
(19, 'Templates', 0, '#', 'ti-pencil-alt', 13),
(21, 'Order List', 14, 'admin/manage_orders/list', '', 0),
(22, 'Products Setup', 5, 'admin/product_management', '', 0),
(23, 'Product Categories', 5, 'admin/category_management', '', 0),
(24, 'Currencies', 6, 'setting/currency_management', '', 0),
(25, 'Product SKU', 6, 'setting/sku_management', '', 0),
(26, 'Incoterm', 6, 'setting/incoterm_management', '', 0),
(27, 'Payment Terms', 6, 'setting/pterms_management', '', 0),
(28, 'PORTS', 6, 'setting/ports_management', '', 0),
(29, 'Cities', 6, 'setting/city_management', '', 0),
(30, 'Freight', 6, 'setting/freight_management', '', 0),
(31, 'Transport', 6, 'setting/transport_management', '', 0),
(32, 'Single Quotation', 2, 'admin/manage_quotation', '', 1),
(34, 'Quotation List', 2, 'admin/manage_quotation/list', '', 3),
(35, 'Multiple Quotation', 2, 'admin/multiple_quotation', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu_access`
--

CREATE TABLE `menu_access` (
  `id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `menu_id` int(20) NOT NULL,
  `permission` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_access`
--

INSERT INTO `menu_access` (`id`, `role_id`, `menu_id`, `permission`) VALUES
(1, 1, 10, '["1","2","3","4","5","6"]'),
(2, 1, 29, '1'),
(3, 1, 15, '["1","2","3","4","5","6"]'),
(4, 1, 4, '["1","2","3","4","5","6"]'),
(5, 1, 16, '["1","2","3","4","5","6"]'),
(6, 1, 13, '1'),
(7, 1, 24, '1'),
(8, 1, 18, '["1","2","3","4","5","6"]'),
(9, 1, 1, '1'),
(10, 1, 12, '1'),
(11, 1, 17, '["1","2","3","4","5","6"]'),
(12, 1, 30, '1'),
(13, 1, 26, '1'),
(14, 1, 9, '1'),
(15, 1, 21, '1'),
(16, 1, 14, '1'),
(17, 1, 27, '1'),
(18, 1, 3, '["1","2","3","4","5","6"]'),
(20, 1, 28, '1'),
(21, 1, 23, '["1","2","3","4","5","6"]'),
(22, 1, 25, '["1","2","3","4","5","6"]'),
(23, 1, 5, '["1","2","3","4","5","6"]'),
(24, 1, 22, '["1","2","3","4","5","6"]'),
(25, 1, 2, '1'),
(26, 1, 11, '1'),
(27, 1, 6, '1'),
(28, 1, 19, '1'),
(29, 1, 31, '1'),
(30, 1, 8, '["1","2","3","4","5","6"]'),
(32, 4, 1, '1'),
(33, 4, 3, '1'),
(34, 4, 16, '["1","2","4","5"]'),
(35, 3, 8, '["1","4","5","6"]'),
(36, 2, 8, '["1","2","4","5","6"]'),
(37, 1, 7, 'false'),
(38, 2, 7, 'false'),
(39, 3, 7, 'false'),
(40, 3, 2, '["1","2","3","4","5","6"]'),
(41, 4, 2, '["1","2","3","4","5","6"]'),
(42, 3, 4, '["4","5"]'),
(43, 3, 12, '["1","2","3","4","5","6"]'),
(44, 3, 16, '["1","2","3","4","5","6"]'),
(45, 3, 17, '["1","2","3","4","5","6"]'),
(46, 4, 12, 'false'),
(47, 4, 17, '["4","5"]'),
(48, 1, 32, '["1","2","3","4","5","6"]'),
(49, 1, 34, '["1","2","3","4","5","6"]'),
(50, 1, 35, '["1","2","3","4","5","6"]');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `notice_id` int(11) NOT NULL,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `notice_title`, `notice`, `create_timestamp`) VALUES
(1, 'BLUE HAT', 'if you can change the color to light blue I will order.', 1465423200),
(2, 'DPC Support', 'Sure - how can we help you?', 1465423200),
(3, 'BLUE HAT', 'I have some questions on a BLUE HAT in my box.', 1465423200);

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `terms_id` int(10) NOT NULL,
  `terms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`terms_id`, `terms`) VALUES
(1, 'Cash in Advance'),
(2, '100% Irrevocable Letter of Credit'),
(3, 'Wire Transfer'),
(4, 'LC 30 Days'),
(5, 'LC 45 Days'),
(6, 'LC 60 Days'),
(7, 'LC 90 Days'),
(8, 'LC 180 Days');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(10) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `organization` int(10) NOT NULL,
  `countryId` int(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `mobile2` varchar(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `extension` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `primaryStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `FullName`, `designation`, `department`, `organization`, `countryId`, `mobile`, `mobile2`, `type`, `extension`, `telephone`, `email`, `status`, `primaryStatus`) VALUES
(1, 'Iqbal Hossain', 'Proprietor', '', 1, 18, '8801715474842', '', '', '', '', 'ihasan@gmail.com', 1, 0),
(2, 'Azizul Haque Bulbul', 'Managing Director', '', 2, 18, '', '', '', '', '', '', 1, 0),
(3, 'Nurul Amin', 'Proprietor', '', 3, 18, '', '', '', '', '', '', 1, 0),
(4, 'NEW SHILPI CHEMICALS STORE', 'Proprietor', '', 4, 18, '8801730173617', '', '', '', '', '', 1, 0),
(5, 'BASHIR AHMED', 'Proprietor', '', 5, 18, '8801819229567', '', '', '', '', '', 1, 0),
(6, 'A.S.M Sayem', 'Proprietor', '', 6, 18, '8801711538910', '', '', '', '', '', 1, 0),
(7, 'HANIF', 'Proprietor', '', 7, 18, '', '', '', '', '', '', 1, 0),
(8, 'N S PLASTIC', 'Proprietor', '', 8, 18, '8801715105316', '', '', '', '', 'samiutd06@gmail.com', 1, 0),
(9, 'SAIDUR RAHMAN', 'Proprietor', '', 9, 18, '8801711322162', '', '', '', '', '', 1, 0),
(10, 'MUMTAZ ZAFER', 'Proprietor', '', 10, 18, '8801711561869', '', '', '', '', 'Sonyplasticbd@yahoo.com', 1, 0),
(11, 'M MAZHARUL ISLAM', 'Manager', '', 11, 18, '', '', '', '', '', 'pack_packaging@yahoo.com', 1, 0),
(12, 'Abdus Sattar', 'Proprietor', '', 12, 18, '8801912370005', '', '', '', '', '', 1, 0),
(13, 'AKTAR HOSSAIN', 'Proprietor', '', 13, 18, '8801715340016', '', '', '', '', '', 1, 0),
(14, 'BADAL', 'Proprietor', '', 14, 18, '8801721824333', '', '', '', '', '', 1, 0),
(15, 'SHEIKH MOHAMMAD SHAMSUDDIN', 'Proprietor', '', 15, 18, '', '', '', '', '', '', 1, 0),
(16, 'NEW PLASTIC AND COLOUR CENTER', 'Proprietor', '', 16, 18, '8801911365623', '', '', '', '', '', 1, 0),
(17, 'THAI SANDAL INDUSTRIES', 'Executive', '', 17, 18, '8801762625657', '', '', '', '', '', 1, 0),
(18, 'S ALAM TALUKDER', 'Proprietor', '', 18, 18, '8801713032262', '', '', '', '', '', 1, 0),
(19, 'MOSTAQUE AHMED', 'Proprietor', '', 19, 18, '8801916145217', '', '', '', '', '', 1, 0),
(20, 'AHAMMD HOSEN KHAN ', 'Proprietor', '', 20, 18, '', '', '', '', '', '', 1, 0),
(21, 'GIAS UDDIN', 'Proprietor', '', 21, 18, '8801715730929', '', '', '', '', '', 1, 0),
(22, 'KAMAL HOSSAIN', 'Proprietor', '', 22, 18, '8801717095133', '', '', '', '', '', 1, 0),
(23, 'ALAUDDIN', 'Proprietor', '', 23, 18, '8801712077125', '', '', '', '', '', 1, 0),
(24, 'RIAZ UDDIN', 'Proprietor', '', 24, 18, '8801713457255', '', '', '', '', '', 1, 0),
(25, 'ABUL KHAYER', 'Proprietor', '', 25, 18, '8801712615038', '', '', '', '', '', 1, 0),
(26, 'ASHRAF BHUIYAN', 'Partner', '', 26, 18, '8801711540300', '', '', '', '', '', 1, 0),
(27, 'NASIR AHMED', 'Proprietor', '', 27, 18, '8801715912647', '', '', '', '', '', 1, 0),
(28, 'IASIN BEPARI', 'Proprietor', '', 28, 18, '8801715054639', '', '', '', '', '', 1, 0),
(29, 'ATIQUR RAHMAN', 'Executive', '', 29, 18, '8801915092055', '', '', '', '', 'rrenterprise777@gmail.com', 1, 0),
(30, 'K M ANWARUL ISLAM', 'Proprietor', '', 30, 18, '', '', '', '', '', '', 1, 0),
(31, 'Mohammed Salauddin', 'CEO', '', 31, 18, '8801943688089', '', '', '', '', 'salauddin@cq.com.bd', 1, 0),
(32, 'M H TUHIN', 'Proprietor', '', 32, 18, '8801736733845', '', '', '', '', '', 1, 0),
(33, 'YAKUB', 'Proprietor', '', 33, 18, '8801715144737', '', '', '', '', 'mdyakub.mdyakub@yahoo.com', 1, 0),
(34, 'ALAM', 'Proprietor', '', 34, 18, '8801929715937', '', '', '', '', '', 1, 0),
(35, 'AHSAN HABIB', 'Proprietor', '', 35, 18, '8801711627155', '', '', '', '', 'kokopackaging27@gmail.com', 1, 0),
(36, 'SHAMSUR RAHMAN', 'Proprietor', '', 36, 18, '8801674615556', '', '', '', '', 'jibon0707@gmail.com', 1, 0),
(37, 'SHAH ALAM', 'Proprietor', '', 37, 18, '8801711545180', '', '', '', '', 'shahedintl@gmail.com', 1, 0),
(38, 'HAFEZ ABUL KALAM', 'Proprietor', '', 38, 18, '', '', '', '', '', 'kalamcolourhouse@gmail.com', 1, 0),
(39, 'MOZAMMEL HAQUE', 'Proprietor', '', 39, 18, '8801715227165', '', '', '', '', '', 1, 0),
(40, 'SARWAR HOSSAIN', 'Proprietor', '', 40, 18, '', '', '', '', '', 'SHARP.PLASTIC2000@GMAIL.COM', 1, 0),
(41, 'SAAID SHEIKH', 'Proprietor', '', 41, 18, '8801915748899', '', '', '', '', '', 1, 0),
(42, 'ASAD', 'Partner', '', 42, 18, '8801819467661', '', '', '', '', 'GRAMEEN.PACKAGING@GMAIL.COM', 1, 0),
(43, 'SHAHEB ALI AHMED', 'Proprietor', '', 43, 18, '8801673863812', '', '', '', '', '', 1, 0),
(44, 'FRESH DISPO CENTER', 'Proprietor', '', 44, 18, '8801711330952', '', '', '', '', '', 1, 0),
(45, 'NOWAAB', 'Proprietor', '', 45, 18, '', '', '', '', '', '', 1, 0),
(46, 'IMRAN KHAN', 'Proprietor', '', 46, 18, '8801715411123', '', '', '', '', '', 1, 0),
(47, 'ALAUDDIN', 'Proprietor', '', 47, 18, '8801715667611', '', '', '', '', '', 1, 0),
(48, 'NEAZ MOHAMMED', 'Proprietor', '', 48, 18, '8801911446544', '', '', '', '', '', 1, 0),
(49, 'ATUL K BHOUMIK', 'Managing Director', '', 49, 18, '8801714096865', '', '', '', '', 'AKB@DHAKA.NET', 1, 0),
(50, 'SAIFUDDIN JAHANGIR', 'Proprietor', '', 50, 18, '8801819193125', '', '', '', '', '', 1, 0),
(51, 'ABU ZAHID', 'Manager', '', 51, 18, '8801755709029', '', '', '', '', 'ZAHIDZAWAD06@GMAIL.COM', 1, 0),
(52, 'RAHIMULLA AZAD', 'CEO', '', 52, 18, '8801933306692', '', '', '', '', '', 1, 0),
(53, 'ABUL KALAM AZAD', 'Proprietor', '', 53, 18, '8801923475820', '', '', '', '', '', 1, 0),
(54, 'PRIME ACCESSORIES', 'Proprietor', '', 54, 18, '', '', '', '', '', 'm.ahamedmonju@yahoo.com', 1, 0),
(55, 'PRIME ACCESSORIES', 'Proprietor', '', 55, 18, '8801731260611', '', '', '', '', 'm.ahamedmonju@yahoo.com', 1, 0),
(56, 'FAZLUL HAQUE', 'Proprietor', '', 56, 18, '', '', '', '', '', '', 1, 0),
(57, 'AFZAL HOSSAIN', 'Proprietor', '', 57, 18, '8801711535280', '', '', '', '', '', 1, 0),
(58, 'NURUL ISLAM', 'Proprietor', '', 58, 18, '8801713040340', '', '', '', '', '', 1, 0),
(59, 'ABDUR RAHIM', 'Proprietor', '', 59, 18, '8801977337722', '', '', '', '', 'rg_rahim1@yahoo.com', 1, 0),
(60, 'JAMAL HOSSAIN', 'Proprietor', '', 60, 18, '', '', '', '', '', '', 1, 0),
(61, 'JOYNAL ABEDIN', 'Proprietor', '', 61, 18, '8801932721989', '', '', '', '', '', 1, 0),
(62, 'RUHUL AMIN AZIM', 'Partner', '', 62, 18, '8801911480744', '', '', '', '', 'ruhulajim@yahoo.com', 1, 0),
(63, 'MOSHAROF HOSSAIN', 'Proprietor', '', 63, 18, '8801713005016', '', '', '', '', '', 1, 0),
(64, 'KHAYER UDDIN AHMED', 'Proprietor', '', 64, 18, '8801715566477', '', '', '', '', '', 1, 0),
(65, 'FAZLUL HAQUE', 'Proprietor', '', 65, 18, '', '', '', '', '', '', 1, 0),
(66, 'SHAJAHAN', 'Assistant Manager', '', 66, 18, '8801717344030', '', '', '', '', 'ranipp02@yahoo.com', 1, 0),
(128, 'Abdul Mannan', 'Software Engineer', 'Software Development', 1, 18, '8801814724520', '', 'Work', '236', '5266656', 'mannancmt@yahoo.com', 1, 0),
(129, 'dfsa', 'dasf', 'dsfa', 2, 18, '+8801814724520', '', 'Home', '', '65456', 'sdf@gmail.com', 1, 0),
(130, 'Abdul Hannan', 'Sales Execuitve', 'Sales and Marketing', 1, 18, '+8801814724520', NULL, 'Home', '', '5845645', 'salauddin@times.com.bd', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `id` int(10) NOT NULL,
  `port_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `port_name`, `country`) VALUES
(1, 'CHITTAGONG', 'Bangladesh'),
(2, 'MONGLA', 'Bangladesh'),
(3, 'ICD KAMALAPUR', 'Bangladesh'),
(4, 'PANGAON', 'Bangladesh'),
(5, 'BENAPOLE', 'Bangladesh'),
(6, 'DHAKA', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(10) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` int(10) NOT NULL,
  `origin` varchar(200) NOT NULL,
  `tariff_code` varchar(50) NOT NULL,
  `price` float(20,2) NOT NULL,
  `original_price` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `item_code`, `item_name`, `description`, `category`, `origin`, `tariff_code`, `price`, `original_price`, `quantity`, `status`) VALUES
(1, '00000001', 'Methy', 'Methyl Ethyl Ketone', 1, '5', '545456', 65800.00, 'USD 65800/KG CFR CHITTAGONG', 165, 1),
(3, '00000002', 'Ketone', 'Ketone', 1, '1', '', 6500.00, 'USD 6500/KG FOB BENA', 500, 1),
(5, 'sff2536', 'oracle', 'adfalfk', 1, '226', '56565', 2500.00, 'USD 2500/KG CFR MONG', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sku`
--

CREATE TABLE `product_sku` (
  `id` int(10) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `sku_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sku`
--

INSERT INTO `product_sku` (`id`, `sku`, `sku_details`) VALUES
(1, 'KG', 'Kilogram'),
(2, 'MT', ''),
(3, 'Litre', ''),
(4, 'Box', ''),
(5, 'Drum', ''),
(6, 'Bag', ''),
(7, 'Bottle', ''),
(8, 'Can', ''),
(9, 'Dozen', ''),
(10, 'Pair', ''),
(11, 'Carton', ''),
(12, 'Jerrycan', ''),
(13, 'Pound', ''),
(14, 'Ounce', ''),
(15, 'Gram', ''),
(16, 'Piece', ''),
(17, 'Bale', ''),
(18, 'Barrel', ''),
(19, 'Cylinder', ''),
(20, 'Meter', ''),
(21, 'Yard', ''),
(22, 'Inch', ''),
(23, 'Feet', '');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(10) NOT NULL,
  `quotation_no` varchar(100) NOT NULL,
  `customerId` int(10) NOT NULL,
  `attention` int(10) NOT NULL,
  `attn_email` varchar(50) NOT NULL,
  `supplierId` int(10) NOT NULL,
  `productId` varchar(20) NOT NULL,
  `payment_terms` int(10) NOT NULL,
  `note` text NOT NULL,
  `qdate` date NOT NULL,
  `exp_date` date NOT NULL,
  `includeoption` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `method` int(10) NOT NULL,
  `action` tinyint(4) NOT NULL,
  `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `quotation_no`, `customerId`, `attention`, `attn_email`, `supplierId`, `productId`, `payment_terms`, `note`, `qdate`, `exp_date`, `includeoption`, `status`, `userId`, `method`, `action`, `entryDate`) VALUES
(1, '00000001', 1, 1, 'mannancmt@yahoo.com', 0, '00000001', 4, 'This is the test quotation', '2016-08-12', '2016-11-11', '["1","2","3","4","5","6","7"]', 5, 'mannan', 1, 0, '2016-08-12 15:11:17'),
(2, '00000002', 1, 1, 'salauddin@times.com.bd', 2, '00000001', 3, 'This is test quotation email', '2016-08-12', '2016-11-11', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-12 20:47:26'),
(3, '00000003', 1, 1, 'salauddin@times.com.bd', 0, '00000001', 3, 'This is test', '2016-08-12', '2016-11-11', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-12 20:50:03'),
(4, '00000004', 1, 1, 'salauddin@times.com.bd', 0, '00000001', 3, 'dsfas', '2016-08-12', '2016-11-11', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-12 20:51:53'),
(5, '00000005', 1, 1, 'mannancmt@yahoo.com', 0, '00000002', 3, 'You need to take necessary action', '2016-08-13', '2016-12-12', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-13 05:27:57'),
(6, '00000006', 2, 2, '', 0, '00000002', 3, 'fdgs', '2016-08-13', '2016-12-12', '["1","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-13 05:51:17'),
(7, '00000007', 3, 3, '', 0, '00000002', 2, 'dfafdfaf', '2016-08-13', '2016-12-12', '["1","2","4","5"]', 0, 'mannan', 2, 0, '2016-08-13 05:54:10'),
(8, '00000008', 1, 1, 'salauddin@times.com.bd', 0, '00000001', 2, 'This is test', '2016-08-13', '2016-12-12', '["0","2","4","5","6"]', 0, 'mannan', 1, 0, '2016-08-13 06:00:04'),
(9, '00000009', 1, 1, 'mannancmt@yahoo.com', 0, '00000002', 7, 'test', '2016-08-13', '2016-12-12', '["1","2","4"]', 0, 'mannan', 1, 0, '2016-08-13 10:51:56'),
(10, '00000010', 1, 1, 'mannancmt@yahoo.com', 0, '00000002', 7, 'test', '2016-08-13', '2016-12-12', '["1","2","4"]', 0, 'mannan', 1, 0, '2016-08-13 10:52:39'),
(11, '00000011', 1, 1, '', 0, '00000001', 3, 'fdgdg', '2016-08-13', '2016-12-12', '["5"]', 0, 'mannan', 2, 0, '2016-08-13 12:22:20'),
(12, '00000012', 1, 1, '', 0, '00000001', 4, 'sadfa', '2016-08-13', '2016-12-12', '["2"]', 0, 'mannan', 2, 0, '2016-08-13 12:25:06'),
(13, '00000013', 2, 2, '', 0, '00000002', 3, 'sdfa', '2016-08-13', '2016-12-12', '["2","3","4"]', 0, 'mannan', 2, 0, '2016-08-13 12:26:32'),
(14, 'Q0000014', 2, 2, '', 0, '00000001', 4, 'sdfssd', '2016-08-22', '0000-00-00', '["1","3"]', 0, 'mannan', 2, 0, '2016-08-22 15:21:47'),
(15, 'Q0000015', 1, 1, '', 0, '00000002', 3, 'sdfsf', '2016-08-22', '0000-00-00', '["1","2","3","4","5","6","7"]', 0, 'mannan', 2, 0, '2016-08-22 18:16:32'),
(16, 'Q0000016', 1, 1, 'salauddin@times.com.bd', 0, '00000001', 4, 'dsfaf', '2016-08-22', '0000-00-00', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-22 18:17:56'),
(17, 'Q0000017', 4, 4, '', 0, '00000002', 2, 'dfd', '2016-08-22', '0000-00-00', 'false', 0, 'mannan', 2, 0, '2016-08-22 18:18:23'),
(18, 'Q0000018', 1, 1, 'ihasan@gmail.com', 7, '00000001', 2, 'test multiple', '2016-08-24', '0000-00-00', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-24 18:12:24'),
(19, 'Q0000019', 2, 129, 'sdf@gmail.com', 7, '00000001', 2, 'test multiple', '2016-08-24', '0000-00-00', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-24 18:12:24'),
(20, 'Q0000020', 2, 129, 'sdf@gmail.com', 0, '00000002', 5, 'test', '2016-08-24', '0000-00-00', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-24 18:15:42'),
(21, 'Q0000021', 1, 128, 'mannancmt@yahoo.com', 0, '00000002', 5, 'test', '2016-08-24', '0000-00-00', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-24 18:15:54'),
(22, 'Q0000022', 62, 62, 'ruhulajim@yahoo.com', 0, '00000002', 5, 'test', '2016-08-24', '0000-00-00', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-24 18:16:05'),
(23, 'Q0000023', 1, 1, 'ihasan@gmail.com', 0, '00000002', 4, 'hgdhgd', '2016-08-24', '0000-00-00', '["1","2","3"]', 0, 'mannan', 1, 0, '2016-08-24 18:23:13'),
(24, 'Q0000024', 2, 129, 'sdf@gmail.com', 0, '00000002', 4, 'hgdhgd', '2016-08-24', '0000-00-00', '["1","2","3"]', 0, 'mannan', 1, 0, '2016-08-24 18:23:21'),
(25, 'Q0000025', 1, 1, 'ihasan@gmail.com', 0, '00000002', 1, 'dgdgd', '2016-08-24', '2016-09-23', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-24 18:28:03'),
(26, 'Q0000026', 1, 128, 'mannancmt@yahoo.com', 0, '00000002', 4, 'dsf', '2016-08-24', '2016-09-23', '["2"]', 0, 'mannan', 2, 0, '2016-08-24 18:32:58'),
(27, 'Q0000027', 2, 129, 'sdf@gmail.com', 0, '00000002', 4, 'dsf', '2016-08-24', '2016-09-23', '["2"]', 0, 'mannan', 2, 0, '2016-08-24 18:32:59'),
(28, 'Q0000028', 1, 1, 'ihasan@gmail.com', 0, '00000002', 1, 'sss', '2016-08-24', '2016-09-23', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-24 18:47:53'),
(29, 'Q0000029', 2, 129, 'sdf@gmail.com', 0, '00000002', 1, 'sss', '2016-08-24', '2016-09-23', '["1","2","3","4","5","6","7"]', 0, 'mannan', 1, 0, '2016-08-24 18:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `rokon_1_rokon`
--

CREATE TABLE `rokon_1_rokon` (
  `F1` varchar(28) DEFAULT '',
  `F2` varchar(29) DEFAULT '',
  `F3` varchar(17) DEFAULT '',
  `F5` varchar(35) DEFAULT '',
  `F6` varchar(78) DEFAULT '',
  `F7` varchar(10) DEFAULT '',
  `F8` varchar(29) DEFAULT '',
  `F9` varchar(20) DEFAULT '',
  `F10` bigint(20) DEFAULT NULL,
  `F11` bigint(20) DEFAULT NULL,
  `F12` varchar(11) DEFAULT '',
  `F13` varchar(13) DEFAULT '',
  `F14` varchar(13) DEFAULT '',
  `F15` varchar(27) DEFAULT '',
  `F16` varchar(6) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rokon_1_rokon`
--

INSERT INTO `rokon_1_rokon` (`F1`, `F2`, `F3`, `F5`, `F6`, `F7`, `F8`, `F9`, `F10`, `F11`, `F12`, `F13`, `F14`, `F15`, `F16`) VALUES
('2016/07/20 10:56:50 AM GMT+6', 'Iqbal Hossain', 'Proprietor', 'IQBAL ENTERPRISE', '29/A Sayed Awlad Hossain Lane, Islampur, Dhaka 1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027396090, NULL, '', '8801720000000', '8801620000000', '', 'Rokon'),
('2016/07/20 11:05:06 AM GMT+6', 'Azizul Haque Bulbul', 'Managing Director', 'SUNNY CHEMICAL INDUSTRIES (Pvt) Ltd', '19,kunipara tejgaon,industrial area dhaka 1208', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 29898425, 29898468, '', '', '', '', 'Rokon'),
('2016/07/20 11:20:43 AM GMT+6', 'Nurul Amin', 'Proprietor', 'MA-ENTERPRISE', '14/3/3 Jindabahar,2nd lane Nayabazar Dhaka-1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027395289, 88027390963, '', '', '', '', 'Rokon'),
('2016/07/20 11:31:07 AM GMT+6', 'NEW SHILPI CHEMICALS STORE', 'Proprietor', 'NEW SHILPI CHEMICALS STORE', '6 Purana Moghaltuly (Nobabpur Road),Dhaka-1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801730000000', '8801720000000', '', 'Rokon'),
('2016/07/20 11:40:39 AM GMT+6', 'BASHIR AHMED', 'Proprietor', 'BASHIR DYES AND CHEMICALS', '33 Sayed Awlad Hossain Lane,Islampur,Dhaka-1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027392459, NULL, '', '8801820000000', '', '', 'Rokon'),
('2016/07/20 12:01:17 PM GMT+6', 'A.S.M Sayem', 'Proprietor', 'NAHAR COMMERCIAL AGENCY', '8 Hossaini Dalan Road,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801710000000', '8801970000000', '', 'Rokon'),
('2016/07/20 12:12:59 PM GMT+6', 'HANIF', 'Proprietor', 'D ENTERPRISE', '63 Nandakumar Dotto Road,Churihatta,Chokbazar,dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801740000000', '8801530000000', '', 'Rokon'),
('2016/07/20 12:19:32 PM GMT+6', 'N S PLASTIC', 'Proprietor', 'N S PLASTIC', '119 Nababpur Road,Dhaka-1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029582282, 88027123073, '', '8801720000000', '8801780000000', 'samiutd06@gmail.com', 'Rokon'),
('2016/07/20 12:26:59 PM GMT+6', 'SAIDUR RAHMAN', 'Proprietor', 'GRAMEEN BANGLA PLASTIC INDUSTRIES', '91/1 Poshchim Islambag,Lalbag,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801710000000', '8801550000000', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/20 12:43:40 PM GMT+6', 'M MAZHARUL ISLAM', 'Manager', 'TOTAL PACK PACKAGING', '929 Shahidbag,rajarbag,Dhaka-1217', 'Bangladesh', 'Wholeseller;Importer', 'Printing & Packaging', 88029338264, 88029358142, '', '', '', 'pack_packaging@yahoo.com', 'Rokon'),
('2016/07/20 1:03:05 PM GMT+6', 'Abdus Sattar', 'Proprietor', 'BISMILLAH TRADING CORPORATION', '67 Haji Osman Goni Road,Alu Bazar,Dhaka-1000', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027164589, NULL, '', '8801910000000', '8801720000000', '', 'Rokon'),
('2016/07/20 1:08:24 PM GMT+6', 'AKTAR HOSSAIN', 'Proprietor', 'RUBEL ENTERPRISE', '64 Water Works Road,Rahmatgonj,Chokbazar,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027321242, NULL, '', '8801720000000', '', '', 'Rokon'),
('2016/07/20 1:14:05 PM GMT+6', 'BADAL', 'Proprietor', 'AL AMIN STORE', '56/3-a Purbo Islambag,Lalbag,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '8801720000000', '', 'Rokon'),
('2016/07/20 1:20:46 PM GMT+6', 'SHEIKH MOHAMMAD SHAMSUDDIN', 'Proprietor', 'BAGDAD PLASTIC STORE', '54 K B Rudro Road,Chadni Ghat,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801710000000', '8801710000000', '', 'Rokon'),
('2016/07/20 1:28:05 PM GMT+6', 'NEW PLASTIC AND COLOUR CENTER', 'Proprietor', 'NEW PLASTIC AND COLOUR CENTER', '38 K B Rudro Road,Urdu Road (Chok Bazar) Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027317094, 88027316670, '', '8801910000000', '', '', 'Rokon'),
('2016/07/20 1:34:29 PM GMT+6', 'THAI SANDAL INDUSTRIES', 'Executive', 'THAI SANDAL INDUSTRIES', '79 Begum Bazar,(4th Floor),Abul Hossain Market,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027315100, 88027311056, '', '8801760000000', '', '', 'Rokon'),
('2016/07/20 1:39:50 PM GMT+6', 'S ALAM TALUKDER', 'Proprietor', 'FIVE STAR PLASTIC', '35/1 Urdu Road,Lalbag,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027341006, NULL, '', '8801710000000', '8801910000000', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/20 1:56:38 PM GMT+6', 'GIAS UDDIN', 'Proprietor', 'GIAS UDDIN ENTERPRISE', '52 53 Nondo kumar Dotto road,Churi Hatta,Lalbag,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027321730, NULL, '', '8801720000000', '8801670000000', '', 'Rokon'),
('2016/07/20 2:01:40 PM GMT+6', 'KAMAL HOSSAIN', 'Proprietor', 'KAMAL PLASTIC CENTER', '25 Haider Box Lane,Churihatta,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '', '', 'Rokon'),
('2016/07/20 2:05:17 PM GMT+6', 'ALAUDDIN', 'Proprietor', 'R S PLASTIC', '663/13 Water Waz road,Chok Bazar,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801710000000', '', '', 'Rokon'),
('2016/07/20 2:11:55 PM GMT+6', 'RIAZ UDDIN', 'Proprietor', 'NEW ARAFAT PLASTIC PRODUCT', 'House 21,road 1,word 5 Rupnagar Battery Ghat,Kaamrangirchor,Lalbag,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027341375, NULL, '', '8801710000000', '8801970000000', '', 'Rokon'),
('2016/07/20 2:57:00 PM GMT+6', 'ABUL KHAYER', 'Proprietor', 'SHUMI SHOE STORE', '2 Showari Ghat Road,Chokbazar', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027314656, NULL, '', '8801710000000', '', '', 'Rokon'),
('2016/07/20 3:03:05 PM GMT+6', 'ASHRAF BHUIYAN', 'Partner', 'ORIENT PLASTIC WORKS', '45/1 Lalbag road,Lalbag Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029353223, NULL, '', '8801710000000', '', '', 'Rokon'),
('2016/07/20 3:07:33 PM GMT+6', 'NASIR AHMED', 'Proprietor', 'N AHMED MANUFACTURING CO', '130 Hozor Para,1no goli,Kamrangirchor,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027343306, NULL, '', '8801720000000', '', '', 'Rokon'),
('2016/07/20 3:15:48 PM GMT+6', 'IASIN BEPARI', 'Proprietor', 'MAAYER DOA PLASTIC CENTER', '38/33-c Islambag,Alir ghat,Lalbag,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '8801670000000', '', 'Rokon'),
('2016/07/20 3:24:03 PM GMT+6', 'ATIQUR RAHMAN', 'Executive', 'R R ENTERPRISE', '83 Shiddheshshori Circular Road,Manhattan Tower(6th Floor) Malibagh,Dhaka-1217', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88028314498, NULL, '', '8801920000000', '', 'rrenterprise777@gmail.com', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 10:06:20 AM GMT+6', 'M H TUHIN', 'Proprietor', 'TUHIN PLASTIC CENTER', '56/04 East Islambag\nLalbag\nDhaka 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801740000000', '8801920000000', '', 'Rokon'),
('2016/07/21 10:12:57 AM GMT+6', 'YAKUB', 'Proprietor', 'TITAN PLASTIC INDUSTRIES', '10 Gurshundor Ray Lane\nLalbag\nDhaka 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027343712, NULL, '', '8801720000000', '', 'mdyakub.mdyakub@yahoo.com', 'Rokon'),
('2016/07/21 10:26:20 AM GMT+6', 'ALAM', 'Proprietor', 'BORKOT PLASTIC CENTER', '7 Boro Katra (Johura Market)\nChokbazar\nDhaka 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801930000000', '8801830000000', '', 'Rokon'),
('2016/07/21 10:32:15 AM GMT+6', 'AHSAN HABIB', 'Proprietor', 'KO KO PACKAGING', '2 Tatkhana Lane\nNazimuddin Road\nDhaka 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027301155, NULL, '', '8801710000000', '', 'kokopackaging27@gmail.com', 'Rokon'),
('2016/07/21 10:37:57 AM GMT+6', 'SHAMSUR RAHMAN', 'Proprietor', 'JIBON SHOE STORE', '79 Begum Bazar (Abul Hosen Market)\nChokbazar\nDhaka1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027315840, NULL, '', '8801670000000', '', 'jibon0707@gmail.com', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 10:53:46 AM GMT+6', 'HAFEZ ABUL KALAM', 'Proprietor', 'KALAM COLOUR HOUSE', '64 CHOK CIRCULAR ROAD\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027319063, NULL, '', '8801710000000', '8801910000000', 'kalamcolourhouse@gmail.com', 'Rokon'),
('2016/07/21 11:00:04 AM GMT+6', 'MOZAMMEL HAQUE', 'Proprietor', 'THEDHAKA CHEMICALS', '16/7 BOROKATRA\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027310991, NULL, '', '8801720000000', '8801680000000', '', 'Rokon'),
('2016/07/21 11:03:51 AM GMT+6', 'SARWAR HOSSAIN', 'Proprietor', 'SHARP PLASTIC INDUSTRIES', '47/A LALBAG ROAD\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029667301, 88029667302, '', '', '', 'SHARP.PLASTIC2000@GMAIL.COM', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 11:18:35 AM GMT+6', 'ASAD', 'Partner', 'GRAMEEN PACKAGING', '6/14 SHOARIGHAT MAIN ROAD\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801820000000', '8801710000000', 'GRAMEEN.PACKAGING@GMAIL.COM', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 11:35:19 AM GMT+6', 'NOWAAB', 'Proprietor', 'NOWAAB ENTERPRISE', '55 K B  RUDRO ROAD\nCHADNI GHAT\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801920000000', '8801750000000', '', 'Rokon'),
('2016/07/21 11:42:05 AM GMT+6', 'IMRAN KHAN', 'Proprietor', 'KHAN ENTERPRISE', '50 NONDO KUMAR DOTTO ROAD\nCHADNIGHAT\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '8801670000000', '', 'Rokon'),
('2016/07/21 11:48:40 AM GMT+6', 'ALAUDDIN', 'Proprietor', 'JAMIR ENTERPRISE', '38/1 URDU ROAD\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027311526, NULL, '', '8801720000000', '', '', 'Rokon'),
('2016/07/21 11:51:23 AM GMT+6', 'NEAZ MOHAMMED', 'Proprietor', 'NEAZ TRADING', '7/1,CHOK CIRCULER ROAD\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027318367, NULL, '', '8801910000000', '', '', 'Rokon'),
('2016/07/21 11:57:31 AM GMT+6', 'ATUL K BHOUMIK', 'Managing Director', 'B B M CORPORATION', '17 MOGBAZAR (4TH FLOOR)\nNEW ESKATON ROAD\nDHAKA 1000', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029350914, NULL, '88028357232', '8801710000000', '', 'AKB@DHAKA.NET', 'Rokon'),
('2016/07/21 12:02:52 PM GMT+6', 'SAIFUDDIN JAHANGIR', 'Proprietor', 'J S POLY AND PACKAGING', '16/2/A JOYNAG ROAD\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029611715, NULL, '88029611715', '8801820000000', '8801670000000', '', 'Rokon'),
('2016/07/21 12:06:18 PM GMT+6', 'ABU ZAHID', 'Manager', 'CENTURY ACCESSORIES', '98/3 NAJIMUDDIN ROAD\nDHAKA', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801760000000', '', 'ZAHIDZAWAD06@GMAIL.COM', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 12:14:47 PM GMT+6', 'ABUL KALAM AZAD', 'Proprietor', 'MAYA PLASTIC', '58/1 PURBO ISLAMBAG\nPOSTA CHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801920000000', '8801690000000', '', 'Rokon'),
('2016/07/21 12:22:07 PM GMT+6', 'PRIME ACCESSORIES', 'Proprietor', 'PRIME ACCESSORIES', '98/2 NAJIMUDDIN ROAD\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027301755, NULL, '', '8801730000000', '8801670000000', 'm.ahamedmonju@yahoo.com', 'Rokon'),
('2016/07/21 1:04:47 PM GMT+6', 'PRIME ACCESSORIES', 'Proprietor', 'PRIME ACCESSORIES', '98/2 NAZIMUDDIN ROAD\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027301755, NULL, '', '8801730000000', '8801670000000', 'm.ahamedmonju@yahoo.com', 'Rokon'),
('2016/07/21 1:19:31 PM GMT+6', 'FAZLUL HAQUE', 'Proprietor', 'CHOWDHURY ENTERPRISE', '1/3,BEGUM BAZAR ROAD\nFENSI SUPER MARKET\nDHAKA 1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027312306, NULL, '', '8801710000000', '', '', 'Rokon'),
('2016/07/21 1:23:28 PM GMT+6', 'AFZAL HOSSAIN', 'Proprietor', 'MADINA COLOUR CORPORATION', '338 CHOK CIRCULAR ROAD\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027321321, NULL, '', '8801710000000', '8801970000000', '', 'Rokon'),
('2016/07/21 1:26:57 PM GMT+6', 'NURUL ISLAM', 'Proprietor', 'ISLAM PLASTIC INDUSTRIES', '194/1 MITFORD ROAD (JALIL MARKET)\nDHAKA 1000', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027312243, NULL, '', '8801710000000', '', '', 'Rokon'),
('2016/07/21 1:31:17 PM GMT+6', 'ABDUR RAHIM', 'Proprietor', 'BISMILLAH TRADING COMPANY', '64/1 KHAJA DEWAN 1ST LANE\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 880259000000, NULL, '88029660277', '8801980000000', '', 'rg_rahim1@yahoo.com', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 1:41:18 PM GMT+6', 'JOYNAL ABEDIN', 'Proprietor', 'M B CHEMICAL AND BOTTOL SUPPLIER', '202 MEDICINE MARKET\n203 MITFORD ROAD\nDHAKA 1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801930000000', '8801680000000', '', 'Rokon'),
('2016/07/21 1:44:53 PM GMT+6', 'RUHUL AMIN AZIM', 'Partner', 'BLUE POLYMER', '43 HAIDER BOX LANE\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027342336, NULL, '', '8801910000000', '', 'ruhulajim@yahoo.com', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 2:01:00 PM GMT+6', 'KHAYER UDDIN AHMED', 'Proprietor', 'ARIF BROTHERS', '16 MOKIM KATARA (NAGINA BHOBON)\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027317597, NULL, '', '8801720000000', '8801910000000', '', 'Rokon'),
('2016/07/21 2:06:10 PM GMT+6', 'FAZLUL HAQUE', 'Proprietor', 'SAMI PRINTING AND PACKAGING', '1/3 BEGUM BAZAR ROAD\nFENSI SUPER MARKET\nDHAKA 1000', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801910000000', '8801970000000', '', 'Rokon'),
('2016/07/21 2:26:02 PM GMT+6', 'SHAJAHAN', 'Assistant Manager', 'RANI PRINTING AND PACKAGING', '8 BEGUM BAZAR (2ND FLOOR)\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027343615, NULL, '88027343227', '8801720000000', '8801710000000', 'ranipp02@yahoo.com', 'Saiful'),
('2016/07/20 10:56:50 AM GMT+6', 'Iqbal Hossain', 'Proprietor', 'IQBAL ENTERPRISE', '29/A Sayed Awlad Hossain Lane, Islampur, Dhaka 1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027396090, NULL, '', '8801720000000', '8801620000000', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/20 11:20:43 AM GMT+6', 'Nurul Amin', 'Proprietor', 'MA-ENTERPRISE', '14/3/3 Jindabahar,2nd lane Nayabazar Dhaka-1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027395289, 88027390963, '', '', '', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/20 11:40:39 AM GMT+6', 'BASHIR AHMED', 'Proprietor', 'BASHIR DYES AND CHEMICALS', '33 Sayed Awlad Hossain Lane,Islampur,Dhaka-1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027392459, NULL, '', '8801820000000', '', '', 'Rokon'),
('2016/07/20 12:01:17 PM GMT+6', 'A.S.M Sayem', 'Proprietor', 'NAHAR COMMERCIAL AGENCY', '8 Hossaini Dalan Road,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801710000000', '8801970000000', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/20 12:19:32 PM GMT+6', 'N S PLASTIC', 'Proprietor', 'N S PLASTIC', '119 Nababpur Road,Dhaka-1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029582282, 88027123073, '', '8801720000000', '8801780000000', 'samiutd06@gmail.com', 'Rokon'),
('2016/07/20 12:26:59 PM GMT+6', 'SAIDUR RAHMAN', 'Proprietor', 'GRAMEEN BANGLA PLASTIC INDUSTRIES', '91/1 Poshchim Islambag,Lalbag,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801710000000', '8801550000000', '', 'Rokon'),
('2016/07/20 12:36:08 PM GMT+6', 'MUMTAZ ZAFER', 'Proprietor', 'SONY PLASTIC COMPLEX', '96/1 Jagannath Shaha Road,Lalbag,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029663608, 88028626581, '', '8801710000000', '8801910000000', 'Sonyplasticbd@yahoo.com', 'Rokon'),
('2016/07/20 12:43:40 PM GMT+6', 'M MAZHARUL ISLAM', 'Manager', 'TOTAL PACK PACKAGING', '929 Shahidbag,rajarbag,Dhaka-1217', 'Bangladesh', 'Wholeseller;Importer', 'Printing & Packaging', 88029338264, 88029358142, '', '', '', 'pack_packaging@yahoo.com', 'Rokon'),
('2016/07/20 1:03:05 PM GMT+6', 'Abdus Sattar', 'Proprietor', 'BISMILLAH TRADING CORPORATION', '67 Haji Osman Goni Road,Alu Bazar,Dhaka-1000', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027164589, NULL, '', '8801910000000', '8801720000000', '', 'Rokon'),
('2016/07/20 1:08:24 PM GMT+6', 'AKTAR HOSSAIN', 'Proprietor', 'RUBEL ENTERPRISE', '64 Water Works Road,Rahmatgonj,Chokbazar,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027321242, NULL, '', '8801720000000', '', '', 'Rokon'),
('2016/07/20 1:14:05 PM GMT+6', 'BADAL', 'Proprietor', 'AL AMIN STORE', '56/3-a Purbo Islambag,Lalbag,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '8801720000000', '', 'Rokon'),
('2016/07/20 1:20:46 PM GMT+6', 'SHEIKH MOHAMMAD SHAMSUDDIN', 'Proprietor', 'BAGDAD PLASTIC STORE', '54 K B Rudro Road,Chadni Ghat,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801710000000', '8801710000000', '', 'Rokon'),
('2016/07/20 1:28:05 PM GMT+6', 'NEW PLASTIC AND COLOUR CENTER', 'Proprietor', 'NEW PLASTIC AND COLOUR CENTER', '38 K B Rudro Road,Urdu Road (Chok Bazar) Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027317094, 88027316670, '', '8801910000000', '', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/20 1:39:50 PM GMT+6', 'S ALAM TALUKDER', 'Proprietor', 'FIVE STAR PLASTIC', '35/1 Urdu Road,Lalbag,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027341006, NULL, '', '8801710000000', '8801910000000', '', 'Rokon'),
('2016/07/20 1:45:05 PM GMT+6', 'MOSTAQUE AHMED', 'Proprietor', 'RUPALI TRADERS', '6 Chok Circuler Road,Payara Market,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027312120, NULL, '', '8801920000000', '', '', 'Rokon'),
('2016/07/20 1:51:38 PM GMT+6', 'AHAMMD HOSEN KHAN ', 'Proprietor', 'NABIL ENTERPRISE', '29/3-a Shoarighat,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027311783, NULL, '', '8801780000000', '', '', 'Rokon'),
('2016/07/20 1:56:38 PM GMT+6', 'GIAS UDDIN', 'Proprietor', 'GIAS UDDIN ENTERPRISE', '52 53 Nondo kumar Dotto road,Churi Hatta,Lalbag,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027321730, NULL, '', '8801720000000', '8801670000000', '', 'Rokon'),
('2016/07/20 2:01:40 PM GMT+6', 'KAMAL HOSSAIN', 'Proprietor', 'KAMAL PLASTIC CENTER', '25 Haider Box Lane,Churihatta,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '', '', 'Rokon'),
('2016/07/20 2:05:17 PM GMT+6', 'ALAUDDIN', 'Proprietor', 'R S PLASTIC', '663/13 Water Waz road,Chok Bazar,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801710000000', '', '', 'Rokon'),
('2016/07/20 2:11:55 PM GMT+6', 'RIAZ UDDIN', 'Proprietor', 'NEW ARAFAT PLASTIC PRODUCT', 'House 21,road 1,word 5 Rupnagar Battery Ghat,Kaamrangirchor,Lalbag,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027341375, NULL, '', '8801710000000', '8801970000000', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/20 3:03:05 PM GMT+6', 'ASHRAF BHUIYAN', 'Partner', 'ORIENT PLASTIC WORKS', '45/1 Lalbag road,Lalbag Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029353223, NULL, '', '8801710000000', '', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/20 3:15:48 PM GMT+6', 'IASIN BEPARI', 'Proprietor', 'MAAYER DOA PLASTIC CENTER', '38/33-c Islambag,Alir ghat,Lalbag,Dhaka', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '8801670000000', '', 'Rokon'),
('2016/07/20 3:24:03 PM GMT+6', 'ATIQUR RAHMAN', 'Executive', 'R R ENTERPRISE', '83 Shiddheshshori Circular Road,Manhattan Tower(6th Floor) Malibagh,Dhaka-1217', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88028314498, NULL, '', '8801920000000', '', 'rrenterprise777@gmail.com', 'Rokon'),
('2016/07/20 3:32:03 PM GMT+6', 'K M ANWARUL ISLAM', 'Proprietor', 'AZHAR POLYTHIN STORE', '21/2 Mokim Katara Elahi Box Market,Dhaka-1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027318294, 88027319465, '', '', '', '', 'Rokon'),
('2016/07/21 8:19:45 AM GMT+6', 'Mohammed Salauddin', 'CEO', 'CHEMQUEST LTD', 'Room 1103\nSultan Ahmed Plaza\n32 Purana Paltan\nDhaka 1000', 'Bangladesh', 'Wholeseller;Retailer;Importer', 'Stockiest', 88029889353, NULL, '', '8801940000000', '', 'salauddin@cq.com.bd', 'Babu'),
('2016/07/21 10:06:20 AM GMT+6', 'M H TUHIN', 'Proprietor', 'TUHIN PLASTIC CENTER', '56/04 East Islambag\nLalbag\nDhaka 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801740000000', '8801920000000', '', 'Rokon'),
('2016/07/21 10:12:57 AM GMT+6', 'YAKUB', 'Proprietor', 'TITAN PLASTIC INDUSTRIES', '10 Gurshundor Ray Lane\nLalbag\nDhaka 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027343712, NULL, '', '8801720000000', '', 'mdyakub.mdyakub@yahoo.com', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 10:32:15 AM GMT+6', 'AHSAN HABIB', 'Proprietor', 'KO KO PACKAGING', '2 Tatkhana Lane\nNazimuddin Road\nDhaka 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027301155, NULL, '', '8801710000000', '', 'kokopackaging27@gmail.com', 'Rokon'),
('2016/07/21 10:37:57 AM GMT+6', 'SHAMSUR RAHMAN', 'Proprietor', 'JIBON SHOE STORE', '79 Begum Bazar (Abul Hosen Market)\nChokbazar\nDhaka1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027315840, NULL, '', '8801670000000', '', 'jibon0707@gmail.com', 'Rokon'),
('2016/07/21 10:45:38 AM GMT+6', 'SHAH ALAM', 'Proprietor', 'SHAHED INTERNATIONAL', '67 nanda Kumar Datta Road\nChurihatta\nChokbazar\nDhaka 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027313352, NULL, '88027313279', '8801710000000', '', 'shahedintl@gmail.com', 'Rokon'),
('2016/07/21 10:53:46 AM GMT+6', 'HAFEZ ABUL KALAM', 'Proprietor', 'KALAM COLOUR HOUSE', '64 CHOK CIRCULAR ROAD\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027319063, NULL, '', '8801710000000', '8801910000000', 'kalamcolourhouse@gmail.com', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 11:03:51 AM GMT+6', 'SARWAR HOSSAIN', 'Proprietor', 'SHARP PLASTIC INDUSTRIES', '47/A LALBAG ROAD\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029667301, 88029667302, '', '', '', 'SHARP.PLASTIC2000@GMAIL.COM', 'Rokon'),
('2016/07/21 11:09:32 AM GMT+6', 'SAAID SHEIKH', 'Proprietor', 'BHAI BHAI PLASTIC INDUSTRIES LTD', '98/1 HOSENI DALAN\nNAJIMUDDIN ROAD\nDHAKA 1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801920000000', '8801950000000', '', 'Rokon'),
('2016/07/21 11:18:35 AM GMT+6', 'ASAD', 'Partner', 'GRAMEEN PACKAGING', '6/14 SHOARIGHAT MAIN ROAD\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801820000000', '8801710000000', 'GRAMEEN.PACKAGING@GMAIL.COM', 'Rokon'),
('2016/07/21 11:22:45 AM GMT+6', 'SHAHEB ALI AHMED', 'Proprietor', 'BISMILLAH PLASTIC', '17/4,SHAAT RAOJA (SHUKUR MIAR GOLI)\nDHAKA', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801670000000', '8801720000000', '', 'Rokon'),
('2016/07/21 11:30:01 AM GMT+6', 'FRESH DISPO CENTER', 'Proprietor', 'FRESH DISPO CENTER', '74 BEGUM BAZAR\nDHAKA', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027313613, 88027311180, '', '8801710000000', '8801710000000', '', 'Rokon'),
('2016/07/21 11:35:19 AM GMT+6', 'NOWAAB', 'Proprietor', 'NOWAAB ENTERPRISE', '55 K B  RUDRO ROAD\nCHADNI GHAT\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801920000000', '8801750000000', '', 'Rokon'),
('2016/07/21 11:42:05 AM GMT+6', 'IMRAN KHAN', 'Proprietor', 'KHAN ENTERPRISE', '50 NONDO KUMAR DOTTO ROAD\nCHADNIGHAT\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '8801670000000', '', 'Rokon'),
('2016/07/21 11:48:40 AM GMT+6', 'ALAUDDIN', 'Proprietor', 'JAMIR ENTERPRISE', '38/1 URDU ROAD\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027311526, NULL, '', '8801720000000', '', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 11:57:31 AM GMT+6', 'ATUL K BHOUMIK', 'Managing Director', 'B B M CORPORATION', '17 MOGBAZAR (4TH FLOOR)\nNEW ESKATON ROAD\nDHAKA 1000', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029350914, NULL, '88028357232', '8801710000000', '', 'AKB@DHAKA.NET', 'Rokon'),
('2016/07/21 12:02:52 PM GMT+6', 'SAIFUDDIN JAHANGIR', 'Proprietor', 'J S POLY AND PACKAGING', '16/2/A JOYNAG ROAD\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88029611715, NULL, '88029611715', '8801820000000', '8801670000000', '', 'Rokon'),
('2016/07/21 12:06:18 PM GMT+6', 'ABU ZAHID', 'Manager', 'CENTURY ACCESSORIES', '98/3 NAJIMUDDIN ROAD\nDHAKA', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801760000000', '', 'ZAHIDZAWAD06@GMAIL.COM', 'Rokon'),
('2016/07/21 12:11:05 PM GMT+6', 'RAHIMULLA AZAD', 'CEO', 'NAHAR PACKAGING INDUSTRY', '33 HOSNI DALAN\nBOKSHI BAZAR\nLALBAG\nDHAKA', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027300072, NULL, '', '8801930000000', '', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 12:22:07 PM GMT+6', 'PRIME ACCESSORIES', 'Proprietor', 'PRIME ACCESSORIES', '98/2 NAJIMUDDIN ROAD\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027301755, NULL, '', '8801730000000', '8801670000000', 'm.ahamedmonju@yahoo.com', 'Rokon'),
('2016/07/21 1:04:47 PM GMT+6', 'PRIME ACCESSORIES', 'Proprietor', 'PRIME ACCESSORIES', '98/2 NAZIMUDDIN ROAD\nLALBAG\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027301755, NULL, '', '8801730000000', '8801670000000', 'm.ahamedmonju@yahoo.com', 'Rokon'),
('2016/07/21 1:19:31 PM GMT+6', 'FAZLUL HAQUE', 'Proprietor', 'CHOWDHURY ENTERPRISE', '1/3,BEGUM BAZAR ROAD\nFENSI SUPER MARKET\nDHAKA 1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027312306, NULL, '', '8801710000000', '', '', 'Rokon'),
('2016/07/21 1:23:28 PM GMT+6', 'AFZAL HOSSAIN', 'Proprietor', 'MADINA COLOUR CORPORATION', '338 CHOK CIRCULAR ROAD\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027321321, NULL, '', '8801710000000', '8801970000000', '', 'Rokon'),
('2016/07/21 1:26:57 PM GMT+6', 'NURUL ISLAM', 'Proprietor', 'ISLAM PLASTIC INDUSTRIES', '194/1 MITFORD ROAD (JALIL MARKET)\nDHAKA 1000', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027312243, NULL, '', '8801710000000', '', '', 'Rokon'),
('2016/07/21 1:31:17 PM GMT+6', 'ABDUR RAHIM', 'Proprietor', 'BISMILLAH TRADING COMPANY', '64/1 KHAJA DEWAN 1ST LANE\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 880259000000, NULL, '88029660277', '8801980000000', '', 'rg_rahim1@yahoo.com', 'Rokon'),
('2016/07/21 1:34:24 PM GMT+6', 'JAMAL HOSSAIN', 'Proprietor', 'JONY ENTERPRISE', '22/1 HAIDER BOX LANE\nCHURIHATTA\nDHAKA', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801720000000', '8801710000000', '', 'Rokon'),
('2016/07/21 1:41:18 PM GMT+6', 'JOYNAL ABEDIN', 'Proprietor', 'M B CHEMICAL AND BOTTOL SUPPLIER', '202 MEDICINE MARKET\n203 MITFORD ROAD\nDHAKA 1100', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801930000000', '8801680000000', '', 'Rokon'),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', ''),
('2016/07/21 2:01:00 PM GMT+6', 'KHAYER UDDIN AHMED', 'Proprietor', 'ARIF BROTHERS', '16 MOKIM KATARA (NAGINA BHOBON)\nCHOKBAZAR\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027317597, NULL, '', '8801720000000', '8801910000000', '', 'Rokon'),
('2016/07/21 2:06:10 PM GMT+6', 'FAZLUL HAQUE', 'Proprietor', 'SAMI PRINTING AND PACKAGING', '1/3 BEGUM BAZAR ROAD\nFENSI SUPER MARKET\nDHAKA 1000', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', NULL, NULL, '', '8801910000000', '8801970000000', '', 'Rokon'),
('2016/07/21 2:26:02 PM GMT+6', 'SHAJAHAN', 'Assistant Manager', 'RANI PRINTING AND PACKAGING', '8 BEGUM BAZAR (2ND FLOOR)\nDHAKA 1211', 'Bangladesh', 'Wholeseller;Importer', 'Stockiest', 88027343615, NULL, '88027343227', '8801720000000', '8801710000000', 'ranipp02@yahoo.com', 'Saiful');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `supplier_id` int(10) NOT NULL DEFAULT '0',
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `comments` tinytext,
  `ord_date` date NOT NULL DEFAULT '0000-00-00',
  `ship_via` int(11) NOT NULL DEFAULT '0',
  `delivery_address` tinytext NOT NULL,
  `contact_phone` varchar(30) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `deliver_to` tinytext NOT NULL,
  `freight_cost` double NOT NULL DEFAULT '0',
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `payment_terms` int(11) DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `commission_total` double NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `commission_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `order_no`, `supplier_id`, `customer_id`, `comments`, `ord_date`, `ship_via`, `delivery_address`, `contact_phone`, `contact_email`, `deliver_to`, `freight_cost`, `delivery_date`, `payment_terms`, `total`, `commission_total`, `order_status`, `commission_status`) VALUES
(1, '00000001', 2, 2, NULL, '2016-07-11', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 545, 0, 1, 1),
(2, '00000002', 2, 5, NULL, '2016-08-02', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 0, 0, 1, 1),
(3, '00000003', 2, 5, NULL, '2016-08-02', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 0, 0, 1, 1),
(4, '00000004', 2, 5, NULL, '2016-08-02', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 0, 0, 1, 1),
(5, '00000005', 2, 5, NULL, '2016-08-02', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 0, 0, 1, 1),
(6, '00000006', 2, 5, NULL, '2016-08-02', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 0, 0, 1, 1),
(7, '00000007', 2, 5, NULL, '2016-08-02', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 0, 0, 1, 1),
(8, '00000008', 2, 5, NULL, '2016-08-02', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 237500, 0, 1, 1),
(9, '00000009', 2, 5, NULL, '2016-08-02', 0, '', NULL, NULL, '', 0, '0000-00-00', 3, 212500, 2225, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_details`
--

CREATE TABLE `sales_order_details` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL DEFAULT '0',
  `item_code` varchar(20) NOT NULL DEFAULT '',
  `description` tinytext,
  `unit_price` double NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `comission_type` tinyint(4) NOT NULL,
  `commission_amount` double NOT NULL DEFAULT '0',
  `item_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_details`
--

INSERT INTO `sales_order_details` (`id`, `order_no`, `item_code`, `description`, `unit_price`, `quantity`, `comission_type`, `commission_amount`, `item_total`) VALUES
(1, '1', '00000002', '00000002', 5000, 10, 0, 2, 50000),
(2, '1', '00000001', '00000001', 1100, 45, 0, 4, 49500),
(3, '2', '00000002', '00000002', 5000, 15, 1, 1500, 75000),
(4, '2', 'dfasf66', 'dfasf66', 2500, 65, 2, 325, 162500),
(5, '00000003', '00000002', '00000002', 5000, 15, 1, 1500, 75000),
(6, '00000003', 'dfasf66', 'dfasf66', 2500, 65, 2, 325, 162500),
(7, '00000004', '00000002', '00000002', 5000, 15, 1, 1500, 75000),
(8, '00000004', 'dfasf66', 'dfasf66', 2500, 65, 2, 325, 162500),
(9, '00000005', '00000002', '00000002', 5000, 15, 1, 1500, 75000),
(10, '00000005', 'dfasf66', 'dfasf66', 2500, 65, 2, 325, 162500),
(11, '00000006', '00000002', '00000002', 5000, 15, 1, 1500, 75000),
(12, '00000006', 'dfasf66', 'dfasf66', 2500, 65, 2, 325, 162500),
(13, '00000007', '00000002', '00000002', 5000, 15, 1, 1500, 75000),
(14, '00000007', 'dfasf66', 'dfasf66', 2500, 65, 2, 325, 162500),
(15, '00000008', '00000002', '00000002', 5000, 15, 1, 1500, 75000),
(16, '00000008', 'dfasf66', 'dfasf66', 2500, 65, 2, 325, 162500),
(17, '00000009', '00000002', '00000002', 5000, 20, 1, 2000, 100000),
(18, '00000009', 'dfasf66', 'dfasf66', 2500, 45, 2, 225, 112500);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('189a0e75b55c0fb1f486e9e3a0df2004', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', 1467454830, 'a:8:{s:9:"user_data";s:0:"";s:9:"site_data";O:8:"stdClass":25:{s:2:"id";s:1:"1";s:10:"site_title";s:48:"Welcome To Digi Online Examination System (DOES)";s:16:"site_description";s:37:"Digi Online Examination System (DOES)";s:13:"site_keywords";s:63:"Digi, Online Examination System, Online Examination, DOES, Exam";s:8:"site_url";s:50:"http://envato.digitalvidhya.com/codecanyon/doesv3/";s:10:"copy_right";s:14:"2012-2014 DOES";s:9:"site_logo";s:8:"logo.jpg";s:7:"address";s:9:"Hyderabad";s:5:"phone";s:10:"9490472748";s:13:"passing_score";s:2:"60";s:25:"is_performance_report_for";s:9:"Paidusers";s:11:"quizzes_for";s:12:"groupquizzes";s:13:"contact_email";s:24:"digionlineexam@gmail.com";s:12:"paypal_email";s:14:"digi@gmail.com";s:12:"facebook_url";s:35:"https://www.facebook.com/samplename";s:16:"twitter_username";s:11:"sample name";s:12:"linkedin_url";s:11:"sample name";s:15:"feedburner_link";s:11:"Testing.com";s:16:"google_analytics";s:19:"<script>\n\n</script>";s:16:"certificate_logo";s:16:"certificates.jpg";s:19:"certificate_content";s:329:"<p>This is to certify that <b>__USERNAME__</b>, with Userid: <b>__USERID__</b>, Email: <b>__EMAIL__</b> succesfully completed the <b>__COURSENAME__ </b>with <b>__SCORE__/__MAXSCORE__ </b>in the course program from our online academy.&nbsp;</p>\n\n<p><b>Note: </b>This is computer generated copy.</p>\n\n<p>&nbsp;</p>\n\n<h1>&nbsp;</h1>";s:16:"certificate_sign";s:8:"sign.jpg";s:21:"certificate_sign_text";s:59:"<p><b>ADMIN</b></p>\n\n<h3><i>Director of DIGI Exams</i></h3>";s:10:"added_date";s:10:"2014-05-22";s:12:"updated_date";s:10:"2014-11-14";}s:8:"identity";s:15:"admin@gmail.com";s:8:"username";s:12:"abdul mannan";s:5:"email";s:15:"admin@gmail.com";s:5:"image";s:13:"mannan_77.jpg";s:7:"user_id";s:2:"77";s:14:"old_last_login";s:10:"1466696442";}');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'T.M International'),
(7, 'system_email', 'mannandiu@gmail.com'),
(2, 'system_title', 'TMI'),
(3, 'address', ''),
(4, 'phone', ''),
(5, 'paypal_email', ''),
(6, 'currency', '');

-- --------------------------------------------------------

--
-- Table structure for table `setup_company`
--

CREATE TABLE `setup_company` (
  `com_id` int(10) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_address` text NOT NULL,
  `com_country` varchar(50) NOT NULL,
  `com_phone1` varchar(20) NOT NULL,
  `com_phone2` int(11) NOT NULL,
  `com_fax` varchar(20) NOT NULL,
  `com_type` varchar(50) NOT NULL,
  `com_industry` varchar(50) NOT NULL,
  `com_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_company`
--

INSERT INTO `setup_company` (`com_id`, `com_name`, `com_address`, `com_country`, `com_phone1`, `com_phone2`, `com_fax`, `com_type`, `com_industry`, `com_logo`) VALUES
(1, 'IQBAL ENTERPRISE', '29/A Sayed Awlad Hossain Lane, Islampur, Dhaka 1100', '18', '88027396090', 0, '', '3', '1', ''),
(2, 'SUNNY CHEMICAL INDUSTRIES (Pvt) Ltd', '19,kunipara tejgaon,industrial area dhaka 1208', '18', '29898425', 29898468, '', '3', '1', ''),
(3, 'MA-ENTERPRISE', '14/3/3 Jindabahar,2nd lane Nayabazar Dhaka-1100', '18', '88027395289', 2147483647, '', '3', '1', ''),
(4, 'NEW SHILPI CHEMICALS STORE', '6 Purana Moghaltuly (Nobabpur Road),Dhaka-1100', '18', '', 0, '', '3', '1', ''),
(5, 'BASHIR DYES AND CHEMICALS', '33 Sayed Awlad Hossain Lane,Islampur,Dhaka-1100', '18', '88027392459', 0, '', '3', '1', ''),
(6, 'NAHAR COMMERCIAL AGENCY', '8 Hossaini Dalan Road,Dhaka-1211', '18', '', 0, '', '3', '1', ''),
(7, 'D ENTERPRISE', '63 Nandakumar Dotto Road,Churihatta,Chokbazar,dhaka-1211', '18', '', 0, '', '3', '1', ''),
(8, 'N S PLASTIC', '119 Nababpur Road,Dhaka-1100', '18', '88029582282', 2147483647, '', '3', '1', ''),
(9, 'GRAMEEN BANGLA PLASTIC INDUSTRIES', '91/1 Poshchim Islambag,Lalbag,Dhaka', '18', '', 0, '', '3', '1', ''),
(10, 'SONY PLASTIC COMPLEX', '96/1 Jagannath Shaha Road,Lalbag,Dhaka-1211', '18', '88029663608', 2147483647, '', '3', '1', ''),
(11, 'TOTAL PACK PACKAGING', '929 Shahidbag,rajarbag,Dhaka-1217', '18', '88029338264', 2147483647, '', '3', '1', ''),
(12, 'BISMILLAH TRADING CORPORATION', '67 Haji Osman Goni Road,Alu Bazar,Dhaka-1000', '18', '88027164589', 0, '', '3', '1', ''),
(13, 'RUBEL ENTERPRISE', '64 Water Works Road,Rahmatgonj,Chokbazar,Dhaka-1211', '18', '88027321242', 0, '', '3', '1', ''),
(14, 'AL AMIN STORE', '56/3-a Purbo Islambag,Lalbag,Dhaka', '18', '', 0, '', '3', '1', ''),
(15, 'BAGDAD PLASTIC STORE', '54 K B Rudro Road,Chadni Ghat,Dhaka-1211', '18', '', 0, '', '3', '1', ''),
(16, 'NEW PLASTIC AND COLOUR CENTER', '38 K B Rudro Road,Urdu Road (Chok Bazar) Dhaka-1211', '18', '88027317094', 2147483647, '', '3', '1', ''),
(17, 'THAI SANDAL INDUSTRIES', '79 Begum Bazar,(4th Floor),Abul Hossain Market,Dhaka', '18', '88027315100', 2147483647, '', '3', '1', ''),
(18, 'FIVE STAR PLASTIC', '35/1 Urdu Road,Lalbag,Dhaka-1211', '18', '88027341006', 0, '', '3', '1', ''),
(19, 'RUPALI TRADERS', '6 Chok Circuler Road,Payara Market,Dhaka-1211', '18', '88027312120', 0, '', '3', '1', ''),
(20, 'NABIL ENTERPRISE', '29/3-a Shoarighat,Dhaka-1211', '18', '88027311783', 0, '', '3', '1', ''),
(21, 'GIAS UDDIN ENTERPRISE', '52 53 Nondo kumar Dotto road,Churi Hatta,Lalbag,Dhaka-1211', '18', '88027321730', 0, '', '3', '1', ''),
(22, 'KAMAL PLASTIC CENTER', '25 Haider Box Lane,Churihatta,Dhaka-1211', '18', '', 0, '', '3', '1', ''),
(23, 'R S PLASTIC', '663/13 Water Waz road,Chok Bazar,Dhaka', '18', '', 0, '', '3', '1', ''),
(24, 'NEW ARAFAT PLASTIC PRODUCT', 'House 21,road 1,word 5 Rupnagar Battery Ghat,Kaamrangirchor,Lalbag,Dhaka', '18', '88027341375', 0, '', '3', '1', ''),
(25, 'SHUMI SHOE STORE', '2 Showari Ghat Road,Chokbazar', '18', '88027314656', 0, '', '3', '1', ''),
(26, 'ORIENT PLASTIC WORKS', '45/1 Lalbag road,Lalbag Dhaka-1211', '18', '88029353223', 0, '', '3', '1', ''),
(27, 'N AHMED MANUFACTURING CO', '130 Hozor Para,1no goli,Kamrangirchor,Dhaka', '18', '88027343306', 0, '', '3', '1', ''),
(28, 'MAAYER DOA PLASTIC CENTER', '38/33-c Islambag,Alir ghat,Lalbag,Dhaka', '18', '', 0, '', '3', '1', ''),
(29, 'R R ENTERPRISE', '83 Shiddheshshori Circular Road,Manhattan Tower(6th Floor) Malibagh,Dhaka-1217', '18', '88028314498', 0, '', '3', '1', ''),
(30, 'AZHAR POLYTHIN STORE', '21/2 Mokim Katara Elahi Box Market,Dhaka-1211', '18', '88027318294', 2147483647, '', '3', '1', ''),
(31, 'CHEMQUEST LTD', 'Room 1103\nSultan Ahmed Plaza\n32 Purana Paltan\nDhaka 1000', '18', '88029889353', 0, '', '3', '1', ''),
(32, 'TUHIN PLASTIC CENTER', '56/04 East Islambag\nLalbag\nDhaka 1211', '18', '', 0, '', '3', '1', ''),
(33, 'TITAN PLASTIC INDUSTRIES', '10 Gurshundor Ray Lane\nLalbag\nDhaka 1211', '18', '88027343712', 0, '', '3', '1', ''),
(34, 'BORKOT PLASTIC CENTER', '7 Boro Katra (Johura Market)\nChokbazar\nDhaka 1211', '18', '', 0, '', '3', '1', ''),
(35, 'KO KO PACKAGING', '2 Tatkhana Lane\nNazimuddin Road\nDhaka 1211', '18', '88027301155', 0, '', '3', '1', ''),
(36, 'JIBON SHOE STORE', '79 Begum Bazar (Abul Hosen Market)\nChokbazar\nDhaka1211', '18', '88027315840', 0, '', '3', '1', ''),
(37, 'SHAHED INTERNATIONAL', '67 nanda Kumar Datta Road\nChurihatta\nChokbazar\nDhaka 1211', '18', '88027313352', 0, '88027313279', '3', '1', ''),
(38, 'KALAM COLOUR HOUSE', '64 CHOK CIRCULAR ROAD\nDHAKA 1211', '18', '88027319063', 0, '', '3', '1', ''),
(39, 'THEDHAKA CHEMICALS', '16/7 BOROKATRA\nDHAKA 1211', '18', '88027310991', 0, '', '3', '1', ''),
(40, 'SHARP PLASTIC INDUSTRIES', '47/A LALBAG ROAD\nDHAKA 1211', '18', '88029667301', 2147483647, '', '3', '1', ''),
(41, 'BHAI BHAI PLASTIC INDUSTRIES LTD', '98/1 HOSENI DALAN\nNAJIMUDDIN ROAD\nDHAKA 1100', '18', '', 0, '', '3', '1', ''),
(42, 'GRAMEEN PACKAGING', '6/14 SHOARIGHAT MAIN ROAD\nCHOKBAZAR\nDHAKA 1211', '18', '', 0, '', '3', '1', ''),
(43, 'BISMILLAH PLASTIC', '17/4,SHAAT RAOJA (SHUKUR MIAR GOLI)\nDHAKA', '18', '', 0, '', '3', '1', ''),
(44, 'FRESH DISPO CENTER', '74 BEGUM BAZAR\nDHAKA', '18', '88027313613', 2147483647, '', '3', '1', ''),
(45, 'NOWAAB ENTERPRISE', '55 K B  RUDRO ROAD\nCHADNI GHAT\nLALBAG\nDHAKA 1211', '18', '', 0, '', '3', '1', ''),
(46, 'KHAN ENTERPRISE', '50 NONDO KUMAR DOTTO ROAD\nCHADNIGHAT\nCHOKBAZAR\nDHAKA 1211', '18', '', 0, '', '3', '1', ''),
(47, 'JAMIR ENTERPRISE', '38/1 URDU ROAD\nLALBAG\nDHAKA 1211', '18', '88027311526', 0, '', '3', '1', ''),
(48, 'NEAZ TRADING', '7/1,CHOK CIRCULER ROAD\nDHAKA 1211', '18', '88027318367', 0, '', '3', '1', ''),
(49, 'B B M CORPORATION', '17 MOGBAZAR (4TH FLOOR)\nNEW ESKATON ROAD\nDHAKA 1000', '18', '88029350914', 0, '88028357232', '3', '1', ''),
(50, 'J S POLY AND PACKAGING', '16/2/A JOYNAG ROAD\nLALBAG\nDHAKA 1211', '18', '88029611715', 0, '88029611715', '3', '1', ''),
(51, 'CENTURY ACCESSORIES', '98/3 NAJIMUDDIN ROAD\nDHAKA', '18', '', 0, '', '3', '1', ''),
(52, 'NAHAR PACKAGING INDUSTRY', '33 HOSNI DALAN\nBOKSHI BAZAR\nLALBAG\nDHAKA', '18', '88027300072', 0, '', '3', '1', ''),
(53, 'MAYA PLASTIC', '58/1 PURBO ISLAMBAG\nPOSTA CHOKBAZAR\nDHAKA 1211', '18', '', 0, '', '3', '1', ''),
(54, 'PRIME ACCESSORIES', '98/2 NAJIMUDDIN ROAD\nLALBAG\nDHAKA 1211', '18', '88027301755', 0, '', '3', '1', ''),
(55, 'PRIME ACCESSORIES', '98/2 NAZIMUDDIN ROAD\nLALBAG\nDHAKA 1211', '18', '88027301755', 0, '', '3', '1', ''),
(56, 'CHOWDHURY ENTERPRISE', '1/3,BEGUM BAZAR ROAD\nFENSI SUPER MARKET\nDHAKA 1100', '18', '88027312306', 0, '', '3', '1', ''),
(57, 'MADINA COLOUR CORPORATION', '338 CHOK CIRCULAR ROAD\nDHAKA 1211', '18', '88027321321', 0, '', '3', '1', ''),
(58, 'ISLAM PLASTIC INDUSTRIES', '194/1 MITFORD ROAD (JALIL MARKET)\nDHAKA 1000', '18', '88027312243', 0, '', '3', '1', ''),
(59, 'BISMILLAH TRADING COMPANY', '64/1 KHAJA DEWAN 1ST LANE\nCHOKBAZAR\nDHAKA 1211', '18', '8.80259E+11', 0, '88029660277', '3', '1', ''),
(60, 'JONY ENTERPRISE', '22/1 HAIDER BOX LANE\nCHURIHATTA\nDHAKA', '18', '', 0, '', '3', '1', ''),
(61, 'M B CHEMICAL AND BOTTOL SUPPLIER', '202 MEDICINE MARKET\n203 MITFORD ROAD\nDHAKA 1100', '18', '', 0, '', '3', '1', ''),
(62, 'BLUE POLYMER', '43 HAIDER BOX LANE\nCHOKBAZAR\nDHAKA 1211', '18', '88027342336', 0, '', '3', '1', ''),
(63, 'ESHA PLASTIC PRODUCTS', '10 NALGOLA\nMITFORD ROAD\nDHAKA 1100', '18', '88027342997', 0, '', '3', '1', ''),
(64, 'ARIF BROTHERS', '16 MOKIM KATARA (NAGINA BHOBON)\nCHOKBAZAR\nDHAKA 1211', '18', '88027317597', 0, '', '3', '1', ''),
(65, 'IQBAL ENTERPRISE', '29/A Sayed Awlad Hossain Lane, Islampur, Dhaka 1100', '', '88027396090', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `id` int(10) NOT NULL,
  `job_no` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `orgid` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `assignedto` varchar(50) NOT NULL,
  `assignedby` varchar(50) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `entry_date` varchar(50) NOT NULL,
  `entry_by` varchar(50) NOT NULL,
  `update_date` varchar(50) NOT NULL,
  `update_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`id`, `job_no`, `title`, `description`, `orgid`, `start_date`, `due_date`, `assignedto`, `assignedby`, `priority`, `status`, `entry_date`, `entry_by`, `update_date`, `update_by`) VALUES
(1, 'J0000001', 'Iqbal enter prise project', 'Use this job to record your internal and non-billable time for activities such as annual leave sick leave professional development staff meetings etc', 2, '2016-08-01', '2016-08-16', 'naveed', 'mannan', 1, 2, '1471368245', 'mannan', '', ''),
(2, 'J0000001', ' Internal Time', ' \r\nUse this job to record your internal and non-billable time for activities such as annual leave sick leave professional development staff meetings etc', 2, '2016-08-06', '2016-08-18', 'zahid', 'mannan', 2, 1, '1471368356', 'mannan', '', ''),
(3, 'J0000002', 'Set meeting with sunny enterprise', 'Set meeting with sunny enterprise', 2, '2016-08-31', '2016-08-23', 'naveed', 'mannan', 1, 1, '1471369050', 'mannan', '', ''),
(4, 'J0000003', 'test', 'test', 3, '2016-08-04', '2016-09-08', 'naveed', 'mannan', 2, 3, '1471374787', 'mannan', '1471445292', 'mannan'),
(5, 'J0000004', 'test23', 'test23', 4, '2016-08-03', '2016-08-17', 'naveed', 'mannan', 1, 3, '1471446675', 'mannan', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transport_mode`
--

CREATE TABLE `transport_mode` (
  `id` int(10) NOT NULL,
  `transport_mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_mode`
--

INSERT INTO `transport_mode` (`id`, `transport_mode`) VALUES
(1, 'Bike'),
(2, 'Bus'),
(3, 'Train'),
(4, 'Ferry'),
(5, 'Rickshaw');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `real_name` varchar(200) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `access_level` int(10) NOT NULL,
  `reporting_manager` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `assigned_company` int(10) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `real_name`, `designation`, `department`, `access_level`, `reporting_manager`, `email`, `mobile`, `telephone`, `assigned_company`, `last_login`, `status`) VALUES
(1, 'mannan', '81dc9bdb52d04dc20036dbd8313ed055', 'Abdul Mannan', 'Software Engineer', 'IT', 1, '0', 'admin@gmail.com', '01814724520', '', 1, '2016-08-04 14:29:03', 1),
(2, 'ishrat', '25d55ad283aa400af464c76d713c07ad', 'Ishrat Jahan', 'SEO', 'HR', 3, '0', 'ishrat@gmail.com', '+880177878788', '', 1, '2016-08-04 14:59:23', 1),
(3, 'bashar', '25d55ad283aa400af464c76d713c07ad', 'Abul Bashar', 'Executive', 'Marketing', 2, '0', 'bashar@times.com.bd', '01911388444', '', 1, '2016-08-04 16:00:01', 1),
(4, 'naveed', 'f8e575daaeb8df9c8e227af3d3e538d3', 'Naveed Alam', 'Executive', 'Marketing', 4, '0', 'Ss@ss.com', '', '', 3, '2016-07-24 00:45:56', 1),
(5, 'zahid', '25d55ad283aa400af464c76d713c07ad', 'zahidul Islam', 'Marketing Executive', 'Sales and Marketing', 4, 'ishrat', 'zahid@gmail.com', '+8801815264582', '', 3, '2016-08-04 16:15:43', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_name` (`city_name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `data_migrate`
--
ALTER TABLE `data_migrate`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `expense_bill_details`
--
ALTER TABLE `expense_bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_bill_master`
--
ALTER TABLE `expense_bill_master`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `freight`
--
ALTER TABLE `freight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoterm`
--
ALTER TABLE `incoterm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD UNIQUE KEY `menu_name` (`menu_name`);

--
-- Indexes for table `menu_access`
--
ALTER TABLE `menu_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `port_name` (`port_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product_sku`
--
ALTER TABLE `product_sku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quotation_no` (`quotation_no`);

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sorder` (`order_no`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `setup_company`
--
ALTER TABLE `setup_company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_mode`
--
ALTER TABLE `transport_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `data_migrate`
--
ALTER TABLE `data_migrate`
  MODIFY `data_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `expense_bill_details`
--
ALTER TABLE `expense_bill_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `expense_bill_master`
--
ALTER TABLE `expense_bill_master`
  MODIFY `exp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `freight`
--
ALTER TABLE `freight`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `incoterm`
--
ALTER TABLE `incoterm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `his_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `menu_access`
--
ALTER TABLE `menu_access`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `terms_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_sku`
--
ALTER TABLE `product_sku`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `setup_company`
--
ALTER TABLE `setup_company`
  MODIFY `com_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transport_mode`
--
ALTER TABLE `transport_mode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
