-- Adminer 4.8.1 MySQL 5.5.5-10.6.5-MariaDB-1:10.6.5+maria~focal dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db`;

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `state` enum('todo','doing','done') DEFAULT 'todo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tasks` (`id`, `name`, `description`, `state`) VALUES
(1,	'Important things',	'I will here be doing some important things!',	'todo'),
(2,	'Align css',	'The css has to be aligned!',	'todo'),
(3,	'Build frontend with JQuery UI!',	'You have to connect the backend to something!',	'doing');

-- 2022-03-02 23:49:05