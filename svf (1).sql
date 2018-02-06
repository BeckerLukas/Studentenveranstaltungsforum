-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Feb 2018 um 17:26
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `svf`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beitrag`
--

CREATE TABLE `beitrag` (
  `Beitrags-ID` bigint(255) NOT NULL,
  `Verfasser` bigint(255) NOT NULL,
  `Veranstaltung` bigint(255) NOT NULL,
  `Inhalt` text NOT NULL,
  `Zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `beitrag`
--

INSERT INTO `beitrag` (`Beitrags-ID`, `Verfasser`, `Veranstaltung`, `Inhalt`, `Zeit`) VALUES
(5, 49, 4, 'Hallo', '2018-02-02 17:41:54'),
(7, 49, 4, 'a', '2018-02-06 12:03:22'),
(8, 49, 4, 'a', '2018-02-06 12:03:28'),
(9, 49, 4, 'Ba', '2018-02-06 12:05:37'),
(10, 49, 4, 'aaaa', '2018-02-06 12:06:22'),
(11, 49, 4, 'aaaa', '2018-02-06 12:06:33'),
(12, 49, 4, 'bÃ¤', '2018-02-06 12:09:47'),
(13, 55, 12, 'Hi wie gehtÂ´s?', '2018-02-06 16:07:29'),
(14, 56, 13, 'Hallo', '2018-02-06 16:19:55');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beitreten`
--

CREATE TABLE `beitreten` (
  `Teilnehmer` bigint(255) NOT NULL,
  `Veranstaltung` bigint(255) NOT NULL,
  `Zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `beitreten`
--

