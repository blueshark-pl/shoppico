-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Paź 13, 2023 at 11:28 AM
-- Wersja serwera: 10.6.15-MariaDB-cll-lve
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cake_d_c_users_phinxlog`
--

CREATE TABLE `cake_d_c_users_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `feedback_items`
--

CREATE TABLE `feedback_items` (
  `id` int(11) NOT NULL,
  `sid` varchar(128) NOT NULL,
  `url` varchar(190) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `data` mediumtext DEFAULT NULL,
  `priority` varchar(20) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `feedback_phinxlog`
--

CREATE TABLE `feedback_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filters`
--

CREATE TABLE `filters` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notification` int(11) NOT NULL,
  `removed` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `private_tab` int(11) NOT NULL,
  `link` text NOT NULL,
  `interval` int(11) NOT NULL DEFAULT 30,
  `last_update` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filter_details`
--

CREATE TABLE `filter_details` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `ad_id_out` varchar(255) NOT NULL,
  `ad_img` text NOT NULL,
  `ad_title` varchar(255) NOT NULL,
  `ad_link` text NOT NULL,
  `ad_price` decimal(10,2) NOT NULL,
  `ad_city` varchar(255) DEFAULT NULL,
  `ad_pro` int(11) DEFAULT NULL,
  `ad_is_private_owner` tinyint(1) NOT NULL DEFAULT 0,
  `favourite` int(11) NOT NULL,
  `removed` int(11) NOT NULL,
  `view_status` int(11) NOT NULL,
  `notification_status` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `id_operation` varchar(255) NOT NULL,
  `filter_limit` int(11) NOT NULL,
  `month_limit` int(11) NOT NULL,
  `operation_number` varchar(50) NOT NULL,
  `operation_type` varchar(50) NOT NULL,
  `operation_status` varchar(50) NOT NULL,
  `operation_amount` float(10,2) NOT NULL,
  `operation_currency` varchar(10) NOT NULL,
  `operation_original_amount` float(10,2) NOT NULL,
  `operation_original_currency` varchar(10) NOT NULL,
  `operation_datetime` datetime NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `control` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `p_info` text NOT NULL,
  `p_email` varchar(150) NOT NULL,
  `is_mail_campain` int(11) DEFAULT NULL,
  `channel` int(11) DEFAULT NULL,
  `signature` varchar(255) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `is_verify` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci COMMENT='Przechowuje Informacje nt. wpłat z DotPay';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` char(36) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `categories` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT 3,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci COMMENT='Przechowuje Wiadomości do Supportu';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `queued_jobs`
--

CREATE TABLE `queued_jobs` (
  `id` int(11) NOT NULL,
  `job_task` varchar(90) NOT NULL,
  `data` text DEFAULT NULL,
  `job_group` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `notbefore` datetime DEFAULT NULL,
  `fetched` datetime DEFAULT NULL,
  `completed` datetime DEFAULT NULL,
  `progress` float DEFAULT NULL,
  `failed` int(11) NOT NULL DEFAULT 0,
  `failure_message` text DEFAULT NULL,
  `workerkey` varchar(45) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` int(3) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `queue_phinxlog`
--

CREATE TABLE `queue_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `queue_processes`
--

CREATE TABLE `queue_processes` (
  `id` int(11) NOT NULL,
  `pid` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `terminate` tinyint(1) NOT NULL DEFAULT 0,
  `server` varchar(90) DEFAULT NULL,
  `workerkey` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` char(40) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data` blob DEFAULT NULL,
  `expires` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `token_secret` varchar(500) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `data` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `users_email` text NOT NULL,
  `netto` float(10,2) NOT NULL,
  `brutto` float(10,2) NOT NULL,
  `vat` int(2) NOT NULL DEFAULT 23,
  `months` int(2) NOT NULL DEFAULT 1,
  `filters_max` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `discount` int(2) NOT NULL DEFAULT 0,
  `removed` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Przechowuje abonamenty';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `is_superuser` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(255) DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `additional_data` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL COMMENT 'Nazwa firmy',
  `nip` varchar(20) DEFAULT NULL COMMENT 'Numer NIP lub inny identyfikator gospodarczy klienta',
  `regon` varchar(14) DEFAULT NULL COMMENT 'Numer REGON klienta',
  `postal_code` varchar(6) NOT NULL COMMENT 'Kod pocztowy siedziby',
  `city` varchar(120) NOT NULL COMMENT 'Miasto siedziby wspólnoty',
  `street` varchar(255) DEFAULT NULL COMMENT 'Ulica wraz z numerem domu',
  `local_number` int(11) DEFAULT NULL COMMENT 'Nr lokalu',
  `phone` varchar(100) DEFAULT NULL COMMENT 'Nr telefonu',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `start_date` datetime NOT NULL,
  `expiration_date` datetime NOT NULL,
  `filter_limit` int(11) NOT NULL,
  `month_limit` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Informacje o aktualnych subskrypcjach użytkowników';

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cake_d_c_users_phinxlog`
--
ALTER TABLE `cake_d_c_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indeksy dla tabeli `feedback_items`
--
ALTER TABLE `feedback_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `feedback_phinxlog`
--
ALTER TABLE `feedback_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indeksy dla tabeli `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `filter_details`
--
ALTER TABLE `filter_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `operation_number` (`operation_number`);

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `queued_jobs`
--
ALTER TABLE `queued_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `queue_phinxlog`
--
ALTER TABLE `queue_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indeksy dla tabeli `queue_processes`
--
ALTER TABLE `queue_processes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workerkey` (`workerkey`),
  ADD UNIQUE KEY `pid` (`pid`,`server`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback_items`
--
ALTER TABLE `feedback_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filter_details`
--
ALTER TABLE `filter_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queue_processes`
--
ALTER TABLE `queue_processes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_users_`
--
--
-- Constraints for dumped tables
--

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
