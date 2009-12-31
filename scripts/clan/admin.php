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
$uri->name(array("page_id", "user_id"));
$page_id = stripinput($_URI['page_id']);
$user_id = stripinput($_URI['user_id']);

$clan = new User($db);
$clan = $clan->findOneByUserName($username);
$clan = array(
	'clan_id' => $clan->getClanId(),
	'clan_access' => $clan->getClanAccess(),
	);
$clan_id = ($clan['clan_id']);
$clan_access = ($clan['clan_access']);

if ($clan_access == '3')
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

	$renderer->assign('clan',$get_clan);

	switch ($page_id) {
	case '':
		$renderer->display('clan/admin_0.tpl');
		break;
	case 'homepage':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_homepage.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text']))
				);
			
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_0($clan_array['text']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page1':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_1.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
			 	   'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
				
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_1($clan_array['text']);
				$clan_input->setPage_1_access($clan_array['access']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page2':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_2.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
			   		'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
			
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_2($clan_array['text']);
				$clan_input->setPage_2_access($clan_array['access']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page3':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_3.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
				    'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
			
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_3($clan_array['text']);
				$clan_input->setPage_3_access($clan_array['access']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page4':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_4.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
			    	'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
			
			$clan_input = new Clan ($db);
			$clan_input = $clan_input->findOneByClanId($clan_id);
			$clan_input->setPage_4($clan_array['text']);
			$clan_input->setPage_4_access($clan_array['access']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page5':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_5.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
			    	'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
				
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_5($clan_array['text']);
				$clan_input->setPage_5_access($clan_array['access']);
				$clan_input->save();
			
			redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page5':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_6.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
			    	'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
			
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_6($clan_array['text']);
				$clan_input->setPage_6_access($clan_array['access']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page7':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_7.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
				    'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
			
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_7($clan_array['text']);
				$clan_input->setPage_7_access($clan_array['access']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page8':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_8.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
				    'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
			
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_8($clan_array['text']);
				$clan_input->setPage_8_access($clan_array['access']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'page3':
		switch($_REQUEST['state'])
		{
			default:
			{
				$renderer->display('clan/admin_page_9.tpl');
			break;
			} // end default
			case 'process':
			{
				$clan_array = array(
					'text' => trim(clean_xhtml($_POST['clan']['text'])),
			    	'access' => trim(clean_xhtml($_POST['clan']['access']))
				);
			
				$clan_input = new Clan ($db);
				$clan_input = $clan_input->findOneByClanId($clan_id);
				$clan_input->setPage_9($clan_array['text']);
				$clan_input->setPage_9_access($clan_array['access']);
				$clan_input->save();
			
				redirect('clan-admin');		
			break;
			} // end process
		}
		break;
	case 'adduser':
	{
		if (!$user_id)
		{
		$CLAN_LIST_LIST = array();

		$clans_list = new Clanj($db);
		$clans_list = $clans_list->findByClanId(array($clan_id));

		foreach($clans_list as $clan_list)
		{
    		$CLAN_LIST_LIST[] = array(
    	  	  'id' => $clan_list->getUserId(),
     		  'name' => $clan_list->getUserName(),
    		);
		} // end shop list

		$renderer->assign('clan_list',$CLAN_LIST_LIST);
		$renderer->assign('clan_available',(bool)sizeof($CLAN_LIST_LIST));
		$renderer->display('clan/admin_add_user.tpl');
		}
		else 
		{
			$user_join = new Clanj($db);
			$user_join = $user_join->findOneByUserId($user_id);
			$user_join = array(
				'user_id' => $user_join->getUserId(),
			);
			
			if ($user_join['user_id'] == $user_id)
			{
			$user_join_clan = new User($db);
            $user_join_clan = $user_join_clan->findOneByUserId($user_id);
            $user_join_clan->setClanId($clan_id);
            $user_join_clan->save();
            
            $users_join_clan2 = new Clanj($db);
            $users_join_clan2 = $users_join_clan2->findByUserId(array($user_id));
 
			foreach($users_join_clan2 as $user_join_clan2)
			{
   				$user_join_clan2->destroy();
			}
		
            echo "<p>The user are added to your clan</p>";
			}
			else
			{
				echo "<p>The user are NOT in the waiting list!!!</p>";
			}
		}
	}
	break;
case 'kickuser':
	{
		if (!$user_id)
		{
		$USER_LIST_LIST = array();

		$users_list = new User($db);
		$users_list = $users_list->findByClanId(array($clan_id));

		foreach($users_list as $user_list)
		{
    		$USER_LIST_LIST[] = array(
    	  	  'id' => $user_list->getUserId(),
     		  'name' => $user_list->getUserName(),
    		);
		} // end shop list

		$renderer->assign('user_list',$USER_LIST_LIST);
		$renderer->assign('user_available',(bool)sizeof($USER_LIST_LIST));
		$renderer->display('clan/admin_kick_user.tpl');
		}
		else 
		{
			$user_kick = new User($db);
			$user_kick = $user_kick->findOneByUserId($user_id);
			$user_kick->setClanId('0');
			$user_kick->setClanAccess('0');
			$user_kick->save();
		
            echo "<p>The user are removed from your clan</p>";
		}
	}
	break;
	}
}
else
{
	echo "ERROR YOU ARE NOT A CLAN SUPERADMIN";
}
?>
