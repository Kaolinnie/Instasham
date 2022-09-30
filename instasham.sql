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
DROP TABLE IF EXISTS `like`;
 CREATE TABLE `like` (
  `publication_id` int(11),
  `profile_id` int(11)
);

DROP TABLE IF EXISTS `following`;
 CREATE TABLE `following` (
  `profile_id` int(11),
  `profile_id_following` int(11)
);
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
  `display_name` varchar(50),
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50),
  `last_name` varchar(50) NOT NULL,
  `profile_pic` varchar(50),
  `description` varchar(100)
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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

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

ALTER TABLE `like`
  ADD PRIMARY KEY (`publication_id`,`profile_id`),
  ADD KEY `like_to_publication` (`publication_id`),
  ADD KEY `like_to_profile` (`profile_id`);

ALTER TABLE `following`
  ADD PRIMARY KEY (`profile_id`,`profile_id_following`),
  ADD KEY `following_to_profile` (`profile_id`),
  ADD KEY `following_to_profile_following` (`profile_id_following`);


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
    
ALTER TABLE `like`
  ADD CONSTRAINT `like_to_publication` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`),
  ADD CONSTRAINT `like_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
    
ALTER TABLE `following`
  ADD CONSTRAINT `following_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `following_to_profile_following` FOREIGN KEY (`profile_id_following`) REFERENCES `profile` (`profile_id`);
    
COMMIT;



-- INSERT INTO user(user_id,username,password_hash) VALUES (5,'Kaolinnie','password123');
-- INSERT INTO user(user_id,username,password_hash) VALUES (10,'ErisWhistles','password123');
-- INSERT INTO user(user_id,username,password_hash) VALUES (15,'JGrospe','password123');

-- INSERT INTO profile(profile_id,user_id,display_name,first_name,last_name,profile_pic,description) VALUES (5,5,'Kaolinnie','Kaolin','Stacey','cat.png',"This is Kaolin's profile!");
-- INSERT INTO profile(profile_id,user_id,display_name,first_name,last_name,profile_pic,description) VALUES (10,10,'ErisWhistles','Eris','Degani','anonymous.jpg',"This is Eris's profile!");
-- INSERT INTO profile(profile_id,user_id,display_name,first_name,last_name,profile_pic,description) VALUES (15,15,'JGrospe','Jeffrey','Grospe','anonymous.jpg',"This is Jeffrey's profile!");

-- INSERT INTO publication(publication_id,profile_id,picture,caption,date_time) VALUES (1,5,'cat2.jpg',"Kibbies are cute",'2022-09-28 15:27:23');
-- INSERT INTO publication(publication_id,profile_id,picture,caption,date_time) VALUES (2,5,'cat3.jpg',"This kibby is also very cute",'2022-09-28 15:41:35');
-- INSERT INTO publication(publication_id,profile_id,picture,caption,date_time) VALUES (3,10,'eris.jpg',"My name is Eris",'2022-09-28 15:27:23');

-- INSERT INTO comment(publication_id,profile_id,comment,date_time) VALUES (1,10,"CUTE","2022-09-29 10:06:48");