-- MySQL dump 10.11
--
-- Host: localhost    Database: mg
-- ------------------------------------------------------
-- Run this for updating your mg database to 0.2.6

ALTER TABLE `user_item` ADD `location` VARCHAR( 25 ) NOT NULL default 'inventory';

INSERT INTO `jump_page` (`jump_page_id`, `page_title`, `page_html_title`, `layout_type`, `page_slug`, `access_level`, `restricted_permission_api_name`, `php_script`, `include_tinymce`, `active`) VALUES
(, 'Jump Page Manage', 'Jump Page Manage', 'deep', 'admin-jump', 'restricted', 'manage_settings', 'admin/settings/jump_page.php', 'N', 'Y');