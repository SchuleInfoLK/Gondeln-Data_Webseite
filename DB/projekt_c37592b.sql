-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Jan 2025 um 21:00
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `projekt_c37592b`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `seilbahndaten`
--

CREATE TABLE `seilbahndaten` (
  `ID` int(11) NOT NULL,
  `typ_db` int(75) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Baujahr` int(11) NOT NULL,
  `Typ` varchar(255) NOT NULL,
  `Standort` varchar(255) NOT NULL,
  `Hersteller` varchar(255) NOT NULL,
  `HTal` int(11) DEFAULT NULL,
  `HBerg` int(11) DEFAULT NULL,
  `HDiff` int(11) DEFAULT NULL,
  `HorizontLang` int(11) DEFAULT NULL,
  `Bodenabstand` int(11) DEFAULT NULL,
  `MaxSpeed` int(11) DEFAULT NULL,
  `MaxFörderleistung` int(11) DEFAULT NULL,
  `Fahrzeit` int(11) DEFAULT NULL,
  `PersproMittel` int(11) DEFAULT NULL,
  `ArtGaragierung` varchar(255) DEFAULT NULL,
  `Kuppelbar` tinyint(1) NOT NULL,
  `Sitzheizung` tinyint(1) NOT NULL,
  `Bildpfad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `seilbahndaten`
--

INSERT INTO `seilbahndaten` (`ID`, `typ_db`, `name`, `Baujahr`, `Typ`, `Standort`, `Hersteller`, `HTal`, `HBerg`, `HDiff`, `HorizontLang`, `Bodenabstand`, `MaxSpeed`, `MaxFörderleistung`, `Fahrzeit`, `PersproMittel`, `ArtGaragierung`, `Kuppelbar`, `Sitzheizung`, `Bildpfad`) VALUES
(1, 2, 'Pardatschgrat (Ischgl)', 2013, 'CWA Taris 3S-Bahn', 'Ischgl (AT)', 'Doppelmayr/CWA', 1365, 2616, 1257, 3424, 138, 8, 2800, 9, 28, 'Oberflur', 1, 1, '../images/seilbahnen/padatschgrat.jpg'),
(2, 3, 'Fimbabahn (Ischgl)', 2007, '8-MGD mit OMEGA IV-8 LWI Gondeln', 'Ischgl (AT)', 'Doppelmayr/CWA', 1371, 2321, 950, 3847, NULL, 5, 2800, 15, 8, 'Unterflur', 1, 1, '../images/seilbahnen/fimba.jpg'),
(3, 9, 'Jochbahn (Brixen im Thale)', 2015, '8-CLD/B', 'Brixen im Thale (AT)', 'Doppelmayr', 1100, 1674, 538, 2002, NULL, 6, 3000, NULL, 8, 'Oberflur', 1, 1, '../images/icons/nopicture.png'),
(4, 7, 'Gampenkogelbahn (Westendorf)', 2001, '4-CLF', 'Westendorf (AT)', 'Girak-Garaventa', 1576, 1808, 232, 757, NULL, 3, 2400, 5, 4, NULL, 0, 0, '../images/icons/nopicture.png'),
(5, 8, 'Lange Wand (Ischgl)', 2010, '6-CLD/B', 'Ischgl (AT)', 'Doppelmayr', 2217, 2849, 632, 1545, 22, 5, 2400, 6, 6, 'Oberflur', 1, 1, '../images/seilbahnen/langewand.jpg'),
(6, 4, 'Piz Val Gronda Bahn', 2013, '150-AT', 'Ischgl (AT)', 'Doppelmayr', 2295, 2812, 517, 2452, NULL, 12, 1300, 5, 150, NULL, 0, 1, '../images/seilbahnen/valgronda.jpg'),
(7, 4, 'Twinliner', 1995, '180-AT', 'Samnaun (CH)', 'Garaventa', 1789, 2511, 722, 2270, NULL, 10, 1620, 6, 180, NULL, 0, 0, '../images/seilbahnen/twinliner.jpg'),
(8, 3, 'Kampenwandbahn', 1957, '4-BGD', 'Aschau im Chiemgau (D)', 'Hasenclever', 620, 1461, 841, 2480, NULL, 3, 300, 14, 4, 'Notgleis', 1, 0, '../images/seilbahnen/kampenwandbahn.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `seilbahndaten`
--
ALTER TABLE `seilbahndaten`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `seilbahndaten`
--
ALTER TABLE `seilbahndaten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
