-- MySQL dump 10.11
--
-- Host: localhost    Database: mg
-- ------------------------------------------------------
-- Server version	5.0.51a

--
-- Dumping data for table `user_staff_group`
--

INSERT INTO user_staff_group (user_id,staff_group_id) VALUES (1,1);
INSERT INTO staff_group_staff_permission (staff_group_id,staff_permission_id) SELECT 1 AS group_id, staff_permission_id FROM staff_permission;

