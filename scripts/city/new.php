<?php
/**
 * Create/Upgrade a building
 *
 * @author Copy112 copy112@gmail.com
 * @link http://copy112.se
 * @copyright Copy112
 * @version 0.0.0.1
 * @package Modular Gaming
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/

$uri->name(array("id2", "id"));
$id2 = stripinput($_URI['id2']);
$id = stripinput($_URI['id']);


switch ($id2) 
{
	default:
		echo '<h2 class="page-title">ERROR - Invalid ID</h2<p>Error, no id chosen.</p>';
	break;
			
	case '1': case '2': case '3': case '4': case '5': case '6': case '7': case '8': case '9': case '10': case '11': 
	case '12': case '13': case '14': case '15': case '16': case '17': case '18':
		switch($_REQUEST['state'])
		{
			default:
						
				if ($CITY['btime'] > date("Y-m-d H:i:s"))
				{
					$renderer->assign('btime',$CITY['btime']);
				}
						
				$renderer->assign('id2',$id2);
				$renderer->assign('id',$city_id);
				$renderer->assign('city',$CITY);
				$renderer->assign('title2','New Building');
				$renderer->display('city/new_building.tpl');
							
			break;
			case 'process':
			
			if ($CITY['btime'] < date("Y-m-d H:i:s")) 
			{
				$new_building = stripinput($_REQUEST['building']);
				$ERRORS = array();
					
				if($new_building == '')
				{
					$ERRORS[] = 'Unknown error';
				}
				if($Building_places[$id2] != '')
				{
					$ERRORS[] = 'You have already got a building on this spot.';
				}
				if(sizeof($ERRORS) > 0)
				{
					draw_errors($ERRORS);
				}
				else
				{
					if($new_building == 'lumberjack')
					{
					include "new/lumberjack.php";
					}
					
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
			}	
			break;
		}				
	break;
}
?>					
