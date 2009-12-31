-- MySQL dump 10.11
--
-- Host: localhost    Database: mg
-- ------------------------------------------------------
-- Server version	5.0.51a

--
-- Table structure for table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `avatar` (
  `avatar_id` int(11) NOT NULL auto_increment,
  `avatar_name` varchar(50) NOT NULL,
  `avatar_image` varchar(50) NOT NULL,
  `active` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`avatar_id`),
  UNIQUE KEY `avatar_image` (`avatar_image`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `board` (
  `board_id` smallint(3) NOT NULL auto_increment,
  `board_category_id` int(11) NOT NULL,
  `board_name` varchar(100) NOT NULL,
  `board_descr` varchar(255) NOT NULL,
  `board_locked` enum('N','Y') NOT NULL default 'N',
  `news_source` enum('N','Y') NOT NULL default 'N',
  `required_permission_id` int(11) NOT NULL,
  `order_by` tinyint(2) NOT NULL,
  PRIMARY KEY  (`board_id`),
  KEY `required_permission_id` (`required_permission_id`),
  KEY `board_category_id` (`board_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `board_category`
--

DROP TABLE IF EXISTS `board_category`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `board_category` (
  `board_category_id` int(11) NOT NULL auto_increment,
  `category_name` varchar(50) NOT NULL,
  `order_by` tinyint(4) NOT NULL default '0',
  `required_permission_id` int(11) NOT NULL,
  PRIMARY KEY  (`board_category_id`),
  KEY `required_permission_id` (`required_permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `board_thread`
--

DROP TABLE IF EXISTS `board_thread`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `board_thread` (
  `board_thread_id` int(10) unsigned NOT NULL auto_increment,
  `board_id` smallint(3) NOT NULL,
  `thread_name` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_created_datetime` datetime NOT NULL,
  `thread_last_posted_datetime` datetime NOT NULL,
  `stickied` tinyint(1) NOT NULL default '0',
  `locked` enum('N','Y') NOT NULL default 'N',
  PRIMARY KEY  (`board_thread_id`),
  KEY `board_id` (`board_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `board_thread_post`
--

DROP TABLE IF EXISTS `board_thread_post`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `board_thread_post` (
  `board_thread_post_id` int(10) unsigned NOT NULL auto_increment,
  `board_thread_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `posted_datetime` datetime NOT NULL,
  `post_text` text NOT NULL,
  PRIMARY KEY  (`board_thread_post_id`),
  KEY `board_thread_id` (`board_thread_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `char`
--

DROP TABLE IF EXISTS `char`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `char` (
  `char_id` int(11) NOT NULL auto_increment,
  `level` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `strength` bigint(20) unsigned NOT NULL,
  `dexterity` bigint(20) unsigned NOT NULL,
  `constitution` bigint(20) unsigned NOT NULL,
  `intelligence` bigint(20) unsigned NOT NULL,
  `wisdom` bigint(20) unsigned NOT NULL,
  `charisma` bigint(20) unsigned NOT NULL,
  `hp_max` bigint(20) unsigned NOT NULL,
  `hp` bigint(20) unsigned NOT NULL,
  `stamina_max` bigint(20) unsigned NOT NULL,
  `stamina` bigint(20) unsigned NOT NULL,
  `mana_max` bigint(20) unsigned NOT NULL,
  `mana` bigint(20) unsigned NOT NULL,
  `xp` bigint(20) unsigned NOT NULL,
  `char_race_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `unixtime_next_tick` int(10) unsigned NOT NULL,
  `profile` text NOT NULL,
  PRIMARY KEY  (`char_id`),
  KEY `user_id` (`user_id`),
  KEY `char_race_id` (`char_race_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `char_race`
--

DROP TABLE IF EXISTS `char_race`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `char_race` (
  `char_race_id` int(11) NOT NULL,
  `race_name` varchar(50) NOT NULL,
  `race_descr` text NOT NULL,
  `str_mod` int(11) NOT NULL,
  `dex_mod` int(11) NOT NULL,
  `con_mod` int(11) NOT NULL,
  `int_mod` int(11) NOT NULL,
  `wis_mod` int(11) NOT NULL,
  `cha_mod` int(11) NOT NULL,
  `hp_max_mod` float NOT NULL,
  `stamina_max_mod` float NOT NULL,
  `mana_max_mod` float NOT NULL,
  `xp_max_mod` float NOT NULL,
  `available` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`char_race_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `chat` (
  `username` varchar(25) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `id` int(20) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `city` (
  `city_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `pop` int(11) NOT NULL default '1',
  `wood` int(11) NOT NULL,
  `clay` int(11) NOT NULL,
  `stone` int(11) NOT NULL,
  `iron` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `lumberjack` int(2) NOT NULL default '0',
  `clay_mine` int(2) NOT NULL default '0',
  `stone_break` int(2) NOT NULL default '0',
  `iron_mine` int(2) NOT NULL default '0',
  `gold_mine` int(2) NOT NULL default '0',
  `b_building` varchar(25) NOT NULL,
  `b_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  `b_lvl` int(11) NOT NULL,
  `build_building` varchar(20) NOT NULL,
  `building_place1` varchar(25) NOT NULL,
  `building_place2` varchar(25) NOT NULL,
  `building_place3` varchar(25) NOT NULL,
  `building_place4` varchar(25) NOT NULL,
  `building_place5` varchar(25) NOT NULL,
  `building_place6` varchar(25) NOT NULL,
  `building_place7` varchar(25) NOT NULL,
  `building_place8` varchar(25) NOT NULL,
  `building_place9` varchar(25) NOT NULL,
  `building_place10` varchar(25) NOT NULL,
  `building_place11` varchar(25) NOT NULL,
  `building_place12` varchar(25) NOT NULL,
  `building_place13` varchar(25) NOT NULL,
  `building_place14` varchar(25) NOT NULL,
  `building_place15` varchar(25) NOT NULL,
  `building_place16` varchar(25) NOT NULL,
  `building_place17` varchar(25) NOT NULL,
  `building_place18` varchar(25) NOT NULL,
  PRIMARY KEY  (`city_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `clan`
--

DROP TABLE IF EXISTS `clan`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `clan` (
  `clan_id` int(11) NOT NULL auto_increment,
  `clan_name` varchar(25) collate latin1_general_ci NOT NULL,
  `access` enum('public','private') collate latin1_general_ci NOT NULL,
  `donate` int(20) NOT NULL,
  `page_0` text collate latin1_general_ci NOT NULL,
  `page_1` text collate latin1_general_ci NOT NULL,
  `page_2` text collate latin1_general_ci NOT NULL,
  `page_3` text collate latin1_general_ci NOT NULL,
  `page_4` text collate latin1_general_ci NOT NULL,
  `page_5` text collate latin1_general_ci NOT NULL,
  `page_6` text collate latin1_general_ci NOT NULL,
  `page_7` text collate latin1_general_ci NOT NULL,
  `page_8` text collate latin1_general_ci NOT NULL,
  `page_9` text collate latin1_general_ci NOT NULL,
  `page_9_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  `page_1_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  `page_2_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  `page_3_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  `page_4_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  `page_5_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  `page_6_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  `page_7_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  `page_8_access` enum('public','private') collate latin1_general_ci NOT NULL default 'public',
  PRIMARY KEY  (`clan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `clan_donate_history`
--

DROP TABLE IF EXISTS `clan_donate_history`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `clan_donate_history` (
  `id` int(20) NOT NULL auto_increment,
  `user_name` varchar(25) collate latin1_general_ci NOT NULL,
  `clan_id` int(12) NOT NULL,
  `action` enum('donated','withdrawn') collate latin1_general_ci NOT NULL,
  `amount` int(20) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `clan_join`
--

DROP TABLE IF EXISTS `clan_join`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `clan_join` (
  `clan_id` int(11) NOT NULL,
  `user_name` varchar(25) collate latin1_general_ci NOT NULL,
  `clan_id_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`clan_id_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cron_tab`
--

DROP TABLE IF EXISTS `cron_tab`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `cron_tab` (
  `cron_tab_id` int(11) NOT NULL auto_increment,
  `cron_class` varchar(50) NOT NULL,
  `cron_frequency_seconds` int(10) unsigned NOT NULL,
  `unixtime_next_run` bigint(11) unsigned NOT NULL,
  `enabled` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`cron_tab_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `datetime_format`
--

DROP TABLE IF EXISTS `datetime_format`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `datetime_format` (
  `datetime_format_id` int(11) NOT NULL auto_increment,
  `datetime_format_name` varchar(30) NOT NULL,
  `datetime_format` text NOT NULL,
  PRIMARY KEY  (`datetime_format_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `item_class`
--

DROP TABLE IF EXISTS `item_class`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `item_class` (
  `item_class_id` int(11) NOT NULL auto_increment,
  `php_class` varchar(30) NOT NULL,
  `class_descr` varchar(30) NOT NULL,
  `relative_image_dir` varchar(50) NOT NULL,
  `verb` varchar(30) NOT NULL,
  `one_per_use` enum('N','Y') NOT NULL default 'N',
  `normal_inventory_display` enum('Y','N') NOT NULL,
  PRIMARY KEY  (`item_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `item_recipe_material`
--
 
DROP TABLE IF EXISTS `item_recipe_material`;
SET @saved_cs_client = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `item_recipe_material` (
  `item_recipe_material_id` int(11) NOT NULL auto_increment,
  `recipe_item_type_id` int(11) NOT NULL,
  `material_item_type_id` int(11) NOT NULL,
  `material_quantity` int(11) NOT NULL default '1',
  PRIMARY KEY (`item_recipe_material_id`),
  UNIQUE KEY `recipe_item_type_id` (`recipe_item_type_id`,`material_item_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;
 
--
-- Table structure for table `item_recipe_type`
--
 
DROP TABLE IF EXISTS `item_recipe_type`;
SET @saved_cs_client = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `item_recipe_type` (
  `item_recipe_type_id` int(11) NOT NULL auto_increment,
  `recipe_type_description` varchar(20) NOT NULL,
  PRIMARY KEY (`item_recipe_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `item_type`
--

DROP TABLE IF EXISTS `item_type`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL auto_increment,
  `item_name` varchar(50) NOT NULL,
  `item_descr` text NOT NULL,
  `item_class_id` int(11) NOT NULL,
  `happiness_bonus` tinyint(3) unsigned NOT NULL,
  `hunger_bonus` tinyint(3) unsigned NOT NULL,
  `attack_bonus` tinyint(3) unsigned NOT NULL,
  `pet_specie_color_id` int(11) NOT NULL,
  `item_image` varchar(200) NOT NULL,
`item_recipe_type_id` int(11) NOT NULL,
  `recipe_created_item_type_id` int(11) NOT NULL,
  `recipe_batch_quantity` int(11) NOT NULL,
  `unique_item` enum('N','Y') NOT NULL,
  `transferable_item` enum('Y','N') NOT NULL,

  PRIMARY KEY (`item_type_id`),
  KEY `item_class_id` (`item_class_id`),
  KEY `pet_specie_color_id` (`pet_specie_color_id`),
  KEY `item_recipe_type_id` (`item_recipe_type_id`,`recipe_created_item_type_id`),
  KEY `item_name` (`item_name`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `jump_page`
--

DROP TABLE IF EXISTS `jump_page`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `jump_page` (
  `jump_page_id` int(10) unsigned NOT NULL auto_increment,
  `page_title` varchar(50) NOT NULL default '',
  `page_html_title` varchar(255) NOT NULL default '',
  `layout_type` enum('basic','deep') NOT NULL default 'deep',
  `show_layout` enum('Y','N') NOT NULL default 'Y',
  `page_slug` varchar(25) NOT NULL default '',
  `access_level` enum('restricted','user','public') NOT NULL default 'user',
  `restricted_permission_api_name` varchar(35) NOT NULL,
  `php_script` varchar(100) NOT NULL default '',
  `include_tinymce` enum('N','Y') NOT NULL default 'N',
  `active` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`jump_page_id`),
  UNIQUE KEY `page_slug` (`page_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `location` (
  `location_id` int(6) NOT NULL auto_increment,
  `location_name` varchar(55) collate latin1_general_ci NOT NULL default 'Default Name',
  `location_slug` varchar(55) collate latin1_general_ci NOT NULL,
  `x` int(6) NOT NULL default '0',
  `y` int(6) NOT NULL default '0',
  `z` int(6) NOT NULL default '0',
  PRIMARY KEY  (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pet_specie`
--

DROP TABLE IF EXISTS `pet_specie`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pet_specie` (
  `pet_specie_id` int(11) NOT NULL auto_increment,
  `specie_name` varchar(50) NOT NULL,
  `specie_descr` text NOT NULL,
  `relative_image_dir` varchar(200) NOT NULL,
  `max_hunger` tinyint(3) unsigned NOT NULL,
  `max_happiness` tinyint(3) unsigned NOT NULL,
  `available` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`pet_specie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pet_specie_color`
--

DROP TABLE IF EXISTS `pet_specie_color`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pet_specie_color` (
  `pet_specie_color_id` int(11) NOT NULL auto_increment,
  `color_name` varchar(30) NOT NULL,
  `color_img` varchar(200) NOT NULL,
  `base_color` enum('N','Y') NOT NULL default 'N',
  PRIMARY KEY  (`pet_specie_color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pet_specie_pet_specie_color`
--

DROP TABLE IF EXISTS `pet_specie_pet_specie_color`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pet_specie_pet_specie_color` (
  `pet_specie_pet_specie_color_id` int(11) NOT NULL auto_increment,
  `pet_specie_id` int(11) NOT NULL,
  `pet_specie_color_id` int(11) NOT NULL,
  PRIMARY KEY  (`pet_specie_pet_specie_color_id`),
  UNIQUE KEY `pet_specie_id` (`pet_specie_id`,`pet_specie_color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Links a color to a specie. Without entry, specie cannot beco';
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `settings` (
  `id` int(2) NOT NULL auto_increment,
  `start_currency` bigint(20) NOT NULL default '500',
  `enable_register` int(1) NOT NULL default '1',
  `enable_clans` int(1) NOT NULL default '1',
  `enable_userpages` int(1) NOT NULL default '1',
  `clan_cost` bigint(20) NOT NULL default '500',
  `clan_register` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL auto_increment,
  `shop_name` varchar(30) NOT NULL,
  `shop_image` varchar(200) NOT NULL,
  `welcome_text` text NOT NULL,
  PRIMARY KEY  (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `shop_inventory`
--

DROP TABLE IF EXISTS `shop_inventory`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `shop_inventory` (
  `shop_inventory_id` int(11) NOT NULL auto_increment,
  `item_type_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `quantity` int(11) unsigned NOT NULL,
  `price` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`shop_inventory_id`),
  KEY `item_type_id` (`item_type_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `shop_restock`
--

DROP TABLE IF EXISTS `shop_restock`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `shop_restock` (
  `shop_restock_id` int(11) NOT NULL auto_increment,
  `shop_id` int(11) NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `restock_frequency_seconds` int(11) unsigned NOT NULL,
  `unixtime_next_restock` int(11) unsigned NOT NULL,
  `min_price` bigint(11) NOT NULL,
  `max_price` bigint(11) NOT NULL,
  `min_quantity` smallint(3) NOT NULL,
  `max_quantity` smallint(3) NOT NULL,
  `store_quantity_cap` smallint(3) unsigned NOT NULL,
  PRIMARY KEY  (`shop_restock_id`),
  KEY `shop_id` (`shop_id`,`item_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `staff_group`
--

DROP TABLE IF EXISTS `staff_group`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `staff_group` (
  `staff_group_id` int(11) NOT NULL auto_increment,
  `group_name` varchar(50) NOT NULL,
  `group_descr` text NOT NULL,
  `show_staff_group` enum('Y','N') NOT NULL default 'Y',
  `order_by` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`staff_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `staff_group_staff_permission`
--

DROP TABLE IF EXISTS `staff_group_staff_permission`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `staff_group_staff_permission` (
  `staff_group_staff_permission` int(11) NOT NULL auto_increment,
  `staff_group_id` int(11) NOT NULL,
  `staff_permission_id` int(11) NOT NULL,
  PRIMARY KEY  (`staff_group_staff_permission`),
  UNIQUE KEY `staff_group_id` (`staff_group_id`,`staff_permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `staff_permission`
--

DROP TABLE IF EXISTS `staff_permission`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `staff_permission` (
  `staff_permission_id` int(11) NOT NULL auto_increment,
  `api_name` varchar(50) NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`staff_permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `templates` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `access_lvl` enum('restricted','user') NOT NULL,
  `restricted_permission_api_name` varchar(35) NOT NULL,
  `folder` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `timezone`
--

DROP TABLE IF EXISTS `timezone`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `timezone` (
  `timezone_id` int(11) NOT NULL auto_increment,
  `timezone_short_name` varchar(4) NOT NULL,
  `timezone_long_name` varchar(32) character set utf8 NOT NULL,
  `timezone_continent` varchar(13) NOT NULL,
  `timezone_offset` float(3,1) NOT NULL,
  `order_by` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`timezone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `clan_id` int(6) NOT NULL,
  `clan_access` int(6) NOT NULL,
  `currency` bigint(20) unsigned NOT NULL,
  `bank` bigint(20) unsigned NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password_hash` char(32) default NULL,
  `password_hash_salt` char(32) NOT NULL,
  `current_salt` char(32) NOT NULL,
  `current_salt_expiration` datetime NOT NULL,
  `registered_ip_addr` varchar(16) default NULL,
  `last_ip_addr` varchar(16) default NULL,
  `last_activity` datetime default NULL,
  `access_level` enum('banned','user') NOT NULL default 'user',
  `email` text NOT NULL,
  `age` smallint(3) unsigned NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `profile` text NOT NULL,
  `signature` text NOT NULL,
  `avatar_id` int(11) NOT NULL,
  `user_title` varchar(20) NOT NULL default 'User',
  `datetime_created` datetime default NULL,
  `post_count` int(11) unsigned NOT NULL,
  `textarea_preference` enum('tinymce','plain') NOT NULL default 'tinymce',
  `datetime_last_post` datetime NOT NULL,
  `active_user_pet_id` int(11) NOT NULL,
  `timezone_id` int(11) NOT NULL,
  `datetime_format_id` int(11) NOT NULL,
  `password_reset_requested` datetime NOT NULL,
  `password_reset_confirm` varchar(32) NOT NULL,
  `show_online_status` enum('Y','N') NOT NULL default 'Y',
  `user_page` varchar(1000) NOT NULL default '<p>This is an example page of a users custom page</p>',
  `ref` int(4) NOT NULL,
  `refby` varchar(25) NOT NULL,
  `template` varchar(25) NOT NULL,
  `active_char_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `active_user_pet_id` (`active_user_pet_id`),
  KEY `avatar_id` (`avatar_id`),
  KEY `timezone_id` (`timezone_id`),
  KEY `datetime_format_id` (`datetime_format_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_item`
--

DROP TABLE IF EXISTS `user_item`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_item` (
  `user_item_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `quantity` int(10) unsigned NOT NULL default '1',
  `location` varchar(25) NOT NULL default 'inventory',
  PRIMARY KEY  (`user_item_id`),
  KEY `user_id` (`user_id`),
  KEY `item_type_id` (`item_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_message`
--

DROP TABLE IF EXISTS `user_message`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_message` (
  `user_message_id` int(11) unsigned NOT NULL auto_increment,
  `sender_user_id` int(11) NOT NULL,
  `recipient_user_id` int(11) NOT NULL,
  `recipient_list` text NOT NULL,
  `message_title` varchar(255) NOT NULL,
  `message_body` text NOT NULL,
  `sent_at` datetime NOT NULL,
  `message_read` enum('N','Y') NOT NULL default 'N',
  PRIMARY KEY  (`user_message_id`),
  KEY `sender_user_id` (`sender_user_id`),
  KEY `recipient_user_id` (`recipient_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_notification`
--

DROP TABLE IF EXISTS `user_notification`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_notification` (
  `user_notification_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `notification_text` text NOT NULL,
  `notification_url` text NOT NULL,
  `notification_datetime` datetime NOT NULL,
  PRIMARY KEY  (`user_notification_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_online`
--

DROP TABLE IF EXISTS `user_online`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_online` (
  `user_online_id` int(11) NOT NULL auto_increment,
  `user_type` enum('user','guest') NOT NULL default 'guest',
  `user_id` int(11) NOT NULL,
  `client_ip` varchar(15) NOT NULL,
  `client_user_agent` varchar(255) NOT NULL,
  `datetime_last_active` datetime NOT NULL,
  PRIMARY KEY  (`user_online_id`),
  KEY `user_id` (`user_id`),
  KEY `client_ip` (`client_ip`)
) ENGINE=MEMORY AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_pet`
--

DROP TABLE IF EXISTS `user_pet`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_pet` (
  `user_pet_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `pet_specie_id` int(11) NOT NULL,
  `pet_specie_color_id` int(11) NOT NULL,
  `pet_name` varchar(25) NOT NULL,
  `hunger` tinyint(3) unsigned NOT NULL,
  `happiness` tinyint(3) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `unixtime_next_decrement` int(10) unsigned NOT NULL,
  `profile` text NOT NULL,
  `books_read` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (`user_pet_id`),
  KEY `user_id` (`user_id`),
  KEY `pet_specie_id` (`pet_specie_id`,`pet_specie_color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Pets = specie + user + color.';
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_staff_group`
--

DROP TABLE IF EXISTS `user_staff_group`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_staff_group` (
  `user_staff_group_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `staff_group_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_staff_group_id`),
  UNIQUE KEY `user_id` (`user_id`,`staff_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_shops`
--

CREATE TABLE IF NOT EXISTS `user_shops` (
  `user_id` int(6) NOT NULL,
  `shop_id` int(6) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_image` varchar(50) NOT NULL,
  `welcome_text` varchar(255) NOT NULL,
  `limit` int(1) NOT NULL default '0',
  PRIMARY KEY  (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `user_shops_history`
--

CREATE TABLE IF NOT EXISTS `user_shops_history` (
  `history_id` int(6) NOT NULL,
  `shop_id` int(6) NOT NULL,
  `item_id` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  PRIMARY KEY  (`history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
