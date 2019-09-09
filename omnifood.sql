-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Wrz 2019, 14:37
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `omnifood`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `byli_klienci`
--

CREATE TABLE `byli_klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) COLLATE ucs2_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE ucs2_polish_ci NOT NULL,
  `login` varchar(20) COLLATE ucs2_polish_ci NOT NULL,
  `haslo` varchar(30) CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  `email` varchar(30) CHARACTER SET ucs2 DEFAULT NULL,
  `ulica` varchar(40) COLLATE ucs2_polish_ci NOT NULL,
  `n_dom` varchar(5) COLLATE ucs2_polish_ci NOT NULL,
  `n_mieszkanie` varchar(5) COLLATE ucs2_polish_ci NOT NULL,
  `kod_pocztowy` varchar(7) COLLATE ucs2_polish_ci NOT NULL,
  `miasto` varchar(40) COLLATE ucs2_polish_ci NOT NULL,
  `panstwo` varchar(40) COLLATE ucs2_polish_ci NOT NULL,
  `produkt` enum('premium','pro','starter') COLLATE ucs2_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) COLLATE ucs2_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE ucs2_polish_ci NOT NULL,
  `login` varchar(20) COLLATE ucs2_polish_ci NOT NULL,
  `haslo` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  `email` varchar(30) CHARACTER SET ucs2 DEFAULT NULL,
  `ulica` varchar(40) COLLATE ucs2_polish_ci NOT NULL,
  `n_dom` varchar(5) COLLATE ucs2_polish_ci NOT NULL,
  `n_mieszkanie` varchar(5) COLLATE ucs2_polish_ci NOT NULL,
  `kod_pocztowy` varchar(7) COLLATE ucs2_polish_ci NOT NULL,
  `miasto` varchar(40) COLLATE ucs2_polish_ci NOT NULL,
  `panstwo` varchar(40) COLLATE ucs2_polish_ci NOT NULL,
  `produkt` enum('premium','pro','starter') COLLATE ucs2_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE ucs2_polish_ci NOT NULL,
  `email` varchar(20) COLLATE ucs2_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_polish_ci;

--
-- Zrzut danych tabeli `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `email`) VALUES
(2, 'Kamila Nawrocka', 'test@test.pl'),
(3, 'Kamila Nawrocka', 'test@test.pl'),
(4, 'Kamila Nawrocka', 'test@test.pl'),
(5, 'Kamila Nawrocka', 'test@test.pl'),
(6, 'Kamila Nawrocka', 'test@test.pl'),
(7, 'Kamila Nawrocka', 'test@test.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `byli_klienci`
--
ALTER TABLE `byli_klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `byli_klienci`
--
ALTER TABLE `byli_klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
