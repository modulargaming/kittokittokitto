-- MySQL dump 10.11
--
-- Host: localhost    Database: mg
-- ------------------------------------------------------
-- Server version	5.0.51a

--
-- Dumping data for table `item_class`
--

INSERT INTO `item_class` (`item_class_id`, `php_class`, `class_descr`, `relative_image_dir`, `verb`, `one_per_use`, `normal_inventory_display`) VALUES (1,'Food_Item','Food','food','feed','N','Y'),(2,'Toy_Item','Toy','toys','play with','N','Y'),(3,'Paint_Item','Paint','paints','paint','Y','Y'),(4,'Recipe_Item','Recipe','recipe','creates','N','N');
