-- MySQL dump 10.11
--
-- Host: localhost    Database: mg
-- ------------------------------------------------------
-- Server version	5.0.51a

--
-- Dumping data for table `shop_restock`
--

INSERT INTO `shop_restock` (`shop_restock_id`, `shop_id`, `item_type_id`, `restock_frequency_seconds`, `unixtime_next_restock`, `min_price`, `max_price`, `min_quantity`, `max_quantity`, `store_quantity_cap`) VALUES (1,1,1,3600,1247524172,1,15,5,10,30),(2,1,6,1200,1247521772,5,15,5,10,15),(3,1,8,2600,1247523173,50,100,2,5,10),(4,1,7,2600,1247523173,50,100,2,5,10),(5,1,5,2800,1247523373,1000,5000,1,2,2),(6,1,9,3600,1247524173,100,200,1,3,5);
