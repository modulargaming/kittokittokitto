<?php
/**
 * Displays a user's city 
 *
 * @author Copy112 copy112@gail.com
 * @link http://copy112.se
 * @copyright Copy112
 * @version 0.0.0.1
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 
 **/

$uri->name(array("city_id", "mode", "id", "id2"));

$city_id = stripinput($_URI['city_id']);
$mode = stripinput($_URI['mode']);
$building = stripinput($_URI['id']);
$id2 = stripinput($_URI['id2']);

$ERRORS = array();

$renderer->assign('city_id',$city_id);

$user_id = new user($db);
$user_id = $user_id->findOneByUserName($username);
$user_id = array(
	'id' => $user_id->getUserId(),
);
$user_id = $user_id['id'];

if (!$city_id)
{
	$USER_LIST_LIST = array();

		$users_list = new City($db);
		$users_list = $users_list->findByUserId(array($user_id));

		foreach($users_list as $user_list)
		{
    		$USER_LIST_LIST[] = array(
    	  	  'id' => $user_list->getCityId(),
     		  'name' => $user_list->getName(),
    		);
		} // end shop list

		$renderer->assign('user_list',$USER_LIST_LIST);
		$renderer->assign('user_available',(bool)sizeof($USER_LIST_LIST));
		$renderer->display('city/list.tpl');
}
else 
{
$city = new city($db);
$city = $city->findOneByCityId($city_id); 
$CITY = array(
	'user_id'		=> $city->getUserId(),
	'name'			=> $city->getName(),
	'pop'			=> $city->getPop(),
	'wood'			=> $city->getWood(),
	'clay'			=> $city->getClay(),
	'stone'			=> $city->getStone(),
	'iron'			=> $city->getIron(),
	'gold'			=> $city->getGold(),
	'lumberjack'	=> $city->getLumberjack(),
	'clay_mine'		=> $city->getClayMine(),
	'stone_break'	=> $city->getStoneBreak(),
	'iron_mine'  	=> $city->getIronMine(),
	'gold_mine'  	=> $city->getGoldMine(),
	'bbuilding'		=> $city->getB_Building(),
	'btime'			=> $city->getB_Time(),
	'blvl'			=> $city->getB_Lvl(),
);

if ($CITY['user_id'] !=  $user_id)
{
	echo "<p>You can not access a city you do not own.</p>";
}
else
{
if ($CITY['bbuilding'] == 'lumberjack')
{
	$assign_building= 'a LumberJack';
}
else if ($CITY['bbuilding'] == 'claymine')
{
	$assign_building= 'a Clay Mine';
}
else if ($CITY['bbuilding'] == 'stonebreak')
{
	$assign_building= 'a Stone Break';
}
else if ($CITY['bbuilding'] == 'ironmine')
{
	$assign_building= 'a Iron Mine';
}
else if ($CITY['bbuilding'] == 'goldmine')
{
	$assign_building= 'a Gold Mine';
}

switch ($mode) 
{
	default:
		if(sizeof($ERRORS) > 0)
		{
			draw_errors($ERRORS);
		}
		else
		{
			$Building_places = array(
				'1'		=> $city->getBuildingPlace1(),
				'2'		=> $city->getBuildingPlace2(),
				'3'		=> $city->getBuildingPlace3(),
				'4'		=> $city->getBuildingPlace4(),
				'5'		=> $city->getBuildingPlace5(),
				'6'		=> $city->getBuildingPlace6(),
				'7'		=> $city->getBuildingPlace7(),
				'8'		=> $city->getBuildingPlace8(),
				'9'		=> $city->getBuildingPlace9(),
				'10'	=> $city->getBuildingPlace10(),
				'11'	=> $city->getBuildingPlace11(),
				'12'	=> $city->getBuildingPlace12(),
				'13'	=> $city->getBuildingPlace13(),
				'14'	=> $city->getBuildingPlace14(),
				'15'	=> $city->getBuildingPlace15(),
				'16'	=> $city->getBuildingPlace16(),
				'17'	=> $city->getBuildingPlace17(),
				'18'	=> $city->getBuildingPlace18(),
			);
			
			$renderer->assign('building_places',$Building_places);
			$renderer->assign('city',$CITY);
			$renderer->display('city/city.tpl');
		}
		break;
		
	case build:
		$Building_places = array(
			'1'		=> $city->getBuildingPlace1(),
			'2'		=> $city->getBuildingPlace2(),
			'3'		=> $city->getBuildingPlace3(),
			'4'		=> $city->getBuildingPlace4(),
			'5'		=> $city->getBuildingPlace5(),
			'6'		=> $city->getBuildingPlace6(),
			'7'		=> $city->getBuildingPlace7(),
			'8'		=> $city->getBuildingPlace8(),
			'9'		=> $city->getBuildingPlace9(),
			'10'	=> $city->getBuildingPlace10(),
			'11'	=> $city->getBuildingPlace11(),
			'12'	=> $city->getBuildingPlace12(),
			'13'	=> $city->getBuildingPlace13(),
			'14'	=> $city->getBuildingPlace14(),
			'15'	=> $city->getBuildingPlace15(),
			'16'	=> $city->getBuildingPlace16(),
			'17'	=> $city->getBuildingPlace17(),
			'18'	=> $city->getBuildingPlace18(),
		);
		switch ($building) 
		{
			default:
				$renderer->assign('id',$city_id);
				$renderer->display('city/no_building.tpl');
				break;

			case '1': case '2': case '3': case '4': case '5': case '6': case '7': case '8': case '9': case '10': case '11': 
			case '12': case '13': case '14': case '15': case '16': case '17': case '18':
				$case_id = $building;
				if ($Building_places[$case_id] == null)
				{
					redirect("city/$city_id/build/new/$case_id");
				} else {
					redirect("city/$city_id/build/$Building_places[$case_id]");
				}
			break;
			
			case 'new':
				include 'new.php';
				break;
			
			case 'lumberjack':
				include 'upgrade/lumberjack.php';
				break;
				
			case 'claymine':
				include 'upgrade/clay_mine.php';
				break;
				
			case 'stonebreak':
				include 'upgrade/stone_break.php';
				break;
				
			case 'ironmine':
				include 'upgrade/iron_mine.php';
				break;
				
			case 'goldmine':
				include 'upgrade/gold_mine.php';
				break;
				
		}	
	}		
}
}
?>
