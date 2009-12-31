-- MySQL dump 10.11
--
-- Host: localhost    Database: mg
-- ------------------------------------------------------
-- Server version	5.0.51a

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `board_category_id`, `board_name`, `board_descr`, `board_locked`, `news_source`, `required_permission_id`, `order_by`) VALUES (1,1,'News & Announcements','The latest news and annoucements are posted here.','Y','Y',0,1),(2,1,'General Chat','Discuss the Modular Gaming project here.','N','N',0,3),(3,1,'Suggestions / Bugs','Found a bug? Have a brilliant, earth-shattering idea? Tell us!','N','N',0,6),(4,3,'Staff Board','This is a board restricted to staff members.','N','N',13,100),(5,2,'For Sale','Awesome deals on today\'s hottest products.','N','N',0,0),(6,2,'Groups','Organization for player-run groups.','N','N',0,1);