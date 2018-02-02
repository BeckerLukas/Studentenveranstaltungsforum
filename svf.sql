-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Feb 2018 um 17:37
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
(1, 49, 3, 'Hallo', '2018-01-25 09:35:11'),
(2, 49, 3, 'Halloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', '2018-01-25 11:31:49'),
(3, 51, 3, 'Hallo wie gehts?', '2018-01-25 11:43:20');

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
(49, 3, '2018-01-25 09:35:28'),
(50, 3, '2018-01-25 09:43:51'),
(51, 3, '2018-01-25 11:41:29');

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
(49, 'kevin.aulbach@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Aulbach', 'Kevin', 'male', 'Soziale Medien und Kommunikationsinformatik', '1995-10-20', 'PB/Screenshot (1).png', '0oi2ed38ottma02jl6ihobuc7g'),
(50, 'test.test@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Test', 'Test', 'male', 'Angewandte Biomedizintechnik', '1111-11-11', NULL, '12gl4mp35borkjrmbovs1f1s77'),
(51, 'julian.henke@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Julian', 'Henke', 'male', 'Soziale Medien und Kommunikationsinformatik', '0001-02-28', NULL, 'sful8jff91k09lj3t1hd17482d');

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
(1, 'Büchergruppe'),
(2, 'Fest'),
(3, 'Fitness'),
(4, 'Fußball'),
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
(3, 49, 2, 'Asdad', '2018-10-20', '18:00:00.000000', 'Test							', 10, 'Cineplexx'),
(4, 51, 7, 'Test', '2018-02-20', '18:00:00.000000', 'Kino in lippstadt\r\n							', 40, 'Cineplexx');

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
  MODIFY `Beitrags-ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `BenutzerID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `KategorieID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  MODIFY `VeranstaltungsID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
