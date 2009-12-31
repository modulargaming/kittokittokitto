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
$path = getcwd();
$path = dirname($path);

include "template/header.php";
include "functions.php";

$script_dir = $_SERVER['PHP_SELF'];
$script_dir = dirname($script_dir);
$script_dir = dirname($script_dir);
$host = $_SERVER['HTTP_HOST'];

if ($_GET['step'] == '' or $_GET['step'] == '1')
{
?>
	Step 1: License
	<form id='form' name='form' method='post' action='install.php?step=2'>
		<div><iframe src="license.html" frameborder="0" scrolling="auto" class="license" height="400" width="700"></iframe></div>
		<div class='spacer'></div>
		<div align="right"><input type='submit' name='Submit' value='Accept'></div>
	</form>
<?php
}
else if ($_GET['step'] == '2')
{
?>
Step 2: Requirements:
<br />
<div id="left">
PHP version (5.0 or higher):
<br />
MySQL extension
<br /><br />
<b>Writable folders:</b>
<br />
Includes:<br />
Cache<br />
Cache/CSS<br />
Cache/HTML<br />
Template/cache<br />
Template/configs<br />
Template/templates_c<br />
<br />
<b>Writable Files</b>
<br />
install/install.php<br />
install/functions.php<br />
install/output.php<br />
</div>
<div id="right">
<?php echo (phpversion()>="5.0") ? "<span class='yes'>Yes</span>" : "<span class='no'>No</span>" ; ?><br />
<?php echo (extension_loaded('mysql')) ? "<span class='yes'>Available</span>" : "<span class='no'>Unavailable</span>" ; ?>
<br /><br /><br />
<?php echo (is_writable("../includes/")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 775 /includes/</span>" ; ?><br />
<?php echo (is_writable("../cache/")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 775 /cache/</span>" ; ?><br />
<?php echo (is_writable("../cache/CSS")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 775 /cache/CSS/</span>" ; ?><br />
<?php echo (is_writable("../cache/HTML")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 775 /cache/HTML/</span>" ; ?><br />
<?php echo (is_writable("../template/cache")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 775 /template/cache/</span>" ; ?><br />
<?php echo (is_writable("../template/configs")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 775 /template/config/</span>" ; ?><br />
<?php echo (is_writable("../template/templates_c")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 775 /template/templates_c/</span>" ; ?>
<br /><br /><br />
<?php echo (is_writable("install.php")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 777 /install/install.php</span>" ; ?><br />
<?php echo (is_writable("functions.php")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 777 /install/functions.php</span>" ; ?><br />
<?php echo (is_writable("output.php")) ? "<span class='yes'>Writable</span>" : "<span class='no'>Chmod 777 /install/output.php</span>" ; ?>

</div>
<br />
<form id='form' name='form' method='post' action='install.php?step=2'>
<input type='submit' name='Submit' value='Recheck'>
</form>
<form id='form' name='form' method='post' action='install.php?step=3'>
<input type='submit' name='Submit' value='Continue'>
</form>
<?php
}
else if ($_GET['step'] == '3')
{
?>
Step 3: Database Information:<br /><br />
<form id='form' name='form' method='post' action='install.php?step=4'>
<div id="left_db">
Database Host:<br />
Databe Username:<br />
Database password:<br />
Database Name:<br /><br />
Base Path to mg root (/home/user/public_html):<br />
Public Dir to mg root (http://modulargaming.com):<br />
</div>
<div id="right">
<input name='dbhost' type='text' value='localhost'><br />
<input name='dbuser' type='text'><br />
<input name='dbpass' type='text'><br />
<input name='dbname' type='text'><br /><br />
<input name='basepath' type='text' value='<?php echo $path;?>'><br />
<input name='publicdir' type='text' value='<?php echo 'http://' . $host; echo $script_dir;?>'>
</div>		
<input type='submit' name='Submit' value='Next'>
</form>
<?php
}
else if ($_GET['step'] == '4')
{
$dbhost = $_POST['dbhost'];
$dbuser = $_POST['dbuser'];
$dbpass = $_POST['dbpass']; 
$dbname = $_POST['dbname'];
$basepath = $_POST['basepath'];
$publicdir = $_POST['publicdir'];

//Here we send the varaibles to the function and creates the config file
writeConfigFile($dbhost,$dbuser,$dbpass,$dbname,$basepath,$publicdir);
?>
Step 4: Choose Modules<br /><br />
On this page you will be able to choose what modules you want to enable.
The sql files for this modules will run. If you are unsure or a new to mg you should enable them all.<br /><br />

<form id='form' name='form' method='post' action='install.php?step=5'>
<input name='dbhost' type='hidden' value='<?php echo $dbhost; ?>'>
<input name='dbuser' type='hidden' value='<?php echo $dbuser; ?>'>
<input name='dbpass' type='hidden' value='<?php echo $dbpass; ?>'>
<input name='dbname' type='hidden' value='<?php echo $dbname; ?>'>
<input type="checkbox" name="main" value="1" checked="checked">Main Package (all tables that are needed, Press This!)<br />
<input type="checkbox" name="avatars" value="1" checked="checked">Avatars<br />
<input type="checkbox" name="board" value="1" checked="checked">Board Categories<br />
<input type="checkbox" name="board2" value="1" checked="checked">Boards</b><br />
<input type="checkbox" name="timezones" value="1" checked="checked">Timezones<br />
<input type="checkbox" name="char" value="1" checked="checked">Char Races<br />
<input type="checkbox" name="cron" value="1" checked="checked">Cron Tab<br />
<input type="checkbox" name="datetime" value="1" checked="checked">Datetime Format<br />
<input type="checkbox" name="item_class" value="1" checked="checked">Item Class<br />
<input type="checkbox" name="item_type" value="1" checked="checked">Item Type<br />
<input type="checkbox" name="item_recipe_material" value="1" checked="checked">Item Recipe Material<br />
<input type="checkbox" name="item_recipe_type" value="1" checked="checked">Item Recipe Type<br />
<input type="checkbox" name="jump_page" value="1" checked="checked">Jump Page<br />
<input type="checkbox" name="location" value="1" checked="checked">Location<br />
<input type="checkbox" name="pet_specie" value="1" checked="checked">Pet Specie<br />
<input type="checkbox" name="pet_specie_color" value="1" checked="checked">Pet Specie Color<br />
<input type="checkbox" name="pet_specie_pet_specie_color" value="1" checked="checked">Pet Specie Pet Specie Color<br />
<input type="checkbox" name="settings" value="1" checked="checked">Settings<br />
<input type="checkbox" name="shop" value="1" checked="checked">Shops<br />
<input type="checkbox" name="shop_restock" value="1" checked="checked">Shop Restock<br />
<input type="checkbox" name="staff_group" value="1" checked="checked">Staff Group<br />
<input type="checkbox" name="staff_permisson" value="1" checked="checked">Staff Permission<br />
<input type="checkbox" name="user_staff_group" value="1" checked="checked">User Staff Group<br />
<br />
<b>Test Data:</b> (Only Press if you want to get test data)<br />
<input type="checkbox" name="test_posts" value="1">Test Posts<br />
<input type="checkbox" name="test_messages" value="1">Test Messages<br />

<input type='submit' name='Submit' value='Start import.'>
</form>
<?php
}
else if ($_GET['step'] == '5')
{
	$dbhost = $_POST['dbhost'];
	$dbuser = $_POST['dbuser'];
	$dbpass = $_POST['dbpass']; 
	$dbname = $_POST['dbname'];
 
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname, $conn);  
	
	if ($_POST['main'] == '1')
	{
		parse_mysql_dump('sql/mysql5.sql');
	}
	
	if ($_POST['avatars'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/avatar.sql');
	}
	
	if ($_POST['board'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/board.sql');
	}
	
	if ($_POST['board2'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/board_category.sql');
	}
	
	if ($_POST['timezones'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/timezone.sql');
	}

	
	if ($_POST['char'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/char_race.sql');
	}

	
	if ($_POST['cron'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/cron_tab.sql');
	}

	
	if ($_POST['datetime'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/datetime_format.sql');
	}

	
	if ($_POST['item_class'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/item_class.sql');
	}

	
	if ($_POST['item_recipe_material'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/item_recipe_material.sql');
	}

	if ($_POST['item_recipe_type'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/item_recipe_type.sql');
	}

	if ($_POST['item_type'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/item_type.sql');
	}

	
	if ($_POST['jump_page'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/jump_page.sql');
	}
	
	if ($_POST['location'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/location.sql');
	}
	
	if ($_POST['pet_specie'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/pet_specie.sql');
	}
	
	if ($_POST['pet_specie_color'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/pet_specie_color.sql');
	}
	
	if ($_POST['pet_specie_pet_specie_color'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/pet_specie_pet_specie_color.sql');
	}
	
	if ($_POST['settings'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/settings.sql');
	}
	
	
	if ($_POST['shop'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/shop.sql');
	}

	if ($_POST['shop_restock'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/shop_restock.sql');
	}
	
	if ($_POST['staff_group'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/staff_group.sql');
	}
	
	
	if ($_POST['staff_permisson'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/staff_permission.sql');
	}

	if ($_POST['user_staff_group'] == '1')
	{
		parse_mysql_dump('sql/mysql_data/user_staff_group.sql');
	}



	
	if ($_POST['test_posts'] == '1')
	{
		parse_mysql_dump('sql/test_data/posts.sql');
	}
	
	if ($_POST['test_messages'] == '1')
	{
		parse_mysql_dump('sql/test_data/messages.sql');
	}
?>
Step 5: Chmod Back
<br /><br />
<b>Warning:</b> You need to chmod includes to 755 before you do anything else.
<br /><br />
When you are done press <a href="delete.php">HERE!</a>
<?php	
}
?>
<?php
include "template/footer.php"; 
?>
