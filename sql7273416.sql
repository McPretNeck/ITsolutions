-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 03:58 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `afdelingen`
--

CREATE TABLE `afdelingen` (
  `AfdCode` varchar(3) COLLATE utf8_bin NOT NULL,
  `AfdNaam` varchar(20) COLLATE utf8_bin NOT NULL,
  `AfdHoofd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE `bestelling` (
  `BestellingID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `GebruikerID` int(11) NOT NULL,
  `Status` varchar(30) COLLATE utf8_bin NOT NULL,
  `Reden` text COLLATE utf8_bin NOT NULL,
  `Opmerking` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bestelling`
--

INSERT INTO `bestelling` (`BestellingID`, `ProductID`, `GebruikerID`, `Status`, `Reden`, `Opmerking`) VALUES
(1, 0, 1, 'Nieuw', 'omdat het kan', ''),
(2, 0, 1, 'Nieuw', 'omdat het kan', ''),
(3, 0, 1, 'Nieuw', 'omdat het kan', ''),
(4, 0, 1, 'Nieuw', 'o', ''),
(5, 0, 1, 'Nieuw', 'o', ''),
(6, 0, 1, 'Nieuw', '', ''),
(7, 0, 1, 'Nieuw', '', ''),
(8, 0, 1, 'Nieuw', '', ''),
(9, 0, 1, 'Nieuw', '', ''),
(10, 0, 1, 'Nieuw', '', ''),
(11, 0, 1, 'Nieuw', '', ''),
(12, 0, 1, 'Nieuw', '', ''),
(13, 0, 1, 'Nieuw', '', ''),
(14, 0, 1, 'Nieuw', 'odhk', ''),
(15, 0, 1, 'Nieuw', 'odhk', ''),
(16, 0, 1, 'Nieuw', 'odhk', ''),
(17, 0, 1, 'Nieuw', 'odhk', ''),
(18, 0, 1, 'Nieuw', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

CREATE TABLE `factuur` (
  `factuurnummer` int(20) NOT NULL,
  `OderID` int(20) NOT NULL,
  `Status` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(1, '', 'Admin', 'Admin', 1, 'r.e.heeren@st.hanze.nl', 624320122),
(2, '', 'Gebruiker', 'Gebruiker', 2, 'Gebruiker@stambeest.nl', 9065656),
(6, '', 'Robert', 'Heeren', 2, 'r.e.heeren@st.hanze.nl', 624320122),
(7, '', 'Henk', 'smit', 2, 'nfsjk', 625484684),
(8, '', 'Pretzel', 'heeren', 2, 'r.e.heeren@st.hanze.nl', 624320122),
(9, '', 'Mcpretneck', '1234', 2, 'Spam@gmail.com', 624320122),
(10, '', 'Presentatie', '1234', 2, 'r.e.heeren@st.hanze.nl', 624320122);

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
  `toevoeging` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `leveranciers`
--

INSERT INTO `leveranciers` (`LeverancierID`, `Naam`, `Huisnummer`, `PostCode`, `Land`, `Straatnaam`, `Telefoon`, `email`, `toevoeging`) VALUES
(10, 'Bol.com', 96, '3528BJ', 'Nederland', 'Papendorpseweg', 303104999, 'info@bol.com', ''),
(11, 'Staples Groningen', 11, '9723JA', 'Nederland', 'Kieler Bocht', 503110505, 'klantenservice@officecentre.nl', '');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `From` int(11) NOT NULL,
  `To` int(11) NOT NULL,
  `Sub` varchar(100) COLLATE utf8_bin NOT NULL,
  `Msg` text COLLATE utf8_bin NOT NULL,
  `MsgID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` int(11) NOT NULL,
  `van` int(11) NOT NULL,
  `naar` int(11) NOT NULL,
  `status` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `admin` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `onderwerp` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tijd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bericht` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `van`, `naar`, `status`, `admin`, `onderwerp`, `tijd`, `bericht`) VALUES
