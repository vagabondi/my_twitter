-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 07 Sie 2016, 00:06
-- Wersja serwera: 5.5.50-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `twit_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tweet`
--

CREATE TABLE `Tweet` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `text` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Tweet`
--

INSERT INTO `Tweet` (`id`, `user_id`, `text`) VALUES
(1, 'admin123', 'Ala ma kota a kot ma Alę i tak sobie żyją albo wcale.'),
(2, 'admin123', 'Mam na imię admin i jest mi z tym spoko.'),
(3, 'mama', 'dzis na obiad była zupa meksykanska'),
(4, 'admin123', 'asfasfa'),
(6, 'admin123', 'Nowy tweet');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `User`
--

CREATE TABLE `User` (
  `email` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `User`
--

INSERT INTO `User` (`email`, `pwd`) VALUES
('admin', 'test123'),
('admin@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('admin123', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('admin2@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('mama', '683158f8176c695580821cdcc34317dfb3a342af'),
('root', 'c7fd53db8387f7aa22a9a0e3640e98d8e580fa20'),
('user1', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`email`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
