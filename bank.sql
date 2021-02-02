-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2019, 12:31
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `karty`
--

CREATE TABLE `karty` (
  `id` int(11) NOT NULL,
  `id_konta` int(11) NOT NULL,
  `nazwa` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `RRSO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `typ` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `koszt_miesieczny` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `karty`
--

INSERT INTO `karty` (`id`, `id_konta`, `nazwa`, `RRSO`, `typ`, `koszt_miesieczny`) VALUES
(1, 1, 'Millennium Visa Platinum ', '12,78%', 'Karta Kredytowa', 5),
(2, 2, 'Piotr i Paweł Mastercard', '12,78%', 'Karta Kredytowa', 10),
(3, 3, 'Millennium Visa/Mastercard Gol', '13,48%', 'Karta Kredytowa', 10.55),
(4, 4, 'Mastercard Voyager', '15,48%', 'Karty Debetowe', 45.23),
(5, 5, 'Millennium Visa Konto 360°', '14,78%', 'Karta Debetowa', 5.25),
(6, 6, 'Millennium Mastercard Prepaid', '10,78%', 'Karta Przedpłacona', 10),
(7, 7, 'Wirtual Millennium Mastercard', '13,48%', 'Karta Wirtualna', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pesel` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nr_telefonu` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `ulica` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nr_domu` int(11) NOT NULL,
  `nr_lokalu` int(11) DEFAULT NULL,
  `kod_pocztowy` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `miasto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `wojewodztwo` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `imie`, `nazwisko`, `pesel`, `email`, `nr_telefonu`, `ulica`, `nr_domu`, `nr_lokalu`, `kod_pocztowy`, `miasto`, `wojewodztwo`) VALUES
(1, 'Ewa', 'Jasińska', '84081639502', 'ewajasinska@jourrapide.com', '881643640', 'Hutnika', 50, NULL, '41-300', 'Dąbrowa Górnicza', 'podlaskie'),
(2, 'Gabriela', 'Kaczmarek', '86010653968', 'gabrielakaczmarek@teleworm.us', '606329561', 'Nowolipie', 133, NULL, '01-005', 'Warszawa', 'mazowieckie'),
(3, 'Stanisława', 'Wysocka', '44091466387', 'stanislawawysocka@rhyta.com', '698669488', 'Nowolipki', 8, NULL, '01-010', 'Warszawa', 'mazowieckie'),
(4, 'Małgorzata', 'Wiśniewska', '47111928005', 'malgorzatawisniewska@dayrep.com', '729302158', 'Krakowskie Przedmieście', 82, NULL, '00-079', 'Warszawa', 'mazowieckie'),
(5, 'Berta', 'Kowalska', '83052117409', 'bertakowalska@rhyta.com', '519622608', 'Gawrona Józefa', 115, NULL, '41-811', 'Zabrze', 'śląskie'),
(6, 'Ania', 'Jaworska', '44051100104', 'aniajaworska@rhyta.com', '669358208', 'Lawinowa', 23, 11, '92-017', 'Łódź', 'łódzkie'),
(7, 'Jakub', 'Olszewski', '33081320057', 'jakubolszewski@jourrapide.com', '679892805', 'Rydygiera Ludwika', 137, NULL, '50-248', 'Wrocław', 'dolnośląskie'),
(8, 'Ziemowit', 'Wojciechowski', '88072973277', 'ziemowitwojciechowski@dayrep.com', '677582186', 'Sikorskiego', 12, 2, '72-101', 'Goleniów', 'zachodniopomorskie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta_klientow`
--

CREATE TABLE `konta_klientow` (
  `id` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `haslo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rodzaj` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nr_rachunku` char(27) COLLATE utf8_unicode_ci NOT NULL,
  `data_zalozenia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stan_konta` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `konta_klientow`
--

INSERT INTO `konta_klientow` (`id`, `id_klienta`, `haslo`, `rodzaj`, `nr_rachunku`, `data_zalozenia`, `stan_konta`) VALUES
(1, 1, 'qwe1', 'Super Konto Dla Każdego', '43 4539 3964 9924 9211 9924', '2019-04-03 08:09:29', 2000),
(2, 2, 'qwe2', 'Konto 360 Stopni Student', '48 4539 4772 8053 9224 4772', '2015-04-03 08:11:12', 9550),
(3, 3, 'qwe3', 'Konto Osobiste Premium', '25 4556 7434 3688 8072 7434', '2004-12-24 13:11:56', 8458),
(4, 4, 'qwe4', 'Konto Wygodne', '58 4485 9067 9978 4776 9067', '2011-06-09 14:19:41', 35896),
(5, 5, 'qwe5', 'Konto Osobiste Premium', '17 5222 1743 7947 0077 1743', '2003-11-23 11:32:11', 3525),
(6, 6, 'qwe6', 'Super Konto Dla Każdego', '45 5263 7319 4059 8759 4059', '2009-10-21 12:14:28', 85632),
(7, 7, 'qwe7', 'Konto 360 Stopni Student', '23 5302 9943 2309 7368 2309', '2013-05-02 12:15:02', 88569);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta_oczekujace`
--

CREATE TABLE `konta_oczekujace` (
  `id` int(11) NOT NULL,
  `id_moderatora` int(11) NOT NULL,
  `rodzaj_konta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `haslo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `imie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pesel` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nr_telefonu` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `ulica` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nr_domu` int(11) NOT NULL,
  `nr_lokalu` int(11) DEFAULT NULL,
  `kod_pocztowy` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `miasto` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `wojewodztwo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `konta_oczekujace`
--

INSERT INTO `konta_oczekujace` (`id`, `id_moderatora`, `rodzaj_konta`, `haslo`, `imie`, `nazwisko`, `pesel`, `email`, `nr_telefonu`, `ulica`, `nr_domu`, `nr_lokalu`, `kod_pocztowy`, `miasto`, `wojewodztwo`) VALUES
(1, 2, 'Super Konto Dla Każdego', 'qwe3', 'Jakub', 'Kowalczyk', '93022500159', 'kowalczyk@o2.pl', '542156458', 'Słoneczna', 23, NULL, '16-320', 'Augustów', 'podlaskie'),
(3, 5, 'Konto Osobiste Premium', 'qwe2', 'Tadeusz', 'Pawlik', '99092500197', 'pawlik@gmail.com', '502326589', 'Błędna', 54, 3, '12-324', 'Łomża', 'podlaskie'),
(4, 3, 'Konto Osobiste Premium', 'qwe2', 'Zofia', 'Wawrzyniak', '93022602586', 'wawrzyniak@wp.pl', '504125659', 'Złota', 2, 43, '12-231', 'Sokółka', 'podlaskie'),
(6, 3, 'Konto Osobiste Premium', 'qwe1', 'Jan', 'Chojnacki', '98020525696', 'chojnacki@gmail.com', '502325698', 'Szklana', 92, 1, '12-320', 'Augustów', 'podlaskie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta_odrzucone`
--

CREATE TABLE `konta_odrzucone` (
  `id` int(11) NOT NULL,
  `id_moderatora` int(11) NOT NULL,
  `rodzaj_konta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pesel` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `haslo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nr_telefonu` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `ulica` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nr_domu` int(11) NOT NULL,
  `nr_lokalu` int(11) DEFAULT NULL,
  `kod_pocztowy` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `miasto` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `wojewodztwo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `komentarz` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `konta_odrzucone`
--

INSERT INTO `konta_odrzucone` (`id`, `id_moderatora`, `rodzaj_konta`, `imie`, `nazwisko`, `pesel`, `haslo`, `email`, `nr_telefonu`, `ulica`, `nr_domu`, `nr_lokalu`, `kod_pocztowy`, `miasto`, `wojewodztwo`, `komentarz`) VALUES
(1, 2, 'Super Konto Dla Każdego', 'Patrycja', 'Szczepaniak', '95022500285', 'qwerty123', 'szczepaniak@gmail.com', '526598569', 'Biała', 32, 12, '12-320', 'Augustów', 'podlaskie', 'Za dużo kont utworzyła'),
(2, 3, 'Konto Osobiste Premium', 'Angelika', 'Makowska', '97052300284', 'asdfrewr2', 'makowska@wp.pl', '504125659', 'Szara', 23, NULL, '12-324', 'Chodorówka', 'podlaskie', 'Taki telefon nie istnieje'),
(3, 5, 'Super Konto Dla Każdego', 'Edyta', 'Sokołowska', '82021522568', 'qwe5', 'sokołowska@gmail.com', '502326594', 'Czarna', 2, NULL, '11-232', 'Ateny', 'podlaskie', 'zły numer telefonu'),
(4, 6, 'Super Konto Dla Każdego', 'Stanisław', 'Nowak', '91092115296', 'qwe3', 'nowak@o2.pl', '501215659', 'Jasna', 23, 1, '10-234', 'Bobrowo', 'podlaskie', 'Miejscowość nie istnieje'),
(5, 6, 'Konto 360 Stopni Student', 'Maja', 'Jankowska', '98112100286', 'qwe4', 'jankowska@onet.pl', '501256598', 'Zielona', 94, NULL, '43-323', 'Barszcze', 'podlaskie', 'zły kod pocztowy'),
(6, 5, 'Konto Wygodne', 'Antoni', 'Zawadzki', '92110255694', 'qwe3', 'zawadzki@wp.pl', '502325698', 'Głośna', 23, 1, '25-496', 'Wrocław', 'podlaskie', 'złe województwo'),
(7, 5, 'Super Konto Dla Każdego', 'Oskar', 'Mazur', '95050325694', 'qwe2', 'mazur@gmail.com', '465656548', 'Stołeczna', 3, 31, '95-493', 'Romia', 'podlaskie', 'Miasto nie istnieje'),
(8, 5, 'Konto 360 Stopni Student', 'Patrycja', 'Kowalczyk', '85012502286', 'qwe1', 'kowalczyk@gmail.pl', '659659856', 'Ruda', 2, 0, '16-384', 'Nowinka', 'podlaskie', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta_pracownikow`
--

CREATE TABLE `konta_pracownikow` (
  `id` int(11) NOT NULL,
  `id_pracownika` int(11) NOT NULL,
  `haslo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `typ` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_założenia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `konta_pracownikow`
--

INSERT INTO `konta_pracownikow` (`id`, `id_pracownika`, `haslo`, `typ`, `data_założenia`) VALUES
(1, 1, 'qwe1', 'Administrator', '2019-04-04 10:27:28'),
(2, 2, 'qwe2', 'Moderator', '2019-04-03 12:46:14'),
(3, 3, 'qwe3', 'Moderator', '2019-04-03 12:46:14'),
(4, 4, 'qwe4', 'Administrator', '2019-04-03 12:46:14'),
(5, 5, 'qwe5', 'Moderator', '2019-04-03 12:46:14'),
(6, 6, 'qwe6', 'Moderator', '2019-04-03 12:46:14'),
(7, 7, 'qwe7', 'Administrator', '2019-04-03 12:46:14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kredyty_pozyczki`
--

CREATE TABLE `kredyty_pozyczki` (
  `id` int(11) NOT NULL,
  `id_konta` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kwota_pożyczona` double NOT NULL,
  `kwota_splacona` double NOT NULL DEFAULT '0',
  `kwota_do_splaty` double NOT NULL,
  `RRSO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `data_zapozyczenia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `termin_splaty` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `kredyty_pozyczki`
--

INSERT INTO `kredyty_pozyczki` (`id`, `id_konta`, `nazwa`, `kwota_pożyczona`, `kwota_splacona`, `kwota_do_splaty`, `RRSO`, `data_zapozyczenia`, `termin_splaty`) VALUES
(1, 1, 'Pożyczka gotówkowa w promocji', 2000, 1000, 2153.6, '7,68%', '2019-04-03 11:58:10', '2019-06-02 22:00:00'),
(2, 2, 'Pożyczka konsolidacyjna', 5000, 2500, 5728.5, '14,57%', '2019-05-03 11:59:49', '2019-07-02 22:00:00'),
(3, 3, 'Kredyt na rozwinięcie działalności', 50000, 15000, 53540, '7,08%', '2019-04-03 12:00:20', '2020-09-02 22:00:00'),
(4, 4, 'Kredyt pod aktywa', 250000, 25000, 271350, '8,54%', '2015-04-03 12:01:38', '2019-09-02 22:00:00'),
(5, 5, 'Kredyt na rozwinięcie działalności', 150000, 58000, 160620, '7,08%', '2019-04-03 12:02:10', '2022-04-02 22:00:00'),
(6, 4, 'Pożyczka konsolidacyjna', 8500, 5000, 9738.45, '14,57%', '2019-04-03 12:04:04', '2020-11-30 23:00:00'),
(7, 5, 'Kredyt pod aktywa', 300000, 180000, 325620, '8,54%', '2013-04-03 12:06:02', '2020-04-02 22:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pesel` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nr_telefonu` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `ulica` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nr_domu` int(11) NOT NULL,
  `nr_lokalu` int(11) DEFAULT NULL,
  `kod_pocztowy` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `miasto` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `wojewodztwo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `imie`, `nazwisko`, `pesel`, `email`, `nr_telefonu`, `ulica`, `nr_domu`, `nr_lokalu`, `kod_pocztowy`, `miasto`, `wojewodztwo`) VALUES
(1, 'Adam', 'Kowalski', '98022100254', 'kowalski@o2.pl', '504156258', 'Stołeczna', 20, 3, '15-002', 'Bialystok', 'podlaskie'),
(2, 'Szymon', 'Jaworski', '61120212538', 'jaworski@o2.pl', '605125458', 'Leśna', 41, NULL, '12-125', 'Łomża', 'podlaskie'),
(3, 'Jana', 'Tomczyk', '85052123668', 'tomczyk@gmail.com', '502326569', 'Wiejska', 32, 12, '12-125', 'Bialystok', 'podlaskie'),
(4, 'Hanna', 'Leszczyńska', '92121545864', 'leszczyńska@wp.pl', '502012326', 'Storczykowa', 3, NULL, '15-154', 'Grajewo', 'podlaskie'),
(5, 'Kamil', 'Chmielewski', '85011522579', 'chmielewski@o2.pl', '600965845', 'Jasna', 23, 21, '16-320', 'Augustów', 'podlaskie'),
(6, 'Filip', 'Kaczmarek', '97092325458', 'kaczmarek@wp.pl', '625659856', 'Głośna', 23, 12, '11-321', 'Suwałki', 'podlaskie'),
(7, 'Łukasz', 'Marcinkowski', '92052425659', 'marcinkowski@gmail.com', '504589659', 'Ciemna', 32, NULL, '32-320', 'Suchowola', 'podlaskie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przelewy`
--

CREATE TABLE `przelewy` (
  `id` int(11) NOT NULL,
  `data_przelewu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nr_rachunku_nadawcy` char(27) COLLATE utf8_unicode_ci NOT NULL,
  `nr_rachunku_odbiorcy` char(27) COLLATE utf8_unicode_ci NOT NULL,
  `tytul` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kwota` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `przelewy`
--

INSERT INTO `przelewy` (`id`, `data_przelewu`, `nr_rachunku_nadawcy`, `nr_rachunku_odbiorcy`, `tytul`, `kwota`) VALUES
(1, '2019-04-03 12:11:52', '43 4539 3964 9924 9211 9924', '25 4556 7434 3688 8072 7434', 'Przelew za pizze', 25),
(2, '2019-04-03 12:13:37', '25 4556 7434 3688 8072 7434', '45 5263 7319 4059 8759 4059', 'Czynsz za mieszkanie', 500),
(3, '2019-04-03 12:13:56', '17 5222 1743 7947 0077 1743', '43 4539 3964 9924 9211 9924', 'za komputer', 4000),
(4, '2019-04-03 12:15:19', '23 5302 9943 2309 7368 2309', '58 4485 9067 9978 4776 9067', 'zakupy w biedronce', 68.47),
(5, '2019-04-03 12:16:09', '23 5302 9943 2309 7368 2309', '25 4556 7434 3688 8072 7434', 'za hotdoga', 4.58),
(6, '2019-04-03 12:16:31', '23 5302 9943 2309 7368 2309', '17 5222 1743 7947 0077 1743', 'klawiatura', 145.25),
(7, '2019-04-03 12:16:58', '45 5263 7319 4059 8759 4059', '48 4539 4772 8053 9224 4772', 'mysz steelseries rival', 365.15),
(8, '2019-06-03 21:07:42', '23 5302 9943 2309 7368 2309', '17 5222 1743 7947 0077 1743', 'Papierosy', 15.2),
(9, '2019-06-03 21:12:07', '43 4539 3964 9924 9211 9924', '54 4568 3964 4567 9564 4584', 'Woda Gazowana', 2),
(10, '2019-06-03 21:18:52', '43 4539 3964 9924 9211 9924', '65 7895 3964 4567 7895 8566', 'Frytki', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `klient` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `tresc` text COLLATE utf8_unicode_ci NOT NULL,
  `id_moderatora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `wiadomosci`
--

INSERT INTO `wiadomosci` (`id`, `imie`, `nazwisko`, `telefon`, `email`, `klient`, `tresc`, `id_moderatora`) VALUES
(1, 'Kamil', 'Jaworski', '504125659', 'jaworski@o2.pl', 'tak', 'Można usunąć konto?', 2),
(2, 'Kamil', 'Marcinkowski', '562524158', 'mak122@wp.pl', 'nie', 'Jak założyć konto ?', 3),
(3, 'Filip', 'Kowalczyk', '569854745', 'kowal231@o2.pl', 'tak', 'Jak się zalogować?', 6),
(5, 'Małgorzata', 'Czarnecka', '565222365', 'czarnecka@o2.pl', 'nie', 'Można mieć więcej niż jedno konto ?', 6),
(6, 'Joanna', 'Stankiewicz', '503236569', 'stankiewicz@wp.pl', 'nie', 'Jak zrobić przelew ?', 5),
(7, 'Krzysztof', 'Janicki', '536222214', 'janicki@gmail.com', 'tak', 'Ile trwa założenie konta ?', 3),
(8, 'Adrain', 'Hehehe', '521458745', 'sdasdasda@gmail.com', 'tak', 'jak zrobic  salto ? ', 5),
(9, 'aadasdas', 'asdasd', '123123123', 'gogusek.11@gmail.com', 'nie', 'asdasdasdas', 6);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `karty`
--
ALTER TABLE `karty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_konta_fk` (`id_konta`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `konta_klientow`
--
ALTER TABLE `konta_klientow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nr_rachunku_uq` (`nr_rachunku`) USING BTREE,
  ADD KEY `id_klienta_fk` (`id_klienta`) USING BTREE;

--
-- Indeksy dla tabeli `konta_oczekujace`
--
ALTER TABLE `konta_oczekujace`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesel_uq` (`pesel`) USING BTREE,
  ADD UNIQUE KEY `email_uq` (`email`) USING BTREE,
  ADD UNIQUE KEY `nr_telefonu_uq` (`nr_telefonu`) USING BTREE,
  ADD KEY `id_moderatora_fk` (`id_moderatora`) USING BTREE;

--
-- Indeksy dla tabeli `konta_odrzucone`
--
ALTER TABLE `konta_odrzucone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesel_uq` (`pesel`) USING BTREE,
  ADD UNIQUE KEY `nr_telefonu_uq` (`nr_telefonu`) USING BTREE,
  ADD UNIQUE KEY `email_uq` (`email`) USING BTREE,
  ADD KEY `id_moderatora_fk` (`id_moderatora`) USING BTREE;

--
-- Indeksy dla tabeli `konta_pracownikow`
--
ALTER TABLE `konta_pracownikow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pracownika_fk` (`id_pracownika`) USING BTREE;

--
-- Indeksy dla tabeli `kredyty_pozyczki`
--
ALTER TABLE `kredyty_pozyczki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_konta_fk` (`id_konta`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesel_uq` (`pesel`) USING BTREE,
  ADD UNIQUE KEY `nr_telefonu_uq` (`nr_telefonu`) USING BTREE,
  ADD UNIQUE KEY `email_uq` (`email`) USING BTREE;

--
-- Indeksy dla tabeli `przelewy`
--
ALTER TABLE `przelewy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_moderatora_fk` (`id_moderatora`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `karty`
--
ALTER TABLE `karty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `konta_klientow`
--
ALTER TABLE `konta_klientow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `konta_oczekujace`
--
ALTER TABLE `konta_oczekujace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `konta_odrzucone`
--
ALTER TABLE `konta_odrzucone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `konta_pracownikow`
--
ALTER TABLE `konta_pracownikow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `kredyty_pozyczki`
--
ALTER TABLE `kredyty_pozyczki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `przelewy`
--
ALTER TABLE `przelewy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `karty`
--
ALTER TABLE `karty`
  ADD CONSTRAINT `karty_ibfk_1` FOREIGN KEY (`id_konta`) REFERENCES `konta_klientow` (`id`);

--
-- Ograniczenia dla tabeli `konta_klientow`
--
ALTER TABLE `konta_klientow`
  ADD CONSTRAINT `konta_klientow_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`);

--
-- Ograniczenia dla tabeli `konta_oczekujace`
--
ALTER TABLE `konta_oczekujace`
  ADD CONSTRAINT `konta_oczekujace_ibfk_1` FOREIGN KEY (`id_moderatora`) REFERENCES `konta_pracownikow` (`id`);

--
-- Ograniczenia dla tabeli `konta_odrzucone`
--
ALTER TABLE `konta_odrzucone`
  ADD CONSTRAINT `konta_odrzucone_ibfk_1` FOREIGN KEY (`id_moderatora`) REFERENCES `konta_pracownikow` (`id`);

--
-- Ograniczenia dla tabeli `konta_pracownikow`
--
ALTER TABLE `konta_pracownikow`
  ADD CONSTRAINT `konta_pracownikow_ibfk_1` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownicy` (`id`);

--
-- Ograniczenia dla tabeli `kredyty_pozyczki`
--
ALTER TABLE `kredyty_pozyczki`
  ADD CONSTRAINT `kredyty_pozyczki_ibfk_1` FOREIGN KEY (`id_konta`) REFERENCES `konta_klientow` (`id`);

--
-- Ograniczenia dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD CONSTRAINT `wiadomosci_ibfk_1` FOREIGN KEY (`id_moderatora`) REFERENCES `konta_pracownikow` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
