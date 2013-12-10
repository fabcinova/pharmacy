-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Úte 10. pro 2013, 13:48
-- Verze serveru: 5.6.12-log
-- Verze PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `pharmacy`
--
CREATE DATABASE IF NOT EXISTS `xfabci00` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `xfabci00`;

-- --------------------------------------------------------

--
-- Struktura tabulky `adresy`
--

CREATE TABLE IF NOT EXISTS `adresy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ulice` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `cislo_popisne` int(11) NOT NULL,
  `psc` int(5) NOT NULL,
  `mesto` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=17 ;

--
-- Vypisuji data pro tabulku `adresy`
--

INSERT INTO `adresy` (`id`, `ulice`, `cislo_popisne`, `psc`, `mesto`) VALUES
(1, 'Drahobejlova', 4, 19000, 'Praha-Praha 9'),
(3, 'Jeremenkova', 11, 70300, 'Ostrava'),
(4, 'Roškotova', 1, 14000, 'Praha-Praha 4'),
(5, 'Husova', 302, 29301, 'Mladá Boleslav'),
(6, 'Kadaňská', 46, 18400, 'Praha-Praha-Dolní Chabry'),
(7, 'Michálkovická', 108, 71000, 'Ostrava-Slezská Ostrava'),
(8, 'Božetěchova', 42, 61200, 'Brno'),
(9, 'Milady Horákové', 2, 17000, 'Praha-Holešovice'),
(10, 'Pekárenská', 37, 60200, 'Brno'),
(11, 'Žlutá', 8, 10030, 'Horní Dolní'),
(12, 'Hlavní', 64, 38601, 'Střelskohoštická Lhota'),
(13, 'Vedlejší', 23, 14800, 'Praha'),
(14, 'Modrá', 1, 60200, 'Brno'),
(15, 'Stará', 99, 78964, 'Bohdíkov'),
(16, 'Platanova', 9, 1001, 'Zilina');

-- --------------------------------------------------------

--
-- Struktura tabulky `ceny`
--

