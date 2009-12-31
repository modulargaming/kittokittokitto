<?php
/**
 * Cron Script to Update users Resources
 *
 * @author Copy112 copy112@gail.com
 * @link http://copy112.se
 * @copyright Copy112
 * @version 0.0.0.1
 * 
 **/
include "includes/config.inc.php";
//LumberJack resource update
mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_1]') 
WHERE lumberjack = '1'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_2]') 
WHERE lumberjack = '2'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_3]') 
WHERE lumberjack = '3'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_4]') 
WHERE lumberjack = '4'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_5]') 
WHERE lumberjack = '5'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_6]') 
WHERE lumberjack = '6'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_7]') 
WHERE lumberjack = '7'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_8]') 
WHERE lumberjack = '8'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_9]') 
WHERE lumberjack = '9'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_10]') 
WHERE lumberjack = '10'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_11]') 
WHERE lumberjack = '11'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_12]') 
WHERE lumberjack = '12'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_13]') 
WHERE lumberjack = '13'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_14]') 
WHERE lumberjack = '14'");

mysql_query("UPDATE city SET wood = wood+('$CITY_CONFIG[lumberjack_get_15]') 
WHERE lumberjack = '15'");


//Clay Mine resource update
mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_1]') 
WHERE clay_mine = '1'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_2]') 
WHERE clay_mine = '2'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_3]') 
WHERE clay_mine = '3'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_4]') 
WHERE clay_mine = '4'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_5]') 
WHERE clay_mine = '5'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_6]') 
WHERE clay_mine = '6'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_7]') 
WHERE clay_mine = '7'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_8]') 
WHERE clay_mine = '8'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_9]') 
WHERE clay_mine = '9'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_10]') 
WHERE clay_mine = '10'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_11]') 
WHERE clay_mine = '11'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_12]') 
WHERE clay_mine = '12'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_13]') 
WHERE clay_mine = '13'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_14]') 
WHERE clay_mine = '14'");

mysql_query("UPDATE city SET clay = clay+('$CITY_CONFIG[claymine_get_15]') 
WHERE clay_mine = '15'");

//Stone Break resource update
mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_1]') 
WHERE stone_break = '1'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_2]') 
WHERE stone_break = '2'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_3]') 
WHERE stone_break = '3'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_4]') 
WHERE stone_break = '4'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_5]') 
WHERE stone_break = '5'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_6]') 
WHERE stone_break = '6'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_7]') 
WHERE stone_break = '7'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_8]') 
WHERE stone_break = '8'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_9]') 
WHERE stone_break = '9'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_10]') 
WHERE stone_break = '10'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_11]') 
WHERE stone_break = '11'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_12]') 
WHERE stone_break = '12'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_13]') 
WHERE stone_break = '13'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_14]') 
WHERE stone_break = '14'");

mysql_query("UPDATE city SET stone = stone+('$CITY_CONFIG[stonebreak_get_15]') 
WHERE stone_break = '15'");

//Iron Mine resource update
mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_1]') 
WHERE iron_mine = '1'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_2]') 
WHERE iron_mine = '2'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_3]') 
WHERE iron_mine = '3'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_4]') 
WHERE iron_mine = '4'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_5]') 
WHERE iron_mine = '5'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_6]') 
WHERE iron_mine = '6'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_7]') 
WHERE iron_mine = '7'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_8]') 
WHERE iron_mine = '8'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_9]') 
WHERE iron_mine = '9'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_10]') 
WHERE iron_mine = '10'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_11]') 
WHERE iron_mine = '11'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_12]') 
WHERE iron_mine = '12'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_13]') 
WHERE iron_mine = '13'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_14]') 
WHERE iron_mine = '14'");

mysql_query("UPDATE city SET iron = iron+('$CITY_CONFIG[ironmine_get_15]') 
WHERE iron_mine = '15'");

//Gold Mine resource update
mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_1]') 
WHERE gold_mine = '1'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_2]') 
WHERE gold_mine = '2'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_3]') 
WHERE gold_mine = '3'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_4]') 
WHERE gold_mine = '4'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_5]') 
WHERE gold_mine = '5'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_6]') 
WHERE gold_mine = '6'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_7]') 
WHERE gold_mine = '7'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_8]') 
WHERE gold_mine = '8'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_9]') 
WHERE gold_mine = '9'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_10]') 
WHERE gold_mine = '10'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_11]') 
WHERE gold_mine = '11'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_12]') 
WHERE gold_mine = '12'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_13]') 
WHERE gold_mine = '13'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_14]') 
WHERE gold_mine = '14'");

mysql_query("UPDATE city SET gold = gold+('$CITY_CONFIG[goldmine_get_15]') 
WHERE gold_mine = '15'");
?> 