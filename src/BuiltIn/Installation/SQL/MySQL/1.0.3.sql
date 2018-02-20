
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pc_builtin_content_change_email`
--

CREATE TABLE IF NOT EXISTS `pc_builtin_content_change_email` (
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


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pc_builtin_content_change_password`
--

CREATE TABLE IF NOT EXISTS `pc_builtin_content_change_password` (
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


--
-- Tabellenstruktur für Tabelle `pc_builtin_content_change_email_confirm`
--

CREATE TABLE IF NOT EXISTS `pc_builtin_content_change_email_confirm` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `Purpose` varchar(32) NOT NULL COMMENT 'NewEMail or NewPassword',
  `SuccessUrl` bigint(20) unsigned DEFAULT NULL,
  `ErrorUrl` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`),
  UNIQUE KEY `ErrorUrl` (`ErrorUrl`),
  UNIQUE KEY `SuccessUrl` (`SuccessUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pc_builtin_content_change_password_confirm`
--

CREATE TABLE IF NOT EXISTS `pc_builtin_content_change_password_confirm` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  `Purpose` varchar(32) NOT NULL COMMENT 'NewEMail or NewPassword',
  `SuccessUrl` bigint(20) unsigned DEFAULT NULL,
  `ErrorUrl` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`),
  UNIQUE KEY `ErrorUrl` (`ErrorUrl`),
  UNIQUE KEY `SuccessUrl` (`SuccessUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


