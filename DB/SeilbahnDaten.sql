-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jan 2025 um 10:04
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
(4, 7, 'Gampenkogelbahn (Westendorf)', 'Gampenkogelbahn', 2001, '4-CLF', 'Westendorf (AT)', 'Girak-Garaventa', 1576, 1808, 232, 757, NULL, 3, 2400, 5, 4, NULL, 0, 0, '../images/seilbahnen/gampenkogel.jpg', NULL),
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
(20, 9, 'Aualmbahn (Scheffau)', 'Aualmbahn', 2014, '8-CLD/B', 'Scheffau (AT)', 'Doppelmayr', 1386, 1676, 1038, NULL, NULL, 5, 3700, 4, 8, 'Oberflur', 1, 1, '../images/seilbahnen/aualm.jpg', 'selbstöffnende Bügel'),
(21, 8, 'Filzbodenbahn (Brixen im Thale)', 'Filzbodenbahn', 2002, '6-CLD', 'Brixen im Thale (AT)', 'Doppelmayr', 1258, 1671, 413, 1754, NULL, 5, 3000, 6, 6, 'Oberflur', 1, 0, '../images/seilbahnen/filzboden.jpg', 'Bis zum Bau der Jochbahn die längste Seilbahn im Skigebiet'),
(26, 3, 'Brandstadl (Scheffau)', 'Brandstadl', 2002, '8-MGD', 'Scheffau (AT)', 'Doppelmayr', 677, 1638, 961, 3340, NULL, 6, 2800, 9, 8, 'Oberflur', 1, 0, '../images/seilbahnen/brandtstadl.jpg', NULL),
(27, 8, 'Ellmis´s 6er (Ellmau)', 'Ellmis´s 6er', 2009, '6-CLD', 'Ellmau (AT)', 'Doppelmayr', 1220, 1521, 301, 1200, NULL, 5, 2600, 5, 6, 'Stationsumlauf', 1, 1, '../images/seilbahnen/elmis6er.jpg', NULL),
(28, 3, 'Hartkaiserbahn (Ellmau)', 'Hartkaiserbahn', 2015, '10-MGD', 'Ellmau (AT)', 'Doppelmayr', 820, 1523, 703, 2269, NULL, 6, 3222, 9, 10, 'Unterflur', 1, 1, '../images/seilbahnen/hartkaiser.jpg', 'Die Gondeln besitzen alle gratis W-LAN. Ersetzte die Zahnradbahn'),
(29, 7, 'Kaiserexpress (Ellmau)', 'Kaiserexpress', 2002, '4-CLF', 'Ellmau (AT)', 'Doppelmayr', 1365, 1525, 161, 590, NULL, 2, 2384, 5, 4, NULL, 0, 0, '../images/seilbahnen/kaiserexpress.jpg', NULL),
(30, 8, 'Kögelbahn (Ellmau)', 'Kögelbahn', 2000, '6-CLD', 'Ellmau (AT)', 'Doppelmayr', 1261, 1574, 313, 965, NULL, 5, 2700, 3, 6, 'Stationsumlauf', 1, 0, '../images/seilbahnen/köglbahn.jpg', NULL),
(31, 8, 'Tanzbodenbahn (Ellmau)', 'Tanzbodenbahn', 2006, '6-CLD', 'Ellmau (AT)', 'Doppelmayr', 1425, 1591, 163, 714, NULL, 5, 2400, 3, 6, 'Stationsumlauf', 0, 1, '../images/seilbahnen/tanzboden.jpg', NULL),
(32, 8, 'Kummeralmbahn (Scheffau)', 'Kummeralmbahn', 2005, '6-CLD', 'Scheffau (AT)', 'Doppelmayr', 1383, 1675, 292, 873, NULL, 5, 2800, NULL, 6, 'Stationsumlauf', 0, 0, '../images/seilbahnen/kummeralmbahn.jpg', NULL),
(33, 7, 'Muldenbahn (Scheffau)', 'Muldenbahn', 1998, '4-CLF', 'Scheffau (AT)', 'Doppelmayr', 1536, 1668, 132, 452, NULL, 2, 2386, 4, 0, NULL, 0, 0, '../images/seilbahnen/muldenlift.jpg', NULL),
(34, 9, 'Osthangbahn (Scheffau)', 'Osthangbahn', 2010, '8-CLD/B', 'Scheffau (AT)', 'Doppelmayr', 1527, 1646, 119, 510, NULL, 5, 3400, 2, 8, 'Stationsumlauf', 0, 1, '../images/seilbahnen/osthangbahn.jpg', 'selbstverriegelnde und -öffnende Bügel ohne Fußraster'),
(35, 5, 'Poldanger (Brixen im Thale)', 'Poldanger', 1970, '1-SL', 'Brixen im Thale (AT)', 'Doppelmayr', 1296, 1369, 73, 314, NULL, NULL, 682, NULL, 1, NULL, 0, 0, '../images/seilbahnen/poldanger.jpg', 'Ursprünglich als 2-SL mit Kurzbügeln in Betrieb, auf Tellerlift umgerüstet.'),
(36, 8, 'Kälbersalvenbahn (Brixen im Thale)', 'Kälbersalvenbahn', 1997, '6-CLD', 'Brixen im Thale (AT)', 'Doppelmayr', 1276, 1644, 368, 1473, NULL, 5, 3100, 5, 6, 'Unterflur', 1, 0, '../images/seilbahnen/kaelbersalve.jpg', 'Erste 6 KSB in der Skiwelt'),
(37, 3, 'Skiweltbahn (Brixen im Thale)', 'Skiweltbahn', 2008, '8-MGD', 'Brixen im Thale (AT)', 'Doppelmayr', 794, 1820, 1007, 3407, NULL, 6, 2200, 12, 8, 'Oberflur', 1, 0, '../images/seilbahnen/skiweltbahn.jpg', 'Kreuzt eine Eisenbahnstrecke'),
(38, 3, 'Gondelbahn Hochbrixen (Brixen im Thale)', 'Gondelbahn Hochbrixen', 1986, '6-MGD', 'Brixen im Thale (AT)', 'Doppelmayr', 800, 1300, 500, 1762, NULL, 5, 2200, 6, 6, 'Oberflur', 1, 0, '../images/seilbahnen/hochbrixengondel.jpg', NULL),
(39, 9, 'Foischingbahn (Hopfgarten)', 'Foischingbahn', 2000, '8-CLD', 'Hopfgarten (AT)', 'Doppelmayr', 1254, 1627, 373, 1415, NULL, 5, 3000, 5, 8, 'Oberflur', 1, 0, '../images/seilbahnen/foiching.jpg', 'Gestaffelte Zugangsschranken');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
