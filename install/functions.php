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
 
function parse_mysql_dump($url, $ignoreerrors = false) {
   $file_content = file($url);
   //print_r($file_content);
   $query = "";
   foreach($file_content as $sql_line) {
     $tsl = trim($sql_line);
     if (($sql_line != "") && (substr($tsl, 0, 2) != "--") && (substr($tsl, 0, 1) != "#")) {
       $query .= $sql_line;
       if(preg_match("/;\s*$/", $sql_line)) {
         $query = str_replace(";", "", "$query");
         $result = mysql_query($query);
         if (!$result && !$ignoreerrors) die(mysql_error());
         $query = "";
       }
     }
   }
}
  
function writeConfigFile($host,$username,$password,$name,$basepath,$publicdir) {
		global $success;
		
		$basepath = realpath($basepath);
		
		$content = "<?php\n";
		$content .= "/**\n";
		$content .= " * Config files; includes all critical libraries & sets paths.\n";
		$content .= " *\n";				
		$content .= " * This file is part of 'Kitto_Kitto_Kitto'.\n";
		$content .= " *\n";			
		$content .= " * 'Kitto_Kitto_Kitto' is free software; you can redistribute\n";
		$content .= " * it and/or modify it under the terms of the GNU\n";
		$content .= " * General Public License as published by the Free\n";
		$content .= " * Software Foundation; either version 3 of the License,\n";
		$content .= " * or (at your option) any later version.\n";				
		$content .= " *\n";
		$content .= " * 'Kitto_Kitto_Kitto' is distributed in the hope that it will\n";
		$content .= " * be useful, but WITHOUT ANY WARRANTY; without even the\n";
		$content .= " * implied warranty of MERCHANTABILITY or FITNESS FOR A\n";
		$content .= " * PARTICULAR PURPOSE.  See the GNU General Public\n";
		$content .= " * License for more details.\n";
		$content .= " *\n";
		$content .= " * You should have received a copy of the GNU General\n";
		$content .= " * Public License along with 'Kitto_Kitto_Kitto'; if not,\n";
		$content .= " * write to the Free Software Foundation, Inc., 51\n";
		$content .= " * Franklin St, Fifth Floor, Boston, MA  02110-1301  USA\n";
		$content .= " *\n";
		$content .= " * @author Nicholas 'Owl' Evans <owlmanatt@gmail.com>\n";
		$content .= " * @copyright Nicolas Evans, 2007\n";
		$content .= " * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3\n";
		$content .= " * @package Kitto_Kitto_Kitto\n";
		$content .= " * @version 1.0.0\n";
		$content .= "**/\n";
		$content .= "\n";
		$content .= "/**\n";
		$content .= " * Include the exception handlers before our switch.\n";
		$content .= " *\n";
		$content .= " * This keeps the config DRY, since it's setting based on\n";
		$content .= " * the RELEASE_MODE and the function has to be defined\n";
		$content .= " * _before_ the set_exception_handler() call.\n";
		$content .= " **/\n";
		$content .= "require('includes/meta/debug.php');\n";
		$content .= "\n";
		$content .= "// Comment this out to try and pull in the RELEASE_MODE from the\n";
		$content .= "// .htaccess file. It may not work, depending on Apache's setup.\n";
		$content .= "\$_SERVER['RELEASE_MODE'] = 'DEV';\n";
		$content .= "\n";
		$content .= "switch(\$_SERVER['RELEASE_MODE'])\n";
		$content .= "{\n";
		$content .= "	case 'DEV':\n";
		$content .= "	{\n";
		$content .= "        // Even if your host has error reporting turned off, this *should* \n";
		$content .= "        // force PHP to send errors to the browser. This is immensely useful\n";
		$content .= "        // during setup / development, but it's probably not wanted in a \n";
		$content .= "        // production environment.\n";
		$content .= "        error_reporting(E_ALL ^ E_NOTICE);\n";
		$content .= "\n";
		$content .= "        // Make the errors useful for dev.\n";
		$content .= "        set_exception_handler('development_exception_handler');\n";
		$content .= "\n";
		$content .= "        \$APP_CONFIG = array(\n";
		$content .= "            /**\n";
		$content .= "             * The datasource name for your database.\n";
		$content .= "             * \n";
		$content .= "             * phptype  = PEAR::DB driver to use (mysql, oci)\n";
		$content .= "             * username = The database user to connect as.\n";
		$content .= "             * password = The password for your database user. \n";
		$content .= "             * database = The database to USE.\n";
		$content .= "             * hostspec = The hostname to connect to. If you don't know what\n";
		$content .= "             *            this is, the default 'localhost' is probably correct.\n";
		$content .= "             *\n";
		$content .= "             * @var array\n";
		$content .= "             **/\n";
		$content .= "			'db_dsn' => array(\n";
		$content .= "				'phptype' => 'mysql', // This can also be run on Oracle (oci).\n";
		$content .= "				'username' => '$username',\n";
		$content .= "				'password' => '$password',\n";
		$content .= "				'hostspec' => '$host',\n";
		$content .= "				'database' => '$name',\n";
		$content .= "			),\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The administator's e-mail address. Password recovery notices\n";
		$content .= "             * come from this address, too!\n";
		$content .= "             **/\n";
		$content .= "            'administrator_email' => 'default@yourgame.com',\n";
		$content .= "            'paypal_email' => 'default@yourgame.com',\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The absolute path (on the filesystem) to your app. On UNIX,\n";
		$content .= "             * this should look like /something/something/something.\n";
		$content .= "             *\n";
		$content .= "             * If you don't know what this should be, put a file calling\n";
		$content .= "             * phpinfo() into the folder you want KKK to live in and visit\n";
		$content .= "             * it in your browser. Look for the 'SCRIPT_FILENAME' field.\n";
		$content .= "             * The base path is everything *except* for the filename.\n";
		$content .= "             **/\n";
		$content .= "			'base_path' => '$basepath',\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The path to the root of your Smarty template directory.\n";
		$content .= "             * The templates/, templates_c/, cache/, and configs/ folders\n";
		$content .= "             * live in here.\n";
		$content .= "             **/\n";
		$content .= "\n";
		$content .= "			'template_path' => '$basepath/template',\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The HTMLPurifier cache must be writable by the webserver's user.\n";
		$content .= "             * Set this to null to disable the cache (but you *want* the cache\n";
		$content .= "             * for performance reasons!). Oh, and no trailing slash.\n";
		$content .= "             **/\n";
		$content .= "            'htmlpurifier_cachedir' => '$basepath/cache',\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The full URL (no trailing slash) to your site.\n";
		$content .= "             * ie, 'http://demo.modulargaming.com'\n";
		$content .= "             **/\n";
		$content .= "			'public_dir' => '$publicdir',\n";
		$content .= "\n";
		$content .= "			/**\n";
		$content .= "             * Standard template that will be used if the \n";
		$content .= "             * user haven´t choosed another.\n";
		$content .= "             * ie, 'mg'\n";
		$content .= "             **/\n";
		$content .= "			'default_template' => 'mg',\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * If you have many sites at this domain, a cookie prefix\n";
		$content .= "             * is good to ensure there's no overlap between your various\n";
		$content .= "             * apps' cookies.\n";
		$content .= "             **/\n";
		$content .= "			'cookie_prefix' => 'mg_',\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The name of your site.\n";
		$content .= "             **/\n";
		$content .= "            'site_name' => 'Modular Gaming',\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The name of your site's currency.\n";
		$content .= "             **/\n";
		$content .= "            'currency_name_singular' => 'Credit',\n";
		$content .= "            'currency_name_plural' => 'Credits',\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The maximum number of pets a single user may have.\n";
		$content .= "             **/\n";
		$content .= "            'max_pets' => 2,\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The number of seconds a user must wait between creating posts\n";
		$content .= "             * on the forums.\n";
		$content .= "             **/\n";
		$content .= "            'post_interval' => 30,\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * How many seconds does it take for a pet to lose hunger/\n";
		$content .= "             * happiness levels?\n";
		$content .= "             **/\n";
		$content .= "            'hunger_interval' => (3600 * 6), // 6 hours\n";
		$content .= "\n";
		$content .= "            /**\n";
		$content .= "             * The total number of people that may be specified in a single\n";
		$content .= "             * message's 'To' field.\n";
		$content .= "             *\n";
		$content .= "             * WARNING: If you want to change this, you must also update the\n";
		$content .= "             * variable 'maxTo' in resources/script/yasashii.js to match, lest\n";
		$content .= "             * your compose page be inconsistant with reality!\n";
		$content .= "             **/\n";
		$content .= "            'max_mail_recipients' => 5,\n";
		$content .= "\n";
		$content .= "			/**\n";
		$content .= "             * The Id of the row where settings should be loaded from\n";
		$content .= "             *\n";
		$content .= "             * WARNING: If you want to change this, you must have a new row in\n";
		$content .= "             * the database table calld settings\n";
		$content .= "             **/\n";
		$content .= "			'settings_row' => 1,\n";
		$content .= "		);\n";
		$content .= "\n";
		$content .= "		break;\n";
		$content .= "	} // end dev\n";
		$content .= "\n";
		$content .= "	default:\n";
		$content .= "	{\n";
		$content .= "		die(\"RELEASE_MODE '{\$_SERVER['RELEASE_MODE']}' unrecognized; CANNOT PROCEED.\");\n";
		$content .= "\n";
		$content .= "		break;\n";
		$content .= "	} // end default\n";
		$content .= "\n";
		$content .= "} // end release mode switch\n";
		$content .= "\n";
		$content .= "// PEAR::DB gets very angry when it cannot include files in external_libs/DB/.\n";
		$content .= "ini_set('include_path',ini_get('include_path').':./external_lib/');\n";
		$content .= "\n";
		$content .= "/**\n";
		$content .= " * These are mission-critical libraries. Nothing else will function \n";
		$content .= " * correctly without these. APHP needs to come before any other classes,\n";
		$content .= " * otherwise they will cause a fatal error because their parent class is\n";
		$content .= " * undefined.\n";
		$content .= " **/\n";
		$content .= "//This will check if you are running windows or another os \n";
		$content .= "if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {\n";
		$content .= "    require_once(\$APP_CONFIG['base_path'].'\external_lib/DB.php');\n";
		$content .= "} else {\n";
		$content .= "    require_once('external_lib/DB.php');\n";
		$content .= "}\n";
		$content .= "require_once('external_lib/Log.php');\n";
		$content .= "require_once('external_lib/aphp/aphp.php');\n";
		$content .= "\n";
		$content .= "/**\n";
		$content .= " * KKK library files.\n";
		$content .= " **/\n";
		$content .= "require('includes/meta/macros.lib.php');\n";
		$content .= "require('includes/meta/jump_page.class.php');\n";
		$content .= "require('includes/meta/pagination.php');\n";
		$content .= "require('includes/classes/classes.config.php');\n";
		$content .= "require('includes/cronjobs/cronjobs.config.php');\n";
		$content .= "\n";
		$content .= "\$DB_OPTIONS = array(\n";
		$content .= "	'debug' => 2,\n";
		$content .= "	'portability' => DB_PORTABILITY_ALL,\n";
		$content .= ");\n";
		$content .= "\n";
		$content .= "\$db = DB::connect(\$APP_CONFIG['db_dsn'],\$DB_OPTIONS);\n";
		$content .= "if (PEAR::isError(\$db))\n";
		$content .= "{\n";
		$content .= "    die('An error occured when attempting to connect to the database. Oops!');\n";
		$content .= "}\n";
		$content .= "\$db->setFetchMode(DB_FETCHMODE_ASSOC);\n";
		$content .= "\n";
		$content .= "?>\n";
		
		$myfile = '../includes/config.inc.php';
		if (is_writable('../includes/')) {
			$handle = fopen($myfile, 'w');
			fwrite($handle, $content);
			fclose($handle);
			$success = true;
		} else {
			$success = false;
			echo "Warning:\n";
			echo "<b>The folder root/includes/ does not exist or is not writable!</b><br />\n";
			echo "<b>What to do?</b><br />";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download the configuration file from <a href='output.php?h=$host&u=$username&p=$password&n=$name&basepath=$basepath&publicdir=$publicdir' target='_blank'><b style='color:#990000;'>HERE</b></a> and upload it into the root/includes/.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The final configuration file path must be: root/inclides/config.inc.php<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; When done, continue the installation wizard.<br /><br />\n";
		}
}
?>