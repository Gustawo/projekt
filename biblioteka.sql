-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Cze 2014, 12:19
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE IF NOT EXISTS `adresy` (
  `Id_czytelnika` int(11) NOT NULL AUTO_INCREMENT,
  `Kod` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Miasto` text CHARACTER SET utf8 NOT NULL,
  `Ulica` text CHARACTER SET utf8 NOT NULL,
  `Telefon` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id_czytelnika`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `adresy`
--

INSERT INTO `adresy` (`Id_czytelnika`, `Kod`, `Miasto`, `Ulica`, `Telefon`) VALUES
(1, '41-943', 'Piekary Śląskie', 'Wyzwolenia 34', '598-567-789'),
(2, '41-878', 'Bytom', 'Dworcowa 45', '345-678-435'),
(3, '34-789', 'Warszawa', 'Marszałkowska 34', '567-543-678'),
(4, '67-876', 'Katowice', 'Wigóry 45', '678-890-656'),
(5, '56-765', 'Żabie doły', 'Ogrodowa 45', '764-87-98');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author_surname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_surname`) VALUES
(1, 'Andrzej', 'Sapkowski'),
(2, 'Henryk', 'Sienkiewicz'),
(3, 'George', 'Martin'),
(4, 'Camilla', 'Lackberg'),
(5, 'Stepheni', 'Meyer'),
(6, 'Suzanne', 'Colins'),
(7, 'Jeremy', 'Clarkson'),
(8, 'Dan', 'Brown'),
(9, 'Malgorzata', 'Krawczyk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czytelnicy`
--

CREATE TABLE IF NOT EXISTS `czytelnicy` (
  `Id_czytelnika` int(11) NOT NULL AUTO_INCREMENT,
  `Nazwisko` varchar(30) NOT NULL,
  `Imie` text NOT NULL,
  `DataUrodzenia` date NOT NULL,
  `MiejsceUr` text NOT NULL,
  PRIMARY KEY (`Id_czytelnika`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `czytelnicy`
--

INSERT INTO `czytelnicy` (`Id_czytelnika`, `Nazwisko`, `Imie`, `DataUrodzenia`, `MiejsceUr`) VALUES
(1, 'Kot', 'Michał', '1989-05-09', 'Piekary Śląskie'),
(2, 'Kozioł', 'Marek', '1988-11-11', 'Bytom'),
(3, 'Paweł', 'Paweł', '1991-05-23', 'Warszawa'),
(4, 'Kowalski', 'Jan', '1987-06-23', 'Katowice'),
(5, 'Kurek', 'Krzysztof', '1990-12-24', 'Żabie doły');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE IF NOT EXISTS `ksiazki` (
  `Id_ksiazki` int(11) NOT NULL AUTO_INCREMENT,
  `tytul` text NOT NULL,
  `autor` int(11) NOT NULL,
  `kategoria` text NOT NULL,
  `wydawca` text NOT NULL,
  `rok` text NOT NULL,
  `status` enum('dostepna','zarezerwowana') NOT NULL,
  PRIMARY KEY (`Id_ksiazki`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`Id_ksiazki`, `tytul`, `autor`, `kategoria`, `wydawca`, `rok`, `status`) VALUES
(1, 'Jas i Malgosia', 9, 'Bajki', 'Nowa Era', '1978', 'dostepna'),
(3, 'Swiat według klarksona', 7, 'Motoryzacja', 'Insignis', '2004', 'zarezerwowana'),
(4, 'Kod Leonarda da vinci', 8, 'Nauka', 'A.Kurłowicz', '2007', 'dostepna'),
(5, 'Igrzyska Smierci', 5, 'Dla mlodziezy ', 'Media Rodzina', '2012', 'dostepna'),
(6, 'Zmierzch', 6, 'fantasy', 'wydawnictwo dolnośląskie', '2010', 'dostepna'),
(7, 'Krew elfow', 1, 'fantasy', 'Nowa era', '2001', 'zarezerwowana'),
(8, 'Latarnik', 4, 'kryminal', 'Helion', '2008', 'dostepna'),
(9, 'Gra o tron', 3, 'fantasy', 'Nowa era', '2007', 'dostepna'),
(10, 'Kamieniarz', 4, 'kryminal', 'Helion', '2005', 'dostepna'),
(11, 'Uczta dla wron T1', 3, 'fantasy', 'Helion', '2009', 'dostepna'),
(12, 'Uczta dla wron T2', 3, 'fantasy', 'Helion', '2010', 'dostepna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypożyczenia`
--

CREATE TABLE IF NOT EXISTS `wypożyczenia` (
  `Id_czytelnika` int(11) NOT NULL AUTO_INCREMENT,
  `DataWyp` date NOT NULL,
  `DataZwrotu` date NOT NULL,
  PRIMARY KEY (`Id_czytelnika`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `wypożyczenia`
--

INSERT INTO `wypożyczenia` (`Id_czytelnika`, `DataWyp`, `DataZwrotu`) VALUES
(1, '2014-05-09', '2014-06-30'),
(2, '2014-04-06', '2014-05-30'),
(3, '2014-03-08', '2014-04-08'),
(4, '2013-06-25', '2013-07-26'),
(5, '2012-05-29', '2012-06-23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
