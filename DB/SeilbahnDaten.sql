-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jan 2025 um 13:32
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
  `h1name` varchar(255) NOT NULL,
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
  `Kuppelbar` tinyint(1) NOT NULL DEFAULT 0,
  `Sitzheizung` tinyint(1) NOT NULL DEFAULT 0,
  `Bildpfad` varchar(255) DEFAULT NULL,
  `Besonderheiten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `seilbahndaten`
--

INSERT INTO `seilbahndaten` (`ID`, `typ_db`, `name`, `h1name`, `Baujahr`, `Typ`, `Standort`, `Hersteller`, `HTal`, `HBerg`, `HDiff`, `HorizontLang`, `Bodenabstand`, `MaxSpeed`, `MaxFörderleistung`, `Fahrzeit`, `PersproMittel`, `ArtGaragierung`, `Kuppelbar`, `Sitzheizung`, `Bildpfad`, `Besonderheiten`) VALUES
(1, 2, 'Pardatschgratbahn (Ischgl)', 'Pardatschgratbahn', 2013, 'CWA Taris 3S-Bahn', 'Ischgl (AT)', 'Doppelmayr/CWA', 1365, 2616, 1257, 3424, 138, 8, 2800, 9, 28, 'Oberflur', 1, 1, '../images/seilbahnen/padatschgrat.jpg', NULL),
(2, 3, 'Fimbabahn (Ischgl)', 'Fimbabahn', 2007, '8-MGD mit OMEGA IV-8 LWI Gondeln', 'Ischgl (AT)', 'Doppelmayr/CWA', 1371, 2321, 950, 3847, NULL, 5, 2800, 15, 8, 'Unterflur', 1, 1, '../images/seilbahnen/fimba.jpg', 'Besitz eine Mittelstation'),
(3, 9, 'Jochbahn (Brixen im Thale)', 'Jochbahn', 2015, '8-CLD/B', 'Brixen im Thale (AT)', 'Doppelmayr', 1100, 1674, 538, 2002, NULL, 6, 3000, 7, 8, 'Oberflur', 1, 1, '../images/seilbahnen/jochbahn.jpg', NULL),
(4, 7, 'Gampenkogelbahn (Westendorf)', 'Gampenkogelbahn', 2001, '4-CLF', 'Westendorf (AT)', 'Girak-Garaventa', 1576, 1808, 232, 757, NULL, 3, 2400, 5, 4, NULL, 0, 0, NULL, NULL),
(5, 8, 'Lange Wand (Ischgl)', 'Lange Wandbahn', 2010, '6-CLD/B', 'Ischgl (AT)', 'Doppelmayr', 2217, 2849, 632, 1545, 22, 5, 2400, 6, 6, 'Oberflur', 1, 1, '../images/seilbahnen/langewand.jpg', NULL),
(6, 4, 'Piz Val Gronda Bahn (Ischgl)', 'Piz Val Gronda Bahn', 2013, '150-AT', 'Ischgl (AT)', 'Doppelmayr', 2295, 2812, 517, 2452, NULL, 12, 1300, 5, 150, NULL, 0, 1, '../images/seilbahnen/valgronda.jpg', 'Erste Pendelbahn mit Sitzheizung, die zudem eine Sonderanfertigung ist'),
(7, 4, 'Twinliner (Samnaun)', 'Twinliner', 1995, '180-AT', 'Samnaun (CH)', 'Garaventa', 1789, 2511, 722, 2270, NULL, 10, 1620, 6, 180, NULL, 0, 0, '../images/seilbahnen/twinliner.jpg', NULL),
(8, 3, 'Kampenwandbahn (Aschau im Chiemgau)', 'Kampenwandbahn', 1957, '4-BGD', 'Aschau im Chiemgau (D)', 'Hasenclever', 620, 1461, 841, 2480, NULL, 3, 300, 14, 4, 'Notgleis', 1, 0, '../images/seilbahnen/kampenwandbahn.jpg', 'Macht in der Station eine 90° Wende'),
(9, 1, 'Silvrettabahn (Ischgl)', 'Silvrettabahn', 1998, '24-FUT', 'Ischgl (AT)', 'Doppelmayr', 1360, 2324, 964, 3681, NULL, 6, 3440, 11, 24, 'Notgleis', 1, 0, '../images/seilbahnen/silvretta.jpg', 'Besitzt eine Mittelstation'),
(10, 10, 'Zinsbergbahn (Brixen im Thale)', 'Zinsbergbahn', 2019, '8/10-CGD', 'Brixen im Thale (AT)', 'Doppelmayr', 1280, 1667, 378, 1844, NULL, 6, 3434, 6, 8, 'Oberflur', 1, 1, '../images/seilbahnen/zinsberg.jpg', 'Sessel-Gondelbahn Kombination:\r\n8 Pers. pro Sessellift\r\n10 Pers. pro Gondel'),
(11, 5, 'Würstlexpress (Brixen im Thale)', 'Würstlexpress', 1997, '1-SL', 'Brixen im Thale (AT)', 'Doppelmayr', 1268, 1292, 24, 180, NULL, 2, 800, 1, 1, NULL, 0, 0, '../images/seilbahnen/wuerstlexpress.jpg', 'Dient nur als Zubringerlift, um von der Kälbersalvenbahn zur Zinsbergbahn zu gelangen'),
(12, 7, 'Flimsattelbahn (Samnaun)', 'Flimsattelbahn', 1994, '4-CLD/B', 'Samnaun (CH)', 'Garaventa', 2265, 2754, 489, 2695, NULL, 5, 2400, 9, 4, 'Unterflur', 1, 0, '../images/seilbahnen/flimsattelbahn.jpg', 'Besitz orange Hauben'),
(13, 9, 'Idjochbahn (Ischgl)', 'Idjochbahn', 2001, '8CLD/B', 'Ischgl (AT)', 'Doppelmayr', 2302, 2763, 461, 1797, NULL, 5, 3000, 6, 8, 'Oberflur', 1, 0, '../images/seilbahnen/Idflimjoch.jpg', 'Erster 8er Sessellift der Welt mit Haube.\r\nDie Anlage hat 61 Sessel mit Haube und 20 Windsessel.\r\n\r\nVor der Bahn steht jetzt noch die neuere Flimjochbahn (siehe Bild)'),
(14, 9, 'Eibergbahn (Scheffau)', 'Eibergbahn', 2024, '8-CLD', 'Scheffau (AT)', 'Doppelmayr', 1528, 1683, 155, 476, NULL, 5, 4570, 2, 8, 'Oberflur', 1, 1, '../images/seilbahnen/eiberg.jpg', 'beförderungsstärkste Sesselbahn der Welt\r\nTalstation in L-Form'),
(15, 3, 'La Villa-Piz La Villa (La Villa)', 'La Villa-Piz La Villa ', 1966, '2-BL', 'La-Villa (IT)', 'Leitner', NULL, NULL, NULL, 1954, NULL, NULL, 402, NULL, 2, NULL, 0, 0, '../images/seilbahnen/lavilla.jpg', NULL),
(20, 9, 'Aualmbahn (Scheffau)', 'Aualmbahn', 2014, '8-CLD/B', 'Scheffau (AT)', 'Doppelmayr', 1386, 1676, 1038, 0, 0, 5, 3700, 4, 8, 'Oberflur', 1, 1, '../images/seilbahnen/aualm.jpg', 'selbstöffnende Bügel'),
(21, 8, 'Filzbodenbahn (Brixen im Thale)', 'Filzbodenbahn', 2002, '6-CLD', 'Brixen im Thale (AT)', 'Doppelmayr', 1258, 1671, 413, 1754, 0, 5, 3000, 6, 6, 'Oberflur', 1, 0, '../images/seilbahnen/filzboden.jpg', 'Bis zum Bau der Jochbahn die längste Seilbahn im Skigebiet');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `seilbahndaten`
--
ALTER TABLE `seilbahndaten`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `seilbahndaten`
--
ALTER TABLE `seilbahndaten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
