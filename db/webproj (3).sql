-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jan 2022 um 10:33
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
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `image`, `content`, `author`, `title`, `dateTime`) VALUES
(1, 'Unbenannt-2.jpg', 'wfwegweg', 'regrh3', 'test beitrag', '0000-00-00 00:00:00'),
(2, 'Unbenannt-2.jpg', 'wfwegweg', 'regrh3', 'test beitrag', '0000-00-00 00:00:00'),
(3, 'Unbenannt-2.jpg', '4wh656j', '65j56', 'rb4h', '0000-00-00 00:00:00');

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
(1, 1, 'das ist ein ticket vom user testuser1', 'placeholder.jpg', 'erfolglos geschlossen', 'ticket1', '2022-01-17 22:50:27', NULL),
(2, 1, 'auch das hier ist ein ticket vom user testuser1', 'placeholder.jpg', 'erfolglos geschlossen', 'ticket2', '2022-01-14 22:43:05', 'fgg'),
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
(6, 'ema33', 'male', 'adem', 'adem', '$2y$10$aYmt5Kq4Ep9QwINL2h1cEOY5SIYztWZjEAymPyTkcwFmI9Tm.Vxfi', 'adem@gmail.com', 'admin', 0),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
