-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 08 juni 2011 kl 12:57
-- Serverversion: 5.1.36
-- PHP-version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Databas: `nrtwo`
--

-- --------------------------------------------------------

--
-- Struktur för tabell `expertise`
--

CREATE TABLE IF NOT EXISTS `expertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` tinytext COLLATE utf8_bin,
  `expertise_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expertise_type_id` (`expertise_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Data i tabell `expertise`
--

INSERT INTO `expertise` (`id`, `name`, `description`, `expertise_type_id`) VALUES
(1, 'Tyska', 'Personer som kan tyska hjälpligt', 1);

-- --------------------------------------------------------

--
-- Struktur för tabell `expertise_type`
--

CREATE TABLE IF NOT EXISTS `expertise_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Data i tabell `expertise_type`
--

INSERT INTO `expertise_type` (`id`, `name`) VALUES
(1, 'Talat språk');

-- --------------------------------------------------------

--
-- Struktur för tabell `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Data i tabell `persons`
--

INSERT INTO `persons` (`id`, `firstname`, `lastname`) VALUES
(1, 'pelle', 'olsson'),
(2, 'pelle', 'olsson'),
(3, 'pelle', 'olsson'),
(4, 'pelle', 'olsson'),
(5, 'pelle', 'olsson'),
(6, 'pelle', 'olsson'),
(7, 'Pontus', 'Alm'),
(8, 'pelle', 'olsson'),
(9, 'pelle', 'olsson'),
(10, 'pelle', 'olsson'),
(11, 'olle', 'olsson'),
(12, 'olle', 'olsson'),
(13, 'olle', 'olsson'),
(14, 'olle', 'olsson'),
(17, 'Kristian', 'Grossman-Madsen'),
(18, 'Hopp', 'hej');

-- --------------------------------------------------------

--
-- Struktur för tabell `person__expertise`
--

CREATE TABLE IF NOT EXISTS `person__expertise` (
  `persons_id` tinyint(3) unsigned NOT NULL,
  `expertise_id` int(10) unsigned NOT NULL,
  KEY `persons_id` (`persons_id`),
  KEY `expertise_id` (`expertise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Data i tabell `person__expertise`
--

INSERT INTO `person__expertise` (`persons_id`, `expertise_id`) VALUES
(1, 1),
(2, 1);

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `expertise`
--
ALTER TABLE `expertise`
  ADD CONSTRAINT `expertise_ibfk_1` FOREIGN KEY (`expertise_type_id`) REFERENCES `expertise_type` (`id`) ON DELETE NO ACTION;

--
-- Restriktioner för tabell `person__expertise`
--
ALTER TABLE `person__expertise`
  ADD CONSTRAINT `person__expertise_ibfk_1` FOREIGN KEY (`persons_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `person__expertise_ibfk_2` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`) ON DELETE NO ACTION;
