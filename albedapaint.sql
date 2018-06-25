-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jun 2018 om 21:30
-- Serverversie: 10.1.32-MariaDB
-- PHP-versie: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `albedapaint`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE `factuur` (
  `factuurnummer` int(8) NOT NULL,
  `factuurdatum` date NOT NULL,
  `factuur_prijs` decimal(55,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `factuur`
--

INSERT INTO `factuur` (`factuurnummer`, `factuurdatum`, `factuur_prijs`) VALUES
(1, '2018-06-01', '12.34'),
(2, '2018-06-01', '203.25'),
(3, '2018-06-01', '20.25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `klant_id` int(8) NOT NULL,
  `klant_naam` varchar(55) NOT NULL,
  `klant_email` varchar(55) NOT NULL,
  `klant_adres` varchar(55) NOT NULL,
  `klant_postcode` varchar(55) NOT NULL,
  `klant_woonplaats` varchar(55) NOT NULL,
  `klant_memo` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`klant_id`, `klant_naam`, `klant_email`, `klant_adres`, `klant_postcode`, `klant_woonplaats`, `klant_memo`) VALUES
(2, 'Hendrik-Jan de Vlieger', 'hendrik@hejonet.nl', 'Baljuwerf 18', '3264SK', 'Nieuw-Beijerland', 'Hendrik-Jan is de vader van Thijs');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `offerte`
--

CREATE TABLE `offerte` (
  `offertenummer` int(8) NOT NULL,
  `offerte_werkzaamheden` tinytext NOT NULL,
  `offerte_prijs` decimal(55,2) NOT NULL,
  `offertedatum` date NOT NULL,
  `offerte_status` varchar(55) NOT NULL,
  `klant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `offerte`
--

INSERT INTO `offerte` (`offertenummer`, `offerte_werkzaamheden`, `offerte_prijs`, `offertedatum`, `offerte_status`, `klant_id`) VALUES
(6, 'Website', '250.00', '2018-06-01', 'Nieuw', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `offerte_regel`
--

CREATE TABLE `offerte_regel` (
  `factuurnummer` int(8) NOT NULL,
  `offertenummer` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `offerte_regel`
--

INSERT INTO `offerte_regel` (`factuurnummer`, `offertenummer`) VALUES
(1, 1),
(2, 5),
(3, 6);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`factuurnummer`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexen voor tabel `offerte`
--
ALTER TABLE `offerte`
  ADD PRIMARY KEY (`offertenummer`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `offerte`
--
ALTER TABLE `offerte`
  MODIFY `offertenummer` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
