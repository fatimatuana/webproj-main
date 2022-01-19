-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jan 2022 um 12:20
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
(1, 'Unbenannt-2.jpg', 'wfwegweg', 'regrh3', 'test beitrag', 0),
(2, 'Unbenannt-2.jpg', 'wfwegweg', 'regrh3', 'test beitrag', 0),
(3, 'Unbenannt-2.jpg', '4wh656j', '65j56', 'rb4h', 0),
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
(1, 1, 'das ist ein ticket vom user testuser1', 'placeholder.jpg', 'erfolglos geschlossen', 'ticket1', '2022-01-18 16:17:48', ''),
(2, 1, 'auch das hier ist ein ticket vom user testuser1', 'placeholder.jpg', 'erfolgreich geschlossen', 'ticket2', '2022-01-19 10:56:27', 'fgg'),
(3, 2, 'das ist ein ticket vom user testuser2 balaa', 'placeholder2.jpg', 'erfolglos geschlossen', 'ticket3', '2022-01-14 21:05:32', NULL),
(65, 8, 'Das ist emwifwe', './uploadGuest/2022-01-17_11-09-03unnamed.jpg', 'erfolglos geschlossen', 'Mein Ticket 1', '2022-01-17 22:52:09', 'Es ist uns leider nicht gelungen ..');

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
(1, 'testuser1', '', 'testuser1', 'testuser1', '$2y$10$BfnJX3DEHgVSCjP6PA.MS.4yiHGg3sJPIxKU4OrAgIfkdYmPJ4ZLK', 'testuser@gmail.com', 'guest', 1),
(2, 'testuser2', NULL, '', '', 'testuser2', 'testuser2@gmail.com', 'guest', 1),
(3, 'admin', NULL, '', '', 'neues passwort', 'hae@gmail.com', 'admin', 1),
(5, 'techniker', NULL, '', '', '123456', 'techniker@gmail.com', 'technician', 1),
(6, 'ema33', 'male', 'adem', 'adem', '$2y$10$YskHwsOyDqBMXmqNLcN1auoOpmKGa5vsjMYSxER1TEfXIJPsgoWuS', 'adem@gmail.com', 'admin', 0),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
