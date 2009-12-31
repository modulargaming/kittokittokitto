-- MySQL dump 10.11
--
-- Host: localhost    Database: mg
-- ------------------------------------------------------
-- Server version	5.0.51a

--
-- Dumping data for table `staff_permission`
--

INSERT INTO `staff_permission` (`staff_permission_id`, `api_name`, `permission_name`) VALUES (1,'ignore_board_lock','Post In Locked Board'),(2,'delete_post','Delete Post'),(3,'edit_post','Edit Post'),(4,'manage_thread','Lock/Stick Thread'),(5,'admin_panel','Admin Panel Access'),(6,'moderate','Moderation Dropdown'),(7,'manage_permissions','Edit Permissions'),(8,'manage_pets','Edit Pet Species/Colors'),(9,'manage_users','User Manager'),(10,'manage_boards','Manage Boards'),(11,'manage_shops','Manage Shops'),(12,'manage_items','Manage Items'),(13,'forum_access:staff','Forum: Staff Board'),(14, 'manage_settings', 'Manage Settings');
