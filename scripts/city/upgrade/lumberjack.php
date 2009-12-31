<?php
/**
 * Upgrade Lumber Jack
 *
 * @author Copy112 copy112@gmail.com
 * @link http://copy112.se
 * @copyright Copy112
 * @version 0.0.0.1
 * @package Modular Gaming
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/

for ( $lvl = 1; $lvl <= 14; $lvl += 1) {
	if ($CITY['lumberjack'] == $lvl)
	{
		$wood_cost = $CITY_CONFIG["lumberjack_wood_cost_lvl_$lvl"];
		$clay_cost = $CITY_CONFIG["lumberjack_clay_cost_lvl_$lvl"];
		$stone_cost = $CITY_CONFIG["lumberjack_stone_cost_lvl_$lvl"];
		$iron_cost = $CITY_CONFIG["lumberjack_iron_cost_lvl_$lvl"];
		$gold_cost = $CITY_CONFIG["lumberjack_gold_cost_lvl_$lvl"];
		$take_time = $CITY_CONFIG["lumberjack_upgrade_lvl_$lvl"];
	}
}
		
if ($CITY['lumberjack'] == '15')
{ 
	echo "<p>You have reached the max limit on  LumberJack.</p>";
}
else 
{
	switch($_REQUEST['state'])
	{
		default:
			if ($CITY['btime'] < date("Y-m-d H:i:s")) 
			{
				$redy_time = date("Y-m-d H:i:s", strtotime("+$take_time minutes"));
				$renderer->assign('redy_time',$redy_time);
				$renderer->assign('take_time',$take_time);
				$renderer->assign('mode',$mode);
				$renderer->assign('building','a LumberJack');
				$renderer->assign('id','lumberjack');
				$renderer->assign('wood',$wood_cost);
				$renderer->assign('current_wood',$CITY['wood']);
				$renderer->assign('clay',$clay_cost);
				$renderer->assign('current_clay',$CITY['clay']);
				$renderer->assign('stone',$stone_cost);
				$renderer->assign('current_stone',$CITY['stone']);
				$renderer->assign('iron',$iron_cost);
				$renderer->assign('current_iron',$CITY['iron']);
				$renderer->assign('gold',$gold_cost);
				$renderer->assign('current_gold',$CITY['gold']);
				$renderer->display('city/build.tpl');
			}
			else 
			{
				$renderer->assign('building',$assign_building);
				$renderer->assign('building_lvl',$CITY['blvl']);
				$renderer->assign('time_left',$CITY['btime']);
				$renderer->display('city/time_left.tpl');
			}			
		break;
		case 'process':
			if ($CITY['btime'] < date("Y-m-d H:i:s"))
			{
				$ERRORS = array();
						
        		if($wood_cost > $CITY['wood'])
            	{
            		$ERRORS[] = 'You do not have enough Wood.';
            	}            				
				if($clay_cost > $CITY['clay'])
    	        {
        	    	$ERRORS[] = 'You do not have enough Clay.';
            	}
   				if($stone_cost > $CITY['stone'])
            	{
                	$ERRORS[] = 'You do not have enough Stone.';
            	}
        		if($iron_cost > $CITY['iron'])
            	{
                	$ERRORS[] = 'You do not have enough Iron.';
            	}
				if($gold_cost > $CITY['gold'])
            	{
                	$ERRORS[] = 'You do not have enough Gold.';
            	}
				if(sizeof($ERRORS) > 0)
    	        {
        	    	draw_errors($ERRORS);
            	}
            	else
            	{
					// Take away their resources.
               		$city->subtractWood($wood_cost);
	               	$city->subtractClay($clay_cost);
    	           	$city->subtractStone($stone_cost);
        	       	$city->subtractIron($iron_cost);
            	   	$city->subtractGold($gold_cost);
                	$min = 'minutes';
					$city->setB_building('lumberjack');
					$city->setB_time(date("Y-m-d H:i:s", strtotime(+$take_time . $min)));
					$city->setB_lvl($CITY['lumberjack'] + 1);
					$city->save();
					redirect('city');
            	}
			}
			else
			{
  		    	$renderer->assign('building',$assign_building);
  		    	$renderer->assign('building_lvl',$CITY['blvl']);
  		    	$renderer->assign('time_left',$CITY['btime']);
  		    	$renderer->display('city/time_left.tpl');
			}
		break;
	}// end switch
}
?>
