<?php
/**
 * Cron Script to update Users Buildings
 *
 * @author Copy112 copy112@gail.com
 * @link http://copy112.se
 * @copyright Copy112
 * @version 0.0.0.1
 * 
 **/

include "includes/config.inc.php";
$time = date("Y-m-d H:i:s");
//This add 1 to you lumberjack lvl, but only if you are building lumberjack and if your building time has ended. :)
mysql_query("UPDATE city SET lumberjack = lumberjack+(1) 
WHERE b_building = 'lumberjack' AND b_time < '$time'");

//This add 1 to you claymine lvl, but only if you are building claymine and if your building time has ended. :)
mysql_query("UPDATE city SET clay_mine = clay_mine+(1) 
WHERE b_building = 'claymine' AND b_time < '$time'");

//This add 1 to you stone_break lvl, but only if you are building stone_break and if your building time has ended. :)
mysql_query("UPDATE city SET stone_break = stone_break+(1) 
WHERE b_building = 'stonebreak' AND b_time < '$time'");

//This add 1 to you iron_mine lvl, but only if you are building iron_mine and if your building time has ended. :)
mysql_query("UPDATE city SET iron_mine = iron_mine+(1) 
WHERE b_building = 'ironmine' AND b_time < '$time'");

//This add 1 to you gold_mine lvl, but only if you are building gold_mine and if your building time has ended. :)
mysql_query("UPDATE city SET gold_mine = gold_mine+(1) 
WHERE b_building = 'goldmine' AND b_time < '$time'");

//this resets the building time, building lvl and building-building so we don´t update the users building again :P
mysql_query("UPDATE city SET b_time = ''
WHERE b_time < '$time'");
mysql_query("UPDATE city SET b_lvl = ''
WHERE b_time < '$time'");
mysql_query("UPDATE city SET b_building = '' 
WHERE b_time < '$time'");
mysql_query($query);

echo $time;

/*
$city = new City($db);
$city = $city->findBy(array(
    array(  
        'table' => 'city',
        'column' => 'b_lvl',
    	'search_type' => '=',
        'value' => '2',
    ),
));

$CITY = array(
	'bbuilding'		=> $city->getB_building(),
	'btime'			=> $city->getB_Time(),
	'blvl'			=> $city->getB_Lvl(),
	'lumberjack'	=> $city->getLumberjack(),
	'clay_mine'		=> $city->getClayMine(),
);

echo $CITY['blvl']; 
*/
?> 