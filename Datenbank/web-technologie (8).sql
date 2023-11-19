-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Nov 2023 um 12:44
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
(3, 'ich bins timm', 1, '2023-10-31 12:51:32', 1),
(4, 'testen', 0, '2023-11-02 16:56:33', 1),
(5, 'testen hallo buny2', 0, '2023-11-03 15:09:19', 20),
(6, 'hello wie gehts', 0, '2023-11-04 11:00:09', 1),
(7, 'hello', 1, '2023-11-05 11:24:41', 1),
(8, 'Testen Beitrag', 0, '2023-11-05 11:30:52', 1),
(9, 'test2', 0, '2023-11-05 11:52:07', 1),
(10, 'fred', 1, '2023-11-05 11:53:11', 1),
(11, 'neuer Beitrag', 1, '2023-11-05 12:47:20', 1),
(12, 'ghhj', 1, '2023-11-06 09:15:03', 1),
(13, 'ich bin Isa', 0, '2023-11-06 09:26:26', 21),
(14, 'hello', 0, '2023-11-06 10:58:59', 1),
(15, 'kommentar test', 1, '2023-11-06 12:11:40', 1),
(16, 'testen', 0, '2023-11-06 12:13:51', 1),
(17, 'neuer beitrag', 0, '2023-11-06 12:24:35', 1),
(18, 'moin', 1, '2023-11-06 12:32:50', 1),
(19, 'moinsen', 1, '2023-11-06 12:32:57', 1),
(20, 'hello', 0, '2023-11-07 13:47:24', 1),
(21, 'teste bdjk bpjbfpjo ', 0, '2023-11-07 13:50:03', 1),
(22, 'dddd', 0, '2023-11-07 13:59:55', 1),
(23, 'kullmann', 1, '2023-11-07 14:07:06', 1),
(24, 'ich bin der beste', 1, '2023-11-07 14:09:31', 20),
(29, 'ich trainiere nie', 1, '2023-11-07 19:21:10', 1),
(30, 'sss', 1, '2023-11-07 19:31:52', 1),
(31, 'ich hasse es zu trainieren', 1, '2023-11-07 19:33:51', 1),
(32, 'dhdhdhd', 2, '2023-11-08 09:14:34', 1),
(33, 'moinsen wienrjdd', 1, '2023-11-08 09:29:17', 1),
(34, 'like testen ob es klappt', 1, '2023-11-08 11:02:14', 1),
(35, 'ich teste nichts mehr', 1, '2023-11-08 13:32:00', 1),
(36, 'fred', 0, '2023-11-09 12:31:09', 1),
(37, 'web technologie', 2, '2023-11-09 14:22:30', 1),
(38, 'ich teste like anzahl', 1, '2023-11-09 18:42:11', 1),
(39, '', 0, '2023-11-09 18:47:00', 1),
(40, '', 0, '2023-11-09 18:48:36', 1),
(41, '', 0, '2023-11-09 18:48:49', 1),
(42, '', 0, '2023-11-09 18:50:02', 1),
(43, 'heute 12.11', 0, '2023-11-12 12:17:33', 1);

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
  `profile_informationen` text NOT NULL,
  `user_profil` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `forgotten_answer` varchar(100) NOT NULL,
  `log_in` varchar(7) NOT NULL,
  `passwort_reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`benutzer_id`, `benutzername`, `passwort`, `email`, `rolle`, `profile_informationen`, `user_profil`, `user_country`, `user_gender`, `forgotten_answer`, `log_in`, `passwort_reset_token`) VALUES
(1, 'buny', '12', 'buny@', '', 'fitness, wirtschaftsinformatik, deutsch', 'images_profile/avatar-1295399_640.png.33', '', '', '', 'Offline', NULL),
(14, 'hello', '12', 'hello', '', 'fußball, betriebswirtshcaftslehre, zeichnen, türke', '', '', '', '', '', NULL),
(19, 'hans', '1', 'hans', '', 'voleyball, studium, schwimmen, russe', '', '', '', '', '', ''),
(20, 'buny2@', '12', 'buny2@', '', 'fußball, Horrorfilme, studium, sport', '', '', '', '', 'Online', NULL),
(21, 'test', '12', 'test@', '', 'Studium, Fußball, Sport, schlafen, mönchengladbach, film, voleyball, zeichnen, tiere', '', '', '', '', '', NULL),
(23, 'bunytest', 'hallo123', 'test@hotmail.de', 'user', '', '', 'Germany', 'Male', '', '', NULL),
(25, 'manu', '12', 'manu@', '', 'fitness,  wirtschaft, deutsch, spanisch', '', '', '', '', '', NULL),
(26, 'isa123', 'hallo1234', 'isa123@hotmail.de', '', '', '', '', '', 'buny', '', NULL),
(27, 'testen1234', 'hallo1234', 'test2@hotmail.de', '', 'fitness,  wirtschaft, deutsch, spanisch', 'images_profile/cat-5646889_640.jpg.4', '', '', '', 'Offline', NULL),
(32, 'delete@hotmail.de', 'hallo123', 'delete@hotmail.de', '', '', '', '', '', 'peter', '', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chat_nachricht`
--

