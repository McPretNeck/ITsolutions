-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 03:58 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql7273416`
--
DROP DATABASE IF EXISTS `sql7273416`;
CREATE DATABASE IF NOT EXISTS `sql7273416` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `sql7273416`;

-- --------------------------------------------------------

--
-- Table structure for table `afdelingen`
--

CREATE TABLE `afdelingen` (
  `AfdCode` varchar(3) COLLATE utf8_bin NOT NULL,
  `AfdNaam` varchar(20) COLLATE utf8_bin NOT NULL,
  `AfdManager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `afdelingen`
--

INSERT INTO `afdelingen` (`AfdCode`, `AfdNaam`, `AfdManager`) VALUES
('Fic', 'Financien', 2),
('ICT', 'ICT', 1),
('Log', 'Logistiek', 6),
('Pur', 'Purchassing', 14);

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE `bestelling` (
  `BestellingID` int(11) NOT NULL,
  `GebruikerID` int(11) NOT NULL,
  `Status` varchar(30) COLLATE utf8_bin NOT NULL,
  `Reden` text COLLATE utf8_bin NOT NULL,
  `Opmerking` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bestelling`
--

INSERT INTO `bestelling` (`BestellingID`, `GebruikerID`, `Status`, `Reden`, `Opmerking`) VALUES
(1, 1, 'Nieuw', 'ODHK', 'NEE!! wat denk je zelf.'),
(2, 1, 'Nieuw', 'Kerst Kadau voor de baas. Je weet zelf!', NULL),
(3, 1, 'Nieuw', 'Kerst Kadau voor de baas. Je weet zelf!', NULL),
(4, 1, 'Nieuw', 'Kerst Kadau voor de baas. Je weet zelf!', NULL),
(5, 1, 'Nieuw', 'Kerst Kadau voor de baas. Je weet zelf!', NULL),
(6, 1, 'Nieuw', 'Kerst Kadau voor de baas. Je weet zelf!', NULL),
(7, 1, 'Nieuw', 'odhk', NULL),
(8, 1, 'Nieuw', 'odhk', NULL),
(9, 1, 'Nieuw', 'odhk', NULL),
(10, 1, 'Nieuw', 'f', NULL),
(11, 1, 'Nieuw', 'f', NULL),
(12, 1, 'Nieuw', 'g', NULL),
(13, 1, 'Nieuw', 'g', NULL),
(14, 1, 'Nieuw', 'f', NULL),
(15, 1, 'Nieuw', 'odhk', NULL),
(16, 1, 'Nieuw', 'omdat ik dit moet testen!', NULL),
(17, 1, 'Nieuw', 'omdat ik dit moet testen!', NULL),
(18, 1, 'Nieuw', 'omdat ik dit moet testen', NULL),
(19, 1, 'Nieuw', 'omdat ik dit moet testen', NULL),
(20, 1, 'Nieuw', '', NULL),
(21, 1, 'Nieuw', 'Omdat het kan!!', NULL),
(22, 1, 'Nieuw', 'Omdat het kan!!', NULL),
(23, 1, 'Nieuw', 'omdat het kan!!', NULL),
(24, 8, 'Nieuw', 'Omdat ik wil testen of er een bericht in de pm table geplaatst gaat worden.', NULL),
(25, 8, 'Nieuw', 'Omdat ik wil testen of er een bericht in de pm table geplaatst gaat worden.', NULL),
(26, 8, 'Nieuw', 'Omdat ik wil testen in dit bericht in de database komt. pm table.', NULL),
(27, 8, 'Nieuw', 'Omdat ik wil testen in dit bericht in de database komt. pm table.', NULL),
(28, 8, 'Nieuw', 'Omdat ik wil testen in dit bericht in de database komt. pm table.', NULL),
(29, 8, 'Nieuw', 'Omdat ik wil testen in dit bericht in de database komt. pm table.', NULL),
(30, 8, 'Nieuw', 'omdat het kan!!!!', NULL),
(31, 8, 'Nieuw', 'omdat het kan!', NULL),
(32, 8, 'Nieuw', 'omdat het kan!', NULL),
(33, 8, 'Nieuw', 'd', NULL),
(34, 8, 'Nieuw', 'test 12 test', NULL),
(35, 8, 'Nieuw', 'Test 123', NULL),
(36, 8, 'Nieuw', 'aaaawe toeeee ? <3 :*', NULL),
(37, 11, 'Nieuw', 'a', NULL),
(38, 11, 'Nieuw', 'a', NULL),
(39, 11, 'Jouw aanvraacht is in behandel', 'a', NULL),
(40, 8, 'Jouw aanvraacht is in behandel', 'ja ?', NULL),
(41, 8, 'Jouw aanvraacht is in behandel', '?', NULL),
(42, 8, 'Jouw aanvraacht is in behandel', '?', NULL),
(43, 8, 'Jouw aanvraacht is in behandel', '1', NULL),
(44, 8, 'Jouw aanvraacht is in behandel', '1', NULL),
(45, 8, 'Jouw aanvraacht is in behandel', '1', NULL),
(46, 8, 'Nieuw', '1', NULL),
(47, 8, 'Nieuw', '1', NULL),
(48, 8, 'Jouw aanvraacht is in behandel', '1', NULL),
(49, 8, 'Jouw aanvraacht is in behandel', '1', NULL),
(50, 8, 'Jouw aanvraacht is in behandel', 'jnvksjdn', NULL),
(51, 8, 'Jouw aanvraacht is in behandel', 'ssss', NULL),
(52, 8, 'Jouw aanvraacht is in behandel', 'ssss', NULL),
(53, 8, 'Denied', 'omdat ik met klanten moet bellen he!', NULL),
(54, 8, 'Jouw aanvraacht is in behandel', 'test!', NULL),
(55, 11, 'Jouw aanvraacht is in behandel', 'Hooi!', NULL),
(56, 11, 'Accepted', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

CREATE TABLE `factuur` (
  `factuurnummer` int(20) NOT NULL,
  `OderID` int(20) NOT NULL,
  `Status` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `LeverancierID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `factuur`
--

INSERT INTO `factuur` (`factuurnummer`, `OderID`, `Status`, `LeverancierID`) VALUES
(1, 23, 'Nieuw', 10),
(2, 23, 'Nieuw', 11);

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `idGebruiker` int(11) NOT NULL,
  `AfdCode` varchar(3) COLLATE utf8_bin NOT NULL,
  `Naam` varchar(45) COLLATE utf8_bin NOT NULL,
  `Wachtwoord` varchar(45) COLLATE utf8_bin NOT NULL,
  `Rol` int(11) NOT NULL,
  `Email` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Telefoonnummer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gebruiker`
--

INSERT INTO `gebruiker` (`idGebruiker`, `AfdCode`, `Naam`, `Wachtwoord`, `Rol`, `Email`, `Telefoonnummer`) VALUES
(1, 'ICT', 'Admin', 'Admin', 1, 'r.e.heeren@st.hanze.nl', 624320122),
(2, 'Fic', 'Gebruiker', 'Gebruiker', 2, 'Gebruiker@stambeest.nl', 9065656),
(6, 'Log', 'Robert', 'Heeren', 2, 'r.e.heeren@st.hanze.nl', 624320122),
(8, 'ICT', 'Pretzel', 'heeren', 2, 'r.e.heeren@st.hanze.nl', 624320122),
(9, 'ICT', 'Mcpretneck', '1234', 2, 'Spam@gmail.com', 624320122),
(10, 'ICT', 'Presentatie', '1234', 2, 'r.e.heeren@st.hanze.nl', 624320122),
(11, 'ICT', 'BuyerIT', '1234', 3, 'r.e.heeren@st.hanze.nl', 624320122),
(12, 'Fic', 'BuyerFic', '1234', 3, 'r.e.heeren@st.hanze.nl', 624320122),
(13, 'Log', 'BuyerLog', '1234', 3, 'r.e.heeren@st.hanze.nl', 624320122),
(14, 'Pur', 'ManagerPurchassing', '1234', 3, 'r.e.heeren@st.hanze.nl', 624320122);

-- --------------------------------------------------------

--
-- Table structure for table `leveranciers`
--

CREATE TABLE `leveranciers` (
  `LeverancierID` int(11) NOT NULL,
  `Naam` varchar(30) COLLATE utf8_bin NOT NULL,
  `Huisnummer` int(11) NOT NULL,
  `PostCode` varchar(6) COLLATE utf8_bin NOT NULL,
  `Land` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Straatnaam` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Telefoon` int(10) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `toevoeging` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `Act` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `leveranciers`
--

INSERT INTO `leveranciers` (`LeverancierID`, `Naam`, `Huisnummer`, `PostCode`, `Land`, `Straatnaam`, `Telefoon`, `email`, `toevoeging`, `Act`) VALUES
(7, 'Robert', 28, '9711RC', 'Nederland', 'Schuitendiep', 624320122, 'r.e.heeren@st.hanze.nl', '1', 0),
(10, 'Bol.com', 96, '3528BJ', 'Nederland', 'Papendorpseweg', 303104999, 'info@bol.com', '', 0),
(11, 'Staples Groningen', 11, '9723JA', 'Nederland', 'Kieler Bocht', 503110505, 'klantenservice@officecentre.nl', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` int(11) NOT NULL,
  `van` int(11) NOT NULL,
  `naar` int(11) NOT NULL,
  `status` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `admin` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `onderwerp` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tijd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bericht` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `van`, `naar`, `status`, `OrderID`, `admin`, `onderwerp`, `tijd`, `bericht`) VALUES
(1, 8, 11, '0', 34, '', 'Aankoopverzoek van Pretzel', '2019-01-28 20:09:13', 'test 12 test'),
(2, 8, 11, '0', 34, '', 'Aankoopverzoek van Pretzel', '2019-01-28 20:09:13', 'test 12 test'),
(4, 8, 11, '0', 36, '', 'Aankoopverzoek van Pretzel', '2019-01-28 20:50:59', 'aaaawe toeeee ? <3 :*'),
(5, 11, 11, '0', 37, '', 'Aankoopverzoek van BuyerIT', '2019-01-28 20:52:44', 'a'),
(6, 11, 11, '0', 38, '', 'Aankoopverzoek van BuyerIT', '2019-01-28 20:53:57', 'a'),
(7, 11, 11, '0', 39, '', 'Aankoopverzoek van BuyerIT', '2019-01-28 20:54:35', 'a'),
(8, 8, 11, '0', 40, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:03:02', 'ja ?'),
(9, 8, 11, '0', 40, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:03:02', 'ja ?'),
(10, 8, 11, '0', 40, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:03:02', 'ja ?'),
(11, 8, 11, '0', 41, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:04:07', '?'),
(12, 8, 11, '0', 41, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:04:07', '?'),
(13, 8, 11, '0', 41, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:04:07', '?'),
(14, 8, 11, '0', 42, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:05:38', '?'),
(15, 8, 1, '0', 42, '', 'Aankoopverzoek van Pretzel: ', '2019-01-28 21:05:38', '?'),
(16, 8, 1, '0', 42, '', 'Aankoopverzoek van Pretzel: ', '2019-01-28 21:05:38', '?'),
(17, 8, 11, '0', 43, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:06:31', '1'),
(18, 8, 1, '0', 43, '', 'Aankoopverzoek van Pretzel: ', '2019-01-28 21:06:31', '1'),
(19, 8, 1, '0', 43, '', 'Aankoopverzoek van Pretzel: ', '2019-01-28 21:06:31', '1'),
(20, 8, 11, '0', 44, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:09:02', '1'),
(21, 8, 11, '0', 45, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:09:20', '1'),
(22, 8, 1, '0', 48, '', 'Aankoopverzoek van Pretzel: ', '2019-01-28 21:12:49', '1'),
(23, 8, 1, '0', 49, '', 'Aankoopverzoek van Pretzel: ', '2019-01-28 21:13:15', '1'),
(24, 8, 1, '0', 50, '', 'Aankoopverzoek van Pretzel: ', '2019-01-28 21:14:12', 'jnvksjdn'),
(25, 8, 11, '0', 51, '', 'Aankoopverzoek van Pretzel', '2019-01-28 21:16:45', 'ssss'),
(26, 8, 1, '0', 52, '', 'Aankoopverzoek van Pretzel: ', '2019-01-28 21:17:03', 'ssss'),
(27, 8, 1, '0', 53, '', 'Aankoopverzoek van Pretzel: ', '2019-01-30 08:30:12', 'omdat ik met klanten moet bellen he!\n\n<a href=\"ApproveOrDeny.php?ID=53&naam=Pretzel\">Verwerken</b></a>'),
(28, 1, 8, '0', 53, '', 'Bestelling van Pretzel', '2019-01-30 08:32:32', 'omdat ik met klanten moet bellen he!\n \n \n Deze bestelling is afgekeurd:Admin'),
(29, 8, 11, '0', 54, '', 'Aankoopverzoek van Pretzel', '2019-01-30 08:33:39', 'test!'),
(30, 11, 11, '0', 55, '', 'Aankoopverzoek van BuyerIT', '2019-01-30 09:57:21', 'Hooi!'),
(31, 11, 1, '0', 56, '', 'Aankoopverzoek van BuyerIT: ', '2019-01-30 09:58:21', 'test\n\n<a href=\"ApproveOrDeny.php?ID=56&naam=BuyerIT\">Verwerken</b></a>'),
(32, 11, 11, '0', 56, '', 'Nieuwe bestelling van BuyerIT', '2019-01-30 09:58:33', 'test<br/>Deze bestelling is goed gekeurd door de manager:BuyerIT');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `ProductID` int(11) NOT NULL,
  `Naam` varchar(30) COLLATE utf8_bin NOT NULL,
  `Prijs` float NOT NULL,
  `Omschrijving` text COLLATE utf8_bin NOT NULL,
  `Act` tinyint(1) NOT NULL,
  `LeveranciersID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`ProductID`, `Naam`, `Prijs`, `Omschrijving`, `Act`, `LeveranciersID`) VALUES