INSERT INTO `beitreten` (`Teilnehmer`, `Veranstaltung`, `Zeit`) VALUES
(49, 4, '2018-02-02 17:40:29'),
(49, 10, '2018-02-06 15:17:02'),
(50, 10, '2018-02-06 15:15:53'),
(51, 10, '2018-02-06 15:17:27'),
(52, 10, '2018-02-06 15:21:39'),
(53, 10, '2018-02-06 15:22:52'),
(54, 4, '2018-02-06 15:29:31'),
(54, 10, '2018-02-06 15:23:59'),
(54, 11, '2018-02-06 15:28:51'),
(55, 12, '2018-02-06 16:07:13'),
(56, 13, '2018-02-06 16:19:44');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `BenutzerID` bigint(255) NOT NULL,
  `EMail` varchar(40) NOT NULL,
  `Passwort` varchar(250) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Vorname` varchar(20) NOT NULL,
  `Geschlecht` varchar(8) NOT NULL,
  `Studiengang` varchar(100) NOT NULL,
  `Geburtstag` date NOT NULL,
  `Profilbild` varchar(1000) DEFAULT NULL,
  `Session` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`BenutzerID`, `EMail`, `Passwort`, `Name`, `Vorname`, `Geschlecht`, `Studiengang`, `Geburtstag`, `Profilbild`, `Session`) VALUES
(49, 'kevin.aulbach@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Aulbach', 'Kevin', 'male', 'Soziale Medien und Kommunikationsinformatik', '1995-10-20', 'PB/Screenshot (1).png', '7uub1r432dol8plpn9qad2gg4c'),
(50, 'test.test@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Test', 'Test', 'male', 'Angewandte Biomedizintechnik', '1111-11-11', NULL, NULL),
(51, 'julian.henke@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Henke', 'Julian', 'male', 'Soziale Medien und Kommunikationsinformatik', '0001-02-28', NULL, NULL),
(52, 'test2.test@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Test', 'Test2', 'male', 'Angewandte Biomedizintechnik', '1995-10-20', NULL, NULL),
(53, 'test3.test@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Test', 'Test3', 'male', 'Product and Asset Management', '1995-10-20', NULL, NULL),
(54, 'test4.test@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'test', 'test4', 'female', 'Computervisualistik und Design', '1998-10-20', NULL, NULL),
(55, 'lukas.becker@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Becker', 'Lukas', 'male', 'Soziale Medien und Kommunikationsinformatik', '1997-02-06', 'PB/0_big.jpg', NULL),
(56, 'max.mustermann@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Mustermann', 'Max', 'male', 'Angewandte Biomedizintechnik', '1990-01-01', 'PB/0_big_1.jpg', 'aoivhdlsdg4mrqk7s8o2ias569');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `KategorieID` bigint(255) NOT NULL,
  `Bezeichnung` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`KategorieID`, `Bezeichnung`) VALUES
(1, 'B&uuml;chergruppe'),
(2, 'Fest'),
(3, 'Fitness'),
(4, 'Fu&szlig;ball'),
(5, 'Joggen'),
(6, 'Kanutour'),
(7, 'Kino'),
(8, 'Kneipentour'),
(9, 'Lerngruppe'),
(10, 'Minigolf'),
(11, 'Party'),
(12, 'Radtour'),
(13, 'Reisen'),
(14, 'Stadtbesichtigung'),
(15, 'Stadttheater'),
(16, 'Spieleabend'),
(17, 'Treffen'),
(18, 'Volleyball'),
(19, 'Yoga'),
(20, 'Sonstiges'),
(26, 'Kneipentour'),
(27, 'Lerngruppe'),
(28, 'Minigolf'),
(29, 'Party'),
(30, 'Radtour'),
(31, 'Reisen'),
(32, 'Stadtbesichtigung'),
(33, 'Stadttheater'),
(34, 'Spieleabend'),
(35, 'Treffen'),
(36, 'Volleyball'),
(37, 'Yoga'),
(38, 'Sonstiges');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `veranstaltung`
--

CREATE TABLE `veranstaltung` (
  `VeranstaltungsID` bigint(255) NOT NULL,
  `Ersteller` bigint(255) NOT NULL,
  `Kategorie` bigint(255) NOT NULL,
  `Veranstaltungsname` varchar(40) NOT NULL,
  `Datum` date NOT NULL,
  `Uhrzeit` time(6) NOT NULL,
  `Beschreibung` text NOT NULL,
  `Teilnehmerzahl` int(11) NOT NULL,
  `Ort` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `veranstaltung`
--

INSERT INTO `veranstaltung` (`VeranstaltungsID`, `Ersteller`, `Kategorie`, `Veranstaltungsname`, `Datum`, `Uhrzeit`, `Beschreibung`, `Teilnehmerzahl`, `Ort`) VALUES
(4, 51, 7, 'Test', '2018-02-20', '18:00:00.000000', 'Kino in lippstadt\r\n							', 40, 'Cineplexx'),
(7, 49, 1, 'Test', '2018-10-20', '16:00:00.000000', 'Hallo\r\n							', 10, 'Test'),
(8, 50, 4, 'Test2 ', '2019-10-20', '19:00:00.000000', 'FuÃŸball spielen in der Commerzbank Arena\r\n							', 5, 'Commerzbank Arena'),
(9, 50, 8, 'Kneipentour Lippstadt', '2018-03-30', '16:00:00.000000', 'Lippstadt Kneipentour 2018		', 20, 'HSHL Treffpunkt'),
(10, 50, 4, 'FuÃŸball spielen', '2018-03-30', '18:00:00.000000', 'Hallo wir wollen in der Commerzbank Arena in Frankfurt FuÃŸball spielen und treffen uns vor der Commerzbank Arena', 32, 'Commerzbank Arena Frankfurt'),
(11, 54, 7, 'Test', '2018-09-20', '15:00:00.000000', 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\n							', 20, 'Test'),
(12, 55, 11, 'Party', '2018-10-06', '20:00:00.000000', 'Feier\r\n							', 30, 'Uni'),
(13, 56, 11, 'Party', '2018-03-03', '20:30:00.000000', 'Party				', 30, 'Uni');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD PRIMARY KEY (`Beitrags-ID`),
  ADD KEY `Verfasser` (`Verfasser`),
  ADD KEY `Veranstaltung` (`Veranstaltung`);

--
-- Indizes für die Tabelle `beitreten`
--
ALTER TABLE `beitreten`
  ADD PRIMARY KEY (`Teilnehmer`,`Veranstaltung`),
  ADD KEY `Teilnehmer` (`Teilnehmer`),
  ADD KEY `Veranstaltung` (`Veranstaltung`);

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`BenutzerID`),
  ADD UNIQUE KEY `E-Mail` (`EMail`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`KategorieID`);

--
-- Indizes für die Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  ADD PRIMARY KEY (`VeranstaltungsID`),
  ADD KEY `Benutzer` (`Ersteller`),
  ADD KEY `Kategorie` (`Kategorie`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  MODIFY `Beitrags-ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `BenutzerID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `KategorieID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  MODIFY `VeranstaltungsID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD CONSTRAINT `Veranstaltung` FOREIGN KEY (`Veranstaltung`) REFERENCES `veranstaltung` (`VeranstaltungsID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Verfasser` FOREIGN KEY (`Verfasser`) REFERENCES `benutzer` (`BenutzerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `beitreten`
--
ALTER TABLE `beitreten`
  ADD CONSTRAINT `Teilnehmer` FOREIGN KEY (`Teilnehmer`) REFERENCES `benutzer` (`BenutzerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beitreten_ibfk_1` FOREIGN KEY (`Veranstaltung`) REFERENCES `veranstaltung` (`VeranstaltungsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  ADD CONSTRAINT `Kategorie` FOREIGN KEY (`Kategorie`) REFERENCES `kategorie` (`KategorieID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Veranstaltungsersteller` FOREIGN KEY (`Ersteller`) REFERENCES `benutzer` (`BenutzerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
