-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 22, 2021 la 01:01 PM
-- Versiune server: 10.4.14-MariaDB
-- Versiune PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `movie_db`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `actor`
--

CREATE TABLE `actor` (
  `id_actor` int(11) NOT NULL,
  `prenume_actor` varchar(30) NOT NULL,
  `nume_actor` varchar(20) NOT NULL,
  `data_nasterii` date NOT NULL,
  `bio_actor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `actor`
--

INSERT INTO `actor` (`id_actor`, `prenume_actor`, `nume_actor`, `data_nasterii`, `bio_actor`) VALUES
(1, 'Elijah', 'Wood', '1981-01-28', 'Elijah Wood is an American actor best known for portraying Frodo Baggins in Peter Jackson\'s blockbuster Lord of the Rings film trilogy.'),
(2, 'Ian', 'McKellen', '1939-05-25', 'Widely regarded as one of greatest stage and screen actors both in his native Great Britain and internationally, twice nominated for the Oscar and recipient of every major theatrical award in the UK and US.'),
(3, 'Daniel', 'Radcliffe', '1989-07-23', NULL),
(4, 'Rupert', 'Grint', '1988-08-24', NULL),
(5, 'Emma', 'Watson', '1990-04-15', NULL),
(6, 'Macaulay', 'Culkin', '1980-08-26', NULL),
(7, 'Joe', 'Pesci', '1943-02-09', NULL),
(8, 'Camilla', 'Parker-Bowles (self)', '1947-07-17', NULL),
(9, 'Prince Charles', 'Windsor (self)', '1948-11-14', NULL),
(10, 'Lady Diana', 'Spencer (self)', '1961-07-01', NULL),
(11, 'Leonardo', 'DiCaprio', '1974-11-11', NULL),
(12, 'Tom', 'Hardy', '1977-09-15', NULL),
(13, 'Ellen', 'Page', '1987-02-21', NULL),
(14, 'Vlad ', 'Voiculescu (self)', '1983-09-06', NULL),
(15, 'Catalin', 'Tolontan', '1968-11-16', NULL),
(16, 'Elizabeth', 'Debicki', '1990-08-24', NULL),
(17, 'George', 'MacKay', '1992-03-13', NULL),
(18, 'Dean-Charles', 'Chapman ', '1997-09-07', NULL),
(19, 'Tim', 'Robbins', '1958-10-16', NULL),
(20, 'Morgan', 'Freeman', '1937-06-01', NULL),
(21, 'Vera', 'Farmiga', '1973-08-06', NULL),
(22, 'Patrick', 'Wilson', '1973-07-03', NULL),
(23, 'Keanu', 'Reeves', '1964-09-02', NULL),
(24, 'Michael', 'Nyqvist', '1960-06-27', NULL),
(25, 'Joaquin', 'Phoenix', '1974-10-28', NULL),
(26, 'Robert', 'De Niro', '1943-08-17', NULL),
(27, 'Meryl', 'Streep', '1949-06-22', NULL),
(28, 'Jim', 'Broadbent', '1949-05-24', NULL),
(29, 'Julia', 'Roberts', '1967-10-28', NULL),
(30, 'Kate', 'Winslet', '1975-10-05', NULL),
(31, 'Jennifer', 'Lawrence', '1990-08-15', NULL),
(32, 'Josh', 'Hutcherson', '1992-10-12', NULL),
(33, 'Shailene', 'Woodley', '1991-11-15', NULL),
(34, 'Theo', 'James', '1984-12-16', NULL),
(35, 'Millie', 'Bobby Brown', '2004-02-19', NULL),
(36, 'Henry', 'Cavill', '1983-05-05', NULL),
(37, 'Zac', 'Efron', '1987-10-18', NULL),
(38, 'Rose', 'Byrne', '1979-07-27', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `nume_film` varchar(100) NOT NULL,
  `descriere_actiune` varchar(255) DEFAULT NULL,
  `categorie_audienta` char(3) NOT NULL,
  `durata` time NOT NULL,
  `data_lansarii` date NOT NULL,
  `tara_origine` varchar(15) NOT NULL,
  `limba_originala` varchar(15) NOT NULL,
  `trivia_film` varchar(255) DEFAULT NULL,
  `nume_director` varchar(20) NOT NULL,
  `prenume_director` varchar(30) NOT NULL,
  `nume_scenarist` varchar(20) NOT NULL,
  `prenume_scenarist` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `film`
--

INSERT INTO `film` (`id_film`, `nume_film`, `descriere_actiune`, `categorie_audienta`, `durata`, `data_lansarii`, `tara_origine`, `limba_originala`, `trivia_film`, `nume_director`, `prenume_director`, `nume_scenarist`, `prenume_scenarist`) VALUES
(1, 'Home Alone', 'An eight-year-old troublemaker must protect his house from a pair of burglars when he is accidentally left home alone by his family during Christmas vacation. ', 'PG', '01:43:00', '1990-11-16', 'USA', 'English', 'The picture Kevin finds of Buzz\'s girlfriend was a picture of a boy made up to look like a girl, because director Chris Columbus thought it would be too cruel to make fun of a girl like that. The boy that was used in the photo was the son of Dan Webster.', 'Columbus', 'Chris', 'Hughes', 'John'),
(2, 'Harry Potter and the Sorcerer`s Stone', 'An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world. ', 'PG', '02:32:00', '2001-11-16', 'UK', 'English', 'Hermione isn\'t seen wearing non-uniform clothing until almost two hours into the movie. ', 'Columbus', 'Chris', 'Kloves', 'Steve'),
(3, 'The Lord of the Rings: The Fellowship of the Ring', 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron. ', '13', '02:58:00', '2001-12-19', 'USA', 'English', 'New Zealand\'s Army was cast as extras for large battle scenes in this movie, but was forced to back out, due to a commitment to serve as peacekeepers in East Timor.', 'Jackson', 'Peter', 'Walsh', 'Fran'),
(4, 'Diana: In Her Own Words', 'This documentary uses the recordings Princess Diana made for the book that was written by Andrew Morton. In this documentary Diana narrates her life and the events that surrounded her.', 'PG', '01:52:00', '2017-08-06', 'UK', 'English', 'The red Austin, registration MPB909W, in which Princess Diana is seen driving was first registered in November 1980 and with a year of manufacture of 1980 is an 998cc petrol engine whose \"Date of last V5C (logbook)\" was issued on 21st October 2005.', 'Jennings', 'Tom', 'Tillman', 'David'),
(5, 'Inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O. ', '13', '02:28:00', '2010-07-30', 'USA', 'English', 'Leonardo DiCaprio was the only choice for the role of Cobb for writer, producer, and director Christopher Nolan and producer Emma Thomas. ', 'Nolan', 'Christopher', 'Nolan', 'Cristopher'),
(6, 'Colectiv', 'Director Alexander Nanau follows a crack team of investigators at the Romanian newspaper Gazeta Sporturilor as they try to uncover a vast health-care fraud that enriched moguls and politicians and led to the deaths of innocent citizens. ', '13', '01:49:00', '2020-02-28', 'Romania', 'Romanian', 'One of former President Barack Obama\'s 14 Favorite Films of the Year 2020.', 'Nanau', 'Alexander', 'Opris', 'Antoaneta'),
(7, 'The Great Gatsby', 'A writer and wall street trader, Nick, finds himself drawn to the past and lifestyle of his millionaire neighbor, Jay Gatsby. ', '13', '02:23:00', '2013-05-17', 'USA', 'English', NULL, 'Luhrmann', 'Baz', 'Pearce', 'Craig'),
(8, '1917', 'April 6th, 1917. As a regiment assembles to wage war deep in enemy territory, two soldiers are assigned to race against time and deliver a message that will stop 1,600 men from walking straight into a deadly trap. ', 'R', '01:59:00', '2020-01-24', 'USA', 'English', NULL, 'Mendes', 'Sam', 'Wilson-Cairns', 'Krysty'),
(9, 'The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'R', '02:22:00', '1994-10-14', 'USA', 'English', NULL, 'Darabont', 'Frank', 'King', 'Stephan'),
(10, 'The Conjuring', 'Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse. ', '18', '01:52:00', '2013-08-09', 'USA', 'English', NULL, 'Wan', 'James', 'Hayes', 'Chad'),
(11, 'John Wick', 'An ex-hit-man comes out of retirement to track down the gangsters that killed his dog and took everything from him. ', 'R', '01:41:00', '2014-10-31', 'USA', 'English', NULL, 'Stahelski', 'Chad', 'Kolstad', 'Derek'),
(12, 'Joker', 'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker. ', 'R', '02:02:00', '2019-10-03', 'USA', 'English', NULL, 'Phillips', 'Todd', 'Silver', 'Scott'),
(13, 'The Iron Lady', 'An elderly Margaret Thatcher talks to the imagined presence of her recently deceased husband as she struggles to come to terms with his death while scenes from her past life, from girlhood to British prime minister, intervene. ', '13', '01:45:00', '2012-04-27', 'UK', 'English', NULL, 'Lloyd', 'Phyllida', 'Morgan', 'Abi'),
(14, 'Eat Pray Love', 'A married woman realizes how unhappy her marriage really is, and that her life needs to go in a different direction. After a painful divorce, she takes off on a round-the-world journey to \"find herself\". ', '13', '02:13:00', '2010-10-15', 'USA', 'English', NULL, 'Murphy', 'Ryan', 'Salt', 'Jennifer'),
(15, 'Titanic', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic. ', '13', '03:14:00', '1998-03-06', 'USA', 'English', NULL, 'Cameron', 'James', 'Cameron', 'James'),
(16, 'The Hunger Games', 'Katniss Everdeen voluntarily takes her younger sister\'s place in the Hunger Games: a televised competition in which two teenagers from each of the twelve Districts of Panem are chosen at random to fight to the death. ', '13', '02:22:00', '2012-03-23', 'USA', 'English', NULL, 'Ross', 'Gary', 'Collins', 'Suzanne'),
(17, 'Divergent', 'In a world divided by factions based on virtues, Tris learns she\'s Divergent and won\'t fit in. When she discovers a plot to destroy Divergents, Tris and the mysterious Four must find out what makes Divergents dangerous before it\'s too late. ', '13', '02:19:00', '2014-03-21', 'USA', 'English', NULL, 'Burger', 'Neil', 'Daugherty', 'Evan'),
(18, 'Enola Holmes', 'When Enola Holmes-Sherlock\'s teen sister-discovers her mother missing, she sets off to find her, becoming a super-sleuth in her own right as she outwits her famous brother and unravels a dangerous conspiracy around a mysterious young Lord. ', '13', '02:03:00', '2020-09-23', 'UK', 'English', NULL, 'Bradbeer', 'Harry', 'Springer', 'Nancy'),
(19, 'Anabelle Comes Home', 'While babysitting the daughter of Ed and Lorraine Warren, a teenager and her friend unknowingly awaken an evil spirit trapped in a doll.', 'R', '01:46:00', '2019-07-12', 'USA', 'English', NULL, 'Dauberman', 'Gary', 'Wan', 'James'),
(20, 'Neighbors', 'After they are forced to live next to a fraternity house, a couple with a newborn baby do whatever they can to take them down. ', 'R', '01:37:00', '2014-05-16', 'USA', 'English', NULL, 'Stoller', 'Nicholas', 'Cohen', 'Andrew Jay');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `filmactori`
--

CREATE TABLE `filmactori` (
  `id_actor` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `filmactori`
--

INSERT INTO `filmactori` (`id_actor`, `id_film`) VALUES
(6, 1),
(4, 2),
(2, 3),
(7, 1),
(3, 2),
(5, 2),
(1, 3),
(8, 4),
(9, 4),
(10, 4),
(11, 5),
(12, 5),
(13, 5),
(14, 6),
(15, 6),
(16, 7),
(11, 7),
(17, 8),
(18, 8),
(19, 9),
(20, 9),
(21, 10),
(22, 10),
(23, 11),
(24, 11),
(25, 12),
(26, 12),
(27, 13),
(28, 13),
(29, 14),
(11, 15),
(30, 15),
(31, 16),
(32, 16),
(33, 17),
(34, 17),
(35, 18),
(36, 18),
(21, 19),
(22, 19),
(37, 20),
(38, 20);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `filmgenuri`
--

CREATE TABLE `filmgenuri` (
  `id_film` int(11) NOT NULL,
  `id_gen_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `filmgenuri`
--

INSERT INTO `filmgenuri` (`id_film`, `id_gen_film`) VALUES
(1, 4),
(1, 9),
(2, 2),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(4, 11),
(4, 12),
(5, 1),
(5, 2),
(5, 7),
(6, 11),
(7, 3),
(7, 10),
(8, 3),
(8, 6),
(8, 13),
(9, 3),
(10, 8),
(10, 15),
(10, 6),
(11, 1),
(11, 16),
(11, 6),
(12, 16),
(12, 3),
(12, 6),
(13, 12),
(13, 3),
(14, 3),
(14, 10),
(15, 3),
(15, 10),
(16, 1),
(16, 2),
(16, 7),
(17, 1),
(17, 2),
(17, 15),
(18, 1),
(18, 2),
(18, 16),
(19, 8),
(19, 15),
(19, 6),
(20, 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `gen`
--

CREATE TABLE `gen` (
  `id_gen_film` int(11) NOT NULL,
  `nume_gen` char(12) NOT NULL,
  `descriere_gen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `gen`
--

INSERT INTO `gen` (`id_gen_film`, `nume_gen`, `descriere_gen`) VALUES
(1, 'Action', 'Action film is a film genre in which the protagonist or protagonists are thrust into a series of events that typically include violence, extended fighting, physical feats, rescues and frantic chases.\r\n'),
(2, 'Adventure', 'Adventure fiction is a genre of fiction that usually presents danger, or gives the reader a sense of excitement. '),
(3, 'Drama', 'Drama is the specific mode of fiction represented in performance: a play, opera, mime, ballet, etc., performed in a theatre, or on radio or television.'),
(4, 'Family', NULL),
(5, 'Fantasy', NULL),
(6, 'Thriller', NULL),
(7, 'Sci-Fi', NULL),
(8, 'Horror', NULL),
(9, 'Comedy', NULL),
(10, 'Romance', NULL),
(11, 'Documentary', NULL),
(12, 'Biography', NULL),
(13, 'War', NULL),
(15, 'Mystery', NULL),
(16, 'Crime', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `descriere_review` varchar(255) NOT NULL,
  `numar_stele` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_utilizator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `review`
--

INSERT INTO `review` (`id_review`, `descriere_review`, `numar_stele`, `id_film`, `id_utilizator`) VALUES
(14, ' Kinda liked it', 8, 4, 5),
(15, ' :)', 9, 6, 4),
(16, ' bleah', 4, 1, 4),
(18, ' Super cool', 10, 6, 2),
(19, '  wow!', 9, 2, 2),
(22, ' Ft bun', 9, 6, 70),
(24, ' Funny', 9, 20, 70),
(25, 'OMG', 10, 12, 70),
(26, 'Super scary', 9, 19, 70),
(27, ' Oscar! super', 10, 8, 70),
(28, 'Prea lung', 7, 15, 70),
(29, ' amazing', 10, 17, 2),
(30, 'Nu mi-a placut', 5, 20, 2),
(31, 'Spooky', 7, 10, 2),
(32, 'Am plans ', 10, 12, 2),
(33, 'Asta da film', 10, 14, 2),
(34, 'wow', 9, 5, 5),
(35, '10 am ras haha', 10, 20, 5),
(36, 'm-am spăriet', 5, 10, 5),
(37, 'super', 10, 6, 5),
(38, '   interesant', 8, 14, 5),
(39, ' ur a wizard harry', 10, 2, 5),
(40, 'ce e ma asta', 3, 19, 4),
(41, 'L am vazut la cinema de 2 ori', 10, 8, 4),
(42, 'super', 10, 5, 4),
(43, 'abc', 7, 17, 4),
(44, ' nu l-am vazut dar cica e fain', 9, 13, 4),
(45, '10 cu steluta', 10, 14, 3),
(46, ' superb si trist', 10, 4, 3),
(47, 'filmul copilariei', 10, 1, 3),
(48, 'Impresionant', 10, 13, 3),
(49, 'minunat', 9, 2, 3),
(50, 'wtf', 5, 10, 72),
(51, 'superb', 10, 12, 72),
(52, 'mi-a placut', 10, 8, 72),
(53, 'ciudat', 4, 20, 72),
(54, 'amazing', 9, 8, 71),
(55, 'wow!!', 10, 12, 71),
(56, 'naspa', 4, 10, 70);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizator`
--

CREATE TABLE `utilizator` (
  `id_utilizator` int(11) NOT NULL,
  `username` char(30) NOT NULL,
  `email` char(30) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `nume_utilizator` varchar(20) NOT NULL,
  `prenume_utilizator` varchar(20) NOT NULL,
  `data_inregistrarii` datetime NOT NULL,
  `bio_utilizator` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `utilizator`
--

INSERT INTO `utilizator` (`id_utilizator`, `username`, `email`, `parola`, `nume_utilizator`, `prenume_utilizator`, `data_inregistrarii`, `bio_utilizator`) VALUES
(2, 'simo.paunoiu', 'simo.paunoiu@yahoo.com', '$2y$10$2V2kq26gI.KmJGGAxtRUdusZLVU.LWCboCwqHFSzmRwEvRlL/XH1C', 'Păunoiu', 'Simona', '2021-01-12 13:56:45', NULL),
(3, 'andreea.cojo', 'andreea.cojo@yahoo.com', '$2y$10$8cAF6Y9dlXgC5AFN9FkjSOCsals6uqmWKboDQ9MsI43kSbXOhILSC', 'Cojocaru', 'Andreea', '2021-01-12 13:57:20', NULL),
(4, 'petrutz99', 'andreipetrut@outlook.com', '$2y$10$7zez7aCG6sToimGZUxO2defBlwaX5XE7oX4rSyfrmyr.FwRB9kRVq', 'Tița', 'Petruț', '2021-01-12 13:57:53', NULL),
(5, 'malina', 'malinastanciu@gmail.com', '$2y$10$z0.un.7PywX5ZlB.iMvgy.VzgpG0F/JWUfdwGcnuKfp9EetglZuxm', 'Stanciu', 'Mălina', '2021-01-12 15:00:15', ''),
(70, 'eduard.paunoiu', 'eduard.paunoiu@yahoo.com', '$2y$10$32YLuRcgPRm9STZJUCXwKulrQOAv02dJJY7jNXg2peYz.bJTiRnxe', 'Păunoiu', 'Eduard', '2021-01-21 20:52:21', 'Salut'),
(71, 'adi.turlea', 'adrian_t@yahoo.com', '$2y$10$nVVeI9yPjt0dstgFtpJSDObAUPiz59DcS7be0zU6Si4O4iwJqfg1u', 'Țurlea', 'Adrian', '2021-01-21 21:10:45', NULL),
(72, 'adina.mesteacan', 'adina.mesteacan@yahoo.com', '$2y$10$C91gJyLIhXy.8MzvrQaMvushSk21VVx90rY1aqyjLeHJr1rkRgdMG', 'Mesteacăn', 'Adina', '2021-01-21 21:11:23', NULL),
(73, 'iry.mateescu', 'iri.mateescu@yahoo.com', '$2y$10$iyx7GGIhvKk/R1R1MWDHFu618LHaFx1aN5e8dQbfDG1sqFWRZJcXC', 'Mateescu', 'Irinel', '2021-01-21 21:11:50', NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id_actor`);

--
-- Indexuri pentru tabele `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD UNIQUE KEY `nume_film` (`nume_film`);

--
-- Indexuri pentru tabele `filmactori`
--
ALTER TABLE `filmactori`
  ADD KEY `FilmActori_fk0` (`id_actor`),
  ADD KEY `FilmActori_fk1` (`id_film`);

--
-- Indexuri pentru tabele `filmgenuri`
--
ALTER TABLE `filmgenuri`
  ADD KEY `FilmGenuri_fk0` (`id_film`),
  ADD KEY `FilmGenuri_fk1` (`id_gen_film`);

--
-- Indexuri pentru tabele `gen`
--
ALTER TABLE `gen`
  ADD PRIMARY KEY (`id_gen_film`),
  ADD UNIQUE KEY `nume_gen` (`nume_gen`);

--
-- Indexuri pentru tabele `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `Review_fk0` (`id_film`),
  ADD KEY `Review_fk1` (`id_utilizator`);

--
-- Indexuri pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id_utilizator`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `prenume_utilizator` (`prenume_utilizator`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `actor`
--
ALTER TABLE `actor`
  MODIFY `id_actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pentru tabele `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `gen`
--
ALTER TABLE `gen`
  MODIFY `id_gen_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pentru tabele `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id_utilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `filmactori`
--
ALTER TABLE `filmactori`
  ADD CONSTRAINT `FilmActori_fk0` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`),
  ADD CONSTRAINT `FilmActori_fk1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`);

--
-- Constrângeri pentru tabele `filmgenuri`
--
ALTER TABLE `filmgenuri`
  ADD CONSTRAINT `FilmGenuri_fk0` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `FilmGenuri_fk1` FOREIGN KEY (`id_gen_film`) REFERENCES `gen` (`id_gen_film`);

--
-- Constrângeri pentru tabele `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `Review_fk0` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `Review_fk1` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizator` (`id_utilizator`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
