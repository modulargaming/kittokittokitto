-- MySQL dump 10.11
--
-- Host: localhost    Database: mg
-- ------------------------------------------------------
-- Server version	5.0.51a

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_name`, `item_descr`, `item_class_id`, `happiness_bonus`, `hunger_bonus`, `pet_specie_color_id`, `item_image`, `item_recipe_type_id`, `recipe_created_item_type_id`, `recipe_batch_quantity`, `unique_item`, `transferable_item`) VALUES (1,'Red Apple','A delicious, healthy red apple.',1,0,3,0,'apple.png',0,0,0,'N','Y'),(5,'Rozen Paintbrush','<p>The Rozen paintbrush is delicious paint. You must use it!</p>',3,0,0,3,'rozen.png',0,0,0,'N','Y'),(6,'Grubby Bowl','This is an old wooden bowl. Since there is nothing else, your pet will have to amuse itself withthis.',2,1,0,0,'bowl.png',0,0,0,'N','Y'),(7,'Red Paintbrush','This will turn your pet red.',3,0,0,1,'red.png',0,0,0,'N','Y'),(8,'Blue Paintbrush','This will turn your pet blue.',3,0,0,1,'blue.png',0,0,0,'N','Y'),(9,'Apple Pie','A recipe for an apple pie.',4,0,0,0,'recipe_pie.png',1,10,1,'Y','N'),(10,'Apple Pie','A warm apple pie.',1,0,5,0,'apple_pie.png',0,0,0,'N','Y');
