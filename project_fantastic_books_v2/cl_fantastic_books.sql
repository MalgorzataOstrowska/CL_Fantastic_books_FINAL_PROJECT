-- phpMyAdmin SQL Dump
-- version 4.6.5.2deb1+deb.cihar.com~yakkety.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 13 Mar 2017, 01:45
-- Wersja serwera: 5.7.17-0ubuntu0.16.10.1
-- Wersja PHP: 7.0.15-0ubuntu0.16.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cl_fantastic_books`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkToHomePage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `author`
--

INSERT INTO `author` (`id`, `firstName`, `lastName`, `alias`, `linkToHomePage`) VALUES
(4, 'Joanne', 'Rowling', 'J. K. Rowling', 'http://www.jkrowling.com/'),
(5, 'Patricia', 'Briggs', NULL, 'http://www.hurog.com/'),
(6, 'Nalini', 'Singh', NULL, 'http://nalinisingh.com/'),
(7, 'Jim', 'Butcher', NULL, 'http://www.jim-butcher.com/');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `author__book`
--

CREATE TABLE `author__book` (
  `id` int(11) NOT NULL,
  `series` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `volume` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `titlePolish` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleEnglish` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleOriginal` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `book`
--

INSERT INTO `book` (`id`, `titlePolish`, `titleEnglish`, `titleOriginal`) VALUES
(11, 'Harry Potter i kamień filozoficzny', 'Harry Potter and the Philosopher\'s Stone', 'Harry Potter and the Philosopher\'s Stone'),
(12, 'Zew księżyca', 'Moon Called', 'Moon Called'),
(13, 'Harry Potter i komnata tajemnic', 'Harry Potter and the Chamber of Secrets', 'Harry Potter and the Chamber of Secrets'),
(14, 'Harry Potter i więzień Azkabanu', 'Harry Potter and the Prisoner of Azkaban', 'Harry Potter and the Prisoner of Azkaban'),
(15, 'Krew Aniołów', 'Angel\'s Blood', 'Angel\'s Blood'),
(16, 'Front burzowy', 'Storm Front', 'Storm Front'),
(17, 'W niewoli zmysłów', 'Slave to Sensation', 'Slave to Sensation'),
(19, NULL, NULL, 'asdfasdf'),
(20, 'Magia kąsa', 'Magic Bites', 'Magic Bites');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book_author`
--

CREATE TABLE `book_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book__character_from_book`
--

