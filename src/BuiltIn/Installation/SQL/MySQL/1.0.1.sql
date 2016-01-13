DROP TABLE `pc_builtin_navigation_page`;
DROP TABLE `pc_builtin_navigation_parameter`;

CREATE TABLE IF NOT EXISTS `pc_builtin_content_register_simple` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `NextUrl` bigint(20) unsigned DEFAULT NULL,
  `ConfirmUrl` bigint(20) unsigned DEFAULT NULL,
  `MailStyles` text NOT NULL,
  `MailSubject` varchar(255) NOT NULL,
  `MailText1` text NOT NULL,
  `MailText2` text NOT NULL,
  `MailFrom` varchar(128) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`),
  UNIQUE KEY `NextUrl` (`NextUrl`),
  UNIQUE KEY `ConfirmUrl` (`ConfirmUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_content_register_confirm` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `SuccessUrl` bigint(20) unsigned DEFAULT NULL,
  `ErrorUrl` bigint(20) unsigned DEFAULT NULL,
  `Activate` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`),
  UNIQUE KEY `ErrorUrl` (`ErrorUrl`),
  UNIQUE KEY `SuccessUrl` (`SuccessUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pc_builtin_content_login` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `PasswordUrl` bigint(20) unsigned DEFAULT NULL,
  `NextUrl` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`),
  UNIQUE KEY `NextUrl` (`NextUrl`),
  UNIQUE KEY `PasswordUrl` (`PasswordUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `pc_builtin_content_logout` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `NextUrl` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`),
  UNIQUE KEY `NextUrl` (`NextUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `pc_builtin_register_confirm_membergroup` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Confirm` bigint(20) unsigned NOT NULL,
  `MemberGroup` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Confirm` (`Confirm`),
  KEY `MemberGroup` (`MemberGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
