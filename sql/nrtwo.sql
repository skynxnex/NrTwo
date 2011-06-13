-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 13 juni 2011 kl 13:00
-- Serverversion: 5.1.36
-- PHP-version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Databas: `nrtwo`
--
DROP DATABASE `nrtwo`;
CREATE DATABASE `nrtwo` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `nrtwo`;

-- --------------------------------------------------------

--
-- Struktur för tabell `expertise`
--

DROP TABLE IF EXISTS `expertise`;
CREATE TABLE IF NOT EXISTS `expertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` tinytext COLLATE utf8_bin,
  `expertise_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expertise_type_id` (`expertise_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Data i tabell `expertise`
--

INSERT INTO `expertise` (`id`, `name`, `description`, `expertise_type_id`) VALUES
(1, 'Tyska', 'Personer som kan tyska hjälpligt', 1),
(2, 'php', 'kan programmera php', 2),
(3, 'java', 'kan programmera java', 2),
(4, 'javascript', 'kan programmera javascript', 2),
(5, 'python', 'kan programmera python', 2),
(6, 'c++', 'kan programmera c++', 2),
(7, 'lisp', 'kan programmera lisp', 2),
(8, 'clojure', 'kan programmera clojure', 2);

-- --------------------------------------------------------

--
-- Struktur för tabell `expertise_like_expertise`
--

DROP TABLE IF EXISTS `expertise_like_expertise`;
CREATE TABLE IF NOT EXISTS `expertise_like_expertise` (
  `expertise_id` int(10) unsigned NOT NULL,
  `like_expertise_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Data i tabell `expertise_like_expertise`
--

INSERT INTO `expertise_like_expertise` (`expertise_id`, `like_expertise_id`) VALUES
(3, 4),
(3, 5),
(7, 8);

-- --------------------------------------------------------

--
-- Struktur för tabell `expertise_type`
--

DROP TABLE IF EXISTS `expertise_type`;
CREATE TABLE IF NOT EXISTS `expertise_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Data i tabell `expertise_type`
--

INSERT INTO `expertise_type` (`id`, `name`) VALUES
(1, 'Talat språk'),
(2, 'programmeringsspråk');

-- --------------------------------------------------------

--
-- Struktur för tabell `person__expertise`
--

DROP TABLE IF EXISTS `person__expertise`;
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
(7, 2),
(11, 3),
(11, 2),
(11, 4),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(18, 4),
(18, 7),
(18, 2);

-- --------------------------------------------------------

--
-- Struktur för tabell `persons`
--

DROP TABLE IF EXISTS `persons`;
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
(1, 'anders', 'olsson'),
(2, 'pelle', 'olsson'),
(3, 'peter', 'olsson'),
(4, 'martin', 'olsson'),
(5, 'sture', 'olsson'),
(6, 'niklas', 'olsson'),
(7, 'Pontus', 'Alm'),
(8, 'ove', 'olsson'),
(9, 'ulf', 'olsson'),
(10, 'james', 'olsson'),
(11, 'jace', 'olsson'),
(12, 'joel', 'olsson'),
(13, 'jonas', 'olsson'),
(14, 'mikael', 'olsson'),
(17, 'Kristian', 'Grossman-Madsen'),
(18, 'Hopp', 'hej');

-- --------------------------------------------------------

--
-- Struktur för tabell `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `expertise_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expertise_id` (`expertise_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Data i tabell `projects`
--

INSERT INTO `projects` (`id`, `name`, `startdate`, `enddate`, `expertise_id`) VALUES
(3, 'Test', '1970-01-01', '1970-01-01', NULL),
(4, 'Test igen', '0000-00-00', '0000-00-00', NULL),
(5, 'Test', '2011-05-05', '0000-00-00', NULL),
(6, 'transaction__foodtype', '2011-06-08', '2011-06-28', NULL),
(7, 'Test', '2011-06-01', '2011-06-22', NULL),
(8, 'Test', '2011-06-22', '2011-06-29', 3),
(9, 'Hubba bubba', '2011-06-01', '2011-06-29', 4);

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

--
-- Restriktioner för tabell `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`);