CREATE TABLE `chat_nachricht` (
  `chat_nachricht_id` int(200) NOT NULL,
  `zu_user_id` int(11) NOT NULL,
  `von_user_id` int(11) NOT NULL,
  `chat_nachricht` text NOT NULL,
  `zeitstempel` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 1, 1, 20),
(5, 1, 1, 21),
(6, 1, 27, 1),
(7, 1, 27, 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentar`
--

CREATE TABLE `kommentar` (
  `kommentar_id` int(11) NOT NULL,
  `kommentar_inhalt` varchar(50) NOT NULL,
  `kommentar_veröffentlichungsdatum` datetime NOT NULL,
  `fk_beitrag_id` int(11) NOT NULL,
  `fk_benutzer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kommentar`
--

INSERT INTO `kommentar` (`kommentar_id`, `kommentar_inhalt`, `kommentar_veröffentlichungsdatum`, `fk_beitrag_id`, `fk_benutzer_id`) VALUES
(10, 'Super buny', '2023-11-05 12:49:57', 11, 1),
(11, 'fff', '2023-11-05 12:53:35', 11, 1),
(12, 'ss', '2023-11-05 12:53:50', 11, 1),
(13, 'dd', '2023-11-05 12:54:51', 11, 1),
(14, 'lolo', '2023-11-05 12:58:01', 11, 1),
(15, 'jj', '2023-11-05 13:00:24', 11, 20),
(16, 'ss', '2023-11-05 13:13:07', 11, 20),
(17, 'super Beitrag Isa', '2023-11-06 09:26:46', 13, 21),
(18, 'test 12', '2023-11-06 10:10:36', 13, 1),
(19, 'blablabka', '2023-11-06 10:43:49', 12, 1),
(20, 'super gemacht', '2023-11-06 10:59:05', 7, 1),
(21, 'super Beitrag wieter so', '2023-11-06 12:16:16', 4, 1),
(22, 'ddd', '2023-11-06 12:17:24', 7, 1),
(23, 'super toll', '2023-11-06 12:26:29', 11, 1),
(24, 'ff', '2023-11-06 12:32:59', 19, 1),
(25, 'superrr', '2023-11-07 13:47:43', 7, 1),
(26, 'super weiter so ', '2023-11-07 13:54:01', 11, 1),
(27, 'buny super', '2023-11-07 14:04:36', 22, 1),
(28, 'weiter buny machst es gut', '2023-11-07 14:05:19', 21, 1),
(29, 'nice buny', '2023-11-07 14:06:52', 22, 1),
(30, 'ss', '2023-11-07 14:07:08', 23, 1),
(31, 'perfektooo', '2023-11-07 14:09:49', 24, 20),
(32, 'ggg', '2023-11-07 19:18:01', 24, 1),
(33, 'ssss', '2023-11-07 19:31:57', 30, 1),
(34, 'sdss', '2023-11-07 19:33:56', 31, 1),
(35, 'super faris', '2023-11-08 09:15:14', 32, 20),
(36, 'dhdjhs', '2023-11-08 09:28:02', 5, 1),
(37, 'fjfjjf', '2023-11-08 09:28:53', 32, 1),
(38, 'reddd', '2023-11-08 09:29:03', 32, 1),
(39, 'hdhdh', '2023-11-09 12:31:15', 10, 1),
(40, 'super', '2023-11-09 14:20:05', 10, 1),
(41, 'ddd', '2023-11-09 14:23:37', 37, 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `liked_beitraege`
--

CREATE TABLE `liked_beitraege` (
  `like_id` int(11) NOT NULL,
  `fk_benutzer_id` int(11) NOT NULL,
  `fk_beitrag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `liked_beitraege`
--

INSERT INTO `liked_beitraege` (`like_id`, `fk_benutzer_id`, `fk_beitrag_id`) VALUES
(20, 1, 7),
(21, 1, 10),
(10, 1, 11),
(11, 1, 12),
(18, 1, 15),
(9, 1, 18),
(8, 1, 19),
(17, 1, 23),
(7, 1, 24),
(6, 1, 29),
(5, 1, 30),
(4, 1, 31),
(16, 1, 32),
(14, 1, 33),
(15, 1, 34),
(19, 1, 35),
(23, 1, 37),
(24, 1, 38),
(12, 20, 3),
(13, 20, 32),
(22, 20, 37);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(200) NOT NULL,
  `fk_login_benutzer_id` int(200) NOT NULL,
  `letzte_aktivität` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `fk_login_benutzer_id`, `letzte_aktivität`, `is_type`) VALUES
