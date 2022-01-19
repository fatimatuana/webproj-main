-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jan 2022 um 17:49
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webproj`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(45) DEFAULT NULL,
  `title` varchar(120) NOT NULL,
  `dateTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `image`, `content`, `author`, `title`, `dateTime`) VALUES
(4, 'wellnessbereich_neu_kamin.jpg', 'Im Dezember 2021 ist unser neuer Wellness-Bereich eröffnet worden. Entspannung pur!', 'Sophia Ehmayer', 'Genießen Sie den neuen Wellness-Bereich!', 1642501674),
(5, 'covid19_regeln_2021.jpg', 'Zahlreiche europäische Länder verzeichnen derzeit steigende Corona-Fallzahlen – auch Österreich. Um das dynamische Infektionsgeschehen einzudämmen, gelten strenge Corona-Maßnahmen. Für Gastronomie und Beherbergung gilt die 2-G-Regel. Das bedeutet, dass nur Geimpfte oder Genesene Zutritt haben. FFP2-Maskenpflicht gilt in öffentlichen Innenräumen UND im Freien, überall dort, wo ein Zwei-Meter-Abstand zu fremden Personen nicht eingehalten werden kann. Für Aufenthalte aus dringend notwendigen beruflichen Gründen gilt nach wie vor die 3-G-Regel. Für die gastronomischen Einrichtungen des Beherbergungsbetriebs wird aber ein 2-G-Nachweis benötigt', 'Sophia Ehmayer', 'Die neuen Corona-Regeln', 1642501733),
(6, 'csm_AdinaRezeption-Aufmacherbild-c-AdinaHotels-2640_e6a2f07148.jpg', 'Das Hotel X begann im Jahr 2019 mit der Sanierung von über 50 Hotelzimmer, der Lobby und des Wellness-Bereichs. Außerdem wird an einem Zubau gearbeitet. Geplant sind 30 neue Hotelzimmer. Im Sommer 2022 ist es nun soweit! Die Eröffnung des modernen Zubaus, der renovieren Zimmer, der Lobby und des Wellness-Bereichs ist geplant für 01.07.2022. Buchen Sie schon jetzt ein Zimmer im wunderschönen, neu sanierten Hotel X!', 'Sophia Ehmayer', 'Renovierungsarbeiten bald abgeschlossen!', 1642501771),
(7, 'hotelzimmer-typ-sternentraum-hoteleinrichtung.jpg', 'Die Hotelzimmer, teilweise mit Schlossblick sind mit ca. 25 m² geräumig konzipiert, hell und freundlich ausgestattet und im modernen Stil eingerichtet. Das Hotelfoyer ist eine großzügig gestaltete All-in-One Symbiose von Rezeption, Frühstückscafe und Lounge/Lobby und Bar. Zusätzlich verfügt das Hotel über zwei kleinere Tagungsräume mit Tageslicht und Klimaanlage. Die Räumlichkeiten sind, je nach Bestuhlung für 10 bis 40 Tagungsgäste geeignet. Das Haus bietet somit hervorragende Optionen für Business- und Individualreisende. Alle Zimmer verfügen über stilvolle Badezimmer mit Dusche und WC, Klimaanlage, TV und High Speed Internet über Wlan. Der Hauptbahnhof ist nur 300 m vom Hotel entfernt und garantiert direkte Anschlüsse und schnelle Verbindungen zu den Flughäfen München und Nürnberg.', 'Sophia Ehmayer', 'Hotel X - ein Ort zum Entspannen', 1642501809);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `state` varchar(50) NOT NULL,
  `title` varchar(80) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `info`, `image`, `state`, `title`, `timestamp`, `reply`) VALUES
(67, 8, 'Hallo! Der Fernseher in meinem Zimmer hat leider keine Internetverbindung. Obwohl ich mich bei der Rezeption über die Anmeldedaten informiert habe - kriege ich andauernd die gleiche Meldung!', '2022-01-19_05-07-460_big.jpg', 'offen', 'Keine Internetverbindung - Fernsehen', '2022-01-19 16:07:46', NULL),
(68, 1, 'Das Einzelbett im Zimmer war einfach kaputt. Mein Sohn musste mit uns schlafen und er war die ganze Nacht unwohl, weil er dachte, er sei schuld !!', '2022-01-19_05-38-57kaputtes-bett.jpg', 'erfolglos geschlossen', 'Bett kaputt - Kind kann nicht schlafen', '2022-01-19 16:49:05', ''),
(69, 1, 'Ich mein das Foto sagt genug aus! Frechheit!', '2022-01-19_05-40-57haare-und-schmutz-bad.jpg', 'offen', 'Haare und Schmutz. Bad komplett ungereinigt', '2022-01-19 16:40:57', NULL),
(70, 1, 'Liebes Team! Ich versuche seit Stunden mich mit dem WLAN zu verbinden. Ich gebe meine Zimmernummer und Passnummer korrekt ein - aber das einzige was rauskommt ist die Meldung &quot;Lieber Gast! Ihre eingegebenen Daten sind nicht korrekt. Wenden Sie sich bitte an den Administrator.&quot; &amp; dann noch: &quot;Zugriff auf Netzwerk abgelehnt. Verbindung abgebrochen.&quot; help!', '2022-01-19_05-46-140_big (1).jpg', 'erfolgreich geschlossen', 'Keine WLAN-Verbindung', '2022-01-19 16:48:57', 'Hallo! Das Problem wurde  behoben! Sollten Sie weitere Hilfe gebrauchen, zögern Sie nicht uns zu informieren. ');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(25) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `gender`, `firstname`, `lastname`, `password`, `email`, `role`, `state`) VALUES
(1, 'testuser1', 'female', 'testuser1', 'testuser1', '$2y$10$1XdxDZqz5GTK6RbOrgbupO8wiOTq/R4kj6caqIE4BBV/tm//XLk/u', 'testuser1@gmail.com', 'guest', 1),
(6, 'admin', 'male', 'admin', 'admin', '$2y$10$B7Dq8FzkiQ3hLz6LJdXEBe/HNzqCeYwah7t.H7KOy2wpW..xtdn1y', 'admin@gmail.com', 'admin', 0),
(8, 'user', 'female', 'user', 'user', '$2y$10$Cc93QHWpvAHhaoirXexlAO9uaUE2GtEH0VY/nQPs9htWQXGHmBtve', 'user@gmail.com', 'guest', 0),
(9, 'techniker1', 'male', 'techniker1', 'techniker1', '$2y$10$sO4PfsnWHuCn2D3yRMgap.8LBFMpSQAyMBqWGWW.LHv75jWazIaFe', 'techniker1@gmail.com', 'technician', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