CREATE TABLE IF NOT EXISTS `ceny` (
  `dodavatel` int(11) NOT NULL,
  `lek` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`lek`,`dodavatel`),
  UNIQUE KEY `dodavatel_lek` (`dodavatel`,`lek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `ceny`
--

INSERT INTO `ceny` (`dodavatel`, `lek`, `cena`) VALUES
(1, 2, 40),
(3, 2, 45),
(1, 3, 50),
(2, 3, 45),
(1, 4, 350),
(3, 4, 320),
(1, 5, 84),
(2, 5, 90),
(1, 6, 723),
(3, 6, 680);

-- --------------------------------------------------------

--
-- Struktura tabulky `dodavatele`
--

CREATE TABLE IF NOT EXISTS `dodavatele` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `adresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adresa` (`adresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `dodavatele`
--

INSERT INTO `dodavatele` (`id`, `nazev`, `adresa`) VALUES
(1, 'Lékus', 13),
(2, 'Levné Léky', 14),
(3, 'Babiččina mast', 15);

-- --------------------------------------------------------

--
-- Struktura tabulky `leky`
--

CREATE TABLE IF NOT EXISTS `leky` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `ucinna_latka` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `predpis` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=18 ;

--
-- Vypisuji data pro tabulku `leky`
--

INSERT INTO `leky` (`ID`, `nazev`, `ucinna_latka`, `predpis`) VALUES
(1, 'Ibalgin', 'antibolestinum', 0),
(2, 'Viagra', 'erectinum', 0),
(3, 'Xanax', 'antimentalium', 1),
(4, 'Minerva', 'mcgonagalium', 1),
(5, 'Bioparox', 'tomasium', 1),
(6, 'Rohypnol', 'znasilnovalium', 1),
(7, 'NovyLek', 'lalala', 0),
(11, 'Novy Lek Ktery Je Supr', 'latka ktera ucinkuje', 1),
(12, 'Liecik', 'juchuchu', 0),
(17, 'Ibalgin', 'ibuprofenum', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `nakupy`
--

CREATE TABLE IF NOT EXISTS `nakupy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `pobocka` int(11) NOT NULL,
  `lek` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lek` (`lek`),
  KEY `pobocka` (`pobocka`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabulky `pobocky`
--

CREATE TABLE IF NOT EXISTS `pobocky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adresa` (`adresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `pobocky`
--

INSERT INTO `pobocky` (`id`, `adresa`) VALUES
(1, 8),
(2, 9),
(3, 10),
(4, 11),
(5, 12);

-- --------------------------------------------------------

--
-- Struktura tabulky `pojistovny`
--

CREATE TABLE IF NOT EXISTS `pojistovny` (
  `kod` int(3) NOT NULL,
  `nazev` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `adresa` int(11) NOT NULL,
  PRIMARY KEY (`kod`),
  UNIQUE KEY `adresa` (`adresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pojistovny`
--

INSERT INTO `pojistovny` (`kod`, `nazev`, `adresa`) VALUES
(201, 'VOZP', 1),
(205, 'ČPZP', 3),
(207, 'OZP', 4),
(209, 'ZPŠ', 5),
(211, 'ZPMV', 6),
(213, 'ZPMV', 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `prispevky`
--

CREATE TABLE IF NOT EXISTS `prispevky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lek` int(11) NOT NULL,
  `pojistovna` int(3) NOT NULL,
  `vyse_prispevku` int(11) NOT NULL,
  `platnost_od` date NOT NULL,
  `platnost_do` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lek` (`lek`),
  KEY `pojistovna` (`pojistovna`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=19 ;

--
-- Vypisuji data pro tabulku `prispevky`
--

INSERT INTO `prispevky` (`id`, `lek`, `pojistovna`, `vyse_prispevku`, `platnost_od`, `platnost_do`) VALUES
(1, 3, 211, 45, '2014-01-10', '2014-02-10'),
(2, 5, 201, 30, '2013-01-01', '2013-12-31'),
(3, 5, 209, 25, '2013-11-01', '2013-12-31'),
(4, 3, 201, 150, '2014-01-20', '2014-05-31'),
(5, 1, 213, 5, '2014-01-20', '2014-12-31'),
(6, 4, 207, 96, '2013-09-01', '2014-04-30'),
(7, 6, 207, 50, '2013-12-01', '2013-12-11'),
(8, 1, 201, 555, '2014-01-01', '2014-08-08'),
(9, 1, 209, 28, '2014-01-01', '2014-12-31'),
(14, 3, 209, 34, '2013-02-01', '2014-01-01'),
(18, 1, 201, 18, '2014-12-31', '2014-12-31');

-- --------------------------------------------------------

--
-- Struktura tabulky `sklady`
--

CREATE TABLE IF NOT EXISTS `sklady` (
  `pobocka` int(11) NOT NULL,
  `lek` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `mnozstvi` int(11) NOT NULL,
  PRIMARY KEY (`lek`,`pobocka`),
  UNIQUE KEY `pobocka_lek` (`pobocka`,`lek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `sklady`
--

INSERT INTO `sklady` (`pobocka`, `lek`, `cena`, `mnozstvi`) VALUES
(1, 1, 40, 54),
(2, 1, 45, 140),
(3, 1, 40, 38),
(4, 1, 31, 20),
(5, 1, 35, 10),
(1, 2, 60, 5),
(2, 2, 65, 14),
(3, 2, 60, 0),
(4, 2, 51, 2),
(5, 2, 55, 10),
(1, 3, 60, 5),
(2, 3, 65, 4),
(3, 3, 60, 5),
(4, 3, 51, 2),
(5, 3, 55, 0),
(1, 4, 360, 22),
(2, 4, 379, 0),
(3, 4, 360, 2),
(4, 4, 337, 1),
(5, 4, 337, 13),
(1, 5, 160, 2),
(2, 5, 179, 10),
(3, 5, 160, 2),
(4, 5, 137, 0),
(5, 5, 137, 3),
(1, 6, 960, 0),
(2, 6, 979, 0),
(3, 6, 960, 0),
(4, 6, 937, 0),
(5, 6, 937, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `password` char(60) COLLATE utf8_czech_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', SHA1('admin'), 'admin'),
(2, 'lekarnik', SHA1('lekarnik'), 'lekarnik');

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `ceny`
--
ALTER TABLE `ceny`
  ADD CONSTRAINT `ceny_ibfk_1` FOREIGN KEY (`dodavatel`) REFERENCES `dodavatele` (`id`),
  ADD CONSTRAINT `ceny_ibfk_2` FOREIGN KEY (`lek`) REFERENCES `leky` (`ID`);

--
-- Omezení pro tabulku `dodavatele`
--
ALTER TABLE `dodavatele`
  ADD CONSTRAINT `dodavatele_ibfk_1` FOREIGN KEY (`adresa`) REFERENCES `adresy` (`id`);

--
-- Omezení pro tabulku `nakupy`
--
ALTER TABLE `nakupy`
  ADD CONSTRAINT `nakupy_ibfk_1` FOREIGN KEY (`pobocka`) REFERENCES `pobocky` (`id`),
  ADD CONSTRAINT `nakupy_ibfk_2` FOREIGN KEY (`lek`) REFERENCES `leky` (`ID`);

--
-- Omezení pro tabulku `pobocky`
--
ALTER TABLE `pobocky`
  ADD CONSTRAINT `pobocky_ibfk_1` FOREIGN KEY (`adresa`) REFERENCES `adresy` (`id`);

--
-- Omezení pro tabulku `pojistovny`
--
ALTER TABLE `pojistovny`
  ADD CONSTRAINT `pojistovny_ibfk_1` FOREIGN KEY (`adresa`) REFERENCES `adresy` (`id`);

--
-- Omezení pro tabulku `prispevky`
--
ALTER TABLE `prispevky`
  ADD CONSTRAINT `prispevky_ibfk_1` FOREIGN KEY (`lek`) REFERENCES `leky` (`ID`),
  ADD CONSTRAINT `prispevky_ibfk_2` FOREIGN KEY (`pojistovna`) REFERENCES `pojistovny` (`kod`);

--
-- Omezení pro tabulku `sklady`
--
ALTER TABLE `sklady`
  ADD CONSTRAINT `sklady_ibfk_1` FOREIGN KEY (`pobocka`) REFERENCES `pobocky` (`id`),
  ADD CONSTRAINT `sklady_ibfk_2` FOREIGN KEY (`lek`) REFERENCES `leky` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