(1, 1, '2023-11-07 12:00:23', 'no'),
(2, 1, '2023-11-07 12:13:21', 'no'),
(3, 1, '2023-11-07 12:14:48', 'no'),
(4, 1, '2023-11-07 12:17:35', 'no');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `benutzer_id` int(11) NOT NULL,
  `benutzerinformationen` varchar(200) NOT NULL,
  `geschlecht` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `erstellungsdatum` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `profile`
--

INSERT INTO `profile` (`profile_id`, `benutzer_id`, `benutzerinformationen`, `geschlecht`, `dob`, `profile_pic`, `erstellungsdatum`) VALUES
(1, 1, 'tiere mag ich und sonst alles', 'm', '2013-10-10', '', '2023');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(2, 'buny2@', 'testen1234', 'heute bin ich cool', 'read', '2023-11-16 10:13:09'),
(7, 'testen1234', 'buny2@', 'cool gemacht', 'read', '2023-11-16 11:21:05'),
(10, 'testen1234', 'buny2@', 'man es klappt nicht', 'read', '2023-11-16 11:32:24'),
(13, 'testen1234', 'buny2@', 'was geht ab', 'read', '2023-11-16 11:36:52'),
(16, 'testen1234', 'buny2@', 'ich teste jetzt die datenbank', 'read', '2023-11-16 11:42:04'),
(17, 'testen1234', 'buny2@', 'was gibt es heute', 'read', '2023-11-16 12:22:05'),
(18, 'testen1234', 'buny2@', 'super cool', 'read', '2023-11-16 12:22:12'),
(19, '', 'root', 'was geht ab', 'unread', '2023-11-16 12:29:13'),
(20, 'testen1234', 'buny2@', 'wie gehts dir? ', 'read', '2023-11-16 12:36:45'),
(21, 'buny2@', 'testen1234', 'moin', 'read', '2023-11-16 12:43:26');

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
-- Indizes für die Tabelle `chat_nachricht`
--
ALTER TABLE `chat_nachricht`
  ADD PRIMARY KEY (`chat_nachricht_id`),
  ADD KEY `fk_benutzer_chatnachricht` (`von_user_id`),
  ADD KEY `fk_benutzer_chatnachricht2` (`zu_user_id`);

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
-- Indizes für die Tabelle `liked_beitraege`
--
ALTER TABLE `liked_beitraege`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `unique_like_constraint` (`fk_benutzer_id`,`fk_beitrag_id`),
  ADD KEY `fk_beitrag_like_beitrag` (`fk_beitrag_id`);

--
-- Indizes für die Tabelle `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`),
  ADD KEY `fk_login_details_benutzer` (`fk_login_benutzer_id`);

--
-- Indizes für die Tabelle `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `fk_profile_benutzer` (`benutzer_id`);

--
-- Indizes für die Tabelle `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  MODIFY `beitrag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `benutzer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT für Tabelle `chat_nachricht`
--
ALTER TABLE `chat_nachricht`
  MODIFY `chat_nachricht_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `freundschaft`
--
ALTER TABLE `freundschaft`
  MODIFY `freundschaft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `kommentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT für Tabelle `liked_beitraege`
--
ALTER TABLE `liked_beitraege`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD CONSTRAINT `fk_benutzer_beitrag` FOREIGN KEY (`fk_benutzer_id`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `chat_nachricht`
--
ALTER TABLE `chat_nachricht`
  ADD CONSTRAINT `fk_benutzer_chatnachricht` FOREIGN KEY (`von_user_id`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_benutzer_chatnachricht2` FOREIGN KEY (`zu_user_id`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints der Tabelle `liked_beitraege`
--
ALTER TABLE `liked_beitraege`
  ADD CONSTRAINT `fk_beitrag_like_beitrag` FOREIGN KEY (`fk_beitrag_id`) REFERENCES `beitrag` (`beitrag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_benutzer_like_beitrag` FOREIGN KEY (`fk_benutzer_id`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `fk_login_details_benutzer` FOREIGN KEY (`fk_login_benutzer_id`) REFERENCES `benutzer` (`benutzer_id`);

--
-- Constraints der Tabelle `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_benutzer` FOREIGN KEY (`benutzer_id`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
