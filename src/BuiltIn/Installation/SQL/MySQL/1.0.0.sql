
CREATE TABLE IF NOT EXISTS `pc_builtin_content_block` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `TagName` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_content_container` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `Container` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`),
  KEY `Container` (`Container`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_content_html` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `Html` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_content_html_code` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `Code` mediumtext NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_content_html_wrap` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `Html` mediumtext NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_content_navigation` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `Name` varchar(128) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_navigation_item` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(128) NOT NULL,
  `Navigation` bigint(20) unsigned NOT NULL,
  `Parent` bigint(20) unsigned DEFAULT NULL,
  `Previous` bigint(20) unsigned DEFAULT NULL,
  `PageItem` bigint(20) unsigned DEFAULT NULL,
  `UrlItem` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Previous` (`Previous`),
  UNIQUE KEY `PageItem` (`PageItem`),
  UNIQUE KEY `UrlItem` (`UrlItem`),
  KEY `Parent` (`Parent`),
  KEY `Navigation` (`Navigation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_navigation_page` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Item` bigint(20) unsigned NOT NULL,
  `Page` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Item` (`Item`),
  KEY `Page` (`Page`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_navigation_parameter` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NavigationPage` bigint(20) unsigned NOT NULL,
  `Previous` bigint(20) unsigned DEFAULT NULL,
  `Name` varchar(128) NOT NULL,
  `Value` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Previous` (`Previous`),
  KEY `NavigationPage` (`NavigationPage`),
  KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_navigation_url` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Item` bigint(20) unsigned NOT NULL,
  `Url` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Item` (`Item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;