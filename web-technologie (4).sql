-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Nov 2023 um 17:23
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `web-technologie`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beitrag`
--

CREATE TABLE `beitrag` (
  `beitrag_id` int(11) NOT NULL,
  `inhalt` varchar(300) NOT NULL,
  `likes` int(200) NOT NULL,
  `veröffentlichungsdatum` datetime NOT NULL,
  `fk_benutzer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `beitrag`
--

INSERT INTO `beitrag` (`beitrag_id`, `inhalt`, `likes`, `veröffentlichungsdatum`, `fk_benutzer_id`) VALUES
(3, 'ich bins timm', 0, '2023-10-31 12:51:32', 1),
(4, 'testen', 0, '2023-11-02 16:56:33', 1),
(5, 'testen hallo buny2', 0, '2023-11-03 15:09:19', 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `benutzer_id` int(20) NOT NULL,
  `benutzername` varchar(20) NOT NULL,
  `passwort` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `rolle` varchar(20) NOT NULL,
  `passwort_reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`benutzer_id`, `benutzername`, `passwort`, `email`, `rolle`, `passwort_reset_token`) VALUES
(1, 'buny', '12', 'buny@', '', NULL),
(14, 'hello', '12', 'hello', '', NULL),
(19, 'hans', '1', 'hans', '', NULL),
(20, 'buny2@', '12', 'buny2@', '', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `freundschaft`
--

CREATE TABLE `freundschaft` (
  `freundschaft_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `fk_benutzer_id1` int(11) NOT NULL,
  `fk_benutzer_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `freundschaft`
--

INSERT INTO `freundschaft` (`freundschaft_id`, `status`, `fk_benutzer_id1`, `fk_benutzer_id2`) VALUES
(4, 1, 1, 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentar`
--

CREATE TABLE `kommentar` (
  `kommentar_id` int(11) NOT NULL,
  `kommentar_inhalt` varchar(50) NOT NULL,
  `kommentar_veröffentlichungsdatum` date NOT NULL,
  `fk_beitrag_id` int(11) NOT NULL,
  `fk_benutzer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD PRIMARY KEY (`beitrag_id`),
  ADD KEY `fk_benutzer_beitrag` (`fk_benutzer_id`);

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`benutzer_id`);

--
-- Indizes für die Tabelle `freundschaft`
--
ALTER TABLE `freundschaft`
  ADD PRIMARY KEY (`freundschaft_id`),
  ADD KEY `fk_benutzer1_freundschaft` (`fk_benutzer_id1`),
  ADD KEY `fk_benutzer2_freundschaft` (`fk_benutzer_id2`);

--
-- Indizes für die Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD PRIMARY KEY (`kommentar_id`),
  ADD KEY `fk_beitrag_kommentar` (`fk_beitrag_id`),
  ADD KEY `fk_benutzer_kommentar` (`fk_benutzer_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  MODIFY `beitrag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `benutzer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `freundschaft`
--
ALTER TABLE `freundschaft`
  MODIFY `freundschaft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `kommentar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD CONSTRAINT `fk_benutzer_beitrag` FOREIGN KEY (`fk_benutzer_id`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `freundschaft`
--
ALTER TABLE `freundschaft`
  ADD CONSTRAINT `fk_benutzer1_freundschaft` FOREIGN KEY (`fk_benutzer_id1`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_benutzer2_freundschaft` FOREIGN KEY (`fk_benutzer_id2`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD CONSTRAINT `fk_beitrag_kommentar` FOREIGN KEY (`fk_beitrag_id`) REFERENCES `beitrag` (`beitrag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_benutzer_kommentar` FOREIGN KEY (`fk_benutzer_id`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
