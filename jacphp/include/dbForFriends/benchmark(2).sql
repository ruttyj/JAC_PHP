# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.29)
# Database: people
# Generation Time: 2013-11-25 20:49:52 -0500
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table forms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `forms`;

CREATE TABLE `forms` (
  `form_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;

INSERT INTO `forms` (`form_id`, `name`, `description`, `added_by`)
VALUES
	(1,'I an the first','..he was the first',3),
	(2,'I am the econd','hellooo',NULL);

/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_post_id` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(3000) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `parent_post_id`, `form_id`, `time_added`, `subject`, `message`, `added_by`)
VALUES
	(1,NULL,1,NULL,'something','hello',3),
	(2,NULL,1,NULL,'dsfsf','dsfsdf',3),
	(3,NULL,1,NULL,'dsfsf','dsfsdf',3),
	(4,NULL,1,NULL,'Hellooo','Im here',3),
	(5,NULL,1,NULL,'Hellooo','Im here',3),
	(6,NULL,1,NULL,'Hellooo','Im here',3),
	(7,NULL,1,NULL,'Hellooo','Im here',3),
	(8,NULL,1,NULL,'Hellooo','Im here',3),
	(9,NULL,1,NULL,'html','&amp;lt;h1&amp;gt;Title&amp;lt;/h1&amp;gt;',3),
	(10,NULL,1,NULL,'test','&amp;lt;h1&amp;gt;Title&amp;lt;/h1&amp;gt;\r\nhere are\r\nsome\r\nline\r\nendings for you :) \\\' &amp;quot; ) \r\n~!@#$%^&amp;amp;*()_+|}{POIUYTREWQASDFGHJKL:&amp;quot;?&amp;gt;&amp;lt;MNBVCXZ',3),
	(11,NULL,10,NULL,'','\r\n\r\n-------------------------------------------\r\n&amp;gt;   &amp;lt;h1&amp;gt;Title&amp;lt;/h1&amp;gt;\r\n&amp;gt;   here are\r\n&amp;gt;   some\r\n&amp;gt;   line\r\n&amp;gt;   endings for you :) \\\' &amp;quot; ) \r\n&amp;gt;   ~!@#$%^&amp;amp;*()_+|}{POIUYTREWQASDFGHJKL:&amp;quot;?&amp;gt;&amp;lt;MNBVCXZ',NULL),
	(12,NULL,1,NULL,'','try number 2\r\n\r\n-------------------------------------------\r\n&amp;gt;   &amp;lt;h1&amp;gt;Title&amp;lt;/h1&amp;gt;\r\n&amp;gt;   here are\r\n&amp;gt;   some\r\n&amp;gt;   line\r\n&amp;gt;   endings for you :) \\\' &amp;quot; ) \r\n&amp;gt;   ~!@#$%^&amp;amp;*()_+|}{POIUYTREWQASDFGHJKL:&amp;quot;?&amp;gt;&amp;lt;MNBVCXZ',NULL),
	(13,NULL,2,NULL,'gfdsf','test 44444\r\n\r\n-------------------------------------------\r\n&amp;gt;   &amp;lt;h1&amp;gt;Title&amp;lt;/h1&amp;gt;\r\n&amp;gt;   here are\r\n&amp;gt;   some\r\n&amp;gt;   line\r\n&amp;gt;   endings for you :) \\\' &amp;quot; ) \r\n&amp;gt;   ~!@#$%^&amp;amp;*()_+|}{POIUYTREWQASDFGHJKL:&amp;quot;?&amp;gt;&amp;lt;MNBVCXZ',NULL),
	(14,NULL,1,NULL,'5','\r\nrgerdfg\r\n-------------------------------------------\r\n&amp;gt;   &amp;lt;h1&amp;gt;Title&amp;lt;/h1&amp;gt;\r\n&amp;gt;   here are\r\n&amp;gt;   some\r\n&amp;gt;   line\r\n&amp;gt;   endings for you :) \\\' &amp;quot; ) \r\n&amp;gt;   ~!@#$%^&amp;amp;*()_+|}{POIUYTREWQASDFGHJKL:&amp;quot;?&amp;gt;&amp;lt;MNBVCXZ',NULL),
	(15,NULL,1,NULL,'long',' \r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &amp;quot;de Finibus Bonorum et Malorum&amp;quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &amp;quot;Lorem ipsum dolor sit amet..&amp;quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &amp;quot;de Finibus Bonorum et Malorum&amp;quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',3),
	(16,NULL,1,NULL,'','reply to post 10 form 1 test\r\n\r\n-------------------------------------------\r\n&amp;gt;   &amp;lt;h1&amp;gt;Title&amp;lt;/h1&amp;gt;\r\n&amp;gt;   here are\r\n&amp;gt;   some\r\n&amp;gt;   line\r\n&amp;gt;   endings for you :) \\\' &amp;quot; ) \r\n&amp;gt;   ~!@#$%^&amp;amp;*()_+|}{POIUYTREWQASDFGHJKL:&amp;quot;?&amp;gt;&amp;lt;MNBVCXZ',NULL),
	(17,NULL,1,NULL,'add me','hehe',3),
	(18,NULL,1,'2013-11-25 15:36:04','fsdfs','fasdfasdf',3),
	(19,NULL,1,'2013-11-25 15:36:07','sdfsdaf','sadfasfsdf',3);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users2`;

CREATE TABLE `users2` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `lastlogin` timestamp NULL DEFAULT NULL,
  `num_sucess_login` int(11) DEFAULT '0',
  `num_fail_login` int(11) DEFAULT '0',
  `blocked` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

LOCK TABLES `users2` WRITE;
/*!40000 ALTER TABLE `users2` DISABLE KEYS */;

INSERT INTO `users2` (`id`, `username`, `fname`, `lname`, `email`, `password`, `lastlogin`, `num_sucess_login`, `num_fail_login`, `blocked`, `deleted`)
VALUES
	(1,'used','fn','ln','e@emadfgil.com','5f4dcc3b5aa765d61d8327deb882cf99',NULL,0,0,0,0),
	(2,'jordan','fn','ln','e@email.com','5f4dcc3b5aa765d61d8327deb882cf99',NULL,0,0,0,0),
	(3,'ruttyj','jordan','rutty','ruttyj92@hotmail.com','1fbf68596972b568cc410ca90e211aa7','2013-11-25 13:53:14',63,0,0,0),
	(4,'rut','jord','rut','rut@email.com','bbb9b535bad3d3166bf5c7a905f2f202',NULL,10,0,0,0),
	(5,'rut2','jord','rut','rut@email.com','bbb9b535bad3d3166bf5c7a905f2f202',NULL,10,0,1,0),
	(42,'undfgdfg','fn','ln','e@emdfgdfgail.com','5f4dcc3b5aa765d61d8327deb882cf99',NULL,0,0,0,0),
	(44,'buddy','jord','dgf','rut@email.com','bbb9b535bad3d3166bf5c7a905f2f202',NULL,10,0,0,0),
	(45,'bobby','jord','rut','rut@email.com','bbb9b535bad3d3166bf5c7a905f2f202',NULL,10,0,0,0);

/*!40000 ALTER TABLE `users2` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