CREATE TABLE `book__character_from_book` (
  `id` int(11) NOT NULL,
  `character_from_book_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `characterType` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `book__character_from_book`
--

INSERT INTO `book__character_from_book` (`id`, `character_from_book_id`, `book_id`, `characterType`) VALUES
(14, 45, 11, 'main'),
(15, 45, 13, 'main'),
(16, 45, 14, 'main'),
(17, 46, 11, 'leading'),
(18, 46, 13, 'leading'),
(19, 46, 14, 'leading'),
(20, 47, 11, 'leading'),
(21, 47, 13, 'leading'),
(22, 47, 14, 'leading'),
(23, 48, 12, 'main'),
(24, 52, 12, 'leading'),
(25, 49, 20, 'main'),
(26, 50, 15, 'main'),
(27, 51, 15, 'leading'),
(28, 53, 16, 'main'),
(29, 59, 15, 'peripheral'),
(30, 65, 17, 'main'),
(31, 66, 17, 'leading');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `character_from_book`
--

CREATE TABLE `character_from_book` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `species` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ability` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notHuman` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mythology` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biblicalCharacter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mythologicalCreature` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `animalBeast` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otherCreature` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otherInformation` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `character_from_book`
--

INSERT INTO `character_from_book` (`id`, `name`, `gender`, `species`, `age`, `ability`, `occupation`, `notHuman`, `mythology`, `biblicalCharacter`, `mythologicalCreature`, `animalBeast`, `otherCreature`, `otherInformation`) VALUES
(45, 'Harry Potter', 'gender.male', 'species.human', 'age.teenager', 'ability.magic', 'occupation.pupil', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(46, 'Hermiona Granger', 'gender.female', 'species.human', 'age.teenager', 'ability.magic', 'occupation.pupil', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(47, 'Ron Weasley', 'gender.male', 'species.human', 'age.teenager', 'ability.magic', 'occupation.pupil', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(48, 'Mercedes Thompson', 'gender.female', 'species.shapeshifter', 'age.adult', NULL, 'occupation.carMechanic', NULL, 'mythology.indian', NULL, NULL, 'animalBeast.coyote', NULL, ''),
(49, 'Kate Daniels', 'gender.female', 'species.human', 'age.adult', 'ability.magic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(50, 'Elena Deveraux', 'gender.female', 'species.human', 'age.adult', 'ability.flying,ability.telepathy', 'occupation.hunter', 'notHuman.other', NULL, 'biblicalCharacter.angel', NULL, NULL, NULL, ''),
(51, 'Raphael', 'gender.male', 'species.other', 'age.ancient', 'ability.flying,ability.invisibility,ability.telepathy', 'occupation.other', 'notHuman.other', NULL, 'biblicalCharacter.angel', NULL, NULL, NULL, ''),
(52, 'Adam Hauptman', 'gender.male', 'species.shapeshifter', 'age.adult', NULL, NULL, NULL, NULL, NULL, NULL, 'animalBeast.wolf', NULL, ''),
(53, 'Harry Dresden', 'gender.male', 'species.human', 'age.adult', 'ability.magic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(59, 'Dmitri', 'gender.male', 'species.notHuman', 'age.other', 'ability.telepathy', 'occupation.warrior', NULL, NULL, NULL, NULL, NULL, 'otherCreature.vampire', ''),
(62, 'Ktoś', 'gender.male', 'species.shapeshifter', 'age.adult', 'ability.flying,ability.seeingPast', 'occupation.warrior,occupation.scholar', 'notHuman.biblicalCharacter,notHuman.other', 'mythology.celtic,mythology.slavic', 'biblicalCharacter.angel,biblicalCharacter.devil', 'mythologicalCreature.demigod,mythologicalCreature.orc', 'animalBeast.griffin,animalBeast.hyena', 'otherCreature.vampire,otherCreature.zombie', ''),
(63, 'ktosiek', 'gender.other', 'species.other', 'age.other', 'ability.magic,ability.flying,ability.teleportation,ability.telekinesis,ability.invisibility,ability.telepathy,ability.foreseeFuture,ability.seeingPast,ability.other', 'occupation.warrior,occupation.scholar,occupation.architect,occupation.other', 'notHuman.biblicalCharacter,notHuman.other', 'mythology.celtic,mythology.slavic,mythology.other', 'biblicalCharacter.angel,biblicalCharacter.devil,biblicalCharacter.other', 'mythologicalCreature.god,mythologicalCreature.troll,mythologicalCreature.other', 'animalBeast.dragon,animalBeast.coyote,animalBeast.other', 'otherCreature.vampire,otherCreature.other', ''),
(64, 'Ktosia', 'gender.female', 'species.human', 'age.teenager', 'ability.other', 'occupation.other', 'notHuman.other', 'mythology.other', 'biblicalCharacter.other', 'mythologicalCreature.other', 'animalBeast.other', 'otherCreature.other', ''),
(65, 'Sascha Duncan', 'gender.female', 'species.human', 'age.adult', 'ability.telepathy,ability.other', 'occupation.other', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(66, 'Lucas Hunter', 'gender.male', 'species.shapeshifter', 'age.adult', NULL, NULL, NULL, NULL, NULL, NULL, 'animalBeast.other', NULL, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `character_from_book_book`
--

CREATE TABLE `character_from_book_book` (
  `character_from_book_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `character_from_book_book`
--

INSERT INTO `character_from_book_book` (`character_from_book_id`, `book_id`) VALUES
(45, 11),
(45, 13),
(45, 14),
(46, 11),
(46, 13),
(46, 14),
(47, 11),
(47, 13),
(47, 14),
(48, 12),
(50, 15),
(51, 15),
(52, 12),
(65, 17),
(66, 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin@admin.admin', 'admin@admin.admin', 1, NULL, '$2y$13$5JKFnss8QWxH7dQ1I3ugsuCoGSTzZ.DloxsI7t/1vlzdU3nQv7Qeu', '2017-03-13 01:40:51', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(2, 'user', 'user', 'user@gmail.com', 'user@gmail.com', 1, NULL, '$2y$13$qAx6EV.3ZGjIusRV4zbVQ.IHW6UvPBVD3ev5Je4XlPJFz7MXAX8.K', '2017-02-28 23:48:03', NULL, NULL, 'a:0:{}');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author__book`
--
ALTER TABLE `author__book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`book_id`,`author_id`),
  ADD KEY `IDX_9478D34516A2B381` (`book_id`),
  ADD KEY `IDX_9478D345F675F31B` (`author_id`);

--
-- Indexes for table `book__character_from_book`
--
ALTER TABLE `book__character_from_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_43EAB8324F98D547` (`character_from_book_id`),
  ADD KEY `IDX_43EAB83216A2B381` (`book_id`);

--
-- Indexes for table `character_from_book`
--
ALTER TABLE `character_from_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_from_book_book`
--
ALTER TABLE `character_from_book_book`
  ADD PRIMARY KEY (`character_from_book_id`,`book_id`),
  ADD KEY `IDX_EB0905A64F98D547` (`character_from_book_id`),
  ADD KEY `IDX_EB0905A616A2B381` (`book_id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `author__book`
--
ALTER TABLE `author__book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `book__character_from_book`
--
ALTER TABLE `book__character_from_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT dla tabeli `character_from_book`
--
ALTER TABLE `character_from_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT dla tabeli `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `FK_9478D34516A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9478D345F675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `book__character_from_book`
--
ALTER TABLE `book__character_from_book`
  ADD CONSTRAINT `FK_43EAB83216A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `FK_43EAB8324F98D547` FOREIGN KEY (`character_from_book_id`) REFERENCES `character_from_book` (`id`);

--
-- Ograniczenia dla tabeli `character_from_book_book`
--
ALTER TABLE `character_from_book_book`
  ADD CONSTRAINT `FK_EB0905A616A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EB0905A64F98D547` FOREIGN KEY (`character_from_book_id`) REFERENCES `character_from_book` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