(1, 1, 2, '0', 'me', 'odhk', '0000-00-00 00:00:00', 'Hoi!');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `ProductID` int(11) NOT NULL,
  `Naam` varchar(30) COLLATE utf8_bin NOT NULL,
  `Prijs` float NOT NULL,
  `Omschrijving` text COLLATE utf8_bin NOT NULL,
  `Img` varchar(100) COLLATE utf8_bin NOT NULL,
  `LeveranciersID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`ProductID`, `Naam`, `Prijs`, `Omschrijving`, `Img`, `LeveranciersID`) VALUES
(5, 'Double A Papier - A4-papier / ', 27, 'Haarscherp printen en kopiÃ«ren. Hagelwit papier. Tweezijdig te gebruiken. Storingsvrij. Verlengt de levensduur van het kopieerapparaat. Kwaliteit wordt gegarandeerd door een ultramodern productieproces. Voldoet aan de houdbaarheidsnorm ISO9706. Dit papier heeft een witheid van CIE160. 5 PAKKEN VAN 500 VEL', '', 10),
(7, 'Double A Papier - A4-papier / ', 27, 'Haarscherp printen en kopiÃ«ren. Hagelwit papier. Tweezijdig te gebruiken. Storingsvrij. Verlengt de levensduur van het kopieerapparaat. Kwaliteit wordt gegarandeerd door een ultramodern productieproces. Voldoet aan de houdbaarheidsnorm ISO9706. Dit papier heeft een witheid van CIE160. 5 PAKKEN VAN 500 VEL', '', 10),
(8, 'Double A Papier - A4-papier / ', 27, 'Haarscherp printen en kopiÃ«ren. Hagelwit papier. Tweezijdig te gebruiken. Storingsvrij. Verlengt de levensduur van het kopieerapparaat. Kwaliteit wordt gegarandeerd door een ultramodern productieproces. Voldoet aan de houdbaarheidsnorm ISO9706. Dit papier heeft een witheid van CIE160. 5 PAKKEN VAN 500 VEL', '', 10),
(9, 'Double A Papier - A4-papier / ', 27, 'Haarscherp printen en kopiÃ«ren. Hagelwit papier. Tweezijdig te gebruiken. Storingsvrij. Verlengt de levensduur van het kopieerapparaat. Kwaliteit wordt gegarandeerd door een ultramodern productieproces. Voldoet aan de houdbaarheidsnorm ISO9706. Dit papier heeft een witheid van CIE160. 5 PAKKEN VAN 500 VEL', '', 10),
(10, 'Double A Papier - A4-papier / ', 27, 'Haarscherp printen en kopiÃ«ren. Hagelwit papier. Tweezijdig te gebruiken. Storingsvrij. Verlengt de levensduur van het kopieerapparaat. Kwaliteit wordt gegarandeerd door een ultramodern productieproces. Voldoet aan de houdbaarheidsnorm ISO9706. Dit papier heeft een witheid van CIE160. 5 PAKKEN VAN 500 VEL', '', 10);

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
(1, 5, 1),
(1, 7, 1),
(1, 8, 3),
(4, 5, 2),
(4, 7, 1),
(6, 5, 1),
(6, 7, 1),
(7, 5, 1),
(9, 5, 25),
(10, 5, 1),
(14, 5, 1),
(14, 7, 1),
(14, 8, 1),
(16, 5, 2),
(17, 5, 1),
(18, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afdelingen`
--
ALTER TABLE `afdelingen`
  ADD PRIMARY KEY (`AfdCode`);

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`BestellingID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `GebruikerID` (`GebruikerID`);

--
-- Indexes for table `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`factuurnummer`),
  ADD KEY `bestelling` (`OderID`);

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
  ADD PRIMARY KEY (`LeverancierID`),
  ADD UNIQUE KEY `Naam_UNIQUE` (`Naam`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`MsgID`),
  ADD KEY `MsgOrder` (`OrderID`),
  ADD KEY `From` (`From`),
  ADD KEY `To` (`To`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `BestellingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `factuur`
--
ALTER TABLE `factuur`
  MODIFY `factuurnummer` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `idGebruiker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leveranciers`
--
ALTER TABLE `leveranciers`
  MODIFY `LeverancierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `MsgID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pm`
--
ALTER TABLE `pm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `factuur_ibfk_1` FOREIGN KEY (`OderID`) REFERENCES `bestelling` (`BestellingID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `bestelling` (`BestellingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `msg_ibfk_2` FOREIGN KEY (`From`) REFERENCES `gebruiker` (`idGebruiker`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `msg_ibfk_3` FOREIGN KEY (`To`) REFERENCES `gebruiker` (`idGebruiker`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
