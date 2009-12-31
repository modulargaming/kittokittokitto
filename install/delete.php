<?php
/**
 * Installer
 *
 * @authors Copy112 <copy112@gmail.com> & Joff <spud2k_2000@msn.com>
 * @copyright Copy112 & Joff 2009
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Installer for MG (modulargaming)
 * @version 2.0
 **/
//We are now removing files so you can´t install the script again
unlink('functions.php');
unlink('install.php');
unlink('output.php');

echo "The script should have removed install.php, functions.php and output.php. This is ok. You have installed mg and now you need to <b>remove the install folder</b>. To be 100% sure nobody can reinstall the script and overwrite your config.inc.php file.";
?>