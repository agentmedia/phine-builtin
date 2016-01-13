-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pc_builtin_content_repeater`
--

CREATE TABLE IF NOT EXISTS `pc_builtin_content_repeater` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Content` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Content` (`Content`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
