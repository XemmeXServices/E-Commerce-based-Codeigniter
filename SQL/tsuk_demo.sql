
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `categories` (
  `category_key` varchar(255) NOT NULL,
  `category_parentkey` varchar(255) NOT NULL default '_top',
  `category_title` varchar(255) NOT NULL,
  `category_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`category_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`category_key`, `category_parentkey`, `category_title`, `category_order`) VALUES
('category', '_top', 'Category', 0),
('subcategory', 'category', 'Subcategory', 0);

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `countries` (
  `country_code` char(3) NOT NULL,
  `country_2ltr` char(2) NOT NULL,
  `country_3ltr` char(3) NOT NULL,
  `country_title` varchar(255) NOT NULL,
  PRIMARY KEY  (`country_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `countries` (`country_code`, `country_2ltr`, `country_3ltr`, `country_title`) VALUES
('004', 'AF', 'AFG', 'Afghanistan'),
('248', 'AX', 'ALA', 'Aland Islands'),
('008', 'AL', 'ALB', 'Albania'),
('012', 'DZ', 'DZA', 'Algeria'),
('016', 'AS', 'ASM', 'American Samoa'),
('020', 'AD', 'AND', 'Andorra'),
('024', 'AO', 'AGO', 'Angola'),
('660', 'AI', 'AIA', 'Anguilla'),
('010', 'AQ', 'ATA', 'Antarctica'),
('028', 'AG', 'ATG', 'Antigua and Barbuda'),
('032', 'AR', 'ARG', 'Argentina'),
('051', 'AM', 'ARM', 'Armenia'),
('533', 'AW', 'ABW', 'Aruba'),
('036', 'AU', 'AUS', 'Australia'),
('040', 'AT', 'AUT', 'Austria'),
('031', 'AZ', 'AZE', 'Azerbaijan'),
('044', 'BS', 'BHS', 'Bahamas'),
('048', 'BH', 'BHR', 'Bahrain'),
('050', 'BD', 'BGD', 'Bangladesh'),
('052', 'BB', 'BRB', 'Barbados'),
('112', 'BY', 'BLR', 'Belarus'),
('056', 'BE', 'BEL', 'Belgium'),
('084', 'BZ', 'BLZ', 'Belize'),
('204', 'BJ', 'BEN', 'Benin'),
('060', 'BM', 'BMU', 'Bermuda'),
('064', 'BT', 'BTN', 'Bhutan'),
('068', 'BO', 'BOL', 'Bolivia'),
('070', 'BA', 'BIH', 'Bosnia and Herzegowina'),
('072', 'BW', 'BWA', 'Botswana'),
('074', 'BV', 'BVT', 'Bouvet Island'),
('076', 'BR', 'BRA', 'Brazil'),
('086', 'IO', 'IOT', 'British Indian Ocean'),
('096', 'BN', 'BRN', 'Brunei Darussalam'),
('100', 'BG', 'BGR', 'Bulgaria'),
('854', 'BF', 'BFA', 'Burkina Faso'),
('108', 'BI', 'BDI', 'Burundi'),
('116', 'KH', 'KHM', 'Cambodia'),
('120', 'CM', 'CMR', 'Cameroon'),
('124', 'CA', 'CAN', 'Canada'),
('132', 'CV', 'CPV', 'Cape Verde'),
('136', 'KY', 'CYM', 'Cayman Islands'),
('140', 'CF', 'CAF', 'Central Africa'),
('148', 'TD', 'TCD', 'Chad'),
('152', 'CL', 'CHL', 'Chile'),
('156', 'CN', 'CHN', 'China'),
('162', 'CX', 'CXR', 'Christmas Island'),
('166', 'CC', 'CCK', 'Cocos Islands'),
('170', 'CO', 'COL', 'Colombia'),
('174', 'KM', 'COM', 'Comoros'),
('178', 'CG', 'COG', 'Congo'),
('180', 'CD', 'COD', 'Congo Democratic'),
('184', 'CK', 'COK', 'Cook Islands'),
('188', 'CR', 'CRI', 'Costa Rica'),
('384', 'CI', 'CIV', 'Cote d''Ivoire'),
('191', 'HR', 'HRV', 'Croatia'),
('192', 'CU', 'CUB', 'Cuba'),
('196', 'CY', 'CYP', 'Cyprus'),
('203', 'CZ', 'CZE', 'Czech Republic'),
('208', 'DK', 'DNK', 'Denmark'),
('262', 'DJ', 'DJI', 'Djibouti'),
('212', 'DM', 'DMA', 'Dominica'),
('214', 'DO', 'DOM', 'Dominican Republic'),
('218', 'EC', 'ECU', 'Ecuador'),
('818', 'EG', 'EGY', 'Egypt'),
('222', 'SV', 'SLV', 'El Salvador'),
('226', 'GQ', 'GNQ', 'Equatorial Guinea'),
('232', 'ER', 'ERI', 'Eritrea'),
('233', 'EE', 'EST', 'Estonia'),
('231', 'ET', 'ETH', 'Ethiopia'),
('238', 'FK', 'FLK', 'Falkland Islands'),
('234', 'FO', 'FRO', 'Faroe Islands'),
('242', 'FJ', 'FJI', 'Fiji'),
('246', 'FI', 'FIN', 'Finland'),
('249', 'FX', 'FXX', 'France Metropolitan'),
('250', 'FR', 'FRA', 'France'),
('254', 'GF', 'GUF', 'French Guiana'),
('258', 'PF', 'PYF', 'French Polynesia'),
('260', 'TF', 'ATF', 'French Southern'),
('266', 'GA', 'GAB', 'Gabon'),
('270', 'GM', 'GMB', 'Gambia'),
('268', 'GE', 'GEO', 'Georgia'),
('276', 'DE', 'DEU', 'Germany'),
('288', 'GH', 'GHA', 'Ghana'),
('292', 'GI', 'GIB', 'Gibraltar'),
('300', 'GR', 'GRC', 'Greece'),
('304', 'GL', 'GRL', 'Greenland'),
('308', 'GD', 'GRD', 'Grenada'),
('312', 'GP', 'GLP', 'Guadeloupe'),
('316', 'GU', 'GUM', 'Guam'),
('320', 'GT', 'GTM', 'Guatemala'),
('831', 'GG', 'GGY', 'Guernsey'),
('324', 'GN', 'GIN', 'Guinea'),
('624', 'GW', 'GNB', 'Guinea-Bissau'),
('328', 'GY', 'GUY', 'Guyana'),
('332', 'HT', 'HTI', 'Haiti'),
('334', 'HM', 'HMD', 'Heard and McDonald Islands'),
('340', 'HN', 'HND', 'Honduras'),
('344', 'HK', 'HKG', 'Hong Kong'),
('348', 'HU', 'HUN', 'Hungary'),
('352', 'IS', 'ISL', 'Iceland'),
('356', 'IN', 'IND', 'India'),
('360', 'ID', 'IDN', 'Indonesia'),
('364', 'IR', 'IRN', 'Iran'),
('368', 'IQ', 'IRQ', 'Iraq'),
('372', 'IE', 'IRL', 'Ireland'),
('833', 'IM', 'IMN', 'Isle of Man'),
('376', 'IL', 'ISR', 'Israel'),
('380', 'IT', 'ITA', 'Italy'),
('388', 'JM', 'JAM', 'Jamaica'),
('392', 'JP', 'JPN', 'Japan'),
('832', 'JE', 'JEY', 'Jersey'),
('400', 'JO', 'JOR', 'Jordan'),
('398', 'KZ', 'KAZ', 'Kazakhstan'),
('404', 'KE', 'KEN', 'Kenya'),
('296', 'KI', 'KIR', 'Kiribati'),
('408', 'KP', 'PRK', 'North Korea'),
('410', 'KR', 'KOR', 'South Korea'),
('414', 'KW', 'KWT', 'Kuwait'),
('417', 'KG', 'KGZ', 'Kyrgyzstan'),
('418', 'LA', 'LAO', 'Laos'),
('428', 'LV', 'LVA', 'Latvia'),
('422', 'LB', 'LBN', 'Lebanon'),
('426', 'LS', 'LSO', 'Lesotho'),
('430', 'LR', 'LBR', 'Liberia'),
('434', 'LY', 'LBY', 'Libya'),
('438', 'LI', 'LIE', 'Liechtenstein'),
('440', 'LT', 'LTU', 'Lithuania'),
('442', 'LU', 'LUX', 'Luxembourg'),
('446', 'MO', 'MAC', 'Macau'),
('807', 'MK', 'MKD', 'Macedonia'),
('450', 'MG', 'MDG', 'Madagascar'),
('454', 'MW', 'MWI', 'Malawi'),
('458', 'MY', 'MYS', 'Malaysia'),
('462', 'MV', 'MDV', 'Maldives'),
('466', 'ML', 'MLI', 'Mali'),
('470', 'MT', 'MLT', 'Malta'),
('584', 'MH', 'MHL', 'Marshall Islands'),
('474', 'MQ', 'MTQ', 'Martinique'),
('478', 'MR', 'MRT', 'Mauritania'),
('480', 'MU', 'MUS', 'Mauritius'),
('175', 'YT', 'MYT', 'Mayotte'),
('484', 'MX', 'MEX', 'Mexico'),
('583', 'FM', 'FSM', 'Micronesia'),
('498', 'MD', 'MDA', 'Moldova'),
('492', 'MC', 'MCO', 'Monaco'),
('496', 'MN', 'MNG', 'Mongolia'),
('499', 'ME', 'MNE', 'Montenegro'),
('500', 'MS', 'MSR', 'Montserrat'),
('504', 'MA', 'MAR', 'Morocco'),
('508', 'MZ', 'MOZ', 'Mozambique'),
('104', 'MM', 'MMR', 'Myanmar'),
('516', 'NA', 'NAM', 'Namibia'),
('520', 'NR', 'NRU', 'Nauru'),
('524', 'NP', 'NPL', 'Nepal'),
('528', 'NL', 'NLD', 'Netherlands'),
('530', 'AN', 'ANT', 'Netherlands Antilles'),
('540', 'NC', 'NCL', 'New Caledonia'),
('554', 'NZ', 'NZL', 'New Zealand'),
('558', 'NI', 'NIC', 'Nicaragua'),
('562', 'NE', 'NER', 'Niger'),
('566', 'NG', 'NGA', 'Nigeria'),
('570', 'NU', 'NIU', 'Niue'),
('574', 'NF', 'NFK', 'Norfolk Island'),
('580', 'MP', 'MNP', 'N.Mariana Islands'),
('578', 'NO', 'NOR', 'Norway'),
('512', 'OM', 'OMN', 'Oman'),
('586', 'PK', 'PAK', 'Pakistan'),
('585', 'PW', 'PLW', 'Palau'),
('275', 'PS', 'PSE', 'Palestine'),
('591', 'PA', 'PAN', 'Panama'),
('598', 'PG', 'PNG', 'Papua New Guinea'),
('600', 'PY', 'PRY', 'Paraguay'),
('604', 'PE', 'PER', 'Peru'),
('608', 'PH', 'PHL', 'Philippines'),
('612', 'PN', 'PCN', 'Pitcairn'),
('616', 'PL', 'POL', 'Poland'),
('620', 'PT', 'PRT', 'Portugal'),
('630', 'PR', 'PRI', 'Puerto Rico'),
('634', 'QA', 'QAT', 'Qatar'),
('638', 'RE', 'REU', 'Reunion'),
('642', 'RO', 'ROU', 'Romania'),
('643', 'RU', 'RUS', 'Russia'),
('646', 'RW', 'RWA', 'Rwanda'),
('652', 'BL', 'BLM', 'St Barthelemy'),
('654', 'SH', 'SHN', 'St Helena'),
('659', 'KN', 'KNA', 'St Kitts and Nevis'),
('662', 'LC', 'LCA', 'St Lucia'),
('663', 'MF', 'MAF', 'St Martin (French)'),
('666', 'PM', 'SPM', 'St Pierre and Miquelon'),
('670', 'VC', 'VCT', 'St Vincent and Grenadines'),
('882', 'WS', 'WSM', 'Samoa'),
('674', 'SM', 'SMR', 'San Marino'),
('678', 'ST', 'STP', 'Sao Tome and Principe'),
('682', 'SA', 'SAU', 'Saudi Arabia'),
('686', 'SN', 'SEN', 'Senegal'),
('688', 'RS', 'SRB', 'Serbia'),
('690', 'SC', 'SYC', 'Seychelles'),
('694', 'SL', 'SLE', 'Sierra Leone'),
('702', 'SG', 'SGP', 'Singapore'),
('703', 'SK', 'SVK', 'Slovakia'),
('705', 'SI', 'SVN', 'Slovenia'),
('090', 'SB', 'SLB', 'Solomon Islands'),
('706', 'SO', 'SOM', 'Somalia'),
('710', 'ZA', 'ZAF', 'South Africa'),
('239', 'GS', 'SGS', 'South Georgia and South Sandwich Islands'),
('724', 'ES', 'ESP', 'Spain'),
('144', 'LK', 'LKA', 'Sri Lanka'),
('736', 'SD', 'SDN', 'Sudan'),
('740', 'SR', 'SUR', 'Suriname'),
('744', 'SJ', 'SJM', 'Svalbard and Jan Mayen Islands'),
('748', 'SZ', 'SWZ', 'Swaziland'),
('752', 'SE', 'SWE', 'Sweden'),
('756', 'CH', 'CHE', 'Switzerland'),
('760', 'SY', 'SYR', 'Syrian'),
('158', 'TW', 'TWN', 'Taiwan'),
('762', 'TJ', 'TJK', 'Tajikistan'),
('834', 'TZ', 'TZA', 'Tanzania'),
('764', 'TH', 'THA', 'Thailand'),
('626', 'TL', 'TLS', 'Timor-Leste'),
('768', 'TG', 'TGO', 'Togo'),
('772', 'TK', 'TKL', 'Tokelau'),
('776', 'TO', 'TON', 'Tonga'),
('780', 'TT', 'TTO', 'Trinidad and Tobago'),
('788', 'TN', 'TUN', 'Tunisia'),
('792', 'TR', 'TUR', 'Turkey'),
('795', 'TM', 'TKM', 'Turkmenistan'),
('796', 'TC', 'TCA', 'Turks and Caicos Islands'),
('798', 'TV', 'TUV', 'Tuvalu'),
('800', 'UG', 'UGA', 'Uganda'),
('804', 'UA', 'UKR', 'Ukraine'),
('784', 'AE', 'ARE', 'United Arab Emirates'),
('826', 'GB', 'GBR', 'United Kingdom'),
('840', 'US', 'USA', 'United States'),
('581', 'UM', 'UMI', 'United States Minor Islands'),
('858', 'UY', 'URY', 'Uruguay'),
('860', 'UZ', 'UZB', 'Uzbekistan'),
('548', 'VU', 'VUT', 'Vanuatu'),
('336', 'VA', 'VAT', 'Vatican City'),
('862', 'VE', 'VEN', 'Venezuela'),
('704', 'VN', 'VNM', 'Viet Nam'),
('092', 'VG', 'VGB', 'Virgin Islands, UK'),
('850', 'VI', 'VIR', 'Virgin Islands, US'),
('876', 'WF', 'WLF', 'Wallis and Futuna Islands'),
('732', 'EH', 'ESH', 'Western Sahara'),
('887', 'YE', 'YEM', 'Yemen'),
('894', 'ZM', 'ZMB', 'Zambia'),
('716', 'ZW', 'ZWE', 'Zimbabwe');

CREATE TABLE IF NOT EXISTS `products` (
  `product_key` varchar(255) NOT NULL,
  `product_catkey` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(15,4) NOT NULL default '0.0000',
  `product_buy` tinyint(1) NOT NULL default '1',
  `product_order` int(11) NOT NULL default '0',
  `product_image` varchar(255) default NULL,
  `product_shipping` text,
  PRIMARY KEY  (`product_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `products` (`product_key`, `product_catkey`, `product_title`, `product_description`, `product_price`, `product_buy`, `product_order`, `product_image`, `product_shipping`) VALUES
('product', 'subcategory', 'Product', 'Product description.', 10.0000, 1, 0, 'product.png', '5');

CREATE TABLE IF NOT EXISTS `shipping` (
  `shipping_id` int(10) unsigned NOT NULL auto_increment,
  `shipping_title` varchar(50) NOT NULL,
  `shipping_price` decimal(15,4) NOT NULL,
  `shipping_countries` text NOT NULL,
  `shipping_default` tinyint(1) NOT NULL,
  `shipping_active` tinyint(1) NOT NULL,
  PRIMARY KEY  (`shipping_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `shipping` (`shipping_id`, `shipping_title`, `shipping_price`, `shipping_countries`, `shipping_default`, `shipping_active`) VALUES
(1, 'UK Standard', 3.9500, '826', 1, 1),
(2, 'UK Express', 6.9500, '826', 0, 1),
(3, 'AirMail', 12.9500, '040,056,100,196,203,208,233,246,250,276,300,348,372,380,428,440,442,470,528,616,620,642,703,705,724,752,060', 0, 1),
(4, 'Download Only', 0.0000, '004,248,008,012,016,020,024,660,028,010,032,051,533,036,040,031,044,048,050,052,112,056,084,204,060,064,068,070,072,074,086,076,096,100,854,108,120,116,124,132,136,140,148,152,156,162,166,170,174,178,180,184,188,384,191,192,196,203,208,262,212,214,218,818,222,226,232,233,238,231,234,242,246,250,249,254,258,260,266,270,268,276,288,292,300,304,308,312,320,316,831,324,624,328,332,334,340,344,348,352,356,360,364,368,372,833,376,380,388,392,832,400,398,404,296,414,417,418,428,422,426,430,434,438,440,442,446,807,450,454,458,462,466,470,584,474,478,480,175,484,583,498,492,496,499,500,504,508,104,580,516,520,524,528,530,540,554,558,562,566,570,574,408,578,512,586,585,275,591,598,600,604,608,612,616,620,630,634,638,642,643,646,882,674,678,682,686,688,690,694,702,703,705,090,706,710,239,410,724,144,652,654,659,662,663,666,670,736,740,744,748,752,756,760,158,762,834,764,626,768,772,776,780,788,792,795,796,798,804,800,784,826,840,581,858,860,548,336,862,704,092,850,876,732,887,894,716', 0, 1),
(5, 'Not Applicable', 0.0000, '004,248,008,012,016,020,024,660,028,010,032,051,533,036,040,031,044,048,050,052,112,056,084,204,060,064,068,070,072,074,086,076,096,100,854,108,120,116,124,132,136,140,148,152,156,162,166,170,174,178,180,184,188,384,191,192,196,203,208,262,212,214,218,818,222,226,232,233,238,231,234,242,246,250,249,254,258,260,266,270,268,276,288,292,300,304,308,312,320,316,831,324,624,328,332,334,340,344,348,352,356,360,364,368,372,833,376,380,388,392,832,400,398,404,296,414,417,418,428,422,426,430,434,438,440,442,446,807,450,454,458,462,466,470,584,474,478,480,175,484,583,498,492,496,499,500,504,508,104,580,516,520,524,528,530,540,554,558,562,566,570,574,408,578,512,586,585,275,591,598,600,604,608,612,616,620,630,634,638,642,643,646,882,674,678,682,686,688,690,694,702,703,705,090,706,710,239,410,724,144,652,654,659,662,663,666,670,736,740,744,748,752,756,760,158,762,834,764,626,768,772,776,780,788,792,795,796,798,804,800,784,826,840,581,858,860,548,336,862,704,092,850,876,732,887,894,716', 0, 1);

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `user_date` datetime NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `user_ip` varchar(15) NOT NULL,
  `user_active` tinyint(1) unsigned NOT NULL default '1',
  `user_level` tinyint(1) unsigned NOT NULL default '0',
  `user_title` varchar(10) default NULL,
  `user_firstname` varchar(255) default NULL,
  `user_lastname` varchar(255) default NULL,
  `user_address1` varchar(255) default NULL,
  `user_address2` varchar(255) default NULL,
  `user_city` varchar(255) default NULL,
  `user_county` varchar(255) default NULL,
  `user_postcode` varchar(10) default NULL,
  `user_country` varchar(255) default NULL,
  `user_newsletter` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `users` (`user_id`, `user_date`, `user_email`, `user_password`, `user_ip`, `user_active`, `user_level`, `user_title`, `user_firstname`, `user_lastname`, `user_address1`, `user_address2`, `user_city`, `user_county`, `user_postcode`, `user_country`, `user_newsletter`) VALUES
(1, '2012-01-01 00:00:00', 'demo@totalshopuk.com', 'password', '127.0.0.1', 1, 1, 'Mr', 'Admin', 'Account', 'Address 1', 'Address 2', 'City', 'County', 'P05T C0D3', 'United Kingdom', 1);
