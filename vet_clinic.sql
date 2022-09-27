SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `instasham`
--
CREATE DATABASE IF NOT EXISTS `instasham` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `instasham`;

-- --------------------------------------------------------

--
-- Tables comment, publication, profile, and user
--
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11),
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_time` datetime NOT NULL
);

DROP TABLE IF EXISTS `publication`;
CREATE TABLE `publication` (
  `publication_id` int(11),
  `profile_id` int(11) NOT NULL,
  `picture` varchar(20) NOT NULL,
  `caption` text,
  `date_time` datetime NOT NULL
);

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11),
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50),
  `last_name` varchar(50) NOT NULL
);

DROP TABLE IF EXISTS `user`;
 CREATE TABLE `user` (
  `user_id` int(11),
  `username` varchar(50),
  `password_hash` varchar(72) NOT NULL
);

  --
  -- All the primary keys
  --

ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`username`);

ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_to_user` (`user_id`);

ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `publication_to_profile` (`profile_id`);

ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_to_publication` (`publication_id`),
  ADD KEY `comment_to_profile` (`profile_id`);

--
-- AUTO_INCREMENT for table primary keys
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constaints for all tables
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `publication`
  ADD CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

ALTER TABLE `comment`
  ADD CONSTRAINT `comment_to_publication` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`),
  ADD CONSTRAINT `comment_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
    
COMMIT;