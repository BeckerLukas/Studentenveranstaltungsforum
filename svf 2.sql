-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jan 2018 um 12:51
-- Server-Version: 10.1.25-MariaDB
-- PHP-Version: 7.1.7

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beitreten`
--

CREATE TABLE `beitreten` (
  `Teilnehmer` bigint(255) NOT NULL,
  `Veranstaltung` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Studiengang` varchar(40) NOT NULL,
  `Geburtstag` date NOT NULL,
  `Profilbild` varchar(1000) DEFAULT NULL,
  `Session` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`BenutzerID`, `EMail`, `Passwort`, `Name`, `Vorname`, `Geschlecht`, `Studiengang`, `Geburtstag`, `Profilbild`, `Session`) VALUES
(49, 'kevin.aulbach@stud.hshl.de', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'Aulbach', 'Kevin', 'male', 'Soziale Medien und Kommunikationsinforma', '1995-10-20', NULL, '255ip2h81k6t8rv8bo7m4o02ua');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `Kategorie-ID` bigint(255) NOT NULL,
  `Bezeichnung` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`Kategorie-ID`, `Bezeichnung`) VALUES
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
  `Veranstaltungs-ID` bigint(255) NOT NULL,
  `Ersteller` bigint(255) NOT NULL,
  `Kategorie` bigint(255) NOT NULL,
  `Veranstaltungsname` varchar(40) NOT NULL,
  `Datum` date NOT NULL,
  `Uhrzeit` time(6) NOT NULL,
  `Beschreibung` text NOT NULL,
  `Teilnehmerzahl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `veranstaltung`
--

INSERT INTO `veranstaltung` (`Veranstaltungs-ID`, `Ersteller`, `Kategorie`, `Veranstaltungsname`, `Datum`, `Uhrzeit`, `Beschreibung`, `Teilnehmerzahl`) VALUES
(1, 49, 1, 'asda', '0000-00-00', '03:10:00.000000', 'Beschreibung schreiben...\r\n							', 100);

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
  ADD PRIMARY KEY (`Kategorie-ID`);

--
-- Indizes für die Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  ADD PRIMARY KEY (`Veranstaltungs-ID`),
  ADD KEY `Benutzer` (`Ersteller`),
  ADD KEY `Kategorie` (`Kategorie`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `BenutzerID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `Kategorie-ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT für Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  MODIFY `Veranstaltungs-ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD CONSTRAINT `Veranstaltung` FOREIGN KEY (`Veranstaltung`) REFERENCES `veranstaltung` (`Veranstaltungs-ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Verfasser` FOREIGN KEY (`Verfasser`) REFERENCES `benutzer` (`BenutzerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `beitreten`
--
ALTER TABLE `beitreten`
  ADD CONSTRAINT `Teilnehmer` FOREIGN KEY (`Teilnehmer`) REFERENCES `benutzer` (`BenutzerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beitreten_ibfk_1` FOREIGN KEY (`Veranstaltung`) REFERENCES `veranstaltung` (`Veranstaltungs-ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  ADD CONSTRAINT `Kategorie` FOREIGN KEY (`Kategorie`) REFERENCES `kategorie` (`Kategorie-ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Veranstaltungsersteller` FOREIGN KEY (`Ersteller`) REFERENCES `benutzer` (`BenutzerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
