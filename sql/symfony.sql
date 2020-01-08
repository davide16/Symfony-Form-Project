-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Gen 08, 2020 alle 16:15
-- Versione del server: 5.7.28-0ubuntu0.18.04.4
-- Versione PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_num` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_date`, `invoice_num`, `id_client`) VALUES
(1, '2015-01-01', 1, 1),
(2, '2015-01-01', 77, 77);

-- --------------------------------------------------------

--
-- Struttura della tabella `invoice_rows`
--

CREATE TABLE `invoice_rows` (
  `id` int(11) NOT NULL,
  `invoice_id_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `vatamount` decimal(12,2) NOT NULL,
  `total_with_vat` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `invoice_rows`
--

INSERT INTO `invoice_rows` (`id`, `invoice_id_id`, `description`, `quantity`, `amount`, `vatamount`, `total_with_vat`) VALUES
(1, 1, 'this is', 2, '12.40', '13.40', '25.80'),
(2, 2, 'fisrt row', 1, '2.00', '4.00', '6.00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9065174474B2C0AD` (`invoice_num`);

--
-- Indici per le tabelle `invoice_rows`
--
ALTER TABLE `invoice_rows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_84E96C4429ECEE2` (`invoice_id_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `invoice_rows`
--
ALTER TABLE `invoice_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `invoice_rows`
--
ALTER TABLE `invoice_rows`
  ADD CONSTRAINT `FK_84E96C4429ECEE2` FOREIGN KEY (`invoice_id_id`) REFERENCES `invoice` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
