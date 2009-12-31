<?php
/**
 * Allows a user to create a new clan.
 *
 * This file is part of 'Modular Gaming'.
 *
 * <insert license info here>
 *
 * @author Copy112 (Copy112) <copy112@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/

//Get clan_id, page_id from the url if it exsist
$uri->name(array("clan_id", "page_id"));
$clan_id = stripinput($_URI['clan_id']);
$page_id = stripinput($_URI['page_id']);

$renderer->assign('clan_id', $clan_id);
$renderer->assign('page_id', $page_id);

//Get the users clan id.
$user_clan = new User($db);
$user_clan = $user_clan->findOneByUserName($username);
$user_clan = array(
		'clan_id' => $user_clan->getClanId(),
		'access' => $user_clan->getClanAccess(),
);
	
if ($user_clan['clan_id'] != 0)
{
	$user_clan_id = $user_clan['clan_id'];
	$clan_message = "To go to your clan press <a href=' $APP_CONFIG[public_dir]/clan/$user_clan_id'>here</a>";
	
	if ($user_clan['access'] == 3)
	{
	$user_clan_access = $user_clan['access'];
	$clan_message = "To go to your clan press <a href=' $APP_CONFIG[public_dir]/clan/$user_clan_id'>here</a>
	<br />To administer your clan press <a href=' $APP_CONFIG[public_dir]/clan-admin'>here</a>";
	}
}
else
{
	$clan_message = "You are not a member of any clan, to make your own clan click <a href=' $APP_CONFIG[public_dir]/new-clan'>here</a>.";
}

if($clan_id == null)
{
	$CLAN_LIST_LIST = array();

	$clans_list = new Clan($db);
	$clans_list = $clans_list->findBy(array());

	foreach($clans_list as $clan_list)
	{
    	$CLAN_LIST_LIST[] = array(
      	  'id' => $clan_list->getClanId(),
     	  'name' => $clan_list->getClanName(),
    	);
	} // end shop list

	$renderer->assign('clan_list',$CLAN_LIST_LIST);
	$renderer->assign('clan_available',(bool)sizeof($CLAN_LIST_LIST));
	$renderer->assign('clan_message', $clan_message);
    $renderer->display('clan/clan_noid.tpl');
}
else 
{
	
	$get_clan = new Clan($db);
	$get_clan = $get_clan->findOneByClanId($clan_id);
	$get_clan = array(
	        'page_0' => $get_clan->getPage_0(),
			'page_1' => $get_clan->getPage_1(),
			'page_2' => $get_clan->getPage_2(),
			'page_3' => $get_clan->getPage_3(),
			'page_4' => $get_clan->getPage_4(),
			'page_5' => $get_clan->getPage_5(),
			'page_6' => $get_clan->getPage_6(),
			'page_7' => $get_clan->getPage_7(),
			'page_8' => $get_clan->getPage_8(),
			'page_9' => $get_clan->getPage_9(),
	);
	$clan_access = new Clan($db);
	$clan_access = $clan_access->findOneByClanId($clan_id);	
	$clan_access = array(
			'page_1' => $clan_access->getPage_1_Access(),
			'page_2' => $clan_access->getPage_2_access(),
			'page_3' => $clan_access->getPage_3_access(),
			'page_4' => $clan_access->getPage_4_access(),
			'page_5' => $clan_access->getPage_5_access(),
			'page_6' => $clan_access->getPage_6_access(),
			'page_7' => $clan_access->getPage_7_access(),
			'page_8' => $clan_access->getPage_8_access(),
			'page_9' => $clan_access->getPage_9_access(),
			'access' => $clan_access->getAccess(),
	);   	     
		    
	$renderer->assign('clan',$get_clan);

	switch ($page_id) {
	case 1:
		if($clan_access['page_1'] == 'private')
		{
			if($user_clan_id == $clan_id)
			{
				$renderer->display('clan/clan_1.tpl');
			}
			else 
			{
				echo "<p>You need to be a member of this clan to see this page.</p>";
			}
		}
		else
		{
		$renderer->display('clan/clan_1.tpl');
		}
		break;
	case 2:
		if($clan_access['page_2'] == 'private')
		{
			if($user_clan_id == $clan_id)
			{
				$renderer->display('clan/clan_2.tpl');
			}
			else 
			{
				echo "<p>You need to be a member of this clan to see this page.</p>";
			}
		}
		else
		{
		$renderer->display('clan/clan_2.tpl');
		}
		break;
	case 3:
	$renderer->display('clan/clan_3.tpl');
	case 4:
		if($clan_access['page_4'] == 'private')
		{
			if($user_clan_id == $clan_id)
			{
				$renderer->display('clan/clan_4.tpl');
			}
			else 
			{
				echo "<p>You need to be a member of this clan to see this page.</p>";
			}
		}
		else
		{
		$renderer->display('clan/clan_4.tpl');
		}
		break;
	case 5:
		if($clan_access['page_5'] == 'private')
		{
			if($user_clan_id == $clan_id)
			{
				$renderer->display('clan/clan_5.tpl');
			}
			else 
			{
				echo "<p>You need to be a member of this clan to see this page.</p>";
			}
		}
		else
		{
		$renderer->display('clan/clan_5.tpl');
		}
		break;
	case 6:
	if($clan_access['page_6'] == 'private')
		{
			if($user_clan_id == $clan_id)
			{
				$renderer->display('clan/clan_6.tpl');
			}
			else 
			{
				echo "<p>You need to be a member of this clan to see this page.</p>";
			}
		}
		else
		{
		$renderer->display('clan/clan_6.tpl');
		}
		break;
	case 7:
		if($clan_access['page_7'] == 'private')
		{
			if($user_clan_id == $clan_id)
			{
				$renderer->display('clan/clan_7.tpl');
			}
			else 
			{
				echo "<p>You need to be a member of this clan to see this page.</p>";
			}
		}
		else
		{
		$renderer->display('clan/clan_7.tpl');
		}
		break;
	case 8:
		if($clan_access['page_8'] == 'private')
		{
			if($user_clan_id == $clan_id)
			{
				$renderer->display('clan/clan_8.tpl');
			}
			else 
			{
				echo "<p>You need to be a member of this clan to see this page.</p>";
			}
		}
		else
		{
		$renderer->display('clan/clan_8.tpl');
		}
		break;
	case 9:
		if($clan_access['page_9'] == 'private')
		{
			if($user_clan_id == $clan_id)
			{
				$renderer->display('clan/clan_9.tpl');
			}
			else 
			{
				echo "<p>You need to be a member of this clan to see this page.</p>";
			}
		}
		else
		{
		$renderer->display('clan/clan_9.tpl');
		}
		break;
    default:
    	if($clan_access['access'] == 'public')
    	{
    		if($user_clan['clan_id'] == '0')
			{
				$clan_join_message = "To join this clan press <a href=' $APP_CONFIG[public_dir]/join-clan/$clan_id'>here</a>";
			}
  		}
  		else 
  		{
  			if($user_clan['clan_id'] == '0')
			{
				$clan_join_message = "To join this clan press <a href=' $APP_CONFIG[public_dir]/join-clan/$clan_id'>here</a>. After you sent your request the admin of this clan will choose if you can join or not.";
			}
  		}
    	$renderer->assign('clan_join_message', $clan_join_message);
    	$renderer->display('clan/clan_0.tpl');
    	break;
	}
}
?>
