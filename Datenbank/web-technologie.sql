-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Jan 2024 um 16:04
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
(80, 'Krafttraining für Anfänger: Die Grundlagen\nKrafttraining ist ein effektiver Weg, um Muskeln aufzubauen und die allgemeine Fitness zu verbessern. Beginne mit einfachen Übungen wie Kniebeugen und Liegestützen, und steigere langsam die Intensität, um optimale Ergebnisse zu erzielen.', 4, '2024-01-24 15:27:39', 68),
(81, 'Gesunde Ernährungstipps für Sportler\nDie richtige Ernährung spielt eine entscheidende Rolle in deiner Fitnessreise. Achte darauf, ausgewogene Mahlzeiten mit einer Mischung aus Protein, Kohlenhydraten und gesunden Fetten zu dir zu nehmen, um deine Leistung zu optimieren.', 4, '2024-01-24 15:27:51', 68),
(82, 'Trinkwasser und Fitness: Warum Hydratation wichtig ist\nTrinke ausreichend Wasser, um während des Trainings hydratisiert zu bleiben. Dein Körper benötigt Flüssigkeit, um optimal zu funktionieren und Muskelkrämpfe zu vermeiden.', 4, '2024-01-24 15:27:58', 68),
(83, 'Yoga für Flexibilität und Entspannung\nYoga ist nicht nur eine großartige Möglichkeit, Flexibilität aufzubauen, sondern auch Stress abzubauen. Füge regelmäßig Yoga-Übungen in deine Routine ein, um Körper und Geist in Einklang zu bringen.', 4, '2024-01-24 15:28:10', 68),
(84, 'Starte den Tag mit einem Lächeln und einem energiegeladenen Workout! 💪 Was ist dein Lieblingsmorgen-Routine-Training? #FitLife #MorningMotivation', 3, '2024-01-24 15:30:15', 59),
(85, 'Gesunde Ernährung ist der Schlüssel! 🍏🥑 Teile deine Lieblingsrezepte für einen kraftvollen Start in die Woche. #CleanEating #HealthyChoices', 3, '2024-01-24 15:30:22', 59),
(86, '🌟 \"Kleine Fortschritte sind auch Fortschritte! 🚀 Jeder Schritt zählt auf dem Weg zu deinen Zielen. Teile deine Erfolge und inspiriere andere. #ProgressNotPerfection #FitnessJourney\"', 3, '2024-01-24 15:30:29', 59),
(87, '🌈 \"Fitness ist mehr als nur körperliche Stärke – es ist ein Abenteuer, das uns lehrt, Grenzen zu überwinden. Welche neuen Fitness-Herausforderungen nimmst du an? #ChallengeYourself #FitAdventure\"', 3, '2024-01-24 15:30:35', 59),
(88, '🧘‍♀️ \"Entspannung ist genauso wichtig wie das Training selbst. Gönn dir heute eine Auszeit für eine Yoga-Session. 🌿 Welche Yoga-Posen liebst du am meisten? #SelfCare #YogaTime\"', 3, '2024-01-24 15:30:41', 59),
(89, '🏃‍♂️ \"Laufe in die Woche mit positiver Energie! 🏃‍♀️ Teile deine besten Laufstrecken und motiviere andere, sich in Bewegung zu setzen. #RunningCommunity #MondayMotivation\"', 3, '2024-01-24 15:31:32', 55),
(90, '🌺 \"Gönne deinem Körper eine Pause, wenn er danach verlangt. Ruhe ist genauso wichtig wie Aktivität. Wie verbringst du deinen wohlverdienten Ruhetag? #RestDay #SelfLove\"', 3, '2024-01-24 15:31:37', 55),
(91, '🌅 \"Mit jedem Sonnenaufgang hast du die Chance, einen neuen Anfang zu machen. Nutze den Tag, um deinen Körper zu stärken und deine Ziele zu verfolgen. 💪☀️ #NewDayNewGoals #MorningWorkout\"', 3, '2024-01-24 15:31:41', 55),
(92, '🍎 \"Gesunde Gewohnheiten beginnen mit kleinen Schritten. Was ist heute deine gesunde Entscheidung? Teile sie mit uns! 🌱 #HealthyChoices #WellnessWednesday\"', 6, '2024-01-24 15:31:47', 55),
(93, '🚴‍♀️ \"Das Wochenende steht vor der Tür! Zeit für Outdoor-Aktivitäten und frische Luft. Welche Outdoor-Sportart steht bei dir auf dem Plan? 🌳🌞 #WeekendWorkout #NatureFitness\"', 4, '2024-01-24 15:32:09', 56),
(94, '🌙 \"Gute Nacht, Welt! 💤 Erinnere dich daran, wie wichtig ausreichender Schlaf für deine Fitnessziele ist. Träume süß und erhole dich gut! 🌌 #SleepWell #RecoveryNight\"', 3, '2024-01-24 15:32:14', 56),
(95, '🌱 \"Nutze den Tag, um deinen Körper zu nähren und zu stärken. Was ist dein Lieblings-Superfood oder gesundes Rezept? Teile es mit uns! 🍇🍓 #NourishYourBody #HealthyEating\"', 5, '2024-01-24 15:36:17', 57),
(96, '🚀 \"Schritte zum Erfolg: Setze klare Ziele, bleibe fokussiert und feiere jeden Fortschritt auf dem Weg. Du bist auf dem richtigen Weg! 💪🎉 #SuccessInMotion #FitnessGoals\"', 4, '2024-01-24 15:36:24', 57),
(97, '🌈 \"Deine Gesundheit, dein Glanz! Strahle von innen heraus, indem du auf deine körperliche und mentale Gesundheit achtest. Wie pflegst du deine innere Strahlkraft? ✨ #WellnessJourney #InnerGlow\"', 4, '2024-01-24 15:37:21', 57),
(98, '🍎 \"Gesunde Gewohnheiten beginnen mit kleinen Schritten. Was ist heute deine gesunde Entscheidung? Teile sie mit uns! 🌱 #HealthyChoices #WellnessWednesday\"', 0, '2024-01-24 15:37:26', 57),
(99, '🌞 \"Ein gesunder Start in den Tag beginnt mit positiven Gedanken und einem aktiven Morgenritual. Wie beginnst du deine Tage gerne? Teile deine Tipps! ☀️🌼 #PositiveMornings #MorningRituals\"', 3, '2024-01-24 15:38:14', 58),
(100, '🍏 \"Iss bunt, lebe gesund! Welches farbenfrohe Gemüse oder Obst bringt einen Hauch von Vitalität auf deinen Teller? 🌈🍍 #EatTheRainbow #NutritionBoost\"', 2, '2024-01-24 15:38:44', 58),
(101, '🧗‍♂️ \"Das Leben ist wie Klettern – manchmal herausfordernd, aber die Aussicht oben ist es wert. Was ist deine nächste Fitness-Herausforderung? 🏔️💪 #ClimbToTheTop #FitnessChallenge\"', 2, '2024-01-24 15:38:48', 58),
(102, '🌙 \"Entspannung ist genauso wichtig wie Aktivität. Wie gestaltest du deine Abende, um Ruhe und Erholung zu finden? 🌌💤 #EveningRelaxation #SelfCare\"', 3, '2024-01-24 15:40:04', 60),
(103, '🚲 \"Heute ist der perfekte Tag für eine Radtour! Spüre den Wind, erkunde neue Wege und genieße die Freiheit auf zwei Rädern. 🚴‍♂️🌳 #BikeAdventures #OutdoorFitness\"', 3, '2024-01-24 15:40:09', 60),
(104, '💦 \"Hydration Check! Erinnere dich daran, genug Wasser zu trinken, um deinen Körper zu unterstützen und in Bestform zu bleiben. 💧🚰 #HydrationNation #DrinkWater\"', 3, '2024-01-24 15:40:13', 60),
(105, '🌱 \"Der Weg zur Fitness ist individuell. Welche Sportart oder Bewegungsform macht dir am meisten Spaß und motiviert dich? Teile deine Leidenschaft! 🏓🎾 #FitnessFun #PassionForMovement\"', 3, '2024-01-24 15:40:18', 60),
(106, '🎶 \"Die richtige Playlist kann dein Workout auf ein neues Level bringen. Was sind deine Lieblings-Songs für motivierende Fitnesssessions? 🎧🏋️‍♀️ #MusicMotivation #WorkoutPlaylist\"', 4, '2024-01-24 15:42:03', 61),
(107, '🌟 \"Dein Körper ist ein Kunstwerk in Arbeit. Welche Fortschritte oder Veränderungen bemerkst du auf deiner Fitnessreise? 🎨💪 #BodyTransformation #ProgressPic\"', 4, '2024-01-24 15:42:07', 61),
(108, '🏆 \"Feiere deine Erfolge, groß oder klein! Jeder Schritt zählt auf dem Weg zu einem gesünderen, fitteren Selbst. 🎉💪 #CelebrateSuccess #FitnessMilestone\"', 4, '2024-01-24 15:42:11', 61),
(109, '🍃 \"Die Natur als Fitnessstudio: Genieße ein Workout im Freien und lass dich von der Energie der Natur inspirieren. Welche Outdoor-Übungen bevorzugst du? 🌿🏞️ #NatureFitness #OutdoorWorkout\"', 4, '2024-01-24 15:43:30', 62),
(110, '🌅 \"Der frühe Vogel fängt den Wurm und du fängst den Tag mit einem energiegeladenen Morgen-Training! Welche Übungen gehören zu deiner Morgenroutine? ☀️💪 #EarlyBirdWorkout #MorningEnergy\"', 3, '2024-01-24 15:43:36', 62),
(111, '🍽️ \"Deine Ernährung, dein Treibstoff! Teile dein leckeres und gesundes Mittagessen, um andere zur gesunden Ernährung zu inspirieren. 🥗🍽️ #HealthyLunch #NutrientBoost\"', 3, '2024-01-24 15:43:42', 62),
(112, '🤸 \"Flexibilität ist der Schlüssel zu einem starken Körper. Welche Stretching-Übungen integrierst du in dein Training, um beweglich zu bleiben? 🤸‍♀️💫 #FlexibilityTraining #StretchItOut\"', 3, '2024-01-24 15:44:20', 63),
(113, '🌟 \"Deine Gedanken formen deine Realität. Denke positiv, trainiere hart und erreiche Großes! Welcher positive Gedanke motiviert dich heute? 💭💪 #PositiveMindset #FitnessMindset\"', 3, '2024-01-24 15:44:24', 63),
(114, '🏋️‍♂️ \"Heute ist kein Tag für Ausreden, sondern ein Tag für starke Entscheidungen! Geh raus und hol dir dein Workout. 💥💦 #NoExcuses #WorkoutWednesday\"', 3, '2024-01-24 15:44:29', 63),
(115, '🌈 \"Gesundheit ist ein Geschenk, für das wir dankbar sein sollten. Was sind die kleinen Gesundheitsgewohnheiten, für die du dankbar bist? 🙏💚 #GratitudeForHealth #WellnessJourney\"', 0, '2024-01-24 15:46:08', 65),
(116, '🚶 \"Manchmal ist ein einfacher Spaziergang der beste Weg, um den Kopf freizubekommen. Geh raus, atme tief durch und genieße die Bewegung. 🚶‍♀️🍃 #MindfulWalking #FreshAirFitness\"', 0, '2024-01-24 15:46:13', 65),
(117, '🌙 \"Ein Tag endet am besten mit einem zufriedenen Lächeln. Wie schaffst du es, am Abend zur Ruhe zu kommen? 😊🌙 #EveningCalm #NightRoutine\"', 1, '2024-01-24 15:46:47', 66),
(118, '🏆 \"Die größten Siege beginnen mit kleinen Siege im Alltag. Was war deine heutige persönliche Erfolgsgeschichte? Teile sie mit uns! 🏅💪 #DailyWins #PersonalGrowth\"', 1, '2024-01-24 15:46:51', 66),
(119, '🍓 \"Frühstück der Champions! Teile dein Power-Frühstück und inspiriere andere, mit Energie in den Tag zu starten. 🌞🍴 #BreakfastGoals #MorningFuel\"', 2, '2024-01-24 15:47:50', 67),
(120, '🧘 \"Atme tief ein, atme tief aus. Gönn dir heute eine kurze Atempause, um Stress abzubauen und frische Energie zu tanken. 💆‍♂️🌬️ #MindfulBreathing #StressRelief\"', 2, '2024-01-24 15:47:57', 67),
(121, '🥇 \"Deine einzige Konkurrenz sollte die Person sein, die du gestern warst. Fordere dich selbst heraus und wachse über deine Grenzen hinaus! 💪🏋️‍♀️ #SelfImprovement #PersonalGrowth\"', 0, '2024-01-24 15:48:39', 68),
(122, '🌳 \"Verbinde dich mit der Natur und deiner inneren Stärke. Ein Outdoor-Workout inmitten von Bäumen kann erstaunlich belebend sein. 🌲💪 #ForestFitness #NatureTherapy\"', 0, '2024-01-24 15:48:44', 68),
(123, '🍇 \"Farbenfrohe Snackzeit! Welche gesunden Snacks begleiten dich durch den Tag? Teile deine Favoriten! 🍇🥦 #HealthySnacking #NutritionBoost\"', 0, '2024-01-24 15:48:48', 68);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `benutzer_id` int(20) NOT NULL,
  `benutzername` varchar(200) NOT NULL,
  `passwort` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `rolle` varchar(20) NOT NULL,
  `profile_informationen` text NOT NULL,
  `user_profil` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `forgotten_answer` varchar(100) NOT NULL,
  `log_in` varchar(7) NOT NULL,
  `last_activity` datetime DEFAULT '2024-01-20 00:00:00',
  `passwort_reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`benutzer_id`, `benutzername`, `passwort`, `email`, `rolle`, `profile_informationen`, `user_profil`, `user_country`, `user_gender`, `forgotten_answer`, `log_in`, `last_activity`, `passwort_reset_token`) VALUES
(55, 'Sophie', '$2y$10$xgMNbwO6r82gHBQArNmKBONPMT6hG0a/ho97SjLqvCxgNqvaZcLWK', 'sophie@hotmail.de', '', 'Sport, Gymnastik, Voleyball, Schwimmen, Uni', 'images_profile/sophie.jpg.92', 'Germany', 'Female', '', 'Offline', '2024-01-24 15:52:47', NULL),
(56, 'lara', '$2y$10$z0UmZ653KBHgvceb474DPOlc1hH.nx3IwePONakgFEhkoUYJ4XFhm', 'lara@hotmail.de', '', 'Welness, Gymnastik, Wirtschaft, Sport, Uni', 'images_profile/lara.jpg.99', 'Belgium', 'Female', '', 'Offline', '2024-01-24 15:53:41', NULL),
(57, 'lena', '$2y$10$jiV/oSEIog4fMR859BTA9uzSMWy9iJPEgFrkEZ2MUMZiXkgoNAQg2', 'lena@hotmail.de', '', 'Sport, Tennis, Schwimmen, Fitness', 'images_profile/lena.jpg.56', 'France', 'Female', '', 'Offline', '2024-01-24 15:53:49', NULL),
(58, 'eva', '$2y$10$QQilQ9bP1ey7e3IUwmqaaumwGo2VrZS0HTl0KfY/b6Pbs09fPm17C', 'eva@hotmail.de', '', 'Wirtschaft, sport, fitness, uni, arbeit', 'images_profile/eva.jpg.13', 'Turkey', 'Female', '', 'Offline', '2024-01-24 15:56:07', NULL),
(59, 'laila', '$2y$10$twFqivuiq2s1yNOmd6iTyO58JYYCssDay4uqXl9IsJhluYDNdJqdK', 'laila@hotmail.de', '', 'gymnastik, voleyball, schwimmen, sport, lernen', 'images_profile/laila.jpg.20', 'Germany', 'Female', '', 'Offline', '2024-01-24 15:56:58', NULL),
(60, 'albert', '$2y$10$KpABBrk8dLGODczP4zTh7eoB0u7ElO7fFml/fpl4ehlefHYdYqOTq', 'albert@hotmail.de', '', 'tennis, sport, lernen, fußball, handball, wirtschaftsinformatik', 'images_profile/albert.jpg.99', 'Belgium', 'Male', '', 'Offline', '2024-01-24 15:58:17', NULL),
(61, 'tobias', '$2y$10$AvY9KcVIHrTKZJ8ctcGjreA5sWlg/ss9IvMaIFGS8n5E7iiKEikBC', 'tobias@hotmail.de', '', 'sport, fußball, tennis, uni, arbeit', 'images_profile/tobias.jpg.7', 'Germany', 'Male', '', 'Offline', '2024-01-24 15:59:23', NULL),
(62, 'lorenz', '$2y$10$JidwLNHhwQTF7EFgeguQN.1RK7l4IWpwMRc1hOYjBJfSrltLQxadW', 'lorenz@hotmail.de', '', 'schwimmen, fitness, wirtschaft, uni, sport', 'images_profile/lorenz.jpg.54', 'France', 'Male', '', 'Offline', '2024-01-24 16:00:19', NULL),
(63, 'marie', '$2y$10$04jHrzan1lPpg5GzTa8xcOLmxzyNLysrgg5BWFiM.8GTxPgJvfEN6', 'marie@hotmail.de', '', 'gymnastik, sport, lernen, schwimmen, arbeit, uni', 'images_profile/marie.jpg.59', 'Turkey', 'Female', '', 'Offline', '2024-01-24 16:01:35', NULL),
(64, 'alfred', '$2y$10$5ksDiSKQkdPiz5ArsimfJO/mzmVklCOPMs.L.QhgH2/Woascgx9bW', 'alfred@hotmail.de', '', 'lesen, zocken, arbeit, zeichnen', 'images_profile/alfred.jpg.89', 'Germany', 'Male', '', 'Offline', '2024-01-24 15:16:38', NULL),
(65, 'annika', '$2y$10$at/slMF.iEQlfVp49yzL2uVKsHLaKaZjxDr82fDUsmFi8HL0SvVqa', 'annika@hotmail.de', '', 'lesen, zeichnen, schwimmen, wirtschaft, informatik', 'images_profile/annika.jpg.46', 'Belgium', 'Female', '', 'Offline', '2024-01-24 16:02:20', NULL),
(66, 'gina', '$2y$10$RoNh9jaaoQkk3pPB8MHoi.YaoGM9scaDkzOo.xQ1YahXBYYE/2Acu', 'gina@hotmail.de', '', 'kochen, lesen, gymnastik, voleyball, backen, kochen', 'images_profile/gina.jpg.51', 'Turkey', 'Female', '', 'Offline', '2024-01-24 16:03:04', NULL),
(67, 'sabine', '$2y$10$ETNLIESxaqwSheOWiVZ3veaHGq51/cijfisrgGBZ7BD0Yo35W82Zm', 'sabine@hotmail.de', '', 'wirtschaft, informatik, sport, schwimmen, tennis', 'images_profile/sabine.jpg.73', 'Belgium', 'Female', '', 'Offline', '2024-01-24 15:48:07', NULL),
(68, 'nadine', '$2y$10$e7ZMI3lFMYXHBH00hMmX5ujv4k36TKe7ENW/kJobQRXBacoTtYGeq', 'nadine@hotmail.de', '', 'kochen, backen, lesen, schwimmen', 'images_profile/nadine.jpg.8', 'Germany', 'Female', '', 'Offline', '2024-01-24 16:03:20', NULL);

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
(40, 1, 60, 64),
(41, 1, 60, 58),
(42, 1, 57, 58),
(43, 1, 65, 60),
(44, 1, 60, 67),
(45, 1, 63, 61),
(46, 1, 61, 55),
(47, 1, 60, 58),
(48, 1, 59, 56),
(49, 1, 62, 63),
(50, 1, 55, 65),
(51, 1, 66, 62),
(52, 1, 59, 62),
(53, 1, 61, 56),
(54, 1, 63, 66),
(55, 1, 68, 67),
(56, 1, 64, 63),
(57, 1, 57, 68),
(58, 1, 61, 58),
(59, 1, 59, 60),
(60, 1, 59, 56),
(61, 1, 55, 64),
(62, 1, 57, 61),
(63, 1, 56, 63),
(64, 1, 68, 66),
(65, 1, 61, 57),
(66, 1, 63, 65),
(67, 1, 55, 57),
(68, 1, 62, 57),
(69, 1, 64, 67),
(70, 0, 68, 59),
(71, 0, 68, 64),
(72, 0, 59, 58),
(73, 0, 59, 65),
(74, 0, 55, 56),
(75, 0, 55, 68),
(76, 0, 55, 62),
(77, 0, 57, 59),
(78, 0, 57, 64),
(79, 0, 57, 66),
(80, 0, 58, 55),
(81, 0, 58, 63),
(82, 0, 58, 67),
(83, 0, 60, 61),
(84, 0, 60, 63),
(85, 0, 61, 64),
(86, 0, 61, 67),
(87, 0, 61, 65),
(88, 0, 62, 56),
(89, 0, 62, 64),
(90, 0, 63, 59),
(91, 0, 65, 64),
(92, 0, 65, 57),
(93, 0, 66, 67),
(94, 0, 66, 58),
(95, 0, 67, 63),
(96, 0, 68, 61);

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
(47, 'super beitrag', '2024-01-24 15:32:58', 85, 56),
(48, 'wow', '2024-01-24 15:33:22', 84, 56),
(49, 'top', '2024-01-24 15:39:12', 84, 60),
(50, 'wowww', '2024-01-24 15:39:21', 85, 60);

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
(30, 56, 84),
(34, 56, 85),
(33, 56, 86),
(31, 56, 87),
(32, 56, 88),
(36, 56, 93),
(35, 56, 94),
(41, 57, 80),
(40, 57, 81),
(39, 57, 82),
(38, 57, 83),
(45, 57, 89),
(44, 57, 90),
(43, 57, 91),
(42, 57, 92),
(37, 57, 95),
(133, 57, 106),
(134, 57, 107),
(135, 57, 108),
(49, 58, 92),
(46, 58, 95),
(47, 58, 96),
(48, 58, 97),
(50, 58, 99),
(136, 58, 106),
(137, 58, 107),
(138, 58, 108),
(142, 59, 93),
(139, 59, 109),
(140, 59, 110),
(141, 59, 111),
(51, 60, 84),
(58, 60, 85),
(57, 60, 86),
(56, 60, 87),
(55, 60, 88),
(54, 60, 99),
(53, 60, 100),
(52, 60, 101),
(62, 60, 102),
(61, 60, 103),
(60, 60, 104),
(59, 60, 105),
(143, 60, 119),
(144, 60, 120),
(63, 61, 89),
(68, 61, 90),
(67, 61, 91),
(66, 61, 92),
(70, 61, 93),
(71, 61, 94),
(65, 61, 95),
(64, 61, 96),
(69, 61, 97),
(72, 61, 99),
(73, 61, 100),
(74, 61, 101),
(145, 61, 106),
(146, 61, 107),
(147, 61, 108),
(79, 62, 84),
(80, 62, 85),
(81, 62, 86),
(82, 62, 87),
(83, 62, 88),
(78, 62, 92),
(75, 62, 95),
(76, 62, 96),
(77, 62, 97),
(151, 62, 109),
(148, 62, 112),
(149, 62, 113),
(150, 62, 114),
(90, 63, 93),
(91, 63, 94),
(84, 63, 106),
(85, 63, 107),
(86, 63, 108),
(87, 63, 109),
(88, 63, 110),
(89, 63, 111),
(92, 65, 89),
(93, 65, 90),
(94, 65, 91),
(95, 65, 92),
(99, 65, 102),
(100, 65, 103),
(101, 65, 104),
(102, 65, 105),
(96, 65, 112),
(97, 65, 113),
(98, 65, 114),
(103, 66, 80),
(104, 66, 81),
(105, 66, 82),
(106, 66, 83),
(110, 66, 109),
(111, 66, 110),
(112, 66, 111),
(107, 66, 112),
(108, 66, 113),
(109, 66, 114),
(113, 67, 80),
(114, 67, 81),
(115, 67, 82),
(116, 67, 83),
(117, 67, 102),
(118, 67, 103),
(119, 67, 104),
(120, 67, 105),
(123, 68, 80),
(124, 68, 81),
(125, 68, 82),
(126, 68, 83),
(130, 68, 92),
(127, 68, 95),
(128, 68, 96),
(129, 68, 97),
(131, 68, 117),
(132, 68, 118),
(121, 68, 119),
(122, 68, 120);

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `meal_plans`
--

CREATE TABLE `meal_plans` (
  `plan_id` int(11) NOT NULL,
  `benutzer_id` int(11) NOT NULL,
  `plan_daten` text NOT NULL,
  `zeitstempel` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `meal_plans`
--

INSERT INTO `meal_plans` (`plan_id`, `benutzer_id`, `plan_daten`, `zeitstempel`) VALUES
(33, 55, '{\"week\":{\"monday\":{\"meals\":[{\"id\":655730,\"imageType\":\"jpg\",\"title\":\"Perfect Granola\",\"readyInMinutes\":45,\"servings\":20,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/perfect-granola-655730\"},{\"id\":1095827,\"imageType\":\"jpg\",\"title\":\"Ginger-Garlic and Lime Chicken Thighs with Escarole Salad\",\"readyInMinutes\":30,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/ginger-garlic-and-lime-chicken-thighs-with-escarole-salad-1095827\"},{\"id\":660490,\"imageType\":\"jpg\",\"title\":\"Sockeye Salmon on Kiwi & Lemon Puree\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/sockeye-salmon-on-kiwi-lemon-puree-660490\"}],\"nutrients\":{\"calories\":2099.79,\"protein\":142.61,\"fat\":141.84,\"carbohydrates\":62.61}},\"tuesday\":{\"meals\":[{\"id\":635446,\"imageType\":\"jpg\",\"title\":\"Blueberry Cinnamon Porridge\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-cinnamon-porridge-635446\"},{\"id\":157399,\"imageType\":\"jpg\",\"title\":\"Crispy-Crowned Guacamole Fish Fillets\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crispy-crowned-guacamole-fish-fillets-157399\"},{\"id\":654439,\"imageType\":\"jpg\",\"title\":\"Pan Seared Shrimp & Scallops Over Bacon-Corn-Chile Relish\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/pan-seared-shrimp-scallops-over-bacon-corn-chile-relish-654439\"}],\"nutrients\":{\"calories\":2100.08,\"protein\":104.42,\"fat\":144.98,\"carbohydrates\":125.29}},\"wednesday\":{\"meals\":[{\"id\":157259,\"imageType\":\"jpg\",\"title\":\"Cocoa Protein Pancakes\",\"readyInMinutes\":15,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/cocoa-protein-pancakes-157259\"},{\"id\":157344,\"imageType\":\"jpg\",\"title\":\"Spicy Salad with Kidney Beans, Cheddar, and Nuts\",\"readyInMinutes\":10,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spicy-salad-with-kidney-beans-cheddar-and-nuts-157344\"},{\"id\":633321,\"imageType\":\"jpg\",\"title\":\"Bacon Potato Cake with Cheese\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/bacon-potato-cake-with-cheese-633321\"}],\"nutrients\":{\"calories\":2100.02,\"protein\":89.48,\"fat\":109.84,\"carbohydrates\":201.41}},\"thursday\":{\"meals\":[{\"id\":634848,\"imageType\":\"jpg\",\"title\":\"Berries and Cream Yogurt Parfait\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/berries-and-cream-yogurt-parfait-634848\"},{\"id\":986003,\"imageType\":\"jpg\",\"title\":\"Instant Pot Chicken Tacos\",\"readyInMinutes\":25,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/instant-pot-chicken-tacos-986003\"},{\"id\":648983,\"imageType\":\"jpg\",\"title\":\"Knishes - Potato Filling\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/knishes-potato-filling-648983\"}],\"nutrients\":{\"calories\":2099.85,\"protein\":125.8,\"fat\":125.13,\"carbohydrates\":119.45}},\"friday\":{\"meals\":[{\"id\":640194,\"imageType\":\"jpg\",\"title\":\"Country Breakfast: Tofu and Veggie Scramble With Home Fries\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/country-breakfast-tofu-and-veggie-scramble-with-home-fries-640194\"},{\"id\":715769,\"imageType\":\"jpg\",\"title\":\"Broccolini Quinoa Pilaf\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/broccolini-quinoa-pilaf-715769\"},{\"id\":650487,\"imageType\":\"jpg\",\"title\":\"Lusciously Lemony Lentil Soup\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lusciously-lemony-lentil-soup-650487\"}],\"nutrients\":{\"calories\":2100.01,\"protein\":95.52,\"fat\":141.04,\"carbohydrates\":124.16}},\"saturday\":{\"meals\":[{\"id\":648013,\"imageType\":\"jpg\",\"title\":\"Iron - Rich Gluten Free Vegan Muffins\",\"readyInMinutes\":45,\"servings\":16,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/iron-rich-gluten-free-vegan-muffins-648013\"},{\"id\":715523,\"imageType\":\"jpg\",\"title\":\"Chorizo and Beef Quinoa Stuffed Pepper\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/chorizo-and-beef-quinoa-stuffed-pepper-715523\"},{\"id\":664718,\"imageType\":\"jpg\",\"title\":\"Vegetarian Tostadas\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/vegetarian-tostadas-664718\"}],\"nutrients\":{\"calories\":2099.66,\"protein\":100.06,\"fat\":97.49,\"carbohydrates\":203.93}},\"sunday\":{\"meals\":[{\"id\":655219,\"imageType\":\"jpg\",\"title\":\"Peanut Butter And Chocolate Oatmeal\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/peanut-butter-and-chocolate-oatmeal-655219\"},{\"id\":650377,\"imageType\":\"jpg\",\"title\":\"Low Carb Brunch Burger\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/low-carb-brunch-burger-650377\"},{\"id\":1502521,\"imageType\":\"jpg\",\"title\":\"Crack Chicken Chili\",\"readyInMinutes\":30,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crack-chicken-chili-1502521\"}],\"nutrients\":{\"calories\":2099.87,\"protein\":99.52,\"fat\":134.69,\"carbohydrates\":131.89}}}}', '2024-01-24 14:51:03'),
(34, 55, '{\"week\":{\"monday\":{\"meals\":[{\"id\":661421,\"imageType\":\"jpg\",\"title\":\"Spring Onion & Asparagus Frittata\",\"readyInMinutes\":30,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spring-onion-asparagus-frittata-661421\"},{\"id\":637569,\"imageType\":\"jpg\",\"title\":\"Cheese Pork Chops\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/cheese-pork-chops-637569\"},{\"id\":659192,\"imageType\":\"jpg\",\"title\":\"Salt-Crusted Snapper With Blood Orange and Bay\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/salt-crusted-snapper-with-blood-orange-and-bay-659192\"}],\"nutrients\":{\"calories\":2100.2,\"protein\":332.91,\"fat\":70.22,\"carbohydrates\":15.32}},\"tuesday\":{\"meals\":[{\"id\":1100990,\"imageType\":\"jpg\",\"title\":\"Blueberry, Chocolate & Cocao Superfood Pancakes - Gluten-Free\\/Paleo\\/Vegan\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-chocolate-cocao-superfood-pancakes-gluten-free-paleo-vegan-1100990\"},{\"id\":1095794,\"imageType\":\"jpg\",\"title\":\"Spanish Tortilla\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spanish-tortilla-1095794\"},{\"id\":641208,\"imageType\":\"jpg\",\"title\":\"Dak Bulgogi - Korean BBQ Chicken\",\"readyInMinutes\":400,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/dak-bulgogi-korean-bbq-chicken-641208\"}],\"nutrients\":{\"calories\":2100.14,\"protein\":108.92,\"fat\":131.63,\"carbohydrates\":122.92}},\"wednesday\":{\"meals\":[{\"id\":1100990,\"imageType\":\"jpg\",\"title\":\"Blueberry, Chocolate & Cocao Superfood Pancakes - Gluten-Free\\/Paleo\\/Vegan\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-chocolate-cocao-superfood-pancakes-gluten-free-paleo-vegan-1100990\"},{\"id\":982371,\"imageType\":\"jpg\",\"title\":\"Instant Pot Quinoa Grain Bowl\",\"readyInMinutes\":13,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/instant-pot-quinoa-grain-bowl-982371\"},{\"id\":637285,\"imageType\":\"jpg\",\"title\":\"Catfish Tacos With Pimento Cheese Crema and Watermelon Salsa\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/catfish-tacos-with-pimento-cheese-crema-and-watermelon-salsa-637285\"}],\"nutrients\":{\"calories\":2100.09,\"protein\":58.64,\"fat\":112.36,\"carbohydrates\":228.81}},\"thursday\":{\"meals\":[{\"id\":1100990,\"imageType\":\"jpg\",\"title\":\"Blueberry, Chocolate & Cocao Superfood Pancakes - Gluten-Free\\/Paleo\\/Vegan\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-chocolate-cocao-superfood-pancakes-gluten-free-paleo-vegan-1100990\"},{\"id\":157399,\"imageType\":\"jpg\",\"title\":\"Crispy-Crowned Guacamole Fish Fillets\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crispy-crowned-guacamole-fish-fillets-157399\"},{\"id\":642610,\"imageType\":\"jpg\",\"title\":\"Farm Fresh Vegetable Stew\",\"readyInMinutes\":45,\"servings\":7,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/farm-fresh-vegetable-stew-642610\"}],\"nutrients\":{\"calories\":2100.03,\"protein\":104.72,\"fat\":105.34,\"carbohydrates\":210.55}},\"friday\":{\"meals\":[{\"id\":650239,\"imageType\":\"jpg\",\"title\":\"Loaded Veggie Omelet\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/loaded-veggie-omelet-650239\"},{\"id\":642941,\"imageType\":\"jpg\",\"title\":\"Fish Fillet In Creamy Coconut Curry\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fish-fillet-in-creamy-coconut-curry-642941\"},{\"id\":640117,\"imageType\":\"jpg\",\"title\":\"Corn-Crusted Fish Tacos With Jalapeno-Lime Sauce and Spicy Black Beans\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/corn-crusted-fish-tacos-with-jalapeno-lime-sauce-and-spicy-black-beans-640117\"}],\"nutrients\":{\"calories\":2100.23,\"protein\":102.46,\"fat\":111.57,\"carbohydrates\":184.65}},\"saturday\":{\"meals\":[{\"id\":663680,\"imageType\":\"jpg\",\"title\":\"Torta (Filipino Omelet)\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/torta-filipino-omelet-663680\"},{\"id\":715523,\"imageType\":\"jpg\",\"title\":\"Chorizo and Beef Quinoa Stuffed Pepper\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/chorizo-and-beef-quinoa-stuffed-pepper-715523\"},{\"id\":653835,\"imageType\":\"jpg\",\"title\":\"Orange Chicken With Brown Rice (Gluten-Free)\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/orange-chicken-with-brown-rice-gluten-free-653835\"}],\"nutrients\":{\"calories\":2099.96,\"protein\":119.49,\"fat\":129.38,\"carbohydrates\":110.1}},\"sunday\":{\"meals\":[{\"id\":641890,\"imageType\":\"jpg\",\"title\":\"Easy Cheesy Scrambled Eggs\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/easy-cheesy-scrambled-eggs-641890\"},{\"id\":662880,\"imageType\":\"jpg\",\"title\":\"Tarragon Chicken With Peas\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/tarragon-chicken-with-peas-662880\"},{\"id\":661395,\"imageType\":\"jpg\",\"title\":\"Split-Pea Soup\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/split-pea-soup-661395\"}],\"nutrients\":{\"calories\":2099.89,\"protein\":155.7,\"fat\":95.35,\"carbohydrates\":158.08}}}}', '2024-01-24 14:52:45'),
(35, 56, '{\"week\":{\"monday\":{\"meals\":[{\"id\":644045,\"imageType\":\"jpg\",\"title\":\"Fruity Yogurt Parfait\",\"readyInMinutes\":45,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fruity-yogurt-parfait-644045\"},{\"id\":715523,\"imageType\":\"jpg\",\"title\":\"Chorizo and Beef Quinoa Stuffed Pepper\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/chorizo-and-beef-quinoa-stuffed-pepper-715523\"},{\"id\":642712,\"imageType\":\"jpg\",\"title\":\"Fettuccine Alla Carbonara, With No Cream Necessary\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fettuccine-alla-carbonara-with-no-cream-necessary-642712\"}],\"nutrients\":{\"calories\":2199.93,\"protein\":125.69,\"fat\":112.87,\"carbohydrates\":162.42}},\"tuesday\":{\"meals\":[{\"id\":1697823,\"imageType\":\"jpg\",\"title\":\"Bacon-Apple-Pecan Stuffed French Toast\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/bacon-apple-pecan-stuffed-french-toast-1697823\"},{\"id\":662880,\"imageType\":\"jpg\",\"title\":\"Tarragon Chicken With Peas\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/tarragon-chicken-with-peas-662880\"},{\"id\":1697577,\"imageType\":\"jpg\",\"title\":\"Spanish Sardines Pasta\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spanish-sardines-pasta-1697577\"}],\"nutrients\":{\"calories\":2200.35,\"protein\":110.55,\"fat\":133.04,\"carbohydrates\":143.91}},\"wednesday\":{\"meals\":[{\"id\":634206,\"imageType\":\"jpg\",\"title\":\"Banana Zucchini Muffins\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/banana-zucchini-muffins-634206\"},{\"id\":776505,\"imageType\":\"jpg\",\"title\":\"Sausage & Pepperoni Stromboli\",\"readyInMinutes\":28,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/sausage-pepperoni-stromboli-776505\"},{\"id\":1697607,\"imageType\":\"jpg\",\"title\":\"Easy Homemade Chicken and Dumplings from Scratch\",\"readyInMinutes\":85,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/easy-homemade-chicken-and-dumplings-from-scratch-1697607\"}],\"nutrients\":{\"calories\":2199.99,\"protein\":110.67,\"fat\":136.86,\"carbohydrates\":132.74}},\"thursday\":{\"meals\":[{\"id\":650239,\"imageType\":\"jpg\",\"title\":\"Loaded Veggie Omelet\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/loaded-veggie-omelet-650239\"},{\"id\":1697583,\"imageType\":\"jpg\",\"title\":\"Crispy Ravioli Formaggi\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crispy-ravioli-formaggi-1697583\"},{\"id\":661048,\"imageType\":\"jpg\",\"title\":\"Spicy Chicken Corn Dogs with Homemade Chili Sauce\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spicy-chicken-corn-dogs-with-homemade-chili-sauce-661048\"}],\"nutrients\":{\"calories\":2199.94,\"protein\":67.49,\"fat\":165.66,\"carbohydrates\":118.16}},\"friday\":{\"meals\":[{\"id\":664280,\"imageType\":\"jpg\",\"title\":\"Vanilla Bean Cherry Granola Bars\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/vanilla-bean-cherry-granola-bars-664280\"},{\"id\":642281,\"imageType\":\"jpg\",\"title\":\"Eggplant Caprese Stack Appetizers\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/eggplant-caprese-stack-appetizers-642281\"},{\"id\":668492,\"imageType\":\"jpg\",\"title\":\"Creamy zucchini and ham pasta\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/creamy-zucchini-and-ham-pasta-668492\"}],\"nutrients\":{\"calories\":2199.91,\"protein\":71.65,\"fat\":137.28,\"carbohydrates\":176.56}},\"saturday\":{\"meals\":[{\"id\":636026,\"imageType\":\"jpg\",\"title\":\"Breakfast Biscuits and Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/breakfast-biscuits-and-gravy-636026\"},{\"id\":1095992,\"imageType\":\"jpg\",\"title\":\"Turkey Ranch BLT\",\"readyInMinutes\":10,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/turkey-ranch-blt-1095992\"},{\"id\":715623,\"imageType\":\"jpg\",\"title\":\"Loaded Nachos\",\"readyInMinutes\":45,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/loaded-nachos-715623\"}],\"nutrients\":{\"calories\":2200.26,\"protein\":100.05,\"fat\":124.44,\"carbohydrates\":173.02}},\"sunday\":{\"meals\":[{\"id\":655060,\"imageType\":\"jpg\",\"title\":\"Peach & Brown Sugar Pancakes\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/peach-brown-sugar-pancakes-655060\"},{\"id\":643789,\"imageType\":\"jpg\",\"title\":\"Fried Salmon Cakes\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fried-salmon-cakes-643789\"},{\"id\":661055,\"imageType\":\"jpg\",\"title\":\"Spicy Chili w Boneless Beef Short Ribs\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spicy-chili-w-boneless-beef-short-ribs-661055\"}],\"nutrients\":{\"calories\":2200.08,\"protein\":129.38,\"fat\":116.67,\"carbohydrates\":161.57}}}}', '2024-01-24 14:53:02'),
(36, 57, '{\"week\":{\"monday\":{\"meals\":[{\"id\":634318,\"imageType\":\"jpg\",\"title\":\"Barbecued Shrimp & Grits\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/barbecued-shrimp-grits-634318\"},{\"id\":663050,\"imageType\":\"jpg\",\"title\":\"Tex-Mex Burger\",\"readyInMinutes\":15,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/tex-mex-burger-663050\"},{\"id\":640601,\"imageType\":\"jpg\",\"title\":\"Creamy Broccoli and Smoked Salmon Pie\",\"readyInMinutes\":60,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/creamy-broccoli-and-smoked-salmon-pie-640601\"}],\"nutrients\":{\"calories\":2399.87,\"protein\":118.76,\"fat\":153.08,\"carbohydrates\":135.01}},\"tuesday\":{\"meals\":[{\"id\":634318,\"imageType\":\"jpg\",\"title\":\"Barbecued Shrimp & Grits\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/barbecued-shrimp-grits-634318\"},{\"id\":649988,\"imageType\":\"jpg\",\"title\":\"Light and Easy Alfredo\",\"readyInMinutes\":15,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/light-and-easy-alfredo-649988\"},{\"id\":649030,\"imageType\":\"jpg\",\"title\":\"Korean Beef Rice Bowl\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/korean-beef-rice-bowl-649030\"}],\"nutrients\":{\"calories\":2400.05,\"protein\":96.47,\"fat\":89.03,\"carbohydrates\":296.09}},\"wednesday\":{\"meals\":[{\"id\":636026,\"imageType\":\"jpg\",\"title\":\"Breakfast Biscuits and Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/breakfast-biscuits-and-gravy-636026\"},{\"id\":650119,\"imageType\":\"jpg\",\"title\":\"Linguine Alla Carbonara\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/linguine-alla-carbonara-650119\"},{\"id\":664748,\"imageType\":\"jpg\",\"title\":\"Veggie Meatloaf\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/veggie-meatloaf-664748\"}],\"nutrients\":{\"calories\":2399.88,\"protein\":103.93,\"fat\":146.83,\"carbohydrates\":162.55}},\"thursday\":{\"meals\":[{\"id\":649824,\"imageType\":\"jpg\",\"title\":\"Lemon Zucchini Muffins\",\"readyInMinutes\":45,\"servings\":10,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lemon-zucchini-muffins-649824\"},{\"id\":1095806,\"imageType\":\"jpg\",\"title\":\"Spanish style salmon fillets\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spanish-style-salmon-fillets-1095806\"},{\"id\":639629,\"imageType\":\"jpg\",\"title\":\"Classic Macaroni and Cheese\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/classic-macaroni-and-cheese-639629\"}],\"nutrients\":{\"calories\":2399.67,\"protein\":102.14,\"fat\":126.59,\"carbohydrates\":217.21}},\"friday\":{\"meals\":[{\"id\":639726,\"imageType\":\"jpg\",\"title\":\"Coconut Banana Nut Bread\",\"readyInMinutes\":45,\"servings\":12,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/coconut-banana-nut-bread-639726\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"},{\"id\":633884,\"imageType\":\"jpg\",\"title\":\"Baked Ziti Or Rigatoni\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/baked-ziti-or-rigatoni-633884\"}],\"nutrients\":{\"calories\":2399.59,\"protein\":97.63,\"fat\":73.4,\"carbohydrates\":341.72}},\"saturday\":{\"meals\":[{\"id\":622598,\"imageType\":\"jpg\",\"title\":\"Pittata - Pizza Frittata\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/pittata-pizza-frittata-622598\"},{\"id\":662880,\"imageType\":\"jpg\",\"title\":\"Tarragon Chicken With Peas\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/tarragon-chicken-with-peas-662880\"},{\"id\":657011,\"imageType\":\"jpg\",\"title\":\"Potato-Cheese Pie\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/potato-cheese-pie-657011\"}],\"nutrients\":{\"calories\":2400.23,\"protein\":121.92,\"fat\":162.67,\"carbohydrates\":111.55}},\"sunday\":{\"meals\":[{\"id\":655060,\"imageType\":\"jpg\",\"title\":\"Peach & Brown Sugar Pancakes\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/peach-brown-sugar-pancakes-655060\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"},{\"id\":655634,\"imageType\":\"jpg\",\"title\":\"Pepita Crusted Chicken Salad With Sweet Adobo Vinaigrette\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/pepita-crusted-chicken-salad-with-sweet-adobo-vinaigrette-655634\"}],\"nutrients\":{\"calories\":2400.05,\"protein\":101.56,\"fat\":84.8,\"carbohydrates\":313.43}}}}', '2024-01-24 14:54:03'),
(37, 58, '{\"week\":{\"monday\":{\"meals\":[{\"id\":643857,\"imageType\":\"jpg\",\"title\":\"Frittata\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/frittata-643857\"},{\"id\":1160166,\"imageType\":\"jpg\",\"title\":\"How to Make an Amazing Chicken Salad with Apples and Celery\",\"readyInMinutes\":10,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/how-to-make-an-amazing-chicken-salad-with-apples-and-celery-1160166\"},{\"id\":650112,\"imageType\":\"jpg\",\"title\":\"Linefish Simmered In A Spiced Coconut Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/linefish-simmered-in-a-spiced-coconut-gravy-650112\"}],\"nutrients\":{\"calories\":1900.04,\"protein\":149.99,\"fat\":122.34,\"carbohydrates\":65.05}},\"tuesday\":{\"meals\":[{\"id\":1100990,\"imageType\":\"jpg\",\"title\":\"Blueberry, Chocolate & Cocao Superfood Pancakes - Gluten-Free\\/Paleo\\/Vegan\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-chocolate-cocao-superfood-pancakes-gluten-free-paleo-vegan-1100990\"},{\"id\":157219,\"imageType\":\"jpg\",\"title\":\"Lemon Pepper Garlic Tilapia with Creamy Spinach Pappardelle\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lemon-pepper-garlic-tilapia-with-creamy-spinach-pappardelle-157219\"},{\"id\":650651,\"imageType\":\"jpg\",\"title\":\"Make It Quick Italian Shrimp Rolls\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/make-it-quick-italian-shrimp-rolls-650651\"}],\"nutrients\":{\"calories\":1900.03,\"protein\":76.39,\"fat\":97.53,\"carbohydrates\":192.7}},\"wednesday\":{\"meals\":[{\"id\":640389,\"imageType\":\"jpg\",\"title\":\"Cranberry Orange Banana Bread\",\"readyInMinutes\":75,\"servings\":18,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/cranberry-orange-banana-bread-640389\"},{\"id\":668492,\"imageType\":\"jpg\",\"title\":\"Creamy zucchini and ham pasta\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/creamy-zucchini-and-ham-pasta-668492\"},{\"id\":649850,\"imageType\":\"jpg\",\"title\":\"Lemon-Pepper Fettucine Alfredo\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lemon-pepper-fettucine-alfredo-649850\"}],\"nutrients\":{\"calories\":1900.08,\"protein\":57.75,\"fat\":115.48,\"carbohydrates\":180.4}},\"thursday\":{\"meals\":[{\"id\":782598,\"imageType\":\"jpg\",\"title\":\"Toasted Coconut Pancakes with Toasted Coconut Sauce\",\"readyInMinutes\":45,\"servings\":9,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/toasted-coconut-pancakes-with-toasted-coconut-sauce-782598\"},{\"id\":1697577,\"imageType\":\"jpg\",\"title\":\"Spanish Sardines Pasta\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spanish-sardines-pasta-1697577\"},{\"id\":641907,\"imageType\":\"jpg\",\"title\":\"Easy Chicken Wings\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/easy-chicken-wings-641907\"}],\"nutrients\":{\"calories\":1900.06,\"protein\":66.28,\"fat\":115.11,\"carbohydrates\":159.48}},\"friday\":{\"meals\":[{\"id\":646982,\"imageType\":\"jpg\",\"title\":\"Meatless Eggs Benedict\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/meatless-eggs-benedict-646982\"},{\"id\":157021,\"imageType\":\"jpg\",\"title\":\"Gnocci with vegetables and feta\",\"readyInMinutes\":20,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/gnocci-with-vegetables-and-feta-157021\"},{\"id\":782619,\"imageType\":\"png\",\"title\":\"Mushroom Goat Cheese Baked Eggs\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/mushroom-goat-cheese-baked-eggs-782619\"}],\"nutrients\":{\"calories\":1899.93,\"protein\":89.82,\"fat\":116.57,\"carbohydrates\":131.83}},\"saturday\":{\"meals\":[{\"id\":637210,\"imageType\":\"jpg\",\"title\":\"Carrot Oat Muffins\",\"readyInMinutes\":45,\"servings\":18,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/carrot-oat-muffins-637210\"},{\"id\":642281,\"imageType\":\"jpg\",\"title\":\"Eggplant Caprese Stack Appetizers\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/eggplant-caprese-stack-appetizers-642281\"},{\"id\":654568,\"imageType\":\"jpg\",\"title\":\"Panned Veal Chop\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/panned-veal-chop-654568\"}],\"nutrients\":{\"calories\":1899.99,\"protein\":125.73,\"fat\":105.86,\"carbohydrates\":107.96}},\"sunday\":{\"meals\":[{\"id\":662581,\"imageType\":\"jpg\",\"title\":\"Sweet Potato Hashbrown Breakfast Bake\",\"readyInMinutes\":70,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/sweet-potato-hashbrown-breakfast-bake-662581\"},{\"id\":1098354,\"imageType\":\"jpg\",\"title\":\"Rotisserie Chicken and Bean Tostadas\",\"readyInMinutes\":30,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/rotisserie-chicken-and-bean-tostadas-1098354\"},{\"id\":637593,\"imageType\":\"jpg\",\"title\":\"Cheese Tortellini With Shrimp In Tomato Cream Sauce\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/cheese-tortellini-with-shrimp-in-tomato-cream-sauce-637593\"}],\"nutrients\":{\"calories\":1899.95,\"protein\":112.82,\"fat\":91.07,\"carbohydrates\":165.36}}}}', '2024-01-24 14:55:38'),
(38, 59, '{\"week\":{\"monday\":{\"meals\":[{\"id\":648632,\"imageType\":\"jpg\",\"title\":\"Jules\' Banana Bread\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/jules-banana-bread-648632\"},{\"id\":1697747,\"imageType\":\"jpg\",\"title\":\"Wienerschnitzel\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/wienerschnitzel-1697747\"},{\"id\":641543,\"imageType\":\"jpg\",\"title\":\"Ditalini with peas\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/ditalini-with-peas-641543\"}],\"nutrients\":{\"calories\":2149.9,\"protein\":95.64,\"fat\":111.44,\"carbohydrates\":195.34}},\"tuesday\":{\"meals\":[{\"id\":646982,\"imageType\":\"jpg\",\"title\":\"Meatless Eggs Benedict\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/meatless-eggs-benedict-646982\"},{\"id\":641408,\"imageType\":\"jpg\",\"title\":\"Delicious Sausage & Peppers\",\"readyInMinutes\":30,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/delicious-sausage-peppers-641408\"},{\"id\":663149,\"imageType\":\"jpg\",\"title\":\"Thai Sausage Salad\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/thai-sausage-salad-663149\"}],\"nutrients\":{\"calories\":2150.08,\"protein\":84.19,\"fat\":163.08,\"carbohydrates\":87.19}},\"wednesday\":{\"meals\":[{\"id\":659081,\"imageType\":\"jpg\",\"title\":\"Salmon Frittata\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/salmon-frittata-659081\"},{\"id\":668492,\"imageType\":\"jpg\",\"title\":\"Creamy zucchini and ham pasta\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/creamy-zucchini-and-ham-pasta-668492\"},{\"id\":636366,\"imageType\":\"jpg\",\"title\":\"Brussels Sprouts With Salted Eggs\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/brussels-sprouts-with-salted-eggs-636366\"}],\"nutrients\":{\"calories\":2150.08,\"protein\":118.94,\"fat\":136.01,\"carbohydrates\":111.8}},\"thursday\":{\"meals\":[{\"id\":647442,\"imageType\":\"jpg\",\"title\":\"Hot Cross Buns\",\"readyInMinutes\":45,\"servings\":12,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/hot-cross-buns-647442\"},{\"id\":1096017,\"imageType\":\"jpg\",\"title\":\"Mexican Chicken & Rice Bowl\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/mexican-chicken-rice-bowl-1096017\"},{\"id\":1697583,\"imageType\":\"jpg\",\"title\":\"Crispy Ravioli Formaggi\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crispy-ravioli-formaggi-1697583\"}],\"nutrients\":{\"calories\":2150.13,\"protein\":95.31,\"fat\":136.79,\"carbohydrates\":142.29}},\"friday\":{\"meals\":[{\"id\":637055,\"imageType\":\"jpg\",\"title\":\"Caramelized cranberries coconut pancakes\",\"readyInMinutes\":45,\"servings\":5,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/caramelized-cranberries-coconut-pancakes-637055\"},{\"id\":732255,\"imageType\":\"jpg\",\"title\":\"Cheesy Cowboy Quesadillas\",\"readyInMinutes\":10,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/cheesy-cowboy-quesadillas-732255\"},{\"id\":657011,\"imageType\":\"jpg\",\"title\":\"Potato-Cheese Pie\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/potato-cheese-pie-657011\"}],\"nutrients\":{\"calories\":2149.96,\"protein\":66.4,\"fat\":134.91,\"carbohydrates\":175.45}},\"saturday\":{\"meals\":[{\"id\":640275,\"imageType\":\"jpg\",\"title\":\"Crab Cakes Eggs Benedict\",\"readyInMinutes\":30,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crab-cakes-eggs-benedict-640275\"},{\"id\":715532,\"imageType\":\"jpg\",\"title\":\"Easy Chicken Fajita Enchiladas\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/easy-chicken-fajita-enchiladas-715532\"},{\"id\":643857,\"imageType\":\"jpg\",\"title\":\"Frittata\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/frittata-643857\"}],\"nutrients\":{\"calories\":2149.95,\"protein\":108.85,\"fat\":149.59,\"carbohydrates\":88.06}},\"sunday\":{\"meals\":[{\"id\":1747693,\"imageType\":\"jpg\",\"title\":\"Your Basic Low Carb Breakfast\",\"readyInMinutes\":7,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/your-basic-low-carb-breakfast-1747693\"},{\"id\":632275,\"imageType\":\"jpg\",\"title\":\"Alton Brown\'s Baked Macaroni and Cheese\",\"readyInMinutes\":20,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/alton-browns-baked-macaroni-and-cheese-632275\"},{\"id\":649405,\"imageType\":\"jpg\",\"title\":\"Lebanese Lentil Soup\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lebanese-lentil-soup-649405\"}],\"nutrients\":{\"calories\":2149.99,\"protein\":66.94,\"fat\":154.39,\"carbohydrates\":130.15}}}}', '2024-01-24 14:56:28'),
(39, 60, '{\"week\":{\"monday\":{\"meals\":[{\"id\":639728,\"imageType\":\"jpg\",\"title\":\"Coconut Bliss Smoothie\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/coconut-bliss-smoothie-639728\"},{\"id\":642777,\"imageType\":\"jpg\",\"title\":\"Fig and Goat Cheese Pizza With Pesto\",\"readyInMinutes\":15,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fig-and-goat-cheese-pizza-with-pesto-642777\"},{\"id\":1697533,\"imageType\":\"jpg\",\"title\":\"Roasted Tomato and White Bean Stew\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/roasted-tomato-and-white-bean-stew-1697533\"}],\"nutrients\":{\"calories\":1799.89,\"protein\":54.67,\"fat\":97.08,\"carbohydrates\":189.92}},\"tuesday\":{\"meals\":[{\"id\":643347,\"imageType\":\"jpg\",\"title\":\"French Inspired Poblano Crepe \\u2018Enchiladas\\u2019\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/french-inspired-poblano-crepe-enchiladas-643347\"},{\"id\":157344,\"imageType\":\"jpg\",\"title\":\"Spicy Salad with Kidney Beans, Cheddar, and Nuts\",\"readyInMinutes\":10,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spicy-salad-with-kidney-beans-cheddar-and-nuts-157344\"},{\"id\":1697541,\"imageType\":\"jpg\",\"title\":\"Pasta With Feta Cheese And Asparagus\",\"readyInMinutes\":20,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/pasta-with-feta-cheese-and-asparagus-1697541\"}],\"nutrients\":{\"calories\":1799.96,\"protein\":65.75,\"fat\":94.7,\"carbohydrates\":182.68}},\"wednesday\":{\"meals\":[{\"id\":657511,\"imageType\":\"jpg\",\"title\":\"Quiche with Swiss Chard and Mushroom\",\"readyInMinutes\":45,\"servings\":7,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/quiche-with-swiss-chard-and-mushroom-657511\"},{\"id\":641387,\"imageType\":\"jpg\",\"title\":\"Delicious Creamy Lentils and Chestnuts Soup\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/delicious-creamy-lentils-and-chestnuts-soup-641387\"},{\"id\":1697625,\"imageType\":\"jpg\",\"title\":\"Light and Tasty Tomato Basil Mozzarella Pasta for a Hot Summer Evening\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/light-and-tasty-tomato-basil-mozzarella-pasta-for-a-hot-summer-evening-1697625\"}],\"nutrients\":{\"calories\":1800.09,\"protein\":65.8,\"fat\":82.98,\"carbohydrates\":199.28}},\"thursday\":{\"meals\":[{\"id\":631764,\"imageType\":\"jpg\",\"title\":\"Xocai Healthy Chocolate Muffins\",\"readyInMinutes\":45,\"servings\":12,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/xocai-healthy-chocolate-muffins-631764\"},{\"id\":643674,\"imageType\":\"jpg\",\"title\":\"Fried Brown Rice\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fried-brown-rice-643674\"},{\"id\":657651,\"imageType\":\"jpg\",\"title\":\"Quick Veggie Stir-Fry\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/quick-veggie-stir-fry-657651\"}],\"nutrients\":{\"calories\":1799.95,\"protein\":60.86,\"fat\":78.54,\"carbohydrates\":227.31}},\"friday\":{\"meals\":[{\"id\":631993,\"imageType\":\"jpg\",\"title\":\"Aebleskiver Danish Pancakes\",\"readyInMinutes\":45,\"servings\":12,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/aebleskiver-danish-pancakes-631993\"},{\"id\":715769,\"imageType\":\"jpg\",\"title\":\"Broccolini Quinoa Pilaf\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/broccolini-quinoa-pilaf-715769\"},{\"id\":649921,\"imageType\":\"jpg\",\"title\":\"Lentil Fritters (Parippu Vada)\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lentil-fritters-parippu-vada-649921\"}],\"nutrients\":{\"calories\":1799.91,\"protein\":96.32,\"fat\":43.18,\"carbohydrates\":268.43}},\"saturday\":{\"meals\":[{\"id\":644675,\"imageType\":\"jpg\",\"title\":\"Ginger-Wheat Mulberry Muffins\",\"readyInMinutes\":45,\"servings\":20,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/ginger-wheat-mulberry-muffins-644675\"},{\"id\":653251,\"imageType\":\"jpg\",\"title\":\"Noodles and Veggies With Peanut Sauce\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/noodles-and-veggies-with-peanut-sauce-653251\"},{\"id\":1697625,\"imageType\":\"jpg\",\"title\":\"Light and Tasty Tomato Basil Mozzarella Pasta for a Hot Summer Evening\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/light-and-tasty-tomato-basil-mozzarella-pasta-for-a-hot-summer-evening-1697625\"}],\"nutrients\":{\"calories\":1800.1,\"protein\":56.38,\"fat\":70.87,\"carbohydrates\":236.69}},\"sunday\":{\"meals\":[{\"id\":635964,\"imageType\":\"jpg\",\"title\":\"Bread Omlette\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/bread-omlette-635964\"},{\"id\":642777,\"imageType\":\"jpg\",\"title\":\"Fig and Goat Cheese Pizza With Pesto\",\"readyInMinutes\":15,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fig-and-goat-cheese-pizza-with-pesto-642777\"},{\"id\":648368,\"imageType\":\"jpg\",\"title\":\"Jalapeno Queso With Goat Cheese\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/jalapeno-queso-with-goat-cheese-648368\"}],\"nutrients\":{\"calories\":1799.98,\"protein\":90.3,\"fat\":90.53,\"carbohydrates\":154.9}}}}', '2024-01-24 14:57:23'),
(40, 61, '{\"week\":{\"monday\":{\"meals\":[{\"id\":636026,\"imageType\":\"jpg\",\"title\":\"Breakfast Biscuits and Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/breakfast-biscuits-and-gravy-636026\"},{\"id\":1697751,\"imageType\":\"jpg\",\"title\":\"Ridiculously Easy Gourmet Tuna Sandwich\",\"readyInMinutes\":15,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/ridiculously-easy-gourmet-tuna-sandwich-1697751\"},{\"id\":634481,\"imageType\":\"jpg\",\"title\":\"Bbq Chicken and Goat Cheese Ravioli\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/bbq-chicken-and-goat-cheese-ravioli-634481\"}],\"nutrients\":{\"calories\":2701.24,\"protein\":108.81,\"fat\":154.63,\"carbohydrates\":214.04}},\"tuesday\":{\"meals\":[{\"id\":646982,\"imageType\":\"jpg\",\"title\":\"Meatless Eggs Benedict\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/meatless-eggs-benedict-646982\"},{\"id\":1697535,\"imageType\":\"jpg\",\"title\":\"Panera Spicy Thai Salad\",\"readyInMinutes\":20,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/panera-spicy-thai-salad-1697535\"},{\"id\":631894,\"imageType\":\"jpg\",\"title\":\"A Fish That\'s Not Really A Fish\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/a-fish-thats-not-really-a-fish-631894\"}],\"nutrients\":{\"calories\":2701.24,\"protein\":172.13,\"fat\":124.73,\"carbohydrates\":224.78}},\"wednesday\":{\"meals\":[{\"id\":635446,\"imageType\":\"jpg\",\"title\":\"Blueberry Cinnamon Porridge\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-cinnamon-porridge-635446\"},{\"id\":1697583,\"imageType\":\"jpg\",\"title\":\"Crispy Ravioli Formaggi\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crispy-ravioli-formaggi-1697583\"},{\"id\":659447,\"imageType\":\"jpg\",\"title\":\"Sauteed Trout with Pecans\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/sauteed-trout-with-pecans-659447\"}],\"nutrients\":{\"calories\":2698.81,\"protein\":75.81,\"fat\":222.41,\"carbohydrates\":115}},\"thursday\":{\"meals\":[{\"id\":636026,\"imageType\":\"jpg\",\"title\":\"Breakfast Biscuits and Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/breakfast-biscuits-and-gravy-636026\"},{\"id\":1098354,\"imageType\":\"jpg\",\"title\":\"Rotisserie Chicken and Bean Tostadas\",\"readyInMinutes\":30,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/rotisserie-chicken-and-bean-tostadas-1098354\"},{\"id\":659060,\"imageType\":\"jpg\",\"title\":\"Salmon Confit with Lemongrass Sauce\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/salmon-confit-with-lemongrass-sauce-659060\"}],\"nutrients\":{\"calories\":2699.53,\"protein\":145.35,\"fat\":174.88,\"carbohydrates\":145.58}},\"friday\":{\"meals\":[{\"id\":635446,\"imageType\":\"jpg\",\"title\":\"Blueberry Cinnamon Porridge\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-cinnamon-porridge-635446\"},{\"id\":632874,\"imageType\":\"jpg\",\"title\":\"Asian Salmon Burgers With Tangy Ginger Lime Sauce\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/asian-salmon-burgers-with-tangy-ginger-lime-sauce-632874\"},{\"id\":639752,\"imageType\":\"jpg\",\"title\":\"Coconut Crusted Rockfish\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/coconut-crusted-rockfish-639752\"}],\"nutrients\":{\"calories\":2699.93,\"protein\":110.04,\"fat\":188.28,\"carbohydrates\":153.18}},\"saturday\":{\"meals\":[{\"id\":636026,\"imageType\":\"jpg\",\"title\":\"Breakfast Biscuits and Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/breakfast-biscuits-and-gravy-636026\"},{\"id\":645607,\"imageType\":\"jpg\",\"title\":\"Grilled Buffalo Chicken Wraps\",\"readyInMinutes\":20,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/grilled-buffalo-chicken-wraps-645607\"},{\"id\":661395,\"imageType\":\"jpg\",\"title\":\"Split-Pea Soup\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/split-pea-soup-661395\"}],\"nutrients\":{\"calories\":2698.69,\"protein\":158.02,\"fat\":131.25,\"carbohydrates\":223.89}},\"sunday\":{\"meals\":[{\"id\":648632,\"imageType\":\"jpg\",\"title\":\"Jules\' Banana Bread\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/jules-banana-bread-648632\"},{\"id\":1697625,\"imageType\":\"jpg\",\"title\":\"Light and Tasty Tomato Basil Mozzarella Pasta for a Hot Summer Evening\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/light-and-tasty-tomato-basil-mozzarella-pasta-for-a-hot-summer-evening-1697625\"},{\"id\":649031,\"imageType\":\"jpg\",\"title\":\"Korean Bibimbab (Rice w Vegetables & Beef)\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/korean-bibimbab-rice-w-vegetables-beef-649031\"}],\"nutrients\":{\"calories\":2701.72,\"protein\":97.76,\"fat\":112.27,\"carbohydrates\":331.37}}}}', '2024-01-24 14:58:33'),
(41, 62, '{\"week\":{\"monday\":{\"meals\":[{\"id\":652864,\"imageType\":\"jpg\",\"title\":\"My Grandmother\'s Migas\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/my-grandmothers-migas-652864\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"},{\"id\":638369,\"imageType\":\"jpg\",\"title\":\"Korean Sweet n Sour Chicken\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/korean-sweet-n-sour-chicken-638369\"}],\"nutrients\":{\"calories\":1899.93,\"protein\":109.2,\"fat\":53.67,\"carbohydrates\":243.46}},\"tuesday\":{\"meals\":[{\"id\":649824,\"imageType\":\"jpg\",\"title\":\"Lemon Zucchini Muffins\",\"readyInMinutes\":45,\"servings\":10,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lemon-zucchini-muffins-649824\"},{\"id\":632275,\"imageType\":\"jpg\",\"title\":\"Alton Brown\'s Baked Macaroni and Cheese\",\"readyInMinutes\":20,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/alton-browns-baked-macaroni-and-cheese-632275\"},{\"id\":1697535,\"imageType\":\"jpg\",\"title\":\"Panera Spicy Thai Salad\",\"readyInMinutes\":20,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/panera-spicy-thai-salad-1697535\"}],\"nutrients\":{\"calories\":1899.93,\"protein\":133.58,\"fat\":77.08,\"carbohydrates\":174.25}},\"wednesday\":{\"meals\":[{\"id\":635547,\"imageType\":\"jpg\",\"title\":\"Blueberry Sweet Muffins\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-sweet-muffins-635547\"},{\"id\":642281,\"imageType\":\"jpg\",\"title\":\"Eggplant Caprese Stack Appetizers\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/eggplant-caprese-stack-appetizers-642281\"},{\"id\":663824,\"imageType\":\"jpg\",\"title\":\"Trinidadian Chicken Potato Curry\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/trinidadian-chicken-potato-curry-663824\"}],\"nutrients\":{\"calories\":1900,\"protein\":95.3,\"fat\":126.94,\"carbohydrates\":96.93}},\"thursday\":{\"meals\":[{\"id\":647555,\"imageType\":\"jpg\",\"title\":\"Hotcakes\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/hotcakes-647555\"},{\"id\":642593,\"imageType\":\"jpg\",\"title\":\"Farfalle With Sun-Dried Tomato Pesto, Sausage and Fennel\",\"readyInMinutes\":20,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/farfalle-with-sun-dried-tomato-pesto-sausage-and-fennel-642593\"},{\"id\":660185,\"imageType\":\"jpg\",\"title\":\"Singapore Curry\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/singapore-curry-660185\"}],\"nutrients\":{\"calories\":1900.06,\"protein\":69.82,\"fat\":77.09,\"carbohydrates\":233.72}},\"friday\":{\"meals\":[{\"id\":636962,\"imageType\":\"jpg\",\"title\":\"Caprese Quick Bread\",\"readyInMinutes\":45,\"servings\":12,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/caprese-quick-bread-636962\"},{\"id\":1697535,\"imageType\":\"jpg\",\"title\":\"Panera Spicy Thai Salad\",\"readyInMinutes\":20,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/panera-spicy-thai-salad-1697535\"},{\"id\":657710,\"imageType\":\"jpg\",\"title\":\"Rack of Lamb With Parsley\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/rack-of-lamb-with-parsley-657710\"}],\"nutrients\":{\"calories\":1900.02,\"protein\":135.4,\"fat\":94.95,\"carbohydrates\":129.66}},\"saturday\":{\"meals\":[{\"id\":632928,\"imageType\":\"jpg\",\"title\":\"Asparagus Eggs Benedict\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/asparagus-eggs-benedict-632928\"},{\"id\":638369,\"imageType\":\"jpg\",\"title\":\"Korean Sweet n Sour Chicken\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/korean-sweet-n-sour-chicken-638369\"},{\"id\":654913,\"imageType\":\"jpg\",\"title\":\"Pasta With Chicken and Mushrooms\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/pasta-with-chicken-and-mushrooms-654913\"}],\"nutrients\":{\"calories\":1899.94,\"protein\":131.78,\"fat\":87.05,\"carbohydrates\":142.07}},\"sunday\":{\"meals\":[{\"id\":653500,\"imageType\":\"jpg\",\"title\":\"Oatmeal, Apricot, Walnut Soda Bread\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/oatmeal-apricot-walnut-soda-bread-653500\"},{\"id\":1697749,\"imageType\":\"jpeg\",\"title\":\"Snappy Shrimp, Spicy Hot Pepper Flakes, and Garlic Breath\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/snappy-shrimp-spicy-hot-pepper-flakes-and-garlic-breath-1697749\"},{\"id\":638248,\"imageType\":\"jpg\",\"title\":\"Chicken Piccata With Angel Hair Pasta\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/chicken-piccata-with-angel-hair-pasta-638248\"}],\"nutrients\":{\"calories\":1900,\"protein\":88.96,\"fat\":74.8,\"carbohydrates\":221.19}}}}', '2024-01-24 14:59:41');
INSERT INTO `meal_plans` (`plan_id`, `benutzer_id`, `plan_daten`, `zeitstempel`) VALUES
(42, 63, '{\"week\":{\"monday\":{\"meals\":[{\"id\":634318,\"imageType\":\"jpg\",\"title\":\"Barbecued Shrimp & Grits\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/barbecued-shrimp-grits-634318\"},{\"id\":663050,\"imageType\":\"jpg\",\"title\":\"Tex-Mex Burger\",\"readyInMinutes\":15,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/tex-mex-burger-663050\"},{\"id\":667704,\"imageType\":\"jpg\",\"title\":\"Shrimp, Bacon, Avocado Pasta Salad\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/shrimp-bacon-avocado-pasta-salad-667704\"}],\"nutrients\":{\"calories\":1999,\"protein\":105.85,\"fat\":116.8,\"carbohydrates\":129.81}},\"tuesday\":{\"meals\":[{\"id\":661249,\"imageType\":\"jpg\",\"title\":\"Spinach & Ham Quiche\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spinach-ham-quiche-661249\"},{\"id\":1697625,\"imageType\":\"jpg\",\"title\":\"Light and Tasty Tomato Basil Mozzarella Pasta for a Hot Summer Evening\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/light-and-tasty-tomato-basil-mozzarella-pasta-for-a-hot-summer-evening-1697625\"},{\"id\":644173,\"imageType\":\"jpg\",\"title\":\"Garbanzo Beans & Greens\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/garbanzo-beans-greens-644173\"}],\"nutrients\":{\"calories\":1998.93,\"protein\":86.83,\"fat\":99.77,\"carbohydrates\":190.78}},\"wednesday\":{\"meals\":[{\"id\":663867,\"imageType\":\"jpg\",\"title\":\"Tropical Steel Cut Oatmeal\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/tropical-steel-cut-oatmeal-663867\"},{\"id\":1171085,\"imageType\":\"jpg\",\"title\":\"How to Make an Easy Chicken Enchilada\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/how-to-make-an-easy-chicken-enchilada-1171085\"},{\"id\":649002,\"imageType\":\"jpg\",\"title\":\"Kogi Kimchi Quesadillas\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/kogi-kimchi-quesadillas-649002\"}],\"nutrients\":{\"calories\":1998.91,\"protein\":83.15,\"fat\":115.3,\"carbohydrates\":159.43}},\"thursday\":{\"meals\":[{\"id\":639728,\"imageType\":\"jpg\",\"title\":\"Coconut Bliss Smoothie\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/coconut-bliss-smoothie-639728\"},{\"id\":643789,\"imageType\":\"jpg\",\"title\":\"Fried Salmon Cakes\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fried-salmon-cakes-643789\"},{\"id\":649248,\"imageType\":\"jpg\",\"title\":\"Lamb Tagine Stew\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lamb-tagine-stew-649248\"}],\"nutrients\":{\"calories\":1999.05,\"protein\":80.92,\"fat\":128.22,\"carbohydrates\":139.99}},\"friday\":{\"meals\":[{\"id\":648632,\"imageType\":\"jpg\",\"title\":\"Jules\' Banana Bread\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/jules-banana-bread-648632\"},{\"id\":390813,\"imageType\":\"jpg\",\"title\":\"Easy Korean Beef\",\"readyInMinutes\":30,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/easy-korean-beef-390813\"},{\"id\":650377,\"imageType\":\"jpg\",\"title\":\"Low Carb Brunch Burger\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/low-carb-brunch-burger-650377\"}],\"nutrients\":{\"calories\":1998.89,\"protein\":100.06,\"fat\":125.88,\"carbohydrates\":123.57}},\"saturday\":{\"meals\":[{\"id\":655698,\"imageType\":\"jpg\",\"title\":\"Pepperoni Pizza Muffins\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/pepperoni-pizza-muffins-655698\"},{\"id\":157399,\"imageType\":\"jpg\",\"title\":\"Crispy-Crowned Guacamole Fish Fillets\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crispy-crowned-guacamole-fish-fillets-157399\"},{\"id\":638252,\"imageType\":\"jpg\",\"title\":\"Chicken Piri Piri with Spicy Rice\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/chicken-piri-piri-with-spicy-rice-638252\"}],\"nutrients\":{\"calories\":1998.97,\"protein\":119.32,\"fat\":99.84,\"carbohydrates\":171.83}},\"sunday\":{\"meals\":[{\"id\":637645,\"imageType\":\"jpg\",\"title\":\"Cheesy Cauliflower Pancakes\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/cheesy-cauliflower-pancakes-637645\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"},{\"id\":651544,\"imageType\":\"jpg\",\"title\":\"Mexi-Casserole With Chipotle Salsa\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/mexi-casserole-with-chipotle-salsa-651544\"}],\"nutrients\":{\"calories\":1998.96,\"protein\":84.64,\"fat\":75.14,\"carbohydrates\":256.09}}}}', '2024-01-24 15:00:37'),
(43, 65, '{\"week\":{\"monday\":{\"meals\":[{\"id\":637042,\"imageType\":\"jpg\",\"title\":\"Caramelised Onion and Mushroom Quiche\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/caramelised-onion-and-mushroom-quiche-637042\"},{\"id\":1095827,\"imageType\":\"jpg\",\"title\":\"Ginger-Garlic and Lime Chicken Thighs with Escarole Salad\",\"readyInMinutes\":30,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/ginger-garlic-and-lime-chicken-thighs-with-escarole-salad-1095827\"},{\"id\":633165,\"imageType\":\"jpg\",\"title\":\"Avocado Tomato & Mozzarella Panini\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/avocado-tomato-mozzarella-panini-633165\"}],\"nutrients\":{\"calories\":2399.91,\"protein\":123.16,\"fat\":160.56,\"carbohydrates\":117.17}},\"tuesday\":{\"meals\":[{\"id\":637675,\"imageType\":\"jpg\",\"title\":\"Cheesy Potato Corn Scones\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/cheesy-potato-corn-scones-637675\"},{\"id\":1697577,\"imageType\":\"jpg\",\"title\":\"Spanish Sardines Pasta\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spanish-sardines-pasta-1697577\"},{\"id\":639629,\"imageType\":\"jpg\",\"title\":\"Classic Macaroni and Cheese\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/classic-macaroni-and-cheese-639629\"}],\"nutrients\":{\"calories\":2400.23,\"protein\":92.74,\"fat\":110.37,\"carbohydrates\":260.32}},\"wednesday\":{\"meals\":[{\"id\":643514,\"imageType\":\"jpg\",\"title\":\"Fresh Herb Omelette\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fresh-herb-omelette-643514\"},{\"id\":1697535,\"imageType\":\"jpg\",\"title\":\"Panera Spicy Thai Salad\",\"readyInMinutes\":20,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/panera-spicy-thai-salad-1697535\"},{\"id\":654681,\"imageType\":\"jpg\",\"title\":\"Parmesan Polenta\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/parmesan-polenta-654681\"}],\"nutrients\":{\"calories\":2399.71,\"protein\":168.25,\"fat\":97.26,\"carbohydrates\":216.89}},\"thursday\":{\"meals\":[{\"id\":632577,\"imageType\":\"jpg\",\"title\":\"Apple Pie Pancakes\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/apple-pie-pancakes-632577\"},{\"id\":1697535,\"imageType\":\"jpg\",\"title\":\"Panera Spicy Thai Salad\",\"readyInMinutes\":20,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/panera-spicy-thai-salad-1697535\"},{\"id\":661689,\"imageType\":\"jpg\",\"title\":\"Stir-Fried Shredded Chicken and Mushrooms With Balsamic\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/stir-fried-shredded-chicken-and-mushrooms-with-balsamic-661689\"}],\"nutrients\":{\"calories\":2399.65,\"protein\":164.29,\"fat\":124.11,\"carbohydrates\":169.95}},\"friday\":{\"meals\":[{\"id\":665734,\"imageType\":\"jpg\",\"title\":\"Zucchini Chicken Omelette\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/zucchini-chicken-omelette-665734\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"},{\"id\":650255,\"imageType\":\"jpg\",\"title\":\"Lobster Macaroni and Cheese\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lobster-macaroni-and-cheese-650255\"}],\"nutrients\":{\"calories\":2399.78,\"protein\":100.8,\"fat\":91.72,\"carbohydrates\":292.63}},\"saturday\":{\"meals\":[{\"id\":653775,\"imageType\":\"jpg\",\"title\":\"Open-Face Egg Sandwich with Bacon, Asparagus, and Pesto\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/open-face-egg-sandwich-with-bacon-asparagus-and-pesto-653775\"},{\"id\":668492,\"imageType\":\"jpg\",\"title\":\"Creamy zucchini and ham pasta\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/creamy-zucchini-and-ham-pasta-668492\"},{\"id\":157219,\"imageType\":\"jpg\",\"title\":\"Lemon Pepper Garlic Tilapia with Creamy Spinach Pappardelle\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lemon-pepper-garlic-tilapia-with-creamy-spinach-pappardelle-157219\"}],\"nutrients\":{\"calories\":2400.22,\"protein\":85.71,\"fat\":148.01,\"carbohydrates\":190.44}},\"sunday\":{\"meals\":[{\"id\":632925,\"imageType\":\"jpg\",\"title\":\"Asparagus and Asiago Frittata\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/asparagus-and-asiago-frittata-632925\"},{\"id\":1095806,\"imageType\":\"jpg\",\"title\":\"Spanish style salmon fillets\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/spanish-style-salmon-fillets-1095806\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"}],\"nutrients\":{\"calories\":2399.69,\"protein\":117.18,\"fat\":105.02,\"carbohydrates\":251.61}}}}', '2024-01-24 15:01:58'),
(44, 66, '{\"week\":{\"monday\":{\"meals\":[{\"id\":641047,\"imageType\":\"jpg\",\"title\":\"Curious George\'s Gluten-Free Banana Nut Bread\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/curious-georges-gluten-free-banana-nut-bread-641047\"},{\"id\":641408,\"imageType\":\"jpg\",\"title\":\"Delicious Sausage & Peppers\",\"readyInMinutes\":30,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/delicious-sausage-peppers-641408\"},{\"id\":648983,\"imageType\":\"jpg\",\"title\":\"Knishes - Potato Filling\",\"readyInMinutes\":45,\"servings\":1,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/knishes-potato-filling-648983\"}],\"nutrients\":{\"calories\":2150.02,\"protein\":39.3,\"fat\":162.11,\"carbohydrates\":141.94}},\"tuesday\":{\"meals\":[{\"id\":649567,\"imageType\":\"jpg\",\"title\":\"Lemon Coconut Granola\",\"readyInMinutes\":45,\"servings\":15,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/lemon-coconut-granola-649567\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"},{\"id\":716427,\"imageType\":\"jpg\",\"title\":\"Roasted Butterflied Chicken w. Onions & Carrots\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/roasted-butterflied-chicken-w-onions-carrots-716427\"}],\"nutrients\":{\"calories\":2150.02,\"protein\":95.35,\"fat\":90.92,\"carbohydrates\":244.15}},\"wednesday\":{\"meals\":[{\"id\":636026,\"imageType\":\"jpg\",\"title\":\"Breakfast Biscuits and Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/breakfast-biscuits-and-gravy-636026\"},{\"id\":654435,\"imageType\":\"jpg\",\"title\":\"Pan Seared Salmon\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/pan-seared-salmon-654435\"},{\"id\":649988,\"imageType\":\"jpg\",\"title\":\"Light and Easy Alfredo\",\"readyInMinutes\":15,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/light-and-easy-alfredo-649988\"}],\"nutrients\":{\"calories\":2149.89,\"protein\":92.5,\"fat\":152.12,\"carbohydrates\":100.79}},\"thursday\":{\"meals\":[{\"id\":648632,\"imageType\":\"jpg\",\"title\":\"Jules\' Banana Bread\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/jules-banana-bread-648632\"},{\"id\":650377,\"imageType\":\"jpg\",\"title\":\"Low Carb Brunch Burger\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/low-carb-brunch-burger-650377\"},{\"id\":638588,\"imageType\":\"jpg\",\"title\":\"Chilled Avocado and Cucumber Soup With Prawn and Scallop Salsa\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/chilled-avocado-and-cucumber-soup-with-prawn-and-scallop-salsa-638588\"}],\"nutrients\":{\"calories\":2149.89,\"protein\":99.93,\"fat\":146.23,\"carbohydrates\":129.12}},\"friday\":{\"meals\":[{\"id\":647555,\"imageType\":\"jpg\",\"title\":\"Hotcakes\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/hotcakes-647555\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"},{\"id\":1697735,\"imageType\":\"jpg\",\"title\":\"One Pot Pasta, Deliciousness Made from Your Pantry and Two Fresh Ingredients\",\"readyInMinutes\":35,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/one-pot-pasta-deliciousness-made-from-your-pantry-and-two-fresh-ingredients-1697735\"}],\"nutrients\":{\"calories\":2149.86,\"protein\":83.29,\"fat\":59.65,\"carbohydrates\":319.8}},\"saturday\":{\"meals\":[{\"id\":639728,\"imageType\":\"jpg\",\"title\":\"Coconut Bliss Smoothie\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/coconut-bliss-smoothie-639728\"},{\"id\":1697583,\"imageType\":\"jpg\",\"title\":\"Crispy Ravioli Formaggi\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crispy-ravioli-formaggi-1697583\"},{\"id\":642403,\"imageType\":\"jpg\",\"title\":\"Enchiladas Verdes (Green Enchiladas)\",\"readyInMinutes\":45,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/enchiladas-verdes-green-enchiladas-642403\"}],\"nutrients\":{\"calories\":2149.86,\"protein\":69.06,\"fat\":142.83,\"carbohydrates\":158.29}},\"sunday\":{\"meals\":[{\"id\":632639,\"imageType\":\"jpg\",\"title\":\"Applesauce Carrot Cake Muffins\",\"readyInMinutes\":45,\"servings\":24,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/applesauce-carrot-cake-muffins-632639\"},{\"id\":1160166,\"imageType\":\"jpg\",\"title\":\"How to Make an Amazing Chicken Salad with Apples and Celery\",\"readyInMinutes\":10,\"servings\":3,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/how-to-make-an-amazing-chicken-salad-with-apples-and-celery-1160166\"},{\"id\":649030,\"imageType\":\"jpg\",\"title\":\"Korean Beef Rice Bowl\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/korean-beef-rice-bowl-649030\"}],\"nutrients\":{\"calories\":2149.96,\"protein\":112.59,\"fat\":63.26,\"carbohydrates\":283.7}}}}', '2024-01-24 15:02:41'),
(45, 68, '{\"week\":{\"monday\":{\"meals\":[{\"id\":634781,\"imageType\":\"jpg\",\"title\":\"Beet Greens and Poached Eggs\",\"readyInMinutes\":45,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/beet-greens-and-poached-eggs-634781\"},{\"id\":1095827,\"imageType\":\"jpg\",\"title\":\"Ginger-Garlic and Lime Chicken Thighs with Escarole Salad\",\"readyInMinutes\":30,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/ginger-garlic-and-lime-chicken-thighs-with-escarole-salad-1095827\"},{\"id\":642594,\"imageType\":\"jpg\",\"title\":\"Farfalle with Shrimps, Tomatoes Basil Sauce\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/farfalle-with-shrimps-tomatoes-basil-sauce-642594\"}],\"nutrients\":{\"calories\":2222.01,\"protein\":139.61,\"fat\":135.37,\"carbohydrates\":110.41}},\"tuesday\":{\"meals\":[{\"id\":663680,\"imageType\":\"jpg\",\"title\":\"Torta (Filipino Omelet)\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/torta-filipino-omelet-663680\"},{\"id\":1697583,\"imageType\":\"jpg\",\"title\":\"Crispy Ravioli Formaggi\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crispy-ravioli-formaggi-1697583\"},{\"id\":645680,\"imageType\":\"jpg\",\"title\":\"Grilled Chuck Burgers with Extra Sharp Cheddar and Lemon Garlic Aioli\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/grilled-chuck-burgers-with-extra-sharp-cheddar-and-lemon-garlic-aioli-645680\"}],\"nutrients\":{\"calories\":2222.03,\"protein\":74.95,\"fat\":160.23,\"carbohydrates\":124.69}},\"wednesday\":{\"meals\":[{\"id\":636026,\"imageType\":\"jpg\",\"title\":\"Breakfast Biscuits and Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/breakfast-biscuits-and-gravy-636026\"},{\"id\":643674,\"imageType\":\"jpg\",\"title\":\"Fried Brown Rice\",\"readyInMinutes\":25,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fried-brown-rice-643674\"},{\"id\":1165787,\"imageType\":\"jpg\",\"title\":\"Instant Pot Chili Mac\",\"readyInMinutes\":14,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/instant-pot-chili-mac-1165787\"}],\"nutrients\":{\"calories\":2222.16,\"protein\":99.45,\"fat\":115.88,\"carbohydrates\":199.34}},\"thursday\":{\"meals\":[{\"id\":658326,\"imageType\":\"jpg\",\"title\":\"Ricotta Chocolate Chips Scones\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/ricotta-chocolate-chips-scones-658326\"},{\"id\":643634,\"imageType\":\"jpg\",\"title\":\"Macaroni with Fresh Tomatoes and Beans\",\"readyInMinutes\":25,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/macaroni-with-fresh-tomatoes-and-beans-643634\"},{\"id\":1697677,\"imageType\":\"jpg\",\"title\":\"Super Easy Oven Baked Cod\",\"readyInMinutes\":20,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/super-easy-oven-baked-cod-1697677\"}],\"nutrients\":{\"calories\":2221.89,\"protein\":100.58,\"fat\":55.34,\"carbohydrates\":330.06}},\"friday\":{\"meals\":[{\"id\":1100990,\"imageType\":\"jpg\",\"title\":\"Blueberry, Chocolate & Cocao Superfood Pancakes - Gluten-Free\\/Paleo\\/Vegan\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/blueberry-chocolate-cocao-superfood-pancakes-gluten-free-paleo-vegan-1100990\"},{\"id\":650377,\"imageType\":\"jpg\",\"title\":\"Low Carb Brunch Burger\",\"readyInMinutes\":30,\"servings\":2,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/low-carb-brunch-burger-650377\"},{\"id\":656972,\"imageType\":\"jpg\",\"title\":\"Potato Gnocchi With Kale and Mushrooms In A Goat Cheese Sauce\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/potato-gnocchi-with-kale-and-mushrooms-in-a-goat-cheese-sauce-656972\"}],\"nutrients\":{\"calories\":2221.5,\"protein\":85.93,\"fat\":136.23,\"carbohydrates\":173.88}},\"saturday\":{\"meals\":[{\"id\":636026,\"imageType\":\"jpg\",\"title\":\"Breakfast Biscuits and Gravy\",\"readyInMinutes\":45,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/breakfast-biscuits-and-gravy-636026\"},{\"id\":606953,\"imageType\":\"jpg\",\"title\":\"Cajun Chicken Pasta\",\"readyInMinutes\":30,\"servings\":4,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/cajun-chicken-pasta-606953\"},{\"id\":642777,\"imageType\":\"jpg\",\"title\":\"Fig and Goat Cheese Pizza With Pesto\",\"readyInMinutes\":15,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/fig-and-goat-cheese-pizza-with-pesto-642777\"}],\"nutrients\":{\"calories\":2221.69,\"protein\":77.31,\"fat\":151.41,\"carbohydrates\":136.8}},\"sunday\":{\"meals\":[{\"id\":654274,\"imageType\":\"jpg\",\"title\":\"Overnight Steel Cut Oatmeal\",\"readyInMinutes\":45,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/overnight-steel-cut-oatmeal-654274\"},{\"id\":1095827,\"imageType\":\"jpg\",\"title\":\"Ginger-Garlic and Lime Chicken Thighs with Escarole Salad\",\"readyInMinutes\":30,\"servings\":6,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/ginger-garlic-and-lime-chicken-thighs-with-escarole-salad-1095827\"},{\"id\":1157762,\"imageType\":\"jpg\",\"title\":\"Crock Pot White Chicken Chili\",\"readyInMinutes\":250,\"servings\":8,\"sourceUrl\":\"https:\\/\\/spoonacular.com\\/crock-pot-white-chicken-chili-1157762\"}],\"nutrients\":{\"calories\":2222.1,\"protein\":130.19,\"fat\":145.92,\"carbohydrates\":102.01}}}}', '2024-01-24 15:03:28');

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
(40, 'Sophie', 'lena', 'Hey wie gehst dir? ', 'read', '2024-01-24 14:50:02'),
(41, 'Sophie', 'lena', 'ich komme zu dir', 'read', '2024-01-24 14:50:10'),
(42, 'Sophie', 'tobias', 'Hey tobi', 'read', '2024-01-24 14:50:18'),
(43, 'Sophie', 'alfred', 'Was geht Alfreeee', 'unread', '2024-01-24 14:50:26'),
(44, 'Sophie', 'annika', 'ich bin morgen zuhause, da ich krank bin', 'read', '2024-01-24 14:50:43'),
(45, 'lara', 'laila', 'Hey Laila', 'read', '2024-01-24 14:53:12'),
(46, 'lara', 'laila', 'was geht', 'read', '2024-01-24 14:53:15'),
(47, 'lara', 'tobias', 'hey tobbuiii', 'read', '2024-01-24 14:53:23'),
(48, 'lara', 'root', 'super marie', 'unread', '2024-01-24 14:53:34'),
(49, 'lara', 'root', 'ich komme zu dir', 'unread', '2024-01-24 14:53:39'),
(50, 'lena', 'Sophie', 'Heyy sehr gut dir', 'unread', '2024-01-24 14:54:15'),
(51, 'lena', 'Sophie', 'alles kalr, wei&szlig; ich Bescheid', 'unread', '2024-01-24 14:54:22'),
(52, 'lena', 'eva', 'Moinsen wo bist du? ', 'read', '2024-01-24 14:54:31'),
(53, 'lena', 'eva', '??', 'read', '2024-01-24 14:54:35'),
(54, 'lena', 'tobias', 'HUHU Tobi', 'read', '2024-01-24 14:54:42'),
(55, 'lena', 'lorenz', 'Lorenz kommst du noch', 'read', '2024-01-24 14:54:50'),
(56, 'lena', 'nadine', 'Hey Nadine wie gehts? ', 'read', '2024-01-24 14:54:58'),
(57, 'eva', 'lena', 'Alles bestens', 'unread', '2024-01-24 14:55:50'),
(58, 'eva', 'lena', 'dir? ', 'unread', '2024-01-24 14:55:53'),
(59, 'eva', 'albert', 'hey albert', 'read', '2024-01-24 14:55:59'),
(60, 'eva', 'tobias', 'Moin Tobi', 'read', '2024-01-24 14:56:05'),
(61, 'laila', 'lara', 'HEy Lara', 'unread', '2024-01-24 14:56:37'),
(62, 'laila', 'lara', 'Mir gehts gut dir? wasd machst du', 'unread', '2024-01-24 14:56:45'),
(63, 'laila', 'albert', 'hallo', 'read', '2024-01-24 14:56:52'),
(64, 'laila', 'lorenz', 'tach', 'read', '2024-01-24 14:56:57'),
(65, 'albert', 'eva', 'Hey evaaaaa', 'unread', '2024-01-24 14:57:35'),
(66, 'albert', 'laila', 'Heyyyy wie gehts', 'unread', '2024-01-24 14:57:42'),
(67, 'albert', 'alfred', 'cooll', 'unread', '2024-01-24 14:57:49'),
(68, 'albert', 'annika', 'moin', 'read', '2024-01-24 14:57:55'),
(69, 'albert', 'sabine', 'kommst du zur Schule?', 'unread', '2024-01-24 14:58:03'),
(70, 'tobias', 'Sophie', 'Hey Sophiee', 'unread', '2024-01-24 14:58:43'),
(71, 'tobias', 'lara', 'heyyy', 'unread', '2024-01-24 14:58:48'),
(72, 'tobias', 'lena', 'was geht', 'unread', '2024-01-24 14:58:53'),
(73, 'tobias', 'eva', 'moinsen', 'unread', '2024-01-24 14:59:03'),
(74, 'tobias', 'marie', 'Hey MArie', 'read', '2024-01-24 14:59:12'),
(75, 'lorenz', 'lena', 'Heyyy komme', 'unread', '2024-01-24 14:59:55'),
(76, 'lorenz', 'laila', 'moin', 'unread', '2024-01-24 15:00:00'),
(77, 'lorenz', 'marie', 'was geht duuuuuu', 'read', '2024-01-24 15:00:07'),
(78, 'lorenz', 'gina', 'kommst du mit nach Holland', 'read', '2024-01-24 15:00:16'),
(79, 'marie', 'lara', 'hey du', 'unread', '2024-01-24 15:00:55'),
(80, 'marie', 'tobias', 'wasd gehtsssss', 'unread', '2024-01-24 15:01:01'),
(81, 'marie', 'lorenz', 'supperrrrrr', 'unread', '2024-01-24 15:01:08'),
(82, 'marie', 'alfred', 'ssssssssssssssss', 'unread', '2024-01-24 15:01:12'),
(83, 'marie', 'annika', 'HEy duu', 'read', '2024-01-24 15:01:19'),
(84, 'marie', 'gina', 'Ginaaa', 'read', '2024-01-24 15:01:26'),
(85, 'annika', 'Sophie', 'alles klar', 'unread', '2024-01-24 15:02:08'),
(86, 'annika', 'albert', 'hey', 'unread', '2024-01-24 15:02:13'),
(87, 'annika', 'marie', 'he', 'unread', '2024-01-24 15:02:18'),
(88, 'gina', 'lorenz', 'ja kommeee', 'unread', '2024-01-24 15:02:50'),
(89, 'gina', 'marie', 'ja bitte', 'unread', '2024-01-24 15:02:56'),
(90, 'gina', 'nadine', 'hallo nadine', 'read', '2024-01-24 15:03:03'),
(91, 'nadine', 'lena', 'nichts bei dir', 'unread', '2024-01-24 15:03:38'),
(92, 'nadine', 'gina', 'hello', 'unread', '2024-01-24 15:03:44'),
(93, 'nadine', 'sabine', 'sabine hallo', 'unread', '2024-01-24 15:03:51');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `werbung`
--

CREATE TABLE `werbung` (
  `werbung_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `bildpfad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `werbung`
--

INSERT INTO `werbung` (`werbung_id`, `link`, `bildpfad`) VALUES
(1, 'https://www.mcfit.com/', '../images/mcfit_werbung.jpeg'),
(2, 'https://www.powerstar.de/sportnahrung-shop/de/', '../images/proteinshake.jpg'),
(3, 'https://www.clever-fit.com/de/', '../images/cleverfit.jpg'),
(4, 'https://www.clever-fit.com/de/', '../images/cleverfit.jpg');

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
-- Indizes für die Tabelle `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `benutzer_id` (`benutzer_id`);

--
-- Indizes für die Tabelle `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indizes für die Tabelle `werbung`
--
ALTER TABLE `werbung`
  ADD PRIMARY KEY (`werbung_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  MODIFY `beitrag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `benutzer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT für Tabelle `freundschaft`
--
ALTER TABLE `freundschaft`
  MODIFY `freundschaft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `kommentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT für Tabelle `liked_beitraege`
--
ALTER TABLE `liked_beitraege`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT für Tabelle `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT für Tabelle `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT für Tabelle `werbung`
--
ALTER TABLE `werbung`
  MODIFY `werbung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints der Tabelle `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD CONSTRAINT `meal_plans_ibfk_1` FOREIGN KEY (`benutzer_id`) REFERENCES `benutzer` (`benutzer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
