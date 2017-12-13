-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Dez 2017 um 15:49
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
  `Inhalt` text NOT NULL
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
  `Benutzer-ID` bigint(255) NOT NULL,
  `E-Mail` varchar(40) NOT NULL,
  `Passwort` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Vorname` varchar(20) NOT NULL,
  `Geschlecht` varchar(8) NOT NULL,
  `Studiengang` varchar(40) NOT NULL,
  `Geburtstag` date NOT NULL,
  `Profilbild` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `Kategorie-ID` bigint(255) NOT NULL,
  `Bezeichnung` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Beschreibung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`Benutzer-ID`);

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
  MODIFY `Benutzer-ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `Kategorie-ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  MODIFY `Veranstaltungs-ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD CONSTRAINT `Veranstaltung` FOREIGN KEY (`Veranstaltung`) REFERENCES `veranstaltung` (`Veranstaltungs-ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Verfasser` FOREIGN KEY (`Verfasser`) REFERENCES `benutzer` (`Benutzer-ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `beitreten`
--
ALTER TABLE `beitreten`
  ADD CONSTRAINT `Teilnehmer` FOREIGN KEY (`Teilnehmer`) REFERENCES `benutzer` (`Benutzer-ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beitreten_ibfk_1` FOREIGN KEY (`Veranstaltung`) REFERENCES `veranstaltung` (`Veranstaltungs-ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `veranstaltung`
--
ALTER TABLE `veranstaltung`
  ADD CONSTRAINT `Kategorie` FOREIGN KEY (`Kategorie`) REFERENCES `kategorie` (`Kategorie-ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Veranstaltungsersteller` FOREIGN KEY (`Ersteller`) REFERENCES `benutzer` (`Benutzer-ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