(10, 'Double A Papier - A4-papier / ', 26.99, 'Haarscherp printen en kopiÃ«ren. Hagelwit papier. Tweezijdig te gebruiken. Storingsvrij. Verlengt de levensduur van het kopieerapparaat. Kwaliteit wordt gegarandeerd door een ultramodern productieproces. Voldoet aan de houdbaarheidsnorm ISO9706. Dit papier heeft een witheid van CIE160. 5 PAKKEN VAN 500 VEL', 0, 10),
(33, 'Apple iPhone X - 64GB - Spaceg', 899.99, 'Productbeschrijving\r\nWil je jouw smartphone voor veel meer gebruiken dan alleen bereikbaarheid? Deze smartphone geeft je de ultieme entertainmentervaring, laat je perfecte foto\'s in alle omstandigheden maken en geeft je super snel toegang tot al jouw apps. Met een dubbele camera aan de achterkant van je smartphone kun je bijvoorbeeld foto\'s met diepte maken of een groter geheel vastleggen. Je kunt deze smartphone opladen via een draadloze oplader, zodat je nooit meer vast zit aan een kabeltje. En met een smartphone die spatwaterdicht is, doet het scherm van je telefoon het nog steeds in een flinke regenbui.\r\n\r\nPlus- en minpunten van de Apple iPhone X\r\nPluspunten Heeft een helder en scherp scherm\r\nPluspunten Heeft dubbele camera waarmee je diepte kunt vastleggen\r\nPluspunten Kan ontgrendeld worden met gezichtsherkenning\r\nMinpunten Is wat zwaarder dan de gemiddelde iPhone.\r\nWil je toch een lichtere iPhone? Dan raden we je de Apple iPhone 8 Plus aan.\r\n\r\nApple iPhone X\r\n\r\nWat maakt de Apple iPhone X bijzonder?\r\nHet prachtige scherm van de iPhone X volgt de rondingen van het design, waarmee deze smartphone een lust voor het oog is. De TrueDepth-frontcamera maakt (3D) Face ID mogelijk: geavanceerde gezichtsherkenning om snel, makkelijk en intuÃ¯tief te ontgrendelen. Mooie fotoâ€™s maak je gemakkelijk door de dubbele camera, beeldstabilisatie en instellingen voor verschillende belichtingseffecten. \r\n\r\nApple iPhone X\r\n\r\nOnze specialist adviseert deze smartphone voor:\r\nVink Sociale Media: gebruik Social Media apps, zelfs tegelijk.\r\nVink Entertainment: de ultieme entertainment-ervaring; van films & series tot games!\r\nVink Dagelijks gebruik: altijd bereikbaar en super snel internet.\r\nVink Fotografie: fotografeer op een professioneel niveau.', 0, 10),
(34, 'Double A Papier - A4-papier / ', 89.99, 'printer papier', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `productenbesteld`
--

CREATE TABLE `productenbesteld` (
  `BestellingID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `productenbesteld`
--

INSERT INTO `productenbesteld` (`BestellingID`, `ProductID`, `Aantal`) VALUES
(14, 10, 2),
(15, 34, 1),
(18, 10, 6),
(18, 33, 1),
(18, 34, 4),
(20, 10, 2),
(20, 33, 1),
(20, 34, 1),
(21, 10, 2),
(21, 33, 1),
(21, 34, 1),
(23, 10, 2),
(23, 33, 1),
(23, 34, 1),
(24, 10, 1),
(24, 33, 1),
(24, 34, 1),
(26, 10, 1),
(26, 33, 1),
(30, 10, 1),
(30, 33, 1),
(30, 34, 4),
(31, 10, 1),
(31, 33, 1),
(33, 10, 1),
(34, 10, 1),
(35, 10, 1),
(36, 10, 1),
(36, 33, 2),
(37, 10, 2),
(40, 33, 1),
(41, 33, 1),
(43, 33, 1),
(46, 33, 1),
(50, 10, 1),
(51, 10, 1),
(52, 33, 1),
(53, 33, 1),
(54, 10, 2),
(55, 10, 2),
(56, 33, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afdelingen`
--
ALTER TABLE `afdelingen`
  ADD PRIMARY KEY (`AfdCode`),
  ADD KEY `fchfcg` (`AfdManager`);

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`BestellingID`),
  ADD KEY `GebruikerID` (`GebruikerID`);

--
-- Indexes for table `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`factuurnummer`),
  ADD KEY `bestelling` (`OderID`),
  ADD KEY `LeverancierID` (`LeverancierID`);

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`idGebruiker`),
  ADD KEY `AfdCode` (`AfdCode`);

--
-- Indexes for table `leveranciers`
--
ALTER TABLE `leveranciers`
  ADD PRIMARY KEY (`LeverancierID`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vanGebruiker` (`van`),
  ADD KEY `naarGebruiker` (`naar`),
  ADD KEY `OrderBestelling` (`OrderID`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `leverancierProduct` (`LeveranciersID`);

--
-- Indexes for table `productenbesteld`
--
ALTER TABLE `productenbesteld`
  ADD PRIMARY KEY (`BestellingID`,`ProductID`,`Aantal`),
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `BestellingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `factuur`
--
ALTER TABLE `factuur`
  MODIFY `factuurnummer` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `idGebruiker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `leveranciers`
--
ALTER TABLE `leveranciers`
  MODIFY `LeverancierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pm`
--
ALTER TABLE `pm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afdelingen`
--
ALTER TABLE `afdelingen`
  ADD CONSTRAINT `Afdelingen_ibfk_1` FOREIGN KEY (`AfdCode`) REFERENCES `gebruiker` (`AfdCode`);

--
-- Constraints for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`GebruikerID`) REFERENCES `gebruiker` (`idGebruiker`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `factuur_ibfk_1` FOREIGN KEY (`OderID`) REFERENCES `bestelling` (`BestellingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `factuur_ibfk_2` FOREIGN KEY (`LeverancierID`) REFERENCES `leveranciers` (`LeverancierID`);

--
-- Constraints for table `pm`
--
ALTER TABLE `pm`
  ADD CONSTRAINT `OrderBestelling` FOREIGN KEY (`OrderID`) REFERENCES `bestelling` (`BestellingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `naarGebruiker` FOREIGN KEY (`naar`) REFERENCES `gebruiker` (`idGebruiker`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `vanGebruiker` FOREIGN KEY (`van`) REFERENCES `gebruiker` (`idGebruiker`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `producten_ibfk_1` FOREIGN KEY (`LeveranciersID`) REFERENCES `leveranciers` (`LeverancierID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `productenbesteld`
--
ALTER TABLE `productenbesteld`
  ADD CONSTRAINT `productenbesteld_ibfk_1` FOREIGN KEY (`BestellingID`) REFERENCES `bestelling` (`BestellingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productenbesteld_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `producten` (`ProductID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
